<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_POST['id']))
	{
		$sbd=$_POST['id'];
		require_once("../config.php");
		mysqli_set_charset($connect,"utf8");
		$sql="select sbd from hocvien where sbd='$sbd'";
		$dat=mysqli_query($connect,$sql);
		if (mysqli_num_rows($dat)>0){
			echo "true";
			mysqli_query($connect,"insert into tblhocvien(sbd) values ('$sbd')");
		}
		else echo "false";
	}
	
?>