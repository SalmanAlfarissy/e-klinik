<?php

class m240608_034801_create_obat_table extends CDbMigration
{	
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('obat', array(
            'id' => 'pk',
            'nama' => 'string NOT NULL',
            'deskripsi' => 'text',
            'harga' => 'decimal(10,2) NOT NULL',
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
	}

	public function safeDown()
	{
		$this->dropTable('obat');
	}
	
}