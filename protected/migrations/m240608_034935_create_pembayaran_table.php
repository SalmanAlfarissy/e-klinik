<?php

class m240608_034935_create_pembayaran_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('pembayaran', array(
            'id' => 'pk',
            'pendaftaran_pasien_id' => 'integer NOT NULL',
            'total_biaya' => 'decimal(10,2) NOT NULL',
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
        $this->addForeignKey('fk_pembayaran_pendaftaran', 'pembayaran', 'pendaftaran_pasien_id', 'pendaftaran_pasien', 'id', 'CASCADE', 'CASCADE');
	}

	public function safeDown()
	{
		$this->dropTable('pembayaran');
	}

}