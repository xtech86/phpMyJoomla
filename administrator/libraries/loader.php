<?php
/**
 * @version     1.0.0
 * @package     com_phpmyjoomla
 * @copyright   Copyright (C) 2014. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Luis Orozco & Ruel Lastimado <luisorozoli@gmail.com, rlastimado@gmail.com> - http://www.luisoroz.co
 */
 
error_reporting(E_ALL);
define('DIR_LIB_PHPMYJOOMLA', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'phpmyjoomla');
require_once 'constants.php';
require_once 'general_functions.php';
require_once DIR_LIB_PHPMYJOOMLA . '/tablegen.php';
require_once DIR_LIB_PHPMYJOOMLA . '/utils.php';
require_once DIR_LIB_PHPMYJOOMLA . '/validation.php';

?>