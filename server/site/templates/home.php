<?php snippet('site/code-header') ?>
<?php snippet('site/header') ?>

<div class="row">
	<h1 class="hero"><?php echo $page->headline() ?></h1>
</div>

<section id="work" class="row">
	<a href="/work/crowdnoize">Crowdnoize</a>
	<a href="/work/greenhouse-go">GHG</a>
	<a href="/work/authff">Authff</a>
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