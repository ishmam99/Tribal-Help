<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$complain_description = $_POST['complain_description'];
		$complain_phone_email = $_POST['complain_phone_email'];
		$complain_name = $_POST['complain_name'];
		
		require_once('dbConnect.php');
		//INSERT INTO `complain_tbl`(`id`, `complain_description`, `complain_phone_email`, `date_time`, `status`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
/*		$sql = "INSERT INTO user_complain (complain_type, user_name, user_email, user_phone, complain_description) VALUES ('$complain_type', '$user_name', '$user_email', '$user_phone', '$user_complain')";*/

		$sql = "INSERT INTO complain_tbl(complain_name,complain_description, complain_phone_email) VALUES ('$complain_name','$complain_description','$complain_phone_email')";

		
		
		if(mysqli_query($con,$sql)){
			echo "Successfully Submitted!";
		}else{
			echo "Could not submit";

		}
	}else{
echo 'error';
}