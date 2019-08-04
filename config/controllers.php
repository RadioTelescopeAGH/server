<?php

$controllesAction = [
    // 'test' => [//controller name
    //     'test' => NULL,
    //     'mleko' => [
    //         'id' => [
    //             'require' => [
    //                 'errorMessage' => 'ID is required.'
    //             ],
    //             '0' => [
    //                 'errorMessage' => 'Invalid ID value.'
    //             ],
    //             'min' => [
    //                 'params' => [1],
    //                 'errorMessage' => 'Invalid ID min value.'
    //             ],
    //         ],
    //     ],
    // ],

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
    'dataDistributor' => [
        'getAllData' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
        ],
        'getLastData' => [],
        'getTodayData' => [],
        'getDataLtDate' => [
            'data' => [
                'require' => [
                    'errorMessage' => 'date is required.'
                ],
                '0' => [
                    'errorMessage' => 'Invalid date value.'
                ],
            ],
        ],
        'getDataGtDate' => [
            'data' => [
                'require' => [
                    'errorMessage' => 'date is required.'
                ],
                '0' => [
                    'errorMessage' => 'Invalid date value.'
                ],
            ],
        ],
        'getDataBetweenDate' => [
            'data_start' => [
                'require' => [
                    'errorMessage' => 'date is required.'
                ],
                '0' => [
                    'errorMessage' => 'Invalid date value.'
                ],
            ],
            'data_end' => [
                'require' => [
                    'errorMessage' => 'date is required.'
                ],
                '0' => [
                    'errorMessage' => 'Invalid date value.'
                ],
            ],
        ],
    ],

    //################################################################################
    'remoteControll' => [
        //--------------------------------------------------------
        'moveToCordAction' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
            'len' => [
                'require' => [
                    'errorMessage' => 'len is required.'
                ],
                '0' => [
                    'errorMessage' => 'Invalid len value.'
                ],
                'min' => [
                    'params' => [0],
                    'errorMessage' => 'len value must be >= 0.'
                ],
                'max' => [
                    'params' => [360],
                    'errorMessage' => 'len value must be <= 360.'
                ],
            ],
            'lat' => [
                'require' => [
                    'errorMessage' => 'lat is required.'
                ],
                '0' => [
                    'errorMessage' => 'Invalid lat value.'
                ],
                'min' => [
                    'params' => [0],
                    'errorMessage' => 'lat value must be >= 0.'
                ],
                'max' => [
                    'params' => [180],
                    'errorMessage' => 'lat value must be <= 180.'
                ],
            ],
        ],
        //--------------------------------------------------------
        'moveEngineXCords' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
            'x' => [
                'require' => [
                    'errorMessage' => 'x is required.'
                ],
                '0' => [
                    'errorMessage' => 'Invalid x value.'
                ],
                'min' => [
                    'params' => [0],
                    'errorMessage' => 'lexn value must be >= 0.'
                ],
                'max' => [
                    'params' => [100],
                    'errorMessage' => 'x value must be <= 100.'
                ],
            ],
        ],
        //--------------------------------------------------------
        'moveEngineYCords' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
            'y' => [
                'require' => [
                    'errorMessage' => 'y is required.'
                ],
                '0' => [
                    'errorMessage' => 'Invalid y value.'
                ],
                'min' => [
                    'params' => [0],
                    'errorMessage' => 'y value must be >= 0.'
                ],
                'max' => [
                    'params' => [100],
                    'errorMessage' => 'y value must be <= 100.'
                ],
            ],
        ],
        //--------------------------------------------------------
        'moveTop' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
            'val' => [
                'require' => [
                    'errorMessage' => 'val is required.'
                ],
                '0' => [
                    'errorMessage' => 'Invalid val value.'
                ],
                'min' => [
                    'params' => [0],
                    'errorMessage' => 'val value must be >= 0.'
                ],
            ],
        ],
        //--------------------------------------------------------
        'moveBottom' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
            'val' => [
                'require' => [
                    'errorMessage' => 'val is required.'
                ],
                '0' => [
                    'errorMessage' => 'Invalid val value.'
                ],
                'min' => [
                    'params' => [0],
                    'errorMessage' => 'val value must be >= 0.'
                ],
            ],
        ],
        //--------------------------------------------------------
        'moveLeft' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
            'val' => [
                'require' => [
                    'errorMessage' => 'val is required.'
                ],
                '0' => [
                    'errorMessage' => 'Invalid val value.'
                ],
                'min' => [
                    'params' => [0],
                    'errorMessage' => 'val value must be >= 0.'
                ],
            ],
        ],
        //--------------------------------------------------------
        'moveRight' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
            'val' => [
                'require' => [
                    'errorMessage' => 'val is required.'
                ],
                '0' => [
                    'errorMessage' => 'Invalid val value.'
                ],
                'min' => [
                    'params' => [0],
                    'errorMessage' => 'val value must be >= 0.'
                ],
            ],
        ],
        //--------------------------------------------------------
        'getSensorsData' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
            //TODO: trzeba przygotować validacje listy sensorów
        ],
        //--------------------------------------------------------
        'getMotorState' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
        ],
        //--------------------------------------------------------
        'getAllSensors' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
        ],
        //--------------------------------------------------------
        'restart' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
        ],
        //--------------------------------------------------------
        'shudDown' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
        ],
        //--------------------------------------------------------
        'stopCollect' => [
            'token' => [
                'require' => [
                    'errorMessage' => 'Insert token.'
                ],
            ],
        ],
        //--------------------------------------------------------
        'startCollect' => [
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