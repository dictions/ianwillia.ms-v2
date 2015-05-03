<?php foreach(yaml($section->images()) as $row):?>
	<?php var_dump($row) ?>
<section>
	<h3><?php echo $key ?></h3>
	<?php echo kirbytext($section) ?>
</section>
<?php endforeach ?>