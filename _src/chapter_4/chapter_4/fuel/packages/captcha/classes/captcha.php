<?php
namespace Captcha;

class CaptchaException extends \FuelException {}

class Captcha
{
    // ...
    protected static $_defaults = array();
    // ...
    protected $config = array();
    // ...
    public static function _init()
    {
        \Config::load('captcha', true);
    }
    // ...
    public static function forge($config = array())
    {
        $config = \Arr::merge(
            static::$_defaults,
            \Config::get('captcha', array()),
            $config
        );
        $class = new static($config);
        return $class;
    }
    // ...
    public function __construct(array $config = array())
    {
        $this->config = $config;
    }
    // ...
    public function get_config($key, $default = null)
    {
        return \Arr::get($this->config, $key, $default);
    }
    // ...
    public function set_config($key, $value)
    {
        \Arr::set($this->config, $key, $value);
        return $this;
    }
    
/**
* Check if the captcha is valid
* 
* @param int $id id of the captcha answer
* @param string $answer answer given by the visitor
* @return boolean is the answer correct ?
*/
public function check_answer($id, $answer) {
    $this->clean_old_captchas();
    // Model::find_by_pk finds an instance by its
    // Primary Key (in our case, id).
    $captcha_answer = Model_Captcha_Answer::find_by_pk(
        intval($id)
    );
    $correct = $captcha_answer->expected_value == $answer;
    
    // The answer has been checked, so no need to keep the
    // expected answer
    $captcha_answer->delete();
    
    return $correct;
}

/**
* Returns the CAPTCHA form
* 
* @return string the CAPTCHA form html code
*/
public function get_html() {
    $this->clean_old_captchas();
    // Getting configuration
    $min_number = $this->get_config('min_number');
    $max_number = $this->get_config('max_number');

    // Generating two random numbers
    $number_1 = rand($min_number, $max_number);
    $number_2 = rand($min_number, $max_number);

    // Calculating the correct answer
    $answer = $number_1 + $number_2;

    // Saving the expected answer
    $captcha_answer = Model_Captcha_Answer::forge();
    $captcha_answer->expected_value = $answer;
    $captcha_answer->save();


    return \View::forge(
        'captcha',
        array(
            'number_1' => $number_1,
            'number_2' => $number_2,
            'captcha_answer' => $captcha_answer,
        )
    )->render();
}
    
    /**
    * Clean the old captchas
    */
    public function clean_old_captchas() {
        // We can also delete old captchas expected answers
        // that were never verified
        \DB::query('
            DELETE FROM `captcha_answers`
            WHERE `created_at` < '.
           intval(\Date::forge()->get_timestamp()
            - $this->get_config('captcha_expiration'))
            .';')
            ->execute();
    }



}
