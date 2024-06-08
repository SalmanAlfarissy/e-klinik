<?php

class m240608_033128_create_pegawai_table extends CDbMigration
{

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('pegawai', array(
            'id' => 'pk',
            'nama' => 'string NOT NULL',
			'jenis_kelamin' => "ENUM('laki-laki', 'perempuan') NOT NULL",
            'jabatan' => 'string NOT NULL',
            'wilayah_id' => 'integer NOT NULL',
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
        $this->addForeignKey('fk_pegawai_wilayah', 'pegawai', 'wilayah_id', 'wilayah', 'id', 'CASCADE', 'CASCADE');
	}

	public function safeDown()
	{
		$this->dropTable('pegawai');
	}

}