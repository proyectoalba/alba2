<?php

use yii\db\Schema;

class m140511_162012_datos_prueba extends \yii\db\Migration
{
    public function up()
    {
		$this->db->createCommand(file_get_contents(__DIR__ . '/data/999_datos_prueba.sql'))->execute();

    }

    public function down()
    {
        echo "m140511_162012_datos_prueba cannot be reverted.\n";

        return false;
    }
}
