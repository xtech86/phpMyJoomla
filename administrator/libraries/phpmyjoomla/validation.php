<?php
/**
 * @version     1.5.0
 * @package     com_phpmyjoomla
 * @copyright   Copyright (C) 2016. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Luis Orozco & Ruel Lastimado <luisorozoli@gmail.com, rlastimado@gmail.com> - http://www.phpmyjoomla.com
 */
 
class clsPhpMyJoomlaValidation {
    
    public static function validateDatabase($serverID, $select_db) {
        $validated_db = $select_db;
        $arrDatabases = clsPhpMyJoomlaUtils::arrGetDatabases($serverID);
        if (empty($arrDatabases)) {
                $validated_db = PMJ_DATABASES_NO_SELECT;
        }
        else if (!(in_array($select_db, $arrDatabases))) {
            $validated_db = reset($arrDatabases);
        }
        
        return $validated_db;
    }
    
    public static function validateTable($select_server, $select_db, $select_table) {
        $validated_table = $select_table;
        $arrTables = clsPhpMyJoomlaUtils::arrGetTables($select_db, $select_server);
        if (empty($arrTables)) {
                $validated_table = PMJ_TABLES_NO_SELECT;
        }
        else if (!(in_array($select_table, $arrTables))) {
            $validated_table = reset($arrTables);
        }
        return $validated_table;
    }
}
?>
