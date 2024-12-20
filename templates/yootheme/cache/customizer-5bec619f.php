<?php // $file = /var/www/u2526582/data/www/container-tm.com/templates/yootheme/packages/theme-settings/config/customizer.json

return [
  'sections' => [
    'settings' => [
      'title' => 'Settings', 
      'priority' => 60, 
      'fields' => [
        'settings' => [
          'type' => 'menu', 
          'items' => [
            'favicon' => 'Favicon', 
            'cookie' => 'Cookie Banner', 
            'custom-code' => 'Custom Code', 
            'api-key' => 'API Key', 
            'advanced' => 'Advanced', 
            'external-services' => 'External Services', 
            'systemcheck' => 'System Check', 
            'about' => 'About'
          ]
        ]
      ]
    ]
  ], 
  'panels' => [
    'favicon' => [
      'title' => 'Favicon', 
      'width' => 400, 
      'fields' => [
        'favicon' => [
          'label' => 'Favicon PNG', 
          'description' => 'Select your <code>favicon.png</code>. It appears in the browser\'s address bar, tab and bookmarks. The recommended size is 96x96 pixels.', 
          'type' => 'image', 
          'mediapicker' => [
            'unsplash' => false
          ]
        ], 
        'favicon_svg' => [
          'label' => 'Favicon SVG', 
          'description' => 'Select an optional <code>favicon.svg</code>. Modern browsers will use it instead of the PNG image. Use CSS to toggle the SVG color scheme for light/dark mode.', 
          'type' => 'image', 
          'mediapicker' => [
            'unsplash' => false
          ]
        ], 
        'touchicon' => [
          'label' => 'Touch Icon', 
          'description' => 'Select your <code>apple-touch-icon.png</code>. It appears when the website is added to the home screen on iOS devices. The recommended size is 180x180 pixels.', 
          'type' => 'image', 
          'mediapicker' => [
            'unsplash' => false
          ]
        ]
      ]
    ], 
    'custom-code' => [
      'title' => 'Custom Code', 
      'width' => 500, 
      'fields' => [
        'custom_js' => [
          'label' => 'Script', 
          'description' => 'Add custom JavaScript to your site. The <code>&lt;script&gt;</code> tag is not needed.', 
          'type' => 'editor', 
          'editor' => 'code', 
          'mode' => 'javascript'
        ], 
        'custom_less' => [
          'label' => 'CSS/Less', 
          'description' => 'Add custom CSS or Less to your site. All Less theme variables and mixins are available. The <code>&lt;style&gt;</code> tag is not needed.', 
          'type' => 'editor', 
          'editor' => 'code', 
          'mode' => 'text/x-less', 
          'attrs' => [
            'id' => 'custom_less', 
            'debounce' => 1000
          ]
        ]
      ]
    ], 
    'api-key' => [
      'title' => 'API Key', 
      'width' => 400, 
      'fields' => [
        'yootheme_apikey' => [
          'label' => 'YOOtheme API Key', 
          'description' => 'Enter the API key to enable 1-click updates for YOOtheme Pro and to access the layout library as well as the Unsplash image library. You can create an API Key for this website in your <a href="https://yootheme.com/shop/my-account/websites/" target="_blank">Account settings</a>.', 
          'show' => 'yootheme_apikey !== false'
        ], 
        'yootheme_apikey_warning' => [
          'label' => 'YOOtheme API Key', 
          'description' => 'Please install/enable the <a href="index.php?option=com_plugins&view=plugins&filter_search=installer%20yootheme">installer plugin</a> to enable this feature.', 
          'type' => 'description', 
          'show' => 'yootheme_apikey === false'
        ]
      ]
    ], 
    'advanced' => [
      'title' => 'Advanced', 
      'width' => 400, 
      'fields' => [
        'webp' => [
          'label' => 'Next-Gen Images', 
          'text' => 'Serve WebP images', 
          'type' => 'checkbox'
        ], 
        'avif' => [
          'description' => 'Serve optimized image formats with better compression and quality than JPEG and PNG.', 
          'text' => 'Serve AVIF images', 
          'type' => 'checkbox'
        ], 
        '_image_quality' => [
          'type' => 'button-panel', 
          'panel' => 'image-quality', 
          'text' => 'Edit Image Quality'
        ], 
        'highlight' => [
          'label' => 'Syntax Highlighting', 
          'description' => 'Select the style for the code syntax highlighting. Use GitHub for light and Monokai for dark backgrounds.', 
          'type' => 'select', 
          'options' => [
            'None' => '', 
            'GitHub (Light)' => 'github', 
            'Monokai (Dark)' => 'monokai'
          ]
        ], 
        'clear_cache' => [
          'label' => 'Cache', 
          'description' => 'Clear cached images and assets. Images that need to be resized are stored in the theme\'s cache folder. After reuploading an image with the same name, you\'ll have to clear the cache.', 
          'type' => 'cache'
        ], 
        '_config' => [
          'label' => 'Theme Settings', 
          'description' => 'Export all theme settings and import them into another installation. This doesn\'t include content from the layout, style and element libraries or the template builder.', 
          'type' => 'config'
        ]
      ]
    ], 
    'external-services' => [
      'title' => 'External Services', 
      'width' => 400, 
      'fields' => [
        'google_maps' => [
          'label' => 'Google Maps', 
          'description' => 'Enter your <a href="https://developers.google.com/maps/web/" target="_blank">Google Maps</a> API key to use Google Maps instead of OpenStreetMap. It also enables additional options to style the colors of your maps.'
        ], 
        'google_analytics' => [
          'label' => 'Google Analytics', 
          'attrs' => [
            'placeholder' => 'GT-XXXXX or G-XXXXX'
          ]
        ], 
        'google_analytics_anonymize' => [
          'description' => 'Enter your <a href="https://developers.google.com/analytics/" target="_blank">Google Analytics</a> ID to enable tracking. <a href="https://support.google.com/analytics/answer/2763052" target="_blank">IP anonymization</a> may reduce tracking accuracy.', 
          'type' => 'checkbox', 
          'text' => 'IP Anonymization'
        ], 
        'mailchimp_api' => [
          'label' => 'Mailchimp API Token', 
          'description' => 'Enter your <a href="https://kb.mailchimp.com/integrations/api-integrations/about-api-keys" target="_blank">Mailchimp</a> API key for using it with the Newsletter element.'
        ], 
        'cmonitor_api' => [
          'label' => 'Campaign Monitor API Token', 
          'description' => 'Enter your <a href="https://help.campaignmonitor.com/topic.aspx?t=206" target="_blank">Campaign Monitor</a> API key for using it with the Newsletter element.'
        ]
      ]
    ], 
    'systemcheck' => [
      'title' => 'System Check', 
      'width' => 400
    ], 
    'about' => [
      'title' => 'About', 
      'width' => 400
    ], 
    'image-quality' => [
      'title' => 'Image Quality', 
      'width' => 400, 
      'fields' => [
        '_image_quality_description' => [
          'description' => 'Define the image quality in percent for generated JPG images and when converting JPEG and PNG to next-gen image formats.<br><br>Mind that setting the image quality too high will have a negative impact on page loading times.<br><br>Press the Clear Cache button in the advanced settings after changing the image quality.', 
          'type' => 'description'
        ], 
        'image_quality_jpg' => [
          'label' => 'JPEG', 
          'attrs' => [
            'placeholder' => '80'
          ]
        ], 
        'image_quality_png_webp' => [
          'label' => 'PNG to WebP', 
          'attrs' => [
            'placeholder' => '100'
          ]
        ], 
        'image_quality_jpg_webp' => [
          'label' => 'JPEG to WebP', 
          'attrs' => [
            'placeholder' => '85'
          ]
        ], 
        'image_quality_png_avif' => [
          'label' => 'PNG to AVIF', 
          'attrs' => [
            'placeholder' => '85'
          ]
        ], 
        'image_quality_jpg_avif' => [
          'label' => 'JPEG to AVIF', 
          'attrs' => [
            'placeholder' => '75'
          ]
        ]
      ]
    ]
  ]
];
