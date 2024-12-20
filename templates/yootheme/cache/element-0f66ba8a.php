<?php // $file = D:/OSPanel/domains/container/templates/yootheme/packages/builder/elements/table/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'table', 
  'title' => 'Table', 
  'group' => 'multiple items', 
  'icon' => $filter->apply('url', 'images/icon.svg', $file), 
  'iconSmall' => $filter->apply('url', 'images/iconSmall.svg', $file), 
  'element' => true, 
  'container' => true, 
  'width' => 500, 
  'defaults' => [
    'show_title' => true, 
    'show_meta' => true, 
    'show_content' => true, 
    'show_image' => true, 
    'show_link' => true, 
    'table_order' => '1', 
    'table_responsive' => 'overflow', 
    'table_width_title' => 'shrink', 
    'table_width_meta' => 'shrink', 
    'meta_style' => 'text-meta', 
    'image_svg_color' => 'emphasis', 
    'link_text' => 'Read more', 
    'link_style' => 'default'
  ], 
  'placeholder' => [
    'children' => [[
        'type' => 'table_item', 
        'props' => []
      ], [
        'type' => 'table_item', 
        'props' => []
      ], [
        'type' => 'table_item', 
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
      'item' => 'table_item'
    ], 
    'show_title' => [
      'label' => 'Display', 
      'type' => 'checkbox', 
      'text' => 'Show the title'
    ], 
    'show_meta' => [
      'type' => 'checkbox', 
      'text' => 'Show the meta text'
    ], 
    'show_content' => [
      'type' => 'checkbox', 
      'text' => 'Show the content'
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
    'table_style' => [
      'label' => 'Style', 
      'description' => 'Select the table style.', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'Divider' => 'divider', 
        'Striped' => 'striped'
      ]
    ], 
    'table_hover' => [
      'type' => 'checkbox', 
      'text' => 'Highlight the hovered row'
    ], 
    'table_justify' => [
      'type' => 'checkbox', 
      'text' => 'Remove left and right padding'
    ], 
    'table_size' => [
      'label' => 'Size', 
      'description' => 'Define the padding between table rows.', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'Small' => 'small', 
        'Large' => 'large'
      ]
    ], 
    'table_order' => [
      'label' => 'Order', 
      'description' => 'Define the order of the table cells.', 
      'type' => 'select', 
      'options' => [
        'Meta, Image, Title, Content, Link' => '1', 
        'Title, Image, Meta, Content, Link' => '2', 
        'Image, Title, Content, Meta, Link' => '3', 
        'Image, Title, Meta, Content, Link' => '4', 
        'Title, Meta, Content, Link, Image' => '5', 
        'Meta, Title, Content, Link, Image' => '6'
      ]
    ], 
    'table_vertical_align' => [
      'label' => 'Vertical Alignment', 
      'description' => 'Vertically center table cells.', 
      'type' => 'checkbox', 
      'text' => 'Center'
    ], 
    'table_responsive' => [
      'label' => 'Responsive', 
      'description' => 'Stack columns on small devices or enable overflow scroll for the container.', 
      'type' => 'select', 
      'options' => [
        'Scroll overflow' => 'overflow', 
        'Stacked' => 'responsive'
      ]
    ], 
    'table_last_align' => [
      'label' => 'Last Column Alignment', 
      'description' => 'Define the alignment of the last table column.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Left' => 'left', 
        'Center' => 'center', 
        'Right' => 'right'
      ]
    ], 
    'table_width_title' => [
      'label' => 'Title Width', 
      'description' => 'Define the width of the title cell.', 
      'type' => 'select', 
      'options' => [
        'Expand' => '', 
        'Shrink' => 'shrink', 
        'Small' => 'small', 
        'Medium' => 'medium'
      ], 
      'enable' => 'show_title'
    ], 
    'table_width_meta' => [
      'label' => 'Meta Width', 
      'description' => 'Define the width of the meta cell.', 
      'type' => 'select', 
      'options' => [
        'Expand' => '', 
        'Shrink' => 'shrink', 
        'Small' => 'small', 
        'Medium' => 'medium'
      ], 
      'enable' => 'show_meta'
    ], 
    'table_width_content' => [
      'label' => 'Content Width', 
      'description' => 'Define the width of the content cell.', 
      'type' => 'select', 
      'options' => [
        'Expand' => '', 
        'Shrink' => 'shrink', 
        'Small' => 'small', 
        'Medium' => 'medium'
      ], 
      'enable' => 'show_content'
    ], 
    'table_head_title' => [
      'label' => 'Title', 
      'description' => 'Enter a table header text for the title column.', 
      'attrs' => [
        'placeholder' => 'Title'
      ], 
      'enable' => 'show_title'
    ], 
    'table_head_meta' => [
      'label' => 'Meta', 
      'description' => 'Enter a table header text for the meta column.', 
      'attrs' => [
        'placeholder' => 'Meta'
      ], 
      'enable' => 'show_meta'
    ], 
    'table_head_content' => [
      'label' => 'Content', 
      'description' => 'Enter a table header text for the content column.', 
      'attrs' => [
        'placeholder' => 'Content'
      ], 
      'enable' => 'show_content'
    ], 
    'table_head_image' => [
      'label' => 'Image', 
      'description' => 'Enter a table header text for the image column.', 
      'attrs' => [
        'placeholder' => 'Image'
      ], 
      'enable' => 'show_image'
    ], 
    'table_head_link' => [
      'label' => 'Link', 
      'description' => 'Enter a table header text for the link column.', 
      'attrs' => [
        'placeholder' => 'Link'
      ], 
      'enable' => 'show_link'
    ], 
    'title_style' => [
      'label' => 'Style', 
      'description' => 'Title styles differ in font-size but may also come with a predefined color, size and font.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Heading 3X-Large' => 'heading-3xlarge', 
        'Heading 2X-Large' => 'heading-2xlarge', 
        'Heading X-Large' => 'heading-xlarge', 
        'Heading Large' => 'heading-large', 
        'Heading Medium' => 'heading-medium', 
        'Heading Small' => 'heading-small', 
        'Heading H1' => 'h1', 
        'Heading H2' => 'h2', 
        'Heading H3' => 'h3', 
        'Heading H4' => 'h4', 
        'Heading H5' => 'h5', 
        'Heading H6' => 'h6', 
        'Text Meta' => 'text-meta', 
        'Text Lead' => 'text-lead', 
        'Text Small' => 'text-small', 
        'Text Large' => 'text-large'
      ], 
      'enable' => 'show_title'
    ], 
    'title_font_family' => [
      'label' => 'Font Family', 
      'description' => 'Select an alternative font family. Mind that not all styles have different font families.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Default' => 'default', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary', 
        'Tertiary' => 'tertiary'
      ], 
      'enable' => 'show_title'
    ], 
    'title_color' => [
      'label' => 'Color', 
      'description' => 'Select the text color. If the Background option is selected, styles that don\'t apply a background image use the primary color instead.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Muted' => 'muted', 
        'Emphasis' => 'emphasis', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary', 
        'Success' => 'success', 
        'Warning' => 'warning', 
        'Danger' => 'danger', 
        'Background' => 'background'
      ], 
      'enable' => 'show_title'
    ], 
    'meta_style' => [
      'label' => 'Style', 
      'description' => 'Select a predefined meta text style, including color, size and font-family.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Text Meta' => 'text-meta', 
        'Text Lead' => 'text-lead', 
        'Text Small' => 'text-small', 
        'Text Large' => 'text-large', 
        'Heading H1' => 'h1', 
        'Heading H2' => 'h2', 
        'Heading H3' => 'h3', 
        'Heading H4' => 'h4', 
        'Heading H5' => 'h5', 
        'Heading H6' => 'h6'
      ], 
      'enable' => 'show_meta'
    ], 
    'meta_color' => [
      'label' => 'Color', 
      'description' => 'Select the text color.', 
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
      'enable' => 'show_meta'
    ], 
    'content_style' => [
      'label' => 'Style', 
      'description' => 'Select a predefined text style, including color, size and font-family.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Text Meta' => 'text-meta', 
        'Text Lead' => 'text-lead', 
        'Text Small' => 'text-small', 
        'Text Large' => 'text-large', 
        'Heading H1' => 'h1', 
        'Heading H2' => 'h2', 
        'Heading H3' => 'h3', 
        'Heading H4' => 'h4', 
        'Heading H5' => 'h5', 
        'Heading H6' => 'h6'
      ], 
      'enable' => 'show_content'
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
    'image_box_shadow' => [
      'label' => 'Box Shadow', 
      'description' => 'Select the image box shadow size.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge'
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
      'text' => 'Expand width to table cell', 
      'enable' => 'show_link && link_style && !$match(link_style, \'link-(muted|text)|^text$\')'
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
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-item</code>, <code>.el-title</code>, <code>.el-meta</code>, <code>.el-content</code>, <code>.el-image</code>, <code>.el-link</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500, 
        'hints' => ['.el-element', '.el-item', '.el-title', '.el-meta', '.el-content', '.el-image', '.el-link']
      ]
    ], 
    'transform' => $config->get('builder.transform')
  ], 
  'fieldset' => [
    'default' => [
      'type' => 'tabs', 
      'fields' => [[
          'title' => 'Content', 
          'fields' => ['content', 'show_title', 'show_meta', 'show_content', 'show_image', 'show_link']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Table', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['table_style', 'table_hover', 'table_justify', 'table_size', 'table_order', 'table_vertical_align', 'table_responsive', 'table_last_align', 'table_width_title', 'table_width_meta', 'table_width_content']
            ], [
              'label' => 'Table Head', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['table_head_title', 'table_head_meta', 'table_head_content', 'table_head_image', 'table_head_link']
            ], [
              'label' => 'Title', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['title_style', 'title_font_family', 'title_color']
            ], [
              'label' => 'Meta', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['meta_style', 'meta_color']
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
                ], 'image_loading', 'image_border', 'image_box_shadow', 'image_svg_inline', 'image_svg_animate', 'image_svg_color']
            ], [
              'label' => 'Link', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['link_text', 'link_target', 'link_style', 'link_size', 'link_fullwidth']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', '_parallax_button', 'visibility']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ]
];
