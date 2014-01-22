<?php
namespace app\components;

use Yii;

class RbacPhpManager extends \yii\rbac\PhpManager
{
	public function init()
	{
		parent::init();
		if (!Yii::$app->user->isGuest) {
			// we suppose that user's role is stored in identity
			$this->assign(Yii::$app->user->identity->id, Yii::$app->user->identity->role);
		}
	}
}
