<?php snippet('site/code-header') ?>
<?php snippet('site/header') ?>

<div class="row">
	<h1 class="hero"><?php echo $page->headline() ?></h1>
</div>

<?php $work = $pages->find('work')->children()->visible() ?>
<section id="work" class="row">
	<?php foreach ($work as $study): ?>
	<a href="<?php echo $study->url() ?>"><h2><?php echo $study->title() ?></h2></a>
	<?php endforeach ?>
</section>


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

<div class="row">
	<?php snippet('contact-form') ?>
</div>

<?php snippet('site/footer') ?>
<?php snippet('site/code-footer') ?>