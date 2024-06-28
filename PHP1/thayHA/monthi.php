<?php
	session_start();
	if (!isset($_SESSION['sbd'])) echo "<script>window.location='index.php';</script>";
	date_default_timezone_set("Asia/Ho_Chi_Minh");
?>

<div class="ttdk" style="height:40px; border:none; margin-bottom:1em;">
	<p class="ttdktext" style="color:blue; margin-top:1em; float:left; width:20%;border-bottom:3px solid blue; margin-left:0.6em;">Thông tin thí sinh</p>
	<p class="ttdktext" style="margin-left:3.7em; width:65%; color:blue; margin-top:1em; border-bottom:3px solid blue;">Danh sách môn thi</p>
</div>

<div class="body">
<?php
	require_once("config.php");
	mysqli_set_charset($connect,'utf8');
	$modun=mysqli_query($connect,"select modun.mamodun as'mamodun', tenmodun, batdau, ketthuc from modun,allowexam where (modun.mamodun=allowexam.mamodun) and (allowexam.sbd='".$_SESSION['sbd']."') and (allowexam.allow='C')"); //Lấy các môn mà thí sinh được thi.
	$profile=mysqli_query($connect,"select profile from hocvien where sbd='".$_SESSION['sbd']."'"); //Lấy ảnh đại diện của thí sinh
	$profilei=mysqli_fetch_array($profile);
	
	$target="upload/imgthisinh/".$profilei['profile'];
	
	echo "<div class='avatar'>
				<div class='hellomem' style='width:100%; height:2.2em; background:seagreen;'>
					<img src='image/key.png' width='15' height='17' style='margin-top:0.5em;margin-left:0.5em; float:left;'>
					<div class='xinchao'style='padding-top:0.5em;padding-left:0.5em;color:white; background-color:cadetblue; width:80%; height:1.7em; float:right;'>XIN CHÀO</div>
				</div>
				<div class='imagemem' style='width:100%; height:10em;padding-top:0.6em;'>
					<img src='$target' style='margin:auto; display:block; width:70%; height:96%;'>
				</div>
				<div class='chitiet' style=' width:100%; height:6.1em;'>
					<div class='hoten' style='width:100%; height:3em;background:rgba(170,170,170,0.4);'>
						<img src='image/name.jpg' style='margin-top:0.5em;margin-left:0.3em; float:left;'>
						<div style='font-size:13px;padding-top:0.5em;padding-left:0em;color:black;width:70%; height:1.7em; float:right;'>
							<span>Họ và tên</span><br>
							<span><b>".$_SESSION['hodem']." ".$_SESSION['ten']."</b></span>
						</div>
					</div>
					<div class='sobd' style='width:100%; height:3.1em;background:rgba(170,170,170,0.4);'>
						<img src='image/ID.jpg' style='margin-top:0.5em;margin-left:0.3em; float:left;'>
						<div style='font-size:13px;padding-top:0.5em;padding-left:0em;color:black;width:70%; height:1.7em; float:right;'>
							<span>Số báo danh</span><br>
							<span><b>".$_SESSION['sbd']."</b></span>
						</div>
					</div>
					<div class='sobd' style='width:100%; height:3.1em;background:rgba(170,170,170,0.4);'>
						<img src='image/ID.jpg' style='margin-top:0.5em;margin-left:0.3em; float:left;'>
						<div style='font-size:13px;padding-top:0.5em;padding-left:0em;color:black;width:70%; height:1.7em; float:right;'>
							<span>Ngày sinh</span><br>
							<span><b>".$_SESSION['ngaysinh']."</b></span>
						</div>
					</div>
					<div class='sobd' style='width:100%; height:3.1em;background:rgba(170,170,170,0.4);'>
						<img src='image/ID.jpg' style='margin-top:0.5em;margin-left:0.3em; float:left;'>
						<div style='font-size:13px;padding-top:0.5em;padding-left:0em;color:black;width:70%; height:1.7em; float:right;'>
							<span>Nơi sinh</span><br>
							<span><b>".$_SESSION['noisinh']."</b></span>
						</div>
					</div>
				</div>
			</div>";
	$i=0;
	echo "<div class='dnh'>";
	while ($data=mysqli_fetch_array($modun)){
		if (strtotime($data['batdau'])<=time()&&strtotime($data['ketthuc'])>=time()){
			$i++;
			echo "
			<div class='loadModun' name='mmodun".$i."'>
					<div class='bomodun'>
						<div>
							<img src='image/small-list.png' width='25' height='26' style='float:left; margin-left:2em; margin-top:-0.3em;'>
							<p id='tench' style='margin-top:1em; margin-left:5.6em; cursor:pointer; padding-bottom:0.5em;'>".$data['tenmodun']."</p>
						</div>
					</div>
				  </div>";
		}
	}
	echo "</div>";
?>
	<p class="det" style="color: darkviolet; background: lavender;width: 62.5%;text-align: center; float: right; margin-right: 6em;margin-top: -1.1em;">Thí sinh click vào tên môn thi để vào bài thi</p>
</div>

<script>
	$(document).ready(function(e) {
        $(".loadModun #tench").click(function(e){
			window.location='xnthi.php?ID='+$(this).text();
        });
    });
</script>