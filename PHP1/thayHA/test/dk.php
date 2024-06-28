<?php
	session_start();
	require_once("../config.php");
	if ($_POST)
	{
		mysqli_set_charset($connect,'utf8');
		$ten=$_POST['name'];
		$day=$_POST['day'];
		$month=$_POST['month'];
		$year=$_POST['year'];
		if ($ten==""||$day==""||$month==""||$year=="")
		{
			echo "false";
			die();
		}
		$ns=$year.'-'.$month.'-'.$day;
		$mahv="HV".chr(rand(48,57)).chr(rand(48,57));
		$sbd="";
		for ($i=1;$i<=8;$i++){
			$sbd.=chr(rand(48,57));
		}
		if (!mysqli_query($connect,"insert into hocvien(mahv,hoten,ngaysinh,diachi,matkhau,sbd)
									values ('$mahv','$ten','$ns','','','$sbd');")){
										echo "false";
										//session_destroy();
									}
									else
									{
										$_SESSION['mem']=$ten;
										$_SESSION['sbd']=$sbd;
										$_SESSION['mahv']=$mahv;
										
									}
		echo mysqli_error($connect);
		echo $_SESSION['mem'];
		
	}
?>