$(document).ready(function() {
    
    // Checkbox synchronization
    $('#todo_list input[type=checkbox]').change(function() {
        var $this = $(this);
        $.post(
            uriBase + 'project/change_task_status',
            {
                'task_id': $this.data('task_id'),
                'new_status': $this.is(':checked') ? 1 : 0
            }
        );
    });
    
    var $todoList = $('#todo_list');
    $todoList.sortable({
        // The stop event is called when the user drop an item
        // (when the sorting process has stopped).
        'stop': function() {
            // Collecting task ids from checkboxes in the
            // new order.
            var ids = [];
            $todoList.find('input[type=checkbox]').each(function() {
                ids.push($(this).data('task_id'));
            });
            // Sending the ordered task ids to the server.
            $.post(
                uriBase + 'project/change_tasks_order',
                {
                    'project_id': $todoList.data('project_id'),
                    'task_ids': ids
                }
            );
        }
    });


    $todoList.disableSelection();

});
