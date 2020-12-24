<?php
return array (
  'active' => Fuel::$env,
  'development' => 
  array (
    'type' => 'mysqli',
    'connection' => 
    array (
      'hostname' => 'localhost',
      'database' => 'chapter_6',
      'username' => 'root',
      'password' => 'root',
      'persistent' => false,
      'compress' => false,
    ),
    'identifier' => '`',
    'table_prefix' => '',
    'charset' => 'utf8',
    'enable_cache' => true,
    'profiling' => true,
  ),
);
