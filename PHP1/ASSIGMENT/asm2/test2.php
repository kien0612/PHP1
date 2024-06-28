<?php
if(isset($_POST))
{
	
	$name  = $_POST['name'];
	$email = $_POST['email'];
	$id =    $_POST['id'];
	$to_upload_path = "";
	
	if(isset($_FILES) && !empty($_FILES))
	{
		$filename = $_FILES["profile_pic"]["name"];
		$to_upload_path = "uploads/".$filename;
		if(move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $to_upload_path))
		{
			
		}else{
		$to_upload_path = $_POST['profile_pic_update'];
		}		
	}
	
	$servername = "localhost";
	$database = "fileupload";
	$username = "root";
	$password = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password,$database);

	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

	// write sql query for inserting data into users table.	
	$sql = "update users set  name = '$name', email = '$email' , profile_pic ='$to_upload_path' where id = '$id'";

	if ($conn->query($sql) === TRUE) {
	header("Location:user_list.php?q=update");
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();

} 
?>