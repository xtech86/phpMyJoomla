<?php
/**
 * @version     1.0.0
 * @package     com_phpmyjoomla
 * @copyright   Copyright (C) 2014. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Luis Orozco & Ruel Lastimado <luisorozoli@gmail.com, rlastimado@gmail.com> - http://www.luisoroz.co */ 
 
 // No direct access to this file 
 
 defined('_JEXEC') or die('Restricted access'); 
 ?>
<?php
 $doc = JFactory::getDocument(); 
 $doc->addStyleSheet(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/css/jquery-ui.css'); 
 $doc->addStyleSheet(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/css/dataTables.jqueryui.css'); 
 $doc->addStyleSheet(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/css/dataTables.colVis.css'); 
 $doc->addStyleSheet(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/css/dataTables.tableTools.css'); 
 $doc->addStyleSheet(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/css/dataTables.colReorder.css'); 
 $doc->addStyleSheet(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/css/phpmyjoomla_css_custom.css'); 
 $doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/js/jquery.js'); 
 $doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/js/jquery-1.11.1.min.js'); 
 $doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/js/jquery.dataTables.min.js'); 
 $doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/js/dataTables.jqueryui.js'); 
 $doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/js/ZeroClipboard.js'); 
 $doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/js/TableTools.js'); 
 $doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/js/jquery.dataTables.columnFilter.js'); 
 $doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/js/dataTables.colReorder.js'); 
 $doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/js/dataTables.colVis.js'); 
 $doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/js/phpmyjoomla_js_custom.js'); 
?>
<div id="ajax_shield" name="export_shield" class="clean_background"></div>
<div id="ajax_loading" class="loading-invisible">
    <p>
        <img src="<?php echo JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/images/loading.gif';?>" alt="Loading" />
    </p>
</div>