<?php

class TestController {

    static function testAction() {
        $return = new ControllerOutput();
        $return->status = true;
        $return->data = 'test message';

        return $return;
    }

    static function mlekoAction($data) {
        $return = new ControllerOutput();
        $return->status = true;
        $return->data = 'mleko message';

        return $return;
    }

}