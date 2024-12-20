<?php // $file = /var/www/u2526582/data/www/container-tm.com/templates/yootheme/packages/builder/config/builder.json

return [
  '@import' => [$filter->apply('path', '../../builder-source/config/builder.json', $file)], 
  'advanced' => [
    'title' => 'Advanced', 
    'fields' => ['name', 'status', 'source', 'id', 'class', 'attributes', 'css', 'transform']
  ], 
  'advancedItem' => [
    'title' => 'Advanced', 
    'fields' => ['status', 'source']
  ], 
  'name' => [
    'label' => 'Name', 
    'description' => 'Define a name to easily identify this element inside the builder.'
  ], 
  'status' => [
    'label' => 'Status', 
    'description' => 'Disable the element and publish it later.', 
    'type' => 'checkbox', 
    'text' => 'Disable element', 
    'attrs' => [
      'true-value' => 'disabled', 
      'false-value' => ''
    ]
  ], 
  'statusItem' => [
    'label' => 'Status', 
    'description' => 'Disable the item and publish it later.', 
    'type' => 'checkbox', 
    'text' => 'Disable item', 
    'attrs' => [
      'true-value' => 'disabled', 
      'false-value' => ''
    ]
  ], 
  'id' => [
    'label' => 'ID', 
    'description' => 'Define a unique identifier for the element.', 
    'source' => true
  ], 
  'cls' => [
    'label' => 'Classes', 
    'description' => 'Define one or more class names for the element. Separate multiple classes with spaces.', 
    'source' => true
  ], 
  'attrs' => [
    'label' => 'Attributes', 
    'description' => 'Define one or more attributes for the element. Separate attribute name and value by <code>=</code> character. One attribute per line.', 
    'type' => 'editor', 
    'editor' => 'code', 
    'attrs' => [
      'debounce' => 500
    ], 
    'source' => true
  ], 
  'transform' => [
    'label' => 'Transform', 
    'description' => 'Transform the element into another element while keeping its content and settings. Unused content and settings are removed. Transforming into a preset only keeps the content but adopts all preset settings.', 
    'type' => 'button', 
    'text' => 'Select Element', 
    'event' => 'transformBuilderElement'
  ], 
  'html_element' => [
    'label' => 'HTML Element', 
    'description' => 'Define the purpose and structure of the content or give it no semantic meaning.', 
    'type' => 'select', 
    'options' => [
      'div' => '', 
      'address' => 'address', 
      'article' => 'article', 
      'aside' => 'aside', 
      'footer' => 'footer', 
      'header' => 'header', 
      'hgroup' => 'hgroup', 
      'nav' => 'nav', 
      'section' => 'section'
    ]
  ], 
  'html_element_item' => [
    'label' => 'HTML Element', 
    'description' => 'Define the purpose and structure of the content or give it no semantic meaning.', 
    'type' => 'select', 
    'options' => [
      'div' => '', 
      'address' => 'address', 
      'article' => 'article', 
      'section' => 'section'
    ]
  ], 
  'position' => [
    'label' => 'Position', 
    'description' => 'Position the element in the normal content flow, or in normal flow but with an offset relative to itself, or remove it from the flow and position it relative to the containing column.', 
    'type' => 'select', 
    'options' => [
      'Static' => '', 
      'Relative' => 'relative', 
      'Absolute' => 'absolute'
    ]
  ], 
  'position_left' => [
    'label' => 'Left', 
    'description' => 'Set the horizontal position of the element\'s left edge in pixels. A different unit like % or vw can also be entered.', 
    'type' => 'range', 
    'attrs' => [
      'min' => -600, 
      'max' => 600, 
      'step' => 10
    ], 
    'enable' => 'position && !position_right'
  ], 
  'position_right' => [
    'label' => 'Right', 
    'description' => 'Set the horizontal position of the element\'s right edge in pixels. A different unit like % or vw can also be entered.', 
    'type' => 'range', 
    'attrs' => [
      'min' => -600, 
      'max' => 600, 
      'step' => 10
    ], 
    'enable' => 'position && !position_left'
  ], 
  'position_top' => [
    'label' => 'Top', 
    'description' => 'Set the horizontal position of the element\'s top edge in pixels. A different unit like % or vw can also be entered.', 
    'type' => 'range', 
    'attrs' => [
      'min' => -600, 
      'max' => 600, 
      'step' => 10
    ], 
    'enable' => 'position && !position_bottom'
  ], 
  'position_bottom' => [
    'label' => 'Bottom', 
    'description' => 'Set the horizontal position of the element\'s bottom edge in pixels. A different unit like % or vw can also be entered.', 
    'type' => 'range', 
    'attrs' => [
      'min' => -600, 
      'max' => 600, 
      'step' => 10
    ], 
    'enable' => 'position && !position_top'
  ], 
  'position_z_index' => [
    'label' => 'Z Index', 
    'description' => 'Position the element above or below other elements. If they have the same stack level, the position depends on the order in the layout.', 
    'type' => 'select', 
    'options' => [
      'None' => '', 
      0 => '0', 
      1 => '1', 
      2 => '2', 
      3 => '3'
    ], 
    'enable' => 'position'
  ], 
  'margin' => [
    'label' => 'Margin', 
    'description' => 'Set the vertical margin. Note: The first element\'s top margin and the last element\'s bottom margin are always removed. Define those in the grid settings instead.', 
    'type' => 'select', 
    'options' => [
      'Keep existing' => '', 
      'Small' => 'small', 
      'Default' => 'default', 
      'Medium' => 'medium', 
      'Large' => 'large', 
      'X-Large' => 'xlarge', 
      'None' => 'remove-vertical'
    ], 
    'enable' => 'position != \'absolute\''
  ], 
  'margin_remove_top' => [
    'type' => 'checkbox', 
    'text' => 'Remove top margin', 
    'enable' => 'position != \'absolute\' && margin != \'remove-vertical\''
  ], 
  'margin_remove_bottom' => [
    'type' => 'checkbox', 
    'text' => 'Remove bottom margin', 
    'enable' => 'position != \'absolute\' && margin != \'remove-vertical\''
  ], 
  'maxwidth' => [
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
    ]
  ], 
  'maxwidth_breakpoint' => [
    'label' => 'Max Width Breakpoint', 
    'description' => 'Define the device width from which the max-width will apply.', 
    'type' => 'select', 
    'options' => [
      'Always' => '', 
      'Small (Phone Landscape)' => 's', 
      'Medium (Tablet Landscape)' => 'm', 
      'Large (Desktop)' => 'l', 
      'X-Large (Large Screens)' => 'xl'
    ], 
    'enable' => 'maxwidth'
  ], 
  'block_align' => [
    'label' => 'Block Alignment', 
    'description' => 'Define the alignment in case the container exceeds the element max-width.', 
    'type' => 'select', 
    'options' => [
      'Left' => '', 
      'Center' => 'center', 
      'Right' => 'right'
    ], 
    'enable' => 'position != \'absolute\' && maxwidth'
  ], 
  'block_align_breakpoint' => [
    'label' => 'Block Alignment Breakpoint', 
    'description' => 'Define the device width from which the alignment will apply.', 
    'type' => 'select', 
    'options' => [
      'Always' => '', 
      'Small (Phone Landscape)' => 's', 
      'Medium (Tablet Landscape)' => 'm', 
      'Large (Desktop)' => 'l', 
      'X-Large (Large Screens)' => 'xl'
    ], 
    'enable' => 'position != \'absolute\' && maxwidth'
  ], 
  'block_align_fallback' => [
    'label' => 'Block Alignment Fallback', 
    'description' => 'Define an alignment fallback for device widths below the breakpoint.', 
    'type' => 'select', 
    'options' => [
      'Left' => '', 
      'Center' => 'center', 
      'Right' => 'right'
    ], 
    'enable' => 'position != \'absolute\' && maxwidth && block_align_breakpoint'
  ], 
  'text_align' => [
    'label' => 'Text Alignment', 
    'description' => 'Center, left and right alignment may depend on a breakpoint and require a fallback.', 
    'type' => 'select', 
    'options' => [
      'None' => '', 
      'Left' => 'left', 
      'Center' => 'center', 
      'Right' => 'right'
    ]
  ], 
  'text_align_justify' => [
    'label' => 'Text Alignment', 
    'description' => 'Center, left and right alignment may depend on a breakpoint and require a fallback.', 
    'type' => 'select', 
    'options' => [
      'None' => '', 
      'Left' => 'left', 
      'Center' => 'center', 
      'Right' => 'right', 
      'Justify' => 'justify'
    ]
  ], 
  'text_align_breakpoint' => [
    'label' => 'Text Alignment Breakpoint', 
    'description' => 'Define the device width from which the alignment will apply.', 
    'type' => 'select', 
    'options' => [
      'Always' => '', 
      'Small (Phone Landscape)' => 's', 
      'Medium (Tablet Landscape)' => 'm', 
      'Large (Desktop)' => 'l', 
      'X-Large (Large Screens)' => 'xl'
    ], 
    'enable' => 'text_align && text_align != \'justify\''
  ], 
  'text_align_fallback' => [
    'label' => 'Text Alignment Fallback', 
    'description' => 'Define an alignment fallback for device widths below the breakpoint.', 
    'type' => 'select', 
    'options' => [
      'None' => '', 
      'Left' => 'left', 
      'Center' => 'center', 
      'Right' => 'right'
    ], 
    'enable' => 'text_align && text_align_breakpoint'
  ], 
  'text_align_justify_fallback' => [
    'label' => 'Text Alignment Fallback', 
    'description' => 'Define an alignment fallback for device widths below the breakpoint.', 
    'type' => 'select', 
    'options' => [
      'None' => '', 
      'Left' => 'left', 
      'Center' => 'center', 
      'Right' => 'right', 
      'Justify' => 'justify'
    ], 
    'enable' => 'text_align && text_align != \'justify\' && text_align_breakpoint'
  ], 
  'animation' => [
    'label' => 'Animation', 
    'description' => 'Override the section animation setting. This option won\'t have any effect unless animations are enabled for this section.', 
    'type' => 'select', 
    'options' => [[
        'text' => 'Inherit', 
        'value' => ''
      ], [
        'text' => 'None', 
        'value' => 'none'
      ], [
        'text' => 'Parallax', 
        'value' => 'parallax'
      ], [
        'label' => 'Animations', 
        'options' => [[
            'text' => 'Fade', 
            'value' => 'fade'
          ], [
            'text' => 'Scale Up', 
            'value' => 'scale-up'
          ], [
            'text' => 'Scale Down', 
            'value' => 'scale-down'
          ], [
            'text' => 'Slide Top Small', 
            'value' => 'slide-top-small'
          ], [
            'text' => 'Slide Bottom Small', 
            'value' => 'slide-bottom-small'
          ], [
            'text' => 'Slide Left Small', 
            'value' => 'slide-left-small'
          ], [
            'text' => 'Slide Right Small', 
            'value' => 'slide-right-small'
          ], [
            'text' => 'Slide Top Medium', 
            'value' => 'slide-top-medium'
          ], [
            'text' => 'Slide Bottom Medium', 
            'value' => 'slide-bottom-medium'
          ], [
            'text' => 'Slide Left Medium', 
            'value' => 'slide-left-medium'
          ], [
            'text' => 'Slide Right Medium', 
            'value' => 'slide-right-medium'
          ], [
            'text' => 'Slide Top 100%', 
            'value' => 'slide-top'
          ], [
            'text' => 'Slide Bottom 100%', 
            'value' => 'slide-bottom'
          ], [
            'text' => 'Slide Left 100%', 
            'value' => 'slide-left'
          ], [
            'text' => 'Slide Right 100%', 
            'value' => 'slide-right'
          ]]
      ]]
  ], 
  'item_animation' => [
    'type' => 'checkbox', 
    'text' => 'Animate items', 
    'show' => '!$match(animation, \'none|parallax\')'
  ], 
  '_parallax_button' => [
    'type' => 'button-panel', 
    'text' => 'Edit Parallax', 
    'panel' => 'builder-parallax', 
    'enable' => 'animation == \'parallax\''
  ], 
  'visibility' => [
    'label' => 'Visibility', 
    'description' => 'Show or hide the element on this device width and larger. If all elements are hidden, columns, rows and sections will hide accordingly.', 
    'type' => 'select', 
    'options' => [
      'Always' => '', 
      'Visible Small (Phone Landscape)' => 's', 
      'Visible Medium (Tablet Landscape)' => 'm', 
      'Visible Large (Desktop)' => 'l', 
      'Visible X-Large (Large Screens)' => 'xl', 
      'Hidden Small (Phone Landscape)' => 'hidden-s', 
      'Hidden Medium (Tablet Landscape)' => 'hidden-m', 
      'Hidden Large (Desktop)' => 'hidden-l', 
      'Hidden X-Large (Large Screens)' => 'hidden-xl'
    ]
  ], 
  'container_padding_remove' => [
    'label' => 'Section/Row', 
    'description' => 'If a section or row has a max width, and one side is expanding to the left or right, the default padding can be removed from the expanding side.', 
    'type' => 'checkbox', 
    'text' => 'Remove left or right padding', 
    'enable' => 'position != \'absolute\''
  ], 
  'image' => [
    'label' => 'Image', 
    'type' => 'image', 
    'source' => true, 
    'enable' => '!icon', 
    'altRef' => '%name%_alt'
  ], 
  'icon_width' => [
    'label' => 'Icon Width', 
    'description' => 'Set the icon width.', 
    'enable' => 'icon'
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
      'Success' => 'success', 
      'Warning' => 'warning', 
      'Danger' => 'danger'
    ], 
    'enable' => 'icon'
  ], 
  'link' => [
    'label' => 'Link', 
    'type' => 'link', 
    'description' => 'Enter or pick a link, an image or a video file.', 
    'attrs' => [
      'placeholder' => 'http://'
    ], 
    'source' => true
  ], 
  'link_target' => [
    'type' => 'checkbox', 
    'text' => 'Open the link in a new window'
  ], 
  'link_title' => [
    'label' => 'Link Title', 
    'description' => 'Enter an optional text for the title attribute of the link, which will appear on hover.', 
    'source' => true
  ], 
  'link_aria_label' => [
    'label' => 'Link ARIA Label', 
    'description' => 'Enter a descriptive text label to make it accessible if the link has no visible text.', 
    'source' => true
  ], 
  'column_width_options_default' => [
    'Fraction Layouts' => [
      '1/1' => '', 
      '1/2' => '1-2', 
      '1/3' => '1-3', 
      '2/3' => '2-3', 
      '1/4' => '1-4', 
      '3/4' => '3-4', 
      '1/5' => '1-5', 
      '2/5' => '2-5', 
      '3/5' => '3-5', 
      '4/5' => '4-5', 
      '1/6' => '1-6', 
      '5/6' => '5-6'
    ], 
    'Fixed Layouts' => [
      'Expand' => 'expand', 
      'Auto' => 'auto', 
      'Small' => 'small', 
      'Medium' => 'medium', 
      'Large' => 'large', 
      'X-Large' => 'xlarge', 
      '2X-Large' => '2xlarge'
    ]
  ], 
  'column_width_options' => [
    '-' => '', 
    'Fraction Layouts' => [
      '1/1' => '1-1', 
      '1/2' => '1-2', 
      '1/3' => '1-3', 
      '2/3' => '2-3', 
      '1/4' => '1-4', 
      '3/4' => '3-4', 
      '1/5' => '1-5', 
      '2/5' => '2-5', 
      '3/5' => '3-5', 
      '4/5' => '4-5', 
      '1/6' => '1-6', 
      '5/6' => '5-6'
    ], 
    'Fixed Layouts' => [
      'Expand' => 'expand', 
      'Auto' => 'auto', 
      'Small' => 'small', 
      'Medium' => 'medium', 
      'Large' => 'large', 
      'X-Large' => 'xlarge', 
      '2X-Large' => '2xlarge'
    ]
  ], 
  'column_order_first_options' => [
    'None' => '', 
    'Always' => 'xs', 
    'Small (Phone Landscape)' => 's', 
    'Medium (Tablet Landscape)' => 'm', 
    'Large (Desktop)' => 'l', 
    'X-Large (Large Screens)' => 'xl'
  ]
];
