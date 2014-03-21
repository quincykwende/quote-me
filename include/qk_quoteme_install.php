<?php


global $qk_quoteme_version;
$qk_quoteme_version = QK_QUOTEME_VERSION;


/**
 * Add initial data to database table
 *
 */
function qk_quoteme_install() {
	
	//set verion
	add_option( "qk_quoteme_version", $qk_quoteme_version );

	//generate sample data
	$current_time = current_time('mysql', $gmt = 0 );
	$current_time_gmt = current_time('mysql', $gmt = 1 );
	
	$quotes = array(
				array( 'post_content' => 'People eat meat and think they will become as strong as an ox, forgetting that the ox eats grass.', 'quote_author' => 'Pino Caruso', 'post_date' => $current_time, 'post_date_gmt' => $current_time_gmt, 'post_type' => QK_QUOTEME_POST_TYPE ),
				array( 'post_content' => 'Nothing will benefit human health and increase the chances for survival of life on Earth as much as the evolution to a vegetarian diet.', 'quote_author' => 'Albert Einstein', 'post_date' => $current_time, 'post_date_gmt' => $current_time_gmt, 'post_type' => QK_QUOTEME_POST_TYPE ),
				array( 'post_content' => 'If you don\'t want to be beaten, imprisoned, mutilated, killed or tortured then you shouldn\'t condone such behaviour towards anyone, be they human or not.', 'quote_author' => 'Moby', 'post_date' => $current_time, 'post_date_gmt' => $current_time_gmt, 'post_type' => QK_QUOTEME_POST_TYPE ),
				array( 'post_content' => 'My body will not be a tomb for other creatures.', 'quote_author' => 'Leonardo Da Vinci', 'post_date' => $current_time, 'post_date_gmt' => $current_time_gmt, 'post_type' => QK_QUOTEME_POST_TYPE ),
				array( 'post_content' => 'Code is Poetry.', 'quote_author' => 'WordPress', 'post_date' => $current_time, 'post_date_gmt' => $current_time_gmt, 'post_type' => QK_QUOTEME_POST_TYPE )
			   );
    //insert sample data
    foreach( $quotes as $quote )
    {		
		$quote_id = wp_insert_post( $quote );
		// add post meta ... that is save author as post meta
		add_post_meta($quote_id, 'quote_author', $quote['quote_author']);
	}
}
	
