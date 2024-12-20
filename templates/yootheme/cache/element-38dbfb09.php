<?php // $file = D:/OpenServer/domains/container/container/templates/yootheme/packages/builder/elements/panel/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'panel', 
  'title' => 'Panel', 
  'group' => 'basic', 
  'icon' => $filter->apply('url', 'images/icon.svg', $file), 
  'iconSmall' => $filter->apply('url', 'images/iconSmall.svg', $file), 
  'element' => true, 
  'width' => 500, 
  'defaults' => [
    'link_text' => 'Read more', 
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
    'link_style' => 'default', 
    'margin' => 'default'
  ], 
  'placeholder' => [
    'props' => [
      'title' => 'Title', 
      'meta' => '', 
      'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 
      'image' => '', 
      'icon' => ''
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
    'meta' => [
      'label' => 'Meta', 
      'source' => true
    ], 
    'content' => [
      'label' => 'Content', 
      'type' => 'editor', 
      'source' => true
    ], 
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
      'source' => true, 
      'enable' => 'image'
    ], 
    'icon' => [
      'label' => 'Icon', 
      'description' => 'Instead of using a custom image, you can click on the pencil to pick an icon from the icon library.', 
      'type' => 'icon', 
      'source' => true, 
      'enable' => '!image'
    ], 
    'link' => $config->get('builder.link'), 
    'link_target' => $config->get('builder.link_target'), 
    'link_text' => [
      'label' => 'Link Text', 
      'description' => 'Enter the text for the link.', 
      'source' => true, 
      'enable' => 'link'
    ], 
    'link_aria_label' => [
      'label' => 'Link ARIA Label', 
      'description' => 'Enter a descriptive text label to make it accessible if the link has no visible text.', 
      'source' => true, 
      'enable' => 'link'
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
        'Tile Secondary' => 'tile-secondary'
      ]
    ], 
    'panel_link' => [
      'label' => 'Link', 
      'description' => 'Link the whole panel if a link exists.', 
      'type' => 'checkbox', 
      'text' => 'Link panel', 
      'enable' => 'link'
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
      'enable' => 'panel_style || (!panel_style && image && image_align != \'between\')'
    ], 
    'panel_image_no_padding' => [
      'description' => 'Top, bottom, left or right aligned images can be attached to the panel edge. If the image is aligned to the left or right, it will also extend to cover the whole space.', 
      'type' => 'checkbox', 
      'text' => 'Align image without padding', 
      'show' => 'panel_style', 
      'enable' => 'image && image_align != \'between\''
    ], 
    'height_expand' => [
      'label' => 'Height', 
      'description' => 'Expand the height of the element to fill the available space in the column.', 
      'type' => 'checkbox', 
      'text' => 'Fill the available column space'
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
      'enable' => 'height_expand'
    ], 
    'html_element' => $config->get('builder.html_element'), 
    'title_style' => [
      'label' => 'Style', 
      'description' => 'Title styles differ in font-size but may also come with a predefined color, size and font.', 
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
      'enable' => 'title'
    ], 
    'title_link' => [
      'label' => 'Link', 
      'description' => 'Link the title if a link exists.', 
      'type' => 'checkbox', 
      'text' => 'Link title', 
      'enable' => 'title && link'
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
      'enable' => 'title && link && (title_link || panel_link)'
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
      'enable' => 'title'
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
      'enable' => 'title'
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
    'title_align' => [
      'label' => 'Alignment', 
      'description' => 'Align the title to the top or left in regards to the content.', 
      'type' => 'select', 
      'options' => [
        'Top' => 'top', 
        'Left' => 'left'
      ], 
      'enable' => 'title'
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
      'enable' => 'title && title_align == \'left\''
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
      'enable' => 'title && title_align == \'left\''
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
      'enable' => 'title && title_align == \'left\''
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
      'enable' => 'title && title_align == \'left\''
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
      'enable' => 'title'
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
      'enable' => 'meta'
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
      'enable' => 'meta'
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
      'enable' => 'meta'
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
      'enable' => 'meta'
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
      'enable' => 'meta'
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
      'enable' => 'content'
    ], 
    'content_align' => [
      'label' => 'Alignment', 
      'type' => 'checkbox', 
      'text' => 'Force left alignment', 
      'enable' => 'content'
    ], 
    'content_dropcap' => [
      'label' => 'Drop Cap', 
      'description' => 'Display the first letter of the paragraph as a large initial.', 
      'type' => 'checkbox', 
      'text' => 'Enable drop cap', 
      'enable' => 'content'
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
      'enable' => 'content'
    ], 
    'content_column_divider' => [
      'description' => 'Show a divider between text columns.', 
      'type' => 'checkbox', 
      'text' => 'Show dividers', 
      'enable' => 'content && content_column'
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
      'enable' => 'content && content_column'
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
      'enable' => 'content'
    ], 
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
      'source' => true, 
      'enable' => 'image'
    ], 
    'image_loading' => [
      'label' => 'Loading', 
      'description' => 'By default, images are loaded lazy. Enable eager loading for images in the initial viewport.', 
      'type' => 'checkbox', 
      'text' => 'Load image eagerly', 
      'enable' => 'image'
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
      'enable' => 'image && (!panel_style || (panel_style && (!panel_image_no_padding || image_align == \'between\')))'
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
      'enable' => 'image && !panel_style'
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
      'enable' => 'image && !panel_style'
    ], 
    'image_box_decoration_inverse' => [
      'type' => 'checkbox', 
      'text' => 'Inverse style', 
      'enable' => 'image && !panel_style && $match(image_box_decoration, \'^(default|primary|secondary)$\')'
    ], 
    'image_link' => [
      'label' => 'Link', 
      'description' => 'Link the image if a link exists.', 
      'type' => 'checkbox', 
      'text' => 'Link image', 
      'enable' => 'image && link'
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
      'enable' => 'image && link && (image_link || panel_link)'
    ], 
    'image_transition_border' => [
      'type' => 'checkbox', 
      'text' => 'Border', 
      'enable' => 'image && link && (image_link || panel_link)'
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
      'enable' => 'link && image && !panel_style && (image_link || panel_link)'
    ], 
    'icon_width' => $config->get('builder.icon_width'), 
    'icon_color' => $config->get('builder.icon_color'), 
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
      'enable' => 'image || icon'
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
      'enable' => '(image || icon) && $match(image_align, \'left|right\')'
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
      'enable' => '(image || icon) && $match(image_align, \'left|right\') && !(panel_image_no_padding && panel_style)'
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
      'enable' => '(image || icon) && $match(image_align, \'left|right\') && !(panel_image_no_padding && panel_style)'
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
      'enable' => '(image || icon) && $match(image_align, \'left|right\')'
    ], 
    'image_vertical_align' => [
      'label' => 'Vertical Alignment', 
      'description' => 'Vertically center grid items.', 
      'type' => 'checkbox', 
      'text' => 'Center', 
      'enable' => '(image || icon) && $match(image_align, \'left|right\')'
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
      'enable' => '(image || icon) && (image_align == \'between\' || (image_align == \'bottom\' && !(panel_style && panel_image_no_padding)))'
    ], 
    'image_svg_inline' => [
      'label' => 'Inline SVG', 
      'description' => 'Inject SVG images into the page markup so that they can easily be styled with CSS.', 
      'type' => 'checkbox', 
      'text' => 'Make SVG stylable with CSS', 
      'enable' => 'image'
    ], 
    'image_svg_animate' => [
      'type' => 'checkbox', 
      'text' => 'Animate strokes', 
      'enable' => 'image && image_svg_inline'
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
      'enable' => 'image && image_svg_inline'
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
      'enable' => 'image'
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
      'enable' => 'link && link_text'
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
      'enable' => 'link && link_text && link_style && !$match(link_style, \'link-(muted|text)\')'
    ], 
    'link_fullwidth' => [
      'type' => 'checkbox', 
      'text' => 'Full width button', 
      'enable' => 'link && link_text && link_style && !$match(link_style, \'link-(muted|text)\')'
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
      'enable' => 'link && link_text'
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
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>, <code>.el-title</code>, <code>.el-meta</code>, <code>.el-content</code>, <code>.el-image</code>, <code>.el-link</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500, 
        'hints' => ['.el-element', '.el-title', '.el-meta', '.el-content', '.el-image', '.el-link']
      ]
    ], 
    'transform' => $config->get('builder.transform')
  ], 
  'fieldset' => [
    'default' => [
      'type' => 'tabs', 
      'fields' => [[
          'title' => 'Content', 
          'fields' => ['title', 'meta', 'content', 'image', [
              'description' => 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically, and where possible, high resolution images will be auto-generated.', 
              'name' => '_image_dimension', 
              'type' => 'grid', 
              'width' => '1-2', 
              'fields' => ['image_width', 'image_height']
            ], 'image_alt', 'icon', 'link', 'link_target', 'link_text', 'link_aria_label']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Panel', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['panel_style', 'panel_link', 'panel_padding', 'panel_image_no_padding', 'height_expand', 'panel_expand', 'html_element']
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
              'fields' => ['image_focal_point', 'image_loading', 'image_border', 'image_box_shadow', 'image_box_decoration', 'image_box_decoration_inverse', 'image_link', 'image_transition', 'image_transition_border', 'image_hover_box_shadow', 'icon_width', 'icon_color', 'image_align', 'image_grid_width', 'image_grid_column_gap', 'image_grid_row_gap', 'image_grid_breakpoint', 'image_vertical_align', 'image_margin', 'image_svg_inline', 'image_svg_animate', 'image_svg_color', 'image_text_color']
            ], [
              'label' => 'Link', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['link_style', 'link_size', 'link_fullwidth', 'link_margin']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', '_parallax_button', 'visibility']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ]
];
