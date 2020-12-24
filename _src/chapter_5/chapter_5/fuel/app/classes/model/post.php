<?php

class Model_Post extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'content',
		'user_id',
		'created_at',
	);

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'events' => array('before_insert'),
            'mysql_timestamp' => false,
        ),
    );

    
	protected static $_table_name = 'posts';
    
    protected static $_belongs_to = array('user');

}
