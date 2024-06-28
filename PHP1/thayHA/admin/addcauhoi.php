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
 </script>
<?php
	require_once("../config.php");
	session_start();
	mysqli_set_charset($connect,"utf8");
	if ($_POST)
	{
		$macauhoi=$_POST['macauhoi'];
		$tencauhoi=$_POST['tencauhoi'];
		$daA=$_POST['daA'];
		$daB=$_POST['daB'];
		$daC=$_POST['daC'];
		$daD=$_POST['daD'];
		$tl=$_POST['tl'];
		$macauhoi=str_replace("'","''",$macauhoi);
		$tencauhoi=str_replace("'","''",$tencauhoi);
		$daA=str_replace("'","''",$daA);
		$daB=str_replace("'","''",$daB);
		$daC=str_replace("'","''",$daC);
		$daD=str_replace("'","''",$daD);
		$tl=str_replace("'","''",$tl);
		$danhmuc=$_SESSION['danhmuc'];
		$pt=$_SESSION['Pthi'];
		$t=mysqli_query($connect,"select macauhoi from cauhoi where macauhoi='$macauhoi'");
		if (mysqli_num_rows($t)===0)
		{
			$sqlts="insert into cauhoi(macauhoi,tencauhoi,mucdo,pa1,pa2,pa3,pa4,dapan,mamodun) values('$macauhoi','$tencauhoi','$pt','$daA','$daB','$daC','$daD','$tl','$danhmuc')";
			mysqli_query($connect,$sqlts);
			$d=mysqli_query($connect,"select macauhoi,tencauhoi,pa1,pa2,pa3,pa4,dapan from cauhoi where mamodun='$danhmuc' and mucdo='$pt'");
		}
		else {$d=mysqli_query($connect,"select macauhoi,tencauhoi,pa1,pa2,pa3,pa4,dapan from cauhoi where mamodun='$danhmuc' and mucdo='$pt'");}
	}
?>

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
			if (mysqli_num_rows($d)>0)
			{
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
			}
    	?>
</table>