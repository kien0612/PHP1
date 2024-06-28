<?php
	session_start();
	require_once("../config.php");
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_POST['id']))
	{
		foreach ($_POST['id'] as  $id) //Đánh dấu những thí sinh được thi những môn đã chọn
		{
			$tempId=array();
			$tempId=explode(",",$id);
			$sbd=$tempId[0];$mamon=$tempId[1];
			//echo $id."  ".$sbd."   ".$mamon;
			$sql="update allowexam set allow='C' where sbd='$sbd' and mamodun='$mamon'";
			mysqli_query($connect,$sql) or die(mysqli_error($connect));
		}
		
	}
	if (isset($_POST['ud']))
	{
		//Đánh dấu những thí sinh không được thi môn đã chọn
		foreach ($_POST['ud'] as  $ud)
		{
			$tempUd=array();
			$tempUd=explode(",",$ud);
			$sbd=$tempUd[0];$mamon=$tempUd[1];
			//echo $ud."  ".$sbd."   ".$mamon;
			$sql="update allowexam set allow='K' where sbd='$sbd' and mamodun='$mamon'";
			mysqli_query($connect,$sql) or die(mysqli_error($connect));
		}
	}
?>