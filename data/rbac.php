<?php
use yii\rbac\Item;

return [
	// HERE ARE YOUR MANAGEMENT TASKS
	'manageThing0' => ['type' => Item::TYPE_OPERATION, 'description' => '...', 'bizRule' => NULL, 'data' => NULL],
	'manageThing1' => ['type' => Item::TYPE_OPERATION, 'description' => '...', 'bizRule' => NULL, 'data' => NULL],
	'manageThing2' => ['type' => Item::TYPE_OPERATION, 'description' => '...', 'bizRule' => NULL, 'data' => NULL],
	'manageThing2' => ['type' => Item::TYPE_OPERATION, 'description' => '...', 'bizRule' => NULL, 'data' => NULL],

	// AND THE ROLES
	'guest' => [
		'type' => Item::TYPE_ROLE,
		'description' => 'Guest',
		'bizRule' => NULL,
		'data' => NULL
	],

	'user' => [
		'type' => Item::TYPE_ROLE,
		'description' => 'User',
		'children' => [
			'guest',
			'manageThing0', // User can edit thing0
		],
		'bizRule' => 'return !Yii::$app->user->isGuest;',
		'data' => NULL
	],

	'moderator' => [
		'type' => Item::TYPE_ROLE,
		'description' => 'Moderator',
		'children' => [
			'user',		 // Can manage all that user can
			'manageThing1', // and also thing1
		],
		'bizRule' => NULL,
		'data' => NULL
	],

	'admin' => [
		'type' => Item::TYPE_ROLE,
		'description' => 'Admin',
		'children' => [
			'moderator',	// can do all the stuff that moderator can
			'manageThing2', // and also manage thing2
		],
		'bizRule' => NULL,
		'data' => NULL
	],

	'godmode' => [
		'type' => Item::TYPE_ROLE,
		'description' => 'Super admin',
		'children' => [
			'admin',		// can do all that admin can
			'manageThing3', // and also thing3
		],
		'bizRule' => NULL,
		'data' => NULL
	],

];
