<?php
/**
 * @package quote-me
 * @version 1.0
 */
 
/**
 * Plugin Name: Quote me
 * Plugin URI: https://github.com/quincykwende/quote-me
 * Description: This plugin adds a quote rotator to your site. Your users would see this quote rotator before any content during their first visit and they can click to opt/continue
 * Version: 1.0
 * Author: Quincy Kwende
 * Author URI: http://www.quincykwende.wordpress.com
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
include( "include/qk_quoteme_template.php" );
include( "include/qk_quoteme_install.php" );
include( "include/qk_quoteme_admin.php" );

define( 'QK_QUOTEME_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'QK_QUOTEME_VERSION', 1.0 );
define( 'QK_QUOTEME_NAME', "Quote me" );

//activate
register_activation_hook( __FILE__, 'qk_quoteme_install_db' );
register_activation_hook( __FILE__, 'qk_quoteme_install_db_data' );

//actions
add_action( 'template_redirect', 'qk_quoteme_show' );
add_action( 'admin_menu', 'qk_quoteme_admin_menu' );


/**
 * Quotes
 *
 * Return all quotes
 *
 * @return object $quotes 
 *
 */
function qk_quoteme_all() {
	
	global $wpdb;
	
	$table_name = $wpdb->prefix . "qk_quoteme"; 
	
	//Retrieve quotes
	$query = "SELECT * FROM " . $table_name;
	$query .= " ORDER BY id DESC ";
	
	$quotes = $wpdb->get_results( $query );
	
	return $quotes;
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
	

}
 
/**
 * Show quote
 *
 * Upon landing on site for the first i.e without session data display quote
 *
 *
 */
function qk_quoteme_show(){
	
	echo qk_quoteme_template();

}


