<?php

class Techriver_humandiagram_loader {
	protected $tablename;
	protected $version;
	
	public function __construct($version,$tablename) {
		$this->tablename = $tablename;
		$this->version = $version;
		
		$this->init();
	}
	
	public function install() {
		$this->run_db();
		add_option('techriver_humandiagram_version',$this->version);
	}
	
	
	public function update() {
		$db_ver;
		
		if($db_ver = get_option('techriver_humandiagram_version')) {
			if($db_ver !== $this->version) {
				$this->run_db();
				update_option('techriver_humandiagram_version',$this->version);
			}
		}
		
	}
	
	
	public function run_db() {
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		
		$sql = "CREATE TABLE {$this->tablename} (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			title text NOT NULL,
			details text NOT NULL,
			page text,
			UNIQUE KEY id (id)
		) $charset_collate;";
		
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
		
		
		$empty = $wpdb->get_results("SELECT * FROM {$this->tablename} LIMIT 1");
		if(empty($empty)) {
			for($i = 1; $i <= 5; $i++) {
				$data = array ('id' => $i, 
							'title' => 'details', 
							'details' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas interdum dolor eget finibus vehicula. Etiam tempus justo eget turpis vestibulum commodo. In pharetra eros sed congue fringilla. Proin vulputate ultricies nisl. Donec nibh enim, aliquam quis purus molestie, dapibus fringilla ex. Quisque imperdiet tortor quis tellus tincidunt, id fringilla erat tempor. Aliquam vulputate eleifend dui vitae hendrerit. Quisque at mauris justo. Phasellus quis nibh quis lacus eleifend aliquam. Vestibulum sit amet nisi metus. Nulla eu molestie tortor. Nullam luctus ultrices tortor, ac condimentum arcu molestie vitae. Nunc et condimentum justo. Donec et ex dapibus, malesuada nisi eget, accumsan orci. Integer elementum diam quis diam euismod hendrerit.'
						    );
				$wpdb->insert($this->tablename,$data);
			}
		}
	}
	
	//Load all dependencies (JS/CSS/etc)
	public function init() {
		add_action('admin_enqueue_scripts',array($this,'load_admin_js')); // All admin resources
	}
	
	public function load_admin_js() {
		//JS
		wp_register_script('bitstorm_jquery_color',HUMANDIAG_PLUGIN_PATH.'assets/js/bitstorm-jquery-color.min.js',array('jquery'),'1.0.0',true);
		wp_register_script('tc_humandiag_admin_js',HUMANDIAG_PLUGIN_PATH.'assets/js/admin_plugin.js',array('jquery','bitstorm_jquery_color'),'1.0.0',true);
		
		$data_arr = array('ajaxurl' => admin_url('admin-ajax.php'));
		wp_localize_script('tc_humandiag_admin_js','tc_humandiag',$data_arr);
		
		wp_enqueue_script('bitstorm_jquery_color');
		wp_enqueue_script('tc_humandiag_admin_js');
		
		
		
		//CSS
		wp_enqueue_style('tc_humandiag_admin_css',HUMANDIAG_PLUGIN_PATH.'assets/css/admin.css',array(),'1.0.0');
	}
}