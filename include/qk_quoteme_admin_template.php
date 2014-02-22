<style>
td{padding:5px 10px;}
	.qk-quote-table{background: #fff;border: 1px solid #e5e5e5;
-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.04);
box-shadow: 0 1px 1px rgba(0,0,0,.04);
border-spacing: 0;
width: 100%;
clear: both;
margin: 0;
}
.qk-quote-table thead th {
border-bottom: 1px solid #e1e1e1;
padding:5px 10px;
text-align:left;
}
.alt{background-color: #f9f9f9;}
.qk-quotme-title a{text-decoration:none;color:#444;}
</style>

<div class="wrap">
	<h2>
		<?php echo QK_QUOTEME_NAME; ?>
		<a href="#" class="add-new-h2">Add New</a>
	</h2>
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
							<a class="submitdelete" title="Delete this quote" href="#">Delete</a> | 
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
		<a href="#" class="add-new-h2">Add New Quote</a>
	</h2>
</div>
