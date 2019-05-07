<?php

class SensorsController {

    static function getAllSensorsAction($data) {
        Auth::adminAuth($data['token']);
        
        $sensorsData = ORM::forTable('sensors')
            ->where('id', 1)
            ->find_array();

        if(!isset($sensorsData[0])){
            $sensorsData[0] = [];
        }

        return new ControllerOutput(true, $sensorsData[0]);
    }

}