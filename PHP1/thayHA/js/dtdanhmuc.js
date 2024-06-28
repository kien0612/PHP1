// JavaScript Document
$(document).ready(function(e){
	$(".ttb1 tr").click(function(e){
		$("input[id='mkt']").val($(this).children("td:eq(0)").text());
		$("input[id='tenkt']").val($(this).children("td:eq(1)").text());
		$("input[id='tgbd']").val($(this).children("td:eq(2)").text());
		$("input[id='tgkt']").val($(this).children("td:eq(3)").text());
	});
	$(".ttb2 tr").click(function(e){
		$("input[id='mmt']").val($(this).children("td:eq(0)").text());
		$("input[id='tenmt']").val($(this).children("td:eq(1)").text());
		$("input[id='tkt']").val($(this).children("td:eq(2)").text());
		$("input[id='tkt2']").val($(this).children("td:eq(3)").text());
	});
	$(".table12 tr").click(function(e){
		$("input[id='mmt1']").val($(this).children("td:eq(0)").text());
		$("input[id='tenmt1']").val($(this).children("td:eq(1)").text());
		$("input[id='tkt1']").val($(this).children("td:eq(2)").text());
		$("input[id='tkt11']").val($(this).children("td:eq(3)").text());
	});
	$("#add").click(function(e){
		var a,b,c,d;
		a=$("input[id='mkt']").val();
		b=$("input[id='tenkt']").val();
		c=$("input[id='tgbd']").val();
		d=$("input[id='tgkt']").val();
		if (a===""||b===""||c===""||d==="") alert("Không được để trống dữ liệu!");
		else
			{
				var data=$("#mkt").val();
				var data1=$("#tenkt").val();
				var data2=$("#tgbd").val();
				var data3=$("#tgkt").val();
				$.ajax({
					type:'POST',
					url:'dtdanhmucupdatekt.php',
					data:{d1:data,d2:data1,d3:data2,d4:data3},
					success: function(data){
						if (data=="false") alert("Kỳ thì đã tồn tại, lưu ý mã các kỳ thi không được trùng nhau");
						else{
							alert("Thêm kỳ thi thành công");
							$(".loadchinh").load("dtdanhmuc.php");
						}
						
					}
				});
			}
		$(".loadchinh").load("dtdanhmuc.php");
    });
	$("#edit").click(function(e){
		var a,b,c,d;
		a=$("input[id='mkt']").val();
		b=$("input[id='tenkt']").val();
		c=$("input[id='tgbd']").val();
		d=$("input[id='tgkt']").val();
		if (a===""||b===""||c===""||d==="") alert("Không được để trống dữ liệu!");
		else
			if (confirm("Bạn có chắc chắn sửa đổi?"))
			{
				var data=$("#mkt").val();
				var data1=$("#tenkt").val();
				var data2=$("#tgbd").val();
				var data3=$("#tgkt").val();
				$.ajax({
					type:'POST',
					url:'dtdanhmucupdatektthem.php',
					data:{d1:data,d2:data1,d3:data2,d4:data3},
					success: function(data){
						if (data=="false") alert("Lỗi");
						else{
							alert("Đã sửa thành công");
							$(".loadchinh").load("dtdanhmuc.php");
						}
					}
				});
			}
    });
	$("#delete").click(function(e){
		var a,b,c,d;
		a=$("input[id='mkt']").val();
		b=$("input[id='tenkt']").val();
		c=$("input[id='tgbd']").val();
		d=$("input[id='tgkt']").val();
		if (a===""||b===""||c===""||d==="") alert("Không được để trống dữ liệu!");
		else if (confirm("Bạn chắc chắn xóa kỳ thi này?"))
			{
				var data=$("#mkt").val();
				$.ajax({
					type:'POST',
					url:'dtdanhmucupdatektxoa.php',
					data:{d1:data},
					success: function(data){
						//alert(data);
						if (data=="false") alert("Lỗi");
						else{
							alert("Đã xóa");
							$(".loadchinh").load("dtdanhmuc.php");
						}
					}
				});
			}
    });
	//kỳ thi
	
	$("#add1").click(function(e){
		var a,b,c,d;
		a=$("input[id='mmt']").val();
		b=$("input[id='tenmt']").val();
		c=$("input[id='tkt']").val();
		d=$("input[id='tkt2']").val();
		if (a===""||b===""||c===""||d==="") alert("Không được để trống dữ liệu!");
		else if (confirm("Bạn chắc chắn thêm môn thi này?"))
			{
				var data=$("#mmt").val();
				var data1=$("#tenmt").val();
				var data2=$("#tkt").val();
				var data3=$("#tkt2").val();
				$.ajax({
					type:'POST',
					url:'dtdanhmucupdatemt.php',
					data:{d1:data,d2:data1,d3:data2,d4:data3},
					success: function(e){
						if (e=="false") alert("Môn thi đã tồn tại, lưu ý mã các môn thi không được trùng nhau");
						else{
							alert("Đã thêm môn thi");
							$(".loadchinh").load("dtdanhmuc.php");
						}
					}
				});
			}
    });
	
	$("#edit1").click(function(e){
		var a,b,c,d;
		a=$("input[id='mmt']").val();
		b=$("input[id='tenmt']").val();
		c=$("input[id='tkt']").val();
		d=$("input[id='tkt2']").val();
		if (a===""||b===""||c===""||d==="") alert("Không được để trống dữ liệu!");
		else
			if (confirm("Bạn có chắc chắn sửa đổi?"))
			{
				var data=$("#mmt").val();
				var data1=$("#tenmt").val();
				var data2=$("#tkt").val();
				var data3=$("#tkt2").val();
				$.ajax({
					type:'POST',
					url:'dtdanhmucupdatemtthem.php',
					data:{d1:data,d2:data1,d3:data2,d4:data3},
					success: function(data){
						if (data=="false") alert("Lỗi");
						else{
							alert("Đã sửa môn thi");
							$(".loadchinh").load("dtdanhmuc.php");
						}
					}
				});
			}
    });
	$("#delete1").click(function(e){
		var a;
		a=$("input[id='mmt']").val();
		if (a==="") alert("Không được để trống mã môn thi!");
		else
			if (confirm("Bạn có chắc chắn xóa môn thi này?"))
			{
				var data=$("#mmt").val();
				$.ajax({
					type:'POST',
					url:'dtdanhmucupdatemtxoa.php',
					data:{d1:data},
					success: function(data){
						if (data=="false") alert("Lỗi");
						else{
							alert("Đã xóa môn thi");
							$(".loadchinh").load("dtdanhmuc.php");
						}
					}
				});
			}
    });
	//Môn thi
	
	$("#add2").click(function(e){ //Tiếp tục từ đây
		var a,b,c;
		a=$("input[id='mmt1']").val();
		b=$("input[id='tenmt1']").val();
		c=$("input[id='tkt1']").val();
		if (a===""||b===""||c==="")
			alert("Không được để trống dữ liệu!");
			else if (confirm("Thêm nội dung này?")){
				var data=$("#mmt1").val();
				var data1=$("#tenmt1").val();
				var data2=$("#tkt1").val();
				$.ajax({
					type:'POST',
					url:'dtdanhmucupdatend.php',
					data:{d1:data,d2:data1,d3:data2},
					success: function(data){
						if (data=="false") alert("Nôi dung thi đã tồn tại, lưu ý mã các nội dung thi không được trùng nhau");
						else{
							alert("Thêm nội dung thi thành công");
							$(".loadchinh").load("dtdanhmuc.php");
						}
					}
				});
			}
    	});
	$("#edit2").click(function(e){
		var a,b,c;
		a=$("input[id='mmt1']").val();
		b=$("input[id='tenmt1']").val();
		c=$("input[id='tkt1']").val();
		if (a===""||b===""||c==="")
			alert("Không được để trống dữ liệu!");
			else if (confirm("Bạn chắc chắn nội dung này?")) {
				var data=$("#mmt1").val();
				var data1=$("#tenmt1").val();
				var data2=$("#tkt1").val();
				$.ajax({
					type:'POST',
					url:'dtdanhmucupdatendthem.php',
					data:{d1:data,d2:data1,d3:data2},
					success: function(data){
						//alert(data);
						if (data=="false") alert("Lỗi");
						else{
							alert("Đã sửa");
							$(".loadchinh").load("dtdanhmuc.php");
						}
					}
				});
			}
    	});
	$("#delete2").click(function(e){
		var a;
		a=$("input[id='mmt1']").val();
		if (a==="") alert("Không được để trống dữ liệu!");
		else if (confirm("Bạn chắc chắn xóa kỳ thi này?"))
			{
				var data=$("#mmt1").val();
				$.ajax({
					type:'POST',
					url:'dtdanhmucupdatendxoa.php',
					data:{d1:data},
					success: function(data){
						//alert(data);
						if (data=="false") alert("Lỗi");
						else{
							alert("Đã xóa");
							$(".loadchinh").load("dtdanhmuc.php");
						}
					}
				});
			}
    });
	//Bộ nội dung thi
	
});