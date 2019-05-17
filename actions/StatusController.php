<?php

class StatusController {

    static function pingAction($data) {
        Auth::shieldAuth($data['token']);

        $ping = ORM::forTable('ping')->create();
        $ping->save();
        
        return new ControllerOutput(true, null);
    }

}