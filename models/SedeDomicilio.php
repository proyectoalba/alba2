<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sede_domicilio".
 *
 * @property integer $id
 * @property integer $sede_id
 * @property integer $domicilio_id
 *
 * @property Sede $sede
 * @property Domicilio $domicilio
 */
class SedeDomicilio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sede_domicilio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sede_id', 'domicilio_id'], 'required'],
            [['sede_id', 'domicilio_id'], 'integer'],
            [['sede_id', 'domicilio_id'], 'unique', 'targetAttribute' => ['sede_id', 'domicilio_id'], 'message' => 'The combination of Sede ID and Domicilio ID has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'sede_id' => Yii::t('app', 'Sede ID'),
            'domicilio_id' => Yii::t('app', 'Domicilio ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSede()
    {
        return $this->hasOne(Sede::className(), ['id' => 'sede_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomicilio()
    {
        return $this->hasOne(Domicilio::className(), ['id' => 'domicilio_id']);
    }
}
