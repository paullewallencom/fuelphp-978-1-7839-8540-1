<?php
class Controller_Item extends Controller_Template
{

	public function action_index()
	{
		$data['items'] = Model_Item::find_all();
		$this->template->title = "Items";
		$this->template->content = View::forge('item/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('item');

		$data['item'] = Model_Item::find_by_pk($id);

		$this->template->title = "Item";
		$this->template->content = View::forge('item/view', $data);

	}

	public function action_create()
	{
        Package::load('captcha');
        // For ReCaptcha, replace by "Package::load('fuel-recaptcha');"
		if (Input::method() == 'POST')
		{
			$val = Model_Item::validate('create');

            if (static::is_captcha_correct())
            {
                if ($val->run())
                {
                    $item = Model_Item::forge(array(
                        'name' => Input::post('name'),
                    ));

                    if ($item and $item->save())
                    {
                        Session::set_flash('success', 'Added item #'.$item->id.'.');
                        Response::redirect('item');
                    }
                    else
                    {
                        Session::set_flash('error', 'Could not save item.');
                    }
                }
                else
                {
                    Session::set_flash('error', $val->error());
                }
            } else {
                Session::set_flash(
                    'error',
                    'You have entered an invalid value for the captcha'
                );
            }

		}

		$this->template->title = "Items";
		$this->template->content = View::forge('item/create');

	}

	public function action_edit($id = null)
	{
        Package::load('captcha');
        // For ReCaptcha, replace by "Package::load('fuel-recaptcha');"
		is_null($id) and Response::redirect('item');

		$item = Model_Item::find_one_by_id($id);

		if (Input::method() == 'POST')
		{
			$val = Model_Item::validate('edit');

            if (static::is_captcha_correct())
            {
                if ($val->run())
                {
                    $item->name = Input::post('name');

                    if ($item->save())
                    {
                        Session::set_flash('success', 'Updated item #'.$id);
                        Response::redirect('item');
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
            } else {
                Session::set_flash(
                    'error',
                    'You have entered an invalid value for the captcha'
                );
            }

		}

		$this->template->set_global('item', $item, false);
		$this->template->title = "Items";
		$this->template->content = View::forge('item/edit');

	}

	public function action_delete($id = null)
	{
		if ($item = Model_Item::find_one_by_id($id))
		{
			$item->delete();

			Session::set_flash('success', 'Deleted item #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete item #'.$id);
		}

		Response::redirect('item');

	}

    public static function is_captcha_correct() {
        // Checking the captcha
        return Captcha::forge()
            ->check_answer(
                Input::post('captcha_id'),
                Input::post('captcha_answer')
        );
    }
    
    // For ReCaptcha, replace by:
    /*
    public static function is_captcha_correct() {
        // This is how a CAPTCHA is checked according to the
        // package readme file.
        return ReCaptcha::instance()
            ->check_answer(
                Input::real_ip(),
                Input::post('recaptcha_challenge_field'),
                Input::post('recaptcha_response_field')
        );
    }
    */


}
