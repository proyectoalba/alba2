<?php

class m130810_190432_datos_generales extends \yii\db\Migration
{
	public function up()
	{
		$command = $this->db->createCommand();
		/*
		// Países
		$command->createTable('pais', array(
			'id' => 'pk',
			'nombre' => 'VARCHAR(60) NOT NULL',
			'codigo' => 'VARCHAR(3) NOT NULL',
		))->execute();
		$command->createIndex('pais_unique', 'pais', 'nombre', true)->execute();
		
		// Provincias
		$command->createTable('provincia', array(
			'id' => 'pk',
			'pais_id' => 'INTEGER NOT NULL',
			'nombre' => 'VARCHAR(60) NOT NULL',
		))->execute();
		$command->addForeignKey('provincia_pais_fk', 'provincia', 'pais_id', 'pais', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->createIndex('provincia_unique', 'provincia', 'pais_id, nombre', true)->execute();
		
		// Ciudades
		$command->createTable('ciudad', array(
			'id' => 'pk',
			'provincia_id' => 'INTEGER NOT NULL',
			'nombre' => 'VARCHAR(60) NOT NULL',
		))->execute();
		$command->addForeignKey('ciudad_provincia_fk', 'ciudad', 'provincia_id', 'provincia', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->createIndex('ciudad_unique', 'ciudad', 'provincia_id, nombre', true)->execute();
		
		// Tipos de documento
		$command->createTable('tipo_documento', array(
			'id' => 'pk',
			'descripcion' => 'VARCHAR(40) NOT NULL',
			'abreviatura' => 'VARCHAR(10) NOT NULL',
		))->execute();
		$command->createIndex('tipo_documento_unique', 'tipo_documento', 'descripcion', true)->execute();
		
		// Parentezcos
		$command->createTable('tipo_responsable', array(
			'id' => 'pk',
			'descripcion' => 'VARCHAR(30) NOT NULL',
		))->execute();		
		$command->createIndex('tipo_responsable_unique', 'tipo_responsable', 'descripcion', true)->execute();
		
		// Servicios de salud
		$command->createTable('servicio_salud', array(
			'id' => 'pk',
			'codigo' => 'VARCHAR(30) NULL',
			'abreviatura' => 'VARCHAR(30) NOT NULL',
			'nombre' => 'VARCHAR(255) NOT NULL',
			'email' =>  'VARCHAR(99) NULL',
			'sitio_web' =>  'VARCHAR(99) NULL',
		))->execute();
		
		$command->createTable('servicio_salud_contacto', array(
			'id' => 'pk',
			'servicio_salud_id' => 'INT NOT NULL',
			'direccion' => 'VARCHAR(99) NOT NULL',
			'cp' => 'VARCHAR(30) NULL',
			'pais_id' => 'INT NULL',
			'provincia_id' => 'INT NULL',
			'ciudad_id' => 'INT NULL',
			'telefono' => 'VARCHAR(60) NOT NULL',
			'telefono_alternativo' =>  'VARCHAR(60) NULL',
			'observaciones' => 'VARCHAR(255) NULL',
		))->execute();
		$command->addForeignKey('servicio_salud_contacto_servicio_salud_fk', 'servicio_salud_contacto', 'servicio_salud_id', 'servicio_salud', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('servicio_salud_contacto_pais_fk', 'servicio_salud_contacto', 'pais_id', 'pais', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('servicio_salud_contacto_provincia_fk', 'servicio_salud_contacto', 'provincia_id', 'provincia', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('servicio_salud_contacto_ciudad_fk', 'servicio_salud_contacto', 'ciudad_id', 'ciudad', 'id', 'RESTRICT', 'RESTRICT')->execute();
		*/ 
		// Cargar los datos
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/schema_2013_30_09.sql'))->execute();
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/01_datos_geograficos.sql'))->execute();
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/02_datos_generales.sql'))->execute();
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/03_servicios_salud.sql'))->execute();
	}

	public function down()
	{		
		$command = $this->db->createCommand();
		/*
		$command->dropTable('servicio_salud_contacto')->execute();
		$command->dropTable('servicio_salud')->execute();
		$command->dropTable('ciudad')->execute();
		$command->dropTable('provincia')->execute();
		$command->dropTable('pais')->execute();
		$command->dropTable('tipo_documento')->execute();
		$command->dropTable('tipo_responsable')->execute();
		*/ 
	}
}
