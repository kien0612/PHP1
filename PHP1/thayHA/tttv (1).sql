-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2017 at 11:29 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tttv`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `maadmin` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`maadmin`, `matkhau`) VALUES
('abc', '96e79218965eb72c92a549dd5a330112'),
('admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `allowexam`
--

CREATE TABLE `allowexam` (
  `sbd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `allow` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `allowexam`
--

INSERT INTO `allowexam` (`sbd`, `mamodun`, `allow`) VALUES
('03X0001', 'MD01', 'C'),
('03X0002', 'MD01', 'C'),
('03X0003', 'MD01', 'C'),
('03X0004', 'MD01', 'C'),
('03X0005', 'MD01', 'C'),
('03X0006', 'MD01', 'C'),
('03X0007', 'MD01', 'C'),
('03X0008', 'MD01', 'C'),
('03X0009', 'MD01', 'C'),
('03X0010', 'MD01', 'C'),
('03X0011', 'MD01', 'C'),
('03X0012', 'MD01', 'C'),
('03X0013', 'MD01', 'C'),
('03X0014', 'MD01', 'C'),
('03X0015', 'MD01', 'C'),
('03X0016', 'MD01', 'C'),
('03X0017', 'MD01', 'C'),
('03X0018', 'MD01', 'C'),
('03X0019', 'MD01', 'C'),
('03X0020', 'MD01', 'C'),
('03X0021', 'MD01', 'C'),
('03X0022', 'MD01', 'C'),
('03X0023', 'MD01', 'C'),
('03X0024', 'MD01', 'C'),
('03X0025', 'MD01', 'C'),
('03X0026', 'MD01', 'C'),
('03X0027', 'MD01', 'C'),
('03X0028', 'MD01', 'C'),
('03X0029', 'MD01', 'C'),
('03X0030', 'MD01', 'C'),
('03X0031', 'MD01', 'C'),
('03X0032', 'MD01', 'C'),
('03X0033', 'MD01', 'C'),
('03X0034', 'MD01', 'C'),
('03X0035', 'MD01', 'C'),
('03X0036', 'MD01', 'C'),
('03X0037', 'MD01', 'C'),
('03X0038', 'MD01', 'C'),
('03X0039', 'MD01', 'C'),
('03X0040', 'MD01', 'C'),
('03X0041', 'MD01', 'C'),
('03X0042', 'MD01', 'C'),
('03X0043', 'MD01', 'C'),
('03X0044', 'MD01', 'C'),
('03X0045', 'MD01', 'C'),
('03X0046', 'MD01', 'C'),
('03X0047', 'MD01', 'C'),
('03X0048', 'MD01', 'C'),
('03X0049', 'MD01', 'C'),
('03X0050', 'MD01', 'C'),
('03X0051', 'MD01', 'C'),
('03X0052', 'MD01', 'C'),
('03X0053', 'MD01', 'C'),
('03X0054', 'MD01', 'C'),
('03X0055', 'MD01', 'C'),
('03X0056', 'MD01', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `bode`
--

CREATE TABLE `bode` (
  `mabode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tenbode` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bode`
--

INSERT INTO `bode` (`mabode`, `tenbode`, `mamodun`) VALUES
('UI01', 'Hiểu biết về CNTT cơ bản', 'MD01'),
('UI02', 'Sử dụng máy tính cơ bản', 'MD01'),
('UI03', 'Xử lý văn bản cơ bản', 'MD01'),
('UI04', 'Sử dụng mảng tính cơ bản', 'MD01'),
('UI05', 'Sử dụng trình chiếu cơ bản', 'MD01'),
('UI06', 'Sử dụng Internet cơ bản', 'MD01');

-- --------------------------------------------------------

--
-- Table structure for table `cauhoi`
--

CREATE TABLE `cauhoi` (
  `macauhoi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tencauhoi` varchar(1100) COLLATE utf8_unicode_ci NOT NULL,
  `padung` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `pasai1` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `pasai2` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `pasai3` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `imgviauTencauhoi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviauPadung` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviauPasai1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviauPasai2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgviauPasai3` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mucdo` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `mabode` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cauhoi`
--

INSERT INTO `cauhoi` (`macauhoi`, `tencauhoi`, `padung`, `pasai1`, `pasai2`, `pasai3`, `imgviauTencauhoi`, `imgviauPadung`, `imgviauPasai1`, `imgviauPasai2`, `imgviauPasai3`, `mucdo`, `mabode`) VALUES
('UI01-001', 'Phần cứng máy tính là gì?', 'Các bộ phận cụ thể của máy tính về mặt vật lý như màn hình, chuột, bàn phím,... ', 'Cấu tạo của phần mềm về mặt logic', 'Cấu tạo của phần mềm về mặt vật lý', 'Cả 3 phương án đều sai', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-002', 'Lựa chọn nào cho thấy máy tính xách tay có lợi thế hơn so với máy tính để bàn? ', 'Máy tính xách tay có thể mang đi bất kì đâu', 'Một máy tính xách tay có thể tái sử dụng các thành phần của nó có thể được sử dụng cho máy tính xách tay khác', 'Sửa máy tính xách tay ít tốn kém hơn', 'Máy tính xách tay thường có kích thước lớn hơn máy tính để bàn', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-003', 'Trong máy tính, PC là chữ viết tắt của từ nào?', 'Personal Computer', 'Performance Computer', 'Personnal Connector', 'Printing Computer', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-004', 'Một loại máy tính có màn hình cảm ứng, khi sử dụng người dùng có thể dùng bút hoặc công cụ chọn để chạm vào, lựa chọn một đối tượng nào đó hoặc có thể nhập thông tin qua bàn phím ảo tích hợp trong máy là?', 'Máy tính bảng', 'Máy chủ', 'Máy tính để bàn', 'Máy tính FX500', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-005', 'Điện thoại thông minh (smartphone) là gì?', 'Điện thoại tích hợp một nền tảng hệ điều hành di động với nhiều tính năng hỗ trợ tiên tiến', 'Hỗ trợ tất cả các kiểu hệ điều hành', 'Bền hơn so với điện thoại di động khác', 'Điện thoại chỉ có chức năng nghe và gọi', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-006', 'Thiết bị ngoại vi của máy tính là thiết bị nào?', 'Máy in', 'Máy nghe nhạc Mp3', 'Máy tính bảng', 'Sách điện tử', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-007', 'Các thiết bị dùng để nhập dữ liệu vào máy tính là?', 'Bàn phím, máy ghi hình trực tiếp, chuột, máy quét', 'Loa máy tính', 'Máy fax', 'Máy in', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-008', 'Những thiết bị nào sau đây được xếp vào nhóm thiết bị ngoại vi?', 'Bàn phím, chuột, màn hình, máy in', 'Mainboard, CPU, CD-ROM Drive, Chuột', ' HDD, CD- ROM Drive, FDD, bàn phím', 'Màn hình, CPU, RAM, Main', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-009', 'Các thành phần: RAM, CPU, thiết bị nhập xuất là?', 'Phần cứng máy tính', 'Phần mềm máy tính', 'Thiết bị lưu trữ', 'Thiết bị mạng và truyền thông', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-010', 'Thuật ngữ “RAM” là từ viết tắt của cụm từ?', 'Random Access Memory', 'Read Access Memory', 'Recent Access Memory', 'Read And Modify', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-011', 'ROM là bộ nhớ gì?', 'Bộ nhớ chỉ đọc', 'Bộ nhớ tạm thời', 'Bộ nhớ đọc, ghi', 'Bộ nhớ ngoài', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-012', 'CPU là gì?', 'Bộ xử lý trung tâm của máy tính', 'Thiết bị lưu trữ của máy tính', 'Thiết bị nhập liệu của máy tính', 'Thiết bị hiển thị của máy tính', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-013', 'MB (Megabyte) là đơn vị đo gì?', 'Đo dung lượng của thiết bị lưu trữ như đĩa cứng', 'Đo tốc độ mạng', 'Đo tốc độ của nguồn máy tính', 'Độ phân giải màn hình', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-014', 'ROM là viết tắt của từ gì?', 'Read Only Memory', 'Random Only Memory', 'Read One Memory', 'Random One Memory', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-015', 'Phát biểu nào là đúng khi nói đến CPU?', 'CPU là viết tắt của Processing Unit, là đơn vị xử lý trung tâm được tích hợp trong một chip được gọi là một vi xử lý, để xử lý dữ liệu và dịch các lệnh của chương trình', 'CPU được tạo bởi bộ nhớ RAM và ROM', 'CPU lưu trữ các phần mềm người sử dụng', 'CPU thường được tích hợp với một chip gọi là vi xử lý', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-016', 'Đơn vị tính nhỏ nhất của máy tính là gì?', 'Bit', 'Byte', 'Megabyte', 'Terabyte', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-017', 'Bit là gì?', 'Tất cả các đáp án đều đúng', 'Là đơn vị nhỏ nhất của thông tin được sử dụng trong máy tính', 'Là một phần tử nhỏ mang một trong 2 giá trị 0 và 1', 'Là một đơn vị đo thông tin', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-018', '1 byte bằng?', '8 bit', '2 bit', '10 bit', '16 bit', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-019', '1 KB bằng?', '1024 byte', '1000 bit', '1024 bit', '1000 byte', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-020', 'CPU làm những công việc chủ yếu nào?', 'Xử lý dữ liệu', 'Lưu trữ dữ liệu', 'Nhập dữ liệu', 'Xuất dữ liệu', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-021', 'Kể tên các loại bộ nhớ trong?', 'Bộ nhớ truy cập ngẫu nhiên (RAM) và bộ nhớ chỉ đọc (ROM)', 'Bộ nhớ truy cập ngẫu nhiên (RAM)', 'Bộ nhớ chỉ đọc (ROM)', 'Đĩa cứng (Hard disk)', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-022', 'Các thiết bị nào có thể thiếu trong một bộ máy tính?', 'Ổ đĩa mềm', 'Bộ nguồn', 'Bộ nhớ RAM', 'Màn hình', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-023', 'Cấu trúc chung của máy tính gồm có những khối chức năng nào?', 'Bộ xử lý trung tâm, bộ nhớ, thiết bị nhập/xuất', 'Bộ xử lý trung tâm, bộ nhớ', 'Bộ nhớ, thiết bị nhập/xuất, màn hình', 'Bộ xử lý trung tâm, bộ nhớ, thiết bị nhập', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-024', 'Các thành phần cơ bản của 1 máy tính?', 'CPU, các thiết bị lưu trữ, bộ nhớ, các thiết bị nhập và các thiết bị xuất dữ liệu', 'CPU, các thiết bị lưu trữ, bộ nhớ', 'CPU, bộ nhớ, các thiết bị nhập dữ liệu', 'Bộ nhớ, các thiết bị nhập, thiết bị xuất dữ liệu và con người', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-025', 'Phát biểu nào là đúng khi nói đến bộ nhớ RAM và ROM??', 'Bộ nhớ RAM là bộ nhớ đọc và ghi, trong khi ROM là bộ nhớ chỉ đọc', 'Bộ nhớ ROM thường được dùng bởi các chương trình ứng dụng để lưu trữ tạm thời. Bộ nhớ RAM được dùng để lưu các file dữ liệu', 'Bộ nhớ RAM không bị xoá khi máy tính đã tắt. Bộ nhớ ROM bị xoá khi máy tính tắt', 'RAM và ROM là hai bộ nhớ truy cập ngẫu nhiên', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-026', 'Khi đọc các thông số cấu hình của một máy tính thông thường: 2GHZ-320GB-4.00GB, con số 4.00GB chỉ điều gì?', 'Chỉ dung lượng bộ nhớ truy cập ngẫu nhiên RAM', 'Chỉ tốc độ của bộ vi xử lý', 'Chỉ dung lượng của đĩa cứng', 'Chỉ dung lượng của bộ nhớ chỉ đọc ROM', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-027', 'Đâu là thiết bị lưu trữ dữ liệu?', 'USB', 'Máy in', 'Webcam', 'Cần điểu khiển', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-028', 'Thành phần nào của máy tính có thể ngăn máy tính khởi động, nếu nó bị hư hỏng hoặc kết nối không đúng cách?', 'Ổ đĩa cứng', 'Chuột', 'Bàn phím', 'Máy in', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-029', 'Nhóm nào sau đây bao gồm các thiết bị được xếp vào cùng loại?', 'Đĩa cứng trong, đĩa cứng ngoài, các loại đĩa quang (CD, DVD), thẻ nhớ, ổ nhớ di động', 'Đĩa cứng trong, máy in, các loại đĩa quang (CD, DVD), thẻ nhớ, ổ nhớ di động', 'Đĩa cứng trong, đĩa cứng ngoài, USB, thẻ nhớ, máy scan, ổ nhớ di động', 'Máy in, máy scan, màn hình, loa', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-030', 'Máy Scanner được kết nối với máy tính thông qua cổng nào sau đây?', 'USB', 'RJ 45', 'Jack 3.5', 'RJ 11', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-031', 'Bàn phím máy tính là thiết bị nào trong các thiết bị sau?', 'Thiết bị nhập thông tin', 'Thiết bị xuất thông tin', 'Thiết bị lưu trữ thông tin', 'Thiết bị thoát thông tin', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-032', 'Hãy chỉ ra đâu là thiết bị nhập?', 'Máy quét', 'Máy in', 'Loa', 'Màn hình', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-033', 'Thiết bị nào thực hiện thao tác nhập dữ liệu trong số các thiết bị sau: Màn hình, máy in, máy vẽ, bàn phím, ổ đĩa cứng, ổ đĩa mềm, chuột, loa, máy quét?', 'Bàn phím, chuột, máy quét', 'Máy in, màn hình, máy quét, chuột', 'Máy vẽ, ổ đĩa cứng, ổ đĩa mềm, bàn phím', 'Máy quét, Loa, chuột, màn hình', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-034', 'Máy điện tử dùng để thu và lưu giữ hình ảnh một cách tự động thay vì phải dùng phim ảnh là máy gì?', 'Máy ảnh kỹ thuật số', 'Máy ảnh thường', 'Webcam', 'Máy quét ảnh', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-035', 'Máy in và máy quét, thiết bị nào là thiết bị nhập thông tin vào máy tính?', 'Máy quét', 'Máy in', 'Cả hai', 'Không cái nào', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-036', 'Thiết bị nào không thể thiếu trong một máy tính?', 'CPU', 'Ổ đĩa mềm', 'Ổ đĩa CD', 'Máy in', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-037', 'Các thiết bị: chuột, bàn phím, máy quét, thuộc khối chức năng nào?', 'Thiết bị nhập', 'Thiết bị xuất', 'Khối xử lý', 'Các thiết bị lưu trữ', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-038', 'Hãy chọn nhóm có thiết bị không cùng nhóm với những thiết bị còn lại?', 'Bàn phím, chuột, máy scan, máy quét', 'Bàn phím, chuột, máy quét, máy in, máy chiếu', 'Máy scan, máy tính bảng, ổ đĩa mềm (FDD)', 'Màn hình, máy in, máy chủ, điện thoại thông minh', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-039', 'Thiết bị nào thực hiện thao tác xuất ra dữ liệu trong số các thiết bị sau: Màn hình, máy in, bàn phím, máy chiếu, ổ đĩa mềm, chuột, loa, máy quét?', 'Màn hình, Máy in, máy chiếu, loa', 'Bàn phím, chuột, máy quét, máy in', 'Máy in, màn hình, máy quét, chuột', 'Màn hình, ổ đĩa cứng, ổ đĩa mềm, bàn phím', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-040', 'Thiết bị xuất để đưa ra kết quả đã xử lý cho người sử dụng. Các thiết bị xuất thông dụng hiện nay là?', 'Màn hình, màn hình cảm ứng, máy in, loa, tai nghe', 'Màn hình, ổ cứng', 'Máy in, ổ mềm', 'Màn hình, ổ mềm', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-041', 'Các thiết bị: màn hình, loa, máy in, thuộc khối chức năng nào?', 'Thiết bị xuất', 'Thiết bị nhập', 'Khối xử lý', 'Các thiết bị lưu trữ', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-042', 'Hãy chọn nhóm có thiết bị không cùng nhóm với những thiết bị còn lại?', 'Màn hình, máy in, loa', 'Màn hình, máy in, bàn phím', 'Máy in, bàn phím, chuột', 'Máy in, máy scan, usb', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-043', 'Phần mềm công cộng là gì?', 'Là phần mềm không có bản quyền, bất cứ ai cũng có thể sử dụng miễn phí mà không bị hạn chế', 'Là phần mềm có tính phí và bạn có thể chia sẻ cho những người khác mà không mất phí', 'Là phần mềm dùng thử bị hạn chế về thời gian sử dụng và các tính năng sử dụng', 'Là phần mềm có bản quyền và được thay đổi bởi bất cứ ai', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-044', 'Đâu là một ví dụ về phần mềm hệ thống?', 'Hệ điều hành', 'Đĩa mềm', 'Đĩa CD', 'Bàn phím', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-045', 'Phát biểu nào sau đây là đúng?', 'Phần mềm là một tập hợp những câu lệnh được viết bằng một hoặc nhiều ngôn ngữ lập trình, và các dữ liệu hay tài liệu liên quan nhằm tự động thực hiện một số nhiệm vụ hay chức năng', 'Phần mềm là tập hợp của các thiết bị nhập như máy scan, bàn phím, chuột,…', 'Phần mềm là tập hợp của các thiết bị xuất như màn hình, máy ín, máy chiếu,…', 'Phần mềm là tập hợp của các thiết bị lưu trữ như ổ cứng, đĩa mềm, USB,…', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-046', 'Chương trình điều kiển thiết bị trong các đĩa CD kèm theo khi gắn thêm thiết bị ngoại vi cho máy tính thường gọi là gì?', 'Driver', 'IOS', 'RAM', 'ROM', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-047', 'Chức năng chính của hệ điều hành (Operating System) là gì?', 'Tất cả các đáp án đều đúng', 'Thực hiện các lệnh theo yêu cầu của người sử dụng', 'Quản lý, phân phối và thu hồi bộ nhớ', 'Điều khiển các thiết bị ngoại vi như ổ đĩa, máy in, bàn phím, màn hình', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-048', 'Hãy chỉ ra tên của một số hệ điều hành?', 'Linux, Windows, Mac OS', 'Linux, Turbo', 'Windows, Max', 'Linux, Windon', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-049', 'Hệ thống nào là tập hợp các chương trình phần mềm chạy trên máy tính, dùng để điều hành, quản lý các thiết bị phần cứng và tài nguyên phần mềm trên máy tính?', 'Hệ điều hành', 'Phần mềm ứng dụng', 'Phần cứng', 'Các loại trình dịch trung gian', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-050', 'Phần mềm nào dưới đây được cài đặt đầu tiên trong máy tính?', 'MS Windows', 'Ms Office', 'FireFox', 'Norton Antivirus', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-051', 'Hãy kể tên một số hệ điều hành?', 'Linux, Windows, Mac OS', 'Linux, Turbo', 'Windows, Max', 'Mac OS, Windon', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-052', 'Phát biểu nào sau đây là đúng?', 'Phần mềm ứng dụng cần hệ điều hành để chạy', 'Phần mềm ứng dụng không cần hệ điều hành để chạy', 'Hệ điều hành cần phần mềm ứng dụng để chạy', 'Máy tính không cần hệ điều hành để chạy', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-053', 'Hệ điều hành là?', 'Phần mềm quản lý và phân phối tài nguyên máy tính phục vụ cho các ứng dụng', 'Trình duyệt web', 'Phần mềm tìm kiếm thông tin', 'Phần mềm văn phòng', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-054', 'Hệ điều hành nào sau đây không sử dụng cho máy tính?', 'Android', 'LINUX', 'Windows 7', 'WindowsXP', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-055', 'Phần mềm Windows, Linux có đặc điểm gì chung?', 'Tất cả đều là phần mềm hệ điều hành', 'Tất cả đều là phần mềm ứng dụng', 'Tất cả đều là dịch vụ dải tần rộng', 'Tất cả đều là thiết bị phần cứng', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-056', 'Trong các phần mềm sau, phần mềm nào là phần mềm ứng dụng?', 'Microsoft Word', 'Windows 7', 'Linux', 'Unix', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-057', 'Hãy chọn phương án đúng để điền vào dấu 3 chấm: "... là một cấu trúc bao gồm tập hợp các thao tác và các kết quả tương quan sử dụng trong việc phát triển để sản xuất ra một sản phẩm phần mềm"', 'Quy trình phát triển phần mềm', 'Quy trình hoạt động của máy tính', 'Quy trình sản xuất máy tính', 'Quy trình lắp ráp máy tính', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-058', 'Phát biểu nào chưa đúng?', 'Phần mềm mã nguồn mở - Open Source Software: có đăng ký bản quyền, không cho phép sao chép dưới bất kỳ hình thức nào', 'Phần mềm thương mại - Commercia Software: có đăng ký bản quyền, không cho phép sao chép dưới bất kỳ hình thức nào', 'Phần mềm chia sẻ - Shareware: có bản quyền, dùng thử trước khi mua. Nếu muốn tiếp tục sử dụng chương trình thì được khuyến khích trả tiền cho tác giả', 'Phần mềm miễn phí - Freeware: cho phép người khác tự do sử dụng hoàn toàn hoặc theo một số yêu cầu bắt buộc. Ví dụ kèm tên tác giả', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-059', 'Phát biểu nào sau đây là sai?', 'Phần mềm mã nguồn mở là phần mềm phải mua bản quyền để sử dụng', 'Phần mềm mã nguồn mở cho phép người dùng được sửa mã nguồn', 'Phần mềm mã nguồn mở là phần mềm miễn phí', 'Phần mềm mã nguồn mở cho phép người dùng được chia sẻ cho người khác', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-060', 'Phần mềm nào sau đây không phải là phần mềm mã nguồn mở?', 'Microsoft Office', 'Ubuntu', 'Open Office', 'Mozilla Firefox', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-061', 'Phát biểu nào sau đây là đúng?', 'Phần mềm mã nguồn mở không có bảo hành', 'Phần mềm mã nguồn mở gây hại cho người sử dụng', 'Phần mềm mã nguồn mở không cho phép phân phối lại', 'Phần mềm mã nguồn mở không có bản quyền', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-062', 'Thiết bị nào quyết định khả năng làm việc của máy tính?', 'CPU', 'Chuột', 'Bàn phím', 'Máy in', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-063', 'Tốc độ của máy tính phụ thuộc vào các yếu tố nào sau đây?', 'Tất cả các đáp án đều đúng', 'Tốc độ của bộ vi xử lý. Tốc độ, dung lượng và không gian trống của ổ cứng', 'Dung lượng bộ nhớ truy cập ngẫu nhiên RAM', 'Hệ điều hành và quá trình tiến hành gom các tệp tin đã bị phân mảnh theo định kỳ', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-064', 'Tuỳ chọn nào cho phép cải thiện hiệu năng của máy tính?', 'Nâng cấp RAM, CPU của máy tính', 'Thêm card mạng không dây', 'Thêm các thiết bị không dây', 'Tăng số cổng kết nối', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-065', 'Hành động nào nên thực hiện để tăng hiệu năng của máy tính?', 'Loại bỏ các chương trình không bao giờ dùng và đóng bớt các ứng dụng cùng chạy tại một thời điểm', 'Thường xuyên khôi phục các tệp tin từ thùng rác', 'Luôn giữ các chương trình của nhà sản xuất trên máy tính', 'Chạy nhiều chương trình quét virus để tăng độ bảo vệ', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-066', 'Phương án nào sau đây là đúng?', 'Khi chuyển sang chế độ Sleep của Windows 7, máy tính vẫn tiêu thụ điện năng', 'Khi chuyển sang chế độ Sleep của Windows 7, máy tính không tiêu thụ điện năng', 'Khi chuyển sang chế độ Shutdown của Windows 7, máy tính vẫn tiêu thụ điện năng', 'Khi chuyển sang chế độ Logout của Windows 7, máy tính không tiêu thụ điện năng', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-067', 'Dưới góc độ địa lý, mạng máy tính được phân thành?', 'Mạng cục bộ, mạng diện rộng, mạng toàn cầu', 'Mạng cục bộ, mạng toàn cục, mạng diện rộng, mạng toàn cầu', 'Mạng toàn cục, mạng diện rộng, mạng toàn cầu', 'Mạng cục bộ, mạng toàn cục, mạng diện rộng', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-068', 'Mạng LAN là viết tắt của?', 'Local Area Network', 'Location At Network', 'Local At NetWork', 'Local Area Net', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-069', 'Mạng WAN là viết tắt của?', 'Wide Area Network', 'Winde Area Network', 'Wide are  network ', 'Wide area networks', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-070', 'Khi sử dụng mạng LAN ta được các lợi ích gì?', 'Tất cả các đáp án đều đúng', 'Quản lý tập trung', 'Chia sẻ tài  nguyên (ổ cứng, cơ sở dữ liệu, máy in, các phần mềm tiện ích,…)', 'Dễ bảo trì, bảo dưỡng', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-071', 'Mạng LAN là mạng kết nối các máy tính?', 'Ở gần nhau', 'Ở cách nhau một khoảng cách lớn', 'Cùng một hệ điều hành', 'Không dùng chung một giao thức', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-072', 'Mạng WAN là mạng kết nối các máy tính?', 'Ở cách nhau một khoảng cách lớn', 'Cùng một hệ điều hành', 'Ở gần nhau', 'Không dùng chung một giao thức', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-073', 'Những yếu tố nào sau đây được sử dụng cho mạng cục bộ (LAN)? ', 'Chia sẻ tài nguyên (máy in, máy quét,…)', 'Kết nối máy tính cho các khu vực địa lý cách xa nhau', 'Kết nối bằng viễn thông và vệ tinh', 'Tốc độ không cao', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-074', 'Căn cứ vào quy mô sử dụng người ta chia thành các loại mạng nào?', 'Tất cả các đáp án đều đúng', 'LAN', 'WAN', 'Internet', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-075', 'Kỹ thuật dùng để kết nối mạng cho nhiều máy tính với nhau trong phạm vi một văn phòng gọi là?', 'LAN', 'WAN', 'MAN', 'Internet', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-076', 'Đơn vị cơ bản dùng để đo tốc độ truyền dữ liệu là?', 'bps (bit per second)', 'Bit', 'Byte', 'Hz', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-077', 'MBps là đơn vị đo gì?', 'Tốc độ truyền dữ liệu', 'Tốc độ Ghi đĩa CD', 'Tốc độ đọc dữ liệu từ ổ đĩa cứng', 'Tốc độ ghi đĩa', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-078', 'Hãy chỉ ra phương tiện truyền dẫn thông tin?', 'Tất cả các đáp án đều đúng', 'Cáp điện thoại', 'Cáp quang', 'Sóng vô tuyến', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-079', 'Mạng Intranet là gì', 'Là sự kết nối các máy tính trong 1 cơ quan, tùy theo cấu hình của nhà quản trị (Admin) mà mỗi thông tin được hay không được cho phép gửi ra bên ngoài', 'Là sự kết nối giữa 2 máy tính với nhau', 'Là sự kết nối các máy tính trên phạm vi toàn cầu', 'Là sự kết nối các máy tính trong một phạm vi nhỏ (nhà ở, phòng làm việc,…)', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-080', 'Internet có nghĩa là?', 'Hệ thống thông tin toàn cầu có thể được truy nhập công cộng gồm các mạng máy tính được liên kết với nhau.', 'Hệ thống máy tính', 'Hệ thống máy chủ', 'Hệ thống cơ sở hạ tầng mạng', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-081', '"Download" có nghĩa là gì?', 'Tải file hay folder', 'Đang tải', 'Đã tải xong', 'Không trực tuyến', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-082', 'Hãy kể tên các dịch vụ kết nối Internet?', 'Tất cả các đáp án đều đúng', 'Dial-up', 'ADSL', 'FTTH', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-083', 'Các dịch vụ Internet dành cho người dùng?', 'Tất cả các đáp án đều đúng', 'Thương mại điện tử', 'Ngân hàng điện tử', 'Chính phủ điện tử', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-084', 'Đâu là phương thức làm việc trực tuyến?', 'Tất cả các đáp án đều đúng', 'E - lerning', 'Teleworking', 'Teleconference', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-085', 'Phát biểu nào sau đây về thư điện tử (email) là đúng?', 'Email là viết tắt của từ Electronic mail, có nghĩa là thư điện tử', 'Địa chỉ Email trùng với tên trong chứng minh nhân dân', 'Email vận chuyển qua nhân viên bưu điện', 'Chi phí cao', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-086', 'Cấu trúc 1 địa chỉ email là', '<Tên_người_dùng>@<Tên_miền>', '<Tên miền>@<Tên_người_dùng>', '<Tên_người_dùng>.<Tên_miền>', '<Tên_miền>.<Tên_người_dùng>', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-087', 'Thông tin nào sau đây nói về thư điện tử?', 'Là dịch vụ thực hiện truyền thông tin qua Internet thông qua các hộp thư điện tử', 'Người đưa thư chỉ việc để thư ở hòm thư trước nhà người nhận là người nhận có thể biết được nội dung', 'Là dịch vụ chỉ dành cho những người làm trong lĩnh vực điện tử viễn thông', 'Dịch vụ này chưa có', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-088', 'Lợi ích của email so với thư thông thường?', 'Tất cả các đáp án đều đúng', 'Tốc độ gửi, nhận thư nhanh', 'Tốn ít công vận chuyển, lưu trữ', 'Khối lượng thư gửi và nhận lớn hơn so với thư thông thường', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-089', 'Phát biểu nào là đúng với tin nhắn tức thời (Instant Messages)', 'Cho phép gửi các tập tin như tài liệu, hình ảnh, video clip, và âm thanh', 'Bất kỳ người sử dụng nào cũng có thể truy cập vào nhóm mà không cần phải được mời', 'Các thông báo trạng thái được hiển thị duy nhất khi người dùng đang trực tuyến', 'Không thể thay đổi trạng thái và tên của mỗi trạng thái người dùng', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-090', 'Đặc điểm chính của hệ thống truyền giọng nói trên giao thức IP (Voice over Internet Protocal-VoIP)', 'Cung cấp một liên kết đến các mạng điện thoại truyền thống và không trả thêm bất kì một khoản chi phí nào', 'Phụ thuộc vào phần cứng được sử dụng', 'Chỉ thực hiện được bằng phần mềm', 'Phụ thuộc vào loại mạng ảo hỗ trợ nó', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-091', 'Điều nào sau đây là đúng liên quan đến hệ thống truyền giọng nói trên giao thức IP (VoIP)?', 'Không yêu cầu một đường dây điện thoại truyền thống', 'Chỉ khả dụng trên các hệ thống máy tính cá nhân', 'Phụ thuộc vào loại phần cứng được sử dụng', 'Chuyên dụng trong các môi trường kinh doanh', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-092', 'Diễn đàn (forum) là gì?', 'Là nơi để cho người dùng Internet trao đổi thảo luận và tán ngẫu nhau', 'Là một tổ chức về sáng tạo nghệ thuật', 'Là tổ chức về công nghệ thông tin', 'Là một chương trình Chat trực tuyến.', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-093', 'Hãy chọn phương án đúng để điền vào dấu 3 chấm: "... là điểm truy cập tập trung và duy nhất, tích hợp các kênh thông tin dịch vụ, ứng dụng, là một sản phẩm hệ thống phần mềm được phát triển dựa trên một sản phẩm phần mềm cổng lõi"', 'Cổng thông tin điện tử', 'Trang tin điện tử', 'Báo', 'Tin nội bộ', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-094', 'Hãy chọn phương án đúng để điền vào dấu 3 chấm: "... là một hệ thống thông tin được sử dụng để tạo ra một hoặc nhiều trang có thông tin được trình bày dưới các chữ viết, chữ số, hình ảnh, âm thanh hay đặc biệt hơn là các ký hiệu để phục vụ cho việc cung cấp thông tin trên internet"', 'Trang tin điện tử', 'Cổng thông tin điện tử', 'Báo', 'Tin nội bộ', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-095', 'Nơi để cho người dùng Internet trao đổi thảo luận và tán gẫu nhau là gì?', 'Forum', 'Chatroom', 'Blog', 'Website', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-096', 'Hãy chọn phương án đúng để điền vào dấu 3 chấm: "... là hình thức thảo luận trực tiếp trên Internet, bạn có thể thảo luận, trao đổi và nhận được câu trả lời hầu như ngay lập tức, cũng tương tự như khi bạn nói chuyện qua điện thoại"', 'Chatroom', 'Blog', 'Forum', 'Website', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-097', 'Lựa chọn nào là đúng liên quan đến việc sửa tư thế khi sử dụng một máy tính?', 'Các cánh tay, cẳng tay, cổ tay để thẳng với bàn làm việc. Bàn chân nên được đặt trên sàn và hợp với đầu gối tạo thành một góc vuông', 'Đầu gối nên được ở một góc vuông nhưng ở một vị trí thấp hơn so với khung xương chậu', 'Luôn sử dụng một bệ nghỉ chân', 'Đầu và cằm nên nghiêng về phía sàn nhà, ngăn ngừa sự chênh lệch trọng lượng trên lưng và các vấn đề về cột sống', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-098', 'Tác hại khi ngồi lâu trước máy tính?', 'Tất cả các đáp án đều đúng', 'Mỏi mắt', 'Đau lưng', 'Căng thẳng thần kinh', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-099', 'Đặt màn hình máy tính như thế nào là tốt cho mắt bạn?', 'Không đối diện với cửa ra vào, cửa sổ, bóng đèn', 'Không có ánh sáng chiếu vào', 'Đối diện với cửa ra vào, của sổ, bóng đèn', 'Trong phòng tối', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-100', 'Công dụng của việc tái chế các bộ phận của máy tính?', 'Giảm ô nhiễm môi trường', 'Giảm các bệnh cho người sử dụng máy tính', 'Tiết kiệm chi phí sử dụng cho doanh nghiệp', 'Gây ô nhiễm môi trường', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-101', 'Các mật khẩu nào sau đây là khó phá nhất đối với hacker?', 'p@ssWord123', 'password', '123456', 'h3llo', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-102', 'Đâu là ví dụ của mật khẩu tốt?', 'Mật khẩu nhiều hơn 7 ký tự gồm cả chữ hoa, số, ký tự đặc biệt', 'Chọn một mật khẩu có ít hơn 6 ký tự', 'Mật khẩu phải giống lý lịch người sử dụng (ngày tháng năm sinh)', 'Mật khẩu chỉ gồm chữ hoặc số', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-103', 'Cách nào để đề phòng khi giao dịch trực tuyến?', 'Tất cả các đáp án đều đúng', 'Không để lộ hồ sơ cá nhân', 'Cảnh giác với thư giả mạo', 'Đặt mật khẩu nhiều hơn 7 ký tự, gồm cả chữ hoa, số, ký tự đặc biệt', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-104', 'Thiết bị nào hoạt động trong một môi trường máy tính nối mạng dùng để ngăn chặn một số liên lạc bị cấm bởi chính sách an ninh của cá nhân hay tổ chức?', 'Tường lửa', 'Điểm truy cập không dây', 'Router', 'Switch', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-105', 'Virus máy tính là gì?', 'Chương trình máy tính có khả năng tự lây lan nhằm phá hoại hoặc lấy cắp thông tin', 'Virus sinh học lây lan qua việc sử dụng chung bàn phím', 'Chương trình máy tính mô tả hoạt động của virus', 'Chương trình máy tính hoạt động ngay cả khi tắt máy', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-106', 'Virus máy tính có khả năng gì?', 'Tự sao chép để lây nhiễm', 'Lây lan qua máy quét', 'Lây lan qua màn hình', 'Lây lan qua máy in', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-107', 'Loại mã nguồn độc hại nào  không có chức năng tự sao chép nhưng lại có chức năng hủy hoại tương tự virus?', 'Trojan', 'Worm', 'Logic bomb', 'Stealth virus', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-108', 'Phần mềm nào có thể gây hại cho máy tính của người dùng?', 'Virut, Spyware', 'Virut', 'Spyware', 'Microsoft Office', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-109', 'Bạn nhận được một bức thư điện tử chứa tệp tin đính kèm mà bạn không nhận biết ra, bạn sẽ xử lý thế nào trong tình huống này để đảm bảo an toàn?', 'Quét tệp tin bằng chương trình chống virus', 'Mở tệp tin đó ra để kiểm tra loại tệp tin', 'Chuyển thư này cho người không có chuyên ngành công nghệ thông tin xem', 'Lưu bản sao tệp tin này vào đĩa cứng và mở bản sao này', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-110', 'Để phòng chống Virus, cách tốt nhất là?', 'Sử dụng các chương trình quét virus nổi tiếng và phải cập nhật thường xuyên, thường xuyên kiểm tra các ổ đĩa, đặc biệt thận trọng khi sao chép dữ liệu từ nơi khác mang tới', 'Sử dụng USB mà không quét Virus', 'Không nối mạng Internet cho máy tính', 'Chỉ quét virus cho những ổ đĩa cài hệ điều hành', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-111', 'Luật công nghệ thông tin ra đời và chính thức có hiệu lực từ ngày, tháng, năm nào?', 'Ngày 29/6/2006 và có hiệu lực ngày 01/01/2007', 'Ngày 29/6/2005 và có hiệu lực ngày 01/01/2006     ', 'Ngày 29/6/2007 và có hiệu lực ngày 01/01/2008', 'Ngày 29/6/2008 và có hiệu lực ngày 01/01/2009', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-112', 'Một thoả thuận ràng buộc mang tính pháp lý quy định cụ thể các điều khoản về sử dụng một ứng dụng và xác định các quyền của nhà sản xuất và của người dùng cuối là gì?', 'Giấy phép phần mềm (Software License)', 'Bản quyền sản xuất (Producer Copyright)', 'Thoả thuận không tiết lộ (Non-Disclosure Agreement)', 'Thoả thuận người dùng web (Web User Argeement)', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-113', 'Phát biểu nào sau đây là sai?', 'Cài phần mềm, trò chơi bị bẻ khóa là không vi phạm luật bản quyền', 'Cài đặt phần mềm, trò chơi từ đĩa CD có bản quyền là không vi phạm luật bản quyền', 'Cài phần mềm, trò chơi từ đĩa CD sao chép là vi phạm luật bản quyền', 'Cài đặt phần mềm, trò chơi từ đĩa CD đi mượn là vi phạm luật bản quyền', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-114', 'Hãy chọn phương án đúng để điền vào dấu 3 chấm: "... là độc quyền của một tác giả cho tác phẩm của người này"', 'Quyền tác giả', 'Quyền sao chép', 'Quyền dịch chuyển', 'Tất cả các phương án trên', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-115', 'Giấy phép sử dụng phần mềm có thể thiết lập tuỳ chọn nào?', 'Giá chuyển nhượng các quyền', 'Tự do kinh doanh trên bản sao giấy phép', 'Tự do để chuyển chương trình cho các bên thứ ba', 'Người sử dụng tự do quảng bá chính họ là tác giả của phần mềm', '', '', '', '', '', 'Khó', 'UI01'),
('UI01-116', 'Phần mềm văn phòng nào sau đây sử dụng giấy phép mã nguồn mở?', 'Open Office   ', 'Microsoft Office', 'Windows 7', 'Kaspersky', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-117', 'Khi một cơ quan mua một chương trình máy tính, trong những trường hợp nào chương trình này có thể được cài đặt miễn phí trong cơ quan đó?', 'Khi có sự đồng ý bản quyền cho phép điều này', 'Khi cơ quan đó có dưới 10 nhân viên', 'Khi chương trình này có giá dưới 100 nghìn đồng', 'Khi nó được sử dụng tối đa cho 3 máy tính một lúc', '', '', '', '', '', 'Dễ', 'UI01'),
('UI01-118', 'Tuỳ chọn nào là mô tả tốt nhất về phần mềm mã nguồn mở?', 'Phần mềm với mã nguồn có sẵn và có thể được sửa đổi bởi bất cứ ai', 'Một tuỳ chọn phần mềm mà người dùng có thể mua mã nguồn các ứng dụng', 'Phần mềm được phát triển bởi hai hay nhiều cá nhân', 'Phần mềm được sử dụng để mở một loạt tập tin cụ thể', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-119', 'Cách nào sau đây là tốt nhất để chống lại điểm yếu bảo mật trong phần mềm hệ điều hành', 'Luôn cập nhật phần mềm hệ thống', 'Không cập nhật phần mềm hệ thống', 'Cài đặt lại hệ điều hành ', 'Shutdown hệ thống khi không sử dụng', '', '', '', '', '', 'Trung bình', 'UI01'),
('UI01-120', 'Để bảo vệ dữ liệu ta phải làm gì?', 'Sao lưu dữ liệu thường xuyên', 'Không sao lưu dữ liệu để lưu trữ', 'Chia sẻ dữ liệu cho nhiều người dùng', 'Không đặt mật khẩu bảo vệ tài liệu', '', '', '', '', '', 'Khó', 'UI01'),
('UI02-001', 'Lệnh Start/Shut down dùng để làm gì?', 'Tắt máy tính', 'Khởi động lại máy tính', 'Tắt màn hình', 'Chuyển sang chế độ tiết kiệm điện', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-002', 'Có bao nhiêu cách thoát khỏi một chương trình ứng dụng trong hệ điều hành Windows 7?', '4', '3', '2', '1', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-003', 'Khi khởi động máy tính, phần mềm nào sau đây sẽ được thực hiện trước?', 'Hệ điều hành', 'Phần mềm gõ tiếng Việt', 'Phần mềm Micrsoft Office', 'Chương trình diệt virus máy tính', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-004', 'Để tắt máy tính đúng cách ta chọn?', 'Nhấn nút Start ở góc dưới bên trái màn hình nền, chọn mục Shutdown', 'Tắt nguồn điện', 'Bấm nút Power trên hộp máy', 'Bấm nút Reset trên hộp máy', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-005', 'Quy trình tắt máy tính nào sau đây đảm bảo an toàn cho chương trình và dữ liệu?', 'Ghi dữ liệu vào đĩa, đóng các file chương trình, Chọn nút Start/Shut down', 'Đóng các file chương trình, ghi dữ liệu vào đĩa, Shutdown Windows', 'Đóng các file chương trình, Shutdown Windows, tắt công tắc nguồn', 'Không có đáp án đúng', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-006', 'Trong Windows 7, để ngắt ổ đĩa USB một cách an toàn, có thể dùng cách nào sau đây?', 'Kích chuột phải trên biểu tượng USB ở góc phải màn hình, chọn thiết bị cần gỡ bỏ và chọn Eject', 'Đóng tất cả các chương trình đang chạy', 'Khởi động lại HĐH Windows', 'Không có đáp án đúng', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-007', 'Để thiết lập chế độ nghỉ màn hình (Screen Saver) trong Windows 7, ta sử dụng công cụ nào sau đây trong Control Panel?', 'Display', 'Device Manager', 'Taskbar and Start Menu', 'Không có đáp án đúng', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-008', 'Để khởi động lại máy tính, phát biểu nào dưới đây là sai', 'Bấm nút Power trên hộp máy', 'Từ cửa sổ màn hình nền nhấn nút Start - Shutdown, sau đó chọn mục Restart', 'Bấm nút Reset trên hộp máy', 'Nhấn tổ hợp phím Ctrl - Alt - Del, chọn mục Restart', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-009', 'Trong Control Panel của Windows 7, để thay đổi cách thức đăng nhập (login) và đăng xuất (logout), ta có thể dùng cách nào sau đây?', 'Chọn User Accounts, chọn Change the way users log on or off', 'Chọn System, chọn Change the way user log on or off', 'Chọn Windows Firewall, đánh dấu mục On hoặc Off', 'Không có đáp án đúng', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-010', 'Trong hệ điều hành Windows 7, khi người dùng muốn rời khỏi máy tính, có thể dùng cách nào sau đây để khóa máy tính tạm thời?', 'Bấm Ctrl + Alt + Del, chọn Lock This Computer', 'Bấm Ctrl + L, chọn Lock Computer', 'Bấm Alt + L, chọn Lock Computer', 'Nhấn nút Power', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-011', 'Lựa chọn nào sau đây trong Windows 7 cho phép tắt máy tính và lưu trữ thông tin, trạng thái các chương trình đang hoạt động trong bộ nhớ vào ổ đĩa cứng và có thể cho phép người dùng tiếp tục sử dụng chỉ cần nhấn phím bất kỳ?', 'Kích Start, chọn Shutdown/Hibernate', 'Kích Start, chọn Shutdown/Standby', 'Kích Start, chọn Shutdown/Log off', 'Nhấn tổ hợp phím Ctrl + Alt + Delete', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-012', 'Phím, tổ hợp phím dùng để chụp cửa sổ hiện hành?', 'Alt+Print Screen\n(hoặc Alt + PrtSc)', 'Ctrl+Print Screen', 'Print Screen', 'Shift+ Print Screen', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-013', 'Phím tắt nào dùng để đóng cửa sổ hiện hành?', 'Alt+F4', 'F1', 'Tab+F9', 'F7', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-014', 'Phím tắt nào sao chép một đối tượng vào ClipBoard?', 'Ctrl+C', 'Ctrl+X', 'Ctrl+V', 'Ctrl+Z', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-015', 'Phím tắt để cắt một đối tượng vào ClipBoard là gì?', 'Ctrl+X', 'Ctrl+M', 'Ctrl+V', 'Ctrl+Z', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-016', 'Phím tắt được sử dụng để hiển thị thực đơn Start?', 'Ctrl+Esc', 'Alt+F4', 'Alt+Tab', 'Ctrl+Tab', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-017', 'Phím tắt nào để chuyển đổi giữa các cửa sổ trong Windows 7?', 'Alt + Tab', 'Ctrl + T', 'Alt + O', 'Ctrl + Alt + Tab', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-018', 'Để di chuyển con trỏ chuột trong khi soạn thảo, tổ hợp phím Ctrl + <- (mũi tên sang trái), có chức năng gì?', 'Sang trái một từ', 'Sang phải một ký tự', 'Sang trái một ký tự', 'Sang phải một từ', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-019', 'Để di chuyển con trỏ chuột trong khi soạn thảo, phím -> (mũi tên sang phải), có chức năng?', 'Sang phải một ký tự', 'Sang phải một từ', 'Sang trái một ký tự', 'Sang trái một từ', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-020', 'Muốn xóa ký tự đằng sau con trỏ thì nhấn phím gì?', 'Delete', 'Home', 'End', 'Ctrl', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-021', 'Tổ hợp phím Ctrl + C có chức năng gì?', 'Sao chép văn bản được chọn, và đưa vào bộ nhớ đệm', 'Di chuyển văn bản được chọn, và đưa vào bộ nhớ đệm', 'Hiển thị văn bản từ bộ nhớ đệm', 'Phục hồi lại thao tác trước đó', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-022', 'Tổ hợp phím Ctrl + X có chức năng gì?', 'Di chuyển văn bản được chọn, và đưa vào bộ nhớ đệm', 'Sao chép văn bản được chọn, và đưa vào bộ nhớ đệm', 'Hiển thị văn bản từ bộ nhớ đệm', 'Phục hồi lại thao tác trước đó', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-023', 'Giả sử bạn đang soạn thảo văn bản trên máy tính và bỗng nhiên bàn phím của bạn gặp sự cố, không gõ được kí tự. Bạn xử lý như thế nào?', 'Tìm và mở ứng dụng bàn phím ảo (On-Screen Keyboard) có sẵn của hệ điều hành Windows 7 để bật bàn phím ảo', 'Kích hoạt ứng dụng kiểm tra phần cứng máy tính', 'Kết nối máy tính với màn hình của máy tính khác để tiếp tục soạn thảo văn bản', 'Kiểm tra lại kết nối mạng máy tính', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-024', 'Khi kích đúp chuột vào thanh tiêu đề của một cửa sổ đang ở kích thước cực đại trong hệ điều hành Windows 7 sẽ', 'Thu cửa sổ về kích thước trước đó', 'Thu cửa sổ về kích thước cực tiểu', 'Chuyển về chế độ cho phép thay đổi kích thước cửa sổ', 'Đóng cửa sổ đó', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-025', 'Trong các biểu tượng ứng dụng sau đây, biểu tượng nào không hiển thị trên màn hình nền Desktop?', 'Máy in HP', 'Taskbar', 'Recycle Bin', 'Đồng hồ hệ thống', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-026', 'Phần mềm nào dưới đây nếu không được cài đặt máy tính sẽ không hoạt động?', 'Windows', 'Chrome', 'Vietkey', 'Norton AntiVirus', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-027', 'Để thay đổi kiểu hiển thị ngày tháng năm trong Windows 7 được thiết lập ở đâu?', 'Control Panel/Region and Language', 'Control Panel - System', 'Control Panel - Display', 'Control Panel - Regional', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-028', 'Trong hệ điều hành Windows 7, muốn thay đổi hình nền cho màn hình Desktop, ta nhấp phải chuột tại vùng trống trên Desktop và chọn chức năng nào?', 'Personalization, chọn Desktop Background', 'Screen Resolutions', 'Gadgets', 'New - Briefcase', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-029', 'Chức năng nào trong Windows 7 cho phép thiết lập các thông số cho môi trường làm việc?', 'Control Panel', 'System Restore', 'System Informations', 'Taskbar and Start Menu', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-030', 'Để gỡ bỏ một máy in đã cài đặt, ta thực hiện theo cách nào sau đây?', 'Tại cửa sổ Printers and Faxes, nhấp phải chuột vào máy in và chọn Remove Device', 'Chọn Add/Remove Hardware sau đó chọn biểu tượng máy in cần gỡ bỏ', 'Chọn Device Manager sau đó chọn biểu tượng máy in cần gỡ bỏ', 'Gỡ bỏ máy tin trong Control Panenl', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-031', 'Để gỡ bỏ 1 chương trình nào thì mở Control Panel/Uninstall a Programs/ Chọn biểu tượng chương trình cần gỡ bỏ và chọn?', 'Uninstall', 'Change', 'Update', 'Delete', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-032', 'Để hiển thị được Computer trên màn hình nền thì làm như thế nào?', 'Kích chuột vào nút Start/Nhấp phải chuột vào Computer và chọn Show on Desktop', 'Nhấn phím Ctrl + C', 'Nhấn Ctrl + V', 'Nhấn Ctrl + X', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-033', 'Trong Control Panel để gỡ bỏ một phần mềm ta chọn?', 'Programs and Features', 'Administrative Tools', 'System', 'Add Hardware', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-034', 'Trong hệ điều hành Windows, để sửa lại ngày/giờ cho hệ thống máy tính, sử dụng công cụ nào sau đây?', 'Date and Time trong cửa sổ Control Panel', 'Date and Time trong cửa sổ My Computer', 'Date and Time trong cửa sổ Internet Explorer', 'Date and Time trong cửa sổ My Networking', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-035', 'Trong hệ điều hành Windows, để thay đổi lại cách biểu diễn ngày/giờ, sử dụng công cụ nào sau đây?', 'Region and Language', 'Date and Time', 'System Infomations', 'Display', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-036', 'Để thiết lập chế độ nghỉ màn hình (Screen Saver) trong Windows, ta sử dụng công cụ nào sau đây trong Control Panel?', 'Display', 'Device Manager', 'Taskbar and Start Menu', 'Auto Play', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-037', 'Trong windows, để xem những chương trình nào đã được Updates thì chọn chức năng nào trong Control Panel/Programs and Features?', 'View Installed Updates', 'Không làm gì', 'Xóa biểu tượng chương trình trong menu Start', 'Kích chuột phải vào biểu tượng rồi bấm tổ hợp phím Shift + Delete', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-038', 'Chức năng nào cho phép tạo các tài khoản để truy cập vào máy tính?', 'User Accounts', 'Windows Explorer', 'Desktop', 'Multimedia', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-039', 'Trong hệ điều hành Windows, để thay đổi ngày/ giờ cho hệ thống máy tính, sử dụng công cụ nào sau đây?', 'Date and Time trong cửa sổ Control Panel', 'Date and Time trong cửa sổ My Computer', 'Date and Time trong cửa sổ Internet Explorer', 'Không có đáp án đúng', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-040', 'Trong hệ điều hành Windows, để lấy lại mặc định ngày/giờ của hệ thống, sử dụng công cụ nào sau đây?', 'Region and Language', 'Date and Time', 'System Infomations', 'Không có đáp án đúng', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-041', 'Chức năng của Control Panel là?', 'Thiết lập cấu hình Windows 7 như thay đổi ngày giờ, cài đặt thêm các thiết bị, gỡ bỏ các chương trình ứng dụng, …', 'Soạn thảo văn bản trên Windows', 'Sao chép các tệp tin trên máy tính', 'Cho thấy tên của các máy tính và các tài nguyên khác trong mạng cục bộ', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-042', 'Chức năng nào cho phép thay đổi ngày giờ trong máy tính trên hệ điều hành Windows?', 'Control Panel/Date and Time', 'Control Panel/Display', 'Control Panel/Fonts', 'Control Panel/Folder Options', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-043', 'Trong hệ điều hành Windows, cửa sổ ứng dụng nào sau đây chứa thông tin như dung lượng của các ổ đĩa cứng, ổ đĩa CD/DVD, USB, tài nguyên trong máy tính?', 'Computer        ', 'Control Panel          ', 'My Document           ', 'Recycle Bin', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-044', 'Phát biểu nào sau đây đúng nhất cho khái niệm về biểu tượng Shortcut trong Windows?', 'Là biểu tượng giúp người dùng truy cập nhanh vào đối tượng thường sử dụng', 'Là chương trình được cài đặt trên máy tính', 'Là biểu tượng để mở cửa sổ My Computer', 'Là biểu tượng của thư mục chứa virus', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-045', 'Hệ điều hành Windows 7 có bao nhiêu loại Shortcut?', '2 loại', '1 loại', '3 loại', '4 loại', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-046', 'Khi thực hiện thao tác xóa một biểu tượng Shortcut trong Windows, chương trình tương ứng sẽ chịu tác động nào sau đây?', 'Không thay đổi', 'Bị xóa', 'Không khởi động được', 'Không lưu được', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-047', 'Khi sao chép Shortcut để mở một tệp hoặc thư mục từ máy A sang máy B, thì tại máy B người dùng có thể làm gì?', 'Không mở được thư mục hoặc tệp', 'Vẫn mở được thư mục', 'Máy B sẽ không đọc được tệp hoặc thư mục', 'Máy B sẽ bị nhiễm Virus', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-048', 'Để tạo biểu tượng Shortcut một chương trình ứng dụng trên Desktop của Windows, phương pháp nào sau đây không thể thực hiện được?', 'Kích chuột phải tại biểu tượng chương trình, chọn Send to/Desktop (Creat Shortcut)', 'Kích chuột phải tại biểu tượng chương trình, chọn Send to Desktop', 'Trỏ chuột vào biểu tượng chương trình, sau đó kéo ra Desktop', 'Kích chuột phải tại Desktop, chọn New/Shortcut sau đó nhập tên chương trình', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-049', 'Windows Explorer dùng để làm gì?', 'Quản lý tập tin, thư mục', 'Trình duyệt Web', 'Truy cập mạng', 'Phần mềm xây dựng trang web', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-050', 'Cách nào sau đây được sử dụng để khởi động Start Menu của hệ điều hành Windows?', 'Bấm Ctrl+Esc', 'Bấm Alt+Tab', 'Bấm Shift+Tab', 'Không có đáp án đúng', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-051', 'Thực đơn dùng trong một chương trình ứng dụng còn được gọi là gì?', 'Menu bar', 'Menu pad', 'Menu options', 'Tool bar', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-052', 'Để ẩn toàn bộ chương trình và trở về màn hình Desktop thì nhấn tổ hợp phím nào?', 'Windows + D', 'Ctrl + D', 'Ctrl + N', 'Ctrl + Alt + Tab', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-053', 'Ứng dụng có thể đọc các file có phần mở rộng là PDF là?', 'Foxit Reader', 'Corel Draw CS5', 'Photoshop CS6', 'My computer', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-054', 'Ứng dụng có thể đọc các file có phần mở rộng là PPT hoặc PPTX là?', 'Microsoft Office Power Point', 'Foxit Reader', 'WinZip', 'Paint', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-055', 'Ứng dụng có thể đọc các file có phần mở rộng là WMA là', 'Windows Media Player', 'Paint', 'WordPad', 'NotePad', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-056', 'Tệp tin có phần mở rộng là JPG là tệp?', 'File ảnh', 'File thực thi', 'File văn bản', 'File âm thanh', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-057', 'Tệp tin có phần mở rộng là MP3 cho ta biết đây là', 'File âm thanh', 'File ảnh', 'File thực thi', 'File văn bản', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-058', 'Trong MS Windows, biểu tượng của thư mục thường có màu gì?', 'Vàng', 'Xanh', 'Tím', 'Đỏ', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-059', 'Nguyên tắc tổ chức file và thư mục trong hệ điều hành Windows 7 dựa trên cấu trúc nào sau đây?', 'Cấu trúc cây', 'Cấu trúc đồ thị', 'Cấu trúc chu trình', 'Cấu trúc lặp', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-060', 'Trong Windows 7, thư mục được tổ chức dưới dạng?', 'Cây', 'Dây', 'Chuỗi', 'Đồ thị', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-061', 'Các biểu tượng nào sau đây trên nền Desktop của hệ điều hành Windows 7 được gọi là biểu tượng Shortcut?', 'Microsoft Word, Micrsoft Excel, Unikey', 'My Computer, My Documents, Recycle Bin', 'Microsoft Word, My Computer, Unikey', 'Không có đáp án đúng', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-062', 'Theo nguyên tắc quản lý file, thư mục của hệ điều hành Windows, phát biểu nào sau đây không đúng?', 'Trong một file có thể chứa các file và thư mục con khác', 'Trong một thư mục có thể chứa các file và thư mục con khác', 'Trong một file có thể không chứa thông tin', 'Không có đáp án đúng', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-063', 'Phát biểu nào sau đây là đúng?', 'Tệp là đơn vị lưu trữ thông tin nhỏ nhất, không thể chứa tệp, thư mục khác', 'Tệp có thể chứa 2 tệp khác', 'Tệp có thể chứa thư mục', 'Tệp có thể chứa ổ đĩa', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-064', 'Trong hệ điều hành Windows, phần mở rộng trong tên file đảm nhận chức năng nào sau đây?', 'Quy định kiểu file', 'Quy định kích thước file', 'Quy định thuộc tính file', 'Quy định định dạng file', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-065', 'Phần mở rộng của tệp tin ngăn cách nhau bởi dấu gì?', 'Dấu chấm (.)', 'Dấu chấm than (!)', '@', '*', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-066', 'Muốn sắp xếp các biểu tượng trên desktop theo tên, ta chọn chuột phải lên nền desktop/chọn Sort by và chọn', 'Name', 'Size', 'Item Type', 'Date Modified', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-067', 'Khi muốn sắp xếp các biểu tượng trên Desktop ta tiến hành cách nào sau đây?', 'Nhấp chuột phải trên Desktop, chon Arrange Icons By…', 'Nhấp chuột phải lên Computer, chọn Arrange Icons By…', 'Nhấp chuột phải lên nút Start, chọn New shortcut…', 'Nhấp chuột phải lên nút Start, chọn Arrange Icons By…', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-068', 'Trong Windows, muốn tạo 1 thư mục mới trên ổ đĩa D:\\ ta thực hiện', 'Chuột phải chọn New - Folder', 'Insert - New  - Folder', 'File - New - Shortcut', 'Edit - New - Folder', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-069', 'Trong hệ điều hành Windows, muốn tạo mới một thư mục, ta mở đường dẫn cần chứa thư mục và thực hiện thao tác nào sau đây?', 'Kích chuột phải, chọn New/ Folder, gõ tên thư mục mới và bấm Enter', 'Bấm Ctrl + N, gõ tên thư mục mới và bấm Enter', 'Bấm F2, gõ tên thư mục mới và bấm Enter', 'Không có đáp án đúng', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-070', 'Trong hệ điều hành Windows, xâu kí tự nào dưới đây không thể dùng làm tên tệp?', 'http://vtv.vn', 'Giaymoi.doc', 'Baitap.pas', 'Anh.bmp', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-071', 'Bạn đang làm việc với hệ điều hành Microsoft Windows 7. Bạn muốn tạo một thư mục mới có tên Báo Cáo trên desktop, nhưng đã có sẵn một thư mục khác có cùng tên trên desktop. Điều gì sẽ xảy ra khi bạn cố tạo thư mục Báo Cáo', 'Một thông báo xuất hiện báo cho bạn rằng đã có một thư mục cùng tên với thư mục bạn đang tạo và hỏi bạn có muốn gộp với thư mục đã có không', 'Hệ điều hành tự động xoá thư mục trên desktop và cho phép bạn tạo ra một thư mục mới', 'Một thông báo xuất hiện báo cho bạn rằng có thư mục khác có cùng tên như thế, những vẫn cho bạn tạo thư mục đó', 'Không sao cả. Bạn có thể có nhiều thư mục khác nhau với tên trùng nhau trên desktop', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-072', 'Phần mềm Text Document dùng để tạo tệp có phần mở rộng là gì?', 'txt', 'jpg', 'pas', 'pps', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-073', 'Trong các tên tệp sau đây, cách đặt tên tệp nào máy sẽ báo lỗi?', 'Hoc_phan_tin1?.doc', 'Hoc_phan_tin_1.doc', 'Hoc,phan,tin,1.doc', 'Hoc phan tin 1.doc', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-074', 'Trong các tên thư mục sau đây, tên thư mục nào máy chấp nhận?', 'Hoc_phan_tin_1', 'Hocphantin1:.doc', 'Hoc*phan*tin*1.doc', 'Hoc?phan?tin?1', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-075', 'Phím tắt để đổi tên tệp tin, thư mục là gì?', 'F2', 'Ctrl+N', 'Alt+N', 'F4', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-076', 'Tên thư mục trong hệ điều hành Windows 7 cần thoả mãn điều kiện nào sau đây?', 'Tối đa 255 ký tự, không chứa các ký tự đặc biệt', 'Tối đa 8 ký tự, không có khoảng trắng và các ký tự đặc biệt', 'Tối đa 255 ký tự, không bắt đầu bằng chữ số, không chứa khoảng trắng.', 'Tối đa 8 ký tự, không chứa kí tự số', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-077', 'Tên tệp trong hệ điều hành Windows gồm mấy phần?', '2 phần', '3 phần', '1 phần', '4 phần', '', '', '', '', '', 'Dễ', 'UI02');
INSERT INTO `cauhoi` (`macauhoi`, `tencauhoi`, `padung`, `pasai1`, `pasai2`, `pasai3`, `imgviauTencauhoi`, `imgviauPadung`, `imgviauPasai1`, `imgviauPasai2`, `imgviauPasai3`, `mucdo`, `mabode`) VALUES
('UI02-078', 'Thao tác: Chọn thư mục\\ sau đó nhấn F2, có chức năng gì?', 'Đổi tên thư mục', 'Xóa thư mục', 'Di chuyển thư mục', 'Không có đáp án đúng', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-079', 'Trong hệ điều hành window, để xem thuộc tính của tệp hoặc thư mục cần làm gì?', 'Nhấp phải chuột vào tệp/thư mục, chọn Properties/xem tại Attributes', 'Nhấn tổ hợp phím Ctrl +R, gõ tên mới cho thư mục và nhấn phím Enter', 'Nhấn tổ hợp phím Ctrl + N, gõ tên mới và nhấn phím Enter', 'Nhấn tổ hợp phím Ctrl + T, gõ tên mới và nhấn phím Enter', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-080', 'Thao tác: Chọn thư mục\\nhấn Delete, có chức năng gì?', 'Xóa thư mục', 'Di chuyển thư mục', 'Đổi tên thư mục', 'Không có đáp án đúng', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-081', 'Tệp hoặc thư mục có thuộc tính chỉ đọc là thuộc tính nào?', 'Read Only', 'Modify', 'Hidden', 'Delete', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-082', 'Trong hệ điều hành Windows, để thực hiện chọn các tệp/thư mục liền nhau trong danh sách file/thư mục cần thực hiện thao tác nào sau đây?', 'Kích chuột tại file đầu, giữ phím Shift sau đó kích chuột tại file cuối', 'Kích chuột tại file đầu, giữ phím Alt sau đó kích chuột tại file cuối', 'Kích chuột tại file đầu, giữ phím Ctrl sau đó kích chuột tại file cuối', 'Kích chuột phải tại file đầu, giữ phím F4 sau đó kích chuột tại file cuối', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-083', 'Trong hệ điều hành Windows, để thực hiện chọn các file không liên tục trong danh sách file cần tực hiện thao tác nào sau đây?', 'Giữ phím Ctrl và kích chuột tại các file cần chọn', 'Giữ phím Alt và kích chuột tại các file cần chọn', 'Giữ phím Shift và kích chuột tại các file cần chọn', 'Kích chuột phải tại file đầu, giữ phím F5 sau đó kích chuột tại file cuối', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-084', 'Trong hệ điều hành Windows, muốn chọn tất cả các đối tượng trong một cửa sổ, ta sử dụng cách nào sau đây?', 'Nhấn tổ hợp phím Ctrl + A', 'Nhấn tổ hợp phím Ctrl + Shift + A', 'Nhấn tổ hợp phím Alt  + Tab', 'Không có đáp án đúng', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-085', 'Trong hệ điều hành Windows, phải nhấn giữ phím nào khi chọn nhiều tệp hoặc thư mục không liền nhau?', 'Ctrl', 'Alt', 'Shift', 'Enter', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-086', 'Trong hệ điều hành Windows, muốn sao chép các tệp đang chọn vào bộ nhớ đệm ta thực hiện', 'Nhấn tổ hợp phím Ctrl + C hoặc nhấp phải chuột vào đối tượng chọn Copy', 'Nhấn tổ hợp phím Ctrl + X hoặc nhấp phải chuột vào đối tượng chọn Copy', 'Nhấn tổ hợp phím Ctrl + V hoặc nhấp phải chuột vào đối tượng chọn Copy', 'Không có đáp án đúng', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-087', 'Trong hệ điều hành Windows, để dán các tệp/thư mục sau khi đã thực hiện lệnh copy, ta mở ổ đĩa, thư mục muốn chứa bản sao và thực hiện', 'Nhấn tổ hợp phím Ctrl + V hoặc nhấp phải chuột vào đối tượng chọn Paste', 'Nhấn tổ hợp phím Ctrl + X hoặc nhấp phải chuột vào đối tượng chọn Copy', 'Nhấn tổ hợp phím Ctrl + V hoặc nhấp phải chuột vào đối tượng chọn Copy', 'Không có đáp án đúng', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-088', 'Muốn xóa một file trong Windows, có thể thực hiện theo cách nào sau đây?', 'Kích chuột phải tại file, chọn Delete', 'Mở file, chọn toàn bộ nội dung file, bấm phím Delete', 'Mở file, chọn toàn bộ nội dung file, giữ phím Shift và bấm phím Delete', 'Không có đáp án đúng', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-089', 'Muốn xoá thư mục, ta thao tác thế nào?', 'Nhấp phải chuột vào thư mục chọn Delete hoặc nhấn phím Delete', 'Nhấn phím Ctrl + C', 'Nhấn phím Ctrl + X', 'Ctrl + V', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-090', 'Trong các mô tả sau, nơi lưu trữ nào chứa các tệp tin và thư mục trước khi bị xóa hoàn toàn?', 'Recycle Bin', 'Inbox', 'Thư mục Documents', 'Thư mục Program File', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-091', 'Phát biểu nào về chức năng của thùng rác (Recycle Bin) là đúng?', 'Chỉ lưu các tệp tin bị xoá từ ổ đĩa cứng', 'Lưu trữ tất cả các tệp bị xoá bởi người dùng', 'Chỉ lưu trữ các tệp tin bị xoá từ ổ cứng và các thiết bị lưu trữ di động', 'Lưu các tệp tin bị xoá từ ổ cứng và ổ đĩa mạng được đặt ở nơi khác', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-092', 'Trong hệ điều hành Windows, muốn khôi phục đối tượng đã xóa, mở cửa sổ Recycle Bin và thực hiện thao tác nào sau đây?', 'Kích chuột phải tại đối tượng, chọn Restore ', 'Kích chuột phải tại đối tượng, chọn Cut', 'Kích chuột phải tại đối tượng, chọn Properties', 'Không có đáp án đúng', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-093', 'Trong hệ điều hành Windows, để phục hồi tất cả các đối tượng trọng Recycle Bin (thùng rác) ta mở Recycle Bin và chọn', 'Restore all Items', 'Delete', 'Redo', 'Undo Delete', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-094', 'Một tệp tin đã được xóa nằm trong thùng rác có thể', 'Có thể khôi phục lại vị trí ban đầu', 'Không khôi phục được', 'Đã được xóa vĩnh viễn', 'Chỉ còn lại biểu tượng, nội dung đã bị xóa', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-095', 'Phát biểu nào sau đây là sai?', 'Có thể lấy lại dữ liệu sau khi xóa bằng nhấn tổ hợp phím Shift+Delete', 'Có thể biết được một tệp tin trên đĩa CD-ROM có kích thước bao nhiêu Byte', 'Thư mục có thể chứa thư mục con và tệp tin', 'Có thể sao dữ liệu ra các thiết bị lưu trữ khác nhau', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-096', 'Trong Recycle Bin, để biết chính xác vị trí của một file đã xoá, có thể sử dụng cách nào sau đây?', 'Kích View, chọn Details', 'Kích chuột phải tại file, chọn Properties', 'Xem phần Details trong khung bên trái màn hình', 'Không có đáp án đúng', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-097', 'Các tệp, thư mục trong USB, khi xóa thì đối tượng sẽ được lưu ở đâu?', 'Xóa khỏi máy tính', 'Lưu ở Recycle Bin', 'Có thể được phục hồi khi mở My Documents', 'Có thể được phục hồi khi mở Computer', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-098', 'Chọn thư mục, ấn tổ hợp phím Shift + Delete, điều gì sẽ xảy ra?', 'Thư mục bị xoá vĩnh viễn khỏi máy', 'Thư mục bị đưa vào thùng rác', 'Phục hồi thư mục từ trong thùng rác', 'Không có đáp án đúng', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-099', 'Muốn xoá vĩnh viễn thư mục ra khỏi máy, ta thao tác thế nào?', 'Chọn thư mục và nhấn tổ hợp phím Shift + Delete', 'Nhấn tổ hợp phím Ctrl + A', 'Nhấn tổ hợp phím Ctrl +B', 'Nhấn tổ hợp phím Ctrl + Z', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-100', 'Muốn xóa vĩnh viễn, không cần phục hồi các tệp hoặc thư mục được chọn, cần thực hiện thao tác nào sau đây?', 'Giữ phím Shift và kích chuột phải, chọn Delete', 'Giữ phím Ctrl và kích chuột phải, chọn Delete', 'Giữ phím Alt và kích chuột phải, chọn Delete', 'Giữ phím Insert và kích chuột phải, chọn phím Enter', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-101', 'Để khởi động chức năng tìm kiếm thông tin trong Windows, thao tác nào sau đây không đúng?', 'Kích chuột phải tại Desktop, chọn Search', 'Kích nút Start, chọn Search', 'Kích nút Search trong cửa sổ My Computer', 'Nhập từ khóa trong ô tìm kiếm trên Windows Explorer, sau đó chọn Date Modified và Size để tìm kiếm theo ngày sửa và kích thước file', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-102', 'Chức năng tìm kiếmtrong hệ điều hành Windows 7 cho phép tìm file và folders theo?', 'Tên, Ngày chỉnh sửa, Kích thước', 'Ngày tạo', 'Nội dung trong file', 'Hình ảnh trong file', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-103', 'Các kí tự nào sau đây được sử dụng để thay thế tên file trong thao tác tìm kiếm?', 'Kí tự * và ?', 'Kí tự & và @', 'Kí tự ! và %', 'Kí tự & và $', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-104', 'Khi tìm kiếm tập tin, thư mục, ký tự * dùng để làm gì?', 'Thay thế cho 1 số ký tự', 'Không thể thay thế cho ký tự', 'Thay thế cho dấu cách', 'Thay thế cho từ khóa', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-105', 'Mục đích của việc nén dữ liệu (Data compression) là?', 'Giảm dung lượng lưu trữ ', 'Mã hóa dữ liệu để người khác không đọc được', 'Để sắp xếp lại thư mục theo nhóm', 'Chuyển đổi định dạng dữ liệu của file từ .doc sang .rar', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-106', 'Ứng dụng nào được sử dụng mở các tệp tin có phần mở rộng là RAR, ZIP là?', 'Winrar, WinZip', 'Windows 7', 'Windows 8', 'Windows 10', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-107', 'Tệp tin có phần mở rộng là RAR, ZIP cho ta biết là?', 'File nén', 'File thực thi', 'File video', 'File văn bản', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-108', 'Lựa chọn nào chỉ ra tiện ích của tệp tin nén?', 'Tệp tin nén có kích thước nhỏ hơn kích thước của tệp tin ban đầu và thông tin ban đầu không bị mất', 'Nội dung của tệp tin RAR xem được ở bất kì máy tính nào mà không cần bất kì phần mềm cụ thể nào', 'Ai cũng mở được mà không cần mật khẩu', 'Tệp tin ban đầu có dung lượng nhỏ hơn dung lượng của tệp tin nén', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-109', 'Ứng dụng nào được sử dụng để xem nội dung của tệp Reports.zip?', 'Chương trình nén và giải nén', 'Trình xử lý văn bản word', 'Ứng dụng trang tính', 'Trình duyệt web', '', '', '', '', '', 'Trung bình', 'UI02'),
('UI02-110', 'Bạn cần gửi 24 tệp tin có kích thước lớn bằng email. Làm thế nào để bạn có thể gửi chúng nhanh và hiệu quả hơn?', 'Sử dụng chương trình nén để nén và gửi tệp tin nén này với dung lượng nhỏ hơn', 'Nhóm các tệp tin thành từng nhóm sao cho ít tệp tin hơn được gửi, với cùng nội dung và dung lượng', 'Gửi từng tệp', 'Tạo một tệp chứa 24 tệp tin ban đầu', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-111', 'Chương trình nào được thiết kế để phát hiện, ngăn chặn, loại bỏ và phòng chống virus máy tính?', 'Antivirus', 'Worm', 'Malware', 'Spyware', '', '', '', '', '', 'Khó', 'UI02'),
('UI02-112', 'Bộ gõ nào hỗ trợ gõ tiếng việt trong hệ điều hành Windows 7?', 'Unikey', 'Laban Key', 'Google Voice Inout', 'Không có đáp án đúng', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-113', 'Phông chữ quy định trong TT03/2014/TT-BTTTT khi soạn thảo văn bản là?', 'Times New Roman', 'Tahoma', 'Arial', 'Verdana', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-114', 'Nếu bạn đang gõ từ có dấu, để bỏ dấu nhấn phím gì?', 'Z', 'A', 'Ctrl + A', 'Ctrl +N', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-115', 'Khi đang soạn thảo văn bản sử dụng bộ gõ tiếng Việt Unikey, tổ hợp phím Ctrl + Shift có chức năng gì?', 'Chuyển chế độ gõ tiếng Anh sang tiếng Việt hoặc ngược lại tiếng Việt sang tiếng Anh', 'Chuyển chế độ bảng mã Unicode sang TCVN3', 'Tắt chương trình gõ tiếng Việt', 'Đóng bảng điều khiển chương trình gõ tiếng Việt', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-116', 'Để chuyển đổi font từ dạng TCVN3 sang UNICODE hoặc ngược lại thì dùng chương trình gì?', 'Unikey', 'ABC', 'Vietkey', 'Laban Key', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-117', 'Trong hệ điều hành, để xem danh sách các máy in đã được cài đặt, ta có thể sử dụng công cụ nào sau đây?', 'Printers and Faxes', 'Device Manager', 'System Informations', 'Default Programs', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-118', 'Để chọn một máy in sử dụng thường xuyên trong danh sách các máy in đã cài đặt, thực hiện thao tác nào sau đây?', 'Kích chuột phải tại biểu tượng máy in, chọn Set as Default Printer', 'Kích chuột phải tại biểu tượng máy in, chọn Use Printer', 'Kích chuột phải tại biểu tượng máy in, chọn Always Use Printer', 'Kích chuột phải tại biểu tượng máy tin, chọn Defaut Printer', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-119', 'Để cài đặt máy in ta cần có những gì?', 'Driver, máy tính, máy in đã kết nối với máy tính', 'Mạng internet', 'Máy tính xách tay', 'Máy in', '', '', '', '', '', 'Dễ', 'UI02'),
('UI02-120', 'Để in một tệp thì nhấn tổ hợp phím nào?', 'Ctrl+P', 'Ctrl+R', 'Ctrl+I', 'Ctrl+Shift+F11', '', '', '', '', '', 'Dễ', 'UI02'),
('UI03-001', ' Hãy nêu cách khởi động Microsoft Office Word?', 'Kích đúp chuột vào biểu tượng shortcut Microsoft Office Word', 'Start\\ Program\\ Word.', 'Start\\ Run\\ gõ Word.exe\\ Ok', 'Kích đúp chuột vào biểu tượng shortcut Microsoft Office Powerpoint', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-002', 'Hãy cho biết chức năng của tổ hợp phím Ctrl + E?', 'Căn thẳng ở giữa văn bản', 'Căn thẳng lề trái văn bản', 'Căn thẳng lề phải văn bản', 'Căn thẳng lề trên văn bản', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-003', 'Tập tin MS Word 2010 được lưu lại có phần mở rộng định dạng mặc định là:', '.docx', '.doc', '.xlsx', '.pdf', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-004', 'Tổ hợp phím Ctrl+K có tác dụng gì?', 'Mở hộp thoại tạo các liên kết (Hyperlink)', 'Mở hộp thoại Font', 'Mở hộp thoại Paragraph', 'Mở hộp thoại tìm kiếm', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-005', 'Trong các phần mềm sau đâu là phần mềm có thể dùng để soạn thảo văn bản?', 'Cả (1)+(2)+(3)', 'Microsoft Word (1)', 'LibreOffice Writer(2)', 'OpenOffice Write(3)', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-006', 'Chương trình soạn thảo văn bản có chức năng chính là gì?', 'Cả (1)+(2)+(3)', 'Hiển thị nội dung văn bản trên màn hình (1)', 'Cho phép người dùng sửa đổi, bổ sung tại vị trí bất kì  trong văn bản (2)', 'Cho phép lưu trữ, ín ấn văn bản (3)', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-007', 'Để đóng văn bản đang làm việc chúng ta thực hiện:', 'File/Close', 'File/Open', 'File/Save', 'File/Print', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-008', 'Lệnh nào cho phép lưu tài liệu vào trong máy tính:', 'File/Save', 'File/Save As', 'File/Close', 'File/Save as wizard', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-009', 'Tổ hợp phím Ctrl + N có chức năng gì?', 'Tạo tài liệu mới', 'Lưu tài liệu', 'Mở tài liệu', 'Đóng tài liệu', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-010', 'Tên văn bản đang làm việc được hiển thị trên thanh:', 'Thanh tiêu đề', 'Thanh trạng thái', 'Thanh truy cập nhanh', 'Thanh thước kẻ', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-011', 'Thanh truy cập nhanh chứa các chức năng mặc định nào?', 'Save, undo, redo', 'Save, Undo, Copy', 'Save,Copy, redo', 'Save, undo, Print', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-012', 'Chế độ hiển thị Print Layout là chế độ:', 'Hiển thị văn bản như khi được in ra giấy', 'Hiển thị văn bản theo kiểu phóng to kích thước font chữ', 'Hiển thị văn bản trong chế độ web', 'Hiển thị văn bản được phóng to', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-013', 'Chế độ hiển thị nào chỉ cho phép hiển thị văn bản để đọc, không được sửa?', 'Full Screen Reading', 'Print Layout', 'Web Layout', 'Page Layout', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-014', 'Lệnh Help của Microsoft Word có chức năng:', 'Trợ giúp tìm kiếm thông tin trên Word', 'Tìm kiếm thông tin trên Internet', 'Thay thế thông tin cần tìm kiếm', 'Mở ra trang tìm kiếm để nhìn thấy thông tin từng chức năng', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-015', 'Muốn mở chức năng Help của Microsoft Word, ấn phím:', 'F1', 'F2', 'F3', 'F4', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-016', 'Muốn tìm kiếm với chức năng Help của Microsoft Word cần có:', ' Máy tính có phần mềm Word 2010', 'Máy tính có Word và được kết nối mạng', 'Máy tính có đủ Unikey và Vietkey', 'Máy tính có Word và Unikey', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-017', 'Chế độ hiển thị nào chỉ cho phép hiển thị văn bản theo kiểu Website?', 'Web Layout', 'Full Screen Reading', 'Print Layout', 'Page Layout', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-018', 'Thanh Zoom hiển thị 100% có nghĩa là:', 'Văn bản được hiển thị như khi được in ra giấy', 'Văn bản đang được hiển thị ở chế độ Full Screen Reading', 'Văn bản được phóng to gấp đôi so với ban đầu', 'Văn bản đang được hiển thị ở chế độ Website.', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-019', 'Để sắp xếp các cửa sổ văn bản trên màn hình Word theo thứ tự ta sử dụng Tab nào?', 'View', 'Home', 'File', 'Page Layout', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-020', 'Chế độ nào cho phép hiển thị màn hình với kích thước hiển thị lớn nhất?', 'Full Screen Reading', 'Draft', 'Outline', 'Web Layout', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-021', 'Để chuyển đổi giữa các file văn bản đang mở trong Word ta thực hiện:', 'View/Switch Windows', 'View/Show', 'View/Split', 'View/Arrange All', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-022', 'Để phóng to màn hình soạn thảo văn bản ta thực hiện như thế nào?', 'Click chuột vào nút Maximize tại góc trên cùng bên phải màn hình', 'Click chuột vào nút Maximize tại góc trên cùng bên trái màn hình', 'Click chuột vào nút Maximize tại góc trên cùng bên  dưới màn hình', 'Click chuột vào nút Maximize tại góc trên cùng bên trên màn hình', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-023', 'Mục Save AutoRecover information every để xác lập:', 'Thời gian để lưu file tự động', 'Thời gian để mở file tự động', 'Thời gian để đóng file tự động', 'Thời gian để lưu file dưới định dạng một tên khác', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-024', 'Để thay đổi thư mục lưu văn bản mặc định ta thực hiện:', 'File/Options/Save/Default file location', 'File/Options/Save/Auto Recover file location', 'File/Save/Default file location', 'File/Save/Defaunt file location', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-025', 'Muốn hiển thị đường biên văn bản ta thực hiện', 'File/Options/Advanced/đánh dấu lựa chọn Show Text Boundaries', 'Home/Options/Advanced/đánh dấu lựa chọn Show Text Boundaries', 'Insert/Options/Advanced/đánh dấu lựa chọn Show Text Boundaries', 'View/Options/Advanced/đánh dấu lựa chọn Show Text Boundaries', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-026', 'Trong soạn thảo Microsoft Office Word, công dụng của tổ hợp phím Ctrl + O là', 'Mở một file đã có', 'Mở một file mới', 'Đóng file đang mở', 'Lưu file ', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-027', 'Để mở một văn bản có sẵn ta dùng tổ hợp phím nào?', 'Ctrl+O', 'Ctrl+Shift+O', 'Shift+O', 'Alt+O', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-028', 'Để chèn một đoạn dữ liệu trong Excel sang file Word ta thực hiện như sau: ', 'Copy phần dữ liệu định chèn. Vào Home/ Paste/ Paste Special/ Microsoft Excel 2003 Worksheet Object /OK', ' Vào  Home/ Paste/Paste Special/ Microsoft Excel 2003 Worksheet Object /OK', 'Copy phần dữ liệu định chèn. Vào Home/ Paste/Microsoft Excel 2003 Worksheet Object /OK', 'Copy phần dữ liệu định chèn. Vào Home/ Paste Special/ Microsoft Excel 2003 Worksheet Object ', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-029', '© được gọi là:', 'Ký hiệu đặc biệt', 'Chữ viết', 'Kí tự thông thường', 'Hình ảnh', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-030', 'Để chèn được dấu ≥ vào văn bản, ta thực hiện:', 'Insert/ Symbol', 'Dấu ≥ được tích hợp sẵn trên bàn phím, chỉ cần gõ', 'Vào thanh Quick Access Toolbar/ Spelling and Grammar', 'Gõ dấu > và gõ dấu =', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-031', 'Để chèn được ký hiệu ® ta thực hiện các bước:', 'Insert/ Symbol/ More Symbols/ Special Character', 'Insert/ Symbol/ More Symbols/ Wingdings', 'Insert/ Symbol/ More Symbols/ Webdings', 'Insert/ Symbol/ More Symbols/ Symbol/ Special Character', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-032', 'Tổ hợp phím Ctrl + S có chức năng:', 'Lưu tài liệu', 'Mở tài liệu', 'Đóng tài liệu', 'Tạo tài liệu mới', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-033', 'Để lưu văn bản hiện thời thành một tên mới ta thực hiện:', 'File/Save As', 'File/Save', 'Home/Save As', 'Home/Save', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-034', 'Khi lưu văn bản, ta có thể lưu với các phần mở rộng là?', '.doc, .docx,.pdf', '.doc,.xlsx,.pdf', '.docx,.xlsx,.pdf', '.docx,.xls,.pdf', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-035', 'Để sắp xếp tất cả các cửa sổ văn bản đang mở trên màn hình máy tính chúng ta thực hiện:', 'View/ Window/ Arrange All', 'Home/ Window/ Arrange All', 'File/ Window/ Arrange All', 'Review/ Window/ Arrange All', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-036', 'Để sắp xếp các cửa sổ văn bản trên màn hình Word theo thứ tự nào đó ta thực hiện như thế nào?', 'Vào View/ Trong nhóm Window chọn kiểu sắp xếp thích hợp', 'Vào  Home/ Trong nhóm Window chọn kiểu sắp xếp thích hợp', 'Vào  Review/ Trong nhóm Window chọn kiểu sắp xếp thích hợp', 'Vào Insert/ Trong nhóm Window chọn kiểu sắp xếp thích hợp', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-037', 'Để xóa một văn bản ta thực hiện?', 'Chọn văn bản cần xóa/ Click phải chuột/ Chọn Delete', 'Chọn văn bản cần xóa/ Click chuột/ Chọn Delete', 'Click phải chuột/ Chọn Delete', 'Chọn văn bản cần xóa/ Click phải chuột/ Chọn Remove', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-038', 'Để chọn (bôi đen) toàn bộ văn bản ta thực hiện: ', 'Click chuột trái 3 lần liên tiếp tại lề trái văn bản', 'Click chuột trái 3 lần liên tiếp tại lề phải văn bản', 'Click chuột phải 3 lần liên tiếp tại lề trên văn bản', 'Click chuột trái 3 lần liên tiếp tại lề dưới văn bản', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-039', 'Để di chuyển đến một trang bất kì trong văn bản ta làm thế nào?', 'Bấm tổ hợp phím Ctrl+G, trong mục Enter Page Number nhập số trang cần đến.', 'Bấm tổ hợp phím Ctrl+F, trong mục Enter Page Number nhập số trang cần đến.', 'Bấm tổ hợp phím Ctrl+H, trong mục Enter Page Number nhập số trang cần đến.', 'Bấm tổ hợp phím Ctrl+D, trong mục Enter Page Number nhập số trang cần đến.', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-040', 'Muốn tạo được dấu % từ bàn phím ta làm thế nào', 'Giữ phím Shift và ấn số 5', 'Giữ phím Ctrl và ấn số 5', 'Ấn số 5', 'Giữ phím Alt và ấn số 5', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-041', 'Để xóa một khối văn bản, ta làm thế nào:', 'Chọn khối, ấn Delete', 'Chọn khối, ấn Tab', 'Chọn khối, ấn Ctrl + Delete', 'Chọn khối, ấn Ctrl + Shift + Delete', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-042', 'Trong soạn thảo Word, muốn chèn các kí tự đặc biệt vào văn bản, ta thực hiện:', 'Insert/ Symbol', 'View/ Symbol', 'Format/ Symbol', 'Tools/ Symbol', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-043', 'Trong soạn thảo Microsoft word, công dụng của tổ hợp phím Ctrl+H là', 'Mở hộp thoại tìm kiếm và thay thế văn bản.', 'Mở hộp thoại Font', 'Mở hộp thoại Paragraph', 'Mở hộp thoại Tab', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-044', 'Trong soạn thảo Microsoft word, công dụng của tổ hợp Ctrl + F là', 'Mở chức năng tìm kiếm văn bản', 'Mở chức năng trợ giúp', 'Mở chức năng thay thế', 'Mở chức năng tạo AutoCorrect', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-045', 'Trong hộp thoại  Find and Replace/Find, phần Find what dùng để:', 'Điền từ cần tìm kiếm', 'Điền từ cần thay thế', 'Tùy chọn nâng cao tìm kiếm', 'Đảm bảo tìm kiếm chính xác', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-046', 'Trong khi làm việc với Word, tổ hợp phím tắt nào cho phép chọn tất cả văn bản đang soạn thảo?', 'Ctrl + A', 'Alt + A', 'Alt + F', 'Ctrl + F', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-047', 'Để cắt một đoạn văn bản từ file văn bản này sang file văn bản khác ta thực hiện:', 'Chọn đoạn văn bản cần di chuyển, ấn phím Ctrl+X, sau đó mở file văn bản đích, ấn Ctrl+V', 'Chọn đoạn văn bản cần di chuyển, ấn phím Ctrl+C, sau đó mở file văn bản đích, ấn Ctrl+V', 'Chọn đoạn văn bản cần di chuyển,  sau đó mở file văn bản đích, ấn Ctrl+V', 'Chọn đoạn văn bản cần Copy,  sau đó mở file văn bản đích, ấn Ctrl+V', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-048', 'Tổ hợp phím Ctrl + Z dùng để:', 'Quay lại thao tác trước thao tác hiện hành.', 'Hủy thao tác', 'Đóng cửa sổ đang mở', 'Đóng tập tin đang mở', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-049', 'Để khôi phục lại trạng thái trước đó của văn bản ta làm thế nào?', 'Chọn chức năng Undo', 'Chọn chức năng Redo', 'Chọn chức năng Quick Print', 'Chọn chức năng Open', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-050', 'Để loại bỏ các hiệu ứng điều chỉnh tự động (AutoCorrect) có sẵn trong phần mềm soạn thảo văn bản tiếng Việt ta thức hiện như sau:', 'Vào File/ Option/ Proofing/ AutoCorrect Option/ Tìm mục cần xóa sau đó ấn Delete/OK', 'Vào  File/  Option/  AutoCorrect Option/ Tìm mục cần xóa sau đó ấn Delete/OK', 'Vào Home /Proofing/  AutoCorrect Option/ Tìm mục cần xóa sau đó ấn Delete/OK', 'Vào  File/ Proofing/ AutoCorrect Option/ Tìm mục cần xóa sau đó ấn Delete', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-051', 'Để loại bỏ các đường gạch chân màu đỏ hoặc màu xanh xuất hiện trong văn bản tiếng Việt ta làm như sau:', 'Vào File/ Option/Proofing/ Trong mục When correcting spelling and Gramma in Word bỏ tích chọn tất cả các lựa chọn', 'Vào File/ Option/ Trong mục When correcting spelling and Gramma in Word bỏ tích chọn tất cả các lựa chọn', 'Vào File/ Proofing/Trong mục When correcting spelling and Gramma in Word bỏ tích chọn tất cả các lựa chọn', 'Vào Home/ Option/Proofing/ Trong mục When correcting spelling and Gramma in Word bỏ tích chọn tất cả các lựa chọn', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-052', 'Trong Micrsoft Word để tăng cỡ chữ ta sử dụng tổ hợp phím', 'Ctrl + ]', 'Ctrl + B', 'Ctrl + Shitf + ]', 'Ctrl + [', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-053', 'Tổ hợp phím Ctrl+B có tác dụng gì?', 'Chuyển một chữ thường thành chữ đậm', 'Chuyển một chữ thường thành chữ nghiêng', 'Chuyển một chữ  thành chữ đậm', 'Chuyển một chữ thường thành chữ hoa', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-054', 'Để tạo chỉ số dưới ta thực hiện', 'Cách (1), (2), (3) đều đúng', 'Chọn biểu tượng chỉ số dưới (subscript) trên thanh Ribbon (1)', 'Dùng tổ hợp phím Ctrl + = (2)', 'Dùng tổ hợp phím Ctrl +D, chọn subscript (3)', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-055', 'Con trỏ đang ở chỉ số trên, làm thế nào để quay lại dòng bình thường', 'Cách (1), (2), (3) đều đúng', 'Chọn biểu tượng chỉ số trên (superscript) trên thanh Ribbon (1)', 'Dùng tổ hợp phím Ctrl + Shift + = (2)', 'Dùng tổ hợp phím Ctrl +D, chọn subscript (3)', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-056', 'Để đổ màu nền cho văn bản ta thực hiện như sau:', 'Vào Tab Home/Trong nhóm Paragraph/ Chọn biểu tượng Shading ', 'Vào Tab Home/Trong nhóm Font/ Chọn biểu tượngText Hightlight Color', 'Vào Tab Insert/Trong nhóm Font/ Chọn biểu tượngText Hightlight Color', 'Vào Tab Insert/Trong nhóm Paragraph/ Chọn biểu tượng Shading ', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-057', 'Khi phím CapsLock trên bàn phím sáng, sẽ cho kết quả:', 'Tất cả các kí tự khi soạn thảo đều viết hoa', 'Tất cả các câu đều có in hoa đầu câu', 'Tất cả các câu đều có in hoa đầu câu và tự tạo dấu chấm kết thúc câu', 'Tất cả các chữ đầu dòng In đậm', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-058', 'Làm thế nào để tắt chế độ Caps Lock?', 'Nhấn phím Caps Lock 1 lần trên bàn phím', 'Giữ phím Caps Lock từ 3 đến 5 giây', 'Chế độ Caps Lock tự tắt từ 3 đến 5 giây', 'Ấn phím ESC trên bàn phím', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-059', 'Bật Caps Lock trên bàn phím và gõ chữ cái trên bàn phím, sẽ cho kết quả:', 'Chữ in hoa', 'Chữ in thường', 'Chữ có gạch đầu dòng đầu câu và in hoa đầu câu', 'Chữ có khoảng cách đầu dòng là 1.27 cm', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-060', 'Chức năng Upper Case có tác dụng?', 'Viết hoa toàn bộ đoạn văn được chọn', 'Viết thường ký tự đầu tiên và viết hoa các ký tự còn lại', 'Viết thường ký tự đầu tiên', 'Viết hoa ký tự đầu tiên và viết thường các ký tự còn lại', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-061', 'Chức năng Lower Case có tác dụng?', 'Viết thường toàn bộ đoạn văn được chọn', 'Viết thường ký tự đầu tiên và viết hoa các ký tự còn lại', 'Viết thường ký tự đầu tiên ', 'Viết hoa ký tự đầu tiên và viết thường các ký tự còn lại', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-062', 'Chức năng nào sau đây dùng để thay đổi kiểu chữ?', 'Tab Home/ nhóm Font/ Change Case', 'Tab Home/ nhóm Font/ Decrease Font Size', 'Tab Home/ nhóm Font/ Increase Font Size', 'Tab Home/ nhóm Font/ Subscript', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-063', 'Để tách từ trong văn bản Word, ta thực hiện:', 'Vào Page Setup/Hyphenation', 'Vào Page Setup/Orientation', 'Vào References/Hyphenation', 'Vào References/Orentation', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-064', 'Để chọn (bôi đen) một đoạn văn bản ta thực hiện: ', 'Click chuột trái  3 lần liên tiếp lên đoạn cần chọn', 'Click chuột phải  3 lần liên tiếp lên đoạn cần chọn', 'Click đúp chuột  3 lần liên tiếp lên đoạn cần chọn', 'Không có đáp án nào đúng', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-065', ' Để thêm một dấu ngắt đoạn trong Word ta dùng phím nào?', 'Enter', 'Ctrl+Enter', 'Shift+Enter', 'Alt+Enter', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-066', 'Đâu là thao tác đúng khi thực hiện thụt đoạn văn bản về bên trái với thông số xác định?', 'Mở hộp thoại Paragraph/Indentation/Left', 'Mở hộp thoại Paragraph/Indentation/Right', 'Mở hộp thoại Paragraph/Spacing/Right', 'Mở hộp thoại Paragraph/Spacing/Left', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-067', 'Đâu là thao tác đúng khi thực hiện thụt đoạn văn bản về bên phải với thông số xác định?', 'Mở hộp thoại Paragraph/Indentation/Right', 'Mở hộp thoại Paragraph/Indentation/Left', 'Mở hộp thoại Paragraph/Spacing/Right', 'Mở hộp thoại Paragraph/Spacing/Left', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-068', 'Word hỗ trợ các loại thụt đầu dòng nào', 'Tất cả các kiểu (1), (2) và (3) đều đúng', 'First line (1)', 'Left (2)', 'Hanging (3)', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-069', 'Trong Micrsoft Word để bật/tắt  thanh thước kẻ trên cửa sổ soạn thảo, ta thực hiện:', 'View/ Show / đánh dấu/bỏ đánh dấu vào mục Ruler', 'File/ Word Option/ Ruler', 'View/ Outline', 'Insert / đánh dấu vào mục Ruler', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-070', 'Khi đặt Tab, khung Tab stop position có chức năng?', 'Chọn vị trí điểm dừng Tab', 'Chọn loại Tab', 'Chọn đường nối giữa các Tab', 'Thiết lập khoảng cách mặc định cho Tab trên bàn phím', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-071', 'Muốn xóa Tab đã đặt ta làm thế nào?', 'Kích chuột vào Tab trên thanh Ruler, kéo Tab ra khỏi thanh Ruler', 'Kích chuột vào Tab, ấn phím Delete', 'Kích chuột vào Tab và nhấn phím Tab từ bàn phím', 'Ấn phím Tab từ bàn phím và ấn phím Insert', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-072', 'Để tạo khoảng cách đoạn ta làm thế nào?', 'Tab Home/ nhóm Paragraph/ cửa sổ Paragraph/ chọn Spacing/ chỉnh sửa thông số của Before và After', 'Tab Home/ nhóm Clipboard/ cửa sổ Paragraph/ Spacing/ chỉnh sửa thông số của Before và After', 'Tab Home/ nhóm Clipboard/ cửa sổ Paragraph/ Spacing/ Line Spacing', 'Tab Home/ nhóm Clipboard/ cửa sổ Paragraph/ Spacing/ Indentation', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-073', 'Trong Microsoft Word để thay đổi khoảng cách giữa các ký tự, ta thực hiện:', 'Ctrl+D/Advance/Trong mục Spacing chọn Expanded hoặc Condensed', 'Ctrl+D/Advance/Trong mục Scale chọn Expanded hoặc Condensed', 'Ctrl+D/Advance/Trong mục Number form chọn Expanded hoặc Condensed', 'Ctrl+D/Advance/Trong mục By chọn Expanded hoặc Condensed', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-074', 'Làm thế nào để thiết lập được khoảng cách dòng văn bản', 'Tab Home/ nhóm Paragraph/ cửa sổ Paragraph/ Spacing/ Line Spacing', 'Tab Home/ nhómFont/ cửa sổ Paragraph/ Spacing/ Line Spacing', 'Tab Home/ nhóm Clipboard/ cửa sổ Paragraph/ Spacing/ Indentation', 'Tab Home/ nhóm Clipboard/ cửa sổ Paragraph/ Spacing/ Line Spacing', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-075', 'Để đánh dấu đề mục, ta thực hiện thao tác', 'Tab Home/ nhóm Paragraph/ Bullets', 'Tab Home/ nhóm Font/ Numbering', 'Tab Home/ nhóm Font/ Bullets', 'Tab Home/ nhóm Clipboard/ Bullets', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-076', 'Để đánh số đề mục, ta thực hiện thao tác', ' Tab Home/ nhóm Paragraph/ Numbering', 'Tab Home/ nhóm Font/ Bullets', 'Tab Home/ nhóm Font/ Numbering', 'Tab Home/ nhóm Clipboard/ Numbering', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-077', 'Để tạo đường viền nghệ thuật cho một trang văn bản ta thực hiện:', 'Home/Paragraph/Border and Shading/chọn Tab Page Border/ Trong mục Style chọn Art', 'File/Paragraph/Border and Shading/chọn Tab Page Border/ Trong mục Style chọn Art', 'Page Layout/Paragraph/Border and Shading/chọn Tab Page Border/ Trong mục Style chọn Art', 'Insert/Paragraph/Border and Shading/chọn Tab Page Border/ Trong mục Style chọn Art', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-078', 'Để tạo đường viền cho một đoạn văn bản, ta thực hiện:', 'Tab Home/ nhóm Paragraph/ Border and Shading', 'Tab Home/ nhóm Font/ Border', 'Tab Page Layout/ nhóm Paragraph/ Border', 'Tab Design/ nhóm Paragraph/ Border', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-079', 'Để tạo đường viền cho trang đầu tiên trong văn bản ta thực hiện: ', 'Mở hộp thoại Border and Shading/ Trong mục Apply to chọn This section- First Page Only', 'Mở hộp thoại Border and Shading/ Trong mục Apply to chọn Whole Document', 'Mở hộp thoại Border and Shading/ Trong mục Apply to chọn This section', 'Mở hộp thoại Border and Shading/ Trong mục Apply to chọn This section- All except first page', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-080', 'Để thay đổi định dạng cho Style có sẵn trong Word ta làm thế nào?', 'Vào Tab Home/ Trong nhóm Styles/  chuột phải vào Style bạn muốn thay đổi định dạng và chọn Modify.', 'Vào Tab Reference/ Trong nhóm Styles/  chuột phải vào Style bạn muốn thay đổi định dạng và chọn Modify.', 'Vào Tab View/ Trong nhóm Styles/  chuột phải vào Style bạn muốn thay đổi định dạng và chọn Modify.', 'Vào Tab Format/ Trong nhóm Styles/  chuột phải vào Style bạn muốn thay đổi định dạng và chọn Modify.', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-081', 'Để áp dụng Style cho một đoạn văn bản bất kì ta thực hiện như sau: ', 'Chọn đoạn văn bản cần áp dụng Style. Vào Tab Home/ Trong nhóm Styles/ chọn Style muốn áp dụng', 'Chọn đoạn văn bản cần áp dụng Style. Vào Tab View/ Trong nhóm Styles/ chọn Style muốn áp dụng', 'Chọn đoạn văn bản cần áp dụng Style. Vào Tab Review/ Trong nhóm Styles/ chọn Style muốn áp dụng', 'Chọn đoạn văn bản cần áp dụng Style. Vào Tab Insert/ Trong nhóm Styles/ chọn Style muốn áp dụng', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-082', 'Tổ hợp phím Ctrl+Shift+C có tác dụng gì?', 'Copy định dạng trong Word', 'Copy kích thước Font chữ', 'Copy dữ liệu trong Word', 'Định dạng dữ liệu trong Word', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-083', 'Bảng có kích thước 5x6 có nghĩa là', 'Bảng gồm 5 cột 6 dòng', 'Bảng gồm 5 dòng 6 cột', 'Bảng gồm 30 dòng', 'Bảng gồm 30 cột', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-084', 'Để chèn một bảng(Table) vào văn bản ta làm thế nào?', 'Vào Tab Insert/ Table/ Insert Table/ Gõ số hàng số cột', 'Vào Tab Insert/ Insert Table/ Gõ số hàng số cột', 'Vào Tab Home/ Table/ Insert Table/ Gõ số hàng số cột', 'Vào Tab View/  Table/ Insert Table/ Gõ số hàng số cột', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-085', 'Để thay đổi hướng chữ trong một ô trong bảng ta làm thế nào?', 'Chọn ô cần thay đổi hướng chữ/Vào Tab Table Tools/ Layout/ Chọn Text Direction', 'Chọn ô cần thay đổi hướng chữ/Vào Tab Table Tools/  Design/ Chọn Text Direction', 'Chọn ô cần thay đổi hướng chữ/Vào Tab Insert/   Layout/  Text Direction', 'Chọn ô cần thay đổi hướng chữ/Vào Tab Insert/  Design/ Chọn Text Direction', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-086', 'Khi soạn thảo văn bản trong Microsoft word, muốn di chuyển từ 1 ô này sang ô kế tiếp về bên phải của một bảng (Table) ta bấm phím:', 'Tab', 'ESC', 'Ctrl', 'CapsLock', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-087', 'Trong chế độ tạo bảng (Table) của phần mềm Microsoft word, để gộp nhiều ô thành một ô, ta thực hiện : ', 'Table Tool/Layout/ Merge Cells', 'Table Tool/Layout/ Split Cells', 'Table Tools/ Merge Cells', 'Table Tool/ Split Cells', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-088', 'Để thay đổi độ rộng của một ô trong bảng ta làm thế nào?', 'Chọn ô cần thay đổi độ rộng/ Table Tools/  Layout/ Trong nhóm Cell Size chọn Width', 'Chọn ô cần thay đổi độ rộng/Vào Table Tools/ Design/ Trong nhóm Cell Size chọn Width', 'Chọn ô cần thay đổi độ rộng/Vào  Home/  Layout/ Trong nhóm Cell Size chọn Width', 'Chọn ô cần thay đổi độ rộng/Vào  View/  Layout/ Trong nhóm Cell Size chọn Width', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-089', 'Để thay đổi kiểu đường viền cho một ô ta làm thế nào?', 'Chọn ô cần thay đổi đường viền/Vào Table Tools/  Design/ Chọn Border and Shading/ Chọn kiểu dáng đường viền cần thay đổi trong mục Style/ Ok', 'Chọn ô cần thay đổi đường viền/Vào  Table Tools/ Layout/ Chọn Border and Shading/ Chọn kiểu dáng đường viền cần thay đổi trong mục Style/ Ok', 'Chọn ô cần thay đổi đường viền/Vào Home/ Layout/ Chọn Border and Shading/ Chọn kiểu dáng đường viền cần thay đổi trong mục Style/ Ok', 'Chọn ô cần thay đổi đường viền/Vào Home/  Design/ Chọn Border and Shading/ Chọn kiểu dáng đường viền cần thay đổi trong mục Style/ Ok', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-090', 'Để đổ màu cho một ô trong bảng ta thực hiện?', 'Chọn ô cần đổ màu/Vào Table Tools/  Design/ Chọn biểu tượng Shading', 'Chọn ô cần đổ màu/Vào Table Tools/  Layout/ Chọn biểu tượng Shading', 'Chọn ô cần đổ màu/Vào Home/  Design/ Chọn biểu tượng Shading', 'Chọn ô cần đổ màu/Vào Home/  Layout/ Chọn biểu tượng Shading', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-091', 'Để xóa bảng khỏi văn bản ta thực hiện như thế nào?', 'Chọn bảng cần xóa/Vào Layout/ Chọn Delete Table', 'Chọn bảng cần xóa/Vào Design/ Chọn Delete Table', 'Chọn bảng cần xóa/Vào Home/ Chọn Delete Table', 'Chọn bảng cần xóa/Vào Insert/ Chọn Delete Table', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-092', 'Trong Microsoft Word để thực hiện vẽ các đường thẳng, hình khối, ta thực hiện:', 'Insert/ Illustrations/ Shapes', 'View/ Toolbars/ Drawing', 'View/ Toolbars/ Standard', 'View / Show/Hide / Ruler', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-093', 'Trong Microsoft Word để chèn biểu đồ vào văn bản, ta thực hiện:', 'Insert/ Illustrations/ Chart', 'References/ Illustrations/ Chart', 'Mailings/ Illustrations/ Chart', 'Review/ Illustrations/ Chart', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-094', 'Các đối tượng đồ họa trong Word  nằm trong nhóm nào?', 'Tab Insert/ nhóm Illustrations', 'Tab Home/ nhóm Illustrations', 'Tab Design/ nhóm Illustrations', 'Tab Design/ nhóm Pictures', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-095', 'Tab Insert/ nhóm Illustrations/Picture có chức năng', 'Chèn hình ảnh', 'Chèn biểu đồ', 'Chèn ký tự đặc biệt', 'Chèn bảng', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-096', 'Khi chèn hình ảnh vào Word, ta có thể', 'Tất cả (1), (2) và (3) đều đúng', 'Xoay ảnh, chỉnh độ sáng cho ảnh (1)', 'Cắt ảnh, chỉnh độ mờ cho ảnh (2)', 'Chèn nhiều ảnh cùng 1 lúc (3)', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-097', 'Để chèn một Textbox vào văn bản ta làm thế nào?', 'Vào Insert/ Chọn Textbox', 'Vào Home/ Chọn Textbox', 'Vào View/ Chọn Textbox', 'Vào Review/ Chọn Textbox', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-098', 'Để thay đổi màu sắc đường viền Textbox ta thực hiện?', 'Vào Format/Chọn Shape Outline/ Chọn màu sắc cần thay đổi', 'Vào Insert/Chọn Shape Outline/ Chọn màu sắc cần thay đổi', 'Vào Home/Chọn Shape Outline/ Chọn màu sắc cần thay đổi', 'Vào Format/Chọn Shape Fill/ Chọn màu sắc cần thay đổi', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-099', 'Để lưu Text box vào văn bản đã soạn thảo, sau khí chèn và hiệu chỉnh xong Text box ta cần', 'Ấn Ctrl +S', 'Ấn Alt +S', 'Ấn Shift +S', 'Ấn Ctrl+Shift +S', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-100', 'Để thêm chú thích (footnote) ta thực hiện: ', 'Vào References/ Chọn Insert Footnote', 'Vào Page Layout/ Chọn Insert Footnote', 'Vào Review/ Chọn Insert Footnote', 'Vào Insert/ Chọn Insert Footnote', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-101', 'Để đánh số trang văn bản ta thực hiện:', 'Vào Insert/ Chọn Page Number', 'Vào References/ Chọn Page Number', 'Vào Page Layout/ Chọn Page Number', 'Vào Home/ Chọn Page Number', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-102', 'Tổ hợp phím Ctrl+J dùng để làm gì?', 'Căn văn bản đều hai bên', 'Căn lề trái văn bản ', 'Căn lề phải văn bản', 'Căn giữa văn bản ', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-103', 'Trong Microsoft Word để ngắt trang ta thực hiện:', 'Insert/ Pages/ Page Break', 'View/ Page Break', 'References/ Captions/ Break', 'Review/ Create/ Page Break', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-104', 'Trong Microsoft Word để chèn header hoặc footer trên trang văn bản, ta thực hiện:', 'Insert / Header and Footer / nhấn nút Header hoặc Footer', 'View / Header and Footer', 'Insert / Header and Footer', 'Format / Header and Footer', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-105', 'Hướng Portrait hiển thị văn bản theo', 'Hướng dọc', 'Hướng ngang', 'Hướng nghiêng 45 độ', 'Hướng kết hợp giữa dọc và ngang', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-106', 'Hướng in mặc định trong word là hướng gì?', 'Hướng dọc', 'Hướng ngang', 'Hướng nghiêng 45 độ', 'Hướng kết hợp giữa dọc và ngang', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-107', 'Lề trang tài liệu là gì', 'Là khoảng cách giữa cạnh giấy và văn bản trong tài liệu', 'Là khoảng cách trong tài liệu', 'Là khoảng cách được tạo do người trình bày văn bản thiết lập', 'Là khoảng cách ảo được đo bằng thước ngang', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-108', 'Hướng Landscape hiển thị văn bản theo', 'Hướng ngang', 'Hướng dọc', 'Hướng nghiêng 45 độ', 'Hướng kết hợp giữa dọc và ngang', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-109', 'Để thay đổi hướng giấy in ta thực hiện', 'Tab Page Layout/ nhóm Page Setup/ Orientation', 'Tab Design/ nhóm Page Setup/ Orientation', 'Tab Page Layout/ nhóm Page Setup/ Portrait', 'Tab Design/ nhóm Page Setup/ Landscape', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-110', 'Trong soạn thảo Microsoft word, muốn định dạng lại trang giấy in, ta thực hiện', 'File/ Page Setup', 'File/ Properties', 'File/ Print', 'File/ Print Preview', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-111', 'Để thay đổi lề trang văn bản, ta thực hiện', 'Tab Page Layout/ nhóm Paper Setup/ Margins', 'Tab Page Layout/ nhóm Page Setup/ Design', 'Tab Page Layout/ nhóm Page Setup/ Size', 'Tab Page Layout/ nhóm Page Setup/ Orientation', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-112', 'Để xem danh sách các tài liệu đang đợi để in, ta làm thế nào?', 'Kích đúp chuột vào biểu tượng máy in ở thanh taskbar', 'Kích phải chuột vào biểu tượng máy in ở thanh taskbar', 'Kích chuột trái vào biểu tượng máy in ở thanh taskbar ', 'Kích đúp chuột vào biểu tượng máy in ở thanh taskbar /Chọn máy in muốn xem.', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-113', 'Để hủy lệnh in ta làm thế nào?', 'Kích đúp chuột vào biểu tượng máy in ở thanh taskbar/ Chuột phải vào tài liệu muốn hủy lệnh in/ Chọn Cancel', 'Kích đúp chuột vào biểu tượng máy in ở thanh taskbar/ Chuột phải vào tài liệu muốn hủy lệnh in/ Chọn Pause', 'Kích đúp chuột vào biểu tượng máy in ở thanh taskbar/ Chuột phải vào tài liệu muốn hủy lệnh in/ Chọn Properties', 'Kích đúp chuột vào biểu tượng máy in ở thanh taskbar/ Chuột phải vào tài liệu muốn hủy lệnh in/ Chọn Restart', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-114', 'Để xem tài liệu trước khi in, ta chọn lệnh', 'Print Preview', 'Print Demo', 'Print Layout', 'Print Test', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-115', 'Để lưu văn bản sang file .pdf ta thực hiện?', 'Vào File/Save/Trong mục Save as Type chọn PDF(*.pdf).', 'Vào Home/Save/Trong mục Save as Type chọn PDF(*.pdf).', 'Vào Insert/Save/Trong mục Save as Type chọn PDF(*.pdf).', 'Vào View/Save/Trong mục Save as Type chọn PDF(*.pdf).', '', '', '', '', '', 'Dễ', 'UI03'),
('UI03-116', 'Để đặt mật khẩu cho văn bản ta làm thế nào:', 'Vào File/ Info/Chọn Protect Document/ Encrypt with Password', 'Vào Home/ Info/Chọn Protect Document/ Encrypt with Password', 'Vào Insert/ Info/Chọn Protect Document/ Encrypt with Password', 'Vào View/ Info/Chọn Protect Document/ Encrypt with Password', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI03-117', 'Để đính kèm văn bản vào Email ta thực hiện:', 'Vào File/Save & Send/ Send Using E_mail', 'Vào Home/Save & Send/ Send Using E_mail', 'Vào Insert/Save & Send/ Send Using E_mail', 'Vào View/Save & Send/ Send Using E_mail', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-118', 'Để lưu văn bản trên môi trường mạng ta thực hiện:', 'Vào File/Save & Send/ Save to Web', 'Vào Home/Save & Send/ Save to Web', 'Vào Insert/Save & Send/ Save to Web', 'Vào View/Save & Send/ Save to Web', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-119', ' Muốn sử dụng Wizard để tạo một bức thư có sẵn, ta thực hiện? ', 'Vào File/New/ Letters/ Chọn mẫu Letter muốn tạo/Download', 'Ấn Ctrl+N/ Chọn Letters/ Chọn mẫu Letter muốn tạo/Download', 'Vào Home/New/ Letters/ Chọn mẫu Letter muốn tạo/Download', 'Vào New/ Letters/ Chọn mẫu Letter muốn tạo/Download', '', '', '', '', '', 'Khó', 'UI03'),
('UI03-120', 'Font chữ yêu cầu theo thông tư 01 về thể thức trình bày văn bản là?', 'Times New Roman', 'Arial', 'Tahoma', 'VNTime', '', '', '', '', '', 'Trung bình', 'UI03'),
('UI04-001', 'Microsoft Excel là công cụ dùng để:', 'Tính toán', 'Soạn thảo', 'Trình chiếu', 'Gửi thư', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-002', 'Phần mở rộng mặc định của tệp được tạo bằng Microsoft Excel 2010 là gì?', 'XLSX', 'XLXS', 'XSLX', 'XXLS', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-003', 'Trong MS Excel, muốn nhờ chương trình giúp đỡ về một vấn đề gì đó, ta nhấn phím:', 'F1', 'F2', 'F3', 'F4', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-004', 'Với cùng một nội dung, kích thước của tệp có phần mở rộng xls so với tệp có phần mở rộng xlsx như thế nào?', 'Tệp có phần mở rộng xls có kích thước lớn hơn so với tệp có phần mở rộng xlsx', 'Kích thước 2 tệp bằng nhau', 'Tệp có phần mở rộng xls có kích thước nhỏ hơn so với tệp có phần mở rộng xlsx', 'Tệp có phần mở rộng xls có kích thước lớn hơn so với tệp có phần mở rộng xlsx 10 lần', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-005', 'Một trong những thuật ngữ sau không phải dùng để chỉ một thành phần của Excel?', 'Workdocument', 'WorkBook', 'WorkSheet', 'WorkSpace', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-006', 'Trong một Worksheet có số cột - số hàng như sau :', '16384  – 1048576 ', '255 – 65536', '256 – 16284', '256 – 32368', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-007', 'Trong Microsoft Excel, cách nào để mở một tệp Excel đã có trên máy tính?', 'Ctrl+O', 'Ctrl + M', 'Ctrl+N', 'Ctrl + W', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-008', 'Trong Microsoft Excel, cách nào để đóng một tệp?', 'Ctrl+F4', 'Alt+F4', 'Shift+F4', 'F4', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-009', 'Trong Microsoft Excel, cách nào để tạo mới một tệp?', 'Ctrl+N', 'Ctrl + O', 'Ctrl + M', 'Ctrl + W', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-010', 'Trong Microsoft Excel, cách nào để lưu tệp hiện thời với tên mới?', 'F12', 'F11', 'F10', 'F9', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-011', 'Trong Microsoft Excel, phương án nào dưới đây không phải là địa chỉ ô?', '$12$A', '$A$12', 'A$12', 'A12', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-012', 'Trong Microsoft Excel, phương án nào dưới đây là địa chỉ tuyệt đối?', '$A$12', '$12$A', 'A$12$', 'A12', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-013', 'Trong Microsoft Excel, phương án nào dưới đây là địa chỉ hỗn hợp?', '$A12', '$A$12', 'A12$', 'A12', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-014', 'Trong công thức của Microsoft Excel, sử dụng phím nào để chuyển đổi địa chỉ tuyệt đối sang địa chỉ tương đối hoặc ngược lại cho ô hoặc vùng đã chọn?', 'F4', 'F3', 'F2', 'F5', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-015', 'Trong bảng tính Excel, vùng là tập hợp nhiều ô kế cận tạo thành hình chữ nhật, địa chỉ vùng được thể hiện như câu nào sau đây là đúng?', 'B1:H15 ', 'B1...H15', 'B1-H15', 'B1..H15', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-016', 'Trong MS Excel 2010, giả sử tại ô B5 có công thức = A1+$B$2+C$3. Sau khi sao chép công thức đó từ ô B5 đến ô D8 sẽ có công thức:', '= C4 + $B$2 + E$3', '= C1 + $B$2 + E$3', '= A4 + $B$2 + C$3', 'Báo lỗi', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-017', 'Theo mặc định ký tự dạng ngày tháng sẽ được: ', 'Canh bên phải ô', 'Canh đều hai bên', 'Canh bên trái ô', 'Canh giữa ô', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-018', 'Đáp án nào sau đây đúng? Khi nhập dữ liệu vào bảng tính Excel thì:', 'Dữ liệu kiểu ký tự sẽ mặc định căn lề trái', 'Dữ liệu kiểu số sẽ mặc định căn lề trái', 'Dữ liệu kiểu thời gian sẽ mặc định căn lề trái', 'Dữ liệu kiểu ngày tháng sẽ mặc định căn lề trái', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-019', 'Các kiểu dữ liệu thông dụng của Excel là :', 'Kiểu chuỗi, kiểu số, kiểu lôgic, kiểu ngày tháng, kiểu công thức', 'Kiểu số, kiểu lôgic, kiểu ngày tháng', 'Kiểu chuỗi, kiểu văn bản, kiểu ngày tháng', 'Kiểu công thức, kiểu hàm, kiểu số, kiểu ngày tháng', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-020', 'Để chọn toàn bộ các ô trên bảng tính bằng tổ hợp phím ta nhấn:', 'Ctrl + A', 'Ctrl + Alt', 'Ctrl + Alt +Space', 'Ctrl + Alt + Shift', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-021', 'Để chọn nhiều vùng trong MS Excel 2010, khi chọn ta nhấn phím:', 'Ctrl', 'Shift', 'Esc', 'Alt', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-022', 'Tổ hợp phím Shift + một trong bốn phím mũi tên thực hiện chức năng gì?', 'Bôi đen (Chọn)', 'Di chuyển con trỏ', 'Không thực hiện chức năng nào', 'Xóa dữ liệu', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-023', 'Để hủy kết quả vừa làm ta chọn:', 'Undo', 'Redo', 'Back', 'Delete', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-024', 'Trong bảng tính Excel, để sửa dữ liệu trong một ô tính mà không cần nhập lại, ta thực hiện:', 'F2', 'F3', 'F4', 'F5', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-025', 'Để nhanh chóng xem các thí sinh xếp loại "xuất sắc", ta bôi đen toàn bộ vùng có chứa dữ liệu cần xem rồi sử dụng công cụ gì trong số các công cụ sau', 'Vào menu Data, chọn Filter - Autofilter', 'Vào menu View, chọn mức "xuất sắc"', 'Vào menu Data, chọn Validation', 'Vào menu Tools, chọn Quick view, chọn mức "xuất sắc"', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-026', 'Trong Excel muốn sắp xếp dữ liệu sau khi quét khối phần dữ liệu muốn sắp xếp ta chọn?', 'Data --> Sort…', 'Data --> Filter…', 'Data --> Index…', 'Data --> Form…', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-027', 'Tại D2 có công thức "=B1+C1", khi sao chép sang ô E2 thì E2 có công thức là:', '=C1+D1', '=B1+D1', '=C1+D2', '=C2+D2', '', '', '', '', '', 'Dễ', 'UI04');
INSERT INTO `cauhoi` (`macauhoi`, `tencauhoi`, `padung`, `pasai1`, `pasai2`, `pasai3`, `imgviauTencauhoi`, `imgviauPadung`, `imgviauPasai1`, `imgviauPasai2`, `imgviauPasai3`, `mucdo`, `mabode`) VALUES
('UI04-028', 'Trong bảng tính Excel, tại ô A2 có sẵn dãy kí tự "1Angiang2". Nếu sử dụng sao chép công thức để điền dữ liệu đến các cột B2, C2, D2, E2; thì kết quả nhận được tại ô E2 là:', '1Angiang6 ', '5Angiang6', '5Angiang2    ', '1Angiang2', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-029', 'Trong bảng tính Excel, tại ô A2 có sẵn giá trị dãy kí tự "1 Angiang 2". Nếu sử dụng sao chép công thức để điền dữ liệu đến các ô B2, C2, D2, E2 ; thì kết quả nhận được tại ô E2 là:', '5 Angiang 2', '1 Angiang 2', '1 Angiang 6    ', '2 Angiang 2', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-030', 'Để di chuyển vùng dữ liệu từ nơi này sang nơi khác ta nhấn:', 'Ctrl + x ', 'Ctrl + p', 'Ctrl + v', 'Ctrl + c', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-031', 'Để xoá một cột, bôi đen cột và chọn?', 'Home\\Delete\\Delete Sheet Columns', 'Insert\\Delete\\Delete Sheet Rows ', 'Insert\\Delete\\Worksheet', 'Home\\Delete\\Clear', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-032', 'Để xoá một hàng, bôi đen hàng và chọn?', 'Home\\Delete\\Delete Sheet Rows', 'Home\\Delete\\Delete Sheet Columns', 'Home\\Delete\\Clear', 'Insert\\Delete\\Worksheet', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-033', 'Giả sử đã bôi đen một hàng trong Excel. Lệnh nào trong số các lệnh sau cho phép chèn thêm một hàng vào vị trí phía trên hàng đang chọn.', 'Vào thực đơn Insert, chọn Rows.', 'Vào thực đơn Insert, chọn Cells', 'Vào thực đơn Insert, chọn Columns', 'Vào thực đơn Insert, chọn Object', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-034', 'Để thay đổi độ rộng của cột, ta thực hiện chức năng nào?', 'Home\\Format\\Column Width', 'Home\\Format\\Row Height', 'Home\\Format\\AutoFit Row Height ', 'Home\\Format\\AutoFit Column Width', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-035', 'Trong bảng tính MS Excel 2010, để giữ cố định hàng hoặc cột trong cửa sổ soạn thảo, ta đánh dấu hàng hoặc cột, chọn:', 'Thẻ View – Freeze Panes', 'Thẻ Review – Freeze Panes', 'Thẻ Page Layout – Freeze Panes', 'Thẻ Home – Freeze Panes', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-036', 'Trong MS Excel 2010, để ẩn cột ta thực hiện:', 'Home\\format\\Hide & Unhide\\Hide columns', 'Data\\format\\Hide & Unhide\\Hide columns', 'Fomulas\\format\\Hide & Unhide\\Hide columns', 'View\\format\\Hide & Unhide\\Hide columns', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-037', 'Để giữ cố định hàng được lặp lại qua các trang, ta chọn hàng bên dưới hàng đó và thực hiện:  ', 'View\\Freeze Panes', 'Review\\Freeze Panes', 'Data\\Freeze Panes', 'Page Layout\\Freeze Panes', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-038', 'Để đổi tên một sheet ta chọn:', 'Chuột phải lên sheet\\Rename', 'Chuột trái lên tên sheet\\Delete', 'Chuột phải lên sheet\\Insert', 'Cả ba cách đều sai', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-039', 'Sheet được chèn thêm vào bảng tính sẽ nằm ở vị trí:', 'Phía sau tất cả các sheet', 'Trước sheet đang mở', 'Sau sheet đang mở', 'Trước tất cả các sheet', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-040', 'Thao tác để di chuyển đến một sheet khác trong cùng một tập tin?', 'Nhấn chuột lên tên sheet cần di chuyển đến hoặc nhấn tổ hợp phím Ctrl + PgUp hoặc Ctrl + PgUp', 'Nhấn phím F5 và số thứ tự của các sheet', 'Nhấn phím F2 và số thứ tự của các sheet', 'Nhấn phím F3 và số thứ tự của các sheet', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-041', 'Làm cách nào để di chuyển Sheet2 ra trước Sheet1', 'Chọn Sheet2 và kéo đến vị trí mong muốn', 'Format > Sheet > Move, chọn đúng đến vị trí mong muốn', 'Chọn Tools > Sheet > Move, và chọn đúng đến vị trí mong muốn', 'Double tab Sheet2 và kéo đến vị trí mong muốn', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-042', 'Trong khi làm việc với Excel, để nhập vào công thức tính toán cho một ô, trước hết ta phải gõ:', 'Dấu: = ', 'Dấu: $', 'Dấu: ?', 'Dấu: : ', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-043', 'Trong MS Excel 2010, để ghép 2 xâu ký tự "VU LOC" và "AN" thành xâu ký tự mới là "VU LOC AN", ta sử dụng công thức:', '="VU LOC"&" "&"AN"', '="VU LOC" + "AN"', '="VU LOC" AND "AN"', ' Không ghép được', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-044', 'Trong Excel biểu thức =24*2+5*2+(20-10)/2 sẽ trả về kết quả là bao nhiêu?', '63', '271', '138', 'Không thể thực hiện được biểu thức trên', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-045', 'Trong Excel sau khi nhập công thức sau:\n="123"-"23" ta có kết quả?', '100', '#VALUE!', '123', '23', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-046', 'Trong bảng tính Excel, ô A5 chứa “TRAN” và ô B5 chứa “ANH”. Để ổ D5 cho kết quả là “TRAN ANH” (có 1 khoảng trắng ở giữa), ta thực hiện công thức như sau:', ' = A5 &“ “& B5', ' = A5 + “ “ + B5', ' = A5 + B5', ' = A5 & B5', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-047', 'Khi không tham chiếu được Excel báo lỗi: ', '#REF', '#NUM', '#NA', '#VALUE', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-048', 'Trong bảng tính Excel, nếu trong một ô tính có các kí hiệu #####, điều đó có nghĩa là gì?', 'Cột chứa ô đó có độ rộng quá hẹp nên không hiển thị hết chữ số', 'Hàng chứa ô đó có độ cao quá thấp nên không hiển thị hết chữ số', 'Công thức nhập sai và Excel thông báo lỗi', 'Chương trình bảng tính bị nhiễm virus', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-049', 'Trong Microsoft Excel, tại ô A2 có giá trị là số không (0); Tại ô B2 gõ vào công thức =5/A2 nhận được kết quả nào?', '#DIV/0!', '#VALUE!', '0', '#NAME?', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-050', 'Trong bảng tính Excel, khi chiều dài dữ liệu kiểu số lớn hơn chiều rộng của ô thì sẽ hiển thị trong ô các kí tự:', '# ', '&', '$', '*', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-051', 'Trong Excel, khi viết sai tên hàm trong tính toán, chương trình thông báo lỗi?', '#NAME?', '#VALUE!', '#N/A!', '#DIV/0!', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-052', 'Trong Microsoft Excel, hàm SUM dùng để làm gì?', 'Tính tổng các giá trị số trong vùng được chọn', 'Tìm giá trị lớn nhất trong các giá trị được chọn', 'Tìm giá trị nhỏ nhất trong các giá trị được chọn', 'Tính giá trị trung bình trong các vùng được chọn', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-053', 'Trong Microsoft Excel, hàm nào để tìm số nhỏ nhất trong các giá trị được chọn?', 'MIN', 'MINUTE', 'MINUM', 'MINIMUM', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-054', 'Trong Microsoft Excel, hàm nào để tìm giá trị trung bình của các giá trị được chọn?', 'AVERAGE', 'EVERAGE', 'ERVERAGE', 'AVERGE', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-055', 'Trong bảng tính MS Excel, hàm nào sau đây cho phép đếm các giá trị thỏa mãn một điều kiện cho trước:', 'COUNTIF', 'SUMIF', 'COUNT', 'SUM', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-056', 'Muốn tính trung bình của hàng hay cột, ta sử dụng hàm nào sau đây:', 'Average()', 'Medium()', 'TOTAL(SUM)/SUM()', 'SUM(TOTAL)/TOTAL()', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-057', 'Trong Excel hàm dùng để chuyển chuỗi số sang số là hàm nào trong các hàm sau?', 'Value(số)', 'Mid(chuỗi, m, n)', 'Right(chuỗi, n)', 'Left(chuỗi, n)', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-058', 'Khi sử dung hàm SUM ta có thể:', 'Sử dụng tối đa là 255 tham số', 'Sử dụng tối đa là 1 tham số', 'Sử dụng tối đa là 2 tham số', 'Không sử dụng tham số nào', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-059', 'Trong Microsoft Excel, công thức =MAX(30,10,65,5) nhận được kết quả là bao nhiêu?', '65', '110', '120', '135', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-060', 'Trong Microsoft Excel, công thức =EVERAGE(5,7,9) cho kết quả thế nào?', '7', '#NAME?', '9', '5', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-061', 'Trong Microsoft Excel, công thức =COUNT(19,11,4) sẽ trả về kết quả là bao nhiêu?', '3', '19', '34', '0', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-062', 'Trong bảng tính Excel, công thức =COUNTA(19,"S","n01","n02") \nsẽ trả về kết quả là bao nhiêu?', '4', '19', '3', '0', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-063', 'Công thức Round(7475.47,-2) trả về kết quả bao nhiêu?', '7500', '7480', '7475.47', '7475', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-064', 'Trong bảng tính MS Excel, tại ô A2 có giá trị số 10, tại ô B2 gõ công thức =PRODUCT(A2,5) cho kết quả:', '50', '15', '2', '#VALUE!', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-065', 'Trong bảng tính MS Excel 2010, tại ô A2 gõ vào công thức =MAX(3,14,-25,5) cho kết quả:', '14', '-25', '5', '3', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-066', 'Trong bảng tính MS Excel 2010, công thức =Mod(26,7) cho kết quả:', '5', '6', '4', '3', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-067', 'Trong Microsoft Excel, công thức = AVERAGE(4,5,MIN(8,6,7)) cho kết quả nào?', '5', '4', '8', '0', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-068', 'Trong Microsoft Excel, tại ô A2 có dữ liệu "1Hanoi2". Sử dụng Fill hand để điền dữ liệu đến các ô B2, C2, D2, E2; tại ô E2 nhận được kết quả nào?', '1Hanoi6', '1Hanoi5', '1Hanoi4', '#VALUE!            ', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-069', 'Trong bảng tính MS Excel, công thức =Mid(“m1234”,2,3) cho kết quả:', 'Chuỗi “123”', 'Số 123', 'Số 12', 'Số 23', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-070', 'Kết quả của công thức =COUNT(“a”,”b”,2,3) + COUNTA(“a”,”b”,0,1) là?', '6', '7', '8', '5', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-071', 'Muốn tính tổng của vùng E2:E8 với điều kiện là "Máy tính" trong vùng dữ liệu A2:A8, ta có công thức:', '=SUMIF(A2:A8,"Máy tính",E2:E8)', '=SUMIF(A2:A8,"Máy tính")', '=SUMIF(A2:A8,E2:E8,"Máy tính")', '=SUMIF("Máy tính",A2:A8,E2:E8)', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-072', 'Biết vùng dữ liệu từ B2:B10 chứa Tên chức vụ, muốn xem có bao nhiêu Nhân viên trong vùng dữ liệu ta thực hiện công thức:', '=Countif(B2:B10,"Nhân viên")', '=Countif(B2:B10,Nhân viên)', '=Countif(B2:B10,''Nhân viên'')', '=Countif(B2:B10,"''Nhân viên''")', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-073', 'Cú pháp hàm Sumif là?', '=SUMIF(range,criteria,[sum_range])', '=SUMIF(criteria,range,[sum_range])', '=SUMIF(criteria,[sum_range],range)', 'Không đáp án nào đúng', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-074', 'Trong Excel biểu thức =SUM(9,1,MAX(3,5,7)) sẽ trả về kết quả là bao nhiêu?', '17', '13', '15', '19', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-075', 'Trong Excel biểu thức =MID("A123B",3,2) sẽ trả về kết quả là bao nhiêu?', '23', 'A1', '3B', 'A123B', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-076', 'Kết quả của công thức SUM(13,7,-10)+AVERAGE(12,0,3) là?', '15', '20', '10', '16', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-077', 'Trong bảng tính Excel, tại ô A2 có sẵn dãy ký tự “TINHOC” ; Tại ô B2 gõ vào công thức =VALUE(A2) thì nhận được kết quả:', ' #VALUE!', 'Tinhoc', '6', 'TINHOC', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-078', 'Cú pháp hàm IF là?', 'IF(BT logic, Giá trị đúng, Giá trị sai)', 'IF(BT logic, Giá trị sai, Giá trị đúng)', 'IF(BT logic, Giá trị đúng)', 'IF(Giá trị đúng, BT logic, Giá trị sai)', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-079', 'Nhóm hàm logic gồm có:', 'IF, Not, And, Or', 'Date, And, Or Hlookup', 'Not, And, Or, Vlookup', 'Date, If, And, Or', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-080', 'Trong bảng tính Excel, điều kiện trong hàm IF được phát biểu dưới dạng một phép so sánh. Khi cần so sánh khác nhau thì sử dụng kí hiệu nào?', '<>', '><', '#', '&', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-081', 'Trong MS Excel 2010, công thức sau trả về giá trị nào: = IF(5 >= 5, "Không được tuyển dụng")', 'Không được tuyển dụng', 'Công thức sai vì trong Excel không có phép toán =>', 'True', 'Công thức sai vì thiếu đối số trong hàm IF', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-082', 'Biểu thức sau cho kết quả là bao nhiêu nếu trong ô B2 là 10 và dữ liệu trong D2 là D: = IF(OR(B2>=8,D2="A"),1000,300)', '1000', '300', '1300', '', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-083', 'Trong bảng tính Excel, tại ô A2 gõ vào công thức =IF(3>5,100,IF(5<6,200,300)) thì kết quả nhận được tại ô A2 là: ', '200', 'true', 'false', '100', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-084', 'Nếu thí sinh đạt từ 5 điểm trở lên, thí sinh đó được xếp loại Đạt, ngược lại nếu dưới 5 điểm, thì xếp loại Không đạt. Công thức nào dưới đây thể hiện đúng điều này (Giả sử ô G6 đang chứa điểm thi)', '=IF(G6<5,"Không đạt","Đạt")', '=IF(G6>=5,"Đạt") ELSE ("Không đạt")', '=IF(G6=<5,"Đạt", "Không đạt")', '#REF!', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-085', 'Biểu thức sau cho kết quả là bao nhiêu nếu DTB = 9 và HK loại C trong đó DTB: Điểm trung bình. HK: Hạnh kiểm=If(AND(DTB>=8, HK= "A"),300,1000)', '1000', '300', 'TRUE', 'FALSE', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-086', 'Biểu thức sau cho kết quả là bao nhiêu nếu DTB = 6? =If(DTB>=5, Dau, Truot)', '#Name?', 'Dau', 'Truot', '#VALUE!', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-087', 'Biểu thức sau cho kết quả là bao nhiêu nếu DTB=9?\r\n=If(DTB>=5,"TB",If(DTB>=6.5,"Kha",If(DTB>=8,"Gioi","Yeu")))', 'Gioi', 'TB', 'Kha', 'Yeu', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-088', 'Hàm Month có nghĩa là?', 'Lấy ra tháng', 'Lấy ra ngày', 'Lấy ra năm', 'Cả ba phương án đều sai', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-089', 'Trong Excel hàm TODAY() trả về:', 'Ngày tháng hiện tại của hệ thống', 'Số ngày trong tháng của biến ngày tháng date', 'Số năm của biến ngày tháng date', 'Số tháng trong năm của biến ngày tháng date', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-090', 'Trong Excel, giả sử ô A1 của bảng tính lưu trị ngày 15/10/1970. Kết quả hàm =MONTH(A1) là bao nhiêu?', '10', '15', '#VALUE!', '1970', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-091', 'Giả sử ngày hệ thống của máy tính là: 8/18/2008; Khi đó tại ô A2 gõ vào công thức =Today()-1 thì nhận được kết quả là:        ', '8/17/2008', '0 ', '#VALUE!', '#NAME!', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-092', 'Giả sử ô E6 có giá trị là 28/11/2011, tại ô G6 gõ công thức =YEAR(now())-YEAR(E6), kết quả là?', '5', '2', '3', '4', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-093', 'Hãy cho biết hàm dò tìm là hàm nào?', 'Vlookup', 'Product', 'Sumif', 'Counta', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-094', 'Range_lookup trong hàm HLOOKUP có giá trị mặc định bằng?', 'Range_lookup có giá trị là 0 hoặc 1', 'Range_lookup có giá trị là 0', 'Range_lookup có giá trị là 1', 'Tất cả sai', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-095', 'Cấu trúc của hàm HLOOKUP?', '=vlookup(lookup_value, table_array, row_index_num, [range_lookup])', '=vlookup(lookup_value, row_index_num, table_array, [range_lookup])', '=vlookup(table_array, lookup_value, row_index_num, [range_lookup])', '=vlookup([range_lookup], lookup_value, table_array, row_index_num )', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-096', 'Để dữ liệu ngày tháng năm được hiển thị dưới dạng Nov-23-2004, trong thẻ number, hộp Type, nhập vào chuỗi ký tự:', 'mmm-dd-yyyy', 'mm-dd-yy', 'mmm-dd-yy', 'mm-dd-yyyy', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-097', ' Tinh lương tại ô K6 = mức lương cơ bản * hệ số lương , làm tròn đơn vị nghìn', '=ROUND(J6*$K$11;-3)', '=J6*$k11', '=MOD(J6*K$11;3)', '=ROUND(J6*K11;0)', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-098', 'Trong MS excel 2010, biểu tượng % trên thanh công cụ dùng để:', 'Hiển thị tỷ lệ phần trăm', 'Nhân cho 100', 'Chia cho 100', 'Cả 3 ý trên đều sai', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-099', 'Để văn bản trong ô được chọn có kiều chữ nghiêng và gạch chân ta chọn tổ hợp phím nào sau:', 'Ctrl+U, Ctrl+I', 'Ctrl+B, Ctrl+I', 'Ctrl+F, Ctrl+I', 'Ctrl+H, Ctrl+I', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-100', 'Hãy cho biết tổ hợp phím tắt để định dạng chữ đậm trong Microsoft Excel?', 'Ctrl + B', 'Ctrl + C', 'Ctrl + U', 'Ctrl + X', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-101', 'Để định dạng được màu khác nhau đối với nội dung ô, nền của ô ta chọn công cụ nào sau đây:', 'Conditional Formatting', 'Format as Table', 'Cell Style', 'Format Cell', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-102', 'Để sao chép định dạng từ một ô/ dãy ô tới một ô khác/dãy ô khác ta thực hiện:', 'Home\\Clipboard\\Format Paint', 'Insert\\Clipboard\\Format Paint', 'Page Layout\\Clipboard\\Format Paint', 'Data\\Clipboard\\Format Paint', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-103', ' Giả sử tại ô D2 có công thức =B2*C2/100. Nếu sao chép công thức đến ô G6 sẽ có công thức là?', 'E6*F6/100', 'E7*F7/100', 'B6*C6/100', 'E2*C2/100', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-104', 'Để văn bản được cuộn trên một ô ta thực hiện?', 'Home\\Alignment\\Wrap Text', 'Insert\\Alignment\\Wrap Text', 'Page Layout\\ Alignment\\Wrap Text', 'Data\\Alignment\\Wrap Text', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-105', 'Để quay được hướng văn bản trong ô, ta chọn ô sau đó thực hiện:', 'Home\\Alignment\\ Orientation\\chọn hướng', 'Page Layout\\Alignment\\ Orientation\\chọn hướng', 'Insert\\Alignment\\ Orientation\\chọn hướng', 'View\\Alignment\\ Orientation\\chọn hướng', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-106', 'Để gộp (trộn) nhiều ô thành 1 ô ta thực hiện?', 'Home\\Format Cells:Alignment\\Merge Cells', 'Home\\Format Cells:Number\\Merge Cells', 'Home\\Format Cells:Font\\Merge Cells', 'Home\\Format Cells:Border\\Merge Cells', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-107', 'Trong Microsoft Excel, công cụ nào cho phép thay đổi màu sắc cho vùng được chọn?', 'Công cụ Fill Color trên thanh định dạng', 'Công cụ Font Color trên thanh định dạng', 'Công cụ Line Color trên thanh định dạng', 'Công cụ Format Color trên thanh định dạng', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-108', 'Để kẻ khung viền cho bảng ta thực hiện?', 'Home\\Format\\Format Cells\\Border', 'Home\\Format\\Format Cells\\Alignment', 'Home\\Format\\Format Cells\\Number', 'Home\\Format\\Format Cells\\Fill', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-109', 'Trong Microsoft Excel, biểu đồ loại nào thích hợp cho việc hiển thị giá trị dưới dạng % (percentage)?', 'Pie', 'Line', 'Column', 'Percentage', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-110', 'Trong bảng tính MS Excel, để chèn biểu đồ dạng hình cột ta thực hiện:', 'Insert\\Charts\\Column', 'Insert\\Charts\\Line', 'Insert\\Charts\\Pie', 'Insert\\Charts\\Bar', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-111', 'Trong Microsoft Excel, khi vẽ biểu đồ bằng công cụ Chart Wizard, thẻ Data Range cho phép làm gì?', 'Thay đổi vùng dữ liệu vẽ biểu đồ', 'Gán nhãn cho vùng dữ liệu', 'Xóa dữ liệu', 'Thêm 1 vùng dữ liệu', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-112', 'Trong Microsoft Excel, cách nào để mở hộp thoại thiết lập các thông số in bảng tính?', 'Ctrl + P', 'Atl + P', 'Ctrl + Print Screen ', 'Print Screen ', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-113', 'Để thiết lập được lề trang in ta thực hiện: ', 'Page Layout\\Margins\\Custom Margins\\...', 'Insert\\Margins\\Custom Margins\\...', 'Data\\Margins\\Custom Margins\\...', 'Home\\Margins\\Custom Margins\\...', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-114', 'Muốn định dạng trang in theo hướng chiều ngang trang giấy ta chọn:', 'Page Layout\\ Orientation\\landscape', 'Page Layout\\ Orientation\\Portrait', 'Page Layout\\Landscape', 'Tất cả đều sai', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-115', 'Để nhập nội dung vào Header và Footer của Microsoft Excel, thực hiện:', 'Insert -> Header & Footer', 'Page Layout -> Textbox', 'Insert -> WordArt', 'Page Layout -> Orientation -> Landscape', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-116', 'Khi công thức bị sai, ta có thể gỡ rối đoạn công thức đó bằng phím nào ?', 'F9', 'F10', 'F11', 'F12', '', '', '', '', '', 'Dễ', 'UI04'),
('UI04-117', 'Trong MS Excel 2010, để thiết lập được in tiêu đề dòng tự động trên mọi trang ta thực hiện:', 'Page Layout\\Print Titles', 'Home\\Print Titles', 'Insert\\Print Titles', 'View\\Print Titles', '', '', '', '', '', 'Khó', 'UI04'),
('UI04-118', 'Trước khi in, để xem trước trang bảng tính ta nhấn: ', 'Ctrl+P', 'Shift+P', 'Alt+P', 'ESC+P', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-119', 'Để lưu một file Excel dưới định dạng khác, ta chọn?', 'Save As Type', 'Type Of File', 'Type', 'File Of Type', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI04-120', 'Cách đặt mật khẩu cho file Excel 2010?', 'FileSaveToolsGeneral Options', 'FileSaveToolsWeb Option', 'FileSaveToolsProperties', 'Không có đáp án đúng', '', '', '', '', '', 'Trung bình', 'UI04'),
('UI05-001', 'Để một bài thuyết trình đạt hiệu quả cao, chúng ta cần quan tâm tới vấn đề nào đầu tiên ?', 'Nắm vững nội dung cần thuyết trình', 'Đối tượng nghe bài thuyết trình', 'Phương pháp thuyết trình', 'Hình thức thuyết trình', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-002', 'Cấu trúc chung của một bài thuyết trình gồm có bao nhiêu phần ?', '3', '1', '2', '4', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-003', 'Trong Powerpoint 2010, phần mở rộng của tên file là nhóm ký tự nào?', 'pptx', 'ppts', 'ppt', 'pptt', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-004', 'Trong Powerpoint 2010, thoát khỏi chương trình bằng cách?', 'Vào File/ Exit', 'Nhấn nút Close', 'Nhấn tổ hợp phím Alt + F4', 'Tất cả đểu đúng', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-005', 'Để mở chương trình Powerpoint 2010, ta làm thế nào?', 'Tất cả các đáp án đều đúng', 'Kích đúp chuột trái vào biểu tượng Powerpoint 2010 trên màn hình desktop', 'Kích chuột phải vào biểu tượng Powerpoint 2010 trên màn hình desktop/Open', 'Start/All Programs/Microsoft Office/Powerpoint 2010', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-006', 'Trong Powerpoint 2010, thanh công cụ truy cập nhanh có tên là?', 'Quick Access Toolbar', 'Quick Toolbar Access', ' Access Quick Toolbar', 'Toolbar Quick Access', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-007', 'Trong PowerPoint 2010, thao tác nào sau đây để tùy chọn phần ẩn/hiện của các thanh công cụ ?', 'Vào File/Options/Customize Ribbon', 'Vào File/Options/Advanced', 'Vào File/Options/General', 'Vào File/Options/Proofing', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-008', 'Để truy nhập hệ thống trợ giúp trên PowerPoint sử dụng phím hay tổ hợp phím nào ?', 'F1', 'ESC', 'Ctrl + H', 'Alt + Tab', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-009', 'Trong Powerpoint 2010, cách nào để mở 1 bản trình bày (Presentation) có sẵn trong máy tính?', 'File/Open', 'File/Close', 'File/Edit', 'File/Save', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-010', 'Trong Powerpoint 2010, thao tác File/Open dùng để làm gì?', 'Mở 1 bản trình bày (Presentation) có sẵn trong máy tính', 'Đóng 1 bản trình bày (Presentation) có sẵn trong máy tính', 'Lưu 1 bản trình bày (Presentation) có sẵn trong máy tính', 'Xóa 1 bản trình bày (Presentation) có sẵn trong máy tính', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-011', 'Trong Powerpoint 2010, để thoát file hiện hành, ta làm thế nào?', 'File/Exit', 'File/Save', 'File/Open', 'File/Edit', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-012', 'Trong Powerpoint 2010, thao tác File/Close dùng để làm gì?', 'Đóng file hiện tại', 'Lưu file hiện tại', 'Xóa file hiện tại', 'Sao chép file hiện tại', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-013', 'Trong Powerpoint 2010, có 3 file đang mở, thao tác chọn  File/Close dùng để làm gì? ', 'Đóng file hiện tại', ' Thoát khỏi Powerpoint', 'Đóng Slide hiện tại', 'Tắt máy tính', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-014', 'Trong Powerpoint 2010, cách nào để tạo một bản trình bày (Presentation) mới?', 'File/New/Blank Presentation/Create', ' Insert/New Slide/Create', 'File/New Presentation/Create', 'Insert/New/Blank Presentation/Create', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-015', 'Trong Powerpoint 2010, thao tác nào sau đây để tạo mới 1 tập tin trình diễn theo mẫu giao diện (Themes) của chương trình?', 'Vào File / New / Themes / Chọn mẫu / Create', 'Vào Home / New / Themes / Chọn mẫu / OK', 'Vào Home / New / Themes / Chọn mẫu / Create', 'Vào File / New / Themes / Chọn mẫu / OK', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-016', 'Trong Powerpoint 2010, thao tác nào sau đây để tạo mới 1 tập tin trình diễn theo mẫu (Sample templates) của chương trình?', 'Vào File / New / Sample templates / Chọn mẫu / Create', 'Vào Home / New / Sample templates / Chọn mẫu / Create', 'Vào Design / New / Sample templates / Chọn mẫu / Create', 'Vào Insert / New / Sample templates / Chọn mẫu / Create', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-017', 'Trong Powerpoint 2010, chế độ hiển thị nào cho phép thực hiện sắp xếp lại các Slide?', 'View/ Slide Sorter', 'View/ Normal', 'View/ Page Layout', 'View/ Reading View', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-018', 'Trong Powerpoint 2010, để chuyển sang chế độ hiển thị đọc ta thực hiện?', 'Vào View, chọn Reading View', 'Vào View, chọn Reading Mode', 'Vào Review, chọn Reading Mode', 'Vào Review, chọn Reading View', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-019', 'Trong Powerpoint, tổ hợp phím Shift + F9 được sử dụng để?', 'Bật, hoặc Tắt chế độ khung lưới khi soạn thảo', 'Chuyển sang chế độ đọc', 'Tắt chế độ khung lưới khi soạn thảo', 'Bật chế độ khung lưới khi soạn thảo', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-020', 'Trong Powerpoint, tổ hợp phím Shift + Alt + F9 được sử dụng để?', 'Bật hoặc Tắt thanh thước kẻ', 'Bật thanh thước kẻ', 'Tắt thanh thước kẻ', 'Tất cả đều sai', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-021', 'Trong PowerPoint 2010, thao tác nào sau đây dùng để bật, tắt khung lưới Gridlines?', 'Tất cả đều đúng', 'Nhấn tổ hợp phím Shift + F9', 'Vào View chọn Gridlines', 'Vào Home / Arrange / Align / View Gridlines', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-022', 'Trong Powerpoint 2010, để lưu file, ta làm thế nào?', 'File/Save', 'File/Open', 'File/Close', 'File/Edit', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-023', 'Trong Powerpoint 2010, thao tác File/Save dùng để làm gì?', 'Lưu file hiện tại', 'Xóa file hiện tại', 'Sao chép file hiện tại', 'Đóng file hiện tại', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-024', 'Trong Powerpoint 2010, thao tác Ctrl + S dùng để làm gì?', 'Lưu file hiện tại', 'Xóa file hiện tại', 'Sao chép file hiện tại', 'Đóng file hiện tại', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-025', 'Trong Powerpoint 2010, để chuyển tập tin trình diễn sang dạng video?', 'File / Save As/ Save As Type/ Windows Media Video', 'File / Save As/ Save As Type/ PowerPoint Presentation', 'File / Save As/ Save As Type/ PDF', 'File / Save As/ Save As Type/ Word', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-026', 'Trong Powerpoint 2010, để đặt mật khẩu cho file hiện tại?', 'Vào File/ Info/ Protect Presentation/ Encrypt with Password.', 'Vào File/Save / Protect Presentation / Encrypt with Password.', 'Vào Home / Info / Protect Presentation / Encrypt with Password.', 'Vào Home / Save / Protect Presentation / Encrypt with Password.', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-027', 'Trong Powerpoint 2010, chọn phát biểu đúng?', 'Cho phép lưu các Slide thành tập tin định dạng văn bản điện tử PDF', 'Không cho phép lưu các Slide thành tập tin định dạng hình ảnh JPG', 'Tổ hợp CTRL + O dùng để tạo thêm 1 trang Slide mới', 'Lệnh Rehearse Timings dùng để xóa 1 Slide', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-028', 'Trong PowerPoint 2010, thao tác nào sau đây để thiết lập thư mục lưu trữ mặc định?', 'File / Option / Save / Default file location.', 'File / Save / Default file location', 'Option / Save / Default file location.', 'File / Save / Option / Default file location.', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-029', 'Trong Powerpoint 2010, thao tác File / Option / Save / Default file location dùng để làm gì?', 'Thiết lập thư mục lưu trữ mặc định', 'Thiết lập các thông số cho các trang in', 'Thiết lập thông số cho toàn bộ Slide', 'Thiết lập theme cho toàn bộ Slide', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-030', 'Trong PowerPoint 2010, thao tác nào sau đây để mở một bài thuyết trình đồng thời trên hai của sổ ?', 'Vào View/New Windows', 'Vào Review/New Windows', 'Vào Home/New Windows', 'Vào Data/New Windows', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-031', 'Mỗi trang trình diễn trong Powerpoint được gọi  là?', 'Một Slide', 'Một Page', 'Một Sheet', 'Một Cơ sở dữ liệu', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-032', 'Trong Powerpoint 2010, để hủy bỏ thao tác vừa thực hiện, ta ấn tổ hợp phím?', 'Ctrl + Z', 'Ctrl +  F5', 'Ctrl +  A', 'Ctrl + X', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-033', 'Trong chương trình MS PowerPoint, chức năng Design/Themes dùng để làm gì?', 'Định dạng giao diện của slide', 'Định dạng hiệu ứng lật trang', 'Định đạng hiệu ứng cho các đối tượng trên slide', 'Định dạng kiểu chữ cho slide', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-034', 'Trong Powerpoint 2010, cách nào để lựa chọn bố cục cho Slide?', 'Home/Layout', ' Format /Slide Design', ' Insert/New Slide', 'Home/New Slide', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-035', 'Trong Powerpoint 2010, cách nào để thêm  1 Slide mới?', 'Kích chuột phải vào Slide/New Slide', 'Kích chuột phải vào Slide/Copy', 'Kích chuột phải vào Slide/Cut', 'Kích chuột phải vào Slide/Delete', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-036', 'Trong Powerpoint 2010, cách nào sau đây cho phép định dạng chung cho toàn bộ các Slide?', 'View/Slide Master', 'View/Notes Page', 'View/Normal', 'View/Slide Sorter', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-037', 'Trong Powerpoint 2010, cách nào để lựa chọn bố cục cho Slide đã chọn gồm tiêu đề và nội dung? ', 'Home/Layout/Title and Content', 'Home/Layout/Title Slide', 'Home/Slide Design', 'Home/Layout/Title Slide', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-038', 'Trong PowerPoint 2010, mẫu bố cục (Layout) Two Content có bao nhiêu placeholder?', '3', '2', '4', '5', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-039', 'Trong PowerPoint 2010, mẫu bố cục (Layout) Comparison có bao nhiêu placeholder?', '5', '2', '3', '4', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-040', 'Trong PowerPoint 2010, mẫu bố cục (Layout) Picture with Caption có bao nhiêu placeholder cho phép nhập văn bản?', '2', '1', '3', '4', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-041', 'Trong Powerpoint 2010, chọn phát biểu đúng?', 'Mẫu bố cục (Layout) Two Content có 03 placeholder', 'Vào File / Option / Save / Default file location. để cài mật mã cho tập tin', 'Có 8 nhóm hiệu ứng cho các đối tượng trên Slide', 'Có 5 mẫu bố cục (Layout) mặc định', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-042', 'Trong PowerPoint 2010, thao tác nào sau đây để bổ sung mẫu giao diện của tập tin trình diễn hiện tại vào chương trình?', 'Vào Design / More / Save Current Theme .', 'Vào File / More / Save Current Theme.', 'Vào Insert / More / Save Current Theme.', 'Vào Home / More / Save Current Theme .', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-043', 'Trong Powerpoint 2010, thao tác View/Slide Master dùng để làm gì?', 'Định dạng chung cho toàn bộ các Slide', 'Định dạng  cho từng các Slide', 'Định dạng cho văn bản cho từng slide', 'Định dạng phông nền cho từng slide', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-044', 'Phát biểu nào sau đây đúng?', 'Trong chương trình MS PowerPoint, chúng ta có thể thiết lập các tùy chọn cho một slide hay một tập slide cùng một lúc.', 'Trong chương trình MS PowerPoint, chúng ta chỉ có thể thiết lập các tùy chọn cho một slide và không thể thiết lập cho một tập slide cùng một lúc.', 'Trong chương trình MS PowerPoint, chúng ta chỉ có thể thay đổi theme một lần.', 'Tất cả ý trên đều sai.', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-045', 'Trong Powerpoint 2010, chọn nhóm thao tác nào để tạo màu nền cho Slide hiện hành?', 'Kích chuột phải vào Slide/Format Background/ chọn màu trong Fill/ Close', 'Kích chuột phải vào Slide/Format Background/ chọn màu trong Fill/ Apply to All', 'Kích chuột phải vào Slide/Format Background/ chọn màu trong Fill/ Reset Background', 'Kích chuột phải vào Slide/Format Background/ chọn màu trong Fill/ Apply', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-046', 'Trong Powerpoint 2010, chọn nhóm thao tác nào để tạo màu nền cho toàn bộ Slide ?', 'Kích chuột phải vào Slide/Format Background/ chọn màu trong Fill/ Apply to All/ Close', 'Kích chuột phải vào Slide/Format Background/ chọn màu trong Fill/ Close', 'Kích chuột phải vào Slide/Format Background/ chọn màu trong Fill/ Reset Background', 'Kích chuột phải vào Slide/Format Background/ chọn màu trong Fill/ Apply', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-047', 'Trong PowerPoint 2010, mỗi bài thuyết trình có tối đa là bao nhiêu Slide Master ?', 'Không giới hạn', '1', '2', '4', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-048', 'Trong Powerpoint 2010, cách nào để nhân đôi 1 Slide đã được chọn?', 'Kích chuột phải vào Slide/Duplicate Slide', 'Kích chuột phải vào Slide/New Slide', 'Kích chuột phải vào Slide/Delete Slide', 'Kích chuột phải vào Slide/Add Section', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-049', 'Trong Powerpoint 2010, cách nào để sao chép 1 Slide đã được chọn?', 'Kích chuột phải vào Slide/Copy', 'Kích chuột phải vào Slide/Cut', 'Kích chuột phải vào Slide/Paste', 'Kích chuột phải vào Slide/Delete', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-050', 'Trong Powerpoint, tổ hợp phím Ctrl + V thường được sử dụng để?', 'Dán một đoạn văn bản từ Clipboard', 'Xóa 1 đoạn văn bản', 'Sao chép một đoạn văn bản', 'Cắt và sao chép một đoạn văn bản', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-051', 'Trong Powerpoint, tổ hợp phím Ctrl + C được sử dụng để?', 'Sao chép một đoạn văn bản', 'Xóa 1 đoạn văn bản', 'Dán một đoạn văn bản từ Clipboard', 'Cắt và sao chép một đoạn văn bản', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-052', 'Trong Powerpoint 2010, cách nào để xoá bỏ một Slide đã chọn? ', 'Kích chuột phải tại Slide đã chọn/ Delete Slide', 'Kích chuột phải tại Slide đã chọn/ Copy', 'Kích chuột phải tại Slide đã chọn/ Paste', 'Kích chuột phải tại Slide đã chọn/ Cut', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-053', 'Trong Powerpoint 2010, nếu chọn 2 Slide và dùng lệnh Duplicate Slide thì tạo ra thêm mấy Slide ? ', '2', '4', '6', '8', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-054', 'Trong Powerpoint 2010, thực hiện thao tác nào để lựa chọn nhiều Slide không liên tiếp trong một Presentation? ', 'Kích chọn vào 1 Slide , giữ phím Ctrl và thực hiện việc kích chọn các Slide tiếp theo', ' Kích chọn vào 1 Slide cần chọn,  giữ phím Shift và thực hiện việc kích chọn các Slide tiếp theo', 'Kích chọn vào 1 Slide cần chọn, giữ phím Alt và thực hiện việc kích chọn các Slide tiếp theo', 'Kích chọn vào 1 Slide , giữ phím Ctrl + Shift và thực hiện việc kích chọn các Slide tiếp theo', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-055', 'Trong Powerpoint 2010, để thêm 1 slide giống slide được chọn ta dùng tố hợp phím lệnh nào sau đây?', 'ALT + H + I + D', 'ALT + H + E + D', 'ALT + H + D + I', 'ALT + H + E + I', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-056', 'Trong Powerpoint 2010, cách nào để xóa 1 Slide đã được chọn?', 'Kích chuột phải vào Slide muốn xóa/Delete Slide', 'Kích chuột phải vào Slide muốn xóa/New Slide', 'Kích chuột phải vào Slide muốn xóa/Duplicate Slide', 'Kích chuột phải vào Slide muốn xóa/Add Section', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-057', 'Trong PowerPoint 2010, chế độ hiển thị Outline là chế độ có tính năng nào sau đây ?', 'Cho phép chỉ nhìn thấy chữ, không nhìn thấy hình ảnh', 'Cho phép hiển thị để xóa các slide nhanh hơn', 'Cho phép chỉ hiển thị hình ảnh, không hiển thị chữ', 'Cho phép hiển thị để soạn thảo từng slide riêng biệt', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-058', 'Trong Powerpoint 2010, cách nào để thay đổi kích thước của placeholder?', 'Di chuyển chuột đến vị trí một trong 8 nốt tròn xung quanh placeholder đang chọn, sau đó điều chỉnh kích thước placeholder', 'Giữ trái chuột kéo đến vị trí khác theo nhu cầu', 'Giữ phải chuột kéo đến vị trí khác theo nhu cầu', 'Di chuyển chuột đến đường kẻ ngang placeholder, sau đó điều chỉnh kích thước placeholder', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-059', 'Trong Powerpoint 2010, cách nào để hiển thị cửa sổ soạn thảo nội dung Slide?', 'View/ Normal', ' View/ Slide Sorter', 'View/ Notes Page', ' View/ Reading View', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-060', 'Trong Powerpoint 2010, tổ hợp phím CTRL + H tương ứng với lựa chọn nào sau đây?', 'Vào Home/Replace', 'Vào Home/Reset', 'Vào Insert/Picture', 'Vào View/Slide Master', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-061', 'Trong Powerpoint 2010, cách nào để xóa một khung văn bản đã chọn?', 'Kích chuột trái vào khung văn bản cần xóa/Delete', 'Kích chuột phải vào khung văn bản cần xóa/Delete', 'Kích chuột trái vào khung văn bản cần xóa/Insert', 'Kích đúp chuột trái vào khung văn bản cần xóa/Cut', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-062', 'Trong Powerpoint 2010, vào Home/ Line Spacing?', 'Để quy định khoảng cách giữa các dòng, đoạn ', 'Để quy định khoảng cách giữa các dòng', 'Để quy định khoảng cách giữa các đoạn ', 'Tất cả đều sai', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-063', 'Trong PowerPoint 2010, để xóa toàn bộ định dạng đoạn văn bản được chọn?', 'Vào Home / Clear All Formatting', 'Vào Insert / Clear All Formatting', 'Vào View / Clear All Formatting', 'Vào Format / Clear All Formatting', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-064', 'Trong Powerpoint 2010, thao tác nào sau đây để tạo hiệu ứng bóng mờ cho đoạn văn bản được chọn?', 'Vào Format/Text Effects/Shadow', 'Vào Home/Text Shadow', 'Vào View/Text Shadow', 'Vào Insert/Text Shadow', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-065', 'Trong PowerPoint 2010, lần lượt nhấn phím ALT, phím H, phím 1 tương ứng với tổ hợp phím nào sau đây?', 'CTRL + B', 'CTRL + I', 'CTRL + U', 'CTRL + Z', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-066', 'Trong Powerpoint 2010, cách nào để thay đổi màu nền văn bản?', 'Format/Shape Fill', 'Home/Theme Colors', 'Format/Size', 'Format/Shape Styles', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-067', 'Trong Powerpoint, đánh dấu 1 đoạn văn bản sau đó nhấn tổ hợp phím CTRL + E, thao tác này tương ứng với lựa chọn nào sau đây?', 'Canh giữa đoạn văn được chọn', 'Xóa đoạn văn được chọn', 'Sao chép đoạn văn được chọn', 'Canh trái đoạn văn được chọn', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-068', 'Trong Powerpoint, đánh dấu 1 đoạn văn bản sau đó nhấn tổ hợp phím CTRL + R, thao tác này tương ứng với lựa chọn nào sau đây?', 'Canh phải đoạn văn được chọn', 'Xóa định dạng đoạn văn được chọn', 'Canh giữa đoạn văn được chọn', 'Canh trái đoạn văn được chọn', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-069', 'Trong Powerpoint 2010, cách nào để thay đổi kiểu ký hiệu Bullet?', 'Home/Bullet', 'Insert/Bullet', 'Home/Numbering', 'Insert/ Symbol', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-070', 'Trong Powerpoint 2010, cách nào để thay đổi kiểu ký hiệu Numbering?', 'Home/Numbering', 'Home/Bullet', 'Insert/Numbering', 'Insert/Symbol', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-071', 'Trong Powerpoint 2010, cách nào để thay đổi khoảng cách dãn dòng cho danh sách?', 'Home/Paragraph', 'Insert/Paragraph', 'Home/Font', 'Home/Slides', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-072', 'Trong Powerpoint 2010, để chọn toàn bộ bảng trong Slide, ta ấn tổ hợp phím?', 'Ctrl + A', 'Ctrl + S', 'Alt + A', 'Shift + A', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-073', 'Trong Powerpoint 2010, lần lượt nhấn phím ALT, phím N, phím T tương ứng với lựa chọn nào sau đây?', 'Vào Insert /Table', 'Vào Home/Format', 'Vào Design/Page Setup', 'Vào View/Zoom', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-074', 'Trong Powerpoint 2010, cách nào để chèn bảng biểu vào Slide?', 'Insert/ Table', 'Edit/ Table', 'Format/ Table', 'Home/ Table', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-075', 'Trong PowerPoint 2010, sau khi đã chèn một bảng vào slide, muốn chia ô hiện tại thành 2 ô?', 'Nhấn chuột phải và chọn Split Cells.', 'Vào Table / Split Cells', 'Nhấn chuột trái và chọn Split Cells.', 'Vào Home / Split Cells', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-076', 'Trong Powerpoint 2010, hình dạng biểu đồ sẵn có bao gồm?', 'Dạng cột, thanh, đường, bánh tròn', 'Dạng cột ', 'Dạng cột, bánh tròn', 'Dạng thanh, đường', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-077', 'Trong Powerpoint 2010, cách nào để nhập dữ liệu vào biểu đồ sẵn có?', 'Design/Edit Data', 'Design/Chart Styles', 'Home/Edit Data', 'Format/Edit Data', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-078', 'Trong Powerpoint 2010, cách nào để chèn biểu đồ vào Slide?', 'Insert/ Chart', 'Insert/ Diagram', 'Insert/  Picture/ Organization/ Chart', 'Insert/ Video', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-079', 'Trong Powerpoint 2010, lệnh Insert/ Chart dùng để thực hiện công việc gì?', ' Chèn biểu đồ vào Slide', 'Chèn công thức toán học vào Slide', 'Chèn hình ảnh vào Slide', 'Chèn các file âm thanh vào Slide', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-080', 'Thao tác Tab Insert\\Chart có chức năng gì?', 'Chèn biểu đồ vào Slide', 'Chèn sơ đồ tổ chức vào Slide', 'Chèn hình ảnh từ vị trí bất kỳ trong máy vào Slide', 'Chèn hình ảnh từ thư viện có sẵn trong máy vào Slide', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-081', 'Trong Powerpoint 2010, cách nào để thay đổi màu nền của biểu đồ?', 'Format/Shape Fill', 'Design/Shape Fill', 'Home/Theme Colors', 'Format/Shape Styles', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-082', 'Muốn chèn sơ đồ tổ chức vào Slide ,ta thực hiện thế nào?', 'Tab Insert\\SmartArt\\ Hierarchy, chọn một dạng sơ đồ tổ chức phù hợp', 'Tab Insert\\SmartArt\\ Picture, chọn một dạng sơ đồ tổ chức phù hợp', 'Tab Insert\\Picture, sau đó chọn sơ đồ cần chèn', 'Tab Insert\\Chart, chọn một dạng sơ đồ tổ chức phù hợp', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-083', 'Trong PowerPoint 2010, để đổi chiều các hộp dữ liệu trong biểu đồ phân cấp, ta sử dụng tùy chọn nào sau đây ?', 'Right to Left', 'Left to Right', 'Top to Bottom', 'Bottom to Top', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-084', 'Trong Powerpoint 2010, cách nào để chèn file ảnh có sẵn trong máy tính vào Slide?', 'Insert/ Picture', 'Insert/ Word Art', 'Insert/ SmartArt', 'Insert/Chart', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-085', 'Trong Powerpoint 2010, cách nào để chèn hình vẽ vào Slide?', 'Insert/Shapes', 'Insert/ Equation', 'Insert/ Audio', 'Insert/ Video', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-086', 'Trong Powerpoint 2010, lệnh Insert/Shapes dùng để thực hiện công việc gì?', ' Chèn hình vẽ vào Slide', 'Chèn công thức toán học vào Slide', 'Chèn video vào Slide', 'Chèn các file âm thanh vào Slide', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-087', 'Trong Powerpoint 2010, nút lệnh ScreenShot có chức năng?', 'Chụp ảnh màn hình để chèn vào Slide', 'Chèn video vào Slide', 'Chèn hình ảnh từ vị trí bất kỳ trong máy vào Slide', 'Chèn âm thanh vào Slide', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-088', 'Trong PowerPoint 2010, lệnh nào sau đây cho phép chèn biểu tượng mặt cười Smiley Face?', 'Vào Insert / Shapes / Smiley Face', 'Vào View / Smiley Face', 'Vào Insert / Smiley Face', 'Vào View / Shapes / Smiley Face', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-089', 'Trong PowerPoint 2010, để sao chép đối tượng đối họa từ định dạng này sang định dạng khác, ta sử dụng công cụ nào sau đây ?', 'Paste Special', 'Paste Format', 'Paste All', 'Paste Painter', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-090', 'Trong PowerPoint 2010, tùy chọn Lock Aspect Ratio cho phép', 'Thay đổi kích thước ảnh nhưng giữ nguyên tỉ lệ ảnh gốc', 'Thay đổi tỉ lệ xoay 90 độ so với ban đầu', 'Khôi phục lại ảnh gốc', 'Thay đổi kích thước ảnh đồng thời biến đổi tỉ lệ ảnh gốc', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-091', 'Trong Trong PowerPoint 2010, để lật ngang ảnh, ta sử dụng tùy chọn nào sau đây ?', 'Flip Horizontal', 'Flip Vertical', 'Rotate Right 90', 'Rotate Left 90', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-092', 'Trong Powerpoint 2010, cách nào để chèn Công thức toán học vào Slide?', 'Insert/ Equation', 'Insert/ Audio', 'Insert/ Video', 'Insert/Chart', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-093', 'Trong Powerpoint 2010, lệnh Insert/ Equation dùng để thực hiện công việc gì?', 'Chèn công thức toán học vào Slide', ' Chèn biểu đồ vào Slide', 'Chèn hình ảnh vào Slide', 'Chèn các file âm thanh vào Slide', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-094', 'Trong Powerpoint 2010, cách nào để đánh số trang cho các Slide? ', 'Insert/ Slide Number', ' View/ Slide Number', 'Format/ Slide Number', 'Home/ Slide Number', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-095', 'Trong PowerPoint 2010, Chèn chữ nghệ thuật WordArt?', 'Vào Insert / WordArt', 'Vào Home / Insert WordArt', 'Vào Insert / Insert WordArt', 'Vào Slide / WordArt', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-096', 'Trong Powerpoint 2010, để tạo tiêu đề cuối trang cho slide hiện tại?', 'Insert/ Footer and Header/ Chọn Footer/ Nhập nội dung', 'Insert/ Footer and Header/ Chọn Date and Time/ Nhập nội dung', 'Insert/ Footer and Header/ Chọn Slide Number/ Nhập nội dung', 'Insert/ Footer and Header/ Chọn Slide/ Nhập nội dung', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-097', 'Trong PowerPoint 2010, để thay đổi đường viền (nét vẽ) của đối tượng, ta sử dụng tùy chọn nào sau đây ?', 'Shape Outline', 'Shape Fill', 'Shape Effects', 'Shape Position', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-098', 'Trong PowerPoint 2010, chọn phát biểu đúng ?', 'Có thể chỉnh sửa từng đối tượng sau khi gom nhóm chúng', 'Không thể chỉnh sửa từng đối tượng sau khi gom nhóm chúng', 'Có thể di chuyển  đối tượng ra khỏi nhóm bằng kéo và thả đối tượng', 'Không thể di chuyển các đối tượng sau khi gom nhóm', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-099', 'Trong PowerPoint 2010, thao tác nào để chuyển đối tượng vẽ từ lớp dưới cùng của nhiều lớp lên trên một lớp?', 'Vào Home/Arrange/Bring Forward', 'Vào Home/Arrange/Bring to Front', 'Vào Home/Arrange/Send Backward', 'Vào Home/Arrange/Sent to Back', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-100', 'Trong Powerpoint 2010, cách nào để thiết lập hiệu ứng cho văn bản, hình ảnh… ', 'Animation/ chọn hiệu ứng', 'Insert/ chọn hiệu ứng', 'File/ chọn hiệu ứng', 'Home/ chọn hiệu ứng', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-101', 'Trong chương trình MS PowerPoint, chức năng Animations dùng để làm gì?', 'Định dạng hiệu ứng cho các đối tượng trên slide.', 'Định dạng kiểu lật trang cho các slide.', 'Định dạng giao diện cho slide.', 'Định dạng kiểu chữ cho slide', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-102', 'Trong Powerpoint 2010, sau khi chèn hiệu ứng cho đối tượng trên slide, muốn hiệu ứng xuất hiện đồng thời khi trình diễn, taị mục Start ta chọn?', 'With Previous', 'After Previous', 'On Click', 'After Click', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-103', 'Trong PowerPoint 2010, hiệu ứng cho các đối tượng trên Slide gồm các nhóm nào sau đây?', 'Tất cả đều sai', 'Exit, Entrange, Emphasis', 'Motion path, Exit, Entrange', 'Motion path, Exit, Emphasis', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-104', 'Trong PowerPoint 2010, mục Effect Options của hiệu ứng chuyển đổi trang REVEAL có mấy kiểu?', '4', '5', '6', '7', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-105', 'Trong Powerpoint 2010, chọn phát biểu sai?', 'Hiệu ứng chuyển đổi các trang ORBIT thuộc nhóm Subtle', 'Vào Design / Page setup... để cài đặt trang in, khổ giấy', 'Nhấn tổ hợp phím Shift + F9 để bật hoặc tắt khung lưới Gridlines', 'Biểu tượng mặt cười Smiley Face thuộc nhóm Basic Shapes', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-106', 'Trong PowerPoint 2010, thao tác nào sau đây để chạy thử Slide hiện tại?', 'Vào Transitions / Preview', 'Vào Home / Preview', 'Vào File / Preview', 'Vào Design / Preview', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-107', 'Trong PowerPoint 2010, để thêm phần ghi chú cho trang thuyết trình, ta sử dụng kiểu hiển thị nào sau đây?', 'Notes Page và Normal', 'Notes Page và Slide Sorter', 'Notes Page và Reading View', 'Slide Sorter và Normal', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-108', 'Trong PowerPoint 2010, thao tác nào sau đây để in trang thuyết trình trên khổ giấy kiểu dọc ?', 'Vào Design/Page Setup/Orientation/Notes, Handouts and Outline/ Portrait', 'Vào Design/Page Setup/Orientation/Slide/Portrait', 'Vào Design/Slide Orientation/Portrait', 'Vào Design/Orientation/Slide/Portrait', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-109', 'Trong Powerpoint 2010, cách nào để ẩn một slide đã được chọn?', 'Slide Show/ Hide Slide', 'Edit/ Hide Slide', 'Format/ Hide Slide', 'Insert/ Hide Slide', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-110', 'Trong PowerPoint 2010, thao tác nào sau đây để bật tính năng kiểm tra chính tả ?', 'Vào Review/Spelling/Options/Check spelling as you type', 'Vào View/Spelling/Options/Check spelling as you type', 'Vào Review/Spelling/Options/Check grammar as you type', 'Vào Review/Spelling/Check spelling as you type', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-111', 'Trong phần Hyperlink ta chọn First Slide sẽ cho phép liên kết tới slide?', 'Di chuyển về Slide đầu tiên ', 'Di chuyển về Slide trước đó ', 'Di chuyển về Slide tiếp theo ', 'Di chuyển về Slide cuối cùng', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-112', 'Trong PowerPoint, tổ hợp Phím nào sau được dùng để in?', 'Ctrl + P', 'Ctrl + O', 'Ctrl + N', 'Ctrl + S', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-113', 'Trong PowerPoint 2010, để thay đổi kích cỡ của trang thuyết trình phù hợp với màn hình trình chiếu, ta sử dụng tùy chọn nào sau đây ?', 'On-screen Show', '35mm Slides', 'Overhead', 'Banner', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-114', 'Trong Powerpoint 2010, cách nào để in mỗi Slides trên một trang in?', 'File/ Print/ Settings/ 1 Slide', 'File/ Print/ Notes Page', 'File/ Print/ 2 Slides', 'File/ Print/ Outline', '', '', '', '', '', 'Khó', 'UI05'),
('UI05-115', 'Trong Powerpoint 2010, cách nào để trình diễn từ slide đầu tiên? ', 'F5', 'Shift + F5', 'Ctrl +  F5', 'Alt + F5', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-116', ' Trong Powerpoint 2010, dùng  phím nào để dừng trình diễn?   ', ' Esc', 'End', 'Home', 'Alt', '', '', '', '', '', 'Dễ', 'UI05'),
('UI05-117', 'Trong Powerpoint 2010, cách nào dùng để trình chiếu Slide?', ' Slide Show/ From Beginning', ' View/ From Beginning', ' Insert/ From Beginning', ' File/ From Beginning', '', '', '', '', '', 'Trung bình', 'UI05');
INSERT INTO `cauhoi` (`macauhoi`, `tencauhoi`, `padung`, `pasai1`, `pasai2`, `pasai3`, `imgviauTencauhoi`, `imgviauPadung`, `imgviauPasai1`, `imgviauPasai2`, `imgviauPasai3`, `mucdo`, `mabode`) VALUES
('UI05-118', 'Hãy cho biết phím tắt để trình diễn một tệp Powerpoint từ slide hiện tại?', 'Shift + F5', 'Ctrl +  F5', ' F5', 'Alt + F5', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-119', 'Khi đang trình diễn trong PowerPoint, muốn kết thúc phiên trình diễn, ta thực hiện:', 'Nháy phải chuột, rồi chọn End Show   ', 'Nháy phải chuột, rồi chọn Exit  ', 'Nháy phải chuột, rồi chọn Return', 'Nháy phải chuột, rồi chọn Screen', '', '', '', '', '', 'Trung bình', 'UI05'),
('UI05-120', 'Trong Powerpoint 2010, cách nào để di chuyển dến một Slide khác không liền kề khi đang thực hiện trình diễn?', 'Kích chuột phải tại Slide hiện hành/ chọn Go to Slide', 'Kích chuột trái  tại Slide hiện hành/ chọn Go to Slide', 'Kích đúp chuột trái tại Slide hiện hành/ chọn Go to Slide', 'Kích chuột phải tại Slide hiện hành/ chọn Move to Slide', '', '', '', '', '', 'Khó', 'UI05'),
('UI06-001', 'Internet có nghĩa là?', 'Hệ thống thông tin toàn cầu có thể được truy nhập công cộng gồm các mạng máy tính được liên kết với nhau', 'Hệ thống thông tin toàn cầu có thể được truy nhập công cộng gồm các máy tính được liên kết với nhau', 'Hệ thống thông tin toàn cầu có thể được truy nhập công cộng gồm các mạng máy tính trong một cơ quan được liên kết với nhau', 'Hệ thống thông tin toàn cầu có thể được truy nhập công cộng gồm các mạng máy tính trong một quốc gia được liên kết với nhau', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-002', 'Phát biểu nào sau đây là sai?', 'Internet là dịch vụ do công ty Internet tại Mỹ điều hành và thu phí', 'WWW là từ viết tắt của World Wide Web ', 'Chúng ta có thể đăng ký để sử dụng thư miễn phí tại địa chỉ MAIL.YAHOO.COM ', 'Thư điện tử là nền tảng cho việc xây dựng văn phòng không giấy tờ ', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-003', 'Thứ tự kết nối Internet theo đường quay số theo bạn là? ', 'Máy tính - modem - điện thoại - ISP', 'Máy tính - điện thoại - modem - ISP (Internet Service Provider) ', 'Máy tính - ISP - điện thoại - modem ', 'Máy tính - điện thoại - ISP - modem ', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-004', 'ISP là viết tắt của', 'Internet Service Provider', 'Internet Server Provider', 'Internet Super Provider', 'Không có phương án đúng', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-005', 'WWW là viết tắt của?', 'World Wide Web', 'Word Wide Wed', 'Word Wide Website', 'Word Wild Web', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-006', 'Mỗi thiết bị khi tham gia vào một mạng máy tính nào đó cũng đều có', 'Địa chỉ IP', 'Địa chỉ nhà', 'Mã sản phẩm', 'GPS', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-007', 'HTTP là gì?', 'Là giao thức truyền tải siêu văn bản', 'Là ngôn ngữ để soạn thảo nội dung các trang Web', 'Là tên của trang web', 'Là địa chỉ của trang Web', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-008', 'Địa chỉ nào không phải là địa chỉ trang web?', 'ninhbinh@yahoo.com', 'www.laodong.com.vn', 'ngoisao.net', 'mail.yahoo.com', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-009', 'Đâu là định nghĩa đúng nhất về trang Web?', 'Là trang siêu văn bản phối hợp giữa văn bản thông thường với hình ảnh, âm thanh, video và cả các mối liên kết đến các trang siêu văn bản khác', 'Là trang văn bản thông thường', 'Là trang văn bản chứa các liên kết cơ sở dữ liệu ở bên trong nó', 'Là trang văn bản chứa văn bản, hình ảnh', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-010', '"Link" trên trang web có nghĩa là?', 'Liên kết đến 1 liên kết khác', 'Liên kết đến 1 trang web khác', 'Liên kết', 'Tất cả đều đúng', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-011', 'Đây là cụm từ viết tắt của địa chỉ tài nguyên trên Internet?', 'URL (Uniform Resource Locator)', 'URL (Universe Resource Internet)', 'URL (Uniform Resource Location)', 'Tất cả các đáp án đều đúng', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-012', 'Đâu là định nghĩa siêu liên kết?', 'Dùng liên kết các tài nguyên trên Internet qua các đường link trên trang Web', 'Dùng tải các ứng dụng trên Internet xuống', 'Dùng liên kết với các tài liệu trên Internet', 'Dùng liên kết các đường dẫn trong một website', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-013', 'Thuật ngữ nào dùng để chỉ các trang tin tức trên mạng?', 'Website', 'Trình duyệt Web', 'Tên miền .net', 'Webserver', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-014', 'Internet Explorer là gì?', 'Trình duyệt web', '1 chuẩn mạng cục bộ', 'Bộ giao thức', 'Thiết bị kết nối các mạng trên Internet', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-015', 'Mozilla Firefox là gì?', 'Trình duyệt web', '1 chuẩn mạng cục bộ', 'Bộ giao thức', 'Thiết bị kết nối các mạng trên Internet', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-016', 'Google Chrome là gì?', 'Trình duyệt web', '1 chuẩn mạng cục bộ', 'Bộ giao thức', 'Thiết bị kết nối các mạng trên Internet', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-017', 'Opera là gì?', 'Trình duyệt web', '1 chuẩn mạng cục bộ', 'Bộ giao thức', 'Thiết bị kết nối các mạng trên Internet', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-018', 'Chương trình được sử dụng để xem các trang Web được gọi là gì?', 'Trình duyệt Web', 'Bộ duyệt Web', 'Chương trình xem Web', 'Phần mềm xem Web', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-019', 'Để xem một trang Web, ta cần gõ địa chỉ của trang đó vào đâu?', 'Thanh địa chỉ của trình duyệt', 'Thanh công cụ chuẩn của trình duyệt', 'Thanh liên kết của trình duyệt', 'Thanh trạng thái của trình duyệt', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-020', 'Muốn xem được trang web, máy tính của bạn cần phải cài đặt', 'Một chương trình duyệt web', 'Outlook Express ', 'MS-FronPage ', 'MS-Word ', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-021', 'Phần mềm nào sau đây không phải là trình duyệt Web', 'FireBug', 'Internet Explorer', 'Firefox', 'Chromium', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-022', 'Phát biểu nào sau là đúng về Mozilla Firefox và Chromium', 'Mozilla Firefox và Chromium là các trình duyệt web', 'Chỉ có Mozilla Firefox là trình duyệt web', 'Chỉ có Chromium là trình duyệt web', 'Mozila Firefox là trình duyệt web còn Chromium là phần mềm tìm kiếm', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-023', 'Nút nào trên thanh công cụ của trình duyệt web cho phép bạn tìm kiếm thông tin trên WWW?', 'Search', 'Home', 'Refresh', 'Next', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-024', 'Tường lửa là gì? ', 'Tường lửa là một thiết bị phần cứng và/hoặc một phần mềm hoạt động trong một môi trường máy tính nối mạng có mục đích chống lại sự xâm nhập trái phép từ Internet ', 'Một hệ thống được xây dựng để đảm bảo an ninh cho công ty', 'Một hệ thống báo cháy ', 'Một hệ thống bảo mật thông tin', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-025', 'Dấu hiệu nhận biết một website an toàn?', 'Sử dụng giao thức bảo mật để truyền tải nội dung', 'Giao diện đẹp, chức năng và menu có sắp thứ tự', 'Có logo chứng nhận bảo mật trên website', 'Có địa chỉ công ty xây dựng website', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-026', 'Trình duyệt web không thể hiển thị trang web yêu cầu, có thể do:', 'Địa chỉ truy cập không tồn tại hoặc địa chỉ truy cập bị nhà quản trị mạng ngăn không cho truy cập', 'Địa chỉ truy cập không nằm trên máy chủ của Việt Nam', 'Địa chỉ truy cập không được lưu vào bộ nhớ đệm của trình duyệt', 'Địa chỉ truy cập là một trang web cá nhân', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-027', 'Phát biểu nào dưới đây là sai? ', 'Nhấn nút BACK để đóng cửa sổ duyệt Web.', 'Mở nhiều cửa sổ duyệt web cho nhiều địa chỉ web khác nhau. ', 'Vừa mở cửa sổ duyệt web, vừa chơi game trong lúc chờ trang web xuất hiện đầy đủ nội dung. ', 'Nhấn nút REFRESH là để bắt đầu lại quá trình tải trang web từ máy phục vụ về máy cá nhân của người dùng. ', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-028', 'Các thành phần của tên miền được phân cách bằng ký tự gì?', 'Dấu “.”', 'Dấu “,”', 'Dấu “#”', 'Dấu ";"', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-029', 'Để truy cập vào một trang Web chúng ta cần phải biết:', 'Địa chỉ của trang web', 'Hệ điều hành đang sử dụng', 'Trang web đó của nước nào', 'Tất cả đều sai', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-030', 'Để truy cập vào một Website ta phải biết', 'Tên miền của Website đó', 'IP của của máy tính', 'Website đó được đặt tại máy chủ nào', 'Tất cả đều sai', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-031', 'Địa chỉ nào không phải là địa chỉ trang web?', 'ninhbinh@yahoo.com', 'www.laodong.com.vn', 'ngoisao.net', 'mail.yahoo.com', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-032', 'Trong Internet Explorer phiên bản 7 hoặc mới hơn, phím tắt để thêm một Tab?', 'Ctrl+T', 'Ctrl+N', 'Alt+N', 'Alt+H', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-033', 'Trong Internet Explorer phiên bản 7 hoặc mới hơn, phím tắt chuyển đến Tab liền kề bên trái?', 'Ctrl+Shift+Tab', 'Ctrl+Tab', 'Alt+Tab', ' Alt+Shift+Tab', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-034', 'Trong Internet Explorer phiên bản 7 hoặc mới hơn, phím tắt chuyển đến Tab liền kề bên phải?', 'Ctrl+Tab', 'Ctrl+Shift+Tab', 'Alt+Tab', ' Alt+Shift+Tab', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-035', 'Trong Internet Explorer phiên bản 7 hoặc mới hơn, phím tắt Ctrl + Tab dùng để làm gì?', 'Chuyển đến Tab liền kề bên phải', 'Thêm 1 tab mới', 'Trở về trang chủ', 'Thoát khỏi trình duyệt web', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-036', 'Trong Internet Explorer phiên bản 7 hoặc mới hơn, phím tắt để đóng một Tab?', 'Ctrl+W', 'Ctrl+Q', 'Ctrl+C', 'Ctrl+F4', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-037', 'Trong Internet Explorer phiên bản 7 hoặc mới hơn, phím tắt Ctrl + W dùng để làm gì?', 'Xóa 1 tab', 'Thêm 1 tab mới', 'Trở về trang chủ', 'Thoát khỏi trình duyệt web', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-038', 'Nút nào trên thanh công cụ của trình duyệt web cho phép tải lại một trang web?', 'Refresh', 'Home', 'Back', 'Next', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-039', 'Nút Refresh trên thanh công cụ của trình duyệt Web cho phép?', 'Tải lại một trang web', 'Đi đến một trang web khác', 'Trở về trang chủ', 'Thoát khỏi trình duyệt web', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-040', 'Để ngừng tải nội dung một trang Web từ máy chủ, kích chuột tại nút nào sau đây trong cửa sổ trình duyệt?', 'Stop', 'Disconnect', 'End', 'Start', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-041', 'Nút Stop trên cửa số trình duyệt web dùng để làm gì?', 'Ngừng tải nội dung trang Web', 'Về ttrang chủ', 'Chuyển đến một liên kết khác', 'Đóng trình duyệt Web', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-042', 'Nút nào trên thanh công cụ của trình duyệt web cho phép tải lại một trang web?', 'Refresh', 'Home', 'Back', 'Next', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-043', 'Nút Refresh trên thanh công cụ của trình duyệt Web cho phép?', 'Tải lại một trang web', 'Đi đến một trang web khác', 'Trở về trang chủ', 'Thoát khỏi trình duyệt web', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-044', 'Nút “Home” trên trang web có nghĩa là', 'Đi đến trang chủ', 'Đi đến trang trước', 'Đi đến nhà', 'Không có ý nghĩa gì, chỉ để trang trí', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-045', 'Trong quá trình sử dụng trình duyệt Firefox, muốn xóa toàn bộ lịch sử duyệt web, người dùng có thể thao tác như thế nào?', 'Vào History chọn Clear Recent History', 'Vào View chon Restore Tabs', 'Vào History chọn Recently Closed Tab', 'Vào History chọn Restore Closed Tab', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-046', 'Tin nhắn dạng pop-up có tác động', 'Không gây nguy hiểm cho hệ thống nhưng gây khó chịu cho người dùng', 'Gây nguy hiểm cho hệ thống', 'Vừa gây nguy hiểm cho hệ thống vừa gây khó chịu cho người dùng', 'Hoàn toàn không gây nguy hiểm và khó chịu cho người dùng', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-047', 'Khi đã thiết lập khóa cửa sổ pop-up của 1 trang web:', 'Bạn có thể tự thiết lập mở khóa trong trường hợp cần thiết', 'Toàn bộ pop-up của tất cả các trang web không được hiển thị', 'Bạn phải cài đặt lại trình duyệt mới hiển thị được cửa sổ pop-up', 'Bạn phải gửi thông báo tới quản trị trang web nếu muốn hiển thị lại', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-048', 'Để xem lại lịch sử duyệt web ta dùng tổ hợp phím trên trình duyệt Internet Explorer', 'Ctrl + H', 'Ctrl + L', 'Ctrl + P', 'Ctrl + M', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-049', 'Trong một trang web, Hyperlink là gì?', 'Là một thành phần trong một trang Web liên kết đến vị trí khác trên cùng trang Web đó hoặc liên kết đến một trang Web khác', 'Là nội dụng được thể hiện trên Web Browser (văn bản, âm thanh, hình ảnh)', 'Là địa chỉ của 1 trang Web', 'Tất cả đều sai', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-050', 'Nút Back trên thanh công cụ của trình duyệt Web có tác dụng gì?', 'Quay trở lại trang Web trước đó', 'Quay trở lại cửa sổ trước đó', 'Quay trở lại màn hình trước đó', 'Đi đến trang Web tiếp theo', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-051', 'Nút Forward trên thanh công cụ của trình duyệt Web có tác dụng gì?', 'Đi đến trang Web tiếp theo', 'Đi đến cửa sổ trước đó', 'Đi đến màn hình trước đó', 'Quay lại trang Web trước đó', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-052', 'Để quay lại trang web trước đó, ngoài nút “Back”, ta có thể dùng phím nào?', 'Backspace', 'Ctrl + T', 'Alt + T', 'Alt + F3', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-053', 'Nút Back trên thanh công cụ của trình duyệt Web có tác dụng gì?', 'Quay trở lại trang Web trước đó', 'Quay trở lại cửa sổ trước đó', 'Quay trở lại màn hình trước đó', 'Đi đến trang Web tiếp theo', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-054', 'Phát biểu nào sau đây là sai? ', 'Nhấn nút Back để đóng cửa sổ duyệt Web', 'Mở nhiều cửa sổ duyệt web cho nhiều địa chỉ web khác nhau', 'Vừa mở cửa sổ duyệt web, vừa chơi game trong lúc chờ trang web xuất hiện đầy đủ nội dung', 'Nhấn nút Refresh là để bắt đầu lại quá trình tải trang web từ máy phục vụ về máy cá nhân của người dùng', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-055', 'Trong trình duyệt Internet Explorer, để lưu lại địa chỉ của trang web ưa thích, ta thực hiện thao chọn?', 'Favorites/Add to Favorites', 'Edit/Favorites', 'View/Favorites', 'File/Save to Favorites', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-056', 'Xem các trang web đã đánh dấu trong trình duyệt web tại đâu? ', 'Mục Bookmark', 'Mục Favourite', 'Mục All Windows', 'Mục History', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-057', 'Trong trình duyệt Internet Explorer, để lưu lại địa chỉ của trang web ưa thích, ta thực hiện thao chọn?', 'Favorites/Add to Favorites', 'Edit/Favorites', 'View/Favorites', 'File/Save to Favorites', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-058', 'Đâu là tùy chọn cho phép lưu trang web mà không có ảnh?', 'Chọn Web page/ Html only', 'Chọn Web page/ complete', 'Chọn Text file', 'Chọn Web page/ Home', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-059', 'Đâu không phải là một thành phần của biểu mẫu (form) trên web?', 'Hộp truy cập (Asscess box)', 'Hộp văn bản (Text box)', 'Hộp danh sách (List box)', 'Hộp kiểm tra (Check box)', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-060', 'Sau khi hoàn thành một biểu mẫu trên web, cần thao tác thế nào để gửi biểu mẫu lên máy chủ?', 'Chọn Submit', 'Chọn Clear', 'Chọn Back', 'Chọn Next', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-061', 'Dịch vụ công trực tuyến là gì?', 'Là dịch vụ hành chính công và các dịch vụ khác của cơ quan nhà nước được cung cấp cho các tổ chức, cá nhân trên môi trường mạng', 'Là dịch vụ hành chính công và các dịch vụ khác của cơ quan nhà nước được cung cấp cho các tổ chức, cá nhân trong mạng nội bộ của đơn vị', 'Là dịch vụ hành chính công và các dịch vụ khác của cơ quan nhà nước được cung cấp cho doanh nghiệp trên môi trường mạng', 'Là dịch vụ hành chính công và các dịch vụ khác của cơ quan nhà nước được cung cấp cho công dân trên môi trường mạng', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-062', 'Công cụ tìm kiếm thông tin trên Internet hiện nay', 'Tất cả đều đúng', 'Google', 'Bing', 'Coccoc', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-063', 'Khách nước ngoài muốn biết được thông tin về các khách sạn tại thành phố Hà nội. Dịch vụ nào dưới đây được sử dụng: ', 'Trang web có hỗ trợ tìm kiếm thông tin Internet miễn phí như www.google.com ', 'Yahoo Mail ', 'Fax ', 'Mobiphone', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-064', 'Trên trang Web Google, để tìm các trang Web nói về cách trồng hoa Phong Lan, chúng ta nên gõ cụm từ nào là tốt nhất: ', '" trồng hoa phong lan" ', 'phong lan ', '"phonglan" ', 'phong+lan', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-065', 'Để tìm kiếm nhanh trang web nói về cách thức nuôi cá Basa, ta thực hiện:', 'Chúng ta mở trang web địa chỉ www.google.com/Nhập nội dung "cách thức nuôi cá Basa" vào ô tìm kiếm', 'Chúng ta sử dụng trang vàng Internet có trên trang web tại địa chỉ www.vnn.vn ', 'Chúng ta mở trình duyệt Web ', 'Chúng ta mở trang web địa chỉ mail.yahoo.com', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-066', 'Bạn làm thế nào để tìm ra địa chỉ của trang Web một cách nhanh nhất', 'Sử dụng công cụ tìm kiếm trên Web', 'Hỏi bạn của mình', 'Mở các liên kết tham khảo', 'Tìm trong các tập tài liệu, sách vở liên quan', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-067', 'Để tìm thông tin "Công chức" trên trang web “www.lamdong.gov.vn” ta vào google gõ từ khóa tìm kiếm nào để google trả về kết quả không có kết quả từ các trang web khác', 'Công chức SITE:lamdong.gov.vn', 'Công chức IN: lamdong.gov.vn', 'Công chức ON: lamdong.gov.vn', 'Công chức FROM:lamdong.gov.vn', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-068', 'Trang tìm kiếm Google có thể cho ra kết quả tìm kiếm theo?', 'Tất cả các đáp án trên', 'Hình ảnh', 'Video', 'Website', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-069', 'Khi muốn lưu lại trang Web đang duyệt lên máy tính, bạn phải làm thế nào trên trình duyệt Internet Explorer?', 'File/ Save As', 'File/ Edit', 'File/ Download', 'File/ Exit', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-070', 'Trong trình duyệt Internet Explorer, để lưu một bức ảnh về máy tính, ta làm như thế nào?', 'Nhấn chuột phải vào ảnh, chọn Save picture as ', 'Kích đúp vào ảnh rồi chọn Download', 'Chọn Tools/ Save picture as ', 'Hai cách a và c đều đúng', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-071', 'Phương án nào không dùng để in trang web', 'Trên thanh lệnh (Command bar), nhấn nút Print Preview', 'Trên thanh thực đơn nhấn File, chọn Print', 'Trên thanh lệnh (Command Bar), nhấn nút Print', 'Nhấn tổ hợp phím Ctrl+P', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-072', 'Khi nhấp lệnh in 1 trang web các thông tin hiển thị như tên trang web, số trang hiện tại, địa chỉ trang web, ngày tháng được điều chỉnh tại mục nào của hộp thoại?', 'Headers and Footers', 'Paper', 'Orientation', 'Margin', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-073', 'Dịch vụ thư điện tử được dùng để làm gì?', 'Trao đổi thư thông qua môi trường Internet', 'Hội thoại trực tuyến', 'Trao đổi thông tin trực tuyến', 'Tìm kiếm thông tin', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-074', 'Cấu trúc một địa chỉ thư điện tử?', '<Tên người dùng>@<Tên miền>', '<Tên miền>.<Tên người dùng>', '<Tên miền>@<Tên người dùng>', 'Tất cả đều sai', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-075', 'Điều nào sau đây là lợi thế của thư điện tử so với thư tín gửi qua đường bưu điện ', 'Tốc độ chuyển thư nhanh ', 'Có thể chuyển được lượng văn bản lớn hơn nhờ chức năng gắn kèm ', 'Thư điện tử luôn có độ an ninh cao hơn ', 'Thư điện tử luôn luôn được phân phát', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-076', 'Kí hiệu nào sau đây có thể tồn tại trong một địa chỉ Email?', 'Kí hiệu @', 'Kí hiệu %', 'Kí hiệu &', 'Kí hiệu $', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-077', 'Hai người đã tạo được tài khoản thư miễn phí tại địa chỉ MAIL.YAHOO.COM. Phát biểu nào dưới đây là sai?', 'Mật khẩu mở hộp thư của hai người này phải khác nhau. ', 'Hộp thư của cả hai đều nằm trên máy Mail Server của công ty Yahoo ', 'Hai người này buộc phải lựa chọn hai tên đăng nhập khác nhau ', 'Người này có thể mở được hộp thư của người kia và ngược lại nếu như 2 người biết tên đăng nhập và mật khẩu của nhau', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-078', 'Phát biểu nào dưới đây là sai? ', 'Thư điện tử luôn có độ tin cậy, an toàn tuyệt đối', 'Các thư từ máy gửi đến máy nhận qua Internet luôn chuyển tiếp qua máy Server của nhà cung cấp dịch vụ', 'Người sử dụng có thể tự tạo cho mình 1 tài khoản sử dụng thư điện tử miễn phí qua trang Web', 'Có thể đính kèm tệp văn bản theo thư điện tử', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-079', 'Với thư điện tử, phát biểu nào sau đây là sai? ', 'Hai người có thể có địa chỉ thư giống nhau, ví dụ hoahong@yahoo.com ', 'Có thể gửi 1 thư đến 10 địa chỉ khác nhau ', '1 người có thể gửi thư cho chính mình, nhiều lần', 'Tệp tin đính kèm theo thư có thể chứa virút, vậy nên cần kiểm tra virút trước khi sử dụng', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-080', 'Địa chỉ nào không phải là địa chỉ email?', 'vnexpress.net', 'ninhbinh@yahoo.com', 'tranvana@gmail.com', 'nguyenvanb@hanoi.gov.vn', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-081', 'Địa chỉ nào là địa chỉ email?', 'ninhbinh@yahoo.com', 'vnexpress.net', 'google.com', 'hanoi.edu.vn', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-082', 'Một người đang sử dụng dịch vụ thư điện tử miễn phí của Yahoo. Địa chỉ nào dưới đây được viết đúng?', 'alpha2005@yahoo.com', 'Alpha ', 'alpha2005@yahoo ', 'yahoo.com@alpha2005 ', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-083', 'Kí hiệu nào sau đây cần có trong một địa chỉ Email?', 'Kí hiệu @', 'Kí hiệu %', 'Kí hiệu &', 'Kí hiệu $', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-084', 'Để chặn các Email không mong muốn, thực hiện thao tác chọn Email, sau đó?', 'Kích nút Spam', 'Kích nút Delete', 'Kích nút Reply', 'Kích nút Forward', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-085', 'Các Email rác được lưu trong thư mục nào?', 'Spam', 'Draft', 'Sent', 'Inbox', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-086', 'Để tránh lây lan virus qua email, người dùng nên làm gì?', 'Tất cả đáp án (1), (2) và (3) đều đúng', 'Quét virus trước khi mở file gắn kèm trong email (1)', 'Không mở email của người lạ (2)', 'Không tải tập tin từ email khi không cần thiết (3)', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-087', 'Để soạn thảo email cần mở phần mềm nào?', 'Outlook Express', 'Microsoft Word', 'Microsoft Excel', 'Notepad', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-088', 'Email đang soạn thảo dở chưa được gửi đi sẽ được lưu tại đâu?', 'Trong thư mục Draft', 'Trong thư mục Sent', 'Trong thư mục Inbox', 'Trong thư mục Bulk', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-089', 'Để chuyển tiếp thư tới người khác, bạn sử dụng nút nào?', 'Forward', 'Reply', 'Compose', 'Attactment', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-090', 'Để soạn một thư điện tử mới, bạn chọn nút nào?', 'Compose', 'Attachment', 'Check Mail', 'Reply', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-091', 'Để trả lời ngay thư điện tử khi đang xem thư, bạn chọn nút nào?', 'Reply', 'Attachment', 'Check Mail', 'Compose', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-092', 'Tại sao cần thiết phải điền vào dòng chủ đề khi gửi thư?', 'Để cung cấp cho người nhận nội dung ngắn gọn của thư', 'Vì bạn bắt buộc phải điền vào phần đó thì mới gửi thư được', 'Để người nhận có thể nhận được thư', 'Để thư của bạn không bị nhầm địa chỉ người nhận', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-093', 'Chức năng kiểm tra chính tả và sửa lỗi chính tả của thư điện tử nằm ở phần nào?', 'Soạn thư (compose)', 'Hộp thư đến (Inbox)', 'Thư đã gửi (Sent)', 'Thư nháp (Draf)', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-094', 'Để gửi kèm một tệp với thư điện tử, bạn chọn nút nào?', 'Attachment', 'Check Mail', 'Reply', 'Compose', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-095', 'Trong khi soạn thảo email nếu muốn gởi kèm file chúng ta Nhấn vào nút?', 'attachment', 'send', 'copy', 'save', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-096', 'Email đã soạn thảo sẽ được lưu trữ trong mục nào sau đây nếu người dùng chưa bấm nút gửi thư?', 'Draft', 'Spam', 'Outbox', 'Sent', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-097', 'Muốn mở hộp thư đã lập bạn phải làm gì?', 'Cung cấp chính xác User và Password đã đăng ký cho máy chủ thư điện tử', 'Đăng ký một tài khoản thư điện tử', 'Có chương trình nhận/gửi thư điện tử', 'Cung cấp tài khoản sử dụng Internet', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-098', 'Để trả lời thư cho người gửi, bạn sử dụng nút nào?', 'Reply', 'Forward', 'Compose', 'Attactment', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-099', 'Để chuyển tiếp thư tới người khác, bạn sử dụng nút nào?', 'Forward', 'Reply', 'Compose', 'Attactment', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-100', 'Để trả lời thư cho nhiều người, bạn sử dụng nút nào?', 'Reply to all', 'Forward', 'Compose', 'Attactment', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-101', 'Chức năng lọc trong hộp thư đến không thể sắp xếp thư theo trình tự nào?', 'Sắp xếp thư theo dung lượng file đính kèm', 'Sắp xếp thư theo người gửi', 'Sắp xếp thư theo chủ đề', 'Sắp xếp thư theo ngày nhận', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-102', 'Khi dòng chủ đề trong thư bạn nhận được bắt đầu bằng chữ "RE:", thì thông thường thư đó là thư gì?', 'Thư trả lời cho thư mà bạn đã gửi cho người đó', 'Thư rác, thư quảng cáo', 'Thư mới', 'Thư của nhà cung cấp dịch vụ Email mà bạn đang sử dụng', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-103', 'Cách nhận thư điện tử đã đọc và thư điện tử chưa đọc trong hộp thư đến (Inbox) là gì?', 'Thư đã đọc in thường, thư chưa đọc in đậm', 'Thư đã đọc in đậm, thư chưa đọc in thường', 'Thư đã đọc in đậm, thư chưa đọc in nghiêng', 'Thư đã đọc in nghiêng, thư chưa đọc in đậm', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-104', 'Muốn tìm kiếm email có nguồn gốc từ địa chỉ home@hanoi-itct.edu.vn. Ta dùng cú pháp nào sau đây?', '"from:home@hanoi-itct.edu.vn"', '"to:home@hanoi-itct.edu.vn"', '"send:home@hanoi-itct.edu.vn"', '"source:home@hanoi-itct.edu.vn"', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-105', 'Đâu là thư mục không có sẵn trong tài khoản Email', 'MyEmail', 'Spam', 'Draft', 'Sent', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-106', 'Email đã soạn thảo sẽ được lưu trữ trong mục nào sau đây nếu người dùng chưa bấm nút gửi thư?', 'Draft', 'Spam', 'Outbox', 'Sent', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-107', 'Thông tin nào bắt buộc phải có trong sổ địa chỉ Email', 'Địa chỉ Email', 'Họ và tên', 'Số điện thoại', 'Địa chỉ', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-108', 'Trong khi gửi Email, để người nhận không thể biết những ai cùng nhận thư với mình ta cần điền địa chỉ email của người đó vào mục nào sau đây?', 'BCC', 'TO', 'CC', 'SEND', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-109', 'Đâu là thuật ngữ chỉ dịch vụ tin nhắn tức thời?', 'IM (Instant Messaging)', 'IM (Internet Messaging)', 'IM (Instant Message)', 'IM (Internet Message)', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-110', 'Đâu không phải là lợi ích chủ yếu của dịch vụ tin nhắn tức thời?', 'Kho lưu trữ dữ liệu lớn', 'Truyền thông thời gian thực', 'Biết rõ người liên hệ đang trực tuyến hay không', 'Gửi dữ liệu nhanh chóng', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-111', 'Khi cần trao đổi thông tin theo thời gian thực, người dùng sử dụng dịch vụ nào?', 'IM', 'SMS', 'Email khẩn', 'Blog', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-112', 'Hai người trao đổi thông tin với nhau qua ứng dụng hội thoại trong cùng một mạng cơ quan. Phát biểu nào sau đây là đúng?', 'Dữ liệu truyền từ máy đang hội thoại lên máy chủ có dịch vụ hội thoại của cơ quan và quay về máy bên kia', 'Dữ liệu đi trực tiếp giữa hai máy', 'Dữ liệu truyền không được', 'Dữ liệu truyền về máy chủ internet Việt Nam và quay về máy đang chat', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-113', 'Muốn trao đổi trực tuyến với người dùng khác trên mạng, bạn sử dụng dịch vụ gì?', 'Tán gẫu (Chat)', 'Tải tệp tin (FTP)', 'Thư điện tử (e-mail)', 'Tìm kiếm (search)', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-114', 'Facebook hay Myspace là…?', 'Trang mạng xã hội', 'Trang web của chính phủ', 'Trang viết cá nhân', 'Trang chuyên cung cấp thông tin thời sự', '', '', '', '', '', 'Khó', 'UI06'),
('UI06-115', 'Nơi cộng đồng mạng thường trao đổi gọi là gì?', 'Forum', 'Blog', 'Community', 'Portal', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-116', 'Nội dung các trang tin cá nhân (blog) bao gồm những loại dữ liệu gì?', 'Đa phương tiện', 'Chỉ chứa văn bản', 'Chỉ chứa hình ảnh', 'Chỉ chứa video, ảnh động', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-117', 'Trong các câu sau đây, câu nào sai?', 'Thương mại điện tử hoàn toàn độc lập với các hoạt động thương mại truyền thống', 'Thương mại điện tử giúp doanh nghiệp giảm chi phí và tăng hiệu quả trong quảng cáo', 'Thương mại điện tử giúp doanh nghiệp vươn ra thị trường thế giới', 'Thương mại điện tử là một khái niệm mới mẻ ở Việt Nam', '', '', '', '', '', 'Dễ', 'UI06'),
('UI06-118', 'Phương tiện điện tử được dùng phổ biến nhất là gì?', 'Thẻ tín dụng', 'Thẻ ghi nợ', 'Thẻ thông minh', 'Tiền điện tử', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-119', 'Nguyên tắc đảm bảo an toàn cho mật khẩu đối với người sử dụng khi điền thông tin, các biểu mẫu để thực hiện thanh toán khi giao dịch thương mại điện tử là gì?', 'Không dùng mật khẩu quá ngắn, mật khẩu có chứa tên người dùng, mật khẩu là những từ có nghĩa trong từ điển', 'Quy định thời gian sử dụng tối đa của mật khẩu', 'Mã hóa mật khẩu khi lưu trữ', 'Đặt mật khẩu trùng với địa chỉ email giao dịch', '', '', '', '', '', 'Trung bình', 'UI06'),
('UI06-120', 'Lựa chọn góp phần giảm thiểu rủi ro khi mua hàng trực tuyến?', 'Hãy chắc chắn rằng trang web này là an toàn và địa chỉ URL hiển thị https', 'Gửi thông tin thẻ tín dụng chỉ bằng e-mail', 'Đảm bảo cung cấp thông tin thẻ tín dụng của bạn qua điện thoại', 'Chỉ mua hàng trong giờ làm việc', '', '', '', '', '', 'Khó', 'UI06');

-- --------------------------------------------------------

--
-- Table structure for table `dethiprofile`
--

CREATE TABLE `dethiprofile` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `cauhoi` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pmucdo` tinyint(2) DEFAULT NULL,
  `soluong` tinyint(4) DEFAULT NULL,
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dethiprofile`
--

INSERT INTO `dethiprofile` (`id`, `cauhoi`, `pmucdo`, `soluong`, `mamodun`) VALUES
('MD01-0', 'UI01', 0, 1, 'MD01'),
('MD01-1', 'UI01', 1, 2, 'MD01'),
('MD01-10', 'UI04', 1, 2, 'MD01'),
('MD01-11', 'UI04', 2, 1, 'MD01'),
('MD01-12', 'UI05', 0, 1, 'MD01'),
('MD01-13', 'UI05', 1, 2, 'MD01'),
('MD01-14', 'UI05', 2, 1, 'MD01'),
('MD01-15', 'UI06', 0, 1, 'MD01'),
('MD01-16', 'UI06', 1, 2, 'MD01'),
('MD01-17', 'UI06', 2, 1, 'MD01'),
('MD01-2', 'UI01', 2, 1, 'MD01'),
('MD01-3', 'UI02', 0, 1, 'MD01'),
('MD01-4', 'UI02', 1, 2, 'MD01'),
('MD01-5', 'UI02', 2, 1, 'MD01'),
('MD01-6', 'UI03', 0, 1, 'MD01'),
('MD01-7', 'UI03', 1, 2, 'MD01'),
('MD01-8', 'UI03', 2, 2, 'MD01'),
('MD01-9', 'UI04', 0, 1, 'MD01');

-- --------------------------------------------------------

--
-- Table structure for table `dethisinh`
--

CREATE TABLE `dethisinh` (
  `sbd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `macauhoi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `socau` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `padung` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `pachon` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `temp` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diem`
--

CREATE TABLE `diem` (
  `sbd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `diem` float DEFAULT NULL,
  `socaudung` tinyint(4) DEFAULT NULL,
  `thoigianthi` timestamp NULL DEFAULT NULL,
  `timeconlai` int(11) DEFAULT NULL,
  `thoigianketthuc` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donvi`
--

CREATE TABLE `donvi` (
  `madonvi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tendonvi` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donvi`
--

INSERT INTO `donvi` (`madonvi`, `tendonvi`) VALUES
('HN', 'Hà Nội'),
('LS', 'Lạng Sơn'),
('TH', 'Thi tin học'),
('TN', 'Thái Nguyên');

-- --------------------------------------------------------

--
-- Table structure for table `hocvien`
--

CREATE TABLE `hocvien` (
  `sbd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `hodem` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ten` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ngaysinh` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noisinh` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `makythi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `madonvi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tenphongthi` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `matkhau` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `profile` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocvien`
--

INSERT INTO `hocvien` (`sbd`, `hodem`, `ten`, `ngaysinh`, `noisinh`, `makythi`, `madonvi`, `tenphongthi`, `matkhau`, `profile`) VALUES
('03X0001', 'Lê Ngọc ', 'An', '26/12/1974', 'Thanh Hóa', 'KT001', 'TH', 'Phòng 1', '420695c6f227ff98ae8f4b9e2a515bdf', NULL),
('03X0002', 'Nguyễn Tuấn ', 'Anh', '03/12/1995', 'Quảng Bình', 'KT001', 'TH', 'Phòng 1', '959a8704e39efd6da0108697bb21d261', NULL),
('03X0003', 'Phạm Thị', 'Bến', '21/03/1985', 'Hải Dương', 'KT001', 'TH', 'Phòng 1', '07b4ff298a14b69b11babe209ce2d20b', NULL),
('03X0004', 'Trần Hữu', 'Biển', '08/10/1976', 'Nam Định', 'KT001', 'TH', 'Phòng 1', '9cfecff9821f09fde72ab4cdce7bd92c', NULL),
('03X0005', 'Lê Văn', 'Bình', '22/02/1978', ' Hà Nội', 'KT001', 'TH', 'Phòng 1', 'd425d80db3bf4bb2e4402ba8812fa746', NULL),
('03X0006', 'Ngô Văn', 'Cầm', '21/08/1975', 'Hà Nội', 'KT001', 'TH', 'Phòng 1', 'b4837651ea25def86e9be687bbc7dd30', NULL),
('03X0007', 'Bùi Yến ', 'Chi', '29/01/1993', 'Hà Nội', 'KT001', 'TH', 'Phòng 1', '37be62708e55fd082436e8b017c4cb6c', NULL),
('03X0008', 'Lê Minh', 'Cường', '18/10/1976', 'Nam Định', 'KT001', 'TH', 'Phòng 1', 'a17b20eb7a344557b19db405a9643eb3', NULL),
('03X0009', 'Kiều Tuấn', 'Đạt', '09/02/1977', 'Hà Nội', 'KT001', 'TH', 'Phòng 1', '15a048b9a370b1feb847959f7d4f87a0', NULL),
('03X0010', 'Vũ Văn', 'Định', '01/01/1982', 'Hải Phòng', 'KT001', 'TH', 'Phòng 1', '35c7f81f7644b00464145b2d85823885', NULL),
('03X0011', 'Lê Ngọc', 'Du', '03/11/1983', 'Thái Bình', 'KT001', 'TH', 'Phòng 1', '88287bee47a0701c58427a8aa082a9f9', NULL),
('03X0012', 'Kim Anh', 'Dũng', '18/03/1975', 'Hà Nội', 'KT001', 'TH', 'Phòng 1', 'ed6e75666f929422dbd9bc2157cbe239', NULL),
('03X0013', 'Võ Tuấn', 'Dũng', '05/11/1977', 'Hà Tĩnh', 'KT001', 'TH', 'Phòng 1', '2fd123095c4256d50166857e4bb45278', NULL),
('03X0014', 'Trần Thị', 'Giang', '12/10/1996', '', 'KT001', 'TH', 'Phòng 1', 'b821472f0025253a75aed87eeab6dc5f', NULL),
('03X0015', 'Dương Ngọc', 'Hải', '03/09/1979', 'Hưng Yên', 'KT001', 'TH', 'Phòng 1', '328f4c846e9b9a1fbd5bd30b9ea21ddf', NULL),
('03X0016', 'Nguyễn Thị', 'Hiền', '07/07/1996', 'Hà Nội', 'KT001', 'TH', 'Phòng 1', '52a0657136f1c59a15bd02ff7ab3c1cb', NULL),
('03X0017', 'Nguyễn Thị Thu', 'Hiền', '25/11/1981', 'Hưng Yên', 'KT001', 'TH', 'Phòng 1', '8973970ecda03450e964d00b6a4eb685', NULL),
('03X0018', 'Đỗ Hữu ', 'Hoài', '11/08/1973', 'Hà Nội', 'KT001', 'TH', 'Phòng 1', 'dda326bde6756fa240e5df9bd986fa51', NULL),
('03X0019', 'Giang Thị', 'Hồng', '10/04/1977', 'Hà Nội', 'KT001', 'TH', 'Phòng 1', '5330f88d84e6915d5865cef8f86f149c', NULL),
('03X0020', 'Nguyễn Thị', 'Huế', '12/09/1979', 'Hà Nam', 'KT001', 'TH', 'Phòng 1', 'd2017ed8cab95ec6523d662415e671ef', NULL),
('03X0021', 'Nguyễn Mạnh', 'Hùng', '08/12/1961', 'Hà Nội', 'KT001', 'TH', 'Phòng 1', '5c1e642719e2d50e54e0cceec44f078f', NULL),
('03X0022', 'Trương Việt', 'Hùng', '02/03/1977', 'Hà Tĩnh', 'KT001', 'TH', 'Phòng 1', '5e02bfb506e1680e12f2b3d9ee4a855c', NULL),
('03X0023', 'Lương Tuấn', 'Hùng', '22/10/1975', 'Hà Nội', 'KT001', 'TH', 'Phòng 1', '13f1435f3db4fb22639220e4a85f29ff', NULL),
('03X0024', 'Triệu Thái', 'Hưng', '21/08/1980', 'Bắc Cạn', 'KT001', 'TH', 'Phòng 1', '93d8125ce12921af89d5099b870306eb', NULL),
('03X0025', 'Nguyễn Minh', 'Hưng', '26/10/1984', 'Hà Nội', 'KT001', 'TH', 'Phòng 1', '57de3de1e75bf0c1521a2568f06061e6', NULL),
('03X0026', 'Trần Thị', 'Hương', '24/08/1982', 'Bắc Ninh', 'KT001', 'TH', 'Phòng 1', '4ee298c87f0f3ff84d07b48a7e3783d8', NULL),
('03X0027', 'Trần Thu', 'Huyền', '26/10/1975', 'Hà Nội', 'KT001', 'TH', 'Phòng 1', '5f126b6e86941df0672aa827a42f3b4c', NULL),
('03X0028', 'Hoàng Trung ', 'Kiên', '25/06/1981', 'Phú Thọ', 'KT001', 'TH', 'Phòng 1', 'f00ac335e482169d51712b4e087e68d3', NULL),
('03X0029', 'Nguyễn Xuân', 'Long', '11/10/1976', 'Hà Nội', 'KT001', 'TH', 'Phòng 2', '7b01dbf743bacd3f0b0a75b3188e8031', NULL),
('03X0030', 'Trần Thị', 'Lý', '22/11/1981', 'Yên Bái', 'KT001', 'TH', 'Phòng 2', 'e9d7e52dbf941de1e5ac3463447d2101', NULL),
('03X0031', 'Phạm Thị Ngọc', 'Mai', '02/11/1987', 'Tuyên Quang', 'KT001', 'TH', 'Phòng 2', '7ecbc534d9a0888bfa2376e173c02d58', NULL),
('03X0032', 'Trần Hùng', 'Mạnh', '21/05/1978', 'Hưng Yên', 'KT001', 'TH', 'Phòng 2', 'ae48ef1f8895b7761fcd71b6a0fbbadb', NULL),
('03X0033', 'Phạm Văn', 'Nhâm', '04/04/1979', 'Hà Nội', 'KT001', 'TH', 'Phòng 2', '689dc2597c75088a4ca8fff8a187af8f', NULL),
('03X0034', 'Lê Thị Tuyết', 'Nhung', '04/04/1983', 'Hà Nam', 'KT001', 'TH', 'Phòng 2', 'cc852e348a450bce8d1d7602823480b4', NULL),
('03X0035', 'Lê Thị Hồng', 'Nhung', '27/06/1982', 'Hà Tĩnh', 'KT001', 'TH', 'Phòng 2', '9815979a2513907ab29037de294dd44a', NULL),
('03X0036', 'Lương Hoài ', 'Phương', '10/01/1975', 'Hà Nội', 'KT001', 'TH', 'Phòng 2', '6567e954c0227547e1bc3b0e17cfc96f', NULL),
('03X0037', 'Hoàng Vũ', 'Quang', '15/03/1972', 'Hà Nội', 'KT001', 'TH', 'Phòng 2', 'f1f2495aaaa794d0f5e0c111af41e28f', NULL),
('03X0038', 'Phạm Hồng ', 'Sơn', '12/09/1986', 'Nam Định', 'KT001', 'TH', 'Phòng 2', '84a5f58d5d924fd01ae7cc2696f0b950', NULL),
('03X0039', 'Tống Bá', 'Tân', '27/06/1979', 'Hà Nội', 'KT001', 'TH', 'Phòng 2', '4193ac407b996c8c20c10d8c189cb772', NULL),
('03X0040', 'Chu Quang', 'Thành', '04/04/1980', 'Hà Nội', 'KT001', 'TH', 'Phòng 2', 'bb4b1d10f0c2b4fb631fbc161da2b5b0', NULL),
('03X0041', 'Phạm Ngọc ', 'Thành', '12/06/1977', 'Thái Bình', 'KT001', 'TH', 'Phòng 2', '4eeb37a67008c009315af5c5d50c8234', NULL),
('03X0042', 'Bùi Công', 'Thành', '27/10/1985', 'Hưng Yên', 'KT001', 'TH', 'Phòng 2', '975ee1ea7ef2c044d7cab6a01fa1bd10', NULL),
('03X0043', 'Quách Vũ', 'Thành', '16/11/1976', 'Thái Bình', 'KT001', 'TH', 'Phòng 2', '535a41ef781f93c29618f7b67cca8839', NULL),
('03X0044', 'Nguyễn Thị ', 'Thảo', '28/03/1976', 'Hà Nội', 'KT001', 'TH', 'Phòng 2', '98239774edf05526fce5200bb23aa0f6', NULL),
('03X0045', 'Nguyễn Đức ', 'Thuận', '20/10/1987', 'Hà Nội', 'KT001', 'TH', 'Phòng 2', '891bc0bbaa9b617eff67e4de55d5492f', NULL),
('03X0046', 'Hà Văn', 'Tiệp', '10/10/1972', 'Thái Bình', 'KT001', 'TH', 'Phòng 2', 'b32352471e5133a43df2fb9d78ee667a', NULL),
('03X0047', 'Trần Thị', 'Toản ', '02/04/1974', 'Thái Nguyên', 'KT001', 'TH', 'Phòng 2', 'a4bc3dedadbbbfd7dbf7dae4d713d8ea', NULL),
('03X0048', 'Từ Thị Thu ', 'Trang', '02/04/1977', 'Hà Nội', 'KT001', 'TH', 'Phòng 2', '668b1ee5b155239050c08379282d6656', NULL),
('03X0049', 'Khúc Huyền', 'Trang', '03/11/1987', 'Hà Nội', 'KT001', 'TH', 'Phòng 2', '52a2bbdf37477977502cff993062da00', NULL),
('03X0050', 'Nguyễn Bá ', 'Triệu', '25/01/1976', 'Hà Nam', 'KT001', 'TH', 'Phòng 2', '260b4e99c502571708ab6426dfa199ef', NULL),
('03X0051', 'Ngần Đức', 'Trọng', '23/02/1977', 'Sơn La', 'KT001', 'TH', 'Phòng 2', '0ba555d4fdfd54e299e466635e33af87', NULL),
('03X0052', 'Trần Anh', 'Tuấn', '27/07/1975', 'Hưng Yên', 'KT001', 'TH', 'Phòng 2', '245a0f001e57e1db09e941a0e3f9e57b', NULL),
('03X0053', 'Phạm Quang', 'Tuyến', '03/121982', ' Nam Định', 'KT001', 'TH', 'Phòng 2', 'f8a9e7aecdc1fdeb6dc57b8eb6758b7f', NULL),
('03X0054', 'Vũ Trung ', 'Tuyến', '16/02/1975', 'Nam Định', 'KT001', 'TH', 'Phòng 2', 'b52d36b371d741e783471bb36657ca12', NULL),
('03X0055', 'Hoàng Quốc ', 'Việt', '25/12/1975', 'Nam Định', 'KT001', 'TH', 'Phòng 2', '94218751f67a77d7a477ca1df74396de', NULL),
('03X0056', 'Vũ Văn', 'Vịnh', '24/12/1993', 'Hà Nội', 'KT001', 'TH', 'Phòng 2', '77b36df355d3962ed2bc53edbc89bd7f', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kythi`
--

CREATE TABLE `kythi` (
  `makythi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tenkythi` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `tgbatdau` timestamp NULL DEFAULT NULL,
  `tgketthuc` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kythi`
--

INSERT INTO `kythi` (`makythi`, `tenkythi`, `tgbatdau`, `tgketthuc`) VALUES
('KT001', 'Cấp chứng chỉ tin học', '2016-03-11 06:00:00', '2017-03-11 11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `matkhau`
--

CREATE TABLE `matkhau` (
  `id` int(11) NOT NULL,
  `sbd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `matkhau`
--

INSERT INTO `matkhau` (`id`, `sbd`, `matkhau`) VALUES
(1, '03X0001', 'N9787637'),
(2, '03X0002', 'N8030684'),
(3, '03X0003', 'N0719514'),
(4, '03X0004', 'N4918219'),
(5, '03X0005', 'N0948986'),
(6, '03X0006', 'N8371527'),
(7, '03X0007', 'N6626794'),
(8, '03X0008', 'N5014308'),
(9, '03X0009', 'N2059558'),
(10, '03X0010', 'N9498850'),
(11, '03X0011', 'N8080769'),
(12, '03X0012', 'N6890090'),
(13, '03X0013', 'N7043972'),
(14, '03X0014', 'N7496938'),
(15, '03X0015', 'N4602957'),
(16, '03X0016', 'N2140528'),
(17, '03X0017', 'N1427463'),
(18, '03X0018', 'N6133573'),
(19, '03X0019', 'N7757339'),
(20, '03X0020', 'N2480291'),
(21, '03X0021', 'N5216568'),
(22, '03X0022', 'N4415968'),
(23, '03X0023', 'N8145341'),
(24, '03X0024', 'N3791130'),
(25, '03X0025', 'N7116493'),
(26, '03X0026', 'N3288994'),
(27, '03X0027', 'N0041764'),
(28, '03X0028', 'N5200944'),
(29, '03X0029', 'N8961896'),
(30, '03X0030', 'N0649848'),
(31, '03X0031', 'N2377007'),
(32, '03X0032', 'N3909555'),
(33, '03X0033', 'N4347862'),
(34, '03X0034', 'N0256328'),
(35, '03X0035', 'N9296069'),
(36, '03X0036', 'N8393452'),
(37, '03X0037', 'N6319179'),
(38, '03X0038', 'N9222801'),
(39, '03X0039', 'N9521258'),
(40, '03X0040', 'N4175807'),
(41, '03X0041', 'N3453802'),
(42, '03X0042', 'N1287096'),
(43, '03X0043', 'N6525565'),
(44, '03X0044', 'N2971078'),
(45, '03X0045', 'N4603729'),
(46, '03X0046', 'N3466269'),
(47, '03X0047', 'N9019317'),
(48, '03X0048', 'N7653207'),
(49, '03X0049', 'N7567845'),
(50, '03X0050', 'N8406230'),
(51, '03X0051', 'N4258586'),
(52, '03X0052', 'N0557903'),
(53, '03X0053', 'N4156898'),
(54, '03X0054', 'N4503256'),
(55, '03X0055', 'N7964507'),
(56, '03X0056', 'N6554108');

-- --------------------------------------------------------

--
-- Table structure for table `modun`
--

CREATE TABLE `modun` (
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tenmodun` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `batdau` timestamp NULL DEFAULT NULL,
  `ketthuc` timestamp NULL DEFAULT NULL,
  `makythi` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modun`
--

INSERT INTO `modun` (`mamodun`, `tenmodun`, `batdau`, `ketthuc`, `makythi`) VALUES
('MD01', 'Tin học', '2016-03-11 06:00:00', '2017-03-11 10:00:00', 'KT001');

-- --------------------------------------------------------

--
-- Table structure for table `remote`
--

CREATE TABLE `remote` (
  `sbd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ipaddress` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estatus` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblhocvien`
--

CREATE TABLE `tblhocvien` (
  `stt` tinyint(4) NOT NULL,
  `sbd` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thoigianthi`
--

CREATE TABLE `thoigianthi` (
  `mamodun` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tongcauhoi` tinyint(4) DEFAULT NULL,
  `tgthi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thoigianthi`
--

INSERT INTO `thoigianthi` (`mamodun`, `tongcauhoi`, `tgthi`) VALUES
('MD01', 25, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`maadmin`);

--
-- Indexes for table `allowexam`
--
ALTER TABLE `allowexam`
  ADD PRIMARY KEY (`sbd`,`mamodun`),
  ADD KEY `mamodun` (`mamodun`);

--
-- Indexes for table `bode`
--
ALTER TABLE `bode`
  ADD PRIMARY KEY (`mabode`),
  ADD KEY `mamodun` (`mamodun`);

--
-- Indexes for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`macauhoi`),
  ADD KEY `mabode` (`mabode`);

--
-- Indexes for table `dethiprofile`
--
ALTER TABLE `dethiprofile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mamodun` (`mamodun`);

--
-- Indexes for table `dethisinh`
--
ALTER TABLE `dethisinh`
  ADD PRIMARY KEY (`sbd`,`macauhoi`),
  ADD KEY `macauhoi` (`macauhoi`),
  ADD KEY `mamodun` (`mamodun`);

--
-- Indexes for table `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`sbd`,`mamodun`),
  ADD KEY `mamodun` (`mamodun`);

--
-- Indexes for table `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`madonvi`);

--
-- Indexes for table `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`sbd`),
  ADD KEY `makythi` (`makythi`),
  ADD KEY `madonvi` (`madonvi`),
  ADD KEY `maphongthi` (`tenphongthi`);

--
-- Indexes for table `kythi`
--
ALTER TABLE `kythi`
  ADD PRIMARY KEY (`makythi`);

--
-- Indexes for table `matkhau`
--
ALTER TABLE `matkhau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sbd` (`sbd`);

--
-- Indexes for table `modun`
--
ALTER TABLE `modun`
  ADD PRIMARY KEY (`mamodun`),
  ADD KEY `makythi` (`makythi`);

--
-- Indexes for table `remote`
--
ALTER TABLE `remote`
  ADD PRIMARY KEY (`sbd`,`mamodun`),
  ADD KEY `mamodun` (`mamodun`);

--
-- Indexes for table `tblhocvien`
--
ALTER TABLE `tblhocvien`
  ADD PRIMARY KEY (`stt`);

--
-- Indexes for table `thoigianthi`
--
ALTER TABLE `thoigianthi`
  ADD PRIMARY KEY (`mamodun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matkhau`
--
ALTER TABLE `matkhau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tblhocvien`
--
ALTER TABLE `tblhocvien`
  MODIFY `stt` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `allowexam`
--
ALTER TABLE `allowexam`
  ADD CONSTRAINT `allowexam_ibfk_1` FOREIGN KEY (`sbd`) REFERENCES `hocvien` (`sbd`) ON UPDATE CASCADE,
  ADD CONSTRAINT `allowexam_ibfk_2` FOREIGN KEY (`mamodun`) REFERENCES `modun` (`mamodun`) ON UPDATE CASCADE;

--
-- Constraints for table `bode`
--
ALTER TABLE `bode`
  ADD CONSTRAINT `bode_ibfk_1` FOREIGN KEY (`mamodun`) REFERENCES `modun` (`mamodun`);

--
-- Constraints for table `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD CONSTRAINT `cauhoi_ibfk_1` FOREIGN KEY (`mabode`) REFERENCES `bode` (`mabode`) ON UPDATE CASCADE;

--
-- Constraints for table `dethiprofile`
--
ALTER TABLE `dethiprofile`
  ADD CONSTRAINT `dethiprofile_ibfk_1` FOREIGN KEY (`mamodun`) REFERENCES `modun` (`mamodun`);

--
-- Constraints for table `dethisinh`
--
ALTER TABLE `dethisinh`
  ADD CONSTRAINT `dethisinh_ibfk_1` FOREIGN KEY (`sbd`) REFERENCES `hocvien` (`sbd`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dethisinh_ibfk_2` FOREIGN KEY (`macauhoi`) REFERENCES `cauhoi` (`macauhoi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `dethisinh_ibfk_3` FOREIGN KEY (`mamodun`) REFERENCES `modun` (`mamodun`) ON UPDATE CASCADE;

--
-- Constraints for table `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_ibfk_1` FOREIGN KEY (`mamodun`) REFERENCES `modun` (`mamodun`) ON UPDATE CASCADE,
  ADD CONSTRAINT `diem_ibfk_2` FOREIGN KEY (`sbd`) REFERENCES `hocvien` (`sbd`);

--
-- Constraints for table `hocvien`
--
ALTER TABLE `hocvien`
  ADD CONSTRAINT `hocvien_ibfk_1` FOREIGN KEY (`makythi`) REFERENCES `kythi` (`makythi`) ON UPDATE CASCADE,
  ADD CONSTRAINT `hocvien_ibfk_2` FOREIGN KEY (`madonvi`) REFERENCES `donvi` (`madonvi`) ON UPDATE CASCADE;

--
-- Constraints for table `matkhau`
--
ALTER TABLE `matkhau`
  ADD CONSTRAINT `matkhau_ibfk_1` FOREIGN KEY (`sbd`) REFERENCES `hocvien` (`sbd`) ON UPDATE CASCADE;

--
-- Constraints for table `modun`
--
ALTER TABLE `modun`
  ADD CONSTRAINT `modun_ibfk_1` FOREIGN KEY (`makythi`) REFERENCES `kythi` (`makythi`);

--
-- Constraints for table `remote`
--
ALTER TABLE `remote`
  ADD CONSTRAINT `remote_ibfk_1` FOREIGN KEY (`sbd`) REFERENCES `hocvien` (`sbd`) ON UPDATE CASCADE,
  ADD CONSTRAINT `remote_ibfk_2` FOREIGN KEY (`mamodun`) REFERENCES `modun` (`mamodun`) ON UPDATE CASCADE;

--
-- Constraints for table `thoigianthi`
--
ALTER TABLE `thoigianthi`
  ADD CONSTRAINT `thoigianthi_ibfk_1` FOREIGN KEY (`mamodun`) REFERENCES `modun` (`mamodun`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
