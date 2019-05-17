<?php

class DataDistributorController {

    static function getAllDataAction($data) {
        Auth::adminAuth($data['token']);
        
        $lastData = ORM::raw_execute("
            select *
            from measurement
        ");
        $lastData = ORM::get_last_statement();
        $rows = $lastData->fetchAll(PDO::FETCH_ASSOC);

        return new ControllerOutput(true, isset($rows[0]) ? $rows : array());
    }

    static function getLastDataAction($data) {
        $allData = ORM::raw_execute("
            select measurement_data, date_pick 
            from measurement 
            order by id desc 
            limit 1
        ");
        $allData = ORM::get_last_statement();
        $rows = $allData->fetchAll(PDO::FETCH_ASSOC);

        return new ControllerOutput(true, isset($rows[0]) ? $rows[0] : array());
    }

    static function getTodayDataAction($data) {
        $lastData = ORM::raw_execute("
            SELECT * 
            FROM `measurement` 
            WHERE date(date_pick) = date(now())
        ");
        $lastData = ORM::get_last_statement();
        $rows = $lastData->fetchAll(PDO::FETCH_ASSOC);

        return new ControllerOutput(true, $lastData);
    }

    static function getDataLtDateAction($data) {
        $date = $data['data'];
        $lastData = ORM::raw_execute("
            SELECT * 
            FROM `measurement` 
            WHERE date(date_pick) <= {$date}
        ");
        $lastData = ORM::get_last_statement();
        $rows = $lastData->fetchAll(PDO::FETCH_ASSOC);

        return new ControllerOutput(true, $lastData);
    }

    static function getDataGtDateAction($data) {
        $date = $data['data'];
        $lastData = ORM::raw_execute("
            SELECT * 
            FROM `measurement` 
            WHERE date(date_pick) >= {$date}
        ");
        $lastData = ORM::get_last_statement();
        $rows = $lastData->fetchAll(PDO::FETCH_ASSOC);

        return new ControllerOutput(true, $lastData);
    }

    static function getDataBetweenDateAction($data) {
        $dateStart = $data['data_start'];
        $dateEnd = $data['data_end'];
        $lastData = ORM::raw_execute("
            SELECT * 
            FROM `measurement` 
            WHERE date(date_pick) >= {$dateStart} and date(date_pick) <= {$dateEnd}
        ");
        $lastData = ORM::get_last_statement();
        $rows = $lastData->fetchAll(PDO::FETCH_ASSOC);

        return new ControllerOutput(true, $lastData);
    }

}