<?php

class m240608_094316_create_auth_assignment_table extends CDbMigration
{

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('AuthAssignment', array(
            'itemname' => 'varchar(64) NOT NULL',
            'userid' => 'varchar(64) NOT NULL',
            'bizrule' => 'text',
            'data' => 'text',
            'PRIMARY KEY (itemname, userid)',
        ));

		$this->addForeignKey('AuthItemChild_ibfk_1', 'AuthItemChild', 'parent', 'AuthItem', 'name', 'CASCADE', 'CASCADE');
        $this->addForeignKey('AuthItemChild_ibfk_2', 'AuthItemChild', 'child', 'AuthItem', 'name', 'CASCADE', 'CASCADE');
        $this->addForeignKey('AuthAssignment_ibfk_1', 'AuthAssignment', 'itemname', 'AuthItem', 'name', 'CASCADE', 'CASCADE');
	}

	public function safeDown()
	{
		$this->dropTable('AuthAssignment');
	}
}