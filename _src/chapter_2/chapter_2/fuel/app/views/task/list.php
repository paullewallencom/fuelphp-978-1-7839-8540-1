<ul id="todo_list" data-project_id="<?php echo $project->id; ?>">
    <?php foreach ($project->tasks as $task) {
            $input_id = 'todo_item_'.$task->id;
    ?>
        <li>
            <input
                   type="checkbox"
                   id="<?php echo $input_id; ?>"
                   data-task_id="<?php echo $task->id; ?>"
                   autocomplete="off"
                   <?php echo ($task->status ? 'checked="checked"' : ''); ?>/>
            <label for="<?php echo $input_id; ?>">
                <?php echo $task->name; ?>
            </label>
        </li>
    <?php } ?>
</ul>
<?php echo render('task/create', array('project' => $project)); ?>