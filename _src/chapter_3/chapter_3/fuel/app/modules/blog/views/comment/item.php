<div class="comment">
<div class="comment_content">
<?php echo $comment->content; ?>
</div>
<div class="comment_date">
<?php
echo \Date::forge($comment->created_at)->format('us_full');
?>
</div>
<div class="comment_name">
        By
<?php echo $comment->name; ?>
</div>
</div>
