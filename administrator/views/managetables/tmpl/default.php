<?php
/**
 * @version     1.0.0
 * @package     com_phpmyjoomla
 * @copyright   Copyright (C) 2014. Todos los derechos reservados.
 * @license     Licencia Pública General GNU versión 2 o posterior. Consulte LICENSE.txt
 * @author      Luis Orozco & Ruel Lastimado <luisorozoli@gmail.com, rlastimado@gmail.com> - http://www.luisoroz.co 
 */ 
 // No direct access to this file
 
 defined('_JEXEC') or die('Restricted access'); 
 
?> 

<?php echo $this->loadTemplate('header'); ?>
<body style="font-family: 'Arial';">
<div id="container">
	<div class="span12">
		<div class="span4">
			<img src="components/com_phpmyjoomla/assets/images/phpmyjoomla/logo_small.png" alt="phpMyJoomla logo" />
		</div>
		<div class="span6">
			<h2>Search, manage and export your tables in 3 steps!</h2>
			<a href="http://www.phpmyjoomla.com/forum" target="_blank"><button type="button" class="btn btn-success"><i class="icon-users pad-r10"></i>FORUM</button></a>
			<a href="http://www.phpmyjoomla.com/support" target="_blank"><button type="button" class="btn btn-success"><i class="icon-question-sign pad-r10"></i>SUPPORT</button></a>
			<a href="http://www.phpmyjoomla.com" target="_blank"><button type="button" class="btn btn-info"><i class="icon-book pad-r10"></i>DOCUMENTATION</button></a>
		</div>
		<div class="span2 esbutton">
			<img src="components/com_phpmyjoomla/assets/images/phpmyjoomla/compat_30.png" alt="Joomla Compact 3.x logo" />
			<a href="index.php?option=com_phpmyjoomla&view=serverss"><button type="button" class="btn btn-primary"><i class="icon-cube pad-r10"></i>EXTERNAL SERVERS</button></a>
		</div>
	</div>
	<?php 
            echo $this->loadTemplate('formfilters');
            if ($this->select_table != PMJ_TABLES_NO_SELECT) {
                echo $this->loadTemplate('formtable');
            }
        ?>
</div>
<?php echo $this->loadTemplate('footer'); ?>
</body>
</html>
<script>
    var blnAjaxSubmission = true;
    $("#select_server" ).change(function() {
        $("#flag_serverchange").val(1);
        var blnIsConnectionOK = checkConnection();
        if (blnIsConnectionOK) {
            var blnAjaxSubmit = window.blnAjaxSubmission;
            if (blnAjaxSubmit) {
                showLoadingDiv();
                $.ajax({
                    url : './index.php?option=com_phpmyjoomla&view=managetables&ajax=1&ajaxaction=generateoptiononserverchange',
                    type: 'POST',
                    data: getServerFormDetails(),
                    async:false,
                    success: function(data) {
                        var jsonResult = jQuery.parseJSON(data);
                        $("#select_db").html(jsonResult.html);
                        $.ajax({
                            url : './index.php?option=com_phpmyjoomla&view=managetables&ajax=1&ajaxaction=generateoptionondatabasechange',
                            type: 'POST',
                            data: getServerFormDetails(),
                            async:false,
                            success: function(data) {
                                var jsonResult = jQuery.parseJSON(data);
                                $("#select_table").html(jsonResult.html);
                            }
                        });
                    }
                }).done(function() {
                    $("#flag_serverchange").val(0);
                    hideLoadingDiv();
                });
            }
            else {
                showLoadingDiv();
                $("#frmselectserverdbtable").submit();
            }
        }
        else {
            alert('Unable to establish connection to the selected server. Please check your conneciton configuration.')
            // Get default current property pointing to selected server. If none, defaults to Localhost
            var currentDataAttrib = $.data(this, 'current');
            if (currentDataAttrib === undefined) {
                currentDataAttrib = '<?php echo PMJ_SERVER_LOCALHOST?>';
            }
            $(this).val(currentDataAttrib); 
            return false;
        }
        
        $.data(this, 'current', $(this).val()); // Set default current property pointing to selected server
    });
    
    $("#select_db" ).change(function() {
        showLoadingDiv();
        var blnAjaxSubmit = window.blnAjaxSubmission;
        if (blnAjaxSubmit) {
            showLoadingDiv();
            $.ajax({
                url : './index.php?option=com_phpmyjoomla&view=managetables&ajax=1&ajaxaction=generateoptionondatabasechange',
                type: 'POST',
                data: getServerFormDetails(),
                async:false,
                success: function(data) {
                    var jsonResult = jQuery.parseJSON(data);
                    $("#select_table").html(jsonResult.html);
                }
            }).done(function() {
                hideLoadingDiv();
            });
        }
        else {
            showLoadingDiv();
            $("#frmselectserverdbtable").submit();
        }
    });
    
    $("#load_table" ).click(function() {
        $("#loaded_server").val($("#select_server").val());
        $("#loaded_db").val($("#select_db").val());
        $("#loaded_table").val($("#select_table").val());
        showLoadingDiv();
        $("#frmselectserverdbtable").submit();
    });
    
    $("#check_conn" ).click(function() {
        showLoadingDiv();
        var blnAjaxSubmit = window.blnAjaxSubmission;
        if (blnAjaxSubmit) {
            showLoadingDiv();
            $.ajax({
                url : './index.php?option=com_phpmyjoomla&view=managetables&ajax=1&ajaxaction=testquickconnection',
                type: 'POST',
                data: getServerFormDetails(),
                async:false,
                success: function(data) {
                    if (data == '1') {
                        alert('Connection successful!');
                    }
                    else {
                        alert('Connection failed...');
                    }
                }
            }).done(function() {
                hideLoadingDiv();
            });
        }
        else {
            showLoadingDiv();
            $("#frmselectserverdbtable").submit();
        }
    });
    
    function checkConnection() {
        var blnOK = false;
        $.ajax({
            url : './index.php?option=com_phpmyjoomla&view=managetables&ajax=1&ajaxaction=testconnection',
            type: 'POST',
            data: getServerFormDetails(),
            async:false,
            success: function(data) {
                if (data == '1') {
                    blnOK = true;
                }
                else {
                    blnOK = false;
                }
            }
        });
        
        return blnOK;
    }
    
    function getServerFormDetails() {
        var dataServerForm = { 
                'flag_serverchange': $("#flag_serverchange").val(),
                'select_server': $("#select_server").val(),
                'select_db': $("#select_db").val(),
                'select_table': $("#select_table").val(),
                'loaded_server': $("#loaded_server").val(),
                'loaded_db': $("#loaded_db").val(),
                'loaded_table': $("#loaded_table").val(),
                'quickconn_host': $("#quickconn_host").val(),
                'quickconn_username': $("#quickconn_username").val(),
                'quickconn_password': $("#quickconn_password").val()
        }
        return dataServerForm;
    }
    <?php  
            echo $this->objTableGen->renderTableScripts('tbl1');
    ?>
</script>