<?php

namespace app\modules\administracion;

use yii\base\BootstrapInterface;


class Module extends \yii\base\Module implements BootstrapInterface
{
    public $controllerNamespace = 'app\modules\administracion\controllers';

    public function init()
	{
	    parent::init();
	    // custom initialization code goes here
    }

	/*
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules([
            /**
             * Reglas para establecimientos
             */ 
			// Reglas para poder acceder a, por ejemplo, las Sedes del establecimiento indicando `establecimientos/123/sedes`
			'administracion/establecimientos/<establecimiento_id:[0-9]+>/<controller:\w+>' => 'administracion/establecimientos/<controller>/index',
			'administracion/establecimientos/<establecimiento_id:[0-9]+>/<controller:\w+>/<action:\w+>' => 'administracion/establecimientos/<controller>/<action>',
			// Reglas para poder acceder a, por ejemplo, los Domicilios de las Sedes `establecimientos/123/sedes/456/domicilios`
			'administracion/establecimientos/<establecimiento_id:[0-9]+>/sedes/<sede_id:[0-9]+>/<controller:\w+>' => 'administracion/establecimientos/sedes/<controller>/index',
			'administracion/establecimientos/<establecimiento_id:[0-9]+>/sedes/<sede_id:[0-9]+>/<controller:\w+>/<action:\w+>' => 'administracion/establecimientos/sedes/<controller>/<action>',
            /**
             * Reglas para alumnos
             */ 
			// Reglas para poder acceder a, por ejemplo, los Domicilios del alumno indicando `alumnos/123/domicilios`
			'administracion/alumnos/<alumno_id:[0-9]+>/<controller:\w+>' => 'administracion/alumnos/<controller>/index',
			'administracion/alumnos/<alumno_id:[0-9]+>/<controller:\w+>/<action:\w+>' => 'administracion/alumnos/<controller>/<action>',
        ], false);
    }

}
