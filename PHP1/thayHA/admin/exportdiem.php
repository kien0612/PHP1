<?php session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Điểm thi</title>
    <link rel="shortcut icon" href="../image/icon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="../js/jquery-3.1.1.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
    <style>
		.CPThi{background:white;color:black; padding:1em 0; padding-bottom:0;font-size:18px;}#li6{color:rgba(255,204,0,1);font-weight:bolder;}
	</style>
    <script>
		$(document).ready(function(e) {
			 $("#PThi").change(function(e) {
                data=$("#layphongthi").serialize();//Lấy dữ liệu trong form
				$.ajax({
				type:'POST',
				url:'danhsachdiemthi.php',
				data:data,
				success: function(data)
				{
					//alert(data);
					$(".diemphongthi").html(data);
				}
				});
				return false;
            });
		});
	</script> 
</head>

<body>
	<?php
    	require_once("../config.php");
		mysqli_set_charset($connect,'utf8');
	?>
    <div class="CPThi">
    	<form method="post" id="layphongthi">
        	<span style="margin-left:2em;">Danh sách phòng thi</span>
        	<select style="width:50%; height:1.6em;" id="PThi" name="PThi" style="margin-top:1em; margin-left:0.7em;">
            	<option value="">---Chọn phòng thi---</option>
            	<?php
					$data=mysqli_query($connect,"select DISTINCT tenphongthi from HOCVIEN where makythi='".$_SESSION['kythi']."'");
					while ($t=mysqli_fetch_array($data)) echo "<option value='".$t['tenphongthi']."'>".$t['tenphongthi']."</option>";
				?>
            </select>
        </form>
   	</div>
        
    <div class="diemphongthi">
    	<!--Load danh sách điểm của phòng thi vào đây.-->
    </div>
</body>
</html>