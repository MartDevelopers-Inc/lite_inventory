-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 07, 2024 at 01:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `hold_sales`
--

CREATE TABLE `hold_sales` (
  `hold_sale_id` int(200) NOT NULL,
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

--
-- Dumping data for table `hold_sales`
--

INSERT INTO `hold_sales` (`hold_sale_id`, `hold_sale_number`, `product_name`, `product_code`, `quantity`, `product_sale_price`, `product_description`, `product_id`, `product_quantity_limit`, `Discount`, `hold_sale_time`) VALUES
(383, 'N0785', 'GI CUP PLUG 1\'', 'M076', '1', '100', 'GI CUP PLUG 1\'', '68bf20c25df4609da46baebbfe003ac4fe4b2d83', '10', '0', '2022-06-13 12:10:10'),
(384, 'N0785', 'Indicator green', 'E9536', '1', '250', 'Indicator green', '0200940594d078f5871e0ca036969c5956f1e5c7bb11', '10', '0', '2022-06-13 12:10:10'),
(385, 'N0785', 'Coaxial socket ', 'R172', '1', '250', 'Coaxial socket ', '02f6de6420e465f96da4a365da1982550b3e233a84d2', '10', '0', '2022-06-13 12:10:10'),
(386, 'N0785', 'CHANGEOVER SWITCH  63 A  80A', 'Y190', '1', '5000', 'Change over switch', '0430a606845ee0e627e9fd50881e34aed98bc9c5', '10', '0', '2022-06-13 12:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(200) NOT NULL,
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
  `loyalty_points_id` int(200) NOT NULL,
  `loyalty_points_code` varchar(200) DEFAULT NULL,
  `loyalty_points_customer_name` varchar(200) DEFAULT NULL,
  `loyalty_points_customer_phone_no` varchar(200) DEFAULT NULL,
  `loyalty_points_count` varchar(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loyalty_points`
--

INSERT INTO `loyalty_points` (`loyalty_points_id`, `loyalty_points_code`, `loyalty_points_customer_name`, `loyalty_points_customer_phone_no`, `loyalty_points_count`) VALUES
(1, 'R1532', 'Martin Mbithi', '07440847563', '58'),
(2, 'U8031', 'James Doe', '0790126574', '9'),
(3, 'Q8031', 'NULL', 'NULL', '9'),
(4, 'Z0546', 'James Doe', '0710908765', '0'),
(5, 'Q2650', 'Mart Developers Inc', '0704031263', '24'),
(6, 'X5490', 'Mart Developers Inc', '0740847563', '10'),
(7, 'L5830', 'Martin Mbithi', '+254740847563', '9'),
(8, 'X9241', 'Moses Kiptoo', '071267804', '30');

-- --------------------------------------------------------

--
-- Table structure for table `mailer_settings`
--

CREATE TABLE `mailer_settings` (
  `id` int(20) NOT NULL,
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
(2, 'rbx109.truehost.cloud', '465', 'ssl', 'litecms@devlan.co.ke', 'Lite Inventory SaaS', 'litecms@devlan.co.ke', '20Devlan@');

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

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `merchantRequestID`, `checkoutRequestID`, `resultCode`, `resultDesc`, `amount`, `mpesaReceiptNumber`, `transactionDate`, `phoneNumber`, `payment_receipt_number`, `payment_amount`, `payment_txn_code`, `payment_date_posted`) VALUES
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '46789', '38000', '1644995949SJW81Q6MD4', '2022-02-16T07:19:55.000Z'),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '46178', '17000', '1644996482AFV9H7CWD3', '2022-02-16T07:29:00.000Z'),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '53781', '17000', '1644996719MAK0JURC1Y', '2022-02-16T07:33:10.000Z'),
(21, '98950-24249153-1', 'ws_CO_160220221046439990', '0', 'The service request is processed successfully.', '1', 'QBG4944H3M', '20220216104908', '254799155770', NULL, NULL, NULL, NULL),
(22, '29940-23593583-1', 'ws_CO_160220221105595007', '0', 'The service request is processed successfully.', '1', 'QBG295BF8Y', '20220216110850', '254740847563', NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '54830', '151', '1645088138J5INWDGA9Z', '2022-02-17T08:55:48.000Z'),
(24, '22765-3726488-1', 'ws_CO_180220221146517225', '0', 'The service request is processed successfully.', '1', 'QBI1CWD8E7', '20220218115000', '254799155770', NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '70539', '1', '16451743452NQB5TE1ZG', '2022-02-18T08:56:25.000Z');

-- --------------------------------------------------------

--
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `payment_settings_id` int(200) NOT NULL,
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
('038270499d72067d24c63163e18635a7b964335b', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', '3 FRAME HONEY EXTRACTOR MACHINE', '3 FRAME HONEY EXTRACTOR MACHINE', '0', '29000', '188', '5', 'SKU-13489', 'active'),
('0472c25315266585075be26eff08d403d0830ecd', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'GLASS JAR HONEY 1KG', 'GLASS JAR HONEY 1KG', '0', '1000', '300', '5', 'SKU-67935', 'active'),
('106cde34242aefeb5c2e532b8fa6468ea92b8733', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'MAKUENI ORGANIC PURE HONEY 1/2KG', 'MAKUENI ORGANIC PURE HONEY 1/2KG', '0', '400', '184', '5', 'SKU-08193', 'active'),
('187153cf1aeae9e967d697624de754eb7909e0e0', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HONEY IN JERICANS (WHOLESALE)', 'HONEY IN JERICANS (WHOLESALE)', '0', '700', '200', '5', 'SKU-07148', 'active'),
('1f3ba0a95e1d9296a8cbc8e072775f8114efcc31', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'ENCLOSED STAINLESS STEEL HONEY PRESS ', 'ENCLOSED STAINLESS STEEL HONEY PRESS ', '0', '28000', '50', '5', 'SKU-02351', 'active'),
('23615858e8a44b11df53268f71ea554f7b4899f6', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'UNCAPPING FORK', 'UNCAPPING FORK', '0', '450', '10', '5', 'SKU-07148', 'active'),
('23eadba32599e9e00354808d86279994f538e3b4', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', '20LITRES SETTLING TANK', '20LITRES SETTLING TANK', '0', '1500', '167', '5', 'SKU-68104', 'active'),
('258222dc152d290f389106eda58c783ff85c9da8', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'COTTON BEESUIT ', 'COTTON BEESUIT ', '0', '3500', '300', '5', 'SKU-78921', 'active'),
('2bd2494b822d3db0e1419e52d682c08ffaec55ac', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'BEE FEEDERS ', 'BEE FEEDERS ', '0', '300', '300', '5', 'SKU-79236', 'active'),
('31736523a2f00440c7109acbbfd161516fa0fbca', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'PROPOLIS COLLECTOR', 'PROPOLIS COLLECTOR', '0', '800', '200', '5', 'SKU-24786', 'active'),
('32c2c036fd6a285675a2370392c0ad73b3c5fca1', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'LONG LANGSTROTH HIVE ', 'LONG LANGSTROTH HIVE ', '0', '7000', '200', '5', 'SKU-51876', 'active'),
('3a27a97bfb7b006878ce9ce44b9e4296ecc66d7f', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'COMB HONEY  1KG', 'COMB HONEY  1KG', '0', '1000', '300', '5', 'SKU-19524', 'active'),
('3b81f20c9672dca2baeb2abadde257d67f4a643e', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'COTTON KHAKI BEESUIT', 'COTTON KHAKI BEESUIT', '0', '4000', '220', '5', 'SKU-01698', 'active'),
('423ebff5d7b4ac6b92c40915d000f6b4b0369180', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'CONICAL SIEVE', 'CONICAL SIEVE', '0', '450', '200', '5', 'SKU-23159', 'active'),
('471da98b30f5f651a8c3c0f625a120a065309326', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'BEE POLLEN ', 'BEE POLLEN ', '0', '1500', '200', '5', 'SKU-51470', 'active'),
('4950b0dc655ba692359a5c353bcc4115b2312b0c', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'BEE BRUSH', 'BEE BRUSH', '0', '450', '200', '5', 'SKU-42061', 'active'),
('4be8f81737658e96995819341499246c3eb7edf2', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HYDRAULIC JACK HONEY PRESS', 'HYDRAULIC JACK HONEY PRESS', '0', '32000', '200', '5', 'SKU-97123', 'active'),
('4e2960ce3ac28065c8fa5f1e2c40795a9c0f1943', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'PLASTIC QUEEN EXCLUDER', 'PLASTIC QUEEN EXCLUDER', '0', '750', '200', '5', 'SKU-32589', 'active'),
('52cf53275f063a64b27486ab0b66824de88fef6d', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'WAX SHEET', 'WAX SHEET', '0', '200', '190', '5', 'SKU-81504', 'active'),
('55f256569b1268df50b4df4619d186f2c8988662', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', '3 LAYER VENTILATED STINGPROOF BEESUIT ', '3 LAYER VENTILATED STINGPROOF BEESUIT ', '0', '7600', '10', '5', 'SKU-52049', 'active'),
('5f22156923c8cf6a0afb064bb928e759422b60ef', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HONEY GATE', 'HONEY GATE', '0', '600', '1000', '5', 'SKU-74501', 'active'),
('6ebaf9c55db2020d35994f5713738342f075bbc6', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'LANGSTROTH HIVE ', 'LANGSTROTH HIVE ', '0', '6500', '200', '5', 'SKU-58643', 'active'),
('7295e7f881e4710e39e85810624e06a005c14393', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'STAINLESS STEEL HIVE TOOL', 'STAINLESS STEEL HIVE TOOL', '0', '600', '200', '5', 'SKU-18532', 'active'),
('7c25196ffdffa949345bb6899537c046f34375ee', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'DOUBLE SIEVE', 'DOUBLE SIEVE', '0', '2500', '200', '5', 'SKU-57136', 'active'),
('908fa5d10dd83ee863e4fd1b1b092fe3f61891d8', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'SELF SPACING HIVE FRAMES ', 'SELF SPACING HIVE FRAMES ', '0', '120', '10000', '5', 'SKU-37108', 'active'),
('a081c0720a6d0183ff2a5d9c42e6618e2c0c6c25', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HONEY PRESS', 'HONEY PRESS', '0', '25000', '10', '5', 'SKU-65401', 'active'),
('a2172d32a86a27b47da6f54803a9d4b6655d161b', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'BEEHIVE FRAME GRIP', 'BEEHIVE FRAME GRIP', '0', '800', '200', '5', 'SKU-92056', 'active'),
('a32fadac675b737970fc9b1eb35c262350d083d8', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'GALVANISED HIVE TOOL', 'GALVANISED HIVE TOOL', '0', '400', '200', '5', 'SKU-60375', 'active'),
('af39b8aa29bdc0a3fd4eef1e1cc6fc81ae2daff6', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'GLASS JAR HALF KG', 'GLASS JAR HALF KG', '0', '500', '300', '5', 'SKU-79803', 'active'),
('bcb09caad63e2e72c68b259c8a4d6d3e728bb5da', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'GALVANISED BEE SMOKER', 'GALVANISED BEE SMOKER', '0', '1500', '200', '5', 'SKU-80139', 'active'),
('bdc8d94a54fd14cc83d1c7d3db7e8787298fabc2', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'KENYAN PURE HONEY 1KG', 'KENYAN PURE HONEY 1KG', '0', '800', '200', '5', 'SKU-13894', 'active'),
('caba2c819d36b9c0e045c7cb8b0edea06ec63228', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HONEY REFRACTOMETER', 'HONEY REFRACTOMETER', '0', '4500', '200', '5', 'SKU-25430', 'active'),
('cb2499a3a83964b65dd2390534048e97b060c004', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HONEY SETTLING TANK', 'HONEY SETTLING TANK', '0', '18000', '200', '5', 'SKU-09863', 'active'),
('d102b289675a48f96a3144b67316f909cf49ba7d', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'BEE LURE ', 'BEE LURE ', '0', '1000', '298', '5', 'SKU-69205', 'active'),
('d28a54afe8b8e5c7dd177ddbb8e5bfb22b3d2480', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'HONEY BUCKET HOLDER/BUCKET PERCH', 'HONEY BUCKET HOLDER/BUCKET PERCH', '0', '550', '200', '5', 'SKU-16974', 'active'),
('ec15f88596970ea5108fae57ad7ea1f9258f9a70', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'SQUEEZE HONEY 1/2KG', 'SQUEEZE HONEY 1/2KG', '0', '450', '300', '5', 'SKU-43710', 'active'),
('ec85e1876cceb268eb5fe9a2a1888b004f3cab1b', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'WHITE GAMBOUTS', 'WHITE GAMBOUTS', '0', '1100', '300', '5', 'SKU-35924', 'active'),
('ecb89dd22465dbeed695df7abc4e25faf387be33', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'BEEHIVE FRAME WIRE 2KGS', 'BEEHIVE FRAME WIRE 2KGS', '0', '1400', '200', '5', 'SKU-61457', 'active'),
('f54b3ad816041f89bb85531731e7c86cd1e292a0', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'MAKUENI PURE HONEY 1KG', 'MAKUENI PURE HONEY 1KG', '0', '800', '200', '5', 'SKU-80197', 'active'),
('f815fbdd07fcc12db61606b73223686a22f5d29e', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'TWO FRAME HONEY EXTRACTOR', 'TWO FRAME HONEY EXTRACTOR', '0', '25000', '200', '5', 'SKU-72841', 'active'),
('fd424713755181f54fa396db03dd44be4d1c3781', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'PROPOLIS SUSPENSION', 'PROPOLIS SUSPENSION', '0', '1000', '195', '5', 'SKU-19743', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `receipt_customization`
--

CREATE TABLE `receipt_customization` (
  `receipt_id` int(200) NOT NULL,
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
(1, 'd5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'Nairobi', '', 'false', 'false', 'false', 'false'),
(2, '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Native Beecare <br>\r\ninfo@nativeneecare.co.ke <br>\r\n+254 718280564', 'Apiculture At Its Best', 'false', 'true', 'true', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(200) NOT NULL,
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
(1, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-1457', '10', '2024-08-06 16:13:01', '', '', '1630', NULL, 'Cash', '400', 'paid', '0', NULL, NULL),
(2, '23eadba32599e9e00354808d86279994f538e3b4', 'STF-1457', '1', '2024-08-06 16:18:48', '', '', '3627', NULL, 'Cash', '1300', 'paid', '200', NULL, NULL),
(3, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-1457', '1', '2024-08-06 16:18:49', '', '', '3627', NULL, 'Cash', '350', 'paid', '50', NULL, NULL),
(4, '23eadba32599e9e00354808d86279994f538e3b4', 'STF-1457', '1', '2024-08-07 06:19:40', '', '', '1435', NULL, 'Cash', '1500', 'paid', '0', NULL, NULL),
(5, '038270499d72067d24c63163e18635a7b964335b', 'STF-1457', '1', '2024-08-07 06:19:41', '', '', '1435', NULL, 'Cash', '29000', 'paid', '0', NULL, NULL),
(6, '23eadba32599e9e00354808d86279994f538e3b4', 'STF-1457', '1', '2024-08-07 06:51:12', 'Martin Mbithi', '0740847563', '5439', NULL, 'Cash', '1500', 'paid', '0', '', ''),
(7, 'd102b289675a48f96a3144b67316f909cf49ba7d', 'STF-1457', '2', '2024-08-07 06:51:12', 'Martin Mbithi', '0740847563', '5439', NULL, 'Cash', '1000', 'paid', '0', '', ''),
(8, '038270499d72067d24c63163e18635a7b964335b', 'STF-1457', '1', '2024-08-07 06:51:12', 'Martin Mbithi', '0740847563', '5439', NULL, 'Cash', '29000', 'paid', '0', '', ''),
(9, '106cde34242aefeb5c2e532b8fa6468ea92b8733', 'STF-1457', '5', '2024-08-07 06:53:25', 'Moses Kiptoo', '071267804', '9241', NULL, 'Mobile Payment', '400', 'paid', '0', '', 'SH687SHL2S'),
(10, '52cf53275f063a64b27486ab0b66824de88fef6d', 'STF-1457', '10', '2024-08-07 06:53:25', 'Moses Kiptoo', '071267804', '9241', NULL, 'Mobile Payment', '150', 'paid', '50', '', 'SH687SHL2S'),
(11, 'fd424713755181f54fa396db03dd44be4d1c3781', 'STF-1457', '5', '2024-08-07 06:53:25', 'Moses Kiptoo', '071267804', '9241', NULL, 'Mobile Payment', '960', 'paid', '40', '', 'SH687SHL2S'),
(14, '23eadba32599e9e00354808d86279994f538e3b4', 'STF-1457', '10', '2024-08-07 06:58:38', 'Martin Mbithi', '071267804', '6094', NULL, 'Credit', '1450', 'paid', '50', '2024-08-30', ''),
(15, '038270499d72067d24c63163e18635a7b964335b', 'STF-1457', '5', '2024-08-07 06:58:38', 'Martin Mbithi', '071267804', '6094', NULL, 'Credit', '28000', 'paid', '1000', '2024-08-30', '');

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
('2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'Native BeeCare', '+254 718 280 564\r\nWote - Makueni, Kenya', 'info@nativebeecare.co.ke', 'active', NULL),
('d5bd11feb840bdb01998338e3da4af494a7049208495a6e3', 'Native BeeCare Nairobi ', 'Nairobi', 'info@nativebeecare.co.ke', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_logs`
--

CREATE TABLE `system_logs` (
  `log_id` int(200) NOT NULL,
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
(92, 'STF-9418', '127.0.0.1', 'Successfully Logged Into Admin Dashboard', '2024-08-07 11:10:26', 'Authentication Logs');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `system_id` int(200) NOT NULL,
  `system_name` varchar(200) DEFAULT NULL,
  `system_tagline` longtext DEFAULT NULL,
  `system_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`system_id`, `system_name`, `system_tagline`, `system_status`) VALUES
(1, 'Lite Inventory MIS.', 'Knocking Out Your Inventory Needs', 'Activated');

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
('STF-0561', 'Ken ', 'kennedy@nativebeecare.co.ke', '0712456789', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Manager', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'active'),
('STF-1457', 'Martin', 'martin@devlan.co.ke', '07122121241', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Staff', '2d2fb3a4537dfe192dfd999667fa6de7ccd120efd1fa1fa7', 'active'),
('STF-9418', 'Admin', 'admin@devlan.co.ke', '071234567', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Admin', '6cf2d9a5407fa4e91b41ae4adc5dbd9d6ef2d8d88b58', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `permission_id` int(200) NOT NULL,
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
-- AUTO_INCREMENT for table `hold_sales`
--
ALTER TABLE `hold_sales`
  MODIFY `hold_sale_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `loyalty_points`
--
ALTER TABLE `loyalty_points`
  MODIFY `loyalty_points_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mailer_settings`
--
ALTER TABLE `mailer_settings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `payment_settings_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `receipt_customization`
--
ALTER TABLE `receipt_customization`
  MODIFY `receipt_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `system_logs`
--
ALTER TABLE `system_logs`
  MODIFY `log_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `system_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `permission_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `ProductInventoryID` FOREIGN KEY (`inventory_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD CONSTRAINT `PaymentSettingsStore` FOREIGN KEY (`payment_settings_store_id`) REFERENCES `store_settings` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receipt_customization`
--
ALTER TABLE `receipt_customization`
  ADD CONSTRAINT `ReceiptStore` FOREIGN KEY (`receipt_store_id`) REFERENCES `store_settings` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
