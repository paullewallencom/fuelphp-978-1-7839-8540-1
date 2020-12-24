<?php
return array (
  'noviusos_appmanager' => 
  array (
    'name' => 'Applications manager',
    'namespace' => 'Nos\\Appmanager',
    'version' => '5.0.1 (Elche)',
    'provider' => 
    array (
      'name' => 'Novius OS',
    ),
    'i18n_file' => 'noviusos_appmanager::metadata',
    'permission' => 
    array (
    ),
    'launchers' => 
    array (
      'noviusos_appmanager' => 
      array (
        'name' => 'Applications manager',
        'action' => 
        array (
          'action' => 'nosTabs',
          'tab' => 
          array (
            'label' => 'Applications manager',
            'url' => 'admin/noviusos_appmanager/appmanager',
            'iconUrl' => 'static/apps/noviusos_appmanager/img/32/app-manager.png',
          ),
        ),
        'i18n_application' => 'noviusos_appmanager',
        'application' => 'noviusos_appmanager',
      ),
    ),
    'icons' => 
    array (
      64 => 'static/apps/noviusos_appmanager/img/64/app-manager.png',
      32 => 'static/apps/noviusos_appmanager/img/32/app-manager.png',
      16 => 'static/apps/noviusos_appmanager/img/16/app-manager.png',
    ),
  ),
  'noviusos_media' => 
  array (
    'name' => 'Media Centre',
    'namespace' => 'Nos\\Media',
    'version' => '5.0.1 (Elche)',
    'provider' => 
    array (
      'name' => 'Novius OS',
    ),
    'permission' => 
    array (
    ),
    'i18n_file' => 'noviusos_media::metadata',
    'launchers' => 
    array (
      'noviusos_media' => 
      array (
        'name' => 'Media Centre',
        'action' => 
        array (
          'action' => 'nosTabs',
          'tab' => 
          array (
            'url' => 'admin/noviusos_media/appdesk/index',
          ),
        ),
        'i18n_application' => 'noviusos_media',
        'application' => 'noviusos_media',
      ),
    ),
    'icons' => 
    array (
      64 => 'static/apps/noviusos_media/img/media-64.png',
      32 => 'static/apps/noviusos_media/img/media-32.png',
      16 => 'static/apps/noviusos_media/img/media-16.png',
    ),
  ),
  'noviusos_menu' => 
  array (
    'name' => 'Website menus',
    'namespace' => 'Nos\\Menu',
    'version' => '5.0.1 (Elche)',
    'provider' => 
    array (
      'name' => 'Novius OS',
    ),
    'i18n_file' => 'noviusos_menu::metadata',
    'permission' => 
    array (
    ),
    'launchers' => 
    array (
      'noviusos_menu' => 
      array (
        'name' => 'Website menus',
        'action' => 
        array (
          'action' => 'nosTabs',
          'tab' => 
          array (
            'url' => 'admin/noviusos_menu/menu/appdesk',
          ),
        ),
        'i18n_application' => 'noviusos_menu',
        'application' => 'noviusos_menu',
      ),
    ),
    'icons' => 
    array (
      64 => 'static/apps/noviusos_menu/img/64/menu.png',
      32 => 'static/apps/noviusos_menu/img/32/menu.png',
      16 => 'static/apps/noviusos_menu/img/16/menu.png',
    ),
  ),
  'noviusos_page' => 
  array (
    'name' => 'Webpages',
    'namespace' => 'Nos\\Page',
    'version' => '5.0.1 (Elche)',
    'provider' => 
    array (
      'name' => 'Novius OS 1',
    ),
    'permission' => 
    array (
    ),
    'i18n_file' => 'noviusos_page::metadata',
    'launchers' => 
    array (
      'noviusos_page' => 
      array (
        'name' => 'Webpages',
        'action' => 
        array (
          'action' => 'nosTabs',
          'tab' => 
          array (
            'url' => 'admin/noviusos_page/appdesk/index',
          ),
        ),
        'i18n_application' => 'noviusos_page',
        'application' => 'noviusos_page',
      ),
    ),
    'icons' => 
    array (
      64 => 'static/apps/noviusos_page/img/64/page.png',
      32 => 'static/apps/noviusos_page/img/32/page.png',
      16 => 'static/apps/noviusos_page/img/16/page.png',
    ),
  ),
  'noviusos_template_variation' => 
  array (
    'name' => 'Template variation manager',
    'namespace' => 'Nos\\Template\\Variation',
    'version' => '5.0.1 (Elche)',
    'provider' => 
    array (
      'name' => 'Novius OS',
    ),
    'i18n_file' => 'noviusos_template_variation::metadata',
    'permission' => 
    array (
    ),
    'launchers' => 
    array (
      'noviusos_template_variation' => 
      array (
        'name' => 'Template variations',
        'action' => 
        array (
          'action' => 'nosTabs',
          'tab' => 
          array (
            'url' => 'admin/noviusos_template_variation/appdesk/index',
          ),
        ),
        'i18n_application' => 'noviusos_template_variation',
        'application' => 'noviusos_template_variation',
      ),
    ),
    'icons' => 
    array (
      64 => 'static/apps/noviusos_template_variation/img/64/template-variation.png',
      32 => 'static/apps/noviusos_template_variation/img/32/template-variation.png',
      16 => 'static/apps/noviusos_template_variation/img/16/template-variation.png',
    ),
  ),
  'noviusos_user' => 
  array (
    'name' => 'Users',
    'namespace' => 'Nos\\User',
    'version' => '5.0.1 (Elche)',
    'provider' => 
    array (
      'name' => 'Novius OS',
    ),
    'permission' => 
    array (
    ),
    'i18n_file' => 'noviusos_user::metadata',
    'launchers' => 
    array (
      'noviusos_user' => 
      array (
        'name' => 'Users',
        'url' => 'admin/noviusos_user/appdesk',
        'action' => 
        array (
          'action' => 'nosTabs',
          'tab' => 
          array (
            'url' => 'admin/noviusos_user/appdesk',
            'iconUrl' => 'static/apps/noviusos_user/img/32/user.png',
          ),
        ),
        'i18n_application' => 'noviusos_user',
        'application' => 'noviusos_user',
      ),
      'noviusos_account' => 
      array (
        'name' => 'My account',
        'action' => 
        array (
          'action' => 'nosTabs',
          'tab' => 
          array (
            'label' => 'My account',
            'url' => 'admin/noviusos_user/account',
            'iconUrl' => 'static/apps/noviusos_user/img/32/myaccount.png',
          ),
        ),
        'icon' => 'static/apps/noviusos_user/img/64/myaccount.png',
        'application' => false,
        'i18n_application' => 'noviusos_user',
      ),
    ),
    'icons' => 
    array (
      64 => 'static/apps/noviusos_user/img/64/user.png',
      32 => 'static/apps/noviusos_user/img/32/user.png',
      16 => 'static/apps/noviusos_user/img/16/user.png',
    ),
  ),
  'noviusos_template_bootstrap' => 
  array (
    'name' => 'Novius OS Bootstrap customisable template',
    'version' => '5.0.1 (Elche)',
    'provider' => 
    array (
      'name' => 'Novius OS',
    ),
    'namespace' => 'Nos\\Templates\\Bootstrap',
    'i18n_file' => 'noviusos_template_bootstrap::metadata',
    'launchers' => 
    array (
    ),
    'enhancers' => 
    array (
    ),
    'templates' => 
    array (
      'noviusos_bootstrap_customisable' => 
      array (
        'file' => 'noviusos_template_bootstrap::common',
        'title' => 'Bootstrap customisable template',
        'cols' => 12,
        'rows' => 12,
        'layout' => 
        array (
          'content1' => '0,0,12,12',
        ),
        'module' => '',
        'i18n_application' => 'noviusos_template_bootstrap',
        'application' => 'noviusos_template_bootstrap',
      ),
    ),
  ),
  'noviusos_blognews' => 
  array (
    'name' => 'BlogNews',
    'version' => '5.0.1 (Elche)',
    'provider' => 
    array (
      'name' => 'Novius Dev',
    ),
    'namespace' => 'Nos\\BlogNews',
    'i18n_file' => 'noviusos_blognews::metadata',
    'icons' => 
    array (
      16 => 'static/novius-os/admin/novius-os/img/16/application.png',
      32 => 'static/novius-os/admin/novius-os/img/32/application.png',
      64 => 'static/novius-os/admin/novius-os/img/64/application.png',
    ),
  ),
  'noviusos_comments' => 
  array (
    'name' => 'Comments',
    'version' => '5.0.1 (Elche)',
    'provider' => 
    array (
      'name' => 'NoviusOS',
    ),
    'namespace' => 'Nos\\Comments',
    'permission' => 
    array (
    ),
    'i18n_file' => 'noviusos_comments::metadata',
    'icons' => 
    array (
      16 => 'static/apps/noviusos_comments/img/comment-16.png',
      32 => 'static/apps/noviusos_comments/img/comment-32.png',
      64 => 'static/apps/noviusos_comments/img/comment-64.png',
    ),
    'launchers' => 
    array (
      'noviusos_comments' => 
      array (
        'name' => 'Comments',
        'action' => 
        array (
          'action' => 'nosTabs',
          'tab' => 
          array (
            'url' => 'admin/noviusos_comments/comment/appdesk',
          ),
        ),
        'i18n_application' => 'noviusos_comments',
        'application' => 'noviusos_comments',
      ),
    ),
  ),
  'noviusos_blog' => 
  array (
    'name' => 'Blog',
    'version' => '5 (Elche)',
    'provider' => 
    array (
      'name' => 'Novius OS',
    ),
    'namespace' => 'Nos\\BlogNews\\Blog',
    'permission' => 
    array (
    ),
    'requires' => 
    array (
      0 => 'noviusos_blognews',
      1 => 'noviusos_comments',
    ),
    'extends' => 
    array (
      0 => 'noviusos_menu',
    ),
    'i18n_file' => 'noviusos_blog::metadata',
    'launchers' => 
    array (
      'noviusos_blog' => 
      array (
        'name' => 'Blog',
        'action' => 
        array (
          'action' => 'nosTabs',
          'tab' => 
          array (
            'url' => 'admin/noviusos_blog/appdesk',
          ),
        ),
        'i18n_application' => 'noviusos_blog',
        'application' => 'noviusos_blog',
      ),
    ),
    'enhancers' => 
    array (
      'noviusos_blog_home' => 
      array (
        'title' => 'Links to blog posts (e.g. for side column)',
        'desc' => '',
        'enhancer' => 'noviusos_blog/front/home',
        'iconUrl' => 'static/apps/noviusos_blog/img/blog-16.png',
        'dialog' => 
        array (
          'contentUrl' => 'admin/noviusos_blog/enhancer/popup',
          'width' => 370,
          'height' => 410,
          'ajax' => true,
        ),
        'i18n_application' => 'noviusos_blog',
        'application' => 'noviusos_blog',
      ),
      'noviusos_blog' => 
      array (
        'title' => 'Blog',
        'desc' => '',
        'urlEnhancer' => 'noviusos_blog/front/main',
        'iconUrl' => 'static/apps/noviusos_blog/img/blog-16.png',
        'dialog' => 
        array (
          'contentUrl' => 'admin/noviusos_blog/enhancer/popup',
          'width' => 370,
          'height' => 410,
          'ajax' => true,
        ),
        'i18n_application' => 'noviusos_blog',
        'application' => 'noviusos_blog',
      ),
    ),
    'data_catchers' => 
    array (
      'noviusos_blog' => 
      array (
        'title' => 'Blog',
        'description' => '',
        'iconUrl' => 'static/apps/noviusos_blog/img/blog-16.png',
        'action' => 
        array (
          'action' => 'nosTabs',
          'tab' => 
          array (
            'url' => 'admin/noviusos_blog/post/insert_update/?context={{context}}&title={{urlencode:title}}&summary={{urlencode:text}}&thumbnail={{urlencode:image}}',
            'label' => 'Add a post',
            'iconUrl' => 'static/apps/noviusos_blog/img/blog-16.png',
          ),
        ),
        'onDemand' => true,
        'specified_models' => false,
        'required_data' => 
        array (
          0 => 'title',
        ),
        'optional_data' => 
        array (
          0 => 'text',
          1 => 'image',
        ),
      ),
    ),
    'icons' => 
    array (
      16 => 'static/apps/noviusos_blog/img/blog-16.png',
      32 => 'static/apps/noviusos_blog/img/blog-32.png',
      64 => 'static/apps/noviusos_blog/img/blog-64.png',
    ),
  ),
  'noviusos_appwizard' => 
  array (
    'name' => '‘Build your app’ wizard',
    'version' => '5.0.1 (Elche)',
    'provider' => 
    array (
      'name' => 'Novius OS',
    ),
    'namespace' => 'Nos\\AppWizard',
    'permission' => 
    array (
    ),
    'i18n_file' => 'noviusos_appwizard::metadata',
    'launchers' => 
    array (
      'noviusos_appwizard' => 
      array (
        'name' => '‘Build your app’ wizard',
        'action' => 
        array (
          'action' => 'nosTabs',
          'tab' => 
          array (
            'url' => 'admin/noviusos_appwizard/application',
          ),
        ),
        'i18n_application' => 'noviusos_appwizard',
        'application' => 'noviusos_appwizard',
      ),
    ),
    'icons' => 
    array (
      16 => 'static/apps/noviusos_appwizard/img/icons/appwizard-16.png',
      32 => 'static/apps/noviusos_appwizard/img/icons/appwizard-32.png',
      64 => 'static/apps/noviusos_appwizard/img/icons/appwizard-64.png',
    ),
  ),
  'my_first_application' => 
  array (
    'name' => 'My first application',
    'version' => 'WIP',
    'provider' => 
    array (
      'name' => 'Unknown',
    ),
    'namespace' => 'MyFirstApplication',
    'permission' => 
    array (
    ),
    'icons' => 
    array (
      64 => 'static/apps/my_first_application/img/64/icon.png',
      32 => 'static/apps/my_first_application/img/32/icon.png',
      16 => 'static/apps/my_first_application/img/16/icon.png',
    ),
    'launchers' => 
    array (
      'MyFirstApplication::Monkey' => 
      array (
        'name' => 'Monkey',
        'action' => 
        array (
          'action' => 'nosTabs',
          'tab' => 
          array (
            'url' => 'admin/my_first_application/monkey/appdesk',
          ),
        ),
        'i18n_application' => 'my_first_application',
        'application' => 'my_first_application',
      ),
    ),
    'enhancers' => 
    array (
      'my_first_application_monkey' => 
      array (
        'title' => 'My first application Monkey',
        'desc' => '',
        'urlEnhancer' => 'my_first_application/front/monkey/main',
        'i18n_application' => 'my_first_application',
        'application' => 'my_first_application',
      ),
    ),
  ),
);
