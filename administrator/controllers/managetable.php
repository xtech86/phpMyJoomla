<?php
/**
 * @version     1.5.1
 * @package     com_phpmyjoomla
 * @copyright   Copyright (C) 2016. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Luis Orozco & Ruel Lastimado <luisorozoli@gmail.com, rlastimado@gmail.com> - http://www.phpmyjoomla.com
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Managetable controller class.
 */
class PhpmyjoomlaControllerManagetable extends JControllerForm
{

    function __construct() {
        $this->view_list = 'managetables';
        parent::__construct();
    }

}