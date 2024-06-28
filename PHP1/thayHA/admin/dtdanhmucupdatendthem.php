<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_POST['d1'])&&isset($_POST['d2'])){
		require("../config.php");
		mysqli_set_charset($connect,"utf8");
		
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d2']=trim($_POST['d2']);
		$_POST['d1']=str_replace("'","&#39;",$_POST['d1']);
		$_POST['d2']=str_replace("'","&#39;",$_POST['d2']);
		
		echo $_POST['d1']."  ".$_POST['d2'];
		if (mysqli_query($connect,"update bode set tenbode='".$_POST['d2']."' where mabode='".$_POST['d1']."'")) echo "true";
			else echo "false";
	}
	else echo "false";
?>