<?php

class m240608_034825_create_pendaftaran_pasien_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('pendaftaran_pasien', array(
            'id' => 'pk',
            'nama_pasien' => 'string NOT NULL',
			'jenis_kelamin' => "ENUM('laki-laki', 'perempuan') NOT NULL",
            'alamat_pasien' => 'text',
            'tanggal_lahir' => 'date NOT NULL',
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
	}

	public function safeDown()
	{
		$this->dropTable('pendaftaran_pasien');
	}

}