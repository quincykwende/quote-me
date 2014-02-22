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
include("include/qk_quoteme_install.php");
include("include/qk_quoteme_admin.php");

define('QK_QUOTEME_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define('QK_QUOTEME_VERSION', 1.0);

//activate
register_activation_hook( __FILE__, 'qk_quoteme_install_db');
register_activation_hook( __FILE__, 'qk_quoteme_install_db_data');

//actions
add_action( 'template_redirect', 'qk_quoteme_show' );
add_action('admin_menu', 'qk_quoteme_admin_menu');


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


