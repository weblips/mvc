<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of app
 *
 * @author uasynzheryanua
 */
class App {
    protected static $router;
    
    public static function getRouter(){
        return self::$router;
    }
    
    public static function run($uri){
        self::$router = new Router($uri);
        
        $controller_class = ucfirst(self::$router->getController() . 'Controller');
        $controller_method = strtolower(self::$router->getMethodPrefix() . self::$router->getAction());
        
        //Calling controller`s method
        $controller_obj = new $controller_class();
        if(method_exists($controller_obj, $controller_method)){
            $result = $controller_obj->$controller_method();
        }
        
    }
}
