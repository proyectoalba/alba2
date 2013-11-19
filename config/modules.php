<?php

return [
	'sistema' => [
		'class' => 'app\modules\sistema\Module',
	],
	'administracion' => [
		'class' => 'app\modules\administracion\Module',
		'modules' => [
			'datos' => [
				'class' => 'app\modules\administracion\modules\datos\Module',
			],
		],
	],
	'setup' => [
		'class' => 'app\modules\setup\Module',
	],
];
