<?php

class m240608_094112_create_auth_item_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('AuthItem', array(
            'name' => 'varchar(64) NOT NULL',
            'type' => 'integer NOT NULL',
            'description' => 'text',
            'bizrule' => 'text',
            'data' => 'text',
            'PRIMARY KEY (name)',
        ));
	}

	public function safeDown()
	{
		$this->dropTable('AuthItem');
	}

}