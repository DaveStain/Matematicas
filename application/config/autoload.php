<?php
if(isset($_SERVER['HTTP_ACCEPT_ENCODING'])){
    if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start("ob_gzhandler"); else ob_start();
}
/**
 * Auto Loader
 *
 */

function __autoload($class_name) {
    $data = str_replace("_", "/", $class_name); 
    $file = APPLICATION."/".$data.".php";
    if(is_file($file) && file_exists($file)){
        require_once($file);
    }
}


/* Manejo de Errores a Excepciones */
function exception_error_handler($errno, $errstr, $errfile, $errline ) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}

set_error_handler( "exception_error_handler");

/* Quitamos escapado automático de caracteres */
if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
    function fix_magic_quotes(&$array)
    {
        foreach ($array as $k => $val) {
            if (!is_array($val)) {
                $array[$k] = stripslashes($val);
            } else {
                fix_magic_quotes($array[$k]);
            }
        }
    }

    fix_magic_quotes($_GET);
    fix_magic_quotes($_POST);
    fix_magic_quotes($_COOKIE);
    fix_magic_quotes($_REQUEST);
    fix_magic_quotes($_ENV);
    fix_magic_quotes($_SERVER);
}
?>