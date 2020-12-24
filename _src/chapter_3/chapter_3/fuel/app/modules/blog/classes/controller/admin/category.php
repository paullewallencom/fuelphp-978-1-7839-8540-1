<?php
namespace Blog;
use Controller_Admin;
use Input;
use View;
use Response;
use Session;

class Controller_Admin_Category extends Controller_Admin
{

	public function action_index()
	{
		$data['categories'] = Model_Category::find_all_with_nb_posts();

		$this->template->title = "Categories";
		$this->template->content = View::forge('admin/category/index', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Category::validate('create');

			if ($val->run())
			{
				$category = Model_Category::forge(array(
					'name' => Input::post('name'),
				));

				if (\Security::check_token() and $category and $category->save())
				{
					Session::set_flash('success', e('Added category #'.$category->id.'.'));

					Response::redirect('blog/admin/category');
				}

				else
				{
					Session::set_flash('error', e('Could not save category.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Categories";
		$this->template->content = View::forge('admin/category/create');

	}

	public function action_edit($id = null)
	{
		$category = Model_Category::find($id);
		$val = Model_Category::validate('edit');

		if ($val->run())
		{
			$category->name = Input::post('name');

			if (\Security::check_token() and $category->save())
			{
				Session::set_flash('success', e('Updated category #' . $id));

				Response::redirect('blog/admin/category');
			}

			else
			{
				Session::set_flash('error', e('Could not update category #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$category->name = $val->validated('name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('category', $category, false);
		}

		$this->template->title = "Categories";
		$this->template->content = View::forge('admin/category/edit');

	}

	public function action_delete($id = null)
	{
		if (($category = Model_Category::find($id)) && \Security::check_token())
		{
			$category->delete();

			Session::set_flash('success', e('Deleted category #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete category #'.$id));
		}

		Response::redirect('blog/admin/category');

	}

}
