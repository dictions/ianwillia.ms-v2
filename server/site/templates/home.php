<?php snippet('site/code-header') ?>
<?php snippet('site/header') ?>

<h1 class="hero"><?php echo $page->headline() ?></h1>

<section id="work">
	<a href="/work/crowdnoize">Crowdnoize</a>
	<a href="/work/greenhouse-go">GHG</a>
	<a href="/work/authff">Authff</a>
</section>



<section id="about">
	<p><?php echo $page->bio() ?></p>
	<ul>
		<?php foreach(str::split($page->capabilities()) as $c): ?>
		<li><?php echo $c ?></li>
		<?php endforeach ?>
	</ul>
</section>

<?php snippet('contact-form') ?>

<?php snippet('site/footer') ?>
<?php snippet('site/code-footer') ?>