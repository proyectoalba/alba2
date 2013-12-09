<?php

namespace app\models;

/**
 * This is the model class for table "documentacion_inscripcion".
 *
 * @property integer $id
 * @property integer $inscripcion_id
 * @property boolean $documento_alumno
 * @property boolean $certificado_nacimiento
 * @property boolean $documento_responsables
 * @property boolean $certificado_vacunas
 * @property boolean $planilla_completa
 *
 * @property Inscripcion $inscripcion
 */
class DocumentacionInscripcion extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'documentacion_inscripcion';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['inscripcion_id', 'documento_alumno', 'certificado_nacimiento', 'documento_responsables', 'certificado_vacunas', 'planilla_completa'], 'required'],
			[['inscripcion_id'], 'integer'],
			[['documento_alumno', 'certificado_nacimiento', 'documento_responsables', 'certificado_vacunas', 'planilla_completa'], 'boolean']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'inscripcion_id' => 'Inscripcion ID',
			'documento_alumno' => 'Documento Alumno',
			'certificado_nacimiento' => 'Certificado Nacimiento',
			'documento_responsables' => 'Documento Responsables',
			'certificado_vacunas' => 'Certificado Vacunas',
			'planilla_completa' => 'Planilla Completa',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getInscripcion()
	{
		return $this->hasOne(Inscripcion::className(), ['id' => 'inscripcion_id']);
	}
}
