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
                ],
            ],
        ],
    ],

    //################################################################################
    'dataCollector' => [
        'addData' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
        ],
    ],

    //################################################################################
    'dataDistributor' => [//TODO: dokończyć opis akcji
        'tmp' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
        ],
    ],

    //################################################################################
    'remoteControll' => [//TODO: dokończyć opis akcji
        'tmp' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
        ],
    ],
    
    //################################################################################
    'sensors' => [
        'getAllSensors' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
        ],
    ],

    //################################################################################
    'status' => [
        'ping' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
        ],
    ],

];