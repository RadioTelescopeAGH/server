<?php

class ShieldAction {


    /*
    Movement action
    */

    static function moveToCords($len, $lat) {
        $query = new ShieldRequest('move_to_cords', ['len' => $len, 'lat' => $lat]);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    static function moveEngineXCords($x) {
        $query = new ShieldRequest('move_engine_x', ['x' => $x]);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    static function moveEngineYCords($y) {
        $query = new ShieldRequest('move_engine_y', ['y' => $y]);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    static function moveTop($value) {
        $query = new ShieldRequest('move_top', ['val' => $value]);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    static function moveBottom($value) {
        $query = new ShieldRequest('move_bottom', ['val' => $value]);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    static function moveLeft($value) {
        $query = new ShieldRequest('move_left', ['val' => $value]);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    static function moveRight($value) {
        $query = new ShieldRequest('move_right', ['val' => $value]);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /*
    Get sensors value
    */

    static function getSensorsData($sensorList = array()) {
        $query = new ShieldRequest('sensor_data', $sensorList);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    static function getMotorState() {
        $query = new ShieldRequest('motor_state', null);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    static function getAllSensors() {
        $query = new ShieldRequest('all_sensors', null);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /*
    System Action
    */

    static function restart() {
        $query = new ShieldRequest('restart', null);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    static function shudDown() {
        $query = new ShieldRequest('shutdown', null);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    static function stopCollect() {
        $query = new ShieldRequest('stop_collect', null);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    static function startCollect() {
        $query = new ShieldRequest('start_collect', null);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

}