<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\themes\basic;

use yii\web\AssetBundle;

class BasicThemeAppAsset extends AssetBundle
{
    public $sourcePath = '@app/themes/basic/assets';

    public $css = [
        'css/main.css',
        'css/twtbs-gradient-buttons.css',
    ];

    public $js = [
        'js/main.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
