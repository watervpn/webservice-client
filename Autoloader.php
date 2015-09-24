<?php 

class Autoloader {
    static public function loader($className) {
        $dir = dirname(__FILE__);
        // remove wvpnClient from beginneg of file path if is calling within wvpnClient dir
        if(strpos($className, 'vpnClient')){
            $className = str_replace('WvpnClient\\', '', $className);
        }

        $filename = str_replace('\\', '/', $className) . ".php";
        $filename = $dir.'/'.$filename;

        if (file_exists($filename)) {
            if (class_exists($className)) {
                return TRUE;
            }
            require_once($filename);
        }
        return FALSE;
    }
}
spl_autoload_register('Autoloader::loader');

?>
