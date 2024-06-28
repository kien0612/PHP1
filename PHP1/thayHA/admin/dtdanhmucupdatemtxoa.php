<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_POST['d1'])){
		require("../config.php");
		mysqli_set_charset($connect,"utf8");
		
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d1']=str_replace("'","&#39;",$_POST['d1']);
		
		$h00="DELETE remote FROM remote, modun WHERE modun.mamodun=remote.mamodun and remote.mamodun = '".$_POST['d1']."'";
		$h0="DELETE thoigianthi FROM thoigianthi, modun WHERE modun.mamodun=thoigianthi.mamodun and thoigianthi.mamodun = '".$_POST['d1']."'";
		$h1="DELETE allowexam FROM allowexam, modun WHERE modun.mamodun=allowexam.mamodun and allowexam.mamodun = '".$_POST['d1']."'";
		$h2="DELETE diem FROM diem, modun WHERE modun.mamodun=diem.mamodun and diem.mamodun = '".$_POST['d1']."'";
		$h3="DELETE dethisinh FROM dethisinh,modun,cauhoi WHERE modun.mamodun=dethisinh.mamodun and dethisinh.mamodun = '".$_POST['d1']."'";
		$h4="DELETE dethiprofile FROM dethiprofile, modun WHERE modun.mamodun=dethiprofile.mamodun and dethiprofile.mamodun = '".$_POST['d1']."'";
		$h5="DELETE bode FROM bode, modun WHERE modun.mamodun=bode.mamodun and bode.mamodun = '".$_POST['d1']."'";
		$h51="DELETE cauhoi FROM cauhoi, modun, bode WHERE modun.mamodun = '".$_POST['d1']."' AND modun.mamodun = bode.mamodun AND bode.mabode = cauhoi.mabode";
		//$h7="DELETE hocvien FROM hocvien, kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = hocvien.makythi";
		$h6="delete from modun where mamodun='".$_POST['d1']."'";
		//$h8="delete from kythi where makythi='".$_POST['d1']."'";
		mysqli_query($connect,$h51);
		mysqli_query($connect,$h2);
		mysqli_query($connect,$h5);
		mysqli_query($connect,$h1);
		mysqli_query($connect,$h00);
		mysqli_query($connect,$h3);
		mysqli_query($connect,$h4);
		mysqli_query($connect,$h0);
		mysqli_query($connect,$h6);
		if (mysqli_error($connect)) echo "false"; else echo "true";
	}
?>