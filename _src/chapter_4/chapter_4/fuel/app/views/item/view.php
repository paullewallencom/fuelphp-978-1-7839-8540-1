<h2>Viewing #<?php echo $item->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $item->name; ?></p>

<?php echo Html::anchor('item/edit/'.$item->id, 'Edit'); ?> |
<?php echo Html::anchor('item', 'Back'); ?>