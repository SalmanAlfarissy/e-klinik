<?php

class m240608_032653_create_user_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('user', array(
            'id' => 'pk',
			'nama' => 'string NOT NULL',
            'username' => 'string NOT NULL',
            'password' => 'string NOT NULL',
            'email' => 'string NOT NULL',
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
	}

	public function safeDown()
	{
		$this->dropTable('user');
	}
}