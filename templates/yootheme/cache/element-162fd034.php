<?php // $file = D:/OpenServer/domains/container/container/templates/yootheme/packages/builder/elements/accordion/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'accordion', 
  'title' => 'Accordion', 
  'group' => 'multiple items', 
  'icon' => $filter->apply('url', 'images/icon.svg', $file), 
  'iconSmall' => $filter->apply('url', 'images/iconSmall.svg', $file), 
  'element' => true, 
  'container' => true, 
  'width' => 500, 
  'defaults' => [
    'show_image' => true, 
    'show_link' => true, 
    'collapsible' => true, 
    'content_column_breakpoint' => 'm', 
    'image_svg_color' => 'emphasis', 
    'image_align' => 'top', 
    'image_grid_width' => '1-2', 
    'image_grid_breakpoint' => 'm', 
    'link_text' => 'Read more', 
    'link_style' => 'default'
  ], 
  'placeholder' => [
    'children' => [[
        'type' => 'accordion_item', 
        'props' => []
      ], [
        'type' => 'accordion_item', 
        'props' => []
      ], [
        'type' => 'accordion_item', 
        'props' => []
      ]]
  ], 
  'templates' => [
    'render' => $filter->apply('path', './templates/template.php', $file), 
    'content' => $filter->apply('path', './templates/content.php', $file)
  ], 
  'fields' => [
    'content' => [
      'label' => 'Items', 
      'type' => 'content-items', 
      'item' => 'accordion_item', 
      'media' => [
        'type' => 'image', 
        'item' => [
          'title' => 'title', 
          'image' => 'src'
        ]
      ]
    ], 
    'show_image' => [
      'type' => 'checkbox', 
      'text' => 'Show the image'
    ], 
    'show_link' => [
      'description' => 'Show or hide content fields without the need to delete the content itself.', 
      'type' => 'checkbox', 
      'text' => 'Show the link'
    ], 
    'multiple' => [
      'label' => 'Behavior', 
      'type' => 'checkbox', 
      'text' => 'Allow multiple open items'
    ], 
    'collapsible' => [
      'type' => 'checkbox', 
      'text' => 'Start with all items closed'
    ], 
    'content_style' => [
      'label' => 'Style', 
      'description' => 'Select a predefined text style, including color, size and font-family.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Lead' => 'lead', 
        'Meta' => 'meta'
      ]
    ], 
    'content_dropcap' => [
      'label' => 'Drop Cap', 
      'description' => 'Display the first letter of the paragraph as a large initial.', 
      'type' => 'checkbox', 
      'text' => 'Enable drop cap'
    ], 
    'content_column' => [
      'label' => 'Columns', 
      'description' => 'Set the number of text columns.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Halves' => '1-2', 
        'Thirds' => '1-3', 
        'Quarters' => '1-4', 
        'Fifths' => '1-5', 
        'Sixths' => '1-6'
      ]
    ], 
    'content_column_divider' => [
      'description' => 'Show a divider between text columns.', 
      'type' => 'checkbox', 
      'text' => 'Show dividers', 
      'enable' => 'content_column'
    ], 
    'content_column_breakpoint' => [
      'label' => 'Columns Breakpoint', 
      'description' => 'Set the device width from which the text columns should apply.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'content_column'
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
      ]
    ], 
    'image_width' => [
      'attrs' => [
        'placeholder' => 'auto'
      ], 
      'enable' => 'show_image'
    ], 
    'image_height' => [
      'attrs' => [
        'placeholder' => 'auto'
      ], 
      'enable' => 'show_image'
    ], 
    'image_loading' => [
      'label' => 'Loading', 
      'description' => 'By default, images are loaded lazy. Enable eager loading for images in the initial viewport.', 
      'type' => 'checkbox', 
      'text' => 'Load image eagerly', 
      'enable' => 'show_image'
    ], 
    'image_border' => [
      'label' => 'Border', 
      'description' => 'Select the image border style.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Rounded' => 'rounded', 
        'Circle' => 'circle', 
        'Pill' => 'pill'
      ], 
      'enable' => 'show_image'
    ], 
    'image_align' => [
      'label' => 'Alignment', 
      'description' => 'Align the image to the top, left, right or place it between the title and the content.', 
      'type' => 'select', 
      'options' => [
        'Top' => 'top', 
        'Bottom' => 'bottom', 
        'Left' => 'left', 
        'Right' => 'right'
      ], 
      'enable' => 'show_image'
    ], 
    'image_grid_width' => [
      'label' => 'Grid Width', 
      'description' => 'Define the width of the image within the grid. Choose between percent and fixed widths or expand columns to the width of their content.', 
      'type' => 'select', 
      'options' => [
        'Auto' => 'auto', 
        '80%' => '4-5', 
        '75%' => '3-4', 
        '66%' => '2-3', 
        '60%' => '3-5', 
        '50%' => '1-2', 
        '40%' => '2-5', 
        '33%' => '1-3', 
        '25%' => '1-4', 
        '20%' => '1-5', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        '2X-Large' => '2xlarge'
      ], 
      'enable' => 'show_image && $match(image_align, \'left|right\')'
    ], 
    'image_grid_column_gap' => [
      'label' => 'Grid Column Gap', 
      'description' => 'Set the size of the gap between the image and the content.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large', 
        'None' => 'collapse'
      ], 
      'enable' => 'show_image && $match(image_align, \'left|right\')'
    ], 
    'image_grid_row_gap' => [
      'label' => 'Grid Row Gap', 
      'description' => 'Set the size of the gap if the grid items stack.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large', 
        'None' => 'collapse'
      ], 
      'enable' => 'show_image && $match(image_align, \'left|right\')'
    ], 
    'image_grid_breakpoint' => [
      'label' => 'Grid Breakpoint', 
      'description' => 'Set the breakpoint from which grid items will stack.', 
      'type' => 'select', 
      'options' => [
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'show_image && $match(image_align, \'left|right\')'
    ], 
    'image_vertical_align' => [
      'label' => 'Vertical Alignment', 
      'description' => 'Vertically center grid items.', 
      'type' => 'checkbox', 
      'text' => 'Center', 
      'enable' => 'show_image && $match(image_align, \'left|right\')'
    ], 
    'image_margin' => [
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
      'enable' => 'show_image && image_align == \'bottom\''
    ], 
    'image_svg_inline' => [
      'label' => 'Inline SVG', 
      'description' => 'Inject SVG images into the page markup so that they can easily be styled with CSS.', 
      'type' => 'checkbox', 
      'text' => 'Make SVG stylable with CSS', 
      'enable' => 'show_image'
    ], 
    'image_svg_color' => [
      'label' => 'SVG Color', 
      'description' => 'Select the SVG color. It will only apply to supported elements defined in the SVG.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Muted' => 'muted', 
        'Emphasis' => 'emphasis', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary', 
        'Success' => 'success', 
        'Warning' => 'warning', 
        'Danger' => 'danger'
      ], 
      'enable' => 'show_image && image_svg_inline'
    ], 
    'link_text' => [
      'label' => 'Text', 
      'description' => 'Enter the text for the link.', 
      'enable' => 'show_link'
    ], 
    'link_target' => [
      'type' => 'checkbox', 
      'text' => 'Open in a new window', 
      'enable' => 'show_link'
    ], 
    'link_style' => [
      'label' => 'Style', 
      'description' => 'Set the link style.', 
      'type' => 'select', 
      'options' => [
        'Button Default' => 'default', 
        'Button Primary' => 'primary', 
        'Button Secondary' => 'secondary', 
        'Button Danger' => 'danger', 
        'Button Text' => 'text', 
        'Link' => '', 
        'Link Muted' => 'link-muted', 
        'Link Text' => 'link-text'
      ], 
      'enable' => 'show_link'
    ], 
    'link_size' => [
      'label' => 'Button Size', 
      'description' => 'Set the button size.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Default' => '', 
        'Large' => 'large'
      ], 
      'enable' => 'show_link && link_style && !$match(link_style, \'link-(muted|text)\')'
    ], 
    'link_fullwidth' => [
      'type' => 'checkbox', 
      'text' => 'Full width button', 
      'enable' => 'show_link && link_style && !$match(link_style, \'link-(muted|text)\')'
    ], 
    'link_margin' => [
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
      'enable' => 'show_link'
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
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-item</code>, <code>.el-title</code>, <code>.el-content</code>, <code>.el-image</code>, <code>.el-link</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500, 
        'hints' => ['.el-element', '.el-item', '.el-title', '.el-content', '.el-image', '.el-link']
      ]
    ], 
    'transform' => $config->get('builder.transform')
  ], 
  'fieldset' => [
    'default' => [
      'type' => 'tabs', 
      'fields' => [[
          'title' => 'Content', 
          'fields' => ['content', 'show_image', 'show_link']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Accordion', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['multiple', 'collapsible']
            ], [
              'label' => 'Content', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['content_style', 'content_dropcap', 'content_column', 'content_column_divider', 'content_column_breakpoint', 'content_margin']
            ], [
              'label' => 'Image', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => [[
                  'label' => 'Width/Height', 
                  'description' => 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically, and where possible, high resolution images will be auto-generated.', 
                  'type' => 'grid', 
                  'width' => '1-2', 
                  'fields' => ['image_width', 'image_height']
                ], 'image_loading', 'image_border', 'image_align', 'image_grid_width', 'image_grid_column_gap', 'image_grid_row_gap', 'image_grid_breakpoint', 'image_vertical_align', 'image_margin', 'image_svg_inline', 'image_svg_color']
            ], [
              'label' => 'Link', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['link_text', 'link_target', 'link_style', 'link_size', 'link_fullwidth', 'link_margin']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', '_parallax_button', 'visibility']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ]
];
