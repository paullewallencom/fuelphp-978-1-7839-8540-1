<?php echo Form::open(array("class"=>"form-horizontal")); ?>
<?php echo Form::csrf(); ?>


	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', Input::post('title', isset($post) ? $post->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Small description', 'small_description', array('class'=>'control-label')); ?>

<?php
echo Form::textarea(
    'small_description',
    Input::post(
        'small_description',
isset($post) ? $post->small_description : ''
    ),
    array(
        'class' => 'col-md-4 form-control',
        'placeholder' => 'Small description',
        'rows' => 4,
        'maxlength' => 200,
    )
);
?>


		</div>
		<div class="form-group">
			<?php echo Form::label('Content', 'content', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('content', Input::post('content', isset($post) ? $post->content : ''), array('class' => 'col-md-8 form-control wysiwyg', 'rows' => 8, 'placeholder'=>'Content')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Category', 'category_id', array('class'=>'control-label')); ?>

<div>
<?php
$select_box = \Presenter::forge('admin/category/selector');

// Other way to set a view parameter; sets the $category_id
// variable.
$select_box->set(
    'category_id',
    Input::post(
        'category_id',
isset($post) ? $post->category_id : null
    )
);

echo $select_box;
?>
</div>


		</div>
		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class'=>'control-label')); ?>

<div>
<?php
/*
This field is not editable, so we simply display the author.
current_user is a global variable that defines the current
logged user.
*/
$author = isset($post) ? $post->author : $current_user;
echo $author->username;
?>
</div>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>