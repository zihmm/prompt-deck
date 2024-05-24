<?php

return [
	'xls' => [
		'filepath' => storage_path('/app/public/battles.xlsx'),

		'cells' => [
			'actor_left' => 4,
			'actor_right' => 5,
			'finished_at' => 6
		],

		'index' => [
			'finished_at' => 5
		]
	]
];