 <script>
		$(document).ready(function(e) {
            $("#pthi").change(function(e) {
                var d=$("#tkch").serialize();
				$.ajax({
				type:'POST',
				url:'loadch.php',
				data:d,
				success: function(data)
				{
					$("#loadndch").html(data);
				}
				});
				return false;
            });
		});
</script>

<?php
	require_once("../config.php");
	mysqli_set_charset($connect,'utf8');
	if (isset($_POST['danhmuc'])) $pt=$_POST['danhmuc'];
	$queryd=mysqli_query($connect,"select count(macauhoi) as 'soluongde' from cauhoi where mamodun='$pt' and mucdo='Dễ'"); //số câu dễ
	$r1=mysqli_fetch_array($queryd);
	$queryt=mysqli_query($connect,"select count(macauhoi) as 'soluongtb' from cauhoi where mamodun='$pt' and mucdo='Trung bình'"); //số câu trung bình
	$r2=mysqli_fetch_array($queryt);
	$queryk=mysqli_query($connect,"select count(macauhoi) as 'soluongkho' from cauhoi where mamodun='$pt' and mucdo='Khó'"); //Số câu khó
	$r3=mysqli_fetch_array($queryk);
?>
<select id="pthi" name="Pthi" style="margin-top:1em;margin-left:2.2em;width:30%;height:2em;">
	<option value="all">--Chọn phần thi--</option>
	<option value="<?php echo 'Khó';?>"><?php echo $pt.'_Khó ('.$r3['soluongkho'].' câu)'; ?></option>
    <option value="<?php echo 'Trung bình';?>"><?php echo $pt.'_Trung bình ('.$r2['soluongtb'].' câu)'; ?></option>
    <option value="<?php echo 'Dễ';?>"><?php echo $pt.'_Dễ ('.$r1['soluongde'].' câu)'; ?></option>
</select>