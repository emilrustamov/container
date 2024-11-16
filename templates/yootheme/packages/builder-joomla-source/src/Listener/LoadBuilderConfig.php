<?php

namespace YOOtheme\Builder\Joomla\Source\Listener;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Multilanguage;
use Joomla\CMS\Router\SiteRouter;
use YOOtheme\Builder\BuilderConfig;
use YOOtheme\Builder\Joomla\Source\UserHelper;
use function YOOtheme\trans;

class LoadBuilderConfig
{
    public SiteRouter $router;

    public function __construct(SiteRouter $router)
    {
        $this->router = $router;
    }

    /**
     * @param BuilderConfig $config
     */
    public function handle($config): void
    {
        $languages = Multilanguage::isEnabled()
            ? array_map(
                fn($lang) => [
                    'value' => $lang->value == '*' ? '' : strtolower($lang->value),
                    'text' => $lang->text,
                ],
                HTMLHelper::_('contentlanguage.existing', true, true),
            )
            : [];

        $languageField = [
            'label' => trans('Limit by Language'),
            'type' => 'select',
            'defaultIndex' => 0,
            'options' => [['evaluate' => 'yootheme.builder.languages']],
            'show' => 'yootheme.builder.languages.length > 1 || lang',
        ];

        $templates = [
            'com_content.article' => [
                'label' => trans('Single Article'),
                'fieldset' => [
                    'default' => [
                        'fields' => [
                            'catid' => ($category = [
                                'label' => trans('Limit by Categories'),
                                'description' => trans(
                                    'The template is only assigned to articles from the selected categories. Articles from child categories are not included. Use the <kbd>shift</kbd> or <kbd>ctrl/cmd</kbd> key to select multiple categories.',
                                ),
                                'type' => 'select',
                                'default' => [],
                                'options' => [['evaluate' => 'yootheme.builder.categories']],
                                'attrs' => [
                                    'multiple' => true,
                                    'class' => 'uk-height-small',
                                ],
                            ]),
                            'tag' => ($tag = [
                                'label' => trans('Limit by Tags'),
                                'description' => trans(
                                    'The template is only assigned to articles with the selected tags. Use the <kbd>shift</kbd> or <kbd>ctrl/cmd</kbd> key to select multiple tags.',
                                ),
                                'type' => 'select',
                                'default' => [],
                                'options' => [['evaluate' => 'yootheme.builder.tags']],
                                'attrs' => [
                                    'multiple' => true,
                                    'class' => 'uk-height-small',
                                ],
                            ]),
                            'lang' => $languageField,
                        ],
                    ],
                ],
            ],

            'com_content.category' => [
                'label' => trans('Category Blog'),
                'fieldset' => [
                    'default' => [
                        'fields' => [
                            'catid' =>
                                [
                                    'label' => trans('Limit by Categories'),
                                    'description' => trans(
                                        'The template is only assigned to the selected categories. Child categories are not included. Use the <kbd>shift</kbd> or <kbd>ctrl/cmd</kbd> key to select multiple categories.',
                                    ),
                                ] + $category,
                            'tag' =>
                                [
                                    'description' => trans(
                                        'The template is only assigned to categories if the selected tags are set in the menu item. Use the <kbd>shift</kbd> or <kbd>ctrl/cmd</kbd> key to select multiple tags.',
                                    ),
                                ] + $tag,
                            'pages' => [
                                'label' => trans('Limit by Page Number'),
                                'description' => trans(
                                    'The template is only assigned to the selected pages.',
                                ),
                                'type' => 'select',
                                'options' => [
                                    trans('All pages') => '',
                                    trans('First page') => 'first',
                                    trans('All except first page') => 'except_first',
                                ],
                            ],
                            'lang' => $languageField,
                        ],
                    ],
                ],
            ],

            'com_content.featured' => [
                'label' => trans('Featured Articles'),
                'fieldset' => [
                    'default' => [
                        'fields' => [
                            'pages' => [
                                'label' => trans('Limit by Page Number'),
                                'description' => trans(
                                    'The template is only assigned to the selected pages.',
                                ),
                                'type' => 'select',
                                'options' => [
                                    trans('All pages') => '',
                                    trans('First page') => 'first',
                                    trans('All except first page') => 'except_first',
                                ],
                            ],
                            'lang' => $languageField,
                        ],
                    ],
                ],
            ],

            'com_tags.tag' => [
                'label' => trans('Tagged Items'),
                'fieldset' => [
                    'default' => [
                        'fields' => [
                            'tag' =>
                                [
                                    'description' => trans(
                                        'The template is only assigned to the view if the selected tags are set in the menu item. Use the <kbd>shift</kbd> or <kbd>ctrl/cmd</kbd> key to select multiple tags.',
                                    ),
                                ] + $tag,
                            'pages' => [
                                'label' => trans('Limit by Page Number'),
                                'description' => trans(
                                    'The template is only assigned to the selected pages.',
                                ),
                                'type' => 'select',
                                'options' => [
                                    trans('All pages') => '',
                                    trans('First page') => 'first',
                                    trans('All except first page') => 'except_first',
                                ],
                            ],
                            'lang' => $languageField,
                        ],
                    ],
                ],
            ],

            'com_tags.tags' => [
                'label' => trans('List All Tags'),
                'fieldset' => [
                    'default' => [
                        'fields' => [
                            'lang' => $languageField,
                        ],
                    ],
                ],
            ],

            'com_contact.contact' => [
                'label' => trans('Single Contact'),
                'fieldset' => [
                    'default' => [
                        'fields' => [
                            'catid' =>
                                [
                                    'description' => trans(
                                        'The template is only assigned to contacts from the selected categories. Contacts from child categories are not included. Use the <kbd>shift</kbd> or <kbd>ctrl/cmd</kbd> key to select multiple categories.',
                                    ),
                                    'options' => [
                                        [
                                            'evaluate' =>
                                                'yootheme.builder["com_contact.categories"]',
                                        ],
                                    ],
                                ] + $category,
                            'tag' =>
                                [
                                    'description' => trans(
                                        'The template is only assigned to contacts with the selected tags. Use the <kbd>shift</kbd> or <kbd>ctrl/cmd</kbd> key to select multiple tags.',
                                    ),
                                ] + $tag,
                            'lang' => $languageField,
                        ],
                    ],
                ],
            ],

            'com_search.search' => [
                'label' => trans('Search'),
                'fieldset' => [
                    'default' => [
                        'fields' => [
                            'lang' => $languageField,
                        ],
                    ],
                ],
            ],

            'com_finder.search' => [
                'label' => trans('Smart Search'),
                'fieldset' => [
                    'default' => [
                        'fields' => [
                            'lang' => $languageField,
                        ],
                    ],
                ],
            ],

            'error-404' => [
                'label' => trans('Error 404'),
                'fieldset' => [
                    'default' => [
                        'fields' => [
                            'lang' => $languageField,
                        ],
                    ],
                ],
            ],
        ];

        $config->merge([
            'languages' => $languages,

            'templates' => $templates,

            'categories' => array_map(
                fn($category) => ['value' => (string) $category->value, 'text' => $category->text],
                HTMLHelper::_('category.options', 'com_content'),
            ),

            'com_contact.categories' => array_map(
                fn($category) => ['value' => (string) $category->value, 'text' => $category->text],
                HTMLHelper::_('category.options', 'com_contact'),
            ),

            'tags' => array_map(
                fn($tag) => ['value' => (string) $tag->value, 'text' => $tag->text],
                HTMLHelper::_('tag.options'),
            ),

            'authors' => array_map(
                fn($user) => ['value' => (string) $user->value, 'text' => $user->text],
                UserHelper::getAuthorList(),
            ),

            'usergroups' => array_map(
                fn($group) => ['value' => (string) $group->value, 'text' => $group->text],
                HTMLHelper::_('user.groups'),
            ),
        ]);
    }
}
