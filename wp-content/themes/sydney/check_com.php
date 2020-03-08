 <?php
    //new commant
	if(isset($_POST['new_comment'])){
		$new_com_name=$_SESSION['first_name'];
		$new_com_text=$_POST['comment'];
		$new_com_date=date('Y-m-d H:i:s');
		$new_com_code=generateRandomString();
		
		if(isset($new_com_text)){
			global $wpdb;
            $table = 'parent';
            $data = array(
                'user'=$new_com_name;
                'text'=$new_com_text;
                'date'=$new_com_date;
                'code'=$new_com_code;
				
            );
            $format = array(
                '%s','%s','%s','%s'
            );
			$wpdb->insert( $table, $data, $format );
		}
		header("Location: "); 
	}
	//new reply
	if(isset($_POST['new_reply'])){
		$new_reply_name=$_SESSION['first_name'];
		$new_reply_text=$_POST['comment'];
		$new_reply_date=date('Y-m-d H:i:s');
		$new_reply_code=$_POST['code'];
		
		if(isset($new_reply_text)){
			global $wpdb;
            $table2 = 'children';
            $data2 = array(
                'user'=$new_reply_name;
                'text'=$new_reply_text;
                'date'=$new_reply_date;
                'per_code'=$new_reply_code;
				
            );
            $format2 = array(
                '%s','%s','%s','%s'
            );
			$wpdb->insert( $table2, $data2, $format2 );
		}
		header("Location: "); 
	}
	
 ?>