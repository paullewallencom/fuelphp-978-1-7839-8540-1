<?php
namespace Blog;
use Controller_Admin;
use Input;
use View;
use Response;
use Session;

class Controller_Admin_Post extends Controller_Admin
{

	public function action_index()
	{
		$data['posts'] = Model_Post::find(
            'all',
            array(
                'related' => array(
                    'category',
                    'author',
                ),
            )
        );

		$this->template->title = "Posts";
		$this->template->content = View::forge('admin/post/index', $data);
	}

	public function action_view($id = null)
	{
		$data['post'] = Model_Post::find($id);
        
        


		$this->template->title = "Post";
		$this->template->content = View::forge('admin/post/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Post::validate('create');

			if ($val->run())
			{
				$post = Model_Post::forge(array(
					'title' => Input::post('title'),
					'slug' => Input::post('slug'),
					'small_description' => Input::post('small_description'),
					'content' => Input::post('content'),
					'category_id' => Input::post('category_id'),
					'user_id' => $this->current_user->id,
				));

				if (\Security::check_token() and $post and $post->save())
				{
					Session::set_flash('success', e('Added post #'.$post->id.'.'));

					Response::redirect('blog/admin/post');
				}

				else
				{
					Session::set_flash('error', e('Could not save post.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Posts";
		$this->template->content = View::forge('admin/post/create');

	}

	public function action_edit($id = null)
	{
		$post = Model_Post::find($id);
		$val = Model_Post::validate('edit');

		if ($val->run())
		{
			$post->title = Input::post('title');
			$post->slug = Input::post('slug');
			$post->small_description = Input::post('small_description');
			$post->content = Input::post('content');
			$post->category_id = Input::post('category_id');

			if (\Security::check_token() && $post->save())
			{
				Session::set_flash('success', e('Updated post #' . $id));

				Response::redirect('blog/admin/post');
			}

			else
			{
				Session::set_flash('error', e('Could not update post #' . $id));
			}
		}
		else
		{
			if (Input::method() == 'POST')
			{
				$post->title = $val->validated('title');
				$post->slug = $val->validated('slug');
				$post->small_description = $val->validated('small_description');
				$post->content = $val->validated('content');
				$post->category_id = $val->validated('category_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('post', $post, false);
		}

		$this->template->title = "Posts";
		$this->template->content = View::forge('admin/post/edit');

	}

	public function action_delete($id = null)
	{
    
		if (($post = Model_Post::find($id)) && \Security::check_token())
		{
			$post->delete();

			Session::set_flash('success', e('Deleted post #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete post #'.$id));
		}

		Response::redirect('blog/admin/post');

	}

}
