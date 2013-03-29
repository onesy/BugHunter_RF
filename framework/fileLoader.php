<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class fileLoader {

    /**
     * @todo 自动加载还需要进行处理
     */
    public static function load() {
        //首先加载工具类
        self::folderLoader(COMMON_ROOT, true);
    }

    /**
     * @todo 返回各个默认的路径
     * @param type $class
     * @return type
     */
    public static function pathBuilder($class) {
        $rtn = array();
        //Module的路径
        $rtn['module_path'] = COMMON_ROOT . MODULE . DIRECTORY_SEPARATOR . $class . SUFFIX;
        //Model的路径
        $rtn['model_path'] = COMMON_ROOT . MODEL . DIRECTORY_SEPARATOR . $class . SUFFIX;
        //Collection的路径
        $rtn['collection_path'] = COMMON_ROOT . COLLECTION . DIRECTORY_SEPARATOR . $class . SUFFIX;
        //Controller的路径
        $rtn['controller_path'] = COMMON_ROOT . CONTROLLER . DIRECTORY_SEPARATOR . $class . SUFFIX;
        return $rtn;
    }

    /**
     * 默认不会对文件夹进行递归加载，如果需要递归加载，就将第二个参数置为true
     * @param type $folderPath
     */
    public static function folderLoader($folderPath, $Iter = false) {
        if (is_dir($folderPath)) {
            $handler = opendir($folderPath);
            while ($filename = readdir($handler) !== false) {
                if ($filename != "." && $filename != "..") {
                    $extension = pathinfo($filename);
                    if (!is_dir($filename) && $extension['extension'] == 'php') {
                        //确保不加载文件夹而且要加载php文件
                        require_once($filename);
                    } else if (is_dir($filename) && $Iter) {
                        folderLoader($filename, $Iter);
                    }
                }
            }
        }
    }

}

?>
