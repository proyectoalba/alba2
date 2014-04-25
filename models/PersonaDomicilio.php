<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona_domicilio".
 *
 * @property integer $id
 * @property integer $persona_id
 * @property integer $domicilio_id
 *
 * @property Persona $persona
 * @property Domicilio $domicilio
 */
class PersonaDomicilio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona_domicilio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['persona_id', 'domicilio_id'], 'required'],
            [['persona_id', 'domicilio_id'], 'integer'],
            [['persona_id', 'domicilio_id'], 'unique', 'targetAttribute' => ['persona_id', 'domicilio_id'], 'message' => 'The combination of Persona ID and Domicilio ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'persona_id' => Yii::t('app', 'Persona ID'),
            'domicilio_id' => Yii::t('app', 'Domicilio ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['id' => 'persona_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomicilio()
    {
        return $this->hasOne(Domicilio::className(), ['id' => 'domicilio_id']);
    }
}
