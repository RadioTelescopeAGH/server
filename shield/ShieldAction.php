<?php

class ShieldAction {


    /**
     * Movement action
     */

    /**
     * @param float $len
     * @param float $lat
     * @return ControllerOutput
     */
    static function moveToCords($len, $lat) {
        $query = new ShieldRequest('movement', 'move_to_cords', ['len' => $len, 'lat' => $lat]);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /**
     * @param float $x
     * @return ControllerOutput
     */
    static function moveEngineXCords($x) {
        $query = new ShieldRequest('movement', 'move_engine_x', ['x' => $x]);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /**
     * @param float $y
     * @return ControllerOutput
     */
    static function moveEngineYCords($y) {
        $query = new ShieldRequest('movement', 'move_engine_y', ['y' => $y]);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /**
     * @param float $value
     * @return ControllerOutput
     */
    static function moveTop($value) {
        $query = new ShieldRequest('movement', 'move_top', ['val' => $value]);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /**
     * @param float $value
     * @return ControllerOutput
     */
    static function moveBottom($value) {
        $query = new ShieldRequest('movement', 'move_bottom', ['val' => $value]);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /**
     * @param float $value
     * @return ControllerOutput
     */
    static function moveLeft($value) {
        $query = new ShieldRequest('movement', 'move_left', ['val' => $value]);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /**
     * @param float $value
     * @return ControllerOutput
     */
    static function moveRight($value) {
        $query = new ShieldRequest('movement', 'move_right', ['val' => $value]);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /**
     * Get sensors data
     */

    /**
     * @param array $sensorList List of sensors to getting state
     * @return ControllerOutput
     */
    static function getSensorsData($sensorList = array()) {
        $query = new ShieldRequest('sensors', 'sensor_data', $sensorList);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /**
     * @return ControllerOutput
     */
    static function getMotorState() {
        $tmp = self::getSensorsData();
        $query = new ShieldRequest('sensors', 'motor_state', null);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /**
     * @return ControllerOutput
     */
    static function getAllSensors() {
        $query = new ShieldRequest('sensors', 'all_sensors', null);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /**
     * System Action
     */

    /**
     * @return ControllerOutput
     */
    static function restart() {
        $query = new ShieldRequest('system', 'restart', null);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /**
     * @return ControllerOutput
     */
    static function shudDown() {
        $query = new ShieldRequest('system', 'shutdown', null);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /**
     * @return ControllerOutput
     */
    static function stopCollect() {
        $query = new ShieldRequest('system', 'stop_collect', null);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

    /**
     * @return ControllerOutput
     */
    static function startCollect() {
        $query = new ShieldRequest('system', 'start_collect', null);
        $response = Unirest\Request::post($_shieldAddres, array(), $query);

        return new ControllerOutput($response->code == 200, $response->body);
    }

}