<?php if ($posts): ?>
<?php foreach ($posts as $item): ?>
<div class="post" id="post_<?php echo $item->id; ?>">
<h2>
<?php
echo Html::anchor(
    'blog/post/view/'.$item->slug,
    $item->title
);
?>
</h2>
<?php
/*
As we will display the same information when visualizing a
post, we are implementing them on different views in order
to easily reuse them later in BLOGPATH/views/post/view.php
*/
echo \View::forge(
    'post/small_description',
    array('post' => $item)
);
echo \View::forge(
    'post/additional_informations',
    array('post' => $item)
);
?>
</div>
<?php endforeach; ?>
<?php echo $pagination; ?>
<?php else: ?>
<p>No Posts.</p>
<?php endif; ?>