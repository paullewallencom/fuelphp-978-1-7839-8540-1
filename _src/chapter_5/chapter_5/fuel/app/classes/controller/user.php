<?php
class Controller_User extends Controller_Base
{


    
    public function action_index()
    {
        if (Auth::check()) { 
            Response::redirect('/'.Auth::get_screen_name());
        } else {
            $this->template->content = 
                View::forge(
                    'user/connect.mustache',
                    array(
                        'signup_form' => Session::get_flash('signup_form'),
                    ),
                    // By default, mustache escape displayed
                    // variables, so no need to escape them here
                    false
                );

        }
    }
    
    public function action_signup()
    {
        /*
        Validating our form (checks if the username, the
        password and the email have a correct value). We
        are using the same class as we saw on numerous
        generated models
        */
        $val = Validation::forge('signup_validation');
        $val->add_field(
            'username',
            'Username',
            'required|valid_string[alpha,lowercase,numeric]'
        );
        $val->add_field(
            'password',
            'Password',
            'required|min_length[6]'
        );
        $val->add('email', 'Email')
            ->add_rule('required')
            ->add_rule('valid_email');

        // Running validation
        if ($val->run())
        {
            try {
                // Since validation passed, we try to create
                // a user
                $user_id = Auth::create_user(
                    Input::post('username'),
                    Input::post('password'),
                    Input::post('email')
                );

                /*
                Note: at this point, we could send a
                confirmation email, but for the sake of this
                chapter conciseness, we will leave the
                implementation of this feature to you as a
                training exercise.
                */

                // If no exceptions were triggered, the user
                // was succesfully created.
                Session::set_flash(
                    'success',
                    e('Welcome '.Input::post('username').'!')
                );
            } catch (\SimpleUserUpdateException $e) {
                // Either the username or email already exists
                Session::set_flash('error', e($e->getMessage()));
            }

        }
        else
        {
            // At least one field is not correct
            Session::set_flash('error', e($val->error()));
        }

        /*
        Sending the signup form fields informations so that they
        are already filled when the user is redirected to the
        the index action (useful if the user could not be created)
        */
        Session::set_flash('signup_form', Input::post());

        // No matter what, we return to the home page.
        Response::redirect('/');
    }
    
    public function action_signin()
    {
        // If already logged in, redirecting to home page.
        if (Auth::check()) {
            Session::set_flash(
                'error',
                'You are already logged in, '.
                e(Auth::get_screen_name()).'.'
            );
            Response::redirect('/');
        }

        $val = Validation::forge();
        $val->add('username', 'Email or Username')
            ->add_rule('required');
        $val->add('password', 'Password')
            ->add_rule('required');

        // Running validation
        if ($val->run())
        {
            $auth = Auth::instance();

            // Checking the credentials.
            if (
                Auth::check() or
                $auth->login(
                    Input::post('username'),
                    Input::post('password')
                )
            )
            {
                Session::set_flash(
                    'success',
                    e('Welcome, '.Auth::get_screen_name().'!')
                );
            }
            else
            {
                Session::set_flash(
                    'error',
                    'Incorrect username and / or password.'
                );
            }
        } else {
            Session::set_flash(
                'error',
                'Empty username or password.'
            );
        }

        // No matter what, we return to the home page.
        Response::redirect('/');
    }
    
    public function action_signout()   
    {
        Auth::logout();
        Response::redirect('/');
    }
    
    public function action_show($username) {
        // Finding a user with a similar username
        $user = Model_User::find('first', array(
            'where' => array(
                array('username' => $username),
            ),
        ));
        
        if (!$user) {
            Session::set_flash(
                'error',
                'The user '.e($username).' does not exists.'
            );
            Response::redirect('/');
        }

        // Finding 20 latest posts (will be improved)
        $query = static::get_posts_query(
            array('user_id' => $user->id),
            true
        );
        $posts = $query->limit(
            \Config::get('mymicroblog.pagination_nb_posts')
        )->get();


        // Displaying the profile page
        return $this->hybrid_response(
            'user/show',
            array(
                'user' => Mapper_User::get('profile', $user),
                'posts' => Mapper_Post::get('item', $posts),
            )
        );

    }




}
