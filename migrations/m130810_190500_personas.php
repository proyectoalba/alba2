<?php

class m130810_190500_personas extends \yii\db\Migration
{
	public function up()
	{
		$command = $this->db->createCommand();
		
		// Personas
		/*
		$command->createTable('personas', array(
			'id' => 'pk',
			'apellido' => 'VARCHAR(30) NOT NULL',
			'nombre' => 'VARCHAR(30) NOT NULL',
			'tipo_documento_id' => 'INT NOT NULL',
			'numero_documento' => 'VARCHAR(30) NOT NULL',
			'sexo' => 'VARCHAR(1) NOT NULL DEFAULT \'m\'',
			'fecha_nacimiento' => 'DATE NULL',
			'telefono' => 'VARCHAR(60) NULL',
			'telefono_alternativo' => 'VARCHAR(60) NULL',
			'email' => 'VARCHAR(99) NULL',
			'fecha_alta' => 'DATETIME NOT NULL',
			'observaciones' => 'VARCHAR(255) NULL',
		))->execute();
		$command->addForeignKey('personas_tipo_documento_fk', 'personas', 'tipo_documento_id', 'tipos_documento', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->createIndex('persona_unique', 'personas', 'tipo_documento_id, numero_documento', true)->execute();

		// Domicilios
		$command->createTable('personas_domicilio', array(
			'id' => 'pk',
			'persona_id' => 'INT NOT NULL',
			'calle' => 'VARCHAR(99) NOT NULL',
			'altura' => 'VARCHAR(30) NOT NULL',
			'piso' => 'TINYINT NULL',
			'departamento' => 'VARCHAR(10) NULL',
			'cp' => 'VARCHAR(30) NULL',
			'pais_id' => 'INT NULL',
			'provincia_id' => 'INT NULL',
			'ciudad_id' => 'INT NULL',
			'principal' => 'BOOLEAN NOT NULL DEFAULT TRUE',
			'observaciones' => 'VARCHAR(255) NULL',
		))->execute();
		$command->addForeignKey('personas_domicilio_persona_fk', 'personas_domicilio', 'persona_id', 'personas', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('personas_domicilio_pais_fk', 'personas_domicilio', 'pais_id', 'paises', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('personas_domicilio_provincia_fk', 'personas_domicilio', 'provincia_id', 'provincias', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('personas_domicilio_ciudad_fk', 'personas_domicilio', 'ciudad_id', 'ciudades', 'id', 'RESTRICT', 'RESTRICT')->execute();

		// Tipos de estado de los alumnos
		$command->createTable('estados_alumno', array(
			'id' => 'pk',
			'descripcion' => 'VARCHAR(60) NOT NULL',
			'nombre_interno' => 'VARCHAR(60) NOT NULL',
		))->execute();
		$command->createIndex('estado_alumno_unique', 'estados_alumno', 'descripcion', true)->execute();

		// Alumnos
		$command->createTable('alumnos', array(
			'id' => 'pk',
			'persona_id' => 'INT NOT NULL',
			'codigo' => 'VARCHAR(30) NOT NULL',
			'estado_id' => 'INT NOT NULL',
			'fecha_alta' => 'DATETIME NOT NULL',
			'observaciones' => 'VARCHAR(255) NULL',
		))->execute();
		$command->addForeignKey('alumnos_persona_fk', 'alumnos', 'persona_id', 'personas', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('alumnos_estado_fk', 'alumnos', 'estado_id', 'estados_alumno', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->createIndex('alumno_unique', 'alumnos', 'codigo', true)->execute();

		// Historial de estados de los alumnos
		$command->createTable('alumnos_estados', array(
			'id' => 'pk',
			'alumno_id' => 'INT NOT NULL',
			'estado_id' => 'INT NOT NULL',
			'fecha' => 'DATETIME NOT NULL',
		))->execute();
		$command->addForeignKey('alumnos_estados_alumno_fk', 'alumnos_estados', 'alumno_id', 'alumnos', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('alumnos_estados_estado_fk', 'alumnos_estados', 'estado_id', 'estados_alumno', 'id', 'RESTRICT', 'RESTRICT')->execute();

		// Resposables de alumnos
		$command->createTable('responsables_alumnos', array(
			'id' => 'pk',
			'persona_id' => 'INT NOT NULL',
			'alumno_id' => 'INT NOT NULL',
			'parentezco_id' => 'INT NULL',
			'autorizado_retirar' => 'BOOLEAN NOT NULL DEFAULT FALSE',
			'observaciones' => 'VARCHAR(255) NULL',
		))->execute();
		$command->addForeignKey('responsables_alumnos_persona_fk', 'responsables_alumnos', 'persona_id', 'personas', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('responsables_alumnos_alumno_fk', 'responsables_alumnos', 'alumno_id', 'alumnos', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('responsables_alumnos_parentezco_fk', 'responsables_alumnos', 'parentezco_id', 'parentezcos', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->createIndex('responsables_alumnos_unique', 'responsables_alumnos', 'persona_id, alumno_id', true)->execute();
		*/				
		// Cargar los datos
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/05_personas.sql'))->execute();

	}

	public function down()
	{
		$command = $this->db->createCommand();
		/*
		$command->dropTable('responsables_alumnos')->execute();
		$command->dropTable('alumnos_estados')->execute();
		$command->dropTable('alumnos')->execute();
		$command->dropTable('estados_alumno')->execute();
		$command->dropTable('personas_domicilio')->execute();
		$command->dropTable('personas')->execute();
		*/ 
	}
}
