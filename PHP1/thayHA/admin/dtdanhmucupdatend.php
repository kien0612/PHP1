<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_POST['d1'])&&isset($_POST['d2'])&&isset($_POST['d3'])){
		require("../config.php");
		mysqli_set_charset($connect,"utf8");
		
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d2']=trim($_POST['d2']);
		$_POST['d3']=trim($_POST['d3']);
		$_POST['d1']=str_replace("'","&#39;",$_POST['d1']);
		$_POST['d2']=str_replace("'","&#39;",$_POST['d2']);
		$_POST['d3']=str_replace("'","&#39;",$_POST['d3']);
		
		$dt=mysqli_query($connect,"select mamodun from modun where tenmodun='".$_POST['d3']."'");
		$dtt=mysqli_fetch_array($dt);
		if (mysqli_query($connect,"insert into bode(mabode,tenbode,mamodun)
			values('".$_POST['d1']."','".$_POST['d2']."','".$dtt['mamodun']."')")) echo "true"; else echo "false";
	}
?>