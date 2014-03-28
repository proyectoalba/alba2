<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_designacion_docente".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property DesignacionDocente[] $designacionDocentes
 */
class EstadoDesignacionDocente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_designacion_docente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 45],
            [['descripcion'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesignacionDocentes()
    {
        return $this->hasMany(DesignacionDocente::className(), ['estado_id' => 'id']);
    }
}
