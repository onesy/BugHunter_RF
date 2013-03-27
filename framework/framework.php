<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require 'VAR_Register.php';
require 'BH_Exceptions.php';
require 'fileLoader.php';

class framework{
    
    private function __construct() {
        //包装服务器参数相关的处理
    }
    
    public static function getInstance(){
        return new framework();
    }
    
    public static function Process($controller,$action) {
        $ControllerObj = null;
        try{
            $ControllerObj = new $controller();
            
        }  catch (Exception $e){
            throw new NoSuchControllerException();
        }
        
        try{
            $ControllerObj->$action();
        }  catch (Exception $e){
            throw  new NOSuchActionException();
        }
        
    }
}
?>
