<?php // $file = /var/www/u2526582/data/www/container-tm.com/templates/yootheme/packages/theme-joomla-modules/config/modules.json

return [
  'fields' => [
    'visibility' => [
      'label' => 'Visibility', 
      'description' => 'Display the module only from this device width and larger.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ]
    ], 
    'style' => [
      'label' => 'Style', 
      'description' => 'Select a panel style.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'None' => '', 
        'Card Default' => 'card-default', 
        'Card Primary' => 'card-primary', 
        'Card Secondary' => 'card-secondary', 
        'Card Hover' => 'card-hover'
      ], 
      'show' => '!$match(this.position, \'^(toolbar-(left|right)|logo(-mobile)?|navbar(-mobile)?|header(-mobile)?|dialog(-mobile)?|debug)$\')'
    ], 
    'title_style' => [
      'label' => 'Title Style', 
      'description' => 'Title styles differ in font-size but may also come with a predefined color, size and font.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'None' => '', 
        '3X-Large' => 'heading-3xlarge', 
        '2X-Large' => 'heading-2xlarge', 
        'X-Large' => 'heading-xlarge', 
        'Large' => 'heading-large', 
        'Medium' => 'heading-medium', 
        'Small' => 'heading-small', 
        'H1' => 'h1', 
        'H2' => 'h2', 
        'H3' => 'h3', 
        'H4' => 'h4', 
        'H5' => 'h5', 
        'H6' => 'h6'
      ], 
      'show' => '!$match(this.position, \'^(toolbar-(left|right)|logo(-mobile)?|navbar(-mobile)?|header(-mobile)?|debug)$\')'
    ], 
    'title_decoration' => [
      'label' => 'Title Decoration', 
      'description' => 'Decorate the title with a divider, bullet or a line that is vertically centered to the heading.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'None' => '', 
        'Divider' => 'divider', 
        'Bullet' => 'bullet', 
        'Line' => 'line'
      ], 
      'show' => '!$match(this.position, \'^(toolbar-(left|right)|logo(-mobile)?|navbar(-mobile)?|header(-mobile)?|debug)$\')'
    ], 
    'text_align' => [
      'label' => 'Alignment', 
      'description' => 'Center, left and right alignment may depend on a breakpoint and require a fallback.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'None' => '', 
        'Left' => 'left', 
        'Center' => 'center', 
        'Right' => 'right', 
        'Justify' => 'justify'
      ], 
      'show' => '!$match(this.position, \'^(toolbar-(left|right)|logo(-mobile)?|navbar(-mobile)?|header(-mobile)?|debug)$\')'
    ], 
    'text_align_breakpoint' => [
      'label' => 'Alignment Breakpoint', 
      'description' => 'Define the device width from which the alignment will apply.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'show' => '!$match(this.position, \'^(toolbar-(left|right)|logo(-mobile)?|navbar(-mobile)?|header(-mobile)?|debug)$\') && text_align && text_align != \'justify\''
    ], 
    'text_align_fallback' => [
      'label' => 'Alignment Fallback', 
      'description' => 'Define an alignment fallback for device widths below the breakpoint.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'None' => '', 
        'Left' => 'left', 
        'Center' => 'center', 
        'Right' => 'right', 
        'Justify' => 'justify'
      ], 
      'show' => '!$match(this.position, \'^(toolbar-(left|right)|logo(-mobile)?|navbar(-mobile)?|header(-mobile)?|debug)$\') && text_align && text_align != \'justify\' && text_align_breakpoint'
    ], 
    'width' => [
      'label' => 'Width', 
      'description' => 'The width of the grid column that contains the module.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'Expand' => '', 
        '20%' => '1-5', 
        '25%' => '1-4', 
        '33%' => '1-3', 
        '40%' => '2-5', 
        '50%' => '1-2', 
        '100%' => '1-1'
      ], 
      'show' => '$match(this.position, \'^(top|bottom|builder-\\d+)$\')'
    ], 
    'maxwidth' => [
      'label' => 'Max Width', 
      'description' => 'The module maximum width.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        '2X-Large' => '2xlarge'
      ], 
      'show' => '$match(this.position, \'^(top|bottom|builder-\\d+)$\')'
    ], 
    'maxwidth_align' => [
      'label' => 'Max Width (Alignment)', 
      'description' => 'Set how the module should align when the container is larger than its max-width.', 
      'type' => 'checkbox', 
      'text' => 'Center the module', 
      'show' => 'maxwidth && $match(this.position, \'^(top|bottom|builder-\\d+)$\')'
    ], 
    'list_style' => [
      'label' => 'List Style', 
      'description' => 'Select the list style.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'None' => '', 
        'Divider' => 'divider'
      ], 
      'show' => '$match(this.type, \'^(articles_archive|articles_categories|articles_latest|articles_popular|tags_popular|tags_similar)$\')'
    ], 
    'link_style' => [
      'label' => 'Link Style', 
      'description' => 'Select the link style.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'None' => '', 
        'Muted' => 'muted', 
        'Text' => 'text'
      ], 
      'show' => '$match(this.type, \'^(articles_archive|articles_categories|articles_latest|articles_popular|tags_popular|tags_similar)$\')'
    ], 
    'menu_type' => [
      'label' => 'Menu Type', 
      'description' => 'Select the menu type.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'Default' => '', 
        'Nav' => 'nav', 
        'Subnav' => 'subnav', 
        'Iconnav' => 'iconnav'
      ], 
      'show' => '$match(this.type, \'menu\')'
    ], 
    'menu_divider' => [
      'label' => 'Menu Divider', 
      'description' => 'Show optional dividers between nav or subnav items.', 
      'type' => 'checkbox', 
      'text' => 'Show dividers', 
      'show' => '$match(this.type, \'menu\')'
    ], 
    'menu_style' => [
      'label' => 'Menu Style', 
      'description' => 'Select the nav style.', 
      'type' => 'select', 
      'default' => 'default', 
      'options' => [
        'Default' => 'default', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary'
      ], 
      'show' => '$match(this.type, \'menu\')'
    ], 
    'menu_size' => [
      'label' => 'Menu Primary Size', 
      'description' => 'Select the primary nav size.', 
      'type' => 'select', 
      'default' => '', 
      'options' => [
        'Default' => '', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge'
      ], 
      'show' => '$match(this.type, \'menu\')', 
      'enable' => 'menu_style == \'primary\''
    ], 
    'menu_image_width' => [
      'label' => 'Menu Image Width', 
      'description' => 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically, and where possible, high resolution images will be auto-generated.', 
      'attrs' => [
        'placeholder' => 'auto'
      ], 
      'show' => '$match(this.type, \'menu\')'
    ], 
    'menu_image_height' => [
      'label' => 'Menu Image Height', 
      'description' => 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically, and where possible, high resolution images will be auto-generated.', 
      'attrs' => [
        'placeholder' => 'auto'
      ], 
      'show' => '$match(this.type, \'menu\')'
    ], 
    'menu_image_svg_inline' => [
      'label' => 'Menu Inline SVG', 
      'description' => 'Inject SVG images into the markup so they adopt the text color automatically.', 
      'type' => 'checkbox', 
      'text' => 'Make SVG stylable with CSS', 
      'show' => '$match(this.type, \'menu\')'
    ], 
    'menu_icon_width' => [
      'label' => 'Menu Icon Width', 
      'description' => 'Set the icon width.', 
      'show' => '$match(this.type, \'menu\')'
    ], 
    'menu_image_margin' => [
      'label' => 'Menu Image and Title', 
      'type' => 'checkbox', 
      'text' => 'Add margin between', 
      'default' => true, 
      'show' => '$match(this.type, \'menu\')'
    ], 
    'menu_image_align' => [
      'label' => 'Menu Image Align', 
      'type' => 'select', 
      'default' => 'center', 
      'options' => [
        'Top' => 'top', 
        'Center' => 'center'
      ], 
      'show' => '$match(this.type, \'menu\')'
    ]
  ]
];
