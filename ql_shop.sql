-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 18, 2021 lúc 06:13 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_binhluan`
--

CREATE TABLE `tb_binhluan` (
  `Id` int(11) NOT NULL,
  `Id_sp` int(11) NOT NULL,
  `Id_kh` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Binh_luan` varchar(255) NOT NULL,
  `Anh_bl` varchar(100) NOT NULL DEFAULT '',
  `Ngay` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_binhluan`
--

INSERT INTO `tb_binhluan` (`Id`, `Id_sp`, `Id_kh`, `Username`, `Binh_luan`, `Anh_bl`, `Ngay`) VALUES
(97, 82, 69, 'admin', 'Bệnh nhân được lấy lại mẫu và chuyển sang Bệnh viện Đống Đa theo dõi sức khỏe. Đêm 16/7 có kết quả xét nghiệm RT-PCR dương tính với SARS-CoV-2 (Bệnh viện Hồng Ngọc thực hiện) Bệnh nhân được lấy lại mẫu và chuyển sang Bệnh viện Đống Đa theo dõi sức kh', '', '2021-07-17 14:49:55'),
(98, 82, 69, 'admin', 'Bệnh nhân được lấy lại mẫu và chuyển sang Bệnh viện Đống Đa theo dõi sức khỏe. Đêm 16/7 có kết quả xét nghiệm RT-PCR dương tính với SARS-CoV-2 (Bệnh viện Hồng Ngọc thực hiện) Bệnh nhân được lấy lại mẫu và chuyển sang Bệnh viện Đống Đa theo dõi sức kh', '', '2021-07-17 14:49:58'),
(99, 82, 69, 'admin', 'Không như ảnh', '71bmukMiAEL._AC_SL1500_.jpg', '2021-07-17 14:50:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_ct_ddh`
--

