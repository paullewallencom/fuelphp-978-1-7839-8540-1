<?php
namespace Blog;
use \Validation as Validation;

class Model_Category extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
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
    
    protected static $_has_many = array('posts');

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('name', 'Name', 'required|max_length[255]');

		return $val;
	}


    public static function find_all_with_nb_posts() {
        return \DB::query(
            'SELECT
                `categories`.*,
                count(`posts`.`id`) as nb_posts
            FROM `categories`
            LEFT JOIN `posts` ON (
                `posts`.`category_id` = `categories`.`id`
            )
            GROUP BY `categories`.id'
        )
        ->as_object('\Blog\Model_Category')
        ->execute()
        ->as_array();
    }

}
