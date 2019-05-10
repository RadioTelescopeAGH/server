<?php

class RemoteControllController {

    static function moveAction($data) {
        Auth::adminAuth($data['token']);
        
        

        return new ControllerOutput(true, $sensorsData[0]);
    }

}