CREATE TABLE `tb_ct_ddh` (
  `Id` int(11) NOT NULL,
  `Id_dh` int(11) NOT NULL,
  `Id_sp` int(11) NOT NULL,
  `Gia_ban_sp` int(200) NOT NULL,
  `Khuyen_mai` int(100) NOT NULL,
  `So_luong` int(11) NOT NULL,
  `Thanh_tien` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_ct_ddh`
--

INSERT INTO `tb_ct_ddh` (`Id`, `Id_dh`, `Id_sp`, `Gia_ban_sp`, `Khuyen_mai`, `So_luong`, `Thanh_tien`) VALUES
(326, 206, 55, 26000000, 9, 1, 23660000),
(327, 207, 55, 26000000, 9, 1, 23660000),
(328, 207, 56, 21000000, 10, 1, 18900000),
(329, 207, 55, 26000000, 9, 1, 23660000),
(330, 209, 76, 19900000, 0, 1, 19900000),
(331, 210, 58, 32999000, 5, 1, 31349050),
(332, 211, 59, 28000000, 15, 1, 23800000),
(333, 212, 75, 31200000, 5, 1, 29640000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_dm_sp`
--

CREATE TABLE `tb_dm_sp` (
  `Id_dm` int(11) NOT NULL,
  `Ten_dm` varchar(50) NOT NULL,
  `Anh_dm` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_dm_sp`
--

INSERT INTO `tb_dm_sp` (`Id_dm`, `Ten_dm`, `Anh_dm`) VALUES
(100, 'Vizio', '2.jpg'),
(102, 'Samsung', 'Samsung.jpg'),
(103, 'Sony', 'Sony.jpg'),
(105, 'TCL', 'TCL.jpg'),
(106, 'Skyworth', 'Skyworth.jpg'),
(108, 'LG Electronics', 'LGG.png'),
(109, 'Hisense', 'Hisenses.jpg'),
(110, 'Panasonic', 'Panasonics.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_don_dh`
--

CREATE TABLE `tb_don_dh` (
  `Id` int(11) NOT NULL,
  `Id_kh` int(11) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Id_pttt` int(11) NOT NULL,
  `Gia_don` int(100) NOT NULL,
  `Ngay_lap` date NOT NULL,
  `Tinh_trang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_don_dh`
--

INSERT INTO `tb_don_dh` (`Id`, `Id_kh`, `Fullname`, `Id_pttt`, `Gia_don`, `Ngay_lap`, `Tinh_trang`) VALUES
(207, 69, 'Nguyễn Văn Lượng', 1, 66220000, '2021-07-16', 4),
(210, 69, 'Nguyễn Văn Lượng', 4, 31349050, '2021-07-17', 5),
(211, 69, 'Nguyễn Văn Lượng', 1, 23800000, '2021-07-17', 2),
(212, 69, 'Nguyễn Văn Lượng', 1, 29640000, '2021-07-17', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_khachhang`
--

CREATE TABLE `tb_khachhang` (
  `Id_kh` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Number_phone` int(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_khachhang`
--

INSERT INTO `tb_khachhang` (`Id_kh`, `Username`, `Password`, `Fullname`, `Email`, `Number_phone`, `Address`, `Status`) VALUES
(69, 'admin', '$2y$10$J6B6ArWGybDKLKyS9lud8u.kArOH5A.6b3Zo6V7AKNMPSqhSJx72K', 'Nguyễn Văn Lượng', 'nvluong2k1@gmail.com', 365571790, 'Tân trào/sơn dương/tuyên quang', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_nguoidung`
--

CREATE TABLE `tb_nguoidung` (
  `Id` int(11) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `Number_phone` int(255) NOT NULL,
  `Chuc_vu` int(11) NOT NULL,
  `Status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_nguoidung`
--

INSERT INTO `tb_nguoidung` (`Id`, `Username`, `Password`, `Fullname`, `Number_phone`, `Chuc_vu`, `Status`) VALUES
(15, 'admin', '$2y$10$hJplLLmksxMCK5.pEe8cSOZUzv/mrNmi57TMoC2MaEVM/vi7tRjkS', 'Nguyễn Văn Lượng', 365571790, 1, 1),
(16, 'tkmaulua', '$2y$10$hJplLLmksxMCK5.pEe8cSOZUzv/mrNmi57TMoC2MaEVM/vi7tRjkS', 'Nguyễn Văn Chất', 365571743, 2, 1),
(18, 'luong1223', '$2y$10$fzCygls2UGptryYm12MoPOL37U4vtLMEIUjpaIODBKT.0SJy9aRli', 'Nguyễn1', 365571790, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_pttt`
--

CREATE TABLE `tb_pttt` (
  `Id` int(11) NOT NULL,
  `Ordername` varchar(50) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_pttt`
--

INSERT INTO `tb_pttt` (`Id`, `Ordername`, `Status`) VALUES
(1, 'Payment to the shipper', 1),
(2, 'Pay at the store', 1),
(3, 'Payment by bank transfer', 1),
(4, 'Pay with Paypal App', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_quen_nd`
--

CREATE TABLE `tb_quen_nd` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_quen_nd`
--

INSERT INTO `tb_quen_nd` (`Id`, `Name`) VALUES
(1, 'Quản lý '),
(2, 'Nhân viên bán hàng và kho');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_sanpham`
--

CREATE TABLE `tb_sanpham` (
  `Id_sp` int(11) NOT NULL,
  `Id_dm` int(11) NOT NULL,
  `Ten_sp` varchar(100) NOT NULL,
  `Gia_mua` int(11) NOT NULL,
  `Gia_ban` int(11) NOT NULL,
  `Khuyen_mai` int(100) NOT NULL,
  `So_luong` int(100) NOT NULL,
  `He_dieu_hanh` varchar(100) NOT NULL,
  `Ung_dung` varchar(100) NOT NULL,
  `Cong_nghe_hinh_anh` varchar(100) NOT NULL,
  `Giong_noi` varchar(255) NOT NULL,
  `Remote` varchar(100) NOT NULL,
  `Size` varchar(100) NOT NULL,
  `Nam_sx` varchar(100) NOT NULL,
  `Mo_ta` varchar(1000) NOT NULL,
  `Anh_sp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_sanpham`
--

INSERT INTO `tb_sanpham` (`Id_sp`, `Id_dm`, `Ten_sp`, `Gia_mua`, `Gia_ban`, `Khuyen_mai`, `So_luong`, `He_dieu_hanh`, `Ung_dung`, `Cong_nghe_hinh_anh`, `Giong_noi`, `Remote`, `Size`, `Nam_sx`, `Mo_ta`, `Anh_sp`) VALUES
(55, 105, 'TCL 50-inch Class 4-Series 4K UHD Smart Roku LED T', 18000000, 26000000, 9, 99, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2018', 'Dimensions (W x H x D): TV without stand: 44.1 X 25.7 X 3.2 inches, TV with stand: 44.1 X 28 X 8 inchesSmart functionality that delivers all your favorite content with over 500,000 movies and TV episodes, accessible through a simple and intuitive Roku T', '919Rd1f7fxL._AC_SL1500_.jpg'),
(56, 105, 'TCL 50-inch Class 4-Series 4K UHD HDR Smart Androi', 15000000, 21000000, 10, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '75 inch', '2020', 'Stunning 4K Ultra HD: 4K resolution delivers stunning detail and remarkable visual experience.\r\nHigh Dynamic Range: HDR delivers bright and accurate colors for a lifelike viewing experience.\r\nGoogle Assistant Built-in: Search for movies and shows across t', 'TCL111.jpg'),
(57, 105, 'TCL 32-inch 1080p Roku Smart LED TV - 32S327, 2019', 20000000, 24999000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'Easy Voice Control: Works with Amazon Alexa or Google Assistant to help you find movie titles, launch or change channels, even switch inputs, using just your voice. Also available through the Roku mobile app\r\nSmart Functionality offers access to over 5,00', 't1.webp'),
(58, 105, 'TCL 32-inch Class 3-Series HD LED Smart Android TV', 28000000, 32999000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '75 inch', '2021', 'High Definition (720p) Resolution: Full high definition (720p) resolution for excellent detail, color, and contrast.\r\nGoogle Assistant Built-in: Search for movies and shows across thousands of available apps, get entertainment recommendations, access medi', 't2.jpg'),
(59, 105, 'TCL 55-inch 6-Series 4K UHD Dolby Vision HDR QLED ', 21000000, 28000000, 15, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '55 inch', '2021', 'Superior 4K Ultra HD: Picture clarity combined with the contrast, color, and detail of Dolby Vision HDR (High Dynamic Range) for the most lifelike picture\r\nMini-LED Technology: Uncompromised contrast, brightness, and uniformity for incredible viewing in a', 't3.jpg'),
(60, 105, 'TCL 75-inch 5-Series 4K UHD Dolby Vision HDR QLED ', 23500000, 26500000, 20, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '75 inch', '2021', 'Superior 4K Ultra HD: Picture clarity combined with the contrast, color, and detail of Dolby Vision HDR (High Dynamic Range) for the most lifelike picture.\r\nQLED: Quantum dot technology delivers better brightness and wider color volume.\r\nProduct size (WxH', 't4.webp'),
(61, 105, 'TCL 55\" Class 5-Series 4K UHD Dolby Vision HDR Rok', 24300000, 29900000, 10, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '75 inch', '2021', 'Smart functionality offers access to thousands of streaming channels featuring more than 500,000 movies and TV episodes via Roku TV\r\nPairs 4K Ultra HD picture clarity with the contrast, color, and detail of Dolby Vision high dynamic range (HDR) for the mo', 't5.jpg'),
(62, 105, 'TCL 75C803 75 4K UHD Dolby Vision HDR Roku Smart T', 32100000, 36500000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '75 inch', '2021', 'Dolby Vision HDR\r\nHDR Dynamic Contrast\r\nWide Color Gamut With TCLs NBP Photon Technology\r\nRoku TV Smart Platform With Thousands Of Streaming Channels', 't5.jpg'),
(64, 103, 'Sony A8H 65-inch TV: BRAVIA OLED 4K Ultra HD Smart', 25000000, 29900000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'PICTURE PROCESSOR X1 ULTIMATE: Sony’s best processor analyzes content to bring out OLED’s intense contrast with pure blacks, peak brightness and natural colors. X-Reality PRO upscale everything you watch to near 4K.\r\nOLED plus PIXEL CONTRAST BOOSTER: Mill', '1.webp'),
(65, 103, 'Sony X80J 65 Inch TV: 4K Ultra HD LED Smart Google', 18900000, 24999000, 10, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', '4K HDR PROCESSOR X1 – Powerful TV processing that delivers a picture that is smooth and clear, full of rich colors and detailed contrast.\r\nTRILUMINOS PRO – Reproduces more colors than a conventional TV resulting in picture quality that is natural and prec', '2.webp'),
(66, 103, 'Sony A80J 65 Inch TV: BRAVIA XR OLED 4K Ultra HD S', 20000000, 24999000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'COGNITIVE PROCESSOR XR – Revolutionary TV processing technology that understands how humans see and hear to deliver intense contrast with pure blacks, high peak brightness, and natural colors.\r\nXR TRILUMINOS PRO - Rediscover everything you watch with bill', '3.jpg'),
(67, 103, 'Sony X90J 65 Inch TV: BRAVIA XR Full Array LED 4K ', 20000000, 26000000, 10, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'COGNITIVE PROCESSOR XR – Revolutionary TV processing technology that understands how humans see and hear to deliver intense contrast with pure blacks, high peak brightness, and natural colors.\r\nXR TRILUMINOS PRO - Rediscover everything you watch with bill', '4.jpg'),
(68, 103, 'Sony XBR-77A9G 77-inch TV: MASTER Series BRAVIA OL', 28000000, 32999000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '77 inch', '2020', 'OLED plus PIXEL CONTRAST BOOSTER: Millions of individual pixels are supercharged for more vibrant colors to complement absolute OLED black\r\nMASTER OF QUALITY: Faithfully conveys creator’s intent on screen to deliver the best picture quality\r\nPICTURE PROCE', 't5.webp'),
(69, 103, 'Sony X950H 75-inch TV: 4K Ultra HD Smart LED TV wi', 25000000, 29900000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '75 inch', '2020', 'PICTURE PROCESSOR X1 ULTIMATE: Sony’s best processor analyzes content to boost color, contrast and clarity, bringing astounding realism to your content\r\nTRILUMINOS Display: See exactly what the creator intended with advanced color and gradation\r\nFULL ARRA', '6.webp'),
(70, 103, 'Sony Bravia FW43BZ35F 43\" 4K HDR Edge-Lit Commerci', 25000000, 30000000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '75 inch', '2021', 'X-REALITY PRO: With X-Reality PRO, patterns in images are compared with patterns stored in a unique database to sharpen each pixel\r\nMOTION FLOW: This innovative technology creates and inserts extra frames between the original ones\r\nHIGH DEFINITION: From B', '6.webp'),
(72, 103, 'Sony Bravia FW43BZ35F 43\" 4K HDR Edge-Lit Commerci', 25000000, 29900000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '55 inch', '2020', '4K HDR Professional display', '71FrKl59c9L._AC_SL1000_.jpg'),
(73, 102, 'SAMSUNG 50-Inch Class Crystal UHD AU8000 Series - ', 20000000, 24999000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '50 inch', '2020', 'DYNAMIC CRYSTAL COLOR - A fine crystal layer reveals millions of true-to-life colors.\r\nCRYSTAL PROCESSOR 4K – Intelligent, ultra-fast optimization of 4K content.\r\nSMART TV WITH MULTIPLE VOICE ASSISTANTS – Access apps and streaming services right on your T', '71LJJrKbezL._AC_SL1500_.jpg'),
(75, 102, 'SAMSUNG 55-inch Class Curved UHD TU-8300 Series - ', 26500000, 31200000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '55 inch', '2021', 'TRANSFORMATIVE 4K PROCESSOR - Transform everything you watch into stunning 4K with the ultra-fast processor.\r\nIMMERSIVE CURVES TO ENHANCE VIEWING EXPERIENCE - Modern and polished, the sleek curved design fills the contours of your space with an immersive ', '9138UedBC+L._AC_SL1500_.jpg'),
(76, 102, 'SAMSUNG QN32Q50RAFXZA Flat 32\" QLED 4K 32Q50 Serie', 15000000, 19900000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', '4K UHD Processor: a powerful processor optimizes your tv’ s performance with 4K picture quality\r\nInputs & Outputs: 3 HDMI ports, 1 Ethernet port, 2 USB Ports (v 2.0), 1 Digital Audio Output (Optical), 1 Composite Input (AV),\r\nDimensions with Stand (WxHxD)', '51NKhnjhpGL._AC_SL1024_.jpg'),
(77, 102, 'SAMSUNG 65-Inch Class QLED Q80A Series - 4K UHD Di', 23500000, 25500000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'DIRECT FULL ARRAY BACKLIGHTING: Experience deep blacks and pure whites with an in-screen LED array.\r\nOBJECT TRACKING SOUND (OTS): Sound that moves with the action.* * 50\" has OTS Lite\"\r\nQUANTUM PROCESSOR 4K: Elevate your picture to 4K with machine based A', '71ihMv1q-kL._AC_UL480_FMwebp_QL65_.webp'),
(78, 102, 'SAMSUNG 32-inch Class LED Smart FHD TV 1080P (UN32', 20000000, 24999000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'Full HD 1080p Resolution - Enjoy a viewing experience that is 2x the clarity of standard HD TVs.\r\nSmart TV - Get to your entertainment the faster, easier, and more intelligent way. Easily access your streaming services all in one place using the Samsung R', '71O9QaPiUKS._AC_SL1500_.jpg'),
(79, 102, 'SAMSUNG 32-inch Class LED Smart FHD TV 1080P (UN32', 20000000, 29900000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '75 inch', '2021', 'Full HD 1080p Resolution - Enjoy a viewing experience that is 2x the clarity of standard HD TVs.\r\nSmart TV - Get to your entertainment the faster, easier, and more intelligent way. Easily access your streaming services all in one place using the Samsung R', '91UsHjAPTlL._AC_SL1500_.jpg'),
(80, 102, 'SAMSUNG 55-Inch Class Neo QLED QN90A Series - 4K U', 25000000, 29900000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '55 inch', '2021', 'QUANTUM MATRIX TECHNOLOGY WITH MINI LED: A brilliantly intense picture powered by tiny hyper-focused light cells.\r\nSAMSUNG NEO QUANTUM PROCESSOR 4K: Upgrade every picture to 4K with multi-layered neural networks.\r\nQUANTUM HDR 24X: Vivid colors that jump off the screen provide dynamic contrast.* *The range of Quantum HDR claims luminance based on internal testing standards and is subject to change according to viewing environment or specific conditions.\r\nALEXA BUILT-IN: Ask more from your TV. Jus', '913+l9CB6cL._AC_UL480_FMwebp_QL65_.webp'),
(81, 102, 'SAMSUNG 50-inch Class Crystal UHD AU8000 Series - ', 10000000, 15000000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '50 inch', '2018', 'DYNAMIC CRYSTAL COLOR - A fine crystal layer reveals millions of true-to-life colors.\r\nCRYSTAL PROCESSOR 4K – Intelligent, ultra-fast optimization of 4K content.\r\nSMART TV WITH MULTIPLE VOICE ASSISTANTS – Access apps and streaming services right on your TV with your voice.\r\n3 HDMI PORTS – Connect up to 3 devices with HDMI.\r\nHDR – Unveils shades of color that go beyond HDTV.', '71LJJrKbezL._AC_UL480_FMwebp_QL65_.webp'),
(82, 102, 'SAMSUNG QN32Q50RAFXZA Flat 32\" QLED 4K 32Q50 Serie', 12000000, 16000000, 3, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', '4K UHD Processor: a powerful processor optimizes your tv’ s performance with 4K picture quality\r\nInputs & Outputs: 3 HDMI ports, 1 Ethernet port, 2 USB Ports (v 2.0), 1 Digital Audio Output (Optical), 1 Composite Input (AV),\r\nDimensions with Stand (WxHxD): 28.5\" x 18.8\" x 6.1\" | with Stand Weight: 11.9 lb. | without Stand', '51NKhnjhpGL._AC_SL1024_ (1).jpg'),
(83, 100, 'SAMSUNG 32-inch Class FRAME QLED LS03 Series - FHD', 15000000, 21000000, 15, 100, 'Android 10', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2019', '100% COLOR VOLUME WITH QUANTUM DOT: Quantum dots produce over a billion shades of color that stay true-to-life even in bright scenes.\r\nART MODE: The Frame transforms into a beautiful work of art when you’re not watching TV. Activate the built-in motion sensor so whenever you walk into the room, your TV displays one of your favorite selections.', '71bmukMiAEL._AC_SL1500_.jpg'),
(84, 102, 'SAMSUNG 82-inch Class Crystal UHD TU-6950 Series -', 20000000, 24999000, 10, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '82 inch', '2021', 'CRYSTAL PROCESSOR 4K: This ultra-fast processor transforms everything you watch into stunning 4K', '919Rd1f7fxL._AC_SL1500_.jpg'),
(85, 102, 'SAMSUNG 32-inch M5 Smart Monitor with Netflix, You', 9500000, 14000000, 0, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', 'MOBILE CONNECTIVITY: Wireless DeX unlocks a full PC experience. Use mobile productivity apps, such as video conferencing, documents, and browsers, through just your monitor and phone', '81dUzXzVIPS._AC_SL1500_.jpg'),
(86, 102, 'SAMSUNG 32-inch M5 Smart Monitor with Netflix, You', 9500000, 14000000, 0, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', 'MOBILE CONNECTIVITY: Wireless DeX unlocks a full PC experience. Use mobile productivity apps, such as video conferencing, documents, and browsers, through just your monitor and phone', '81dUzXzVIPS._AC_SL1500_.jpg'),
(87, 103, 'Sony X80J 65 Inch TV: 4K Ultra HD LED Smart Google', 18900000, 24999000, 10, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', '4K HDR PROCESSOR X1 – Powerful TV processing that delivers a picture that is smooth and clear, full of rich colors and detailed contrast.\r\nTRILUMINOS PRO – Reproduces more colors than a conventional TV resulting in picture quality that is natural and prec', '2.webp'),
(88, 103, 'Sony A80J 65 Inch TV: BRAVIA XR OLED 4K Ultra HD S', 20000000, 24999000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'COGNITIVE PROCESSOR XR – Revolutionary TV processing technology that understands how humans see and hear to deliver intense contrast with pure blacks, high peak brightness, and natural colors.\r\nXR TRILUMINOS PRO - Rediscover everything you watch with bill', '3.jpg'),
(89, 103, 'Sony X90J 65 Inch TV: BRAVIA XR Full Array LED 4K ', 20000000, 26000000, 10, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'COGNITIVE PROCESSOR XR – Revolutionary TV processing technology that understands how humans see and hear to deliver intense contrast with pure blacks, high peak brightness, and natural colors.\r\nXR TRILUMINOS PRO - Rediscover everything you watch with bill', '4.jpg'),
(90, 102, 'SAMSUNG 55-inch Class Curved UHD TU-8300 Series - ', 26500000, 31200000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '55 inch', '2021', 'TRANSFORMATIVE 4K PROCESSOR - Transform everything you watch into stunning 4K with the ultra-fast processor.\r\nIMMERSIVE CURVES TO ENHANCE VIEWING EXPERIENCE - Modern and polished, the sleek curved design fills the contours of your space with an immersive ', '9138UedBC+L._AC_SL1500_.jpg'),
(91, 102, 'SAMSUNG QN32Q50RAFXZA Flat 32\" QLED 4K 32Q50 Serie', 15000000, 19900000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', '4K UHD Processor: a powerful processor optimizes your tv’ s performance with 4K picture quality\r\nInputs & Outputs: 3 HDMI ports, 1 Ethernet port, 2 USB Ports (v 2.0), 1 Digital Audio Output (Optical), 1 Composite Input (AV),\r\nDimensions with Stand (WxHxD)', '51NKhnjhpGL._AC_SL1024_.jpg'),
(92, 102, 'SAMSUNG 65-Inch Class QLED Q80A Series - 4K UHD Di', 23500000, 25500000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'DIRECT FULL ARRAY BACKLIGHTING: Experience deep blacks and pure whites with an in-screen LED array.\r\nOBJECT TRACKING SOUND (OTS): Sound that moves with the action.* * 50\" has OTS Lite\"\r\nQUANTUM PROCESSOR 4K: Elevate your picture to 4K with machine based A', '71ihMv1q-kL._AC_UL480_FMwebp_QL65_.webp'),
(93, 102, 'SAMSUNG QN32Q50RAFXZA Flat 32\" QLED 4K 32Q50 Serie', 12000000, 16000000, 3, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', '4K UHD Processor: a powerful processor optimizes your tv’ s performance with 4K picture quality\r\nInputs & Outputs: 3 HDMI ports, 1 Ethernet port, 2 USB Ports (v 2.0), 1 Digital Audio Output (Optical), 1 Composite Input (AV),\r\nDimensions with Stand (WxHxD): 28.5\" x 18.8\" x 6.1\" | with Stand Weight: 11.9 lb. | without Stand', '51NKhnjhpGL._AC_SL1024_ (1).jpg'),
(94, 102, 'SAMSUNG 82-inch Class Crystal UHD TU-6950 Series -', 20000000, 24999000, 10, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '82 inch', '2021', 'CRYSTAL PROCESSOR 4K: This ultra-fast processor transforms everything you watch into stunning 4K', '919Rd1f7fxL._AC_SL1500_.jpg'),
(95, 102, 'SAMSUNG 32-inch M5 Smart Monitor with Netflix, You', 9500000, 14000000, 0, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', 'MOBILE CONNECTIVITY: Wireless DeX unlocks a full PC experience. Use mobile productivity apps, such as video conferencing, documents, and browsers, through just your monitor and phone', '81dUzXzVIPS._AC_SL1500_.jpg'),
(96, 102, 'SAMSUNG 32-inch M5 Smart Monitor with Netflix, You', 9500000, 14000000, 0, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', 'MOBILE CONNECTIVITY: Wireless DeX unlocks a full PC experience. Use mobile productivity apps, such as video conferencing, documents, and browsers, through just your monitor and phone', '81dUzXzVIPS._AC_SL1500_.jpg'),
(97, 102, 'SAMSUNG 55-inch Class Curved UHD TU-8300 Series - ', 26500000, 31200000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '55 inch', '2021', 'TRANSFORMATIVE 4K PROCESSOR - Transform everything you watch into stunning 4K with the ultra-fast processor.\r\nIMMERSIVE CURVES TO ENHANCE VIEWING EXPERIENCE - Modern and polished, the sleek curved design fills the contours of your space with an immersive ', '9138UedBC+L._AC_SL1500_.jpg'),
(98, 102, 'SAMSUNG QN32Q50RAFXZA Flat 32\" QLED 4K 32Q50 Serie', 12000000, 16000000, 3, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', '4K UHD Processor: a powerful processor optimizes your tv’ s performance with 4K picture quality\r\nInputs & Outputs: 3 HDMI ports, 1 Ethernet port, 2 USB Ports (v 2.0), 1 Digital Audio Output (Optical), 1 Composite Input (AV),\r\nDimensions with Stand (WxHxD): 28.5\" x 18.8\" x 6.1\" | with Stand Weight: 11.9 lb. | without Stand', '51NKhnjhpGL._AC_SL1024_ (1).jpg'),
(99, 102, 'SAMSUNG 82-inch Class Crystal UHD TU-6950 Series -', 20000000, 24999000, 10, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '82 inch', '2021', 'CRYSTAL PROCESSOR 4K: This ultra-fast processor transforms everything you watch into stunning 4K', '919Rd1f7fxL._AC_SL1500_.jpg'),
(100, 102, 'SAMSUNG 32-inch M5 Smart Monitor with Netflix, You', 9500000, 14000000, 0, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', 'MOBILE CONNECTIVITY: Wireless DeX unlocks a full PC experience. Use mobile productivity apps, such as video conferencing, documents, and browsers, through just your monitor and phone', '81dUzXzVIPS._AC_SL1500_.jpg'),
(101, 102, 'SAMSUNG 32-inch M5 Smart Monitor with Netflix, You', 9500000, 14000000, 0, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', 'MOBILE CONNECTIVITY: Wireless DeX unlocks a full PC experience. Use mobile productivity apps, such as video conferencing, documents, and browsers, through just your monitor and phone', '81dUzXzVIPS._AC_SL1500_.jpg'),
(102, 102, 'SAMSUNG 55-inch Class Curved UHD TU-8300 Series - ', 26500000, 31200000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '55 inch', '2021', 'TRANSFORMATIVE 4K PROCESSOR - Transform everything you watch into stunning 4K with the ultra-fast processor.\r\nIMMERSIVE CURVES TO ENHANCE VIEWING EXPERIENCE - Modern and polished, the sleek curved design fills the contours of your space with an immersive ', '9138UedBC+L._AC_SL1500_.jpg'),
(103, 102, 'SAMSUNG QN32Q50RAFXZA Flat 32\" QLED 4K 32Q50 Serie', 15000000, 19900000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', '4K UHD Processor: a powerful processor optimizes your tv’ s performance with 4K picture quality\r\nInputs & Outputs: 3 HDMI ports, 1 Ethernet port, 2 USB Ports (v 2.0), 1 Digital Audio Output (Optical), 1 Composite Input (AV),\r\nDimensions with Stand (WxHxD)', '51NKhnjhpGL._AC_SL1024_.jpg'),
(104, 102, 'SAMSUNG 65-Inch Class QLED Q80A Series - 4K UHD Di', 23500000, 25500000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'DIRECT FULL ARRAY BACKLIGHTING: Experience deep blacks and pure whites with an in-screen LED array.\r\nOBJECT TRACKING SOUND (OTS): Sound that moves with the action.* * 50\" has OTS Lite\"\r\nQUANTUM PROCESSOR 4K: Elevate your picture to 4K with machine based A', '71ihMv1q-kL._AC_UL480_FMwebp_QL65_.webp'),
(105, 102, 'SAMSUNG QN32Q50RAFXZA Flat 32\" QLED 4K 32Q50 Serie', 12000000, 16000000, 3, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', '4K UHD Processor: a powerful processor optimizes your tv’ s performance with 4K picture quality\r\nInputs & Outputs: 3 HDMI ports, 1 Ethernet port, 2 USB Ports (v 2.0), 1 Digital Audio Output (Optical), 1 Composite Input (AV),\r\nDimensions with Stand (WxHxD): 28.5\" x 18.8\" x 6.1\" | with Stand Weight: 11.9 lb. | without Stand', '51NKhnjhpGL._AC_SL1024_ (1).jpg'),
(106, 102, 'SAMSUNG 82-inch Class Crystal UHD TU-6950 Series -', 20000000, 24999000, 10, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '82 inch', '2021', 'CRYSTAL PROCESSOR 4K: This ultra-fast processor transforms everything you watch into stunning 4K', '919Rd1f7fxL._AC_SL1500_.jpg'),
(107, 102, 'SAMSUNG 32-inch M5 Smart Monitor with Netflix, You', 9500000, 14000000, 0, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', 'MOBILE CONNECTIVITY: Wireless DeX unlocks a full PC experience. Use mobile productivity apps, such as video conferencing, documents, and browsers, through just your monitor and phone', '81dUzXzVIPS._AC_SL1500_.jpg'),
(108, 102, 'SAMSUNG 32-inch M5 Smart Monitor with Netflix, You', 9500000, 14000000, 0, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', 'MOBILE CONNECTIVITY: Wireless DeX unlocks a full PC experience. Use mobile productivity apps, such as video conferencing, documents, and browsers, through just your monitor and phone', '81dUzXzVIPS._AC_SL1500_.jpg'),
(109, 102, 'SAMSUNG 55-inch Class Curved UHD TU-8300 Series - ', 26500000, 31200000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '55 inch', '2021', 'TRANSFORMATIVE 4K PROCESSOR - Transform everything you watch into stunning 4K with the ultra-fast processor.\r\nIMMERSIVE CURVES TO ENHANCE VIEWING EXPERIENCE - Modern and polished, the sleek curved design fills the contours of your space with an immersive ', '9138UedBC+L._AC_SL1500_.jpg'),
(118, 100, 'SAMSUNG 65-Inch Class QLED Q80A Series - 4K UHD Di', 23500000, 25500000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'DIRECT FULL ARRAY BACKLIGHTING: Experience deep blacks and pure whites with an in-screen LED array.\r\nOBJECT TRACKING SOUND (OTS): Sound that moves with the action.* * 50\" has OTS Lite\"\r\nQUANTUM PROCESSOR 4K: Elevate your picture to 4K with machine based A', '71ihMv1q-kL._AC_UL480_FMwebp_QL65_.webp'),
(119, 100, 'SAMSUNG 32-inch Class LED Smart FHD TV 1080P (UN32', 20000000, 24999000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'Full HD 1080p Resolution - Enjoy a viewing experience that is 2x the clarity of standard HD TVs.\r\nSmart TV - Get to your entertainment the faster, easier, and more intelligent way. Easily access your streaming services all in one place using the Samsung R', '71O9QaPiUKS._AC_SL1500_.jpg'),
(120, 100, 'SAMSUNG 32-inch Class LED Smart FHD TV 1080P (UN32', 20000000, 29900000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '75 inch', '2021', 'Full HD 1080p Resolution - Enjoy a viewing experience that is 2x the clarity of standard HD TVs.\r\nSmart TV - Get to your entertainment the faster, easier, and more intelligent way. Easily access your streaming services all in one place using the Samsung R', '91UsHjAPTlL._AC_SL1500_.jpg'),
(121, 100, 'SAMSUNG 55-Inch Class Neo QLED QN90A Series - 4K U', 25000000, 29900000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '55 inch', '2021', 'QUANTUM MATRIX TECHNOLOGY WITH MINI LED: A brilliantly intense picture powered by tiny hyper-focused light cells.\r\nSAMSUNG NEO QUANTUM PROCESSOR 4K: Upgrade every picture to 4K with multi-layered neural networks.\r\nQUANTUM HDR 24X: Vivid colors that jump off the screen provide dynamic contrast.* *The range of Quantum HDR claims luminance based on internal testing standards and is subject to change according to viewing environment or specific conditions.\r\nALEXA BUILT-IN: Ask more from your TV. Jus', '913+l9CB6cL._AC_UL480_FMwebp_QL65_.webp'),
(122, 100, 'SAMSUNG 50-inch Class Crystal UHD AU8000 Series - ', 10000000, 15000000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '50 inch', '2018', 'DYNAMIC CRYSTAL COLOR - A fine crystal layer reveals millions of true-to-life colors.\r\nCRYSTAL PROCESSOR 4K – Intelligent, ultra-fast optimization of 4K content.\r\nSMART TV WITH MULTIPLE VOICE ASSISTANTS – Access apps and streaming services right on your TV with your voice.\r\n3 HDMI PORTS – Connect up to 3 devices with HDMI.\r\nHDR – Unveils shades of color that go beyond HDTV.', '71LJJrKbezL._AC_UL480_FMwebp_QL65_.webp'),
(123, 102, 'SAMSUNG QN32Q50RAFXZA Flat 32\" QLED 4K 32Q50 Serie', 12000000, 16000000, 3, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', '4K UHD Processor: a powerful processor optimizes your tv’ s performance with 4K picture quality\r\nInputs & Outputs: 3 HDMI ports, 1 Ethernet port, 2 USB Ports (v 2.0), 1 Digital Audio Output (Optical), 1 Composite Input (AV),\r\nDimensions with Stand (WxHxD): 28.5\" x 18.8\" x 6.1\" | with Stand Weight: 11.9 lb. | without Stand', '51NKhnjhpGL._AC_SL1024_ (1).jpg'),
(124, 100, 'SAMSUNG 32-inch Class FRAME QLED LS03 Series - FHD', 15000000, 21000000, 15, 100, 'Android 10', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2019', '100% COLOR VOLUME WITH QUANTUM DOT: Quantum dots produce over a billion shades of color that stay true-to-life even in bright scenes.\r\nART MODE: The Frame transforms into a beautiful work of art when you’re not watching TV. Activate the built-in motion sensor so whenever you walk into the room, your TV displays one of your favorite selections.', '71bmukMiAEL._AC_SL1500_.jpg'),
(125, 100, 'SAMSUNG 82-inch Class Crystal UHD TU-6950 Series -', 20000000, 24999000, 10, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '82 inch', '2021', 'CRYSTAL PROCESSOR 4K: This ultra-fast processor transforms everything you watch into stunning 4K', '919Rd1f7fxL._AC_SL1500_.jpg'),
(126, 100, 'SAMSUNG 32-inch M5 Smart Monitor with Netflix, You', 9500000, 14000000, 0, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', 'MOBILE CONNECTIVITY: Wireless DeX unlocks a full PC experience. Use mobile productivity apps, such as video conferencing, documents, and browsers, through just your monitor and phone', '81dUzXzVIPS._AC_SL1500_.jpg'),
(127, 100, 'SAMSUNG 32-inch M5 Smart Monitor with Netflix, You', 9500000, 14000000, 0, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', 'MOBILE CONNECTIVITY: Wireless DeX unlocks a full PC experience. Use mobile productivity apps, such as video conferencing, documents, and browsers, through just your monitor and phone', '81dUzXzVIPS._AC_SL1500_.jpg'),
(128, 100, 'Sony X80J 65 Inch TV: 4K Ultra HD LED Smart Google', 18900000, 24999000, 10, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', '4K HDR PROCESSOR X1 – Powerful TV processing that delivers a picture that is smooth and clear, full of rich colors and detailed contrast.\r\nTRILUMINOS PRO – Reproduces more colors than a conventional TV resulting in picture quality that is natural and prec', '2.webp'),
(129, 100, 'Sony A80J 65 Inch TV: BRAVIA XR OLED 4K Ultra HD S', 20000000, 24999000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'COGNITIVE PROCESSOR XR – Revolutionary TV processing technology that understands how humans see and hear to deliver intense contrast with pure blacks, high peak brightness, and natural colors.\r\nXR TRILUMINOS PRO - Rediscover everything you watch with bill', '3.jpg'),
(130, 100, 'Sony X90J 65 Inch TV: BRAVIA XR Full Array LED 4K ', 20000000, 26000000, 10, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'COGNITIVE PROCESSOR XR – Revolutionary TV processing technology that understands how humans see and hear to deliver intense contrast with pure blacks, high peak brightness, and natural colors.\r\nXR TRILUMINOS PRO - Rediscover everything you watch with bill', '4.jpg'),
(131, 100, 'SAMSUNG 55-inch Class Curved UHD TU-8300 Series - ', 26500000, 31200000, 5, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '55 inch', '2021', 'TRANSFORMATIVE 4K PROCESSOR - Transform everything you watch into stunning 4K with the ultra-fast processor.\r\nIMMERSIVE CURVES TO ENHANCE VIEWING EXPERIENCE - Modern and polished, the sleek curved design fills the contours of your space with an immersive ', '9138UedBC+L._AC_SL1500_.jpg'),
(132, 100, 'SAMSUNG QN32Q50RAFXZA Flat 32\" QLED 4K 32Q50 Serie', 15000000, 19900000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', '4K UHD Processor: a powerful processor optimizes your tv’ s performance with 4K picture quality\r\nInputs & Outputs: 3 HDMI ports, 1 Ethernet port, 2 USB Ports (v 2.0), 1 Digital Audio Output (Optical), 1 Composite Input (AV),\r\nDimensions with Stand (WxHxD)', '51NKhnjhpGL._AC_SL1024_.jpg'),
(133, 100, 'SAMSUNG 65-Inch Class QLED Q80A Series - 4K UHD Di', 23500000, 25500000, 0, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60HzHDR10G31x2 800MHz Processor', 'Voice search on YouTube in VietnameseGoogle Assistant has Vietnamese', 'Integrated remote voice search', '65 inch', '2020', 'DIRECT FULL ARRAY BACKLIGHTING: Experience deep blacks and pure whites with an in-screen LED array.\r\nOBJECT TRACKING SOUND (OTS): Sound that moves with the action.* * 50\" has OTS Lite\"\r\nQUANTUM PROCESSOR 4K: Elevate your picture to 4K with machine based A', '71ihMv1q-kL._AC_UL480_FMwebp_QL65_.webp'),
(134, 100, 'SAMSUNG QN32Q50RAFXZA Flat 32\" QLED 4K 32Q50 Serie', 12000000, 16000000, 3, 100, 'Android 9', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '32 inch', '2017', '4K UHD Processor: a powerful processor optimizes your tv’ s performance with 4K picture quality\r\nInputs & Outputs: 3 HDMI ports, 1 Ethernet port, 2 USB Ports (v 2.0), 1 Digital Audio Output (Optical), 1 Composite Input (AV),\r\nDimensions with Stand (WxHxD): 28.5\" x 18.8\" x 6.1\" | with Stand Weight: 11.9 lb. | without Stand', '51NKhnjhpGL._AC_SL1024_ (1).jpg'),
(135, 100, 'SAMSUNG 82-inch Class Crystal UHD TU-6950 Series -', 20000000, 24999000, 10, 100, 'Android 11', 'Netflix, Skype, Hulu, Youtube, Spotify, Amazon Instant Video', 'Dolby Vision Motion Enhancement MEMC 60Hz HD R10 G31x2 800MHz Processor', 'Voice search on YouTube in Vietnamese Google Assistant has Vietnamese', 'Integrated remote voice search', '82 inch', '2021', 'CRYSTAL PROCESSOR 4K: This ultra-fast processor transforms everything you watch into stunning 4K', '919Rd1f7fxL._AC_SL1500_.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_sp_ban`
--

CREATE TABLE `tb_sp_ban` (
  `Id` int(11) NOT NULL,
  `Id_sp` int(11) NOT NULL,
  `So_luong_ban` tinyint(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_sp_ban`
--

INSERT INTO `tb_sp_ban` (`Id`, `Id_sp`, `So_luong_ban`) VALUES
(74, 55, 2),
(75, 56, 1),
(76, 57, 0),
(77, 58, 0),
(78, 59, 0),
(79, 60, 0),
(80, 64, 0),
(81, 65, 0),
(82, 66, 0),
(83, 67, 0),
(84, 68, 0),
(85, 69, 0),
(86, 70, 0),
(87, 72, 0),
(88, 73, 0),
(89, 75, 0),
(90, 76, 0),
(91, 77, 0),
(92, 78, 0),
(93, 79, 0),
(94, 80, 0),
(95, 81, 0),
(96, 82, 0),
(97, 83, 0),
(98, 84, 0),
(99, 85, 0),
(100, 86, 0),
(101, 87, 0),
(102, 88, 0),
(103, 89, 0),
(104, 90, 0),
(105, 91, 0),
(106, 92, 0),
(107, 93, 0),
(108, 94, 0),
(109, 95, 0),
(110, 96, 0),
(111, 97, 0),
(112, 98, 0),
(113, 99, 0),
(114, 100, 0),
(115, 101, 0),
(116, 102, 0),
(117, 103, 0),
(118, 104, 0),
(119, 105, 0),
(120, 106, 0),
(121, 107, 0),
(122, 108, 0),
(123, 109, 0),
(124, 61, 0),
(125, 62, 0),
(126, 305, 0),
(127, 304, 0),
(128, 303, 0),
(129, 306, 0),
(130, 118, 0),
(131, 119, 0),
(132, 120, 0),
(133, 121, 0),
(134, 122, 0),
(135, 123, 0),
(136, 124, 0),
(137, 125, 0),
(138, 126, 0),
(139, 127, 0),
(140, 128, 0),
(141, 129, 0),
(142, 130, 0),
(143, 131, 0),
(144, 132, 0),
(145, 133, 0),
(146, 134, 0),
(147, 135, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_timkiem_gia`
--

CREATE TABLE `tb_timkiem_gia` (
  `Id` int(11) NOT NULL,
  `Price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_timkiem_gia`
--

INSERT INTO `tb_timkiem_gia` (`Id`, `Price`) VALUES
(1, '0-500 $'),
(2, '500-1000 $'),
(5, '1000-1500 $'),
(6, '1500-2000 $'),
(7, 'Over 2000 $');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_tt_dh`
--

CREATE TABLE `tb_tt_dh` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tb_tt_dh`
--

INSERT INTO `tb_tt_dh` (`Id`, `Name`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đang giao'),
(3, 'Đã giao'),
(4, 'Giao hàng thành công'),
(5, 'Đã hủy');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_binhluan`
--
ALTER TABLE `tb_binhluan`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tb_ct_ddh`
--
ALTER TABLE `tb_ct_ddh`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tb_dm_sp`
--
ALTER TABLE `tb_dm_sp`
  ADD PRIMARY KEY (`Id_dm`);

--
-- Chỉ mục cho bảng `tb_don_dh`
--
ALTER TABLE `tb_don_dh`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tb_khachhang`
--
ALTER TABLE `tb_khachhang`
  ADD PRIMARY KEY (`Id_kh`);

--
-- Chỉ mục cho bảng `tb_nguoidung`
--
ALTER TABLE `tb_nguoidung`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tb_pttt`
--
ALTER TABLE `tb_pttt`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tb_quen_nd`
--
ALTER TABLE `tb_quen_nd`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  ADD PRIMARY KEY (`Id_sp`);

--
-- Chỉ mục cho bảng `tb_sp_ban`
--
ALTER TABLE `tb_sp_ban`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tb_timkiem_gia`
--
ALTER TABLE `tb_timkiem_gia`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `tb_tt_dh`
--
ALTER TABLE `tb_tt_dh`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_binhluan`
--
ALTER TABLE `tb_binhluan`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `tb_ct_ddh`
--
ALTER TABLE `tb_ct_ddh`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;

--
-- AUTO_INCREMENT cho bảng `tb_dm_sp`
--
ALTER TABLE `tb_dm_sp`
  MODIFY `Id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT cho bảng `tb_don_dh`
--
ALTER TABLE `tb_don_dh`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT cho bảng `tb_khachhang`
--
ALTER TABLE `tb_khachhang`
  MODIFY `Id_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `tb_nguoidung`
--
ALTER TABLE `tb_nguoidung`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tb_pttt`
--
ALTER TABLE `tb_pttt`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tb_quen_nd`
--
ALTER TABLE `tb_quen_nd`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tb_sanpham`
--
ALTER TABLE `tb_sanpham`
  MODIFY `Id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT cho bảng `tb_sp_ban`
--
ALTER TABLE `tb_sp_ban`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT cho bảng `tb_timkiem_gia`
--
ALTER TABLE `tb_timkiem_gia`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tb_tt_dh`
--
ALTER TABLE `tb_tt_dh`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
