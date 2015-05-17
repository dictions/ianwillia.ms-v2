<?php snippet('site/code-header') ?>
<?php snippet('site/header') ?>

<div class="row">
	<h1 class="hero"><?php echo $page->headline() ?></h1>
</div>


<section id="work" class="row">
	<div class="work-row">
		<div class="work-col big">
			<div>
				<img src="//placehold.it/700x500/e0e1ee/e0e1ee" style="margin-top: 0;">
				<a href="" class="button absolute top">—Greenhouse Go</a>
				<a href="" class="button absolute">—Greenhouse Go</a>
			</div>
			<div>
				<img src="//placehold.it/700x700/e0e1ee/e0e1ee">
				<a href="" class="button absolute">—Greenhouse Go</a>
			</div>
			<div>
				<img src="//placehold.it/700x700/e0e1ee/e0e1ee">
			</div>
			<div>
				<img src="//placehold.it/700x700/e0e1ee/e0e1ee">
				<a href="" class="button absolute neg-top">—Greenhouse Go</a>
			</div>
			<div style="width: 50%; float: right">
				<img style="margin-top: 0;" src="//placehold.it/400x700/e0e1ee/e0e1ee">
				<a href="" class="button absolute right" style="top: 0">—Greenhouse Go</a>
			</div>
		</div>
		<div class="work-col">
			<div>
				<img src="//placehold.it/400x800/e0e1ee/e0e1ee">
				<a href="" class="button absolute right">—Greenhouse Go</a>
			</div>
			<div>
				<img src="//placehold.it/400x600/e0e1ee/e0e1ee">
				<a href="" class="button absolute right">—Greenhouse Go</a>
			</div>
			<div>
				<img src="//placehold.it/400x800/e0e1ee/e0e1ee">
				<a href="" class="button absolute right">—Greenhouse Go</a>
			</div>
			<div>
				<img src="//placehold.it/400x600/e0e1ee/e0e1ee">
			</div>
		</div>
	</div>
</section>

<?php $work = $pages->find('work')->children()->visible() ?>
<!-- <section class="row">
	<?php foreach ($work as $study): ?>
	<a href="<?php echo $study->url() ?>"><h2><?php echo $study->title() ?></h2></a>
	<?php endforeach ?>
</section> -->


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