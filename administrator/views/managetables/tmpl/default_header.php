<?php
/**
 * @version     1.5.0
 * @package     com_phpmyjoomla
 * @copyright   Copyright (C) 2016. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Luis Orozco & Ruel Lastimado <luisorozoli@gmail.com, rlastimado@gmail.com> - http://www.phpmyjoomla.com
 */

// No direct access to this file

defined('_JEXEC') or die('Restricted access');
?>
<?php
$doc = JFactory::getDocument();
$doc->addStyleSheet(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/css/jquery-ui.css');
$doc->addStyleSheet(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/css/dataTables.jqueryui.css');
$doc->addStyleSheet(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/css/dataTables.colVis.css');
$doc->addStyleSheet(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/css/dataTables.tableTools.css');
$doc->addStyleSheet(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/css/dataTables.colReorder.css');
$doc->addStyleSheet(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/css/jquery.modal.css');
$doc->addStyleSheet(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/css/phpmyjoomla_css_custom.css');
?>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" type="text/css">
<?php
$doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/js/jquery.js');
$doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/js/jquery-1.11.3.min.js');
$doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/js/jquery.dataTables.min.js');
$doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/js/dataTables.jqueryui.js');
$doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/js/ZeroClipboard.js');
$doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/js/TableTools.js');
$doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/js/jquery.dataTables.columnFilter.js');
$doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/js/dataTables.colReorder.js');
$doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/js/dataTables.colVis.js');
$doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/js/jquery.modal.min.js');
$doc->addScript(JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/js/phpmyjoomla_js_custom.js');

$doc->addScript(JURI::root() . 'media/jui/js/jquery.min.js');
$doc->addScript(JURI::root() . 'media/jui/js/jquery-noconflict.js');
$doc->addScript(JURI::root() . 'media/jui/js/jquery-migrate.min.js');
$doc->addScript(JURI::root() . 'media/jui/js/bootstrap.min.js');
//$doc->addScriptVersion(JURI::root() . 'media/betterpreview/js/script.min.js');
$doc->addScript(JURI::root() . 'media/system/js/core.js');
?>
<div id="ajax_shield" name="export_shield" class="clean_background"></div>
<div id="ajax_loading" class="loading-invisible">
    <p>
        <img src="<?php echo JURI::root() . 'administrator/components/com_phpmyjoomla/views/managetables/tmpl/assets/images/loading.gif';?>" alt="Loading" />
    </p>
</div>