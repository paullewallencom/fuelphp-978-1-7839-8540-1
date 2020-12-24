<?php
class Controller_Post extends Controller_Base 
{
    public function action_create()
    {
        $post_content = Input::post('post_content');

        $response = array();

        if (!Auth::check()) {
            // In case the user has been signed out before
            // he submits his post.
            $response = array(
                'success' => false,
                'error' => 'You are not authenticated.',
            );
        } else {
            // Checking if the post is correct. The JavaScript
            // should have tested that already, but never trust
            // the client.
            $val = Validation::forge('post');
            $val->add_field(
                'post_content',
                'post',
                'required|max_length[140]'
            );

            if ($val->run())
            {
                // Creating the post.
                list(, $user_id) = Auth::get_user_id();
                $post = Model_Post::forge();
                $post->content = $post_content;
                $post->user_id = $user_id;
                if ($post and $post->save()) {
                    $response = array(
                        'success' => true,
                    );
                } else {
                    $response = array(
                        'success' => false,
                        'error' => 'Internal error: Could'.
                            ' not save the post.',
                    );
                }
            } else {
                // The error can only occur on the only field...
                $error = $val->error()['post_content'];
                $response = array(
                    'success' => false,
                    'error' => $error->get_message(),
                );
            }
        }

        return $this->response($response);
    }
    
    // Get the posts list depending on $_GET parameters
    // limited to 20 posts maximum
    public function action_list() {
        $query = static::get_posts_query(Input::get(), true);
        $posts = $query->limit(
            \Config::get('mymicroblog.pagination_nb_posts')
        )->get();

        return $this->response(
            Mapper_Post::get('item', $posts)
        );
    }

    // Get the number of posts depending on $_GET parameters
    public function action_count() {
        $query = static::get_posts_query(Input::get(), false);
        return $this->response($query->count());
    }



}
