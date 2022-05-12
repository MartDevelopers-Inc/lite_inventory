-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2022 at 09:38 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` varchar(200) NOT NULL,
  `cart_number` varchar(200) NOT NULL,
  `cart_product_qty` varchar(200) NOT NULL,
  `cart_product_id` varchar(200) NOT NULL,
  `cart_store_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mailer_settings`
--

INSERT INTO `mailer_settings` (`id`, `mailer_host`, `mailer_port`, `mailer_protocol`, `mailer_username`, `mailer_mail_from_name`, `mailer_mail_from_email`, `mailer_password`) VALUES
(2, 'bhs104.truehost.cloud', '465', 'ssl', 'sandbox_mailer@devlan.co.ke', 'MASTERPIECE  Electrical & Hardware Supplies ', 'sandbox_mailer@devlan.co.ke', '20Devlan@');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(200) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_description` longtext DEFAULT NULL,
  `product_purchase_price` varchar(200) NOT NULL,
  `product_sale_price` varchar(200) NOT NULL,
  `product_quantity` varchar(200) NOT NULL,
  `product_quantity_limit` varchar(200) NOT NULL,
  `product_code` varchar(200) NOT NULL,
  `product_status` varchar(200) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_purchase_price`, `product_sale_price`, `product_quantity`, `product_quantity_limit`, `product_code`, `product_status`) VALUES
('04bde6d7c967907c02c138d37b5cd4cb9559172f', 'J.W DOUBLE BLACK', '', '4100', '4800', '1', '1', 'P105', 'active'),
('07065ba19017d117e64925ccbe329c258da0291b', 'SMIRNOFF  VODKA  375ML', '', '472', '700', '4', '1', 'P59', 'active'),
('0be4d3ff04f5ff2e85221fa68179812e6a8d42ce', 'LEMONADE', '', '34', '50', '24', '1', 'P52', 'active'),
('0cb51520f725516f308e1cc39044785559f78762', 'FAMOUS GROUSE 750ML', '', '1300', '1750', '1', '1', 'P107', 'active'),
('0cd682619b9708d566d3ab892baa5c8fe2c0c30f', 'TRACE', '', '0', '0', '0', '1', 'P68', 'active'),
('0e9718c31342106e1a659fa91636980f44d76930', 'CAPRICE (W/R)', '', '550', '680', '1', '1', 'P91', 'active'),
('114377e45b379659bb1cd1c9b9d1e39f1b371e7c', 'HERDMAN 250ML', '', '265', '350', '0', '1', 'P124', 'active'),
('1479429027af0937dd5d9c6b87aa793f3bff3bd2', 'ROBERTSON 1.5ML( W)', '', '1500', '2000', '2', '1', 'P96', 'active'),
('16d39642e5d5547fe3e604eff2d3f2fa009918e1', 'RICHOT  350ML', '', '480', '700', '4', '1', 'P57', 'active'),
('16df082c3b1331930409f1dba8d1ca16b2d7eb02', ' SODA 1.5LTRS', '', '34', '100', '12', '1', 'P4', 'active'),
('1aa6828c11f176b0c8f41b1016ef0fb8a4e26d14', 'Zappa 750ml', '', '1156', '1400', '1', '1', 'P145', 'active'),
('1ddab69843f5a402cc03f4a99b3e04d1e367b3c6', 'PREDATOR', '', '50', '60', '0', '1', 'P128', 'active'),
('1f7bbc112479a9712c754fc0c5a3fdec17e31721', 'BEST GIN 250ML', '', '220', '270', '4', '1', 'P16', 'active'),
('1fe0f2b54dceea966fe4256230c0259002b31a9e', 'RICHOT   750ML', '', '1000', '1300', '2', '1', 'P58', 'active'),
('2050d5887decbeb375491e3f3859bcd79c0c097d', 'County 750', '', '452', '520', '1', '1', 'P142', 'active'),
('20a21683f74d144060f798073fc9181d035d0ccf', 'HUNTERS 750ML', '', '679', '900', '2', '1', 'P30', 'active'),
('210ee9e73291141618602263c72ea2e0957e57f0', 'HENNESY', '', '5200', '6500', '1', '1', 'P104', 'active'),
('2265a8f68c9894bac74622689f9786915f92e300', 'WILLIAM LAWSON CAN', '', '0', '0', '4', '1', 'P82', 'active'),
('22d94cf3d2206ed66ccdbfca445da14c031e02ea', 'DELMONTE', '', '180', '300', '6', '1', 'P118', 'active'),
('2469b686f0d3973c93b3ee417cb87a984d0bb485', 'KONYAGI 250ML', '', '180', '230', '6', '1', 'P111', 'active'),
('2560af4137c357c7d59b9e5e6745ece550da5b65', 'Supreme 250ML', '', '150', '180', '5', '1', 'P137', 'active'),
('29d78a4b4e88b8ce4ad6f0306f2c1357c063e4fe', 'WILLIAM LAWSON 350 ML', '', '543', '750', '3', '1', 'P81', 'active'),
('2a2b58e8e289a8a179ae2f212f4ceea6f8ca5843', 'MALIBU', '', '1183', '1400', '2', '1', 'P129', 'active'),
('2a44f33ec3b6c5c8d5a5abc200d20a7c68d9e7c3', 'DROSTDY(W)', '', '628', '1000', '2', '1', 'P95', 'active'),
('2b30b8bfab307a1e75507f4815ad73b5bbc486f3', 'KONYAGI  500ML', '', '372', '450', '6', '1', 'P112', 'active'),
('2b9a5fb7ccbef46f484fa9834b73365a4b3d6e9f', 'CHROME 750ML', '', '480', '600', '8', '1', 'P110', 'active'),
('2e41df2275c70bea71e0c086ffff213178f5d6e1', 'AMARULA 300ML', '', '884', '1200', '3', '1', 'P92', 'active'),
('2efe13c98af8ae0a2d8fd75cbbb76b167cb1141c', 'HUNTERS 250 ML', '', '233', '300', '7', '1', 'P28', 'active'),
('2f2505a7e6d2d3569384a94680bece3b33f834ed', 'Hunters Gold/Dry', '', '125', '200', '2', '1', 'P147', 'active'),
('2f318e1704de7679c9a6b157899a52df757e5723', 'V&A 250ML', '', '236', '300', '6', '1', 'P70', 'active'),
('308b29cd5282e74bf93442ac8550c4a4a1b9a551', 'CHROME 250ML', '', '174', '220', '30', '1', 'P109', 'active'),
('30f7f0558b1be8d2c9797678aca21f4e1f4f4a0a', 'CHAMDOUR', '', '503', '700', '2', '1', 'P108', 'active'),
('333a8ab7e81c2fd78d67e105982432ba896e4f7a', 'WILLIAM LAWSON  750 ML', '', '1088', '1450', '3', '1', 'P80', 'active'),
('33866bfaa150ec8c2cd0304195b8b7ebf915fec8', 'ROBERTSON750ML W', '', '700', '1300', '1', '1', 'P98', 'active'),
('34e2780f6d5b3d33b472cf0d84fcd0d17a764553', 'BALLEYS  375ML', '', '880', '1200', '4', '1', 'P10', 'active'),
('3738b0855f672d22fb0677b780f9c58d72c98b45', 'TANGERY SELVILA', '', '2080', '2400', '0', '1', 'P121', 'active'),
('37a2bd28439beca7810bf41688fba9a34b792112', 'K.C  375ML', '', '280', '380', '6', '1', 'P48', 'active'),
('38d8db075b9d378e91db7a87d9eca51c70defe10', '4TH STREET(R)', '', '615', '900', '1', '1', 'P90', 'active'),
('3e6d3ef8954e291e311ecaa1af272c95d10f60fe', 'B WHITE 750ML', '', '880', '1050', '2', '1', 'P6', 'active'),
('3f8cdd4f97b847bcf607e4dd97811f35332476f7', 'Tanquary B/Current', '', '2083', '2600', '0', '1', 'P152', 'active'),
('40a1be4f3f5d69bd04a3262a71f1e86928dffef4', 'K.C  250ML', '', '220', '270', '3', '1', 'P47', 'active'),
('42514c2f2113c4d413f121bbdb634dfaa13cacfe', 'PENASOL  (R)', '', '622', '750', '4', '1', 'P53', 'active'),
('43776f4d92f4da392af74f6f42fba05e6263d958', 'J/WALKER(R)1L', '', '1602', '2100', '1', '1', 'P37', 'active'),
('44b0976776d96d2d74be8e9f42dbad121ef493c4', 'VICEROY 750ML', '', '1047', '1250', '3', '1', 'P76', 'active'),
('461c9e9f35cd9360e170ebb134206aaf301aec93', 'SODA 1/2LTR', '', '52', '80', '20', '1', 'P63', 'active'),
('467b0c1dd44ef75d89eeec28cb5896c124002bc9', 'JACK DANIELS 350ML', '', '1419', '1650', '3', '1', 'P39', 'active'),
('4a814c0d4f863ec3565a7b6be7b632046755b88d', 'J/WALKER (R) 250ML', '', '519', '700', '2', '1', 'P32', 'active'),
('4cb2bbcb6c52f2bf58fad4c3985b49ff1555f313', 'K/EXTRA250ML', '', '167', '270', '6', '1', 'P51', 'active'),
('501bcdeaba7f28e36df4689e2016a253ed6de059', 'GILBEYS   250ML ', '', '368', '500', '8', '1', 'P24', 'active'),
('5139fcb743565a93ba49568086a3376794cbc101', 'Iris', '', '720', '1200', '2', '1', 'P150', 'active'),
('5281fae3f3658333f826bd9ff85a4cb95fd440bd', 'CASSA BUENA(R)', '', '486', '600', '1', '1', 'P86', 'active'),
('52a8cbe8b3c2655bea166119e07e12e17d3dd0dd', 'CAPTAIN MORGAN 250ML', '', '248', '300', '9', '1', 'P20', 'active'),
('5500c8ac660a8aea0cdda365dfc2050c3c7d0ac9', 'TANQUERY 10', '', '3166', '3800', '1', '1', 'P101', 'active'),
('5646cddf39a98c244154b6d81dfe0f3c3d911edf', 'BEST GIN 750ML', '', '570', '670', '2', '1', 'P17', 'active'),
('5854b246ee0adcd909fd279923cce6242af561d8', 'FAXE', '', '180', '220', '4', '1', 'P22', 'active'),
('58bbd3963bc3cf32fbd5ce34db759104e22fabb5', 'W/CAP', '', '181', '220', '15', '1', 'P77', 'active'),
('5a1c05ab2057f9c77c45ebcd5f14a36a858c209f', 'BALOZI', '', '164', '220', '8', '1', 'P13', 'active'),
('5be9d64919b77abcece2da3a428596c6971023af', '4TH STREET (W)', '', '615', '900', '2', '1', 'P89', 'active'),
('5da2490576eb38821334a421cccd39f8a9049274', 'BOND 7 750ML ', '', '1000', '1500', '3', '1', 'P19', 'active'),
('5ed6aa8767627dafa8b96b7c0d18f45d070d4429', 'ROBERTSON 1.5ML( R)', '', '1500', '2000', '1', '1', 'P97', 'active'),
('5f80bfb95c97efe8f213a6894ee209280b8692ec', 'V&A  750ML', '', '608', '750', '5', '1', 'P71', 'active'),
('60327fccd7024e92b64735d73942b171718409bc', 'CELLAR CASK(R & W)', '', '614', '900', '6', '1', 'P87', 'active'),
('62bccffcbd7a8e4e5ce934752f80afd3d9866633', 'GRANTS 1LTR', '', '1537', '2200', '1', '1', 'P115', 'active'),
('63a3b436136ff36627c4f2f57a99abfbe9954ca6', 'GORDON 750ML', '', '1360', '1550', '4', '1', 'P100', 'active'),
('64628418275d5c29809bd65574f956f5b4f0ee88', 'J/WALKER(RED)750ML', '', '1283', '1500', '3', '1', 'P38', 'active'),
('66e78b99c2300e2df0a778cd6386c4cedb2aad91', 'J/WALKER(B)750ML', '', '2419', '2800', '2', '1', 'P34', 'active'),
('6932a1522bdaed0371d57975c06cbc0fffcd31e1', 'BEST CREAM  250ML ', '', '325', '600', '2', '1', 'P14', 'active'),
('69a3473431a8b461e6657b90bd9758e95089ea6e', 'ROBERTSON750ML R', '', '700', '1300', '0', '1', 'P99', 'active'),
('69d38c6f1b5ef2350bb61b66811925e16d127f45', 'TANQUERY GIN', '', '1920', '2300', '1', '1', 'P122', 'active'),
('6a03e7b3923e76ed6e0967def18bd0caebd3205a', 'COUNRTY 250ML', '', '146', '180', '4', '1', 'P134', 'active'),
('6a2c22d1460963a87f572f950186a162513f68a1', 'All Seasons 750ML', '', '764', '850', '2', '1', 'P136', 'active'),
('6d2e3979bbfb2b5d330ca43cdf47d883d6f8e830', 'KINGFISHER', '', '139', '200', '6', '1', 'P83', 'active'),
('6dc2db5bb364fa391767dd0b9580b106717fdcd1', 'SINGLETON 12yrs', '', '3360', '3900', '2', '1', 'P102', 'active'),
('707630cbfc525745efca1bec974d052c2a29481f', 'SOUTHERN COMFORT  750 ML', '', '2385', '2600', '0', '1', 'P64', 'active'),
('7279a807dc581bfda4ccca291799e4a336b47ebc', 'KONYAGI 750ML', '', '530', '600', '2', '1', 'P113', 'active'),
('734385830c4ced0f21a4be21c08711425ef7ef97', 'JAMESON 750 ML', '', '1766', '2050', '1', '1', 'P43', 'active'),
('73ec6a36002c95e5f8194cebec4b8f78ba13987f', 'All Seasons 250ML', '', '235', '300', '2', '1', 'P135', 'active'),
('743bd723ec980f59ae80b3deae6c4e3763ea12e5', 'T/LITE', '', '163', '220', '7', '1', 'P67', 'active'),
('74ba43668df3b5a5719bf267bced81d69ef50a44', 'WATER 1LTR', '', '34', '100', '11', '1', 'P79', 'active'),
('75d979cbd84c2c7b51e60f44d64e3d6b1a090420', 'GLENFIDICH', '', '3500', '4100', '1', '1', 'P106', 'active'),
('7b15f460d06c37ec748bb489ffc1941031ef90ee', 'SMIRNOFF  VODKA   250ML', '', '344', '450', '5', '1', 'P61', 'active'),
('7cca84a4c21e97301bbf02441a4ece89c4a1581e', 'Heinken', '', '187', '250', '12', '1', 'P148', 'active'),
('7ebc95425a4ecfc409315284979784f0c61450c3', 'Flirt Vodka 750ml', '', '807', '1000', '2', '1', 'P144', 'active'),
('7f803053f782a118d19d730b65d469c115256f37', 'GILBEYS  375ML', '', '512', '650', '6', '1', 'P25', 'active'),
('7fe12e9a7d2c43e2cee8ad71650a29149ee8bb65', 'Old Monk 500ml', '', '819', '1000', '0', '1', 'P141', 'active'),
('7fed380d9dba0d3ffcad99a65d2b5c0cff987aef', 'GRANTS 750ML', '', '1145', '1600', '1', '1', 'P114', 'active'),
('8109d657de747fb9665e73bd9da0bb25e8f409f0', 'B/WHISKY 250ML', '', '251', '310', '2', '1', 'P8', 'active'),
('8157b892f1c60bfa865ec13d8f9216d6be556e5b', 'HUNTERS 350ML', '', '360', '450', '4', '1', 'P29', 'active'),
('82521f91b2855a1cbd632be812e290118f41a18b', 'GK SMOOTH', '', '181', '220', '0', '1', 'P132', 'active'),
('84a34c02fa141138f7218569fb4498eabc97c799', 'J/WALKER(RED)375ML', '', '784', '1050', '2', '1', 'P35', 'active'),
('87e63217032f1471c2dbf4cd9328fab82fae2792', 'RICHOT     250ML', '', '368', '450', '2', '1', 'P56', 'active'),
('8900e6272f414fcb5e2b622e5bfcf54fca26cb31', 'GUARANA', '', '142', '200', '21', '1', 'P27', 'active'),
('890572ef4bf98df7734292fb9fc1437eef4afc44', 'SMIRNOFF  VODKA 750ML', '', '1000', '1300', '1', '1', 'P60', 'active'),
('898a69cd7e473128073d7ac6c836a8a2411bb3c7', 'JACK DANIELS 1LTR', '', '3127', '3800', '0', '1', 'P41', 'active'),
('8adb668e96bbe10b058bf760bc82966af6d9b8ad', 'TUSKER MALT', '', '181', '220', '3', '1', 'P130', 'active'),
('8bda24bf7df813f9705f2fce7f33cfe13b54d1c7', 'BALLEYS   750ML', '', '1720', '2050', '1', '1', 'P11', 'active'),
('8bdc53881212eaeab9345371765798d865ea2a38', 'K.C  750ML', '', '560', '750', '1', '1', 'P49', 'active'),
('8c0689a8295e916cfbee98a2800c8ccca7b19394', 'General Milkins 750ML', '', '483', '580', '2', '1', 'P153', 'active'),
('8e8ed338eb51b93affa0ba43e9b63efad3571cbc', 'VICEROY 250 ML', '', '332', '400', '3', '1', 'P74', 'active'),
('91c4c273c3beb320ac1b9ef308532a27f2f7aee1', 'Flirt Vodka 500ml', '', '388', '500', '2', '1', 'P143', 'active'),
('9262e64c31ca058070a34204633061913da7f5d9', 'MYERS RUM', '', '2375', '3000', '1', '1', 'P155', 'active'),
('9287ff53ca69f41f5d695b52f573ff66443954a1', 'J/WALKER (B) 250ML', '', '959', '1200', '0', '1', 'P31', 'active'),
('9332ad2deb52f47aa689a1ce79e89681ca5b41f0', 'OJ', '', '172', '220', '0', '1', 'P125', 'active'),
('950f30d47a78ca1379a26a9a511c98d69126a778', 'JB  1L', '', '1680', '2000', '2', '1', 'P46', 'active'),
('9a4c4c0f068eb1b4954d9b11796242974fa781d5', 'White Cap Brown Bottle', '', '200', '220', '0', '1', 'P140', 'active'),
('9a645c6f657886a0b88721bfc81030ff009abba6', ' KIBAO 250 ML', 'DEMO', '169', '235', '2', '1', 'P1', 'active'),
('9b7c5a064138e386ce9bdb60d49584fc787df7cc', 'GILBEYS  750ML', '', '1080', '1300', '3', '1', 'P26', 'active'),
('9d6f32a5a4a2ff571b8511f5d319d039bd4c9ff0', 'TUSKER', '', '163', '220', '12', '1', 'P69', 'active'),
('9e9319dba38a480434045902ded2dc33f1a18cae', 'VICEROY 375ML', '', '520', '750', '5', '1', 'P75', 'active'),
('a017eb954df050e5df5be420cdc8da11eeabc569', 'CHIVA REGAL', '', '3100', '3600', '1', '1', 'P157', 'active'),
('a850b010bef4683d5dc890d12064fb1d25760a4b', 'Atlas', '', '205', '250', '1', '1', 'P156', 'active'),
('aa2f24f2f75616841c1e769559c87a822daee2f6', 'JB   375ML', '', '750', '950', '3', '1', 'P44', 'active'),
('aa2fd720c4129d115d8fa5ba8495b84ffa55a7e4', 'YATTA', '', '179', '250', '2', '1', 'P119', 'active'),
('adc229a26a37b73fee960e8f44483bc7dea427f5', 'Hendrick\\\'s Gin', '', '3500', '3800', '0', '1', 'P146', 'active'),
('ae5884dcf14fccd4b43c64d87cd93ed8b005c2b5', 'PLAY', '', '41', '60', '13', '1', 'P55', 'active'),
('af3d727799ba807b65ba4f34d6064621e8bda038', 'SAVANNA', '', '200', '230', '1', '1', 'P127', 'active'),
('b039d43004bc097e26f4ec278c6646429028da43', 'K/EXRTRA 750ML', '', '472', '750', '2', '1', 'P50', 'active'),
('b0b6844e9331e8f2f896401313904844c50e70af', 'FOUR COUSINS(R)', '', '619', '900', '2', '1', 'P88', 'active'),
('b4bdb7317267abf2077927da660b9b3d131d0bd6', 'WATER 0.5 LTR', '', '17', '50', '11', '1', 'P78', 'active'),
('b6bd5f296b1ac8599c46bc213e39931278186db2', 'JACK DANIELS 700ML', '', '2385', '2700', '2', '1', 'P40', 'active'),
('bad40230a8ca0531c7bfe7d17fb466f25f6cba2f', 'Roso Nobile', '', '1113', '1500', '2', '1', 'P154', 'active'),
('bbf3ec18f8c987bef20c1bc172a6d2f0d524e30e', 'Imperial Blue', '', '650', '1000', '1', '1', 'P149', 'active'),
('bf423f6e53fe1820ad95b9e96560cd5e60424197', 'B WHITE 375ML', '', '456', '650', '3', '1', 'P7', 'active'),
('c0da81f21c36dc38b56df29e5f43bce85ca69a5c', 'General Milkins 250ML', '', '152', '200', '7', '1', 'P138', 'active'),
('c29277b76c62ccc029885a9e9193389118ae970f', 'BEST CREAM  750ML', '', '839', '1100', '3', '1', 'P15', 'active'),
('c5f6c661a8463f3ca8a85c0b9a9ecac6c3122153', 'B WHITE  1LTR', '', '1160', '1400', '1', '1', 'P5', 'active'),
('c8266efddea15d0ef58e41c81fab06f39bf61869', 'Orchid Valley', '', '150', '300', '0', '1', 'P139', 'active'),
('cc12cffbfb3fc84e72f584e4ea0c1add7d565819', 'JB   750ML', '', '1360', '1650', '1', '1', 'P45', 'active'),
('cd85452ad8e666c32cb79c099da421b381c34b44', 'LIME JUICE 1.5l', '', '93', '120', '0', '1', 'P116', 'active'),
('d128578be877e8314f2d57d36122aba05229ca1b', 'DROSTDY RED', '', '628', '1000', '4', '1', 'P94', 'active'),
('d13d55fc9fcb304685c8505b32d66abc2090d1cf', 'G.K', '', '183', '220', '18', '1', 'P23', 'active'),
('d375cedefc7141e575200280e9deaa5303726bc9', 'CAPTAIN MORGAN  750ML', '', '720', '1000', '2', '1', 'P21', 'active'),
('d4b8140e16d8d78dbdfc9f8a0440439336a3aa3e', 'SINGLETON 15yrs', '', '0', '0', '1', '1', 'P103', 'active'),
('d507606dac33198b3a257db910ce55d90db55d20', 'BOND 7 250ML', '', '344', '550', '4', '1', 'P18', 'active'),
('d59c3d203f03066743f6767bca505648e0ce7329', 'Tanquary Lime', '', '2083', '2600', '2', '1', 'P151', 'active'),
('d5fc529718eabeb414d97f64882b6c5b1992ccdb', 'SNAPP', '', '141', '200', '15', '1', 'P62', 'active'),
('debe79f0ce624119310f92ab618563e5a0ddadd3', ' KIBAO 750 ML', '', '478', '670', '2', '1', 'P3', 'active'),
('df65ac14f746a0ace0c35dac528ec01b1b13d787', 'T/CIDER                                ', '', '172', '220', '19', '1', 'P66', 'active'),
('e1ba2f8e933a404cefa9b9f846e44214a6c44b53', 'AMARULAS 750ML', '', '1659', '2000', '3', '1', 'P93', 'active'),
('e1eea70a3441a121a2a987b220f332e5474df50f', 'J/WALKER(B)1L', '', '3042', '3500', '1', '1', 'P36', 'active'),
('e39b38f7d1e7eebccb84d668998daa43a9832c52', 'CASSA BUENA(W)', '', '486', '600', '0', '1', 'P85', 'active'),
('e3aa3ab731e9db3dda343d389455f72e510c571a', 'BALLEYS   Delight  750ML', '', '803', '1200', '2', '1', 'P12', 'active'),
('e4a276eb421c50ac7940e14a4e2f1e1a8463b301', 'JAMESON 350ML', '', '928', '1200', '4', '1', 'P42', 'active'),
('e4a3a6a53b58b6735b83cd976c7c0f679ffb0269', 'VAT  69  750ML', '', '1160', '1400', '3', '1', 'P72', 'active'),
('e8ae9e521b33bc341c6fa1545670dddf81cad78a', 'MARTINI ROSSO/BIANCO', '', '1406', '2000', '4', '1', 'P84', 'active'),
('e991baca9acd89e5086ab036b6bcc9aa8b087ecf', 'SCHWEPPES', '', '53', '60', '11', '1', 'P133', 'active'),
('ee18fdd438c4c0021b10f6ca5745d19c58ce72dc', 'B/WHISKY 750ML', '', '670', '1000', '1', '1', 'P9', 'active'),
('ef6c8514810190dde626cb32a1fa632dda5cd43f', 'PILSNER CAN', '', '148', '220', '6', '1', 'P131', 'active'),
('f34788ad236b64f02dc934759028aa5081701d5a', 'LIME JUICE 700ml', '', '0', '0', '0', '1', 'P117', 'active'),
('f3adae1a8624926f497d668725f1cdd0c7f1a497', 'R/BULL', '', '130', '200', '0', '1', 'P120', 'active'),
('f582c8371fb91aa6090326cfdc44b6df31878f5d', 'VAT 69  375ML', '', '656', '950', '2', '1', 'P73', 'active'),
('f8159af7690801f390852047985ddd2ac0ad45a3', 'BLACK ICE', '', '142', '200', '8', '1', 'P126', 'active'),
('f8a1c11e6aa57ff2a8d8b10454a0e6658b951b1d', 'KIBAO 350 ML', '', '254', '310', '4', '1', 'P2', 'active'),
('f95f6fdc12d7ddcb01f9ca3cc148877671fdc07d', 'J/WALKER (B) 375ML', '', '1233', '1500', '4', '1', 'P33', 'active'),
('fb3b18e8ac5f8d0b1851b71b1f75e43eb81d44b5', 'SOUTHERN COMFORT 1L', '', '0', '0', '0', '1', 'P65', 'active'),
('fde4ea271880aa5a772a26cb88d2db5e31775e3f', 'PENASOL  (W)', '', '622', '750', '4', '1', 'P54', 'active'),
('fe825f93e61650f50e62f7c6fd9ed5f1a6269859', 'HERDMAN 500ML', '', '550', '700', '0', '1', 'P123', 'active');

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
  `sale_discount` varchar(200) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `sale_product_id`, `sale_user_id`, `sale_quantity`, `sale_datetime`, `sale_customer_name`, `sale_customer_phoneno`, `sale_receipt_no`, `sale_cart_number`, `sale_payment_method`, `sale_payment_amount`, `sale_payment_status`, `sale_discount`) VALUES
(856, '9a645c6f657886a0b88721bfc81030ff009abba6', 'STF-7381', '1', '2022-05-08 06:57:40', '', '', '9783', NULL, 'Cash', '230', 'paid', '0'),
(857, '9a645c6f657886a0b88721bfc81030ff009abba6', 'STF-7381', '1', '2022-05-08 06:59:17', '', '', '2059', NULL, 'Cash', '230', 'paid', '0'),
(858, '16df082c3b1331930409f1dba8d1ca16b2d7eb02', 'STF-7381', '1', '2022-05-08 06:59:18', '', '', '2059', NULL, 'Cash', '100', 'paid', '0'),
(859, '38d8db075b9d378e91db7a87d9eca51c70defe10', 'STF-7381', '1', '2022-05-08 06:59:18', '', '', '2059', NULL, 'Cash', '900', 'paid', '0'),
(860, '9a645c6f657886a0b88721bfc81030ff009abba6', 'STF-7381', '1', '2022-05-08 07:34:49', '', '', '2378', NULL, 'Cash', '235', 'paid', '0');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_settings`
--

