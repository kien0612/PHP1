<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_POST['id'])){ //
		$mt=$_POST['id']; //Mã môn thi->lấy mã bộ đề
		$_SESSION['monthi1']=$mt;
		include("../config.php");
		mysqli_set_charset($connect,"utf8");
		echo "<label style='margin-left:1em;font-size:18px;'>Tổng số câu hỏi: &nbsp;</label>";
		if ($tong=mysqli_query($connect,"select tongcauhoi from thoigianthi where mamodun='$mt'")){ //Tổng câu hỏi
			$tongt=mysqli_fetch_array($tong);
			echo "<input type='text' value='".$tongt['tongcauhoi']."' name='stong' id='stong' size='5'/>";
		} else echo "<input type='text' value='0' name='stong' id='stong' size='5'/>";
		
		echo "<label style='margin-left:1em;font-size:18px;'>Thời gian làm bài: &nbsp;</label>";
		if ($tong=mysqli_query($connect,"select tgthi from thoigianthi where mamodun='$mt'")){ //Thời gian
			$tongt=mysqli_fetch_array($tong);
			echo "<input type='text' value='".$tongt['tgthi']."' name='time' id='time' size='8'/>";
		} else echo "<input type='text' value='0' name='time' id='time' size='8'/>";
		echo "<span>&nbsp;&nbsp;(phút)</span>";
		echo "<hr>";
		echo "<h4 style='margin-top:1.4em;margin-left:1em;'>Danh sách Module</h4>";
		echo "<form method='post' id='capnhatdt'>";
		$html="<div class='cls1'>";
		$d=mysqli_query($connect,"select mabode, tenbode from bode where mamodun='$mt'"); //Kết quả là mảng chứa tên bộ đề
		$i=0;
		while ($r=mysqli_fetch_array($d)){
			$html.="<div class='cls2'>".$r['mabode']." - ".$r['tenbode']."</div>";
			$html.="<div class='cls7'><label style='margin-left:3em;'>Mức độ</label><label style='margin-left:6em;'>Số lượng</label><label style='margin-left:13em;'>Số câu chọn</label></div>";
			$html.="<div class='cls3' style='margin-left:2em;'>";
				
				if ($e=mysqli_query($connect,"select count(macauhoi) as 'sde' from cauhoi where mabode='".$r['mabode']."' and mucdo='Dễ'")){
					$er=mysqli_fetch_array($e);
					if ($num=mysqli_query($connect,"select soluong from dethiprofile where cauhoi='".$r['mabode']."' and pmucdo=0"))
					{
						$nump=mysqli_fetch_array($num);
						$temp=$nump['soluong'];
					}
					else $temp=0;
					$html.="<div class='cls4'>";
					$html.="<label style='margin-left:2em;'>Dễ</label>";
					$html.="<label style='margin-left:7.5em;'>".$er['sde']."</label>";
					$html.="<label style='margin-left:16.8em;'><input type='text' name='".$r['mabode']."~0"."' value='".$temp."' size='3'></label>";
					$html.="</div>";
					$i++;
				}
				
				if ($m=mysqli_query($connect,"select count(macauhoi) as 'stb' from cauhoi where mabode='".$r['mabode']."' and mucdo='Trung bình'")){
					$mr=mysqli_fetch_array($m);
					if ($num=mysqli_query($connect,"select soluong from dethiprofile where cauhoi='".$r['mabode']."' and pmucdo=1"))
					{
						$nump=mysqli_fetch_array($num);
						$temp=$nump['soluong'];
					}
					else $temp=0;
					$html.="<div class='cls5'>";
					$html.="<label style='margin-left:2em;'>Trung bình</label>";
					$html.="<label style='margin-left:4em;'>".$mr['stb']."</label>";
					$html.="<label style='margin-left:16.8em;'><input type='text' name='".$r['mabode']."~1"."' value='".$temp."' size='3'></label>";
					$html.="</div>";
					$i++;
				}
				
				if ($h=mysqli_query($connect,"select count(macauhoi) as 'skho' from cauhoi where mabode='".$r['mabode']."' and mucdo='Khó'")){
					$hr=mysqli_fetch_array($h);
					if ($num=mysqli_query($connect,"select soluong from dethiprofile where cauhoi='".$r['mabode']."' and pmucdo=2"))
					{
						$nump=mysqli_fetch_array($num);
						$temp=$nump['soluong'];
					}
					else $temp=0;
					$html.="<div class='cls6'>";
					$html.="<label style='margin-left:2em;'>Khó</label>";
					$html.="<label style='margin-left:7em;'>".$hr['skho']."</label>";
					$html.="<label style='margin-left:16.8em;'><input type='text' name='".$r['mabode']."~2"."' value='".$temp."' size='3'></label>";
					$html.="</div>";
					$i++;
				}
			$html.="</div>";
		}
		
		$_SESSION['tongm']=$i;
	}
	$html.="</div>";
	$html.="</form>";
	$html.="<input style='display:block; margin:auto; margin-top:1em; margin-bottom:1em; color:white; cursor:pointer; padding:0.8em 3em; background:blue; border:none;' type='submit' name='sb' id='sb' value='Cập nhật'>";
	echo $html;
?>

<script>
	$(document).ready(function(e) {
        $("#sb").click(function(e) {
			var data=$("#capnhatdt").serialize();
			$.ajax({
				type:'post',
				url: 'qldethiupdate.php?SUM='+$('#stong').val()+'&time='+$('#time').val(), //sent by GET
				data: {id:data},
				success: function(data){
					//alert(data);
					if (data!="false") alert('Đã cập nhật!'); else alert("Số câu hỏi lựa chọn chưa bằng tổng số câu hỏi bạn đã nhập! Vui lòng kiểm tra lại.");
				}
			});
        });
    });
</script>

<style>
	.cls1{
		display:block;
		margin:auto;
		width:99%;
		font-size:13px;
	}
	.cls2{
		padding:0.5em 0.3em;
		background:#4267b2;
		margin-top:1em;
		color:white;
	}
	.cls7,.cls4,.cls5,.cls6{
		padding:0.6em 0;
	}
</style>