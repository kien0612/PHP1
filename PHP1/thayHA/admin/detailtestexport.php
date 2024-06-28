<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	require_once("../config.php");
	mysqli_set_charset($connect,"utf8");
	if (isset($_POST['d1'])&&isset($_POST['d2'])){
		$mats=$_POST['d1'];
		$mts=mysqli_query($connect,"select hodem,ten from hocvien where sbd='$mats'");
		$mtts=mysqli_fetch_array($mts);
		$mamt=$_POST['d2'];
		$dt=mysqli_query($connect,"select diem, socaudung, thoigianthi, thoigianketthuc from diem where sbd='$mats' and mamodun='$mamt'");
		$dt1=mysqli_fetch_array($dt);
	}
?>

<style>
	.tablekq{
		border-collapse:collapse;
		width:100%;
	}
	th,td{
		padding:0.4em;
		text-align:center;
	}
	.tongdiem{
		width:99%;
		display:block;
		margin:auto;
		font-size:16px;
		margin-bottom:2em;
		padding-top:0.5em;
		padding-bottom:1em;
		background:white;
	}
	.tabledapan{border-collapse:collapse; width:100%;}
	.tabledapan td,.tabledapan th{padding:0.5em;text-align:center;width:50%; font-size:13px;text-transform:none;}
	.tabledapan td{vertical-align:left; text-align:left; padding: 0.7em 0.4em;}
	.chitiet{
		background:white;
		width:99%;
		display:block;
		margin:auto;
		padding:1em 0.2em;
	}
	.areaexam{
		width:98.8%;
		display:block;
		margin:auto;
		border-bottom:2px solid rgba(153,255,0,1);
	}
	.cauhoi{
		width:48.7%;padding:0.4em;font-family:Helvetica,sans-serif;font-size:15px;margin-top:1em; margin-bottom:0.2em;
	}
	.tencauhoi{
		background:white;margin-top:0.5em;padding:1em;border-bottom:1px dashed rgba(170,170,170,0.3);font-family:Helvetica,sans-serif;font-size:14px;
	}
	.dapan{
		background:white;padding:1em 1em;font-size:13px !important;font-family:Helvetica,sans-serif;
	}
	label{
		cursor:pointer;
	}
</style>

<script>
		function printContent(){
			var reponsve= document.body.innerHTML;
			var pr=document.getElementById("load").innerHTML;
			document.body.innerHTML=pr;
			window.print(); //Show dialog print
			document.body.innerHTML=reponsve;
		}
	</script>

