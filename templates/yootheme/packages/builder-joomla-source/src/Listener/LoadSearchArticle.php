<?php

namespace YOOtheme\Builder\Joomla\Source\Listener;

class LoadSearchArticle
{
    public function handle($event): void
    {
        $context = $event->getArgument('context');
        $item = $event->getArgument('subject');

        if ($context === 'com_search.search.article') {
            $item->created_raw = $item->created;
        }
    }
}
