<?php session_start(); if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>"; ?>
<?php
	#lấy danh sách câu hỏi theo mô đun
	if ($_POST){
		require_once('../config.php');
		mysqli_set_charset($connect,'utf8');
		$_SESSION['mapthi']=$_POST['pthi'];
		$cauhoi=mysqli_query($connect,"select * from CAUHOI where mabode='".$_POST['pthi']."'");
	}else echo"false";
?>

<style> .tabley{width:99%;margin-top:0.3em;border:1px solid rgba(136,136,136,0.8);} </style>

<script>
	$("tr").click(function(e) {
		$("input[id='macauhoi']").val($(this).children("td:eq(0)").text());
		$("input[id='tencauhoi']").val($(this).children("td:eq(1)").text());
		$("input[id='padung']").val($(this).children("td:eq(2)").text());
		$("input[id='pasai1']").val($(this).children("td:eq(3)").text());
		$("input[id='pasai2']").val($(this).children("td:eq(4)").text());
		$("input[id='pasai3']").val($(this).children("td:eq(5)").text());
		$("input[id='tl']").val($(this).children("td:eq(6)").text());
    });
</script>

<body>
<form method="post" action="" name='f'>
	<table class="tabley">
    	<tr style="color:rgba(255,153,0,1); margin-bottom:2em;">
        	<th style='width:7%;'>Mã câu hỏi</th>
            <th style='width:20%;'>Tên câu hỏi</th>
            <th style='width:15%;'>Phương án đúng</th>
            <th style='width:15%;'>Phương án sai 1</th>
            <th style='width:15%;'>Phương án sai 2</th>
            <th style='width:15%;'>Phương án sai 3</th>
            <th style='width:5%;'>Mức độ</th>
        </tr>        
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
				
				function reg($st1,$st2,$st3){
						if ($st1!=""){ //Load media phuog án sai 1
							$str=$st1;
							$extend=str($str);
							//.bmp.exr.gif.ico.jp2.jpeg.pbm.pcx.pgm.png.ppm.psd. tiff.tga : Các định dạng file ảnh
							if ($extend=='.bmp'||$extend=='.exr'||$extend=='.gif'||$extend=='.ico'||$extend=='.jp2'||$extend=='.jpeg'||$extend=='.jpg'||$extend=='.pbm'||$extend=='.pcx'||$extend=='.pgm'||$extend=='.png'||$extend=='.ppm'||$extend=='.psd'||$extend=='.tiff'||$extend=='.tga')
							{
								echo "<td>".$st2."<br> <img src='../upload/".$st3."/".$st1."' width='320' height='240' style='margin-top:0.6em;'></td>";
							}
							//.3gp.avi.flv.m4v.mkv.mov.mp4.mpeg.ogv.wmv.webm : các định dạng file video
							else
								if ($extend=='.3gp'||$extend=='.avi'||$extend=='.flv'||$extend=='.m4v'||$extend=='.mkv'||$extend=='.mov'||$extend=='.mp4'||$extend=='.mpeg'||$extend=='.ogv'||$extend=='.wmv'||$extend=='.webm'){
									$sstemp=substr($extend,1);
									echo "
										<td>".$st2."<br>
										<video width='320' height='240' controls>
										<source src='../upload/".$st3."/".$st1."' type='video/".$sstemp."'>
										</video>
										</td>
									";
							}
							//.aac.ac3.aiff.amr.ape.au.flac.m4a.mka.mp3.mpc.ogg. ra.wav.wma các định dạng audio
							else
								if ($extend=='.aac'||$extend=='.ac3'||$extend=='.aiff'||$extend=='.amr'||$extend=='.ape'||$extend=='.au'||$extend=='.flac'||$extend=='.m4a'||$extend=='.mka'||$extend=='.mp3'||$extend=='.mpc'||$extend=='.ogg'||$extend=='.ra'||$extend=='.wav'||$extend=='.wma'){
									$sstemp=substr($extend,1);
									echo "
										<td>".$st2."<br>
										<audio controls>
											<source src='../upload/".$st3."/".$st1."' type='audio/".$sstemp."'>
										</audio>
										</td>
									";
								}
								else echo "<td>".$st2."</td>";
						}
						else echo "<td>".$st2."</td>";
					}
				
				while ($r=mysqli_fetch_array($cauhoi))
				{
					$macauhoi=$r['macauhoi'];
					$tencauhoi=$r['tencauhoi'];
					$padung=$r['padung'];
					$pasai1=$r['pasai1'];
					$pasai2=$r['pasai2'];
					$pasai3=$r['pasai3'];
					$mucdo=$r['mucdo'];
					$macauhoi=str_replace("<","&lt;",$macauhoi);
					$tencauhoi=str_replace("<","&lt;",$tencauhoi);
					$padung=str_replace("<","&lt;",$padung);
					$pasai1=str_replace("<","&lt;",$pasai1);
					$pasai2=str_replace("<","&lt;",$pasai2);
					$pasai3=str_replace("<","&lt;",$pasai3);
					$mucdo=str_replace("<","&lt;",$mucdo);
					echo "<tr>";
					echo "
						<td>".$macauhoi."</td>";
						
						reg($r['imgviauTencauhoi'],$tencauhoi,"imgcauhoi");
						reg($r['imgviauPadung'],$padung,"imgdapan");
						reg($r['imgviauPasai1'],$pasai1,"imgdapan");
						reg($r['imgviauPasai2'],$pasai2,"imgdapan");
						reg($r['imgviauPasai3'],$pasai3,"imgdapan");
						
						echo "<td>".$mucdo."</td>";
					echo "</tr>";
				}
    		?>
	</table>
</form>
</body>