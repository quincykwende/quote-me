
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo QK_QUOTEME_PLUGIN_URL ?>assets/css/default.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo QK_QUOTEME_PLUGIN_URL ?>assets/css/component.css" />
		<script src="<?php echo QK_QUOTEME_PLUGIN_URL ?>assets/js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="container">
			
			<div class="main">
				<div id="cbp-qtrotator" class="cbp-qtrotator">
					<?php foreach($quotes as $quote): ?>
					<div class="cbp-qtcontent">
						<blockquote>
						  <p><?php echo $quote->quote; ?></p>
						  <footer><?php echo $quote->author; ?></footer>
						</blockquote>
					</div>
					<?php endforeach; ?>
					
				</div>
				
				<div class="opt-out">
						<a href="<?php echo $_SERVER['PHP_SELF']; ?>"> 
						Opt out 
						</a>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script src="<?php echo QK_QUOTEME_PLUGIN_URL ?>assets/js/jquery.cbpQTRotator.min.js"></script>
		<script>
			$( function() {
				/*
				- how to call the plugin:
				$( selector ).cbpQTRotator( [options] );
				- options:
				{
					// default transition speed (ms)
					speed : 700,
					// default transition easing
					easing : 'ease',
					// rotator interval (ms)
					interval : 8000
				}
				- destroy:
				$( selector ).cbpQTRotator( 'destroy' );
				*/

				$( '#cbp-qtrotator' ).cbpQTRotator();

			} );
		</script>
	</body>
</html>
