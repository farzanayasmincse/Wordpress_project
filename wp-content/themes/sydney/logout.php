<?php
/**
 * The template for displaying all pages.
 *Template name:Logout
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Sydney
 */
?>
<?php
	session_start();
	session_destroy();
	header("Location:http://localhost/wordpress/");
?>

