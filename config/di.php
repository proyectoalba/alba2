<?php
// GridView
\Yii::$container->set('yii\grid\GridView', [
    'tableOptions' => [
        'class' => 'table table-striped table-bordered table-condensed table-hovered',
    ],
    'pager' =>  [
        'maxButtonCount' => 30,
        'options' => [
            'class' => 'pagination pagination-sm'
        ],
    ]
]);
//
\Yii::$container->set('yii\grid\DataColumn', [
    'filterInputOptions' => [
        'class' => 'form-control input-sm',
    ],
]);
//
\Yii::$container->set('yii\grid\ActionColumn', [
    'headerOptions' => [
        'class' => 'grid-object-actions',
    ],
]);
// Pagination

\Yii::$container->set('yii\data\Pagination', [
    'defaultPageSize' => 50,
]);
?>
