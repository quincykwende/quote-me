
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Blueprint: Quotes Rotator</title>
		<meta name="description" content="Blueprint: Quotes Rotator" />
		<meta name="keywords" content="quotes rotator, content rotator, jquery, javascript, fade in, fade out, css3, component, html, web development, blockquote" />
		<meta name="author" content="Codrops" />
		<link rel="shortcut icon" href="../favicon.ico">
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
						<img src="<?php echo QK_QUOTEME_PLUGIN_URL ?>assets/images/1.jpg" alt="img01" />
						<blockquote>
						  <p><?php echo $quote["body"]; ?></p>
						  <footer><?php echo $quote["author"]; ?></footer>
						</blockquote>
					</div>
					<?php endforeach; ?>
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
