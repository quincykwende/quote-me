<link rel="stylesheet" type="text/css" href="<?php echo QK_QUOTEME_PLUGIN_URL ?>assets/css/admin.css" />
<div class="wrap">
	<h2>
		<?php echo QK_QUOTEME_NAME; ?>: 
		<?php if( isset($_GET['edit']) ) { ?>
			Update Quote
		<?php }else{ ?>
		Add New Quote
		<?php } ?>
	</h2>
	<?php 
	
		if( $_POST )
		{
			if( $_POST['quote'] != '' AND $_POST['author'] != '' )
			{
				//generate sample data
				$current_time = current_time('mysql', $gmt = 0 );
				$current_time_gmt = current_time('mysql', $gmt = 1 ); 
				
				$quote_content = array( 'post_date' => $current_time, 'post_date_gmt' => $current_time_gmt, 'post_type' => QK_QUOTEME_POST_TYPE, 'post_content' => $_POST['quote'], 'quote_author' => $_POST['author'] );
				
				if( isset($_GET['edit']) )
				{
					$quote_id = $_GET['edit'];	
					$quote_content['ID'] = $quote_id;
					wp_update_post( $quote_content );
					//update post meta	
					update_post_meta($quote_id, 'quote_author', $quote_content['quote_author']);		
					$notice = "Quote was successfully updated";
				}
				else
				{
					$quote_id = wp_insert_post( $quote_content );
					add_post_meta($quote_id, 'quote_author', $quote_content['quote_author']);
					$notice = "Quote was successfully added";
				}

				$quote_new = $_POST['quote'];
				
				//unset post variables
				unset($_POST);
				
	?>
	<div id="message" class="updated below-h2">
		<p>Quote was successfully added. <?php echo $quote_new; unset($quote_new); ?> </p>
	</div>
	<?php
				//wp_redirect("?page=quote-me/include/qk_quoteme_admin.php");
			}
			elseif( $_POST['quote'] == '' )
			{
	?>
	<div id="message" class="error below-h2">
		<p>Please enter a quote.</p>
	</div>
	<?php	
			}
			elseif( $_POST['author'] == '' )
			{
	?>
	<div id="message" class="error below-h2">
		<p>Please enter an author.</p>
	</div>
	<?php			
			}
		}
		if( isset($_GET['edit']) )
		{
			$quote_id = $_GET['edit'];
			$qoute_data = get_post($quote_id);
			$quote = $qoute_data->post_content;
			$author = get_post_meta( $quote_id, "quote_author", true );
		}
	?>
	
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=qk_quoteme_action<?php if( isset($_GET['edit']) ) { echo "&edit=".$_GET['edit'];} ?>" >
		<br />
		
		<label>Author</label><br />
		<input name="author" type="text" value="<?php if( isset($_GET['edit']) ) { echo $author; }else {echo @$_POST['author']; }?>" />
		<br />
		<br />
		
		<label>Quote</label><br />
		<textarea  name="quote" ><?php if( isset($_GET['edit']) ) { echo $quote; }else {echo @$_POST['quote']; }?></textarea>
		<br />
		<br />
		
		<input name="submit" type="submit" value="Submit"/>
	</form>
	
</div>

