<div class="post_date">
<?php
echo \Date::forge($post->created_at)->format('us_full');
?>
</div>
<div class="post_category">
    Category:
<?php
echo Html::anchor(
    'blog/post/category/'.$post->category->id,
    $post->category->name
);
?>
</div>
<div class="post_author">
    By
<?php echo $post->author->username ?>
</div>