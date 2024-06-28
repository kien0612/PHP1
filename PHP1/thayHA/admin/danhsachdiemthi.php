<meta charset="utf-8">

<?php
	session_start();
	include("../config.php");
	mysqli_set_charset($connect,'utf8');
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>"; //về trang đăng nhập admin nếu chưa đăng nhập
	if ($_POST)
	{
		if (isset($_POST['PThi'])) $tenphong=$_POST['PThi']; else die();
		$_SESSION['tenphong']=$tenphong;
	}
	else echo mysqli_error($connect);
?>

<style>	
	.tabt1,.tabt1 td,.tabt1 th{border:1px solid rgba(187,187,187,1);}
	.tabt1{border-collapse:collapse;width:98%;font-size:14px; display:block; margin:auto;}
	.tabt1 tr:hover{cursor:default;background:rgba(0,102,153,0.1);}
	.tabt1 th{height:22px;background:#4267b2;color:white;}
	.tabt1 tr:nth-child(even){background-color:white;}
	.tabt1 tr:nth-child(odd){background-color:#f1f1f1;}
	.tabt1 td,.tabt1 th{padding: 0.2em 0.3em;}
	
	.download{
		background:rgba(204,204,204,0.5);
		font-size:18px;
		text-decoration:none;
		text-align:center;
		width:10%;
		margin-left:0.56em;
	}
	.download a{
		text-decoration:none;
		color:rgba(204,51,51,1);
	}
	.download:hover{
		cursor:pointer;
	}
</style>

<p style="margin-left:2.2em; font-size:16px;"><b>Danh sách điểm thi phòng:&nbsp;</b><span style="color:rgba(255,51,0,0.7); font-size:19px;"> <?php echo $_POST['PThi']; ?></span></p>
	
<table id="danhsachdiem" class="tabt1" border="1">
	<tr style="color:white; margin-bottom:2em; background:rgba(0,204,0,1);">
    	<th style='width:3%;'>STT</th>
    	<th style='width:5%;'>SBD</th>
        <th style='width:13%;'>Tên đệm</th>
        <th style='width:7%;'>Tên</th>
        <th style='width:11%;'>Nơi sinh</th>
        <th style='width:9%;'>Ngày sinh</th>
        <th style='width:10%;'>Môn thi</th>
        <th style='width:5%;'>Số câu đúng</th>
        <th style='width:5%;'>Điểm</th>
        <th style='width:15%;'>Bắt đầu</th>
        <th style='width:15%;'>Kết thúc</th>
    </tr>
    
<?php
	$s1=mysqli_query($connect,"select hocvien.sbd as sbd, hocvien.hodem as hodem, hocvien.ten as ten, hocvien.noisinh as noisinh, hocvien.ngaysinh as ngaysinh from hocvien,kythi where kythi.makythi=hocvien.makythi and hocvien.tenphongthi='$tenphong' and kythi.makythi='".$_SESSION['kythi']."' order by sbd"); //Lấy danh sách
	//$ds1=mysqli_fetch_array($s1);
	
	$i=1;
	while ($r=mysqli_fetch_array($s1)) //hocvien.sbd as 'sbd', hocvien.hodem as 'hodem', hocvien.ten as 'ten', hocvien.ngaysinh as 'ngaysinh', diem.socaudung as 'socaudung', diem.diem as 'diem', diem.thoigianthi as 'thoigianthi'
	{
		$s2=mysqli_query($connect,"select sbd, diem.mamodun as mamodun, diem, socaudung, thoigianthi, thoigianketthuc,modun.tenmodun as tenmodun from diem,modun where modun.mamodun=diem.mamodun and sbd='".$r['sbd']."' order by sbd,diem.mamodun"); //Lấy điểm thi
		if (mysqli_num_rows($s2)>0){
			while ($ds2=mysqli_fetch_array($s2)){
				echo "<tr>";
				echo "
					<td>".$i."</td>
					<td>".$r['sbd']."</td>
					<td>".$r['hodem']."</td>
					<td>".$r['ten']."</td>
					<td>".$r['noisinh']."</td>
					<td>".$r['ngaysinh']."</td>
					<td>".$ds2['tenmodun']."</td>
					<td>".$ds2['socaudung']."</td>
					<td>".$ds2['diem']."</td>
					<td>".$ds2['thoigianthi']."</td>
					<td>".$ds2['thoigianketthuc']."</td>
					";
				echo "</tr>";
				$i++;
			}
		}
		else{
			echo "<tr>";
			echo "
				<td>".$i."</td>
				<td>".$r['sbd']."</td>
				<td>".$r['hodem']."</td>
				<td>".$r['ten']."</td>
				<td>".$r['noisinh']."</td>
				<td>".$r['ngaysinh']."</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				";
			echo "</tr>";
			$i++;
		}
	}
?>
</table>
<div class="download">
	<a href="exportPDF.php">Tải danh sách</a>
</div>