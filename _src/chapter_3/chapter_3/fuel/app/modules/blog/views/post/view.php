<div class="post_view">
<h2>
<?php echo $post->title; ?>
</h2>

<?php
// Reusing views we created earlier
echo \View::forge(
    'post/small_description',
    array('post' => $post)
);
?>
<div class="post_content">
<?php echo $post->content; ?>
</div>
<?php
echo \View::forge(
    'post/additional_informations',
    array('post' => $post)
);
?>
</div>
<?php echo Html::anchor('blog/post', 'Back'); ?>
<div class="comments">
<?php
foreach ($post->published_comments as $comment):
    echo \View::forge(
        'comment/item',
        array('comment' => $comment)
    );
endforeach;
?>
</div>

<?php echo View::forge('comment/_form'); ?>