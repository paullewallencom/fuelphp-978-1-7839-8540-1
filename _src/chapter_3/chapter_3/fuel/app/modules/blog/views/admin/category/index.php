<h2>Listing Categories</h2>
<br>
<?php if ($categories): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
            <th>Number of posts</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($categories as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
            <td><?php echo $item->nb_posts ?></td>
			<td>
				<?php echo Html::anchor('blog/admin/category/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('blog/admin/category/delete/'.$item->id.'?'.\Config::get('security.csrf_token_key').'='.\Security::fetch_token(), 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Categories.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('blog/admin/category/create', 'Add new Category', array('class' => 'btn btn-success')); ?>

</p>
