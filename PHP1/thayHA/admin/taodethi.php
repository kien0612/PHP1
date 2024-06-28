<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
?>
<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/jquery.wallform.js"></script>
    <style>
		#li9{color:rgba(255,204,0,1); font-weight:bolder;}
		.pp1{background:rgba(221,221,221,1);width:100%; height:2em;}
		.pp2{display:block;margin:auto;border-left:1px solid rgba(153,153,153,0.5);padding:1em 0em;border-right:1px solid rgba(153,153,153,0.5);border-bottom:1px solid rgba(153,153,153,0.5);overflow:auto;}
		.csbd{margin-top:0.2em;}
		
		.tabley,.tabley td,.tabley th{border:1px solid rgba(187,187,187,1); padding: 0.2em 0.3em;}
		.tabley{border-collapse:collapse;width:97%;font-size:14px; display:block; margin:auto;}
		.tabley tr:hover{cursor:default;background:rgba(0,102,153,0.1);}
		.tabley th{height:22px;background:#4267b2;color:white;}
		
		.tabley tr:nth-child(even){background-color:white;}
		.tabley tr:nth-child(odd){background-color:#f1f1f1;}
		
		span{margin:0;}
		#update{width:97.2%;margin:auto;display:block;margin-top:0.5em;}
		.addByExcel{display:block;margin:auto;float:left;width:60%;height:10em;text-align:center; margin-left:1em;}
		#tencauhoi,#padung,#pasai1,#pasai2,#pasai3{width:98%; height:1.5em;margin: 0.5em 0; padding:0em 0.7em;}
		#macauhoi,#tl{width:10%;height:1.5em;margin: 0.5em 0;padding:0em 0.7em;} #file1,#file2, #file3,#file4,#file5{background:blue;margin-bottom:1em;width:30%;height:1.8em;opacity:0;cursor:pointer;}
	</style>
    <script>
		$(document).ready(function(e) {
			/* $("#kythi").change(function(e) {
                data=$("#loaddshv").serialize();//Lấy dữ liệu trong form
				$.ajax({
				type:'POST',
				url:'laymodun.php',
				data:data,
				success: function(data)
				{
					//alert(data);
					$(".loada").html(data);
				}
				});
				return false;
            });*/
			
			$("#idanhmuc").change(function(e) {
				data=$("#tkch").serialize();//Lấy dữ liệu trong form
				$.ajax({
				type:'POST',
				url:'laykhode.php',
				data:data,
				success: function(data)
				{
					//alert(data);
					$(".loadb").html(data);
				}
				});
				return false;
			});
			
			$("#refresh").click(function(e) {
                $("input[id='macauhoi']").val("");
				$("input[id='macauhoi']").focus();
				$("input[id='tencauhoi']").val("");
				$("input[id='daA']").val("");
				$("input[id='daB']").val("");
				$("input[id='daC']").val("");
				$("input[id='daD']").val("");
				$("input[id='tl']").val("");
            });
			$("#add").click(function(e) {
                var a,b,c,d,e,f;
				a=$("input[id='macauhoi']").val();
				b=$("input[id='tencauhoi']").val();
				c=$("input[id='padung']").val();
				d=$("input[id='pasai1']").val();
				e=$("input[id='pasai2']").val();
				f=$("input[id='pasai3']").val();
				g=$("input[id='tl']").val();
				if (a===""||b===""||c===""||d===""||e===""||f==="") alert("Bạn cần nhập đủ thông tin!");
				else
				{
					var data=$("#update").serialize();
					$.ajax({
						type:'POST',
						url:'themcauhoi.php',
						data:data,
						success: function(data)
						{
							//alert(data);
							if (data=="false") alert("Câu hỏi đã tồn tại, lưu ý mã câu hỏi không trùng nhau");
							else {
								alert("Thêm câu hỏi thành công");
								var ajax=new XMLHttpRequest();
								var dat=new FormData();
								function g(){
									
									dat.append("f1",document.querySelector("#file1").files[0]);
									dat.append("f2",document.querySelector("#file2").files[0]);
									dat.append("f3",document.querySelector("#file3").files[0]);
									dat.append("f4",document.querySelector("#file4").files[0]);
									dat.append("f5",document.querySelector("#file5").files[0]);
									
									ajax.onreadystatechange=function(e){
										if (ajax.status==200 && ajax.readyState==4){
											//alert(ajax.responseText);
										}
									}
									ajax.open("POST","taodethiaddiva.php");
									ajax.send(dat);
								}
								g();
								$(".loadchinh").load("taodethi.php");
							}
						}
					});
				}
				
            });
			
			$("#edit").click(function(e) {
                var a,b,c,d,e,f;
				a=$("input[id='macauhoi']").val();
				b=$("input[id='tencauhoi']").val();
				c=$("input[id='padung']").val();
				d=$("input[id='pasai1']").val();
				e=$("input[id='pasai2']").val();
				f=$("input[id='pasai3']").val();
				g=$("input[id='tl']").val(); //mức độ khó dễ trung bình
				if (a===""||b===""||c===""||d===""||e===""||f==="") alert("Bạn cần nhập đủ thông tin!");
				else
				{
					var data=$("#update").serialize();
					$.ajax({
						type:'POST',
						url:'editcauhoi.php',
						data:data,
						success: function(data)
						{
							//alert(data);
							if (data=="true")
							{
								alert("Đã sửa");
								var ajax=new XMLHttpRequest();
								var dat=new FormData();
								function g(){
									
									dat.append("f1",document.querySelector("#file1").files[0]);
									dat.append("f2",document.querySelector("#file2").files[0]);
									dat.append("f3",document.querySelector("#file3").files[0]);
									dat.append("f4",document.querySelector("#file4").files[0]);
									dat.append("f5",document.querySelector("#file5").files[0]);
									
									ajax.onreadystatechange=function(e){
										if (ajax.status==200 && ajax.readyState==4){
											//alert(ajax.responseText);
										}
									}
									ajax.open("POST","taodethiaddiva.php");
									ajax.send(dat);
								}
								g();
								$(".loadchinh").load("taodethi.php");
							}
							else alert("Lỗi");
						}
					});
				}
				
            });
			
			$("#delete").click(function(e) {
                var a=$("input[id='macauhoi']").val();
				if (a!==""){
					var data=$("#update").serialize();
					$.ajax({
						type:'POST',
						url:'xoacauhoi.php',
						data: data,
						success: function(data){
							if (data=='true'){
								alert('Đã xóa câu hỏi');
								$(".loadchinh").load("taodethi.php");
							}else alert("Câu hỏi không tồn tại");
						}
					});
				}
            });
		});
        
	</script>
</head>

<body>
	<?php
    	require_once("../config.php");
		mysqli_set_charset($connect,'utf8');
	?>
    <div class="tttk">
    	<div class="pp1">
        	<!--<img src="../image/write.png" width="40" height="40.5" style="float:left; background:rgba(187,187,187,1);">-->
            <p style="margin-left:3em;margin-top:0.5em;font-size:17px;color:blue;font-weight:bold;">Thông tin tìm kiếm</p>
        </div>
        <div class="pp2">
        	<form name="tkch" id="tkch" method="post">
            <span style="margin-left:2em;">Danh mục môn thi</span>
                <select name="danhmuc" id="idanhmuc" style="margin-top:0em; width:30%;height:2em; margin-left:1em;">
                <option>--Chọn môn thi--</option>
                <?php
					$dsmodun=mysqli_query($connect,"select mamodun,tenmodun from MODUN where makythi='".$_SESSION['kythi']."'");
                    while ($row=mysqli_fetch_array($dsmodun)){
                        $html="<option value='".$row['mamodun']."'>".$row['mamodun']."</option>";
                        echo $html;
                    }
                ?>
                </select>
            </form>
            <div class="loada">
            	
        	</div>
            <div class="loadb">
            	
        	</div>
        </div>
    </div>
    
    <div class="kqtk">
    	<div class="pp1" style="padding:0;">
        	<!--<img src="../image/write.png" width="40" height="40.5" style="float:left; background:rgba(187,187,187,1);">-->
            <p style="margin-left:3em;margin-top:0.5em;font-size:17px;color:blue;font-weight:bold;">Kết quả tìm kiếm</p>
        </div>
        <div class="pp2" id="loadndch">
        </div>
    </div>
    <div class="chititet">
    	<div class="pp1" style="padding:0;">
        	<!--<img src="../image/write.png" width="40" height="40.5" style="float:left; background:rgba(187,187,187,1);">-->
            <p style="margin-left:3em;margin-top:0.5em;font-size:17px;color:blue;font-weight:bold;">Xử lý câu hỏi</p>
        </div>
        <div class="sua" style="padding-bottom:2em;width:100%; float:left;">
                <form name="update" id="update" method="POST" enctype="multipart/form-data">
                    <div class="csbd">
                    	<span>Mã câu hỏi</span>
                        <br>
                        <input type="text" name="macauhoi" id="macauhoi" value="" autofocus>
                    </div>
                    <div class="csbd">
                    	<span>Tên câu hỏi</span>
                        <br>
                        <input type="text" name="tencauhoi" id="tencauhoi" value="">
                        <input type="file" name="file1" id="file1" title="Chọn file ảnh, audio, hoặc video">
                        <p style="background:rgba(100%,40%,20%,1);cursor:pointer;border-radius:1px;width:30%;height:1.8em;color:white;margin-top:-2.4em; z-index:1;">Thêm hình ảnh, âm thanh hoặc video</p>
                    </div>
                    <div class="csbd">
                    	<span>Phương án đúng</span>
                        <br>
                        <input type="text" name="padung" id="padung" value="">
                        <input type="file" name="file2" id="file2" title="Chọn file ảnh, audio, hoặc video">
                        <p style="background:rgba(100%,40%,20%,1);cursor:pointer;border-radius:1px;width:30%;height:1.8em;color:white;margin-top:-2.4em; z-index:1;">Thêm hình ảnh, âm thanh hoặc video</p>
                    </div>
                    <div class="csbd">
                    	<span>Phương án sai 1</span>
                        <br>
                        <input type="text" name="pasai1" id="pasai1" value="">
                        <input type="file" name="file3" id="file3" title="Chọn file ảnh, audio, hoặc video">
                        <p style="background:rgba(100%,40%,20%,1);cursor:pointer;border-radius:1px;width:30%;height:1.8em;color:white;margin-top:-2.4em; z-index:1;">Thêm hình ảnh, âm thanh hoặc video</p>
                    </div>
                    <div class="csbd">
                    	<span>Phương án sai 2</span>
                        <br>
                        <input type="text" name="pasai2" id="pasai2" value="">
                        <input type="file" name="file4" id="file4" title="Chọn file ảnh, audio, hoặc video">
                        <p style="background:rgba(100%,40%,20%,1);cursor:pointer;border-radius:1px;width:30%;height:1.8em;color:white;margin-top:-2.4em; z-index:1;">Thêm hình ảnh, âm thanh hoặc video</p>
                    </div>
                    <div class="csbd">
                    	<span>Phương án sai 3</span>
                        <br>
                        <input type="text" name="pasai3" id="pasai3" value="">
                        <input type="file" name="file5" id="file5" title="Chọn file ảnh, audio, hoặc video">
                        <p style="background:rgba(100%,40%,20%,1);cursor:pointer;border-radius:1px;width:30%;height:1.8em;color:white;margin-top:-2.4em; z-index:1;">Thêm hình ảnh, âm thanh hoặc video</p>
                    </div>
                    <div class="csbd">
                    	<span>Mức độ</span>
                        <br>
                        <input type="text" name="tl" id="tl" value="">
                    </div>
                </form>
                <div class="add">
            	<img id="add" src="../image/add.png" width="30" height="30" title="Thêm câu hỏi mới" style="margin-left:4em;margin-top:1em; cursor:pointer;">
                <img id="edit" src="../image/edit.ico" width="30" height="30" title="Sửa câu hỏi" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                <img id="delete" src="../image/delete.png" width="30" height="30" title="Xóa câu hỏi" style="margin-left:1em;margin-top:1em; cursor:pointer;">
                <img id="refresh" src="../image/refresh-icon.png" width="30" height="30" title="Refresh" style="margin-left:1em;margin-top:1em; cursor:pointer;">
            	</div>
                
        </div>
        
    </div>
</body>
</html>