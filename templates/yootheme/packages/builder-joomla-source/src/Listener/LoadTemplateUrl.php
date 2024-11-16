<?php

namespace YOOtheme\Builder\Joomla\Source\Listener;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Router\SiteRouter;
use Joomla\Component\Contact\Site\Helper\RouteHelper as ContactRouteHelper;
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Joomla\Component\Tags\Site\Helper\RouteHelper as TagRouteHelper;
use YOOtheme\Arr;
use YOOtheme\Builder\Joomla\Source\ArticleHelper;
use YOOtheme\Builder\Joomla\Source\TagHelper;
use YOOtheme\Builder\Joomla\Source\UserHelper;
use YOOtheme\Config;

class LoadTemplateUrl
{
    public Config $config;
    public SiteRouter $router;

    public function __construct(Config $config, SiteRouter $router)
    {
        $this->config = $config;
        $this->router = $router;
    }

    public function handle(array $template): array
    {
        $url = '';

        try {
            switch ($template['type'] ?? '') {
                case 'com_content.article':
                    $lang = $this->getLanguage($template);
                    $args = $template['query'] + ['limit' => 1];

                    Arr::updateKeys($args, ['tag' => 'tags']);

                    if ($articles = ArticleHelper::query($args)) {
                        $url = RouteHelper::getArticleRoute(
                            $articles[0]->id,
                            $articles[0]->catid,
                            $lang,
                        );
                    }

                    break;

                case 'com_content.category':
                    $lang = $this->getLanguage($template);
                    $catid = $template['query']['catid'] ?? null ?: [$this->getDefaultCategory()];

                    if (isset($catid[0])) {
                        $url = RouteHelper::getCategoryRoute($catid[0], $lang, 'blog');
                    }

                    break;

                case 'com_content.featured':
                    $url = 'index.php?option=com_content&view=featured';
                    break;

                case 'com_tags.tag':
                    $tag =
                        $template['query']['tag'] ?? null ?:
                        array_column(TagHelper::query($template['query'] + ['limit' => 1]), 'id');

                    if (isset($tag[0])) {
                        $url = TagRouteHelper::getTagRoute($tag[0]);
                    }

                    break;

                case 'com_tags.tags':
                    $url = 'index.php?option=com_tags&view=tags';
                    break;

                case 'com_contact.contact':
                    $lang = $this->getLanguage($template);
                    $args = $template['query'] + ['limit' => 1];

                    if ($contacts = UserHelper::queryContacts($args)) {
                        $url = ContactRouteHelper::getContactRoute(
                            $contacts[0]->id,
                            $contacts[0]->catid,
                            $lang,
                        );
                    }
                    break;

                case 'com_finder.search':
                    $url = 'index.php?option=com_finder&view=search';
                    break;

                case 'com_search.search':
                    $url = 'index.php?option=com_search&view=search';
                    break;

                case 'error-404':
                    $url = RouteHelper::getArticleRoute(-1, 0, $this->getLanguage($template));
                    break;
            }

            if ($url) {
                $template['url'] = (string) $this->router->build($url);
            }
        } catch (\Exception $e) {
            // ArticleHelper::query() throws exception if article "attribs" are invalid JSON
        }

        return $template;
    }

    /**
     * Fixes lowercase language code from "en-gb" to "en-GB".
     */
    protected function getLanguage(array $template): string
    {
        return preg_replace_callback(
            '/-\w{2}$/',
            fn($matches) => strtoupper($matches[0]),
            $template['query']['lang'] ?? '',
        );
    }

    protected function getDefaultCategory(): ?string
    {
        foreach (HTMLHelper::_('category.options', 'com_content') as $cat) {
            if ($this->config->get('~theme.page_category') !== (string) $cat->value) {
                return (string) $cat->value;
            }
        }
    }
}
