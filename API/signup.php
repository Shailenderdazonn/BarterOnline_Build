<?php 

	header('Access-Control-Allow-Origin: *');
	
	$conn = new mysqli("localhost","root","","barter_db");
	
	if(mysqli_connect_error()){
		echo mysqli_connect_error();
		exit();
	}
	
	else{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$mobile = $_POST['mobile'];
		$address = $_POST['address'];
		$province = $_POST['province'];
		$zip = $_POST['zip'];
				
		$sql = "INSERT INTO user_detail(name,email,password,mobile,address,province,zip) VALUES('$name','$email','$password','$mobile','$address','$province','$zip');";
		$res = mysqli_query($conn, $sql);
		
		if($res){
			echo "The account has been created successfully! Please Login";

		}
		else{
			echo "Error!";
		}
		$conn->close();
	}

?>
