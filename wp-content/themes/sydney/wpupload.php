<?php
/**
 * The template for displaying all pages.
 *Template name:Upload2
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Sydney
 */

get_header(); ?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>5th Semester</title>
</head>
<body>
    
	<label for="examplefile">
		Select File To Upload:
	</label>
	<input type="file" id="examplefile" name="examplefile" value="" />
	<?php wp_nonce_field( plugin_basename( __FILE__ ), 'examplenonce' ); ?>
	
	
</body>