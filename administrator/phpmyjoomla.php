<?php
/**
 * @version     3.0.0
 * @package     com_phpmyjoomla
 * @copyright   Copyright (C) 2014. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Luis Orozco & Ruel Lastimado <luisorozoli@gmail.com, rlastimado@gmail.com> - http://www.phpmyjoomla.com
 */

// no direct access
defined('_JEXEC') or die;

require_once dirname(__FILE__) . '/libraries/loader.php';

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_phpmyjoomla')) 
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

$controller	= JControllerLegacy::getInstance('Phpmyjoomla');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
