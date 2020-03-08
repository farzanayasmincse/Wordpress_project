<?php
/**
 * The template for displaying all pages
 *Template Name: resistration
 /**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Sydney
 */
get_header(); ?>

<?php
if(!empty($_POST)){
	global $wpdb;
            $table = 'registration';
			
            $data = array(
                'first_name'    => ($_POST['fname']),
				'last_name'   => ($_POST['lname']),
				'series'   => ($_POST['fs']),
				'roll'   => ($_POST['user_roll']),
				'email'   => ($_POST['user_email']),
				'password'   => ($_POST['user_pass']),
				'code'   => ($_POST['user_code']),
				
            );
            $format = array(
                '%s','%s','%d','%s','%s','%s','%s'
            );
			$data2 = array(
                'user_login'    => ($_POST['fname']),
				'user_url' =>"http://localhost/wordpress/online-lectures/",
				'user_pass'=>($_POST['user_pass']),
				'user_email'=>($_POST['user_email']),
				
				
            );
           
			wp_insert_user( $data2 );
			$email=$_POST['user_email'];
			$exists = $wpdb->get_results("SELECT * FROM $table WHERE email = '".$email."'");
			
       if ( $wpdb->num_rows > 0 ) {
					echo '<script type="text/javascript">';
					  echo 'setTimeout(function () { swal("This email is already resistered,Please try another!","Message!","warning");';
					  echo '}, 100);</script>';
}
			elseif(($_POST['user_code'])!='student')
			{
				echo  '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Please enter correct code!","Message!","warning");';
  echo '}, 100);</script>';
			}
			else
			{
			$success=$wpdb->insert( $table, $data, $format );
			
			if($success){
				echo  '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Registration successful!","Please Login!","success");';
  echo '}, 100);</script>';
					
			}
			}
}


	?>
	<div id="primary" class="content-area col-md-9">
	    <form  method="post">
				<div class="regis">
					<div class="firstname">
							<label for="fname">First Name</label>
							<center><input type="text" id="fname" name="fname" required="required" placeholder="Enter Your First name" /></center><br />
					</div>
					<div class="lastname">
							<label for="lname">Last Name</label>
							<center><input type="text" id="lname" name="lname" required="required" placeholder="Enter Your First name" /></center><br />
					</div>
					<div class="se"><label for="fs">Series</label>
							<center><input type="text" id="fs" name="fs" required="required" placeholder="Enter Series in Number" /></center><br /></div>
					<div class="roll">
							<label for="roll">Roll Number</label>
							<center><input type="text" id="roll" name="user_roll" required="required" placeholder="Enter Your Roll Number" /></center><br />
					</div>
					
					<div class="email">
						<br /><label for="email">Email</label>
						<center><input type="email" id="email" name="user_email" required="required" placeholder="Enter your email address"/></center>	<br />
					</div>
					<div class="pass">
						<label for="pass">Password</label>
						<center><input type="password" id="pass" name="user_pass" required="required" placeholder="Enter your password minimum 8 characters"/></center><br />
					</div>
					
					<div class="code">
						<label for="code">Code</label>
						<center><input type="text" id="code" name="user_code" required="required" placeholder="Enter code"/></center><br />
					</div>
				</div>	
					<center><div class="submit">
						<input type="submit" name="sub" value="Register"  />
						 <a href="http://localhost/wordpress/s_l/"><input type="button" value="Login "></a></center>
					</div>
	</div><!-- #primary -->


<?php get_footer();
