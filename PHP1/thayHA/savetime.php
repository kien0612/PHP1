<?php
	session_start();
	require("config.php");
	//mysqli_set_charset($connect,"utf8");
	if (isset($_POST['time']))
	{
		mysqli_query($connect,"update diem set timeconlai='".$_POST['time']."' where (sbd='".$_SESSION['sbd']."') and (mamodun='".$_SESSION['modunid']."')");
		mysqli_close($connect);
	}
?>