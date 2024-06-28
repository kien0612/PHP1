<?php
	session_start();
	if ($_POST['d']){
		require("../config.php");
		mysqli_set_charset($connect,"utf8");
		$kthi=mysqli_query($connect,"SELECT makythi,tenkythi, DATE_FORMAT(tgbatdau,'%H:%s:%i ngày %d/%m/%Y') as tgbatdau, DATE_FORMAT(tgketthuc,'%H:%s:%i ngày %d/%m/%Y') as tgketthuc FROM kythi where tenkythi='".$_POST['d']."'");
		$kthi1=mysqli_fetch_array($kthi);
		$_SESSION['kythi']=$kthi1['makythi'];
		$_SESSION['tenkythi']=$kthi1['tenkythi'];
		$_SESSION['tgbatdaukythi']=$kthi1['tgbatdau'];
		$_SESSION['tgketthuckythi']=$kthi1['tgketthuc'];
		echo "<p style='background:#4267b2; margin:0; padding: 0.7em 1em; color:white;'>THÔNG TIN KỲ THI</p>";
		echo "<p style='margin-left:1em;'>Tên kỳ thi: <span style='color:blue;line-height:1.3em;'>".$kthi1['tenkythi']."</span></p>";
		echo "<p style='margin-left:1em;'>Mã kỳ thi: <span style='color:blue;line-height:1.3em;'>".$kthi1['makythi']."</span></p>";
		echo "<p style='margin-left:1em;'>Thời gian bắt đầu: <span style='color:blue; line-height:1.3em;'>".$kthi1['tgbatdau']."</span></p>";
		echo "<p style='margin-left:1em;'>Thời gian kết thúc: <span style='color:blue; line-height:1.3em;'>".$kthi1['tgketthuc']."</span></p>";
	}
?>