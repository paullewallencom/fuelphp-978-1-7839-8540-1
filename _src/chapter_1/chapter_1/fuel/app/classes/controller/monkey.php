<?php
class Controller_Monkey extends Controller_Template
{

	public function action_index()
	{
		$data['monkeys'] = Model_Monkey::find_all();
		$this->template->title = "My monkeys";
		$this->template->content = View::forge('monkey/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('monkey');

		$data['monkey'] = Model_Monkey::find_by_pk($id);

		$this->template->title = "Monkey";
		$this->template->content = View::forge('monkey/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Monkey::validate('create');

			if ($val->run())
			{
				$monkey = Model_Monkey::forge(array(
					'name' => Input::post('name'),
					'still_here' => Input::post('still_here', 0),
					'height' => Input::post('height'),
					'description' => Input::post('description'),
				));

				if ($monkey and $monkey->save())
				{
					Session::set_flash('success', 'Added monkey #'.$monkey->id.'.');
					Response::redirect('monkey');
				}
				else
				{
					Session::set_flash('error', 'Could not save monkey.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Monkeys";
		$this->template->content = View::forge('monkey/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('monkey');

		$monkey = Model_Monkey::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Monkey::validate('edit');

			if ($val->run())
			{
				$monkey->name = Input::post('name');
				$monkey->still_here = Input::post('still_here', 0);
				$monkey->height = Input::post('height');
				$monkey->description = Input::post('description');

				if ($monkey->save())
				{
					Session::set_flash('success', 'Updated monkey #'.$id);
					Response::redirect('monkey');
				}
				else
				{
					Session::set_flash('error', 'Nothing updated.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->set_global('monkey', $monkey, false);
		$this->template->title = "Monkeys";
		$this->template->content = View::forge('monkey/edit');

	}

	public function action_delete($id = null)
	{
		if ($monkey = Model_Monkey::find_one_by_id($id))
		{
			$monkey->delete();

			Session::set_flash('success', 'Deleted monkey #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete monkey #'.$id);
		}

		Response::redirect('monkey');

	}

}
