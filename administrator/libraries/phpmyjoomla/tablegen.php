<?php
/**
 * @version     1.5.1
 * @package     com_phpmyjoomla
 * @copyright   Copyright (C) 2016. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Luis Orozco & Ruel Lastimado <luisorozoli@gmail.com, rlastimado@gmail.com> - http://www.phpmyjoomla.com
 */
 
class clsPhpMyJoomlaTableGen {
    protected $arrReferenceTable = array();
    protected $filterColumnPrefix = 'c';
    protected $filterColumnCountPerRow = 5;
    
    public function addTable($tblId, $tablename, $dbname, $serverID, $additionalParams) {
        $this->arrReferenceTable[$tblId] = $this->detectTable($tablename, $dbname, $serverID, $additionalParams);
    }
    
    public function renderTableFilter($tblId) {
        $html = '';
        if (isset($this->arrReferenceTable[$tblId])) {
            $html .= '<table cellspacing="5" class="cell-border" width="100%" border="0" class="display" id="tablefilter">';

            $noOfColumns = count($this->arrReferenceTable[$tblId]['db_columns']);
            $cnt = 1;
            $cntColumnPerRow = 0;
            for ($cnt = 1; $cnt <= $noOfColumns; $cnt++) {
                if ($cntColumnPerRow == 0) {
                    $html .= '<tr>';
                }
                $html .= '<td align="left"><span id="'.$this->filterColumnPrefix.strval($cnt).'"></span></td>';
                $cntColumnPerRow++;
                if ($cntColumnPerRow >= $this->filterColumnCountPerRow) {
                    $html .= '</tr>';
                    $cntColumnPerRow = 0;
                }
            }
            $html .= '</table>';
        }
        return $html;
    }
    
    public function renderTableData($tblId) {
        $html = '';
        if (isset($this->arrReferenceTable[$tblId])) {
            $html .= "<table cellpadding='0' cellspacing='0' border='1' class='display' id='example'>";
            $html .= "<thead>";
            $html .= "<tr>";
            foreach ($this->arrReferenceTable[$tblId]['table_headers'] as $th){
                $html .= '<th>'.$th.'</th>';
            }
            $html .= "</tr>";
            $html .= "</thead>";
            $html .= "</tbody>";
            $html .= "</tbody> </table>";
        }
        return $html;
        
    }
    
    private function generateAjaxURL($tblId) {
        $url = '';
        $url .= './index.php?option=com_phpmyjoomla&view=managetables';
        $url .= '&ajax=1';
        $url .= '&ajaxaction=generatetablejson';
        $url .= '&loaded_db='.$this->arrReferenceTable[$tblId]['db_name'];
        $url .= '&loaded_table='.$this->arrReferenceTable[$tblId]['table_name'];
        $url .= '&loaded_server='.$this->arrReferenceTable[$tblId]['server_id'];
        $url .= '&quickconn_host='.$this->arrReferenceTable[$tblId]['additional_params']['quickconn_host'];
        $url .= '&quickconn_database='.$this->arrReferenceTable[$tblId]['additional_params']['quickconn_database'];
        $url .= '&quickconn_username='.$this->arrReferenceTable[$tblId]['additional_params']['quickconn_username'];
        $url .= '&quickconn_password='.$this->arrReferenceTable[$tblId]['additional_params']['quickconn_password'];
        return $url;
    }
    
    public function renderTableScripts($tblId) {
        $html = '';
        if (isset($this->arrReferenceTable[$tblId])) {
            $html .='

            $(document).ready(function() {
                $(\'#example\').dataTable( 
                    {
                        "ajax": "'.$this->generateAjaxURL($tblId).'",
                        "deferRender": true,
                        "scrollX": true,
                        "pagingType": "full_numbers",
                        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                        "sDom": "RCTlfrtip",
                        "bAutoWidth": false,
                        "colVis": {
                                    showAll: "Show all"
                                },
                        "oTableTools": 
                        {
                        "sPlaceHolder": "head:before",
                                "aButtons": 
                                [
                                        {
                                                "sExtends": "copy",
                                                "sButtonText": "Copy to clipboard",
                                                "mColumns": "visible"
                                        },
                                        {
                                                "sExtends": "csv",
                                                "sButtonText": "Save to CSV",
                                                "mColumns": "visible"
                                        },
                                        {
                                                "sExtends": "pdf",
                                                "sButtonText": "Save to PDF",
                                                "sPdfOrientation": "landscape",
                                                "mColumns": "visible"
                                        }
                                ],
                                "sSwfPath": \'components/com_phpmyjoomla/views/managetables/tmpl/copy_csv_xls_pdf.swf\'
                        }
                    }).columnFilter(getFilterOject());

                    setInterval("reloadPage()", 180000 ); //reloadPage Every 3 minutes
                });

                function reloadPage() {
                    var table = $(\'#example\').DataTable();
                    table.ajax.reload();
                }
            ';

            $html .= 'function getFilterOject() {';
            $html .= 'return ';
            $noOfColumns = count($this->arrReferenceTable[$tblId]['db_columns']);
            $html .= '{';
            $html .= '"sPlaceHolder": "head:before",';
            $html .= '"aoColumns":[';
            for ($cnt = 1; $cnt <= $noOfColumns; $cnt++) {
                $html .= '{"sSelector": "#'.($this->filterColumnPrefix.strval($cnt)).'"},';
            }
            $html = mb_substr($html, 0, -1); //remove last comma
            $html .= ']};';
            $html .= '}';
        }
        
        return $html;
    }
    
    public function generateTableJSON($tblId) {
        
        $db = clsPhpMyJoomlaUtils::getDynamicDBO($this->arrReferenceTable[$tblId]['server_id']);
	            
        // Introduce the consult that you want. 
        $query = "SELECT * FROM `" .$this->arrReferenceTable[$tblId]['db_name'].'`.`'. $this->arrReferenceTable[$tblId]['table_name'] . "`";
        $db->setQuery($query);
        $rows = $db->loadObjectList();

        $jsonphpMyJoomla = array();
        $arrphpMyJoomla = array();
        foreach($rows as $row){
            $newRow = array();
            foreach($this->arrReferenceTable[$tblId]['db_columns'] as $col) {
                $newRow[] = $row->$col;
            }
            $arrphpMyJoomla[] = $newRow;
        }
        $jsonphpMyJoomla["data"] = $arrphpMyJoomla;
        $jsonphpMyJoomla = json_encode($jsonphpMyJoomla);
        
        return $jsonphpMyJoomla;
    }
    
    private function detectTable($tablename, $dbname, $serverID,$additionalParams) {
        // Detect the table
        $db = clsPhpMyJoomlaUtils::getDynamicDBO($serverID);
        $sql =  "SHOW COLUMNS FROM  `". $tablename . "`";
        if (!empty($dbname)) {
            $sql .= " IN `". $dbname . "`";
        }
        $db->setQuery($sql);
        $db->query();
        $rows = $db->loadObjectList();
        $arrFields = array();
        if ($rows) {
                foreach($rows as $row)  {
                        $arrFields[] = $row->Field;
                }
        }

        $tblData = array();
        $tblData['server_id'] = $serverID;
        $tblData['table_name'] = $tablename;
        $tblData['db_name'] = $dbname;
        $tblData['additional_params'] = $additionalParams;
        $tblData['db_columns'] = array();
        $tblData['table_headers'] = array();
        foreach ($arrFields as $fieldname) {
            $tblData['db_columns'][] = $fieldname;
            $tblData['table_headers'][] = $fieldname;
        }
        
        return $tblData;
    }
}
?>
