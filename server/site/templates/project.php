<?php snippet('site/code-header') ?>
<?php snippet('site/header') ?>

<main>

	<header class="project-hero" aspect-ratio="hero">
		<img data-src="<?php echo $page->files()->find('hero.jpg')->url() ?>">
	</header>

	<div class="row project-content">
		<div class="main">
			<h1><?php echo $page->title() ?></h1>
			<?php echo $page->intro()->kirbytext() ?>
		</div>

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

		<section class="pagination">
			<a href="<?php echo $prev->url()?>" class="cta-group">
				<span class="cta">previous project</span><br>
				<span class="cta"><?php echo $prev->title()?></span>
			</a>
			<a href="<?php echo $next->url()?>" class="cta-group">
				<span class="cta">next project</span><br>
				<span class="cta"><?php echo $next->title()?></span>
			</a>
		</section>
	</div>

</main>

<?php snippet('site/footer') ?>
<?php snippet('site/code-footer') ?>