<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quản lý hệ thống</title>
    <link rel="shortcut icon" href="../image/icon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/batdau.js"></script>
    <script>
		$(document).ready(function(e){
			$("#li6").click(function(e){
				$(".loadchinh").css("display","block");
				$(".load5").css("display","none");
				$(".load6").css("display","none");
				$(".loadchinh").load("exportdiem.php");
			});
		
			$("#li4").click(function(e) {
				$(".loadchinh").css("display","block");
				$(".load5").css("display","none");
				$(".load6").css("display","none");
				$(".loadchinh").load("remote.php");
 			});
			$("#li7").click(function(e) {
				$(".loadchinh").css("display","block");
				$(".load5").css("display","none");
				$(".load6").css("display","none");
				$(".loadchinh").load("detailtest.php");
 			});
		});
	</script>
    <link rel="stylesheet" href="../style/batdau.css" type="text/css">
</head>

<body>
	<div class="main">
    	<div class="left">
        	<div class="p1">
           	Xin chào <?php echo "<span style='color:#fa3e3e;font-size:16px;'>"; echo $_SESSION['admin']; echo "</span>";?> </div>
            <div class="kythi">
            	<div class="p1">
                	CHỌN KỲ THI
                </div>
                <div class="p2">
                	<table class="tbm" border="1">
                    	<?php
							require("../config.php");
							mysqli_set_charset($connect,"utf8");
							$kythi=mysqli_query($connect,"select makythi,tenkythi from kythi");
							$i=0;
							while ($t=mysqli_fetch_array($kythi)){
								echo "<tr>";
								echo "<td class='kthi".$i."' onClick='show(\"kthi".$i."\");'>".$t['tenkythi']."</td>";
								echo "</tr>";
								$i++;
							}
						?>
                    </table>
                </div>
            </div>
            <div class="load1">
            </div>
        </div>
        
        <div class="right">
            <div class="load2">
            	<div class="menu">
                    <ul>
                    	<li id='li3'>Quản trị kỳ thi, môn thi</li>
                        <li id='li1'>Quản lý học viên</li>
                        <li id='li9'>Soạn đề thi</li>
                        <li id='li5'>Phân quyền thi</li>
                        <li id='li8'>Soạn cấu trúc đề</li>
                        <li id='li6'>Điểm thi</li>
                        <li id='li7'>Chi tiết bài thi</li>
                        <li id='li4'>Tình trạng thi</li>
                    </ul>
            	</div>
            </div>
          	<div class="loadchinh">
        	</div>
            
            <div class="load5">
            <hr>
            <p style="color:blue; margin-left:3.1em;">Thêm danh sách học viên bằng file excel</p>
        	<form id="upload" method="post" enctype="multipart/form-data">
    			<input type="file" id="uploads" name="upf" title="Chọn file Excel" style="background:blue;cursor:pointer;border-radius:1px;width:30%;height:1.8em;color:white;z-index:1000;opacity:0;">
                 <p style="background:rgba(100%,40%,20%,1);cursor:pointer;border-radius:1px;width:31.5%;height:1.8em;color:white;display:block;margin:auto;margin-top:-1.8em; text-align:center;">Chọn tệp excel (*.xlsx)</p>
                <input type="submit" name="clickup" id="Submit" value="Tải lên" title="Nhấn để tải lên" style="margin-top:2em; border:none; background:blue;cursor:pointer; color:white; width:80%; height:1.5em;">
    		</form>
            <?php
				if (isset($_POST['clickup']))
				{
					if (isset($_FILES['upf']))
					{
						$fname=$_FILES['upf']['tmp_name'];
						include("PHPExcel/IOFactory.php");
						$objectPHPExcel=PHPExcel_IOFactory::load($fname);
						foreach ($objectPHPExcel->getWorksheetIterator() as $worksheet)
						{
							$highestrow=$worksheet->getHighestRow();
							for ($row=2;$row<=$highestrow;$row++)
							{
								$sbd=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(0,$row)->getValue());
								$hodem=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(1,$row)->getValue());
								$ten=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(2,$row)->getValue());
								$ns=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(3,$row)->getValue());
								$noisinh=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(4,$row)->getValue());
								$madonvi=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(5,$row)->getValue());
								$tendonvi=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(6,$row)->getValue());
								$tenphong=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(7,$row)->getValue());
								
								$hodem=str_replace("'","&#39;",$hodem);
                                $sbd=str_replace("'","&#39;",$sbd);
                                $ten=str_replace("'","&#39;",$ten);
                                $ns=str_replace("'","&#39;",$ns);
                                $noisinh=str_replace("'","&#39;",$noisinh);
                                $madonvi=str_replace("'","&#39;",$madonvi);
                                $tendonvi=str_replace("'","&#39;",$tendonvi);
								$tenphong=str_replace("'","&#39;",$tenphong);
								
								if ($sbd=="") break;
								$matkhau="N";
								$i=1;
								while ($i<=5)
								{
									$matkhau.=rand(0,9);
									$i++;
								}
								
								$tempmk=$matkhau;
								$matkhau=md5($matkhau);
								$kt=$_SESSION['kythi'];
								$dv=mysqli_query($connect,"select madonvi,tendonvi from DONVI where madonvi='$madonvi'");
								$sqlts="insert into HOCVIEN (sbd,hodem,ten,ngaysinh,noisinh,makythi,madonvi,tenphongthi,matkhau)
										values ('$sbd','$hodem','$ten','$ns','$noisinh','$kt','$madonvi','$tenphong','$matkhau')";
								if (mysqli_num_rows($dv)>0){
									if (mysqli_query($connect,$sqlts)){
										mysqli_query($connect,"insert into MATKHAU(sbd,matkhau) values ('$sbd','$tempmk')");
										$monthi=mysqli_query($connect,"select mamodun from modun where makythi='$kt'");
										while ($r=mysqli_fetch_array($monthi)){
											mysqli_query($connect,"insert into allowexam(sbd,mamodun,allow) values ('$sbd','".$r['mamodun']."','C')");
										}
									}
								}
								else
								{
									$sqldv="insert into donvi (madonvi,tendonvi)
										values ('$madonvi','$tendonvi')";
									mysqli_query($connect,$sqldv);
									
									if (mysqli_query($connect,$sqlts)){
										mysqli_query($connect,"insert into MATKHAU(sbd,matkhau) values ('$sbd','$tempmk')");
										$monthi=mysqli_query($connect,"select mamodun from modun where makythi='$kt'");
										while ($r=mysqli_fetch_array($monthi)){
											mysqli_query($connect,"insert into allowexam(sbd,mamodun,allow) values ('$sbd','".$r['mamodun']."','C')");
										}
									}
								}
							}
						}
					}
				}
			?>
            </div>
            
            <div class="load6">
                <div class="addByExcel">
                    <p style="background:rgba(100%,40%,20%,1); cursor:pointer; border-radius:4px; width:100%; height:2.2em; color:white; display:block; margin:auto; margin-top:1em; padding-top:0.5em; z-index:1;">Thêm câu hỏi bằng file excel</p>
                    <form id="upcauhoi" method="post" enctype="multipart/form-data" style="margin-top:-2.6em;">
                        <input type="file" id="uploacauhoi" name="upch" title="Click chọn file excel" style="cursor:pointer;opacity:0; background:red; width:100%; height:3.2em; margin-top:-6.2em; z-index:1000;">
                        <input type="submit" name="clickup" id="Submit" value="Tải lên" title="Click tải lên" style="margin-top:2em; border:none; background:blue;cursor:pointer; color:white; width:80%; height:1.5em;">
                    </form>
                    
                    <?php
                        if (isset($_POST['clickup']))
                        {
                            if (isset($_FILES['upch']))
                            {
                                if ($_FILES['upch']['tmp_name']!=="")
                                {
                                    $fname=$_FILES['upch']['tmp_name'];
                                    include("PHPExcel/IOFactory.php");
                                    $objectPHPExcel=PHPExcel_IOFactory::load($fname);
                                    foreach ($objectPHPExcel->getWorksheetIterator() as $worksheet)
                                    {
                                        $highestrow=$worksheet->getHighestRow();
                                        for ($row=2;$row<=$highestrow;$row++)
                                        {
                                            $macauhoi=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(0,$row)->getValue());
                                            $tencauhoi=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(1,$row)->getValue());
                                            $padung=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(2,$row)->getValue());
                                            $pasai1=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(3,$row)->getValue());
                                            $pasai2=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(4,$row)->getValue());
                                            $pasai3=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(5,$row)->getValue());
                                            $mucdo=mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(6,$row)->getValue());
											
                                            $macauhoi=str_replace("'","&#39;",$macauhoi);
                                            $tencauhoi=str_replace("'","&#39;",$tencauhoi);
                                            $padung=str_replace("'","&#39;",$padung);
                                            $pasai1=str_replace("'","&#39;",$pasai1);
                                            $pasai2=str_replace("'","&#39;",$pasai2);
                                            $pasai3=str_replace("'","&#39;",$pasai3);
                                            $mucdo=str_replace("'","&#39;",$mucdo);
											
                                            if ($macauhoi==="") break;
                                            if (isset($_SESSION['mapthi'])) $mapthi=$_SESSION['mapthi']; else die("Error...");
                                            $sqlts="insert into CAUHOI (macauhoi,tencauhoi,padung,pasai1,pasai2,pasai3,mucdo,mabode) 
                                                values ('$macauhoi','$tencauhoi','$padung','$pasai1','$pasai2','$pasai3','$mucdo','$mapthi')";
                                            if (!mysqli_query($connect,$sqlts)){echo "false"; echo mysqli_error($connect);}echo mysqli_error($connect);
                                        }
                                    }
                                }
                            }
                        }
                    ?>
                    
                </div>
            </div>
            
        </div>
        
    </div>
</body>
</html> 