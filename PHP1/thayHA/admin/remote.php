<!doctype html>
<html>
<head>
	<meta charset="utf-8">
   <!-- <meta http-equiv="refresh" content="120">-->
	<link rel="shortcut icon" href="../image/icon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="../style/remote.css" type="text/css">
    <script src="../js/jquery-3.1.1.js"></script>
</head>
<body>
	<div class="maine">
        <div class="p22">
        	<p>TRẠNG THÁI THI</p>
        </div>
        <div class="p33">
        	<?php
				session_start();
				require_once("../config.php");
				mysqli_set_charset($connect,"utf8");
				$ql=mysqli_query($connect,"select remote.sbd as sbd, remote.ipaddress as ip, remote.estatus as tinhtrang, hocvien.hodem as hodem, hocvien.ten as ten, modun.tenmodun as monthi, diem.thoigianthi as bd, diem.thoigianketthuc as kt from remote, hocvien, diem, modun,kythi where kythi.makythi=modun.makythi and modun.mamodun=remote.mamodun and diem.mamodun=remote.mamodun and diem.sbd=remote.sbd and diem.sbd=hocvien.sbd and kythi.makythi='".$_SESSION['kythi']."'");
				echo "<table class='tb1' border=0>";
					echo "<tr style='font-size:14px; background:#4267b2;color:white;'>";
						echo "<td>STT</td>";
						echo "<td>Địa chỉ máy</td>";
						echo "<td>SBD</td>";
						echo "<td>Họ và tên</td>";
						echo "<td>Môn thi</td>";
						echo "<td>Bắt đầu thi</td>";
						echo "<td>Kết thúc</td>";
						echo "<td>Tình trạng</td>";
					echo "</tr>";
				$i=1;
				while ($sql=mysqli_fetch_array($ql)){
					
					if ($sql['tinhtrang']=="Đang thi"){
						echo "<tr style='background:palegoldenrod;color:red;'>";
							echo "<td>$i</td>";
							echo "<td>".$sql['ip']."</td>";
							echo "<td>".$sql['sbd']."</td>";
							echo "<td>".$sql['hodem']." ".$sql['ten']."</td>";
							echo "<td>".$sql['monthi']."</td>";
							echo "<td>".$sql['bd']."</td>";
							echo "<td>".$sql['kt']."</td>";
							echo "<td>".$sql['tinhtrang']."</td>";
						echo "</tr>";
					}
					else{
						echo "<tr style='background:#4CAF50;color:white;'>";
							echo "<td>$i</td>";
							echo "<td>".$sql['ip']."</td>";
							echo "<td>".$sql['sbd']."</td>";
							echo "<td>".$sql['hodem']." ".$sql['ten']."</td>";
							echo "<td>".$sql['monthi']."</td>";
							echo "<td>".$sql['bd']."</td>";
							echo "<td>".$sql['kt']."</td>";
							echo "<td>".$sql['tinhtrang']."</td>";
						echo "</tr>";
					}
					$i++;
				}
				echo "</table>";
			?>
        </div>
    </div>
</body>
</html>