<?php

return function($site, $pages, $page) {
	$hero = $page->files()->find('hero.jpg');
	return compact('hero');
};