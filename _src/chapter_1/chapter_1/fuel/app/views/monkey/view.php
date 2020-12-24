<h2>Viewing #<?php echo $monkey->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $monkey->name; ?></p>
<p>
	<strong>Still here:</strong>
	<?php echo $monkey->still_here ? 'Yes' : 'No'; ?></p>
<p>
	<strong>Height:</strong>
	<?php echo $monkey->height; ?></p>
<p>
	<strong>Description:</strong>
	<div><?php echo nl2br($monkey->description); ?></div>

<?php echo Html::anchor('monkey/edit/'.$monkey->id, 'Edit'); ?> |
<?php echo Html::anchor('monkey', 'Back'); ?>