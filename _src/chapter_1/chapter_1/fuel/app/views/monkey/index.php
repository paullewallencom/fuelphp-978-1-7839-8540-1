<h2>Listing Monkeys</h2>
<br>
<?php if ($monkeys): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Still here</th>
			<th>Height</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($monkeys as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->still_here ? 'Yes' : 'No'; ?></td>
			<td><?php echo $item->height; ?></td>
			<td>
				<?php echo Html::anchor('monkey/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('monkey/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('monkey/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Monkeys.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('monkey/create', 'Add new Monkey', array('class' => 'btn btn-success')); ?>

</p>
