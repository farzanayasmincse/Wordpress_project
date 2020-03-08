<?php
/**
 * The template for displaying all pages.
 *Template name:all_student
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
if(isset($_SESSION['click'])){
$a=$_SESSION['click'];
}

$b=substr($a,0,2) ;

$t=$wpdb->get_results("SELECT * FROM registration WHERE series='".$b."'" );
$ad=$wpdb->get_results("SELECT advisor FROM total_series WHERE series='".$b."'" );
foreach($ad as $ra)
$a_name=$ra->advisor;


?>
<div class="headline"><p>Series :<?php echo $b ;?></p></div>
<div class="headline"><p>Course Advisor : <?php echo $a_name ;?></p></div>
</br>
	<table>
		<tr class="color">
			<th>Name</th>
			<th>Roll</th>
			<th>Email</th>
		</tr>
	
<?php
foreach($t as $r)
{
	$fname=$r->first_name;
	$lname=$r->last_name;
	$roll=$r->roll;
	$email=$r->email;
	?>
	    <tr>
			<th><?php echo $fname;echo " "; echo $lname;?></th>
			<th><?php echo $roll; ?></th>
			<th><?php echo $email; ?></th>
		</tr>
		<?php
}?>
</table>
<?php
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	
	 
    
</head>
<body>
	<div class="space" ></div>		
</body>
</html>




<?php get_footer(); ?>

						
					
						
	
