<?php
	#############################################################################
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_POST['monthi'])&&isset($_POST['hienthi'])){
		if ($_POST['hienthi']=="all")
			echo "<p style='padding-top:1em; font-weight:normal;'>Môn thi:<span style='color:blue;'> ".$_POST['monthi']."</span> || Hiển thị:<span style='color:blue;'> Tất cả</span></p>";
			else if ($_POST['hienthi']=="F")
				echo "<p style='padding-top:1em; font-weight:normal;'>
					Môn thi:<span style='color:blue;'> ".$_POST['monthi']."</span> || Hiển thị: <span style='color:blue;'>Không được thi</span></p>";
				else if ($_POST['hienthi']=="T")
					echo "<p style='padding-top:1em; font-weight:normal;'>Môn thi:<span style='color:blue;'> ".$_POST['monthi']." </span>|| Hiển thị: <span style='color:blue;'>Được thi</span></p>";
		
		require_once('../config.php');
		mysqli_set_charset($connect,'utf8');
		$value=$_POST['monthi'];
		$hienthi=$_POST['hienthi']; //tuy chon hien thi
		
		$mi=mysqli_query($connect,"select mamodun from modun where tenmodun='$value'");
		$rt3=mysqli_fetch_array($mi);
		
		$monthi=$rt3['mamodun']; //Lay ma mon thi
		
		if ($hienthi==="all"){ #Load tất cả thí sinh
			$dshvthi=mysqli_query($connect,"select hocvien.sbd as 'sbd',hodem,ten,hocvien.ngaysinh as ns,donvi.tendonvi as 'donvi',allowexam.allow as 'chothi' from hocvien,donvi,allowexam where (hocvien.madonvi=donvi.madonvi) and (hocvien.sbd=allowexam.sbd) and (allowexam.mamodun='$monthi') order by hocvien.sbd");
		}
		else if ($hienthi==='T'){ #Load các thí sinh được thi môn đã chọn
			$dshvthi=mysqli_query($connect,"select hocvien.sbd as 'sbd',hodem,ten,hocvien.ngaysinh as ns,donvi.tendonvi as 'donvi',allowexam.allow as 'chothi' from hocvien,donvi,allowexam where (hocvien.madonvi=donvi.madonvi) and (hocvien.sbd=allowexam.sbd) and (allowexam.mamodun='$monthi') and (allowexam.allow='C') order by hocvien.sbd");
		} # else load các thí sinh không đươc thi môn đã chọn
		else
			$dshvthi=mysqli_query($connect,"select hocvien.sbd as 'sbd',hodem,ten,hocvien.ngaysinh as ns,donvi.tendonvi as 'donvi',allowexam.allow as 'chothi' from hocvien,donvi,allowexam where (hocvien.madonvi=donvi.madonvi) and (hocvien.sbd=allowexam.sbd) and (allowexam.mamodun='$monthi') and (allowexam.allow='K') order by hocvien.sbd");
	}
?>

<style>
	.cltble{
		width:100%;
		margin-top:1.3em;
		border:1px solid rgba(136,136,136,0.8);
	}
</style>

<body>

 
        <script>
			$(document).ready(function(e) {
				$("#sb").click(function(e) {
                if (window.confirm("Cập nhật lại quyền thi?"))
				{
					var id=[],ud=[],i=j=0;
					$(":checkbox").each(function() {
                        if ($(this).is(":checked")){id[i]=$(this).val();i++;}
                    });
					$(":checkbox").each(function() {
                    	if ($(this).is(":not(:checked)")) {ud[j]=$(this).val();j++;}
                    });
					if (id.length!==0||ud.length!==0)
						{
							$.ajax({
								url:'xulycheckbox.php',
								method:'post',
								data:{id:id,ud:ud},
								success: function(data){
									alert("Đã cập nhật");
									//lo();
								}
							});
						}
				}
				else return false;
            });
			});
			
			function selectAll(){
				var totalelement=document.f.elements.length;
				var elementName;
				for (var i=0;i<totalelement;i++){
					elementName=document.f.elements[i].name;
					if(elementName!=undefined && elementName.indexOf("ct")!=-1){
						document.f.elements[i].checked= document.f.slAll.checked;
					}
				}
			}
			
			</script>

<form method="post" name='f'>
	<table class="cltble">
    	<tr style="color:rgba(255,153,51,1); margin-bottom:2em;">
        	<th style='width:7%;'>Số báo danh</th>
            <th style='width:15%;'>Họ, đệm</th>
            <th style='width:8%;'>Tên</th>
            <th style='width:11%;'>Ngày sinh</th>
            <th style='width:30%;'>Tên đơn vị</th>
            <th style='width:8%;'>Được thi<br><input type="checkbox" onChange="selectAll();" name="slAll" checked></th>
        </tr>
       
                
            <?php
				function _true($chothi,$sbd,$mt)
				{
					if ($chothi==='C')
					{
						$html="<input type='checkbox' checked name='ct[]' value='".$sbd.",".$mt."'";	
					}
					else $html= "<input type='checkbox' name='ct[]' value='".$sbd.",".$mt."'>";
					return $html;
				}
					
				while ($r=mysqli_fetch_array($dshvthi))
				{
					echo "<tr>";
					echo "
						<td style='text-align:left;'>".$r['sbd']."</td>
						<td style='text-align:left;'>".$r['hodem']."</td>
						<td style='text-align:left;'>".$r['ten']."</td>
						<td style='text-align:left;'>".$r['ns']."</td>
						<td style='text-align:left;'>".$r['donvi']."</td>
						<td>"._true($r['chothi'],$r['sbd'],$monthi)."</td>
					";
					echo "</tr>";
				}
				
    		?>
	</table>
    <table>
    	<tr>
		<td style='color:red; width:80%; padding:1em; font-size:18px;'><?php echo "Tổng thí sinh: ".mysqli_num_rows($dshvthi);?></td>
		</tr>
   	</table>
	<button type="button" id= 'sb' name="sb">Cập nhật</button>
</form>
</body>