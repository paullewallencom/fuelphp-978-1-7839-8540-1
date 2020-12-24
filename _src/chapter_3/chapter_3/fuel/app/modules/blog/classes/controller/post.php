<?php
namespace Blog;
use Controller_Admin;
use Controller_Template;
use Input;
use View;
use Response;
use Session;

class Controller_Post extends Controller_Template
{

	public function action_index()
	{
        // Pagination configuration
        $config = array(
            'per_page'       => 10,
            'uri_segment'    => 'page',
        );

        // Get the category_id route parameter
        $category_id = $this->param('category_id');
        if (is_null($category_id)) {
            $config['total_items'] = Model_Post::count();
        } else {
            $config['total_items'] = Model_Post::count(
                array(
                    'where' => array(
                        array('category_id' => $category_id),
                    ),
                )
            );
        }


        // Create a pagination instance named 'posts'
        $pagination = \Pagination::forge('posts', $config);

        
		$data['posts'] = Model_Post::query()
            ->related(array('author', 'category'))
            ->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page);

        if (!is_null($category_id)) {
            $data['posts']->where('category_id', $category_id);
        }

        $data['posts'] = $data['posts']->get();


		$this->template->title = "Posts";
		$this->template->content = View::forge('post/index', $data);
        $this->template->content->set('pagination', $pagination, false);

	}

	public function action_view($slug = null)
	{
		is_null($slug) and Response::redirect('blog/post');

        $data['post'] = Model_Post::find(
            'first',
            array(
                'where' => array(
                    array('slug' => $slug),
                ),
            )
        );
        if ( ! $data['post'])
        {
            Session::set_flash(
                'error',
                'Could not find post with slug: '.$slug
            );
            Response::redirect('blog/post');
        }
        
        // Is the user sending a comment? If yes, process it.
        if (Input::method() == 'POST')
        {
            $val = Model_Comment::validate('create');

            
            if ($val->run())
            {
                $comment = Model_Comment::forge(array(
                    'name' => Input::post('name'),
                    'email' => Input::post('email'),
                    'content' => Input::post('content'),
                    'status' => 'pending',
                    'post_id' => $data['post']->id,
                ));

                if ($comment and $comment->save())
                {
                    // Manually loading the Email package
                    \Package::load('email');

                    $email = \Email::forge();

                    // Setting the to address
                    $email->to(
                        $data['post']->author->email,
                        $data['post']->author->username
                    );

                    // Setting a subject
                    $email->subject('New comment');

                    // Setting the body and using a view since the message is long
                    $email->body(
                        \View::forge(
                            'comment/email',
                            array(
                                'comment' => $comment,
                            )
                        )->render()
                    );

                    // Sending the email
                    $email->send();

                    Session::set_flash(
                        'success',
                        e('Your comment has been saved, it will'.
                         ' be reviewed by our administrators')
                    );
                }

                else
                {
                    Session::set_flash(
                        'error',
                        e('Could not save comment.')
                    );
                }
            }
            else
            {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Post";
        $this->template->content = View::forge('post/view', $data);
        $this->template->content->set(
            'post_content',
            $data['post']->content,
            false
        );
	}

}
