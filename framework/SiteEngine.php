<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class SiteEngine {
    
    private $isInit = false;
    
    private $host = '';
    
    private $path = null;

    public function __construct() {
        
    }
    
    public function Init(){
        $this->host = $_SERVER[SERVER_NAME];
        $this->path = split('/', URI_Remove_Params());
        $this->CheckAndSetCtlAndAction();
        $this->isInit = true;
    }
    
    public function Run(){
        if($this->isInit == false){
            throw new NotInitYetException();
        }
        self::Process(Register::getVar('controller'), Register::getVar('action'));
    }
    
    public function URI_Remove_Params(){
        $tmp = split('?', $_SERVER['REQUEST_URI']);
        return $tmp[0];
    }
    
    public function CheckAndSetCtlAndAction(){
        $controller = $this->path[0];
        $action = $this->path[1];
        Register::setVar('controller', $controller);
        Register::setVar('action', $action);
    }
    
    public static function Process($controller,$action) {
        try{
            $ControllerObj = new $controller();
            
        }  catch (Exception $e){
            throw new NoSuchControllerException();
        }
        
        try{
            $ControllerObj->$action();
        }  catch (Exception $e){
            throw new NOSuchActionException();
        }
        
    }

    /**
     * 可以接受变量的名字或者变量，最好使用变量名称，否则效率会很低下
     * @param type $name
     * @return type
     */
    public function __get($name) {
        if (! Register::getVar($name)){
            getVarName($name);
        }
        return Register::getVar($name);
    }

    /**
     * 效率非常低虽然灵活
     * @param type $src
     * @return type
     */
    public function getVarName(&$src) {
        $varName = '';
        $save = $src;
        $allvar = $GLOBALS;
        foreach ($allvar as $key => $value) {
            if ($src == $value) {
                $src = 'change';
                if ($src == $GLOBALS[$key]) {
                    $varname = $key;
                }
            }
        }
        $src = $save;
        return $varname;
    }

}

?>
