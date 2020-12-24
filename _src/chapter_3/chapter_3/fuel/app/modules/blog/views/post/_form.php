<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', Input::post('title', isset($post) ? $post->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Slug', 'slug', array('class'=>'control-label')); ?>

				<?php echo Form::input('slug', Input::post('slug', isset($post) ? $post->slug : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Slug')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Small description', 'small_description', array('class'=>'control-label')); ?>

				<?php echo Form::input('small_description', Input::post('small_description', isset($post) ? $post->small_description : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Small description')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Content', 'content', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('content', Input::post('content', isset($post) ? $post->content : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Content')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Category id', 'category_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('category_id', Input::post('category_id', isset($post) ? $post->category_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Category id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('User id', 'user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('user_id', Input::post('user_id', isset($post) ? $post->user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>