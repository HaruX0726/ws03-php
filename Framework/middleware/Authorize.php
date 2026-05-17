<?php

namespace Framework\Middleware;

use Framework\Session;

class Authorize{
    /**
     * check if user is authenticated
     *
     * @return bool
     */
    public function isAuthenticated(){
        return Session::has('user');
    }

    
    /**
     * handle the users request
     * 
     * @param string $role
     * @return bool
     */
    public function handle($role){
        if($role === 'guest' && $this->isAuthenticated()){
            redirect("/");
        } elseif ($role === 'auth' && !$this->isAuthenticated()){
            redirect("/auth/login");
        }

        return true;
        

        
        
    }
    
    
}