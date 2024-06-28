<?php
	session_start();
	require("config.php");
	mysqli_set_charset($connect,"utf8");
	if (isset($_POST['id'])&&isset($_POST['name']))
	{
		$data=$_POST['id'];
		$name=$_POST['name'];
		$beg=substr($name,0,3);
		$temp=substr($name,3); if (strlen($temp)==1) $temp="0".$temp;
		$beg=$beg." ".$temp;
		$subdata=substr($data,0,1);
		$sbd=$_SESSION['sbd'];
		$sql="update dethisinh set temp='$subdata' where (sbd='$sbd') and (mamodun='".$_SESSION['modunid']."') and (socau='$beg')";
		mysqli_query($connect,$sql);
	}
?>