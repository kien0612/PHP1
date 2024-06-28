<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Danh sách học viên</title>
    <link rel="shortcut icon" href="../image/icon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="../js/jquery-3.1.1.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
    
    <style>
		body{background:white;margin:0;} #li2{color:rgba(255,204,0,1);} .htdanhsach{width:100%;} .dshv{width:68%;margin-right:0.5em;height:inherit;background:white;box-shadow:1px 1px 4px rgba(0,0,0,0.5);padding:2em 0;float:right;text-align:center;padding-top:4em;} table,td,th{border:1px solid rgba(187,187,187,1);
} table{border-collapse:collapse;width:97%;margin-left:1em;} td{border-left:none;border-right:none;text-align:center;} tr:hover{cursor:default;background:rgba(187,187,187,0.6);} th{height:50px;} .chitiet{background:white;width:30%;float:left;height:38.2em;box-shadow:1px 1px 4px rgba(0,0,0,0.5);margin-left:0.5em;
margin-top:2.85em;position:fixed;} .csbd{margin-top:0.5em;} input{height:1.5em;width:80%;display:block;margin:auto;margin-bottom:0;margin-top:0.5em;padding:0 0.5em;} span{margin:0;font-weight:bold;} #update{width:90%;margin:auto;display:block;}
	</style>
    
    <script>
		$(document).ready(function(e) {
            $("tr").click(function(e) {
				$("input[id='sbd']").val($(this).children("td:eq(0)").text());
				$("input[id='hodem']").val($(this).children("td:eq(1)").text());
				$("input[id='ten']").val($(this).children("td:eq(2)").text());
				$("input[id='ns']").val($(this).children("td:eq(3)").text());
				$("input[id='madonvi']").val($(this).children("td:eq(4)").text());
				$("input[id='tendonvi']").val($(this).children("td:eq(5)").text());
            });
			$("#refresh").click(function(e) {
                $("input[id='sbd']").val("");
				$("input[id='sbd']").focus();
				$("input[id='hodem']").val("");
				$("input[id='ten']").val("");
				$("input[id='ns']").val("");
				$("input[id='madonvi']").val("");
				$("input[id='tendonvi']").val("");
            });
			$("#add").click(function(e) {
                var a,b,c,d,e,f;
				a=$("input[id='sbd']").val();
				b=$("input[id='hodem']").val();
				c=$("input[id='ten']").val();
				d=$("input[id='ns']").val();
				e=$("input[id='madonvi']").val();
				f=$("input[id='tendonvi']").val();
				g=$("input[id='matkhau']").val();
				if (a===""||b===""||c===""||d===""||e===""||f==="") alert("Bạn cần nhập đủ thông tin!");
				else
				{
					var data=$("#update").serialize();
					$.ajax({
						type:'POST',
						url:'tsxthisinh.php',//gửi dữ liệu sang trang testlogin.php
						data:data,
						success: function(data)
						{
							if (data=="true") alert("Thêm học viên thành công");
							else alert("Học viên đã tồn tại, lưu ý mã học viên không được trùng nhau");
						}
					});
				}
            });
			$("#edit").click(function(e) {
				var a,b,c,d,e,f;
				a=$("input[id='sbd']").val();
				b=$("input[id='hodem']").val();
				c=$("input[id='ten']").val();
				d=$("input[id='ns']").val();
				e=$("input[id='madonvi']").val();
				f=$("input[id='tendonvi']").val();
				g=$("input[id='matkhau']").val();
				if (a===""||b===""||c===""||d===""||e===""||f==="") alert("Bạn cần nhập đủ thông tin!");
				else
				{
					var data=$("#update").serialize();
					$.ajax({
						type:'POST',
						url:'editthisinh.php',//gửi dữ liệu sang trang testlogin.php
						data:data,
						success: function(data)
						{
							if (data=="true")alert("Thông tin học viên đã được thay đổi");
							else alert("Không thành công, kiểm tra lại thông tin cần sửa");
						}
					});
				}
            });
			$("#delete").click(function(e) {
					var data=$("#update").serialize();
					$.ajax({
						type:'POST',
						url:'xoathisinh.php',//gửi dữ liệu sang trang testlogin.php
						data:data,
						success: function(data)
						{
							alert("Xóa học viên thành công");
						}
					});
            });
        });
		
	</script>
</head>

<body>
	<?php
    	require_once("menu.php");require_once("../config.php");
		mysqli_set_charset($connect,'utf8');
		$dshvthi=mysqli_query($connect,"select thisinh.sbd as 'sbd', hodem, ten, thisinh.ngaysinh as ns, thisinh.madonvi as 'madonvi', donvi.tendonvi as 'donvi' from thisinh,donvi where thisinh.madonvi=donvi.madonvi order by sbd");
	?>
