<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if ($_POST)
	{
		require_once("../config.php");
		mysqli_set_charset($connect,"utf8");
		$sbd=$_POST['sbd'];
		str_replace("'","&#39;",$sbd);
		$remote="delete from remote where sbd='$sbd'";
		$sqlallowexam="delete from allowexam where sbd='$sbd'";
		$sqlmk="delete from matkhau where sbd='$sbd'";
		$sqldiem="delete from diem where sbd='$sbd'";
		$sqldets="delete from dethisinh where sbd='$sbd'";
		$sqlts="delete from hocvien where sbd='$sbd' and makythi='".$_SESSION['kythi']."'";
		if (mysqli_query($connect,$remote)&&mysqli_query($connect,$sqlallowexam)&&mysqli_query($connect,$sqlmk)&&mysqli_query($connect,$sqldiem)&&mysqli_query($connect,$sqldets)&&mysqli_query($connect,$sqlts)) echo "true"; else echo "false";
	}
?>