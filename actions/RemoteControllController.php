<?php

class RemoteControllController {

     /*
    Engine movement action
    */

    static function moveToCordAction($data) {
        Auth::adminAuth($data['token']);
        
        return ShieldAction::moveToCords($data['len'], $data['lat']);
    }

    static function moveEngineXCordsAction($data) {
        Auth::adminAuth($data['token']);
        
        return ShieldAction::moveEngineXCords($data['x']);
    }

    static function moveEngineYCordsAction($data) {
        Auth::adminAuth($data['token']);
        
        return ShieldAction::moveEngineYCords($data['y']);
    }

    static function moveTopAction($data) {
        Auth::adminAuth($data['token']);
        
        return ShieldAction::moveTop($data['val']);
    }

    static function moveBottomAction($data) {
        Auth::adminAuth($data['token']);
        
        return ShieldAction::moveBottom($data['val']);
    }

    static function moveLeftAction($data) {
        Auth::adminAuth($data['token']);
        
        return ShieldAction::moveLeft($data['val']);
    }

    static function moveRightAction($data) {
        Auth::adminAuth($data['token']);
        
        return ShieldAction::moveRight($data['val']);
    }

    /*
    Get sensors value
    */

    static function getSensorsDataAction($data) {
        Auth::adminAuth($data['token']);
        //TODO: trzeba przekazać listę sensorów, ale trzeba przygotować validacje do tego jeszcze
        return ShieldAction::getSensorsData();
    }

    static function getMotorStateAction($data) {
        Auth::adminAuth($data['token']);
        
        return ShieldAction::getMotorState();
    }

    static function getAllSensorsAction($data) {
        Auth::adminAuth($data['token']);
        
        return ShieldAction::getAllSensors();
    }

    /*
    System Action
    */

    static function restartAction($data) {
        Auth::adminAuth($data['token']);
        
        return ShieldAction::restart();
    }

    static function shudDownAction($data) {
        Auth::adminAuth($data['token']);
        
        return ShieldAction::shudDown();
    }

    static function stopCollectAction($data) {
        Auth::adminAuth($data['token']);
        
        return ShieldAction::stopCollect();
    }

    static function startCollectAction($data) {
        Auth::adminAuth($data['token']);
        
        return ShieldAction::startCollect();
    }

}