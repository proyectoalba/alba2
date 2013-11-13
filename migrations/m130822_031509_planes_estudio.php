<?php

class m130822_031509_planes_estudio extends \yii\db\Migration
{
	public function up()
	{
		$command = $this->db->createCommand();
		/*
		// Niveles
		$command->createTable('niveles', array(
			'id' => 'pk',
			'descripcion' => 'VARCHAR(20)',
		))->execute();
				
		// Tipos de estado de los ciclos lectivos
		$command->createTable('estados_ciclo_lectivo', array(
			'id' => 'pk',
			'descripcion' => 'VARCHAR(60)',
			'nombre_interno' => 'VARCHAR(60)',
		))->execute();
		$command->createIndex('estado_ciclo_lectivo_unique', 'estados_ciclo_lectivo', 'descripcion', true)->execute();
		$command->createIndex('estado_ciclo_lectivo__nombre_interno_unique', 'estados_ciclo_lectivo', 'nombre_interno', true)->execute();
		
		// Ciclos lectivos
		$command->createTable('ciclos_lectivos', array(
			'id' => 'pk',
			'anio' => 'SMALLINT NOT NULL',
			'nivel_id' => 'INT NOT NULL',
			'descripcion' => 'VARCHAR(60)',
			'fecha_inicio' => 'DATE NULL',
			'fecha_fin' => 'DATE NULL',
			'estado_id' => 'INT NOT NULL',
			'activo' => 'BOOLEAN NOT NULL DEFAULT FALSE'
		))->execute();
		$command->addForeignKey('ciclos_lectivos_nivel_fk', 'ciclos_lectivos', 'nivel_id', 'niveles', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('ciclos_lectivos_estado_fk', 'ciclos_lectivos', 'estado_id', 'estados_ciclo_lectivo', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->createIndex('ciclo_lectivo_unique', 'ciclos_lectivos', 'anio', true)->execute();

		// Historial de estados de los ciclos lectivos
		$command->createTable('ciclos_lectivos_estados', array(
			'id' => 'pk',
			'ciclo_lectivo_id' => 'INT NOT NULL',
			'estado_id' => 'INT NOT NULL',
			'fecha' => 'DATETIME NOT NULL',
		))->execute();
		$command->addForeignKey('ciclos_lectivos_estados_ciclo_lectivo_fk', 'ciclos_lectivos_estados', 'ciclo_lectivo_id', 'ciclos_lectivos', 'id', 'RESTRICT', 'RESTRICT')->execute();
		$command->addForeignKey('ciclos_lectivos_estados_estado_fk', 'ciclos_lectivos_estados', 'estado_id', 'estados_ciclo_lectivo', 'id', 'RESTRICT', 'RESTRICT')->execute();
		*/
	}

	public function down()
	{		
		$command = $this->db->createCommand();
		/*
		$command->dropTable('ciclos_lectivos_estados')->execute();
		$command->dropTable('ciclos_lectivos')->execute();
		$command->dropTable('estados_ciclo_lectivo')->execute();
		$command->dropTable('niveles')->execute();
		*/ 
	}
}
