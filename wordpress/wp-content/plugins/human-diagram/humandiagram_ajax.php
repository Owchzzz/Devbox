<?php

class Techriver_humandiagram_ajax {
	protected $table;
	
	public function __construct($table) {

		$this->table = $table;
		add_action('wp_ajax_nopriv_humandiag_getdata',array($this,'getdata'));
		add_action('wp_ajax_humandiag_getdata',array($this,'getdata'));
	}
	
	public function getdata() {
		global $wpdb;
		$detailID = mysql_real_escape_string($_POST['postID']);
		
		$response = array();
		
		$data = $wpdb->get_results("SELECT * FROM {$this->table} WHERE id={$detailID}",ARRAY_A);
		$response = json_encode($data[0]);
		
		 // response output
		    header( "Content-Type: application/json" );
		    echo $response;
		die();
	}
}