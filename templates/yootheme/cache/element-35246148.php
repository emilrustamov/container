<?php // $file = /var/www/u2526582/data/www/container-tm.com/templates/yootheme/packages/builder/elements/gallery/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'gallery', 
  'title' => 'Gallery', 
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
    'grid_default' => '1', 
    'grid_medium' => '3', 
    'filter_style' => 'tab', 
    'filter_all' => true, 
    'filter_position' => 'top', 
    'filter_align' => 'left', 
    'filter_grid_width' => 'auto', 
    'filter_grid_breakpoint' => 'm', 
    'overlay_mode' => 'cover', 
    'overlay_hover' => true, 
    'overlay_style' => 'overlay-primary', 
    'text_color' => 'light', 
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
    'margin' => 'default', 
    'item_animation' => true
  ], 
  'placeholder' => [
    'children' => [[
        'type' => 'gallery_item', 
        'props' => []
      ], [
        'type' => 'gallery_item', 
        'props' => []
      ], [
        'type' => 'gallery_item', 
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
      'item' => 'gallery_item', 
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
    'grid_masonry' => [
      'label' => 'Masonry', 
      'description' => 'Create a gap-free masonry layout if grid items have different heights. Pack items into columns with the most room or show them in their natural order. Optionally, use a parallax animation to move columns while scrolling until they justify at the bottom.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Pack' => 'pack', 
        'Next' => 'next'
      ]
    ], 
    'grid_parallax' => [
      'label' => 'Parallax', 
      'description' => 'The parallax animation moves single grid columns at different speeds while scrolling. Define the vertical parallax offset in pixels. Alternatively, move columns with different heights until they justify at the bottom.', 
      'type' => 'range', 
      'attrs' => [
        'min' => 0, 
        'max' => 600, 
        'step' => 10
      ]
    ], 
    'grid_parallax_justify' => [
      'type' => 'checkbox', 
      'text' => 'Justify columns at the bottom'
    ], 
    'grid_parallax_start' => [
      'enable' => 'grid_parallax || grid_parallax_justify'
    ], 
    'grid_parallax_end' => [
      'enable' => 'grid_parallax || grid_parallax_justify'
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
    'grid_divider' => [
      'label' => 'Divider', 
      'description' => 'Show a divider between grid columns.', 
      'type' => 'checkbox', 
      'text' => 'Show dividers', 
      'enable' => 'grid_column_gap != \'collapse\' && grid_row_gap != \'collapse\''
    ], 
    'grid_column_align' => [
      'label' => 'Alignment', 
      'description' => 'Center grid columns horizontally and rows vertically.', 
      'type' => 'checkbox', 
      'text' => 'Center columns', 
      'enable' => '!grid_masonry'
    ], 
    'grid_row_align' => [
      'type' => 'checkbox', 
      'text' => 'Center rows', 
      'enable' => '!grid_masonry'
    ], 
    'grid_default' => [
      'label' => 'Phone Portrait', 
      'description' => 'Set the number of grid columns for each breakpoint. <i>Inherit</i> refers to the number of columns on the next smaller screen size. <i>Auto</i> expands the columns to the width of their items filling the rows accordingly.', 
      'type' => 'select', 
      'options' => [
        '1 Column' => '1', 
        '2 Columns' => '2', 
        '3 Columns' => '3', 
        '4 Columns' => '4', 
        '5 Columns' => '5', 
        '6 Columns' => '6', 
        'Auto' => 'auto'
      ]
    ], 
    'grid_small' => [
      'label' => 'Phone Landscape', 
      'description' => 'Set the number of grid columns for each breakpoint. <i>Inherit</i> refers to the number of columns on the next smaller screen size. <i>Auto</i> expands the columns to the width of their items filling the rows accordingly.', 
      'type' => 'select', 
      'options' => [
        'Inherit' => '', 
        '1 Column' => '1', 
        '2 Columns' => '2', 
        '3 Columns' => '3', 
        '4 Columns' => '4', 
        '5 Columns' => '5', 
        '6 Columns' => '6', 
        'Auto' => 'auto'
      ]
    ], 
    'grid_medium' => [
      'label' => 'Tablet Landscape', 
      'description' => 'Set the number of grid columns for each breakpoint. <i>Inherit</i> refers to the number of columns on the next smaller screen size. <i>Auto</i> expands the columns to the width of their items filling the rows accordingly.', 
      'type' => 'select', 
      'options' => [
        'Inherit' => '', 
        '1 Column' => '1', 
        '2 Columns' => '2', 
        '3 Columns' => '3', 
        '4 Columns' => '4', 
        '5 Columns' => '5', 
        '6 Columns' => '6', 
        'Auto' => 'auto'
      ]
    ], 
    'grid_large' => [
      'label' => 'Desktop', 
      'description' => 'Set the number of grid columns for each breakpoint. <i>Inherit</i> refers to the number of columns on the next smaller screen size. <i>Auto</i> expands the columns to the width of their items filling the rows accordingly.', 
      'type' => 'select', 
      'options' => [
        'Inherit' => '', 
        '1 Column' => '1', 
        '2 Columns' => '2', 
        '3 Columns' => '3', 
        '4 Columns' => '4', 
        '5 Columns' => '5', 
        '6 Columns' => '6', 
        'Auto' => 'auto'
      ]
    ], 
    'grid_xlarge' => [
      'label' => 'Large Screens', 
      'description' => 'Set the number of grid columns for each breakpoint. <i>Inherit</i> refers to the number of columns on the next smaller screen size. <i>Auto</i> expands the columns to the width of their items filling the rows accordingly.', 
      'type' => 'select', 
      'options' => [
        'Inherit' => '', 
        '1 Column' => '1', 
        '2 Columns' => '2', 
        '3 Columns' => '3', 
        '4 Columns' => '4', 
        '5 Columns' => '5', 
        '6 Columns' => '6', 
        'Auto' => 'auto'
      ]
    ], 
    'filter' => [
      'label' => 'Filter', 
      'type' => 'checkbox', 
      'text' => 'Enable filter navigation'
    ], 
    'filter_animation' => [
      'label' => 'Animation', 
      'description' => 'Select an animation that will be applied to the content items when filtering between them.', 
      'type' => 'select', 
      'options' => [
        'None' => 'false', 
        'Slide' => '', 
        'Fade' => 'fade', 
        'Delayed Fade' => 'delayed-fade'
      ], 
      'enable' => 'filter'
    ], 
    'filter_order' => [
      'label' => 'Navigation Order', 
      'description' => 'Order the filter navigation alphabetically or by defining the order manually.', 
      'type' => 'select', 
      'options' => [
        'Alphabetical' => '', 
        'Manual' => 'manual'
      ], 
      'enable' => 'filter'
    ], 
    'filter_reverse' => [
      'type' => 'checkbox', 
      'text' => 'Reverse order', 
      'enable' => 'filter'
    ], 
    'filter_order_manual' => [
      'label' => 'Manual Order', 
      'description' => 'Enter a comma-separated list of tags to manually order the filter navigation.', 
      'enable' => 'filter && filter_order == \'manual\''
    ], 
    'filter_style' => [
      'label' => 'Style', 
      'description' => 'Select the filter navigation style. The pill and divider styles are only available for horizontal Subnavs.', 
      'type' => 'select', 
      'options' => [
        'Tabs' => 'tab', 
        'Subnav (Nav)' => 'subnav', 
        'Subnav Divider (Nav)' => 'subnav-divider', 
        'Subnav Pill (Nav)' => 'subnav-pill'
      ], 
      'enable' => 'filter'
    ], 
    'filter_all' => [
      'label' => 'All Items', 
      'type' => 'checkbox', 
      'text' => 'Show filter control for all items', 
      'enable' => 'filter'
    ], 
    'filter_all_label' => [
      'attrs' => [
        'placeholder' => 'All'
      ], 
      'enable' => 'filter && filter_all'
    ], 
    'filter_position' => [
      'label' => 'Position', 
      'description' => 'Position the filter navigation at the top, left or right. A larger style can be applied to left and right navigation.', 
      'type' => 'select', 
      'options' => [
        'Top' => 'top', 
        'Left' => 'left', 
        'Right' => 'right'
      ], 
      'enable' => 'filter'
    ], 
    'filter_style_primary' => [
      'type' => 'checkbox', 
      'text' => 'Primary navigation', 
      'enable' => 'filter && $match(filter_position, \'left|right\') && $match(filter_style, \'^subnav\')'
    ], 
    'filter_align' => [
      'label' => 'Alignment', 
      'description' => 'Align the filter controls.', 
      'type' => 'select', 
      'options' => [
        'Left' => 'left', 
        'Right' => 'right', 
        'Center' => 'center', 
        'Justify' => 'justify'
      ], 
      'enable' => 'filter && filter_position == \'top\''
    ], 
    'filter_margin' => [
      'label' => 'Margin', 
      'description' => 'Set the vertical margin.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Default' => '', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge'
      ], 
      'enable' => 'filter && filter_position == \'top\''
    ], 
    'filter_grid_width' => [
      'label' => 'Grid Width', 
      'description' => 'Define the width of the filter navigation. Choose between percent and fixed widths or expand columns to the width of their content.', 
      'type' => 'select', 
      'options' => [
        'Auto' => 'auto', 
        '50%' => '1-2', 
        '33%' => '1-3', 
        '25%' => '1-4', 
        '20%' => '1-5', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large'
      ], 
      'enable' => 'filter && $match(filter_position, \'left|right\')'
    ], 
    'filter_grid_column_gap' => [
      'label' => 'Grid Column Gap', 
      'description' => 'Set the size of the gap between between the filter navigation and the content.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large', 
        'None' => 'collapse'
      ], 
      'enable' => 'filter && $match(filter_position, \'left|right\')'
    ], 
    'filter_grid_row_gap' => [
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
      'enable' => 'filter && $match(filter_position, \'left|right\')'
    ], 
    'filter_grid_breakpoint' => [
      'label' => 'Grid Breakpoint', 
      'description' => 'Set the breakpoint from which grid items will stack.', 
      'type' => 'select', 
      'options' => [
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'filter && $match(filter_position, \'left|right\')'
    ], 
    'lightbox' => [
      'label' => 'Lightbox', 
      'type' => 'checkbox', 
      'text' => 'Enable lightbox gallery'
    ], 
    'lightbox_image_width' => [
      'attrs' => [
        'placeholder' => 'auto'
      ], 
      'enable' => 'lightbox'
    ], 
    'lightbox_image_height' => [
      'attrs' => [
        'placeholder' => 'auto'
      ], 
      'enable' => 'lightbox'
    ], 
    'lightbox_image_orientation' => [
      'label' => 'Image Orientation', 
      'description' => 'Width and height will be flipped accordingly, if the image is in portrait or landscape format.', 
      'type' => 'checkbox', 
      'text' => 'Allow mixed image orientations', 
      'enable' => 'lightbox'
    ], 
    'title_display' => [
      'label' => 'Show Title', 
      'description' => 'Display the title inside the overlay, as the lightbox caption or both.', 
      'type' => 'select', 
      'options' => [
        'Overlay + Lightbox' => '', 
        'Overlay only' => 'item', 
        'Lightbox only' => 'lightbox'
      ], 
      'enable' => 'show_title && lightbox'
    ], 
    'content_display' => [
      'label' => 'Show Content', 
      'description' => 'Display the content inside the overlay, as the lightbox caption or both.', 
      'type' => 'select', 
      'options' => [
        'Overlay + Lightbox' => '', 
        'Overlay only' => 'item', 
        'Lightbox only' => 'lightbox'
      ], 
      'enable' => 'show_content && lightbox'
    ], 
    'item_maxwidth' => [
      'type' => 'select', 
      'label' => 'Max Width', 
      'description' => 'Set the maximum width.', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        '2X-Large' => '2xlarge'
      ]
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
    'overlay_hover' => [
      'type' => 'checkbox', 
      'text' => 'Display overlay on hover'
    ], 
    'overlay_transition_background' => [
      'type' => 'checkbox', 
      'text' => 'Animate background only', 
      'enable' => 'overlay_hover && overlay_mode == \'cover\''
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
      'text' => 'Inverse the text color on hover', 
      'enable' => '!overlay_style && show_hover_image || overlay_style && overlay_mode == \'cover\' && overlay_hover && overlay_transition_background'
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
      'description' => 'Select a transition for the overlay when it appears on hover.', 
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
      'enable' => 'overlay_hover'
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
    'image_orientation' => [
      'label' => 'Image Orientation', 
      'description' => 'Landscape and portrait images are centered within the grid cells. Width and height will be flipped when images are resized.', 
      'type' => 'checkbox', 
      'text' => 'Allow mixed image orientations'
    ], 
    'image_loading' => [
      'label' => 'Loading', 
      'description' => 'By default, images are loaded lazy. Enable eager loading for images in the initial viewport.', 
      'type' => 'checkbox', 
      'text' => 'Load image eagerly'
    ], 
    'image_transition' => [
      'label' => 'Transition', 
      'description' => 'Select an image transition. If the hover image is set, the transition takes place between the two images. If <i>None</i> is selected, the hover image fades in.', 
      'type' => 'select', 
      'options' => [
        'None (Fade if hover image)' => '', 
        'Scale Up' => 'scale-up', 
        'Scale Down' => 'scale-down'
      ]
    ], 
    'image_transition_border' => [
      'type' => 'checkbox', 
      'text' => 'Border'
    ], 
    'image_min_height' => [
      'label' => 'Min Height', 
      'description' => 'Use an optional minimum height to prevent images from becoming smaller than the content on small devices.', 
      'type' => 'range', 
      'attrs' => [
        'min' => 200, 
        'max' => 500, 
        'step' => 20
      ]
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
      'enable' => '!image_transition_border && !image_box_decoration'
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
      ]
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
    'title_transition' => [
      'label' => 'Transition', 
      'description' => 'Select a transition for the title when the overlay appears on hover.', 
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
      'enable' => 'show_title && overlay_hover && (title_display != \'lightbox\' && lightbox || !lightbox)'
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
      'enable' => 'show_title && (title_display != \'lightbox\' && lightbox || !lightbox)'
    ], 
    'title_link' => [
      'label' => 'Link', 
      'description' => 'Link the title if a link exists.', 
      'type' => 'checkbox', 
      'text' => 'Link title', 
      'enable' => 'show_title && (title_display != \'lightbox\' && lightbox || !lightbox) && show_link'
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
      'enable' => 'show_title && (title_display != \'lightbox\' && lightbox || !lightbox) && show_link && (title_link || overlay_link)'
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
      'enable' => 'show_title && (title_display != \'lightbox\' && lightbox || !lightbox)'
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
      'enable' => 'show_title && (title_display != \'lightbox\' && lightbox || !lightbox)'
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
      'enable' => 'show_title && (title_display != \'lightbox\' && lightbox || !lightbox)'
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
      'enable' => 'show_title && (title_display != \'lightbox\' && lightbox || !lightbox)'
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
      'enable' => 'show_title && (title_display != \'lightbox\' && lightbox || !lightbox)'
    ], 
    'meta_transition' => [
      'label' => 'Transition', 
      'description' => 'Select a transition for the meta text when the overlay appears on hover.', 
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
      'enable' => 'show_meta && overlay_hover'
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
      'description' => 'Select a transition for the content when the overlay appears on hover.', 
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
      'enable' => 'show_content && overlay_hover && (content_display != \'lightbox\' && lightbox || !lightbox)'
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
      'enable' => 'show_content && (content_display != \'lightbox\' && lightbox || !lightbox)'
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
      'enable' => 'show_content && (content_display != \'lightbox\' && lightbox || !lightbox)'
    ], 
    'link_target' => [
      'label' => 'Target', 
      'type' => 'checkbox', 
      'text' => 'Open in a new window', 
      'enable' => 'show_link && !lightbox'
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
      'description' => 'Select a transition for the link when the overlay appears on hover.', 
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
      'enable' => 'show_link && overlay_hover'
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
    'item_animation' => $config->get('builder.item_animation'), 
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
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-nav</code>, <code>.el-item</code>, <code>.el-image</code>, <code>.el-title</code>, <code>.el-meta</code>, <code>.el-content</code>, <code>.el-link</code>, <code>.el-hover-image</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500, 
        'hints' => ['.el-element', '.el-nav', '.el-item', '.el-image', '.el-title', '.el-meta', '.el-content', '.el-link', '.el-hover-image']
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
              'label' => 'Gallery', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['grid_masonry', 'grid_parallax', 'grid_parallax_justify', [
                  'label' => 'Parallax Start/End', 
                  'description' => 'The animation starts when the element enters the viewport and ends when it leaves the viewport. Optionally, set a start and end offset, e.g. <code>100px</code>, <code>50vh</code> or <code>50vh + 50%</code>. Percent relates to the element\'s height.', 
                  'type' => 'grid', 
                  'width' => '1-2', 
                  'fields' => ['grid_parallax_start', 'grid_parallax_end']
                ], 'grid_column_gap', 'grid_row_gap', 'grid_divider', 'grid_column_align', 'grid_row_align']
            ], [
              'label' => 'Columns', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['grid_default', 'grid_small', 'grid_medium', 'grid_large', 'grid_xlarge']
            ], [
              'label' => 'Filter', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['filter', 'filter_animation', 'filter_order', 'filter_reverse', 'filter_order_manual', 'filter_style', 'filter_all', 'filter_all_label', 'filter_position', 'filter_style_primary', 'filter_align', 'filter_margin', 'filter_grid_width', 'filter_grid_column_gap', 'filter_grid_row_gap', 'filter_grid_breakpoint']
            ], [
              'label' => 'Lightbox', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['lightbox', [
                  'label' => 'Image Width/Height', 
                  'description' => 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically, and where possible, high resolution images will be auto-generated.', 
                  'type' => 'grid', 
                  'width' => '1-2', 
                  'fields' => ['lightbox_image_width', 'lightbox_image_height']
                ], 'lightbox_image_orientation', 'title_display', 'content_display']
            ], [
              'label' => 'Item', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['item_maxwidth']
            ], [
              'label' => 'Overlay', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['overlay_mode', 'overlay_hover', 'overlay_transition_background', 'overlay_style', 'text_color', 'text_color_hover', 'overlay_padding', 'overlay_position', 'overlay_margin', 'overlay_maxwidth', 'overlay_transition', 'overlay_link']
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
                ], 'image_orientation', 'image_loading', 'image_transition', 'image_transition_border', 'image_min_height', 'image_border', 'image_box_shadow', 'image_hover_box_shadow', 'image_box_decoration', 'image_box_decoration_inverse']
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
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', 'item_animation', '_parallax_button', 'visibility', 'container_padding_remove']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ]
];
