<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
?>
<?php
	if ($_POST)
	{
		$sbd=$_POST['sbd'];
		$hodem=$_POST['hodem'];
		$ten=$_POST['ten'];
		$ns=$_POST['ns'];
		$noisinh=$_POST['noisinh'];
		$madonvi=$_POST['madonvi'];
		$tendonvi=$_POST['tendonvi'];
		$tenphongthi=$_POST['phongthi'];
		$makythi=$_SESSION['kythi'];
		$sbd=str_replace("'","&#39;",$sbd);
		$hodem=str_replace("'","&#39;",$hodem);
		$ten=str_replace("'","&#39;",$ten);
		$ns=str_replace("'","&#39;",$ns);
		$noisinh=str_replace("'","&#39;",$noisinh);
		$madonvi=str_replace("'","&#39;",$madonvi);
		$tendonvi=str_replace("'","&#39;",$tendonvi);
		$tenphongthi=str_replace("'","&#39;",$tenphongthi);
		
		$matkhau="N";
		$i=1;
		while ($i<=5) //Tạo mật khẩu gồm 8 kí tự chữ số
		{
			$matkhau.=rand(0,9);
			$i++;
		}
		$tempmk=$matkhau;
		$matkhau=md5($matkhau); //Mã hóa mật khẩu
		require_once("../config.php");
		mysqli_set_charset($connect,"utf8");
		$dv=mysqli_query($connect,"select madonvi,tendonvi from DONVI where madonvi='$madonvi'");
		$sqlts="insert into HOCVIEN (sbd,hodem,ten,ngaysinh,noisinh,makythi,madonvi,tenphongthi,matkhau)
				values ('$sbd','$hodem','$ten','$ns','$noisinh','$makythi','$madonvi','$tenphongthi','$matkhau')";
		if (mysqli_num_rows($dv)>0){
			if (mysqli_query($connect,$sqlts)){
				$_SESSION['ts']=$sbd;
				mysqli_query($connect,"insert into MATKHAU(sbd,matkhau) values ('$sbd','$tempmk')");
				$monthi=mysqli_query($connect,"select mamodun from modun where makythi='$makythi'"); //Lấy danh sách các mô đun
				while ($r=mysqli_fetch_array($monthi)){
					mysqli_query($connect,"insert into allowexam(sbd,mamodun,allow) values ('$sbd','".$r['mamodun']."','C')");
				}
			}
			else echo "false";
		}
		else
		{
			$sqldv="insert into donvi (madonvi,tendonvi)
				values ('$madonvi','$tendonvi')";
			mysqli_query($connect,$sqldv);
			
			if (mysqli_query($connect,$sqlts)){
				$_SESSION['ts']=$sbd;
				mysqli_query($connect,"insert into MATKHAU(sbd,matkhau) values ('$sbd','$tempmk')");
				$monthi=mysqli_query($connect,"select mamodun from modun where makythi='$makythi'"); //Lấy danh sách các mô đun
				while ($r=mysqli_fetch_array($monthi)){
					mysqli_query($connect,"insert into allowexam(sbd,mamodun,allow) values ('$sbd','".$r['mamodun']."','C')");
				}
			}
			else echo "false";
		}
	}
?>