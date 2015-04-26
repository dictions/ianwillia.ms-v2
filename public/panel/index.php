<?php

define('DS', DIRECTORY_SEPARATOR);

// fetch the site's index directory
$index = dirname(dirname(__DIR__));

// load the kirby bootstrapper
require($index . DS. 'server' . DS . 'kirby' . DS . 'bootstrap.php');

// load the panel bootstrapper
require(__DIR__ . DS . 'app' . DS . 'bootstrap.php');

// check for a custom site.php
if(file_exists($index . DS . 'public' . DS . 'site.php')) {
  // load the custom config
  require($index . DS . 'public' . DS . 'site.php');
} else {
  // create a new kirby object
  $kirby = kirby();
}

// fix the base url for the kirby installation
if(!isset($kirby->urls->index)) {
  $kirby->urls->index = dirname($kirby->url());
}

// the default index directory
if(!isset($kirby->roots->index)) {
  $kirby->roots->index = $index;
}

// the default avatar directory
if(!isset($kirby->roots->avatars)) {
  $kirby->roots->avatars = $index . DS . 'public' . DS . 'assets' . DS . 'avatars';
}

// the default thumbs directory
if(!isset($kirby->roots->thumbs)) {
  $kirby->roots->thumbs = $index . DS . 'public' . DS . 'thumbs';
}

// create the panel object
$panel = new Panel($kirby, __DIR__);

// launch the panel
echo $panel->launch();