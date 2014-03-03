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
	
		global $wpdb;
		$table_name = $wpdb->prefix . "qk_quoteme"; 
		
		
	
		if( $_POST )
		{
			if( $_POST['quote'] != '' AND $_POST['author'] != '' )
			{
				//global $wpdb;

				//$table_name = $wpdb->prefix . "qk_quoteme"; 
				
				$value = array( 'create_date' => time(), 'quote' => $_POST['quote'], 'author' => $_POST['author'] );
				
				if( isset($_GET['edit']) )
				{
					$wpdb->update( $table_name,  $value, array( 'id' => $_GET['edit'] ));					
					$notice = "Quote was successfully updated";
				}
				else
				{
					$wpdb->insert( $table_name,  $value);
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
			//$qoute_data = qk_quoteme_data($_GET['edit'])
			
			$quote_id = $_GET['edit'];
			$qoute_data = $wpdb->get_row("SELECT * FROM $table_name WHERE id = $quote_id");
			
			$quote = $qoute_data->quote;
			$author = $qoute_data->author;
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

