<h2>Listing Items</h2>
<br>
<?php if ($items): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($items as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td>
				<?php echo Html::anchor('item/view/'.$item->id, 'View'); ?> |
				<?php echo Html::anchor('item/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('item/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Items.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('item/create', 'Add new Item', array('class' => 'btn btn-success')); ?>

</p>
