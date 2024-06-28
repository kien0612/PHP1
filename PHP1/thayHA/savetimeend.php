<?php
	session_start();
	if (isset($_POST['time'])&&isset($_POST['tg'])){
		date_default_timezone_set("Asia/Ho_Chi_Minh");
		$k=$_POST['tg'];
		$tend=date("Y-m-d H:i:s",$k);
		$_SESSION['tgth']=($_SESSION['time12']*60)-$_POST['time'];
		require_once("config.php");
		mysqli_set_charset($connect,"utf8");
		mysqli_query($connect,"update diem set timeconlai='0', thoigianketthuc='$tend' where (sbd='".$_SESSION['sbd']."') and (mamodun='".$_SESSION['modunid']."')");
		mysqli_query($connect,"update remote set estatus='Đã thi xong' where (sbd='".$_SESSION['sbd']."') and (mamodun='".$_SESSION['modunid']."')");
		mysqli_close($connect);
	}
?>