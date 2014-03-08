
<div class="container">			
	<div class="main">
		<div id="cbp-qtrotator" class="cbp-qtrotator">
			<?php foreach( $quotes as $quote ): ?>
			<div class="cbp-qtcontent">
				<blockquote>
					<p><?php echo $quote->quote; ?></p>
					<footer><?php echo $quote->author; ?></footer>
				</blockquote>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="opt-out">
			<a href="<?php  echo $_SERVER['REQUEST_URI']; ?>"> 
				Opt out and continue !
			</a>
		</div>
	</div>	
</div>	

