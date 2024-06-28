<?php
	session_start();
	if (isset($_SESSION['sbd'])) $sbd=$_SESSION['sbd'];
	else echo "<script>window.location='index.php';</script>";
	#------------------------------------------------------------------------------------------------------------------------#
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	require("config.php");
	mysqli_set_charset($connect,'utf8');
	#------------------------------------------------------------------------------------------------------------------------#
	$tenmonthi=$_GET['ID'];
	$mamonthi=$_SESSION['modunid'];
	$t1=mysqli_query($connect,"SELECT dethisinh.macauhoi as macauhoi, dethisinh.padung as padung FROM dethisinh, cauhoi, modun, bode WHERE cauhoi.macauhoi=dethisinh.macauhoi and cauhoi.mabode= bode.mabode and bode.mamodun=modun.mamodun and modun.mamodun='$mamonthi' and dethisinh.sbd='$sbd'");
	$t2=mysqli_query($connect,"select timeconlai from diem where (sbd='$sbd') and (mamodun='$mamonthi')");
	$time=mysqli_fetch_array($t2,MYSQLI_ASSOC);
	mysqli_free_result($t2);
	#------------------------------------------------------------------------------------------------------------------------#
	if ($time['timeconlai']>=0&&mysqli_num_rows($t1)>0){}
	else
		if (isset($_SESSION['time12'])){
			$ip=$_SERVER['REMOTE_ADDR'];
			mysqli_query($connect,"insert into diem(sbd,mamodun) values('$sbd','$mamonthi')");
			mysqli_query($connect,"insert into remote(sbd,mamodun,ipaddress,estatus) values('$sbd','$mamonthi','$ip','Đang thi')");
			$get=$_GET['fx'];
			$time_add=date("Y-m-d H:i:s",$get);
			mysqli_query($connect,"update diem set timeconlai='".($_SESSION['time12']*60)."',
			thoigianthi='".$time_add."' where (sbd='$sbd') and (mamodun='$mamonthi')");
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Làm bài thi</title>
    <link rel="shortcut icon" href="image/icon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style/exam.css" type="text/css"/>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/exam.js"></script>  
</head>

<body>
	<!--<div class="examcontent">-->
    	<!--Phần danh sách câu hỏi-->
    <div class="divmain">
        <div class="examcontent_p1">            
            <?php
            	$timedt=mysqli_query($connect,"select timeconlai from DIEM where (sbd='$sbd') and (mamodun='$mamonthi')");
            	$r=mysqli_fetch_array($timedt,MYSQLI_ASSOC);mysqli_free_result($timedt);
            ?>
                <script>
					var t=setInterval(function () {run();},1000);
                    var hour,minute,second,temp1,temp=<?php echo $r['timeconlai'];?>;
                    function run(){
						temp1=temp;
						hour=format(parseInt(temp/3600));
						temp=temp%3600;
						minute=format(parseInt(temp/60));
						temp=temp%60;
						second=format(temp);
						//console.log(hour+":"+minute+":"+second);
						temp=--temp1;
						if (temp%10==0){
							$.ajax({
								type: 'POST',
								url: 'savetime.php',
								data: {time:temp},
								success: function(data){}
							});
						}
						
                        if (temp<=0)
                        {
                            clearInterval(t);
							var tg=parseInt(new Date().getTime()/1000);
							$.ajax({
								type: 'post',
								url: "savetimeend.php",
								data:{time:temp,tg:tg},
								success: function(e){
									window.examtest.submit();
								}
							});
                        }
                        document.getElementById("clock").innerHTML=hour+":"+minute+":"+second;
                    }
					
					function chamdiem()
					{
						if (confirm("Sau khi xác nhận kết thúc bạn sẽ không thể thay đổi bài làm! Bạn có chắc chắn muốn kết thúc bài thi?")){
							var tg= parseInt((new Date().getTime())/1000);
							$.ajax({
								type: 'post',
								url: "savetimeend.php",
								data:{time:temp,tg:tg},
								success: function(e){
									//alert(e);
									window.examtest.submit();
								}
							});
						}
					}
					
                    function format(d){
                        return (d<10?'0':'')+d;
                    }
                </script>
            
            <div id="timer">
            	<img src="image/clock.png" height="38" width="38" style="margin-left:1em;float:left;"/>
				<div id="clock" style="color:mediumseagreen;margin-top:0.1em; margin-left:4.5em;font-size:25px;font-weight:bold;"></div><!--Hiển thị thời gian còn lại-->
            </div>
            <div class="dscauhoi">
            	<div class='hellomem' style='width:100%; height:2em;'>
					<div style='padding-top:0.5em;padding-left:0.5em;font-size:14px;color:orangered;width:97.5%; height:1.8em;'>Danh sách câu hỏi</div>
				</div>
                <div class="maincauhoi" style="width:100%;height:8em;overflow:auto;">
                <?php
					for ($i=1;$i<=$_SESSION['tongcauhoi'];$i++)
					{
               			echo "<div class='socau' id='s".$i."' onClick=\"scrollToAnchor('ch".$i."');\">".$i."
                		</div>";
					}
				?>
                </div>
                <br>
                <div style="font-weight:bold; font-size:14px;margin-bottom:0.8em; margin-left:0.6em;"><i><u>Chú ý:</u></i></div>
                <div style="font-size:13px;margin-left:0.6em;">- Màu đen: Câu hỏi chưa trả lời.</div>
                <div style="font-size:13px;margin-left:0.6em;">- Màu xanh: Câu hỏi đã trả lời.</div>
            </div>
            
				<div style='margin-left:0.25em;'>
				<div class='chitiet' style='width:100%; height:inherit; margin-top:1.2em;'>
                	<?php
						$profile=mysqli_query($connect,"select profile from hocvien where sbd='$sbd'");
						$profilei=mysqli_fetch_array($profile,MYSQLI_ASSOC);
						mysqli_free_result($profile);
						$target="upload/imgthisinh/".$profilei['profile'];
						echo "<img src='$target' style='margin:auto; display:block; width:55%; height:11em;'>";
					?>
                	
						<div class='hoten' style='width:100%;font-size:14px;'>
                            <div style='padding-top:1em;padding-left:0em;color:black;width:100%; height:1.7em;'>
                                <span style='margin-left:1em;'>Họ và tên:&nbsp;</span>
                                <span style="color:rgba(255,102,51,1);"><b><?php echo $_SESSION['hodem']." ".$_SESSION['ten'];?></b></span>
                            </div>
						</div>
                        
						<div class='sobd' style='width:100%;font-size:14px;'>
                            <div style='padding-top:0.1em;padding-left:0em;color:black;width:100%; height:1.7em;'>
                                <span style='margin-left:1em;'>Số báo danh:&nbsp;</span>
                                <span style="color:rgba(255,102,51,1);"><b><?php echo $sbd;?></b></span>
                            </div>
						</div>
				</div>
				</div>
                <input id="submit" style="margin:auto;display:block;margin-top:0.8em;margin-bottom:0.6em;background:mediumseagreen;border:none;color:white;font-weight:bold;padding:10px 45px;cursor:pointer;" type="submit" value="Nộp bài" onClick="chamdiem();">
        </div>
        <!--End phần danh sách câu hỏi-->
        
        <!--Phần câu hỏi-->
        <div class="examcontent_p2">  	
        	<form method='post' name='examtest' action="report.php">
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
					if ($st1!=""){
						$str=$st1;
						$extend=str($str);
						
						//.bmp.exr.gif.ico.jp2.jpeg.pbm.pcx.pgm.png.ppm.psd. tiff.tga : Các định dạng file ảnh
						if ($extend=='.bmp'||$extend=='.exr'||$extend=='.gif'||$extend=='.ico'||$extend=='.jp2'||$extend=='.jpeg'||$extend=='.jpg'||$extend=='.pbm'||$extend=='.pcx'||$extend=='.pgm'||$extend=='.png'||$extend=='.ppm'||$extend=='.psd'||$extend=='.tiff'||$extend=='.tga')
						{
							echo "<br><img src='../upload/".$st3."/".$st1."' width='600' height='400' style='margin-top:0.6em;'>";
						}
						
						//.3gp.avi.flv.m4v.mkv.mov.mp4.mpeg.ogv.wmv.webm : các định dạng file video
						else
							if ($extend=='.3gp'||$extend=='.avi'||$extend=='.flv'||$extend=='.m4v'||$extend=='.mkv'||$extend=='.mov'||$extend=='.mp4'||$extend=='.mpeg'||$extend=='.ogv'||$extend=='.wmv'||$extend=='.webm'){
								$sstemp=substr($extend,1);
								echo "<br>
									<video width='400' height='300' controls style='margin:0;'>
									<source src='../upload/".$st3."/".$st1."' type='video/".$sstemp."'>
									</video>
								";
							}
						//.aac.ac3.aiff.amr.ape.au.flac.m4a.mka.mp3.mpc.ogg. ra.wav.wma các định dạng audio
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
				} //End function
					
					if (mysqli_num_rows($t1)>0&&$time['timeconlai']>0) //Trường hợp bài đang làm dở.
					{
						$i=0; $j=1;
						$dapan=array();
						$dapan=$_SESSION['mangdapan'];
						$cauhoi=array();
						$cauhoi=$_SESSION['mangdethi'];
						
						while ($i<$_SESSION['tongcauhoi'])
						{
							$macauhoi=$cauhoi[$i];
							$h=mysqli_query($connect,"SELECT * FROM CAUHOI Where macauhoi='$macauhoi'");
							$cdata=mysqli_fetch_array($h,MYSQLI_ASSOC);
							mysqli_free_result($h);
							$temp=mysqli_query($connect,"SELECT temp FROM dethisinh where sbd='$sbd' and macauhoi='$macauhoi'");
							$tempr=mysqli_fetch_array($temp,MYSQLI_ASSOC);
							mysqli_free_result($temp);
							$cdata['tencauhoi']=str_replace("<","&lt;",$cdata['tencauhoi']);
							$cdata['padung']=str_replace("<","&lt;",$cdata['padung']);
							$cdata['pasai1']=str_replace("<","&lt;",$cdata['pasai1']);
							$cdata['pasai2']=str_replace("<","&lt;",$cdata['pasai2']);
							$cdata['pasai3']=str_replace("<","&lt;",$cdata['pasai3']);
							$cdata['tencauhoi']=str_replace(">","&gt;",$cdata['tencauhoi']);
							$cdata['padung']=str_replace(">","&gt;",$cdata['padung']);
							$cdata['pasai1']=str_replace(">","&gt;",$cdata['pasai1']);
							$cdata['pasai2']=str_replace(">","&gt;",$cdata['pasai2']);
							$cdata['pasai3']=str_replace(">","&gt;",$cdata['pasai3']);
							echo "
								<div class='areaexam'>
									<div class='cauhoi' id='ch".($i+1)."'>
										Câu hỏi <b>".($i+1)."</b>:
									</div>";
							echo "<div class='tencauhoi'>";
							echo $cdata['tencauhoi'];
							if (!empty($cdata['imgviauTencauhoi'])) reg($cdata['imgviauTencauhoi'],"imgcauhoi");
							echo "</div>";
							
							$ran=$dapan[$i+1];
							if (($i+1)<10) $ii='0'.($i+1); else $ii=$i+1;
							if ($ran==1)
							{
								if ($tempr['temp']=='A')
								{
									echo "
										<script>fillBackground('s".($i+1)."');</script>
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A' checked>&nbsp;A. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>";
										$j++;
										echo "
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\">
										<input class='choose".($i+1)."' onClick='writechoose(\"choose".($i+1)."\");' onClick=\"tick('tcau".($i+1)."')\" type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai1']."'>&nbsp;B. ".$cdata['pasai1']."</label><br>";
										if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
										echo "</div>"; $j++;
										echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai2']."'>&nbsp;C. ".$cdata['pasai2']."</label><br>";
										if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
										echo "</div>"; $j++; echo "
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai3']."'>&nbsp;D. ".$cdata['pasai3']."</label>";
										if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
										echo "</div>
										</div>
									</div>";
									$j++;
								}
								else
									if ($tempr['temp']=='B')
									{
										echo "
										<script>fillBackground('s".($i+1)."');</script>
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A'>&nbsp;A. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>"; $j++; 
									echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai1']."' checked>&nbsp;B. ".$cdata['pasai1']."</label><br>";
									if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
									echo "</div>"; $j++; echo "
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai2']."'>&nbsp;C. ".$cdata['pasai2']."</label><br>";
										if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
										echo "</div>"; $j++;
									echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai3']."'>&nbsp;D. ".$cdata['pasai3']."</label>";
										if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
									echo "</div>
										</div>
										</div>";
										$j++;
								}
								else
									if ($tempr['temp']=='C')
									{
										echo "
										<script>fillBackground('s".($i+1)."');</script>
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A'>&nbsp;A. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>"; $j++; 
									echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai1']."'>&nbsp;B. ".$cdata['pasai1']."</label><br>";
									if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai2']."' checked>&nbsp;C. ".$cdata['pasai2']."</label><br>";
									if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai3']."'>&nbsp;D. ".$cdata['pasai3']."</label>";
									if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
									echo "</div>
										</div>
									</div>";
									$j++;
								}
								else
								if ($tempr['temp']=='D')
									{
										echo "
										<script>fillBackground('s".($i+1)."');</script>
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A'>&nbsp;A. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai1']."'>&nbsp;B. ".$cdata['pasai1']."</label><br>";
										if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
										echo "</div>";
										$j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai2']."'>&nbsp;C. ".$cdata['pasai2']."</label><br>";
										if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai3']."' checked>&nbsp;D. ".$cdata['pasai3']."</label>";
										if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
										echo "</div>
										</div>
									</div>";
									$j++; //sleep
								}
								else
								{
									echo "
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A'>&nbsp;A. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\">
<input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai1']."'>&nbsp;B. ".$cdata['pasai1']."</label><br>";
	if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan"); echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai2']."'>&nbsp;C. ".$cdata['pasai2']."</label><br>";
	if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan"); echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai3']."'>&nbsp;D. ".$cdata['pasai3']."</label>";
	if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan"); echo "</div>
										</div>
									</div>";
									$j++;
								}
							} 
							else //trường hợp đặt đáp án đúng là B
								if ($ran==2)
								{
									if ($tempr['temp']=='A')
									{
										echo "
										<script>fillBackground('s".($i+1)."');</script>
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai1']."' checked>&nbsp;A. ".$cdata['pasai1']."</label><br>";
										if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B'>&nbsp;B. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai3']."'>&nbsp;C. ".$cdata['pasai3']."</label><br>";
										if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
										echo "</div>";
$j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai2']."'>&nbsp;D. ".$cdata['pasai2']."</label>";
										if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan"); echo "</div>
										</div>
									</div>";
									$j++;
									}
									else if ($tempr['temp']=='B')
									{
										echo "
										<script>fillBackground('s".($i+1)."');</script>
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai1']."'>&nbsp;A. ".$cdata['pasai1']."</label><br>";
										if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B' checked>&nbsp;B. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai3']."'>&nbsp;C. ".$cdata['pasai3']."</label><br>";
										if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai2']."'>&nbsp;D. ".$cdata['pasai2']."</label>";
										if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
										echo "</div>
										</div>
									</div>";
									$j++;
									}
									else if ($tempr['temp']=='C')
									{
										echo "
										<script>fillBackground('s".($i+1)."');</script>
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai1']."'>&nbsp;A. ".$cdata['pasai1']."</label><br>";
										if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B'>&nbsp;B. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai3']."' checked>&nbsp;C. ".$cdata['pasai3']."</label><br>";
										if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai2']."'>&nbsp;D. ".$cdata['pasai2']."</label>";
										if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
										echo "</div>
										</div>
									</div>";
									$j++;
									}
									else if ($tempr['temp']=='D')
									{
										echo "
										<script>fillBackground('s".($i+1)."');</script>
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai1']."'>&nbsp;A. ".$cdata['pasai1']."</label><br>";
										if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B'>&nbsp;B. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai3']."'>&nbsp;C. ".$cdata['pasai3']."</label><br>";
										if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai2']."' checked>&nbsp;D. ".$cdata['pasai2']."</label>";
										if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
										echo "</div>
										</div>
									</div>";
									$j++;
									}
									else
									{
										echo "
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai1']."'>&nbsp;A. ".$cdata['pasai1']."</label><br>";
										if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B'>&nbsp;B. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai3']."'>&nbsp;C. ".$cdata['pasai3']."</label><br>";
										if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai2']."'>&nbsp;D. ".$cdata['pasai2']."</label>";
										if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
										echo "</div>
										</div>
									</div>";
									$j++;
									}
								}
								else
								if ($ran==3)
								{
									if ($tempr['temp']=='A')
									{
										echo "
										<script>fillBackground('s".($i+1)."');</script>
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai3']."' checked>&nbsp;A. ".$cdata['pasai3']."</label><br>";
										if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai2']."'>&nbsp;B. ".$cdata['pasai2']."</label><br>";
										if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C'>&nbsp;C. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai1']."'>&nbsp;D. ".$cdata['pasai1']."</label>";
										if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
										echo "</div>
										</div>
									</div>";
									$j++;
									}
									else if ($tempr['temp']=='B')
									{
										echo "
										<script>fillBackground('s".($i+1)."');</script>
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai3']."'>&nbsp;A. ".$cdata['pasai3']."</label><br>";
										if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai2']."' checked>&nbsp;B. ".$cdata['pasai2']."</label><br>";
										if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C'>&nbsp;C. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai1']."'>&nbsp;D. ".$cdata['pasai1']."</label>";
										if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
										echo "</div>
										</div>
									</div>";
									$j++;
									}
									else if ($tempr['temp']=='C')
									{
										echo "
										<script>fillBackground('s".($i+1)."');</script>
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai3']."'>&nbsp;A. ".$cdata['pasai3']."</label><br>";
										if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai2']."'>&nbsp;B. ".$cdata['pasai2']."</label><br>";
										if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C' checked>&nbsp;C. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai1']."'>&nbsp;D. ".$cdata['pasai1']."</label>";
										if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
										echo "</div>
										</div>
									</div>";
									$j++;
									}
									else if ($tempr['temp']=='D')
									{
										echo "
										<script>fillBackground('s".($i+1)."');</script>
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai3']."'>&nbsp;A. ".$cdata['pasai3']."</label><br>";
										if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai2']."'>&nbsp;B. ".$cdata['pasai2']."</label><br>";
										if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C'>&nbsp;C. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai1']."' checked>&nbsp;D. ".$cdata['pasai1']."</label>";
										if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
										echo "</div>
										</div>
									</div>";
									$j++;
									}
									else
									{
										echo "
										<div class='dapan'>
										<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai3']."'>&nbsp;A. ".$cdata['pasai3']."</label><br>";
										if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai2']."'>&nbsp;B. ".$cdata['pasai2']."</label><br>";
										if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C'>&nbsp;C. ".$cdata['padung']."</label><br>";
										if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
										echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai1']."'>&nbsp;D. ".$cdata['pasai1']."</label>";
										if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
										echo "</div>
										</div>
									</div>";
									$j++;
									}
								}
								else
								if ($ran==4)
								{
									if ($tempr['temp']=='A')
									{
									echo "
									<script>fillBackground('s".($i+1)."');</script>
									<div class='dapan'>
									<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai2']."' checked>&nbsp;A. ".$cdata['pasai2']."</label><br>";
									if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai1']."'>&nbsp;B. ".$cdata['pasai1']."</label><br>";
									if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai3']."'>&nbsp;C. ".$cdata['pasai3']."</label><br>";
									if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D'>&nbsp;D. ".$cdata['padung']."</label>";
									if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
									echo "</div>
									</div>
								</div>";
								$j++;
									}
									else if ($tempr['temp']=='B')
									{
									echo "
									<script>fillBackground('s".($i+1)."');</script>
									<div class='dapan'>
									<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai2']."'>&nbsp;A. ".$cdata['pasai2']."</label><br>";
									if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai1']."' checked>&nbsp;B. ".$cdata['pasai1']."</label><br>";
									if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai3']."'>&nbsp;C. ".$cdata['pasai3']."</label><br>";
									if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D'>&nbsp;D. ".$cdata['padung']."</label>";
									if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
									echo "</div>
									</div>
								</div>";
								$j++;
									}
									else if ($tempr['temp']=='C')
									{
									echo "
									<script>fillBackground('s".($i+1)."');</script>
									<div class='dapan'>
									<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");'  style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai2']."'>&nbsp;A. ".$cdata['pasai2']."</label><br>";
									if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai1']."'>&nbsp;B. ".$cdata['pasai1']."</label><br>";
									if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai3']."' checked>&nbsp;C. ".$cdata['pasai3']."</label><br>";
									if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D'>&nbsp;D. ".$cdata['padung']."</label>";
									if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
									echo "</div>
									</div>
								</div>";
								$j++;
									}
									else if ($tempr['temp']=='D')
									{
									echo "
									<script>fillBackground('s".($i+1)."');</script>
									<div class='dapan'>
									<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai2']."'>&nbsp;A. ".$cdata['pasai2']."</label><br>";
									if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai1']."'>&nbsp;B. ".$cdata['pasai1']."</label><br>";
									if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai3']."'>&nbsp;C. ".$cdata['pasai3']."</label><br>";
									if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D' checked>&nbsp;D. ".$cdata['padung']."</label>";
									if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
									echo "</div>
									</div>
								</div>";
								$j++;
									}
									else 
									{
									echo "
									<div class='dapan'>
									<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai2']."'>&nbsp;A. ".$cdata['pasai2']."</label><br>";
									if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai1']."'>&nbsp;B. ".$cdata['pasai1']."</label><br>";
									if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai3']."'>&nbsp;C. ".$cdata['pasai3']."</label><br>";
									if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
									echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D'>&nbsp;D. ".$cdata['padung']."</label>";
									if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
									echo "</div>
									</div>
								</div>";
								$j++;
									}
								}					
							$i++;
						}
					}
					else  //Trường hợp thi mới.
					{
					$i=0;
					$dapan=array();
					$dapan=$_SESSION['mangdapan'];
					$cauhoi=array();
					$cauhoi=$_SESSION['mangdethi']; //Lấy mảng chứa danh sách mã câu hỏi trong đề thi
					$j=1;
					while ($i<$_SESSION['tongcauhoi'])
					{
						$macauhoi=$cauhoi[$i];
						$h=mysqli_query($connect,"SELECT tencauhoi ,padung, pasai1, pasai2, pasai3, imgviauTencauhoi, imgviauPadung, imgviauPasai1, imgviauPasai2, imgviauPasai3 FROM CAUHOI Where macauhoi = '$macauhoi'");
						$cdata=mysqli_fetch_array($h,MYSQLI_ASSOC);
						mysqli_free_result($h);
						$cdata['tencauhoi']=str_replace("<","&lt;",$cdata['tencauhoi']);
						$cdata['padung']=str_replace("<","&lt;",$cdata['padung']);
						$cdata['pasai1']=str_replace("<","&lt;",$cdata['pasai1']);
						$cdata['pasai2']=str_replace("<","&lt;",$cdata['pasai2']);
						$cdata['pasai3']=str_replace("<","&lt;",$cdata['pasai3']);
						$cdata['tencauhoi']=str_replace(">","&gt;",$cdata['tencauhoi']);
						$cdata['padung']=str_replace(">","&gt;",$cdata['padung']);
						$cdata['pasai1']=str_replace(">","&gt;",$cdata['pasai1']);
						$cdata['pasai2']=str_replace(">","&gt;",$cdata['pasai2']);
						$cdata['pasai3']=str_replace(">","&gt;",$cdata['pasai3']);
						
						//Hiển thị số thứ tự câu hỏi
						echo "
							<div class='areaexam'>
    							<div class='cauhoi' id='ch".($i+1)."'>
        							Câu hỏi <b>".($i+1)."</b>:
        						</div>";
						//Hiển thị tên câu hỏi
						echo "<div class='tencauhoi'>";
						echo $cdata['tencauhoi'];
						if (!empty($cdata['imgviauTencauhoi'])) reg($cdata['imgviauTencauhoi'],"imgcauhoi");
						echo "</div>";
						
						$ran=$dapan[$i+1];
						if (($i+1)<10) $ii='0'.($i+1); else $ii=$i+1;
						if ($ran==1)
						{
							$sql="insert into DETHISINH(sbd,macauhoi,socau,padung,mamodun) values ('$sbd','$macauhoi','cau ".$ii."','A','$mamonthi')";
							mysqli_query($connect,$sql);
							echo "
        						<div class='dapan'>
        						<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A'>&nbsp;A. ".$cdata['padung']."</label><br>";
								if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
								echo "</div>";
								$j++;
							echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai1']."'>&nbsp;B. ".$cdata['pasai1']."</label><br>";
							if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
							echo "</div>"; $j++;
                			echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai2']."'>&nbsp;C. ".$cdata['pasai2']."</label><br>";
							if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
							echo "</div>"; $j++;
                			echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai3']."'>&nbsp;D. ".$cdata['pasai3']."</label>";
							if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
							echo "</div>
        						</div>
    						</div>";
							$j++;
						}
						else
							if ($ran==2)
							{
								$sql="insert into DETHISINH(sbd,macauhoi,socau,padung,mamodun) values ('$sbd','$macauhoi','cau ".$ii."','B','$mamonthi')";
								mysqli_query($connect,$sql);
								echo "
        						<div class='dapan'>
        						<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai1']."'>&nbsp;A. ".$cdata['pasai1']."</label><br>";
								if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
								echo "</div>";
								$j++;			
							echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B'>&nbsp;B. ".$cdata['padung']."</label><br>";
							if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
							echo "</div>"; $j++; echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai3']."'>&nbsp;C. ".$cdata['pasai3']."</label><br>";
							if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
							echo "</div>";
							$j++;
                			echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai2']."'>&nbsp;D. ".$cdata['pasai2']."</label>";
							if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
							echo "</div>
        						</div>
    						</div>";
							$j++;
							}
							else
							if ($ran==3)
							{
								$sql="insert into DETHISINH(sbd,macauhoi,socau,padung,mamodun) values ('$sbd','$macauhoi','cau ".$ii."','C','$mamonthi')";
								mysqli_query($connect,$sql);
								echo "
        						<div class='dapan'>
        						<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai3']."'>&nbsp;A. ".$cdata['pasai3']."</label><br>";
								if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
								echo "</div>";
								$j++;
							echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai2']."'>&nbsp;B. ".$cdata['pasai2']."</label><br>";
							if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
							echo "</div>";
							$j++;
                			echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C'>&nbsp;C. ".$cdata['padung']."</label><br>";
							if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
							echo "</div>"; $j++;
                			echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D. ".$cdata['pasai1']."'>&nbsp;D. ".$cdata['pasai1']."</label>";
							if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
							echo "</div>
        						</div>
    						</div>";
							$j++;
							}
							else
							if ($ran==4)
							{
								$sql="insert into DETHISINH(sbd,macauhoi,socau,padung,mamodun) values ('$sbd','$macauhoi','cau ".$ii."','D','$mamonthi')";
								mysqli_query($connect,$sql);
								echo "
        						<div class='dapan'>
        						<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='A. ".$cdata['pasai2']."'>&nbsp;A. ".$cdata['pasai2']."</label><br>";
								if (!empty($cdata['imgviauPasai2'])) reg($cdata['imgviauPasai2'],"imgdapan");
								echo "</div>";
								$j++;
							echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='B. ".$cdata['pasai1']."'>&nbsp;B. ".$cdata['pasai1']."</label><br>";
							if (!empty($cdata['imgviauPasai1'])) reg($cdata['imgviauPasai1'],"imgdapan");
							echo "</div>";
							$j++;
                			echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='C. ".$cdata['pasai3']."'>&nbsp;C. ".$cdata['pasai3']."</label><br>";
							if (!empty($cdata['imgviauPasai3'])) reg($cdata['imgviauPasai3'],"imgdapan");
							echo "</div>";
							$j++;
                			echo "<div class='choose".($j)."' onClick='writechoose(\"choose".($j)."\");' style='margin-bottom:0.6em;'><label onClick=\"fillBackground('s".($i+1)."')\"><input type='radio' id='tcau".($i+1)."' name='cau".($i+1)."' value='D'>&nbsp;D. ".$cdata['padung']."</label>";
							if (!empty($cdata['imgviauPadung'])) reg($cdata['imgviauPadung'],"imgdapan");
							echo "</div>
        						</div>
    						</div>";
							$j++;
							}				
						$i++;
					}
					}
					mysqli_free_result($t1);
					mysqli_close($connect);
				?>
    		</form>
            
        </div>
    </div>
        <!--End phần câu hỏi-->
    <!--</div>-->
</body>
</html>