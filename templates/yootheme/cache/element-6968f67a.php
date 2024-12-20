<?php // $file = /var/www/u2526582/data/www/container-tm.com/templates/yootheme/packages/builder/elements/section/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'section', 
  'title' => 'Section', 
  'container' => true, 
  'width' => 500, 
  'defaults' => [
    'style' => 'default', 
    'width' => 'default', 
    'vertical_align' => 'middle', 
    'title_position' => 'top-left', 
    'title_rotation' => 'left', 
    'title_breakpoint' => 'xl', 
    'image_position' => 'center-center'
  ], 
  'templates' => [
    'render' => $filter->apply('path', './templates/template.php', $file), 
    'content' => $filter->apply('path', './templates/content.php', $file)
  ], 
  'fields' => [
    'image' => [
      'label' => 'Image', 
      'type' => 'image', 
      'source' => true, 
      'show' => '!video'
    ], 
    'video' => [
      'label' => 'Video', 
      'description' => 'Select a video file or enter a link from <a href="https://www.youtube.com" target="_blank">YouTube</a> or <a href="https://vimeo.com" target="_blank">Vimeo</a>.', 
      'type' => 'video', 
      'source' => true, 
      'show' => '!image'
    ], 
    '_media' => [
      'type' => 'button-panel', 
      'panel' => 'builder-section-media', 
      'text' => 'Edit Settings', 
      'show' => 'image || video'
    ], 
    'title' => [
      'label' => 'Title', 
      'description' => 'Enter a decorative section title which is aligned to the section edge.', 
      'source' => true
    ], 
    'style' => [
      'label' => 'Style', 
      'type' => 'select', 
      'options' => [
        'Default' => 'default', 
        'Muted' => 'muted', 
        'Primary' => 'primary', 
        'Secondary' => 'secondary'
      ]
    ], 
    'preserve_color' => [
      'type' => 'checkbox', 
      'text' => 'Preserve text color', 
      'enable' => 'style'
    ], 
    'overlap' => [
      'description' => 'Preserve the text color, for example when using cards. Section overlap is not supported by all styles and may have no visual effect.', 
      'type' => 'checkbox', 
      'text' => 'Overlap the following section', 
      'enable' => 'style'
    ], 
    'background_color' => [
      'label' => 'Background Color', 
      'type' => 'color', 
      'enable' => '!style && !background_parallax_background'
    ], 
    '_background_parallax_button' => [
      'description' => 'Define a custom background color or a color parallax animation instead of using a predefined style.', 
      'type' => 'button-panel', 
      'text' => 'Edit Parallax', 
      'panel' => 'background-parallax', 
      'enable' => '!style'
    ], 
    'text_color' => [
      'label' => 'Text Color', 
      'description' => 'Force a light or dark color for text, buttons and controls on the image or video background.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ], 
      'source' => true, 
      'enable' => '!style || image || video'
    ], 
    'width' => [
      'label' => 'Max Width', 
      'type' => 'select', 
      'options' => [
        'Default' => 'default', 
        'X-Small' => 'xsmall', 
        'Small' => 'small', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        'Expand' => 'expand', 
        'None' => ''
      ]
    ], 
    'padding_remove_horizontal' => [
      'description' => 'Set the maximum content width.', 
      'type' => 'checkbox', 
      'text' => 'Remove horizontal padding', 
      'enable' => 'width && width != \'expand\''
    ], 
    'width_expand' => [
      'label' => 'Expand One Side', 
      'description' => 'Expand the width of one side to the left or right while the other side keeps within the constraints of the max width.', 
      'type' => 'select', 
      'options' => [
        'Don\'t expand' => '', 
        'To left' => 'left', 
        'To right' => 'right'
      ], 
      'enable' => 'width && width != \'expand\''
    ], 
    'height' => [
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Pixels' => 'pixels', 
        'Viewport' => 'viewport', 
        'Viewport (Subtract Next Section)' => 'section', 
        'Expand Page to Viewport' => 'page'
      ]
    ], 
    'height_viewport' => [
      'type' => 'number', 
      'attrs' => [
        'placeholder' => '100', 
        'min' => 0, 
        'step' => 10
      ], 
      'enable' => 'height == \'viewport\' || height == \'pixels\''
    ], 
    'height_offset_top' => [
      'description' => 'Set a fixed height, and optionally subtract the header height to fill the first visible viewport. Alternatively, expand the height so the next section also fits the viewport, or on smaller pages to fill the viewport.', 
      'type' => 'checkbox', 
      'text' => 'Subtract height above section', 
      'enable' => 'height == \'viewport\' && (height_viewport || 0) <= 100 || height == \'section\''
    ], 
    'vertical_align' => [
      'label' => 'Vertical Alignment', 
      'description' => 'Align the section content vertically, if the section height is larger than the content itself.', 
      'type' => 'select', 
      'options' => [
        'Top' => '', 
        'Middle' => 'middle', 
        'Bottom' => 'bottom'
      ], 
      'enable' => 'height == \'viewport\' && (height_viewport || 0) <= 100 || height == \'section\' || height == \'pixels\''
    ], 
    'padding' => [
      'label' => 'Padding', 
      'description' => 'Set the vertical padding.', 
      'type' => 'select', 
      'options' => [
        'Default' => '', 
        'X-Small' => 'xsmall', 
        'Small' => 'small', 
        'Large' => 'large', 
        'X-Large' => 'xlarge', 
        'None' => 'none'
      ]
    ], 
    'padding_remove_top' => [
      'type' => 'checkbox', 
      'text' => 'Remove top padding', 
      'enable' => 'padding != \'none\''
    ], 
    'padding_remove_bottom' => [
      'type' => 'checkbox', 
      'text' => 'Remove bottom padding', 
      'enable' => 'padding != \'none\''
    ], 
    'html_element' => $config->get('builder.html_element'), 
    'sticky' => [
      'label' => 'Sticky Effect', 
      'description' => 'Sticky section will be covered by the following section while scrolling. Reveal section by previous section.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Cover' => 'cover', 
        'Reveal' => 'reveal'
      ]
    ], 
    'header_transparent' => [
      'label' => 'Transparent Header', 
      'type' => 'checkbox', 
      'text' => 'Make header transparent'
    ], 
    'header_transparent_noplaceholder' => [
      'description' => 'Make the header transparent and overlay this section if it directly follows the header.', 
      'type' => 'checkbox', 
      'text' => 'Pull content behind header', 
      'enable' => 'header_transparent'
    ], 
    'header_transparent_text_color' => [
      'label' => 'Header Text Color', 
      'description' => 'Force a light or dark color for text, buttons and controls on the image or video background.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Light' => 'light', 
        'Dark' => 'dark'
      ], 
      'source' => true, 
      'enable' => 'header_transparent'
    ], 
    'animation' => [
      'label' => 'Animation', 
      'description' => 'Apply an animation to elements once they enter the viewport. Slide animations can come into effect with a fixed offset or at 100% of the element size.', 
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
      ]
    ], 
    'animation_delay' => [
      'label' => 'Animation Delay', 
      'description' => 'Delay the element animations in milliseconds, e.g. <code>200</code>.', 
      'attrs' => [
        'placeholder' => '0'
      ], 
      'enable' => 'animation', 
      'divider' => true
    ], 
    'title_position' => [
      'label' => 'Position', 
      'description' => 'Define the title position within the section.', 
      'type' => 'select', 
      'options' => [
        'Left Top' => 'top-left', 
        'Left Center' => 'center-left', 
        'Left Bottom' => 'bottom-left', 
        'Right Top' => 'top-right', 
        'Right Center' => 'center-right', 
        'Right Bottom' => 'bottom-right'
      ], 
      'enable' => 'title'
    ], 
    'title_rotation' => [
      'label' => 'Rotation', 
      'description' => 'Rotate the title 90 degrees clockwise or counterclockwise.', 
      'type' => 'select', 
      'options' => [
        'Left' => 'left', 
        'Right' => 'right'
      ], 
      'enable' => 'title'
    ], 
    'title_breakpoint' => [
      'label' => 'Breakpoint', 
      'description' => 'Display the section title on the defined screen size and larger.', 
      'type' => 'select', 
      'options' => [
        'Always' => '', 
        'Small (Phone Landscape)' => 's', 
        'Medium (Tablet Landscape)' => 'm', 
        'Large (Desktop)' => 'l', 
        'X-Large (Large Screens)' => 'xl'
      ], 
      'enable' => 'title'
    ], 
    'status' => [
      'label' => 'Status', 
      'description' => 'Disable the section and publish it later.', 
      'type' => 'checkbox', 
      'text' => 'Disable section', 
      'attrs' => [
        'true-value' => 'disabled', 
        'false-value' => ''
      ]
    ], 
    'source' => $config->get('builder.source'), 
    'name' => $config->get('builder.name'), 
    'id' => $config->get('builder.id'), 
    'class' => $config->get('builder.cls'), 
    'attributes' => $config->get('builder.attrs'), 
    'css' => [
      'label' => 'CSS', 
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-section</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500, 
        'hints' => ['.el-section']
      ]
    ]
  ], 
  'fieldset' => [
    'default' => [
      'type' => 'tabs', 
      'fields' => [[
          'title' => 'Content', 
          'fields' => ['image', 'video', '_media', 'title']
        ], [
          'title' => 'Settings', 
          'fields' => ['style', 'preserve_color', 'overlap', 'text_color', 'width', 'padding_remove_horizontal', 'width_expand', [
              'label' => 'Height', 
              'name' => '_height', 
              'type' => 'grid', 
              'width' => '3-4,1-4', 
              'gap' => 'small', 
              'fields' => ['height', 'height_viewport']
            ], 'height_offset_top', 'vertical_align', 'padding', 'padding_remove_top', 'padding_remove_bottom', 'html_element', 'sticky', 'header_transparent', 'header_transparent_noplaceholder', 'header_transparent_text_color', 'animation', 'animation_delay', [
              'label' => 'Title', 
              'type' => 'group', 
              'fields' => ['title_position', 'title_rotation', 'title_breakpoint']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ], 
  'panels' => [
    'builder-section-media' => [
      'title' => 'Image/Video', 
      'width' => 500, 
      'fields' => [
        'image_width' => [
          'label' => 'Width', 
          'type' => 'number', 
          'attrs' => [
            'placeholder' => 'auto'
          ]
        ], 
        'image_height' => [
          'label' => 'Height', 
          'type' => 'number', 
          'attrs' => [
            'placeholder' => 'auto'
          ]
        ], 
        'video_width' => [
          'label' => 'Width'
        ], 
        'video_height' => [
          'label' => 'Height'
        ], 
        'media_focal_point' => [
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
          'text' => 'Load image eagerly', 
          'show' => 'image && !video'
        ], 
        'image_size' => [
          'label' => 'Image Size', 
          'description' => 'Determine whether the image will fit the section dimensions by clipping it or by filling the empty areas with the background color.', 
          'type' => 'select', 
          'options' => [
            'Auto' => '', 
            'Cover' => 'cover', 
            'Contain' => 'contain', 
            'Width 100%' => 'width-1-1', 
            'Height 100%' => 'height-1-1'
          ], 
          'show' => 'image && !video'
        ], 
        'image_position' => [
          'label' => 'Image Position', 
          'description' => 'Set the initial background position, relative to the section layer.', 
          'type' => 'select', 
          'options' => [
            'Top Left' => 'top-left', 
            'Top Center' => 'top-center', 
            'Top Right' => 'top-right', 
            'Center Left' => 'center-left', 
            'Center Center' => 'center-center', 
            'Center Right' => 'center-right', 
            'Bottom Left' => 'bottom-left', 
            'Bottom Center' => 'bottom-center', 
            'Bottom Right' => 'bottom-right'
          ], 
          'show' => 'image && !video'
        ], 
        'image_effect' => [
          'label' => 'Image Effect', 
          'type' => 'select', 
          'options' => [
            'None' => '', 
            'Parallax' => 'parallax', 
            'Fixed' => 'fixed'
          ], 
          'show' => 'image && !video'
        ], 
        '_image_parallax_button' => [
          'description' => 'Add a parallax effect or fix the background with regard to the viewport while scrolling.', 
          'type' => 'button-panel', 
          'text' => 'Edit Parallax', 
          'panel' => 'image-parallax', 
          'show' => 'image && !video', 
          'enable' => 'image_effect == \'parallax\''
        ], 
        'media_visibility' => [
          'label' => 'Visibility', 
          'description' => 'Display the image or video only on this device width and larger.', 
          'type' => 'select', 
          'options' => [
            'Always' => '', 
            'Small (Phone Landscape)' => 's', 
            'Medium (Tablet Landscape)' => 'm', 
            'Large (Desktop)' => 'l', 
            'X-Large (Large Screens)' => 'xl'
          ]
        ], 
        'media_background' => [
          'label' => 'Background Color', 
          'description' => 'Use the background color in combination with blend modes, a transparent image or to fill the area, if the image doesn\'t cover the whole section.', 
          'type' => 'color'
        ], 
        'media_blend_mode' => [
          'label' => 'Blend Mode', 
          'description' => 'Determine how the image or video will blend with the background color.', 
          'type' => 'select', 
          'options' => [
            'Normal' => '', 
            'Multiply' => 'multiply', 
            'Screen' => 'screen', 
            'Overlay' => 'overlay', 
            'Darken' => 'darken', 
            'Lighten' => 'lighten', 
            'Color-dodge' => 'color-dodge', 
            'Color-burn' => 'color-burn', 
            'Hard-light' => 'hard-light', 
            'Soft-light' => 'soft-light', 
            'Difference' => 'difference', 
            'Exclusion' => 'exclusion', 
            'Hue' => 'hue', 
            'Saturation' => 'saturation', 
            'Color' => 'color', 
            'Luminosity' => 'luminosity'
          ]
        ], 
        'media_overlay' => [
          'label' => 'Overlay Color', 
          'type' => 'gradient', 
          'internal' => 'media_overlay_gradient'
        ], 
        '_media_overlay_parallax_button' => [
          'description' => 'Set an additional transparent overlay to soften the image or video.', 
          'type' => 'button-panel', 
          'text' => 'Edit Parallax', 
          'panel' => 'media-overlay-parallax', 
          'enable' => 'media_overlay'
        ]
      ], 
      'fieldset' => [
        'default' => [
          'fields' => [[
              'description' => 'Set the width and height in pixels. Setting just one value preserves the original proportions. The image will be resized and cropped automatically.', 
              'name' => '_image_dimension', 
              'type' => 'grid', 
              'width' => '1-2', 
              'show' => 'image && !video', 
              'fields' => ['image_width', 'image_height']
            ], [
              'description' => 'Set the video dimensions.', 
              'name' => '_video_dimension', 
              'type' => 'grid', 
              'width' => '1-2', 
              'show' => 'video && !image', 
              'fields' => ['video_width', 'video_height']
            ], 'media_focal_point', 'image_loading', 'image_size', 'image_position', 'image_effect', '_image_parallax_button', 'media_visibility', 'media_background', 'media_blend_mode', 'media_overlay', '_media_overlay_parallax_button']
        ]
      ]
    ]
  ]
];
