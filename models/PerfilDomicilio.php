<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfil_domicilio".
 *
 * @property integer $id
 * @property integer $perfil_id
 * @property integer $domicilio_id
 *
 * @property Perfil $perfil
 * @property Domicilio $domicilio
 */
class PerfilDomicilio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfil_domicilio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['perfil_id', 'domicilio_id'], 'required'],
            [['perfil_id', 'domicilio_id'], 'integer'],
            [['perfil_id', 'domicilio_id'], 'unique', 'targetAttribute' => ['perfil_id', 'domicilio_id'], 'message' => 'The combination of Perfil ID and Domicilio ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'perfil_id' => Yii::t('app', 'Perfil ID'),
            'domicilio_id' => Yii::t('app', 'Domicilio ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id' => 'perfil_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomicilio()
    {
        return $this->hasOne(Domicilio::className(), ['id' => 'domicilio_id']);
    }
}
