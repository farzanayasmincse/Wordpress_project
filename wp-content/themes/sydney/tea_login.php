<?php
/**
 * The template for displaying all pages.
 *Template name:Teacher login
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Sydney
 */

get_header(); ?>
<?php
session_start();
	if(!empty($_POST)){
	global $wpdb;
            
			$table = 'teacher_registration';
			$email=$_POST['user_email'];
			$pass=$_POST['user_pass'];
				
				$exit=$wpdb->query("Select * from $table where email='".$email."' and password='".$pass."'");
				if($exit==0)
				{
					echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Password and email is not correct!","Message!","warning");';
  echo '}, 100);</script>';
				
				}
				else{
					
					$_SESSION['email']=$email;
						wp_redirect( "http://localhost/wordpress/online-lectures/");
					
					
					
					$data=$wpdb->get_results("Select * from $table where email='".$email."' and password='".$pass."'");
					//foreach($data as $row)
					//echo $row->first_name;
					
					}
					
				
				
			
				
      
}

?>

	<div id="primary" class="content-area col-md-9">
		<div class="regis">
		<center><h2>Login Here</h2></center>
			<form method="post">
					<label for="email">Email</label>
						<center><input type="email" id="email" name="user_email" required="required" placeholder="Enter your email address"/></center>	<br />
					
					
						<label for="pass">Password</label>
						<center><input type="password" id="pass" name="user_pass" required="required" placeholder="Enter your Password"/></center><br />
					</div>
					<div class="submit">
					   <center><div class="submit">
						<input type="submit" name="login" value="Login" />
						<input type="button" onclick="location.href='http://localhost/wordpress/teacher_registration/';" value="Registration"</center></div>
					</div>
			</form>
			
		
		

	</div><!-- #primary -->


<?php get_footer(); ?>
