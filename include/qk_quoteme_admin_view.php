<link rel="stylesheet" type="text/css" href="<?php echo QK_QUOTEME_PLUGIN_URL ?>assets/css/admin.css" />
<div class="wrap">
	<h2>
		<?php echo QK_QUOTEME_NAME; ?>
		<a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=qk_quoteme_add" class="add-new-h2">Add New</a>
	</h2>
	<?php
		if(isset($_GET['delete']))
		{
			qk_quoteme_delete($_GET['delete']);
			
			//redirect upon successful delete
			wp_redirect($_SERVER['PHP_SELF']."?page=quote-me/include/qk_quoteme_admin.php");
		}
	?>
	<table class="qk-quote-table" cellspacing="0">
	<thead>
		<tr>
			<th>No</th>
			<th>Quote</th>
			<th>Author</th>
		</tr>
		<?php 
			$i = 1;
			foreach($quotes as $quote):
				if(($i % 2) == 0)
				{
					$class = '';
				}
				else
				{
					$class = 'alt';
				}
		?>
		<tr class="<?php echo $class; ?>">
				<td><?php echo $i; ?></td>
				<td>
					<span class= "qk-quotme-title">
						<a href="#" title="<?php echo $quote->quote; ?>">
						<?php echo $quote->quote; ?>
						</a>
					</span>
					<div class="row-actions">
						<span class="edit">
							<a href="#" title="Edit this quote">Edit</a> | 
						</span>
						<span class="trash">
							<a class="submitdelete" title="Delete this quote" href="<?php echo $_SERVER['PHP_SELF']; ?>?page=quote-me/include/qk_quoteme_admin.php&delete=<?php echo $quote->id; ?>">Delete</a> | 
						</span>
				</td>
				<td><?php echo $quote->author; ?></td>
		</tr>
		<?php 
			$i++;
			endforeach;
		?>
	</thead>	
	</table>
	<h2>
		<a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=qk_quoteme_add" class="add-new-h2">Add New Quote</a>
	</h2>
</div>
