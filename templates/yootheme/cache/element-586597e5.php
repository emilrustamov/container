<?php // $file = D:/OpenServer/domains/container/container/templates/yootheme/packages/builder/elements/video/element.json

return [
  '@import' => $filter->apply('path', './element.php', $file), 
  'name' => 'video', 
  'title' => 'Video', 
  'group' => 'basic', 
  'icon' => $filter->apply('url', 'images/icon.svg', $file), 
  'iconSmall' => $filter->apply('url', 'images/iconSmall.svg', $file), 
  'element' => true, 
  'width' => 500, 
  'defaults' => [
    'video_controls' => true, 
    'margin' => 'default'
  ], 
  'placeholder' => [
    'props' => [
      'video' => $filter->apply('url', '~yootheme/theme/assets/images/element-video-placeholder.mp4', $file)
    ]
  ], 
  'templates' => [
    'render' => $filter->apply('path', './templates/template.php', $file), 
    'content' => $filter->apply('path', './templates/content.php', $file)
  ], 
  'fields' => [
    'video' => [
      'label' => 'Video', 
      'description' => 'Select a video file or enter a link from <a href="https://www.youtube.com" target="_blank">YouTube</a> or <a href="https://vimeo.com" target="_blank">Vimeo</a>.', 
      'type' => 'video', 
      'source' => true
    ], 
    'video_width' => [
      'label' => 'Width'
    ], 
    'video_height' => [
      'label' => 'Height'
    ], 
    'video_controls' => [
      'label' => 'Options', 
      'type' => 'checkbox', 
      'text' => 'Show controls', 
      'enable' => 'video && !$match(video, \'(youtube\\.com|youtube-nocookie\\.com|youtu\\.be|vimeo\\.com)\', \'i\')'
    ], 
    'video_loop' => [
      'type' => 'checkbox', 
      'text' => 'Loop video', 
      'enable' => 'video && !$match(video, \'(youtube\\.com|youtube-nocookie\\.com|youtu\\.be|vimeo\\.com)\', \'i\')'
    ], 
    'video_muted' => [
      'type' => 'checkbox', 
      'text' => 'Mute video', 
      'enable' => 'video && !$match(video, \'(youtube\\.com|youtube-nocookie\\.com|youtu\\.be|vimeo\\.com)\', \'i\')'
    ], 
    'video_playsinline' => [
      'type' => 'checkbox', 
      'text' => 'Play inline on mobile devices', 
      'enable' => 'video && !$match(video, \'(youtube\\.com|youtube-nocookie\\.com|youtu\\.be|vimeo\\.com)\', \'i\')'
    ], 
    'video_lazyload' => [
      'type' => 'checkbox', 
      'text' => 'Lazy load video', 
      'enable' => 'video'
    ], 
    'video_autoplay' => [
      'label' => 'Autoplay', 
      'description' => 'Disable autoplay, start autoplay immediately or as soon as the video enters the viewport.', 
      'type' => 'select', 
      'options' => [
        'Off' => '', 
        'On' => true, 
        'On (If inview)' => 'inview'
      ], 
      'enable' => 'video && !$match(video, \'(youtube\\.com|youtube-nocookie\\.com|youtu\\.be|vimeo\\.com)\', \'i\')'
    ], 
    'video_poster' => [
      'label' => 'Poster Frame', 
      'description' => 'Select an optional image which shows up until the video plays. If not selected, the first video frame is shown as the poster frame.', 
      'type' => 'image', 
      'source' => true, 
      'enable' => 'video && !$match(video, \'(youtube\\.com|youtube-nocookie\\.com|youtu\\.be|vimeo\\.com)\', \'i\')'
    ], 
    'video_box_shadow' => [
      'label' => 'Box Shadow', 
      'description' => 'Select the video box shadow size.', 
      'type' => 'select', 
      'options' => [
        'None' => '', 
        'Small' => 'small', 
        'Medium' => 'medium', 
        'Large' => 'large', 
        'X-Large' => 'xlarge'
      ]
    ], 
    'video_box_decoration' => [
      'label' => 'Box Decoration', 
      'description' => 'Select the video box decoration style.', 
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
    'video_box_decoration_inverse' => [
      'type' => 'checkbox', 
      'text' => 'Inverse style', 
      'enable' => '$match(video_box_decoration, \'^(default|primary|secondary)$\')'
    ], 
    'video_poster_focal_point' => [
      'label' => 'Poster Frame Focal Point', 
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
      'enable' => 'video && !$match(video, \'(youtube\\.com|youtube-nocookie\\.com|youtu\\.be|vimeo\\.com)\', \'i\')'
    ], 
    'height_expand' => [
      'label' => 'Height', 
      'description' => 'Expand the height of the element to fill the available space in the column or force the height to one viewport. The video will cover the element\'s content box.', 
      'type' => 'checkbox', 
      'text' => 'Fill the available column space', 
      'enable' => 'video && !$match(video, \'(youtube\\.com|youtube-nocookie\\.com|youtu\\.be|vimeo\\.com)\', \'i\')'
    ], 
    'video_viewport_height' => [
      'type' => 'checkbox', 
      'text' => 'Force viewport height', 
      'enable' => '!height_expand && video && !$match(video, \'(youtube\\.com|youtube-nocookie\\.com|youtu\\.be|vimeo\\.com)\', \'i\')'
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
      'description' => 'Enter your own custom CSS. The following selectors will be prefixed automatically for this element: <code>.el-element</code>', 
      'type' => 'editor', 
      'editor' => 'code', 
      'mode' => 'css', 
      'attrs' => [
        'debounce' => 500, 
        'hints' => ['.el-element']
      ]
    ], 
    'transform' => $config->get('builder.transform')
  ], 
  'fieldset' => [
    'default' => [
      'type' => 'tabs', 
      'fields' => [[
          'title' => 'Content', 
          'fields' => ['video', [
              'description' => 'Set the video dimensions.', 
              'name' => '_video_dimension', 
              'type' => 'grid', 
              'width' => '1-2', 
              'fields' => ['video_width', 'video_height']
            ], 'video_controls', 'video_loop', 'video_muted', 'video_playsinline', 'video_lazyload', 'video_autoplay', 'video_poster']
        ], [
          'title' => 'Settings', 
          'fields' => [[
              'label' => 'Video', 
              'type' => 'group', 
              'divider' => true, 
              'fields' => ['video_box_shadow', 'video_box_decoration', 'video_box_decoration_inverse', 'video_poster_focal_point', 'height_expand', 'video_viewport_height', 'text_color']
            ], [
              'label' => 'General', 
              'type' => 'group', 
              'fields' => ['position', 'position_left', 'position_right', 'position_top', 'position_bottom', 'position_z_index', 'margin', 'margin_remove_top', 'margin_remove_bottom', 'maxwidth', 'maxwidth_breakpoint', 'block_align', 'block_align_breakpoint', 'block_align_fallback', 'text_align', 'text_align_breakpoint', 'text_align_fallback', 'animation', '_parallax_button', 'visibility', 'container_padding_remove']
            ]]
        ], $config->get('builder.advanced')]
    ]
  ]
];
