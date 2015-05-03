<?php

$kirby = kirby();

// custom roots
$kirby->roots->index   = __DIR__;
$kirby->roots->site    = dirname(__DIR__) . DS . 'server' . DS . 'site';
$kirby->roots->content = __DIR__ . DS . 'content';
// $kirby->roots->avatars = __DIR__ . DS . 'public' . DS . 'assets' . DS . 'avatars';
// $kirby->roots->thumbs  = __DIR__ . DS . 'public' . DS . 'thumbs';
$kirby->urls->content = $kirby->urls()->index() . DS . 'content';
// $kirby->urls->avatars = $kirby->urls()->index() . DS . 'assets/avatars';
// $kirby->urls->thumbs  = $kirby->urls()->index() . DS . 'thumbs';