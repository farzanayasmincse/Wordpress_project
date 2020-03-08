<?php
/**
 * The template for displaying all pages.
 *Template name:6th semester
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Sydney
 */

get_header(); 
session_start();
date_default_timezone_set("Asia/Dhaka");
if(isset($_SESSION['email']))
{
  $user_email=$_SESSION['email'];
  

}
$exists = $wpdb->get_results("SELECT * FROM  WHERE email = '".$user_email."'");
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	
	 
    
</head>
<body>
		
			<center><div class=" course">
					<form method="post">
					<center>
						<input type="submit"  name="click" value="CSE 3201"></br>
						<input type="submit"  name="click" value="CSE 3203"></br>
						<input type="submit"  name="click" value="CSE 3205"></br>
						<input type="submit"  name="click" value="CSE 3207"></br>
						<input type="submit"  name="click" value="CSE 3209"></br>
						
					</center>
					</form>
			</div></center>
		
</body>
</html>
<?php

if(isset($_POST['click'])){
$value=$_POST['click'];
$_SESSION['click']=$value;
	$exists = $wpdb->get_results("SELECT * FROM teacher_registration WHERE email = '".$user_email."'");
	if ( $wpdb->num_rows > 0 ) {
	wp_redirect( "http://localhost/wordpress/lecture/");}
	$exists2 = $wpdb->get_results("SELECT * FROM registration WHERE email = '".$user_email."'");
	if ( $wpdb->num_rows > 0 )
		wp_redirect( "http://localhost/wordpress/s_lecture/");
}
?>




<?php get_footer(); ?>
