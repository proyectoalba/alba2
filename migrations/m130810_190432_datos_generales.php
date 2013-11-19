<?php

class m130810_190432_datos_generales extends \yii\db\Migration
{
	public function up()
	{
		$command = $this->db->createCommand();
		// Cargar los datos
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/schema_2013_11_18.sql'))->execute();
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/01_datos_geograficos.sql'))->execute();
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/02_datos_generales.sql'))->execute();
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/03_servicios_salud.sql'))->execute();
	}

	public function down()
	{
	}
}
