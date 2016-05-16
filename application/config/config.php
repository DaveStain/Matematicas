<?php
/**
 * Configuración
 */

/**
 * Configuración del URL
 */
define('SUBDIR','matematicas/public/');
define('URL', 'http://'.$_SERVER["SERVER_NAME"]."/".SUBDIR);

/**
 * Configuración de la Base de Datos
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'concurso');
define('DB_USER', 'admin');
define('DB_PASS', 'abc1234');
define('CHARSET','utf8');
define('DNS',DB_TYPE.':dbname='.DB_NAME.';host='.DB_HOST.';charset='.CHARSET);

/**
 * Configuration General
 */

define('DOCUMENT_ROOT', $_SERVER["DOCUMENT_ROOT"]."/".SUBDIR);
define('APPLICATION', realpath(DOCUMENT_ROOT.'/../application'));
define('CACHE', realpath(APPLICATION));
define('WWW', "/public_html/");
define('IMAGES', 'pics/');
define('ERROR_LOG', APPLICATION . '/logs/error_log.txt');
define("ERROR_NO", serialize (array (2002,1045,42000))); // Errores por los que no se conecta a MySQL
define("SALT", 'Un1v4'); // Key para la codificación
define("DEV_ENV",true); // true/false entorno de desarrollo
define("INTENTOS_AUTH",3); // Intentos para autenticarse.
define("INTENTOS_TIME",60); // Segundos para reiniciar la autenticación
define("INTENTOS_AUTH_BANNEDIP",100); // Intentos para bannear una IP.
define("LANG_DEFAULT","es"); // Intentos para bannear una IP.
define("MIN",""); // Tipo de archivos a utilizar normales/.min


/**
 * Configuration for: Error reporting
 */
/* Elementos a considerar para Debug */
ini_set('error_reporting', E_ALL | E_STRICT);
ini_set('display_errors', 'On');
ini_set('log_errors', 'On');
ini_set('error_log', APPLICATION.'/logs/error_log.txt');
ini_set('session.save_path',APPLICATION .'/session');
ini_set('date.timezone','America/Mexico_City');

?>