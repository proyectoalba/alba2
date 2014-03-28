<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "documentacion_inscripcion".
 *
 * @property integer $id
 * @property integer $inscripcion_id
 * @property integer $documento_alumno
 * @property integer $certificado_nacimiento
 * @property integer $documento_responsables
 * @property integer $certificado_vacunas
 * @property integer $planilla_completa
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
            [['inscripcion_id', 'documento_alumno', 'certificado_nacimiento', 'documento_responsables', 'certificado_vacunas', 'planilla_completa'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'inscripcion_id' => Yii::t('app', 'Inscripcion ID'),
            'documento_alumno' => Yii::t('app', 'Documento Alumno'),
            'certificado_nacimiento' => Yii::t('app', 'Certificado Nacimiento'),
            'documento_responsables' => Yii::t('app', 'Documento Responsables'),
            'certificado_vacunas' => Yii::t('app', 'Certificado Vacunas'),
            'planilla_completa' => Yii::t('app', 'Planilla Completa'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcion()
    {
        return $this->hasOne(Inscripcion::className(), ['id' => 'inscripcion_id']);
    }
}
