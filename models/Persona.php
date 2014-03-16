<?php

namespace app\models;

/**
 * This is the model class for table "persona".
 *
 * @property integer $id
 * @property string $apellido
 * @property string $nombre
 * @property integer $tipo_documento_id
 * @property string $numero_documento
 * @property integer $estado_documento_id
 * @property integer $sexo_id
 * @property string $fecha_nacimiento
 * @property string $lugar_nacimiento
 * @property string $telefono
 * @property string $telefono_alternativo
 * @property string $email
 * @property string $fecha_alta
 * @property string $foto
 * @property string $observaciones
 *
 * @property Alumno[] $alumnos
 * @property Docente[] $docentes
 * @property FichaSalud[] $fichaSaluds
 * @property EstadoDocumento $estadoDocumento
 * @property Sexo $sexo
 * @property TipoDocumento $tipoDocumento
 * @property PersonaDomicilio[] $personaDomicilios
 * @property ResponsableAlumno[] $responsableAlumnos
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
            [['apellido', 'nombre', 'tipo_documento_id', 'numero_documento', 'estado_documento_id', 'sexo_id'], 'required'],
            [['tipo_documento_id', 'estado_documento_id', 'sexo_id'], 'integer'],
            [['fecha_nacimiento', 'fecha_alta'], 'safe'],
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
            'id' => 'ID',
            'apellido' => 'Apellido',
            'nombre' => 'Nombre',
            'tipo_documento_id' => 'Tipo Documento ID',
            'numero_documento' => 'Numero Documento',
            'estado_documento_id' => 'Estado Documento ID',
            'sexo_id' => 'Sexo ID',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'lugar_nacimiento' => 'Lugar Nacimiento',
            'telefono' => 'Telefono',
            'telefono_alternativo' => 'Telefono Alternativo',
            'email' => 'Email',
            'fecha_alta' => 'Fecha Alta',
            'foto' => 'Foto',
            'observaciones' => 'Observaciones',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumnos()
    {
        return $this->hasMany(Alumno::className(), ['persona_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocentes()
    {
        return $this->hasMany(Docente::className(), ['persona_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFichaSaluds()
    {
        return $this->hasMany(FichaSalud::className(), ['persona_id' => 'id']);
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
    public function getTipoDocumento()
    {
        return $this->hasOne(TipoDocumento::className(), ['id' => 'tipo_documento_id']);
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
}
