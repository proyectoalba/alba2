<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\components;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQueryInterface;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\grid\DataColumn;


class BooleanColumn extends DataColumn
{

    /**
     * @var boolean tratar los valores `null` como si fueran `false`.
     */ 
    public $showNullAsFalse = true;    
    /**
     * @var string|array in which format should the value of each data model be displayed as (e.g. "raw", "text", "html",
     * ['date', 'Y-m-d']). Supported formats are determined by the [[GridView::formatter|formatter]] used by
     * the [[GridView]]. Default format is "html" which will format the value as an HTML-encoded plain text when
     * [[\yii\base\Formatter::format()]] or [[\yii\i18n\Formatter::format()]] is used.
     */
    public $format = 'html';
    /**
     * @var string|array|boolean the HTML code representing a filter input (e.g. a text field, a dropdown list)
     * that is used for this data column. This property is effective only when [[GridView::filterModel]] is set.
     *
     * - Si esta propiedad no está definida, muestra un combo con las opciones 'Sí' y 'No'
     * - Para desactivar el filtro, definirla como `false`.
     */
    public $filter = ['1' => 'Sí', '0' => 'No'];


    /**
     * Returns the data cell value.
     * @param mixed $model the data model
     * @param mixed $key the key associated with the data model
     * @param integer $index the zero-based index of the data model among the models array returned by [[GridView::dataProvider]].
     * @return string the data cell value
     */
    public function getDataCellValue($model, $key, $index)
    {
        $val = false;

        if ($this->value !== null) {
            if (is_string($this->value)) {
                $val = ArrayHelper::getValue($model, $this->value);
            } else {
                $val = call_user_func($this->value, $model, $index, $this);
            }
        } elseif ($this->attribute !== null) {
            $val = ArrayHelper::getValue($model, $this->attribute);
        }
        $val = (bool)$val;

        if ($val === true) {
            return '<span class="glyphicon glyphicon-ok"></span>';
        } elseif ($val === false || ($val === null && $this->showNullAsFalse)) {
            return '<span class="glyphicon glyphicon-remove"></span>';
        }
        return null;
    }

}
