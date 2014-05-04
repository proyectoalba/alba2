<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $id
 * @property string $apellido
 * @property string $nombre
 * @property string $fecha_alta
 * @property integer $tipo_documento_id
 * @property string $numero_documento
 * @property integer $estado_documento_id
 * @property integer $sexo_id
 * @property string $fecha_nacimiento
 * @property string $lugar_nacimiento
 * @property string $telefono
 * @property string $telefono_alternativo
 * @property string $email
 * @property string $foto
 * @property string $observaciones
 *
 * @property Alumno $alumno
 * @property Docente $docente
 * @property TipoDocumento $tipoDocumento
 * @property EstadoDocumento $estadoDocumento
 * @property Sexo $sexo
 * @property PersonaDomicilio[] $personaDomicilios
 * @property ResponsableAlumno $responsableAlumno
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apellido', 'nombre', 'fecha_alta', 'tipo_documento_id', 'numero_documento', 'sexo_id'], 'required'],
            [['fecha_alta', 'fecha_nacimiento'], 'safe'],
            [['tipo_documento_id', 'estado_documento_id', 'sexo_id'], 'integer'],
            [['apellido', 'nombre', 'numero_documento'], 'string', 'max' => 30],
            [['lugar_nacimiento', 'foto', 'observaciones'], 'string', 'max' => 255],
            [['telefono', 'telefono_alternativo'], 'string', 'max' => 60],
            [['email'], 'string', 'max' => 99],
            [['tipo_documento_id', 'numero_documento'], 'unique', 'targetAttribute' => ['tipo_documento_id', 'numero_documento'], 'message' => 'The combination of Tipo Documento ID and Numero Documento has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'apellido' => Yii::t('app', 'Apellido'),
            'nombre' => Yii::t('app', 'Nombre'),
            'fecha_alta' => Yii::t('app', 'Fecha Alta'),
            'tipo_documento_id' => Yii::t('app', 'Tipo Documento ID'),
            'numero_documento' => Yii::t('app', 'Numero Documento'),
            'estado_documento_id' => Yii::t('app', 'Estado Documento ID'),
            'sexo_id' => Yii::t('app', 'Sexo ID'),
            'fecha_nacimiento' => Yii::t('app', 'Fecha Nacimiento'),
            'lugar_nacimiento' => Yii::t('app', 'Lugar Nacimiento'),
            'telefono' => Yii::t('app', 'Telefono'),
            'telefono_alternativo' => Yii::t('app', 'Telefono Alternativo'),
            'email' => Yii::t('app', 'Email'),
            'foto' => Yii::t('app', 'Foto'),
            'observaciones' => Yii::t('app', 'Observaciones'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['persona_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocente()
    {
        return $this->hasMany(Docente::className(), ['persona_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDocumento()
    {
        return $this->hasOne(TipoDocumento::className(), ['id' => 'tipo_documento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoDocumento()
    {
        return $this->hasOne(EstadoDocumento::className(), ['id' => 'estado_documento_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSexo()
    {
        return $this->hasOne(Sexo::className(), ['id' => 'sexo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonaDomicilios()
    {
        return $this->hasMany(PersonaDomicilio::className(), ['persona_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsableAlumnos()
    {
        return $this->hasMany(ResponsableAlumno::className(), ['persona_id' => 'id']);
    }
    
    /**
     * @return string
     */ 
    public function getDocumentoCompleto()
    {
        return $this->tipoDocumento->abreviatura . ' ' . $this->numero_documento;
    }
    
}
