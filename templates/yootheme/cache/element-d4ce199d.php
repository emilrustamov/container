<?php // $file = /var/www/u2526582/data/www/container-tm.com/templates/yootheme/packages/builder/elements/overlay-slider/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'overlay-slider', 
  'title' => 'Overlay Slider', 
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
    'show_link' => true, 
    'show_hover_image' => true, 
    'slider_width' => 'fixed', 
    'slider_width_default' => '1-1', 
    'slider_width_medium' => '1-3', 
    'slider_gap' => 'default', 
    'slider_autoplay_pause' => true, 
    'nav' => 'dotnav', 
    'nav_align' => 'center', 
    'nav_breakpoint' => 's', 
    'slidenav' => 'default', 
    'slidenav_margin' => 'medium', 
    'slidenav_breakpoint' => 's', 
    'slidenav_outside_breakpoint' => 'xl', 
    'overlay_mode' => 'cover', 
    'overlay_position' => 'center', 
    'overlay_transition' => 'fade', 
    'title_hover_style' => 'reset', 
    'title_element' => 'h3', 
    'meta_style' => 'text-meta', 
    'meta_align' => 'below-title', 
    'meta_element' => 'div', 
    'link_text' => 'Read more', 
    'link_style' => 'default', 
    'text_align' => 'center', 
    'margin' => 'default'
  ], 
  'placeholder' => [
    'children' => [[
        'type' => 'overlay-slider_item', 
        'props' => []
      ], [
        'type' => 'overlay-slider_item', 
        'props' => []
      ], [
        'type' => 'overlay-slider_item', 
        'props' => []
      ], [
        'type' => 'overlay-slider_item', 
        'props' => []
      ], [
        'type' => 'overlay-slider_item', 
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
      'item' => 'overlay-slider_item', 
      'media' => [
        'type' => 'image', 
        'item' => [
          'title' => 'title', 
          'image' => 'src'
        ]
      ]
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
    'show_link' => [
      'type' => 'checkbox', 
      'text' => 'Show the link'
    ], 
    'show_hover_image' => [
      'description' => 'Show or hide content fields without the need to delete the content itself.', 
      'type' => 'checkbox', 
      'text' => 'Show the overlay image'
    ], 
    'slider_width' => [
      'label' => 'Item Width Mode', 
      'description' => 'Define whether the width of the slider items is fixed or automatically expanded by its content widths.', 
      'type' => 'select', 
      'options' => [
        'Fixed' => 'fixed', 
        'Auto' => ''
      ]
    ], 
    'slider_height' => [
      'type' => 'select', 
      'options' => [
        'Auto' => '', 
        'Viewport' => 'viewport', 
        'Viewport (Subtract Next Section)' => 'section'
      ], 
      'enable' => 'slider_width'
    ], 
    'slider_height_viewport' => [
      'type' => 'number', 
      'attrs' => [
        'placeholder' => '100', 
        'min' => 0, 
        'max' => 100, 
        'step' => 10, 
        'class' => 'uk-form-width-xsmall'
      ], 
      'enable' => 'slider_height == \'viewport\''
    ], 
    'slider_height_offset_top' => [
      'type' => 'checkbox', 
      'text' => 'Subtract height above', 
      'enable' => 'slider_height == \'viewport\' && (slider_height_viewport || 0) <= 100 || slider_height == \'section\''
    ], 
    'slider_min_height' => [
      'label' => 'Min Height', 
      'description' => 'Use an optional minimum height to prevent the slider from becoming smaller than its content on small devices.', 
      'type' => 'range', 
      'attrs' => [
        'min' => 200, 
        'max' => 800, 
        'step' => 50
      ]
    ], 
    'slider_gap' => [
      'label' => 'Column Gap', 
      'description' => 'Set the size of the gap between the grid columns.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => 'default', 
        'Large' => 'large', 
        'None' => ''
      ]
    ], 
    'slider_divider' => [
      'label' => 'Divider', 
      'description' => 'Show a divider between grid columns.', 
      'type' => 'checkbox', 
      'text' => 'Show dividers', 
      'enable' => 'slider_gap'
    ], 
    'slider_width_default' => [
      'label' => 'Phone Portrait', 
      'description' => 'Set the item width for each breakpoint. <i>Inherit</i> refers to the item width of the next smaller screen size.', 
      'type' => 'select', 
      'options' => [
        '100%' => '1-1', 
        '83%' => '5-6', 
        '80%' => '4-5', 
        '60%' => '3-5', 
        '50%' => '1-2', 
        '33%' => '1-3', 
        '25%' => '1-4', 
        '20%' => '1-5', 
        '16%' => '1-6'
      ], 
      'enable' => 'slider_width'
    ], 
    'slider_width_small' => [
      'label' => 'Phone Landscape', 
      'description' => 'Set the item width for each breakpoint. <i>Inherit</i> refers to the item width of the next smaller screen size.', 
      'type' => 'select', 
      'options' => [
        'Inherit' => '', 
        '100%' => '1-1', 
        '83%' => '5-6', 
        '80%' => '4-5', 
        '60%' => '3-5', 
        '50%' => '1-2', 
        '33%' => '1-3', 
        '25%' => '1-4', 
        '20%' => '1-5', 
        '16%' => '1-6'
      ], 
      'enable' => 'slider_width'
    ], 
    'slider_width_medium' => [
      'label' => 'Tablet Landscape', 
      'description' => 'Set the item width for each breakpoint. <i>Inherit</i> refers to the item width of the next smaller screen size.', 
      'type' => 'select', 
      'options' => [
        'Inherit' => '', 
        '100%' => '1-1', 
        '83%' => '5-6', 
        '80%' => '4-5', 
        '60%' => '3-5', 
        '50%' => '1-2', 
        '33%' => '1-3', 
        '25%' => '1-4', 
        '20%' => '1-5', 
        '16%' => '1-6'
      ], 
      'enable' => 'slider_width'
    ], 
    'slider_width_large' => [
      'label' => 'Desktop', 
      'description' => 'Set the item width for each breakpoint. <i>Inherit</i> refers to the item width of the next smaller screen size.', 
      'type' => 'select', 
      'options' => [
        'Inherit' => '', 
        '100%' => '1-1', 
        '83%' => '5-6', 
        '80%' => '4-5', 
        '60%' => '3-5', 
        '50%' => '1-2', 
        '33%' => '1-3', 
        '25%' => '1-4', 
        '20%' => '1-5', 
        '16%' => '1-6'
      ], 
      'enable' => 'slider_width'
    ], 
    'slider_width_xlarge' => [
      'label' => 'Large Screens', 
      'description' => 'Set the item width for each breakpoint. <i>Inherit</i> refers to the item width of the next smaller screen size.', 
      'type' => 'select', 
      'options' => [
        'Inherit' => '', 
        '100%' => '1-1', 
        '83%' => '5-6', 
        '80%' => '4-5', 
        '60%' => '3-5', 
        '50%' => '1-2', 
        '33%' => '1-3', 
        '25%' => '1-4', 
        '20%' => '1-5', 
        '16%' => '1-6'
      ], 
      'enable' => 'slider_width'
    ], 
    'slider_sets' => [
      'label' => 'Sets', 
      'description' => 'Group items into sets. The number of items within a set depends on the defined item width, e.g. <i>33%</i> means that each set contains 3 items.', 
      'type' => 'checkbox', 
      'text' => 'Slide all visible items at once', 
      'enable' => '!slider_parallax'
    ], 
    'slider_center' => [
      'label' => 'Center', 
      'type' => 'checkbox', 
      'text' => 'Center the active slide'
    ], 
    'slider_finite' => [
      'label' => 'Finite', 
      'type' => 'checkbox', 
      'text' => 'Disable infinite scrolling'
    ], 
    'slider_velocity' => [
      'label' => 'Velocity', 
      'description' => 'Set the velocity in pixels per millisecond.', 
      'type' => 'range', 
      'attrs' => [
        'min' => 0.2, 
        'max' => 3, 
        'step' => 0.1, 
        'placeholder' => '1'
      ], 
      'enable' => '!slider_parallax'
    ], 
    'slider_autoplay' => [
      'label' => 'Autoplay', 
      'type' => 'checkbox', 
      'text' => 'Enable autoplay', 
      'enable' => '!slider_parallax'
    ], 
    'slider_autoplay_pause' => [
      'type' => 'checkbox', 
      'text' => 'Pause autoplay on hover', 
      'enable' => '!slider_parallax && slider_autoplay'
    ], 
    'slider_autoplay_interval' => [
      'label' => 'Autoplay Interval', 
      'description' => 'Set the autoplay interval in seconds.', 
      'type' => 'range', 
      'attrs' => [
        'min' => 5, 
        'max' => 15, 
        'step' => 1, 
        'placeholder' => '7'
      ], 
      'enable' => '!slider_parallax && slider_autoplay'
    ], 
    'slider_parallax' => [
      'label' => 'Parallax', 
      'description' => 'Add a stepless parallax animation based on the scroll position.', 
      'type' => 'checkbox', 
      'text' => 'Enable parallax effect'
    ], 
    'slider_parallax_easing' => [
      'label' => 'Parallax Easing', 
      'description' => 'Set the animation easing. Zero transitions at an even speed, a negative value starts off quickly while a positive value starts off slowly.', 
      'type' => 'range', 
      'attrs' => [
        'min' => -2, 
        'max' => 2, 
        'step' => 0.1
      ], 
      'enable' => 'slider_parallax'
    ], 
    'slider_parallax_target' => [
      'label' => 'Parallax Target', 
      'description' => 'The animation starts and stops depending on the element position in the viewport. Alternatively, use the position of a parent container.', 
      'type' => 'select', 
      'options' => [
        'Element' => '', 
        'Column' => '!.tm-grid-expand>*', 
        'Row' => '!.tm-grid-expand', 
        'Section' => '!.uk-section', 
        'Next Section' => '![class*=\'uk-section-\'] ~ [class*=\'uk-section-\']'
      ], 
      'enable' => 'slider_parallax'
    ], 
    'slider_parallax_start' => [
      'enable' => 'slider_parallax'
    ], 
    'slider_parallax_end' => [
      'enable' => 'slider_parallax'
    ], 
    'nav' => [
      'label' => 'Navigation', 
      'description' => 'Select the navigation type.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Dotnav' => 'dotnav'
      ]
    ], 
    'nav_align' => [
      'label' => 'Position', 
      'description' => 'Align the navigation items.', 
      'type' => 'select', 
      'options' => [
        'Left' => 'left', 
        'Center' => 'center', 
        'Right' => 'right'
      ], 
      'enable' => 'nav'
    ], 
    'nav_margin' => [
      'label' => 'Margin', 
      'description' => 'Set the vertical margin.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Default' => '', 
        'Medium' => 'medium', 
        'Large' => 'large'
      ], 
      'enable' => 'nav'
    ], 
    'nav_breakpoint' => [
      'label' => 'Breakpoint', 
      'description' => 'Display the navigation only on this device width and larger.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'nav'
    ], 
    'nav_color' => [
      'label' => 'Color', 
      'description' => 'Set light or dark color mode.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ], 
      'enable' => 'nav'
    ], 
    'slidenav' => [
      'label' => 'Position', 
      'description' => 'Select the position of the slidenav.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Default' => 'default', 
        'Outside' => 'outside', 
        'Top Left' => 'top-left', 
        'Top Right' => 'top-right', 
        'Center Left' => 'center-left', 
        'Center Right' => 'center-right', 
        'Bottom Left' => 'bottom-left', 
        'Bottom Center' => 'bottom-center', 
        'Bottom Right' => 'bottom-right'
      ], 
      'enable' => '!slider_parallax'
    ], 
    'slidenav_hover' => [
      'type' => 'checkbox', 
      'text' => 'Show on hover only', 
      'enable' => 'slidenav && !slider_parallax'
    ], 
    'slidenav_large' => [
      'type' => 'checkbox', 
      'text' => 'Larger style', 
      'enable' => 'slidenav && !slider_parallax'
    ], 
    'slidenav_margin' => [
      'label' => 'Margin', 
      'description' => 'Apply a margin between the slidenav and the slider container.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large'
      ], 
      'enable' => 'slidenav && !slider_parallax'
    ], 
    'slidenav_breakpoint' => [
      'label' => 'Breakpoint', 
      'description' => 'Display the slidenav only on this device width and larger.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'slidenav && !slider_parallax'
    ], 
    'slidenav_color' => [
      'label' => 'Color', 
      'description' => 'Set light or dark color mode.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ], 
      'enable' => 'slidenav && !slider_parallax'
    ], 
    'slidenav_outside_breakpoint' => [
      'label' => 'Outside Breakpoint', 
      'description' => 'Display the slidenav outside only on this device width and larger. Otherwise, display it inside.', 
      'type' => 'select', 
      'options' => [
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'slidenav == \'outside\' && !slider_parallax'
    ], 
    'slidenav_outside_color' => [
      'label' => 'Outside Color', 
      'description' => 'Set light or dark color if the slidenav is outside.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ], 
      'enable' => 'slidenav == \'outside\' && !slider_parallax'
    ], 
    'overlay_mode' => [
      'label' => 'Mode', 
      'description' => 'When using cover mode, you need to set the text color manually.', 
      'type' => 'select', 
      'options' => [
        'Cover' => 'cover', 
        'Caption' => 'caption'
      ]
    ], 
    'overlay_display' => [
      'label' => 'Display', 
      'description' => 'Show the overlay only on hover or when the slide becomes active.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
        'Hover' => 'hover', 
        'Active' => 'active'
      ]
    ], 
    'overlay_active_first' => [
      'type' => 'checkbox', 
      'text' => 'Make only first item active', 
      'enable' => 'overlay_display == \'active\''
    ], 
    'overlay_transition_background' => [
      'type' => 'checkbox', 
      'text' => 'Animate background only', 
      'enable' => 'overlay_display && overlay_mode == \'cover\''
    ], 
    'overlay_style' => [
      'label' => 'Style', 
      'description' => 'Select the style for the overlay.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Overlay Default' => 'overlay-default', 
        'Overlay Primary' => 'overlay-primary', 
        'Tile Default' => 'tile-default', 
        'Tile Muted' => 'tile-muted', 
        'Tile Primary' => 'tile-primary', 
        'Tile Secondary' => 'tile-secondary'
      ]
    ], 
    'text_color' => [
      'label' => 'Text Color', 
      'description' => 'Set light or dark color mode for text, buttons and controls.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ]
    ], 
    'text_color_hover' => [
      'type' => 'checkbox', 
      'text' => 'Inverse text color on hover or when active', 
      'enable' => '!overlay_style && show_hover_image || overlay_style && overlay_mode == \'cover\' && overlay_display && overlay_transition_background'
    ], 
    'overlay_padding' => [
      'label' => 'Padding', 
      'description' => 'Set the padding between the overlay and its content.', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'Small' => 'small', 
        'Large' => 'large', 
        'None' => 'none'
      ]
    ], 
    'overlay_position' => [
      'label' => 'Position', 
      'description' => 'Select the overlay or content position.', 
      'type' => 'select', 
      'options' => [
        'Top' => 'top', 
        'Bottom' => 'bottom', 
        'Left' => 'left', 
        'Right' => 'right', 
        'Top Left' => 'top-left', 
        'Top Center' => 'top-center', 
        'Top Right' => 'top-right', 
        'Bottom Left' => 'bottom-left', 
        'Bottom Center' => 'bottom-center', 
        'Bottom Right' => 'bottom-right', 
        'Center' => 'center', 
        'Center Left' => 'center-left', 
        'Center Right' => 'center-right'
      ]
    ], 
    'overlay_margin' => [
      'label' => 'Margin', 
      'description' => 'Apply a margin between the overlay and the image container.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large'
      ], 
      'enable' => 'overlay_style'
    ], 
    'overlay_maxwidth' => [
      'label' => 'Max Width', 
      'description' => 'Set the maximum content width.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        '2X-Large' => '2xlarge'
      ], 
      'enable' => '!$match(overlay_position, \'^(top|bottom)$\')'
    ], 
    'overlay_transition' => [
      'label' => 'Transition', 
      'description' => 'Select a transition for the overlay when it appears on hover or when active.', 
      'type' => 'select', 
      'options' => [
        'Fade' => 'fade', 
        'Scale Up' => 'scale-up', 
        'Scale Down' => 'scale-down', 
        'Slide Top Small' => 'slide-top-small', 
        'Slide Bottom Small' => 'slide-bottom-small', 
        'Slide Left Small' => 'slide-left-small', 
        'Slide Right Small' => 'slide-right-small', 
        'Slide Top Medium' => 'slide-top-medium', 
        'Slide Bottom Medium' => 'slide-bottom-medium', 
        'Slide Left Medium' => 'slide-left-medium', 
        'Slide Right Medium' => 'slide-right-medium', 
        'Slide Top 100%' => 'slide-top', 
        'Slide Bottom 100%' => 'slide-bottom', 
        'Slide Left 100%' => 'slide-left', 
        'Slide Right 100%' => 'slide-right'
      ], 
      'enable' => 'overlay_display'
    ], 
    'overlay_link' => [
      'label' => 'Link', 
      'description' => 'Link the whole overlay if a link exists.', 
      'type' => 'checkbox', 
      'text' => 'Link overlay', 
      'enable' => 'show_link'
    ], 
    'image_width' => [
      'attrs' => [
        'placeholder' => 'auto'
      ]
    ], 
    'image_height' => [
      'attrs' => [
        'placeholder' => 'auto'
      ]
    ], 
    'image_loading' => [
      'label' => 'Loading', 
      'description' => 'By default, images are loaded lazy. Enable eager loading for images in the initial viewport.', 
      'type' => 'checkbox', 
      'text' => 'Load image eagerly'
    ], 
    'image_transition' => [
      'label' => 'Transition', 
      'description' => 'Select an image transition.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Scale Up' => 'scale-up', 
        'Scale Down' => 'scale-down'
      ]
    ], 
    'title_transition' => [
      'label' => 'Transition', 
      'description' => 'Select a transition for the title when the overlay appears on hover or when active.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Fade' => 'fade', 
        'Scale Up' => 'scale-up', 
        'Scale Down' => 'scale-down', 
        'Slide Top Small' => 'slide-top-small', 
        'Slide Bottom Small' => 'slide-bottom-small', 
        'Slide Left Small' => 'slide-left-small', 
        'Slide Right Small' => 'slide-right-small', 
        'Slide Top Medium' => 'slide-top-medium', 
        'Slide Bottom Medium' => 'slide-bottom-medium', 
        'Slide Left Medium' => 'slide-left-medium', 
        'Slide Right Medium' => 'slide-right-medium', 
        'Slide Top 100%' => 'slide-top', 
        'Slide Bottom 100%' => 'slide-bottom', 
        'Slide Left 100%' => 'slide-left', 
        'Slide Right 100%' => 'slide-right'
      ], 
      'enable' => 'show_title && overlay_display'
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
    'title_link' => [
      'label' => 'Link', 
      'description' => 'Link the title if a link exists.', 
      'type' => 'checkbox', 
      'text' => 'Link title', 
      'enable' => 'show_title && show_link'
    ], 
    'title_hover_style' => [
      'label' => 'Hover Style', 
      'description' => 'Set the hover style for a linked title.', 
      'type' => 'select', 
      'options' => [
        'None' => 'reset', 
        'Heading Link' => 'heading', 
        'Default Link' => ''
      ], 
      'enable' => 'show_title && show_link && (title_link || overlay_link)'
    ], 
    'title_decoration' => [
      'label' => 'Decoration', 
      'description' => 'Decorate the title with a divider, bullet or a line that is vertically centered to the heading.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Divider' => 'divider', 
        'Bullet' => 'bullet', 
        'Line' => 'line'
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
      'enable' => 'show_title'
    ], 
    'title_margin' => [
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
      'enable' => 'show_title'
    ], 
    'meta_transition' => [
      'label' => 'Transition', 
      'description' => 'Select a transition for the meta text when the overlay appears on hover or when active.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Fade' => 'fade', 
        'Scale Up' => 'scale-up', 
        'Scale Down' => 'scale-down', 
        'Slide Top Small' => 'slide-top-small', 
        'Slide Bottom Small' => 'slide-bottom-small', 
        'Slide Left Small' => 'slide-left-small', 
        'Slide Right Small' => 'slide-right-small', 
        'Slide Top Medium' => 'slide-top-medium', 
        'Slide Bottom Medium' => 'slide-bottom-medium', 
        'Slide Left Medium' => 'slide-left-medium', 
        'Slide Right Medium' => 'slide-right-medium', 
        'Slide Top 100%' => 'slide-top', 
        'Slide Bottom 100%' => 'slide-bottom', 
        'Slide Left 100%' => 'slide-left', 
        'Slide Right 100%' => 'slide-right'
      ], 
      'enable' => 'show_meta && overlay_display'
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
    'meta_align' => [
      'label' => 'Alignment', 
      'description' => 'Align the meta text.', 
      'type' => 'select', 
      'options' => [
        'Above Title' => 'above-title', 
        'Below Title' => 'below-title', 
        'Below Content' => 'below-content'
      ], 
      'enable' => 'show_meta'
    ], 
    'meta_element' => [
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
      'enable' => 'show_meta'
    ], 
    'meta_margin' => [
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
      'enable' => 'show_meta'
    ], 
    'content_transition' => [
      'label' => 'Transition', 
      'description' => 'Select a transition for the content when the overlay appears on hover or when active.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Fade' => 'fade', 
        'Scale Up' => 'scale-up', 
        'Scale Down' => 'scale-down', 
        'Slide Top Small' => 'slide-top-small', 
        'Slide Bottom Small' => 'slide-bottom-small', 
        'Slide Left Small' => 'slide-left-small', 
        'Slide Right Small' => 'slide-right-small', 
        'Slide Top Medium' => 'slide-top-medium', 
        'Slide Bottom Medium' => 'slide-bottom-medium', 
        'Slide Left Medium' => 'slide-left-medium', 
        'Slide Right Medium' => 'slide-right-medium', 
        'Slide Top 100%' => 'slide-top', 
        'Slide Bottom 100%' => 'slide-bottom', 
        'Slide Left 100%' => 'slide-left', 
        'Slide Right 100%' => 'slide-right'
      ], 
      'enable' => 'show_content && overlay_display'
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
        'Heading H6' => 'h6'
      ], 
      'enable' => 'show_content'
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
      'enable' => 'show_content'
    ], 
    'link_target' => [
      'label' => 'Target', 
      'type' => 'checkbox', 
      'text' => 'Open in a new window', 
      'enable' => 'show_link'
    ], 
    'link_text' => [
      'label' => 'Text', 
      'description' => 'Enter the text for the link.', 
      'enable' => 'show_link'
    ], 
    'link_aria_label' => [
      'label' => 'ARIA Label', 
      'description' => 'Enter a descriptive text label to make it accessible if the link has no visible text.', 
      'enable' => 'show_link'
    ], 
    'link_transition' => [
      'label' => 'Transition', 
      'description' => 'Select a transition for the link when the overlay appears on hover or when active.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Fade' => 'fade', 
        'Scale Up' => 'scale-up', 
        'Scale Down' => 'scale-down', 
        'Slide Top Small' => 'slide-top-small', 
        'Slide Bottom Small' => 'slide-bottom-small', 
        'Slide Left Small' => 'slide-left-small', 
        'Slide Right Small' => 'slide-right-small', 
        'Slide Top Medium' => 'slide-top-medium', 
        'Slide Bottom Medium' => 'slide-bottom-medium', 
        'Slide Left Medium' => 'slide-left-medium', 
        'Slide Right Medium' => 'slide-right-medium', 
        'Slide Top 100%' => 'slide-top', 
        'Slide Bottom 100%' => 'slide-bottom', 
        'Slide Left 100%' => 'slide-left', 
        'Slide Right 100%' => 'slide-right'
      ], 
      'enable' => 'show_link && overlay_display'
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
    'container_padding_remove' => $config->get('builder.container_padding_remove'), 
    'name' => $config->get('builder.name'), 
    'status' => $config->get('builder.status'), 
    'source' => $config->get('builder.source'), 
    'id' => $config->get('builder.id'), 
    'class' => $config->get('builder.cls'), 
    'attributes' => $config->get('builder.attrs'), 
    'css' => [
      'label' => 'CSS', 
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-nav</code>, <code>.el-item</code>, <code>.el-slidenav</code>, <code>.el-image</code>, <code>.el-title</code>, <code>.el-meta</code>, <code>.el-content</code>, <code>.el-link</code>, <code>.el-hover-image</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500, 
        'hints' => ['.el-element', '.el-item', '.el-nav', '.el-slidenav', '.el-image', '.el-title', '.el-meta', '.el-content', '.el-link', '.el-hover-image']
      ]
    ], 
    'transform' => $config->get('builder.transform')
  ], 
  'fieldset' => [
    'default' => [
      'type' => 'tabs', 
      'fields' => [[
          'title' => 'Content', 
          'fields' => ['content', 'show_title', 'show_meta', 'show_content', 'show_link', 'show_hover_image']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Slider', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['slider_width', [
                  'label' => 'Height', 
                  'description' => 'The height will adapt automatically based on its content. Alternatively, the height can adapt to the height of the viewport. <br><br>Note: Make sure no height is set in the section settings when using one of the viewport options.', 
                  'name' => '_slider_height', 
                  'type' => 'grid', 
                  'width' => 'expand,auto', 
                  'gap' => 'small', 
                  'fields' => ['slider_height', 'slider_height_viewport']
                ], 'slider_height_offset_top', 'slider_min_height', 'slider_gap', 'slider_divider']
            ], [
              'label' => 'Item Width', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['slider_width_default', 'slider_width_small', 'slider_width_medium', 'slider_width_large', 'slider_width_xlarge']
            ], [
              'label' => 'Animation', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['slider_sets', 'slider_center', 'slider_finite', 'slider_velocity', 'slider_autoplay', 'slider_autoplay_pause', 'slider_autoplay_interval', 'slider_parallax', 'slider_parallax_easing', 'slider_parallax_target', [
                  'label' => 'Parallax Start/End', 
                  'description' => 'The animation starts when the element enters the viewport and ends when it leaves the viewport. Optionally, set a start and end offset, e.g. <code>100px</code>, <code>50vh</code> or <code>50vh + 50%</code>. Percent relates to the target\'s height.', 
                  'type' => 'grid', 
                  'width' => '1-2', 
                  'fields' => ['slider_parallax_start', 'slider_parallax_end']
                ]]
            ], [
              'label' => 'Navigation', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['nav', 'nav_align', 'nav_margin', 'nav_breakpoint', 'nav_color']
            ], [
              'label' => 'Slidenav', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['slidenav', 'slidenav_hover', 'slidenav_large', 'slidenav_margin', 'slidenav_breakpoint', 'slidenav_color', 'slidenav_outside_breakpoint', 'slidenav_outside_color']
            ], [
              'label' => 'Overlay', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['overlay_mode', 'overlay_display', 'overlay_active_first', 'overlay_transition_background', 'overlay_style', 'text_color', 'text_color_hover', 'overlay_padding', 'overlay_position', 'overlay_margin', 'overlay_maxwidth', 'overlay_transition', 'overlay_link']
            ], [
              'label' => 'Image/Video', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => [[
                  'label' => 'Width/Height', 
                  'description' => 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically, and where possible, high resolution images will be auto-generated.', 
                  'type' => 'grid', 
                  'width' => '1-2', 
                  'fields' => ['image_width', 'image_height']
                ], 'image_loading', 'image_transition']
            ], [
              'label' => 'Title', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['title_transition', 'title_style', 'title_link', 'title_hover_style', 'title_decoration', 'title_font_family', 'title_color', 'title_element', 'title_margin']
            ], [
              'label' => 'Meta', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['meta_transition', 'meta_style', 'meta_color', 'meta_align', 'meta_element', 'meta_margin']
            ], [
              'label' => 'Content', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['content_transition', 'content_style', 'content_margin']
            ], [
              'label' => 'Link', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['link_target', 'link_text', 'link_aria_label', 'link_transition', 'link_style', 'link_size', 'link_fullwidth', 'link_margin']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', '_parallax_button', 'visibility', 'container_padding_remove']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ]
];
