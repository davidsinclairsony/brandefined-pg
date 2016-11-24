<?php
/*
	Plugin Name: Shortcode Spy
	Plugin URI: http://www.design-ninja.net
	Description: View all shortcodes
	Version: 1.0.0
	Author: Kenny Scott
	Author URI: http://www.design-ninja.net
*/

if(is_admin()) {
	$shortcodes = new dnn_getAllShortcodes();
}
class dnn_getAllShortcodes {
	public function __construct() {
		$this->dnn_admin();
	}
	public function dnn_admin() {
		add_action( 'admin_menu', array(&$this,'dnn_adminMenu') );
	}
	public function dnn_adminMenu() {
		add_submenu_page(
			'options-general.php',
			'Shortcode Spy',
			'Shortcode Spy',
			'manage_options',
			'shortcode-spy',
			array(&$this,'dnn_adminPage'));
	}
	public function dnn_adminPage() {
		global $shortcode_tags;

        ?>
        <div class="wrap">
        	<div id="icon-options-general" class="icon32"><br /></div>
			<h2 style="margin-bottom: 0px;">Shortcode Spy</h2>
			<h4 style="margin:0"><a href="http://design-ninja.net" target="_blank">by Kenny Scott</a></h4>
			<div class="section panel">
				<p>All your shortcode are belong to us.</p>
        	<table class="widefat importers">
        		<tr><td><strong>Shortcodes</strong></td></tr>
        <?php

	        foreach($shortcode_tags as $tag => $function) {
?>
	        		<tr><td>[<?php echo $tag; ?>]</td></tr>
<?php
	        }
	    ?>
			</table>
			</div>
		</div>
		<?php
	}
} 
?>