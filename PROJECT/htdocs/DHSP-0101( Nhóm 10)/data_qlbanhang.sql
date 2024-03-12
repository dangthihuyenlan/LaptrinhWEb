-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 14, 2023 lúc 07:11 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `data_qlbanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `AddressId` int(11) NOT NULL,
  `CustomersID` int(11) DEFAULT NULL,
  `CustomersName` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`AddressId`, `CustomersID`, `CustomersName`, `address`) VALUES
(10, 7, ' Huỳnh Gia Bảo', 'Thôn hòa bắc, Xã Đại Hồng, Huyện Đại Lộc, Tỉnh Quảng Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `CustomersID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Cart_Size` char(10) NOT NULL,
  `Cart_Color` varchar(100) NOT NULL,
  `Cart_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `CustomersID` int(11) NOT NULL,
  `User_name` varchar(255) NOT NULL,
  `Customers_img` longblob NOT NULL,
  `CustomersPassword` varchar(255) NOT NULL,
  `CustomersEmail` varchar(100) NOT NULL,
  `CustomersPhone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`CustomersID`, `User_name`, `Customers_img`, `CustomersPassword`, `CustomersEmail`, `CustomersPhone`) VALUES
(7, 'bao', '', 'thuan', 'jumrk03@gmail.com', '0373532273');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorite`
--

CREATE TABLE `favorite` (
  `FavoriteID` int(11) NOT NULL,
  `CustomersID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `favorite`
--

INSERT INTO `favorite` (`FavoriteID`, `CustomersID`, `ProductID`) VALUES
(11, 7, 29),
(12, 7, 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrdersID` int(11) NOT NULL,
  `CustomersID` int(11) NOT NULL,
  `Shipping` varchar(255) NOT NULL,
  `Payment` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrdersID`, `CustomersID`, `Shipping`, `Payment`, `Address`, `Phone`, `Name`, `Date`, `Status`) VALUES
(59, 7, 'Giao hàng nhanh', 'Thanh toán khi nhận hàng', 'Mỹ phước, Xã Tam Đại, Huyện Phú Ninh, Tỉnh Quảng Nam', '', ' Nguyễn Văn Thuận', '2023-12-14', 'Đã giao hàng'),
(60, 7, 'Giao hàng nhanh', 'Thanh toán khi nhận hàng', 'Mỹ phước, Xã Tam Đại, Huyện Phú Ninh, Tỉnh Quảng Nam', '', ' Nguyễn Văn Thuận', '2023-12-14', 'Đã giao hàng'),
(61, 7, 'Giao hàng nhanh', 'Thanh toán khi nhận hàng', 'Thôn hòa bắc, Xã Đại Hồng, Huyện Đại Lộc, Tỉnh Quảng Nam', '0373532273', ' Huỳnh Gia Bảo', '2023-12-14', 'Đã giao hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `OrdersDetailID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `OrdersID` int(11) NOT NULL,
  `Orders_Size` char(10) NOT NULL,
  `Orders_Color` varchar(100) NOT NULL,
  `Orders_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ordersdetail`
--

INSERT INTO `ordersdetail` (`OrdersDetailID`, `ProductID`, `OrdersID`, `Orders_Size`, `Orders_Color`, `Orders_quantity`) VALUES
(38, 30, 59, ' XL', 'Red', 1),
(39, 30, 60, ' XL', 'White', 1),
(40, 31, 61, ' L', 'Black', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Img1` longblob NOT NULL,
  `Img2` longblob NOT NULL,
  `Img3` longblob NOT NULL,
  `Img4` longblob NOT NULL,
  `Product_price` float NOT NULL,
  `Groups` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductID`, `ProductName`, `Img1`, `Img2`, `Img3`, `Img4`, `Product_price`, `Groups`) VALUES
(29, 'Áo thun Paradox basic 2021™', 0x33202832292e706e67, 0x33202833292e706e67, 0x33202834292e706e67, 0x33202831292e706e67, 110, 'Áo thun'),
(30, 'Áo thun Paradox we are precious flowers™', 0x312e342e706e67, 0x312e332e706e67, 0x312e322e706e67, 0x312e312e706e67, 150, 'Áo thun'),
(31, 'Áo thun Paradox Rabbit 2023™', 0x322e342e706e67, 0x322e332e706e67, 0x322e322e706e67, 0x322e312e706e67, 150, 'Áo thun'),
(33, 'Áo thun Paradox Wonderiand©', 0x35202831292e706e67, 0x35202832292e706e67, 0x35202833292e706e67, 0x35202834292e706e67, 130, 'Áo thun'),
(34, 'Áo thun Paradox basic ANGEL©', 0x36202834292e706e67, 0x36202831292e706e67, 0x36202832292e706e67, 0x36202833292e706e67, 120, 'Áo thun'),
(35, 'Áo thun Paradox WORLDWIDE©', 0x37202832292e706e67, 0x37202833292e706e67, 0x37202834292e706e67, 0x37202831292e706e67, 150, 'Áo thun'),
(36, 'Áo thun Paradox basic 2023©', 0x38202832292e706e67, 0x38202833292e706e67, 0x38202834292e706e67, 0x38202831292e706e67, 120, 'Áo thun'),
(42, 'Áo Sweater Paradox WORLDWIDE™', 0x3132202831292e706e67, 0x3132202832292e706e67, 0x3132202833292e706e67, 0x3132202834292e706e67, 240, 'Áo sweater'),
(43, 'Áo Hoodie Paradox Basic 2022™', 0x3133202831292e706e67, 0x3133202832292e706e67, 0x3133202833292e706e67, 0x3133202834292e706e67, 220, 'Áo Hoodie'),
(44, 'Áo Hoodie Paradox Basic 2023™', 0x3134202833292e706e67, 0x3134202834292e706e67, 0x3134202832292e706e67, 0x3134202831292e706e67, 230, 'Áo Hoodie'),
(45, 'Áo POLO Saigonese ©', 0x3135202831292e706e67, 0x3135202832292e706e67, 0x3135202833292e706e67, 0x3135202834292e706e67, 150, 'Áo POLO'),
(47, 'Áo POLO Saigonese basic 2022 ©', 0x3137202831292e706e67, 0x3137202836292e706e67, 0x3137202834292e706e67, 0x3137202835292e706e67, 130, 'Áo POLO'),
(48, 'Áo POLO Saigonese basic 2023 ©', 0x3138202832292e706e67, 0x3138202833292e706e67, 0x3138202831292e706e67, 0x3138202834292e706e67, 140, 'Áo POLO'),
(49, 'Áo POLO Saigonese E.S.T 2015 ©', 0x3139202832292e706e67, 0x3139202833292e706e67, 0x3139202834292e706e67, 0x3139202831292e706e67, 150, 'Áo POLO'),
(50, 'Quần jean dài nút bên™', 0x3230202831292e706e67, 0x3230202832292e706e67, 0x3230202833292e706e67, 0x3230202834292e706e67, 230, 'Quần'),
(51, 'Quần jean dài có túi hộp 2023™', 0x3431202831292e706e67, 0x3431202832292e706e67, 0x3431202833292e706e67, 0x3431202834292e706e67, 230, 'Quần'),
(52, 'Quần jean phối rách kín 2023™', 0x3231202831292e706e67, 0x3231202832292e706e67, 0x3231202833292e706e67, 0x3231202834292e706e67, 250, 'Quần'),
(53, 'Quần jean nam nữ phối màu bạc 2022™', 0x3232202831292e706e67, 0x3232202832292e706e67, 0x3232202833292e706e67, 0x3232202834292e706e67, 250, 'Quần'),
(55, 'Quần jean nút bấm hai bên 2023™', 0x3235202831292e706e67, 0x3235202832292e706e67, 0x3235202833292e706e67, 0x3235202834292e706e67, 240, 'Quần');

--
-- Bẫy `product`
--
DELIMITER $$
CREATE TRIGGER `after_product_insert` AFTER INSERT ON `product` FOR EACH ROW BEGIN
                        INSERT INTO Warehouse (WarehouseID,ProductId, Warehouse_quantity) VALUES ('',NEW.ProductId,'30');
                    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouse`
--

CREATE TABLE `warehouse` (
  `WarehouseID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Warehouse_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `warehouse`
--

INSERT INTO `warehouse` (`WarehouseID`, `ProductID`, `Warehouse_quantity`) VALUES
(21, 29, 26),
(22, 30, 27),
(23, 31, 23),
(25, 33, 30),
(26, 34, 30),
(27, 35, 30),
(28, 36, 30),
(34, 42, 30),
(35, 43, 30),
(36, 44, 30),
(37, 45, 30),
(39, 47, 30),
(40, 48, 30),
(41, 49, 30),
(42, 50, 30),
(43, 51, 30),
(44, 52, 30),
(45, 53, 50),
(47, 55, 30);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AddressId`),
  ADD KEY `CustomersID` (`CustomersID`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `CustomersID` (`CustomersID`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomersID`);

