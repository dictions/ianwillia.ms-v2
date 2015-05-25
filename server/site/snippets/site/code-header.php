<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<noscript>
<link rel="stylesheet" type="text/css" href="/assets/styles/_dist/index.css">
<link rel="stylesheet" type="text/css" href="/assets/fonts/fonts.css">
</noscript>
<meta charset="UTF-8">
<style>body.js-load {opacity: 0;}</style>
<script type="text/javascript">
var DEVELOPMENT = false;
</script>
<?php if (c::get('environment') == 'development'): ?>
<script src="http://localhost:35729/livereload.js"></script>
<script type="text/javascript">
DEVELOPMENT = true;
</script>
<?php endif ?>
<script type="text/javascript">
var GLOBAL_MODULES = {
	form: false,
};
</script>
</head>
<body class="no-js" id="body">
<script type="text/javascript">
document.getElementById('body').className = 'js-load';
</script>