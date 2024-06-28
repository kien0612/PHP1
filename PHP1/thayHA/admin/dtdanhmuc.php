<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
?>

<!doctype html>
<html>
<head>
    <link rel="shortcut icon" href="../image/icon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../style/dtdanhmuc.css" type="text/css">
    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/dtdanhmuc.js"></script>
    <style>
		#li3{color:rgba(255,204,0,1);font-weight:bolder}
	</style>
</head>

<body>
	<?php
    	require_once("../config.php");
		mysqli_set_charset($connect,'utf8');
		$d=mysqli_query($connect,"select * from kythi");
	?>
	<div class="htdanhsach">
        <div class="chitiet">
        	<p style="color:blue; margin-left:2em; font-weight:bold;">DANH MỤC KỲ THI</p>
    		<table class="ttb1">
            	<tr style="background:#4267b2;color:white;">
                	<th>Mã kỳ thi</th>
                    <th>Tên kỳ thi</th>
                    <th>Thời gian bắt đầu</th>
                    <th>Thời gian kết thúc</th>
                </tr>
                <?php
					while ($r=mysqli_fetch_array($d))
					{
						echo "<tr>";
						echo "<td style='text-align:left; padding:0.5em 1em;'>
							".$r['makythi']."
						</td>
						";
						echo "<td style='text-align:left; padding:0.5em 1em;'>
							".$r['tenkythi']."
						</td>
						";
						echo "<td style='text-align:left; padding:0.5em 1em;'>
							".$r['tgbatdau']."
						</td>
						";
						echo "<td style='text-align:left; padding:0.5em 1em;'>
							".$r['tgketthuc']."
						</td>
						";
						echo "</tr>";
					}
				?>
            </table>
            
            <div class="thaotac">
        	<form method="post" id="suamodun">
            	<span style="margin-left:1em; margin-bottom:1em;">Mã kỳ thi</span>
      			<input style="margin-left:5em; margin-bottom:1em;width:30em;" type='text' name='mkt' id='mkt' value='' autofocus><br>
                <span style="margin-left:1em; margin-bottom:1em;">Tên kỳ thi</span>
            	<input style="margin-left:4.75em; margin-bottom:1em;width:30em;" type='text' name='tenkt' id='tenkt' value=''><br>
                <span style="margin-left:1em; margin-bottom:1em;">Thời gian bắt đầu</span>
            	<input style="margin-left:1.2em; margin-bottom:1em;width:30em;" type='text' name='tgbd' id='tgbd' value=''><br>
                <span style="margin-left:1em; margin-bottom:1em;">Thời gian kết thúc</span>
            	<input style="margin-left:0.9em; margin-bottom:1em;width:30em;" type='text' name='tgkt' id='tgkt' value=''>
            </form>
            	<img id="add" src="../image/add.png" width="33" height="33" title="Thêm mới" style="margin-left:4em;margin-top:1em; cursor:pointer;">
                <img id="edit" src="../image/edit.ico" width="33" height="33" title="Sửa" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                <img id="delete" src="../image/delete.png" width="33" height="33" title="Xóa" style="margin-left:1em;margin-top:1em; cursor:pointer;">
       		</div>
            
            <hr>
            <p style="color:blue; margin-left:2em;font-weight:bold;">DANH MỤC MÔN THI</p>
    		<table class="ttb2">
            	<tr style="background:#4267b2;color:white;">
                	<th>Mã môn thi</th>
                    <th>Tên môn thi</th>
                    <th>Bắt đầu</th>
                    <th>Kết thúc</th>
                </tr>
                <?php
					$h=mysqli_query($connect,"select mamodun,tenmodun,tenkythi,batdau,ketthuc from modun,kythi where kythi.makythi=modun.makythi and kythi.makythi='".$_SESSION['kythi']."'");
					while ($r=mysqli_fetch_array($h))
					{
						echo "<tr>";
						echo "<td style='text-align:left; padding:0.5em 1em;'>
							".$r['mamodun']."
						</td>
						";
						echo "<td style='text-align:left; padding:0.5em 1em;'>
							".$r['tenmodun']."
						</td>
						";
						echo "<td style='text-align:left; padding:0.5em 1em;'>
							".$r['batdau']."
						</td>
						";
						echo "<td style='text-align:left; padding:0.5em 1em;'>
							".$r['ketthuc']."
						</td>
						";
						echo "</tr>";
					}
				?>
            </table>
            
            <div class="thaotac">
        	<form method="post" id="suamodun">
            	<span style="margin-left:1em; margin-bottom:1em;">Mã môn thi</span>
      			<input style="margin-left:1em; margin-bottom:1em;width:30em;" type='text' name='mmt' id='mmt' value='' autofocus><br>
                <span style="margin-left:1em; margin-bottom:1em;">Tên môn thi</span>
            	<input style="margin-left:0.8em; margin-bottom:1em;width:30em;" type='text' name='tenmt' id='tenmt' value=''><br>
                <span style="margin-left:1em; margin-bottom:1em;">Bắt đầu</span>
            	<input style="margin-left:2.9em; margin-bottom:1em;width:30em;" type='text' name='tkt' id='tkt' value=''><br>
                <span style="margin-left:1em; margin-bottom:1em;">Kết thúc</span>
            	<input style="margin-left:2.5em; margin-bottom:1em;width:30em;" type='text' name='tkt2' id='tkt2' value=''>
            </form>
            	<img id="add1" src="../image/add.png" width="33" height="33" title="Thêm mới" style="margin-left:4em;margin-top:1em; cursor:pointer;">
                <img id="edit1" src="../image/edit.ico" width="33" height="33" title="Sửa" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                <img id="delete1" src="../image/delete.png" width="33" height="33" title="Xóa" style="margin-left:1em;margin-top:1em; cursor:pointer;">
       		</div>
            
            
            <hr>
            <p style="color:blue; margin-left:2em;font-weight:bold;">DANH MỤC NỘI DUNG THI</p>
            
            <style>
				.table12,.table12 td,.table12 th{border:1px solid rgba(187,187,187,1);}
				.table12{border-collapse:collapse;width:97%;margin-left:1em; font-size:14px;}
				.table12 td{border-left:none;border-right:none;}
				.table12 tr:hover{cursor:default;background:rgba(0,102,153,0.1);}
				.table12 th{height:22px;}
				.table12 tr:nth-child(even){background-color:white;}
				.table12 tr:nth-child(odd){background-color:#f1f1f1;}
			</style>
            
    		<table class="table12">
            	<tr style="background:#4267b2;color:white;">
                	<th>Mã nội dung</th>
                    <th>Tên nội dung</th>
                     <th>Môn thi</th>
                    <th>Kỳ thi</th>
                </tr>
                <?php
					$h=mysqli_query($connect,"select bode.mabode as mabode, bode.tenbode as tenbode,modun.tenmodun as tenmodun,kythi.tenkythi as tenkythi from modun,kythi,bode where kythi.makythi=modun.makythi and modun.mamodun=bode.mamodun and kythi.makythi='".$_SESSION['kythi']."'");
					while ($r=mysqli_fetch_array($h))
					{
						echo "<tr>";
						echo "<td style='text-align:left; padding:0.5em 1em;'>
							".$r['mabode']."
						</td>
						";
						echo "<td style='text-align:left; padding:0.5em 1em;'>
							".$r['tenbode']."
						</td>
						";
						echo "<td style='text-align:left; padding:0.5em 1em;'>
							".$r['tenmodun']."
						</td>
						";
						echo "<td style='text-align:left; padding:0.5em 1em;'>
							".$r['tenkythi']."
						</td>
						";
						echo "</tr>";
					}
				?>
            </table>
            
            <div class="thaotac">
        	<form method="post" id="suamodun">
            	<span style="margin-left:1em; margin-bottom:1em;">Mã nội dung thi</span>
      			<input style="margin-left:1em; margin-bottom:1em;width:30em;" type='text' name='mmt1' id='mmt1' value='' autofocus><br>
                <span style="margin-left:1em; margin-bottom:1em;">Tên nội dung thi</span>
            	<input style="margin-left:0.75em; margin-bottom:1em;width:30em;" type='text' name='tenmt1' id='tenmt1' value=''><br>
                <span style="margin-left:1em; margin-bottom:1em;">Tên môn thi</span>
            	<input style="margin-left:2.83em; margin-bottom:1em;width:30em;" type='text' name='tkt1' id='tkt1' value=''>
            </form>
            	<img id="add2" src="../image/add.png" width="33" height="33" title="Thêm mới" style="margin-left:4em;margin-top:1em; cursor:pointer;">
                <img id="edit2" src="../image/edit.ico" width="33" height="33" title="Sửa" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                <img id="delete2" src="../image/delete.png" width="33" height="33" title="Xóa" style="margin-left:1em;margin-top:1em; cursor:pointer;">
       		</div>
            
            
        </div>
        
    </div>
</body>
</html>