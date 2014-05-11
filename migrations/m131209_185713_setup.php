<?php

use yii\db\Schema;

class m131209_185713_setup extends \yii\db\Migration
{
	public function up()
	{
		// Cargar los datos
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/schema_2014_05_10.sql'))->execute();
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/01_datos_geograficos.sql'))->execute();
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/02_datos_generales.sql'))->execute();
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/03_servicios_salud.sql'))->execute();
	}

	public function down()
	{
		echo "m131209_185713_setup cannot be reverted.\n";
		return false;
	}
}
