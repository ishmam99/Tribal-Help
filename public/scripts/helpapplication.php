<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		$application_type = $_POST['application_type'];
		$service_type = $_POST['service_type'];
		$item_name = $_POST['item_name'];
		
		$user_type = $_POST['user_type'];
		$user_id = $_POST['user_id'];
		
		$applicant_name = $_POST['applicant_name'];
		$father_name = $_POST['father_name'];
		$mother_name = $_POST['mother_name'];
		$address = $_POST['address'];
		$mobile = $_POST['mobile'];
		$email = $_POST['email'];
		$applicant_comment = $_POST['applicant_comment'];
		$application_date = date("Y-m-d");
		
		require_once('dbConnect.php');


		$sql = "INSERT INTO helprequests(`application_type`, `service_type`, `item_name`, `user_type`, `user_id`, `applicant_name`, `father_name`, `mother_name`, `address`, `mobile`, `email`, `applicant_comment`,`application_date`) VALUES ('$application_type','$service_type','$item_name','$user_type','$user_id','$applicant_name','$father_name','$mother_name','$address','$mobile','$email','$applicant_comment','$application_date')";

		
		
		if(mysqli_query($con,$sql)){
			echo "Successfully Submitted!";
		}else{
			echo "Could not submit";

		}
	}else{
echo 'error';
}