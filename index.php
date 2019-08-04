<?php
include './config/const.php';
include './lib/JsonArray.php';
include './config/controllers.php';
include './lib/Validator.php';
include './entities/ControllerOutput.php';
include './entities/ShieldRequest.php';
include './lib/Auth.php';

include './vendor/autoload.php';

ORM::configure('mysql:host='.$dbHost.';dbname='.$dbName);
ORM::configure('username', $dbUser);
ORM::configure('password', $dbPass);

// $tmp = ORM::raw_execute("select * from measurement");
// $statement = ORM::get_last_statement();
// $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
// exit();

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

$path = $jsonData['action'];
$slashPosition = strpos($path, '/');
if($slashPosition < 0) {
    JsonArray::p(false, ['error' => 'Invalid action parameters.'], true);
}
$controller = substr($path, 0, $slashPosition);
$action = substr($path, $slashPosition + 1);

if(!isset($controllesAction[$controller][$action])) {
    JsonArray::p(false, ['error' => 'Action not exist.'], true);
}

$exectRoute['controller'] = $controller;
$exectRoute['action'] = $action;
$exectRoute['arguments'] = $controllesAction[$controller][$action];

//input argumnts validation if input arguments is defined
if($controllesAction[$exectRoute['controller']][$exectRoute['action']] != NULL) {
    if(!isset($jsonData['data']) || $jsonData['data'] == '') {
        JsonArray::p(false, ['error' => 'Action ' . $exectRoute['action'] . ' you must type data arguments.'], true);
    }
    $data = $jsonData['data'];

    foreach($exectRoute['arguments'] as $argumentsName => $filtrOptions) {
        //checking requiring arguments
        if(isset($filtrOptions['require'])){
            if(!isset($data[$argumentsName])) {
                JsonArray::p(false, ['error' => $filtrOptions['require']['errorMessage']], true);
            }
        }
        else {
            if(!isset($data[$argumentsName])) {
                $secureArguments[$argumentsName] = isset($filtrOptions['defaultValue']) ? $filtrOptions['defaultValue'] : NULL;
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
include './controllers/'.$controllerName.'.php';
$controllerOutput = $controllerName::$actionName($secureArguments);

JsonArray::p($controllerOutput->status, $controllerOutput->data, true);