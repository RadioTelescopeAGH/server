<?php

class DataCollectorController {

    static function addDataAction($data) {
        Auth::shieldAuth($data['token']);

        $newMeasurement = ORM::forTable('measurement')->create();
        $newMeasurement->measurement_date = $data['data'];

        return new ControllerOutput(true, null);
    }

}