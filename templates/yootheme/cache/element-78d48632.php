<?php // $file = D:/OSPanel/domains/container/templates/yootheme/packages/builder/elements/alert/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'alert', 
  'title' => 'Alert', 
  'group' => 'basic', 
  'icon' => $filter->apply('url', 'images/icon.svg', $file), 
  'iconSmall' => $filter->apply('url', 'images/iconSmall.svg', $file), 
  'element' => true, 
  'width' => 500, 
  'defaults' => [
    'title_element' => 'h3'
  ], 
  'placeholder' => [
    'props' => [
      'title' => '', 
      'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
    ]
  ], 
  'templates' => [
    'render' => $filter->apply('path', './templates/template.php', $file), 
    'content' => $filter->apply('path', './templates/content.php', $file)
  ], 
  'fields' => [
    'title' => [
      'label' => 'Title', 
      'source' => true
    ], 
    'content' => [
      'label' => 'Content', 
      'type' => 'editor', 
      'source' => true
    ], 
    'link' => $config->get('builder.link'), 
    'link_target' => $config->get('builder.link_target'), 
    'alert_style' => [
      'label' => 'Style', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'Primary' => 'primary', 
        'Success' => 'success', 
        'Warning' => 'warning', 
        'Danger' => 'danger'
      ]
    ], 
    'alert_size' => [
      'type' => 'checkbox', 
      'text' => 'Larger padding'
    ], 
    'title_style' => [
      'label' => 'Style', 
      'description' => 'Title styles differ in font-size but may also come with a predefined color, size and font.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Text Bold' => 'text-bold', 
        'Heading Small' => 'heading-small', 
        'Heading H1' => 'h1', 
        'Heading H2' => 'h2', 
        'Heading H3' => 'h3', 
        'Heading H4' => 'h4', 
        'Heading H5' => 'h5', 
        'Heading H6' => 'h6'
      ], 
      'enable' => 'title'
    ], 
    'title_element' => [
      'label' => 'HTML Element', 
      'description' => 'Set the level for the section heading or give it no semantic meaning.', 
      'type' => 'select', 
      'options' => [
        'h1' => 'h1', 
        'h2' => 'h2', 
        'h3' => 'h3', 
        'h4' => 'h4', 
        'h5' => 'h5', 
        'h6' => 'h6', 
        'div' => 'div'
      ], 
      'enable' => 'title'
    ], 
    'title_inline' => [
      'label' => 'Alignment', 
      'description' => 'Display the title in the same line as the content.', 
      'type' => 'checkbox', 
      'text' => 'Inline title', 
      'enable' => 'title'
    ], 
    'content_style' => [
      'label' => 'Style', 
      'description' => 'Select a predefined text style, including color, size and font-family.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Lead' => 'lead', 
        'Meta' => 'meta'
      ], 
      'enable' => 'content'
    ], 
    'content_margin' => [
      'label' => 'Margin Top', 
      'description' => 'Set the top margin. Note that the margin will only apply if the content field immediately follows another content field.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Default' => '', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        'None' => 'remove'
      ], 
      'enable' => 'content && !title_inline'
    ], 
    'position' => $config->get('builder.position'), 
    'position_left' => $config->get('builder.position_left'), 
    'position_right' => $config->get('builder.position_right'), 
    'position_top' => $config->get('builder.position_top'), 
    'position_bottom' => $config->get('builder.position_bottom'), 
    'position_z_index' => $config->get('builder.position_z_index'), 
    'margin' => $config->get('builder.margin'), 
    'margin_remove_top' => $config->get('builder.margin_remove_top'), 
    'margin_remove_bottom' => $config->get('builder.margin_remove_bottom'), 
    'maxwidth' => $config->get('builder.maxwidth'), 
    'maxwidth_breakpoint' => $config->get('builder.maxwidth_breakpoint'), 
    'block_align' => $config->get('builder.block_align'), 
    'block_align_breakpoint' => $config->get('builder.block_align_breakpoint'), 
    'block_align_fallback' => $config->get('builder.block_align_fallback'), 
    'text_align' => $config->get('builder.text_align_justify'), 
    'text_align_breakpoint' => $config->get('builder.text_align_breakpoint'), 
    'text_align_fallback' => $config->get('builder.text_align_justify_fallback'), 
    'animation' => $config->get('builder.animation'), 
    '_parallax_button' => $config->get('builder._parallax_button'), 
    'visibility' => $config->get('builder.visibility'), 
    'name' => $config->get('builder.name'), 
    'status' => $config->get('builder.status'), 
    'source' => $config->get('builder.source'), 
    'id' => $config->get('builder.id'), 
    'class' => $config->get('builder.cls'), 
    'attributes' => $config->get('builder.attrs'), 
    'css' => [
      'label' => 'CSS', 
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-title</code>, <code>.el-content</code>, <code>.el-link</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500, 
        'hints' => ['.el-element', '.el-title', '.el-content', '.el-link']
      ]
    ], 
    'transform' => $config->get('builder.transform')
  ], 
  'fieldset' => [
    'default' => [
      'type' => 'tabs', 
      'fields' => [[
          'title' => 'Content', 
          'fields' => ['title', 'content', 'link', 'link_target']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Alert', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['alert_style', 'alert_size']
            ], [
              'label' => 'Title', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['title_style', 'title_element', 'title_inline']
            ], [
              'label' => 'Content', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['content_style', 'content_margin']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', '_parallax_button', 'visibility']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ]
];
