<?php
/**
 * The template for displaying all pages.
 *Template name:Student page
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Sydney
 */
?>
<?php get_header(); ?>
<?php
session_start();
date_default_timezone_set("Asia/Dhaka");
if(isset($_SESSION['email']))
{
  $user_email=$_SESSION['email'];
  

}

if(isset($_SESSION['click'])){
$a=$_SESSION['click'];
}
$t=$wpdb->get_results("SELECT name FROM course WHERE no='".$a."'");

if(!empty($t))  {
	foreach($t as $row)
	{
		$title=$row->name;
				
	}
} 
$sql=$wpdb->get_results("SELECT * FROM registration WHERE email='".$user_email."'");

if(!empty($sql))  {
	foreach($sql as $row)
	{
		$user_fname=$row->first_name;
		$user_lname=$row->last_name;
		
		
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


		<div class="page-container">
		</br>
			<center><h2><?php echo $a; ?></h2></br>
			<h2><?php echo $title; ?></h2>
			</center>
			 
		</div>				
		
		

	
	<div class="show">
	<?php 
	//new commant
	
	if(isset($_POST['new_comment'])){
		$new_com_name=$user_fname;
		$new_com_text=$_POST['comment'];
		$new_com_date=date('Y-m-d H:i:s');
		$new_com_code=$_POST['code'];
		
		
		if(isset($new_com_text)){
			global $wpdb;
            $table = 'parent';
            $data = array(
                'user'=>$new_com_name,
                'text'=>$new_com_text,
                'date'=>$new_com_date,
				'code'=>$new_com_code,
                
				
            );
            $format = array(
                '%s','%s','%s','%d'
            );
			$success=$wpdb->insert( $table, $data, $format );
			if($success){
				echo  '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Post successful!","success");';
  echo '}, 100);</script>';
					
			}
			else
				echo "sorry";
	  
}
		}
		 
	
	//new reply
	if(isset($_POST['new_reply'])){
		$new_reply_name=$user_fname;
		$new_reply_text=$_POST['new-reply'];
		$new_reply_date=date('Y-m-d H:i:s');
		$new_reply_code=$_POST['code'];
		
		if(isset($new_reply_text)){
			
            $table2 = 'children';
            $data2 = array(
                'user'=>$new_reply_name,
				'text'=>$new_reply_text,
                'date'=>$new_reply_date,
				'code'=>$new_reply_code,
                
				
            );
            $format2 = array(
                '%s','%s','%s','%d'
            );
			$success2=$wpdb->insert( $table2, $data2, $format2 );
			
			if($success2){
				echo  '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Post successful!","success");';
  echo '}, 100);</script>';
					
			}
			else
				echo "sorry";
	  
}
		
	}
	
	 global $wpdb;
            $table = 'file';
$sql2=$wpdb->get_results("SELECT * FROM $table WHERE course='".$a."' ORDER BY id DESC ");
	  $upload_dir = wp_upload_dir();
if(empty($sql2)){
	echo "<center><h2>No Lecture</h2></center>";
}	
else  {
	 
	foreach($sql2 as $row1)
	{
		$path=$row1->path;
		$name=$row1->name;
		$topic=$row1->topic;
		$date=$row1->date;
		$user=$row1->user;
		$par_code = $row1->id;
		
		
		echo '<div class="comment" id="'.$par_code.'">'
		 .'<div class="user"></br>Uploaded by:'.$user.'</div></br>'
            .'<div class="user1">Topics Name:'.$topic.'</div><br>'
			.'<div class="time">Upload date:'.$date.'</div><br>';
		?>
     <iframe  type="audio/mpeg" id="video"  src="<?php echo $upload_dir['baseurl'] . '/documents/'.$name; ?>?rel=0&amp;showinfo=0"  frameborder="0" allowfullscreen></iframe>
	 <a href="<?php echo $upload_dir['baseurl'] . '/documents/'.$name; ?>" download="<?php echo $name ?>" > Download </a>
			
			
	  <form action="" method="post" class="main">
	   <p>Comments</p>
        <textarea class="form-text" name="comment" id="comment"></textarea>
        <br />
        <input type="submit" class="form-submit" name="new_comment" value="post">
		<input type="hidden" name="code" value="<?php echo $par_code  ?>">
      </form>
	 
	 <?php

	$result=$wpdb->get_results("SELECT * FROM parent WHERE code='".$par_code."' ORDER BY id DESC ");
		foreach($result as $item)
	{
		$id=$item->id;
		$user=$item->user;
		$date=$item->date;
		$comment=$item->text;
		
		
		echo '<div class="comment" id="'.$par_code.'"></br>'
          .'<p class="userr">'.$user.''
          .'   '.''.$date.''
          .' <p class="comment-text">'.$comment.'</p>'
        .'<a class="link-reply" id="reply" name="'.$id.'">Reply</a> ';
		 
	$ch=$wpdb->get_results("SELECT * FROM children WHERE code='".$id."' ORDER BY id ASC ");
	
	if($ch!=0){
		echo '<a class="link-reply" id="children" name="'.$id.'"><span id="tog_text">Replies</span>('.$wpdb->num_rows.') </a>'
            .'<div class="child-comments" id="C-'.$id.'">';
		 	foreach($ch as $item)
	{
		$id=$item->id;
		$user=$item->user;
		$date=$item->date;
		$comment=$item->text;
		
		
		echo '<div class="child" id="'.$id.'"></br>'
          .'<p class="userr">'.$user.''
          .'<span> </span>'
		  .''.$date.''
          .' <p class="comment-text">'.$comment.'</p></div>' ;
		  
	}
	 echo '</div>';
	}
 echo '</div>';	
	}
	}  
}

  ?>
 	
</div>
</div>
</br>

  <?php get_footer(); ?>
</body>
</html>