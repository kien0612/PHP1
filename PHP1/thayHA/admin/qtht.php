<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
?>
	<style>
		#update{width:90%;margin:auto;display:block; margin-top:2em;padding-bottom:1em;}
		.over{position:fixed;display:none; background:rgba(0,0,0,0.8); width:100%; height:100%;}
		.show{width:23%; height:7em; position:fixed; display:block; margin:auto; margin-top:8em; margin-left:3em; background:rgba(255,255,255,0.7);}
		.csbd{margin-top:0.5em;}
		input{height:1.5em;width:80%;display:block;margin:auto;margin-bottom:0;margin-top:0.5em;padding:0 0.5em;}
		#li1{
			color:rgba(255,204,0,1);
			font-weight:bolder;
		}
		span{margin:0;}
	</style>
    
    <script src="../js/jquery-3.1.1.js"></script>
    <script>
		$(document).ready(function(e){
			$(".loadphong").load("qthtloadphong.php");

			$("#phong").change(function(e){
                var data=$("#loaddshvphong").serialize();//Lấy dữ liệu trong form
				$.ajax({
				type:'POST',
				url:'laydanhsachhvtheokythi.php',
				data:data,
				success: function(data){
					$(".loaddshv").html(data);
					//alert(data);
				}
				});
				return false;
            });
			$("#refresh").click(function(e) {
                $("input[id='sbd']").val("");
				$("input[id='sbd']").focus();
				$("input[id='hodem']").val("");
				$("input[id='ten']").val("");
				$("input[id='ns']").val("");
				$("input[id='madonvi']").val("");
				$("input[id='tendonvi']").val("");
				$("input[id='phongthi']").val("");
            });
			$("#add").click(function(e) {
                var a,b,c,d,e,f;
				a=$("input[id='sbd']").val();
				b=$("input[id='hodem']").val();
				c=$("input[id='ten']").val();
				d=$("input[id='ns']").val();
				e=$("input[id='madonvi']").val();
				f=$("input[id='tendonvi']").val();
				g=$("input[id='phongthi']").val();
				if (a===""||b===""||c===""||d===""||e===""||f===""||g==="") alert("Bạn cần nhập đủ thông tin!");
				else
				{
					var data=$("#update").serialize();
					$.ajax({
						type:'POST',
						url:'tsxthisinh.php',
						data:data,
						success: function(data)
						{
							//alert(data);
							if (data=="false") alert("Học viên đã tồn tại, lưu ý mã học viên không được trùng nhau");
							else {
								var ajax=new XMLHttpRequest();
								var dat=new FormData();
								function g(){
									
									dat.append("profile",document.querySelector("#pictureprofile").files[0]);
									
									ajax.onreadystatechange=function(e){
										if (ajax.status==200 && ajax.readyState==4){
											//alert(ajax.responseText);
										}
									}
									ajax.open("POST","qthtaddprofile.php");
									ajax.send(dat);
								}
								g();
								alert("Thêm học viên thành công");
								$(".loadchinh").load("qtht.php");
							}
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
				g=$("input[id='phongthi']").val();
				if (a===""||b===""||c===""||d===""||e===""||f===""||g==="") alert("Bạn cần nhập đủ thông tin!");
				else
				{
					var data=$("#update").serialize();
					$.ajax({
						type:'POST',
						url:'editthisinh.php',
						data:data,
						success: function(data)
						{
							//alert(data);
							if (data=="true"){
								var ajax=new XMLHttpRequest();
								var dat=new FormData();
								function g(){
									
									dat.append("profile",document.querySelector("#pictureprofile").files[0]);
									
									ajax.onreadystatechange=function(e){
										if (ajax.status==200 && ajax.readyState==4){
											//alert(ajax.responseText);
										}
									}
									ajax.open("POST","qthtaddprofile.php");
									ajax.send(dat);
								}
								g();
								alert("Cập nhật thành công");
								$(".loadchinh").load("qtht.php");
							}
							else alert("Không thể cập nhật, lưu ý: bạn không được thay đổi số báo danh và mã đơn vị của thí");
						}
					});
				}
            });
			
			$("#delete").click(function(e) {
                var id=$("input[id='sbd']").val();
				if (id!==null)
				{
					var data=$("#update").serialize();
					$.ajax({
						type:'post',
						url: 'xoathisinh.php',
						data: data,
						success: function(data)
						{
							if (data==='true'){
								alert("Xóa thí sinh thành công!");
								$(".loadchinh").load("qtht.php");
							}
							else alert("Thí sinh không tồn tại!");
						}
					});
				}
            });
			
			var key=false;
			$("*").keydown(function(e) {
                if (e.keyCode==67) key=true;
            }).keyup(function(e) {
                if (e.keyCode==67) key=false;
            }).keydown(function(e) {
                if (key)
				{
					if (e.keyCode==65) 
					{
						$("body").css("overflow","hidden");
						$(".over").css("display","block");
					}
				}
            });
			
			$("#sexit").click(function(e) {
                $("body").css("overflow","visible");
				$(".over").css("display","none");
				$("#search").val("");
            });
			
			$("#Sb").click(function(e){
				var data=$("#search").val();
				$.ajax({
					type: 'post',
					url: 'sbdtemp.php',
					data: {id:data},
					success: function(data){
						if (data=="true") alert("Thí sinh có trong danh sách thi"); else alert("Thí sinh này không tồn tại");
					}
				});
			});
        });
	</script>

<body>
	<div class="over">
    	<div class="show">
        	<span style="margin-left:1.4em;">Tìm kiếm thí sinh</span>
			<input type="text" name="search" id="search" placeholder="Gõ mã thí sinh cần tìm" style="height:1.5em;">
            <input type="submit" name="SB" id="Sb" value="Tìm kiếm">
            <input type="submit" name="sexit" id="sexit" value="Thoát">
		</div>
    </div>
	<?php
        require_once("../config.php");
		mysqli_set_charset($connect,'utf8');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	?>
	<div class="emain">
    	<div class="phanquyen" style="margin-top:2em;">
            <div class="loadphong">
            </div>
        </div>
        <div class="htdanhsach">
    <div class="dshv">
    	<p style="font-weight:bold; margin-left:3em;">DANH SÁCH THÍ SINH</p>
        	<a href="listps.php" style="margin-left:3em;">Tải mật khẩu các thí sinh trong phòng</a>
            <div class="loaddshv">
            </div>
        </div>
        <div class="chitiet">
        	<form name="update" id="update" method="post">
            	<div class="csbd"><span>Số báo danh</span><input type="text" name="sbd" id="sbd" value="" autofocus></div>
                <div class="csbd"><span>Họ, tên đệm</span><input type="text" name="hodem" id="hodem" value=""></div>
                <div class="csbd"><span>Tên học viên</span><input type="text" name="ten" id="ten" value=""></div>
                <div class="csbd"><span>Ngày sinh</span><input type="text" name="ns" id="ns" value=""></div>
                <div class="csbd"><span>Nơi sinh</span><input type="text" name="noisinh" id="noisinh" value=""></div>
                <div class="csbd"><span>Mã đơn vị</span><input type="text" name="madonvi" id="madonvi" value=""></div>
                <div class="csbd"><span>Tên đơn vị</span><input type="text" name="tendonvi" id="tendonvi" value=""></div>
                <div class="csbd"><span>Tên phòng thi</span><input type="text" name="phongthi" id="phongthi" value=""></div>
                <hr>
                <p style="color:blue;">Ảnh đại diện</p>
                <input type="file" name="pictureprofile" id="pictureprofile" value="" title="Thêm ảnh đại diện của thí sinh" style="background:blue;cursor:pointer;border-radius:1px;width:30%;height:1.8em;color:white;z-index:1000;opacity:0;">
                <p style="background:rgba(100%,40%,20%,1);cursor:pointer;border-radius:1px;width:31.5%;height:1.8em;color:white;display:block;margin:auto;margin-top:-1.8em; text-align:center;">Chọn ảnh đại diện từ máy tính (*.ipg,*.png)</p>
            </form>
            <div class="add">
            	<img id="add" src="../image/add.png" width="40" height="40" title="Thêm học viên mới" style="margin-left:4em;margin-top:1em; cursor:pointer;">
                <img id="edit" src="../image/edit.ico" width="40" height="40" title="Sửa thông tin học viên" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                <img id="delete" src="../image/delete.png" width="43" height="40" title="Xóa học viên" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                <a href=""><img id="refresh" src="../image/refresh-icon.png" width="43" height="40" title="Refresh" style="margin-left:1em;margin-top:1em; cursor:pointer;"></a>
            </div>
            
        </div>
    </div>
    </div>
</body>