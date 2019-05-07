<?php

$controllesAction = [
    'test' => [//controller name
        'test' => NULL,
        'mleko' => [
            'id' => [
                'require' => [
                    'errorMessage' => 'ID is required.'
                ],
                '0' => [
                    'errorMessage' => 'Invalid ID value.'
                ],
                'min' => [
                    'params' => [1],
                    'errorMessage' => 'Invalid ID min value.'
                ]
            ]
        ]
    ],
    
    'sensors' => [
        'getAllSensors' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ]
        ]
    ]

];