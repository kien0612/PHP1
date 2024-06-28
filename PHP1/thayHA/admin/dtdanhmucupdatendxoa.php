<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_POST['d1'])){
		require("../config.php");
		mysqli_set_charset($connect,"utf8");
		
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d1']=str_replace("'","&#39;",$_POST['d1']);
		
		$h3="select dethisinh.macauhoi FROM dethisinh, cauhoi,bode WHERE bode.mabode=cauhoi.mabode and cauhoi.macauhoi=dethisinh.macauhoi and bode.mabode='".$_POST['d1']."'";
		$h51="DELETE cauhoi FROM cauhoi,bode WHERE bode.mabode=cauhoi.mabode and bode.mabode='".$_POST['d1']."'";
		$h6="delete from bode where mabode='".$_POST['d1']."'";
		/*mysqli_query($connect,$h3) or die(mysqli_error($connect));
		mysqli_query($connect,$h51) or die(mysqli_error($connect));
		mysqli_query($connect,$h6) or die(mysqli_error($connect));*/
		mysqli_query($connect,$h3);
		mysqli_query($connect,$h51);
		mysqli_query($connect,$h6);
		if (mysqli_error($connect)) echo "false"; else echo "true";
	}
?>