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
	
	/**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules([
            'administracion/establecimientos/<establecimiento_id:[0-9]+>/<controller:\w+>' => 'administracion/establecimientos/<controller>/index',
            'administracion/establecimientos/<establecimiento_id:[0-9]+>/<controller:\w+>/<action:\w+>' => 'administracion/establecimientos/<controller>/<action>',
        ], false);
    }
}
