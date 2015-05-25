<footer id="global-footer">
	<div class="nav-container row">
		<span class="logo"><img src="/assets/images/logo.svg"></span>
		<nav>
			<ul>
				<?php $links = yaml($site->links()) ?>
				<?php foreach($links as $key => $url):?>
				<li>
					<a class="redirect" href="<?php echo $url ?>" target="_blank" title="<?php echo $key ?>"><?php echo $key ?></a>
				</li>
				<?php endforeach ?>
			</ul>
		</nav>
		<nav>
			<ul class="copyright">
				<li><?php echo $site->copyright()->kirbytext() ?></li>
			</ul>
		</nav>
	</div>
</footer>