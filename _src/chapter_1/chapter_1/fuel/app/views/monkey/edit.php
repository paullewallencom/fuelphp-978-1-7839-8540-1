<h2>Editing Monkey</h2>
<br>

<?php echo render('monkey/_form'); ?>
<p>
	<?php echo Html::anchor('monkey/view/'.$monkey->id, 'View'); ?> |
	<?php echo Html::anchor('monkey', 'Back'); ?></p>
