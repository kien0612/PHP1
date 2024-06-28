<?php
	session_start();
	require_once("../config.php");
	mysqli_set_charset($connect,'utf8');
	if (isset($_POST['Pthi'])) $pt=$_POST['Pthi'];
	if (isset($_POST['danhmuc'])) $danhmuc=$_POST['danhmuc'];
	$_SESSION['Pthi']=$pt;
	$_SESSION['danhmuc']=$danhmuc;
	$d=mysqli_query($connect,"select macauhoi,tencauhoi,pa1,pa2,pa3,pa4,dapan from cauhoi where mamodun='$danhmuc' and mucdo='$pt'");
?>

<script>
	$("tr").click(function(e) {
			$("input[id='macauhoi']").val($(this).children("td:eq(0)").text());
			$("input[id='tencauhoi']").val($(this).children("td:eq(1)").text());
			$("input[id='daA']").val($(this).children("td:eq(2)").text());
			$("input[id='daB']").val($(this).children("td:eq(3)").text());
			$("input[id='daC']").val($(this).children("td:eq(4)").text());
			$("input[id='daD']").val($(this).children("td:eq(5)").text());
			$("input[id='tl']").val($(this).children("td:eq(6)").text());
        });
	$("#delete").click(function(e){
		if (confirm('Xóa câu hỏi này?'))
		{
					var data=$("#update").serialize();
					$.ajax({
						type:'POST',
						url:'xoacauhoi.php',
						data:data,
						success: function(data)
						{
							$("#loadndch").html(data);
						}
					});
		}
    });
	$("#edit").click(function(e) {
				var a,b,c,d,e,f;
				a=$("input[id='macauhoi']").val();
				b=$("input[id='tencauhoi']").val();
				c=$("input[id='daA']").val();
				d=$("input[id='daB']").val();
				e=$("input[id='daC']").val();
				f=$("input[id='daD']").val();
				g=$("input[id='tl']").val();
				if (a===""||b===""||c===""||d===""||e===""||f==="") alert("Bạn cần nhập đủ thông tin!");
				else
				{
					var data=$("#update").serialize();
					$.ajax({
						type:'POST',
						url:'editcauhoi.php',//gửi dữ liệu sang trang testlogin.php
						data:data,
						success: function(data)
						{
							$("#loadndch").html(data);
						}
					});
				}
            });
		$("#add").click(function(e) {
				var a,b,c,d,e,f;
				a=$("input[id='macauhoi']").val();
				b=$("input[id='tencauhoi']").val();
				c=$("input[id='daA']").val();
				d=$("input[id='daB']").val();
				e=$("input[id='daC']").val();
				f=$("input[id='daD']").val();
				g=$("input[id='tl']").val();
				if (a===""||b===""||c===""||d===""||e===""||f==="") alert("Bạn cần nhập đủ thông tin!");
				else
				{
					var data=$("#update").serialize();
					$.ajax({
						type:'POST',
						url:'addcauhoi.php',//gửi dữ liệu sang trang testlogin.php
						data:data,
						success: function(data)
						{
							$("#loadndch").html(data);
						}
					});
				}
            });
</script>

<table>
    	<tr style="color:rgba(255,153,0,1); margin-bottom:2em;">
        	<th style='width:7%;'>Mã câu hỏi</th>
            <th style='width:30%;'>Tên câu hỏi</th>
            <th style='width:8%;'>Đáp án A</th>
            <th style='width:8%;'>Đáp án B</th>
            <th style='width:8%;'>Đáp án C</th>
            <th style='width:8%;'>Đáp án D</th>
            <th style='width:8%;'>Trả lời</th>
        </tr>
        <?php
			while ($r=mysqli_fetch_array($d))
			{
				echo "<tr>";
				echo "
					<td>".$r['macauhoi']."</td>
					<td>".$r['tencauhoi']."</td>
					<td>".$r['pa1']."</td>
					<td>".$r['pa2']."</td>
					<td>".$r['pa3']."</td>
					<td>".$r['pa4']."</td>
					<td>".$r['dapan']."</td>
				";
				echo "</tr>";
			}
    	?>
</table>