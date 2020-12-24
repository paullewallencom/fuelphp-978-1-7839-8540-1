<?php

namespace MyFirstApplication;

class Model_Monkey extends \Nos\Orm\Model
{

    protected static $_primary_key = array('monk_id');
    protected static $_table_name = 'monkeys';

    protected static $_properties = array(
        'monk_id',
        'monk_name',
        'monk_still_here',
        'monk_height',
        'monk_virtual_name' => array(
            'default' => null,
            'data_type' => 'varchar',
            'null' => false,
            'character_maximum_length' => 100,
        ),
        'monk_publication_status',
        'monk_publication_start',
        'monk_publication_end',
        'monk_created_by_id',
        'monk_updated_by_id',
        'monk_created_at',
        'monk_updated_at',
    );

    protected static $_title_property = 'monk_name';

    protected static $_observers = array(
        'Orm\Observer_CreatedAt' => array(
            'mysql_timestamp' => true,
            'property'=>'monk_created_at'
        ),
        'Orm\Observer_UpdatedAt' => array(
            'mysql_timestamp' => true,
            'property'=>'monk_updated_at'
        )
    );

    protected static $_behaviours = array(
        'Nos\Orm_Behaviour_Publishable' => array(
            'publication_state_property' => 'monk_publication_status',
            'publication_start_property' => 'monk_publication_start',
            'publication_end_property' => 'monk_publication_end',
        ),
        'Nos\Orm_Behaviour_Urlenhancer' => array(
            'enhancers' => array('my_first_application_monkey'),
        ),
        'Nos\Orm_Behaviour_Virtualname' => array(
            'virtual_name_property' => 'monk_virtual_name',
        ),
        /*
        'Nos\Orm_Behaviour_Twinnable' => array(
            'context_property'      => 'monk_context',
            'common_id_property' => 'monk_context_common_id',
            'is_main_property' => 'monk_context_is_main',
            'common_fields'   => array(),
        ),
        */
        'Nos\Orm_Behaviour_Author' => array(
            'created_by_property' => 'monk_created_by_id',
            'updated_by_property' => 'monk_updated_by_id',
        ),
    );

    protected static $_belongs_to  = array(
        /*
        'key' => array( // key must be defined, relation will be loaded via $monkey->key
            'key_from' => 'monk_...', // Column on this model
            'model_to' => 'MyFirstApplication\Model_...', // Model to be defined
            'key_to' => '...', // column on the other model
            'cascade_save' => false,
            'cascade_delete' => false,
            //'conditions' => array('where' => ...)
        ),
        */
    );
    protected static $_has_one   = array();
    protected static $_has_many  = array(
        /*
        'key' => array( // key must be defined, relation will be loaded via $monkey->key
            'key_from' => 'monk_...', // Column on this model
            'model_to' => 'MyFirstApplication\Model_...', // Model to be defined
            'key_to' => '...', // column on the other model
            'cascade_save' => false,
            'cascade_delete' => false,
            //'conditions' => array('where' => ...)
        ),
        */
    );
    protected static $_many_many = array(
        /*
            'key' => array( // key must be defined, relation will be loaded via $monkey->key
                'table_through' => '...', // intermediary table must be defined
                'key_from' => 'monk_...', // Column on this model
                'key_through_from' => '...', // Column "from" on the intermediary table
                'key_through_to' => '...', // Column "to" on the intermediary table
                'key_to' => '...', // Column on the other model
                'cascade_save' => false,
                'cascade_delete' => false,
                'model_to'       => 'MyFirstApplication\Model_...', // Model to be defined
            ),
        */
    );

    protected static $_twinnable_belongs_to = array();
    protected static $_twinnable_has_one    = array();
    protected static $_twinnable_has_many   = array();
    protected static $_twinnable_many_many  = array();
    protected static $_attachment           = array();
}
