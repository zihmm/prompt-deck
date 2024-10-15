<?php

return [
	'countdown_timer' => 90,

	'xls' => [
		'filepath' => storage_path('/app/public/battles.xlsx'),

		'cells' => [
			'actor_white' => 4,
			'actor_red' => 5,
			'finished_at' => 6
		],

		'index' => [
			'finished_at' => 5
		]
	]
];