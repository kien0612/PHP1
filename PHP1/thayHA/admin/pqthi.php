<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
?>
<!doctype html>
<html>
<head>
	<style>
		.phanquyen{background:white; border:1px rgb(136,136,136);border-collapse:collapse; padding-top:1em;padding-bottom:1em;color:black; font-size:18px;}
		.dshv{width:100%; padding-top:1em; padding-bottom:1em; background:white; text-align:center; font-size:18px; font-weight:normal;}
		.cltble,.cltble td,.cltble th{border:1px solid rgba(187,187,187,1);}
		.cltble{border-collapse:collapse;width:97%;margin-left:1em;font-size:14px;}
		.cltble td{border-left:none;border-right:none;padding:0.2em 0.3em;}
		.cltble tr:hover{cursor:default;background:rgba(0,102,153,0.1);}
		.cltble th{height:22px;background:#4267b2;color:white;}
		
		.cltble tr:nth-child(even){background-color:white;}
		.cltble tr:nth-child(odd){background-color:#f1f1f1;}
		#sb{width:15em; height:2em; background:rgba(255,153,51,1); margin-top:1.5em; cursor:pointer; color:white; border:none; margin-bottom:1.5em;}
		#li5{
			color:rgba(255,204,0,1);
			font-weight:bolder;
		}
	</style>
    
    <link rel="shortcut icon" href="../image/icon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
    <script>
		$(document).ready(function(e) {
            function lo(){ $("#monthi").change(function(e) {
                var data1=$("#monthi").val();//Lấy dữ liệu trong form
				var data2=$("#hienthi").val();
				//alert(data1+" "+data2);
				$.ajax({
					type:'POST',
					url:'pqthiloadlistwithmodule.php',
					data:{monthi:data1,hienthi:data2},
					success: function(data)
					{
						//alert(data);
						$(".loadds").html(data);
					}
				});
				return false;
            });
			}
			
			lo();
			
			$("#hienthi").change(function(e) {
                var data1=$("#monthi").val();//Lấy dữ liệu trong form
				var data2=$("#hienthi").val();
				//alert(data1+" "+data2);
				$.ajax({
				type:'POST',
				url:'pqthiloadlistwithmodule.php',//gửi dữ liệu sang trang testlogin.php
				data:{monthi:data1,hienthi:data2},
				success: function(data)
				{
					//alert(data);
					$(".loadds").html(data);
				}
				});
				return false;
            });
        });
	</script>
</head>

<body>
	<div class="main">
    	<?php
        	require_once("../config.php");
			mysqli_set_charset($connect,'utf8');
			date_default_timezone_set('Asia/Ho_Chi_Minh');
		?>
        <div class="phanquyen">
        	<p style="float:left;margin:0;margin-left:3em; margin-right:2.8em; font-size:16px;">Chọn môn thi</p>
            <form method="post" id="loaddshv">
            	<select style="width:35%; height:1.6em;" id="monthi" name="monthids" style="margin-top:0.6em;">
            		<option>- - - Chọn môn thi - - -</option>
            	<?php
					$kt=$_SESSION['kythi'];
					$mon=mysqli_query($connect,"select tenmodun from modun,kythi where kythi.makythi=modun.makythi and modun.makythi='$kt'");
					while ($t=mysqli_fetch_array($mon)) echo "<option value='".$t['tenmodun']."'>".$t['tenmodun']."</option>";
				?>
            	</select>
            </form>
            <!--Hiển thị thí sinh được thi hoặc không được thi-->
            <form method="post" id="loadht" style="margin-top:1em;">
            	<span style="margin-left:3em;margin-right:4.78em;font-size:16px;">Hiển thị</span>
                <select style="width:20%; height:1.6em;" id="hienthi" name="hienthids" style="margin-top:0.6em;">
                	<option value="all">- - - Tất cả - - -</option>
                    <option value="T">Được quyền thi</option>
                    <option value="F">Không có quyền thi</option>
                </select>
            </form>
        </div>
        
        <div class="dshv">
        	<p style="margin:0;font-weight:bold;">DANH SÁCH HỌC VIÊN</p>
            <div class="loadds" style="float:left; width:100%;">
            	<!--Show data send to server-->
            </div>
        </div>
    </div>
</body>
</html>