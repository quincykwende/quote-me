<?php
/**
 * Admin menus
 *
 * Add links to admin menu in the backend
 *
 * @return string menu buttons
 *
 */
function qk_quoteme_admin_menu(){
	if (function_exists( 'add_menu_page' ))
	{
		add_menu_page( 'Quote me', 'Quote me', 10, __FILE__, 'qk_quoteme_admin' );
		add_submenu_page( __FILE__, 'Add New', 'Add New', 10, 'qk_quoteme_action', 'qk_quoteme_action' );
		add_submenu_page( __FILE__, 'Help', 'Help', 10, 'qk_quoteme_help', 'qk_quoteme_help' );
	}
}

/**
 * Manage quotes
 *
 * Add, edit and delete quotes
 *
 *
 */
function qk_quoteme_admin(){
	
	//$quotes = qk_quoteme_all();
	
	include("qk_quoteme_admin_view.php");
	
	//var_dump($quotes);
}

/**
 * Help
 *
 * Help page of plugin
 */
function qk_quoteme_help(){
	
	include( "qk_quoteme_help_view.php" );
}


/**
 * Adds a quote
 *
 * Add a new quote to a db
 *
 *
 */
function qk_quoteme_action(){
	
	include( "qk_quoteme_add_view.php" );
} 


/**
 * Modify a quote
 *
 *
 */
function qk_quoteme_data( $quote_id ){
	
	///global $wpdb;
	//$table_name = $wpdb->prefix . "qk_quoteme"; 
	
//	$qoute_data = $wpdb->get_row("SELECT * FROM $table_name WHERE id = $quote_id");
	
	//return $qoute_data;
}

/**
 * Delete a quote
 *
 */
function qk_quoteme_delete( $quote_id ){

	global $wpdb;

	$table_name = $wpdb->prefix . "qk_quoteme"; 
	
	$wpdb->delete( 	$table_name, array( 'id' => $quote_id ) );
	
	//echo $_SERVER['PHP_SELF'];
	
}
