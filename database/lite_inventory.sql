-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2024 at 01:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lite_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(200) NOT NULL,
  `expense_store_id` varchar(200) NOT NULL,
  `expense_name` longtext NOT NULL,
  `expense_date` varchar(200) NOT NULL,
  `expense_amount` varchar(200) NOT NULL,
  `expense_details` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `expense_store_id`, `expense_name`, `expense_date`, `expense_amount`, `expense_details`) VALUES
(3, '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Salaries & Wages', '2024-01-31', '12000', 'Salaries & Wages For January 2024'),
(4, '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Rent', '2023-01-31', '4500', 'Rent Payment For January 2023'),
(6, '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Renovation cost', '2024-09-16', '4500', 'Renovation cost'),
(7, '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Sales & Marketing ', '2024-09-09', '12000', 'Sales & Marketing ');

-- --------------------------------------------------------

--
-- Table structure for table `hold_sales`
--

CREATE TABLE `hold_sales` (
  `hold_sale_id` int(11) NOT NULL,
  `hold_sale_number` varchar(200) DEFAULT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `product_code` varchar(200) DEFAULT NULL,
  `quantity` varchar(200) DEFAULT NULL,
  `product_sale_price` varchar(200) DEFAULT NULL,
  `product_description` longtext DEFAULT NULL,
  `product_id` varchar(200) DEFAULT NULL,
  `product_quantity_limit` varchar(200) DEFAULT NULL,
  `Discount` varchar(200) DEFAULT NULL,
  `hold_sale_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `inventory_product_id` varchar(200) NOT NULL,
  `inventory_qty_added` varchar(200) DEFAULT NULL,
  `inventory_date_added` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `inventory_product_id`, `inventory_qty_added`, `inventory_date_added`) VALUES
(8, 'bc6c00732260f1019ce95683e43bbac18e0551814935', '5', '2022-06-13 12:07:10'),
(9, 'ca7c79643e6c24abd6bbe89e28d9d861c1e70eb4', '50', '2022-06-14 10:05:45'),
(10, 'bb81ec2dd02f3d822b14f87d9a8e1e6474bdfd92', '2', '2024-08-05 15:48:22'),
(11, '3b81f20c9672dca2baeb2abadde257d67f4a643e', '10', '2024-08-06 15:46:54'),
(12, '3b81f20c9672dca2baeb2abadde257d67f4a643e', '10', '2024-08-06 16:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_points`
--

CREATE TABLE `loyalty_points` (
  `loyalty_points_id` int(11) NOT NULL,
  `loyalty_points_code` varchar(200) DEFAULT NULL,
  `loyalty_points_customer_name` varchar(200) DEFAULT NULL,
  `loyalty_points_customer_phone_no` varchar(200) DEFAULT NULL,
  `loyalty_points_count` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loyalty_points`
--

INSERT INTO `loyalty_points` (`loyalty_points_id`, `loyalty_points_code`, `loyalty_points_customer_name`, `loyalty_points_customer_phone_no`, `loyalty_points_count`) VALUES
(1, 'H1470', 'NA', 'NA', '223'),
(2, 'W2945', 'Erastus Katiwa', '0703685898', '9'),
(3, 'I6480', 'Ezekiel Mumo', '0712611207', '10'),
(4, 'W5867', 'Mwakavi', '0707037707', '13');

-- --------------------------------------------------------

--
-- Table structure for table `mailer_settings`
--

CREATE TABLE `mailer_settings` (
  `id` int(11) NOT NULL,
  `mailer_host` varchar(200) DEFAULT NULL,
  `mailer_port` varchar(200) DEFAULT NULL,
  `mailer_protocol` varchar(200) DEFAULT NULL,
  `mailer_username` varchar(200) DEFAULT NULL,
  `mailer_mail_from_name` varchar(200) DEFAULT NULL,
  `mailer_mail_from_email` varchar(200) DEFAULT NULL,
  `mailer_password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mailer_settings`
--

INSERT INTO `mailer_settings` (`id`, `mailer_host`, `mailer_port`, `mailer_protocol`, `mailer_username`, `mailer_mail_from_name`, `mailer_mail_from_email`, `mailer_password`) VALUES
(2, 'nativebeecare.co.ke', '465', 'ssl', 'noreply@nativebeecare.co.ke', 'Native BeeCare', 'Native BeeCare', '20Devlan@');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `merchantRequestID` varchar(254) DEFAULT NULL,
  `checkoutRequestID` varchar(254) DEFAULT NULL,
  `resultCode` varchar(254) DEFAULT NULL,
  `resultDesc` varchar(254) DEFAULT NULL,
  `amount` varchar(11) DEFAULT NULL,
  `mpesaReceiptNumber` varchar(254) DEFAULT NULL,
  `transactionDate` varchar(254) DEFAULT NULL,
  `phoneNumber` varchar(254) DEFAULT NULL,
  `payment_receipt_number` varchar(200) DEFAULT NULL,
  `payment_amount` varchar(200) DEFAULT NULL,
  `payment_txn_code` varchar(200) DEFAULT NULL,
  `payment_date_posted` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `payment_settings_id` int(11) NOT NULL,
  `payment_settings_store_id` varchar(200) NOT NULL,
  `payment_settings_means` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_settings`
--

INSERT INTO `payment_settings` (`payment_settings_id`, `payment_settings_store_id`, `payment_settings_means`) VALUES
(1, '6cf2d9a5407fa4e91b41ae4adc5dbd9d6ef2d8d88b58', 'Cash'),
(2, '68acbdd5a039350f5d8c3f3b67479190dfad17bdfda6', 'Cash'),
(3, 'fbc9cc3b63b9664f4a87cf573ddd579f26bc278ab2b2', 'Cash'),
(4, '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Cash'),
(5, 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(200) NOT NULL,
  `product_store_id` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_description` longtext DEFAULT NULL,
  `product_purchase_price` varchar(200) NOT NULL,
  `product_sale_price` varchar(200) NOT NULL,
  `product_quantity` varchar(200) NOT NULL,
  `product_quantity_limit` varchar(200) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `product_status` varchar(200) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_store_id`, `product_name`, `product_description`, `product_purchase_price`, `product_sale_price`, `product_quantity`, `product_quantity_limit`, `product_code`, `product_status`) VALUES
('00e2850d1f5062650fa3f08e358c804072c4aeab', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'BEEHIVE FRAME WIRE 2KGS', 'BEEHIVE FRAME WIRE 2KGS', '0', '1400', '200', '5', 'SKU-61457', 'active'),
('02e954e705dc7e6bc5f0ef16cc4b1286d7f9134d', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'MAKUENI ORGANIC PURE HONEY 1/2KG', 'MAKUENI ORGANIC PURE HONEY 1/2KG', '230', '400', '100', '2', 'SKU-08193', 'active'),
('038270499d72067d24c63163e18635a7b964335b', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', '3 FRAME HONEY EXTRACTOR MACHINE', '201SS barrel+201SS inner basket, Seamless welded stainless steel barrel with legs and a plastic honey gate.\r\nBarrel Dia: 37cm H:60cm\r\nInner basket size: 42*26cm', '17000', '30000', '17', '2', 'SKU-13489', 'active'),
('0472c25315266585075be26eff08d403d0830ecd', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'GLASS JAR HONEY 1KG', 'GLASS JAR HONEY 1KG', '0', '1000', '300', '5', 'SKU-67935', 'active'),
('05106d3582a847939933d5691221ea662a1ac49f309bff03', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Honey 50g', 'Honey jars samples of 50g', '15', '50', '496', '2', 'J6095', 'active'),
('08504fbf381f7a20ebb1e8edd90e731438f0e092', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', '3 FRAME HONEY EXTRACTOR MACHINE', '201SS barrel+201SS inner basket, Seamless welded stainless steel barrel with legs and a plastic honey gate._x000D_\\nBarrel Dia: 37cm H:60cm_x000D_\\nInner basket size: 42*26cm', '17000', '30000', '12', '2', 'SKU-13489', 'active'),
('0b0c4ab73047a10a4e7487d2aee2bcdaa1f57786', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', '20LITRES SETTLING TANK', '20LITRES SETTLING TANK', '0', '1500', '163', '5', 'SKU-68104', 'active'),
('0dd8579b27e52579a59152c6aca44d90e09bed2b', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'COMB HONEY  1KG', 'COMB HONEY  1KG', '0', '1000', '300', '5', 'SKU-19524', 'active'),
('106cde34242aefeb5c2e532b8fa6468ea92b8733', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'MAKUENI ORGANIC PURE HONEY 1/2KG', 'MAKUENI ORGANIC PURE HONEY 1/2KG', '230', '400', '998', '2', 'SKU-08193', 'active'),
('117f71d1c923b00b016818e13e6fe2660c19580f', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'DOUBLE SIEVE', 'DOUBLE SIEVE', '0', '2500', '197', '5', 'SKU-57136', 'active'),
('14ac102ef5358b5065615f05db13c88168c42ba6', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'Bee smoker, Stainless steel', 'Stainless steel, leather bellow_x000D_\r\nOverall height: 28cm_x000D_\r\nBarrel height: 19cm_x000D_\r\nBarrel diameter: 10.4cm_x000D_\r\nPer carton 9.3kg/carton', '1000', '2300', '145', '2', 'F3592', 'active'),
('1521d22a70fe024903061286acbda3279eef34a3', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'Honey Dipper', 'Wooden, pp bag foe each and  a net weight of 10g/pc', '50', '150', '95', '2', 'P3105', 'active'),
('187153cf1aeae9e967d697624de754eb7909e0e0', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HONEY IN JERICANS (WHOLESALE)', 'HONEY IN JERICANS (WHOLESALE)', '0', '700', '0', '2', 'SKU-07148', 'active'),
('19608688a962a39f30267d18c0abf073c3deadef7bb47ad1', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Bees wax', '', '450', '900', '198', '2', 'R5174', 'active'),
('1d66f4a850fa90626ae8481cb23ec97c693bce01', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'HONEY PRESS (Enclosed)', '12L wax press stainless _x000D_\\nStainless steel capping press and frame with removable carry bucket_x000D_\\nHeight: 60cm_x000D_\\nFence height: 27cm_x000D_\\nFence diameter: 24 cm', '14000', '28000', '12', '2', 'SKU-02351', 'active'),
('1f3ba0a95e1d9296a8cbc8e072775f8114efcc31', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HONEY PRESS (Enclosed)', '12L wax press stainless \r\nStainless steel capping press and frame with removable carry bucket\r\nHeight: 60cm\r\nFence height: 27cm\r\nFence diameter: 24 cm', '14,000', '28000', '12', '2', 'SKU-02351', 'active'),
('23615858e8a44b11df53268f71ea554f7b4899f6', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'UNCAPPING FORK', '21 needles bent or straight needles\r\nColor: Yellow\r\nLength: 20.5cm\r\nWeight: 50g/pc', '220', '450', '50', '2', 'SKU-07148', 'active'),
('23eadba32599e9e00354808d86279994f538e3b4', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', '20LITRES SETTLING TANK', '20LITRES SETTLING TANK', '0', '1500', '166', '5', 'SKU-68104', 'active'),
('258222dc152d290f389106eda58c783ff85c9da8', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'COTTON BEESUIT(standard)', 'COTTON BEESUIT ', '1600', '3500', '13', '2', 'SKU-78921', 'active'),
('2bd2494b822d3db0e1419e52d682c08ffaec55ac', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'BEE FEEDER', 'Entrance feeder, use water or soda bottle', '100', '300', '150', '2', 'SKU-79236', 'active'),
('2f620b67064c3e1038a242db973c8bb47435eadf', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'PLASTIC QUEEN EXCLUDER', '10 Frame Queen Excluder _x000D_\\nColor: white/yellow_x000D_\\nPlastic PE/PP_x000D_\\n42X50.9 yellow color', '0', '700', '160', '2', 'SKU-32589', 'active'),
('31736523a2f00440c7109acbbfd161516fa0fbca', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'PROPOLIS COLLECTOR', 'PROPOLIS COLLECTOR', '0', '800', '200', '5', 'SKU-24786', 'active'),
('32203ee141912a70991341d2ca620a3fd002495b416f7642', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Bee smoker, Stainless steel', 'Stainless steel, leather bellow\r\nOverall height: 28cm\r\nBarrel height: 19cm\r\nBarrel diameter: 10.4cm\r\nPer carton 9.3kg/carton', '1000', '2300', '19', '2', 'F3592', 'active'),
('32c2c036fd6a285675a2370392c0ad73b3c5fca1', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'LONG LANGSTROTH HIVE ', 'LONG LANGSTROTH HIVE ', '0', '7000', '1', '2', 'SKU-51876', 'active'),
('33bdbc95b0251e14c610b92589a5b057476f610f2c2347f5', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Leather Gloves', '', '300', '600', '19', '2', 'W5124', 'active'),
('3a27a97bfb7b006878ce9ce44b9e4296ecc66d7f', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'COMB HONEY  1KG', 'COMB HONEY  1KG', '350', '800', '498', '2', 'SKU-19524', 'active'),
('3b1623631e3a01ecc62608782e763084e8b10b54d5d642df', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Honey 200g', '', '90', '200', '500', '2', 'I3268', 'active'),
('3b81f20c9672dca2baeb2abadde257d67f4a643e', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'COTTON KHAKI BEESUIT', 'COTTON KHAKI BEESUIT', '2300', '3500', '5', '2', 'SKU-01698', 'active'),
('3c6468baa8ee48d45fb780bbf7db5b4faf200fdc', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'HONEY BUCKET HOLDER/BUCKET PERCH', 'HONEY BUCKET HOLDER/BUCKET PERCH', '120', '550', '10', '2', 'SKU-16974', 'active'),
('3ec9a3a35390ece478d352452d89ce7d9f9f1235', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'GLASS JAR HALF KG', 'GLASS JAR HALF KG', '0', '500', '300', '5', 'SKU-79803', 'active'),
('423ebff5d7b4ac6b92c40915d000f6b4b0369180', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'CONICAL SIEVE', 'Honey, Strainer, Conical Nylon strainer stainless steel ring', '100', '450', '50', '2', 'SKU-23159', 'active'),
('471da98b30f5f651a8c3c0f625a120a065309326', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'BEE POLLEN ', 'BEE POLLEN ', '0', '1500', '200', '5', 'SKU-51470', 'active'),
('4950b0dc655ba692359a5c353bcc4115b2312b0c', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'BEE BRUSH', 'BEE BRUSH', '0', '500', '198', '2', 'SKU-42061', 'active'),
('4be8f81737658e96995819341499246c3eb7edf2', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HYDRAULIC JACK HONEY PRESS', 'HYDRAULIC JACK HONEY PRESS', '0', '32000', '200', '5', 'SKU-97123', 'active'),
('4d5a09c093a2e956ecec91917a53292cd6c6dfcb141ddfcb', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Frame wire roll 1kg', '', '700', '1400', '1', '2', 'O8430', 'active'),
('4da57dedc6173910995d39750e95f1fd988a2113', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'CONICAL SIEVE', 'Honey, Strainer, Conical Nylon strainer stainless steel ring', '100', '450', '50', '2', 'SKU-23159', 'active'),
('4e2960ce3ac28065c8fa5f1e2c40795a9c0f1943', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'PLASTIC QUEEN EXCLUDER', '10 Frame Queen Excluder \r\nColor: white/yellow\r\nPlastic PE/PP\r\n42X50.9 yellow color', '0', '700', '160', '2', 'SKU-32589', 'active'),
('50db24028f6187edd44c9043b6a08ce98043004ac4f9f99c', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Beehive connector', 'Plastic', '25', '100', '0', '2', 'B2038', 'active'),
('52cf53275f063a64b27486ab0b66824de88fef6d', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'WAX SHEET', 'WAX SHEET', '0', '200', '300', '2', 'SKU-81504', 'active'),
('530af19f6b97efad3659959127718214f760ee17ed0f2f23', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Honey Dipper', 'Wooden, pp bag foe each and  a net weight of 10g/pc', '50', '150', '100', '2', 'P3105', 'active'),
('54fa878779a02f5346ce41f74a4833af775a7798', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', '3 LAYER VENTILATED  BEE SUIT ', 'Ventilated beekeeper suit with Round Hat/veil with veil zipper with elastic wrist and ankles ', '4000', '6500', '3', '2', 'SKU-52049', 'active'),
('55f256569b1268df50b4df4619d186f2c8988662', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', '3 LAYER VENTILATED  BEE SUIT ', 'Ventilated beekeeper suit with Round Hat/veil with veil zipper with elastic wrist and ankles ', '4000', '6500', '3', '2', 'SKU-52049', 'active'),
('5f22156923c8cf6a0afb064bb928e759422b60ef', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HONEY GATE', 'Honey gate', '0', '500', '50', '2', 'SKU-74501', 'active'),
('6068cdf71e138ed710bf682aa37dc050a2c3e1d3', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'WHITE GAMBOUTS', 'WHITE GAMBOUTS', '0', '1100', '300', '5', 'SKU-35924', 'active'),
('68151091dd4bc69fdf974f9d2430d5fd30f02917', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'BEE FEEDER', 'Entrance feeder, use water or soda bottle', '100', '300', '150', '2', 'SKU-79236', 'active'),
('6d721cfc07f7f02db13aed494695a65a976768e39c0bd8a5', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Candle ', '', '150', '200', '200', '2', 'G1928', 'active'),
('6ebaf9c55db2020d35994f5713738342f075bbc6', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'LANGSTROTH HIVE ', 'LANGSTROTH HIVE ', '0', '6500', '200', '5', 'SKU-58643', 'active'),
('7295e7f881e4710e39e85810624e06a005c14393', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HIVE TOOL(Stainless steel)', 'Stainless steel + leather bellow \r\nOverall height: 28cm\r\nBarrel height: 19cm\r\nBarrel diameter: 10.4cm', '220', '500', '150', '2', 'SKU-18532', 'active'),
('788cef6013441e9b0df740974c436ffbd01a457d', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', '4-FRAME HONEY EXTRACTOR(Manual)', '4 Frame manual extractor 201SS barrel + 201SS basket with legs and a plastic honey gate_x000D_\\nBarrel Dia: 47cm H: 60 cm_x000D_\\nInner basket size: 42*26 cm_x000D_\\nWeight 18kg per carton', '17000', '35000', '3', '2', 'SKU-72841', 'active'),
('7b9e14cecb107f9e94a0b487eb7acbf24b9c1ac78a7c51bf', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', '1/2 Kg Beeswax ', '', '230', '500', '50', '2', 'F3964', 'active'),
('7c1b7753042c1661c0daeb15b0fced3c837cc552', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'HIVE TOOL(Stainless steel)', 'Stainless steel + leather bellow _x000D_\\nOverall height: 28cm_x000D_\\nBarrel height: 19cm_x000D_\\nBarrel diameter: 10.4cm', '220', '500', '144', '2', 'SKU-18532', 'active'),
('7c25196ffdffa949345bb6899537c046f34375ee', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'DOUBLE SIEVE', 'DOUBLE SIEVE', '0', '2500', '200', '5', 'SKU-57136', 'active'),
('844320d99e700455f3832fd092e4a5b5dd6ae2f0f6003384', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Sateen Beesuit', 'Sateen beesuits', '1500', '2800', '15', '2', 'F4759', 'active'),
('851d312f6e628449030317ae20bdbec731140364dbae1b07', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Candle ', '', '50', '100', '200', '2', 'T1852', 'active'),
('86b943f2160930fb6f94e0f645a4d8c5aba70abf', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'WAX SHEET', 'WAX SHEET', '0', '200', '300', '2', 'SKU-81504', 'active'),
('8eab1303a375fc20aba6b3fadf9e64b239c633fb', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'Leather Gloves', 'Beekeeper Glove Soft Sheepskin, sleeve by cotton(yellow)', '230', '600', '50', '2', 'J3870', 'active'),
('908fa5d10dd83ee863e4fd1b1b092fe3f61891d8', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'SELF SPACING HIVE FRAMES ', 'SELF SPACING HIVE FRAMES ', '0', '120', '10000', '5', 'SKU-37108', 'active'),
('91230fd310a434b7dcc389ca18a88cddef64e49b', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'MAKUENI PURE HONEY 1KG', 'MAKUENI PURE HONEY 1KG', '0', '800', '200', '5', 'SKU-80197', 'active'),
('92954aacdf63bbb551db91ba9ac9373fa940eccd', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'HONEY SETTLING TANK', '50L storage tank _x000D_\\nseamless welded _x000D_\\n201 stainless steel_x000D_\\nplastic honey gate_x000D_\\nDiameter 37cm Height: 47cm', '6000', '18000', '2', '2', 'SKU-09863', 'active'),
('955de9faf44df08e8606e7311e57579d1d38d0a107bdfdc4', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Leather Gloves', 'Beekeeper Glove Soft Sheepskin, sleeve by cotton(yellow)', '230', '600', '50', '2', 'J3870', 'active'),
('98f08b231940baffd30e6d0e5b77c16c4b656c64', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'HYDRAULIC JACK HONEY PRESS', 'HYDRAULIC JACK HONEY PRESS', '0', '32000', '200', '5', 'SKU-97123', 'active'),
('9e26a86d297780b9cc76bfd9a416b6c8b49e7beb', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'Makueni Organic Honey 1KG', 'Pure Kenyan Honey sourced from Small-Holder Farmers in Makueni County 1KG', '450', '800', '196', '2', 'SKU-13894', 'active'),
('9fb1d870d54f722b0e3771133a12eb66d029dc60', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'SELF SPACING HIVE FRAMES ', 'SELF SPACING HIVE FRAMES ', '0', '120', '10000', '5', 'SKU-37108', 'active'),
('a081c0720a6d0183ff2a5d9c42e6618e2c0c6c25', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HONEY PRESS', 'HONEY PRESS', '0', '25000', '10', '5', 'SKU-65401', 'active'),
('a2172d32a86a27b47da6f54803a9d4b6655d161b', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'BEEHIVE FRAME GRIP', 'BEEHIVE FRAME GRIP', '0', '800', '200', '5', 'SKU-92056', 'active'),
('a32fadac675b737970fc9b1eb35c262350d083d8', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'GALVANISED HIVE TOOL', 'GALVANISED HIVE TOOL', '0', '400', '200', '5', 'SKU-60375', 'active'),
('a4d73fe64868ab7226afef1afb20fbb8c6100f7a', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'GALVANISED BEE SMOKER', 'GALVANISED BEE SMOKER', '0', '1500', '190', '5', 'SKU-80139', 'active'),
('a5201a1428db50aed622ba4ba644ded5b7954052', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'HONEY REFRACTOMETER', 'Honey refractometer, optic type', '2000', '3500', '6', '2', 'SKU-25430', 'active'),
('a84c962d667c8352e8147e2f258f5ce70312208e', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'LONG LANGSTROTH HIVE ', 'LONG LANGSTROTH HIVE ', '0', '7000', '1', '2', 'SKU-51876', 'active'),
('ab2758f323b55b0563435c7903e91d22681c56fd', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'BEE POLLEN ', 'BEE POLLEN ', '0', '1500', '200', '5', 'SKU-51470', 'active'),
('ae6d2bf3b913ddeb2004d46ec1c7a87bcd20286b', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'HONEY IN JERICANS (WHOLESALE)', 'HONEY IN JERICANS (WHOLESALE)', '0', '700', '0', '2', 'SKU-07148', 'active'),
('af39b8aa29bdc0a3fd4eef1e1cc6fc81ae2daff6', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'GLASS JAR HALF KG', 'GLASS JAR HALF KG', '0', '500', '300', '5', 'SKU-79803', 'active'),
('b1ea695b7695ab47b40271779affeeab8fc97a33', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'GALVANISED HIVE TOOL', 'GALVANISED HIVE TOOL', '0', '400', '200', '5', 'SKU-60375', 'active'),
('b243c24b87b5b17022ab32728ca3368e7f69f450', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', '3 Layered beesuit(standard)', 'COTTON BEESUIT ', '3000', '6000', '2', '2', 'SKU-78921', 'active'),
('b32b31281e70a603a0ddb639a3515f172cc5c44f', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'COTTON KHAKI BEESUIT', 'COTTON KHAKI BEESUIT', '2300', '4,000', '0', '2', 'SKU-01698', 'active'),
('bcb09caad63e2e72c68b259c8a4d6d3e728bb5da', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'GALVANISED BEE SMOKER', 'GALVANISED BEE SMOKER', '0', '1500', '200', '5', 'SKU-80139', 'active'),
('bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Makueni Organic Honey 1KG', 'Pure Kenyan Honey sourced from Small-Holder Farmers in Makueni County 1KG', '450', '800', '193', '2', 'SKU-13894', 'active'),
('c677fda184d063da7a8a88093fca0328437d7e40de52e8c7', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', '1/2 Kg Beeswax ', '', '230', '500', '49', '2', 'F3964', 'active'),
('caba2c819d36b9c0e045c7cb8b0edea06ec63228', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HONEY REFRACTOMETER', 'Honey refractometer, optic type', '2000', '3500', '6', '2', 'SKU-25430', 'active'),
('cb2499a3a83964b65dd2390534048e97b060c004', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HONEY SETTLING TANK', '50L storage tank \r\nseamless welded \r\n201 stainless steel\r\nplastic honey gate\r\nDiameter 37cm Height: 47cm', '6000', '18000', '2', '2', 'SKU-09863', 'active'),
('cd8ee467990b208ea4cf8345e4d0f2bef6dad4a337d41529', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Rubber Gloves', '', '350', '500', '10', '2', 'S4629', 'active'),
('cefd5a7a4bc4d3ac250116abe055f8657a0beff8', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'Beehive connector', 'Plastic', '25', '100', '400', '2', 'B2038', 'active'),
('d102b289675a48f96a3144b67316f909cf49ba7d', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'BEE LURE ', '30 Mls  bee attractant bottle', '600', '1000', '13', '2', 'SKU-69205', 'active'),
('d20e091232dc9214344e74779c55ee7f2a78d1c7', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'BEE BRUSH', 'BEE BRUSH', '0', '450', '193', '5', 'SKU-42061', 'active'),
('d23ed14baa555841ca5f0c3c6f7c54d2ec364aebdc488322', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Hive metallic stands', 'Metallic stands.', '700', '1500', '2', '2', 'F3976', 'active'),
('d28a54afe8b8e5c7dd177ddbb8e5bfb22b3d2480', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HONEY BUCKET HOLDER/BUCKET PERCH', 'HONEY BUCKET HOLDER/BUCKET PERCH', '120', '550', '10', '2', 'SKU-16974', 'active'),
('d3a617ef670e1f7c2d6b2214b5d2be0fd3611e25', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'SQUEEZE HONEY 1/2KG', 'SQUEEZE HONEY 1/2KG', '0', '450', '300', '5', 'SKU-43710', 'active'),
('d3cbcdd957bb154c50b565ebbfb645546b6387b0', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'PROPOLIS SUSPENSION', 'PROPOLIS SUSPENSION', '0', '1000', '195', '5', 'SKU-19743', 'active'),
('d5f2dc9fed8a086fa1c179bbbd75850a04f8b324', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'LANGSTROTH HIVE ', 'LANGSTROTH HIVE ', '0', '6500', '200', '5', 'SKU-58643', 'active'),
('da2285e1dcbb2e655362486244a4abaedecba460be3afde4', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'Sateen Beesuits', 'Sateen material beesuit', '1500', '2700', '6', '2', 'H3978', 'active'),
('deae5ea871bcbd3588c8d441952494b89d078e27', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'BEE LURE ', '30 Mls  bee attractant bottle', '600', '1000', '13', '2', 'SKU-69205', 'active'),
('dff0f9290cd701b9cd272f035a64a60f504ab4957e3c36d9', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'Bees wax', '', '450', '900', '194', '2', 'W3695', 'active'),
('e5d02be4f8f9d33a1473f195733b981e03998261', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'HONEY PRESS', 'HONEY PRESS', '0', '25000', '10', '5', 'SKU-65401', 'active'),
('e9332e8668c8dce05c6cf5d3bbff8756e7c2ce15', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'PROPOLIS COLLECTOR', 'PROPOLIS COLLECTOR', '0', '800', '200', '5', 'SKU-24786', 'active'),
('ec15f88596970ea5108fae57ad7ea1f9258f9a70', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'SQUEEZE HONEY 1/2KG', 'SQUEEZE HONEY 1/2KG', '200', '450', '1000', '2', 'SKU-43710', 'active'),
('ec367221c3df24d8c1160da0b81766003c52346b5b115b2a', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Honey 100g', '', '50', '100', '496', '2', 'P2987', 'active'),
('ec85e1876cceb268eb5fe9a2a1888b004f3cab1b', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'WHITE GAMBOUTS', 'WHITE GAMBOUTS', '0', '1100', '300', '5', 'SKU-35924', 'active'),
('ecb89dd22465dbeed695df7abc4e25faf387be33', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'BEEHIVE FRAME WIRE 2KGS', 'BEEHIVE FRAME WIRE 2KGS', '1200', '2000', '2', '2', 'SKU-61457', 'active'),
('f54b3ad816041f89bb85531731e7c86cd1e292a0', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'MAKUENI PURE HONEY 1KG', 'MAKUENI PURE HONEY 1KG', '0', '800', '198', '5', 'SKU-80197', 'active'),
('f5a82601a5a2d86d19c48e23381a134de424b6b4', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'BEEHIVE FRAME GRIP', 'BEEHIVE FRAME GRIP', '0', '800', '200', '5', 'SKU-92056', 'active'),
('f815fbdd07fcc12db61606b73223686a22f5d29e', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', '4-FRAME HONEY EXTRACTOR(Manual)', '4 Frame manual extractor 201SS barrel + 201SS basket with legs and a plastic honey gate\r\nBarrel Dia: 47cm H: 60 cm\r\nInner basket size: 42*26 cm\r\nWeight 18kg per carton', '17000', '35000', '0', '2', 'SKU-72841', 'active'),
('f8e045de8174b3cae3af46a5a18054dd80e137ab982fcd7b', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Candle ', '', '100', '150', '200', '2', 'M4126', 'active'),
('f90b88a747a7aa04ed4c566d4a447eb9fc441f3d', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'GLASS JAR HONEY 1KG', 'GLASS JAR HONEY 1KG', '0', '1000', '300', '5', 'SKU-67935', 'active'),
('fa9bcc7af5ceea0d9677b6c643dd2d69475449f2c9f48d44', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'Rubber Gloves', '', '350', '500', '3', '2', 'C4391', 'active'),
('fc045ef77be5e424b36045729367e8f7f1a94447', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'HONEY GATE', 'Honey gate', '0', '500', '50', '2', 'SKU-74501', 'active'),
('fd424713755181f54fa396db03dd44be4d1c3781', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'PROPOLIS SUSPENSION', 'PROPOLIS SUSPENSION', '0', '1000', '195', '5', 'SKU-19743', 'active'),
('fefe31b6ce07cddb70e26e25cd74057ba3827d6a', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'UNCAPPING FORK', '21 needles bent or straight needles_x000D_\\nColor: Yellow_x000D_\\nLength: 20.5cm_x000D_\\nWeight: 50g/pc', '220', '450', '50', '2', 'SKU-07148', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_customization`
--

CREATE TABLE `receipt_customization` (
  `receipt_id` int(11) NOT NULL,
  `receipt_store_id` varchar(200) NOT NULL,
  `receipt_header_content` longtext DEFAULT NULL,
  `receipt_footer_content` longtext DEFAULT NULL,
  `receipt_show_barcode` varchar(200) DEFAULT NULL,
  `show_customer` varchar(200) DEFAULT NULL,
  `allow_discounts` varchar(200) DEFAULT NULL,
  `allow_loyalty_points` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receipt_customization`
--

INSERT INTO `receipt_customization` (`receipt_id`, `receipt_store_id`, `receipt_header_content`, `receipt_footer_content`, `receipt_show_barcode`, `show_customer`, `allow_discounts`, `allow_loyalty_points`) VALUES
(1, 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'Native Beecare <br>\r\ninfo@nativeneecare.co.ke <br>\r\n+254 718280564 <br>\r\nAlong Outer Ring Road <br>\r\nEmbakasi - Nairobi\r\n', 'Goods Once Sold Cannot Be Returned', 'false', 'false', 'true', 'false'),
(2, '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Native Beecare <br>\r\ninfo@nativebeecare.co.ke <br>\r\n+254 718280564', 'Goods Once Sold cant be returned \r\n\r\n       ', 'false', 'true', 'true', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `sale_product_id` varchar(200) NOT NULL,
  `sale_user_id` varchar(200) NOT NULL,
  `sale_quantity` varchar(200) DEFAULT NULL,
  `sale_datetime` timestamp NOT NULL DEFAULT current_timestamp(),
  `sale_customer_name` varchar(200) DEFAULT NULL,
  `sale_customer_phoneno` varchar(200) DEFAULT NULL,
  `sale_receipt_no` varchar(200) DEFAULT NULL,
  `sale_cart_number` varchar(200) DEFAULT NULL,
  `sale_payment_method` varchar(200) DEFAULT NULL,
  `sale_payment_amount` varchar(2000) DEFAULT NULL,
  `sale_payment_status` varchar(200) NOT NULL DEFAULT 'notpaid',
  `sale_discount` varchar(200) DEFAULT '0',
  `sale_credit_expected_date` varchar(200) DEFAULT NULL,
  `sale_transaction_ref` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `sale_product_id`, `sale_user_id`, `sale_quantity`, `sale_datetime`, `sale_customer_name`, `sale_customer_phoneno`, `sale_receipt_no`, `sale_cart_number`, `sale_payment_method`, `sale_payment_amount`, `sale_payment_status`, `sale_discount`, `sale_credit_expected_date`, `sale_transaction_ref`) VALUES
(2, '1521d22a70fe024903061286acbda3279eef34a3', 'STF-7245', '5', '2024-09-06 08:54:12', 'Erastus Katiwa', '0703685898', '2945', NULL, 'Mobile Payment', '100', 'paid', '50', '', ''),
(3, 'd20e091232dc9214344e74779c55ee7f2a78d1c7', 'STF-7245', '1', '2024-09-06 08:54:12', 'Erastus Katiwa', '0703685898', '2945', NULL, 'Mobile Payment', '400', 'paid', '50', '', ''),
(4, '14ac102ef5358b5065615f05db13c88168c42ba6', 'STF-7245', '1', '2024-09-06 08:54:12', 'Erastus Katiwa', '0703685898', '2945', NULL, 'Mobile Payment', '2050', 'paid', '250', '', ''),
(5, '7c1b7753042c1661c0daeb15b0fced3c837cc552', 'STF-7245', '1', '2024-09-06 08:57:40', 'NA', 'NA', '8259', NULL, 'Mobile Payment', '450', 'paid', '50', '', ''),
(6, '9e26a86d297780b9cc76bfd9a416b6c8b49e7beb', 'STF-7245', '4', '2024-09-06 08:57:40', 'NA', 'NA', '8259', NULL, 'Mobile Payment', '700', 'paid', '100', '', ''),
(7, '08504fbf381f7a20ebb1e8edd90e731438f0e092', 'STF-7245', '2', '2024-09-06 09:00:06', 'NA', 'NA', '5046', NULL, 'Mobile Payment', '30000', 'paid', '0', '', ''),
(8, '08504fbf381f7a20ebb1e8edd90e731438f0e092', 'STF-7245', '1', '2024-09-06 09:01:36', 'Ezekiel Mumo', '0712611207', '6480', NULL, 'Mobile Payment', '28500', 'paid', '1500', '', ''),
(9, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2022-07-17 11:19:00', 'N/A', 'N/A', '1', NULL, 'Cash', '78', 'paid', '0', NULL, NULL),
(10, '52cf53275f063a64b27486ab0b66824de88fef6d', 'STF-4913', '1', '2022-09-30 13:01:00', 'N/A', 'N/A', '2', NULL, 'Cash', '540', 'paid', '0', NULL, NULL),
(11, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-01-24 07:47:00', 'N/A', 'N/A', '3', NULL, 'Cash', '250', 'paid', '0', NULL, NULL),
(12, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-02-06 07:55:00', 'N/A', 'N/A', '4', NULL, 'Cash', '250', 'paid', '0', NULL, NULL),
(13, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-02-08 07:56:00', 'N/A', 'N/A', '5', NULL, 'Cash', '250', 'paid', '0', NULL, NULL),
(14, '32c2c036fd6a285675a2370392c0ad73b3c5fca1', 'STF-4913', '1', '2023-02-09 08:02:00', 'N/A', 'N/A', '6', NULL, 'Cash', '4000', 'paid', '0', NULL, NULL),
(15, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-02-10 08:04:00', 'N/A', 'N/A', '7', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(16, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-02-16 08:05:00', 'N/A', 'N/A', '8', NULL, 'Cash', '1500', 'paid', '0', NULL, NULL),
(17, '258222dc152d290f389106eda58c783ff85c9da8', 'STF-4913', '1', '2023-02-17 08:07:00', 'N/A', 'N/A', '9', NULL, 'Cash', '2500', 'paid', '0', NULL, NULL),
(18, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-02-20 08:11:00', 'N/A', 'N/A', '10', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(19, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-02-21 08:13:00', 'N/A', 'N/A', '11', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(20, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-02-23 08:14:00', 'N/A', 'N/A', '12', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(21, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-02-24 08:15:00', 'N/A', 'N/A', '13', NULL, 'Cash', '1400', 'paid', '0', NULL, NULL),
(22, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-03-01 08:17:00', 'N/A', 'N/A', '14', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(23, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-03-02 08:19:00', 'N/A', 'N/A', '15', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(24, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-03-03 08:21:00', 'N/A', 'N/A', '17', NULL, 'Cash', '120', 'paid', '0', NULL, NULL),
(25, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-03-07 08:24:00', 'N/A', 'N/A', '18', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(26, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 comb 1kg', 'STF-4913', '1', '2023-03-17 08:29:00', 'N/A', 'N/A', '22', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(27, '32c2c036fd6a285675a2370392c0ad73b3c5fca1', 'STF-4913', '1', '2023-03-20 08:31:00', 'N/A', 'N/A', '23', NULL, 'Cash', '4500', 'paid', '0', NULL, NULL),
(28, '32c2c036fd6a285675a2370392c0ad73b3c5fca1', 'STF-4913', '1', '2023-03-21 08:33:00', 'N/A', 'N/A', '24', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(29, '32c2c036fd6a285675a2370392c0ad73b3c5fca1', 'STF-4913', '1', '2023-03-25 08:36:00', 'N/A', 'N/A', '26', NULL, 'Cash', '8500', 'paid', '0', NULL, NULL),
(30, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-03-27 08:40:00', 'N/A', 'N/A', '28', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(31, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-03-30 08:41:00', 'N/A', 'N/A', '29', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(32, '32c2c036fd6a285675a2370392c0ad73b3c5fca1', 'STF-4913', '1', '2023-04-03 08:41:00', 'N/A', 'N/A', '30', NULL, 'Cash', '4000', 'paid', '0', NULL, NULL),
(33, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-04-03 08:43:00', 'N/A', 'N/A', '31', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(34, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-04-17 08:56:00', 'N/A', 'N/A', '37', NULL, 'Cash', '120', 'paid', '0', NULL, NULL),
(35, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-04-17 08:58:00', 'N/A', 'N/A', '38', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(36, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-04-18 08:59:00', 'N/A', 'N/A', '39', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(37, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-04-18 09:00:00', 'N/A', 'N/A', '40', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(38, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-04-22 09:01:00', 'N/A', 'N/A', '41', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(39, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-04-25 09:12:00', 'N/A', 'N/A', '46', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(40, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-04-27 09:14:00', 'N/A', 'N/A', '48', NULL, 'Cash', '280', 'paid', '0', NULL, NULL),
(41, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-04-27 09:16:00', 'N/A', 'N/A', '49', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(42, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-04-27 09:17:00', 'N/A', 'N/A', '50', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(43, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-05-01 09:18:00', 'N/A', 'N/A', '51', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(44, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-05-03 09:22:00', 'N/A', 'N/A', '54', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(45, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-05-04 09:23:00', 'N/A', 'N/A', '55', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(46, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 8.5kgs', 'STF-4913', '1', '2023-05-05 09:24:00', 'N/A', 'N/A', '56', NULL, 'Cash', '5100', 'paid', '0', NULL, NULL),
(47, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 6kgs', 'STF-4913', '1', '2023-05-05 09:26:00', 'N/A', 'N/A', '57', NULL, 'Cash', '3600', 'paid', '0', NULL, NULL),
(48, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 jars 1kg(10)', 'STF-4913', '1', '2023-05-05 09:27:00', 'N/A', 'N/A', '58', NULL, 'Cash', '450', 'paid', '0', NULL, NULL),
(49, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 jars 500g(10)', 'STF-4913', '1', '2023-05-05 09:28:00', 'N/A', 'N/A', '59', NULL, 'Cash', '350', 'paid', '0', NULL, NULL),
(50, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-05-06 09:29:00', 'N/A', 'N/A', '60', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(51, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-05-10 09:34:00', 'N/A', 'N/A', '62', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(52, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 10kg', 'STF-4913', '1', '2023-05-10 09:34:00', 'N/A', 'N/A', '63', NULL, 'Cash', '6000', 'paid', '0', NULL, NULL),
(53, 'Used Comb bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 12kg', 'STF-4913', '1', '2023-05-11 09:35:00', 'N/A', 'N/A', '64', NULL, 'Cash', '1200', 'paid', '0', NULL, NULL),
(54, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-05-11 09:39:00', 'N/A', 'N/A', '66', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(55, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-05-12 09:40:00', 'N/A', 'N/A', '68', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(56, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-05-12 09:41:00', 'N/A', 'N/A', '69', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(57, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-05-13 09:44:00', 'N/A', 'N/A', '72', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(58, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2.5kg', 'STF-4913', '1', '2023-05-16 09:47:00', 'N/A', 'N/A', '73', NULL, 'Cash', '1700', 'paid', '0', NULL, NULL),
(59, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-05-16 09:50:00', 'N/A', 'N/A', '74', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(60, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kg', 'STF-4913', '1', '2023-05-22 09:51:00', 'N/A', 'N/A', '75', NULL, 'Cash', '4000', 'paid', '0', NULL, NULL),
(61, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-05-23 09:51:00', 'N/A', 'N/A', '76', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(62, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-05-25 09:52:00', 'N/A', 'N/A', '77', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(63, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-05-25 09:53:00', 'N/A', 'N/A', '78', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(64, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-05-31 09:55:00', 'N/A', 'N/A', '80', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(65, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-05-31 09:55:00', 'N/A', 'N/A', '81', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(66, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-06-02 10:02:00', 'N/A', 'N/A', '87', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(67, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-06-02 10:03:00', 'N/A', 'N/A', '88', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(68, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2023-06-02 10:04:00', 'N/A', 'N/A', '89', NULL, 'Cash', '1600', 'paid', '0', NULL, NULL),
(69, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2023-06-02 10:17:00', 'N/A', 'N/A', '90', NULL, 'Cash', '1400', 'paid', '0', NULL, NULL),
(70, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-06-06 10:18:00', 'N/A', 'N/A', '91', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(71, 'Local hive tool 1pcs', 'STF-4913', '1', '2023-06-07 10:19:00', 'N/A', 'N/A', '92', NULL, 'Cash', '500', 'paid', '0', NULL, NULL),
(72, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc250 g', 'STF-4913', '1', '2023-06-07 10:19:00', 'N/A', 'N/A', '93', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(73, '258222dc152d290f389106eda58c783ff85c9da8', 'STF-4913', '1', '2023-06-07 10:20:00', 'N/A', 'N/A', '94', NULL, 'Cash', '3000', 'paid', '0', NULL, NULL),
(74, '258222dc152d290f389106eda58c783ff85c9da8', 'STF-4913', '1', '2023-06-07 10:21:00', 'N/A', 'N/A', '95', NULL, 'Cash', '2500', 'paid', '0', NULL, NULL),
(75, '258222dc152d290f389106eda58c783ff85c9da8', 'STF-4913', '1', '2023-06-07 10:24:00', 'N/A', 'N/A', '96', NULL, 'Cash', '2500', 'paid', '0', NULL, NULL),
(76, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-06-09 10:25:00', 'N/A', 'N/A', '97', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(77, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-06-10 10:26:00', 'N/A', 'N/A', '98', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(78, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc250 g', 'STF-4913', '1', '2023-06-10 10:27:00', 'N/A', 'N/A', '99', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(79, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-06-10 10:28:00', 'N/A', 'N/A', '100', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(80, '258222dc152d290f389106eda58c783ff85c9da8', 'STF-4913', '1', '2023-06-10 10:29:00', 'N/A', 'N/A', '101', NULL, 'Cash', '720', 'paid', '0', NULL, NULL),
(81, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-06-12 10:30:00', 'N/A', 'N/A', '102', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(82, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-06-13 10:31:00', 'N/A', 'N/A', '103', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(83, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 15kg', 'STF-4913', '1', '2023-06-15 10:31:00', 'N/A', 'N/A', '104', NULL, 'Cash', '9450', 'paid', '0', NULL, NULL),
(84, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kg', 'STF-4913', '1', '2023-06-16 10:33:00', 'N/A', 'N/A', '105', NULL, 'Cash', '2400', 'paid', '0', NULL, NULL),
(85, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-06-16 10:34:00', 'N/A', 'N/A', '106', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(86, '258222dc152d290f389106eda58c783ff85c9da8', 'STF-4913', '1', '2023-06-16 10:34:00', 'N/A', 'N/A', '107', NULL, 'Cash', '5928', 'paid', '0', NULL, NULL),
(87, '258222dc152d290f389106eda58c783ff85c9da8', 'STF-4913', '1', '2023-06-16 10:36:00', 'N/A', 'N/A', '108', NULL, 'Cash', '1140', 'paid', '0', NULL, NULL),
(88, '258222dc152d290f389106eda58c783ff85c9da8', 'STF-4913', '1', '2023-06-16 10:37:00', 'N/A', 'N/A', '109', NULL, 'Cash', '1596', 'paid', '0', NULL, NULL),
(89, '258222dc152d290f389106eda58c783ff85c9da8', 'STF-4913', '1', '2023-06-16 10:38:00', 'N/A', 'N/A', '110', NULL, 'Cash', '3440', 'paid', '0', NULL, NULL),
(90, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-06-17 10:39:00', 'N/A', 'N/A', '111', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(91, '258222dc152d290f389106eda58c783ff85c9da8', 'STF-4913', '1', '2023-06-17 10:40:00', 'N/A', 'N/A', '112', NULL, 'Cash', '2800', 'paid', '0', NULL, NULL),
(92, '258222dc152d290f389106eda58c783ff85c9da8', 'STF-4913', '1', '2023-06-17 10:41:00', 'N/A', 'N/A', '113', NULL, 'Cash', '450', 'paid', '0', NULL, NULL),
(93, '258222dc152d290f389106eda58c783ff85c9da8', 'STF-4913', '1', '2023-06-17 10:42:00', 'N/A', 'N/A', '114', NULL, 'Cash', '2200', 'paid', '0', NULL, NULL),
(94, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-06-19 10:43:00', 'N/A', 'N/A', '115', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(95, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-06-19 10:46:00', 'N/A', 'N/A', '116', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(96, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-06-20 10:47:00', 'N/A', 'N/A', '117', NULL, 'Cash', '750', 'paid', '0', NULL, NULL),
(97, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-06-21 10:48:00', 'N/A', 'N/A', '118', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(98, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-06-21 10:50:00', 'N/A', 'N/A', '119', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(99, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-06-26 10:51:00', 'N/A', 'N/A', '120', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(100, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-06-29 10:52:00', 'N/A', 'N/A', '121', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(101, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-06-29 10:53:00', 'N/A', 'N/A', '122', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(102, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-06-29 10:53:00', 'N/A', 'N/A', '123', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(103, '4950b0dc655ba692359a5c353bcc4115b2312b0c', 'STF-4913', '1', '2023-06-29 10:55:00', 'N/A', 'N/A', '124', NULL, 'Cash', '4000', 'paid', '0', NULL, NULL),
(104, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2023-07-03 11:02:00', 'N/A', 'N/A', '125', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(105, '4950b0dc655ba692359a5c353bcc4115b2312b0c', 'STF-4913', '1', '2023-07-04 11:03:00', 'N/A', 'N/A', '126', NULL, 'Cash', '1300', 'paid', '0', NULL, NULL),
(106, '4950b0dc655ba692359a5c353bcc4115b2312b0c', 'STF-4913', '1', '2023-07-04 11:05:00', 'N/A', 'N/A', '127', NULL, 'Cash', '900', 'paid', '0', NULL, NULL),
(107, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-07-04 11:06:00', 'N/A', 'N/A', '128', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(108, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-07-06 11:07:00', 'N/A', 'N/A', '129', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(109, '4950b0dc655ba692359a5c353bcc4115b2312b0c', 'STF-4913', '1', '2023-07-07 11:08:00', 'N/A', 'N/A', '130', NULL, 'Cash', '3500', 'paid', '0', NULL, NULL),
(110, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-07-10 11:08:00', 'N/A', 'N/A', '131', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(111, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-07-10 11:09:00', 'N/A', 'N/A', '132', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(112, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2023-07-11 11:10:00', 'N/A', 'N/A', '133', NULL, 'Cash', '1500', 'paid', '0', NULL, NULL),
(113, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-07-11 11:11:00', 'N/A', 'N/A', '134', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(114, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-07-12 11:12:00', 'N/A', 'N/A', '135', NULL, 'Cash', '120', 'paid', '0', NULL, NULL),
(115, '4950b0dc655ba692359a5c353bcc4115b2312b0c', 'STF-4913', '1', '2023-07-13 11:14:00', 'N/A', 'N/A', '136', NULL, 'Cash', '1200', 'paid', '0', NULL, NULL),
(116, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-07-13 11:15:00', 'N/A', 'N/A', '137', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(117, '4950b0dc655ba692359a5c353bcc4115b2312b0c', 'STF-4913', '1', '2023-07-13 11:16:00', 'N/A', 'N/A', '138', NULL, 'Cash', '3000', 'paid', '0', NULL, NULL),
(118, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kgs', 'STF-4913', '1', '2023-07-13 11:17:00', 'N/A', 'N/A', '139', NULL, 'Cash', '3000', 'paid', '0', NULL, NULL),
(119, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-07-17 11:18:00', 'N/A', 'N/A', '140', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(120, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-07-17 11:22:00', 'N/A', 'N/A', '141', NULL, 'Cash', '780', 'paid', '0', NULL, NULL),
(121, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-07-17 11:22:00', 'N/A', 'N/A', '142', NULL, 'Cash', '780', 'paid', '0', NULL, NULL),
(122, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-07-17 11:23:00', 'N/A', 'N/A', '143', NULL, 'Cash', '820', 'paid', '0', NULL, NULL),
(123, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-07-18 11:25:00', 'N/A', 'N/A', '144', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(124, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-07-22 11:26:00', 'N/A', 'N/A', '145', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(125, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-07-24 11:28:00', 'N/A', 'N/A', '146', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(126, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-07-26 11:29:00', 'N/A', 'N/A', '147', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(127, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-07-26 11:29:00', 'N/A', 'N/A', '148', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(128, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-07-26 11:30:00', 'N/A', 'N/A', '149', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(129, '4950b0dc655ba692359a5c353bcc4115b2312b0c', 'STF-4913', '1', '2023-07-26 11:31:00', 'N/A', 'N/A', '150', NULL, 'Cash', '500', 'paid', '0', NULL, NULL),
(130, '4950b0dc655ba692359a5c353bcc4115b2312b0c', 'STF-4913', '1', '2023-07-26 11:32:00', 'N/A', 'N/A', '151', NULL, 'Cash', '900', 'paid', '0', NULL, NULL),
(131, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-07-27 11:33:00', 'N/A', 'N/A', '152', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(132, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-07-27 11:35:00', 'N/A', 'N/A', '153', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(133, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-07-27 11:36:00', 'N/A', 'N/A', '154', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(134, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-07-27 11:37:00', 'N/A', 'N/A', '155', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(135, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kg', 'STF-4913', '1', '2023-07-27 11:38:00', 'N/A', 'N/A', '156', NULL, 'Cash', '2400', 'paid', '0', NULL, NULL),
(136, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-07-28 11:39:00', 'N/A', 'N/A', '157', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(137, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-07-31 11:40:00', 'N/A', 'N/A', '158', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(138, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-07-31 11:40:00', 'N/A', 'N/A', '159', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(139, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-07-31 11:42:00', 'N/A', 'N/A', '160', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(140, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-07-31 11:44:00', 'N/A', 'N/A', '161', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(141, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 gate 1pcs', 'STF-4913', '1', '2023-07-31 11:45:00', 'N/A', 'N/A', '162', NULL, 'Cash', '500', 'paid', '0', NULL, NULL),
(142, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-08-01 11:48:00', 'N/A', 'N/A', '164', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(143, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-08-02 11:49:00', 'N/A', 'N/A', '165', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(144, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-08-03 11:50:00', 'N/A', 'N/A', '166', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(145, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2023-08-04 11:53:00', 'N/A', 'N/A', '168', NULL, 'Cash', '1500', 'paid', '0', NULL, NULL),
(146, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-08-07 11:54:00', 'N/A', 'N/A', '170', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(147, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-08-07 11:55:00', 'N/A', 'N/A', '171', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(148, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 4kg', 'STF-4913', '1', '2023-08-09 11:56:00', 'N/A', 'N/A', '172', NULL, 'Cash', '3200', 'paid', '0', NULL, NULL),
(149, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-08-10 11:58:00', 'N/A', 'N/A', '174', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(150, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2023-08-10 12:00:00', 'N/A', 'N/A', '175', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(151, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-08-10 12:01:00', 'N/A', 'N/A', '176', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(152, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-08-11 12:02:00', 'N/A', 'N/A', '177', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(153, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-08-11 12:03:00', 'N/A', 'N/A', '178', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(154, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2023-08-12 12:03:00', 'N/A', 'N/A', '179', NULL, 'Cash', '1600', 'paid', '0', NULL, NULL),
(155, 'Comb 106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-08-12 12:04:00', 'N/A', 'N/A', '180', NULL, 'Cash', '500', 'paid', '0', NULL, NULL),
(156, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1.5kg', 'STF-4913', '1', '2023-08-14 12:07:00', 'N/A', 'N/A', '182', NULL, 'Cash', '1200', 'paid', '0', NULL, NULL),
(157, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-08-15 12:08:00', 'N/A', 'N/A', '183', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(158, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-08-16 12:09:00', 'N/A', 'N/A', '184', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(159, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-08-17 12:13:00', 'N/A', 'N/A', '189', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(160, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-08-17 12:15:00', 'N/A', 'N/A', '191', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(161, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-08-21 12:18:00', 'N/A', 'N/A', '194', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(162, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-08-21 12:19:00', 'N/A', 'N/A', '195', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(163, '32c2c036fd6a285675a2370392c0ad73b3c5fca1s 2pcs', 'STF-4913', '1', '2023-08-24 12:20:00', 'N/A', 'N/A', '196', NULL, 'Cash', '9000', 'paid', '0', NULL, NULL),
(164, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-08-24 12:21:00', 'N/A', 'N/A', '197', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(165, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-08-24 12:22:00', 'N/A', 'N/A', '198', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(166, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-08-24 12:23:00', 'N/A', 'N/A', '199', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(167, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-08-24 12:23:00', 'N/A', 'N/A', '200', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(168, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-08-30 12:28:00', 'N/A', 'N/A', '203', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(169, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-08-31 12:28:00', 'N/A', 'N/A', '204', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(170, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-09-04 12:30:00', 'N/A', 'N/A', '205', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(171, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-09-05 12:31:00', 'N/A', 'N/A', '206', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(172, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2023-09-05 12:31:00', 'N/A', 'N/A', '207', NULL, 'Cash', '1600', 'paid', '0', NULL, NULL),
(173, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-09-06 12:33:00', 'N/A', 'N/A', '209', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(174, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-09-06 12:34:00', 'N/A', 'N/A', '210', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(175, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2023-09-06 12:35:00', 'N/A', 'N/A', '211', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(176, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2023-09-07 12:36:00', 'N/A', 'N/A', '212', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(177, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-09-09 12:36:00', 'N/A', 'N/A', '213', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(178, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-09-13 12:40:00', 'N/A', 'N/A', '216', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(179, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-09-14 12:41:00', 'N/A', 'N/A', '217', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(180, '32c2c036fd6a285675a2370392c0ad73b3c5fca1s 5pcs', 'STF-4913', '1', '2023-09-16 12:43:00', 'N/A', 'N/A', '218', NULL, 'Cash', '25000', 'paid', '0', NULL, NULL),
(181, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-09-19 12:45:00', 'N/A', 'N/A', '220', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(182, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-09-20 12:46:00', 'N/A', 'N/A', '221', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(183, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2.5kg', 'STF-4913', '1', '2023-09-20 12:47:00', 'N/A', 'N/A', '222', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(184, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-09-20 12:49:00', 'N/A', 'N/A', '224', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(185, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-09-22 12:50:00', 'N/A', 'N/A', '225', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(186, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-09-22 12:50:00', 'N/A', 'N/A', '226', NULL, 'Cash', '700', 'paid', '0', NULL, NULL),
(187, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-09-22 12:51:00', 'N/A', 'N/A', '227', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(188, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-09-23 12:53:00', 'N/A', 'N/A', '229', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(189, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-09-25 12:54:00', 'N/A', 'N/A', '230', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(190, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-09-28 12:55:00', 'N/A', 'N/A', '231', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(191, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-09-28 12:56:00', 'N/A', 'N/A', '232', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(192, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-09-29 12:57:00', 'N/A', 'N/A', '233', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(193, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2023-09-29 12:57:00', 'N/A', 'N/A', '234', NULL, 'Cash', '1600', 'paid', '0', NULL, NULL),
(194, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-09-29 12:58:00', 'N/A', 'N/A', '235', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(195, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-10-02 13:07:00', 'N/A', 'N/A', '239', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(196, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-10-02 13:08:00', 'N/A', 'N/A', '240', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(197, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kg', 'STF-4913', '1', '2023-10-03 13:10:00', 'N/A', 'N/A', '242', NULL, 'Cash', '2400', 'paid', '0', NULL, NULL),
(198, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-10-04 13:14:00', 'N/A', 'N/A', '245', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(199, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-10-04 13:15:00', 'N/A', 'N/A', '246', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(200, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-10-05 13:14:00', 'N/A', 'N/A', '247', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(201, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-10-06 14:25:00', 'N/A', 'N/A', '251', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(202, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-10-08 14:26:00', 'N/A', 'N/A', '252', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(203, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-10-10 14:27:00', 'N/A', 'N/A', '253', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(204, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-10-10 14:28:00', 'N/A', 'N/A', '254', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(205, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-10-10 14:31:00', 'N/A', 'N/A', '257', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(206, '32c2c036fd6a285675a2370392c0ad73b3c5fca1s 10pcs', 'STF-4913', '1', '2023-10-14 14:32:00', 'N/A', 'N/A', '258', NULL, 'Cash', '50000', 'paid', '0', NULL, NULL),
(207, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-10-15 14:33:00', 'N/A', 'N/A', '259', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(208, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-10-15 14:35:00', 'N/A', 'N/A', '260', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(209, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-10-15 14:36:00', 'N/A', 'N/A', '261', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(210, '3b81f20c9672dca2baeb2abadde257d67f4a643e', 'STF-4913', '1', '2023-10-15 14:36:00', 'N/A', 'N/A', '262', NULL, 'Cash', '500', 'paid', '0', NULL, NULL),
(211, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kg', 'STF-4913', '1', '2023-10-15 14:37:00', 'N/A', 'N/A', '263', NULL, 'Cash', '2400', 'paid', '0', NULL, NULL),
(212, '3b81f20c9672dca2baeb2abadde257d67f4a643e', 'STF-4913', '1', '2023-10-19 14:39:00', 'N/A', 'N/A', '265', NULL, 'Cash', '150000', 'paid', '0', NULL, NULL),
(213, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2023-10-22 14:40:00', 'N/A', 'N/A', '266', NULL, 'Cash', '1500', 'paid', '0', NULL, NULL),
(214, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-10-22 14:40:00', 'N/A', 'N/A', '267', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(215, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-10-25 14:45:00', 'N/A', 'N/A', '269', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(216, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2023-10-26 14:47:00', 'N/A', 'N/A', '270', NULL, 'Cash', '1600', 'paid', '0', NULL, NULL),
(217, '3b81f20c9672dca2baeb2abadde257d67f4a643e', 'STF-4913', '1', '2023-10-31 14:51:00', 'N/A', 'N/A', '273', NULL, 'Cash', '32700', 'paid', '0', NULL, NULL),
(218, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2023-11-04 17:50:00', 'N/A', 'N/A', '274', NULL, 'Cash', '1400', 'paid', '0', NULL, NULL),
(219, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2023-11-07 17:51:00', 'N/A', 'N/A', '275', NULL, 'Cash', '1600', 'paid', '0', NULL, NULL),
(220, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-11-07 17:52:00', 'N/A', 'N/A', '276', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(221, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 4kg', 'STF-4913', '1', '2023-11-08 17:53:00', 'N/A', 'N/A', '277', NULL, 'Cash', '3000', 'paid', '0', NULL, NULL),
(222, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kg', 'STF-4913', '1', '2023-11-09 17:56:00', 'N/A', 'N/A', '281', NULL, 'Cash', '2100', 'paid', '0', NULL, NULL),
(223, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-11-14 17:57:00', 'N/A', 'N/A', '282', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(224, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-11-23 18:04:00', 'N/A', 'N/A', '285', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(225, '32c2c036fd6a285675a2370392c0ad73b3c5fca1s 10 pcs', 'STF-4913', '1', '2023-11-24 18:06:00', 'N/A', 'N/A', '286', NULL, 'Cash', '45000', 'paid', '0', NULL, NULL),
(226, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-11-28 18:13:00', 'N/A', 'N/A', '291', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(227, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-11-30 18:13:00', 'N/A', 'N/A', '292', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(228, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-11-30 18:14:00', 'N/A', 'N/A', '293', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(229, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-12-07 18:17:00', 'N/A', 'N/A', '295', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(230, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-12-07 18:20:00', 'N/A', 'N/A', '296', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(231, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-12-07 18:20:00', 'N/A', 'N/A', '297', NULL, 'Cash', '600', 'paid', '0', NULL, NULL),
(232, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-12-07 18:21:00', 'N/A', 'N/A', '298', NULL, 'Cash', '600', 'paid', '0', NULL, NULL),
(233, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-12-14 18:54:00', 'N/A', 'N/A', '299', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(234, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-12-15 18:55:00', 'N/A', 'N/A', '300', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(235, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-12-16 18:58:00', 'N/A', 'N/A', '302', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(236, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-12-18 18:59:00', 'N/A', 'N/A', '303', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(237, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-12-20 19:02:00', 'N/A', 'N/A', '306', NULL, 'Cash', '750', 'paid', '0', NULL, NULL),
(238, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-12-21 19:02:00', 'N/A', 'N/A', '307', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(239, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-12-21 19:03:00', 'N/A', 'N/A', '308', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(240, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-12-21 19:04:00', 'N/A', 'N/A', '309', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(241, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-12-22 19:04:00', 'N/A', 'N/A', '310', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(242, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-12-22 19:05:00', 'N/A', 'N/A', '311', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(243, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-12-22 19:06:00', 'N/A', 'N/A', '312', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(244, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2023-12-22 19:07:00', 'N/A', 'N/A', '313', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(245, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-12-22 19:07:00', 'N/A', 'N/A', '314', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(246, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-12-23 19:08:00', 'N/A', 'N/A', '315', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(247, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-12-23 19:11:00', 'N/A', 'N/A', '318', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(248, '32c2c036fd6a285675a2370392c0ad73b3c5fca1s 20pcs', 'STF-4913', '1', '2023-12-23 19:12:00', 'N/A', 'N/A', '319', NULL, 'Cash', '90000', 'paid', '0', NULL, NULL),
(249, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-12-23 19:14:00', 'N/A', 'N/A', '320', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(250, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-12-24 19:18:00', 'N/A', 'N/A', '324', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(251, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-12-24 19:19:00', 'N/A', 'N/A', '325', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(252, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-12-24 19:19:00', 'N/A', 'N/A', '326', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(253, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 12kg', 'STF-4913', '1', '2023-12-24 19:20:00', 'N/A', 'N/A', '327', NULL, 'Cash', '7800', 'paid', '0', NULL, NULL),
(254, '106cde34242aefeb5c2e532b8fa6468ea92b8733(18)', 'STF-4913', '1', '2023-12-24 19:21:00', 'N/A', 'N/A', '328', NULL, 'Cash', '6300', 'paid', '0', NULL, NULL),
(255, '106cde34242aefeb5c2e532b8fa6468ea92b8733(18)', 'STF-4913', '1', '2023-12-24 19:24:00', 'N/A', 'N/A', '329', NULL, 'Cash', '4500', 'paid', '0', NULL, NULL),
(256, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-12-27 19:25:00', 'N/A', 'N/A', '330', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(257, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2023-12-31 19:27:00', 'N/A', 'N/A', '332', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(258, '32c2c036fd6a285675a2370392c0ad73b3c5fca1s 3pcs', 'STF-4913', '1', '2023-12-31 19:29:00', 'N/A', 'N/A', '333', NULL, 'Cash', '14100', 'paid', '0', NULL, NULL),
(259, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2023-12-31 19:30:00', 'N/A', 'N/A', '334', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(260, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 tinc 1pcs', 'STF-4913', '1', '2024-01-02 04:50:00', 'N/A', 'N/A', '336', NULL, 'Cash', '700', 'paid', '0', NULL, NULL),
(261, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-01-02 04:53:00', 'N/A', 'N/A', '337', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(262, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-02 04:54:00', 'N/A', 'N/A', '338', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(263, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-03 04:55:00', 'N/A', 'N/A', '340', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(264, '3b81f20c9672dca2baeb2abadde257d67f4a643e', 'STF-4913', '1', '2024-01-04 04:56:00', 'N/A', 'N/A', '341', NULL, 'Cash', '900', 'paid', '0', NULL, NULL),
(265, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-04 04:57:00', 'N/A', 'N/A', '342', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(266, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-05 04:57:00', 'N/A', 'N/A', '343', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(267, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-05 04:58:00', 'N/A', 'N/A', '344', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(268, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-06 04:59:00', 'N/A', 'N/A', '345', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(269, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-06 05:01:00', 'N/A', 'N/A', '348', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(270, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-01-06 05:01:00', 'N/A', 'N/A', '349', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(271, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-06 05:02:00', 'N/A', 'N/A', '350', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(272, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-08 05:02:00', 'N/A', 'N/A', '351', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(273, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-08 05:03:00', 'N/A', 'N/A', '352', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(274, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-09 05:04:00', 'N/A', 'N/A', '353', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(275, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-09 05:04:00', 'N/A', 'N/A', '354', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(276, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-01-11 05:12:00', 'N/A', 'N/A', '364', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(277, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-13 05:17:00', 'N/A', 'N/A', '370', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(278, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-14 05:18:00', 'N/A', 'N/A', '371', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(279, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-14 05:18:00', 'N/A', 'N/A', '372', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(280, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-15 05:19:00', 'N/A', 'N/A', '373', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(281, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-15 05:19:00', 'N/A', 'N/A', '374', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(282, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-15 05:20:00', 'N/A', 'N/A', '375', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(283, '3b81f20c9672dca2baeb2abadde257d67f4a643e', 'STF-4913', '1', '2024-01-15 05:21:00', 'N/A', 'N/A', '376', NULL, 'Cash', '2500', 'paid', '0', NULL, NULL),
(284, '3b81f20c9672dca2baeb2abadde257d67f4a643e', 'STF-4913', '1', '2024-01-15 05:21:00', 'N/A', 'N/A', '377', NULL, 'Cash', '2500', 'paid', '0', NULL, NULL),
(285, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-15 05:22:00', 'N/A', 'N/A', '378', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(286, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-15 05:23:00', 'N/A', 'N/A', '379', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(287, '3b81f20c9672dca2baeb2abadde257d67f4a643e', 'STF-4913', '1', '2024-01-16 05:23:00', 'N/A', 'N/A', '380', NULL, 'Cash', '700', 'paid', '0', NULL, NULL),
(288, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-01-16 05:24:00', 'N/A', 'N/A', '381', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(289, 'Comb 106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-16 05:25:00', 'N/A', 'N/A', '382', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(290, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-17 05:26:00', 'N/A', 'N/A', '383', NULL, 'Cash', '700', 'paid', '0', NULL, NULL),
(291, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-17 05:26:00', 'N/A', 'N/A', '384', NULL, 'Cash', '700', 'paid', '0', NULL, NULL),
(292, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-17 05:27:00', 'N/A', 'N/A', '385', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(293, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-18 05:28:00', 'N/A', 'N/A', '386', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(294, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 4kg', 'STF-4913', '1', '2024-01-18 05:28:00', 'N/A', 'N/A', '387', NULL, 'Cash', '3200', 'paid', '0', NULL, NULL),
(295, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-18 05:29:00', 'N/A', 'N/A', '388', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(296, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-18 05:29:00', 'N/A', 'N/A', '389', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(297, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-18 05:30:00', 'N/A', 'N/A', '390', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(298, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-01-19 05:32:00', 'N/A', 'N/A', '393', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(299, '32c2c036fd6a285675a2370392c0ad73b3c5fca1s 5pcs', 'STF-4913', '1', '2024-01-19 05:33:00', 'N/A', 'N/A', '394', NULL, 'Cash', '25000', 'paid', '0', NULL, NULL),
(300, 'Stand 5pcs', 'STF-4913', '1', '2024-01-19 05:34:00', 'N/A', 'N/A', '395', NULL, 'Cash', '6500', 'paid', '0', NULL, NULL),
(301, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-19 05:35:00', 'N/A', 'N/A', '396', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(302, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-19 05:35:00', 'N/A', 'N/A', '397', NULL, 'Cash', '700', 'paid', '0', NULL, NULL),
(303, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1.5kg', 'STF-4913', '1', '2024-01-20 05:37:00', 'N/A', 'N/A', '399', NULL, 'Cash', '1200', 'paid', '0', NULL, NULL),
(304, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-20 05:38:00', 'N/A', 'N/A', '400', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(305, '32c2c036fd6a285675a2370392c0ad73b3c5fca1 1pcs', 'STF-4913', '1', '2024-01-20 05:39:00', 'N/A', 'N/A', '402', NULL, 'Cash', '5000', 'paid', '0', NULL, NULL),
(306, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-01-21 05:40:00', 'N/A', 'N/A', '403', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(307, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-22 05:42:00', 'N/A', 'N/A', '406', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(308, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-01-23 05:43:00', 'N/A', 'N/A', '407', NULL, 'Cash', '1500', 'paid', '0', NULL, NULL),
(309, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-23 05:43:00', 'N/A', 'N/A', '408', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(310, 'Comb 106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-24 05:46:00', 'N/A', 'N/A', '411', NULL, 'Cash', '500', 'paid', '0', NULL, NULL),
(311, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-25 05:46:00', 'N/A', 'N/A', '412', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(312, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-01-25 05:47:00', 'N/A', 'N/A', '413', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(313, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-26 05:47:00', 'N/A', 'N/A', '414', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(314, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-01-26 05:48:00', 'N/A', 'N/A', '415', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(315, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-26 05:49:00', 'N/A', 'N/A', '416', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(316, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-26 05:49:00', 'N/A', 'N/A', '417', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(317, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-27 05:52:00', 'N/A', 'N/A', '420', NULL, 'Cash', '800', 'paid', '0', NULL, NULL);
INSERT INTO `sales` (`sale_id`, `sale_product_id`, `sale_user_id`, `sale_quantity`, `sale_datetime`, `sale_customer_name`, `sale_customer_phoneno`, `sale_receipt_no`, `sale_cart_number`, `sale_payment_method`, `sale_payment_amount`, `sale_payment_status`, `sale_discount`, `sale_credit_expected_date`, `sale_transaction_ref`) VALUES
(318, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc28kg', 'STF-4913', '1', '2024-01-29 05:56:00', 'N/A', 'N/A', '425', NULL, 'Cash', '16800', 'paid', '0', NULL, NULL),
(319, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-01-29 06:18:00', 'N/A', 'N/A', '427', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(320, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-01-30 06:22:00', 'N/A', 'N/A', '432', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(321, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-01-30 06:24:00', 'N/A', 'N/A', '434', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(322, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-02-01 06:46:00', 'N/A', 'N/A', '447', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(323, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-02-05 07:02:00', 'N/A', 'N/A', '466', NULL, 'Cash', '1600', 'paid', '0', NULL, NULL),
(324, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-02-09 07:18:00', 'N/A', 'N/A', '483', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(325, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-02-10 07:20:00', 'N/A', 'N/A', '487', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(326, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-02-17 07:38:00', 'N/A', 'N/A', '513', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(327, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-02-19 07:43:00', 'N/A', 'N/A', '517', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(328, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-02-24 07:53:00', 'N/A', 'N/A', '538', NULL, 'Cash', '700', 'paid', '0', NULL, NULL),
(329, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-02-24 07:53:00', 'N/A', 'N/A', '545', NULL, 'Cash', '1300', 'paid', '0', NULL, NULL),
(330, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 62kg', 'STF-4913', '1', '2024-02-29 08:03:00', 'N/A', 'N/A', '551', NULL, 'Cash', '29800', 'paid', '0', NULL, NULL),
(331, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2.5kg', 'STF-4913', '1', '2024-03-01 08:05:00', 'N/A', 'N/A', '553', NULL, 'Cash', '2000', 'paid', '0', NULL, NULL),
(332, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-03-05 08:09:00', 'N/A', 'N/A', '558', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(333, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-03-09 08:11:00', 'N/A', 'N/A', '562', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(334, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kg', 'STF-4913', '1', '2024-03-09 08:11:00', 'N/A', 'N/A', '563', NULL, 'Cash', '2700', 'paid', '0', NULL, NULL),
(335, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-03-11 08:13:00', 'N/A', 'N/A', '569', NULL, 'Cash', '650', 'paid', '0', NULL, NULL),
(336, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2, 1kg', 'STF-4913', '1', '2024-03-16 09:18:00', 'N/A', 'N/A', '571', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(337, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-03-16 11:05:00', 'N/A', 'N/A', '575', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(338, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-03-16 11:05:00', 'N/A', 'N/A', '577', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(339, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2, 1kg', 'STF-4913', '1', '2024-03-18 09:50:00', 'N/A', 'N/A', '582', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(340, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2, 500g@3', 'STF-4913', '1', '2024-03-19 06:14:00', 'N/A', 'N/A', '586', NULL, 'Cash', '1200', 'paid', '0', NULL, NULL),
(341, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2,1kg', 'STF-4913', '1', '2024-03-19 06:16:00', 'N/A', 'N/A', '587', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(342, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2, 1kg,500g', 'STF-4913', '1', '2024-03-19 06:29:00', 'N/A', 'N/A', '588', NULL, 'Mobile Money', '1200', 'paid', '0', NULL, NULL),
(343, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1.5kg', 'STF-4913', '1', '2024-03-19 11:08:00', 'N/A', 'N/A', '589', NULL, 'Cash', '1200', 'paid', '0', NULL, NULL),
(344, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2(3)', 'STF-4913', '1', '2024-03-19 11:08:00', 'N/A', 'N/A', '594', NULL, 'Cash', '1200', 'paid', '0', NULL, NULL),
(345, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-03-19 11:08:00', 'N/A', 'N/A', '595', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(346, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-03-21 11:12:00', 'N/A', 'N/A', '596', NULL, 'Cash', '1600', 'paid', '0', NULL, NULL),
(347, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2,50g', 'STF-4913', '1', '2024-03-21 14:51:00', 'N/A', 'N/A', '599', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(348, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2,2kgs', 'STF-4913', '1', '2024-03-21 14:52:00', 'N/A', 'N/A', '600', NULL, 'Mobile Money', '1600', 'paid', '0', NULL, NULL),
(349, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-03-22 11:14:00', 'N/A', 'N/A', '602', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(350, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2,50g', 'STF-4913', '1', '2024-03-22 14:04:00', 'N/A', 'N/A', '605', NULL, 'Mobile Money', '50', 'paid', '0', NULL, NULL),
(351, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2,1kg', 'STF-4913', '1', '2024-03-23 07:12:00', 'N/A', 'N/A', '606', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(352, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-03-23 11:15:00', 'N/A', 'N/A', '608', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(353, '106cde34242aefeb5c2e532b8fa6468ea92b8733(2)', 'STF-4913', '1', '2024-03-25 11:16:00', 'N/A', 'N/A', '611', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(354, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2,500g@2', 'STF-4913', '1', '2024-03-25 14:51:00', 'N/A', 'N/A', '613', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(355, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2,500g@2', 'STF-4913', '1', '2024-03-25 14:54:00', 'N/A', 'N/A', '614', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(356, 'Comb bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-03-26 11:18:00', 'N/A', 'N/A', '615', NULL, 'Cash', '1000', 'paid', '0', NULL, NULL),
(357, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2', 'STF-4913', '1', '2024-03-27 11:22:00', 'N/A', 'N/A', '618', NULL, 'Cash', '500', 'paid', '0', NULL, NULL),
(358, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2,500g,,,classic bottle', 'STF-4913', '1', '2024-03-27 15:12:00', 'N/A', 'N/A', '619', NULL, NULL, '500', 'paid', '0', NULL, NULL),
(359, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2', 'STF-4913', '1', '2024-03-28 11:22:00', 'N/A', 'N/A', '622', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(360, 'Bee fd424713755181f54fa396db03dd44be4d1c3781 250ml', 'STF-4913', '1', '2024-03-28 11:22:00', 'N/A', 'N/A', '623', NULL, 'Cash', '1000', 'paid', '0', NULL, NULL),
(361, 'Bee fd424713755181f54fa396db03dd44be4d1c3781 20mls', 'STF-4913', '1', '2024-03-28 11:22:00', 'N/A', 'N/A', '624', NULL, 'Cash', '700', 'paid', '0', NULL, NULL),
(362, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-03-28 11:26:00', 'N/A', 'N/A', '625', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(363, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2, 1kg', 'STF-4913', '1', '2024-03-28 14:49:00', 'N/A', 'N/A', '626', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(364, 'Bee fd424713755181f54fa396db03dd44be4d1c3781 suspension,', 'STF-4913', '1', '2024-03-28 14:50:00', 'N/A', 'N/A', '628', NULL, 'Mobile Money', '1700', 'paid', '0', NULL, NULL),
(365, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2,500g', 'STF-4913', '1', '2024-03-28 14:51:00', 'N/A', 'N/A', '629', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(366, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2, 100g', 'STF-4913', '1', '2024-03-28 14:52:00', 'N/A', 'N/A', '630', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(367, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-03-29 11:26:00', 'N/A', 'N/A', '632', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(368, 'Two 1/2 kgs of bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-03-29 13:00:00', 'N/A', 'N/A', '633', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(369, '32c2c036fd6a285675a2370392c0ad73b3c5fca1s', 'STF-4913', '1', '2024-03-31 19:31:00', 'N/A', 'N/A', '637', NULL, 'Cash', '4700', 'paid', '0', NULL, NULL),
(370, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 kgs', 'STF-4913', '1', '2024-04-01 14:06:00', 'N/A', 'N/A', '638', NULL, 'Mobile Money', '3200', 'paid', '0', NULL, NULL),
(371, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-03 12:12:00', 'N/A', 'N/A', '639', NULL, 'Mobile Money', '650', 'paid', '0', NULL, NULL),
(372, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-04-03 12:15:00', 'N/A', 'N/A', '640', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(373, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-05 13:39:00', 'N/A', 'N/A', '650', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(374, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 18kg', 'STF-4913', '1', '2024-04-05 13:40:00', 'N/A', 'N/A', '651', NULL, 'Cash', '11700', 'paid', '0', NULL, NULL),
(375, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 7kg', 'STF-4913', '1', '2024-04-05 13:43:00', 'N/A', 'N/A', '652', NULL, 'Cash', '4550', 'paid', '0', NULL, NULL),
(376, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-04-05 13:45:00', 'N/A', 'N/A', '653', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(377, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-04-05 13:50:00', 'N/A', 'N/A', '654', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(378, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-04-05 13:51:00', 'N/A', 'N/A', '655', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(379, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-06 06:00:00', 'N/A', 'N/A', '656', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(380, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-06 11:58:00', 'N/A', 'N/A', '657', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(381, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kg', 'STF-4913', '1', '2024-04-06 12:03:00', 'N/A', 'N/A', '658', NULL, 'Mobile Money', '3500', 'paid', '0', NULL, NULL),
(382, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-04-06 13:39:00', 'N/A', 'N/A', '659', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(383, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-04-08 12:02:00', 'N/A', 'N/A', '661', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(384, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-08 12:11:00', 'N/A', 'N/A', '662', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(385, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-08 12:12:00', 'N/A', 'N/A', '663', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(386, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-08 12:13:00', 'N/A', 'N/A', '664', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(387, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-08 12:14:00', 'N/A', 'N/A', '665', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(388, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-09 12:15:00', 'N/A', 'N/A', '666', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(389, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-04-09 12:16:00', 'N/A', 'N/A', '667', NULL, 'Mobile Money', '1600', 'paid', '0', NULL, NULL),
(390, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-04-10 12:24:00', 'N/A', 'N/A', '671', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(391, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-04-10 12:56:00', 'N/A', 'N/A', '675', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(392, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-10 17:25:00', 'N/A', 'N/A', '676', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(393, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-10 17:27:00', 'N/A', 'N/A', '677', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(394, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-10 17:31:00', 'N/A', 'N/A', '678', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(395, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-04-10 17:33:00', 'N/A', 'N/A', '679', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(396, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-04-11 17:40:00', 'N/A', 'N/A', '685', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(397, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kg', 'STF-4913', '1', '2024-04-11 17:41:00', 'N/A', 'N/A', '687', NULL, 'Cash', '3400', 'paid', '0', NULL, NULL),
(398, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 4kg', 'STF-4913', '1', '2024-04-12 08:16:00', 'N/A', 'N/A', '688', NULL, 'Cash', '2600', 'paid', '0', NULL, NULL),
(399, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-12 08:53:00', 'N/A', 'N/A', '693', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(400, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-12 17:43:00', 'N/A', 'N/A', '694', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(401, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kg', 'STF-4913', '1', '2024-04-12 17:44:00', 'N/A', 'N/A', '695', NULL, 'Mobile Money', '2400', 'paid', '0', NULL, NULL),
(402, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-13 17:45:00', 'N/A', 'N/A', '696', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(403, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-13 17:45:00', 'N/A', 'N/A', '697', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(404, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-04-13 17:46:00', 'N/A', 'N/A', '698', NULL, 'Cash', '1300', 'paid', '0', NULL, NULL),
(405, 'Comb bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-13 17:47:00', 'N/A', 'N/A', '699', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(406, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-13 17:48:00', 'N/A', 'N/A', '700', NULL, 'Cash', '660', 'paid', '0', NULL, NULL),
(407, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-16 05:24:00', 'N/A', 'N/A', '704', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(408, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-16 14:26:00', 'N/A', 'N/A', '705', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(409, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2  5kg', 'STF-4913', '1', '2024-04-16 14:27:00', 'N/A', 'N/A', '706', NULL, 'Mobile Money', '3250', 'paid', '0', NULL, NULL),
(410, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-04-19 13:37:00', 'N/A', 'N/A', '712', NULL, 'Cash', '1300', 'paid', '0', NULL, NULL),
(411, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-04-20 13:38:00', 'N/A', 'N/A', '715', NULL, 'Cash', '1600', 'paid', '0', NULL, NULL),
(412, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-20 13:38:00', 'N/A', 'N/A', '716', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(413, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-04-22 05:41:00', 'N/A', 'N/A', '717', NULL, 'Cash', '1600', 'paid', '0', NULL, NULL),
(414, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-22 05:41:00', 'N/A', 'N/A', '718', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(415, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-22 05:41:00', 'N/A', 'N/A', '719', NULL, 'Cash', '500', 'paid', '0', NULL, NULL),
(416, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-22 05:41:00', 'N/A', 'N/A', '720', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(417, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-23 05:43:00', 'N/A', 'N/A', '721', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(418, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-23 05:43:00', 'N/A', 'N/A', '722', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(419, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-23 05:43:00', 'N/A', 'N/A', '723', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(420, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-24 05:45:00', 'N/A', 'N/A', '724', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(421, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-24 05:45:00', 'N/A', 'N/A', '725', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(422, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-24 05:45:00', 'N/A', 'N/A', '726', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(423, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-25 12:30:00', 'N/A', 'N/A', '727', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(424, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-25 12:30:00', 'N/A', 'N/A', '728', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(425, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 4kg', 'STF-4913', '1', '2024-04-25 12:30:00', 'N/A', 'N/A', '729', NULL, 'Mobile Money', '3200', 'paid', '0', NULL, NULL),
(426, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-04-25 12:30:00', 'N/A', 'N/A', '730', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(427, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kg', 'STF-4913', '1', '2024-04-25 12:30:00', 'N/A', 'N/A', '731', NULL, 'Cash', '1950', 'paid', '0', NULL, NULL),
(428, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-26 12:34:00', 'N/A', 'N/A', '734', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(429, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-26 12:34:00', 'N/A', 'N/A', '735', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(430, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kg', 'STF-4913', '1', '2024-04-26 12:34:00', 'N/A', 'N/A', '736', NULL, 'Cash', '3250', 'paid', '0', NULL, NULL),
(431, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-26 12:34:00', 'N/A', 'N/A', '737', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(432, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-27 12:38:00', 'N/A', 'N/A', '741', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(433, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-27 12:38:00', 'N/A', 'N/A', '743', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(434, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-27 12:38:00', 'N/A', 'N/A', '744', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(435, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2 kg', 'STF-4913', '1', '2024-04-28 12:30:00', 'N/A', 'N/A', '745', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(436, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-04-29 12:37:00', 'N/A', 'N/A', '746', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(437, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-29 12:37:00', 'N/A', 'N/A', '747', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(438, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-29 12:37:00', 'N/A', 'N/A', '748', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(439, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-04-30 12:39:00', 'N/A', 'N/A', '750', NULL, 'Mobile Money', '1300', 'paid', '0', NULL, NULL),
(440, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-04-30 12:39:00', 'N/A', 'N/A', '751', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(441, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-04-30 12:39:00', 'N/A', 'N/A', '752', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(442, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-30 12:39:00', 'N/A', 'N/A', '756', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(443, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-04-30 12:39:00', 'N/A', 'N/A', '757', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(444, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50gsample', 'STF-4913', '1', '2024-05-01 06:06:00', 'N/A', 'N/A', '758', NULL, 'Cash', '0', 'paid', '0', NULL, NULL),
(445, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-01 12:44:00', 'N/A', 'N/A', '759', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(446, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-01 12:44:00', 'N/A', 'N/A', '760', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(447, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-01 12:44:00', 'N/A', 'N/A', '761', NULL, 'Cash', '150', 'paid', '0', NULL, NULL),
(448, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-05-01 13:53:00', 'N/A', 'N/A', '762', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(449, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-01 13:53:00', 'N/A', 'N/A', '763', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(450, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1300', 'STF-4913', '1', '2024-05-01 13:56:00', 'N/A', 'N/A', '764', NULL, 'Cash', '1300', 'paid', '0', NULL, NULL),
(451, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-01 14:28:00', 'N/A', 'N/A', '765', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(452, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g (4) sample', 'STF-4913', '1', '2024-05-02 06:06:00', 'N/A', 'N/A', '766', NULL, 'Cash', '0', 'paid', '0', NULL, NULL),
(453, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-02 13:04:00', 'N/A', 'N/A', '768', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(454, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-02 13:04:00', 'N/A', 'N/A', '769', NULL, 'Cash', '700', 'paid', '0', NULL, NULL),
(455, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-02 13:04:00', 'N/A', 'N/A', '770', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(456, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-02 13:04:00', 'N/A', 'N/A', '771', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(457, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-02 13:04:00', 'N/A', 'N/A', '772', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(458, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-05-03 13:04:00', 'N/A', 'N/A', '774', NULL, 'Mobile Money', '1600', 'paid', '0', NULL, NULL),
(459, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-03 13:04:00', 'N/A', 'N/A', '775', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(460, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-03 13:04:00', 'N/A', 'N/A', '776', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(461, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-05-05 11:21:00', 'N/A', 'N/A', '777', NULL, 'Cash', '1300', 'paid', '0', NULL, NULL),
(462, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-06 11:22:00', 'N/A', 'N/A', '778', NULL, 'Mobile Money', '650', 'paid', '0', NULL, NULL),
(463, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-05-06 11:22:00', 'N/A', 'N/A', '779', NULL, 'Mobile Money', '1600', 'paid', '0', NULL, NULL),
(464, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-06 11:22:00', 'N/A', 'N/A', '780', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(465, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-06 11:22:00', 'N/A', 'N/A', '781', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(466, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-05-07 11:24:00', 'N/A', 'N/A', '782', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(467, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-07 11:24:00', 'N/A', 'N/A', '783', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(468, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-07 11:24:00', 'N/A', 'N/A', '788', NULL, 'Mobile Money', '500', 'paid', '0', NULL, NULL),
(469, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-07 11:24:00', 'N/A', 'N/A', '789', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(470, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-07 11:24:00', 'N/A', 'N/A', '790', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(471, 'Bee suit 1pcs,gloves 1pcs', 'STF-4913', '1', '2024-05-08 11:29:00', 'N/A', 'N/A', '791', NULL, 'Mobile Money', '2700', 'paid', '0', NULL, NULL),
(472, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-08 11:29:00', 'N/A', 'N/A', '792', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(473, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-09 13:03:00', 'N/A', 'N/A', '795', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(474, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-09 13:03:00', 'N/A', 'N/A', '796', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(475, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kg', 'STF-4913', '1', '2024-05-09 13:03:00', 'N/A', 'N/A', '797', NULL, 'Mobile Money', '3250', 'paid', '0', NULL, NULL),
(476, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-09 13:03:00', 'N/A', 'N/A', '798', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(477, 'Stingless 32c2c036fd6a285675a2370392c0ad73b3c5fca1  1pcs', 'STF-4913', '1', '2024-05-09 13:03:00', 'N/A', 'N/A', '799', NULL, 'Mobile Money', '6000', 'paid', '0', NULL, NULL),
(478, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-09 13:03:00', 'N/A', 'N/A', '800', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(479, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 super 1pcs', 'STF-4913', '1', '2024-05-11 13:10:00', 'N/A', 'N/A', '802', NULL, 'Mobile Money', '2300', 'paid', '0', NULL, NULL),
(480, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-11 13:10:00', 'N/A', 'N/A', '803', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(481, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-11 13:11:00', 'N/A', 'N/A', '804', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(482, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-11 13:11:00', 'N/A', 'N/A', '805', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(483, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-11 13:13:00', 'N/A', 'N/A', '806', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(484, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-11 13:13:00', 'N/A', 'N/A', '807', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(485, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-11 13:13:00', 'N/A', 'N/A', '808', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(486, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-13 05:10:00', 'N/A', 'N/A', '810', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(487, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g(10)', 'STF-4913', '1', '2024-05-13 05:10:00', 'N/A', 'N/A', '812', NULL, 'Mobile Money', '250', 'paid', '0', NULL, NULL),
(488, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-13 05:10:00', 'N/A', 'N/A', '813', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(489, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-13 05:10:00', 'N/A', 'N/A', '814', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(490, 'Comb bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-05-13 05:10:00', 'N/A', 'N/A', '815', NULL, 'Mobile Money', '500', 'paid', '0', NULL, NULL),
(491, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 4kg', 'STF-4913', '1', '2024-05-14 05:16:00', 'N/A', 'N/A', '817', NULL, 'Mobile Money', '2600', 'paid', '0', NULL, NULL),
(492, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-14 05:16:00', 'N/A', 'N/A', '818', NULL, 'Mobile Money', '650', 'paid', '0', NULL, NULL),
(493, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-14 05:18:00', 'N/A', 'N/A', '819', NULL, 'Cash', '650', 'paid', '0', NULL, NULL),
(494, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-14 05:18:00', 'N/A', 'N/A', '820', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(495, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-14 05:18:00', 'N/A', 'N/A', '821', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(496, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-14 05:18:00', 'N/A', 'N/A', '822', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(497, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-14 05:18:00', 'N/A', 'N/A', '823', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(498, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-14 05:18:00', 'N/A', 'N/A', '824', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(499, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-15 05:21:00', 'N/A', 'N/A', '825', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(500, 'Comb bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-05-15 05:21:00', 'N/A', 'N/A', '826', NULL, 'Cash', '500', 'paid', '0', NULL, NULL),
(501, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-15 05:21:00', 'N/A', 'N/A', '827', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(502, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-15 05:21:00', 'N/A', 'N/A', '828', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(503, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-15 05:21:00', 'N/A', 'N/A', '829', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(504, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-16 18:26:00', 'N/A', 'N/A', '831', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(505, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-16 18:26:00', 'N/A', 'N/A', '832', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(506, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-16 18:26:00', 'N/A', 'N/A', '833', NULL, 'Cash', '700', 'paid', '0', NULL, NULL),
(507, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-16 18:26:00', 'N/A', 'N/A', '834', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(508, 'Bee fd424713755181f54fa396db03dd44be4d1c3781 40mls', 'STF-4913', '1', '2024-05-17 18:28:00', 'N/A', 'N/A', '835', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(509, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-05-17 18:28:00', 'N/A', 'N/A', '836', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(510, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-17 18:28:00', 'N/A', 'N/A', '837', NULL, 'Cash', '700', 'paid', '0', NULL, NULL),
(511, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-17 18:28:00', 'N/A', 'N/A', '838', NULL, 'Cash', '700', 'paid', '0', NULL, NULL),
(512, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-17 18:28:00', 'N/A', 'N/A', '839', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(513, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-17 18:28:00', 'N/A', 'N/A', '840', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(514, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-17 18:28:00', 'N/A', 'N/A', '841', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(515, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-17 18:28:00', 'N/A', 'N/A', '842', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(516, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-17 18:28:00', 'N/A', 'N/A', '843', NULL, 'Cash', '350', 'paid', '0', NULL, NULL),
(517, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-17 18:28:00', 'N/A', 'N/A', '844', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(518, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-17 18:28:00', 'N/A', 'N/A', '845', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(519, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-17 18:28:00', 'N/A', 'N/A', '846', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(520, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 10kg', 'STF-4913', '1', '2024-05-18 18:35:00', 'N/A', 'N/A', '847', NULL, 'Mobile Money', '6500', 'paid', '0', NULL, NULL),
(521, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-18 18:35:00', 'N/A', 'N/A', '848', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(522, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-18 18:35:00', 'N/A', 'N/A', '849', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(523, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-18 18:35:00', 'N/A', 'N/A', '850', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(524, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-05-18 18:35:00', 'N/A', 'N/A', '852', NULL, 'Mobile Money', '50', 'paid', '0', NULL, NULL),
(525, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-18 18:35:00', 'N/A', 'N/A', '853', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(526, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-05-18 18:36:00', 'N/A', 'N/A', '854', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(527, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-18 18:36:00', 'N/A', 'N/A', '855', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(528, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-05-18 18:36:00', 'N/A', 'N/A', '856', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(529, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-18 18:36:00', 'N/A', 'N/A', '857', NULL, 'Cash', '700', 'paid', '0', NULL, NULL),
(530, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-18 18:36:00', 'N/A', 'N/A', '859', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(531, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-20 14:12:00', 'N/A', 'N/A', '863', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(532, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kg', 'STF-4913', '1', '2024-05-22 14:14:00', 'N/A', 'N/A', '866', NULL, 'Mobile Money', '3250', 'paid', '0', NULL, NULL),
(533, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-05-23 11:07:00', 'N/A', 'N/A', '870', NULL, 'Mobile Money', '1600', 'paid', '0', NULL, NULL),
(534, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 jar 1/2kg', 'STF-4913', '1', '2024-05-23 11:07:00', 'N/A', 'N/A', '871', NULL, 'Mobile Money', '35', 'paid', '0', NULL, NULL),
(535, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-23 11:07:00', 'N/A', 'N/A', '872', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(536, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-23 11:07:00', 'N/A', 'N/A', '873', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(537, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-23 11:07:00', 'N/A', 'N/A', '874', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(538, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-23 11:11:00', 'N/A', 'N/A', '875', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(539, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-05-24 11:12:00', 'N/A', 'N/A', '876', NULL, 'Mobile Money', '1600', 'paid', '0', NULL, NULL),
(540, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-24 11:12:00', 'N/A', 'N/A', '879', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(541, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-24 11:12:00', 'N/A', 'N/A', '880', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(542, 'fd424713755181f54fa396db03dd44be4d1c3781 trap 2pcs', 'STF-4913', '1', '2024-05-24 11:12:00', 'N/A', 'N/A', '883', NULL, 'Cash', '1500', 'paid', '0', NULL, NULL),
(543, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kg', 'STF-4913', '1', '2024-05-24 11:12:00', 'N/A', 'N/A', '884', NULL, 'Mobile Money', '3250', 'paid', '0', NULL, NULL),
(544, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-24 11:12:00', 'N/A', 'N/A', '885', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(545, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-24 11:12:00', 'N/A', 'N/A', '886', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(546, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 jar 1/2kg', 'STF-4913', '1', '2024-05-24 11:12:00', 'N/A', 'N/A', '887', NULL, 'Mobile Money', '35', 'paid', '0', NULL, NULL),
(547, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-25 11:41:00', 'N/A', 'N/A', '888', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(548, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-26 13:07:00', 'N/A', 'N/A', '891', NULL, 'Cash', '750', 'paid', '0', NULL, NULL),
(549, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-26 13:07:00', 'N/A', 'N/A', '892', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(550, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kg', 'STF-4913', '1', '2024-05-28 13:09:00', 'N/A', 'N/A', '894', NULL, 'Mobile Money', '3250', 'paid', '0', NULL, NULL),
(551, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-29 13:09:00', 'N/A', 'N/A', '895', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(552, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-29 13:09:00', 'N/A', 'N/A', '896', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(553, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kg', 'STF-4913', '1', '2024-05-29 17:39:00', 'N/A', 'N/A', '897', NULL, 'Mobile Money', '2100', 'paid', '0', NULL, NULL),
(554, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-29 17:40:00', 'N/A', 'N/A', '898', NULL, 'Mobile Money', '340', 'paid', '0', NULL, NULL),
(555, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-29 17:40:00', 'N/A', 'N/A', '899', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(556, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-05-29 17:40:00', 'N/A', 'N/A', '900', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(557, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-05-29 17:40:00', 'N/A', 'N/A', '903', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(558, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-05-30 12:40:00', 'N/A', 'N/A', '907', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(559, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-05-30 12:40:00', 'N/A', 'N/A', '910', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(560, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg(2)', 'STF-4913', '1', '2024-05-30 12:40:00', 'N/A', 'N/A', '913', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(561, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70(2)', 'STF-4913', '1', '2024-05-31 12:49:00', 'N/A', 'N/A', '914', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(562, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-05-31 12:49:00', 'N/A', 'N/A', '915', NULL, 'Mobile Money', '50', 'paid', '0', NULL, NULL),
(563, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2  1kg', 'STF-4913', '1', '2024-05-31 12:49:00', 'N/A', 'N/A', '917', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(564, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-05-31 12:49:00', 'N/A', 'N/A', '918', NULL, 'Mobile Money', '1600', 'paid', '0', NULL, NULL),
(565, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-01 12:54:00', 'N/A', 'N/A', '921', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(566, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kg', 'STF-4913', '1', '2024-06-01 12:54:00', 'N/A', 'N/A', '922', NULL, 'Mobile Money', '3500', 'paid', '0', NULL, NULL),
(567, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2(3)', 'STF-4913', '1', '2024-06-01 12:54:00', 'N/A', 'N/A', '923', NULL, 'Mobile Money', '1050', 'paid', '0', NULL, NULL),
(568, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-06-01 14:01:00', 'N/A', 'N/A', '924', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(569, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-06-02 12:52:00', 'N/A', 'N/A', '925', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(570, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg(2)', 'STF-4913', '1', '2024-06-02 12:52:00', 'N/A', 'N/A', '926', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(571, 'fd424713755181f54fa396db03dd44be4d1c3781 tincture  20ml', 'STF-4913', '1', '2024-06-02 12:52:00', 'N/A', 'N/A', '927', NULL, 'Mobile Money', '500', 'paid', '0', NULL, NULL),
(572, '32c2c036fd6a285675a2370392c0ad73b3c5fca1s 5pcs', 'STF-4913', '1', '2024-06-02 12:52:00', 'N/A', 'N/A', '928', NULL, 'Mobile Money', '23500', 'paid', '0', NULL, NULL),
(573, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 extractor plastic', 'STF-4913', '1', '2024-06-02 12:52:00', 'N/A', 'N/A', '929', NULL, 'Mobile Money', '22500', 'paid', '0', NULL, NULL),
(574, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-06-02 12:52:00', 'N/A', 'N/A', '930', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(575, 'Bee suit cotton 1pcs', 'STF-4913', '1', '2024-06-03 06:44:00', 'N/A', 'N/A', '931', NULL, 'Mobile Money', '2500', 'paid', '0', NULL, NULL),
(576, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-03 12:57:00', 'N/A', 'N/A', '932', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(577, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg(2)', 'STF-4913', '1', '2024-06-03 12:57:00', 'N/A', 'N/A', '933', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(578, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 6kg', 'STF-4913', '1', '2024-06-03 12:57:00', 'N/A', 'N/A', '934', NULL, 'Mobile Money', '4800', 'paid', '0', NULL, NULL),
(579, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-03 12:57:00', 'N/A', 'N/A', '935', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(580, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 jar 1kg(10)', 'STF-4913', '1', '2024-06-04 12:59:00', 'N/A', 'N/A', '937', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(581, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 jars 1/2kg(10)', 'STF-4913', '1', '2024-06-04 12:59:00', 'N/A', 'N/A', '938', NULL, 'Cash', '350', 'paid', '0', NULL, NULL),
(582, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-05 13:02:00', 'N/A', 'N/A', '939', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(583, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-06-05 13:02:00', 'N/A', 'N/A', '940', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(584, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-05 13:02:00', 'N/A', 'N/A', '941', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(585, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-05 13:02:00', 'N/A', 'N/A', '942', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(586, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-05 14:39:00', 'N/A', 'N/A', '947', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(587, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-05 14:39:00', 'N/A', 'N/A', '948', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(588, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-05 14:39:00', 'N/A', 'N/A', '950', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(589, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-05 18:17:00', 'N/A', 'N/A', '951', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(590, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 jars 1/2', 'STF-4913', '1', '2024-06-06 18:20:00', 'N/A', 'N/A', '952', NULL, 'Mobile Money', '350', 'paid', '0', NULL, NULL),
(591, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-06 18:20:00', 'N/A', 'N/A', '955', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(592, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-06 18:20:00', 'N/A', 'N/A', '956', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(593, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-06 18:20:00', 'N/A', 'N/A', '957', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(594, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-06 18:20:00', 'N/A', 'N/A', '958', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(595, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-06-06 18:20:00', 'N/A', 'N/A', '959', NULL, 'Mobile Money', '50', 'paid', '0', NULL, NULL),
(596, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-07 18:27:00', 'N/A', 'N/A', '964', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(597, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-07 18:27:00', 'N/A', 'N/A', '965', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(598, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-07 18:27:00', 'N/A', 'N/A', '966', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(599, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-06-07 18:27:00', 'N/A', 'N/A', '967', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(600, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-07 18:27:00', 'N/A', 'N/A', '968', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(601, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 4kg', 'STF-4913', '1', '2024-06-07 18:27:00', 'N/A', 'N/A', '972', NULL, 'Mobile Money', '2600', 'paid', '0', NULL, NULL),
(602, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-08 18:31:00', 'N/A', 'N/A', '973', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(603, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 48kg', 'STF-4913', '1', '2024-06-08 18:31:00', 'N/A', 'N/A', '976', NULL, 'Mobile Money', '32640', 'paid', '0', NULL, NULL),
(604, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc21kg', 'STF-4913', '1', '2024-06-08 18:36:00', 'N/A', 'N/A', '977', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(605, 'Bee fd424713755181f54fa396db03dd44be4d1c3781 250ml', 'STF-4913', '1', '2024-06-10 14:09:00', 'N/A', 'N/A', '979', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(606, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-06-10 14:09:00', 'N/A', 'N/A', '980', NULL, 'Mobile Money', '1600', 'paid', '0', NULL, NULL),
(607, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-10 14:09:00', 'N/A', 'N/A', '981', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(608, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-10 14:09:00', 'N/A', 'N/A', '982', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(609, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-10 14:09:00', 'N/A', 'N/A', '983', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(610, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-10 14:09:00', 'N/A', 'N/A', '984', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(611, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-11 14:12:00', 'N/A', 'N/A', '985', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(612, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-06-11 14:12:00', 'N/A', 'N/A', '986', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(613, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-11 14:12:00', 'N/A', 'N/A', '987', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(614, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg(3)', 'STF-4913', '1', '2024-06-11 14:12:00', 'N/A', 'N/A', '988', NULL, 'Mobile Money', '1200', 'paid', '0', NULL, NULL),
(615, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-06-11 14:12:00', 'N/A', 'N/A', '989', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(616, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-06-11 14:12:00', 'N/A', 'N/A', '990', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(617, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-11 14:12:00', 'N/A', 'N/A', '991', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(618, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-06-11 14:12:00', 'N/A', 'N/A', '992', NULL, 'Mobile Money', '50', 'paid', '0', NULL, NULL),
(619, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-11 14:12:00', 'N/A', 'N/A', '993', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(620, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-06-12 14:16:00', 'N/A', 'N/A', '995', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(621, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-12 14:16:00', 'N/A', 'N/A', '996', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(622, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-06-12 14:16:00', 'N/A', 'N/A', '997', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(623, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-06-12 14:16:00', 'N/A', 'N/A', '998', NULL, 'Mobile Money', '1400', 'paid', '0', NULL, NULL);
INSERT INTO `sales` (`sale_id`, `sale_product_id`, `sale_user_id`, `sale_quantity`, `sale_datetime`, `sale_customer_name`, `sale_customer_phoneno`, `sale_receipt_no`, `sale_cart_number`, `sale_payment_method`, `sale_payment_amount`, `sale_payment_status`, `sale_discount`, `sale_credit_expected_date`, `sale_transaction_ref`) VALUES
(624, 'Comb bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-06-13 13:59:00', 'N/A', 'N/A', '999', NULL, 'Mobile Money', '500', 'paid', '0', NULL, NULL),
(625, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-06-13 13:59:00', 'N/A', 'N/A', '1000', NULL, 'Cash', '1600', 'paid', '0', NULL, NULL),
(626, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-13 13:59:00', 'N/A', 'N/A', '1001', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(627, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-13 13:59:00', 'N/A', 'N/A', '1002', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(628, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-06-13 13:59:00', 'N/A', 'N/A', '1003', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(629, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-14 05:46:00', 'N/A', 'N/A', '1005', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(630, 'fd424713755181f54fa396db03dd44be4d1c3781 13kgs sold at 3,000', 'STF-4913', '1', '2024-06-14 14:33:00', 'N/A', 'N/A', '1006', NULL, 'Mobile Money', '39000', 'paid', '0', NULL, NULL),
(631, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-06-15 05:46:00', 'N/A', 'N/A', '1007', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(632, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg(3)', 'STF-4913', '1', '2024-06-16 05:48:00', 'N/A', 'N/A', '1009', NULL, 'Mobile Money', '1080', 'paid', '0', NULL, NULL),
(633, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2(3)', 'STF-4913', '1', '2024-06-16 05:48:00', 'N/A', 'N/A', '1010', NULL, 'Mobile Money', '2100', 'paid', '0', NULL, NULL),
(634, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-16 05:48:00', 'N/A', 'N/A', '1011', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(635, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-06-17 05:51:00', 'N/A', 'N/A', '1012', NULL, 'Mobile Money', '50', 'paid', '0', NULL, NULL),
(636, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-17 05:51:00', 'N/A', 'N/A', '1013', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(637, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-17 05:51:00', 'N/A', 'N/A', '1014', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(638, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-06-19 06:09:00', 'N/A', 'N/A', '1019', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(639, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kg', 'STF-4913', '1', '2024-06-20 05:53:00', 'N/A', 'N/A', '1022', NULL, 'Mobile Money', '3250', 'paid', '0', NULL, NULL),
(640, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-20 05:53:00', 'N/A', 'N/A', '1023', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(641, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-20 05:53:00', 'N/A', 'N/A', '1024', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(642, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-20 05:53:00', 'N/A', 'N/A', '1025', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(643, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-20 05:53:00', 'N/A', 'N/A', '1026', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(644, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-20 05:53:00', 'N/A', 'N/A', '1027', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(645, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-20 05:53:00', 'N/A', 'N/A', '1028', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(646, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-20 06:09:00', 'N/A', 'N/A', '1029', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(647, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-20 12:31:00', 'N/A', 'N/A', '1030', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(648, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-06-20 12:31:00', 'N/A', 'N/A', '1031', NULL, 'Mobile Money', '1800', 'paid', '0', NULL, NULL),
(649, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-21 12:33:00', 'N/A', 'N/A', '1033', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(650, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-22 12:44:00', 'N/A', 'N/A', '1039', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(651, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-06-23 12:48:00', 'N/A', 'N/A', '1041', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(652, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-06-23 12:48:00', 'N/A', 'N/A', '1042', NULL, 'Mobile Money', '50', 'paid', '0', NULL, NULL),
(653, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-24 12:49:00', 'N/A', 'N/A', '1046', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(654, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc24kg', 'STF-4913', '1', '2024-06-24 12:49:00', 'N/A', 'N/A', '1049', NULL, 'Mobile Money', '15600', 'paid', '0', NULL, NULL),
(655, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-26 12:54:00', 'N/A', 'N/A', '1056', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(656, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-06-29 13:00:00', 'N/A', 'N/A', '1069', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(657, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-29 13:09:00', 'N/A', 'N/A', '1071', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(658, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-06-29 13:09:00', 'N/A', 'N/A', '1073', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(659, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 4kg', 'STF-4913', '1', '2024-07-01 14:36:00', 'N/A', 'N/A', '1074', NULL, 'Mobile Money', '2600', 'paid', '0', NULL, NULL),
(660, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-07-01 14:36:00', 'N/A', 'N/A', '1075', NULL, 'Mobile Money', '1400', 'paid', '0', NULL, NULL),
(661, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-01 14:36:00', 'N/A', 'N/A', '1078', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(662, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-01 14:36:00', 'N/A', 'N/A', '1079', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(663, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-01 14:36:00', 'N/A', 'N/A', '1080', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(664, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kg', 'STF-4913', '1', '2024-07-02 14:40:00', 'N/A', 'N/A', '1081', NULL, 'Mobile Money', '4000', 'paid', '0', NULL, NULL),
(665, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg(5)', 'STF-4913', '1', '2024-07-02 14:40:00', 'N/A', 'N/A', '1082', NULL, 'Mobile Money', '2000', 'paid', '0', NULL, NULL),
(666, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 9kg', 'STF-4913', '1', '2024-07-02 14:40:00', 'N/A', 'N/A', '1083', NULL, 'Mobile Money', '6300', 'paid', '0', NULL, NULL),
(667, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2(2)', 'STF-4913', '1', '2024-07-02 14:40:00', 'N/A', 'N/A', '1084', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(668, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kg', 'STF-4913', '1', '2024-07-02 14:40:00', 'N/A', 'N/A', '1086', NULL, 'Mobile Money', '3500', 'paid', '0', NULL, NULL),
(669, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-03 14:44:00', 'N/A', 'N/A', '1088', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(670, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-07-03 14:44:00', 'N/A', 'N/A', '1089', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(671, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-07-03 14:44:00', 'N/A', 'N/A', '1090', NULL, 'Mobile Money', '50', 'paid', '0', NULL, NULL),
(672, 'Comb bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-03 14:44:00', 'N/A', 'N/A', '1093', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(673, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-07-03 14:44:00', 'N/A', 'N/A', '1094', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(674, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-07-03 14:44:00', 'N/A', 'N/A', '1095', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(675, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-07-04 12:53:00', 'N/A', 'N/A', '1097', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(676, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 6kg', 'STF-4913', '1', '2024-07-05 12:55:00', 'N/A', 'N/A', '1102', NULL, 'Mobile Money', '4200', 'paid', '0', NULL, NULL),
(677, '106cde34242aefeb5c2e532b8fa6468ea92b8733(12)', 'STF-4913', '1', '2024-07-05 12:55:00', 'N/A', 'N/A', '1103', NULL, 'Mobile Money', '4320', 'paid', '0', NULL, NULL),
(678, '106cde34242aefeb5c2e532b8fa6468ea92b8733(12)', 'STF-4913', '1', '2024-07-05 12:55:00', 'N/A', 'N/A', '1104', NULL, 'Mobile Money', '2760', 'paid', '0', NULL, NULL),
(679, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg(2)', 'STF-4913', '1', '2024-07-05 12:55:00', 'N/A', 'N/A', '1105', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(680, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-05 12:55:00', 'N/A', 'N/A', '1106', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(681, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-05 12:55:00', 'N/A', 'N/A', '1107', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(682, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kg', 'STF-4913', '1', '2024-07-05 12:55:00', 'N/A', 'N/A', '1108', NULL, 'Mobile Money', '2100', 'paid', '0', NULL, NULL),
(683, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-05 12:55:00', 'N/A', 'N/A', '1109', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(684, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-07-05 12:55:00', 'N/A', 'N/A', '1111', NULL, 'Mobile Money', '1600', 'paid', '0', NULL, NULL),
(685, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-05 12:55:00', 'N/A', 'N/A', '1112', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(686, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-05 12:55:00', 'N/A', 'N/A', '1113', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(687, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-05 12:55:00', 'N/A', 'N/A', '1114', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(688, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-06 13:02:00', 'N/A', 'N/A', '1115', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(689, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 Dippers', 'STF-4913', '1', '2024-07-06 17:25:00', 'N/A', 'N/A', '1122', NULL, 'Mobile Money', '3600', 'paid', '0', NULL, NULL),
(690, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-07 14:11:00', 'N/A', 'N/A', '1123', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(691, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-07 14:11:00', 'N/A', 'N/A', '1124', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(692, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-08 14:13:00', 'N/A', 'N/A', '1125', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(693, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kgs', 'STF-4913', '1', '2024-07-08 14:13:00', 'N/A', 'N/A', '1126', NULL, 'Mobile Money', '2100', 'paid', '0', NULL, NULL),
(694, 'Bee fd424713755181f54fa396db03dd44be4d1c3781 250mls', 'STF-4913', '1', '2024-07-08 14:13:00', 'N/A', 'N/A', '1127', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(695, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-08 14:13:00', 'N/A', 'N/A', '1128', NULL, 'Mobile Money', '350', 'paid', '0', NULL, NULL),
(696, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-10 14:16:00', 'N/A', 'N/A', '1132', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(697, '6ebaf9c55db2020d35994f5713738342f075bbc6', 'STF-4913', '1', '2024-07-10 14:16:00', 'N/A', 'N/A', '1133', NULL, 'Cash', '5000', 'paid', '0', NULL, NULL),
(698, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-10 14:16:00', 'N/A', 'N/A', '1134', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(699, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-10 14:16:00', 'N/A', 'N/A', '1135', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(700, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-07-10 14:16:00', 'N/A', 'N/A', '1136', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(701, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-10 14:16:00', 'N/A', 'N/A', '1137', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(702, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-10 14:16:00', 'N/A', 'N/A', '1138', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(703, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-07-10 14:16:00', 'N/A', 'N/A', '1139', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(704, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-10 14:23:00', 'N/A', 'N/A', '1140', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(705, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-10 14:23:00', 'N/A', 'N/A', '1141', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(706, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-10 14:23:00', 'N/A', 'N/A', '1142', NULL, 'Mobile Money', '250', 'paid', '0', NULL, NULL),
(707, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-07-10 14:23:00', 'N/A', 'N/A', '1143', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(708, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-10 14:23:00', 'N/A', 'N/A', '1144', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(709, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-10 14:23:00', 'N/A', 'N/A', '1147', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(710, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-10 14:38:00', 'N/A', 'N/A', '1148', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(711, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-10 15:04:00', 'N/A', 'N/A', '1149', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(712, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-07-10 16:59:00', 'N/A', 'N/A', '1150', NULL, 'Mobile Money', '50', 'paid', '0', NULL, NULL),
(713, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-07-10 17:00:00', 'N/A', 'N/A', '1151', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(714, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-10 17:02:00', 'N/A', 'N/A', '1152', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(715, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-11 13:06:00', 'N/A', 'N/A', '1153', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(716, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-11 13:06:00', 'N/A', 'N/A', '1154', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(717, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc24kgs', 'STF-4913', '1', '2024-07-11 13:06:00', 'N/A', 'N/A', '1155', NULL, 'Mobile Money', '16320', 'paid', '0', NULL, NULL),
(718, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-07-11 13:06:00', 'N/A', 'N/A', '1157', NULL, 'Mobile Money', '1500', 'paid', '0', NULL, NULL),
(719, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kgs', 'STF-4913', '1', '2024-07-12 13:09:00', 'N/A', 'N/A', '1159', NULL, 'Mobile Money', '2500', 'paid', '0', NULL, NULL),
(720, 'Bee fd424713755181f54fa396db03dd44be4d1c3781 250ml', 'STF-4913', '1', '2024-07-12 13:09:00', 'N/A', 'N/A', '1160', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(721, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-12 13:09:00', 'N/A', 'N/A', '1161', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(722, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-12 13:09:00', 'N/A', 'N/A', '1162', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(723, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-12 13:09:00', 'N/A', 'N/A', '1163', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(724, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-12 13:09:00', 'N/A', 'N/A', '1164', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(725, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kgs', 'STF-4913', '1', '2024-07-13 13:13:00', 'N/A', 'N/A', '1171', NULL, 'Mobile Money', '3250', 'paid', '0', NULL, NULL),
(726, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-13 13:13:00', 'N/A', 'N/A', '1172', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(727, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-13 13:13:00', 'N/A', 'N/A', '1173', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(728, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-13 13:13:00', 'N/A', 'N/A', '1174', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(729, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc21kg', 'STF-4913', '1', '2024-07-14 06:20:00', 'N/A', 'N/A', '1180', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(730, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc21kg', 'STF-4913', '1', '2024-07-14 06:20:00', 'N/A', 'N/A', '1181', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(731, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc21kg', 'STF-4913', '1', '2024-07-14 06:20:00', 'N/A', 'N/A', '1182', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(732, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-15 06:30:00', 'N/A', 'N/A', '1184', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(733, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-15 06:30:00', 'N/A', 'N/A', '1185', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(734, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc21kg', 'STF-4913', '1', '2024-07-15 06:30:00', 'N/A', 'N/A', '1186', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(735, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-15 06:30:00', 'N/A', 'N/A', '1187', NULL, 'Mobile Money', '350', 'paid', '0', NULL, NULL),
(736, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-15 06:30:00', 'N/A', 'N/A', '1190', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(737, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 gate 5pcs', 'STF-4913', '1', '2024-07-15 06:30:00', 'N/A', 'N/A', '1191', NULL, 'Mobile Money', '2000', 'paid', '0', NULL, NULL),
(738, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g(2)', 'STF-4913', '1', '2024-07-16 06:41:00', 'N/A', 'N/A', '1193', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(739, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-16 06:44:00', 'N/A', 'N/A', '1196', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(740, 'fd424713755181f54fa396db03dd44be4d1c3781', 'STF-4913', '1', '2024-07-17 06:46:00', 'N/A', 'N/A', '1204', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(741, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-17 06:46:00', 'N/A', 'N/A', '1205', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(742, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-17 06:46:00', 'N/A', 'N/A', '1206', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(743, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-17 06:46:00', 'N/A', 'N/A', '1207', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(744, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-17 06:46:00', 'N/A', 'N/A', '1208', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(745, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-18 11:19:00', 'N/A', 'N/A', '1213', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(746, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-07-18 11:19:00', 'N/A', 'N/A', '1214', NULL, 'Mobile Money', '50', 'paid', '0', NULL, NULL),
(747, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-18 11:19:00', 'N/A', 'N/A', '1215', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(748, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-19 11:25:00', 'N/A', 'N/A', '1216', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(749, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-19 11:25:00', 'N/A', 'N/A', '1217', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(750, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-19 11:25:00', 'N/A', 'N/A', '1218', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(751, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-19 11:25:00', 'N/A', 'N/A', '1219', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(752, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-19 11:25:00', 'N/A', 'N/A', '1220', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(753, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 7.5kg', 'STF-4913', '1', '2024-07-19 11:25:00', 'N/A', 'N/A', '1221', NULL, 'Mobile Money', '5000', 'paid', '0', NULL, NULL),
(754, '6ebaf9c55db2020d35994f5713738342f075bbc6', 'STF-4913', '1', '2024-07-19 17:27:00', 'N/A', 'N/A', '1222', NULL, 'Mobile Money', '50000', 'paid', '0', NULL, NULL),
(755, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g(2)', 'STF-4913', '1', '2024-07-20 05:43:00', 'N/A', 'N/A', '1223', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(756, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 jars1/2kg(46)', 'STF-4913', '1', '2024-07-20 11:29:00', 'N/A', 'N/A', '1225', NULL, 'Mobile Money', '1610', 'paid', '0', NULL, NULL),
(757, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 4kg', 'STF-4913', '1', '2024-07-20 11:29:00', 'N/A', 'N/A', '1226', NULL, 'Mobile Money', '2800', 'paid', '0', NULL, NULL),
(758, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 7.5kg', 'STF-4913', '1', '2024-07-21 14:10:00', 'N/A', 'N/A', '1233', NULL, 'Mobile Money', '5000', 'paid', '0', NULL, NULL),
(759, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-23 14:13:00', 'N/A', 'N/A', '1235', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(760, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 4kg', 'STF-4913', '1', '2024-07-23 14:13:00', 'N/A', 'N/A', '1236', NULL, 'Mobile Money', '2600', 'paid', '0', NULL, NULL),
(761, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-07-23 14:13:00', 'N/A', 'N/A', '1237', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(762, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g(2)', 'STF-4913', '1', '2024-07-23 14:13:00', 'N/A', 'N/A', '1238', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(763, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-07-24 14:17:00', 'N/A', 'N/A', '1239', NULL, 'Mobile Money', '50', 'paid', '0', NULL, NULL),
(764, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g(2)', 'STF-4913', '1', '2024-07-24 14:17:00', 'N/A', 'N/A', '1240', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(765, '6ebaf9c55db2020d35994f5713738342f075bbc6', 'STF-4913', '1', '2024-07-24 14:17:00', 'N/A', 'N/A', '1241', NULL, 'Mobile Money', '47000', 'paid', '0', NULL, NULL),
(766, '6ebaf9c55db2020d35994f5713738342f075bbc6', 'STF-4913', '1', '2024-07-24 14:17:00', 'N/A', 'N/A', '1242', NULL, 'Mobile Money', '3100', 'paid', '0', NULL, NULL),
(767, '6ebaf9c55db2020d35994f5713738342f075bbc6', 'STF-4913', '1', '2024-07-24 14:17:00', 'N/A', 'N/A', '1243', NULL, 'Mobile Money', '2500', 'paid', '0', NULL, NULL),
(768, '6ebaf9c55db2020d35994f5713738342f075bbc6', 'STF-4913', '1', '2024-07-24 14:17:00', 'N/A', 'N/A', '1244', NULL, 'Mobile Money', '1700', 'paid', '0', NULL, NULL),
(769, '6ebaf9c55db2020d35994f5713738342f075bbc6', 'STF-4913', '1', '2024-07-24 14:17:00', 'N/A', 'N/A', '1245', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(770, '6ebaf9c55db2020d35994f5713738342f075bbc6', 'STF-4913', '1', '2024-07-24 14:17:00', 'N/A', 'N/A', '1246', NULL, 'Mobile Money', '500', 'paid', '0', NULL, NULL),
(771, '6ebaf9c55db2020d35994f5713738342f075bbc6', 'STF-4913', '1', '2024-07-24 14:17:00', 'N/A', 'N/A', '1247', NULL, 'Mobile Money', '500', 'paid', '0', NULL, NULL),
(772, '6ebaf9c55db2020d35994f5713738342f075bbc6', 'STF-4913', '1', '2024-07-24 14:17:00', 'N/A', 'N/A', '1248', NULL, 'Mobile Money', '13000', 'paid', '0', NULL, NULL),
(773, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-24 14:17:00', 'N/A', 'N/A', '1249', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(774, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-24 14:17:00', 'N/A', 'N/A', '1250', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(775, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kg', 'STF-4913', '1', '2024-07-25 12:08:00', 'N/A', 'N/A', '1254', NULL, 'Mobile Money', '2100', 'paid', '0', NULL, NULL),
(776, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-07-25 12:08:00', 'N/A', 'N/A', '1256', NULL, 'Mobile Money', '1600', 'paid', '0', NULL, NULL),
(777, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-25 12:11:00', 'N/A', 'N/A', '1258', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(778, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2(2)', 'STF-4913', '1', '2024-07-25 12:11:00', 'N/A', 'N/A', '1259', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(779, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-26 12:21:00', 'N/A', 'N/A', '1260', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(780, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-26 12:25:00', 'N/A', 'N/A', '1261', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(781, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-26 12:25:00', 'N/A', 'N/A', '1262', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(782, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-26 12:25:00', 'N/A', 'N/A', '1263', NULL, 'Mobile Money', '750', 'paid', '0', NULL, NULL),
(783, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-26 12:25:00', 'N/A', 'N/A', '1264', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(784, 'fd424713755181f54fa396db03dd44be4d1c3781', 'STF-4913', '1', '2024-07-27 12:27:00', 'N/A', 'N/A', '1265', NULL, 'Mobile Money', '470', 'paid', '0', NULL, NULL),
(785, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-27 12:27:00', 'N/A', 'N/A', '1266', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(786, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-28 05:34:00', 'N/A', 'N/A', '1267', NULL, 'Cash', '750', 'paid', '0', NULL, NULL),
(787, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-29 05:35:00', 'N/A', 'N/A', '1268', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(788, '106cde34242aefeb5c2e532b8fa6468ea92b8733(2)', 'STF-4913', '1', '2024-07-29 05:35:00', 'N/A', 'N/A', '1270', NULL, 'Mobile Money', '600', 'paid', '0', NULL, NULL),
(789, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-29 05:35:00', 'N/A', 'N/A', '1271', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(790, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-29 05:35:00', 'N/A', 'N/A', '1272', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(791, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 4kg', 'STF-4913', '1', '2024-07-29 05:35:00', 'N/A', 'N/A', '1273', NULL, 'Mobile Money', '2800', 'paid', '0', NULL, NULL),
(792, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-29 05:35:00', 'N/A', 'N/A', '1274', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(793, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-29 05:35:00', 'N/A', 'N/A', '1275', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(794, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kg', 'STF-4913', '1', '2024-07-29 05:35:00', 'N/A', 'N/A', '1277', NULL, 'Mobile Money', '3250', 'paid', '0', NULL, NULL),
(795, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2(2)', 'STF-4913', '1', '2024-07-29 05:44:00', 'N/A', 'N/A', '1278', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(796, 'fd424713755181f54fa396db03dd44be4d1c3781', 'STF-4913', '1', '2024-07-29 05:44:00', 'N/A', 'N/A', '1280', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(797, 'fd424713755181f54fa396db03dd44be4d1c3781 suspension 250ml 2pcs', 'STF-4913', '1', '2024-07-29 05:44:00', 'N/A', 'N/A', '1283', NULL, 'Mobile Money', '1600', 'paid', '0', NULL, NULL),
(798, 'fd424713755181f54fa396db03dd44be4d1c3781 suspension 250ml', 'STF-4913', '1', '2024-07-29 05:44:00', 'N/A', 'N/A', '1284', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(799, 'fd424713755181f54fa396db03dd44be4d1c3781 suspension 250ml', 'STF-4913', '1', '2024-07-29 05:44:00', 'N/A', 'N/A', '1286', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(800, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-29 05:44:00', 'N/A', 'N/A', '1287', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(801, 'fd424713755181f54fa396db03dd44be4d1c3781 suspension 250ml', 'STF-4913', '1', '2024-07-29 05:44:00', 'N/A', 'N/A', '1288', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(802, 'fd424713755181f54fa396db03dd44be4d1c3781 suspension 250ml', 'STF-4913', '1', '2024-07-29 05:44:00', 'N/A', 'N/A', '1289', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(803, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kg', 'STF-4913', '1', '2024-07-29 05:44:00', 'N/A', 'N/A', '1290', NULL, 'Mobile Money', '2100', 'paid', '0', NULL, NULL),
(804, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-29 05:44:00', 'N/A', 'N/A', '1291', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(805, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-31 05:54:00', 'N/A', 'N/A', '1294', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(806, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-31 05:54:00', 'N/A', 'N/A', '1296', NULL, 'Cash', '700', 'paid', '0', NULL, NULL),
(807, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-31 05:54:00', 'N/A', 'N/A', '1297', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(808, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-07-31 05:54:00', 'N/A', 'N/A', '1299', NULL, 'Mobile Money', '1400', 'paid', '0', NULL, NULL),
(809, '6ebaf9c55db2020d35994f5713738342f075bbc6', 'STF-4913', '1', '2024-07-31 05:54:00', 'N/A', 'N/A', '1300', NULL, 'Mobile Money', '5000', 'paid', '0', NULL, NULL),
(810, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-07-31 05:54:00', 'N/A', 'N/A', '1301', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(811, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-07-31 05:54:00', 'N/A', 'N/A', '1302', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(812, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-01 12:03:00', 'N/A', 'N/A', '1303', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(813, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-02 12:04:00', 'N/A', 'N/A', '1305', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(814, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-02 12:04:00', 'N/A', 'N/A', '1307', NULL, 'Mobile Money', '750', 'paid', '0', NULL, NULL),
(815, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-02 12:04:00', 'N/A', 'N/A', '1308', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(816, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-02 12:04:00', 'N/A', 'N/A', '1309', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(817, 'fd424713755181f54fa396db03dd44be4d1c3781 suspension 250ml', 'STF-4913', '1', '2024-08-03 12:09:00', 'N/A', 'N/A', '1311', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(818, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-03 12:09:00', 'N/A', 'N/A', '1315', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(819, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-05 13:23:00', 'N/A', 'N/A', '1316', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(820, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-05 13:23:00', 'N/A', 'N/A', '1318', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(821, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-05 13:23:00', 'N/A', 'N/A', '1319', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(822, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-05 13:23:00', 'N/A', 'N/A', '1320', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(823, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-05 13:23:00', 'N/A', 'N/A', '1321', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(824, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc24kg', 'STF-4913', '1', '2024-08-06 13:30:00', 'N/A', 'N/A', '1322', NULL, 'Mobile Money', '16320', 'paid', '0', NULL, NULL),
(825, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-08-06 13:30:00', 'N/A', 'N/A', '1323', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(826, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-08-06 13:30:00', 'N/A', 'N/A', '1324', NULL, 'Mobile Money', '1400', 'paid', '0', NULL, NULL),
(827, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-06 13:30:00', 'N/A', 'N/A', '1325', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(828, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1 1/2 kg', 'STF-4913', '1', '2024-08-06 13:30:00', 'N/A', 'N/A', '1326', NULL, 'Mobile Money', '1200', 'paid', '0', NULL, NULL),
(829, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kg', 'STF-4913', '1', '2024-08-07 13:33:00', 'N/A', 'N/A', '1327', NULL, 'Mobile Money', '7500', 'paid', '0', NULL, NULL),
(830, 'fd424713755181f54fa396db03dd44be4d1c3781 suspension 250ml', 'STF-4913', '1', '2024-08-07 13:33:00', 'N/A', 'N/A', '1329', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(831, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-08-08 12:27:00', 'N/A', 'N/A', '1330', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(832, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-08-08 12:27:00', 'N/A', 'N/A', '1331', NULL, 'Mobile Money', '1400', 'paid', '0', NULL, NULL),
(833, 'fd424713755181f54fa396db03dd44be4d1c3781 suspension 250ml', 'STF-4913', '1', '2024-08-08 12:27:00', 'N/A', 'N/A', '1332', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(834, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-08 12:27:00', 'N/A', 'N/A', '1333', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(835, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-08-09 12:27:00', 'N/A', 'N/A', '1335', NULL, 'Mobile Money', '1600', 'paid', '0', NULL, NULL),
(836, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-09 12:27:00', 'N/A', 'N/A', '1336', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(837, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-09 12:27:00', 'N/A', 'N/A', '1337', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(838, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-09 12:27:00', 'N/A', 'N/A', '1338', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(839, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-09 12:27:00', 'N/A', 'N/A', '1339', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(840, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-12 14:08:00', 'N/A', 'N/A', '1342', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(841, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-12 14:08:00', 'N/A', 'N/A', '1343', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(842, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-12 14:08:00', 'N/A', 'N/A', '1344', NULL, 'Cash', '350', 'paid', '0', NULL, NULL),
(843, 'Comb bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-12 14:08:00', 'N/A', 'N/A', '1345', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(844, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 4kg', 'STF-4913', '1', '2024-08-12 14:08:00', 'N/A', 'N/A', '1346', NULL, 'Mobile Money', '2600', 'paid', '0', NULL, NULL),
(845, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-08-12 14:08:00', 'N/A', 'N/A', '1347', NULL, 'Mobile Money', '50', 'paid', '0', NULL, NULL),
(846, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-12 14:14:00', 'N/A', 'N/A', '1348', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(847, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-13 07:46:00', 'N/A', 'N/A', '1349', NULL, 'Cash', '350', 'paid', '0', NULL, NULL),
(848, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 gate 2pcs', 'STF-4913', '1', '2024-08-13 14:14:00', 'N/A', 'N/A', '1351', NULL, 'Mobile Money', '900', 'paid', '0', NULL, NULL),
(849, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc24kgs', 'STF-4913', '1', '2024-08-13 14:14:00', 'N/A', 'N/A', '1352', NULL, 'Mobile Money', '16320', 'paid', '0', NULL, NULL),
(850, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 3kg', 'STF-4913', '1', '2024-08-13 14:14:00', 'N/A', 'N/A', '1353', NULL, 'Mobile Money', '2100', 'paid', '0', NULL, NULL),
(851, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-13 14:14:00', 'N/A', 'N/A', '1354', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(852, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-13 14:14:00', 'N/A', 'N/A', '1355', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(853, 'fd424713755181f54fa396db03dd44be4d1c3781 granulates 13g', 'STF-4913', '1', '2024-08-13 14:14:00', 'N/A', 'N/A', '1356', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(854, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-14 14:18:00', 'N/A', 'N/A', '1357', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(855, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-15 12:28:00', 'N/A', 'N/A', '1360', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(856, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-08-15 12:32:00', 'N/A', 'N/A', '1361', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(857, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-08-15 12:32:00', 'N/A', 'N/A', '1362', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(858, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-15 12:32:00', 'N/A', 'N/A', '1364', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(859, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-08-15 12:32:00', 'N/A', 'N/A', '1365', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(860, 'fd424713755181f54fa396db03dd44be4d1c3781 suspension 250ml 2pcs', 'STF-4913', '1', '2024-08-16 12:35:00', 'N/A', 'N/A', '1366', NULL, 'Mobile Money', '1600', 'paid', '0', NULL, NULL),
(861, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 4kgs', 'STF-4913', '1', '2024-08-16 12:35:00', 'N/A', 'N/A', '1368', NULL, 'Mobile Money', '2800', 'paid', '0', NULL, NULL),
(862, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2  500g', 'STF-4913', '1', '2024-08-16 12:35:00', 'N/A', 'N/A', '1369', NULL, 'Mobile Money', '350', 'paid', '0', NULL, NULL),
(863, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70(2)', 'STF-4913', '1', '2024-08-16 12:35:00', 'N/A', 'N/A', '1371', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(864, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-16 12:35:00', 'N/A', 'N/A', '1375', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(865, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-19 14:09:00', 'N/A', 'N/A', '1383', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(866, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-08-19 14:09:00', 'N/A', 'N/A', '1384', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(867, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-19 14:09:00', 'N/A', 'N/A', '1388', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(868, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-20 14:13:00', 'N/A', 'N/A', '1389', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(869, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-08-20 14:13:00', 'N/A', 'N/A', '1390', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(870, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-20 14:13:00', 'N/A', 'N/A', '1391', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(871, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-08-20 14:13:00', 'N/A', 'N/A', '1392', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(872, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kgs', 'STF-4913', '1', '2024-08-20 14:13:00', 'N/A', 'N/A', '1393', NULL, 'Mobile Money', '1600', 'paid', '0', NULL, NULL),
(873, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50(2)', 'STF-4913', '1', '2024-08-20 14:13:00', 'N/A', 'N/A', '1394', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(874, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kgs', 'STF-4913', '1', '2024-08-21 14:33:00', 'N/A', 'N/A', '1396', NULL, 'Mobile Money', '5000', 'paid', '0', NULL, NULL),
(875, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-08-22 11:48:00', 'N/A', 'N/A', '1397', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(876, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-08-22 11:48:00', 'N/A', 'N/A', '1398', NULL, 'Mobile Money', '50', 'paid', '0', NULL, NULL),
(877, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-22 11:48:00', 'N/A', 'N/A', '1399', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(878, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-22 11:48:00', 'N/A', 'N/A', '1400', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(879, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-08-22 11:48:00', 'N/A', 'N/A', '1401', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(880, 'fd424713755181f54fa396db03dd44be4d1c3781 suspension 250ml', 'STF-4913', '1', '2024-08-22 11:48:00', 'N/A', 'N/A', '1402', NULL, 'Cash', '1000', 'paid', '0', NULL, NULL),
(881, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-22 11:48:00', 'N/A', 'N/A', '1403', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(882, 'fd424713755181f54fa396db03dd44be4d1c3781 suspension 250ml', 'STF-4913', '1', '2024-08-22 11:48:00', 'N/A', 'N/A', '1404', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(883, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g(2)', 'STF-4913', '1', '2024-08-22 11:48:00', 'N/A', 'N/A', '1405', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(884, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 5kgs', 'STF-4913', '1', '2024-08-22 11:48:00', 'N/A', 'N/A', '1410', NULL, 'Mobile Money', '3250', 'paid', '0', NULL, NULL),
(885, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-23 11:57:00', 'N/A', 'N/A', '1411', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(886, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-08-23 11:57:00', 'N/A', 'N/A', '1412', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(887, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-08-23 11:57:00', 'N/A', 'N/A', '1413', NULL, 'Cash', '50', 'paid', '0', NULL, NULL),
(888, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-08-26 14:51:00', 'N/A', 'N/A', '1414', NULL, 'Mobile Money', '90', 'paid', '0', NULL, NULL),
(889, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-08-26 14:51:00', 'N/A', 'N/A', '1415', NULL, 'Mobile Money', '40', 'paid', '0', NULL, NULL),
(890, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-26 14:51:00', 'N/A', 'N/A', '1416', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(891, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-26 14:51:00', 'N/A', 'N/A', '1417', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(892, 'fd424713755181f54fa396db03dd44be4d1c3781 granulates 31g', 'STF-4913', '1', '2024-08-26 14:51:00', 'N/A', 'N/A', '1418', NULL, 'Cash', '200', 'paid', '0', NULL, NULL),
(893, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-26 14:51:00', 'N/A', 'N/A', '1419', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(894, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-26 14:51:00', 'N/A', 'N/A', '1420', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(895, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-26 14:51:00', 'N/A', 'N/A', '1422', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(896, 'fd424713755181f54fa396db03dd44be4d1c3781 suspension 250ml', 'STF-4913', '1', '2024-08-27 14:56:00', 'N/A', 'N/A', '1423', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(897, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 jars 1kg(2)', 'STF-4913', '1', '2024-08-27 14:56:00', 'N/A', 'N/A', '1427', NULL, 'Cash', '90', 'paid', '0', NULL, NULL),
(898, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-27 14:56:00', 'N/A', 'N/A', '1429', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(899, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-27 14:56:00', 'N/A', 'N/A', '1430', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(900, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-28 15:01:00', 'N/A', 'N/A', '1435', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(901, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-28 15:01:00', 'N/A', 'N/A', '1437', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(902, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-28 15:01:00', 'N/A', 'N/A', '1438', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(903, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-28 15:01:00', 'N/A', 'N/A', '1439', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(904, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1443', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(905, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1445', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(906, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1446', NULL, 'Cash', '300', 'paid', '0', NULL, NULL),
(907, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 6kg', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1447', NULL, 'Mobile Money', '4200', 'paid', '0', NULL, NULL),
(908, '106cde34242aefeb5c2e532b8fa6468ea92b8733(12)', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1448', NULL, 'Mobile Money', '4320', 'paid', '0', NULL, NULL),
(909, '106cde34242aefeb5c2e532b8fa6468ea92b8733(18)', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1449', NULL, 'Mobile Money', '4120', 'paid', '0', NULL, NULL),
(910, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1450', NULL, 'Mobile Money', '700', 'paid', '0', NULL, NULL),
(911, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1451', NULL, 'Mobile Money', '650', 'paid', '0', NULL, NULL),
(912, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1452', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(913, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 50g', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1453', NULL, 'Mobile Money', '50', 'paid', '0', NULL, NULL),
(914, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1454', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(915, 'fd424713755181f54fa396db03dd44be4d1c3781', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1455', NULL, 'Mobile Money', '900', 'paid', '0', NULL, NULL),
(916, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1456', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(917, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1457', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(918, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-29 13:47:00', 'N/A', 'N/A', '1458', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(919, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-08-30 07:50:00', 'N/A', 'N/A', '1459', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(920, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-08-30 13:55:00', 'N/A', 'N/A', '1460', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(921, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 1/2kg', 'STF-4913', '1', '2024-08-31 12:42:00', 'N/A', 'N/A', '1461', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL);
INSERT INTO `sales` (`sale_id`, `sale_product_id`, `sale_user_id`, `sale_quantity`, `sale_datetime`, `sale_customer_name`, `sale_customer_phoneno`, `sale_receipt_no`, `sale_cart_number`, `sale_payment_method`, `sale_payment_amount`, `sale_payment_status`, `sale_discount`, `sale_credit_expected_date`, `sale_transaction_ref`) VALUES
(922, '106cde34242aefeb5c2e532b8fa6468ea92b8733(3)', 'STF-4913', '1', '2024-09-02 14:28:00', 'N/A', 'N/A', '1466', NULL, 'Mobile Money', '600', 'paid', '0', NULL, NULL),
(923, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70(5)', 'STF-4913', '1', '2024-09-02 14:28:00', 'N/A', 'N/A', '1467', NULL, 'Mobile Money', '500', 'paid', '0', NULL, NULL),
(924, 'fd424713755181f54fa396db03dd44be4d1c3781', 'STF-4913', '1', '2024-09-02 14:28:00', 'N/A', 'N/A', '1468', NULL, 'Mobile Money', '1000', 'paid', '0', NULL, NULL),
(925, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-09-02 14:28:00', 'N/A', 'N/A', '1469', NULL, 'Mobile Money', '100', 'paid', '0', NULL, NULL),
(926, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-09-02 14:28:00', 'N/A', 'N/A', '1470', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(927, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-09-02 14:28:00', 'N/A', 'N/A', '1471', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(928, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-09-02 14:28:00', 'N/A', 'N/A', '1472', NULL, 'Mobile Money', '300', 'paid', '0', NULL, NULL),
(929, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-09-03 14:34:00', 'N/A', 'N/A', '1473', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(930, 'fd424713755181f54fa396db03dd44be4d1c3781', 'STF-4913', '1', '2024-09-03 14:34:00', 'N/A', 'N/A', '1474', NULL, 'Mobile Money', '1000', 'paid', '0', NULL, NULL),
(931, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-09-03 14:34:00', 'N/A', 'N/A', '1475', NULL, 'Mobile Money', '200', 'paid', '0', NULL, NULL),
(932, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2kg', 'STF-4913', '1', '2024-09-03 14:34:00', 'N/A', 'N/A', '1476', NULL, 'Mobile Money', '1400', 'paid', '0', NULL, NULL),
(933, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 4kg', 'STF-4913', '1', '2024-09-04 14:37:00', 'N/A', 'N/A', '1478', NULL, 'Mobile Money', '2800', 'paid', '0', NULL, NULL),
(934, '6ebaf9c55db2020d35994f5713738342f075bbc6', 'STF-4913', '1', '2024-09-04 14:37:00', 'N/A', 'N/A', '1479', NULL, 'Mobile Money', '5000', 'paid', '0', NULL, NULL),
(935, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '2024-09-04 14:37:00', 'N/A', 'N/A', '1480', NULL, 'Cash', '100', 'paid', '0', NULL, NULL),
(936, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-09-04 14:37:00', 'N/A', 'N/A', '1481', NULL, 'Mobile Money', '400', 'paid', '0', NULL, NULL),
(937, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70(5)', 'STF-4913', '1', '2024-09-04 14:37:00', 'N/A', 'N/A', '1482', NULL, 'Mobile Money', '500', 'paid', '0', NULL, NULL),
(938, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-09-04 14:37:00', 'N/A', 'N/A', '1483', NULL, 'Cash', '800', 'paid', '0', NULL, NULL),
(939, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-09-04 14:37:00', 'N/A', 'N/A', '1484', NULL, 'Mobile Money', '800', 'paid', '0', NULL, NULL),
(940, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2 8kg', 'STF-4913', '1', '2024-09-04 16:31:00', 'N/A', 'N/A', '1485', NULL, 'Mobile Money', '5600', 'paid', '0', NULL, NULL),
(941, '106cde34242aefeb5c2e532b8fa6468ea92b8733(4)', 'STF-4913', '1', '2024-09-04 16:31:00', 'N/A', 'N/A', '1486', NULL, 'Mobile Money', '1400', 'paid', '0', NULL, NULL),
(942, '91230fd310a434b7dcc389ca18a88cddef64e49b', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '2100', 'paid', '0', NULL, 'N/A'),
(943, '91230fd310a434b7dcc389ca18a88cddef64e49b', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '2100', 'paid', '0', NULL, 'N/A'),
(944, '02e954e705dc7e6bc5f0ef16cc4b1286d7f9134d', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '400', 'paid', '0', NULL, 'N/A'),
(945, '02e954e705dc7e6bc5f0ef16cc4b1286d7f9134d', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '160', 'paid', '0', NULL, 'N/A'),
(946, '02e954e705dc7e6bc5f0ef16cc4b1286d7f9134d', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '400', 'paid', '0', NULL, 'N/A'),
(947, '02e954e705dc7e6bc5f0ef16cc4b1286d7f9134d', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '100', 'paid', '0', NULL, 'N/A'),
(948, '02e954e705dc7e6bc5f0ef16cc4b1286d7f9134d', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '200', 'paid', '0', NULL, 'N/A'),
(949, '02e954e705dc7e6bc5f0ef16cc4b1286d7f9134d', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '400', 'paid', '0', NULL, 'N/A'),
(950, '02e954e705dc7e6bc5f0ef16cc4b1286d7f9134d', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '300', 'paid', '0', NULL, 'N/A'),
(951, 'a4d73fe64868ab7226afef1afb20fbb8c6100f7a', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '1700', 'paid', '0', NULL, 'N/A'),
(952, 'da2285e1dcbb2e655362486244a4abaedecba460be3afde4', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '2300', 'paid', '0', NULL, 'N/A'),
(953, '02e954e705dc7e6bc5f0ef16cc4b1286d7f9134d', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '400', 'paid', '0', NULL, 'N/A'),
(954, '02e954e705dc7e6bc5f0ef16cc4b1286d7f9134d', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '100', 'paid', '0', NULL, 'N/A'),
(955, '02e954e705dc7e6bc5f0ef16cc4b1286d7f9134d', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '400', 'paid', '0', NULL, 'N/A'),
(956, 'da2285e1dcbb2e655362486244a4abaedecba460be3afde4', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '5000', 'paid', '0', NULL, 'N/A'),
(957, 'bcb09caad63e2e72c68b259c8a4d6d3e728bb5da', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '2300', 'paid', '0', NULL, 'N/A'),
(958, 'ec15f88596970ea5108fae57ad7ea1f9258f9a70', 'STF-4913', '1', '0000-00-00 00:00:00', 'N/A', 'N/A', '9058', NULL, 'Cash', '100', 'paid', '0', NULL, 'N/A'),
(959, 'f54b3ad816041f89bb85531731e7c86cd1e292a0', 'STF-4913', '2', '2024-09-11 05:46:09', 'NA', 'NA', '8197', NULL, 'Mobile Payment', '800', 'paid', '0', '', ''),
(960, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '4', '2024-09-11 05:55:12', 'NA', 'NA ', '4918', NULL, 'Mobile Payment', '400', 'paid', '0', '', ''),
(961, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-09-11 05:57:30', 'NA', 'NA ', '8349', NULL, 'Cash', '400', 'paid', '0', '', ''),
(962, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '2', '2024-09-11 06:01:33', 'NA', 'NA', '0278', NULL, 'Mobile Payment', '800', 'paid', '0', '', 'S1A92LWSH9'),
(963, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '2', '2024-09-11 06:04:15', 'Mwakavi', '0707037707', '5867', NULL, 'Mobile Payment', '700', 'paid', '100', '', 'Ken'),
(964, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-09-11 06:06:28', 'Mwakavi', '0707037707', '9317', NULL, 'Mobile Payment', '350', 'paid', '50', '', 'Ken'),
(965, 'ec367221c3df24d8c1160da0b81766003c52346b5b115b2a', 'STF-4913', '1', '2024-09-11 07:11:01', 'NA', 'NA ', '0216', NULL, 'Mobile Payment', '100', 'paid', '0', '', 'S191Z8HY2P'),
(966, 'ec367221c3df24d8c1160da0b81766003c52346b5b115b2a', 'STF-4913', '1', '2024-09-11 07:13:06', 'NA', 'NA', '5930', NULL, 'Mobile Payment', '100', 'paid', '0', '', 'SIA63L73KM'),
(967, '05106d3582a847939933d5691221ea662a1ac49f309bff03', 'STF-4913', '1', '2024-09-11 07:14:12', 'NA', 'NA ', '8312', NULL, 'Cash', '50', 'paid', '0', '', ''),
(968, '05106d3582a847939933d5691221ea662a1ac49f309bff03', 'STF-4913', '1', '2024-09-11 09:42:46', 'NA', 'NA ', '2657', NULL, 'Cash', '50', 'paid', '0', '', ''),
(969, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-09-11 13:36:33', 'NA', 'NA ', '3726', NULL, 'Cash', '400', 'paid', '0', '', ''),
(970, 'd102b289675a48f96a3144b67316f909cf49ba7d', 'STF-4913', '1', '2024-09-11 14:45:58', 'NA', 'NA', '5269', NULL, 'Mobile Payment', '1000', 'paid', '0', '', 'SIB88Q3RAE'),
(971, '3a27a97bfb7b006878ce9ce44b9e4296ecc66d7f', 'STF-4913', '2', '2024-09-11 15:12:16', 'NA', 'NA', '0798', NULL, 'Mobile Payment', '800', 'paid', '0', '', 'S1B18X1GGZ'),
(972, '4950b0dc655ba692359a5c353bcc4115b2312b0c', 'STF-4913', '1', '2024-09-11 15:14:21', 'NA', 'NA', '2017', NULL, 'Mobile Payment', '500', 'paid', '0', '', 'S1B88Q3RAE'),
(973, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-09-11 15:26:26', 'NA', 'NA ', '8473', NULL, 'Mobile Payment', '800', 'paid', '0', '', 'Ken'),
(974, 'ec367221c3df24d8c1160da0b81766003c52346b5b115b2a', 'STF-4913', '1', '2024-09-12 09:12:22', 'NA', 'NA', '9360', NULL, 'Mobile Payment', '100', 'paid', '0', '', 'SIC7BKT719'),
(975, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-09-12 10:32:24', 'NA', 'NA ', '4368', NULL, 'Cash', '800', 'paid', '0', '', ''),
(976, 'd23ed14baa555841ca5f0c3c6f7c54d2ec364aebdc488322', 'STF-4913', '10', '2024-09-12 12:22:36', 'NA', 'NA', '9672', NULL, 'Mobile Payment', '1200', 'paid', '300', '', 'Ken'),
(977, 'deae5ea871bcbd3588c8d441952494b89d078e27', 'STF-7245', '2', '2024-09-12 13:27:30', 'NA', 'NA', '1968', NULL, 'Cash', '1000', 'paid', '0', '', ''),
(978, '08504fbf381f7a20ebb1e8edd90e731438f0e092', 'STF-7245', '1', '2024-09-12 13:27:30', 'NA', 'NA', '1968', NULL, 'Cash', '28500', 'paid', '1500', '', ''),
(979, '14ac102ef5358b5065615f05db13c88168c42ba6', 'STF-7245', '10', '2024-09-12 13:27:30', 'NA', 'NA', '1968', NULL, 'Cash', '2050', 'paid', '250', '', ''),
(980, '117f71d1c923b00b016818e13e6fe2660c19580f', 'STF-7245', '3', '2024-09-12 13:27:30', 'NA', 'NA', '1968', NULL, 'Cash', '2000', 'paid', '500', '', ''),
(981, 'fa9bcc7af5ceea0d9677b6c643dd2d69475449f2c9f48d44', 'STF-7245', '2', '2024-09-12 13:30:49', 'NA', 'NA', '3072', NULL, 'Mobile Payment', '500', 'paid', '0', '', ''),
(982, 'da2285e1dcbb2e655362486244a4abaedecba460be3afde4', 'STF-7245', '2', '2024-09-12 13:30:49', 'NA', 'NA', '3072', NULL, 'Mobile Payment', '2500', 'paid', '200', '', ''),
(983, 'dff0f9290cd701b9cd272f035a64a60f504ab4957e3c36d9', 'STF-7245', '2', '2024-09-12 13:34:29', 'NA', 'NA', '4927', NULL, 'Mobile Payment', '900', 'paid', '0', '', ''),
(984, 'dff0f9290cd701b9cd272f035a64a60f504ab4957e3c36d9', 'STF-7245', '4', '2024-09-12 13:34:49', 'NA', 'NA', '4135', NULL, 'Mobile Payment', '800', 'paid', '100', '', ''),
(985, '05106d3582a847939933d5691221ea662a1ac49f309bff03', 'STF-4913', '1', '2024-09-12 13:58:45', 'NA', 'NA', '7893', NULL, 'Mobile Payment', '50', 'paid', '0', '', 'S1C1CNNR1X'),
(986, '19608688a962a39f30267d18c0abf073c3deadef7bb47ad1', 'STF-4913', '2', '2024-09-12 14:39:00', 'NA', 'NA ', '4675', NULL, 'Mobile Payment', '800', 'paid', '100', '', 'Ken'),
(987, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-4913', '1', '2024-09-13 07:29:05', 'NA', 'NA ', '8954', NULL, 'Cash', '400', 'paid', '0', '', ''),
(988, '14ac102ef5358b5065615f05db13c88168c42ba6', 'STF-7245', '5', '2024-09-13 16:52:05', 'NA', 'NA', '5972', NULL, 'Mobile Payment', '2100', 'paid', '200', '', ''),
(989, '7c1b7753042c1661c0daeb15b0fced3c837cc552', 'STF-7245', '5', '2024-09-13 16:52:05', 'NA', 'NA', '5972', NULL, 'Mobile Payment', '450', 'paid', '50', '', ''),
(990, 'd20e091232dc9214344e74779c55ee7f2a78d1c7', 'STF-7245', '5', '2024-09-13 16:52:05', 'NA', 'NA', '5972', NULL, 'Mobile Payment', '400', 'paid', '50', '', ''),
(991, 'bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', 'STF-4913', '1', '2024-09-13 16:59:10', 'NA', 'NA', '9807', NULL, 'Mobile Payment', '700', 'paid', '100', '', ''),
(992, '05106d3582a847939933d5691221ea662a1ac49f309bff03', 'STF-4913', '1', '2024-09-14 07:47:59', 'Na', 'NA', '9456', NULL, 'Cash', '50', 'paid', '0', '', ''),
(993, 'd102b289675a48f96a3144b67316f909cf49ba7d', 'STF-4913', '1', '2024-09-14 11:11:23', 'NA', 'NA ', '2739', NULL, 'Mobile Payment', '1000', 'paid', '0', '', 'S1EOJZW84W'),
(994, '32203ee141912a70991341d2ca620a3fd002495b416f7642', 'STF-4913', '1', '2024-09-14 11:13:03', 'NA', 'NA', '8724', NULL, 'Mobile Payment', '2300', 'paid', '0', '', 'S1EOJZW84W'),
(995, 'c677fda184d063da7a8a88093fca0328437d7e40de52e8c7', 'STF-4913', '1', '2024-09-14 11:21:59', 'NA', 'NA ', '6475', NULL, 'Mobile Payment', '500', 'paid', '0', '', 'S1EOJZW84W'),
(996, '258222dc152d290f389106eda58c783ff85c9da8', 'STF-4913', '1', '2024-09-14 11:23:33', 'NA', 'NA', '7849', NULL, 'Mobile Payment', '3500', 'paid', '0', '', 'S1EOJZW84W'),
(997, '33bdbc95b0251e14c610b92589a5b057476f610f2c2347f5', 'STF-4913', '1', '2024-09-14 11:25:00', 'NA', 'NA ', '3624', NULL, 'Mobile Payment', '600', 'paid', '0', '', 'S1EOJZW84W'),
(998, 'ec367221c3df24d8c1160da0b81766003c52346b5b115b2a', 'STF-4913', '1', '2024-09-16 05:42:23', 'NA', 'NA ', '7914', NULL, 'Cash', '100', 'paid', '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `store_settings`
--

CREATE TABLE `store_settings` (
  `store_id` varchar(200) NOT NULL,
  `store_name` varchar(200) NOT NULL,
  `store_adr` longtext NOT NULL,
  `store_email` varchar(200) NOT NULL,
  `store_status` varchar(200) NOT NULL DEFAULT 'active',
  `store_close_date` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_settings`
--

INSERT INTO `store_settings` (`store_id`, `store_name`, `store_adr`, `store_email`, `store_status`, `store_close_date`) VALUES
('2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Native Beecare Makueni', '+254 718 280 564 <br>\r\nAlong Wote-Makindu Road <br>\r\nWote - Makueni, Kenya', 'info@nativebeecare.co.ke', 'active', NULL),
('d5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'Native Beecare Nairobi ', '+254 718 280 564 <br>\r\nAlong Outer-ring Road <br>\r\nEmbakasi - Nairobi', 'info@nativebeecare.co.ke', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_logs`
--

CREATE TABLE `system_logs` (
  `log_id` int(11) NOT NULL,
  `log_user_id` varchar(200) NOT NULL,
  `log_ip_address` varchar(200) NOT NULL,
  `log_details` longtext NOT NULL,
  `log_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `log_type` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_logs`
--

INSERT INTO `system_logs` (`log_id`, `log_user_id`, `log_ip_address`, `log_details`, `log_created_at`, `log_type`) VALUES
(1, 'STF-0561', '127.0.0.1', 'Successfully Logged Into Manager Dashboard', '2024-08-06 14:43:52', 'Authentication Logs'),
(2, 'STF-0561', '127.0.0.1', 'Added  SKU-65401 - HONEY PRESS, With A Total Quantity Of  10', '2024-08-06 14:50:28', 'Items Management Logs'),
(3, 'STF-0561', '127.0.0.1', 'Added  SKU-57136 - DOUBLE SIEVE, With A Total Quantity Of  200', '2024-08-06 14:50:28', 'Items Management Logs'),
(4, 'STF-0561', '127.0.0.1', 'Added  SKU-07148 - UNCAPPING FORK, With A Total Quantity Of  10', '2024-08-06 14:50:28', 'Items Management Logs'),
(5, 'STF-0561', '127.0.0.1', 'Added  SKU-07148 - HONEY IN JERICANS (WHOLESALE), With A Total Quantity Of  200', '2024-08-06 14:50:28', 'Items Management Logs'),
(6, 'STF-0561', '127.0.0.1', 'Added  SKU-08193 - MAKUENI ORGANIC PURE HONEY 1/2KG, With A Total Quantity Of  200', '2024-08-06 14:50:28', 'Items Management Logs'),
(7, 'STF-0561', '127.0.0.1', 'Added  SKU-58643 - LANGSTROTH HIVE , With A Total Quantity Of  200', '2024-08-06 14:50:28', 'Items Management Logs'),
(8, 'STF-0561', '127.0.0.1', 'Added  SKU-80197 - MAKUENI PURE HONEY 1KG, With A Total Quantity Of  200', '2024-08-06 14:50:29', 'Items Management Logs'),
(9, 'STF-0561', '127.0.0.1', 'Added  SKU-23159 - CONICAL SIEVE, With A Total Quantity Of  200', '2024-08-06 14:50:29', 'Items Management Logs'),
(10, 'STF-0561', '127.0.0.1', 'Added  SKU-01698 - COTTON KHAKI BEESUIT, With A Total Quantity Of  200', '2024-08-06 14:50:29', 'Items Management Logs'),
(11, 'STF-0561', '127.0.0.1', 'Added  SKU-81504 - WAX SHEET, With A Total Quantity Of  200', '2024-08-06 14:50:29', 'Items Management Logs'),
(12, 'STF-0561', '127.0.0.1', 'Added  SKU-13489 - 3 FRAME HONEY EXTRACTOR MACHINE, With A Total Quantity Of  200', '2024-08-06 14:50:29', 'Items Management Logs'),
(13, 'STF-0561', '127.0.0.1', 'Added  SKU-80139 - GALVANISED BEE SMOKER, With A Total Quantity Of  200', '2024-08-06 14:50:29', 'Items Management Logs'),
(14, 'STF-0561', '127.0.0.1', 'Added  SKU-25430 - HONEY REFRACTOMETER, With A Total Quantity Of  200', '2024-08-06 14:50:29', 'Items Management Logs'),
(15, 'STF-0561', '127.0.0.1', 'Added  SKU-24786 - PROPOLIS COLLECTOR, With A Total Quantity Of  200', '2024-08-06 14:50:29', 'Items Management Logs'),
(16, 'STF-0561', '127.0.0.1', 'Added  SKU-51470 - BEE POLLEN , With A Total Quantity Of  200', '2024-08-06 14:50:30', 'Items Management Logs'),
(17, 'STF-0561', '127.0.0.1', 'Added  SKU-60375 - GALVANISED HIVE TOOL, With A Total Quantity Of  200', '2024-08-06 14:50:30', 'Items Management Logs'),
(18, 'STF-0561', '127.0.0.1', 'Added  SKU-18532 - STAINLESS STEEL HIVE TOOL, With A Total Quantity Of  200', '2024-08-06 14:50:30', 'Items Management Logs'),
(19, 'STF-0561', '127.0.0.1', 'Added  SKU-32589 - PLASTIC QUEEN EXCLUDER, With A Total Quantity Of  200', '2024-08-06 14:50:30', 'Items Management Logs'),
(20, 'STF-0561', '127.0.0.1', 'Added  SKU-72841 - TWO FRAME HONEY EXTRACTOR, With A Total Quantity Of  200', '2024-08-06 14:50:30', 'Items Management Logs'),
(21, 'STF-0561', '127.0.0.1', 'Added  SKU-68104 - 20LITRES SETTLING TANK, With A Total Quantity Of  200', '2024-08-06 14:50:30', 'Items Management Logs'),
(22, 'STF-0561', '127.0.0.1', 'Added  SKU-92056 - BEEHIVE FRAME GRIP, With A Total Quantity Of  200', '2024-08-06 14:50:30', 'Items Management Logs'),
(23, 'STF-0561', '127.0.0.1', 'Added  SKU-61457 - BEEHIVE FRAME WIRE 2KGS, With A Total Quantity Of  200', '2024-08-06 14:50:30', 'Items Management Logs'),
(24, 'STF-0561', '127.0.0.1', 'Added  SKU-42061 - BEE BRUSH, With A Total Quantity Of  200', '2024-08-06 14:50:31', 'Items Management Logs'),
(25, 'STF-0561', '127.0.0.1', 'Added  SKU-13894 - KENYAN PURE HONEY 1KG, With A Total Quantity Of  200', '2024-08-06 14:50:31', 'Items Management Logs'),
(26, 'STF-0561', '127.0.0.1', 'Added  SKU-74501 - HONEY GATE, With A Total Quantity Of  1000', '2024-08-06 14:50:31', 'Items Management Logs'),
(27, 'STF-0561', '127.0.0.1', 'Added  SKU-43710 - SQUEEZE HONEY 1/2KG, With A Total Quantity Of  300', '2024-08-06 14:50:31', 'Items Management Logs'),
(28, 'STF-0561', '127.0.0.1', 'Added  SKU-67935 - GLASS JAR HONEY 1KG, With A Total Quantity Of  300', '2024-08-06 14:50:31', 'Items Management Logs'),
(29, 'STF-0561', '127.0.0.1', 'Added  SKU-79803 - GLASS JAR HALF KG, With A Total Quantity Of  300', '2024-08-06 14:50:31', 'Items Management Logs'),
(30, 'STF-0561', '127.0.0.1', 'Added  SKU-02351 - ENCLOSED STAINLESS STEEL HONEY PRESS , With A Total Quantity Of  50', '2024-08-06 14:50:31', 'Items Management Logs'),
(31, 'STF-0561', '127.0.0.1', 'Added  SKU-78921 - COTTON BEESUIT , With A Total Quantity Of  300', '2024-08-06 14:50:31', 'Items Management Logs'),
(32, 'STF-0561', '127.0.0.1', 'Added  SKU-19524 - COMB HONEY  1KG, With A Total Quantity Of  300', '2024-08-06 14:50:31', 'Items Management Logs'),
(33, 'STF-0561', '127.0.0.1', 'Added  SKU-35924 - WHITE GAMBOUTS, With A Total Quantity Of  300', '2024-08-06 14:50:32', 'Items Management Logs'),
(34, 'STF-0561', '127.0.0.1', 'Added  SKU-52049 - 3 LAYER VENTILATED STINGPROOF BEESUIT , With A Total Quantity Of  10', '2024-08-06 14:50:32', 'Items Management Logs'),
(35, 'STF-0561', '127.0.0.1', 'Added  SKU-79236 - BEE FEEDERS , With A Total Quantity Of  300', '2024-08-06 14:50:32', 'Items Management Logs'),
(36, 'STF-0561', '127.0.0.1', 'Added  SKU-37108 - SELF SPACING HIVE FRAMES , With A Total Quantity Of  10000', '2024-08-06 14:50:32', 'Items Management Logs'),
(37, 'STF-0561', '127.0.0.1', 'Added  SKU-69205 - BEE LURE , With A Total Quantity Of  300', '2024-08-06 14:50:32', 'Items Management Logs'),
(38, 'STF-0561', '127.0.0.1', 'Added  SKU-51876 - LONG LANGSTROTH HIVE , With A Total Quantity Of  200', '2024-08-06 14:50:32', 'Items Management Logs'),
(39, 'STF-0561', '127.0.0.1', 'Added  SKU-97123 - HYDRAULIC JACK HONEY PRESS, With A Total Quantity Of  200', '2024-08-06 14:50:32', 'Items Management Logs'),
(40, 'STF-0561', '127.0.0.1', 'Added  SKU-16974 - HONEY BUCKET HOLDER/BUCKET PERCH, With A Total Quantity Of  200', '2024-08-06 14:50:32', 'Items Management Logs'),
(41, 'STF-0561', '127.0.0.1', 'Added  SKU-09863 - HONEY SETTLING TANK, With A Total Quantity Of  200', '2024-08-06 14:50:32', 'Items Management Logs'),
(42, 'STF-0561', '127.0.0.1', 'Added  SKU-19743 - PROPOLIS SUSPENSION, With A Total Quantity Of  200', '2024-08-06 14:50:33', 'Items Management Logs'),
(43, 'STF-9418', '127.0.0.1', 'Successfully Logged Into Admin Dashboard', '2024-08-06 15:43:52', 'Authentication Logs'),
(44, 'STF-9418', '127.0.0.1', 'Registered Native BeeCare Nairobi  As A New Store', '2024-08-06 15:44:58', 'Stores Management Logs'),
(45, 'STF-9418', '127.0.0.1', 'Added New Stock Of 10 Items To SKU-01698 COTTON KHAKI BEESUIT', '2024-08-06 15:46:54', 'Stock Management Logs'),
(46, 'STF-0561', '127.0.0.1', 'Successfully Logged Into Manager Dashboard', '2024-08-06 15:57:22', 'Authentication Logs'),
(47, 'STF-0561', '127.0.0.1', 'Set Overall Items Restock Limits To 5 For Native BeeCare Storegi', '2024-08-06 15:58:57', 'Items Management Logs'),
(48, 'STF-0561', '127.0.0.1', 'Edited Receipt & Sales Customizations For  Store', '2024-08-06 15:59:21', 'Settings & Configurations Logs'),
(49, 'STF-9418', '127.0.0.1', 'Successfully Logged Into Admin Dashboard', '2024-08-06 16:00:17', 'Authentication Logs'),
(50, 'STF-9418', '127.0.0.1', 'Created martin Account', '2024-08-06 16:00:43', 'User Account Management Logs'),
(51, 'STF-1457', '127.0.0.1', 'Successfully Logged Into Staff Dashboard', '2024-08-06 16:01:17', 'Authentication Logs'),
(52, 'STF-9418', '127.0.0.1', 'Successfully Logged Into Admin Dashboard', '2024-08-06 16:06:18', 'Authentication Logs'),
(53, 'STF-9418', '127.0.0.1', 'Edited Receipt & Sales Customizations', '2024-08-06 16:07:28', 'Settings & Configurations Logs'),
(54, 'STF-9418', '127.0.0.1', 'Edited Receipt & Sales Customizations', '2024-08-06 16:09:49', 'Settings & Configurations Logs'),
(55, 'STF-9418', '127.0.0.1', 'Edited Receipt & Sales Customizations', '2024-08-06 16:10:08', 'Settings & Configurations Logs'),
(56, 'STF-9418', '127.0.0.1', 'Edited Receipt & Sales Customizations', '2024-08-06 16:10:16', 'Settings & Configurations Logs'),
(57, 'STF-1457', '127.0.0.1', 'Successfully Logged Into Staff Dashboard', '2024-08-06 16:11:32', 'Authentication Logs'),
(58, 'STF-1457', '127.0.0.1', 'Sold 10 items of SKU-08193 MAKUENI ORGANIC PURE HONEY 1/2KG', '2024-08-06 16:13:01', 'Sales Management Logs'),
(59, 'STF-1457', '127.0.0.1', 'Added New Stock Of 10 Items To SKU-01698 COTTON KHAKI BEESUIT', '2024-08-06 16:15:04', 'Stock Management Logs'),
(60, 'STF-9418', '127.0.0.1', 'Successfully Logged Into Admin Dashboard', '2024-08-06 16:16:03', 'Authentication Logs'),
(61, 'STF-9418', '127.0.0.1', 'Edited Receipt & Sales Customizations', '2024-08-06 16:17:24', 'Settings & Configurations Logs'),
(62, 'STF-1457', '127.0.0.1', 'Successfully Logged Into Staff Dashboard', '2024-08-06 16:18:03', 'Authentication Logs'),
(63, 'STF-1457', '127.0.0.1', 'Sold 1 items of SKU-68104 20LITRES SETTLING TANK', '2024-08-06 16:18:48', 'Sales Management Logs'),
(64, 'STF-1457', '127.0.0.1', 'Sold 1 items of SKU-08193 MAKUENI ORGANIC PURE HONEY 1/2KG', '2024-08-06 16:18:49', 'Sales Management Logs'),
(65, 'STF-9418', '127.0.0.1', 'Successfully Logged Into Admin Dashboard', '2024-08-06 17:15:36', 'Authentication Logs'),
(66, 'STF-9418', '127.0.0.1', 'Revoked Staff Permission To Access Sales Management', '2024-08-06 17:16:06', 'Settings & Configurations Logs'),
(67, 'STF-9418', '127.0.0.1', 'Revoked Staff Permission To Access Stocks Management', '2024-08-06 17:16:08', 'Settings & Configurations Logs'),
(68, 'STF-0561', '127.0.0.1', 'Successfully Logged Into Manager Dashboard', '2024-08-06 17:16:36', 'Authentication Logs'),
(69, 'STF-1457', '127.0.0.1', 'Successfully Logged Into Staff Dashboard', '2024-08-06 17:16:52', 'Authentication Logs'),
(70, 'STF-9418', '127.0.0.1', 'Successfully Logged Into Admin Dashboard', '2024-08-07 06:16:45', 'Authentication Logs'),
(71, 'STF-9418', '127.0.0.1', 'Revoked Staff Permission To Access Items Management', '2024-08-07 06:17:00', 'Settings & Configurations Logs'),
(72, 'STF-9418', '127.0.0.1', 'Allowed Staff To Have Access To Sales Management', '2024-08-07 06:17:04', 'Settings & Configurations Logs'),
(73, 'STF-1457', '127.0.0.1', 'Successfully Logged Into Staff Dashboard', '2024-08-07 06:17:22', 'Authentication Logs'),
(74, 'STF-1457', '127.0.0.1', 'Sold 1 items of SKU-68104 20LITRES SETTLING TANK', '2024-08-07 06:19:40', 'Sales Management Logs'),
(75, 'STF-1457', '127.0.0.1', 'Sold 1 items of SKU-13489 3 FRAME HONEY EXTRACTOR MACHINE', '2024-08-07 06:19:41', 'Sales Management Logs'),
(76, 'STF-9418', '127.0.0.1', 'Successfully Logged Into Admin Dashboard', '2024-08-07 06:22:42', 'Authentication Logs'),
(77, 'STF-9418', '127.0.0.1', 'Updated Martin, martin@devlan.co.ke Account', '2024-08-07 06:23:03', 'User Account Management Logs'),
(78, 'STF-9418', '127.0.0.1', 'Edited Receipt & Sales Customizations', '2024-08-07 06:23:29', 'Settings & Configurations Logs'),
(79, 'STF-1457', '127.0.0.1', 'Successfully Logged Into Staff Dashboard', '2024-08-07 06:24:15', 'Authentication Logs'),
(80, 'STF-1457', '127.0.0.1', 'Sold 1 items of SKU-68104 20LITRES SETTLING TANK', '2024-08-07 06:51:12', 'Sales Management Logs'),
(81, 'STF-1457', '127.0.0.1', 'Sold 2 items of SKU-69205 BEE LURE ', '2024-08-07 06:51:12', 'Sales Management Logs'),
(82, 'STF-1457', '127.0.0.1', 'Sold 1 items of SKU-13489 3 FRAME HONEY EXTRACTOR MACHINE', '2024-08-07 06:51:12', 'Sales Management Logs'),
(83, 'STF-1457', '127.0.0.1', 'Sold 5 items of SKU-08193 MAKUENI ORGANIC PURE HONEY 1/2KG', '2024-08-07 06:53:25', 'Sales Management Logs'),
(84, 'STF-1457', '127.0.0.1', 'Sold 10 items of SKU-81504 WAX SHEET', '2024-08-07 06:53:25', 'Sales Management Logs'),
(85, 'STF-1457', '127.0.0.1', 'Sold 5 items of SKU-19743 PROPOLIS SUSPENSION', '2024-08-07 06:53:25', 'Sales Management Logs'),
(86, 'STF-1457', '127.0.0.1', 'Sold 20 items of SKU-68104 20LITRES SETTLING TANK', '2024-08-07 06:55:11', 'Sales Management Logs'),
(87, 'STF-1457', '127.0.0.1', 'Sold 5 items of SKU-13489 3 FRAME HONEY EXTRACTOR MACHINE', '2024-08-07 06:55:11', 'Sales Management Logs'),
(88, 'STF-1457', '127.0.0.1', 'Sold 10 items of SKU-68104 20LITRES SETTLING TANK', '2024-08-07 06:58:38', 'Sales Management Logs'),
(89, 'STF-1457', '127.0.0.1', 'Sold 5 items of SKU-13489 3 FRAME HONEY EXTRACTOR MACHINE', '2024-08-07 06:58:38', 'Sales Management Logs'),
(90, 'STF-9418', '127.0.0.1', 'Successfully Logged Into Admin Dashboard', '2024-08-07 06:59:43', 'Authentication Logs'),
(91, 'STF-0561', '127.0.0.1', 'Successfully Logged Into Manager Dashboard', '2024-08-07 09:58:20', 'Authentication Logs'),
(92, 'STF-9418', '127.0.0.1', 'Successfully Logged Into Admin Dashboard', '2024-08-07 11:10:26', 'Authentication Logs'),
(93, 'STF-9418', '197.248.93.73', 'Successfully Logged Into Admin Dashboard', '2024-08-07 15:59:38', 'Authentication Logs'),
(94, 'STF-9418', '197.248.75.91', 'Successfully Logged Into Admin Dashboard', '2024-08-08 07:33:03', 'Authentication Logs'),
(95, 'STF-9418', '197.248.75.91', 'Successfully Logged Into Admin Dashboard', '2024-08-08 07:40:02', 'Authentication Logs'),
(96, 'STF-9418', '197.248.75.91', 'Edited Core System Customizations', '2024-08-08 07:42:40', 'Settings & Configurations Logs'),
(97, 'STF-9418', '197.248.75.91', 'Edited Core System Customizations', '2024-08-08 07:42:48', 'Settings & Configurations Logs'),
(98, 'STF-9418', '197.248.75.91', 'Successfully Logged Into Admin Dashboard', '2024-08-08 07:54:15', 'Authentication Logs'),
(99, 'STF-1457', '197.248.75.91', 'Successfully Logged Into Staff Dashboard', '2024-08-08 08:06:09', 'Authentication Logs'),
(100, 'STF-1457', '197.248.75.91', 'Sold 1 items of SKU-68104 20LITRES SETTLING TANK', '2024-08-08 08:08:40', 'Sales Management Logs'),
(101, 'STF-1457', '197.248.75.91', 'Sold 1 items of SKU-13489 3 FRAME HONEY EXTRACTOR MACHINE', '2024-08-08 08:08:40', 'Sales Management Logs'),
(102, 'STF-1457', '197.248.75.91', 'Sold 1 items of SKU-42061 BEE BRUSH', '2024-08-08 08:08:40', 'Sales Management Logs'),
(103, 'STF-9418', '197.248.75.91', 'Successfully Logged Into Admin Dashboard', '2024-08-08 08:23:32', 'Authentication Logs'),
(104, 'STF-9418', '197.248.75.91', 'Deleted Martin martin@devlan.co.ke Account', '2024-08-08 08:23:56', 'User Account Management Logs'),
(105, 'STF-9418', '197.248.75.91', 'Deleted Ken  kennedy@nativebeecare.co.ke Account', '2024-08-08 08:24:05', 'User Account Management Logs'),
(106, 'STF-9418', '197.248.75.91', 'Edited STMP Mailer Settings', '2024-08-08 08:30:27', 'Settings & Configurations Logs'),
(107, 'STF-9418', '197.248.75.91', 'Created Kennedy Mutua Account', '2024-08-08 08:33:12', 'User Account Management Logs'),
(108, 'STF-9418', '197.248.75.91', 'Created Juliet  Account', '2024-08-08 08:34:04', 'User Account Management Logs'),
(109, 'STF-9418', '197.248.75.91', 'Updated Kennedy, ken@nativebeecare.co.ke Account', '2024-08-08 08:34:29', 'User Account Management Logs'),
(110, 'STF-4705', '197.248.75.91', 'Successfully Logged Into Manager Dashboard', '2024-08-08 08:36:07', 'Authentication Logs'),
(111, 'STF-4913', '197.248.75.91', 'Successfully Logged Into Staff Dashboard', '2024-08-08 08:37:10', 'Authentication Logs'),
(112, 'STF-4705', '197.248.75.91', 'Successfully Logged Into Manager Dashboard', '2024-08-08 09:00:30', 'Authentication Logs'),
(113, 'STF-4705', '197.248.75.91', 'Successfully Logged Into Manager Dashboard', '2024-08-08 10:04:59', 'Authentication Logs'),
(114, 'STF-4705', '91.109.17.158', 'Successfully Logged Into Manager Dashboard', '2024-08-13 07:40:47', 'Authentication Logs'),
(115, 'STF-4705', '91.109.17.158', 'Edited Receipt & Sales Customizations For Native BeeCare Store', '2024-08-13 07:42:26', 'Settings & Configurations Logs'),
(116, 'STF-4705', '91.109.17.158', 'Edited Receipt & Sales Customizations For Native BeeCare Store', '2024-08-13 07:43:01', 'Settings & Configurations Logs'),
(117, 'STF-4705', '91.109.17.158', 'Updated  SKU-13894 - Makueni Organic Honey 1KG Details', '2024-08-13 07:44:56', 'Items Management Logs'),
(118, 'STF-4705', '91.109.17.158', 'Updated  SKU-13489 - 3 FRAME HONEY EXTRACTOR MACHINE Details', '2024-08-13 07:45:32', 'Items Management Logs'),
(119, 'STF-4705', '91.109.17.158', 'Successfully Logged Into Manager Dashboard', '2024-08-13 07:46:13', 'Authentication Logs'),
(120, 'STF-4705', '197.248.93.73', 'Successfully Logged Into Manager Dashboard', '2024-08-16 10:41:13', 'Authentication Logs'),
(121, 'STF-4705', '197.248.93.73', 'Updated  SKU-01698 - COTTON KHAKI BEESUIT Details', '2024-08-16 10:45:20', 'Items Management Logs'),
(122, 'STF-4705', '197.248.93.73', 'Updated  SKU-01698 - COTTON KHAKI BEESUIT Details', '2024-08-16 10:45:21', 'Items Management Logs'),
(123, 'STF-4705', '197.248.93.73', 'Updated  SKU-01698 - COTTON KHAKI BEESUIT Details', '2024-08-16 10:45:26', 'Items Management Logs'),
(124, 'STF-4705', '197.248.93.73', 'Updated  SKU-01698 - COTTON KHAKI BEESUIT Details', '2024-08-16 10:45:28', 'Items Management Logs'),
(125, 'STF-4705', '197.248.93.73', 'Updated  SKU-01698 - COTTON KHAKI BEESUIT Details', '2024-08-16 10:45:54', 'Items Management Logs'),
(126, 'STF-4705', '197.248.93.73', 'Updated  SKU-13489 - 3 FRAME HONEY EXTRACTOR MACHINE Details', '2024-08-16 10:48:26', 'Items Management Logs'),
(127, 'STF-4705', '197.248.93.73', 'Updated  SKU-16974 - HONEY BUCKET HOLDER/BUCKET PERCH Details', '2024-08-16 10:49:00', 'Items Management Logs'),
(128, 'STF-4705', '197.248.93.73', 'Added  J3870 - Leather Gloves, With A Total Quantity Of  50', '2024-08-16 10:51:40', 'Items Management Logs'),
(129, 'STF-4705', '197.248.93.73', 'Updated  J3870 - Leather Gloves Details', '2024-08-16 10:52:56', 'Items Management Logs'),
(130, 'STF-4705', '197.248.93.73', 'Updated  SKU-23159 - CONICAL SIEVE Details', '2024-08-16 10:55:47', 'Items Management Logs'),
(131, 'STF-4705', '197.248.93.73', 'Updated  SKU-79236 - BEE FEEDER Details', '2024-08-16 10:59:08', 'Items Management Logs'),
(132, 'STF-4705', '197.248.93.73', 'Updated  SKU-69205 - BEE LURE  Details', '2024-08-16 11:00:26', 'Items Management Logs'),
(133, 'STF-4705', '197.248.93.73', 'Updated  SKU-25430 - HONEY REFRACTOMETER Details', '2024-08-16 11:02:20', 'Items Management Logs'),
(134, 'STF-4705', '197.248.93.73', 'Updated  SKU-25430 - HONEY REFRACTOMETER Details', '2024-08-16 11:02:42', 'Items Management Logs'),
(135, 'STF-4705', '197.248.93.73', 'Added  P3105 - Honey Dipper, With A Total Quantity Of  50', '2024-08-16 11:05:04', 'Items Management Logs'),
(136, 'STF-4705', '197.248.93.73', 'Updated  SKU-52049 - 3 LAYER VENTILATED  BEE SUIT  Details', '2024-08-16 11:06:45', 'Items Management Logs'),
(137, 'STF-4705', '197.248.93.73', 'Updated  SKU-52049 - 3 LAYER VENTILATED  BEE SUIT  Details', '2024-08-16 11:08:42', 'Items Management Logs'),
(138, 'STF-4705', '197.248.93.73', 'Added  F3592 - Bee smoker, Stainless steel, With A Total Quantity Of  280', '2024-08-16 11:22:32', 'Items Management Logs'),
(139, 'STF-4705', '197.248.93.73', 'Updated  SKU-13489 - 3 FRAME HONEY EXTRACTOR MACHINE Details', '2024-08-16 11:27:00', 'Items Management Logs'),
(140, 'STF-4705', '197.248.93.73', 'Updated  SKU-72841 - 4-FRAME HONEY EXTRACTOR(Manual) Details', '2024-08-16 11:41:25', 'Items Management Logs'),
(141, 'STF-4705', '197.248.93.73', 'Updated  SKU-13489 - 3 FRAME HONEY EXTRACTOR MACHINE Details', '2024-08-16 11:41:51', 'Items Management Logs'),
(142, 'STF-4705', '197.248.93.73', 'Updated  SKU-02351 - HONEY PRESS (Enclosed) Details', '2024-08-16 12:04:03', 'Items Management Logs'),
(143, 'STF-4705', '197.248.93.73', 'Updated  SKU-02351 - HONEY PRESS (Enclosed) Details', '2024-08-16 12:04:13', 'Items Management Logs'),
(144, 'STF-4705', '197.248.93.73', 'Updated  SKU-02351 - HONEY PRESS (Enclosed) Details', '2024-08-16 12:04:21', 'Items Management Logs'),
(145, 'STF-4705', '197.248.93.73', 'Updated  P3105 - Honey Dipper Details', '2024-08-16 12:05:47', 'Items Management Logs'),
(146, 'STF-4705', '197.248.93.73', 'Updated  P3105 - Honey Dipper Details', '2024-08-16 12:05:53', 'Items Management Logs'),
(147, 'STF-4705', '197.248.93.73', 'Updated  SKU-18532 - HIVE TOOL(Stainless steel) Details', '2024-08-16 12:17:04', 'Items Management Logs'),
(148, 'STF-4705', '197.248.93.73', 'Updated  SKU-07148 - UNCAPPING FORK Details', '2024-08-16 12:19:33', 'Items Management Logs'),
(149, 'STF-4705', '197.248.93.73', 'Added  B2038 - Beehive connector, With A Total Quantity Of  400', '2024-08-16 12:21:46', 'Items Management Logs'),
(150, 'STF-1457', '197.248.93.73', 'Successfully Logged Into Staff Dashboard', '2024-08-19 12:25:14', 'Authentication Logs'),
(151, 'STF-9418', '197.248.93.73', 'Successfully Logged Into Admin Dashboard', '2024-08-19 12:25:34', 'Authentication Logs'),
(152, 'STF-4705', '197.248.93.73', 'Successfully Logged Into Manager Dashboard', '2024-08-23 07:05:05', 'Authentication Logs'),
(153, 'STF-4705', '197.248.93.73', 'Updated  SKU-01698 - COTTON KHAKI BEESUIT Details', '2024-08-23 07:09:26', 'Items Management Logs'),
(154, 'STF-4705', '197.248.93.73', 'Updated  SKU-01698 - COTTON KHAKI BEESUIT Details', '2024-08-23 07:10:13', 'Items Management Logs'),
(155, 'STF-4705', '197.248.93.73', 'Updated  SKU-01698 - COTTON KHAKI BEESUIT Details', '2024-08-23 07:10:13', 'Items Management Logs'),
(156, 'STF-4705', '197.248.93.73', 'Updated  SKU-78921 - COTTON BEESUIT(standard) Details', '2024-08-23 07:11:05', 'Items Management Logs'),
(157, 'STF-4705', '197.248.93.73', 'Updated  SKU-51876 - LONG LANGSTROTH HIVE  Details', '2024-08-23 07:11:43', 'Items Management Logs'),
(158, 'STF-4705', '197.248.93.73', 'Updated  SKU-08193 - MAKUENI ORGANIC PURE HONEY 1/2KG Details', '2024-08-23 07:12:32', 'Items Management Logs'),
(159, 'STF-4705', '91.109.17.144', 'Updated  SKU-02351 - HONEY PRESS (Enclosed) Details', '2024-08-23 07:26:38', 'Items Management Logs'),
(160, 'STF-4705', '91.109.17.144', 'Updated  SKU-81504 - WAX SHEET Details', '2024-08-23 07:28:22', 'Items Management Logs'),
(161, 'STF-4705', '91.109.17.144', 'Updated  SKU-74501 - HONEY GATE Details', '2024-08-23 07:30:00', 'Items Management Logs'),
(162, 'STF-4705', '91.109.17.144', 'Updated  SKU-32589 - PLASTIC QUEEN EXCLUDER Details', '2024-08-23 07:32:41', 'Items Management Logs'),
(163, 'STF-4705', '197.248.93.73', 'Successfully Logged Into Manager Dashboard', '2024-08-30 10:31:48', 'Authentication Logs'),
(164, '', '197.248.93.73', 'Updated  SKU-09863 - HONEY SETTLING TANK Details', '2024-08-30 11:29:12', 'Items Management Logs'),
(165, '', '197.248.93.73', 'Updated  SKU-09863 - HONEY SETTLING TANK Details', '2024-08-30 11:29:13', 'Items Management Logs'),
(166, '', '197.248.93.73', 'Updated  SKU-09863 - HONEY SETTLING TANK Details', '2024-08-30 11:29:14', 'Items Management Logs'),
(167, 'STF-4705', '197.248.93.73', 'Successfully Logged Into Manager Dashboard', '2024-08-30 11:29:21', 'Authentication Logs'),
(168, 'STF-4705', '197.248.93.73', 'Updated  SKU-09863 - HONEY SETTLING TANK Details', '2024-08-30 11:36:31', 'Items Management Logs'),
(169, 'STF-4705', '197.248.93.73', 'Updated  SKU-07148 - HONEY IN JERICANS (WHOLESALE) Details', '2024-08-30 11:39:59', 'Items Management Logs'),
(170, 'STF-9418', '216.128.0.63', 'Successfully Logged Into Admin Dashboard', '2024-08-31 14:55:29', 'Authentication Logs'),
(171, 'STF-4705', '216.128.0.63', 'Successfully Logged Into Admin Dashboard', '2024-08-31 14:58:07', 'Authentication Logs'),
(172, 'STF-9418', '216.128.0.13', 'Successfully Logged Into Admin Dashboard', '2024-09-02 07:04:31', 'Authentication Logs'),
(173, 'STF-4705', '197.248.93.73', 'Successfully Logged Into Admin Dashboard', '2024-09-02 07:08:50', 'Authentication Logs'),
(174, 'STF-9418', '216.128.0.13', 'Added  SKU-13489 - 3 FRAME HONEY EXTRACTOR MACHINE, With A Total Quantity Of  17', '2024-09-02 07:21:29', 'Items Management Logs'),
(175, 'STF-9418', '216.128.0.13', 'Added  SKU-67935 - GLASS JAR HONEY 1KG, With A Total Quantity Of  300', '2024-09-02 07:21:29', 'Items Management Logs'),
(176, 'STF-9418', '216.128.0.13', 'Added  SKU-08193 - MAKUENI ORGANIC PURE HONEY 1/2KG, With A Total Quantity Of  100', '2024-09-02 07:21:29', 'Items Management Logs'),
(177, 'STF-9418', '216.128.0.13', 'Added  SKU-07148 - HONEY IN JERICANS (WHOLESALE), With A Total Quantity Of  0', '2024-09-02 07:21:29', 'Items Management Logs'),
(178, 'STF-9418', '216.128.0.13', 'Added  SKU-02351 - HONEY PRESS (Enclosed), With A Total Quantity Of  12', '2024-09-02 07:21:29', 'Items Management Logs'),
(179, 'STF-9418', '216.128.0.13', 'Added  SKU-07148 - UNCAPPING FORK, With A Total Quantity Of  50', '2024-09-02 07:21:29', 'Items Management Logs'),
(180, 'STF-9418', '216.128.0.13', 'Added  SKU-68104 - 20LITRES SETTLING TANK, With A Total Quantity Of  166', '2024-09-02 07:21:29', 'Items Management Logs'),
(181, 'STF-9418', '216.128.0.13', 'Added  SKU-78921 - COTTON BEESUIT(standard), With A Total Quantity Of  14', '2024-09-02 07:21:29', 'Items Management Logs'),
(182, 'STF-9418', '216.128.0.13', 'Added  SKU-79236 - BEE FEEDER, With A Total Quantity Of  150', '2024-09-02 07:21:29', 'Items Management Logs'),
(183, 'STF-9418', '216.128.0.13', 'Added  SKU-24786 - PROPOLIS COLLECTOR, With A Total Quantity Of  200', '2024-09-02 07:21:29', 'Items Management Logs'),
(184, 'STF-9418', '216.128.0.13', 'Added  F3592 - Bee smoker, Stainless steel, With A Total Quantity Of  280', '2024-09-02 07:21:29', 'Items Management Logs'),
(185, 'STF-9418', '216.128.0.13', 'Added  SKU-51876 - LONG LANGSTROTH HIVE , With A Total Quantity Of  1', '2024-09-02 07:21:29', 'Items Management Logs'),
(186, 'STF-9418', '216.128.0.13', 'Added  SKU-19524 - COMB HONEY  1KG, With A Total Quantity Of  300', '2024-09-02 07:21:29', 'Items Management Logs'),
(187, 'STF-9418', '216.128.0.13', 'Added  SKU-01698 - COTTON KHAKI BEESUIT, With A Total Quantity Of  0', '2024-09-02 07:21:29', 'Items Management Logs'),
(188, 'STF-9418', '216.128.0.13', 'Added  SKU-23159 - CONICAL SIEVE, With A Total Quantity Of  50', '2024-09-02 07:21:29', 'Items Management Logs'),
(189, 'STF-9418', '216.128.0.13', 'Added  SKU-51470 - BEE POLLEN , With A Total Quantity Of  200', '2024-09-02 07:21:29', 'Items Management Logs'),
(190, 'STF-9418', '216.128.0.13', 'Added  SKU-42061 - BEE BRUSH, With A Total Quantity Of  199', '2024-09-02 07:21:29', 'Items Management Logs'),
(191, 'STF-9418', '216.128.0.13', 'Added  SKU-97123 - HYDRAULIC JACK HONEY PRESS, With A Total Quantity Of  200', '2024-09-02 07:21:29', 'Items Management Logs'),
(192, 'STF-9418', '216.128.0.13', 'Added  SKU-32589 - PLASTIC QUEEN EXCLUDER, With A Total Quantity Of  160', '2024-09-02 07:21:29', 'Items Management Logs'),
(193, 'STF-9418', '216.128.0.13', 'Added  B2038 - Beehive connector, With A Total Quantity Of  400', '2024-09-02 07:21:29', 'Items Management Logs'),
(194, 'STF-9418', '216.128.0.13', 'Added  SKU-81504 - WAX SHEET, With A Total Quantity Of  300', '2024-09-02 07:21:29', 'Items Management Logs'),
(195, 'STF-9418', '216.128.0.13', 'Added  P3105 - Honey Dipper, With A Total Quantity Of  100', '2024-09-02 07:21:29', 'Items Management Logs'),
(196, 'STF-9418', '216.128.0.13', 'Added  SKU-52049 - 3 LAYER VENTILATED  BEE SUIT , With A Total Quantity Of  3', '2024-09-02 07:21:29', 'Items Management Logs'),
(197, 'STF-9418', '216.128.0.13', 'Added  SKU-74501 - HONEY GATE, With A Total Quantity Of  50', '2024-09-02 07:21:29', 'Items Management Logs'),
(198, 'STF-9418', '216.128.0.13', 'Added  SKU-58643 - LANGSTROTH HIVE , With A Total Quantity Of  200', '2024-09-02 07:21:29', 'Items Management Logs'),
(199, 'STF-9418', '216.128.0.13', 'Added  SKU-18532 - HIVE TOOL(Stainless steel), With A Total Quantity Of  150', '2024-09-02 07:21:29', 'Items Management Logs'),
(200, 'STF-9418', '216.128.0.13', 'Added  SKU-57136 - DOUBLE SIEVE, With A Total Quantity Of  200', '2024-09-02 07:21:29', 'Items Management Logs'),
(201, 'STF-9418', '216.128.0.13', 'Added  SKU-37108 - SELF SPACING HIVE FRAMES , With A Total Quantity Of  10000', '2024-09-02 07:21:29', 'Items Management Logs'),
(202, 'STF-9418', '216.128.0.13', 'Added  J3870 - Leather Gloves, With A Total Quantity Of  50', '2024-09-02 07:21:29', 'Items Management Logs'),
(203, 'STF-9418', '216.128.0.13', 'Added  SKU-65401 - HONEY PRESS, With A Total Quantity Of  10', '2024-09-02 07:21:29', 'Items Management Logs'),
(204, 'STF-9418', '216.128.0.13', 'Added  SKU-92056 - BEEHIVE FRAME GRIP, With A Total Quantity Of  200', '2024-09-02 07:21:29', 'Items Management Logs'),
(205, 'STF-9418', '216.128.0.13', 'Added  SKU-60375 - GALVANISED HIVE TOOL, With A Total Quantity Of  200', '2024-09-02 07:21:29', 'Items Management Logs'),
(206, 'STF-9418', '216.128.0.13', 'Added  SKU-79803 - GLASS JAR HALF KG, With A Total Quantity Of  300', '2024-09-02 07:21:29', 'Items Management Logs'),
(207, 'STF-9418', '216.128.0.13', 'Added  SKU-80139 - GALVANISED BEE SMOKER, With A Total Quantity Of  200', '2024-09-02 07:21:29', 'Items Management Logs'),
(208, 'STF-9418', '216.128.0.13', 'Added  SKU-13894 - Makueni Organic Honey 1KG, With A Total Quantity Of  200', '2024-09-02 07:21:29', 'Items Management Logs'),
(209, 'STF-9418', '216.128.0.13', 'Added  SKU-25430 - HONEY REFRACTOMETER, With A Total Quantity Of  6', '2024-09-02 07:21:29', 'Items Management Logs'),
(210, 'STF-9418', '216.128.0.13', 'Added  SKU-09863 - HONEY SETTLING TANK, With A Total Quantity Of  2', '2024-09-02 07:21:29', 'Items Management Logs'),
(211, 'STF-9418', '216.128.0.13', 'Added  SKU-69205 - BEE LURE , With A Total Quantity Of  15', '2024-09-02 07:21:29', 'Items Management Logs'),
(212, 'STF-9418', '216.128.0.13', 'Added  SKU-16974 - HONEY BUCKET HOLDER/BUCKET PERCH, With A Total Quantity Of  10', '2024-09-02 07:21:29', 'Items Management Logs'),
(213, 'STF-9418', '216.128.0.13', 'Added  SKU-43710 - SQUEEZE HONEY 1/2KG, With A Total Quantity Of  300', '2024-09-02 07:21:29', 'Items Management Logs'),
(214, 'STF-9418', '216.128.0.13', 'Added  SKU-35924 - WHITE GAMBOUTS, With A Total Quantity Of  300', '2024-09-02 07:21:29', 'Items Management Logs'),
(215, 'STF-9418', '216.128.0.13', 'Added  SKU-61457 - BEEHIVE FRAME WIRE 2KGS, With A Total Quantity Of  200', '2024-09-02 07:21:29', 'Items Management Logs'),
(216, 'STF-9418', '216.128.0.13', 'Added  SKU-80197 - MAKUENI PURE HONEY 1KG, With A Total Quantity Of  200', '2024-09-02 07:21:29', 'Items Management Logs'),
(217, 'STF-9418', '216.128.0.13', 'Added  SKU-72841 - 4-FRAME HONEY EXTRACTOR(Manual), With A Total Quantity Of  3', '2024-09-02 07:21:29', 'Items Management Logs'),
(218, 'STF-9418', '216.128.0.13', 'Added  SKU-19743 - PROPOLIS SUSPENSION, With A Total Quantity Of  195', '2024-09-02 07:21:29', 'Items Management Logs'),
(219, 'STF-4705', '146.70.33.50', 'Successfully Logged Into Admin Dashboard', '2024-09-02 10:26:50', 'Authentication Logs'),
(220, 'STF-4705', '178.162.198.32', 'Successfully Logged Into Admin Dashboard', '2024-09-05 12:02:58', 'Authentication Logs'),
(221, 'STF-4705', '178.162.198.32', 'Updated  SKU-78921 - COTTON BEESUIT(standard) Details', '2024-09-05 12:07:18', 'Items Management Logs'),
(222, 'STF-4705', '178.162.198.32', 'Added  H3978 - Sateen Beesuits, With A Total Quantity Of  8', '2024-09-05 12:08:20', 'Items Management Logs'),
(223, 'STF-4705', '178.162.198.32', 'Edited Receipt & Sales Customizations For Native BeeCare Nairobi  Store', '2024-09-05 12:14:37', 'Settings & Configurations Logs'),
(224, 'STF-4705', '178.162.198.32', 'Edited Receipt & Sales Customizations For Native BeeCare Nairobi  Store', '2024-09-05 12:22:11', 'Settings & Configurations Logs'),
(225, 'STF-9418', '105.161.146.82', 'Successfully Logged Into Admin Dashboard', '2024-09-05 16:26:57', 'Authentication Logs'),
(226, 'STF-9418', '105.161.146.82', 'Created Bridgit  Account', '2024-09-05 16:32:40', 'User Account Management Logs'),
(227, 'STF-7245', '105.161.146.82', 'Successfully Logged Into Staff Dashboard', '2024-09-05 16:33:34', 'Authentication Logs'),
(228, 'STF-7245', '105.161.146.82', 'Sold 1 items of SKU-68104 20LITRES SETTLING TANK', '2024-09-05 16:35:55', 'Sales Management Logs'),
(229, 'STF-7245', '105.161.146.82', 'Sold 1 items of SKU-13489 3 FRAME HONEY EXTRACTOR MACHINE', '2024-09-05 16:35:55', 'Sales Management Logs'),
(230, 'STF-9418', '105.161.146.82', 'Successfully Logged Into Admin Dashboard', '2024-09-05 16:36:57', 'Authentication Logs'),
(231, 'STF-9418', '105.161.146.82', 'Edited Receipt & Sales Customizations', '2024-09-05 16:40:32', 'Settings & Configurations Logs'),
(232, 'STF-9418', '105.161.146.82', 'Edited Receipt & Sales Customizations', '2024-09-05 16:40:56', 'Settings & Configurations Logs'),
(233, 'STF-7245', '105.161.146.82', 'Successfully Logged Into Staff Dashboard', '2024-09-05 16:41:34', 'Authentication Logs'),
(234, 'STF-7245', '105.161.146.82', 'Sold 2 items of SKU-68104 20LITRES SETTLING TANK', '2024-09-05 16:42:37', 'Sales Management Logs'),
(235, 'STF-7245', '105.161.146.82', 'Successfully Logged Into Staff Dashboard', '2024-09-05 17:11:56', 'Authentication Logs'),
(236, 'STF-7245', '105.161.146.82', 'Sold 10 items of SKU-80139 GALVANISED BEE SMOKER', '2024-09-05 17:13:10', 'Sales Management Logs'),
(237, 'STF-9418', '105.161.146.82', 'Successfully Logged Into Admin Dashboard', '2024-09-05 17:13:49', 'Authentication Logs'),
(238, 'STF-9418', '105.161.146.82', 'Updated Native Beecare Nairobi  Details', '2024-09-05 17:15:36', 'Stores Management Logs'),
(239, 'STF-9418', '105.161.146.82', 'Updated Native Beecare Makueni Details', '2024-09-05 17:16:27', 'Stores Management Logs'),
(240, 'STF-9418', '105.161.146.82', 'Updated Native Beecare Nairobi  Details', '2024-09-05 17:16:36', 'Stores Management Logs'),
(241, 'STF-9418', '216.128.0.63', 'Successfully Logged Into Admin Dashboard', '2024-09-05 18:19:21', 'Authentication Logs'),
(242, 'STF-4705', '146.70.33.50', 'Successfully Logged Into Admin Dashboard', '2024-09-06 07:50:32', 'Authentication Logs'),
(243, 'STF-7245', '146.70.33.50', 'Successfully Logged Into Staff Dashboard', '2024-09-06 08:10:03', 'Authentication Logs'),
(244, 'STF-7245', '154.159.252.174', 'Sold 3 items of SKU-13489 3 FRAME HONEY EXTRACTOR MACHINE', '2024-09-06 08:47:21', 'Sales Management Logs'),
(245, 'STF-7245', '154.159.252.174', 'Sold 5 items of P3105 Honey Dipper', '2024-09-06 08:54:12', 'Sales Management Logs'),
(246, 'STF-7245', '154.159.252.174', 'Sold 1 items of SKU-42061 BEE BRUSH', '2024-09-06 08:54:12', 'Sales Management Logs'),
(247, 'STF-7245', '154.159.252.174', 'Sold 1 items of F3592 Bee smoker, Stainless steel', '2024-09-06 08:54:12', 'Sales Management Logs'),
(248, 'STF-7245', '154.159.252.174', 'Sold 1 items of SKU-18532 HIVE TOOL(Stainless steel)', '2024-09-06 08:57:40', 'Sales Management Logs'),
(249, 'STF-7245', '154.159.252.174', 'Sold 4 items of SKU-13894 Makueni Organic Honey 1KG', '2024-09-06 08:57:40', 'Sales Management Logs'),
(250, 'STF-4705', '154.159.252.174', 'Successfully Logged Into Admin Dashboard', '2024-09-06 08:58:22', 'Authentication Logs'),
(251, 'STF-4705', '154.159.252.174', 'Cancelled SKU-13489 3 FRAME HONEY EXTRACTOR MACHINE Receipt Number #:1470 Sale Record.', '2024-09-06 08:59:01', 'Sales Management Logs'),
(252, 'STF-7245', '154.159.252.174', 'Successfully Logged Into Staff Dashboard', '2024-09-06 08:59:40', 'Authentication Logs'),
(253, 'STF-7245', '154.159.252.174', 'Sold 2 items of SKU-13489 3 FRAME HONEY EXTRACTOR MACHINE', '2024-09-06 09:00:06', 'Sales Management Logs'),
(254, 'STF-7245', '197.248.93.73', 'Sold 1 items of SKU-13489 3 FRAME HONEY EXTRACTOR MACHINE', '2024-09-06 09:01:36', 'Sales Management Logs'),
(255, 'STF-4705', '197.248.93.73', 'Successfully Logged Into Admin Dashboard', '2024-09-06 09:01:51', 'Authentication Logs'),
(256, 'STF-4705', '197.248.93.73', 'Updated  B2038 - Beehive connector Details', '2024-09-06 09:02:58', 'Items Management Logs'),
(257, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:35', 'Items Management Logs'),
(258, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:38', 'Items Management Logs'),
(259, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:40', 'Items Management Logs'),
(260, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:42', 'Items Management Logs'),
(261, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:43', 'Items Management Logs'),
(262, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:44', 'Items Management Logs'),
(263, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:45', 'Items Management Logs'),
(264, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:47', 'Items Management Logs'),
(265, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:48', 'Items Management Logs'),
(266, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:49', 'Items Management Logs'),
(267, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:51', 'Items Management Logs'),
(268, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:52', 'Items Management Logs'),
(269, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:53', 'Items Management Logs'),
(270, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:54', 'Items Management Logs'),
(271, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:54', 'Items Management Logs'),
(272, 'STF-4705', '197.248.93.73', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-06 09:04:55', 'Items Management Logs'),
(273, 'STF-9418', '216.128.0.59', 'Successfully Logged Into Admin Dashboard', '2024-09-07 07:02:23', 'Authentication Logs'),
(274, 'STF-9418', '216.128.0.59', 'Successfully Logged Into Admin Dashboard', '2024-09-07 10:10:01', 'Authentication Logs'),
(275, 'STF-9418', '91.102.180.36', 'Successfully Logged Into Admin Dashboard', '2024-09-10 07:05:12', 'Authentication Logs'),
(276, 'STF-4913', '91.102.180.36', 'Successfully Logged Into Staff Dashboard', '2024-09-10 07:12:10', 'Authentication Logs'),
(277, 'STF-9418', '91.102.180.36', 'Successfully Logged Into Admin Dashboard', '2024-09-10 07:51:31', 'Authentication Logs'),
(278, 'STF-7245', '102.6.214.203', 'Successfully Logged Into Staff Dashboard', '2024-09-11 04:44:09', 'Authentication Logs'),
(279, 'STF-4913', '2c0f:fe38:2020:3069:491f:e7ff:29ab:e31a', 'Successfully Logged Into Staff Dashboard', '2024-09-11 05:41:25', 'Authentication Logs'),
(280, 'STF-4913', '2c0f:fe38:2020:3069:491f:e7ff:29ab:e31a', 'Sold 2 items of SKU-80197 MAKUENI PURE HONEY 1KG', '2024-09-11 05:46:09', 'Sales Management Logs'),
(281, 'STF-4705', '102.1.131.120', 'Successfully Logged Into Admin Dashboard', '2024-09-11 05:49:18', 'Authentication Logs'),
(282, 'STF-4913', '2c0f:fe38:2020:3069:e984:5a9d:4c33:ff4', 'Sold 4 items of SKU-08193 MAKUENI ORGANIC PURE HONEY 1/2KG', '2024-09-11 05:55:12', 'Sales Management Logs'),
(283, 'STF-4913', '2c0f:fe38:2020:3069:e984:5a9d:4c33:ff4', 'Sold 1 items of SKU-08193 MAKUENI ORGANIC PURE HONEY 1/2KG', '2024-09-11 05:57:30', 'Sales Management Logs'),
(284, 'STF-4913', '2c0f:fe38:2020:3069:e984:5a9d:4c33:ff4', 'Sold 2 items of SKU-13894 Makueni Organic Honey 1KG', '2024-09-11 06:01:33', 'Sales Management Logs'),
(285, 'STF-4913', '2c0f:fe38:2020:3069:e984:5a9d:4c33:ff4', 'Sold 2 items of SKU-13894 Makueni Organic Honey 1KG', '2024-09-11 06:04:15', 'Sales Management Logs'),
(286, 'STF-4913', '2c0f:fe38:2020:3069:e984:5a9d:4c33:ff4', 'Sold 1 items of SKU-08193 MAKUENI ORGANIC PURE HONEY 1/2KG', '2024-09-11 06:06:28', 'Sales Management Logs'),
(287, 'STF-4913', '2c0f:fe38:2020:3069:fd35:4c4a:a762:5c4e', 'Successfully Logged Into Staff Dashboard', '2024-09-11 06:34:31', 'Authentication Logs'),
(288, 'STF-4705', '105.161.225.193', 'Successfully Logged Into Admin Dashboard', '2024-09-11 06:38:13', 'Authentication Logs'),
(289, 'STF-4705', '105.161.225.193', 'Updated  SKU-43710 - SQUEEZE HONEY 1/2KG Details', '2024-09-11 06:40:57', 'Items Management Logs'),
(290, 'STF-4705', '105.161.225.193', 'Updated  SKU-19524 - COMB HONEY  1KG Details', '2024-09-11 06:41:57', 'Items Management Logs'),
(291, 'STF-4705', '105.161.225.193', 'Updated  SKU-08193 - MAKUENI ORGANIC PURE HONEY 1/2KG Details', '2024-09-11 06:42:18', 'Items Management Logs'),
(292, 'STF-4705', '105.161.225.193', 'Added  I3268 - Honey 200g, With A Total Quantity Of  500', '2024-09-11 06:43:26', 'Items Management Logs'),
(293, 'STF-4705', '105.161.225.193', 'Added  J6095 - Honey 50g, With A Total Quantity Of  500', '2024-09-11 06:44:17', 'Items Management Logs'),
(294, 'STF-4705', '105.161.225.193', 'Added  P2987 - Honey 100g, With A Total Quantity Of  500', '2024-09-11 06:45:08', 'Items Management Logs'),
(295, 'STF-4705', '105.161.225.193', 'Updated  J6095 - Honey 50g Details', '2024-09-11 06:46:23', 'Items Management Logs'),
(296, 'STF-4705', '105.161.225.193', 'Added  T1852 - Candle , With A Total Quantity Of  200', '2024-09-11 06:47:12', 'Items Management Logs'),
(297, 'STF-4705', '105.161.225.193', 'Added  M4126 - Candle , With A Total Quantity Of  200', '2024-09-11 06:47:34', 'Items Management Logs'),
(298, 'STF-4705', '105.161.225.193', 'Added  G1928 - Candle , With A Total Quantity Of  200', '2024-09-11 06:48:04', 'Items Management Logs'),
(299, 'STF-4705', '105.161.225.193', 'Updated  SKU-01698 - COTTON KHAKI BEESUIT Details', '2024-09-11 06:48:37', 'Items Management Logs'),
(300, 'STF-4705', '105.161.225.193', 'Updated  SKU-78921 - COTTON BEESUIT(standard) Details', '2024-09-11 06:49:22', 'Items Management Logs'),
(301, 'STF-4705', '105.161.225.193', 'Added  F4759 - Sateen Beesuit, With A Total Quantity Of  15', '2024-09-11 06:50:59', 'Items Management Logs'),
(302, 'STF-4705', '105.161.225.193', 'Added  W5124 - Leather Gloves, With A Total Quantity Of  20', '2024-09-11 06:51:57', 'Items Management Logs'),
(303, 'STF-4705', '105.161.225.193', 'Added  S4629 - Rubber Gloves, With A Total Quantity Of  10', '2024-09-11 06:52:31', 'Items Management Logs'),
(304, 'STF-4705', '105.161.225.193', 'Updated  SKU-72841 - 4-FRAME HONEY EXTRACTOR(Manual) Details', '2024-09-11 06:53:02', 'Items Management Logs'),
(305, 'STF-4705', '105.161.225.193', 'Updated  SKU-61457 - BEEHIVE FRAME WIRE 2KGS Details', '2024-09-11 06:53:59', 'Items Management Logs'),
(306, 'STF-4705', '105.161.225.193', 'Added  O8430 - Frame wire roll 1kg, With A Total Quantity Of  1', '2024-09-11 06:54:37', 'Items Management Logs'),
(307, 'STF-4705', '105.161.225.193', 'Updated  B2038 - Beehive connector Details', '2024-09-11 06:55:05', 'Items Management Logs'),
(308, 'STF-4705', '105.161.225.193', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-11 06:55:23', 'Items Management Logs'),
(309, 'STF-4913', '196.96.4.190', 'Successfully Logged Into Staff Dashboard', '2024-09-11 07:09:09', 'Authentication Logs'),
(310, 'STF-4913', '196.96.4.190', 'Sold 1 items of P2987 Honey 100g', '2024-09-11 07:11:01', 'Sales Management Logs'),
(311, 'STF-4913', '196.96.4.190', 'Sold 1 items of P2987 Honey 100g', '2024-09-11 07:13:06', 'Sales Management Logs'),
(312, 'STF-4913', '196.96.4.190', 'Sold 1 items of J6095 Honey 50g', '2024-09-11 07:14:12', 'Sales Management Logs'),
(313, 'STF-4913', '2c0f:fe38:2020:3069:7d44:3f26:33b6:1ebf', 'Successfully Logged Into Staff Dashboard', '2024-09-11 09:41:18', 'Authentication Logs'),
(314, 'STF-4913', '2c0f:fe38:2020:3069:7d44:3f26:33b6:1ebf', 'Sold 1 items of J6095 Honey 50g', '2024-09-11 09:42:46', 'Sales Management Logs'),
(315, 'STF-4913', '2c0f:fe38:2020:3069:28cb:faf3:7466:d8c9', 'Successfully Logged Into Staff Dashboard', '2024-09-11 13:35:24', 'Authentication Logs'),
(316, 'STF-4913', '2c0f:fe38:2020:3069:28cb:faf3:7466:d8c9', 'Sold 1 items of SKU-08193 MAKUENI ORGANIC PURE HONEY 1/2KG', '2024-09-11 13:36:33', 'Sales Management Logs'),
(317, 'STF-4913', '2c0f:fe38:2020:3069:793d:438c:b748:1cdb', 'Successfully Logged Into Staff Dashboard', '2024-09-11 14:43:09', 'Authentication Logs'),
(318, 'STF-4913', '2c0f:fe38:2020:3069:793d:438c:b748:1cdb', 'Successfully Logged Into Staff Dashboard', '2024-09-11 14:43:52', 'Authentication Logs'),
(319, 'STF-4913', '2c0f:fe38:2020:3069:793d:438c:b748:1cdb', 'Sold 1 items of SKU-69205 BEE LURE ', '2024-09-11 14:45:58', 'Sales Management Logs'),
(320, 'STF-4705', '105.231.17.18', 'Successfully Logged Into Admin Dashboard', '2024-09-11 15:00:54', 'Authentication Logs'),
(321, 'STF-4705', '105.231.17.18', 'Updated  SKU-42061 - BEE BRUSH Details', '2024-09-11 15:02:34', 'Items Management Logs'),
(322, 'STF-4913', '2c0f:fe38:2020:3069:d977:ed74:99bc:6b23', 'Sold 2 items of SKU-19524 COMB HONEY  1KG', '2024-09-11 15:12:16', 'Sales Management Logs'),
(323, 'STF-4913', '2c0f:fe38:2020:3069:d977:ed74:99bc:6b23', 'Sold 1 items of SKU-42061 BEE BRUSH', '2024-09-11 15:14:21', 'Sales Management Logs'),
(324, 'STF-4705', '105.231.17.18', 'Added  F3976 - Hive metallic stands, With A Total Quantity Of  12', '2024-09-11 15:14:41', 'Items Management Logs'),
(325, 'STF-4913', '2c0f:fe38:2020:3069:c0fc:fe2b:f3f8:ddbd', 'Sold 1 items of SKU-13894 Makueni Organic Honey 1KG', '2024-09-11 15:26:26', 'Sales Management Logs'),
(326, 'STF-9418', '91.102.180.4', 'Successfully Logged Into Admin Dashboard', '2024-09-11 17:37:49', 'Authentication Logs'),
(327, 'STF-9418', '91.102.180.4', 'Edited Receipt & Sales Customizations', '2024-09-11 17:41:39', 'Settings & Configurations Logs'),
(328, 'STF-4913', '2c0f:fe38:2113:bfc6:29e2:c1d7:3d87:defa', 'Successfully Logged Into Staff Dashboard', '2024-09-12 09:10:26', 'Authentication Logs'),
(329, 'STF-4913', '2c0f:fe38:2113:bfc6:29e2:c1d7:3d87:defa', 'Sold 1 items of P2987 Honey 100g', '2024-09-12 09:12:22', 'Sales Management Logs'),
(330, 'STF-4913', '2c0f:fe38:2113:bfc6:d3f:dc7d:3d55:187c', 'Successfully Logged Into Staff Dashboard', '2024-09-12 10:31:39', 'Authentication Logs'),
(331, 'STF-4913', '2c0f:fe38:2113:bfc6:d3f:dc7d:3d55:187c', 'Sold 1 items of SKU-13894 Makueni Organic Honey 1KG', '2024-09-12 10:32:24', 'Sales Management Logs'),
(332, 'STF-9418', '2c0f:fe38:2412:e5e6:b60c:fcf1:cc46:2d51', 'Successfully Logged Into Admin Dashboard', '2024-09-12 11:27:47', 'Authentication Logs'),
(333, 'STF-4705', '91.109.17.197', 'Successfully Logged Into Admin Dashboard', '2024-09-12 12:08:15', 'Authentication Logs'),
(334, 'STF-7245', '91.109.17.197', 'Successfully Logged Into Staff Dashboard', '2024-09-12 12:13:27', 'Authentication Logs'),
(335, 'STF-4913', '2c0f:fe38:2113:bfc6:51c6:e37a:d432:79e6', 'Successfully Logged Into Staff Dashboard', '2024-09-12 12:14:35', 'Authentication Logs'),
(336, 'STF-4913', '2c0f:fe38:2113:bfc6:51c6:e37a:d432:79e6', 'Sold 10 items of F3976 Hive metallic stands', '2024-09-12 12:22:36', 'Sales Management Logs'),
(337, 'STF-4705', '105.161.225.193', 'Successfully Logged Into Admin Dashboard', '2024-09-12 13:19:25', 'Authentication Logs'),
(338, 'STF-4705', '105.161.225.193', 'Updated  F3592 - Bee smoker, Stainless steel Details', '2024-09-12 13:19:55', 'Items Management Logs'),
(339, 'STF-4705', '105.161.225.193', 'Updated  H3978 - Sateen Beesuits Details', '2024-09-12 13:20:31', 'Items Management Logs'),
(340, 'STF-4705', '105.161.225.193', 'Updated  SKU-78921 - COTTON BEESUIT(standard) Details', '2024-09-12 13:21:13', 'Items Management Logs'),
(341, 'STF-4705', '105.161.225.193', 'Updated  SKU-78921 - 3 Layered beesuit(standard) Details', '2024-09-12 13:21:51', 'Items Management Logs'),
(342, 'STF-4705', '105.161.225.193', 'Added  C4391 - Rubber Gloves, With A Total Quantity Of  5', '2024-09-12 13:22:58', 'Items Management Logs'),
(343, 'STF-7245', '105.161.225.193', 'Successfully Logged Into Staff Dashboard', '2024-09-12 13:23:43', 'Authentication Logs'),
(344, 'STF-7245', '105.161.225.193', 'Sold 2 items of SKU-69205 BEE LURE ', '2024-09-12 13:27:30', 'Sales Management Logs'),
(345, 'STF-7245', '105.161.225.193', 'Sold 1 items of SKU-13489 3 FRAME HONEY EXTRACTOR MACHINE', '2024-09-12 13:27:30', 'Sales Management Logs'),
(346, 'STF-7245', '105.161.225.193', 'Sold 10 items of F3592 Bee smoker, Stainless steel', '2024-09-12 13:27:30', 'Sales Management Logs'),
(347, 'STF-7245', '105.161.225.193', 'Sold 3 items of SKU-57136 DOUBLE SIEVE', '2024-09-12 13:27:30', 'Sales Management Logs'),
(348, 'STF-7245', '105.161.225.193', 'Sold 2 items of C4391 Rubber Gloves', '2024-09-12 13:30:49', 'Sales Management Logs'),
(349, 'STF-7245', '105.161.225.193', 'Sold 2 items of H3978 Sateen Beesuits', '2024-09-12 13:30:49', 'Sales Management Logs'),
(350, 'STF-4705', '105.161.225.193', 'Successfully Logged Into Admin Dashboard', '2024-09-12 13:31:34', 'Authentication Logs'),
(351, 'STF-4705', '105.161.225.193', 'Added  W3695 - Bees wax, With A Total Quantity Of  200', '2024-09-12 13:32:22', 'Items Management Logs'),
(352, 'STF-7245', '105.161.225.193', 'Successfully Logged Into Staff Dashboard', '2024-09-12 13:32:30', 'Authentication Logs'),
(353, 'STF-7245', '105.161.225.193', 'Sold 2 items of W3695 Bees wax', '2024-09-12 13:34:29', 'Sales Management Logs'),
(354, 'STF-7245', '105.161.225.193', 'Sold 4 items of W3695 Bees wax', '2024-09-12 13:34:49', 'Sales Management Logs'),
(355, 'STF-4705', '105.161.225.193', 'Successfully Logged Into Admin Dashboard', '2024-09-12 13:36:01', 'Authentication Logs'),
(356, 'STF-4913', '2c0f:fe38:2113:bfc6:f8b1:4b52:36be:90df', 'Successfully Logged Into Staff Dashboard', '2024-09-12 13:57:29', 'Authentication Logs'),
(357, 'STF-4913', '2c0f:fe38:2113:bfc6:f8b1:4b52:36be:90df', 'Sold 1 items of J6095 Honey 50g', '2024-09-12 13:58:45', 'Sales Management Logs'),
(358, 'STF-4913', '2c0f:fe38:2113:bfc6:e8fd:ca36:4bad:56c1', 'Successfully Logged Into Staff Dashboard', '2024-09-12 14:32:36', 'Authentication Logs'),
(359, 'STF-4705', '154.159.252.71', 'Successfully Logged Into Admin Dashboard', '2024-09-12 14:35:34', 'Authentication Logs');
INSERT INTO `system_logs` (`log_id`, `log_user_id`, `log_ip_address`, `log_details`, `log_created_at`, `log_type`) VALUES
(360, 'STF-4705', '154.159.252.71', 'Added  R5174 - Bees wax, With A Total Quantity Of  200', '2024-09-12 14:36:40', 'Items Management Logs'),
(361, 'STF-4913', '2c0f:fe38:2113:bfc6:b110:1845:d865:eea0', 'Successfully Logged Into Staff Dashboard', '2024-09-12 14:37:29', 'Authentication Logs'),
(362, 'STF-4913', '2c0f:fe38:2113:bfc6:b110:1845:d865:eea0', 'Sold 2 items of R5174 Bees wax', '2024-09-12 14:39:00', 'Sales Management Logs'),
(363, 'STF-4913', '2c0f:fe38:2026:af55:fc3a:f6e7:7654:5c4', 'Successfully Logged Into Staff Dashboard', '2024-09-13 07:28:11', 'Authentication Logs'),
(364, 'STF-4913', '2c0f:fe38:2026:af55:fc3a:f6e7:7654:5c4', 'Sold 1 items of SKU-08193 MAKUENI ORGANIC PURE HONEY 1/2KG', '2024-09-13 07:29:05', 'Sales Management Logs'),
(365, 'STF-9418', '216.128.0.72', 'Successfully Logged Into Admin Dashboard', '2024-09-13 13:07:24', 'Authentication Logs'),
(366, 'STF-7245', '154.159.252.33', 'Successfully Logged Into Staff Dashboard', '2024-09-13 16:47:46', 'Authentication Logs'),
(367, 'STF-7245', '154.159.252.33', 'Sold 5 items of F3592 Bee smoker, Stainless steel', '2024-09-13 16:52:05', 'Sales Management Logs'),
(368, 'STF-7245', '154.159.252.33', 'Sold 5 items of SKU-18532 HIVE TOOL(Stainless steel)', '2024-09-13 16:52:05', 'Sales Management Logs'),
(369, 'STF-7245', '154.159.252.33', 'Sold 5 items of SKU-42061 BEE BRUSH', '2024-09-13 16:52:05', 'Sales Management Logs'),
(370, 'STF-4705', '154.159.252.33', 'Successfully Logged Into Admin Dashboard', '2024-09-13 16:54:51', 'Authentication Logs'),
(371, 'STF-4913', '154.159.252.33', 'Successfully Logged Into Staff Dashboard', '2024-09-13 16:57:33', 'Authentication Logs'),
(372, 'STF-4913', '154.159.252.33', 'Sold 1 items of SKU-13894 Makueni Organic Honey 1KG', '2024-09-13 16:59:10', 'Sales Management Logs'),
(373, 'STF-4913', '2c0f:fe38:2107:b5f1:3861:c8fb:e8c:4f80', 'Successfully Logged Into Staff Dashboard', '2024-09-14 07:46:50', 'Authentication Logs'),
(374, 'STF-4913', '2c0f:fe38:2107:b5f1:3861:c8fb:e8c:4f80', 'Sold 1 items of J6095 Honey 50g', '2024-09-14 07:47:59', 'Sales Management Logs'),
(375, 'STF-4913', '2c0f:fe38:2107:b5f1:2545:5745:4014:cdde', 'Successfully Logged Into Staff Dashboard', '2024-09-14 10:14:46', 'Authentication Logs'),
(376, 'STF-4913', '2c0f:fe38:2107:b5f1:2545:5745:4014:cdde', 'Successfully Logged Into Staff Dashboard', '2024-09-14 11:10:00', 'Authentication Logs'),
(377, 'STF-4913', '2c0f:fe38:2107:b5f1:2545:5745:4014:cdde', 'Sold 1 items of SKU-69205 BEE LURE ', '2024-09-14 11:11:23', 'Sales Management Logs'),
(378, 'STF-4913', '2c0f:fe38:2107:b5f1:2545:5745:4014:cdde', 'Sold 1 items of F3592 Bee smoker, Stainless steel', '2024-09-14 11:13:04', 'Sales Management Logs'),
(379, 'STF-4705', '154.159.252.49', 'Successfully Logged Into Admin Dashboard', '2024-09-14 11:16:20', 'Authentication Logs'),
(380, 'STF-4705', '154.159.252.49', 'Updated  SKU-78921 - COTTON BEESUIT(standard) Details', '2024-09-14 11:17:53', 'Items Management Logs'),
(381, 'STF-4705', '154.159.252.49', 'Updated  F4759 - Sateen Beesuit Details', '2024-09-14 11:18:45', 'Items Management Logs'),
(382, 'STF-4705', '154.159.252.49', 'Added  F3964 - 1/2 Kg Beeswax , With A Total Quantity Of  50', '2024-09-14 11:20:21', 'Items Management Logs'),
(383, 'STF-4705', '154.159.252.49', 'Added  F3964 - 1/2 Kg Beeswax , With A Total Quantity Of  50', '2024-09-14 11:20:21', 'Items Management Logs'),
(384, 'STF-4913', '2c0f:fe38:2107:b5f1:c1c4:1115:442a:ce75', 'Successfully Logged Into Staff Dashboard', '2024-09-14 11:20:38', 'Authentication Logs'),
(385, 'STF-4913', '2c0f:fe38:2107:b5f1:c1c4:1115:442a:ce75', 'Sold 1 items of F3964 1/2 Kg Beeswax ', '2024-09-14 11:21:59', 'Sales Management Logs'),
(386, 'STF-4913', '2c0f:fe38:2107:b5f1:c1c4:1115:442a:ce75', 'Sold 1 items of SKU-78921 COTTON BEESUIT(standard)', '2024-09-14 11:23:33', 'Sales Management Logs'),
(387, 'STF-4913', '2c0f:fe38:2107:b5f1:c1c4:1115:442a:ce75', 'Sold 1 items of W5124 Leather Gloves', '2024-09-14 11:25:00', 'Sales Management Logs'),
(388, 'STF-9418', '91.102.180.43', 'Successfully Logged Into Admin Dashboard', '2024-09-15 07:34:48', 'Authentication Logs'),
(389, 'STF-4913', '2c0f:fe38:2215:4f9d:7daa:c90d:3f62:86fc', 'Successfully Logged Into Staff Dashboard', '2024-09-16 05:40:41', 'Authentication Logs'),
(390, 'STF-4913', '2c0f:fe38:2215:4f9d:7daa:c90d:3f62:86fc', 'Sold 1 items of P2987 Honey 100g', '2024-09-16 05:42:23', 'Sales Management Logs'),
(391, 'STF-4913', '2c0f:fe38:2215:4f9d:2cf0:ac91:ae7e:469a', 'Successfully Logged Into Staff Dashboard', '2024-09-16 06:59:31', 'Authentication Logs'),
(392, 'STF-9418', '127.0.0.1', 'Successfully Logged Into Admin Dashboard', '2024-09-16 07:08:03', 'Authentication Logs'),
(393, 'STF-9418', '127.0.0.1', 'Successfully Logged Into Admin Dashboard', '2024-09-16 07:28:25', 'Authentication Logs'),
(394, 'STF-9418', '127.0.0.1', 'Added Rent Worth 2500 For 2024-01-08', '2024-09-16 08:38:18', 'Expenses Management'),
(395, 'STF-9418', '127.0.0.1', 'Added Rent Worth 2500 For 2024-01-15', '2024-09-16 08:39:10', 'Expenses Management'),
(396, 'STF-9418', '127.0.0.1', 'Added Salaries & Wages Worth 12000 For 2024-01-31', '2024-09-16 08:39:57', 'Expenses Management'),
(397, 'STF-9418', '127.0.0.1', 'Updated Rent Worth 4500 For 2024-01-15', '2024-09-16 08:43:37', 'Expenses Management'),
(398, 'STF-9418', '127.0.0.1', 'Deleted Rent Worth 4500 For 2024-01-15', '2024-09-16 08:43:42', 'Expenses Management'),
(399, 'STF-9418', '127.0.0.1', 'Updated Salaries & Wages Worth 12000 For 2024-01-31', '2024-09-16 10:15:42', 'Expenses Management'),
(400, 'STF-9418', '127.0.0.1', 'Added Rent Worth 4500 For 2023-01-31', '2024-09-16 10:16:18', 'Expenses Management'),
(401, 'STF-9418', '127.0.0.1', 'Added Test Expense Worth 4500 For 2024-09-23', '2024-09-16 10:17:19', 'Expenses Management'),
(402, 'STF-9418', '127.0.0.1', 'Deleted Test Expense Worth 4500 For 2024-09-23', '2024-09-16 10:17:23', 'Expenses Management'),
(403, 'STF-9418', '127.0.0.1', 'Added Renovation cost Worth 4500 For 2024-09-16', '2024-09-16 10:59:05', 'Expenses Management'),
(404, 'STF-9418', '127.0.0.1', 'Added Sales & Marketing  Worth 12000 For 2024-09-09', '2024-09-16 10:59:33', 'Expenses Management');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `system_id` int(11) NOT NULL,
  `system_name` varchar(200) DEFAULT NULL,
  `system_tagline` longtext DEFAULT NULL,
  `system_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`system_id`, `system_name`, `system_tagline`, `system_status`) VALUES
(1, 'Native Bee Care POS', 'Apiculture At Its Best', 'Activated');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_phoneno` varchar(200) NOT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `user_password_reset_token` varchar(200) DEFAULT NULL,
  `user_access_level` varchar(200) NOT NULL,
  `user_store_id` varchar(200) NOT NULL,
  `user_status` varchar(200) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_phoneno`, `user_password`, `user_password_reset_token`, `user_access_level`, `user_store_id`, `user_status`) VALUES
('STF-4705', 'Kennedy', 'ken@nativebeecare.co.ke', '+254 728534838', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Admin', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'active'),
('STF-4913', 'Juliet ', 'juliet@nativebeecare.co.ke', '0712457830', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Staff', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'active'),
('STF-7245', 'Bridgit ', 'bridgit@nativebeecare.co.ke', '0707136831', '95a202ab010f0159dbfc08aa7df3fa94bb8d30f1', NULL, 'Staff', 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'active'),
('STF-9418', 'Admin', 'admin@devlan.co.ke', '071234567', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Admin', '6cf2d9a5407fa4e91b41ae4adc5dbd9d6ef2d8d88b58', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `permission_id` int(11) NOT NULL,
  `permission_access_level` varchar(200) NOT NULL,
  `permission_module` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`permission_id`, `permission_access_level`, `permission_module`) VALUES
(32, 'Staff', 'Sales Management');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `ExpenseStoreID` (`expense_store_id`);

--
-- Indexes for table `hold_sales`
--
ALTER TABLE `hold_sales`
  ADD PRIMARY KEY (`hold_sale_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `ProductInventoryID` (`inventory_product_id`);

--
-- Indexes for table `loyalty_points`
--
ALTER TABLE `loyalty_points`
  ADD PRIMARY KEY (`loyalty_points_id`);

--
-- Indexes for table `mailer_settings`
--
ALTER TABLE `mailer_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`payment_settings_id`),
  ADD KEY `PaymentSettingsStore` (`payment_settings_store_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_name` (`product_name`,`product_code`),
  ADD KEY `product_store_id` (`product_store_id`,`product_name`,`product_code`);

--
-- Indexes for table `receipt_customization`
--
ALTER TABLE `receipt_customization`
  ADD PRIMARY KEY (`receipt_id`),
  ADD KEY `ReceiptStore` (`receipt_store_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `SaleProductID` (`sale_product_id`),
  ADD KEY `SaleUserID` (`sale_user_id`),
  ADD KEY `sale_receipt_no` (`sale_receipt_no`),
  ADD KEY `sale_product_id` (`sale_product_id`);

--
-- Indexes for table `store_settings`
--
ALTER TABLE `store_settings`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `system_logs`
--
ALTER TABLE `system_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`system_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `UserStoreID` (`user_store_id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `UserPermission` (`permission_access_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hold_sales`
--
ALTER TABLE `hold_sales`
  MODIFY `hold_sale_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `loyalty_points`
--
ALTER TABLE `loyalty_points`
  MODIFY `loyalty_points_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mailer_settings`
--
ALTER TABLE `mailer_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `payment_settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `receipt_customization`
--
ALTER TABLE `receipt_customization`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=999;

--
-- AUTO_INCREMENT for table `system_logs`
--
ALTER TABLE `system_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `system_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `ExpenseStoreID` FOREIGN KEY (`expense_store_id`) REFERENCES `store_settings` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
