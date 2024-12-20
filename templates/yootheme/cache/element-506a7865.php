<?php // $file = D:/OpenServer/domains/container/container/templates/yootheme/packages/builder/elements/nav/element.json

return [
  'name' => 'nav', 
  'title' => 'Nav', 
  'group' => 'multiple items', 
  'icon' => $filter->apply('url', 'images/icon.svg', $file), 
  'iconSmall' => $filter->apply('url', 'images/iconSmall.svg', $file), 
  'element' => true, 
  'container' => true, 
  'width' => 500, 
  'defaults' => [
    'show_meta' => true, 
    'show_image' => true, 
    'nav_style' => 'default', 
    'grid' => '1', 
    'image_vertical_align' => true
  ], 
  'placeholder' => [
    'children' => [[
        'type' => 'nav_item', 
        'props' => []
      ], [
        'type' => 'nav_item', 
        'props' => []
      ], [
        'type' => 'nav_item', 
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
      'item' => 'nav_item'
    ], 
    'show_meta' => [
      'label' => 'Display', 
      'type' => 'checkbox', 
      'text' => 'Show the subtitle'
    ], 
    'show_image' => [
      'description' => 'Show or hide content fields without the need to delete the content itself.', 
      'type' => 'checkbox', 
      'text' => 'Show the image'
    ], 
    'nav_style' => [
      'label' => 'Style', 
      'description' => 'Select the nav style.', 
      'type' => 'select', 
      'options' => [
        'Default' => 'default', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary', 
        'Navbar Dropdown' => 'navbar-dropdown-nav'
      ]
    ], 
    'nav_divider' => [
      'type' => 'checkbox', 
      'text' => 'Show dividers', 
      'enable' => 'nav_style != \'navbar-dropdown-nav\''
    ], 
    'nav_size' => [
      'label' => 'Primary Size', 
      'description' => 'Select the primary nav size.', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge'
      ], 
      'enable' => 'nav_style == \'primary\''
    ], 
    'html_element' => [
      'label' => 'HTML Element', 
      'description' => 'Define a navigation menu or give it no semantic meaning.', 
      'type' => 'select', 
      'options' => [
        'div' => '', 
        'nav' => 'nav'
      ]
    ], 
    'grid' => [
      'label' => 'Grid', 
      'description' => 'Set the number of grid columns.', 
      'type' => 'select', 
      'options' => [
        '1 Column' => '1', 
        '2 Columns' => '2', 
        '3 Columns' => '3', 
        '4 Columns' => '4', 
        '5 Columns' => '5', 
        '6 Columns' => '6'
      ]
    ], 
    'grid_divider' => [
      'description' => 'Show a divider between grid columns.', 
      'type' => 'checkbox', 
      'text' => 'Show dividers', 
      'enable' => 'grid'
    ], 
    'grid_breakpoint' => [
      'label' => 'Columns Breakpoint', 
      'description' => 'Set the device width from which the nav columns should apply.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'grid'
    ], 
    'grid_column_gap' => [
      'label' => 'Column Gap', 
      'description' => 'Set the size of the gap between the grid columns.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large', 
        'None' => 'collapse'
      ]
    ], 
    'grid_row_gap' => [
      'label' => 'Row Gap', 
      'description' => 'Set the size of the gap between the grid rows.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large', 
        'None' => 'collapse'
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
    'image_margin' => [
      'label' => 'Margin', 
      'type' => 'checkbox', 
      'text' => 'Add margin between', 
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
    'image_vertical_align' => [
      'label' => 'Vertical Alignment', 
      'description' => 'Vertically center the image.', 
      'type' => 'checkbox', 
      'text' => 'Center'
    ], 
    'icon_width' => [
      'label' => 'Icon Width', 
      'description' => 'Set the icon width.', 
      'enable' => 'show_image'
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
    'text_align' => $config->get('builder.text_align'), 
    'text_align_breakpoint' => $config->get('builder.text_align_breakpoint'), 
    'text_align_fallback' => $config->get('builder.text_align_fallback'), 
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
          'fields' => ['content', 'show_meta', 'show_image']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Nav', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['nav_style', 'nav_divider', 'nav_size', 'html_element', 'grid', 'grid_divider', 'grid_breakpoint', 'grid_column_gap', 'grid_row_gap']
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
                ], 'image_loading', 'icon_width', 'image_margin', 'image_border', 'image_svg_inline', 'image_svg_animate', 'image_svg_color', 'image_vertical_align']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', '_parallax_button', 'visibility']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ]
];
