<h3>Add a comment</h3>
<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
<?php
echo Form::label(
    'Name',
    'name',
    array('class' => 'control-label')
);

echo Form::input(
    'name',
    Input::post(
        'name',
isset($comment) ? $comment->name : ''
    ),
    array(
        'class' => 'col-md-4 form-control',
        'placeholder' => 'Name'
    )
);
?>

		</div>
		<div class="form-group">
<?php
echo Form::label(
    'Email',
    'email',
    array('class' => 'control-label')
);

echo Form::input(
    'email',
    Input::post(
        'email',
isset($comment) ? $comment->email : ''
    ),
    array(
        'class' => 'col-md-4 form-control',
        'placeholder' => 'Email'
    )
);
?>

		</div>
		<div class="form-group">
<?php
echo Form::label(
    'Content',
    'content',
    array('class' => 'control-label')
);

echo Form::textarea(
    'content',
    Input::post(
        'content',
isset($comment) ? $comment->content : ''
    ),
    array(
        'class' => 'col-md-8 form-control',
        'rows' => 8,
        'placeholder' => 'Content'
    )
);
?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
<?php
echo Form::submit(
    'submit',
    'Save',
    array('class' => 'btn btn-primary')
);
?>
</div>
	</fieldset>
<?php echo Form::close(); ?>