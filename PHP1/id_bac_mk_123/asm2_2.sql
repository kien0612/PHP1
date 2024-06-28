-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 01, 2023 lúc 08:22 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asm2_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`acc_id`, `user`, `pass`) VALUES
(1, 'bac', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` text NOT NULL,
  `news_images` text NOT NULL,
  `news_intro` text NOT NULL,
  `news_content` text NOT NULL,
  `news_author` text NOT NULL,
  `news_time` date NOT NULL,
  `news_cateID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_images`, `news_intro`, `news_content`, `news_author`, `news_time`, `news_cateID`) VALUES
(3, '\"GIẢI PHẪU\" GIÀY VULCANIZED', 'news_1.jpg', '', 'Trước khi thực hiện cuộc \"giải phẫu\" như tiêu đề của bài viết, chúng tôi nghĩ bạn cần biết rằng những đôi giày Sneaker bạn trên chân mỗi ngày hiện tại đang được chia làm 2 nhóm chính nếu phân loại chúng dựa trên phương pháp sản xuất:\r\n\r\n- Nhóm thứ nhất là Cold Cement Sneaker bao gồm những mẫu Sneaker được làm từ phương pháp dán đế lạnh - đại diện cho nhóm này là những đôi giày \"ai cũng biết\" như Nike Air Force 1, Adidas Originals Stan Smith, Puma Suede, Asics Onitsuka Tiger Corsair,..hay những đôi giày Sportswear phục vụ cho các hoạt động thể thao.\r\n- Nhóm thứ hai là Vulcanized Sneaker hay còn gọi giày cao su lưu hóa. Đây là những đôi giày mang form dáng classic, tối giản đã trở nên \"bất hủ\" với phương pháp sản xuất đã có từ rất lâu như Converse Chuck Taylor All Star, Vans Old Skool...và những đôi giày thuộc các dòng Basas, Vintas, Urbas từ Ananas hiện tại các bạn đang chọn lựa.\r\n\r\nMỗi nhóm giày lại mang một ưu, nhược điểm khác nhau tuỳ theo sự lựa chọn của mỗi người. Trong phạm vi ngắn của bài viết này, Ananas xin phép chỉ đào sâu thông tin xoay quanh cấu tạo của Vulcanized Sneaker (giày Vulcanized) - loại giày mà chúng tôi đã chọn làm \"cốt lõi\" để theo đuổi trong suốt hành trình của mình và \"mách\" cho bạn cách dễ nhất để phân biệt chúng với nhóm còn lại.', 'admin', '2023-07-25', 1),
(4, 'SNEAKER FEST VIETNAM VÀ SỰ KẾT HỢP', 'news_2.jpg', '', 'Có mặt tại Sneaker Fest Vietnam 2019, Ananas hân hạnh giới thiệu đến bạn một phát hành mang tên Ananas Peeping Pattas - bản collab giới hạn đặc biệt đánh dấu cho lần đầu hợp tác giữa hai bên. Dáng giày Vulcanized High Top của Ananas được lựa chọn trong thiết kế và cảm hứng bắt nguồn từ linh vật Peeping - đại diện cho tinh thần xuyên suốt 6 năm qua của Sneaker Fest Vietnam, chúng tôi tự tin đây sẽ là sản phẩm đáng mong chờ cho mọi “đầu giày” vào mùa hè 2019 này.', 'admin2', '2023-07-17', 2),
(5, 'URBAS CORLURAY PACK', 'news_3.jpg', '', 'Hẳn mọi người đã không mấy xa lạ với chất liệu Corduroy - Nhung gân với các sợi nổi trên bề mặt cùng tính chất bền bỉ, đa dụng và ấm áp. Đặc biệt, tên gọi khác của loại vải Corduroy sợi to (3-8 sợi/inch) - Elephant Cord được chúng tôi cố tình cho xuất hiện cầu kỳ trên tất cả các phối màu của bộ sản phẩm nhằm nhấn mạnh và tạo ấn tượng với việc lần đầu tiên ứng dụng loại vải khác trên phần Upper.', 'admin3', '2023-07-13', 2),
(6, 'VINTAS SAIGON 1980s', 'news_4.jpg', '', 'Với cảm hứng từ hình ảnh mang \"màu film\" của đường phố Sài Gòn, nét riêng của Vintas Saigon 1980s Pack nổi bật qua đặc điểm: không “nét căng”, không rực rỡ mà lại thiên về sắc xanh, đỏ nhiều cảm xúc. Cụ thể, những màu sắc như Dark Denim, Vin Black, Sedona Sage và Vin Cordovan được ứng dụng trong thiết kế đều là những màu bạn dễ dàng bắt gặp khi tìm đọc các tài liệu về Sài Gòn trong quá khứ. Trên dáng giày Low Top / High Top cơ bản, cảm giác hoài niệm mà Vintas Saigon 1980s mang lại gợi người ta nhớ về hình bóng của Sài Gòn vào những năm “1900 hồi đó”. Gam màu trầm của Upper khi sử dụng chất liệu Canvas dày dặn phối cùng Suede, cộng thêm sự chắc chắn của chiếc đế cao su (vulcanized) màu gum tự nhiên, 5 lựa chọn thuộc Vintas Saigon 1980s Pack tạo nên một bức tranh hoài cổ, thể hiện sự điềm đạm trong tính cách người mang.\r\n', 'admin4', '2023-07-25', 2),
(7, '10 Cách chăm sóc giày của bạn luôn mới', 'news_5.jpg', '', '1. GIỮ GIÀY KHÔ THOÁNG\r\nNên giữ giày tránh xa ẩm ướt vì hơi ẩm có thể gây ra vu khuẩn có hại khiến chất liệu giày dễ hỏng, hơn nữa là gây mùi khó chịu. Nên sử dụng những túi hút ẩm đặt bên trong giày, hoặc có thể nhét giấy báo vào bên trong giày và thay chúng mỗi tuần để ngăn ngừa giày ẩm mốc.\r\n\r\n2. GIỮ GIÀY ÍT BÁM BỤI\r\nBạn ít đi một đôi giày không có nghĩa là không làm sạch nó, bụi bám nhiều trên giày có thể làm ảnh hưởng đến màu sắc và trông cũ kỹ. Để đôi giày luôn mới hãy luôn trang bị một cái bàn chải lông mềm để lâu lâu lấy ra vệ sinh sạch bụi. Ngoài ra hãy giữ giày bạn tránh ở dưới nền nhà nơi thường xuyên để giày dép đi hàng ngày. Nơi tốt nhất để bảo quản là cho chúng nằm gọn trong tủ giày.\r\n\r\n3. LUÔN LUÔN CÓ SHOE-TREE\r\nMột món đồ không thể thiếu cho giày, cho bất cứ loại giày nào - vì khi bạn không đi chỉ có shoes-tree mới giúp đảm bảo hình dạng, form giày được phục hồi. Tốt nhất nên đầu tư cây shoes-tree bằng gỗ để giúp hút ẩm tốt, khô thoáng và khử mùi.\r\n\r\n4. TRÁNH ÁNH NẮNG TRỰC TIẾP\r\nNhiệt độ bảo quản cao hoặc ánh sáng mặt trời trực tiếp cực kỳ hại cho bề mặt giày, có thể làm chúng cứng lại gây ra nứt nẻ, biến dạng. Nên giữ giày yêu trong môi trường mát mẻ khi không mang.\r\n\r\n5. KHÔNG NÊN SỬ DỤNG HỘP NHỰA\r\nBạn thường xem những quảng cáo về hộp giày thông minh, đa phần làm bằng nhựa hoặc từ bìa nhựa, tuy nhiên những chiếc hộp này tương đối kín, việc nhét một đôi giày vào đó rất dễ bí hơi tạo môi trưởng ẩm thấp cho nấm mốc phát triển và gây mùi khó chịu. Do dó, nếu không đầu tư được một tủ giày thì bạn có thể bảo quản trong túi vải thông thoáng sẽ tốt hơn cho giày.\r\n\r\n', 'admin', '2023-07-28', 3),
(8, '15 cách buộc dây giày đẹp \"chất lừ\", làm mới phong cách mỗi ngày của bạn', 'news_6.jpg', '', '1. Buộc giày ziczag theo Mỹ (kiểu xương cá)\r\nĐây là cách buộc dây giày phổ biến nhất thường được ứng dụng cho hầu hết các mẫu giày sneaker từ các thương hiệu lớn như Nike, FitFlop, Tommy Hilfiger...\r\n\r\nĐể cột được kiểu dây giày này cũng khá đơn giản:\r\n\r\nBước 1: Bắt đầu bằng cách luồn dây giày từ trên xuống qua lỗ xỏ của hàng ngang đầu tiên phía mũi giày.\r\n\r\nBước 2: Xỏ ziczag chéo dây sang bên đối diện như hình. Để dây giày đều và đẹp bạn hãy để dây bên trái luôn nằm trên dây phía bên phải.\r\n\r\nBước 3: Khi xỏ đến lỗ cuối cùng, hãy cố định dây giày bằng kiểu nút thắt ưa thích là xong!\r\n\r\n2. Buộc thẳng kiểu châu Âu\r\nKiểu buộc dây giày này thường được ứng dụng trên giày Tây lẫn cả giày sneaker nam. Kiểu sáng khi hoàn thành là các đường thẳng được nằm ở ngoài và các đường chéo nằm bên trong nối tiếp nhau khá độc đáo và sang trọng.\r\n\r\nCách thắt giày tây sang trọng kiểu châu Âu:\r\n\r\nBước 1: Luồn thẳng dây qua lỗ xỏ đầu tiên theo hướng từ trên xuống.\r\n\r\nBước 2: Luồn dây bên phải qua lỗ xỏ thứ 2 bên trái từ dưới lên trên. Sau đó xỏ ngang qua lỗ bên phải thứ 2 theo hướng từ trên xuống.\r\n\r\nBước 3: Luồn dây bên trái từ dưới lên qua lỗ xỏ thứ 3 bên phải. Sau đó xỏ ngang qua lỗ thứ 3 bên trái theo hướng từ trên xuống.\r\n\r\nBước 4: Tiếp tục đan chéo như hình đến lỗ xỏ cuối cùng.', 'admin3', '2023-07-28', 3),
(9, 'Hướng dẫn chọn size giày chuẩn phù hợp với mọi đôi chân', 'news_7.jpg', '', 'Bước 1 Chuẩn bị vật dụng cần thiết\r\n1 cây thước\r\n1 tờ giấy trắng, lưu ý là kích thước phải lớn hơn chân\r\n1 cây bút\r\n1 đôi tất chân\r\n\r\nBước 2 Cố định kích thước chân trên giấy\r\nBạn dùng đôi chân vừa mang tất dẫm thật mạnh lên tờ giấy và giữ chắc để cố định bàn chân. Sau đó dùng bút chì vẽ theo khung bàn\r\n\r\nBước 3 Đo chiều dài chân\r\nSau khi vẽ được khung tổng thể của bàn chân, bạn dùng bút chấm hai điểm ở đầu ngón chân và hai điểm ở cuối gót chân. Dùng thước đo lại chiều dài của hai điểm này.', 'admin', '2023-07-26', 3),
(10, 'CÁC MẸO GIỮ CHO ĐÔI GIÀY LUÔN ĐƯỢC THƠM THO', 'news_8.jpg', '', 'Giày là vật dụng không thể thiếu trong cuộc sống hằng ngày. Do vậy không thể tránh được những lúc giày bị hôi, có mùi khó chịu.. Điều đó chẳng những làm bạn mất tự tin khi mang đôi giày mà chắc chắn còn làm mất đi sự thoải mái.Vậy làm thế nào để có đucợ một đôi giày thật thơm tho, Myshoes sẽ bật mí cho bạn ngay sau đây nhé.\r\n\r\n1. Làm khô giày trước ánh nắng mặt trời hoặc lò sưởi\r\n\r\nNếu trong ngày hôm đó bạn đi dưới trời mưa hoặc làm ướt giày thì cách tốt nhất để giảm bớt mùi hôi đi đó là bạn nên phơi chúng dưới ánh nắng\r\n\r\n mặt trời, tháo dây giày ra, kéo lưỡi gà của giày lên để giày khô nhanh hơn. Giữ đôi giày của mình khô ráo là bạn đã góp phần hạn chế sự sinh sôi của vi khuẩn - nguyên nhân chính gây nên mùi hôi khó chịu.\r\n\r\n2. Tận dụng vỏ của quả cam, quýt\r\nNgoài công dụng xua đuổi côn trùng, muỗi thì vỏ cam, quýt còn là cách khử mùi hôi giày cực kỳ hữu ích. Ngay khi giày được giặt sạch và phơi khô, bạn chỉ cần bỏ vỏ cam, quýt vào bên trong giày. Nếu không kịp chuẩn bị hai loại vỏ trên, bạn có thể thay bằng vỏ chanh. Công dụng khử mùi hôi giày bằng vỏ chanh cũng tương tự như vỏ cam và quýt.', 'admin2', '2023-07-26', 3),
(11, '7 CÁCH BẢO QUẢN GIÀY TRẮNG LUÔN NHƯ MỚI', 'news_9.jpg', '', 'Bảo quản giày trong hộp khi không sử dụng\r\nNhắc đến bảo quản giày thì chắc chắn không thể bỏ qua hộp đựng giày tiện lợi. Đây là một vũ khí vô cùng lợi hại giúp bảo vệ giày khỏi bụi bẩn.\r\n\r\nBạn lưu ý trước khi cho giày vào hộp, hãy nhét một ít giấy báo vụn vào trong lòng giày để giữ form cho giày, lót thêm giấy khô để hút bớt hơi ẩm trong giày. Tốt nhất là nên cho túi hút ẩm vào trong giày hoặc hộp đựng giày của mình.\r\n\r\n\r\nCất giày trong hộp đựng giày để bảo quản giày khỏi bụi bẩn\r\nBảo quản giày trên kệ thoáng mát\r\nMột lựa chọn khác để bảo quản giày là để giày trên các kệ thoáng mát. Nếu bạn mang giày về nhà và để chúng trên sàn, giày sẽ trở nên nhão và mau bám bụi.\r\n\r\nVì vậy, đối với những đôi giày bạn thường xuyên đi thì hãy đặt chúng ở trên kệ để bảo quản giày. Điều này giúp giữ cho đế giày luôn mới và giảm thiếu tình trạng giày có mùi. Lưu ý tuyệt đối không để giày ở nơi ẩm thấp,, đối diện gương kính và cửa ra vào.\r\n\r\n\r\nĐặt những đôi giày thường xuyên sử dụng trên kệ thoáng mát\r\nKhông để giày tiếp xúc trực tiếp với ánh sáng mặt trời\r\nMột trong những cách bảo quản giày thể thao trắng là không để giày trực tiếp dưới ánh nắng mặt trời, nhất là khi trời nắng nóng. Đối với giày màu, ánh nắng sẽ khiến giày nhanh bị bạc màu, còn đối với giày trắng, ánh nắng mạnh dễ khiến giày bị ố vàng. Do đó, hãy nhớ luôn để giày ở nơi khô ráo, và tất nhiên, không được phơi giày khi có ánh nắng gay gắt. Tốt nhất là hãy hạn chế đi giày trong thời tiết nắng nóng.\r\n\r\n\r\nKhông phơi giày trắng dưới nắng để bảo quản giày khỏi ố vàng\r\nKhông giặt giày trắng bằng máy giặt\r\nNhiều người có thói quen cho giày vào máy giặt để vắt khô phơi nhanh khô hơn. Nhưng giày trắng hay bất kể đôi giày nào cũng không được vì lười tiện mà bỏ chúng vào máy giặt.\r\n\r\nCách bảo quản giày trắng sai lầm này tác hại đầu tiên khiến cho giày mất đi form ban đầu của nó. Hơn nữa, khiến vải giày bị sờn, dễ bị xù nhìn rất mất thẩm mỹ. không kể khi giặt giày vào máy giặt sẽ khiến giày bị cứng khiến bạn đi chật hơn. Từ đó độ bền giảm xuống, bạn sẽ phải sớm chia tay với đôi giày nếu vẫn cứ lười như vậy.', 'admin3', '2023-07-27', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_cate`
--

CREATE TABLE `news_cate` (
  `news_cateID` int(11) NOT NULL,
  `news_cateName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news_cate`
--

INSERT INTO `news_cate` (`news_cateID`, `news_cateName`) VALUES
(1, 'Tin nổi bật'),
(2, 'Tin mới cập nhật'),
(3, 'Mẹo hữu ích');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `product_images` text NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_infor` text NOT NULL,
  `product_cateID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_images`, `product_price`, `product_quantity`, `product_infor`, `product_cateID`) VALUES
(3, 'TRACK 6 2.BLUES - LOW TOP - NAVY BLUE', 'TRACK 6 2.BLUES - LOW TOP - NAVY BLUE.jpeg', 900000, 100, '', 3),
(4, 'TRACK 6 JAZICO - LOW TOP - ROYAL WHITE', 'TRACK 6 JAZICO - LOW TOP - ROYAL WHITE.jpeg', 800000, 70, '', 3),
(5, 'TRACK 6 2.BLUES - LOW TOP - BLUEWASH', 'TRACK 6 2.BLUES - LOW TOP - BLUEWASH.jpeg', 1290000, 50, '', 3),
(6, 'BASAS SIMPLE LIFE NE - LOW TOP - BLACK', 'BASAS SIMPLE LIFE NE - LOW TOP - BLACK.jpg', 490000, 100, '', 4),
(8, 'URBAS IRRELEVANT NE - LOW TOP', 'URBAS IRRELEVANT NE - LOW TOP.jpg', 650000, 100, 'Từ tinh thần sáng tạo ngẫu hứng, Urbas Irrelevant lắp ghép các mảng sắc tách biệt để tạo nên diện mạo tổng thể tương phản cá tính. Thiết kế có chút thay đổi trong chi tiết và sử dụng chất vải canvas NE để tạo nên bản nâng cấp so với phiên bản cũ, đem lại cảm giác lên chân tự tin trong mọi trải nghiệm “bay nhảy” thường ngày.', 4),
(9, 'URBAS IRRELEVANT NE - LOW TOP - ANTARCTICA', 'URBAS IRRELEVANT NE - LOW TOP - ANTARCTICA.jpg', 650000, 50, 'Từ tinh thần sáng tạo ngẫu hứng, Urbas Irrelevant lắp ghép các mảng sắc tách biệt để tạo nên diện mạo tổng thể tương phản cá tính. Thiết kế có chút thay đổi trong chi tiết và sử dụng chất vải canvas NE để tạo nên bản nâng cấp so với phiên bản cũ, đem lại cảm giác lên chân tự tin trong mọi trải nghiệm “bay nhảy” thường ngày.', 4),
(10, 'VINTAS MONOGUSO - LOW TOP - MOONBEAM', 'VINTAS MONOGUSO - LOW TOP - MOONBEAM.jpeg', 720000, 100, 'Thiết kế mới Vintas Monoguso mang đến âm hưởng của những nét đẹp cổ điển không tuổi. Sử dụng chất liệu Heavy Canvas sợi lớn dày dặn-nhân đôi, đặc biệt bền bỉ theo thời gian; viền giày được bọc lớp da “bề mặt” (Full Grain Leather) cho cảm giác cổ điển hơn. Điểm nhấn màu sắc từ chất liệu Suede (da lộn) tại lưỡi gà-gót giày tăng vẻ ấn tượng trên nền màu nhã nhặn tổng thể. Vintas Monoguso chính là lựa chọn sở hữu diện mạo đủ chất “cũ” nhưng đầy mới lạ khi lên chân.', 4),
(11, 'URBAS UNSETTLING - LOW TOP - INSIGNIA', 'URBAS UNSETTLING - LOW TOP - INSIGNIA.jpg', 800000, 100, '', 4),
(12, 'VINTAS BLEACHED SAND NE - LOW TOP - BEACHED SAND', 'VINTAS BLEACHED SAND NE - LOW TOP - BEACHED SAND.jpg', 72000, 100, '', 4),
(13, 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE', 'BASAS BUMPER GUM EXT NE - LOW TOP - OFFWHITE.jpg', 500000, 100, '', 4),
(14, 'URBAS LEGO - LOW TOP - DEEP MIMOSA', 'URBAS LEGO - LOW TOP - DEEP MIMOSA.jpg', 900000, 200, '', 4),
(15, 'BASAS WORKADAY - HIGH TOP - REAL TEAL', 'BASAS WORKADAY - HIGH TOP - REAL TEAL.jpg', 650000, 150, '', 4),
(16, 'BASAS EVERGREEN - HIGH TOP - EVERGREEN', 'BASAS EVERGREEN - HIGH TOP - EVERGREEN.jpg', 650000, 50, '', 4),
(17, 'BASAS WORKADAY - HIGH TOP - BLACK', 'BASAS WORKADAY - HIGH TOP - BLACK.jpg', 720000, 40, '', 4),
(18, 'BASAS BUMPER GUM EXT NE - HIGH TOP - BLACK', 'BASAS BUMPER GUM EXT NE - HIGH TOP - BLACK.jpg', 720000, 120, '', 4),
(19, 'URBAS SC - LOW TOP - ALOE WASH', 'URBAS SC - LOW TOP - ALOE WASH.jpg', 620000, 50, '', 5),
(20, 'URBAS SC - MULE - DUSTY BLUE', 'URBAS SC - MULE - DUSTY BLUE.jpg', 620000, 100, '', 5),
(21, 'URBAS SC - LOW TOP - FAIR ORCHID', 'URBAS SC - LOW TOP - FAIR ORCHID.jpg', 620000, 100, '', 5),
(22, 'URBAS SC - MULE - CORNSILK', 'URBAS SC - MULE - CORNSILK.jpg', 620000, 100, '', 5),
(23, 'VINTAS SAIGON 1980S - HIGH TOP - DARK DENIM', 'VINTAS SAIGON 1980S - HIGH TOP - DARK DENIM.jpg', 520000, 100, '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_cate`
--

CREATE TABLE `product_cate` (
  `product_cateID` int(11) NOT NULL,
  `product_cateName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_cate`
--

INSERT INTO `product_cate` (`product_cateID`, `product_cateName`) VALUES
(1, 'nam'),
(2, 'nữ'),
(3, 'sản phẩm mới'),
(4, 'Sản phẩm bán chạy'),
(5, 'Sản phẩm giảm giá');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Chỉ mục cho bảng `news_cate`
--
ALTER TABLE `news_cate`
  ADD PRIMARY KEY (`news_cateID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `product_cate`
--
ALTER TABLE `product_cate`
  ADD PRIMARY KEY (`product_cateID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `news_cate`
--
ALTER TABLE `news_cate`
  MODIFY `news_cateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `product_cate`
--
ALTER TABLE `product_cate`
  MODIFY `product_cateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
