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
				<?php snippet('img', array('src' => '//placehold.it/400x300')) ?>
			</figure>
		</a>
		<div class="showcase-col" show="medium">
			<div id="ct">
				<figure aspect-ratio="1x1">
					<img ct-src="/assets/images/head_sprite.png">
				</figure>
				<span>ian.ct—2015.03.10</span>
				<div range-track>
					<div range-thumb></div>
				</div>
			</div>
		</div>
	</div>

	<div class="showcase-row top">
		<a class="showcase-col" col="large-4">
			<span annotation>02.</span>
			<figure aspect-ratio="1x2">
				<?php snippet('img', array('src' => '//placehold.it/400x800')) ?>
			</figure>
		</a>
		<a class="showcase-col" col="large-2">
			<span annotation>03.</span>
			<figure aspect-ratio="1x1">
				<?php snippet('img', array('src' => '//placehold.it/400x400')) ?>
			</figure>
			<figure aspect-ratio="1x1" show="large">
				<?php snippet('img', array('src' => '//placehold.it/400x400')) ?>
			</figure>
			<figure aspect-ratio="1x1" show="large">
				<?php snippet('img', array('src' => '//placehold.it/400x400')) ?>
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
				<?php snippet('img', array('src' => '//placehold.it/400x300')) ?>
			</figure>
		</a>
		<a class="showcase-col">
			<span annotation>05.</span>
			<figure aspect-ratio="4x3">
				<?php snippet('img', array('src' => '//placehold.it/400x300')) ?>
			</figure>
		</a>
	</div>

	<div class="showcase-row bottom flush">
		<a class="showcase-col" col="3">
			<span annotation>06.</span>
			<figure aspect-ratio="4x3">
				<?php snippet('img', array('src' => '//placehold.it/400x300')) ?>
			</figure>
		</a>
		<a class="showcase-col flush-top">
			<span annotation="left flush-top">07.</span>
			<figure aspect-ratio="4x3">
				<?php snippet('img', array('src' => '//placehold.it/400x300')) ?>
			</figure>
		</a>
	</div>

	<div class="showcase-row top">
		<a class="showcase-col flush-top" col="9">
			<span annotation="right flush-top">08.</span>
			<figure aspect-ratio="2x1">
				<?php snippet('img', array('src' => '//placehold.it/400x200')) ?>
			</figure>
		</a>
	</div>

</section>