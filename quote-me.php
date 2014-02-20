<?php
/**
 * @package quote-me
 * @version 1.0
 */
 
/**
 * Plugin Name: Quote me
 * Plugin URI: http://wordpress.org/plugins/quote-me/
 * Description: A brief description of the Plugin.
 * Version: 1.0
 * Author: Quincy Kwende
 * Author URI: http://URI_Of_The_Plugin_Author
 * License: GPL2
 */
 
/*  Copyright 2014  Quincy Kwende  (email : quincykwende[at]gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//include files
include("include/qk_quoteme_template.php");

//actions
add_action( 'template_redirect', 'qk_quoteme_show' );
//add_action( 'template_redirect', 'my_page_template_redirect' );
add_action('admin_menu', 'qk_quoteme_admin_menu');

define('QK_QUOTEME_PLUGIN_URL', plugin_dir_url( __FILE__ ));
/**
 * Quotes
 *
 * Return all quotes
 *
 * @return array $quotes 
 *
 */
function qk_quoteme_all() {
	
		return $quotes = array( 1=>array("body"=>"People eat meat and think they will become as strong as an ox, forgetting that the ox eats grass.", "author"=>"Pino Caruso", "date"=>"12 Feb 2014"), 
					 2=>array("body"=>"Nothing will benefit human health and increase the chances for survival of life on Earth as much as the evolution to a vegetarian diet.", "author"=>"Albert Einstein", "date"=>"19 May 2014"),
					 3=>array("body"=>"If you don't want to be beaten, imprisoned, mutilated, killed or tortured then you shouldn't condone such behaviour towards anyone, be they human or not.", "author"=>"Moby", "date"=>"23 April 2014"),
					 4=>array("body"=>"My body will not be a tomb for other creatures.", "author"=>"Leonardo Da Vinci", "date"=>"03 September 2014"),
			  );
}


/**
 * Get quotes
 *
 * Randomly get quotes and keep track of the number of
 * times a quote has been view,ip of user, 
 *
 * @return array $quote The quote data
 *
 */
 function qk_quoteme_get() {
	
	$quotes = qk_quoteme_all();
	
	//randomly get a quote id
	$quote_id = mt_rand(1, count($quotes));
	
	//return quote array
	return $quotes[$quote_id];	
}
 
/**
 * Show quote
 *
 * Upon landing on site for the first i.e without session data display quote
 *
 * @global object $post The post object
 * @return integer $new_views The number of views the post has
 *
 */
function qk_quoteme_show(){
	
	// wp_redirect( home_url( '/signup/' ) );
    //    exit();
	echo qk_quoteme_template();

}

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
	
	echo "_admin";

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
