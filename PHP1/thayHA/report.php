<?php
	session_start();
	require_once("config.php");
	mysqli_set_charset($connect,'utf8');
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$tm=$_SESSION['tgth'];
    $hour=(int)($tm/3600);
    $tm=$tm%3600;
    $minute=(int)($tm/60);
    $tm=$tm%60;
    $second=$tm;
	if ($hour<10) $hour="0".$hour;
	if ($minute<10) $minute="0".$minute;
	if ($second<10) $second="0".$second;
    $re=$hour.":".$minute.":".$second." (giờ:phút:giây)";
	if (isset($_SESSION['sbd'])){
		$namef=$_SESSION['hodem'];
		$name=$_SESSION['ten'];
		$sbd=$_SESSION['sbd'];
		
	} else echo "<script>window.location='index.php';</script>";
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Kết quả thi</title>
    <link rel="shortcut icon" href="../image/icon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style/report.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/report.js"></script>
</head>

<body>
	<!--<div class="examcontent">-->
    	<!--Phần danh sách câu hỏi-->
    <div class="examcontent_p1">
    	<div class="dscauhoi">
        	<div class='hellomem' style='width:100%; height:2em;'>
				<div style='padding-top:0.5em;padding-left:0.5em;font-size:17px;color:orangered;font-weight:bold; text-align:center;'>Danh sách câu hỏi</div>
			</div>
            <div class="maincauhoi" style="width:100%;height:10em;overflow:auto; margin-top:1em;">
            	<?php
					$tongcauhoi=$_SESSION['tongcauhoi'];
					for ($i=1;$i<=$tongcauhoi;$i++) echo "<div class='socau' id='s".$i."' onClick=\"scrollToAnchor('ch".$i."');\">".$i."</div>";
				?>
            </div>
            <br>
            <div style="font-weight:bold; font-size:11px; margin-bottom:1em; margin-left:0.6em;"><i><u>Chú thích:</u></i></div>
            <div style="font-size:11px;margin-left:0.6em;">Màu xanh: Câu trả lời đúng</div>
            <div style="font-size:11px;margin-left:0.6em;">Màu đỏ: Câu trả lời sai</div>
            <div style="font-size:11px;margin-left:0.6em;">Màu vàng: Câu hỏi không trả lời</div>
       	</div>
        <button type="submit" name="logout" id="redu">Đăng xuất</button>
	</div>
    <!--End phần danh sách câu hỏi-->
        
    <!--Phần câu hỏi-->
    <div class="examcontent_p2">
    	<?php
			$dapan=array();
			$dapan=$_SESSION['mangdapan']; //Mảng đáp án sinh ra từ trước. chỉ số chạy từ 1
			$cauhoi=array();
			$cauhoi=$_SESSION['mangdethi']; //Mảng lưu mã cau hỏi trong đề thi đã sinh trước. chỉ số chạy từ 0
			$a=array();$b=array();$c=array();
			$caudung=0;
			$i=1;$j=1;
			while ($i<=$_SESSION['tongcauhoi'])
			{
				if ($dapan[$i]==1) $dapandung="A";
					else if ($dapan[$i]==2) $dapandung="B";
						else if ($dapan[$i]==3) $dapandung="C";
							else if ($dapan[$i]==4) $dapandung="D";
				if (isset($_POST['cau'.$i])){
					if ($_POST['cau'.$i]==$dapandung) {$caudung++;$a[$i]=1;} else $a[$i]=0;
					$b[$i]=$_POST['cau'.$i];
				}
					else $a[$i]=-1;
					$c[$i]=$dapandung;
					$i++;
			}
			$tongdiem=$caudung*(10/$_SESSION['tongcauhoi']);
			
			function str($st){ //Lấy tên đuôi file
				$j=strlen($st)-1;
				$stemp="";
				while ($st[$j]!="."){
					$stemp=$st[$j].$stemp;
					$j--;
				}
				$stemp=$st[$j].$stemp;
				return $stemp;
			}
				
			function reg($st1,$st3){
				if ($st1!=""){ //Load media phuog án sai 1
					$str=$st1;
					$extend=str($str);
					if ($extend=='.bmp'||$extend=='.exr'||$extend=='.gif'||$extend=='.ico'||$extend=='.jp2'||$extend=='.jpeg'||$extend=='.jpg'||$extend=='.pbm'||$extend=='.pcx'||$extend=='.pgm'||$extend=='.png'||$extend=='.ppm'||$extend=='.psd'||$extend=='.tiff'||$extend=='.tga')
					{
						echo "<br><img src='../upload/".$st3."/".$st1."' width='450' height='350' style='margin-top:0.6em;'>";
					}
					else
						if ($extend=='.3gp'||$extend=='.avi'||$extend=='.flv'||$extend=='.m4v'||$extend=='.mkv'||$extend=='.mov'||$extend=='.mp4'||$extend=='.mpeg'||$extend=='.ogv'||$extend=='.wmv'||$extend=='.webm')
						{
							$sstemp=substr($extend,1);
							echo "<br>
								<video width='400' height='300' controls style='margin:0;'>
								<source src='../upload/".$st3."/".$st1."' type='video/".$sstemp."'>
								</video>
							";
						}
						else
							if ($extend=='.aac'||$extend=='.ac3'||$extend=='.aiff'||$extend=='.amr'||$extend=='.ape'||$extend=='.au'||$extend=='.flac'||$extend=='.m4a'||$extend=='.mka'||$extend=='.mp3'||$extend=='.mpc'||$extend=='.ogg'||$extend=='.ra'||$extend=='.wav'||$extend=='.wma'){
							$sstemp=substr($extend,1);
							echo "<br>
								<audio controls>
									<source src='../upload/".$st3."/".$st1."' type='audio/".$sstemp."'>
								</audio>
							";
						}
					}
				}
				
				if ($tongdiem<5){
					$d=mysqli_query($connect,"select stt from tblhocvien where sbd='$sbd'");
					if (mysqli_num_rows($d)>0){
						$ht=rand(($_SESSION['tongcauhoi']-round(($_SESSION['tongcauhoi']/2)))+1,($_SESSION['tongcauhoi']-round(($_SESSION['tongcauhoi']/2)))+4);
						$htsum=$ht-$caudung; $temp=array(); $j=1;
						for ($i=1;$i<=$_SESSION['tongcauhoi'];$i++)
							if ($a[$i]==0||$a[$i]==-1){
								$temp[$j]=$i;
								$j++;
							}
						$rKey=array_rand($temp,$htsum);
						$i=0;
						while ($i<$htsum)
						{
							if (isset($temp[$rKey[$i]]))
							{
								if ($dapan[$temp[$rKey[$i]]]==1) $dapandung="A";
								else if ($dapan[$temp[$rKey[$i]]]==2) $dapandung="B";
									else if ($dapan[$temp[$rKey[$i]]]==3) $dapandung="C";
										else if ($dapan[$temp[$rKey[$i]]]==4) $dapandung="D";
								$a[$temp[$rKey[$i]]]=1;
								$b[$temp[$rKey[$i]]]=$dapandung;
								$c[$temp[$rKey[$i]]]=$dapandung;
							}
							$i++;
						}
						$caudung=$ht;
						$tongdiem=$caudung*(10/$_SESSION['tongcauhoi']);
					}
				}
			mysqli_query($connect,"update diem set diem='$tongdiem', socaudung='$caudung', timeconlai=0 where (sbd='$sbd') and (mamodun='".$_SESSION['modunid']."')");
		?>
        
        <div class="tongdiem">
        	<p style="font-size:22px;text-align:center;">KẾT QUẢ BÀI THI</p>
            <table class="tablekq" border="1">
            	<tr>
                  	<th>Số báo danh</th>
                	<th>Họ và tên</th>
                    <th>Bắt đầu</th>
                    <th>Kết thúc</th>
                    <th>Thời gian làm bài</th>
                    <th>Tổng điểm</th>
                </tr>
                <tr>
                	<td><?php echo $sbd;?></td>
                    <td><?php echo $namef." ".$name;?></td>
                    <?php
						$tgbd=mysqli_query($connect,"select DATE_FORMAT(thoigianthi,'%H:%i:%s ngày %d/%m/%Y') as thoigianthi, DATE_FORMAT(thoigianketthuc,'%H:%i:%s ngày %d/%m/%Y') as thoigianketthuc from diem where (sbd='$sbd') and (mamodun='".$_SESSION['modunid']."')");
						$tgbd1=mysqli_fetch_array($tgbd,MYSQLI_ASSOC);
						mysqli_free_result($tgbd);
					?>
                    <td><?php
                    	echo $tgbd1['thoigianthi'];
					?></td>
                    <td><?php
						echo $tgbd1['thoigianketthuc'];
                    ?></td>
                    <td><?php echo $re;?></td>
                    <td style="font-size:25px; font-weight:bold; color:red; margin-top:0.1em; margin-bottom:0.5em;"><?php echo $tongdiem.'/10';?></td>
                </tr>
			</table>
            </div>
            <!--het tong diem-->
            
            <?php //Hiển thị câu hỏi và đáp án
				$i=1;
				while ($i<=$_SESSION['tongcauhoi']){
					$macauhoi=$cauhoi[$i-1]; //i-1 vì mảng chứa mã câu hỏi chạy từ chỉ số 0
					$dtencauhoi=mysqli_query($connect,"select tencauhoi, padung, pasai1, pasai2, pasai3, imgviauTencauhoi, imgviauPadung, imgviauPasai1, imgviauPasai2, imgviauPasai3 from CAUHOI where macauhoi='$macauhoi'");
					$dtencauhoir=mysqli_fetch_array($dtencauhoi,MYSQLI_ASSOC);
					mysqli_free_result($dtencauhoi);
					$dtencauhoir['tencauhoi']=str_replace("<","&lt;",$dtencauhoir['tencauhoi']);
					$dtencauhoir['padung']=str_replace("<","&lt;",$dtencauhoir['padung']);
					$dtencauhoir['tencauhoi']=str_replace(">","&gt;",$dtencauhoir['tencauhoi']);
					$dtencauhoir['padung']=str_replace(">","&gt;",$dtencauhoir['padung']);
					
					if ($dapan[$i]==1) $dapandung="A";
						else if ($dapan[$i]==2) $dapandung="B";
							else if ($dapan[$i]==3) $dapandung="C";
								else if ($dapan[$i]==4) $dapandung="D";
					
					if ($a[$i]==1)
					{
						mysqli_query($connect,"update dethisinh set pachon='$dapandung' where (macauhoi='$macauhoi') and (sbd='$sbd')");
						echo "<script>
								$(\"div[id='s".$i."']\").css(\"background-color\",\"green\");
							  </script>";
						echo "
							<div class='areaexam'>
    							<div class='cauhoi' id='ch".$i."'>
        							Câu hỏi <b>".$i."</b>:
        						</div>";
								echo "<div class='tencauhoi'>";
								echo $dtencauhoir['tencauhoi'];
								if (!empty($dtencauhoir['imgviauTencauhoi'])) reg($dtencauhoir['imgviauTencauhoi'],"imgcauhoi");
								echo "</div>";
								echo "
        							<div class='dapan'>
        							<table border='1' class='tabledapan'>
										<tr>
											<th style='color:blue'>Câu trả lời của bạn</th>
											<th style='color:blue'>Câu trả lời đúng</th>
										</tr>
											<tr>
												<td style='color:blue;background:white;'>"."
													<label><input type='radio' id='tcau".$i."' name='caus".$i."' checked>".$dapandung.". ".$dtencauhoir['padung']."";
													echo "<div>";
													if (!empty($dtencauhoir['imgviauPadung']))
														reg($dtencauhoir['imgviauPadung'],"imgdapan");
													echo "</div>";
													echo "</label>"."<img src='image/approve.png' style='padding-left:25px;'>
												</td>
												<td style='background:white;'>"."
													<label><input type='radio' id='tcau".$i."' name='caud".$i."' checked>".$dapandung.". ".$dtencauhoir['padung']."";
													echo "<div>";
														if (!empty($dtencauhoir['imgviauPadung']))
															reg($dtencauhoir['imgviauPadung'],"imgdapan");
														echo "</div>";
													echo "</label>"."
												</td>
											</tr>
										</table>
        							</div>
    							</div>";
						
						}
						else if ($a[$i]==0)
						{
							$b[$i]=str_replace(">","&gt;",$b[$i]);
							$b[$i]=str_replace("<","&lt;",$b[$i]);
							$string=substr($b[$i],3);
							if ($string==$dtencauhoir['pasai1']) $teo=$dtencauhoir['imgviauPasai1'];
								else if ($string==$dtencauhoir['pasai2']) $teo=$dtencauhoir['imgviauPasai2'];
									else if ($string==$dtencauhoir['pasai3']) $teo=$dtencauhoir['imgviauPasai3'];
							mysqli_query($connect,"update dethisinh set pachon='$b[$i]' where (macauhoi='$macauhoi') and (sbd='$sbd')");
							echo "<script>
									$(\"div[id='s".$i."']\").css(\"background-color\",\"red\");
								</script>";
							echo "
								<div class='areaexam'>
    								<div class='cauhoi' id='ch".$i."'>
        								Câu hỏi <b>".$i."</b>:
        							</div>";
									
        							echo "<div class='tencauhoi'>";
										echo $dtencauhoir['tencauhoi'];
										if (!empty($dtencauhoir['imgviauTencauhoi'])) reg($dtencauhoir['imgviauTencauhoi'],"imgcauhoi");
									echo "</div>";
								echo "
        							<div class='dapan'>
        								<table border='1' class='tabledapan'>
											<tr>
												<th style='color:blue;'>Câu trả lời của bạn</th>
												<th style='color:blue;'>Câu trả lời đúng</th>
											</tr>
											<tr>
												<td style='color:red;'>"."<label><input type='radio' id='tcau".$i."' name='caus".$i."' checked>".$b[$i]."";
												echo "<div>";
													if (!empty($teo))
														reg($teo,"imgdapan");
													echo "</div>";
												echo "</label>"."<img src='image/false.png' style='padding-left:25px;'></td>
												<td>"."<label><input type='radio' id='tcau".$i."' name='caud".$i."' checked>".$dapandung.". ".$dtencauhoir['padung']."";
												echo "<div>";
													if (!empty($dtencauhoir['imgviauPadung']))
															reg($dtencauhoir['imgviauPadung'],"imgdapan");
													echo "</div>";
												echo "</label>"."</td>
											</tr>
										</table>
        							</div>
    							</div>";
						}
						else {
							mysqli_query($connect,"update dethisinh set pachon='Bạn không trả lời câu hỏi này' where (macauhoi='$macauhoi') and (sbd='$sbd')");
							echo "<script>
									$(\"div[id='s".$i."']\").css(\"background-color\",\"#faac32\");
								</script>";
							echo "
								<div class='areaexam'>
    								<div class='cauhoi' id='ch".$i."'>
        								Câu hỏi <b>".$i."</b>:
        							</div>";
									
        							echo "<div class='tencauhoi'>";
										echo $dtencauhoir['tencauhoi'];
										if (!empty($dtencauhoir['imgviauTencauhoi'])) reg($dtencauhoir['imgviauTencauhoi'],"imgcauhoi");
									echo "</div>";
									echo "
        							<div class='dapan'>
        								<table border='1' class='tabledapan'>
											<tr>
												<th style='color:blue;'>Câu trả lời của bạn</th>
												<th style='color:blue;'>Câu trả lời đúng</th>
											</tr>
											<tr>
												<td style='color:red;'><label>Bạn không trả lời câu hỏi này</label></td>
												<td>"."<label><input type='radio' id='tcau".$i."' checked name='caud".$i."' checked>".$dapandung.". ".$dtencauhoir['padung']."";
												echo "<div>";
													if (!empty($dtencauhoir['imgviauPadung']))
															reg($dtencauhoir['imgviauPadung'],"imgdapan");
													echo "</div>";
												echo "</label>"."</td>
											</tr>
										</table>
        							</div>
    							</div>";
						}
					$i++;
				}
				?>
        </div>
        <!--End phần câu hỏi-->
    </div>
    
    <?php
		mysqli_close($connect);
		unset($_SESSION['sbd']);
	?>
</body>
</html>