<div class="htdanhsach">
    <div class="dshv">
    	<p style="font-weight:bold;">DANH SÁCH TẤT CẢ HỌC VIÊN</p>
            <table>
            	<tr style="color:rgba(255,153,0,1);">
                	<th>SBD</th>
                    <th>Họ và tên đệm</th>
                    <th>Tên học viên</th>
                    <th>Ngày sinh</th>
                    <th>Mã nhóm đơn vị</th>
                    <th>Tên đơn vị</th>
                </tr>
                
                <?php
					while ($arr=mysqli_fetch_array($dshvthi))
					{
						$html="<tr id='t'>";
						$html.="<td>".$arr['sbd']."</td>";
						$html.="<td>".$arr['hodem']."</td>";
						$html.="<td>".$arr['ten']."</td>";
						$html.="<td>".$arr['ns']."</td>";
						$html.="<td>".$arr['madonvi']."</td>";
						$html.="<td>".$arr['donvi']."</td>";
						$html.="<tr>";
						echo $html;
					}
                ?>
                
            </table>
        </div>
        <div class="chitiet">
        	<form name="update" id="update" method="post">
            	<div class="csbd"><span>Số báo danh</span><input type="text" name="sbd" id="sbd" value="" autofocus></div>
                <div class="csbd"><span>Họ, tên đệm</span><input type="text" name="hodem" id="hodem" value=""></div>
                <div class="csbd"><span>Tên học viên</span><input type="text" name="ten" id="ten" value=""></div>
                <div class="csbd"><span>Ngày sinh</span><input type="text" name="ns" id="ns" value=""></div>
                <div class="csbd"><span>Mã đơn vị</span><input type="text" name="madonvi" id="madonvi" value=""></div>
                <div class="csbd"><span>Đơn vị</span><input type="text" name="tendonvi" id="tendonvi" value=""></div>
                <div class="csbd"><span>Mật khẩu</span><input type="password" name="matkhau" id="matkhau" value="" placeholder="Thêm học viên mới bạn cần nhập mật khẩu"></div>
            </form>
            <div class="add">
            	<img id="add" src="../image/add.png" width="40" height="40" title="Thêm học viên mới" style="margin-left:4em;margin-top:1em; cursor:pointer;">
                <img id="edit" src="../image/edit.ico" width="40" height="40" title="Sửa thông tin học viên" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                <img id="delete" src="../image/delete.png" width="43" height="40" title="Xóa học viên" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                <a href=""><img id="refresh" src="../image/refresh-icon.png" width="43" height="40" title="Refresh" style="margin-left:1em;margin-top:1em; cursor:pointer;"></a>
            </div>
            <p style="color:blue; margin-left:3.1em;">Thêm danh sách học viên bằng file excel</p>
        	<form id="upload" method="post" enctype="multipart/form-data">
    			<input type="file" id="uploads" name="upf" title="Chọn file excel">
                <input type="submit" name="clickup" id="Submit" value="Tải lên" title="Nhấn để tải lên">
    		</form>
            <?php
				if (isset($_POST['clickup']))
				{
					if (isset($_FILES['upf']))
					{
						$fname=$_FILES['upf']['tmp_name'];
						include("PHPExcel/IOFactory.php");
						///$html="<table border='1'>";
						$objectPHPExcel=PHPExcel_IOFactory::load($fname);
						foreach ($objectPHPExcel->getWorksheetIterator() as $worksheet)
						{
							$highestrow=$worksheet->getHighestRow();
							for ($row=2;$row<=$highestrow;$row++)
							{
								$sbd=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(0,$row)->getValue());
								$mkhau=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(1,$row)->getValue());
								$hodem=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(2,$row)->getValue());
								$ten=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(3,$row)->getValue());
								$ngaysinh=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(4,$row)->getValue());
								$madv=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(5,$row)->getValue());
								$tendv=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(6,$row)->getValue());
								$mkhau=md5($mkhau);
								$dv=mysqli_query($connect,"select madonvi,tendonvi from donvi where madonvi='$madv'");
								$sqlts="insert into thisinh (sbd,matkhau,hodem,ten,ngaysinh,madonvi)
								values ('$sbd','$mkhau','$hodem','$ten','$ngaysinh','$madv')";
								if (mysqli_num_rows($dv)>0){
									if (mysqli_query($connect,$sqlts))
									{
										$monthi=mysqli_query($connect,"select mamodun from modun"); //Lấy danh sách các mô đun
										while ($r=mysqli_fetch_array($monthi))
										{
											if (!mysqli_query($connect,"insert into chophepthi(sbd,mamodun,chothi) values ('$sbd','".$r['mamodun']."','C')")) echo mysqli_error($connect);
										}
									}
								}
								else
								{
									$sqldv="insert into donvi (madonvi,tendonvi)
										values ('$madv','$tendv')";
									if (mysqli_query($connect,$sqldv)&&mysqli_query($connect,$sqlts))
									{
										$monthi=mysqli_query($connect,"select mamodun from modun"); //Lấy danh sách các mô đun
										while ($r=mysqli_fetch_array($monthi))
										{
											if (!mysqli_query($connect,"insert into chophepthi(sbd,mamodun,chothi) values ('$sbd','".$r['mamodun']."','C')")) echo mysqli_error($connect);
										}
									}
								}
							}
						}
					}
				}
			?>
        </div>
    </div>
</body>
</html>