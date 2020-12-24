<?php
namespace Blog;
use \Validation as Validation;

class Model_Comment extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'email',
		'content',
		'status',
		'post_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);
    
    protected static $_belongs_to = array('post');

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('email', 'Email', 'required|valid_email|max_length[255]');
		$val->add_field('content', 'Content', 'required');
		// We require status only if we are editing the comment (thus
        // we are on the administration panel).
        if ($factory == 'edit') {
            $val->add_field(
                'status',
                'Status',
                'required|max_length[255]'
            );
        }


		return $val;
	}

}
