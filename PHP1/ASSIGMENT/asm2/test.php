<?php
// file name update_profile.php
if(isset($_GET['id']) && $_GET['id'] > 0)
{ 
// database connection, to get user data along with images
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
	
	$userId = $_GET['id'];
	// write sql query for inserting data into users table.	
	$sql = "SELECT * FROM users where id = '$userId'";
	$exe_query = $conn->query($sql);
	$result = $exe_query->fetch_assoc()
	
?>
<!DOCTYPE html>
<html>
<head><title>Update User Profile</title></head>
<body>
<form action="update.php" method="post" enctype="multipart/form-data">

  Name  : <input required="required" value="<?php echo $result['name'];?>" type="text" name="name" id="name"><br/>
  Email :   <input required="required"  value="<?php echo $result['email'];?>" type="text" name="email" id="email"><br/>
  
  Profile Picture:  <input  type="file" name="profile_pic" id="profile_pic"> <br/>
	<img  height="50" src="<?php echo $result['profile_pic'];?>">
	<input type="hidden" name="profile_pic_update" value="<?php echo $result['profile_pic'];?>">
	<input type="hidden" name="id" value="<?php echo $result['id'];?>">	
  <br/>
	
  <input type="submit" value="Update" name="submit">
</form>

</body>
</html>

<?php }?>