<?php // $file = D:/OpenServer/domains/container/container/templates/yootheme/packages/builder/elements/grid/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'grid', 
  'title' => 'Grid', 
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
    'grid_default' => '1', 
    'grid_medium' => '3', 
    'filter_style' => 'tab', 
    'filter_all' => true, 
    'filter_position' => 'top', 
    'filter_align' => 'left', 
    'filter_grid_width' => 'auto', 
    'filter_grid_breakpoint' => 'm', 
    'title_hover_style' => 'reset', 
    'title_element' => 'h3', 
    'title_align' => 'top', 
    'title_grid_width' => '1-2', 
    'title_grid_breakpoint' => 'm', 
    'meta_style' => 'text-meta', 
    'meta_align' => 'below-title', 
    'meta_element' => 'div', 
    'content_column_breakpoint' => 'm', 
    'icon_width' => 80, 
    'image_align' => 'top', 
    'image_grid_width' => '1-2', 
    'image_grid_breakpoint' => 'm', 
    'image_svg_color' => 'emphasis', 
    'link_text' => 'Read more', 
    'link_style' => 'default', 
    'margin' => 'default', 
    'item_animation' => true
  ], 
  'placeholder' => [
    'children' => [[
        'type' => 'grid_item', 
        'props' => []
      ], [
        'type' => 'grid_item', 
        'props' => []
      ], [
        'type' => 'grid_item', 
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
      'item' => 'grid_item', 
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
    'show_image' => [
      'type' => 'checkbox', 
      'text' => 'Show the image'
    ], 
    'show_link' => [
      'description' => 'Show or hide content fields without the need to delete the content itself.', 
      'type' => 'checkbox', 
      'text' => 'Show the link'
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
      'type' => 'checkbox', 
      'text' => 'Center columns', 
      'enable' => '!grid_masonry'
    ], 
    'grid_row_align' => [
      'description' => 'Center grid columns horizontally and rows vertically.', 
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
      'description' => 'Display the title inside the panel, as the lightbox caption or both.', 
      'type' => 'select', 
      'options' => [
        'Panel + Lightbox' => '', 
        'Panel only' => 'item', 
        'Lightbox only' => 'lightbox'
      ], 
      'enable' => 'show_title && lightbox'
    ], 
    'content_display' => [
      'label' => 'Show Content', 
      'description' => 'Display the content inside the panel, as the lightbox caption or both.', 
      'type' => 'select', 
      'options' => [
        'Panel + Lightbox' => '', 
        'Panel only' => 'item', 
        'Lightbox only' => 'lightbox'
      ], 
      'enable' => 'show_content && lightbox'
    ], 
    'panel_style' => [
      'label' => 'Style', 
      'description' => 'Select one of the boxed card or tile styles or a blank panel.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Card Default' => 'card-default', 
        'Card Primary' => 'card-primary', 
        'Card Secondary' => 'card-secondary', 
        'Card Hover' => 'card-hover', 
        'Tile Default' => 'tile-default', 
        'Tile Muted' => 'tile-muted', 
        'Tile Primary' => 'tile-primary', 
        'Tile Secondary' => 'tile-secondary', 
        'Tile Checked' => 'tile-checked'
      ]
    ], 
    'panel_link' => [
      'label' => 'Link', 
      'description' => 'Link the whole panel if a link exists.', 
      'type' => 'checkbox', 
      'text' => 'Link panel', 
      'enable' => 'show_link'
    ], 
    'panel_padding' => [
      'label' => 'Padding', 
      'description' => 'Set the padding.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Default' => 'default', 
        'Large' => 'large'
      ], 
      'enable' => 'panel_style || (!panel_style && show_image && image_align != \'between\')'
    ], 
    'panel_image_no_padding' => [
      'description' => 'Top, left or right aligned images can be attached to the panel edge. If the image is aligned to the left or right, it will also extend to cover the whole space.', 
      'type' => 'checkbox', 
      'text' => 'Align image without padding', 
      'show' => 'panel_style', 
      'enable' => 'show_image && image_align != \'between\''
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
    'panel_content_width' => [
      'label' => '1 Column Content Width', 
      'description' => 'Set an optional content width which doesn\'t affect the image if there is just one column.', 
      'type' => 'select', 
      'options' => [
        'Auto' => '', 
        'X-Small' => 'xsmall', 
        'Small' => 'small'
      ], 
      'show' => '!panel_style', 
      'enable' => 'show_image && image_align == \'top\' && !panel_padding && !item_maxwidth && (!grid_default || grid_default == \'1\') && (!grid_small || grid_small == \'1\') && (!grid_medium || grid_medium == \'1\') && (!grid_large || grid_large == \'1\') && (!grid_xlarge || grid_xlarge == \'1\')'
    ], 
    'panel_expand' => [
      'label' => 'Expand Content', 
      'description' => 'Expand the height of the content to fill the available space in the panel and push the link to the bottom.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Image' => 'image', 
        'Content' => 'content'
      ], 
      'enable' => '!grid_masonry'
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
      'enable' => 'show_title && (title_display != \'lightbox\' && lightbox || !lightbox) && show_link && (title_link || panel_link)'
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
    'title_align' => [
      'label' => 'Alignment', 
      'description' => 'Align the title to the top or left in regards to the content.', 
      'type' => 'select', 
      'options' => [
        'Top' => 'top', 
        'Left' => 'left'
      ], 
      'enable' => 'show_title && (title_display != \'lightbox\' && lightbox || !lightbox)'
    ], 
    'title_grid_width' => [
      'label' => 'Grid Width', 
      'description' => 'Define the width of the title within the grid. Choose between percent and fixed widths or expand columns to the width of their content.', 
      'type' => 'select', 
      'options' => [
        'Auto' => 'auto', 
        'Expand' => 'expand', 
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
      'enable' => 'show_title && (title_display != \'lightbox\' && lightbox || !lightbox) && title_align == \'left\''
    ], 
    'title_grid_column_gap' => [
      'label' => 'Grid Column Gap', 
      'description' => 'Set the size of the gap between the title and the content.', 
      'type' => 'select', 
      'options' => [
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Default' => '', 
        'Large' => 'large', 
        'None' => 'collapse'
      ], 
      'enable' => 'show_title && (title_display != \'lightbox\' && lightbox || !lightbox) && title_align == \'left\''
    ], 
    'title_grid_row_gap' => [
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
      'enable' => 'show_title && (title_display != \'lightbox\' && lightbox || !lightbox) && title_align == \'left\''
    ], 
    'title_grid_breakpoint' => [
      'label' => 'Grid Breakpoint', 
      'description' => 'Set the breakpoint from which grid items will stack.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'show_title && (title_display != \'lightbox\' && lightbox || !lightbox) && title_align == \'left\''
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
        'Above Content' => 'above-content', 
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
    'content_align' => [
      'label' => 'Alignment', 
      'type' => 'checkbox', 
      'text' => 'Force left alignment', 
      'enable' => 'show_content && (content_display != \'lightbox\' && lightbox || !lightbox)'
    ], 
    'content_dropcap' => [
      'label' => 'Drop Cap', 
      'description' => 'Display the first letter of the paragraph as a large initial.', 
      'type' => 'checkbox', 
      'text' => 'Enable drop cap', 
      'enable' => 'show_content && (content_display != \'lightbox\' && lightbox || !lightbox)'
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
      ], 
      'enable' => 'show_content && (content_display != \'lightbox\' && lightbox || !lightbox)'
    ], 
    'content_column_divider' => [
      'description' => 'Show a divider between text columns.', 
      'type' => 'checkbox', 
      'text' => 'Show dividers', 
      'enable' => 'show_content && (content_display != \'lightbox\' && lightbox || !lightbox) && content_column'
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
      'enable' => 'show_content && (content_display != \'lightbox\' && lightbox || !lightbox) && content_column'
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
      'enable' => 'show_image && (!panel_style || (panel_style && (!panel_image_no_padding || image_align == \'between\')))'
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
      'enable' => 'show_image && !panel_style'
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
      ], 
      'enable' => 'show_image && !panel_style'
    ], 
    'image_box_decoration_inverse' => [
      'type' => 'checkbox', 
      'text' => 'Inverse style', 
      'enable' => 'show_image && !panel_style && $match(image_box_decoration, \'^(default|primary|secondary)$\')'
    ], 
    'image_link' => [
      'label' => 'Link', 
      'description' => 'Link the image if a link exists.', 
      'type' => 'checkbox', 
      'text' => 'Link image', 
      'enable' => 'show_image && show_link'
    ], 
    'image_transition' => [
      'label' => 'Hover Transition', 
      'description' => 'Set the hover transition for a linked image.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Scale Up' => 'scale-up', 
        'Scale Down' => 'scale-down'
      ], 
      'enable' => 'show_image && show_link && (image_link || panel_link)'
    ], 
    'image_transition_border' => [
      'type' => 'checkbox', 
      'text' => 'Border', 
      'enable' => 'show_image && show_link && (image_link || panel_link)'
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
      'enable' => 'show_link && show_image && !panel_style && (image_link || panel_link)'
    ], 
    'icon_width' => [
      'label' => 'Icon Width', 
      'description' => 'Set the icon width.', 
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
    'image_align' => [
      'label' => 'Alignment', 
      'description' => 'Align the image to the top, left, right or place it between the title and the content.', 
      'type' => 'select', 
      'options' => [
        'Top' => 'top', 
        'Bottom' => 'bottom', 
        'Left' => 'left', 
        'Right' => 'right', 
        'Between' => 'between'
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
      'enable' => 'show_image && $match(image_align, \'left|right\') && !(panel_image_no_padding && panel_style)'
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
      'enable' => 'show_image && $match(image_align, \'left|right\') && !(panel_image_no_padding && panel_style)'
    ], 
    'image_grid_breakpoint' => [
      'label' => 'Grid Breakpoint', 
      'description' => 'Set the breakpoint from which grid items will stack.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
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
      'enable' => 'show_image && (image_align == \'between\' || (image_align == \'bottom\' && !(panel_style && panel_image_no_padding)))'
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
    'image_text_color' => [
      'label' => 'Text Color', 
      'description' => 'Set light or dark color mode for text, buttons and controls if a sticky transparent navbar is displayed above.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ], 
      'source' => true, 
      'enable' => 'show_image'
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
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-nav</code>, <code>.el-item</code>, <code>.el-title</code>, <code>.el-meta</code>, <code>.el-content</code>, <code>.el-image</code>, <code>.el-link</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500, 
        'hints' => ['.el-element', '.el-nav', '.el-item', '.el-title', '.el-meta', '.el-content', '.el-image', '.el-link']
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
              'label' => 'Grid', 
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
              'label' => 'Panel', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['panel_style', 'panel_link', 'panel_padding', 'panel_image_no_padding', 'item_maxwidth', 'panel_content_width', 'panel_expand']
            ], [
              'label' => 'Title', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['title_style', 'title_link', 'title_hover_style', 'title_decoration', 'title_font_family', 'title_color', 'title_element', 'title_align', 'title_grid_width', 'title_grid_column_gap', 'title_grid_row_gap', 'title_grid_breakpoint', 'title_margin']
            ], [
              'label' => 'Meta', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['meta_style', 'meta_color', 'meta_align', 'meta_element', 'meta_margin']
            ], [
              'label' => 'Content', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['content_style', 'content_align', 'content_dropcap', 'content_column', 'content_column_divider', 'content_column_breakpoint', 'content_margin']
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
                ], 'image_loading', 'image_border', 'image_box_shadow', 'image_box_decoration', 'image_box_decoration_inverse', 'image_link', 'image_transition', 'image_transition_border', 'image_hover_box_shadow', 'icon_width', 'icon_color', 'image_align', 'image_grid_width', 'image_grid_column_gap', 'image_grid_row_gap', 'image_grid_breakpoint', 'image_vertical_align', 'image_margin', 'image_svg_inline', 'image_svg_animate', 'image_svg_color', 'image_text_color']
            ], [
              'label' => 'Link', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['link_target', 'link_text', 'link_aria_label', 'link_style', 'link_size', 'link_fullwidth', 'link_margin']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', 'item_animation', '_parallax_button', 'visibility', 'container_padding_remove']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ]
];
