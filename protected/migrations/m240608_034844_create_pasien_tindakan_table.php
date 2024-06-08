<?php

class m240608_034844_create_pasien_tindakan_table extends CDbMigration
{
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('pasien_tindakan', array(
            'id' => 'pk',
            'pendaftaran_pasien_id' => 'integer NOT NULL',
            'tindakan_id' => 'integer NOT NULL',
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ));
        $this->addForeignKey('fk_pasien_tindakan_pendaftaran', 'pasien_tindakan', 'pendaftaran_pasien_id', 'pendaftaran_pasien', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_pasien_tindakan_tindakan', 'pasien_tindakan', 'tindakan_id', 'tindakan', 'id', 'CASCADE', 'CASCADE');

	}

	public function safeDown()
	{
		$this->dropTable('pasien_tindakan');
	}

}