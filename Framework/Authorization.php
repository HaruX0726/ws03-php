<?php

namespace Framework;

use Framework\Session;

class Authorization
{
    /**
     * Check if logged in user owns a listing 
     * 
     * @params int $resourrceId
     * @return bool
     */
    public static function isOwner($resourrceId) {
        $sessionUser = Session::get('user');

        if($sessionUser !== null && $sessionUser['id']){
            $sessionUserId = $sessionUser['id'];
            return $sessionUserId == $resourrceId;
        }
            return false;
        
    }
}