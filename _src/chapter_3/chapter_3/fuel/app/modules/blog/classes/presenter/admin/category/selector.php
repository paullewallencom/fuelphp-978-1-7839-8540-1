<?php
namespace Blog;

class Presenter_Admin_Category_Selector extends \Presenter
{
    public function view()
    {
        // This is where all model logic should go if you
        // want object not to depend on controllers.
        $this->categories = Model_Category::find('all');
    }
}
