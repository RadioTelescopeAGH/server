<?php
include './config/const.php';
include './lib/JsonArray.php';
include './config/controllers.php';
include './lib/Validator.php';
include './entities/ControllerOutput.php';
include './lib/Auth.php';

include './vendor/autoload.php';

ORM::configure('mysql:host='.$dbHost.';dbname='.$dbName);
ORM::configure('username', $dbUser);
ORM::configure('password', $dbPass);

// var_dump($_SERVER);
// $inputSize = (int) $_SERVER['CONTENT_LENGTH'];

// if($inputSize > MAX_INPUT_SIZE){
//     JsonArray::p(false, ['error' => 'Too large request MAX_INPUT_SIZE is ' + MAX_INPUT_SIZE], true);
// }
$rawData = file_get_contents(INPUT_PATH);
$jsonData = json_decode($rawData, true);

//check default validation of inputdata
if(!isset($jsonData['action']) || $jsonData['action'] == '') {
    JsonArray::p(false, ['error' => 'Action parameters could be not empty.'], true);
}

$exectRoute = [
    'controller' => NULL,
    'action' => NULL,
    'arguments' => NULL
];

$secureArguments = [];

foreach($controllesAction as $controller => $actions) {
    foreach($actions as $action => $arguments) {
        if($jsonData['action'] == $action){
            $exectRoute['controller'] = $controller;
            $exectRoute['action'] = $action;
            $exectRoute['arguments'] = $arguments;
        }
    }
}

if($exectRoute['action'] == NULL) {
    JsonArray::p(false, ['error' => 'Action not exist.'], true);
}

//input argumnts validation if input arguments is defined
if($controllesAction[$exectRoute['controller']][$exectRoute['action']] != NULL) {
    if(!isset($jsonData['data']) || $jsonData['data'] == '') {
        JsonArray::p(false, ['error' => 'Action ' . $exectRoute['action'] . ' you must type data arguments.'], true);
    }
    $data = $jsonData['data'];

    foreach($exectRoute['arguments'] as $argumentsName => $filtrOptions) {
        //checking requiring arguments
        if(isset($exectRoute['arguments']['require'])){
            if(!isset($data[$argumentsName])) {
                JsonArray::p(false, ['error' => $exectRoute['arguments']['require']['errorMessage']], true);
            }
        }
        else {
            if(!isset($data[$argumentsName])) {
                $secureArguments[$argumentsName] = NULL;
                continue;
            }
        }

        //filters validation
        foreach($filtrOptions as $filterName => $arguments) {
            $filtrArray = isset($arguments['param']) ? ['filtr' => $filterName] + $arguments['param'] : ['filtr' => $filterName];
            $valid = Validator::secInput($data[$argumentsName], $filtrArray);
            if($valid['ok'] == false) {
                JsonArray::p(false, ['error' => $arguments['errorMessage']], true);
            }

            $secureArguments[$argumentsName] = $valid['var'];
        }
    }
}

$controllerName = ucfirst($exectRoute['controller']).'Controller';
$actionName = $exectRoute['action'].'Action';
include './actions/'.$controllerName.'.php';
$controllerOutput = $controllerName::$actionName($secureArguments);

JsonArray::p($controllerOutput->status, $controllerOutput->data, true);