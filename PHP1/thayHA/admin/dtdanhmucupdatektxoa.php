<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_POST['d1'])){
		require("../config.php");
		mysqli_set_charset($connect,"utf8");
		$_POST['d1']=trim($_POST['d1']);
		$_POST['d1']=str_replace("'","&#39;",$_POST['d1']);
		$h00="DELETE remote FROM remote, modun, kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = modun.makythi AND modun.mamodun = remote.mamodun";
		
		$h0="DELETE thoigianthi FROM thoigianthi, modun, kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = modun.makythi AND modun.mamodun = thoigianthi.mamodun";
		
		$h1="DELETE allowexam FROM allowexam, modun, kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = modun.makythi AND modun.mamodun = allowexam.mamodun";
		
		$h2="DELETE diem FROM diem, modun, kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = modun.makythi AND modun.mamodun = diem.mamodun";
		
		$h3="DELETE dethisinh FROM dethisinh,modun,kythi,cauhoi,bode WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = modun.makythi AND modun.mamodun = bode.mamodun and bode.mabode=cauhoi.mabode and cauhoi.macauhoi=dethisinh.macauhoi";
		
		$h4="DELETE dethiprofile FROM dethiprofile, modun, kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = modun.makythi AND modun.mamodun = dethiprofile.mamodun";
		
		$h5="DELETE bode FROM bode,modun,kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = modun.makythi AND modun.mamodun = bode.mamodun";
		
		$h52="DELETE cauhoi FROM cauhoi,modun,bode,kythi WHERE kythi.makythi='".$_POST['d1']."' AND kythi.makythi = modun.makythi AND modun.mamodun=bode.mamodun and bode.mabode=cauhoi.mabode";
		
		$h51="DELETE matkhau FROM matkhau, hocvien, kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = hocvien.makythi AND hocvien.sbd = matkhau.sbd";
		
		$h7="DELETE hocvien FROM hocvien, kythi WHERE kythi.makythi = '".$_POST['d1']."' AND kythi.makythi = hocvien.makythi";
		
		$h6="delete from modun where makythi='".$_POST['d1']."'";
		
		$h8="delete from kythi where makythi='".$_POST['d1']."'";
		
		mysqli_query($connect,$h00);
		mysqli_query($connect,$h0);
		mysqli_query($connect,$h1);
		mysqli_query($connect,$h2);
		mysqli_query($connect,$h3);
		mysqli_query($connect,$h4);
		mysqli_query($connect,$h51);
		mysqli_query($connect,$h5);
		mysqli_query($connect,$h52);
		mysqli_query($connect,$h7);
		mysqli_query($connect,$h6);		
		mysqli_query($connect,$h8);
		
		if (mysqli_error($connect)) echo "false"; else echo "true";
	}
?>