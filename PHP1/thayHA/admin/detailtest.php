<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	require_once("../config.php");
	mysqli_set_charset($connect,"utf8");
?>
<!doctype html>
<html>
<head>
    <link rel="shortcut icon" href="../image/icon.png" type="image/x-icon">
    <!--<link rel="stylesheet" type="text/css" href="style/report.css"/>-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="../js/jquery-3.1.1.js"></script>
    
    <style>
		.s{
			display:block;
			margin:auto;
			border-bottom:0.4px solid blue;
			width:98.5%;
			padding:0.5em 0.5em;
			text-align:center;
			color:black;
			font-size:15px;
		}
		.s2{
			margin-top:1em;
			margin-bottom:0.7em;
		}
		#print{
			border:none;
			padding:0.7em 3em;
			background:rgba(255,153,0,1);
			display:block;
			margin:auto;
			margin-top:1.5em;
			margin-bottom:1.5em;
			color:white;
			font-size:15px;
			cursor:pointer;
		}
		#xn{
			padding:0.4em 6em;
			background:blue;
			border:none;
			color:white;
			font-size:15px;
			cursor:pointer;
		}
		#li7{
			color:rgba(255,204,0,1);font-weight:bolder;
		}
	</style>
    <script>
		$(document).ready(function(e) {
            $("#xn").click(function(e) {
				var d1=$("#mats").val();
				var d2=$("#mamt").val();
                $.ajax({
					type: 'post',
					url: "detailtestexport.php",
					data:{d1:d1,d2:d2},
					success: function(data){
						//alert(data);
						$("#load").html(data);
					}
				});
            });
        });
		
		function printContent(){
			var reponsve= document.body.innerHTML;
			var pr=document.getElementById("load").innerHTML;
			document.body.innerHTML=pr;
			window.print();
			document.body.innerHTML=reponsve;
		}
	</script>
    
</head>

<body>
	<div class="s">
    	<p style="font-size:21px;">THÔNG TIN TÌM KIẾM</p>
    	<form id="search" name="search" method="post">
        	<div class="s1">Mã thí sinh:&nbsp;
              <select name="mats" id="mats" style="width:10%;">
                <option value="">---</option>
                    <?php
                        $d=mysqli_query($connect,"select sbd from hocvien,kythi where kythi.makythi=hocvien.makythi and hocvien.makythi='".$_SESSION['kythi']."'");
						while ($r=mysqli_fetch_array($d)){
							echo "<option value=".$r['sbd'].">".$r['sbd']."</option>";
						}
                    ?>
                  </select>
  </div>
            <div class="s2">Tên môn thi:
            	<select name="mamt" id="mamt" style="width:10%;">
                <option value="">---</option>
                    <?php
                        $d=mysqli_query($connect,"select mamodun,tenmodun from modun,kythi where kythi.makythi=modun.makythi and modun.makythi='".$_SESSION['kythi']."'");
						while ($r=mysqli_fetch_array($d)){
							echo "<option value=".$r['mamodun'].">".$r['tenmodun']."</option>";
						}
                    ?>
                  </select>
            </div>
        </form>
        <input type="submit" name="xn" id="xn" value="Xem">
    </div>
    
    <div id="load">
    	
    </div>
    <button onClick="printContent();" id="print">In bài thi</button>
</body>
</html>