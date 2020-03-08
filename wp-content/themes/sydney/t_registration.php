<?php
/**
 * The template for displaying all pages.
 *Template name:Teacher registration
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
            $table = 'teacher_registration';
            $data = array(
                'first_name'    => ($_POST['fname']),
				'last_name'   => ($_POST['lname']),
				'designation'   => ($_POST['user_dg']),
				'department'   => ($_POST['user_dep']),
				'email'   => ($_POST['user_email']),
				'password'   => ($_POST['user_pass']),
				'code'   => ($_POST['user_code']),
				
            );
            $format = array(
                '%s','%s','%s','%s','%s','%s','%s'
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
			elseif(($_POST['user_code'])!='teacher')
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
		<form method="post" >
				<div class="regis">
					<div class="firstname">
							<label for="fname">First Name</label>
							<center><input type="text" id="fname" name="fname" required="required" placeholder="Enter Your First name" /></center><br />
					</div>
					<div class="lastname">
							<label for="lname">Last Name</label>
							<center><input type="text" id="lname" name="lname" required="required" placeholder="Enter Your First name" /></center><br />
					</div>
					<div class="dep">
							<label for="dg">Designation</label><br />
							<center><select required="required" name="user_dg">
							<option value="">Select Designation</option>
							<option value="Professor">Professor</option>
							<option value="Associate Professor">Associate Professor</option>
							<option value="Assistant Professor">Assistant Professor</option>
							<option value="Lecturer">Lecturer</option>
							
							
						</select></center>
					</div>
					<div class="dep">
						<label for="dep">Department</label><br />
						<center>	<select required="required" name="user_dep">
							<option value="">Select Department</option>
							<option value="Department of CSE">Department of CSE</option>
							<option value="Department of EEE">Department of EEE</option>
							<option value="Department of Mathematics">Department of Mathematics</option>
							<option value="Department of Humanities">Department of Humanities</option>
							<option value="Department of Physics">Department of Physics</option>
							<option value="Department of Chemistry">Department of Chemistry</option>
							
						</select></center>
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
						<center><input type="text" id="code" name="user_code" required="required" placeholder="Enter code"/><br /></center>
					</div>
				</div>	
					<center><div class="submit">
						<input type="submit" name="sub" value="Submit" />
						<a href="http://localhost/wordpress/t_l/"><input type="button" value="Login "></a></center>
					</div>
	</div><!-- #primary -->


<?php get_footer(); ?>
