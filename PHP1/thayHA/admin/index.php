<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="shortcut icon" href="../image/icon.png" type="image/x-icon">
    <script src="../js/jquery-3.1.1.js"></script>
    <title>Đăng nhập admin</title>
    <style>
		body{margin:0;background:rgba(170,170,170,0.3);} .main{margin:auto;display:block;background:white;width:73.2%;padding-top:0.27em;padding-bottom:0.8em;
font-family: Arial,Helvetica,sans-serif;} .banner{background-image:url(../image/bn.png); background-repeat:no-repeat;background-size:cover;width:99%;height:10em;display:block;margin:auto;} .ttdk{width:79%;height:2.8em;border-bottom:3px solid #99cbff;margin-left:0.4em;} .ttdktext{color: #0051a0;font-family: Arial,Helvetica,sans-serif; font-size: 16px;font-weight: bold;width:30%;float:left;margin-top:1.2em;} #xacnhan{height:30px;width:127px;background:rgba(255,51,0,0.6); border:none;border-radius:2px;color:white;font-weight:bold;padding:4px 8px;cursor:pointer;margin-left:9.2em;margin-top:1em;} #spankothanhcong{color:red;padding:0 0.5em;font-size:13px;display:none;} .bod{background:rgba(0,153,51,1); text-align:center; margin-top:0.4em; margin-left:0.18em; width:70%; height:5em; float:left; color:white; font-size:30px;}
	</style>
    <script>
		$(document).ready(function(e)
		{	
			$("#xacnhan").click(function(e) {
            	var data=$("#sigup").serialize();//Lấy dữ liệu trong form
				//alert(data);
					$.ajax({
					type:'POST',
					url:'../test/testDN.php',
					data:data,
					success: function(e)
					{
						if (e=='false') $("#spankothanhcong").show();
						else window.location="default.php";
					}
					});
					return false;
			});
        });
		</script>
</head>

<body>
	<div class="main">
    	<div class="banner">
        	<!--Background image-->
        </div>
        
   <div id="loadajax" style="width:100%; height:auto;"> 
        <!--Load ajax-->
        <div class="bod">
        	<p style="margin-top:1.9em;">QUẢN TRỊ HỆ THỐNG</p>
        </div>
        
        <form id="sigup" method="POST">
        	<fieldset style="border:none; padding-top:2em;">
            	<span style="margin-left:0.6em; font-size:14px;"><strong>Tài khoản</strong></span>
                <input type="text" value="" name="taikhoan" style="width:44%; margin-bottom:1em; height:auto;margin-left:3.2em;font-weight: normal;display: inline-block;padding: 4px;font-size: 13px; line-height: 18px; color: #555555; background-color: #ffffff; border: 1px solid #cccccc; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px;"><br>
				<span style="margin-left:0.6em; font-size:14px;"><strong>Mật khẩu</strong></span>
                <input type="password" value="" name="matkhau" style="width:44%; height:auto;margin-left:3.6em;font-weight: normal;display: inline-block;padding: 4px;font-size: 13px;line-height: 18px;color: #555555; background-color: #ffffff; border: 1px solid #cccccc; -webkit-border-radius: 3px;
    -moz-border-radius: 3px; border-radius: 3px;"><br>
                <button type="submit" name="submit1" id="xacnhan">Đăng nhập</button>
                <span id="spankothanhcong">Tài khoản không tồn tại</span>
            </fieldset>
        </form>
    </div>
    </div>
</body>
</html>