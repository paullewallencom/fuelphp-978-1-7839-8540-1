<?php

namespace Fuel\Migrations;

class Create_captcha_answers
{
	public function up()
	{
		\DBUtil::create_table('captcha_answers', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'expected_value' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('captcha_answers');
	}
}