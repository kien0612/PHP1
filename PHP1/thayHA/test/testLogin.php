<?php
	session_start();
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	if ($_POST){
		require_once("../config.php");
		mysqli_set_charset($connect,"utf8");
		if ($_POST['sbd']==""||$_POST['matkhau']==""){
			echo "null"; die();
		}
		else
		{
			$_POST['matkhau']=md5($_POST['matkhau']);
			$data=mysqli_query($connect,"select sbd, hodem, ten, ngaysinh, noisinh, madonvi from HOCVIEN where sbd='".$_POST['sbd']."' and matkhau='".$_POST['matkhau']."'");
			if (mysqli_num_rows($data)>0){
				$r=mysqli_fetch_array($data,MYSQLI_ASSOC);
				mysqli_free_result($data);
				$makythi=mysqli_query($connect,"SELECT kythi.makythi FROM hocvien,kythi where kythi.makythi=hocvien.makythi and hocvien.sbd='".$r['sbd']."'");
				$r1=mysqli_fetch_array($makythi,MYSQLI_ASSOC);
				mysqli_free_result($makythi);
				
				$on=mysqli_query($connect,"SELECT tgbatdau FROM kythi where makythi='".$r1['makythi']."'"); // time now can login
				$off=mysqli_query($connect,"SELECT tgketthuc FROM kythi where makythi='".$r1['makythi']."'"); // time now can'n login
				
				$on_r=mysqli_fetch_array($on,MYSQLI_ASSOC);
				$off_r=mysqli_fetch_array($off,MYSQLI_ASSOC);
				
				mysqli_free_result($on);
				mysqli_free_result($off);
				
				if (strtotime($on_r['tgbatdau'])>time()){
					echo "notstart";
				}
				else if (strtotime($off_r['tgketthuc'])<time()){
					echo "stop";
				}
				else if (strtotime($on_r['tgbatdau'])<=time()&&strtotime($off_r['tgketthuc'])>=time()){
					$_SESSION['sbd']=$r['sbd'];
					$_SESSION['hodem']=$r['hodem'];
					$_SESSION['ten']=$r['ten'];
					$_SESSION['ngaysinh']=$r['ngaysinh'];
					$_SESSION['noisinh']=$r['noisinh'];
					$_SESSION['madonvi']=$r['madonvi'];
					echo "true";
				}
			}
			else echo "false";
		}
	}
	else echo "false";
?>