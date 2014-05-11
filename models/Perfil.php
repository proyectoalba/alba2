<?php

namespace app\models;

use Yii;
use app\components\helpers\CommonHelper;

/**
 * This is the model class for table "perfil".
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
 * @property Alumno $alumno
 * @property Docente $docente
 * @property EstadoDocumento $estadoDocumento
 * @property Sexo $sexo
 * @property TipoDocumento $tipoDocumento
 * @property PerfilDomicilio[] $domicilios
 * @property Responsable $responsable
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apellido', 'nombre', 'tipo_documento_id', 'numero_documento', 'sexo_id', 'fecha_alta'], 'required'],
            [['tipo_documento_id', 'estado_documento_id', 'sexo_id'], 'integer'],
            [['fecha_nacimiento', 'fecha_alta'], 'safe'],
            [['apellido', 'nombre', 'numero_documento'], 'string', 'max' => 30],
            [['lugar_nacimiento', 'foto', 'observaciones'], 'string', 'max' => 255],
            [['telefono', 'telefono_alternativo'], 'string', 'max' => 60],
            [['email'], 'string', 'max' => 99]
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
            'tipo_documento_id' => Yii::t('app', 'Tipo Documento ID'),
            'numero_documento' => Yii::t('app', 'Numero Documento'),
            'estado_documento_id' => Yii::t('app', 'Estado Documento ID'),
            'sexo_id' => Yii::t('app', 'Sexo ID'),
            'fecha_nacimiento' => Yii::t('app', 'Fecha Nacimiento'),
            'lugar_nacimiento' => Yii::t('app', 'Lugar Nacimiento'),
            'telefono' => Yii::t('app', 'Telefono'),
            'telefono_alternativo' => Yii::t('app', 'Telefono Alternativo'),
            'email' => Yii::t('app', 'Email'),
            'fecha_alta' => Yii::t('app', 'Fecha Alta'),
            'foto' => Yii::t('app', 'Foto'),
            'observaciones' => Yii::t('app', 'Observaciones'),
        ];
    }

    /**
     * Para limpiar los valores
     */ 
    public function beforeValidate()
    {
        $this->fecha_nacimiento = CommonHelper::traducirFecha($this->fecha_nacimiento);

        return parent::beforeValidate();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['perfil_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocente()
    {
        return $this->hasOne(Docente::className(), ['perfil_id' => 'id']);
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
    public function getDomicilios()
    {
        return $this->hasMany(Domicilio::className(), ['id' => 'domicilio_id'])
            ->viaTable('perfil_domicilio', ['perfil_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsables()
    {
        return $this->hasMany(Responsable::className(), ['perfil_id' => 'id']);
    }

    public function getDocumentoCompleto()
    {
        return $this->tipoDocumento->abreviatura . ' ' . $this->numero_documento;
    }
}
