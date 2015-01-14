<?php

/**
 * @version     1.0.0
 * @package     com_phpmyjoomla
 * @copyright   Copyright (C) 2014. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Luis Orozco & Ruel Lastimado <luisorozoli@gmail.com, rlastimado@gmail.com> - http://www.phpmyjoomla.com
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Phpmyjoomla helper.
 */
class PhpmyjoomlaHelper {

    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '') {
    	JHtmlSidebar::addEntry(
        	JText::_('COM_PHPMYJOOMLA_TITLE_MANAGETABLES'),
      		'index.php?option=com_phpmyjoomla&view=managetables',
    		$vName == 'managetables'
        );	
        	
        JHtmlSidebar::addEntry(
			JText::_('COM_PHPMYJOOMLA_TITLE_SERVERSS'),
			'index.php?option=com_phpmyjoomla&view=serverss',
			$vName == 'serverss'
		);

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return	JObject
     * @since	1.6
     */
    public static function getActions() {
        $user = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_phpmyjoomla';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }


}
