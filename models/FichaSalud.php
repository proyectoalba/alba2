<?php

namespace app\models;

/**
 * This is the model class for table "ficha_salud".
 *
 * @property integer $id
 * @property integer $persona_id
 * @property integer $servicio_salud_id
 * @property string $numero_afiliado
 * @property integer $estado_vacunacion_id
 * @property string $enfermedad
 * @property string $internacion
 * @property string $alergia
 * @property string $tratamiento
 * @property string $limitacion_fisica
 * @property string $otros
 * @property string $altura
 * @property string $peso
 * @property string $fecha
 *
 * @property ActualizacionSalud[] $actualizacionSaluds
 * @property ContactoEmergencia[] $contactoEmergencias
 * @property EstadoVacunacion $estadoVacunacion
 * @property Persona $persona
 * @property ServicioSalud $servicioSalud
 */
class FichaSalud extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'ficha_salud';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['persona_id', 'fecha'], 'required'],
			[['persona_id', 'servicio_salud_id', 'estado_vacunacion_id'], 'integer'],
			[['fecha'], 'safe'],
			[['numero_afiliado'], 'string', 'max' => 99],
			[['enfermedad', 'internacion', 'alergia', 'tratamiento', 'limitacion_fisica', 'otros'], 'string', 'max' => 255],
			[['altura', 'peso'], 'string', 'max' => 45]
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'persona_id' => 'Persona ID',
			'servicio_salud_id' => 'Servicio Salud ID',
			'numero_afiliado' => 'Numero Afiliado',
			'estado_vacunacion_id' => 'Estado Vacunacion ID',
			'enfermedad' => 'Enfermedad',
			'internacion' => 'Internacion',
			'alergia' => 'Alergia',
			'tratamiento' => 'Tratamiento',
			'limitacion_fisica' => 'Limitacion Fisica',
			'otros' => 'Otros',
			'altura' => 'Altura',
			'peso' => 'Peso',
			'fecha' => 'Fecha',
		];
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getActualizacionSaluds()
	{
		return $this->hasMany(ActualizacionSalud::className(), ['ficha_salud_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getContactoEmergencias()
	{
		return $this->hasMany(ContactoEmergencia::className(), ['ficha_salud_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getEstadoVacunacion()
	{
		return $this->hasOne(EstadoVacunacion::className(), ['id' => 'estado_vacunacion_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getPersona()
	{
		return $this->hasOne(Persona::className(), ['id' => 'persona_id']);
	}

	/**
	 * @return \yii\db\ActiveRelation
	 */
	public function getServicioSalud()
	{
		return $this->hasOne(ServicioSalud::className(), ['id' => 'servicio_salud_id']);
	}
}