--
-- Chỉ mục cho bảng `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`FavoriteID`),
  ADD KEY `CustomersID` (`CustomersID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrdersID`),
  ADD KEY `CustomersID` (`CustomersID`);

--
-- Chỉ mục cho bảng `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD PRIMARY KEY (`OrdersDetailID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `OrdersID` (`OrdersID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Chỉ mục cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`WarehouseID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `AddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `favorite`
--
ALTER TABLE `favorite`
  MODIFY `FavoriteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `OrdersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `ordersdetail`
--
ALTER TABLE `ordersdetail`
  MODIFY `OrdersDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `WarehouseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`CustomersID`) REFERENCES `customers` (`CustomersID`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`CustomersID`) REFERENCES `customers` (`CustomersID`);

--
-- Các ràng buộc cho bảng `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`CustomersID`) REFERENCES `customers` (`CustomersID`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomersID`) REFERENCES `customers` (`CustomersID`);

--
-- Các ràng buộc cho bảng `ordersdetail`
--
ALTER TABLE `ordersdetail`
  ADD CONSTRAINT `ordersdetail_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `ordersdetail_ibfk_2` FOREIGN KEY (`OrdersID`) REFERENCES `orders` (`OrdersID`);

--
-- Các ràng buộc cho bảng `warehouse`
--
ALTER TABLE `warehouse`
  ADD CONSTRAINT `warehouse_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
