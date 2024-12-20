<?php // $file = D:/OSPanel/domains/container/templates/yootheme/packages/builder/elements/list/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'list', 
  'title' => 'List', 
  'group' => 'multiple items', 
  'icon' => $filter->apply('url', 'images/icon.svg', $file), 
  'iconSmall' => $filter->apply('url', 'images/iconSmall.svg', $file), 
  'element' => true, 
  'container' => true, 
  'width' => 500, 
  'defaults' => [
    'show_image' => true, 
    'show_link' => true, 
    'list_type' => 'vertical', 
    'list_element' => 'ul', 
    'list_horizontal_separator' => ', ', 
    'column_breakpoint' => 'm', 
    'image_svg_color' => 'emphasis', 
    'image_align' => 'left', 
    'image_vertical_align' => true
  ], 
  'placeholder' => [
    'children' => [[
        'type' => 'list_item', 
        'props' => []
      ], [
        'type' => 'list_item', 
        'props' => []
      ], [
        'type' => 'list_item', 
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
      'title' => 'content', 
      'item' => 'list_item', 
      'media' => [
        'type' => 'image', 
        'item' => [
          'image' => 'src'
        ]
      ]
    ], 
    'show_image' => [
      'label' => 'Display', 
      'type' => 'checkbox', 
      'text' => 'Show the image'
    ], 
    'show_link' => [
      'description' => 'Show or hide content fields without the need to delete the content itself.', 
      'type' => 'checkbox', 
      'text' => 'Show the link'
    ], 
    'list_type' => [
      'label' => 'Type', 
      'description' => 'Choose between a vertical or horizontal list.', 
      'type' => 'select', 
      'options' => [
        'Vertical' => 'vertical', 
        'Horizontal' => 'horizontal'
      ]
    ], 
    'list_marker' => [
      'label' => 'Marker', 
      'description' => 'Select the marker of the list items.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Disc' => 'disc', 
        'Circle' => 'circle', 
        'Square' => 'square', 
        'Decimal' => 'decimal', 
        'Hyphen' => 'hyphen', 
        'Image Bullet' => 'bullet'
      ], 
      'enable' => 'list_type == \'vertical\''
    ], 
    'list_marker_color' => [
      'label' => 'Marker Color', 
      'description' => 'Select the color of the list markers.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Muted' => 'muted', 
        'Emphasis' => 'emphasis', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary'
      ], 
      'enable' => 'list_type == \'vertical\' && list_marker != \'bullet\''
    ], 
    'list_style' => [
      'label' => 'Style', 
      'description' => 'Select the list style.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Divider' => 'divider', 
        'Striped' => 'striped'
      ], 
      'enable' => 'list_type == \'vertical\''
    ], 
    'list_size' => [
      'label' => 'Size', 
      'description' => 'Define the padding between items.', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'Large' => 'large', 
        'None' => 'collapse'
      ], 
      'enable' => 'list_type == \'vertical\''
    ], 
    'list_horizontal_separator' => [
      'label' => 'Separator', 
      'description' => 'Set the separator between list items.', 
      'enable' => 'list_type == \'horizontal\''
    ], 
    'column' => [
      'label' => 'Columns', 
      'description' => 'Set the number of list columns.', 
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
    'column_divider' => [
      'description' => 'Show a divider between list columns.', 
      'type' => 'checkbox', 
      'text' => 'Show dividers', 
      'enable' => 'column'
    ], 
    'column_breakpoint' => [
      'label' => 'Columns Breakpoint', 
      'description' => 'Set the device width from which the list columns should apply.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'column'
    ], 
    'list_element' => [
      'label' => 'HTML Element', 
      'description' => 'Set whether it\'s an ordered or unordered list.', 
      'type' => 'select', 
      'options' => [
        'ul' => 'ul', 
        'ol' => 'ol'
      ], 
      'enable' => 'list_type == \'vertical\''
    ], 
    'html_element' => [
      'type' => 'checkbox', 
      'text' => 'Wrap with nav element', 
      'enable' => 'list_type == \'vertical\''
    ], 
    'content_style' => [
      'label' => 'Style', 
      'description' => 'Select a predefined text style, including color, size and font-family.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Text Bold' => 'text-bold', 
        'Text Muted' => 'text-muted', 
        'Heading Small' => 'heading-small', 
        'Heading H1' => 'h1', 
        'Heading H2' => 'h2', 
        'Heading H3' => 'h3', 
        'Heading H4' => 'h4', 
        'Heading H5' => 'h5', 
        'Heading H6' => 'h6'
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
    'image_svg_inline' => [
      'label' => 'Inline SVG', 
      'description' => 'Inject SVG images into the page markup so that they can easily be styled with CSS.', 
      'type' => 'checkbox', 
      'text' => 'Make SVG stylable with CSS', 
      'enable' => 'show_image'
    ], 
    'image_svg_animate' => [
      'type' => 'checkbox', 
      'text' => 'Animate strokes', 
      'enable' => 'show_image && image_svg_inline'
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
    'icon' => [
      'type' => 'icon', 
      'label' => 'Icon', 
      'description' => 'Click on the pencil to pick an icon from the icon library.', 
      'enable' => 'show_image'
    ], 
    'icon_color' => [
      'label' => 'Icon Color', 
      'description' => 'Set the icon color.', 
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
      'enable' => 'show_image'
    ], 
    'icon_width' => [
      'label' => 'Icon Width', 
      'description' => 'Set the icon width.', 
      'enable' => 'show_image'
    ], 
    'image_align' => [
      'label' => 'Alignment', 
      'description' => 'Align the image to the left or right.', 
      'type' => 'select', 
      'options' => [
        'Left' => 'left', 
        'Right' => 'right'
      ], 
      'enable' => 'show_image'
    ], 
    'image_vertical_align' => [
      'label' => 'Vertical Alignment', 
      'description' => 'Vertically center the image.', 
      'type' => 'checkbox', 
      'text' => 'Center', 
      'enable' => 'show_image'
    ], 
    'link_style' => [
      'label' => 'Style', 
      'description' => 'This option doesn\'t apply unless a URL has been added to the item.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Muted' => 'muted', 
        'Text' => 'text', 
        'Heading' => 'heading', 
        'Reset' => 'reset'
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
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-item</code>, <code>.el-content</code>, <code>.el-image</code>, <code>.el-link</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500, 
        'hints' => ['.el-element', '.el-item', '.el-content', '.el-image', '.el-link']
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
              'label' => 'List', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['list_type', 'list_marker', 'list_marker_color', 'list_style', 'list_size', 'list_horizontal_separator', 'column', 'column_divider', 'column_breakpoint', 'list_element', 'html_element']
            ], [
              'label' => 'Content', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['content_style']
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
                ], 'image_loading', 'image_border', 'image_svg_inline', 'image_svg_animate', 'image_svg_color', 'image_align', 'image_vertical_align']
            ], [
              'label' => 'Icon', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['icon', 'icon_color', 'icon_width']
            ], [
              'label' => 'Link', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['link_style']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', '_parallax_button', 'visibility']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ]
];
