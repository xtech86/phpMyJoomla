<?php
/**
 * @version     1.5.1
 * @package     com_phpmyjoomla
 * @copyright   Copyright (C) 2016. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Luis Orozco & Ruel Lastimado <luisorozoli@gmail.com, rlastimado@gmail.com> - http://www.phpmyjoomla.com
 */

// No direct access to this file

defined('_JEXEC') or die('Restricted access');
?>
<div>
    <div class="overlay" id="overlay" style="display:none;">
    </div>
    <div class="box" id="box">
        <a class="boxclose" id="boxclose"></a>
        <h1 style="text-align: center;"><?php echo JText::_('COM_PHPMYJOOMLA_MANUAL_TEXT_TITLE');?></h1>
        <p style="font-size: 15px; line-height: 25px;">
            <br/>
            <span style="font-weight: bold;"><?php echo JText::_('COM_PHPMYJOOMLA_MANUAL_TEXT_STEP1');?></span> <?php echo JText::_('COM_PHPMYJOOMLA_MANUAL_TEXT_STEP1_LONG');?><br/>
            <span style="font-weight: bold;"><?php echo JText::_('COM_PHPMYJOOMLA_MANUAL_TEXT_STEP2');?></span> <?php echo JText::_('COM_PHPMYJOOMLA_MANUAL_TEXT_STEP2_LONG');?><br/>
            <span style="font-weight: bold;"><?php echo JText::_('COM_PHPMYJOOMLA_MANUAL_TEXT_STEP3');?></span> <?php echo JText::_('COM_PHPMYJOOMLA_MANUAL_TEXT_STEP3_LONG');?><br/>
            <span style="font-weight: bold;"><?php echo JText::_('COM_PHPMYJOOMLA_MANUAL_TEXT_STEP4');?></span> <?php echo JText::_('COM_PHPMYJOOMLA_MANUAL_TEXT_STEP4_LONG');?><br/>
            <span style="font-weight: bold;"><?php echo JText::_('COM_PHPMYJOOMLA_MANUAL_TEXT_STEP5');?></span> <?php echo JText::_('COM_PHPMYJOOMLA_MANUAL_TEXT_STEP5_LONG');?><br/>
            <span style="font-weight: bold;"><?php echo JText::_('COM_PHPMYJOOMLA_MANUAL_TEXT_STEP6');?></span> <?php echo JText::_('COM_PHPMYJOOMLA_MANUAL_TEXT_STEP6_LONG');?>
        </p>
    </div>
    <a id="list" style="float: right;" href="#"><button id="activator" class="activator"><?php echo JText::_('COM_PHPMYJOOMLA_MANUAL_TEXT_BUTTON');?></button></a>
    <a id="list" style="margin-bottom: 70px;" href="#" class="togglelink"><button onclick="setColor('btnfilters','#eee');" id="btnfilters" class="shfilters"><?php echo JText::_('COM_PHPMYJOOMLA_SHOWHIDE_TEXT_BUTTON');?></button></a>
    <div class="toggle" style="display: block;">
        <?php echo $this->objTableGen->renderTableFilter('tbl1'); ?>
    </div>
</div>
<form id="form" style="margin-top: 50px;">
    <?php echo $this->objTableGen->renderTableData('tbl1'); ?>
</form>