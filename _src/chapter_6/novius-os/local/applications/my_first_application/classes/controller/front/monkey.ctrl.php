<?php

namespace MyFirstApplication;

use Nos\Controller_Front_Application;

use View;

class Controller_Front_Monkey extends Controller_Front_Application
{
    public $page_from = false;

    public function action_main($args = array())
    {
        $this->page_from = $this->main_controller->getPage();

        $enhancer_url = $this->main_controller->getEnhancerUrl();

        if (!empty($enhancer_url)) {
            $segments = explode('/', $enhancer_url);

            if (!empty($segments[0])) {
                return $this->display_monkey($segments[0]);
            }

            throw new \Nos\NotFoundException();
        }

        return $this->display_list_monkey();
    }

    protected function display_list_monkey()
    {
        $params = array(
            'where' => array(),
            'order_by' => array(
                'monk_id' => 'ASC'
            ),
            'limit' => 10
        );

        $params['where'][] = array('published', true);

        $monkey_list =  Model_Monkey::find('all', $params);

        return \View::forge('front/monkey_list', array(
            'monkey_list' => $monkey_list,
        ), false);
    }


    protected function display_monkey($virtual_name)
    {
        $monkey = Model_Monkey::find('first', array(
            'where' => array(
                array('monk_virtual_name', '=', $virtual_name)
            )
        ));

        if (empty($monkey)) {
            throw new \Nos\NotFoundException();
        }

        $title = $monkey->monk_name;
        $this->main_controller->setItemDisplayed(
            $monkey,
            array(
                //'meta_description' => $title,
                //'meta_keywords' => '',
            ),
            array(
                'title' => ':page_title - '.$title,
            )
        );

        return \View::forge('front/monkey_item', array(
            'monkey' => $monkey,
        ), false);
    }

    public static function getUrlEnhanced($params = array())
    {
        $item = \Arr::get($params, 'item', false);
        if ($item) {
            // url built according to $item'class
            switch (get_class($item)) {
                case 'MyFirstApplication\Model_Monkey' :
                    return $item->virtual_name().'.html';
                    break;

                default:
                    return false;
            }
        }

        return '';
    }
}
