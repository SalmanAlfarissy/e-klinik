<?php

class m240608_094224_create_auth_item_child_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('AuthItemChild', array(
            'parent' => 'varchar(64) NOT NULL',
            'child' => 'varchar(64) NOT NULL',
            'PRIMARY KEY (parent, child)',
        ));
	}

	public function safeDown()
	{
		$this->dropTable('AuthItemChild');
	}

}