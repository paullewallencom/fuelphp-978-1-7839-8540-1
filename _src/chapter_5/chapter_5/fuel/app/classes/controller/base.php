<?php
class Controller_Base extends Controller_Hybrid 
{
    public function before() {
        parent::before();

        \Config::load('mymicroblog', true);
        
        \Parser\View_Mustache::parser()
            ->setPartialsLoader(
            new Mustache_Loader_FilesystemLoader(
                APPPATH.'views'
            )
        );

    }
    
    /*
    Overriding the is_restful method to make the controller go into
    rest mode when an extension is specified in the URL. Ex:
    http://mymicroblog.com/sdrdis.json
    */
    public function is_restful()
    {
        return !is_null(\Input::extension());
    }

    /*
    Handles an hybrid response: when no extension is specified
    the action returns HTML code by setting the template's content
    attribute with the specified view and data, and when an
    extension is specified, the action returns data in the expected 
    format (if available).
    */
    public function hybrid_response($view, $data) {
        if (is_null(\Input::extension())) {
            $this->template->content =
            View::forge(
                $view.'.mustache',
                $data,
                // By default, mustache escape displayed
                // variables...
                false
            );
        } else {
            $this->response($data);
        }
    }
    
    // Getting the posts query
    public static function get_posts_query($params) {
        $user_id = Arr::get($params, 'user_id', null);
        // id > since_id
        $after_id = intval(
            Arr::get($params, 'after_id', null)
        );
        // id < from_id
        $before_id = intval(
            Arr::get($params, 'before_id', null)
        );

        $query = Model_Post::query();
        $query->related('user');
        $query->where('user_id', '=', $user_id);
        if ($after_id != 0) {
            $query->where('id', '>', $after_id);
        }
        if ($before_id != 0) {
            $query->where('id', '<', $before_id);
        }
        $query->order_by(array('id' => 'DESC'));

        return $query;
    }


}
