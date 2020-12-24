<?php

class Model_Task extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'status',
		'rank',
		'project_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
    
    protected static $_belongs_to = array('project');

	protected static $_table_name = 'tasks';

}
