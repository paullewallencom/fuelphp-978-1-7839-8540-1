<h3>Create a new task:</h3>
<?php
echo Form::open();
echo Form::input(
    'task_name',
    null,
    array('placeholder'=>'Task name')
);
echo Form::submit('task_submit', 'Create');
echo Form::close();
?>
