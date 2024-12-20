<?php // $file = /var/www/u2526582/data/www/container-tm.com/templates/yootheme/packages/builder/elements/slideshow/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'slideshow', 
  'title' => 'Slideshow', 
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
    'show_thumbnail' => true, 
    'slideshow_min_height' => 300, 
    'slideshow_autoplay_pause' => true, 
    'nav' => 'dotnav', 
    'nav_position' => 'bottom-center', 
    'nav_position_margin' => 'medium', 
    'nav_align' => 'center', 
    'nav_breakpoint' => 's', 
    'thumbnav_width' => '100', 
    'thumbnav_height' => '75', 
    'thumbnav_svg_color' => 'emphasis', 
    'slidenav' => 'default', 
    'slidenav_margin' => 'medium', 
    'slidenav_breakpoint' => 's', 
    'slidenav_outside_breakpoint' => 'xl', 
    'overlay_position' => 'center-left', 
    'overlay_animation' => 'parallax', 
    'title_element' => 'h3', 
    'meta_style' => 'text-meta', 
    'meta_align' => 'below-title', 
    'meta_element' => 'div', 
    'link_text' => 'Read more', 
    'link_style' => 'default', 
    'margin' => 'default'
  ], 
  'placeholder' => [
    'children' => [[
        'type' => 'slideshow_item', 
        'props' => []
      ], [
        'type' => 'slideshow_item', 
        'props' => []
      ], [
        'type' => 'slideshow_item', 
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
      'item' => 'slideshow_item', 
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
    'show_thumbnail' => [
      'description' => 'Show or hide content fields without the need to delete the content itself.', 
      'type' => 'checkbox', 
      'text' => 'Show the navigation thumbnail instead of the image'
    ], 
    'slideshow_height' => [
      'type' => 'select', 
      'options' => [
        'Auto' => '', 
        'Viewport' => 'viewport', 
        'Viewport (Subtract Next Section)' => 'section'
      ]
    ], 
    'slideshow_height_viewport' => [
      'type' => 'number', 
      'attrs' => [
        'placeholder' => '100', 
        'min' => 0, 
        'max' => 100, 
        'step' => 10, 
        'class' => 'uk-form-width-xsmall'
      ], 
      'enable' => 'slideshow_height == \'viewport\''
    ], 
    'slideshow_height_offset_top' => [
      'type' => 'checkbox', 
      'text' => 'Subtract height above', 
      'enable' => 'slideshow_height == \'viewport\' && (slideshow_height_viewport || 0) <= 100 || slideshow_height == \'section\''
    ], 
    'slideshow_ratio' => [
      'label' => 'Ratio', 
      'description' => 'Set the slideshow ratio. It\'s recommended to use the same ratio as the image or video file. Simply use its width and height, e.g. <code>1600:900</code>.', 
      'attrs' => [
        'placeholder' => '16:9'
      ], 
      'enable' => '!slideshow_height'
    ], 
    'slideshow_min_height' => [
      'label' => 'Min Height', 
      'description' => 'Use an optional minimum height to prevent the slideshow from becoming smaller than its content on small devices.', 
      'type' => 'range', 
      'attrs' => [
        'min' => 200, 
        'max' => 800, 
        'step' => 50
      ]
    ], 
    'slideshow_max_height' => [
      'label' => 'Max Height', 
      'description' => 'Set the maximum height.', 
      'type' => 'range', 
      'attrs' => [
        'min' => 500, 
        'max' => 1600, 
        'step' => 50
      ], 
      'enable' => '!slideshow_height'
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
    'slideshow_box_shadow' => [
      'label' => 'Box Shadow', 
      'description' => 'Select the slideshow box shadow size.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge'
      ]
    ], 
    'slideshow_box_decoration' => [
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
    'slideshow_box_decoration_inverse' => [
      'type' => 'checkbox', 
      'text' => 'Inverse style', 
      'enable' => '$match(slideshow_box_decoration, \'^(default|primary|secondary)$\')'
    ], 
    'slideshow_animation' => [
      'label' => 'Transition', 
      'description' => 'Select the transition between two slides.', 
      'type' => 'select', 
      'options' => [
        'Slide' => '', 
        'Pull' => 'pull', 
        'Push' => 'push', 
        'Fade' => 'fade', 
        'Scale' => 'scale'
      ]
    ], 
    'slideshow_velocity' => [
      'label' => 'Velocity', 
      'description' => 'Set the velocity in pixels per millisecond.', 
      'type' => 'range', 
      'attrs' => [
        'min' => 0.2, 
        'max' => 3, 
        'step' => 0.1, 
        'placeholder' => '1'
      ], 
      'enable' => '!slideshow_parallax'
    ], 
    'slideshow_autoplay' => [
      'label' => 'Autoplay', 
      'type' => 'checkbox', 
      'text' => 'Enable autoplay', 
      'enable' => '!slideshow_parallax'
    ], 
    'slideshow_autoplay_pause' => [
      'type' => 'checkbox', 
      'text' => 'Pause autoplay on hover', 
      'enable' => '!slideshow_parallax && slideshow_autoplay'
    ], 
    'slideshow_autoplay_interval' => [
      'label' => 'Autoplay Interval', 
      'description' => 'Set the autoplay interval in seconds.', 
      'type' => 'range', 
      'attrs' => [
        'min' => 5, 
        'max' => 15, 
        'step' => 1, 
        'placeholder' => '7'
      ], 
      'enable' => '!slideshow_parallax && slideshow_autoplay'
    ], 
    'slideshow_parallax' => [
      'label' => 'Parallax', 
      'description' => 'Add a stepless parallax animation based on the scroll position.', 
      'type' => 'checkbox', 
      'text' => 'Enable parallax effect'
    ], 
    'slideshow_parallax_easing' => [
      'label' => 'Parallax Easing', 
      'description' => 'Set the animation easing. Zero transitions at an even speed, a negative value starts off quickly while a positive value starts off slowly.', 
      'type' => 'range', 
      'attrs' => [
        'min' => -2, 
        'max' => 2, 
        'step' => 0.1
      ], 
      'enable' => 'slideshow_parallax'
    ], 
    'slideshow_parallax_target' => [
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
      'enable' => 'slideshow_parallax'
    ], 
    'slideshow_parallax_start' => [
      'enable' => 'slideshow_parallax'
    ], 
    'slideshow_parallax_end' => [
      'enable' => 'slideshow_parallax'
    ], 
    'slideshow_kenburns' => [
      'label' => 'Ken Burns Effect', 
      'description' => 'Select the transformation origin for the Ken Burns animation.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Alternate' => 'alternate', 
        'Top Left' => 'top-left', 
        'Top Center' => 'top-center', 
        'Top Right' => 'top-right', 
        'Center Left' => 'center-left', 
        'Center Center' => 'center-center', 
        'Center Right' => 'center-right', 
        'Bottom Left' => 'bottom-left', 
        'Bottom Center' => 'bottom-center', 
        'Bottom Right' => 'bottom-right'
      ]
    ], 
    'slideshow_kenburns_duration' => [
      'label' => 'Ken Burns Duration', 
      'description' => 'Set the duration for the Ken Burns effect in seconds.', 
      'type' => 'range', 
      'attrs' => [
        'min' => 10, 
        'max' => 30, 
        'step' => 1, 
        'placeholder' => '15'
      ], 
      'enable' => 'slideshow_kenburns'
    ], 
    'nav' => [
      'label' => 'Navigation', 
      'description' => 'Select the navigation type.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Dotnav' => 'dotnav', 
        'Thumbnav' => 'thumbnav'
      ]
    ], 
    'nav_below' => [
      'type' => 'checkbox', 
      'text' => 'Show below slideshow', 
      'enable' => 'nav'
    ], 
    'nav_vertical' => [
      'type' => 'checkbox', 
      'text' => 'Vertical navigation', 
      'enable' => 'nav && !nav_below'
    ], 
    'nav_position' => [
      'label' => 'Position', 
      'description' => 'Select the position of the navigation.', 
      'type' => 'select', 
      'options' => [
        'Top Left' => 'top-left', 
        'Top Right' => 'top-right', 
        'Center Left' => 'center-left', 
        'Center Right' => 'center-right', 
        'Bottom Left' => 'bottom-left', 
        'Bottom Center' => 'bottom-center', 
        'Bottom Right' => 'bottom-right'
      ], 
      'show' => 'nav && !nav_below'
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
      'show' => 'nav && nav_below'
    ], 
    'nav_position_margin' => [
      'label' => 'Margin', 
      'description' => 'Apply a margin between the navigation and the slideshow container.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large'
      ], 
      'show' => 'nav && !nav_below'
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
      'show' => 'nav && nav_below'
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
      'description' => 'Set light or dark color if the navigation is below the slideshow.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ], 
      'enable' => 'nav && nav_below'
    ], 
    'thumbnav_width' => [
      'attrs' => [
        'placeholder' => 'auto'
      ], 
      'enable' => 'nav == \'thumbnav\' && show_thumbnail'
    ], 
    'thumbnav_height' => [
      'attrs' => [
        'placeholder' => 'auto'
      ], 
      'enable' => 'nav == \'thumbnav\' && show_thumbnail'
    ], 
    'thumbnav_nowrap' => [
      'label' => 'Thumbnav Wrap', 
      'description' => 'Define whether thumbnails wrap into multiple lines if the container is too small.', 
      'type' => 'checkbox', 
      'text' => 'Don\'t wrap into multiple lines', 
      'enable' => 'nav == \'thumbnav\' && show_thumbnail'
    ], 
    'thumbnav_svg_inline' => [
      'label' => 'Thumbnav Inline SVG', 
      'description' => 'Inject SVG images into the page markup so that they can easily be styled with CSS.', 
      'type' => 'checkbox', 
      'text' => 'Make SVG stylable with CSS', 
      'enable' => 'nav == \'thumbnav\' && show_thumbnail'
    ], 
    'thumbnav_svg_color' => [
      'label' => 'Thumbnav SVG Color', 
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
      'enable' => 'nav == \'thumbnav\' && show_thumbnail && thumbnav_svg_inline'
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
      ]
    ], 
    'slidenav_hover' => [
      'type' => 'checkbox', 
      'text' => 'Show on hover only', 
      'enable' => 'slidenav'
    ], 
    'slidenav_large' => [
      'type' => 'checkbox', 
      'text' => 'Larger style', 
      'enable' => 'slidenav'
    ], 
    'slidenav_margin' => [
      'label' => 'Margin', 
      'description' => 'Apply a margin between the slidenav and the slideshow container.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large'
      ], 
      'enable' => 'slidenav'
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
      'enable' => 'slidenav'
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
      'enable' => 'slidenav == \'outside\''
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
      'enable' => 'slidenav == \'outside\''
    ], 
    'overlay_container' => [
      'label' => 'Container Width', 
      'description' => 'Set the maximum content width. Note: The section may already have a maximum width, which you cannot exceed.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Default' => 'default', 
        'Small' => 'small', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        'Expand' => 'expand'
      ]
    ], 
    'overlay_container_padding' => [
      'label' => 'Container Padding', 
      'description' => 'Set the vertical container padding to position the overlay.', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'X-Small' => 'xsmall', 
        'Small' => 'small', 
        'Large' => 'large', 
        'X-Large' => 'xlarge'
      ], 
      'enable' => 'overlay_container'
    ], 
    'overlay_margin' => [
      'label' => 'Margin', 
      'description' => 'Set the margin between the overlay and the slideshow container.', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'Small' => 'small', 
        'Large' => 'large', 
        'None' => 'none'
      ], 
      'enable' => '!overlay_container'
    ], 
    'overlay_position' => [
      'label' => 'Position', 
      'description' => 'Select the content position.', 
      'type' => 'select', 
      'options' => [
        'Top' => 'top', 
        'Bottom' => 'bottom', 
        'Left' => 'left', 
        'Right' => 'right', 
        'Top Left' => 'top-left', 
        'Top Center' => 'top-center', 
        'Top Right' => 'top-right', 
        'Center Left' => 'center-left', 
        'Center Center' => 'center', 
        'Center Right' => 'center-right', 
        'Bottom Left' => 'bottom-left', 
        'Bottom Center' => 'bottom-center', 
        'Bottom Right' => 'bottom-right'
      ]
    ], 
    'overlay_style' => [
      'label' => 'Style', 
      'description' => 'Select a style for the overlay.', 
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
    'overlay_padding' => [
      'label' => 'Padding', 
      'description' => 'Set the padding between the overlay and its content.', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'Small' => 'small', 
        'Large' => 'large'
      ], 
      'enable' => 'overlay_style'
    ], 
    'overlay_width' => [
      'label' => 'Width', 
      'description' => 'Set a fixed width.', 
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
    'overlay_animation' => [
      'label' => 'Animation', 
      'description' => 'Choose between a parallax depending on the scroll position or an animation, which is applied once the slide is active.', 
      'type' => 'select', 
      'options' => [
        'Parallax' => 'parallax', 
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
      ]
    ], 
    '_slideshow_overlay_parallax' => [
      'type' => 'button-panel', 
      'panel' => 'builder-slideshow-overlay-parallax', 
      'text' => 'Edit Settings', 
      'enable' => 'overlay_animation == \'parallax\''
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
    '_title_parallax' => [
      'label' => 'Parallax', 
      'description' => 'Add a parallax effect.', 
      'type' => 'button-panel', 
      'panel' => 'builder-slideshow-title-parallax', 
      'text' => 'Edit Settings', 
      'enable' => 'overlay_animation == \'parallax\''
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
    '_meta_parallax' => [
      'label' => 'Parallax', 
      'description' => 'Add a parallax effect.', 
      'type' => 'button-panel', 
      'panel' => 'builder-slideshow-meta-parallax', 
      'text' => 'Edit Settings', 
      'enable' => 'overlay_animation == \'parallax\''
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
    '_content_parallax' => [
      'label' => 'Parallax', 
      'description' => 'Add a parallax effect.', 
      'type' => 'button-panel', 
      'panel' => 'builder-slideshow-content-parallax', 
      'text' => 'Edit Settings', 
      'enable' => 'overlay_animation == \'parallax\''
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
    '_link_parallax' => [
      'label' => 'Parallax', 
      'description' => 'Add a parallax effect.', 
      'type' => 'button-panel', 
      'panel' => 'builder-slideshow-link-parallax', 
      'text' => 'Edit Settings', 
      'enable' => 'overlay_animation == \'parallax\''
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
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-item</code>, <code>.el-nav</code>, <code>.el-slidenav</code>, <code>.el-image</code>, <code>.el-overlay</code>, <code>.el-title</code>, <code>.el-meta</code>, <code>.el-content</code>, <code>.el-link</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500, 
        'hints' => ['.el-element', '.el-item', '.el-nav', '.el-slidenav', '.el-image', '.el-overlay', '.el-title', '.el-meta', '.el-content', '.el-link']
      ]
    ], 
    'transform' => $config->get('builder.transform')
  ], 
  'fieldset' => [
    'default' => [
      'type' => 'tabs', 
      'fields' => [[
          'title' => 'Content', 
          'fields' => ['content', 'show_title', 'show_meta', 'show_content', 'show_link', 'show_thumbnail']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Slideshow', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => [[
                  'label' => 'Height', 
                  'description' => 'The slideshow always takes up full width, and the height will adapt automatically based on the defined ratio. Alternatively, the height can adapt to the height of the viewport. <br><br>Note: Make sure no height is set in the section settings when using one of the viewport options.', 
                  'name' => '_slideshow_height', 
                  'type' => 'grid', 
                  'width' => 'expand,auto', 
                  'gap' => 'small', 
                  'fields' => ['slideshow_height', 'slideshow_height_viewport']
                ], 'slideshow_height_offset_top', 'slideshow_ratio', 'slideshow_min_height', 'slideshow_max_height', 'text_color', 'slideshow_box_shadow', 'slideshow_box_decoration', 'slideshow_box_decoration_inverse']
            ], [
              'label' => 'Animation', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['slideshow_animation', 'slideshow_velocity', 'slideshow_autoplay', 'slideshow_autoplay_pause', 'slideshow_autoplay_interval', 'slideshow_parallax', 'slideshow_parallax_easing', 'slideshow_parallax_target', [
                  'label' => 'Parallax Start/End', 
                  'description' => 'The animation starts when the element enters the viewport and ends when it leaves the viewport. Optionally, set a start and end offset, e.g. <code>100px</code>, <code>50vh</code> or <code>50vh + 50%</code>. Percent relates to the target\'s height.', 
                  'type' => 'grid', 
                  'width' => '1-2', 
                  'fields' => ['slideshow_parallax_start', 'slideshow_parallax_end']
                ], 'slideshow_kenburns', 'slideshow_kenburns_duration']
            ], [
              'label' => 'Navigation', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['nav', 'nav_below', 'nav_vertical', 'nav_position', 'nav_align', 'nav_position_margin', 'nav_margin', 'nav_breakpoint', 'nav_color', [
                  'label' => 'Thumbnail Width/Height', 
                  'description' => 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically, and where possible, high resolution images will be auto-generated.', 
                  'type' => 'grid', 
                  'width' => '1-2', 
                  'fields' => ['thumbnav_width', 'thumbnav_height']
                ], 'thumbnav_nowrap', 'thumbnav_svg_inline', 'thumbnav_svg_color']
            ], [
              'label' => 'Slidenav', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['slidenav', 'slidenav_hover', 'slidenav_large', 'slidenav_margin', 'slidenav_breakpoint', 'slidenav_outside_breakpoint', 'slidenav_outside_color']
            ], [
              'label' => 'Overlay', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['overlay_container', 'overlay_container_padding', 'overlay_margin', 'overlay_position', 'overlay_style', 'overlay_padding', 'overlay_width', 'overlay_animation', '_slideshow_overlay_parallax']
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
                ], 'image_loading']
            ], [
              'label' => 'Title', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['title_style', 'title_decoration', 'title_font_family', 'title_color', 'title_element', 'title_margin', '_title_parallax']
            ], [
              'label' => 'Meta', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['meta_style', 'meta_color', 'meta_align', 'meta_element', 'meta_margin', '_meta_parallax']
            ], [
              'label' => 'Content', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['content_style', 'content_margin', '_content_parallax']
            ], [
              'label' => 'Link', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['link_text', 'link_target', 'link_style', 'link_size', 'link_fullwidth', 'link_margin', '_link_parallax']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', '_parallax_button', 'visibility', 'container_padding_remove']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ], 
  'panels' => [
    'builder-slideshow-overlay-parallax' => [
      'title' => 'Overlay Parallax', 
      'width' => 500, 
      'fields' => [
        'overlay_parallax_x' => [
          'text' => 'Translate X', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => -600, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'overlay_parallax_y' => [
          'text' => 'Translate Y', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => -600, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'overlay_parallax_scale' => [
          'text' => 'Scale', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0.3, 
            'max' => 4, 
            'step' => 0.1
          ]
        ], 
        'overlay_parallax_rotate' => [
          'text' => 'Rotate', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0, 
            'max' => 360, 
            'step' => 10
          ]
        ], 
        'overlay_parallax_opacity' => [
          'text' => 'Opacity', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0, 
            'max' => 1, 
            'step' => 0.1
          ]
        ]
      ], 
      'fieldset' => [
        'default' => [
          'fields' => ['overlay_parallax_x', 'overlay_parallax_y', 'overlay_parallax_scale', 'overlay_parallax_rotate', 'overlay_parallax_opacity']
        ]
      ]
    ], 
    'builder-slideshow-title-parallax' => [
      'title' => 'Title Parallax', 
      'width' => 500, 
      'fields' => [
        'title_parallax_x' => [
          'text' => 'Translate X', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => -600, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'title_parallax_y' => [
          'text' => 'Translate Y', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => -600, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'title_parallax_scale' => [
          'text' => 'Scale', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0.3, 
            'max' => 4, 
            'step' => 0.1
          ]
        ], 
        'title_parallax_rotate' => [
          'text' => 'Rotate', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0, 
            'max' => 360, 
            'step' => 10
          ]
        ], 
        'title_parallax_opacity' => [
          'text' => 'Opacity', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0, 
            'max' => 1, 
            'step' => 0.1
          ]
        ]
      ], 
      'fieldset' => [
        'default' => [
          'fields' => ['title_parallax_x', 'title_parallax_y', 'title_parallax_scale', 'title_parallax_rotate', 'title_parallax_opacity']
        ]
      ]
    ], 
    'builder-slideshow-meta-parallax' => [
      'title' => 'Meta Parallax', 
      'width' => 500, 
      'fields' => [
        'meta_parallax_x' => [
          'text' => 'Translate X', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => -600, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'meta_parallax_y' => [
          'text' => 'Translate Y', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => -600, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'meta_parallax_scale' => [
          'text' => 'Scale', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0.3, 
            'max' => 4, 
            'step' => 0.1
          ]
        ], 
        'meta_parallax_rotate' => [
          'text' => 'Rotate', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0, 
            'max' => 360, 
            'step' => 10
          ]
        ], 
        'meta_parallax_opacity' => [
          'text' => 'Opacity', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0, 
            'max' => 1, 
            'step' => 0.1
          ]
        ]
      ], 
      'fieldset' => [
        'default' => [
          'fields' => ['meta_parallax_x', 'meta_parallax_y', 'meta_parallax_scale', 'meta_parallax_rotate', 'meta_parallax_opacity']
        ]
      ]
    ], 
    'builder-slideshow-content-parallax' => [
      'title' => 'Content Parallax', 
      'width' => 500, 
      'fields' => [
        'content_parallax_x' => [
          'text' => 'Translate X', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => -600, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'content_parallax_y' => [
          'text' => 'Translate Y', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => -600, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'content_parallax_scale' => [
          'text' => 'Scale', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0.3, 
            'max' => 4, 
            'step' => 0.1
          ]
        ], 
        'content_parallax_rotate' => [
          'text' => 'Rotate', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0, 
            'max' => 360, 
            'step' => 10
          ]
        ], 
        'content_parallax_opacity' => [
          'text' => 'Opacity', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0, 
            'max' => 1, 
            'step' => 0.1
          ]
        ]
      ], 
      'fieldset' => [
        'default' => [
          'fields' => ['content_parallax_x', 'content_parallax_y', 'content_parallax_scale', 'content_parallax_rotate', 'content_parallax_opacity']
        ]
      ]
    ], 
    'builder-slideshow-link-parallax' => [
      'title' => 'Link Parallax', 
      'width' => 500, 
      'fields' => [
        'link_parallax_x' => [
          'text' => 'Translate X', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => -600, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'link_parallax_y' => [
          'text' => 'Translate Y', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => -600, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'link_parallax_scale' => [
          'text' => 'Scale', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0.3, 
            'max' => 4, 
            'step' => 0.1
          ]
        ], 
        'link_parallax_rotate' => [
          'text' => 'Rotate', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0, 
            'max' => 360, 
            'step' => 10
          ]
        ], 
        'link_parallax_opacity' => [
          'text' => 'Opacity', 
          'type' => 'parallax-stops', 
          'attrs' => [
            'min' => 0, 
            'max' => 1, 
            'step' => 0.1
          ]
        ]
      ], 
      'fieldset' => [
        'default' => [
          'fields' => ['link_parallax_x', 'link_parallax_y', 'link_parallax_scale', 'link_parallax_rotate', 'link_parallax_opacity']
        ]
      ]
    ]
  ]
];
