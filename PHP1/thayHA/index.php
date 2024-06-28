<?php
	date_default_timezone_set('Asia/Ho_Chi_Minh');
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="shortcut icon" href="image/icon.png" type="image/x-icon">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="style/index.css" type="text/css">
    <link rel="stylesheet" href="style/monthi.css" type="text/css">
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/index.js"></script>
</head>

<body>
	<div class="back_out">
    	<!--show background black-->
    </div>
	<div class="back_over">
    	<!--show background status image gif-->
    </div>
	<div class="main">
    	<div class="banner">
        	<!--Background image-->
        </div>
        
   		<div id="loadajax" style="width:100%; height:auto;"> 
        <!--Load ajax-->
        	<div class="bod"> <p>ĐĂNG NHẬP HỆ THỐNG THI TRẮC NGHIỆM TRỰC TUYẾN</p> </div>
        	<form id="sigup" method="POST" style="width:100%; text-align:center; display:block; margin:auto;">
        		<fieldset style="border:none; padding-top:2em;">
            		<span style="margin-left:0.6em; font-size:14px;"><strong>Số báo danh</strong></span>
                	<input type="text" value="" name="sbd" style="width:20%; margin-bottom:1em; height:auto;margin-left:1.8em;font-weight: normal;display: inline-block;padding: 4px;font-size: 13px; line-height: 18px; color: #555555; background-color: #ffffff; border: 1px solid #cccccc; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;" autofocus><br>
					<span style="margin-left:0.6em; font-size:14px;"><strong>Mật khẩu</strong></span>
                	<input type="password" value="" name="matkhau" style="width:20%; height:auto;margin-left:3.65em;font-weight: normal;display: inline-block;padding: 4px;font-size: 13px;line-height: 18px;color: #555555; background-color: #ffffff; border: 1px solid #cccccc; -webkit-border-radius: 3px;
    -moz-border-radius: 3px; border-radius: 3px;"><br>
                	<?php if (date("Y")<=2107) echo "<button type='submit' name='submit1' id='xacnhan'>Đăng nhập</button>"; ?>
                    <button type="reset" class="reset">Nhập lại</button>
            	</fieldset>
        	</form>
    	</div>
    </div>
</body>
</html>