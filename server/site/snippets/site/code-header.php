<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta charset="UTF-8">

	<noscript>
		<link rel="stylesheet" type="text/css" href="/assets/styles/_dist/index.css">
		<link rel="stylesheet" type="text/css" href="/assets/fonts/fonts.css">
	</noscript>
	
	<style>body.js-load {opacity: 0;}</style>
	
	<?php if (c::get('environment') == 'development'): ?>
	<script src="http://localhost:35729/livereload.js"></script>
	<?php endif ?>
</head>
<body class="no-js" id="body">

<script type="text/javascript">
	document.getElementById('body').className = 'js-load';
</script>