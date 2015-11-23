<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

class com_phpmyjoomlaInstallerScript {

	function install($parent) {
	}
	function update($parent) {
	}
	function uninstall($parent) {
	}
	private function uninstallationResults($status)	{
	}
	public function postflight($type, $parent)	{
		$status = new stdClass;
		$this->installationResults($status);
	}

	private function installationResults($status)
	{
		$language = JFactory::getLanguage();
		$language->load('com_phpmyjoomla');
		$rows = 0;
		?>
		<img src="components/com_phpmyjoomla/assets/images/phpmyjoomla/logo_small.png" alt="phpMyJoomla logo" align="right" />

		<h1>phpMyJoomla Installation</h1>
		<h3><a href="index.php?option=com_phpmyjoomla">Go to phpMyJoomla</a></h3>

		<br/>
		<div>
			<h3>TOOLS USED</h3>
			<p>
				For the development of this component have been used the following tools:<br /><br />
				<img src="components/com_phpmyjoomla/assets/images/phpmyjoomla/compat_30.png" alt="Joomla Compact 3.x logo" align="right" />
				- <a href="http://www.component-creator.com/" target="_blank">Component Creator</a><br />
				- <a href="http://www.datatables.net/" target="_blank">DataTables</a><br />
				- <a href="http://jquery.com/" target="_blank">JQuery & Ajax</a>
			</p>
		</div>
		<br/>

		<div class="">
			<h3>FORUM & SUPPORT</h3>
			<div class="">
				<p>
					Support in English and Spanish!
				</p>
				<p class="">
					<a href="http://www.phpmyjoomla.com/support" target="_blank"><button type="button" class="btn btn-success"><i class="icon-users" style="padding-right: 10px;"></i>FORUM</button></a>
					<a href="http://www.phpmyjoomla.com/support" target="_blank"><button type="button" class="btn btn-success"><i class="icon-question-sign" style="padding-right: 10px;"></i>SUPPORT</button></a>
					<a href="http://www.phpmyjoomla.com" target="_blank"><button type="button" class="btn btn-info"><i class="icon-book" style="padding-right: 10px;"></i>DOCUMENTATION</button></a>
				</p>
				<br/>
				<h3>Our Location</h3>
				<p>
					Ruel Lastimado | Davao City (Philippines) | Philippine & English<br/>
					Luis Orozco | London (United Kingdom) | Spanish & English
				</p>
				<br/>
			</div>

			<h3>More information about the component in <a href='http://www.phpmyjoomla.com' target="_blank">www.phpmyjoomla.com</a>.</h3>

		<?php
	}

}
