<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_SESSION['ivamacauhoi'])){
		require_once("../config.php");
		mysqli_set_charset($connect,"utf8");
		$mach=$_SESSION['ivamacauhoi'];
		mb_detect_encoding("utf8");
		if (isset($_FILES['f1'])){
			$dt=mysqli_query($connect,"select imgviauTencauhoi from cauhoi where macauhoi='$mach'");
			$dtt=mysqli_fetch_array($dt);
			$name=$_FILES['f1']['name'];
			if ($dtt['imgviauTencauhoi']==""){
				mysqli_query($connect,"update cauhoi set imgviauTencauhoi='$name' where macauhoi='$mach'");
				$target="../upload/imgcauhoi/".basename($_FILES['f1']['name']);
				move_uploaded_file($_FILES['f1']['tmp_name'],$target);
			}
			else if ($name!=$dtt['imgviauTencauhoi']){
				unlink("../upload/imgcauhoi/".$dtt['imgviauTencauhoi']);
				mysqli_query($connect,"update cauhoi set imgviauTencauhoi='$name' where macauhoi='$mach'");
				$target="../upload/imgcauhoi/".basename($_FILES['f1']['name']);
				move_uploaded_file($_FILES['f1']['tmp_name'],$target);
			}
		}
		if (isset($_FILES['f2'])){
			$dt=mysqli_query($connect,"select imgviauPadung from cauhoi where macauhoi='$mach'");
			$dtt=mysqli_fetch_array($dt);
			$name=$_FILES['f2']['name'];
			if ($dtt['imgviauPadung']==""){
				mysqli_query($connect,"update cauhoi set imgviauPadung='$name' where macauhoi='$mach'");
				$target="../upload/imgdapan/".basename($_FILES['f2']['name']);
				move_uploaded_file($_FILES['f2']['tmp_name'],$target);
			}
			else if ($name!=$dtt['imgviauPadung']){
				unlink("../upload/imgdapan/".$dtt['imgviauPadung']);
				mysqli_query($connect,"update cauhoi set imgviauPadung='$name' where macauhoi='$mach'");
				$target="../upload/imgdapan/".basename($_FILES['f2']['name']);
				move_uploaded_file($_FILES['f2']['tmp_name'],$target);
			}
		}
		if (isset($_FILES['f3'])){
			$dt=mysqli_query($connect,"select imgviauPasai1 from cauhoi where macauhoi='$mach'");
			$dtt=mysqli_fetch_array($dt);
			$name=$_FILES['f3']['name'];
			if ($dtt['imgviauPasai1']==""){
				mysqli_query($connect,"update cauhoi set imgviauPasai1='$name' where macauhoi='$mach'");
				$target="../upload/imgdapan/".basename($_FILES['f3']['name']);
				move_uploaded_file($_FILES['f3']['tmp_name'],$target);
			}
			else if ($name!=$dtt['imgviauPasai1']){
				unlink("../upload/imgdapan/".$dtt['imgviauPasai1']);
				mysqli_query($connect,"update cauhoi set imgviauPasai1='$name' where macauhoi='$mach'");
				$target="../upload/imgdapan/".basename($_FILES['f3']['name']);
				move_uploaded_file($_FILES['f3']['tmp_name'],$target);
			}
		}
		if (isset($_FILES['f4'])){
			$dt=mysqli_query($connect,"select imgviauPasai2 from cauhoi where macauhoi='$mach'");
			$dtt=mysqli_fetch_array($dt);
			$name=$_FILES['f4']['name'];
			if ($dtt['imgviauPasai2']==""){
				mysqli_query($connect,"update cauhoi set imgviauPasai2='$name' where macauhoi='$mach'");
				$target="../upload/imgdapan/".basename($_FILES['f4']['name']);
				move_uploaded_file($_FILES['f4']['tmp_name'],$target);
			}
			else if ($name!=$dtt['imgviauPasai2']){
				unlink("../upload/imgdapan/".$dtt['imgviauPasai2']);
				mysqli_query($connect,"update cauhoi set imgviauPasai2='$name' where macauhoi='$mach'");
				$target="../upload/imgdapan/".basename($_FILES['f4']['name']);
				move_uploaded_file($_FILES['f4']['tmp_name'],$target);
			}
		}
		if (isset($_FILES['f5'])){
			$dt=mysqli_query($connect,"select imgviauPasai3 from cauhoi where macauhoi='$mach'");
			$dtt=mysqli_fetch_array($dt);
			$name=$_FILES['f5']['name'];
			if ($dtt['imgviauPasai3']==""){
				mysqli_query($connect,"update cauhoi set imgviauPasai3='$name' where macauhoi='$mach'");
				$target="../upload/imgdapan/".basename($_FILES['f5']['name']);
				move_uploaded_file($_FILES['f5']['tmp_name'],$target);
			}
			else if ($name!=$dtt['imgviauPasai3']){
				unlink("../upload/imgdapan/".$dtt['imgviauPasai3']);
				mysqli_query($connect,"update cauhoi set imgviauPasai3='$name' where macauhoi='$mach'");
				$target="../upload/imgdapan/".basename($_FILES['f5']['name']);
				move_uploaded_file($_FILES['f5']['tmp_name'],$target);
			}
		}
		unset($_SESSION['ivamacauhoi']);
	}
?>