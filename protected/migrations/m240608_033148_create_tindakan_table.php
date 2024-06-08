<?php

class m240608_033148_create_tindakan_table extends CDbMigration
{	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('tindakan', array(
            'id' => 'pk',
            'nama' => 'string NOT NULL',
            'deskripsi' => 'text',
            'biaya' => 'decimal(10,2) NOT NULL',
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
	}

	public function safeDown()
	{
		$this->dropTable('tindakan');
	}
	
}