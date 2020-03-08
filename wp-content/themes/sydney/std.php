<?php
/**
 * The template for displaying all pages.
 *Template name:series
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

global $wpdb;
if(!empty($_POST)){
	
            $table = 'total_series';
            $data = array(
                'advisor'    => ($_POST['advisor']),
				'series'   => ($_POST['fs']),
				
            );
			$format = array(
                '%s','%d'
            );
			$success=$wpdb->insert( $table, $data, $format );
			if($success){
				echo  '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Registration successful!","success");';
  echo '}, 100);</script>';
					
}
	

}

	

?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	
	 
    
</head>
<body>
		<?php
				$exists = $wpdb->get_results("SELECT * FROM teacher_registration WHERE email = '".$user_email."'");
	if ( $wpdb->num_rows > 0 ) {
	
		?>
			<center><div class=" series" id="id">
					<form method="post">
					<center><div class="uk-button-dropdown"  data-uk-dropdown="{justify:'#id'}"  >
  <div class="button"><button >
	Add New Series
	<i class="uk-icon-caret-down"></i>
	</button></div>
	
		<div class="uk-dropdown  uk-dropdown-large">
	
			
				<ul class="uk-nav uk-nav-dropdown add">
				   <li><label for="advisor">Course Advisor Name:</label>
							<center><input type="text" id="advisor" name="advisor" required="required" placeholder="Enter Name" /></center><br /></li>
					<li><label for="fs">Series</label>
							<center><input type="text" id="fs" name="fs" required="required" placeholder="Enter Series in Number" /></center><br /></li>
					<li><input type="submit" name="sub" value="Submit" /></li>
				</ul>
			
	    </div>
		
	
  </div></center>
					</form>
			</div></center>
	
			<?php
	}
	?>
<?php

$table = 'total_series';
 $value=$wpdb->get_results("SELECT series FROM $table order by series desc");
   echo "</br>";
 
	 if(!empty($value))  {
	foreach($value as $v)
	{
		$s=$v->series;
		?><form method="post"><div class="ss"><center><input type="submit" name="click" value="<?php echo $s?> series"></center></div></form><?php		
	}

	 
 }
 if(isset($_POST['click'])){
$va=$_POST['click'];
$_SESSION['click']=$va;
	
	wp_redirect( "http://localhost/wordpress/all_student/");
	
}

?>
	<div class="space" ></div>	
</body>
</html>




<?php get_footer(); ?>

						
					
						
	
