<?php
/**
Plugin Name: The Human Diagram
Plugin URI: 
Description: A plugin by techriver that allows the use of a human diagrom to showcase various links and resources.
Author: Tech River
Version: 0.0.5
Author URI: http://ma.tt/
*/

define( 'HUMANDIAG_PLUGIN_PATH', plugin_dir_url( __FILE__ ) ); 
require_once('humandiagram_loader.php');
require_once('humandiagram_ajax.php');
class Techriver_human_diagram {
	protected $version;
	protected $tablename;
	protected $loader;
	protected $ajax;
	protected $plugin_title;
	protected $plugin_slug;
	public function __construct() {
		global $wpdb;
		$this->tablename = $wpdb->prefix . 'techriver_human_diagram';
		$this->version = '0.0.6';
		$this->ajax = new Techriver_humandiagram_ajax($this->tablename);
		$this->loader = new Techriver_humandiagram_loader($this->version,$this->tablename);
		
		
		$this->plugin_title = "Human diagram";
		$this->plugin_slug = "tc_human_diagram";
		$this->init();
	}
	
	private function get_slug($arg="") {
		if(!isset($arg) || $arg == '' || $arg == null || $arg == false) {
			return $this->plugin_slug;
		}
		else {
			return $this->plugin_slug.'_'.$arg;
		}
	}
	
	
	public function install() { // Runs the loader installation
		$this->loader->install();
	}
	
	public function init() { // Add in all hooks and actions here
		$this->loader->update();
		add_action('admin_menu',array($this,'load_admin_menu'));
		
	}
	
	
	public function load_admin_menu() {
		add_menu_page($this->plugin_title,$this->plugin_title,'manage_options',$this->get_slug(),array($this,'load_main'),'dashicons-universal-access','5.6');
	}
	
	
	public function load_main() { // Loads main admin menu
		global $wpdb;
		if(isset($_POST['action']) && $_POST['action'] == 'save' )  {
			if(wp_verify_nonce(mysql_real_escape_string($_POST['save_humandiagram']),'save_humandiagram')){
				$where = array('id' => mysql_real_escape_string($_POST['id']));
				$data = array('title' => mysql_real_escape_string($_POST['title']),
						   'details' => mysql_real_escape_string($_POST['details']),
						   'page' => mysql_real_escape_string($_POST['page']));
				if($wpdb->update($this->tablename,$data,$where)) {
					echo '<div class="updated">Successfully Updated</div>';
				}
				else {
					echo '<div class="error">Unable to continue action. please try again later.</div>';
				}
			}
			else {
				echo '<div class="error">Invalid Request</div>';
			}
				
		}
		
		$diag_data = $wpdb->get_results("SELECT * FROM {$this->tablename}",ARRAY_A);
		require_once('admin/main.php');
		
	}
}

if(class_exists('Techriver_human_diagram')) {
	$tcdiag = new Techriver_human_diagram();
	register_activation_hook(__FILE__,array(&$tcdiag,'install'));
}