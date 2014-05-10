<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "domicilio".
 *
 * @property integer $id
 * @property string $direccion
 * @property string $cp
 * @property integer $pais_id
 * @property integer $provincia_id
 * @property integer $ciudad_id
 * @property integer $principal
 * @property string $observaciones
 *
 * @property Ciudad $ciudad
 * @property Pais $pais
 * @property Provincia $provincia
 * @property PerfilDomicilio[] $perfilDomicilios
 * @property SedeDomicilio[] $sedeDomicilios
 * @property ServicioSaludDomicilio[] $servicioSaludDomicilios
 * 
 * @property Sede $sede
 * @property Perfil $perfil
 * @property Alumno $alumno
 */
class Domicilio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'domicilio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['direccion'], 'required'],
            [['pais_id', 'provincia_id', 'ciudad_id', 'principal'], 'integer'],
            [['direccion'], 'string', 'max' => 99],
            [['cp'], 'string', 'max' => 30],
            [['observaciones'], 'string', 'max' => 255],
            // Sólo puede haber un único Domicilio principal por Sede
            [['principal'], 'validarDomicilioPrincipalSedeUnique', 'on' => ['sede']],
        ];
    }

    public function validarDomicilioPrincipalSedeUnique($attribute, $params) {
        if ((bool)$this->$attribute !== true) {
            // Si `$principal` no es `true`, no hace falta validar
            return;
        }
        $q = Domicilio::find()
            ->joinWith('sede')
            ->andWhere(['sede.id' => $this->sede->id, 'domicilio.principal' => true]);

        if ($this->id !== null) {
            // Se está editando, chequear que no sea el id del objeto actual
            $q->andWhere('domicilio.id != :domicilio_id', [':domicilio_id' => $this->id]);
        }        
        if ($q->count() > 0) {
            $this->addError($attribute, Yii::t('app', 'La Sede ya cuenta con un domicilio principal.'));
        }
        
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'direccion' => Yii::t('app', 'Direccion'),
            'cp' => Yii::t('app', 'Cp'),
            'pais_id' => Yii::t('app', 'Pais ID'),
            'provincia_id' => Yii::t('app', 'Provincia ID'),
            'ciudad_id' => Yii::t('app', 'Ciudad ID'),
            'principal' => Yii::t('app', 'Principal'),
            'observaciones' => Yii::t('app', 'Observaciones'),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function afterSave($insert)
    {
        // Guardar la relación al crear
        if ($insert === true) { 
            switch ($this->scenario) {
                case 'sede':         
                    $relation = new SedeDomicilio;
                    $relation->sede_id = $this->sede->id;
                    break;
            }

            $relation->domicilio_id = $this->id;
            $relation->save();
        }

        parent::afterSave($insert);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCiudad()
    {
        return $this->hasOne(Ciudad::className(), ['id' => 'ciudad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPais()
    {
        return $this->hasOne(Pais::className(), ['id' => 'pais_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincia()
    {
        return $this->hasOne(Provincia::className(), ['id' => 'provincia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfilDomicilios()
    {
        return $this->hasMany(PerfilDomicilio::className(), ['domicilio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSedeDomicilios()
    {
        return $this->hasMany(SedeDomicilio::className(), ['domicilio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServicioSaludDomicilios()
    {
        return $this->hasMany(ServicioSaludDomicilio::className(), ['domicilio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSede()
    {
        return $this->hasOne(Sede::className(), ['id' => 'sede_id'])
            ->viaTable('sede_domicilio', ['domicilio_id' => 'id']);
    }

    /**
     * 
     */
    public function setSede(Sede $sede)
    {
        $this->sede = $sede;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id' => 'perfil_id'])
            ->viaTable('perfil_domicilio', ['domicilio_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */    
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['perfil_id' => 'id'])
            ->via('perfil');
    }

    /**
     */
    public function setAlumno(Alumno $alumno)
    {
        $this->alumno = $alumno;
    }
}
