<?php snippet('site/code-header') ?>
<?php snippet('site/header') ?>

<div class="row">
	<h1 class="hero"><?php echo $page->headline() ?></h1>
</div>


<section id="work" class="row">
	<header class="showcase-row">
		<div class="showcase-col" col="medium-3">
			<h2>Work Samples</h2>
		</div>
		<div class="showcase-col legend" hide="large">
			<ol>
				<?php 
					$work = $pages->find('work')->children()->visible();
					$index = 0;
				?>
				<?php foreach ($work as $study): $index++; ?>
				<li><a href="<?php echo $study->url() ?>">Fig <?php echo sprintf("%02d", $index) ?>. — <?php echo $study->short_name() ?></a></li>
				<?php endforeach ?>
			</ol>
		</div>
	</header>
	<div class="showcase-row bottom">
		<a class="showcase-col flush-top" col="7">
			<span annotation="right flush-top">01.</span>
			<figure aspect-ratio="4x3">
				<img lazy-load src="//placehold.it/400x300">
			</figure>
		</a>
		<div class="showcase-col" show="medium">
			<figure aspect-ratio="1x1">
				<img lazy-load src="//placehold.it/300x300">
			</figure>
		</div>
	</div>

	<div class="showcase-row top">
		<a class="showcase-col" col="large-4">
			<span annotation>02.</span>
			<figure aspect-ratio="1x2">
				<img lazy-load src="//placehold.it/400x800">
			</figure>
		</a>
		<a class="showcase-col" col="large-2">
			<span annotation>03.</span>
			<figure aspect-ratio="1x1">
				<img lazy-load src="//placehold.it/400x400">
			</figure>
			<figure aspect-ratio="1x1" show="large">
				<img lazy-load src="//placehold.it/400x400">
			</figure>
			<figure aspect-ratio="1x1" show="large">
				<img lazy-load src="//placehold.it/400x400">
			</figure>
		</a>
		<div class="showcase-col spacer" col="1"></div>
		<div class="showcase-col legend" show="large">
			<ol>
				<?php 
					$work = $pages->find('work')->children()->visible();
					$index = 0;
				?>
				<?php foreach ($work as $study): $index++; ?>
				<li><a href="<?php echo $study->url() ?>">Fig <?php echo sprintf("%02d", $index) ?>. — <?php echo $study->short_name() ?></a></li>
				<?php endforeach ?>
			</ol>
		</div>
	</div>

	<div class="showcase-row top flush">
		<a class="showcase-col">
			<span annotation>04.</span>
			<figure aspect-ratio="4x3">
				<img lazy-load src="//placehold.it/400x300">
			</figure>
		</a>
		<a class="showcase-col">
			<span annotation>05.</span>
			<figure aspect-ratio="4x3">
				<img lazy-load src="//placehold.it/400x300">
			</figure>
		</a>
	</div>

	<div class="showcase-row bottom flush">
		<a class="showcase-col" col="3">
			<span annotation>06.</span>
			<figure aspect-ratio="4x3">
				<img lazy-load src="//placehold.it/400x300">
			</figure>
		</a>
		<a class="showcase-col flush-top">
			<span annotation="left flush-top">07.</span>
			<figure aspect-ratio="4x3">
				<img lazy-load src="//placehold.it/400x300">
			</figure>
		</a>
	</div>

	<div class="showcase-row top">
		<a class="showcase-col flush-top" col="9">
			<span annotation="right flush-top">08.</span>
			<figure aspect-ratio="2x1">
				<img lazy-load src="//placehold.it/400x200">
			</figure>
		</a>
	</div>

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