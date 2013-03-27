<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Register{
    
    private static $VarList = array();
    
    public static function setVar($name,$value){
        
        self::$VarList[$name] = $value;
    }
    
    public static function getVar($name){
        return self::$VarList[$name];
    }
    
    public static function flush(){
        self::$VarList = array();
    }
}
?>
