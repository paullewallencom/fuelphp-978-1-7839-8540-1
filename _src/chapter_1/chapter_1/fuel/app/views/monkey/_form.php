<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($monkey) ? $monkey->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Still here', 'still_here', array('class'=>'control-label')); ?>

<?php
/*
echo Form::input(
    'still_here',
    Input::post(
        'still_here',
        isset($monkey) ? $monkey->still_here : ''
    ),
    array(
        'class' => 'col-md-4 form-control',
        'placeholder' => 'Still here'
    )
);
*/
?>
<?php
/*
* The first parameter is the checkbox's name attribute. The
* second parameter is the checkbox's value attribute. The
* third parameter determines whether the checkbox is checked
* or not. You can notice that, when we create a new monkey
* (and therefore no monkey is set), the checkbox will be
* checked by default.
*/
echo Form::checkbox(
    'still_here',
    1,
    Input::post(
        'still_here',
        isset($monkey) ? $monkey->still_here : true
    )
);
?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Height', 'height', array('class'=>'control-label')); ?>

				<?php echo Form::input('height', Input::post('height', isset($monkey) ? $monkey->height : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Height')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Description', 'description', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('description', Input::post('description', isset($monkey) ? $monkey->description : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Description')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>