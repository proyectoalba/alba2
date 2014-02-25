<?php

namespace app\models;

/**
 * This is the model class for table "designacion_docente_seccion".
 *
 * @property integer $id
 * @property integer $designacion_docente_id
 * @property integer $seccion_id
 * @property integer $horas_semanales
 *
 * @property DesignacionDocente $designacionDocente
 * @property Seccion $seccion
 */
class DesignacionDocenteSeccion extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'designacion_docente_seccion';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['designacion_docente_id', 'seccion_id'], 'required'],
			[['designacion_docente_id', 'seccion_id', 'horas_semanales'], 'integer']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'designacion_docente_id' => 'Designacion Docente ID',
			'seccion_id' => 'Seccion ID',
			'horas_semanales' => 'Horas Semanales',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getDesignacionDocente()
	{
		return $this->hasOne(DesignacionDocente::className(), ['id' => 'designacion_docente_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSeccion()
	{
		return $this->hasOne(Seccion::className(), ['id' => 'seccion_id']);
	}
}
