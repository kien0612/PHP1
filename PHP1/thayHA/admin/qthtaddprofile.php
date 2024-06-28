<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	require_once("../config.php");
	mysqli_set_charset($connect,"utf8");
	if (isset($_SESSION['ts'])&&isset($_FILES['profile'])){
		$dt=mysqli_query($connect,"select profile from hocvien where sbd='".$_SESSION['ts']."'");
		$dtt=mysqli_fetch_array($dt);
		$name=$_FILES['profile']['name'];
		if ($dtt['profile']==""){
			mysqli_query($connect,"update hocvien set profile='$name' where sbd='".$_SESSION['ts']."'");
			$target="../upload/imgthisinh/".basename($_FILES['profile']['name']);
			move_uploaded_file($_FILES['profile']['tmp_name'],$target);
		}
		else if ($name!=$dtt['profile']){
			unlink("../upload/imgthisinh/".$dtt['profile']);
			mysqli_query($connect,"update hocvien set profile='$name' where sbd='".$_SESSION['ts']."'");
			$target="../upload/imgthisinh/".basename($_FILES['profile']['name']);
			move_uploaded_file($_FILES['profile']['tmp_name'],$target);
		}
	}
?>