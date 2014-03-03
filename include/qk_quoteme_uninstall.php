<?php
	
	global $wpdb;

	$table_name = $wpdb->prefix . "qk_quoteme";

	$sql = "DROP TABLE IF EXISTS ".$table_name;

	$results = $wpdb->query( $sql );
	
	$results = $wpdb->query( $sql );
	
	delete_option( 'qk_quoteme_version' );
