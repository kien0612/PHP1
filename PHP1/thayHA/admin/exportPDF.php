<?php
	session_start();
	if (!isset($_SESSION['admin'])) echo "<script>window.location='../admin/index.php'</script>";
	if (isset($_SESSION['tenphong']))
	{
		include("../config.php");require("../tfpdf/tfpdf.php");
		mysqli_set_charset($connect,'utf8');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$tenphong=$_SESSION['tenphong'];
		
		//Excel
		require_once("PHPExcel.php");
		
		$excel= new PHPExcel();
		$excel->getActiveSheet();
		
		$excel->getActiveSheet()->getColumnDimension("A")->setWidth(6);
		$excel->getActiveSheet()->getColumnDimension("B")->setWidth(12);
		$excel->getActiveSheet()->getColumnDimension("C")->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension("D")->setWidth(17);
		$excel->getActiveSheet()->getColumnDimension("E")->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension("F")->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension("G")->setWidth(20);
		
		$excel->getActiveSheet()->setCellValue("A1","SỞ THÔNG TIN VÀ TRUYỀN THÔNG HÀ NỘI");
		$excel->getActiveSheet()->setCellValue("A2","TRUNG TÂM ĐÀO TẠO CNTT&TT");
		$excel->getActiveSheet()->setCellValue("A3","HỘI ĐỒNG THI VÀ CẤP CHỨNG CHỈ ỨNG DỤNG CNTT NĂM 2017");
		
		$excel->getActiveSheet()->setCellValue("A6","BẢNG GHI TÊN, ĐIỂM THI THÍ SINH DỰ THI CHỨNG CHỈ ỨNG DỤNG CNTT");
		$excel->getActiveSheet()->setCellValue("A7","Khóa thi, ".date("\\n\g\à\y: d/m/Y",time())."");
		$excel->getActiveSheet()->setCellValue("A8","Phòng thi : ".$tenphong."");
		$excel->getActiveSheet()->setCellValue("E11","Số báo danh từ: ");
		
		//$excel->getActiveSheet()->setCellValue("E12","BẢNG ĐIỂM THI ".strtoupper($tenphong));
		$excel->getActiveSheet()->setCellValue("A12","STT");
		$excel->getActiveSheet()->setCellValue("B12","SBD");
		$excel->getActiveSheet()->setCellValue("C12","Họ và tên");
		$excel->getActiveSheet()->setCellValue("D12","Ngày sinh");
		$excel->getActiveSheet()->setCellValue("E12","Nơi sinh");
		$excel->getActiveSheet()->setCellValue("F12","Môn thi");
		$excel->getActiveSheet()->setCellValue("G12","Điểm");
		$excel->getActiveSheet()->setCellValue("H12","Ký tên");
		$excel->getActiveSheet()->getStyle("A12")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$excel->getActiveSheet()->getStyle("B12")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$excel->getActiveSheet()->getStyle("C12")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$excel->getActiveSheet()->getStyle("D12")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$excel->getActiveSheet()->getStyle("E12")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$excel->getActiveSheet()->getStyle("F12")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$excel->getActiveSheet()->getStyle("G12")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$excel->getActiveSheet()->getStyle("H12")->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
		$i=13;$j=1;
		
		$s1=mysqli_query($connect,"select hocvien.sbd as sbd, hocvien.hodem as hodem, hocvien.ten as ten, hocvien.noisinh as noisinh, hocvien.ngaysinh as ngaysinh from hocvien, kythi where kythi.makythi=hocvien.makythi and hocvien.tenphongthi='$tenphong' and kythi.makythi='".$_SESSION['kythi']."' order by sbd");
		
		while ($r=mysqli_fetch_array($s1))
		{
			$s2=mysqli_query($connect,"select diem.mamodun as mamodun,diem,modun.tenmodun as tenmodun from modun,diem where modun.mamodun=diem.mamodun and sbd='".$r['sbd']."' order by sbd,mamodun");		 
			if (mysqli_num_rows($s2)>0){
				while ($ds2=mysqli_fetch_array($s2)){
					$excel->getActiveSheet()->setCellValue("A".$i,$j);
					$excel->getActiveSheet()->setCellValue("B".$i,$r['sbd']);
					$excel->getActiveSheet()->setCellValue("C".$i,$r['hodem']." ".$r['ten']);
					$excel->getActiveSheet()->setCellValue("D".$i,$r['ngaysinh']);
					$excel->getActiveSheet()->setCellValue("E".$i,$r['noisinh']);
					$excel->getActiveSheet()->setCellValue("F".$i,$ds2['tenmodun']);
					$excel->getActiveSheet()->setCellValue("G".$i,$ds2['diem']);
					$excel->getActiveSheet()->setCellValue("H".$i,"");
					$excel->getActiveSheet()->getStyle("A".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("B".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("C".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("D".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("E".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("F".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("G".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("H".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
					$j++;$i++;
				}
			}
			else {
				$excel->getActiveSheet()->setCellValue("A".$i,$j);
				$excel->getActiveSheet()->setCellValue("B".$i,$r['sbd']);
				$excel->getActiveSheet()->setCellValue("C".$i,$r['hodem']." ".$r['ten']);
				$excel->getActiveSheet()->setCellValue("D".$i,$r['ngaysinh']);
				$excel->getActiveSheet()->setCellValue("E".$i,$r['noisinh']);
				$excel->getActiveSheet()->setCellValue("F".$i,$ds2['tenmodun']);
				$excel->getActiveSheet()->setCellValue("G".$i,"");
				$excel->getActiveSheet()->setCellValue("H".$i,"");
				$excel->getActiveSheet()->getStyle("A".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("B".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("C".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("D".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("E".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("F".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("G".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$excel->getActiveSheet()->getStyle("H".$i)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
			$i++;$j++;
			}
			
		}
		
		$excel->getActiveSheet()->setCellValue("E".($i+1),"Hà nội, ".date("\\n\g\à\y: d/m/Y",time()));
		$excel->getActiveSheet()->getStyle('A'.($i+2))->getAlignment()->setWrapText(true);
		$excel->getActiveSheet()->setCellValue("A".($i+2),"Người lập\n (Kí, ghi rõ họ tên)");
		$excel->getActiveSheet()->getStyle('C'.($i+2))->getAlignment()->setWrapText(true);
		$excel->getActiveSheet()->setCellValue("C".($i+2),"Giám thị 1\n(Kí, họ tên)");
		$excel->getActiveSheet()->getStyle('D'.($i+2))->getAlignment()->setWrapText(true);
		$excel->getActiveSheet()->setCellValue("D".($i+2),"Giám thị 2\n(Kí, họ tên)");
		$excel->getActiveSheet()->getStyle('E'.($i+2))->getAlignment()->setWrapText(true);
		$excel->getActiveSheet()->setCellValue("E".($i+2),"Giám thị 3\n(Kí, họ tên)");
		$excel->getActiveSheet()->getStyle('G'.($i+2))->getAlignment()->setWrapText(true);
		$excel->getActiveSheet()->setCellValue("G".($i+2),"Chủ tịch Hội đồng\n(Kí, ghi rõ họ tên)");
		
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header("Content-Disposition: attachment; filename='Danh sách điểm thi.xlsx'");
		header("Cache-Control: max-age=0");
		include("PHPExcel/IOFactory.php");
		$write=PHPExcel_IOFactory::createWriter($excel,"Excel2007");
		ob_clean();
		flush(); 
		$write->save("php://output");
	}
	else die("Chưa chọn phòng cần xuất điểm");
?>