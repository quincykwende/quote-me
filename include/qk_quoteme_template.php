<?php
/**
 * 
 * @subpackage template
 * @package quote-me
 * @version 1.0
 * 
 */
/*
function qk_quoteme_template()
{
	echo get_header();

		echo "<div id='primary' class='content-area'>
			<div id='content' class='site-content' role='main'>";
			
			
			$quote = qk_quoteme_get();
			echo $quote["body"];
			
			echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		echo "</div>";
		echo get_sidebar( 'content' );
		echo "</div>";
		
	echo get_sidebar();
	echo get_footer();
	
	exit;
}
*/

function qk_quoteme_template()
{
	//get all quotes
	
	$quotes = qk_quoteme_all();
	
	include("qk_quoteme_template_content.php");
	//echo "dffd";
	exit;
}

