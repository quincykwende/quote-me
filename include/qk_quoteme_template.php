<?php
/**
 * 
 * @subpackage template
 * @package quote-me
 * @version 1.0
 * 
 */

function qk_quoteme_template()
{
	if (!session_id())
	{
		session_start();
	}
	
	if( !isset( $_SESSION['qk_quoteme_opt_out'] ) )
	{
		add_action( 'wp_enqueue_scripts', 'qk_quotme_scripts' );
		add_action( 'wp_enqueue_scripts', 'qk_quotme_css' );
		
		$_SESSION['qk_quoteme_opt_out'] = "qk_quoteme_opt_out";
		
		//get all quotes
		$quotes = qk_quoteme_all();
		echo get_header();
		include("qk_quoteme_template_content.php");
		//echo get_sidebar();
		echo get_footer();

		exit;
	}
	
}
//js
function qk_quotme_scripts()
{
	wp_enqueue_script( 'jquery' ); 
	wp_enqueue_script( 'modernizr.custom', QK_QUOTEME_PLUGIN_URL.'assets/js/modernizr.custom.js', array(), '1.0.0', TRUE ); 
	wp_enqueue_script( 'jquery.cbpQTRotator', QK_QUOTEME_PLUGIN_URL.'assets/js/jquery.cbpQTRotator.min.js', array(), '2.6.2', TRUE ); 
	wp_enqueue_script( 'rotator.init', QK_QUOTEME_PLUGIN_URL.'assets/js/rotator.init.js', array('jquery.cbpQTRotator'), '1.0.0', TRUE ); 
}
//css
function qk_quotme_css()
{
	wp_enqueue_style( 'quote.default.css', QK_QUOTEME_PLUGIN_URL.'assets/css/default.css' ); 
	wp_enqueue_style( 'quote.component.css', QK_QUOTEME_PLUGIN_URL.'assets/css/component.css' ); 
	 
}

