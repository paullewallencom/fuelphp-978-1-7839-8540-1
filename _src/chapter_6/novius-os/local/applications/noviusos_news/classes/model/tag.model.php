<?php
namespace Nos\BlogNews\News;

class Model_Tag extends \Nos\BlogNews\Model_Tag
{
    protected static $_primary_key = array('tag_id');
    protected static $_table_name = 'nos_news_tag';

    public static function _init()
    {
        parent::_init();
        static::$_behaviours['Nos\Orm_Behaviour_Urlenhancer']['enhancers'][] = 'noviusos_news';
    }
}