<div class="main">
	<div class="tongdiem">
    	<p style="font-size:22px;text-align:center;">CHI TIẾT BÀI THI</p>
        <table class="tablekq" border="1">
           	<tr>
                <th width="15%">Số báo danh</th>
                <th width="20%">Họ và tên</th>
                <th width="15%">Bắt đầu thi</th>
                <th width="15%">Kết thúc thi</th>
                <th width="10%">Số câu đúng</th>
                <th width="20%">Tổng điểm</th>
            </tr>
            <tr>
                <td><?php echo $mats;?></td>
                <td><?php echo $mtts['hodem']." ".$mtts['ten'];?></td>
                <td><?php echo $dt1['thoigianthi'];?></td>
                <td><?php echo $dt1['thoigianketthuc'];?></td>
                <td><?php echo $dt1['socaudung'];?></td>
                <td style="font-size:25px; font-weight:bold; color:red; margin-top:0.1em; margin-bottom:0.5em;">
					<?php echo $dt1['diem']."/10";?></td>
                </tr>
        </table>
	</div>
    
    
    <div class="chitiet">
    	<?php
			
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
						echo "<br><img src='../upload/".$st3."/".$st1."' width='600' height='400' style='margin-top:0.6em;'>";
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
			
			$i=1;
			$sql2="SELECT macauhoi,socau,padung,pachon,temp FROM dethisinh WHERE sbd='$mats' and mamodun='$mamt' order by socau";
			$dtt=mysqli_query($connect,"$sql2");
			while ($dt2=mysqli_fetch_array($dtt)){// echo "BTNDAJSKD";
				$sql3="SELECT tencauhoi, padung, pasai1, pasai2, pasai3, imgviauTencauhoi, imgviauPadung, imgviauPasai1, imgviauPasai2, imgviauPasai3, mucdo, mabode FROM cauhoi WHERE macauhoi='".$dt2['macauhoi']."'";
				$dtt1=mysqli_query($connect,"$sql3");
				$dt3=mysqli_fetch_array($dtt1);
				$dt3['tencauhoi']=str_replace("<","&lt;",$dt3['tencauhoi']);
				$dt3['padung']=str_replace("<","&lt;",$dt3['padung']);
				$dt3['tencauhoi']=str_replace(">","&gt;",$dt3['tencauhoi']);
				$dt3['padung']=str_replace(">","&gt;",$dt3['padung']);
				$dt2['pachon']=str_replace("<","&lt;",$dt2['pachon']);
				$dt2['pachon']=str_replace(">","&gt;",$dt2['pachon']);
				
				if ($dt2['pachon']==$dt2['padung']){
					echo "
						<div class='areaexam'>
							<div class='cauhoi' id='ch".$i."'>
								Câu hỏi <b>".$i."</b>: ".$dt3['mabode']." - Mã câu hỏi: ".$dt2['macauhoi']." - Mức độ: ".$dt3['mucdo']."
							</div>";
							echo "<div class='tencauhoi'>";
							echo $dt3['tencauhoi'];
							if (!empty($dt3['imgviauTencauhoi'])) reg($dt3['imgviauTencauhoi'],"imgcauhoi");
							echo "</div>";
							echo "
								<div class='dapan'>
									<table border='1' class='tabledapan'>
										<tr style='background:lavender;'>
											<th style='color:blue'>Câu trả lời của bạn</th>
											<th style='color:blue'>Câu trả lời đúng</th>
										</tr>
										<tr>
											<td style='color:blue;background:white;'>"."<label><input type='radio' id='tcau".$i."' name='caus".$i."' checked>".$dt2['pachon'].". ".$dt3['padung']."";
											echo "<div>";
											if (!empty($dt3['imgviauPadung']))
												reg($dt3['imgviauPadung'],"imgdapan");
											echo "</div>";
											echo "</label>"."<img src='../image/approve.png' style='padding-left:25px;'></td>
											<td style='background:white;'>"."<label><input type='radio' id='tcau".$i."' name='caud".$i."' checked>".$dt2['padung'].". ".$dt3['padung']."";
											echo "<div>";
											if (!empty($dt3['imgviauPadung']))
												reg($dt3['imgviauPadung'],"imgdapan");
											echo "</div>";
											echo "</label>"."</td>
										</tr>
									</table>
								</div>
						</div>";
				}
				else
					if ($dt2['temp']==NULL){
						echo "
						<div class='areaexam'>
							<div class='cauhoi' id='ch".$i."'>
								Câu hỏi <b>".$i."</b>: ".$dt3['mabode']." - Mã câu hỏi: ".$dt2['macauhoi']." - Mức độ: ".$dt3['mucdo']."
							</div>";
							echo "<div class='tencauhoi'>";
							echo $dt3['tencauhoi'];
							if (!empty($dt3['imgviauTencauhoi'])) reg($dt3['imgviauTencauhoi'],"imgcauhoi");
							echo "</div>";
							echo "
								<div class='dapan'>
									<table border='1' class='tabledapan'>
										<tr style='background:lavender;'>
											<th style='color:blue'>Câu trả lời của bạn</th>
											<th style='color:blue'>Câu trả lời đúng</th>
										</tr>
										<tr>
											<td style='background:rgba(23,15,90); color:red;'><label>Bạn không trả lời câu hỏi này</label></td>
											<td style='background:white;'>"."<label><input type='radio' id='tcau".$i."' name='caud".$i."' checked>".$dt2['padung'].". ".$dt3['padung']."";
											echo "<div>";
											if (!empty($dt3['imgviauPadung']))
												reg($dt3['imgviauPadung'],"imgdapan");
											echo "</div>";
											echo "</label>"."</td>
										</tr>
									</table>
								</div>
						</div>";
				}
				else {
					$string=substr($dt2['pachon'],3);
					if ($string==$dt3['pasai1']) $teo=$dt3['imgviauPasai1'];
						else if ($string==$dt3['pasai2']) $teo=$dt3['imgviauPasai2'];
							else if ($string==$dt3['pasai3']) $teo=$dt3['imgviauPasai3'];
					echo "
						<div class='areaexam'>
							<div class='cauhoi' id='ch".$i."'>
								Câu hỏi <b>".$i."</b>: ".$dt3['mabode']." - Mã câu hỏi: ".$dt2['macauhoi']." - Mức độ: ".$dt3['mucdo']."
							</div>";	
								echo "<div class='tencauhoi'>";
								echo $dt3['tencauhoi'];
								if (!empty($dt3['imgviauTencauhoi'])) reg($dt3['imgviauTencauhoi'],"imgcauhoi");
								echo "</div>";
							echo "
								<div class='dapan'>
									<table border='1' class='tabledapan'>
										<tr style='background:lavender;'>
											<th style='color:blue'>Câu trả lời của bạn</th>
											<th style='color:blue'>Câu trả lời đúng</th>
										</tr>
										<tr>
											<td style='color:red;'>"."<label><input type='radio' id='tcau".$i."' name='caus".$i."' checked>".$dt2['pachon']."";
											echo "<div>";
												if (!empty($teo))
													reg($teo,"imgdapan");
												echo "</div>";
											echo "</label>"."<img src='../image/false.png' style='padding-left:25px;'></td>
											<td style='background:white;'>"."<label><input type='radio' id='tcau".$i."' name='caud".$i."' checked>".$dt2['padung'].". ".$dt3['padung']."";
											echo "<div>";
											if (!empty($dt3['imgviauPadung']))
												reg($dt3['imgviauPadung'],"imgdapan");
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
</div>