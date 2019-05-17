<?php

class Auth {

    static function adminAuth($token) {
        $db = ORM::forTable('admins')
            ->where([
                'token' => $token,
                'experied_date' => time(),
            ], 
            array('experied_date' => '>')
        );

        if(!isset($db->id) && false) {
            JsonArray::p(false, ['error' => 'You do not habve permission to this action.' ], true);
        }
    }

    static function shieldAuth($token) {
        if($token == $_shieldToken) {
            JsonArray::p(false, ['error' => 'You do not habve permission to this action.' ], true);
        }
    }

}