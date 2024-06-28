<?php session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if ($_POST)
	{
		require_once("../config.php");
		mysqli_set_charset($connect,"utf8");
		$macauhoi=$_POST['macauhoi'];
		$tencauhoi=$_POST['tencauhoi'];
		$padung=$_POST['padung'];
		$pasai1=$_POST['pasai1'];
		$pasai2=$_POST['pasai2'];
		$pasai3=$_POST['pasai3'];
		$tl=$_POST['tl'];
		$macauhoi=str_replace("'","&#39;",$macauhoi);
		$tencauhoi=str_replace("'","&#39;",$tencauhoi);
		$padung=str_replace("'","&#39;",$padung);
		$pasai1=str_replace("'","&#39;",$pasai1);
		$pasai2=str_replace("'","&#39;",$pasai2);
		$pasai3=str_replace("'","&#39;",$pasai3);
		$tl=str_replace("'","&#39;",$tl);
		if (isset($_SESSION['mapthi'])) $mapthi=$_SESSION['mapthi']; else die();
		$sqlts="insert into CAUHOI (macauhoi,tencauhoi,padung,pasai1,pasai2,pasai3,mucdo,mabode)
				values ('$macauhoi','$tencauhoi','$padung','$pasai1','$pasai2','$pasai3','$tl','$mapthi')";
		if (!mysqli_query($connect,$sqlts)){echo "false";} else $_SESSION['ivamacauhoi']=$macauhoi;
	}
	
?>