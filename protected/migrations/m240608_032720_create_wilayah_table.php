<?php

class m240608_032720_create_wilayah_table extends CDbMigration
{
	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('wilayah', array(
            'id' => 'pk',
            'nama' => 'string NOT NULL',
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
	}

	public function safeDown()
	{
		$this->dropTable('wilayah');
	}
	
}