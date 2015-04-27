<footer id="global-footer" class="reset-row">
	<div class="nav-container row">
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