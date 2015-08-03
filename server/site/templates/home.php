<?php snippet('site/code-header') ?>
<?php snippet('site/header') ?>

<main>
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
					<?php snippet('img', array('src' => '/assets/images/home/formlets.jpg')) ?>
				</figure>
			</a>
			<a class="showcase-col hdickenson" col="large-2">
				<span annotation>03.</span>
				<figure aspect-ratio="1x1" show="large">
					<?php snippet('img', array('src' => '/assets/images/home/tent.gif')) ?>
				</figure>
				<figure aspect-ratio="1x1" show="large">
					<?php snippet('img', array('src' => '/assets/images/home/logo.gif')) ?>
				</figure>
				<figure aspect-ratio="1x1">
					<?php snippet('img', array('src' => '/assets/images/home/postmark.gif')) ?>
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
		<form action="/form" method="post">
			<div>
				<fieldset>
					<input class="input" name="fullname" type="text" placeholder="Full Name*" validate-required>
					<span class="error" data-required="Full Name is required*"></span>
				</fieldset>
				<fieldset>
					<input name="email" class="input" type="email" placeholder="Email*" validate-required validate-email>
					<span class="error" data-required="Email is required*" data-email="Invalid email*"></span>
				</fieldset>
			</div>
			<div>
				<fieldset class="select">
					<label>Estimated Timeline</label>
					<select name="timeline">
						<option>1 week</option>
						<option>1 Month</option>
						<option>6 Months</option>
						<option>1 Year</option>
						<option>Ongoing or not sure</option>
					</select>
				</fieldset>
				<fieldset class="select">
					<label>Budget</label>
					<select name="budget">
						<option>$1,000-$5,000</option>
						<option>$5,000-$10,000</option>
						<option>$10,000-$25,000</option>
						<option>$25,000+</option>
						<option>Not sure</option>
					</select>
				</fieldset>
			</div>
			<div>
				<fieldset>
					<textarea name="message" class="input" placeholder="What are you working on?*" validate-required></textarea>
					<span class="error" data-required="What are you working on?*"></span>
				</fieldset>
			</div>
			<p class="alert">
				<span></span>
			</p>
			<button class="submit">Submit Project Inquiry</button>
		</form>
	</div>
</main>

<?php snippet('site/footer') ?>
<?php snippet('site/code-footer') ?>