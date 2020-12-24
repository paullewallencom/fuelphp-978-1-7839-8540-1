<h2>Listing Posts</h2>
<br>
<?php if ($posts): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Category</th>
			<th>User</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($posts as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->category->name; ?></td>
			<td><?php echo $item->author->username; ?></td>
			<td>
				<?php echo Html::anchor('blog/admin/post/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('blog/admin/post/delete/'.$item->id.'?'.\Config::get('security.csrf_token_key').'='.\Security::fetch_token(), 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Posts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('blog/admin/post/create', 'Add new Post', array('class' => 'btn btn-success')); ?>

</p>