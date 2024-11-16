<?php

namespace YOOtheme\Builder\Joomla\Source\Listener;

use Joomla\CMS\Document\Document;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Component\Content\Site\Helper\RouteHelper;

class MatchTemplate
{
    public string $language;

    public function __construct(?Document $document)
    {
        $this->language = $document->language ?? 'en-gb';
    }

    public function handle($view, $tpl): ?array
    {
        if ($tpl) {
            return null;
        }

        $layout = $view->getLayout();
        $context = $view->get('context');

        if ($context === 'com_content.article' && $layout === 'default') {
            $item = $view->get('item');

            return [
                'type' => $context,
                'query' => [
                    'catid' => $item->catid,
                    'tag' => array_column($item->tags->itemTags, 'id'),
                    'lang' => $this->language,
                ],
                'params' => ['item' => $item],
                'editUrl' => $item->params->get('access-edit')
                    ? Route::_(
                        RouteHelper::getFormRoute($item->id) .
                            '&return=' .
                            base64_encode(Uri::getInstance()),
                    )
                    : null,
            ];
        }

        if ($context === 'com_content.category' && $layout === 'blog') {
            $category = $view->get('category');
            $pagination = $view->get('pagination');

            return [
                'type' => $context,
                'query' => [
                    'catid' => $category->id,
                    'tag' => $view->get('State')->get('filter.tag', []),
                    'pages' => $pagination->pagesCurrent === 1 ? 'first' : 'except_first',
                    'lang' => $this->language,
                ],
                'params' => [
                    'category' => $category,
                    'items' => array_merge($view->get('lead_items'), $view->get('intro_items')),
                    'pagination' => $pagination,
                ],
            ];
        }

        if ($context === 'com_content.featured') {
            $pagination = $view->get('pagination');

            return [
                'type' => $context,
                'query' => [
                    'pages' => $pagination->pagesCurrent === 1 ? 'first' : 'except_first',
                    'lang' => $this->language,
                ],
                'params' => ['items' => $view->get('items'), 'pagination' => $pagination],
            ];
        }

        if ($context === 'com_tags.tag') {
            $pagination = $view->get('pagination');
            $tags = $view->get('item');

            return [
                'type' => $context,
                'query' => [
                    'tag' => array_column($tags, 'id'),
                    'pages' => $pagination->pagesCurrent === 1 ? 'first' : 'except_first',
                    'lang' => $this->language,
                ],
                'params' => [
                    'tags' => $tags,
                    'items' => $view->get('items'),
                    'pagination' => $pagination,
                ],
            ];
        }

        if ($context === 'com_tags.tags') {
            return [
                'type' => $context,
                'query' => ['lang' => $this->language],
                'params' => ['tags' => $view->get('items')],
            ];
        }

        if ($context === 'com_contact.contact') {
            $item = $view->get('item');
            return [
                'type' => $context,
                'query' => [
                    'catid' => $item->catid,
                    'tag' => array_column($item->tags->itemTags, 'id'),
                    'lang' => $this->language,
                ],
                'params' => ['item' => $item],
            ];
        }

        if ($context === 'com_search.search') {
            $pagination = $view->get('pagination');

            return [
                'type' => $context,
                'query' => [
                    'pages' => $pagination->pagesCurrent === 1 ? 'first' : 'except_first',
                    'lang' => $this->language,
                ],
                'params' => [
                    'search' => [
                        'searchword' => $view->searchword,
                        'total' => $view->total,
                        'error' => $view->error ?: null,
                    ],
                    'items' => $view->get('results'),
                    'pagination' => $pagination,
                ],
            ];
        }

        if ($context === 'com_finder.search') {
            $pagination = $view->get('pagination');
            $query = $view->get('query');

            return [
                'type' => $context,
                'query' => [
                    'pages' => $pagination->pagesCurrent === 1 ? 'first' : 'except_first',
                    'lang' => $this->language,
                ],
                'params' => [
                    'search' => [
                        'searchword' => $query->input ?: '',
                        'total' => $pagination->total,
                    ],
                    'items' => $view->get('results'),
                    'pagination' => $pagination,
                ],
            ];
        }

        if ($view->getName() === '404') {
            return [
                'type' => 'error-404',
                'query' => ['lang' => $this->language],
            ];
        }

        return null;
    }
}
