<?php // $file = D:/OpenServer/domains/container/container/templates/yootheme/packages/builder/elements/image/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'image', 
  'title' => 'Image', 
  'group' => 'basic', 
  'icon' => $filter->apply('url', 'images/icon.svg', $file), 
  'iconSmall' => $filter->apply('url', 'images/iconSmall.svg', $file), 
  'element' => true, 
  'width' => 500, 
  'defaults' => [
    'margin' => 'default', 
    'image_svg_color' => 'emphasis'
  ], 
  'placeholder' => [
    'props' => [
      'image' => $filter->apply('url', '~yootheme/theme/assets/images/element-image-placeholder.png', $file)
    ]
  ], 
  'templates' => [
    'render' => $filter->apply('path', './templates/template.php', $file), 
    'content' => $filter->apply('path', './templates/content.php', $file)
  ], 
  'fields' => [
    'image' => $config->get('builder.image'), 
    'image_width' => [
      'label' => 'Width', 
      'type' => 'number', 
      'attrs' => [
        'placeholder' => 'auto'
      ], 
      'enable' => 'image'
    ], 
    'image_height' => [
      'label' => 'Height', 
      'type' => 'number', 
      'attrs' => [
        'placeholder' => 'auto'
      ], 
      'enable' => 'image'
    ], 
    'image_alt' => [
      'label' => 'Image Alt', 
      'description' => 'Enter the image alt attribute.', 
      'source' => true, 
      'enable' => 'image'
    ], 
    'link' => $config->get('builder.link'), 
    'link_aria_label' => $config->get('builder.link_aria_label'), 
    'image_focal_point' => [
      'label' => 'Focal Point', 
      'description' => 'Set a focal point to adjust the image focus when cropping.', 
      'type' => 'select', 
      'options' => [
        'Top Left' => 'top-left', 
        'Top Center' => 'top-center', 
        'Top Right' => 'top-right', 
        'Center Left' => 'center-left', 
        'Center Center' => '', 
        'Center Right' => 'center-right', 
        'Bottom Left' => 'bottom-left', 
        'Bottom Center' => 'bottom-center', 
        'Bottom Right' => 'bottom-right'
      ], 
      'source' => true
    ], 
    'image_loading' => [
      'label' => 'Loading', 
      'description' => 'By default, images are loaded lazy. Enable eager loading for images in the initial viewport.', 
      'type' => 'checkbox', 
      'text' => 'Load image eagerly'
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
      ]
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
      ]
    ], 
    'image_hover_box_shadow' => [
      'label' => 'Hover Box Shadow', 
      'description' => 'Select the image box shadow size on hover.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge'
      ], 
      'enable' => 'link'
    ], 
    'image_box_decoration' => [
      'label' => 'Box Decoration', 
      'description' => 'Select the image box decoration style.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Default' => 'default', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary', 
        'Floating Shadow' => 'shadow', 
        'Mask' => 'mask'
      ]
    ], 
    'image_box_decoration_inverse' => [
      'type' => 'checkbox', 
      'text' => 'Inverse style', 
      'enable' => '$match(image_box_decoration, \'^(default|primary|secondary)$\')'
    ], 
    'image_svg_inline' => [
      'label' => 'Inline SVG', 
      'description' => 'Inject SVG images into the page markup so that they can easily be styled with CSS.', 
      'type' => 'checkbox', 
      'text' => 'Make SVG stylable with CSS'
    ], 
    'image_svg_animate' => [
      'type' => 'checkbox', 
      'text' => 'Animate strokes', 
      'enable' => 'image_svg_inline'
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
      'enable' => 'image_svg_inline'
    ], 
    'height_expand' => [
      'label' => 'Height', 
      'description' => 'Expand the height of the element to fill the available space in the column or force the height to one viewport. The image will cover the element\'s content box.', 
      'type' => 'checkbox', 
      'text' => 'Fill the available column space'
    ], 
    'image_viewport_height' => [
      'type' => 'checkbox', 
      'text' => 'Force viewport height', 
      'enable' => '!height_expand'
    ], 
    'text_color' => [
      'label' => 'Text Color', 
      'description' => 'Set light or dark color mode for text, buttons and controls if a sticky transparent navbar is displayed above.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ], 
      'source' => true
    ], 
    'link_target' => [
      'label' => 'Link Target', 
      'type' => 'select', 
      'options' => [
        'Same Window' => '', 
        'New Window' => 'blank', 
        'Modal' => 'modal'
      ]
    ], 
    'lightbox_width' => [
      'attrs' => [
        'placeholder' => 'auto'
      ], 
      'enable' => 'link_target == \'modal\''
    ], 
    'lightbox_height' => [
      'attrs' => [
        'placeholder' => 'auto'
      ], 
      'enable' => 'link_target == \'modal\''
    ], 
    'lightbox_image_focal_point' => [
      'label' => 'Modal Image Focal Point', 
      'description' => 'Set a focal point to adjust the image focus when cropping.', 
      'type' => 'select', 
      'options' => [
        'Top Left' => 'top-left', 
        'Top Center' => 'top-center', 
        'Top Right' => 'top-right', 
        'Center Left' => 'center-left', 
        'Center Center' => '', 
        'Center Right' => 'center-right', 
        'Bottom Left' => 'bottom-left', 
        'Bottom Center' => 'bottom-center', 
        'Bottom Right' => 'bottom-right'
      ], 
      'source' => true, 
      'enable' => 'link_target == \'modal\''
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
    'container_padding_remove' => $config->get('builder.container_padding_remove'), 
    'name' => $config->get('builder.name'), 
    'status' => $config->get('builder.status'), 
    'source' => $config->get('builder.source'), 
    'id' => $config->get('builder.id'), 
    'class' => $config->get('builder.cls'), 
    'attributes' => $config->get('builder.attrs'), 
    'css' => [
      'label' => 'CSS', 
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-image</code>, <code>.el-link</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500, 
        'hints' => ['.el-element', '.el-image', '.el-link']
      ]
    ], 
    'transform' => $config->get('builder.transform')
  ], 
  'fieldset' => [
    'default' => [
      'type' => 'tabs', 
      'fields' => [[
          'title' => 'Content', 
          'fields' => ['image', [
              'description' => 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically, and where possible, high resolution images will be auto-generated.', 
              'name' => '_image_dimension', 
              'type' => 'grid', 
              'width' => '1-2', 
              'fields' => ['image_width', 'image_height']
            ], 'image_alt', 'link', 'link_aria_label']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Image', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['image_focal_point', 'image_loading', 'image_border', 'image_box_shadow', 'image_hover_box_shadow', 'image_box_decoration', 'image_box_decoration_inverse', 'image_svg_inline', 'image_svg_animate', 'image_svg_color', 'height_expand', 'image_viewport_height', 'text_color']
            ], [
              'label' => 'Link', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['link_target', [
                  'label' => 'Modal Width/Height', 
                  'description' => 'Set the width and height for the modal content, i.e. image, video or iframe.', 
                  'type' => 'grid', 
                  'width' => '1-2', 
                  'fields' => ['lightbox_width', 'lightbox_height']
                ], 'lightbox_image_focal_point']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', '_parallax_button', 'visibility', 'container_padding_remove']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ]
];
