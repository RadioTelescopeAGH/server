<?php

class JsonArray {

    public function r($status, $data) {
        $static = [
            'status' => $status,
        ];
        $dataArray  = [
            'data' => $data,
        ];
        return $static + $dataArray;
    }
    
    public static function p($status, $data, $exit = false) {
        $static = [
            'status' => $status,
        ];
        $dataArray  = [
            'data' => $data,
        ];
        header('Content-Type: application/json');
        echo json_encode($static + $dataArray);
        if($exit) exit;
    }

    public function pF($array, $exit = false) {
        header('Content-Type: application/json');
        echo json_encode($array);
        if($exit) exit;
    }

    public function pre($array, $exit = false) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
        if($exit) exit;
    }

    public function toSend($action, $data) {
        $static = [
            'action' => $action,
        ];
        $dataArray  = [
            'data' => $data,
        ];
        return $static + $dataArray;
    }
    
}