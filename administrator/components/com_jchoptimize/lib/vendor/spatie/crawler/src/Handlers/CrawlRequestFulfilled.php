<?php

namespace _JchOptimizeVendor\Spatie\Crawler\Handlers;

use Exception;

use function _JchOptimizeVendor\GuzzleHttp\Psr7\stream_for;

use _JchOptimizeVendor\GuzzleHttp\Psr7\Uri;
use _JchOptimizeVendor\GuzzleHttp\RedirectMiddleware;
use _JchOptimizeVendor\Psr\Http\Message\ResponseInterface;
use _JchOptimizeVendor\Psr\Http\Message\StreamInterface;
use _JchOptimizeVendor\Psr\Http\Message\UriInterface;
use _JchOptimizeVendor\Spatie\Crawler\Crawler;
use _JchOptimizeVendor\Spatie\Crawler\CrawlerRobots;
use _JchOptimizeVendor\Spatie\Crawler\CrawlProfiles\CrawlSubdomains;
use _JchOptimizeVendor\Spatie\Crawler\CrawlUrl;
use _JchOptimizeVendor\Spatie\Crawler\LinkAdder;
use _JchOptimizeVendor\Spatie\Crawler\ResponseWithCachedBody;

class CrawlRequestFulfilled
{
    protected Crawler $crawler;
    protected LinkAdder $linkAdder;
    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
        $this->linkAdder = new LinkAdder($this->crawler);
    }
    public function __invoke(ResponseInterface $response, $index)
    {
        $body = $this->getBody($response);
        $robots = new CrawlerRobots($response->getHeaders(), $body, $this->crawler->mustRespectRobots());
        $crawlUrl = $this->crawler->getCrawlQueue()->getUrlById($index);
        if ($this->crawler->mayExecuteJavaScript()) {
            $body = $this->getBodyAfterExecutingJavaScript($crawlUrl->url);
            $response = $response->withBody(stream_for($body));
        }
        $responseWithCachedBody = ResponseWithCachedBody::fromGuzzlePsr7Response($response);
        $responseWithCachedBody->setCachedBody($body);
        if ($robots->mayIndex()) {
            $this->handleCrawled($responseWithCachedBody, $crawlUrl);
        }
        if (!$this->crawler->getCrawlProfile() instanceof CrawlSubdomains) {
            if ($crawlUrl->url->getHost() !== $this->crawler->getBaseUrl()->getHost()) {
                return;
            }
        }
        if (!$robots->mayFollow()) {
            return;
        }
        $baseUrl = $this->getBaseUrl($response, $crawlUrl);
        $this->linkAdder->addFromHtml($body, $baseUrl);
        \usleep($this->crawler->getDelayBetweenRequests());
    }
    protected function getBaseUrl(ResponseInterface $response, CrawlUrl $crawlUrl)
    {
        $redirectHistory = $response->getHeader(RedirectMiddleware::HISTORY_HEADER);
        if (empty($redirectHistory)) {
            return $crawlUrl->url;
        }
        return new Uri(\end($redirectHistory));
    }
    protected function handleCrawled(ResponseInterface $response, CrawlUrl $crawlUrl)
    {
        $this->crawler->getCrawlObservers()->crawled($crawlUrl, $response);
    }
    protected function getBody(ResponseInterface $response): string
    {
        $contentType = $response->getHeaderLine('Content-Type');
        if (!$this->isMimetypeAllowedToParse($contentType)) {
            return '';
        }
        return $this->convertBodyToString($response->getBody(), $this->crawler->getMaximumResponseSize());
    }
    protected function convertBodyToString(StreamInterface $bodyStream, $readMaximumBytes = 1024 * 1024 * 2): string
    {
        if ($bodyStream->isSeekable()) {
            $bodyStream->rewind();
        }
        $body = '';
        $chunksToRead = $readMaximumBytes < 512 ? $readMaximumBytes : 512;
        for ($bytesRead = 0; $bytesRead < $readMaximumBytes; $bytesRead += $chunksToRead) {
            try {
                $newDataRead = $bodyStream->read($chunksToRead);
            } catch (Exception $exception) {
                $newDataRead = null;
            }
            if (!$newDataRead) {
                break;
            }
            $body .= $newDataRead;
        }
        return $body;
    }
    protected function getBodyAfterExecutingJavaScript(UriInterface $url): string
    {
        $browsershot = $this->crawler->getBrowsershot();
        $html = $browsershot->setUrl((string) $url)->bodyHtml();
        return \html_entity_decode($html);
    }
    protected function isMimetypeAllowedToParse($contentType): bool
    {
        if (empty($contentType)) {
            return \true;
        }
        if (!\count($this->crawler->getParseableMimeTypes())) {
            return \true;
        }
        foreach ($this->crawler->getParseableMimeTypes() as $allowedType) {
            if (\stristr($contentType, $allowedType)) {
                return \true;
            }
        }
        return \false;
    }
}
