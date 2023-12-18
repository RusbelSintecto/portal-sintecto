<?php

class m231214_154719_PQR extends CDbMigration
{
	public function up()
	{
		$this->createTable('ses_PQR', array(
			'id' => 'pk',
			'title' => 'varchar(250)',
			'type' => 'integer(1)',
			'areaDirigida' => 'integer(1)',
			'idUserCreate' => 'integer',
			'PQRText' => 'text',
			'idUserfinished' => 'integer',
			'PQRAnswer' => 'text',
			'status' => 'integer(1)',
			'created' => 'datetime',
			'modified' => 'datetime',
			'finished' => 'datetime',

		), 'ENGINE=InnoDB DEFAULT CHARSET=utf8');

		$this->addForeignKey('FK_ses_PQR_idUserCreate_ses_User_id','ses_PQR','idUserCreate','ses_User','id'); 
		$this->addForeignKey('FK_ses_PQR_idUserfinished_ses_User_id','ses_PQR','idUserfinished','ses_User','id'); 
	}

	public function down()
	{
		$this->dropTable('ses_PQR');
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
