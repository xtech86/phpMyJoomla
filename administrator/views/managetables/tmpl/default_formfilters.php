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
<div class="span12">
	<hr/>
</div>
<div class="span12 pmjfilters">
    <form id="frmselectserverdbtable" name="frmselectserverdbtable" method="POST">
    	<div class="span4 serverfilters">
            <div><h3>Server</h3></div>
            <div id="serverlist">
                <?php  $arrServers = clsPhpMyJoomlaUtils::arrGetExternalServers(); ?>
                <span class="icon-database icon-database-custom"></span>
                <select id="select_server" name="select_server">
                    <option <?php echo (($this->select_server == PMJ_SERVER_LOCALHOST)? 'selected' : ''); ?> value="<?php echo PMJ_SERVER_LOCALHOST; ?>">(Localhost)</option>
                    <option <?php echo (($this->select_server == PMJ_SERVER_QUICK)? 'selected' : ''); ?> value="<?php echo PMJ_SERVER_QUICK; ?>">(Quick Connection)</option>
                    <?php foreach ($arrServers as $server_id => $server) { ?>
                    <?php $selected = ($this->select_server == $server_id)? 'selected' : '';?>
                    <option <?php echo $selected ?> value="<?php echo $server_id?>"><?php echo $server?></option>
                    <?php } ?>
                </select>
            </div>
            <div id="datatabaselist">
                <?php  $arrDatabases = clsPhpMyJoomlaUtils::arrGetDatabases($this->select_server); ?>
                <span class="icon-database icon-database-custom"></span>
                <select id="select_db" name="select_db">
                    <?php if (empty($arrDatabases)) { ?>
                        <option selected value="<?php echo PMJ_DATABASES_NO_SELECT?>">No available databases</option>
                    <?php } else { ?>
                        <?php foreach ($arrDatabases as $db) { ?>
                        <?php $selected = ($this->select_db == $db)? 'selected' : '';?>
                        <option <?php echo $selected ?> value="<?php echo $db?>"><?php echo $db?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div id="tablelist">
                <?php $arrTableList = clsPhpMyJoomlaUtils::arrGetTables($this->select_db, $this->select_server); ?> 
                <span class="icon-list-view icon-list-view-custom"></span>
                <select id="select_table" name="select_table">
                    <?php if (empty($arrTableList)) { ?>
                        <option selected value="<?php echo PMJ_TABLES_NO_SELECT?>">No available tables</option>
                    <?php } else { ?>
                        <?php foreach ($arrTableList as $table) { ?>
                        <?php $selected = ($this->select_table == $table)? 'selected' : '';?>
                        <option <?php echo $selected ?> value="<?php echo $table?>"><?php echo $table?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                <input id="load_table" name="load_table" type="button" class="buttons-phpmyjoomla-blue" value="Load">
            </div>
            <input type="hidden" id="loaded_server" name="loaded_server" value="<?php echo $this->loaded_server;?>"/>
            <input type="hidden" id="loaded_db" name="loaded_db" value="<?php echo $this->loaded_db;?>"/>
            <input type="hidden" id="loaded_table" name="loaded_table" value="<?php echo $this->loaded_table;?>"/>
            <input type="hidden" id="flag_serverchange" name="flag_serverchange" value="0"/>
    	</div>
        <div class="span5 quickfilters">
            <div><h3>Quick Connection </h3>
            	<div>
	                <span id="">
	                <span class="icon-database icon-database-custom"></span><input type="text" placeholder="Host" id="quickconn_host" name="quickconn_host" value="<?php echo $this->quickconn_host;?>">
	                </span>
	                <span id="">
	                <span class="icon-users icon-users-custom"></span><input type="text" placeholder="User" id="quickconn_username" name="quickconn_username" value="<?php echo $this->quickconn_username;?>">
	                </span>
	            </div>
	            <div>
	                <span id="">
		                <span class="icon-eye icon-eye-custom"></span><input type="password" placeholder="Password" id="quickconn_password" name="quickconn_password" value="<?php echo $this->quickconn_password;?>">
	                </span>
	                <span id="">
	                	<span class="icon-refresh icon-refresh-custom"></span><input id="check_conn" name="check_conn" type="button" class="buttons-phpmyjoomla-blue" value="Test Connection">
	                </span>
	        	</div>
            </div>
        </div>
    </form>
</div>
<div class="span12">
	<hr/>
</div>