<?php
return array (
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
  'my_first_application_monkey' => 
  array (
    'title' => 'My first application Monkey',
    'desc' => '',
    'urlEnhancer' => 'my_first_application/front/monkey/main',
    'i18n_application' => 'my_first_application',
    'application' => 'my_first_application',
  ),
);
