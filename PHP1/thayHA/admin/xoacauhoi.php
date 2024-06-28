<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	require_once("../config.php");
	mysqli_set_charset($connect,"utf8");
	if ($_POST)
	{
		$macauhoi=$_POST['macauhoi'];
		//echo $macauhoi;
		$macauhoi=str_replace("'","&#39;",$macauhoi);
		$sqldethisinh="DELETE FROM dethisinh WHERE macauhoi = '$macauhoi'";
		mysqli_query($connect,$sqldethisinh);
		$sql="DELETE FROM cauhoi WHERE macauhoi='$macauhoi'";
		if (mysqli_query($connect,$sql)) echo "true"; else echo "false";
	}
?>