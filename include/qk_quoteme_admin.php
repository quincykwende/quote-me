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
	if (function_exists('add_menu_page'))
	{
		add_menu_page('Quote me', 'Quote me', 10, __FILE__, 'qk_quoteme_admin');
		add_submenu_page(__FILE__, 'Analytics', 'Analytics', 10, 'qk_quoteme_analytics', 'qk_quoteme_analytics');
		add_submenu_page(__FILE__, 'Help', 'Help', 10, 'qk_quoteme_help', 'qk_quoteme_help');
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
	
	$quotes = qk_quoteme_all();
	
	include("qk_quoteme_admin_template.php");
	
	//var_dump($quotes);
}

/**
 * Help
 *
 * Help page of plugin
 *
 * @return string
 *
 */
function qk_quoteme_help(){
	echo "help page";
}


/**
 * Quote Analytics
 *
 * Keep track of quote analytics (visits, countries visited from, average time on quote)
 *
 */
function qk_quoteme_analytics(){
	echo "analytics";
}


/**
 * Adds a quote
 *
 * Add a new quote to a db
 *
 * @global object $post The post object
 * @return integer $new_views The number of views the post has
 *
 */
function qk_quoteme_add(){
	echo "add quote";
} 


/**
 * Modify a quote
 *
 *
 * @global object $post The post object
 * @return integer $new_views The number of views the post has
 *
 */
function qk_quoteme_edit(){
	echo "edit quote";
}
