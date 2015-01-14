<?php
/**
 * @version     1.0.0
 * @package     com_phpmyjoomla
 * @copyright   Copyright (C) 2014. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Luis Orozco & Ruel Lastimado <luisorozoli@gmail.com, rlastimado@gmail.com> - http://www.luisoroz.co
 */


function print_array($x) {
    echo '<pre>';
    echo print_r($x);
    echo '</pre>';
}

function log_event( $details = '') {

        $filename = "D:/Temp/general.log";

	$date = date("D M j G:i:s Y T");
	$host = (isset($_SERVER['REMOTE_ADDR']))? $_SERVER['REMOTE_ADDR']: 'CLI';
        $details = print_r($details,true);
	$logdetails = "[$date] [$host] $details\n";

    if (!$handle = fopen($filename, 'a')) {
    	return;
    }
    if (fwrite($handle, $logdetails) === FALSE) {
    	return;
    }
    fclose($handle);
}
?>