INSERT INTO `store_settings` (`store_id`, `store_name`, `store_adr`, `store_email`, `store_status`, `store_close_date`) VALUES
('6cf2d9a5407fa4e91b41ae4adc5dbd9d6ef2d8d88b58', 'Double B Liquor Store', 'The Yard <br>\r\n Machakos ', 'null', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_logs`
--

CREATE TABLE `system_logs` (
  `log_id` int(200) NOT NULL,
  `log_user_id` varchar(200) NOT NULL,
  `log_ip_address` varchar(200) NOT NULL,
  `log_details` longtext NOT NULL,
  `log_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_logs`
--

INSERT INTO `system_logs` (`log_id`, `log_user_id`, `log_ip_address`, `log_details`, `log_created_at`) VALUES
(1503, 'STF-7914', '127.0.0.1', 'Registered new user : Brenda , brenda@gmail.com with Staff access level', '2022-05-03 11:14:16'),
(1504, 'STF-7914', '127.0.0.1', 'Registered new user : Brenda , brenda@gmail.com with Staff access level', '2022-05-03 11:20:31'),
(1505, 'STF-6820', '127.0.0.1', 'Registered T2439 - KIBAO 250ML, With A Total Quantity Of : 6', '2022-05-03 11:35:47'),
(1506, 'STF-7381', '127.0.0.1', 'Sold 1 items of T2439 KIBAO 250ML', '2022-05-03 11:38:25'),
(1507, 'STF-7381', '127.0.0.1', 'Sold 2 items of T2439 KIBAO 250ML', '2022-05-03 21:53:57'),
(1508, 'STF-6820', '127.0.0.1', 'Added new stock of 5 new items to T2439 KIBAO 250ML', '2022-05-03 21:55:57'),
(1509, 'STF-7381', '127.0.0.1', 'Sold 1 items of T2439 KIBAO 250ML', '2022-05-03 22:46:09'),
(1510, 'STF-9418', '127.0.0.1', 'Registered P1 -  KIBAO 250 ML, With A Total Quantity Of : 6', '2022-05-03 23:04:15'),
(1511, 'STF-9418', '127.0.0.1', 'Registered P2 -  KIBAO 350 ML, With A Total Quantity Of : 6', '2022-05-03 23:04:15'),
(1512, 'STF-9418', '127.0.0.1', 'Registered P3 -  KIBAO 750 ML, With A Total Quantity Of : 1', '2022-05-03 23:04:15'),
(1513, 'STF-9418', '127.0.0.1', 'Registered P4 -  SODA 1.5LTRS, With A Total Quantity Of : 8', '2022-05-03 23:04:15'),
(1514, 'STF-9418', '127.0.0.1', 'Registered P5 - B WHITE  1LTR, With A Total Quantity Of : 2', '2022-05-03 23:04:15'),
(1515, 'STF-9418', '127.0.0.1', 'Registered P6 - B WHITE 750ML, With A Total Quantity Of : 3', '2022-05-03 23:04:15'),
(1516, 'STF-9418', '127.0.0.1', 'Registered P7 - B WHITE 375ML, With A Total Quantity Of : 5', '2022-05-03 23:04:15'),
(1517, 'STF-9418', '127.0.0.1', 'Registered P8 - B/WHISKY 250ML, With A Total Quantity Of : 7', '2022-05-03 23:04:15'),
(1518, 'STF-9418', '127.0.0.1', 'Registered P9 - B/WHISKY 750ML, With A Total Quantity Of : 2', '2022-05-03 23:04:15'),
(1519, 'STF-9418', '127.0.0.1', 'Registered P10 - BALLEYS                                375ML, With A Total Quantity Of : 4', '2022-05-03 23:04:15'),
(1520, 'STF-9418', '127.0.0.1', 'Registered P11 - BALLEYS                                750ML, With A Total Quantity Of : 2', '2022-05-03 23:04:15'),
(1521, 'STF-9418', '127.0.0.1', 'Registered P12 - BALLEYS   Delight                            750ML, With A Total Quantity Of : 2', '2022-05-03 23:04:15'),
(1522, 'STF-9418', '127.0.0.1', 'Registered P13 - BALOZI, With A Total Quantity Of : 13', '2022-05-03 23:04:15'),
(1523, 'STF-9418', '127.0.0.1', 'Registered P14 - BEST     CREAM                    250ML , With A Total Quantity Of : 3', '2022-05-03 23:04:15'),
(1524, 'STF-9418', '127.0.0.1', 'Registered P15 - BEST     CREAM                    750ML, With A Total Quantity Of : 2', '2022-05-03 23:04:16'),
(1525, 'STF-9418', '127.0.0.1', 'Registered P16 - BEST GIN 250ML, With A Total Quantity Of : 3', '2022-05-03 23:04:16'),
(1526, 'STF-9418', '127.0.0.1', 'Registered P17 - BEST GIN 750ML, With A Total Quantity Of : 4', '2022-05-03 23:04:16'),
(1527, 'STF-9418', '127.0.0.1', 'Registered P18 - BOND   7                            250ML, With A Total Quantity Of : 6', '2022-05-03 23:04:16'),
(1528, 'STF-9418', '127.0.0.1', 'Registered P19 - BOND   7                            750ML , With A Total Quantity Of : 3', '2022-05-03 23:04:16'),
(1529, 'STF-9418', '127.0.0.1', 'Registered P20 - CAPTAIN MORGAN           250ML, With A Total Quantity Of : 4', '2022-05-03 23:04:16'),
(1530, 'STF-9418', '127.0.0.1', 'Registered P21 - CAPTAIN MORGAN           750ML, With A Total Quantity Of : 3', '2022-05-03 23:04:16'),
(1531, 'STF-9418', '127.0.0.1', 'Registered P22 - FAXE, With A Total Quantity Of : 13', '2022-05-03 23:04:16'),
(1532, 'STF-9418', '127.0.0.1', 'Registered P23 - G.K, With A Total Quantity Of : 18', '2022-05-03 23:04:16'),
(1533, 'STF-9418', '127.0.0.1', 'Registered P24 - GILBEYS                               250ML , With A Total Quantity Of : 5', '2022-05-03 23:04:16'),
(1534, 'STF-9418', '127.0.0.1', 'Registered P25 - GILBEYS                               375ML, With A Total Quantity Of : 6', '2022-05-03 23:04:16'),
(1535, 'STF-9418', '127.0.0.1', 'Registered P26 - GILBEYS                               750ML, With A Total Quantity Of : 7', '2022-05-03 23:04:16'),
(1536, 'STF-9418', '127.0.0.1', 'Registered P27 - GUARANA, With A Total Quantity Of : 15', '2022-05-03 23:04:16'),
(1537, 'STF-9418', '127.0.0.1', 'Registered P28 - HUNTERS 250 ML, With A Total Quantity Of : 9', '2022-05-03 23:04:16'),
(1538, 'STF-9418', '127.0.0.1', 'Registered P29 - HUNTERS 350ML, With A Total Quantity Of : 4', '2022-05-03 23:04:16'),
(1539, 'STF-9418', '127.0.0.1', 'Registered P30 - HUNTERS 750ML, With A Total Quantity Of : 3', '2022-05-03 23:04:16'),
(1540, 'STF-9418', '127.0.0.1', 'Registered P31 - J/WALKER (B) 250ML, With A Total Quantity Of : 1', '2022-05-03 23:04:16'),
(1541, 'STF-9418', '127.0.0.1', 'Registered P32 - J/WALKER (R) 250ML, With A Total Quantity Of : 2', '2022-05-03 23:04:16'),
(1542, 'STF-9418', '127.0.0.1', 'Registered P33 - J/WALKER (B) 375ML, With A Total Quantity Of : 4', '2022-05-03 23:04:16'),
(1543, 'STF-9418', '127.0.0.1', 'Registered P34 - J/WALKER(B)750ML, With A Total Quantity Of : 5', '2022-05-03 23:04:16'),
(1544, 'STF-9418', '127.0.0.1', 'Registered P35 - J/WALKER(RED)375ML, With A Total Quantity Of : 4', '2022-05-03 23:04:16'),
(1545, 'STF-9418', '127.0.0.1', 'Registered P36 - J/WALKER(B)1L, With A Total Quantity Of : 2', '2022-05-03 23:04:16'),
(1546, 'STF-9418', '127.0.0.1', 'Registered P37 - J/WALKER(R)1L, With A Total Quantity Of : 1', '2022-05-03 23:04:16'),
(1547, 'STF-9418', '127.0.0.1', 'Registered P38 - J/WALKER(RED)750ML, With A Total Quantity Of : 3', '2022-05-03 23:04:16'),
(1548, 'STF-9418', '127.0.0.1', 'Registered P39 - JACK DANIELS 350ML, With A Total Quantity Of : 3', '2022-05-03 23:04:16'),
(1549, 'STF-9418', '127.0.0.1', 'Registered P40 - JACK DANIELS 700ML, With A Total Quantity Of : 2', '2022-05-03 23:04:16'),
(1550, 'STF-9418', '127.0.0.1', 'Registered P41 - JACK DANIELS 1LTR, With A Total Quantity Of : 0', '2022-05-03 23:04:16'),
(1551, 'STF-9418', '127.0.0.1', 'Registered P42 - JAMESON 350ML, With A Total Quantity Of : 4', '2022-05-03 23:04:16'),
(1552, 'STF-9418', '127.0.0.1', 'Registered P43 - JAMESON 750 ML, With A Total Quantity Of : 2', '2022-05-03 23:04:16'),
(1553, 'STF-9418', '127.0.0.1', 'Registered P44 - JB                                         375ML, With A Total Quantity Of : 2', '2022-05-03 23:04:16'),
(1554, 'STF-9418', '127.0.0.1', 'Registered P45 - JB                                         750ML, With A Total Quantity Of : 3', '2022-05-03 23:04:16'),
(1555, 'STF-9418', '127.0.0.1', 'Registered P46 - JB                                         1L, With A Total Quantity Of : 1', '2022-05-03 23:04:16'),
(1556, 'STF-9418', '127.0.0.1', 'Registered P47 - K.C                                         250ML, With A Total Quantity Of : 10', '2022-05-03 23:04:16'),
(1557, 'STF-9418', '127.0.0.1', 'Registered P48 - K.C                                         375ML, With A Total Quantity Of : 4', '2022-05-03 23:04:16'),
(1558, 'STF-9418', '127.0.0.1', 'Registered P49 - K.C                                         750ML, With A Total Quantity Of : 2', '2022-05-03 23:04:16'),
(1559, 'STF-9418', '127.0.0.1', 'Registered P50 - K/EXRTRA 750ML, With A Total Quantity Of : 2', '2022-05-03 23:04:16'),
(1560, 'STF-9418', '127.0.0.1', 'Registered P51 - K/EXTRA250ML, With A Total Quantity Of : 9', '2022-05-03 23:04:16'),
(1561, 'STF-9418', '127.0.0.1', 'Registered P52 - LEMONADE, With A Total Quantity Of : 25', '2022-05-03 23:04:17'),
(1562, 'STF-9418', '127.0.0.1', 'Registered P53 - PENASOL  (R), With A Total Quantity Of : 4', '2022-05-03 23:04:17'),
(1563, 'STF-9418', '127.0.0.1', 'Registered P54 - PENASOL  (W), With A Total Quantity Of : 4', '2022-05-03 23:04:17'),
(1564, 'STF-9418', '127.0.0.1', 'Registered P55 - PLAY, With A Total Quantity Of : 0', '2022-05-03 23:04:17'),
(1565, 'STF-9418', '127.0.0.1', 'Registered P56 - RICHOT                               250ML, With A Total Quantity Of : 5', '2022-05-03 23:04:17'),
(1566, 'STF-9418', '127.0.0.1', 'Registered P57 - RICHOT                               350ML, With A Total Quantity Of : 2', '2022-05-03 23:04:17'),
(1567, 'STF-9418', '127.0.0.1', 'Registered P58 - RICHOT                               750ML, With A Total Quantity Of : 4', '2022-05-03 23:04:17'),
(1568, 'STF-9418', '127.0.0.1', 'Registered P59 - SMIRNOFF  VODKA            375ML, With A Total Quantity Of : 3', '2022-05-03 23:04:17'),
(1569, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:04:17'),
(1570, 'STF-9418', '127.0.0.1', 'Registered P1 -  KIBAO 250 ML, With A Total Quantity Of : 5', '2022-05-03 23:25:08'),
(1571, 'STF-9418', '127.0.0.1', 'Registered P2 - KIBAO 350 ML, With A Total Quantity Of : 4', '2022-05-03 23:25:08'),
(1572, 'STF-9418', '127.0.0.1', 'Registered P3 -  KIBAO 750 ML, With A Total Quantity Of : 2', '2022-05-03 23:25:08'),
(1573, 'STF-9418', '127.0.0.1', 'Registered P4 -  SODA 1.5LTRS, With A Total Quantity Of : 13', '2022-05-03 23:25:08'),
(1574, 'STF-9418', '127.0.0.1', 'Registered P5 - B WHITE  1LTR, With A Total Quantity Of : 1', '2022-05-03 23:25:08'),
(1575, 'STF-9418', '127.0.0.1', 'Registered P6 - B WHITE 750ML, With A Total Quantity Of : 2', '2022-05-03 23:25:08'),
(1576, 'STF-9418', '127.0.0.1', 'Registered P7 - B WHITE 375ML, With A Total Quantity Of : 3', '2022-05-03 23:25:09'),
(1577, 'STF-9418', '127.0.0.1', 'Registered P8 - B/WHISKY 250ML, With A Total Quantity Of : 2', '2022-05-03 23:25:09'),
(1578, 'STF-9418', '127.0.0.1', 'Registered P9 - B/WHISKY 750ML, With A Total Quantity Of : 1', '2022-05-03 23:25:09'),
(1579, 'STF-9418', '127.0.0.1', 'Registered P10 - BALLEYS  375ML, With A Total Quantity Of : 4', '2022-05-03 23:25:09'),
(1580, 'STF-9418', '127.0.0.1', 'Registered P11 - BALLEYS   750ML, With A Total Quantity Of : 1', '2022-05-03 23:25:09'),
(1581, 'STF-9418', '127.0.0.1', 'Registered P12 - BALLEYS Delight 750ML, With A Total Quantity Of : 2', '2022-05-03 23:25:09'),
(1582, 'STF-9418', '127.0.0.1', 'Registered P13 - BALOZI, With A Total Quantity Of : 8', '2022-05-03 23:25:09'),
(1583, 'STF-9418', '127.0.0.1', 'Registered P14 - BEST CREAM 250ML , With A Total Quantity Of : 2', '2022-05-03 23:25:09'),
(1584, 'STF-9418', '127.0.0.1', 'Registered P15 - BEST  CREAM  750ML, With A Total Quantity Of : 3', '2022-05-03 23:25:09'),
(1585, 'STF-9418', '127.0.0.1', 'Registered P16 - BEST GIN 250ML, With A Total Quantity Of : 4', '2022-05-03 23:25:09'),
(1586, 'STF-9418', '127.0.0.1', 'Registered P17 - BEST GIN 750ML, With A Total Quantity Of : 2', '2022-05-03 23:25:09'),
(1587, 'STF-9418', '127.0.0.1', 'Registered P18 - BOND  7  250ML, With A Total Quantity Of : 4', '2022-05-03 23:25:09'),
(1588, 'STF-9418', '127.0.0.1', 'Registered P19 - BOND  7 750ML , With A Total Quantity Of : 3', '2022-05-03 23:25:09'),
(1589, 'STF-9418', '127.0.0.1', 'Registered P20 - CAPTAIN MORGAN  250ML, With A Total Quantity Of : 9', '2022-05-03 23:25:09'),
(1590, 'STF-9418', '127.0.0.1', 'Registered P21 - CAPTAIN MORGAN 750ML, With A Total Quantity Of : 2', '2022-05-03 23:25:09'),
(1591, 'STF-9418', '127.0.0.1', 'Registered P22 - FAXE, With A Total Quantity Of : 4', '2022-05-03 23:25:09'),
(1592, 'STF-9418', '127.0.0.1', 'Registered P23 - G.K, With A Total Quantity Of : 18', '2022-05-03 23:25:09'),
(1593, 'STF-9418', '127.0.0.1', 'Registered P24 - GILBEYS  250ML , With A Total Quantity Of : 8', '2022-05-03 23:25:09'),
(1594, 'STF-9418', '127.0.0.1', 'Registered P25 - GILBEYS  375ML, With A Total Quantity Of : 6', '2022-05-03 23:25:09'),
(1595, 'STF-9418', '127.0.0.1', 'Registered P26 - GILBEYS   750ML, With A Total Quantity Of : 3', '2022-05-03 23:25:09'),
(1596, 'STF-9418', '127.0.0.1', 'Registered P27 - GUARANA, With A Total Quantity Of : 21', '2022-05-03 23:25:09'),
(1597, 'STF-9418', '127.0.0.1', 'Registered P28 - HUNTERS 250 ML, With A Total Quantity Of : 7', '2022-05-03 23:25:09'),
(1598, 'STF-9418', '127.0.0.1', 'Registered P29 - HUNTERS 350ML, With A Total Quantity Of : 4', '2022-05-03 23:25:09'),
(1599, 'STF-9418', '127.0.0.1', 'Registered P30 - HUNTERS 750ML, With A Total Quantity Of : 2', '2022-05-03 23:25:09'),
(1600, 'STF-9418', '127.0.0.1', 'Registered P31 - J/WALKER (B) 250ML, With A Total Quantity Of : 0', '2022-05-03 23:25:09'),
(1601, 'STF-9418', '127.0.0.1', 'Registered P32 - J/WALKER (R) 250ML, With A Total Quantity Of : 2', '2022-05-03 23:25:09'),
(1602, 'STF-9418', '127.0.0.1', 'Registered P33 - J/WALKER (B) 375ML, With A Total Quantity Of : 4', '2022-05-03 23:25:09'),
(1603, 'STF-9418', '127.0.0.1', 'Registered P34 - J/WALKER(B)750ML, With A Total Quantity Of : 2', '2022-05-03 23:25:10'),
(1604, 'STF-9418', '127.0.0.1', 'Registered P35 - J/WALKER(RED)375ML, With A Total Quantity Of : 2', '2022-05-03 23:25:10'),
(1605, 'STF-9418', '127.0.0.1', 'Registered P36 - J/WALKER(B)1L, With A Total Quantity Of : 1', '2022-05-03 23:25:10'),
(1606, 'STF-9418', '127.0.0.1', 'Registered P37 - J/WALKER(R)1L, With A Total Quantity Of : 1', '2022-05-03 23:25:10'),
(1607, 'STF-9418', '127.0.0.1', 'Registered P38 - J/WALKER(RED)750ML, With A Total Quantity Of : 3', '2022-05-03 23:25:10'),
(1608, 'STF-9418', '127.0.0.1', 'Registered P39 - JACK DANIELS 350ML, With A Total Quantity Of : 3', '2022-05-03 23:25:10'),
(1609, 'STF-9418', '127.0.0.1', 'Registered P40 - JACK DANIELS 700ML, With A Total Quantity Of : 2', '2022-05-03 23:25:10'),
(1610, 'STF-9418', '127.0.0.1', 'Registered P41 - JACK DANIELS 1LTR, With A Total Quantity Of : 0', '2022-05-03 23:25:10'),
(1611, 'STF-9418', '127.0.0.1', 'Registered P42 - JAMESON 350ML, With A Total Quantity Of : 4', '2022-05-03 23:25:10'),
(1612, 'STF-9418', '127.0.0.1', 'Registered P43 - JAMESON 750 ML, With A Total Quantity Of : 1', '2022-05-03 23:25:10'),
(1613, 'STF-9418', '127.0.0.1', 'Registered P44 - JB   375ML, With A Total Quantity Of : 3', '2022-05-03 23:25:10'),
(1614, 'STF-9418', '127.0.0.1', 'Registered P45 - JB   750ML, With A Total Quantity Of : 1', '2022-05-03 23:25:10'),
(1615, 'STF-9418', '127.0.0.1', 'Registered P46 - JB    1L, With A Total Quantity Of : 2', '2022-05-03 23:25:10'),
(1616, 'STF-9418', '127.0.0.1', 'Registered P47 - K.C  250ML, With A Total Quantity Of : 3', '2022-05-03 23:25:10'),
(1617, 'STF-9418', '127.0.0.1', 'Registered P48 - K.C   375ML, With A Total Quantity Of : 6', '2022-05-03 23:25:10'),
(1618, 'STF-9418', '127.0.0.1', 'Registered P49 - K.C   750ML, With A Total Quantity Of : 1', '2022-05-03 23:25:10'),
(1619, 'STF-9418', '127.0.0.1', 'Registered P50 - K/EXRTRA 750ML, With A Total Quantity Of : 2', '2022-05-03 23:25:10'),
(1620, 'STF-9418', '127.0.0.1', 'Registered P51 - K/EXTRA250ML, With A Total Quantity Of : 6', '2022-05-03 23:25:10'),
(1621, 'STF-9418', '127.0.0.1', 'Registered P52 - LEMONADE, With A Total Quantity Of : 24', '2022-05-03 23:25:10'),
(1622, 'STF-9418', '127.0.0.1', 'Registered P53 - PENASOL  (R), With A Total Quantity Of : 4', '2022-05-03 23:25:10'),
(1623, 'STF-9418', '127.0.0.1', 'Registered P54 - PENASOL  (W), With A Total Quantity Of : 4', '2022-05-03 23:25:10'),
(1624, 'STF-9418', '127.0.0.1', 'Registered P55 - PLAY, With A Total Quantity Of : 13', '2022-05-03 23:25:10'),
(1625, 'STF-9418', '127.0.0.1', 'Registered P56 - RICHOT  250ML, With A Total Quantity Of : 2', '2022-05-03 23:25:10'),
(1626, 'STF-9418', '127.0.0.1', 'Registered P57 - RICHOT 350ML, With A Total Quantity Of : 4', '2022-05-03 23:25:10'),
(1627, 'STF-9418', '127.0.0.1', 'Registered P58 - RICHOT  750ML, With A Total Quantity Of : 2', '2022-05-03 23:25:10'),
(1628, 'STF-9418', '127.0.0.1', 'Registered P59 - SMIRNOFF  VODKA 375ML, With A Total Quantity Of : 4', '2022-05-03 23:25:10'),
(1629, 'STF-9418', '127.0.0.1', 'Registered P60 - SMIRNOFF  VODKA  750ML, With A Total Quantity Of : 1', '2022-05-03 23:25:10'),
(1630, 'STF-9418', '127.0.0.1', 'Registered P61 - SMIRNOFF  VODKA    250ML, With A Total Quantity Of : 5', '2022-05-03 23:25:10'),
(1631, 'STF-9418', '127.0.0.1', 'Registered P62 - SNAPP, With A Total Quantity Of : 15', '2022-05-03 23:25:10'),
(1632, 'STF-9418', '127.0.0.1', 'Registered P63 - SODA 1/2LTR, With A Total Quantity Of : 20', '2022-05-03 23:25:10'),
(1633, 'STF-9418', '127.0.0.1', 'Registered P64 - SOUTHERN COMFORT  750 ML, With A Total Quantity Of : 0', '2022-05-03 23:25:10'),
(1634, 'STF-9418', '127.0.0.1', 'Registered P65 - SOUTHERN COMFORT 1L, With A Total Quantity Of : 0', '2022-05-03 23:25:10'),
(1635, 'STF-9418', '127.0.0.1', 'Registered P66 - T/CIDER                                , With A Total Quantity Of : 19', '2022-05-03 23:25:11'),
(1636, 'STF-9418', '127.0.0.1', 'Registered P67 - T/LITE, With A Total Quantity Of : 7', '2022-05-03 23:25:11'),
(1637, 'STF-9418', '127.0.0.1', 'Registered P68 - TRACE, With A Total Quantity Of : 0', '2022-05-03 23:25:11'),
(1638, 'STF-9418', '127.0.0.1', 'Registered P69 - TUSKER, With A Total Quantity Of : 12', '2022-05-03 23:25:11'),
(1639, 'STF-9418', '127.0.0.1', 'Registered P70 - V&A   250ML, With A Total Quantity Of : 6', '2022-05-03 23:25:11'),
(1640, 'STF-9418', '127.0.0.1', 'Registered P71 - V&A    750ML, With A Total Quantity Of : 5', '2022-05-03 23:25:11'),
(1641, 'STF-9418', '127.0.0.1', 'Registered P72 - VAT  69  750ML, With A Total Quantity Of : 3', '2022-05-03 23:25:11'),
(1642, 'STF-9418', '127.0.0.1', 'Registered P73 - VAT 69  375ML, With A Total Quantity Of : 2', '2022-05-03 23:25:11'),
(1643, 'STF-9418', '127.0.0.1', 'Registered P74 - VICEROY 250 ML, With A Total Quantity Of : 3', '2022-05-03 23:25:11'),
(1644, 'STF-9418', '127.0.0.1', 'Registered P75 - VICEROY 375ML, With A Total Quantity Of : 5', '2022-05-03 23:25:11'),
(1645, 'STF-9418', '127.0.0.1', 'Registered P76 - VICEROY 750ML, With A Total Quantity Of : 3', '2022-05-03 23:25:11'),
(1646, 'STF-9418', '127.0.0.1', 'Registered P77 - W/CAP, With A Total Quantity Of : 15', '2022-05-03 23:25:11'),
(1647, 'STF-9418', '127.0.0.1', 'Registered P78 - WATER 0.5 LTR, With A Total Quantity Of : 11', '2022-05-03 23:25:11'),
(1648, 'STF-9418', '127.0.0.1', 'Registered P79 - WATER 1LTR, With A Total Quantity Of : 11', '2022-05-03 23:25:11'),
(1649, 'STF-9418', '127.0.0.1', 'Registered P80 - WILLIAM LAWSON  750 ML, With A Total Quantity Of : 3', '2022-05-03 23:25:12'),
(1650, 'STF-9418', '127.0.0.1', 'Registered P81 - WILLIAM LAWSON 350 ML, With A Total Quantity Of : 3', '2022-05-03 23:25:12'),
(1651, 'STF-9418', '127.0.0.1', 'Registered P82 - WILLIAM LAWSON CAN, With A Total Quantity Of : 4', '2022-05-03 23:25:12'),
(1652, 'STF-9418', '127.0.0.1', 'Registered P83 - KINGFISHER, With A Total Quantity Of : 6', '2022-05-03 23:25:12'),
(1653, 'STF-9418', '127.0.0.1', 'Registered P84 - MARTINI ROSSO/BIANCO, With A Total Quantity Of : 4', '2022-05-03 23:25:12'),
(1654, 'STF-9418', '127.0.0.1', 'Registered P85 - CASSA BUENA(W), With A Total Quantity Of : 0', '2022-05-03 23:25:12'),
(1655, 'STF-9418', '127.0.0.1', 'Registered P86 - CASSA BUENA(R), With A Total Quantity Of : 1', '2022-05-03 23:25:12'),
(1656, 'STF-9418', '127.0.0.1', 'Registered P87 - CELLAR CASK(R & W), With A Total Quantity Of : 6', '2022-05-03 23:25:12'),
(1657, 'STF-9418', '127.0.0.1', 'Registered P88 - FOUR COUSINS(R), With A Total Quantity Of : 2', '2022-05-03 23:25:12'),
(1658, 'STF-9418', '127.0.0.1', 'Registered P89 - 4TH STREET (W), With A Total Quantity Of : 2', '2022-05-03 23:25:12'),
(1659, 'STF-9418', '127.0.0.1', 'Registered P90 - 4TH STREET(R), With A Total Quantity Of : 2', '2022-05-03 23:25:12'),
(1660, 'STF-9418', '127.0.0.1', 'Registered P91 - CAPRICE (W/R), With A Total Quantity Of : 1', '2022-05-03 23:25:12'),
(1661, 'STF-9418', '127.0.0.1', 'Registered P92 - AMARULA 300ML, With A Total Quantity Of : 3', '2022-05-03 23:25:12'),
(1662, 'STF-9418', '127.0.0.1', 'Registered P93 - AMARULAS 750ML, With A Total Quantity Of : 3', '2022-05-03 23:25:12'),
(1663, 'STF-9418', '127.0.0.1', 'Registered P94 - DROSTDY RED, With A Total Quantity Of : 4', '2022-05-03 23:25:12'),
(1664, 'STF-9418', '127.0.0.1', 'Registered P95 - DROSTDY(W), With A Total Quantity Of : 2', '2022-05-03 23:25:13'),
(1665, 'STF-9418', '127.0.0.1', 'Registered P96 - ROBERTSON 1.5ML( W), With A Total Quantity Of : 2', '2022-05-03 23:25:13'),
(1666, 'STF-9418', '127.0.0.1', 'Registered P97 - ROBERTSON 1.5ML( R), With A Total Quantity Of : 1', '2022-05-03 23:25:13'),
(1667, 'STF-9418', '127.0.0.1', 'Registered P98 - ROBERTSON750ML W, With A Total Quantity Of : 1', '2022-05-03 23:25:13'),
(1668, 'STF-9418', '127.0.0.1', 'Registered P99 - ROBERTSON750ML R, With A Total Quantity Of : 0', '2022-05-03 23:25:13'),
(1669, 'STF-9418', '127.0.0.1', 'Registered P100 - GORDON 750ML, With A Total Quantity Of : 4', '2022-05-03 23:25:13'),
(1670, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:25:13'),
(1671, 'STF-9418', '127.0.0.1', 'Registered P1 -  KIBAO 250 ML, With A Total Quantity Of : 5', '2022-05-03 23:29:33'),
(1672, 'STF-9418', '127.0.0.1', 'Registered P2 - KIBAO 350 ML, With A Total Quantity Of : 4', '2022-05-03 23:29:33'),
(1673, 'STF-9418', '127.0.0.1', 'Registered P3 -  KIBAO 750 ML, With A Total Quantity Of : 2', '2022-05-03 23:29:33'),
(1674, 'STF-9418', '127.0.0.1', 'Registered P4 -  SODA 1.5LTRS, With A Total Quantity Of : 13', '2022-05-03 23:29:33'),
(1675, 'STF-9418', '127.0.0.1', 'Registered P5 - B WHITE  1LTR, With A Total Quantity Of : 1', '2022-05-03 23:29:33'),
(1676, 'STF-9418', '127.0.0.1', 'Registered P6 - B WHITE 750ML, With A Total Quantity Of : 2', '2022-05-03 23:29:33'),
(1677, 'STF-9418', '127.0.0.1', 'Registered P7 - B WHITE 375ML, With A Total Quantity Of : 3', '2022-05-03 23:29:33'),
(1678, 'STF-9418', '127.0.0.1', 'Registered P8 - B/WHISKY 250ML, With A Total Quantity Of : 2', '2022-05-03 23:29:33'),
(1679, 'STF-9418', '127.0.0.1', 'Registered P9 - B/WHISKY 750ML, With A Total Quantity Of : 1', '2022-05-03 23:29:33'),
(1680, 'STF-9418', '127.0.0.1', 'Registered P10 - BALLEYS  375ML, With A Total Quantity Of : 4', '2022-05-03 23:29:33'),
(1681, 'STF-9418', '127.0.0.1', 'Registered P11 - BALLEYS   750ML, With A Total Quantity Of : 1', '2022-05-03 23:29:33'),
(1682, 'STF-9418', '127.0.0.1', 'Registered P12 - BALLEYS Delight 750ML, With A Total Quantity Of : 2', '2022-05-03 23:29:33'),
(1683, 'STF-9418', '127.0.0.1', 'Registered P13 - BALOZI, With A Total Quantity Of : 8', '2022-05-03 23:29:33'),
(1684, 'STF-9418', '127.0.0.1', 'Registered P14 - BEST CREAM 250ML , With A Total Quantity Of : 2', '2022-05-03 23:29:33'),
(1685, 'STF-9418', '127.0.0.1', 'Registered P15 - BEST  CREAM  750ML, With A Total Quantity Of : 3', '2022-05-03 23:29:33'),
(1686, 'STF-9418', '127.0.0.1', 'Registered P16 - BEST GIN 250ML, With A Total Quantity Of : 4', '2022-05-03 23:29:33'),
(1687, 'STF-9418', '127.0.0.1', 'Registered P17 - BEST GIN 750ML, With A Total Quantity Of : 2', '2022-05-03 23:29:33'),
(1688, 'STF-9418', '127.0.0.1', 'Registered P18 - BOND  7  250ML, With A Total Quantity Of : 4', '2022-05-03 23:29:33'),
(1689, 'STF-9418', '127.0.0.1', 'Registered P19 - BOND  7 750ML , With A Total Quantity Of : 3', '2022-05-03 23:29:33'),
(1690, 'STF-9418', '127.0.0.1', 'Registered P20 - CAPTAIN MORGAN  250ML, With A Total Quantity Of : 9', '2022-05-03 23:29:33'),
(1691, 'STF-9418', '127.0.0.1', 'Registered P21 - CAPTAIN MORGAN 750ML, With A Total Quantity Of : 2', '2022-05-03 23:29:33'),
(1692, 'STF-9418', '127.0.0.1', 'Registered P22 - FAXE, With A Total Quantity Of : 4', '2022-05-03 23:29:33'),
(1693, 'STF-9418', '127.0.0.1', 'Registered P23 - G.K, With A Total Quantity Of : 18', '2022-05-03 23:29:33'),
(1694, 'STF-9418', '127.0.0.1', 'Registered P24 - GILBEYS  250ML , With A Total Quantity Of : 8', '2022-05-03 23:29:34'),
(1695, 'STF-9418', '127.0.0.1', 'Registered P25 - GILBEYS  375ML, With A Total Quantity Of : 6', '2022-05-03 23:29:34'),
(1696, 'STF-9418', '127.0.0.1', 'Registered P26 - GILBEYS   750ML, With A Total Quantity Of : 3', '2022-05-03 23:29:34'),
(1697, 'STF-9418', '127.0.0.1', 'Registered P27 - GUARANA, With A Total Quantity Of : 21', '2022-05-03 23:29:34'),
(1698, 'STF-9418', '127.0.0.1', 'Registered P28 - HUNTERS 250 ML, With A Total Quantity Of : 7', '2022-05-03 23:29:34'),
(1699, 'STF-9418', '127.0.0.1', 'Registered P29 - HUNTERS 350ML, With A Total Quantity Of : 4', '2022-05-03 23:29:34'),
(1700, 'STF-9418', '127.0.0.1', 'Registered P30 - HUNTERS 750ML, With A Total Quantity Of : 2', '2022-05-03 23:29:34'),
(1701, 'STF-9418', '127.0.0.1', 'Registered P31 - J/WALKER (B) 250ML, With A Total Quantity Of : 0', '2022-05-03 23:29:34'),
(1702, 'STF-9418', '127.0.0.1', 'Registered P32 - J/WALKER (R) 250ML, With A Total Quantity Of : 2', '2022-05-03 23:29:34'),
(1703, 'STF-9418', '127.0.0.1', 'Registered P33 - J/WALKER (B) 375ML, With A Total Quantity Of : 4', '2022-05-03 23:29:34'),
(1704, 'STF-9418', '127.0.0.1', 'Registered P34 - J/WALKER(B)750ML, With A Total Quantity Of : 2', '2022-05-03 23:29:34'),
(1705, 'STF-9418', '127.0.0.1', 'Registered P35 - J/WALKER(RED)375ML, With A Total Quantity Of : 2', '2022-05-03 23:29:34'),
(1706, 'STF-9418', '127.0.0.1', 'Registered P36 - J/WALKER(B)1L, With A Total Quantity Of : 1', '2022-05-03 23:29:34'),
(1707, 'STF-9418', '127.0.0.1', 'Registered P37 - J/WALKER(R)1L, With A Total Quantity Of : 1', '2022-05-03 23:29:34'),
(1708, 'STF-9418', '127.0.0.1', 'Registered P38 - J/WALKER(RED)750ML, With A Total Quantity Of : 3', '2022-05-03 23:29:34'),
(1709, 'STF-9418', '127.0.0.1', 'Registered P39 - JACK DANIELS 350ML, With A Total Quantity Of : 3', '2022-05-03 23:29:34'),
(1710, 'STF-9418', '127.0.0.1', 'Registered P40 - JACK DANIELS 700ML, With A Total Quantity Of : 2', '2022-05-03 23:29:34'),
(1711, 'STF-9418', '127.0.0.1', 'Registered P41 - JACK DANIELS 1LTR, With A Total Quantity Of : 0', '2022-05-03 23:29:34'),
(1712, 'STF-9418', '127.0.0.1', 'Registered P42 - JAMESON 350ML, With A Total Quantity Of : 4', '2022-05-03 23:29:34'),
(1713, 'STF-9418', '127.0.0.1', 'Registered P43 - JAMESON 750 ML, With A Total Quantity Of : 1', '2022-05-03 23:29:34'),
(1714, 'STF-9418', '127.0.0.1', 'Registered P44 - JB   375ML, With A Total Quantity Of : 3', '2022-05-03 23:29:34'),
(1715, 'STF-9418', '127.0.0.1', 'Registered P45 - JB   750ML, With A Total Quantity Of : 1', '2022-05-03 23:29:34'),
(1716, 'STF-9418', '127.0.0.1', 'Registered P46 - JB    1L, With A Total Quantity Of : 2', '2022-05-03 23:29:34'),
(1717, 'STF-9418', '127.0.0.1', 'Registered P47 - K.C  250ML, With A Total Quantity Of : 3', '2022-05-03 23:29:34'),
(1718, 'STF-9418', '127.0.0.1', 'Registered P48 - K.C   375ML, With A Total Quantity Of : 6', '2022-05-03 23:29:34'),
(1719, 'STF-9418', '127.0.0.1', 'Registered P49 - K.C   750ML, With A Total Quantity Of : 1', '2022-05-03 23:29:34'),
(1720, 'STF-9418', '127.0.0.1', 'Registered P50 - K/EXRTRA 750ML, With A Total Quantity Of : 2', '2022-05-03 23:29:34'),
(1721, 'STF-9418', '127.0.0.1', 'Registered P51 - K/EXTRA250ML, With A Total Quantity Of : 6', '2022-05-03 23:29:34'),
(1722, 'STF-9418', '127.0.0.1', 'Registered P52 - LEMONADE, With A Total Quantity Of : 24', '2022-05-03 23:29:34'),
(1723, 'STF-9418', '127.0.0.1', 'Registered P53 - PENASOL  (R), With A Total Quantity Of : 4', '2022-05-03 23:29:34'),
(1724, 'STF-9418', '127.0.0.1', 'Registered P54 - PENASOL  (W), With A Total Quantity Of : 4', '2022-05-03 23:29:35'),
(1725, 'STF-9418', '127.0.0.1', 'Registered P55 - PLAY, With A Total Quantity Of : 13', '2022-05-03 23:29:35'),
(1726, 'STF-9418', '127.0.0.1', 'Registered P56 - RICHOT  250ML, With A Total Quantity Of : 2', '2022-05-03 23:29:35'),
(1727, 'STF-9418', '127.0.0.1', 'Registered P57 - RICHOT 350ML, With A Total Quantity Of : 4', '2022-05-03 23:29:35'),
(1728, 'STF-9418', '127.0.0.1', 'Registered P58 - RICHOT  750ML, With A Total Quantity Of : 2', '2022-05-03 23:29:35'),
(1729, 'STF-9418', '127.0.0.1', 'Registered P59 - SMIRNOFF  VODKA 375ML, With A Total Quantity Of : 4', '2022-05-03 23:29:35'),
(1730, 'STF-9418', '127.0.0.1', 'Registered P60 - SMIRNOFF  VODKA  750ML, With A Total Quantity Of : 1', '2022-05-03 23:29:35'),
(1731, 'STF-9418', '127.0.0.1', 'Registered P61 - SMIRNOFF  VODKA    250ML, With A Total Quantity Of : 5', '2022-05-03 23:29:35'),
(1732, 'STF-9418', '127.0.0.1', 'Registered P62 - SNAPP, With A Total Quantity Of : 15', '2022-05-03 23:29:35'),
(1733, 'STF-9418', '127.0.0.1', 'Registered P63 - SODA 1/2LTR, With A Total Quantity Of : 20', '2022-05-03 23:29:35'),
(1734, 'STF-9418', '127.0.0.1', 'Registered P64 - SOUTHERN COMFORT  750 ML, With A Total Quantity Of : 0', '2022-05-03 23:29:35'),
(1735, 'STF-9418', '127.0.0.1', 'Registered P65 - SOUTHERN COMFORT 1L, With A Total Quantity Of : 0', '2022-05-03 23:29:35'),
(1736, 'STF-9418', '127.0.0.1', 'Registered P66 - T/CIDER                                , With A Total Quantity Of : 19', '2022-05-03 23:29:35'),
(1737, 'STF-9418', '127.0.0.1', 'Registered P67 - T/LITE, With A Total Quantity Of : 7', '2022-05-03 23:29:35'),
(1738, 'STF-9418', '127.0.0.1', 'Registered P68 - TRACE, With A Total Quantity Of : 0', '2022-05-03 23:29:35'),
(1739, 'STF-9418', '127.0.0.1', 'Registered P69 - TUSKER, With A Total Quantity Of : 12', '2022-05-03 23:29:35'),
(1740, 'STF-9418', '127.0.0.1', 'Registered P70 - V&A   250ML, With A Total Quantity Of : 6', '2022-05-03 23:29:35'),
(1741, 'STF-9418', '127.0.0.1', 'Registered P71 - V&A    750ML, With A Total Quantity Of : 5', '2022-05-03 23:29:35'),
(1742, 'STF-9418', '127.0.0.1', 'Registered P72 - VAT  69  750ML, With A Total Quantity Of : 3', '2022-05-03 23:29:35'),
(1743, 'STF-9418', '127.0.0.1', 'Registered P73 - VAT 69  375ML, With A Total Quantity Of : 2', '2022-05-03 23:29:35'),
(1744, 'STF-9418', '127.0.0.1', 'Registered P74 - VICEROY 250 ML, With A Total Quantity Of : 3', '2022-05-03 23:29:35'),
(1745, 'STF-9418', '127.0.0.1', 'Registered P75 - VICEROY 375ML, With A Total Quantity Of : 5', '2022-05-03 23:29:35'),
(1746, 'STF-9418', '127.0.0.1', 'Registered P76 - VICEROY 750ML, With A Total Quantity Of : 3', '2022-05-03 23:29:35'),
(1747, 'STF-9418', '127.0.0.1', 'Registered P77 - W/CAP, With A Total Quantity Of : 15', '2022-05-03 23:29:35'),
(1748, 'STF-9418', '127.0.0.1', 'Registered P78 - WATER 0.5 LTR, With A Total Quantity Of : 11', '2022-05-03 23:29:35'),
(1749, 'STF-9418', '127.0.0.1', 'Registered P79 - WATER 1LTR, With A Total Quantity Of : 11', '2022-05-03 23:29:35'),
(1750, 'STF-9418', '127.0.0.1', 'Registered P80 - WILLIAM LAWSON  750 ML, With A Total Quantity Of : 3', '2022-05-03 23:29:36'),
(1751, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:29:36'),
(1752, 'STF-9418', '127.0.0.1', 'Registered P1 -  KIBAO 250 ML, With A Total Quantity Of : 5', '2022-05-03 23:32:37'),
(1753, 'STF-9418', '127.0.0.1', 'Registered P2 - KIBAO 350 ML, With A Total Quantity Of : 4', '2022-05-03 23:32:37'),
(1754, 'STF-9418', '127.0.0.1', 'Registered P3 -  KIBAO 750 ML, With A Total Quantity Of : 2', '2022-05-03 23:32:37'),
(1755, 'STF-9418', '127.0.0.1', 'Registered P4 -  SODA 1.5LTRS, With A Total Quantity Of : 13', '2022-05-03 23:32:37'),
(1756, 'STF-9418', '127.0.0.1', 'Registered P5 - B WHITE  1LTR, With A Total Quantity Of : 1', '2022-05-03 23:32:37'),
(1757, 'STF-9418', '127.0.0.1', 'Registered P6 - B WHITE 750ML, With A Total Quantity Of : 2', '2022-05-03 23:32:37'),
(1758, 'STF-9418', '127.0.0.1', 'Registered P7 - B WHITE 375ML, With A Total Quantity Of : 3', '2022-05-03 23:32:37'),
(1759, 'STF-9418', '127.0.0.1', 'Registered P8 - B/WHISKY 250ML, With A Total Quantity Of : 2', '2022-05-03 23:32:37'),
(1760, 'STF-9418', '127.0.0.1', 'Registered P9 - B/WHISKY 750ML, With A Total Quantity Of : 1', '2022-05-03 23:32:37'),
(1761, 'STF-9418', '127.0.0.1', 'Registered P10 - BALLEYS  375ML, With A Total Quantity Of : 4', '2022-05-03 23:32:37'),
(1762, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1763, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1764, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1765, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1766, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1767, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1768, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1769, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1770, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1771, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1772, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1773, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1774, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1775, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1776, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1777, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1778, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1779, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1780, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1781, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1782, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1783, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1784, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1785, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1786, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1787, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1788, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1789, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1790, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1791, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1792, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1793, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1794, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1795, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1796, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1797, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1798, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1799, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1800, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1801, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1802, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1803, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1804, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1805, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:37'),
(1806, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1807, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1808, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1809, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1810, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1811, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1812, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1813, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1814, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1815, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1816, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1817, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1818, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1819, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1820, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1821, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1822, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1823, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1824, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1825, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1826, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1827, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1828, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1829, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1830, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1831, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1832, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:32:38'),
(1833, 'STF-9418', '127.0.0.1', 'Registered P11 - BALLEYS   750ML, With A Total Quantity Of : 1', '2022-05-03 23:42:16'),
(1834, 'STF-9418', '127.0.0.1', 'Registered P12 - BALLEYS   Delight  750ML, With A Total Quantity Of : 2', '2022-05-03 23:42:16'),
(1835, 'STF-9418', '127.0.0.1', 'Registered P13 - BALOZI, With A Total Quantity Of : 8', '2022-05-03 23:42:16'),
(1836, 'STF-9418', '127.0.0.1', 'Registered P14 - BEST CREAM  250ML , With A Total Quantity Of : 2', '2022-05-03 23:42:16'),
(1837, 'STF-9418', '127.0.0.1', 'Registered P15 - BEST CREAM  750ML, With A Total Quantity Of : 3', '2022-05-03 23:42:16'),
(1838, 'STF-9418', '127.0.0.1', 'Registered P16 - BEST GIN 250ML, With A Total Quantity Of : 4', '2022-05-03 23:42:16'),
(1839, 'STF-9418', '127.0.0.1', 'Registered P17 - BEST GIN 750ML, With A Total Quantity Of : 2', '2022-05-03 23:42:16'),
(1840, 'STF-9418', '127.0.0.1', 'Registered P18 - BOND 7 250ML, With A Total Quantity Of : 4', '2022-05-03 23:42:16'),
(1841, 'STF-9418', '127.0.0.1', 'Registered P19 - BOND 7 750ML , With A Total Quantity Of : 3', '2022-05-03 23:42:16'),
(1842, 'STF-9418', '127.0.0.1', 'Registered P20 - CAPTAIN MORGAN 250ML, With A Total Quantity Of : 9', '2022-05-03 23:42:16'),
(1843, 'STF-9418', '127.0.0.1', 'Registered P21 - CAPTAIN MORGAN  750ML, With A Total Quantity Of : 2', '2022-05-03 23:42:16'),
(1844, 'STF-9418', '127.0.0.1', 'Registered P22 - FAXE, With A Total Quantity Of : 4', '2022-05-03 23:42:16'),
(1845, 'STF-9418', '127.0.0.1', 'Registered P23 - G.K, With A Total Quantity Of : 18', '2022-05-03 23:42:16'),
(1846, 'STF-9418', '127.0.0.1', 'Registered P24 - GILBEYS   250ML , With A Total Quantity Of : 8', '2022-05-03 23:42:16'),
(1847, 'STF-9418', '127.0.0.1', 'Registered P25 - GILBEYS  375ML, With A Total Quantity Of : 6', '2022-05-03 23:42:16'),
(1848, 'STF-9418', '127.0.0.1', 'Registered P26 - GILBEYS  750ML, With A Total Quantity Of : 3', '2022-05-03 23:42:16'),
(1849, 'STF-9418', '127.0.0.1', 'Registered P27 - GUARANA, With A Total Quantity Of : 21', '2022-05-03 23:42:16'),
(1850, 'STF-9418', '127.0.0.1', 'Registered P28 - HUNTERS 250 ML, With A Total Quantity Of : 7', '2022-05-03 23:42:17'),
(1851, 'STF-9418', '127.0.0.1', 'Registered P29 - HUNTERS 350ML, With A Total Quantity Of : 4', '2022-05-03 23:42:17'),
(1852, 'STF-9418', '127.0.0.1', 'Registered P30 - HUNTERS 750ML, With A Total Quantity Of : 2', '2022-05-03 23:42:17'),
(1853, 'STF-9418', '127.0.0.1', 'Registered P31 - J/WALKER (B) 250ML, With A Total Quantity Of : 0', '2022-05-03 23:42:17'),
(1854, 'STF-9418', '127.0.0.1', 'Registered P32 - J/WALKER (R) 250ML, With A Total Quantity Of : 2', '2022-05-03 23:42:17'),
(1855, 'STF-9418', '127.0.0.1', 'Registered P33 - J/WALKER (B) 375ML, With A Total Quantity Of : 4', '2022-05-03 23:42:17'),
(1856, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1857, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1858, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1859, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1860, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1861, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1862, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1863, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1864, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1865, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1866, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1867, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1868, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1869, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1870, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1871, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1872, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1873, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1874, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1875, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1876, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1877, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1878, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1879, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1880, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1881, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1882, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1883, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1884, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1885, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1886, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1887, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1888, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1889, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1890, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1891, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1892, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1893, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1894, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1895, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:17'),
(1896, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1897, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1898, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1899, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1900, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1901, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1902, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1903, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1904, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1905, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1906, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1907, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1908, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1909, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1910, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1911, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1912, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1913, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:42:18'),
(1914, 'STF-9418', '127.0.0.1', 'Registered P34 - J/WALKER(B)750ML, With A Total Quantity Of : 2', '2022-05-03 23:48:49'),
(1915, 'STF-9418', '127.0.0.1', 'Registered P35 - J/WALKER(RED)375ML, With A Total Quantity Of : 2', '2022-05-03 23:48:49'),
(1916, 'STF-9418', '127.0.0.1', 'Registered P36 - J/WALKER(B)1L, With A Total Quantity Of : 1', '2022-05-03 23:48:49'),
(1917, 'STF-9418', '127.0.0.1', 'Registered P37 - J/WALKER(R)1L, With A Total Quantity Of : 1', '2022-05-03 23:48:49'),
(1918, 'STF-9418', '127.0.0.1', 'Registered P38 - J/WALKER(RED)750ML, With A Total Quantity Of : 3', '2022-05-03 23:48:49'),
(1919, 'STF-9418', '127.0.0.1', 'Registered P39 - JACK DANIELS 350ML, With A Total Quantity Of : 3', '2022-05-03 23:48:49'),
(1920, 'STF-9418', '127.0.0.1', 'Registered P40 - JACK DANIELS 700ML, With A Total Quantity Of : 2', '2022-05-03 23:48:49'),
(1921, 'STF-9418', '127.0.0.1', 'Registered P41 - JACK DANIELS 1LTR, With A Total Quantity Of : 0', '2022-05-03 23:48:49'),
(1922, 'STF-9418', '127.0.0.1', 'Registered P42 - JAMESON 350ML, With A Total Quantity Of : 4', '2022-05-03 23:48:49'),
(1923, 'STF-9418', '127.0.0.1', 'Registered P43 - JAMESON 750 ML, With A Total Quantity Of : 1', '2022-05-03 23:48:49'),
(1924, 'STF-9418', '127.0.0.1', 'Registered P44 - JB   375ML, With A Total Quantity Of : 3', '2022-05-03 23:48:49'),
(1925, 'STF-9418', '127.0.0.1', 'Registered P45 - JB   750ML, With A Total Quantity Of : 1', '2022-05-03 23:48:49'),
(1926, 'STF-9418', '127.0.0.1', 'Registered P46 - JB  1L, With A Total Quantity Of : 2', '2022-05-03 23:48:49'),
(1927, 'STF-9418', '127.0.0.1', 'Registered P47 - K.C  250ML, With A Total Quantity Of : 3', '2022-05-03 23:48:49'),
(1928, 'STF-9418', '127.0.0.1', 'Registered P48 - K.C  375ML, With A Total Quantity Of : 6', '2022-05-03 23:48:50'),
(1929, 'STF-9418', '127.0.0.1', 'Registered P49 - K.C  750ML, With A Total Quantity Of : 1', '2022-05-03 23:48:50'),
(1930, 'STF-9418', '127.0.0.1', 'Registered P50 - K/EXRTRA 750ML, With A Total Quantity Of : 2', '2022-05-03 23:48:50'),
(1931, 'STF-9418', '127.0.0.1', 'Registered P51 - K/EXTRA250ML, With A Total Quantity Of : 6', '2022-05-03 23:48:50'),
(1932, 'STF-9418', '127.0.0.1', 'Registered P52 - LEMONADE, With A Total Quantity Of : 24', '2022-05-03 23:48:50'),
(1933, 'STF-9418', '127.0.0.1', 'Registered P53 - PENASOL  (R), With A Total Quantity Of : 4', '2022-05-03 23:48:50'),
(1934, 'STF-9418', '127.0.0.1', 'Registered P54 - PENASOL  (W), With A Total Quantity Of : 4', '2022-05-03 23:48:50'),
(1935, 'STF-9418', '127.0.0.1', 'Registered P55 - PLAY, With A Total Quantity Of : 13', '2022-05-03 23:48:50'),
(1936, 'STF-9418', '127.0.0.1', 'Registered P56 - RICHOT     250ML, With A Total Quantity Of : 2', '2022-05-03 23:48:50'),
(1937, 'STF-9418', '127.0.0.1', 'Registered P57 - RICHOT  350ML, With A Total Quantity Of : 4', '2022-05-03 23:48:50');
INSERT INTO `system_logs` (`log_id`, `log_user_id`, `log_ip_address`, `log_details`, `log_created_at`) VALUES
(1938, 'STF-9418', '127.0.0.1', 'Registered P58 - RICHOT   750ML, With A Total Quantity Of : 2', '2022-05-03 23:48:50'),
(1939, 'STF-9418', '127.0.0.1', 'Registered P59 - SMIRNOFF  VODKA  375ML, With A Total Quantity Of : 4', '2022-05-03 23:48:50'),
(1940, 'STF-9418', '127.0.0.1', 'Registered P60 - SMIRNOFF  VODKA 750ML, With A Total Quantity Of : 1', '2022-05-03 23:48:50'),
(1941, 'STF-9418', '127.0.0.1', 'Registered P61 - SMIRNOFF  VODKA   250ML, With A Total Quantity Of : 5', '2022-05-03 23:48:50'),
(1942, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1943, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1944, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1945, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1946, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1947, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1948, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1949, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1950, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1951, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1952, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1953, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1954, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1955, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1956, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1957, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1958, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1959, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1960, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1961, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1962, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1963, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1964, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1965, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1966, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1967, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1968, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1969, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1970, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1971, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:48:50'),
(1972, 'STF-9418', '127.0.0.1', 'Registered P62 - SNAPP, With A Total Quantity Of : 15', '2022-05-03 23:57:57'),
(1973, 'STF-9418', '127.0.0.1', 'Registered P63 - SODA 1/2LTR, With A Total Quantity Of : 20', '2022-05-03 23:57:57'),
(1974, 'STF-9418', '127.0.0.1', 'Registered P64 - SOUTHERN COMFORT  750 ML, With A Total Quantity Of : 0', '2022-05-03 23:57:57'),
(1975, 'STF-9418', '127.0.0.1', 'Registered P65 - SOUTHERN COMFORT 1L, With A Total Quantity Of : 0', '2022-05-03 23:57:57'),
(1976, 'STF-9418', '127.0.0.1', 'Registered P66 - T/CIDER                                , With A Total Quantity Of : 19', '2022-05-03 23:57:57'),
(1977, 'STF-9418', '127.0.0.1', 'Registered P67 - T/LITE, With A Total Quantity Of : 7', '2022-05-03 23:57:57'),
(1978, 'STF-9418', '127.0.0.1', 'Registered P68 - TRACE, With A Total Quantity Of : 0', '2022-05-03 23:57:57'),
(1979, 'STF-9418', '127.0.0.1', 'Registered P69 - TUSKER, With A Total Quantity Of : 12', '2022-05-03 23:57:57'),
(1980, 'STF-9418', '127.0.0.1', 'Registered P70 - V&A 250ML, With A Total Quantity Of : 6', '2022-05-03 23:57:57'),
(1981, 'STF-9418', '127.0.0.1', 'Registered P71 - V&A  750ML, With A Total Quantity Of : 5', '2022-05-03 23:57:57'),
(1982, 'STF-9418', '127.0.0.1', 'Registered P72 - VAT  69  750ML, With A Total Quantity Of : 3', '2022-05-03 23:57:57'),
(1983, 'STF-9418', '127.0.0.1', 'Registered P73 - VAT 69  375ML, With A Total Quantity Of : 2', '2022-05-03 23:57:57'),
(1984, 'STF-9418', '127.0.0.1', 'Registered P74 - VICEROY 250 ML, With A Total Quantity Of : 3', '2022-05-03 23:57:57'),
(1985, 'STF-9418', '127.0.0.1', 'Registered P75 - VICEROY 375ML, With A Total Quantity Of : 5', '2022-05-03 23:57:57'),
(1986, 'STF-9418', '127.0.0.1', 'Registered P76 - VICEROY 750ML, With A Total Quantity Of : 3', '2022-05-03 23:57:57'),
(1987, 'STF-9418', '127.0.0.1', 'Registered P77 - W/CAP, With A Total Quantity Of : 15', '2022-05-03 23:57:57'),
(1988, 'STF-9418', '127.0.0.1', 'Registered P78 - WATER 0.5 LTR, With A Total Quantity Of : 11', '2022-05-03 23:57:57'),
(1989, 'STF-9418', '127.0.0.1', 'Registered P79 - WATER 1LTR, With A Total Quantity Of : 11', '2022-05-03 23:57:57'),
(1990, 'STF-9418', '127.0.0.1', 'Registered P80 - WILLIAM LAWSON  750 ML, With A Total Quantity Of : 3', '2022-05-03 23:57:57'),
(1991, 'STF-9418', '127.0.0.1', 'Registered P81 - WILLIAM LAWSON 350 ML, With A Total Quantity Of : 3', '2022-05-03 23:57:57'),
(1992, 'STF-9418', '127.0.0.1', 'Registered P82 - WILLIAM LAWSON CAN, With A Total Quantity Of : 4', '2022-05-03 23:57:57'),
(1993, 'STF-9418', '127.0.0.1', 'Registered P83 - KINGFISHER, With A Total Quantity Of : 6', '2022-05-03 23:57:57'),
(1994, 'STF-9418', '127.0.0.1', 'Registered P84 - MARTINI ROSSO/BIANCO, With A Total Quantity Of : 4', '2022-05-03 23:57:57'),
(1995, 'STF-9418', '127.0.0.1', 'Registered P85 - CASSA BUENA(W), With A Total Quantity Of : 0', '2022-05-03 23:57:57'),
(1996, 'STF-9418', '127.0.0.1', 'Registered P86 - CASSA BUENA(R), With A Total Quantity Of : 1', '2022-05-03 23:57:57'),
(1997, 'STF-9418', '127.0.0.1', 'Registered P87 - CELLAR CASK(R & W), With A Total Quantity Of : 6', '2022-05-03 23:57:57'),
(1998, 'STF-9418', '127.0.0.1', 'Registered P88 - FOUR COUSINS(R), With A Total Quantity Of : 2', '2022-05-03 23:57:57'),
(1999, 'STF-9418', '127.0.0.1', 'Registered P89 - 4TH STREET (W), With A Total Quantity Of : 2', '2022-05-03 23:57:57'),
(2000, 'STF-9418', '127.0.0.1', 'Registered P90 - 4TH STREET(R), With A Total Quantity Of : 2', '2022-05-03 23:57:58'),
(2001, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2002, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2003, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2004, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2005, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2006, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2007, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2008, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2009, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2010, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2011, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2012, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2013, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2014, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2015, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2016, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2017, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2018, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2019, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2020, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2021, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2022, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2023, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2024, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2025, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2026, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2027, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2028, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2029, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-03 23:57:58'),
(2030, 'STF-9418', '127.0.0.1', 'Registered P74 - VICEROY 250 ML, With A Total Quantity Of : 3', '2022-05-04 00:03:10'),
(2031, 'STF-9418', '127.0.0.1', 'Registered P72 - VAT  69  750ML, With A Total Quantity Of : 3', '2022-05-04 00:03:10'),
(2032, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:03:10'),
(2033, 'STF-9418', '127.0.0.1', 'Registered P91 - CAPRICE (W/R), With A Total Quantity Of : 1', '2022-05-04 00:07:34'),
(2034, 'STF-9418', '127.0.0.1', 'Registered P92 - AMARULA 300ML, With A Total Quantity Of : 3', '2022-05-04 00:07:34'),
(2035, 'STF-9418', '127.0.0.1', 'Registered P93 - AMARULAS 750ML, With A Total Quantity Of : 3', '2022-05-04 00:07:34'),
(2036, 'STF-9418', '127.0.0.1', 'Registered P94 - DROSTDY RED, With A Total Quantity Of : 4', '2022-05-04 00:07:34'),
(2037, 'STF-9418', '127.0.0.1', 'Registered P95 - DROSTDY(W), With A Total Quantity Of : 2', '2022-05-04 00:07:34'),
(2038, 'STF-9418', '127.0.0.1', 'Registered P96 - ROBERTSON 1.5ML( W), With A Total Quantity Of : 2', '2022-05-04 00:07:34'),
(2039, 'STF-9418', '127.0.0.1', 'Registered P97 - ROBERTSON 1.5ML( R), With A Total Quantity Of : 1', '2022-05-04 00:07:34'),
(2040, 'STF-9418', '127.0.0.1', 'Registered P98 - ROBERTSON750ML W, With A Total Quantity Of : 1', '2022-05-04 00:07:34'),
(2041, 'STF-9418', '127.0.0.1', 'Registered P99 - ROBERTSON750ML R, With A Total Quantity Of : 0', '2022-05-04 00:07:34'),
(2042, 'STF-9418', '127.0.0.1', 'Registered P100 - GORDON 750ML, With A Total Quantity Of : 4', '2022-05-04 00:07:34'),
(2043, 'STF-9418', '127.0.0.1', 'Registered P101 - TANQUERY 10, With A Total Quantity Of : 1', '2022-05-04 00:07:34'),
(2044, 'STF-9418', '127.0.0.1', 'Registered P102 - SINGLETON 12yrs, With A Total Quantity Of : 2', '2022-05-04 00:07:34'),
(2045, 'STF-9418', '127.0.0.1', 'Registered P103 - SINGLETON 15yrs, With A Total Quantity Of : 1', '2022-05-04 00:07:34'),
(2046, 'STF-9418', '127.0.0.1', 'Registered P104 - HENNESY, With A Total Quantity Of : 1', '2022-05-04 00:07:34'),
(2047, 'STF-9418', '127.0.0.1', 'Registered P105 - J.W DOUBLE BLACK, With A Total Quantity Of : 1', '2022-05-04 00:07:34'),
(2048, 'STF-9418', '127.0.0.1', 'Registered P106 - GLENFIDICH, With A Total Quantity Of : 1', '2022-05-04 00:07:34'),
(2049, 'STF-9418', '127.0.0.1', 'Registered P107 - FAMOUS GROUSE 750ML, With A Total Quantity Of : 1', '2022-05-04 00:07:34'),
(2050, 'STF-9418', '127.0.0.1', 'Registered P108 - CHAMDOUR, With A Total Quantity Of : 2', '2022-05-04 00:07:34'),
(2051, 'STF-9418', '127.0.0.1', 'Registered P109 - CHROME 250ML, With A Total Quantity Of : 30', '2022-05-04 00:07:34'),
(2052, 'STF-9418', '127.0.0.1', 'Registered P110 - CHROME 750ML, With A Total Quantity Of : 8', '2022-05-04 00:07:34'),
(2053, 'STF-9418', '127.0.0.1', 'Registered P111 - KONYAGI 250ML, With A Total Quantity Of : 6', '2022-05-04 00:07:34'),
(2054, 'STF-9418', '127.0.0.1', 'Registered P112 - KONYAGI  500ML, With A Total Quantity Of : 6', '2022-05-04 00:07:34'),
(2055, 'STF-9418', '127.0.0.1', 'Registered P113 - KONYAGI 750ML, With A Total Quantity Of : 2', '2022-05-04 00:07:34'),
(2056, 'STF-9418', '127.0.0.1', 'Registered P114 - GRANTS 750ML, With A Total Quantity Of : 1', '2022-05-04 00:07:34'),
(2057, 'STF-9418', '127.0.0.1', 'Registered P115 - GRANTS 1LTR, With A Total Quantity Of : 1', '2022-05-04 00:07:34'),
(2058, 'STF-9418', '127.0.0.1', 'Registered P116 - LIME JUICE 1.5l, With A Total Quantity Of : 0', '2022-05-04 00:07:34'),
(2059, 'STF-9418', '127.0.0.1', 'Registered P117 - LIME JUICE 700ml, With A Total Quantity Of : 0', '2022-05-04 00:07:34'),
(2060, 'STF-9418', '127.0.0.1', 'Registered P118 - DELMONTE, With A Total Quantity Of : 6', '2022-05-04 00:07:34'),
(2061, 'STF-9418', '127.0.0.1', 'Registered P119 - YATTA, With A Total Quantity Of : 2', '2022-05-04 00:07:35'),
(2062, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2063, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2064, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2065, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2066, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2067, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2068, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2069, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2070, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2071, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2072, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2073, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2074, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2075, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2076, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2077, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2078, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2079, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2080, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2081, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2082, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2083, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2084, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2085, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2086, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2087, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2088, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2089, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2090, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:07:35'),
(2091, 'STF-9418', '127.0.0.1', 'Registered P105 - J.W DOUBLE BLACK, With A Total Quantity Of : 1', '2022-05-04 00:09:37'),
(2092, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:09:37'),
(2093, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:09:37'),
(2094, 'STF-9418', '127.0.0.1', 'Registered P120 - R/BULL, With A Total Quantity Of : 0', '2022-05-04 00:13:58'),
(2095, 'STF-9418', '127.0.0.1', 'Registered P121 - TANGERY SELVILA, With A Total Quantity Of : 0', '2022-05-04 00:13:58'),
(2096, 'STF-9418', '127.0.0.1', 'Registered P122 - TANQUERY GIN, With A Total Quantity Of : 1', '2022-05-04 00:13:58'),
(2097, 'STF-9418', '127.0.0.1', 'Registered P123 - HERDMAN 500ML, With A Total Quantity Of : 0', '2022-05-04 00:13:58'),
(2098, 'STF-9418', '127.0.0.1', 'Registered P124 - HERDMAN 250ML, With A Total Quantity Of : 0', '2022-05-04 00:13:58'),
(2099, 'STF-9418', '127.0.0.1', 'Registered P125 - OJ, With A Total Quantity Of : 0', '2022-05-04 00:13:58'),
(2100, 'STF-9418', '127.0.0.1', 'Registered P126 - BLACK ICE, With A Total Quantity Of : 8', '2022-05-04 00:13:58'),
(2101, 'STF-9418', '127.0.0.1', 'Registered P127 - SAVANNA, With A Total Quantity Of : 1', '2022-05-04 00:13:58'),
(2102, 'STF-9418', '127.0.0.1', 'Registered P128 - PREDATOR, With A Total Quantity Of : 0', '2022-05-04 00:13:58'),
(2103, 'STF-9418', '127.0.0.1', 'Registered P129 - MALIBU, With A Total Quantity Of : 2', '2022-05-04 00:13:58'),
(2104, 'STF-9418', '127.0.0.1', 'Registered P130 - TUSKER MALT, With A Total Quantity Of : 3', '2022-05-04 00:13:58'),
(2105, 'STF-9418', '127.0.0.1', 'Registered P131 - PILSNER CAN, With A Total Quantity Of : 6', '2022-05-04 00:13:58'),
(2106, 'STF-9418', '127.0.0.1', 'Registered P132 - GK SMOOTH, With A Total Quantity Of : 0', '2022-05-04 00:13:58'),
(2107, 'STF-9418', '127.0.0.1', 'Registered P133 - SCHWEPPES, With A Total Quantity Of : 11', '2022-05-04 00:13:58'),
(2108, 'STF-9418', '127.0.0.1', 'Registered P134 - COUNRTY 250ML, With A Total Quantity Of : 4', '2022-05-04 00:13:58'),
(2109, 'STF-9418', '127.0.0.1', 'Registered P135 - All Seasons 250ML, With A Total Quantity Of : 2', '2022-05-04 00:13:59'),
(2110, 'STF-9418', '127.0.0.1', 'Registered P136 - All Seasons 750ML, With A Total Quantity Of : 2', '2022-05-04 00:13:59'),
(2111, 'STF-9418', '127.0.0.1', 'Registered P137 - Supreme 250ML, With A Total Quantity Of : 5', '2022-05-04 00:13:59'),
(2112, 'STF-9418', '127.0.0.1', 'Registered P138 - General Milkins 250ML, With A Total Quantity Of : 7', '2022-05-04 00:13:59'),
(2113, 'STF-9418', '127.0.0.1', 'Registered P139 - Orchid Valley, With A Total Quantity Of : 0', '2022-05-04 00:13:59'),
(2114, 'STF-9418', '127.0.0.1', 'Registered P140 - White Cap Brown Bottle, With A Total Quantity Of : 0', '2022-05-04 00:13:59'),
(2115, 'STF-9418', '127.0.0.1', 'Registered P141 - Old Monk 500ml, With A Total Quantity Of : 0', '2022-05-04 00:13:59'),
(2116, 'STF-9418', '127.0.0.1', 'Registered P142 - County 750, With A Total Quantity Of : 1', '2022-05-04 00:13:59'),
(2117, 'STF-9418', '127.0.0.1', 'Registered P143 - Flirt Vodka 500ml, With A Total Quantity Of : 2', '2022-05-04 00:13:59'),
(2118, 'STF-9418', '127.0.0.1', 'Registered P144 - Flirt Vodka 750ml, With A Total Quantity Of : 2', '2022-05-04 00:13:59'),
(2119, 'STF-9418', '127.0.0.1', 'Registered P145 - Zappa 750ml, With A Total Quantity Of : 1', '2022-05-04 00:13:59'),
(2120, 'STF-9418', '127.0.0.1', 'Registered P146 - Hendrick\\\'s Gin, With A Total Quantity Of : 0', '2022-05-04 00:13:59'),
(2121, 'STF-9418', '127.0.0.1', 'Registered P147 - Hunters Gold/Dry, With A Total Quantity Of : 2', '2022-05-04 00:13:59'),
(2122, 'STF-9418', '127.0.0.1', 'Registered P148 - Heinken, With A Total Quantity Of : 12', '2022-05-04 00:13:59'),
(2123, 'STF-9418', '127.0.0.1', 'Registered P149 - Imperial Blue, With A Total Quantity Of : 1', '2022-05-04 00:13:59'),
(2124, 'STF-9418', '127.0.0.1', 'Registered P150 - Iris, With A Total Quantity Of : 2', '2022-05-04 00:13:59'),
(2125, 'STF-9418', '127.0.0.1', 'Registered P151 - Tanquary Lime, With A Total Quantity Of : 2', '2022-05-04 00:13:59'),
(2126, 'STF-9418', '127.0.0.1', 'Registered P152 - Tanquary B/Current, With A Total Quantity Of : 0', '2022-05-04 00:13:59'),
(2127, 'STF-9418', '127.0.0.1', 'Registered P153 - General Milkins 750ML, With A Total Quantity Of : 2', '2022-05-04 00:13:59'),
(2128, 'STF-9418', '127.0.0.1', 'Registered P154 - Roso Nobile, With A Total Quantity Of : 2', '2022-05-04 00:13:59'),
(2129, 'STF-9418', '127.0.0.1', 'Registered P155 - MYERS RUM, With A Total Quantity Of : 1', '2022-05-04 00:13:59'),
(2130, 'STF-9418', '127.0.0.1', 'Registered P156 - Atlas, With A Total Quantity Of : 1', '2022-05-04 00:13:59'),
(2131, 'STF-9418', '127.0.0.1', 'Registered P157 - CHIVA REGAL, With A Total Quantity Of : 1', '2022-05-04 00:13:59'),
(2132, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:13:59'),
(2133, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:13:59'),
(2134, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:13:59'),
(2135, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:13:59'),
(2136, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:13:59'),
(2137, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:13:59'),
(2138, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:13:59'),
(2139, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:13:59'),
(2140, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:13:59'),
(2141, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:13:59'),
(2142, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:13:59'),
(2143, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:14:00'),
(2144, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:14:00'),
(2145, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:14:00'),
(2146, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:14:00'),
(2147, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:14:00'),
(2148, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:14:00'),
(2149, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:14:00'),
(2150, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:14:00'),
(2151, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:14:00'),
(2152, 'STF-9418', '127.0.0.1', 'Registered P146 - Hendrick\\\'s Gin, With A Total Quantity Of : 0', '2022-05-04 00:15:50'),
(2153, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:15:50'),
(2154, 'STF-9418', '127.0.0.1', 'Registered  - , With A Total Quantity Of : ', '2022-05-04 00:15:50'),
(2155, 'STF-7381', '127.0.0.1', 'Sold 1 items of P1  KIBAO 250 ML', '2022-05-07 15:12:45'),
(2156, 'STF-7381', '127.0.0.1', 'Cancelled P1  KIBAO 250 ML', '2022-05-07 15:15:59'),
(2157, 'STF-7381', '127.0.0.1', 'Cancelled P3  KIBAO 750 ML', '2022-05-07 15:16:06'),
(2158, 'STF-7381', '127.0.0.1', 'Cancelled P4  SODA 1.5LTRS', '2022-05-07 15:16:12'),
(2159, 'STF-7381', '127.0.0.1', 'Sold 1 items of P1  KIBAO 250 ML', '2022-05-07 15:17:19'),
(2160, 'STF-7381', '127.0.0.1', 'Sold 1 items of P1  KIBAO 250 ML', '2022-05-07 15:22:54'),
(2161, 'STF-7381', '127.0.0.1', 'Cancelled P1  KIBAO 250 ML', '2022-05-07 15:24:33'),
(2162, 'STF-7381', '127.0.0.1', 'Cancelled P1  KIBAO 250 ML', '2022-05-07 15:24:40'),
(2163, 'STF-7381', '127.0.0.1', 'Cancelled P4  SODA 1.5LTRS', '2022-05-07 15:24:46'),
(2164, 'STF-7381', '127.0.0.1', 'Sold 5 items of P1  KIBAO 250 ML', '2022-05-07 15:25:18'),
(2165, 'STF-7381', '127.0.0.1', 'Sold 1 items of P3  KIBAO 750 ML', '2022-05-07 15:28:01'),
(2166, 'STF-6820', '127.0.0.1', 'Updated  KIBAO 250 ML, With A Total Quantity Of : 0', '2022-05-07 15:29:13'),
(2167, 'STF-7381', '127.0.0.1', 'Cancelled P89 4TH STREET (W)', '2022-05-08 06:54:26'),
(2168, 'STF-7381', '127.0.0.1', 'Cancelled P90 4TH STREET(R)', '2022-05-08 06:54:32'),
(2169, 'STF-7381', '127.0.0.1', 'Cancelled P1  KIBAO 250 ML', '2022-05-08 06:54:38'),
(2170, 'STF-7381', '127.0.0.1', 'Cancelled P3  KIBAO 750 ML', '2022-05-08 06:54:47'),
(2171, 'STF-7381', '127.0.0.1', 'Sold 1 items of P1  KIBAO 250 ML', '2022-05-08 06:57:40'),
(2172, 'STF-7381', '127.0.0.1', 'Sold 1 items of P1  KIBAO 250 ML', '2022-05-08 06:59:17'),
(2173, 'STF-7381', '127.0.0.1', 'Sold 1 items of P1  KIBAO 250 ML', '2022-05-08 07:34:49');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_phoneno`, `user_password`, `user_password_reset_token`, `user_access_level`, `user_store_id`, `user_status`) VALUES
('STF-6820', 'Manager', 'manager@devlan.co.ke', '0721159829', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Manager', '6cf2d9a5407fa4e91b41ae4adc5dbd9d6ef2d8d88b58', 'active'),
('STF-7381', 'Staff', 'staff@devlan.co.ke', '0742410403', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Staff', '6cf2d9a5407fa4e91b41ae4adc5dbd9d6ef2d8d88b58', 'active'),
('STF-9418', 'Admin', 'admin@devlan.co.ke', '071234567', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Admin', '6cf2d9a5407fa4e91b41ae4adc5dbd9d6ef2d8d88b58', 'active'),
('STF-9419', 'Top Manager', 'tm@devlan.co.ke', '071234567', 'a69681bcf334ae130217fea4505fd3c994f5683f', NULL, 'Top manager', '6cf2d9a5407fa4e91b41ae4adc5dbd9d6ef2d8d88b58', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `CartProductid` (`cart_product_id`),
  ADD KEY `CartStoreID` (`cart_store_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `SaleProductID` (`sale_product_id`),
  ADD KEY `SaleUserID` (`sale_user_id`),
  ADD KEY `sale_receipt_no` (`sale_receipt_no`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `UserStoreID` (`user_store_id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=861;

--
-- AUTO_INCREMENT for table `system_logs`
--
ALTER TABLE `system_logs`
  MODIFY `log_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2174;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `CartProductid` FOREIGN KEY (`cart_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CartStoreID` FOREIGN KEY (`cart_store_id`) REFERENCES `store_settings` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `SaleProductID` FOREIGN KEY (`sale_product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `SaleUserID` FOREIGN KEY (`sale_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `UserStoreID` FOREIGN KEY (`user_store_id`) REFERENCES `store_settings` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
