<h2>Listing Comments</h2>
<br>
<?php if ($comments): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Status</th>
			<th>Post</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($comments as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td><?php echo $item->status; ?></td>
			<td>
            <?php
            echo $item->post ? $item->post->title : '<i>Post deleted</i>';
            ?>
            </td>

			<td>
				<?php echo Html::anchor('blog/admin/comment/edit/'.$item->id, 'Edit'); ?> |
				<?php echo Html::anchor('blog/admin/comment/delete/'.$item->id.'?'.\Config::get('security.csrf_token_key').'='.\Security::fetch_token(), 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Comments.</p>

<?php endif; ?><p>

</p>
