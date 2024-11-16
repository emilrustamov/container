<?php // $file = D:/OpenServer/domains/container/container/templates/yootheme/packages/theme-joomla/config/customizer.json

return [
  'id' => $config->get('theme.id'), 
  'title' => $config->get('theme.title'), 
  'cookie' => $config->get('theme.cookie'), 
  'default' => $config->get('theme.default'), 
  'template' => $config->get('theme.template'), 
  'admin' => $config->get('app.isAdmin'), 
  'root' => $config->get('req.baseUrl'), 
  'site' => sprintf('%s/index.php', $config->get('req.rootUrl')), 
  'token' => $config->get('session.token'), 
  'sections' => [
    'layout' => [
      'help' => [[
          'title' => 'Using the Sidebar', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=nZm-qEyGaP4&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '0:55', 
          'documentation' => 'support/yootheme-pro/joomla/customizer#save,-cancel-and-close', 
          'support' => 'support/search?tags=125&q=customizer%20save'
        ], [
          'title' => 'Using the Contextual Help', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=BGgRZvlJVXI&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '0:37', 
          'documentation' => 'support/yootheme-pro/joomla/customizer#contextual-help', 
          'support' => 'support/search?tags=125&q=contextual%20help'
        ], [
          'title' => 'Using the Device Preview Buttons', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=hGErRJcl9ts&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '0:42', 
          'documentation' => 'support/yootheme-pro/joomla/customizer#device-preview-buttons', 
          'support' => 'support/search?tags=125&q=customizer%20device%20preview'
        ], [
          'title' => 'Hide and Adjust the Sidebar', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=xzc6tuF500w&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '0:34', 
          'documentation' => 'support/yootheme-pro/joomla/customizer#hide-and-adjust-sidebar', 
          'support' => 'support/search?tags=125&q=customizer%20hide%20sidebar'
        ]]
    ], 
    'builder-pages' => [
      'help' => [
        'Pages' => [[
            'title' => 'Managing Pages', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=o20CQhzLP1k&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:57', 
            'documentation' => 'support/yootheme-pro/joomla/pages', 
            'support' => 'support/search?tags=125&q=pages%20builder'
          ], [
            'title' => 'Adding a New Page', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=0VbdT8usYvY&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:25', 
            'documentation' => 'support/yootheme-pro/joomla/pages#add-a-new-page', 
            'support' => 'support/search?tags=125&q=page%20builder'
          ], [
            'title' => 'Creating Individual Post Layouts', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=Fr7dXusK9xI&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '2:22', 
            'documentation' => 'support/yootheme-pro/joomla/pages#individual-post-layout', 
            'support' => 'support/search?tags=125&q=post%20builder'
          ]], 
        'Customizer' => [[
            'title' => 'Using the Sidebar', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=nZm-qEyGaP4&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '0:55', 
            'documentation' => 'support/yootheme-pro/joomla/customizer#save,-cancel-and-close', 
            'support' => 'support/search?tags=125&q=customizer%20save'
          ], [
            'title' => 'Using the Contextual Help', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=BGgRZvlJVXI&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '0:37', 
            'documentation' => 'support/yootheme-pro/joomla/customizer#contextual-help', 
            'support' => 'support/search?tags=125&q=contextual%20help'
          ], [
            'title' => 'Using the Device Preview Buttons', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=hGErRJcl9ts&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '0:42', 
            'documentation' => 'support/yootheme-pro/joomla/customizer#device-preview-buttons', 
            'support' => 'support/search?tags=125&q=customizer%20device%20preview'
          ], [
            'title' => 'Hide and Adjust the Sidebar', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=xzc6tuF500w&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '0:34', 
            'documentation' => 'support/yootheme-pro/joomla/customizer#hide-and-adjust-sidebar', 
            'support' => 'support/search?tags=125&q=customizer%20hide%20sidebar'
          ]]
      ]
    ], 
    'builder-templates' => [
      'help' => [
        'Templates' => [[
            'title' => 'Managing Templates', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=tNpo1YYWWas&list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:46', 
            'documentation' => 'support/yootheme-pro/joomla/templates', 
            'support' => 'support/search?tags=125&q=templates'
          ], [
            'title' => 'Assigning Templates to Pages', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=d2WX0hGXsDE&list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '4:38', 
            'documentation' => 'support/yootheme-pro/joomla/templates#page-assignment', 
            'support' => 'support/search?tags=125&q=template%20page%20assigment'
          ], [
            'title' => 'Setting the Template Loading Priority', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=03aUKEABQNQ&list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:41', 
            'documentation' => 'support/yootheme-pro/joomla/templates#loading-priority', 
            'support' => 'support/search?tags=125&q=template%20priority'
          ], [
            'title' => 'Setting the Template Status', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=VxuDCh-NE_U&list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:02', 
            'documentation' => 'support/yootheme-pro/joomla/templates#status', 
            'support' => 'support/search?tags=125&q=template%20status'
          ]]
      ]
    ], 
    'settings' => [
      'help' => [[
          'title' => 'Using the Sidebar', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=nZm-qEyGaP4&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '0:55', 
          'documentation' => 'support/yootheme-pro/joomla/customizer#save,-cancel-and-close', 
          'support' => 'support/search?tags=125&q=customizer%20save'
        ], [
          'title' => 'Using the Contextual Help', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=BGgRZvlJVXI&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '0:37', 
          'documentation' => 'support/yootheme-pro/joomla/customizer#contextual-help', 
          'support' => 'support/search?tags=125&q=contextual%20help'
        ], [
          'title' => 'Using the Device Preview Buttons', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=hGErRJcl9ts&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '0:42', 
          'documentation' => 'support/yootheme-pro/joomla/customizer#device-preview-buttons', 
          'support' => 'support/search?tags=125&q=customizer%20device%20preview'
        ], [
          'title' => 'Hide and Adjust the Sidebar', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=xzc6tuF500w&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '0:34', 
          'documentation' => 'support/yootheme-pro/joomla/customizer#hide-and-adjust-sidebar', 
          'support' => 'support/search?tags=125&q=customizer%20hide%20sidebar'
        ]]
    ]
  ], 
  'panels' => [
    'site' => [
      'help' => [
        'Site' => [[
            'title' => 'Adding the Logo', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=UItCS_pSAXA&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '2:25', 
            'documentation' => 'support/yootheme-pro/joomla/site-and-logo#logo', 
            'support' => 'support/search?tags=125&q=logo'
          ], [
            'title' => 'Setting the Page Layout', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=ScYJ-bVJ94s&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:35', 
            'documentation' => 'support/yootheme-pro/joomla/site-and-logo#layout', 
            'support' => 'support/search?tags=125&q=site%20layout'
          ], [
            'title' => 'Using the Toolbar', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=uigKZP3xu-4&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '0:58', 
            'documentation' => 'support/yootheme-pro/joomla/site-and-logo#toolbar', 
            'support' => 'support/search?tags=125&q=toolbar'
          ], [
            'title' => 'Displaying the Breadcrumbs', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=Eiw_1rf3hHE&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:04', 
            'documentation' => 'support/yootheme-pro/joomla/site-and-logo#breadcrumbs', 
            'support' => 'support/search?tags=125&q=breadcrumbs'
          ], [
            'title' => 'Setting the Main Section Height', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=CDeYl5TIfZQ&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '0:46', 
            'documentation' => 'support/yootheme-pro/joomla/site-and-logo#main-section', 
            'support' => 'support/search?tags=125&q=main%20section'
          ]], 
        'Image Field' => [[
            'title' => 'Using Images', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=NHpFpn4UiUM&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '4:37', 
            'documentation' => 'support/yootheme-pro/joomla/files-and-images#images', 
            'support' => 'support/search?tags=125&q=image%20field'
          ], [
            'title' => 'Using the Media Manager', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=2Sgp4BBMTc8&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:32', 
            'documentation' => 'support/yootheme-pro/joomla/files-and-images#media-manager', 
            'support' => 'support/search?tags=125&q=media%20manager'
          ], [
            'title' => 'Using the Unsplash Library', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=6piYezAI4dU&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:50', 
            'documentation' => 'support/yootheme-pro/joomla/files-and-images#unsplash-library', 
            'support' => 'support/search?tags=125&q=unsplash'
          ]]
      ]
    ], 
    'header' => [
      'help' => [[
          'title' => 'Setting the Header Layout', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=5KazxjAM_TA&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '3:51', 
          'documentation' => 'support/yootheme-pro/joomla/header-and-navbar#header-layout', 
          'support' => 'support/search?tags=125&q=header%20layout'
        ], [
          'title' => 'Setting the Navbar', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=oQ1ja29Tl1Y&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '1:09', 
          'documentation' => 'support/yootheme-pro/joomla/header-and-navbar#navbar', 
          'support' => 'support/search?tags=125&q=navbar'
        ], [
          'title' => 'Using the Dropdown Menu', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=98MdMe3CVFM&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '1:12', 
          'documentation' => 'support/yootheme-pro/joomla/header-and-navbar#dropdown', 
          'support' => 'support/search?tags=125&q=navbar%20dropdown'
        ], [
          'title' => 'Setting the Dialog Layout', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=UFx8UeiZv04&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '5:07', 
          'documentation' => 'support/yootheme-pro/joomla/header-and-navbar#dialog-layouts', 
          'support' => 'support/search?tags=125&q=dialog%20layout'
        ], [
          'title' => 'Adding the Search', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=rxmuuMeWWoo&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '1:12', 
          'documentation' => 'support/yootheme-pro/joomla/header-and-navbar#search', 
          'support' => 'support/search?tags=125&q=header%20search'
        ], [
          'title' => 'Adding the Social Icons', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=dlZA9cGlsOg&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '1:55', 
          'documentation' => 'support/yootheme-pro/joomla/header-and-navbar#social-icons', 
          'support' => 'support/search?tags=125&q=header%20social'
        ]]
    ], 
    'mobile' => [
      'help' => [[
          'title' => 'Displaying the Mobile Header', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=CDmPjGek9gU&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '0:59', 
          'documentation' => 'support/yootheme-pro/joomla/mobile-header#visibility', 
          'support' => 'support/search?tags=125&q=mobile%20header%20visibility'
        ], [
          'title' => 'Setting the Mobile Header Layout', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=M7lmXtclWaI&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '1:43', 
          'documentation' => 'support/yootheme-pro/joomla/mobile-header#header-layout', 
          'support' => 'support/search?tags=125&q=mobile%20header%20layout'
        ], [
          'title' => 'Setting the Mobile Navbar', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=LfmHQnco4_s&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '0:58', 
          'documentation' => 'support/yootheme-pro/joomla/mobile-header#navbar', 
          'support' => 'support/search?tags=125&q=mobile%20header%20navbar'
        ], [
          'title' => 'Setting the Mobile Dialog Layout', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=dkbYQgttefg&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '4:23', 
          'documentation' => 'support/yootheme-pro/joomla/mobile-header#dialog-layout', 
          'support' => 'support/search?tags=125&q=mobile%20dialog%20layouts'
        ], [
          'title' => 'Setting the Mobile Search', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=KDbITztgtTE&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '0:59', 
          'documentation' => 'support/yootheme-pro/joomla/mobile-header#search', 
          'support' => 'support/search?tags=125&q=mobile%20search'
        ], [
          'title' => 'Adding the Social Icons', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=uVSjfP4kNqM&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '1:29', 
          'documentation' => 'support/yootheme-pro/joomla/mobile-header#social-icons', 
          'support' => 'support/search?tags=125&q=mobile%20social%20icons'
        ]]
    ], 
    'top' => [
      'help' => [
        'Top and Bottom' => [[
            'title' => 'Setting the Top and Bottom Positions', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=aTsFHYaS9Z8&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:42', 
            'documentation' => 'support/yootheme-pro/joomla/top-bottom-and-sidebar#top-and-bottom', 
            'support' => 'support/search?tags=125&q=top%20bottom%20position%20settings'
          ]], 
        'Image Field' => [[
            'title' => 'Using Images', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=NHpFpn4UiUM&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '4:37', 
            'documentation' => 'support/yootheme-pro/joomla/files-and-images#images', 
            'support' => 'support/search?tags=125&q=image%20field'
          ], [
            'title' => 'Using the Media Manager', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=2Sgp4BBMTc8&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:32', 
            'documentation' => 'support/yootheme-pro/joomla/files-and-images#media-manager', 
            'support' => 'support/search?tags=125&q=media%20manager'
          ], [
            'title' => 'Using the Unsplash Library', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=6piYezAI4dU&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:50', 
            'documentation' => 'support/yootheme-pro/joomla/files-and-images#unsplash-library', 
            'support' => 'support/search?tags=125&q=unsplash'
          ]], 
        'Builder' => [[
            'title' => 'The Position Element', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=DsFY9zkG7Vk&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:55', 
            'documentation' => 'support/yootheme-pro/joomla/system-elements#position-element', 
            'support' => 'support/search?tags=125&q=position%20element'
          ], [
            'title' => 'Collapsing Layouts', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=UT6PODf7p3o&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:44', 
            'documentation' => 'support/yootheme-pro/joomla/collapsing-layouts', 
            'support' => 'support/search?tags=125&q=collapsing'
          ]]
      ]
    ], 
    'sidebar' => [
      'help' => [
        'Sidebar' => [[
            'title' => 'Setting the Sidebar Position', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=_U5BgaiM4RI&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:31', 
            'documentation' => 'support/yootheme-pro/joomla/top-bottom-and-sidebar#sidebar', 
            'support' => 'support/search?tags=125&q=sidebar%20position%20settings'
          ]], 
        'Builder' => [[
            'title' => 'The Position Element', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=DsFY9zkG7Vk&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:55', 
            'documentation' => 'support/yootheme-pro/joomla/system-elements#position-element', 
            'support' => 'support/search?tags=125&q=position%20element'
          ], [
            'title' => 'Collapsing Layouts', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=UT6PODf7p3o&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:44', 
            'documentation' => 'support/yootheme-pro/joomla/collapsing-layouts', 
            'support' => 'support/search?tags=125&q=collapsing'
          ]]
      ]
    ], 
    'bottom' => [
      'help' => [
        'Top and Bottom' => [[
            'title' => 'Setting the Top and Bottom Positions', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=aTsFHYaS9Z8&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:42', 
            'documentation' => 'support/yootheme-pro/joomla/top-bottom-and-sidebar#top-and-bottom', 
            'support' => 'support/search?tags=125&q=top%20bottom%20position%20settings'
          ]], 
        'Image Field' => [[
            'title' => 'Using Images', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=NHpFpn4UiUM&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '4:37', 
            'documentation' => 'support/yootheme-pro/joomla/files-and-images#images', 
            'support' => 'support/search?tags=125&q=image%20field'
          ], [
            'title' => 'Using the Media Manager', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=2Sgp4BBMTc8&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:32', 
            'documentation' => 'support/yootheme-pro/joomla/files-and-images#media-manager', 
            'support' => 'support/search?tags=125&q=media%20manager'
          ], [
            'title' => 'Using the Unsplash Library', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=6piYezAI4dU&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:50', 
            'documentation' => 'support/yootheme-pro/joomla/files-and-images#unsplash-library', 
            'support' => 'support/search?tags=125&q=unsplash'
          ]], 
        'Builder' => [[
            'title' => 'The Position Element', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=DsFY9zkG7Vk&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:55', 
            'documentation' => 'support/yootheme-pro/joomla/system-elements#position-element', 
            'support' => 'support/search?tags=125&q=position%20element'
          ], [
            'title' => 'Collapsing Layouts', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=UT6PODf7p3o&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:44', 
            'documentation' => 'support/yootheme-pro/joomla/collapsing-layouts', 
            'support' => 'support/search?tags=125&q=collapsing'
          ]]
      ]
    ], 
    'footer-builder' => [
      'help' => [
        'Footer Builder' => [[
            'title' => 'Using the Footer Builder', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=vcfQUk7uDlQ&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '0:59', 
            'documentation' => 'support/yootheme-pro/joomla/footer-builder', 
            'support' => 'support/search?tags=125&q=footer%20builder'
          ]], 
        'Builder Module' => [[
            'title' => 'Using the Builder Module', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=msRBkqxnZ18&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:58', 
            'documentation' => 'support/yootheme-pro/joomla/widgets-and-modules#builder-module', 
            'support' => 'support/search?tags=125&q=builder%20module'
          ], [
            'title' => 'Creating Advanced Module Layouts', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=jr09mnXDbIA&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '4:16', 
            'documentation' => 'support/yootheme-pro/joomla/widgets-and-modules#advanced-layouts', 
            'support' => 'support/search?tags=125&q=builder%20module'
          ]]
      ]
    ], 
    'api-key' => [
      'help' => [[
          'title' => 'Updating YOOtheme Pro', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=ErgFc1Zq9j4&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '1:20', 
          'documentation' => 'support/yootheme-pro/joomla/updating', 
          'support' => 'support/search?tags=125&q=update%20yootheme%20pro'
        ], [
          'title' => 'Setting the Minimum Stability', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=MOc5vLImCLw&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '0:47', 
          'documentation' => 'support/yootheme-pro/joomla/updating#minimum-stability', 
          'support' => 'support/search?tags=125&q=minimum%20stability'
        ]]
    ], 
    'advanced' => [
      'fields' => [
        'child_theme' => [
          'label' => 'Child Theme', 
          'description' => 'Select a child theme. Note that different template files will be loaded, and theme settings will be updated respectively. To create a child theme, add a new folder <code>yootheme_NAME</code> in the templates directory, for example <code>yootheme_mytheme</code>.', 
          'type' => 'select', 
          'options' => $config->get('theme.child_themes')
        ], 
        'media_folder' => [
          'label' => 'Media Folder', 
          'description' => 'This folder stores images that you download when using layouts from the YOOtheme Pro library. It\'s located inside the Joomla images folder.'
        ], 
        'page_category' => [
          'label' => 'Page Category', 
          'description' => 'By default, only uncategorized articles are referred as pages. Alternatively, define articles from a specific category as pages.', 
          'type' => 'select', 
          'options' => [[
              'text' => 'None', 
              'value' => ''
            ], [
              'evaluate' => 'yootheme.builder.categories'
            ]]
        ], 
        'search_module' => [
          'label' => 'Search Component', 
          'description' => 'Select whether the default Search or Smart Search is used by the search module and builder element.', 
          'type' => 'select', 
          'options' => [
            'Search' => 'mod_search', 
            'Smart Search' => 'mod_finder'
          ]
        ], 
        'bootstrap' => [
          'label' => 'System Assets', 
          'text' => 'Load Bootstrap', 
          'type' => 'checkbox'
        ], 
        'fontawesome' => [
          'text' => 'Load Font Awesome', 
          'type' => 'checkbox'
        ], 
        'jquery' => [
          'description' => 'Bootstrap is only required when default Joomla template files are loaded, for example for the Joomla frontend editing. Load jQuery to write custom code based on the jQuery JavaScript library.', 
          'text' => 'Load jQuery', 
          'type' => 'checkbox'
        ]
      ]
    ], 
    'about' => [
      'help' => [[
          'title' => 'Opening the Changelog', 
          'src' => 'https://www.youtube-nocookie.com/watch?v=qK4D2RsfBY4&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
          'duration' => '1:05', 
          'documentation' => 'support/yootheme-pro/joomla/updating#changelog', 
          'support' => 'support/search?tags=125&q=changelog'
        ]]
    ], 
    'system-post' => [
      'title' => 'Post', 
      'width' => 400, 
      'fields' => [
        'post.width' => [
          'label' => 'Width', 
          'description' => 'Set the post width. The image and content can\'t expand beyond this width.', 
          'type' => 'select', 
          'options' => [
            'X-Small' => 'xsmall', 
            'Small' => 'small', 
            'Default' => 'default', 
            'Large' => 'large', 
            'X-Large' => 'xlarge', 
            'Expand' => 'expand', 
            'None' => ''
          ]
        ], 
        'post.padding' => [
          'label' => 'Padding', 
          'description' => 'Set the vertical padding.', 
          'type' => 'select', 
          'options' => [
            'Default' => '', 
            'X-Small' => 'xsmall', 
            'Small' => 'small', 
            'Large' => 'large', 
            'X-Large' => 'xlarge'
          ]
        ], 
        'post.padding_remove' => [
          'type' => 'checkbox', 
          'text' => 'Remove top padding'
        ], 
        'post.content_width' => [
          'label' => 'Content Width', 
          'description' => 'Set an optional content width which doesn\'t affect the image.', 
          'type' => 'select', 
          'options' => [
            'Auto' => '', 
            'X-Small' => 'xsmall', 
            'Small' => 'small'
          ], 
          'enable' => 'post.width != \'xsmall\''
        ], 
        'post.image_align' => [
          'label' => 'Image Alignment', 
          'description' => 'Align the image to the top or place it between the title and the content.', 
          'type' => 'select', 
          'options' => [
            'Top' => 'top', 
            'Between' => 'between'
          ]
        ], 
        'post.image_margin' => [
          'label' => 'Image Margin', 
          'description' => 'Set the top margin if the image is aligned between the title and the content.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Default' => 'default', 
            'Medium' => 'medium', 
            'Large' => 'large', 
            'X-Large' => 'xlarge', 
            'None' => 'remove'
          ], 
          'enable' => 'post.image_align == \'between\''
        ], 
        'post.image_dimension' => [
          'type' => 'grid', 
          'description' => 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically, and where possible, high resolution images will be auto-generated.', 
          'fields' => [
            'post.image_width' => [
              'label' => 'Image Width', 
              'width' => '1-2', 
              'attrs' => [
                'placeholder' => 'auto', 
                'lazy' => true
              ]
            ], 
            'post.image_height' => [
              'label' => 'Image Height', 
              'width' => '1-2', 
              'attrs' => [
                'placeholder' => 'auto', 
                'lazy' => true
              ]
            ]
          ]
        ], 
        'post.header_align' => [
          'label' => 'Alignment', 
          'description' => 'Align the title and meta text.', 
          'type' => 'checkbox', 
          'text' => 'Center the title and meta text'
        ], 
        'post.title_margin' => [
          'label' => 'Title Margin', 
          'description' => 'Set the top margin.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Default' => 'default', 
            'Medium' => 'medium', 
            'Large' => 'large', 
            'X-Large' => 'xlarge', 
            'None' => 'remove'
          ]
        ], 
        'post.meta_margin' => [
          'label' => 'Meta Margin', 
          'description' => 'Set the top margin.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Default' => 'default', 
            'Medium' => 'medium', 
            'Large' => 'large', 
            'X-Large' => 'xlarge', 
            'None' => 'remove'
          ]
        ], 
        'post.meta_style' => [
          'label' => 'Meta Style', 
          'description' => 'Display the meta text in a sentence or a horizontal list.', 
          'type' => 'select', 
          'options' => [
            'List' => 'list', 
            'Sentence' => 'sentence'
          ]
        ], 
        'post.content_margin' => [
          'label' => 'Content Margin', 
          'description' => 'Set the top margin.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Default' => 'default', 
            'Medium' => 'medium', 
            'Large' => 'large', 
            'X-Large' => 'xlarge', 
            'None' => 'remove'
          ]
        ], 
        'post.content_dropcap' => [
          'label' => 'Drop Cap', 
          'description' => 'Set a large initial letter that drops below the first line of the first paragraph.', 
          'type' => 'checkbox', 
          'text' => 'Show drop cap'
        ]
      ], 
      'help' => [
        'Post' => [[
            'title' => 'Setting the Post Layout', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=pb9MCdJOz7U&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '0:48', 
            'documentation' => 'support/yootheme-pro/joomla/blog-and-post#post-layout', 
            'support' => 'support/search?tags=125&q=post'
          ], [
            'title' => 'Setting the Post Image', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=6EZtYya-gEY&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '0:54', 
            'documentation' => 'support/yootheme-pro/joomla/blog-and-post#post-image', 
            'support' => 'support/search?tags=125&q=post'
          ], [
            'title' => 'Setting the Post Content', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=R-d6cuP0l9Y&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '0:50', 
            'documentation' => 'support/yootheme-pro/joomla/blog-and-post#post-content', 
            'support' => 'support/search?tags=125&q=post'
          ]], 
        'Creating Individual Post Layouts' => [[
            'title' => 'Creating Individual Post Layouts', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=Fr7dXusK9xI&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '2:22', 
            'documentation' => 'support/yootheme-pro/joomla/pages#individual-post-layout', 
            'support' => 'support/search?tags=125&q=builder'
          ]]
      ]
    ], 
    'system-blog' => [
      'title' => 'Blog', 
      'width' => 400, 
      'fields' => [
        'blog.width' => [
          'label' => 'Width', 
          'description' => 'Set the blog width.', 
          'type' => 'select', 
          'options' => [
            'Default' => 'default', 
            'Small' => 'small', 
            'Large' => 'large', 
            'X-Large' => 'xlarge', 
            'Expand' => 'expand'
          ]
        ], 
        'blog.padding' => [
          'label' => 'Padding', 
          'description' => 'Set the vertical padding.', 
          'type' => 'select', 
          'options' => [
            'Default' => '', 
            'X-Small' => 'xsmall', 
            'Small' => 'small', 
            'Large' => 'large', 
            'X-Large' => 'xlarge'
          ]
        ], 
        'blog.grid_column_gap' => [
          'label' => 'Column Gap', 
          'description' => 'Set the size of the gap between the grid columns. Define the number of columns in the <a href="index.php?option=com_config&view=component&component=com_content#blog_default_parameters">Blog/Featured Layout</a> settings in Joomla.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Medium' => 'medium', 
            'Default' => '', 
            'Large' => 'large', 
            'None' => 'collapse'
          ]
        ], 
        'blog.grid_row_gap' => [
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
        'blog.grid_breakpoint' => [
          'label' => 'Breakpoint', 
          'description' => 'Set the breakpoint from which grid items will stack.', 
          'type' => 'select', 
          'options' => [
            'Small (Phone Landscape)' => 's', 
            'Medium (Tablet Landscape)' => 'm', 
            'Large (Desktop)' => 'l', 
            'X-Large (Large Screens)' => 'xl'
          ]
        ], 
        'blog.grid_masonry' => [
          'label' => 'Masonry', 
          'description' => 'The masonry effect creates a layout free of gaps even if grid items have different heights. ', 
          'type' => 'checkbox', 
          'text' => 'Enable masonry effect'
        ], 
        'blog.grid_parallax' => [
          'label' => 'Parallax', 
          'description' => 'The parallax animation moves single grid columns at different speeds while scrolling. Define the vertical parallax offset in pixels.', 
          'type' => 'range', 
          'attrs' => [
            'min' => 0, 
            'max' => 600, 
            'step' => 10
          ]
        ], 
        'blog.image_align' => [
          'label' => 'Image Alignment', 
          'description' => 'Align the image to the top or place it between the title and the content.', 
          'type' => 'select', 
          'options' => [
            'Top' => 'top', 
            'Between' => 'between'
          ]
        ], 
        'blog.image_margin' => [
          'label' => 'Image Margin', 
          'description' => 'Set the top margin if the image is aligned between the title and the content.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Default' => 'default', 
            'Medium' => 'medium', 
            'Large' => 'large', 
            'X-Large' => 'xlarge', 
            'None' => 'remove'
          ], 
          'enable' => 'blog.image_align == \'between\''
        ], 
        'blog.image_dimension' => [
          'type' => 'grid', 
          'description' => 'Setting just one value preserves the original proportions. The image will be resized and cropped automatically, and where possible, high resolution images will be auto-generated.', 
          'fields' => [
            'blog.image_width' => [
              'label' => 'Image Width', 
              'width' => '1-2', 
              'attrs' => [
                'placeholder' => 'auto', 
                'lazy' => true
              ]
            ], 
            'blog.image_height' => [
              'label' => 'Image Height', 
              'width' => '1-2', 
              'attrs' => [
                'placeholder' => 'auto', 
                'lazy' => true
              ]
            ]
          ]
        ], 
        'blog.header_align' => [
          'label' => 'Alignment', 
          'description' => 'Align the title and meta text as well as the continue reading button.', 
          'type' => 'checkbox', 
          'text' => 'Center the title, meta text and button'
        ], 
        'blog.title_style' => [
          'label' => 'Title Style', 
          'description' => 'Title styles differ in font-size but may also come with a predefined color, size and font.', 
          'type' => 'select', 
          'options' => [
            'None' => '', 
            'H1' => 'h1', 
            'H2' => 'h2', 
            'H3' => 'h3', 
            'H4' => 'h4'
          ]
        ], 
        'blog.title_margin' => [
          'label' => 'Title Margin', 
          'description' => 'Set the top margin.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Default' => 'default', 
            'Medium' => 'medium', 
            'Large' => 'large', 
            'X-Large' => 'xlarge', 
            'None' => 'remove'
          ]
        ], 
        'blog.meta_margin' => [
          'label' => 'Meta Margin', 
          'description' => 'Set the top margin.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Default' => 'default', 
            'Medium' => 'medium', 
            'Large' => 'large', 
            'X-Large' => 'xlarge', 
            'None' => 'remove'
          ]
        ], 
        'blog.content_length' => [
          'label' => 'Content Length', 
          'description' => 'Limit the content length to a number of characters. All HTML elements will be stripped.', 
          'type' => 'number', 
          'attrs' => [
            'placeholder' => 'No limit.'
          ]
        ], 
        'blog.content_margin' => [
          'label' => 'Content Margin', 
          'description' => 'Set the top margin.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Default' => 'default', 
            'Medium' => 'medium', 
            'Large' => 'large', 
            'X-Large' => 'xlarge', 
            'None' => 'remove'
          ]
        ], 
        'blog.content_align' => [
          'label' => 'Content Alignment', 
          'type' => 'checkbox', 
          'text' => 'Center the content'
        ], 
        'blog.button_style' => [
          'label' => 'Button', 
          'description' => 'Select a style for the continue reading button.', 
          'type' => 'select', 
          'options' => [
            'Default' => 'default', 
            'Primary' => 'primary', 
            'Secondary' => 'secondary', 
            'Danger' => 'danger', 
            'Text' => 'text'
          ]
        ], 
        'blog.button_margin' => [
          'label' => 'Button Margin', 
          'description' => 'Set the top margin.', 
          'type' => 'select', 
          'options' => [
            'Small' => 'small', 
            'Default' => 'default', 
            'Medium' => 'medium', 
            'Large' => 'large', 
            'X-Large' => 'xlarge', 
            'None' => 'remove'
          ]
        ], 
        'blog.navigation' => [
          'label' => 'Navigation', 
          'description' => 'Use a numeric pagination or previous/next links to move between blog pages.', 
          'type' => 'select', 
          'options' => [
            'Pagination' => 'pagination', 
            'Previous/Next' => 'previous/next'
          ]
        ], 
        'blog.pagination_startend' => [
          'type' => 'checkbox', 
          'text' => 'Show Start/End links', 
          'show' => 'blog.navigation == \'pagination\''
        ]
      ], 
      'help' => [
        'Blog' => [[
            'title' => 'Setting the Blog Layout', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=ZFRieS43jv8&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '2:14', 
            'documentation' => 'support/yootheme-pro/joomla/blog-and-post#blog-layout', 
            'support' => 'support/search?tags=125&q=blog'
          ], [
            'title' => 'Setting the Blog Image', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=vCx5khrkzuc&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '0:54', 
            'documentation' => 'support/yootheme-pro/joomla/blog-and-post#blog-image', 
            'support' => 'support/search?tags=125&q=blog'
          ], [
            'title' => 'Setting the Blog Content', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=h6zX_rMe1K4&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:05', 
            'documentation' => 'support/yootheme-pro/joomla/blog-and-post#blog-content', 
            'support' => 'support/search?tags=125&q=blog'
          ], [
            'title' => 'Setting the Blog Navigation', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=mT0hItNR4C8&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '0:18', 
            'documentation' => 'support/yootheme-pro/joomla/blog-and-post#blog-navigation', 
            'support' => 'support/search?tags=125&q=navigation'
          ], [
            'title' => 'Displaying the Excerpt', 
            'src' => 'https://www.youtube-nocookie.com/watch?v=96pqkDnG74g&amp;list=PLrqT0WH0HPdPfykSwhMt6Jl2_RgJ6ixU-', 
            'duration' => '1:14', 
            'documentation' => 'support/yootheme-pro/joomla/blog-and-post#excerpt', 
            'support' => 'support/search?tags=125&q=excerpt'
          ]]
      ]
    ]
  ]
];
