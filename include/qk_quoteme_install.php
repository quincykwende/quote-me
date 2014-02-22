<?php
/**
 * Creates Database Table for plugin
 *
 */

global $qk_quoteme_version;
$qk_quoteme_version = QK_QUOTEME_VERSION;
 
function qk_quoteme_install_db () {
   
	global $wpdb;

	$table_name = $wpdb->prefix . "qk_quoteme"; 
   
	$sql  = 	"CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			quote tinytext NOT NULL,
			author tinytext NOT NULL,
			create_date int(11) NOT NULL,
			actual_date int(11) NOT NULL,
			state tinyint(1) DEFAULT 1,
			UNIQUE KEY id (id)
			);";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );
   
	//set verion
	add_option( "qk_quoteme_version", $qk_quoteme_version );
}

/**
 * Add initial data to database table
 *
 */
function qk_quoteme_install_db_data () {

	global $wpdb;

	$table_name = $wpdb->prefix . "qk_quoteme"; 
   
	//sample data
	$value_1 = array( 'create_date' => time(), 'quote' => 'People eat meat and think they will become as strong as an ox, forgetting that the ox eats grass.', 'author' => 'Pino Caruso',);
	$value_2 = array( 'create_date' => time(), 'quote' => 'Nothing will benefit human health and increase the chances for survival of life on Earth as much as the evolution to a vegetarian diet.', 'author' => 'Albert Einstein' );
	$value_3 = array( 'create_date' => time(), 'quote' => 'If you don\'t want to be beaten, imprisoned, mutilated, killed or tortured then you shouldn\'t condone such behaviour towards anyone, be they human or not.', 'author' => 'Moby');
	$value_4 = array( 'create_date' => time(), 'quote' => 'My body will not be a tomb for other creatures.', 'author' => 'Leonardo Da Vinci') ;
    
    //insert sample data
	$wpdb->insert( $table_name,  $value_1);
	$wpdb->insert( $table_name,  $value_2);
	$wpdb->insert( $table_name,  $value_3);
	$wpdb->insert( $table_name,  $value_4);
}
	