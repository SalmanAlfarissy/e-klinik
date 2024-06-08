<?php

class m240608_034906_create_pasien_obat_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('pasien_obat', array(
            'id' => 'pk',
            'pendaftaran_pasien_id' => 'integer NOT NULL',
            'obat_id' => 'integer NOT NULL',
            'jumlah' => 'integer NOT NULL',
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
        $this->addForeignKey('fk_pasien_obat_pendaftaran', 'pasien_obat', 'pendaftaran_pasien_id', 'pendaftaran_pasien', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_pasien_obat_obat', 'pasien_obat', 'obat_id', 'obat', 'id', 'CASCADE', 'CASCADE');
	}

	public function safeDown()
	{
		$this->dropTable('pasien_obat');
	}

}