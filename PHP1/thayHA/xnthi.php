<?php
	ob_clean();
	session_start();
	if (!isset($_SESSION['sbd'])) echo "<script>window.location='index.php';</script>";
	//if (!isset($_SESSION['sbd'])) header("Location: index.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bắt đầu thi</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="shortcut icon" href="image/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="style/xnthi.css" type="text/css">
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/xnthi.js"></script>
    <script>
		setInterval(timer,1000);
		var mins=1, second=0, m,s;
		var a="<?php echo $_GET['ID'];?>";
		function timer(){
			if (second==0){mins--, second=60;}
			second--;
			if (second<10) s='0'+second; else s=second;
			m='0'+mins;
			if (second==0&&mins==0) window.location='exam.php?ID='+a+"&"+"fx="+parseInt(new Date().getTime()/1000);
		}
		$(document).ready(function(e){
			var a="<?php echo $_GET['ID'];?>";
			$("#btn").click(function(e){
				window.location='exam.php?ID='+a+"&"+"fx="+parseInt(new Date().getTime()/1000);
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
        	<div class="ttdk" style="height:40px;border-bottom: 4px solid blue;">
     		<img src="image/danhsach.png" width="23" height="25" style="margin-left:0.5em;margin-top:0.7em; float:left; ">
			<p class="ttdktext" style="color:blue; margin-top:1em; margin-left:0.6em;">
			<?php if (isset($_GET['ID'])) echo "Bài thi môn: ".$_GET['ID'];?></p>
		</div>
      	<div class="content" style="z-index:1;width:100%;height:20em;margin-top:0.5em;">
      		<div class="Aavatar">
      		<?php
	  			require_once("config.php");
				mysqli_set_charset($connect,'utf8');
				if (isset($_GET['ID'])){
					$data=mysqli_query($connect,"select mamodun from MODUN where tenmodun='".$_GET['ID']."'");
					$t=mysqli_fetch_array($data,MYSQLI_ASSOC);
					$mamodun_exam=$t['mamodun'];
					
					$s=mysqli_query($connect,"select tongcauhoi, tgthi from thoigianthi where mamodun='$mamodun_exam'");
					$r=mysqli_fetch_array($s,MYSQLI_ASSOC);
					$tongch=$r['tongcauhoi']; //Tổng số câu hỏi
					$ttime=$r['tgthi']; //Tổng time làm bài
					$_SESSION['time12']=$r['tgthi'];
					$_SESSION['modunid']=$mamodun_exam;
					
					$t1=mysqli_query($connect,"SELECT dethisinh.macauhoi as macauhoi, dethisinh.padung as padung FROM dethisinh, cauhoi, modun, bode WHERE cauhoi.macauhoi=dethisinh.macauhoi and cauhoi.mabode= bode.mabode and bode.mamodun=modun.mamodun and modun.mamodun='$mamodun_exam' and dethisinh.sbd='".$_SESSION['sbd']."' ORDER BY dethisinh.socau");
					$t2=mysqli_query($connect,"select timeconlai from diem where (sbd='".$_SESSION['sbd']."') and (mamodun= '$mamodun_exam')");
					$time=mysqli_fetch_array($t2,MYSQLI_ASSOC);
					$timnow=time();
					$dapan=array();
					$al=array();
					$i=1;
					if (mysqli_num_rows($t1)>0&&$time['timeconlai']>0) //Đang thi dở, lấy lại đề và làm tiếp.
					{
						while ($dt=mysqli_fetch_array($t1,MYSQLI_ASSOC))
						{
							$al[$i-1]=$dt['macauhoi'];
							if ($dt['padung']=='A') $dapan[$i]=1; else if ($dt['padung']=='B') $dapan[$i]=2;
								else if ($dt['padung']=='C') $dapan[$i]=3; else if ($dt['padung']=='D') $dapan[$i]=4;
							$i++;
						}
						$i--;
						$_SESSION['tongcauhoi']=$i; //if tổng câu hỏi < $r['tongcauhoi'] sinh thêm...?
						$_SESSION['mangdapan']=$dapan; //
						$_SESSION['mangdethi']=$al; //
					}
					else if (mysqli_num_rows($t1)>0&& $time['timeconlai']<=0) //Thi xong
					{
						unset($_SESSION['sbd']);
						die("Bạn đã hoàn thành bài thi của môn này!");
					}
					else if (mysqli_num_rows($t1)<1){ //Sinh đề
						$sql="select cauhoi,pmucdo,soluong from dethiprofile where (mamodun='$mamodun_exam') and (soluong>0)";
						$data=mysqli_query($connect,$sql);
						$i=1;
						while ($row=mysqli_fetch_array($data,MYSQLI_ASSOC)){
							if ($row['pmucdo']==0){
								$ui_e=mysqli_query($connect,"SELECT cauhoi.macauhoi as macauhoi FROM cauhoi,modun,bode WHERE (modun.mamodun=bode.mamodun) and (bode.mabode=cauhoi.mabode) and (modun.mamodun='$mamodun_exam') and (cauhoi.mabode='".$row['cauhoi']."') and (cauhoi.mucdo='Dễ') ORDER BY RAND() LIMIT ".$row['soluong']."");
							}
							else if ($row['pmucdo']==1){
								$ui_e=mysqli_query($connect,"SELECT cauhoi.macauhoi as macauhoi FROM cauhoi,modun,bode WHERE (modun.mamodun=bode.mamodun) and (bode.mabode=cauhoi.mabode) and (modun.mamodun='$mamodun_exam') and (cauhoi.mabode='".$row['cauhoi']."') and (cauhoi.mucdo='Trung bình') ORDER BY RAND() LIMIT ".$row['soluong']."");
							}
							else{
								$ui_e=mysqli_query($connect,"SELECT cauhoi.macauhoi as macauhoi FROM cauhoi,modun,bode WHERE (modun.mamodun=bode.mamodun) and (bode.mabode=cauhoi.mabode) and (modun.mamodun='$mamodun_exam') and (cauhoi.mabode='".$row['cauhoi']."') and (cauhoi.mucdo='Khó') ORDER BY RAND() LIMIT ".$row['soluong']."");
							}
							while ($r=mysqli_fetch_array($ui_e,MYSQLI_ASSOC)){
								$al[$i]=$r['macauhoi'];
								$i++;
							}
							
						}
						mysqli_free_result($data);
						$_SESSION['tongcauhoi']=--$i;
						$j=1;
						while ($j<=$i) {$dapan[$j]=rand(1,4);$j++;}
						$_SESSION['mangdapan']=$dapan;
						shuffle($al); //sort random. index -> 0;
						$_SESSION['mangdethi']=$al;
					}
					mysqli_free_result($s);
					mysqli_free_result($t1);
					mysqli_free_result($t2);
					mysqli_close($connect);
				}
			//mysqli_free_result($data);
			
      ?>
      </div>
      	<div class="msg" style="background:rgba(153,255,204,0.2); width:98.8%; height:13em; margin-left:0.4em; float:left;">
        	<p style="margin-top:1.6em;">
            	Số lượng câu hỏi:
            	<span style="color:red; font-size:17px;"><?php echo $tongch; ?></span> câu
            </p>
			<p>Thời gian làm bài: <span style="color:red; font-size:17px;"><?php echo $ttime; ?></span> phút</p>
            <span style="color:blue; margin-bottom:1em; margin-left:0.6em; font-weight:bold;">Lưu ý:</span><br>
			<p>Sau 1 phút thí sinh không nhấp chuột vào nút "Bắt đầu làm bài", hệ thống sẽ tự động chuyển đến bài thi.</p>
            <p>Khi thí sinh bắt đầu làm bài thi, thời gian sẽ được tính. Thí sinh bắt buộc phải hoàn thành bài thi của mình trong thời gian cho phép, quá thời gian quy định hệ thống sẽ tự động dừng bài làm của bạn và trả kết quả</p>
            <button id="btn" style="margin:auto;display:block;margin-top:4em;background:green;border:none;color:white;font-weight:bold;padding:6px 25px;width:15em; height:2.5em;cursor:pointer;">Bắt đầu làm bài</button>
      	</div>
    	</div>
    	</div>
    </div>
    
</body>
</html>