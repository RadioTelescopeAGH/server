<?php

class ControllerOutput {

    public $status = false;
    public $data = NULL;
    
    public function __construct($_status = false, $_data = NULL) {
        $this->status = $_status;
        $this->data = $_data;
    }

    
}