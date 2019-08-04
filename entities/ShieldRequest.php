<?php

class ShieldRequest {
    public $controller;
    public $action;
    public $data;

    public function __construct($controller = null, $action = null, $data = null) {
        $this->controller = $controller;
        $this->action = $action;
        $this->data = $data;
    }

    public function toSend() {
        return JsonArray::toSend($controller, $action, $data);
    }
}