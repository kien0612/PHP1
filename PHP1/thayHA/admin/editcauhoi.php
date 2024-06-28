<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	require_once("../config.php");
	mysqli_set_charset($connect,"utf8");
	if ($_POST)
	{
		$macauhoi=$_POST['macauhoi'];
		$tencauhoi=$_POST['tencauhoi'];
		$padung=$_POST['padung'];
		$pasai1=$_POST['pasai1'];
		$pasai2=$_POST['pasai2'];
		$pasai3=$_POST['pasai3'];
		$mucdo=$_POST['tl'];
		$macauhoi=str_replace("'","&#39;",$macauhoi);
		$tencauhoi=str_replace("'","&#39;",$tencauhoi);
		$padung=str_replace("'","&#39;",$padung);
		$pasai1=str_replace("'","&#39;",$pasai1);
		$pasai2=str_replace("'","&#39;",$pasai2);
		$pasai3=str_replace("'","&#39;",$pasai3);
		$mucdo=str_replace("'","&#39;",$mucdo);
		$sqlts="update cauhoi set tencauhoi='$tencauhoi',padung='$padung',pasai1='$pasai1',pasai2='$pasai2',pasai3='$pasai3',mucdo='$mucdo' where macauhoi='$macauhoi'";
		if (mysqli_query($connect,$sqlts)) {echo "true";$_SESSION['ivamacauhoi']=$macauhoi;} else echo "false";
	}
?>