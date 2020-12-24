<h2>Viewing <span class='muted'>#<?php echo $project->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $project->name; ?></p>

<?php echo render('task/list', array('project' => $project)); ?>

<?php echo Html::anchor('project/edit/'.$project->id, 'Edit'); ?> |
<?php echo Html::anchor('project', 'Back'); ?>