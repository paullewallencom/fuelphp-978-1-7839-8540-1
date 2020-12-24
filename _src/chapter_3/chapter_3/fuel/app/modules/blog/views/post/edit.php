<h2>Editing <span class='muted'>Post</span></h2>
<br>

<?php echo render('post/_form'); ?>
<p>
	<?php echo Html::anchor('blog/post/view/'.$post->id, 'View'); ?> |
	<?php echo Html::anchor('blog/post', 'Back'); ?></p>
