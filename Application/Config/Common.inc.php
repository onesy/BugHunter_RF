<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
define('PROJECT_ROOT', '../');
define('APP_ROOT','./');
define('FRAMEWORK_ROOT',PROJECT_ROOT . 'framework/');
define('COMMON_ROOT',PROJECT_ROOT . 'Commons/');
define('HELPER_ROOT',COMMON_ROOT . HELPER . DIRECTORY_SEPARATOR);
define('UTILS_ROOT',COMMON_ROOT . UTILS . DIRECTORY_SEPARATOR);
define('MODULE' , 'Module');
define('MODEL','Model');
define('CONTROLLER','Controller');
define('VIEW','View');
define('COLLECTION','Collections');
define('HELPER','Helper');
define('UTILS','Utils');
define('SUFFIX','.class.php');
$ServerConfig = array();
Register::setVar('ServerConfig', $ServerConfig);
?>
