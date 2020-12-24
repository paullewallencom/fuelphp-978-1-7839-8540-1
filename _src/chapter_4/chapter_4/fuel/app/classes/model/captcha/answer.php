<?php

class Model_Captcha_Answer extends \Model_Crud
{
	protected static $_properties = array(
		'id',
		'expected_value',
		'created_at',
	);

	protected static $_table_name = 'captcha_answers';

}
