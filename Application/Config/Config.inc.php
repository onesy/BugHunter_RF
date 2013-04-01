<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

define('DEBUG', TRUE);

require 'Common.inc.php';
if (defined(DEBUG) && DEBUG) {
    require 'Debug.inc.php';
}
//加载框架
//--------------
require FRAMEWORK_ROOT . 'framework.php';
//--------------
?>
