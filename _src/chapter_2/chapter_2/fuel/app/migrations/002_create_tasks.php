<?php

namespace Fuel\Migrations;

class Create_tasks
{
	public function up()
	{
		\DBUtil::create_table('tasks', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'status' => array('type' => 'boolean'),
			'order' => array('constraint' => 11, 'type' => 'int'),
			'project_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('tasks');
	}
}