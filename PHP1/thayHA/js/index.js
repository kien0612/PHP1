// JavaScript Document
$(document).ready(function(e)
{
	$(".reset").click(function(e) {
    	$("input[name='sbd']").focus();
	});
	$("#xacnhan").click(function(e){
		$(".back_out").css("display","block");
		$(".back_over").css("display","block");
		$("body").css("overflow","hidden");
    	var data=$("#sigup").serialize();//Lấy dữ liệu trong form
		$.ajax({
		type:'POST',
		url:'test/testLogin.php',
		data:data,
		success: function(data){
			if (data=='null'){
				alert("Số báo danh, mật khẩu không được để trống!");
				$(".back_out").css("display","none");
				$(".back_over").css("display","none");
				$("body").css("overflow","visible");
			} else if (data=="notstart"){
				alert("Kỳ thi chưa được mở, bạn không thể đăng nhập tại thời điểm này!");
				$(".back_out").css("display","none");
				$(".back_over").css("display","none");
				$("body").css("overflow","visible");
			}
			else if (data=="stop"){
				alert("Kỳ thi đã bị đóng, bạn không thể đăng nhập!");
				$(".back_out").css("display","none");
				$(".back_over").css("display","none");
				$("body").css("overflow","visible");
			} else if (data=='false'){
				alert("Bạn nhập sai số báo danh hoặc mật khẩu!");
				$(".back_out").css("display","none");
				$(".back_over").css("display","none");
				$("body").css("overflow","visible");
			} else if (data=='true')
				{
					$.ajax({
						url:"monthi.php",
						cache: false
					})
					.done(function(html){
						$(".back_out").css("display","none");
						$(".back_over").css("display","none");
						$("body").css("overflow","visible");
						$("#loadajax").html(html);
					});
				}
			}
		});
		return false;
	});
});