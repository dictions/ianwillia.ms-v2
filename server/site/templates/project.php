<?php snippet('site/code-header') ?>
<?php snippet('site/header') ?>

<header class="slideshow">
	<img src="<?php echo $hero->url() ?>">
</header>

<div class="row project-content">
	<main>
		<h1><?php echo $page->title() ?></h1>
		<?php echo $page->intro()->kirbytext() ?>
	</main>

	<aside>
		<h2 class="overview">Overview</h2>

		<?php $metadata = yaml($page->overview()) ?>
		<?php foreach($metadata as $key => $section):?>
		<section>
			<h3><?php echo $key ?></h3>
			<?php echo kirbytext($section) ?>
		</section>
		<?php endforeach ?>
	</aside>
</div>

<div class="row">
	<?php foreach($page->children() as $section): ?>
		<?php snippet('project/' . $section->uid(), array('section' => $section)) ?>
	<?php endforeach ?>
	
	<?php 
		$prev = $page->prev();
		$next = $page->next();
		if (!$prev) $prev = $pages->find('work')->children()->visible()->last();
		if (!$next) $next = $pages->find('work')->children()->visible()->first();
	?>
	<?php snippet('project/pagination', array('prev' => $prev, 'next' => $next)) ?>
</div>

<?php snippet('site/footer') ?>
<?php snippet('site/code-footer') ?>