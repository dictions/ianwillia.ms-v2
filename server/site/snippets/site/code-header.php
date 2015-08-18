<!DOCTYPE html>
<?php if (c::get('environment') == 'development'): ?>
<html>
<?php elseif (c::get('environment') == 'production'): ?>
<html manifest="/manifest.cache">
<?php endif ?>
	
<head>
	<?php if($page->isHomepage()): ?>
	<title><?php echo html($site->title()) ?></title>
	<?php else: ?>
	<title><?php echo html($page->title() . ' | ' . $site->title()) ?></title>
	<?php endif ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="/assets/images/favicon-16.png" />
	<link rel="icon" type="image/png" href="/assets/images/favicon-32.png" />

	<!-- OpenGraph -->
	<meta property="og:title" content="<?php echo html($page->title() . ' | ' . $site->title()) ?>" />
	<meta property="og:description" content="American designer/developer based in Appalachia. Currently focusing on building brands and interfaces." />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="http://ianwillia.ms/" />

	<!-- Twitter -->
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@ian_dot_exe" />
	<meta name="twitter:title" content="<?php echo html($page->title() . ' | ' . $site->title()) ?>" />
	<meta name="twitter:description" content="American designer/developer based in Appalachia. Currently focusing on building brands and interfaces." />

	<link rel="stylesheet" type="text/css" href="/assets/styles/_dist/index.css">
	<link rel="stylesheet" href="//f.fontdeck.com/s/css/zH28mslJNSfrEtk/N8vkA5GMvEQ/DOMAIN_NAME/59091.css" type="text/css" />
	<style type="text/css">
	@font-face {
		font-family: 'GTS';
		src: url(/assets/fonts/gt-s-bold.woff);
		font-weight: 800;
		font-style: normal;
	}
	@font-face {
		font-family: 'GTS';
		src: url(/assets/fonts/gt-s-medium.woff);
		font-weight: 400;
		font-style: normal;
	}
	</style>
	
	<style>body.js-load {opacity: 0;}</style>
	
	<?php if (c::get('environment') == 'development'): ?>
	<script src="http://localhost:35729/livereload.js"></script>
	<?php endif ?>
</head>
<body class="no-js" id="body">

<script type="text/javascript">
	document.getElementById('body').className = 'js-load';
</script>