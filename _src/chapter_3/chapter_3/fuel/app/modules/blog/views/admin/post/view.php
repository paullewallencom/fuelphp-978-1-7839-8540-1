<h2>Viewing #<?php echo $post->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $post->title; ?></p>
<p>
	<strong>Slug:</strong>
	<?php echo $post->slug; ?></p>
<p>
	<strong>Small description:</strong>
	<?php echo $post->small_description; ?></p>
<p>
	<strong>Content:</strong>
	<?php echo $post->content; ?></p>
<p>
	<strong>Category id:</strong>
	<?php echo $post->category_id; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $post->user_id; ?></p>

<?php echo Html::anchor('blog/admin/post/edit/'.$post->id, 'Edit'); ?> |
<?php echo Html::anchor('blog/admin/post', 'Back'); ?>