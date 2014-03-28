<?php

namespace app\models;

use Yii;

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
            'id' => Yii::t('app', 'ID'),
            'designacion_docente_id' => Yii::t('app', 'Designacion Docente ID'),
            'seccion_id' => Yii::t('app', 'Seccion ID'),
            'horas_semanales' => Yii::t('app', 'Horas Semanales'),
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
