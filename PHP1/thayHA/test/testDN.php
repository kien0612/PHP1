<?php

	session_start();
	require_once("../config.php");
	if ($_POST)
	{
		mysqli_set_charset($connect,'utf8');
		$tk=$_POST['taikhoan'];
		$matkhau=$_POST['matkhau'];
		
		if ($tk==""||$matkhau=="")
		{
			echo "false";
			die();
		}
		$matkhau=md5($matkhau);
		//echo $tk."<br>";
		//echo $matkhau."<br>";
		$data=mysqli_query($connect,"SELECT maadmin, matkhau FROM admin where maadmin='$tk' and matkhau='$matkhau'");
		if (mysqli_num_rows($data)>0){
			$r=mysqli_fetch_array($data);
		$_SESSION['admin']=$r['maadmin'];
		$_SESSION['admin']='admin';
		}else echo "false"; 
	} 
?>