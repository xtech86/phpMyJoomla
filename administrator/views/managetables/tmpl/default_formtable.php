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
<div>
	<div class="overlay" id="overlay" style="display:none;">
	</div>
	<div class="box" id="box">
		<a class="boxclose" id="boxclose"></a>
		<h1 style="text-align: center;">How to use "phpMyJoomla"</h1>
		<p style="font-size: 15px; line-height: 25px;">
			<br/>
			<span style="font-weight: bold;">Step 1:</span> Choose your server (local, external or quick connection)<br/>
			<span style="font-weight: bold;">Step 2:</span> Choose one database, one table and click in "Load"<br/>
			<span style="font-weight: bold;">Step 3:</span> Apply the filters (Show / hide filters).<br/>
			<span style="font-weight: bold;">Step 4:</span> Select the columns that you don't want to export (Show / hide columns).<br/>
			<span style="font-weight: bold;">Step 5:</span> Drag and drop the columns and change the place of the columns if needed.<br/>
			<span style="font-weight: bold;">Step 6:</span> Click to COPY or export in CSV or PDF.
		</p>
	</div>
	<a id="list" style="float: right;" href="#"><button id="activator" class="activator">Instructions / Manual</button></a>
	<a id="list" style="margin-bottom: 70px;" href="#" class="togglelink"><button onclick="setColor('btnfilters','#eee');" id="btnfilters" class="shfilters">Show / hide filters</button></a>
	<div class="toggle" style="display: block;">
		<?php echo $this->objTableGen->renderTableFilter('tbl1'); ?>
	</div>
</div>
<form id="form" style="margin-top: 50px;">
	<?php echo $this->objTableGen->renderTableData('tbl1'); ?>
</form>