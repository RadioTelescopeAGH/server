<?php

class ShieldRequest {
    public $action;
    public $data;

    public function __construct($action = null, $data = null) {
        $this->action = $action;
        $this->data = $data;
    }

    public function toSend() {
        return JsonArray::toSend($action, $data);
    }
}