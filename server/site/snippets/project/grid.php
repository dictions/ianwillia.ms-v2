<?php $rows = yaml($section->grid()) ?>
<?php foreach($rows as $row):?>
<div class="image-row">
	<?php foreach($row as $image):?>
	<div class="image-col">
		<img src="/content/<?php echo $section->diruri() . '/' . $image ?>">
	</div>
	<?php endforeach ?>
</div>
<?php endforeach ?>