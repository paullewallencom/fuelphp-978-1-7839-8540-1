<?php
return array (
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
);
