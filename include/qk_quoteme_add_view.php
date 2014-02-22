<link rel="stylesheet" type="text/css" href="<?php echo QK_QUOTEME_PLUGIN_URL ?>assets/css/admin.css" />
<div class="wrap">
	<h2>
		<?php echo QK_QUOTEME_NAME; ?>: 
		Add New Quote
	</h2>
	<?php 
		if($_POST)
		{
			if($_POST['quote'] != '' AND $_POST['author'] != '')
			{
				global $wpdb;

				$table_name = $wpdb->prefix . "qk_quoteme"; 
				
				$value = array( 'create_date' => time(), 'quote' => $_POST['quote'], 'author' => $_POST['author']);
				$wpdb->insert( $table_name,  $value);
				
				$quote = $_POST['quote'];
				
				//unset post variables
				unset($_POST);
				
	?>
	<div id="message" class="updated below-h2">
		<p>Quote was successfully added. <?php echo $quote; unset($quote); ?> </p>
	</div>
	<?php
				//wp_redirect("?page=quote-me/include/qk_quoteme_admin.php");
			}
			elseif($_POST['quote'] == '')
			{
	?>
	<div id="message" class="error below-h2">
		<p>Please enter a quote.</p>
	</div>
	<?php	
			}
			elseif($_POST['author'] == '')
			{
	?>
	<div id="message" class="error below-h2">
		<p>Please enter an author.</p>
	</div>
	<?php			
			}
		}
	?>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?page=qk_quoteme_add" >
		<br />
		
		<label>Author</label><br />
		<input name="author" type="text" value="<?php echo @$_POST['author']; ?>" />
		<br />
		<br />
		
		<label>Quote</label><br />
		<textarea  name="quote" ><?php echo @$_POST['quote']; ?></textarea>
		<br />
		<br />
		
		<input name="submit" type="submit" value="Submit"/>
	</form>
	
</div>
