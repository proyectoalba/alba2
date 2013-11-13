<?php

class m130901_152748_establecimientos extends \yii\db\Migration
{
	public function up()
	{
		$command = $this->db->createCommand();
		/*
		// Establecimientos
		$command->createTable('establecimientos', array(
			'id' => 'pk',
			'codigo' => 'VARCHAR(99) NULL',
			'nombre' => 'VARCHAR(99) NOT NULL',
			'telefono' => 'VARCHAR(60) NULL',
			'telefono_alternativo' => 'VARCHAR(60) NULL',
			'fax' => 'VARCHAR(60) NULL',
			'email' => 'VARCHAR(99) NULL',
			'sitio_web' => 'VARCHAR(99) NULL',
		))->execute();
		
		// Sedes
		$command->createTable('sedes', array(
			'id' => 'pk',
			'establecimiento_id' => 'INTEGER NOT NULL',
			'codigo' => 'VARCHAR(99) NULL',
			'nombre' => 'VARCHAR(99) NOT NULL',
			'telefono' => 'VARCHAR(60) NULL',
			'telefono_alternativo' => 'VARCHAR(60) NULL',
			'fax' => 'VARCHAR(60) NULL',
			'principal' => 'BOOLEAN NOT NULL DEFAULT FALSE'
		))->execute();
		$command->createIndex('sede_unique', 'sedes', 'establecimiento_id, nombre', true)->execute();
		$command->addForeignKey('sedes_establecimiento_fk', 'sedes', 'establecimiento_id', 'establecimientos', 'id', 'RESTRICT', 'RESTRICT')->execute();
		
		$command->createTable('sedes_domicilio', array(
			'id' => 'pk',
			'sede_id' => 'INTEGER NOT NULL',
			'direccion' => 'VARCHAR(99) NOT NULL',
			'cp' => 'VARCHAR(30) NULL',
			'pais_id' => 'INT NULL',
			'provincia_id' => 'INT NULL',
			'ciudad_id' => 'INT NULL',
			'principal' => 'BOOLEAN NOT NULL DEFAULT TRUE',
			'observaciones' => 'VARCHAR(255) NULL',
		))->execute();
		$command->addForeignKey('sedes_domicilio_sede_fk', 'sedes_domicilio', 'sede_id', 'sedes', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('sedes_domicilio_pais_fk', 'sedes_domicilio', 'pais_id', 'paises', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('sedes_domicilio_provincia_fk', 'sedes_domicilio', 'provincia_id', 'provincias', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('sedes_domicilio_ciudad_fk', 'sedes_domicilio', 'ciudad_id', 'ciudades', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->createIndex('sede_domicilio_unique', 'sedes_domicilio', 'sede_id', true)->execute();
		
		// Grados
		$command->createTable('grados', array(
			'id' => 'pk',
			'descripcion' => 'VARCHAR(30) NOT NULL',
		))->execute();
		$command->createIndex('grado_unique', 'grados', 'descripcion', true)->execute();
		
		// Turnos
		$command->createTable('turnos', array(
			'id' => 'pk',
			'descripcion' => 'VARCHAR(30) NOT NULL',
		))->execute();
		$command->createIndex('turno_unique', 'turnos', 'descripcion', true)->execute();
		
		// Secciones
		$command->createTable('secciones', array(
			'id' => 'pk',
			'sede_id' => 'INTEGER NOT NULL',
			'ciclo_lectivo_id' => 'INTEGER NOT NULL',
			'turno_id' => 'INTEGER NOT NULL',
			'grado_id' => 'INTEGER NOT NULL',
			'identificador' => 'VARCHAR(30) NOT NULL',
			'cupo_maximo' => 'SMALLINT NULL',
		))->execute();
		$command->addForeignKey('secciones_sede_fk', 'secciones', 'sede_id', 'sedes', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('secciones_turno_fk', 'secciones', 'turno_id', 'turnos', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('secciones_grado_fk', 'secciones', 'grado_id', 'grados', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->createIndex('seccion_unique', 'secciones', 'sede_id, ciclo_lectivo_id, turno_id, grado_id, identificador', true)->execute();
		*/
		// Cargar los datos
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/04_establecimientos.sql'))->execute();
	}

	public function down()
	{
		$command = $this->db->createCommand();
		/*
		$command->dropTable('secciones')->execute();
		$command->dropTable('sedes_domicilio')->execute();
		$command->dropTable('sedes')->execute();
		$command->dropTable('establecimientos')->execute();
		$command->dropTable('grados')->execute();
		$command->dropTable('turnos')->execute();
		*/ 
	}
}
