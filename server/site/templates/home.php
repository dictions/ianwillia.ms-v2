<?php snippet('site/code-header') ?>
<?php snippet('site/header') ?>

<main>
	<div class="row">
		<h1 class="hero"><?php echo $page->headline() ?></h1>
	</div>

	<?php snippet('home/work') ?>

	<div class="row">
		<section id="about">
			<img src="/assets/images/about-bg.svg">
			<?php echo $page->bio()->kirbytext()?>
			<ul>
				<?php foreach(str::split($page->capabilities()) as $c): ?>
				<li><?php echo $c ?></li>
				<?php endforeach ?>
			</ul>
		</section>
	</div>

	<div id="contact" class="row">
		<?php snippet('contact-form') ?>
	</div>
</main>

<?php snippet('site/footer') ?>
<?php snippet('site/code-footer') ?>