-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 07:42 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`) VALUES
(1, 'Md. Ferdous Anam', 'anam', 'anam'),
(2, 'Ashraful Islam', 'ashraf', 'ash'),
(3, 'Kazal Ghosh', 'kazal', 'kazal'),
(4, 'Abdullah Al Rahat', 'rahat', 'rahat');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplierID` int(11) NOT NULL,
  `firstName` int(11) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `comName` varchar(50) NOT NULL,
  `houseNo` varchar(5) NOT NULL,
  `roadNo` varchar(5) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(1, 'Xiaomi'),
(2, 'Nokia'),
(3, 'Samsung'),
(4, 'IPhone'),
(5, 'Apple'),
(6, 'LG'),
(7, 'Sony');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `sId` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_img` varchar(255) NOT NULL,
  `cat_description` text NOT NULL,
  `top_cat` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_img`, `cat_description`, `top_cat`) VALUES
(1, 'Mobile & Accessories', 'image/catImg/Cat-mobile.jpg', 'This is mobile Category', 1),
(2, 'Computer', 'image/catImg/Cat-Computer.jpg', '', 1),
(3, 'Medicine', '', '', 0),
(4, 'TV and Screens', '', 'This is TV &amp; Screens\' Category', 0),
(5, 'Watches & Jewellery', 'image/catImg/Cat-Watches.jpg', ' A watch is a small timepiece intended to be carried or worn by a person. It is designed to keep working despite the motions caused by the person\'s activities. A wristwatch is designed to be worn around the wrist, attached by a watch strap or other type of bracelet. A pocket watch is designed for a person to carry in a pocket.', 1),
(6, 'Laptops', '', 'PC is short for personal computer or IBM PC. The first personal computer produced by IBM was called the PC, and increasingly the term PC came to mean IBM or IBM-compatible personal computers, to the exclusion of other types of personal computers, such as Macintoshes.', 0),
(7, 'Gaming Accessories', '', ' ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `country_id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`country_id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'ZR', 'Zaire'),
(244, 'ZM', 'Zambia'),
(245, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `first_name`, `last_name`, `address`, `city`, `zip`, `phone`, `email`, `country_id`, `password`) VALUES
(1, 'Kayes', '', '', '', 0, '', 'kayes@gmail.com', 1, 'kayes'),
(2, 'Tushar', '', '', '', 1207, '0174578964', 'tushar@gmail.com', 8, '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(255) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `shipment_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `order_code`, `customer_id`, `product_id`, `quantity`, `amount`, `order_date`, `shipment_date`) VALUES
(19, NULL, 1, 4, 1, '36850.00', '2017-04-24 06:38:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `order_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `body` text,
  `price` decimal(10,3) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `cat_id`, `brand_id`, `body`, `price`, `type`, `image`) VALUES
(1, 'Redmi Note 4', 1, 1, '<div class=\"pd_heading margin_b30\"><strong>Xiaomi Redmi Note 4 detailed specifications:</strong></div>\r\n<div class=\"pd_detail_wrp margin_b30\">\r\n<div class=\"pd_detail_head margin_b20\">GENERAL</div>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr class=\"firstrow\">\r\n<td width=\"50%\">Release date</td>\r\n<td width=\"50%\">August 2016</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Form factor</td>\r\n<td width=\"50%\">Touchscreen</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Dimensions (mm)</td>\r\n<td width=\"50%\">151.00 x 76.00 x 8.30</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Weight (g)</td>\r\n<td width=\"50%\">175.00</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Battery capacity (mAh)</td>\r\n<td width=\"50%\">4100</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Removable battery</td>\r\n<td width=\"50%\">No</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Colours</td>\r\n<td width=\"50%\">Gold, Grey, Matte Black</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">SAR value</td>\r\n<td width=\"50%\">NA</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class=\"pd_detail_wrp margin_b30\">\r\n<div class=\"pd_detail_head margin_b20\">DISPLAY</div>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr class=\"firstrow\">\r\n<td width=\"50%\">Screen size (inches)</td>\r\n<td width=\"50%\">5.50</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Touchscreen</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Resolution</td>\r\n<td width=\"50%\">1080x1920 pixels</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Pixels per inch (PPI)</td>\r\n<td width=\"50%\">401</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class=\"pd_detail_wrp margin_b30\">\r\n<div class=\"pd_detail_head margin_b20\">HARDWARE</div>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr class=\"firstrow\">\r\n<td width=\"50%\">Processor</td>\r\n<td width=\"50%\">2GHz octa-core</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Processor make</td>\r\n<td width=\"50%\">Qualcomm Snapdragon 625</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">RAM</td>\r\n<td width=\"50%\">4GB</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Internal storage</td>\r\n<td width=\"50%\">64GB</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Expandable storage</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Expandable storage type</td>\r\n<td width=\"50%\">microSD</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Expandable storage up to (GB)</td>\r\n<td width=\"50%\">128</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class=\"pd_detail_wrp margin_b30\">\r\n<div class=\"pd_detail_head margin_b20\">CAMERA</div>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr class=\"firstrow\">\r\n<td width=\"50%\">Rear camera</td>\r\n<td width=\"50%\">13-megapixel</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Flash</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Front camera</td>\r\n<td width=\"50%\">5-megapixel</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class=\"pd_detail_wrp margin_b30\">\r\n<div class=\"pd_detail_head margin_b20\">SOFTWARE</div>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr class=\"firstrow\">\r\n<td width=\"50%\">Operating System</td>\r\n<td width=\"50%\">Android 6.0</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Skin</td>\r\n<td width=\"50%\">MIUI 8</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class=\"pd_detail_wrp margin_b30\">\r\n<div class=\"pd_detail_head margin_b20\">CONNECTIVITY</div>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr class=\"firstrow\">\r\n<td width=\"50%\">Wi-Fi</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Wi-Fi standards supported</td>\r\n<td width=\"50%\">802.11 a/b/g/n</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">GPS</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Bluetooth</td>\r\n<td width=\"50%\">Yes, v 4.10</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">NFC</td>\r\n<td width=\"50%\">No</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Infrared</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">USB OTG</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Headphones</td>\r\n<td width=\"50%\">3.5mm</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">FM</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Number of SIMs</td>\r\n<td width=\"50%\">2</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\"><strong>SIM 1</strong></td>\r\n<td width=\"50%\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">SIM Type</td>\r\n<td width=\"50%\">Micro-SIM</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">GSM/CDMA</td>\r\n<td width=\"50%\">GSM</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">3G</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">4G/ LTE</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">Supports 4G in India (Band 40)</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\"><strong>SIM 2</strong></td>\r\n<td width=\"50%\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">SIM Type</td>\r\n<td width=\"50%\">Nano-SIM</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">GSM/CDMA</td>\r\n<td width=\"50%\">GSM</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">3G</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">4G/ LTE</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">Supports 4G in India (Band 40)</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class=\"pd_detail_wrp margin_b30\">\r\n<div class=\"pd_detail_head margin_b20\">SENSORS</div>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr class=\"firstrow\">\r\n<td width=\"50%\">Compass/ Magnetometer</td>\r\n<td width=\"50%\">No</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Proximity sensor</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Accelerometer</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Ambient light sensor</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Gyroscope</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Barometer</td>\r\n<td width=\"50%\">No</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Temperature sensor</td>\r\n<td width=\"50%\">No</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', '14000.000', 0, 'uploads/e9ed5f1054.jpg'),
(2, 'Nokia 6', 1, 2, '<div class=\"pd_heading margin_b30\"><strong>Nokia 6 detailed specifications:</strong></div>\r\n<div class=\"pd_detail_wrp margin_b30\">\r\n<div class=\"pd_detail_head margin_b20\">GENERAL</div>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr class=\"firstrow\">\r\n<td width=\"50%\">Alternate names</td>\r\n<td width=\"50%\">Six</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Release date</td>\r\n<td width=\"50%\">January 2017</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Form factor</td>\r\n<td width=\"50%\">Touchscreen</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Dimensions (mm)</td>\r\n<td width=\"50%\">154.00 x 75.80 x 7.85</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Weight (g)</td>\r\n<td width=\"50%\">167.00</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Battery capacity (mAh)</td>\r\n<td width=\"50%\">3000</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Removable battery</td>\r\n<td width=\"50%\">No</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Colours</td>\r\n<td width=\"50%\">Arte Black, Matte Black, Tempered Blue, Silver, Copper</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">SAR value</td>\r\n<td width=\"50%\">NA</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class=\"pd_detail_wrp margin_b30\">\r\n<div class=\"pd_detail_head margin_b20\">DISPLAY</div>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr class=\"firstrow\">\r\n<td width=\"50%\">Screen size (inches)</td>\r\n<td width=\"50%\">5.50</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Touchscreen</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Resolution</td>\r\n<td width=\"50%\">1080x1920 pixels</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Pixels per inch (PPI)</td>\r\n<td width=\"50%\">403</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class=\"pd_detail_wrp margin_b30\">\r\n<div class=\"pd_detail_head margin_b20\">HARDWARE</div>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr class=\"firstrow\">\r\n<td width=\"50%\">Processor</td>\r\n<td width=\"50%\">1.1GHz octa-core</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Processor make</td>\r\n<td width=\"50%\">Qualcomm Snapdragon 430 processor</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">RAM</td>\r\n<td width=\"50%\">3GB</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Internal storage</td>\r\n<td width=\"50%\">32GB</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Expandable storage</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Expandable storage type</td>\r\n<td width=\"50%\">microSD</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Expandable storage up to (GB)</td>\r\n<td width=\"50%\">128</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class=\"pd_detail_wrp margin_b30\">\r\n<div class=\"pd_detail_head margin_b20\">CAMERA</div>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr class=\"firstrow\">\r\n<td width=\"50%\">Rear camera</td>\r\n<td width=\"50%\">16-megapixel</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Flash</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Front camera</td>\r\n<td width=\"50%\">8-megapixel</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class=\"pd_detail_wrp margin_b30\">\r\n<div class=\"pd_detail_head margin_b20\">SOFTWARE</div>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr class=\"firstrow\">\r\n<td width=\"50%\">Operating System</td>\r\n<td width=\"50%\">Android 7.0</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class=\"pd_detail_wrp margin_b30\">\r\n<div class=\"pd_detail_head margin_b20\">CONNECTIVITY</div>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr class=\"firstrow\">\r\n<td width=\"50%\">Wi-Fi</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Wi-Fi standards supported</td>\r\n<td width=\"50%\">802.11 a/b/g/n</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">GPS</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Bluetooth</td>\r\n<td width=\"50%\">Yes, v 4.10</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">NFC</td>\r\n<td width=\"50%\">No</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Infrared</td>\r\n<td width=\"50%\">No</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">USB OTG</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Headphones</td>\r\n<td width=\"50%\">3.5mm</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">FM</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Number of SIMs</td>\r\n<td width=\"50%\">2</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\"><strong>SIM 1</strong></td>\r\n<td width=\"50%\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">SIM Type</td>\r\n<td width=\"50%\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">GSM/CDMA</td>\r\n<td width=\"50%\">GSM + CDMA</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">3G</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">4G/ LTE</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">Supports 4G in India (Band 40)</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\"><strong>SIM 2</strong></td>\r\n<td width=\"50%\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">SIM Type</td>\r\n<td width=\"50%\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">GSM/CDMA</td>\r\n<td width=\"50%\">GSM + CDMA</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">3G</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">4G/ LTE</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50%\">Supports 4G in India (Band 40)</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<div class=\"pd_detail_wrp margin_b30\">\r\n<div class=\"pd_detail_head margin_b20\">SENSORS</div>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr class=\"firstrow\">\r\n<td width=\"50%\">Compass/ Magnetometer</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Proximity sensor</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Accelerometer</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Ambient light sensor</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Gyroscope</td>\r\n<td width=\"50%\">Yes</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Barometer</td>\r\n<td width=\"50%\">No</td>\r\n</tr>\r\n<tr class=\"\">\r\n<td width=\"50%\">Temperature sensor</td>\r\n<td width=\"50%\">No</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>', '25000.000', 0, 'uploads/6d39d53368.jpeg'),
(3, 'MacBookÂ Pro', 6, 5, '<h2>DETAIL SPECIFICATIONS</h2>\r\n<hr />\r\n<div id=\"specBox\">\r\n<div class=\"left\">\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td>Country of Origin</td>\r\n<td>:</td>\r\n<td>USA</td>\r\n</tr>\r\n<tr>\r\n<td>Country of Mfg.</td>\r\n<td>:</td>\r\n<td>CHINA</td>\r\n</tr>\r\n<tr>\r\n<td>Processor</td>\r\n<td>:</td>\r\n<td>2.7GHz dual-core Intel Core i5 processor (Turbo Boost up to 3.1GHz) with 3MB shared L3 cache</td>\r\n</tr>\r\n<tr>\r\n<td>Clock Speed</td>\r\n<td>:</td>\r\n<td>2.7GHz</td>\r\n</tr>\r\n<tr>\r\n<td>L3 Cache</td>\r\n<td>:</td>\r\n<td>3MB shared L3 cache</td>\r\n</tr>\r\n<tr>\r\n<td>Hyper Thread Technoloy</td>\r\n<td>:</td>\r\n<td>Enabled</td>\r\n</tr>\r\n<tr>\r\n<td>Turbo Boost Technology</td>\r\n<td>:</td>\r\n<td>Turbo Boost up to 3.1GHz</td>\r\n</tr>\r\n<tr>\r\n<td>Graphics</td>\r\n<td>:</td>\r\n<td>Intel Iris Graphics 6100</td>\r\n</tr>\r\n<tr>\r\n<td>Operating System</td>\r\n<td>:</td>\r\n<td>OS X El Capitan</td>\r\n</tr>\r\n<tr>\r\n<td>Memory/Ram</td>\r\n<td>:</td>\r\n<td>8GB of 1866MHz LPDDR3 onboard memory</td>\r\n</tr>\r\n<tr>\r\n<td>Display</td>\r\n<td>:</td>\r\n<td>\r\n<ul>\r\n<li>Retina display: 13.3-inch (diagonal) LED-backlit display with IPS technology; 2560-by-1600 resolution at 227 pixels per inch with support for millions of colors</li>\r\n<li></li>\r\n<li>Native resolution: 2560 by 1600 pixels (Retina); scaled resolutions: 1680 by 1050, 1440 by 900, and 1024 by 640 pixels</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Hard Drive</td>\r\n<td>:</td>\r\n<td>256GB PCIe-based flash storage</td>\r\n</tr>\r\n<tr>\r\n<td>Optical Drive</td>\r\n<td>:</td>\r\n<td>N/A</td>\r\n</tr>\r\n<tr>\r\n<td>Audio</td>\r\n<td>:</td>\r\n<td>\r\n<ul>\r\n<li>Stereo speakers</li>\r\n<li>Dual microphones</li>\r\n<li>3.5 mm headphone jack</li>\r\n<li>Support for Apple iPhone headset with</li>\r\n<li>remote and microphone</li>\r\n<li>Support for audio line out (digital/analog)</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>BlueTooth</td>\r\n<td>:</td>\r\n<td>Bluetooth 4.0 wireless technology</td>\r\n</tr>\r\n<tr>\r\n<td>Networking</td>\r\n<td>:</td>\r\n<td>802.11ac Wi?Fi wireless networking; IEEE 802.11a/b/g/n compatible</td>\r\n</tr>\r\n<tr>\r\n<td>Wireless</td>\r\n<td>:</td>\r\n<td>802.11ac Wi?Fi wireless networking; IEEE 802.11a/b/g/n compatible</td>\r\n</tr>\r\n<tr>\r\n<td>Webcam</td>\r\n<td>:</td>\r\n<td>720p Face Time HD camera</td>\r\n</tr>\r\n<tr>\r\n<td>Card Slot</td>\r\n<td>:</td>\r\n<td>SDXC card slot</td>\r\n</tr>\r\n<tr>\r\n<td>Connector Interface</td>\r\n<td>:</td>\r\n<td>\r\n<ul>\r\n<li>\"MagSafe 2 power port,AC wall plug</li>\r\n<li>Power cord\"</li>\r\n<li>Two Thunderbolt 2 ports (up to 20 Gbps)</li>\r\n<li>Two USB 3 ports (up to 5 Gbps)</li>\r\n<li>HDMI port</li>\r\n<li>Headphone port</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Dimension</td>\r\n<td>:</td>\r\n<td>\r\n<ul>\r\n<li>Height: 0.71 inch (1.8 cm)</li>\r\n<li>Width: 12.35 inches (31.4 cm)</li>\r\n<li>Depth: 8.62 inches (21.9 cm)</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>AC Adapter</td>\r\n<td>:</td>\r\n<td>60W MagSafe 2 Power Adapter</td>\r\n</tr>\r\n<tr>\r\n<td>Battery &amp; Power</td>\r\n<td>:</td>\r\n<td>\r\n<ul>\r\n<li>Up to 10 hours wireless web</li>\r\n<li>Up to 12 hours iTunes movie playback</li>\r\n<li>Up to 30 days of standby time</li>\r\n<li>Built-in 74.9-watt-hour lithium-polymer battery</li>\r\n<li>60W MagSafe 2 Power Adapter with cable management system; MagSafe 2 power port</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td>Weight</td>\r\n<td>:</td>\r\n<td>Weight: 3.48 pounds (1.58 kg)2</td>\r\n</tr>\r\n<tr>\r\n<td>Carry Case</td>\r\n<td>:</td>\r\n<td>Sold separately</td>\r\n</tr>\r\n<tr>\r\n<td>Color Option</td>\r\n<td>:</td>\r\n<td>Aluminum Only.</td>\r\n</tr>\r\n<tr>\r\n<td>Others</td>\r\n<td>:</td>\r\n<td>\r\n<ul>\r\n<li>\"Line voltage: 100V to 240V AC,Frequency: 50Hz to 60Hz,Operating temperature: 50&deg; to 95&deg; F (10&deg; to 35&deg; C),Storage temperature: &ndash;13&deg; to 113&deg; F (&ndash;25&deg; to 45&deg; C),Relative humidity: 0% to 90% noncondensing,Operating altitude: tested up to 10,000 feet,Maximum storage altitude: 15,000 feet,</li>\r\n<li>Maximum shipping altitude: 35,000 feet\"</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>', '148000.000', 1, 'uploads/7bb55e3ffc.jpg'),
(4, 'LG 42LF550T 42', 4, 6, '<h3 class=\"font-md-pc font-md-phone\">LG 42LF550T 42 Specifications</h3>\r\n<table class=\"table no-border no-box-shad m-b-lg\">\r\n<tbody>\r\n<tr>\r\n<td class=\"text-small bg-light\" width=\"25%\"><em>Screen-Size</em></td>\r\n<td class=\"text-small ta-wrap\" width=\"74%\">42 Inch&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-small bg-light\" width=\"25%\"><em>Display-Resolution</em></td>\r\n<td class=\"text-small ta-wrap\" width=\"74%\">1920x1080&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-small bg-light\" width=\"25%\"><em>Sound</em></td>\r\n<td class=\"text-small ta-wrap\" width=\"74%\">VIRTUAL SURROUND&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-small bg-light\" width=\"25%\"><em>Video</em></td>\r\n<td class=\"text-small ta-wrap\" width=\"74%\">Triple XD Engine, Active Noise Reduction, Dynamic Clear White&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-small bg-light\" width=\"25%\"><em>Games</em></td>\r\n<td class=\"text-small ta-wrap\" width=\"74%\">MONSTER WORLD, BOBBLE PONG, VALENTINE&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td class=\"text-small bg-light\" width=\"25%\"><em>Other-Features</em></td>\r\n<td class=\"text-small ta-wrap\" width=\"74%\">METALLIC DESIGN, SMART ENERGY SAVING, MOTION ECO SENSOR&nbsp;</td>\r\n</tr>\r\n</tbody>\r\n</table>', '36850.000', 0, 'uploads/b45967a38a.jpg'),
(5, 'Sony 1216 PS4 Console 500GB Region 2 - Black', 7, 7, '<div class=\"list -features\">\r\n<div class=\"title\">\r\n<div class=\"itemAttr\">\r\n<div class=\"section\">\r\n<h2 class=\"secHd\" style=\"text-align: left;\">Item specifics:</h2>\r\n<table id=\"itmSellerDesc\" style=\"float: left;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr style=\"height: 17px;\">\r\n<th style=\"text-align: left; height: 17px;\">Condition:</th>\r\n<td style=\"height: 17px;\"><strong>New</strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<table style=\"float: left;\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td class=\"attrLabels\">Brand:</td>\r\n<td width=\"50.0%\">Sony</td>\r\n<td class=\"attrLabels\">Region Code:</td>\r\n<td width=\"50.0%\">Region Free, PAL</td>\r\n</tr>\r\n<tr>\r\n<td class=\"attrLabels\">Platform:</td>\r\n<td width=\"50.0%\">Sony PlayStation 4</td>\r\n<td class=\"attrLabels\">Features:</td>\r\n<td width=\"50.0%\">Touch Pad, Wi-Fi Capability, Blu-Ray Compatible, Internet Browsing</td>\r\n</tr>\r\n<tr>\r\n<td class=\"attrLabels\">Model:</td>\r\n<td width=\"50.0%\">PlayStation 4</td>\r\n<td class=\"attrLabels\">Design/Finish:</td>\r\n<td width=\"50.0%\">Plain</td>\r\n</tr>\r\n<tr>\r\n<td class=\"attrLabels\">MPN:</td>\r\n<td width=\"50.0%\">CUH-1216A</td>\r\n<td class=\"attrLabels\">Colour:</td>\r\n<td width=\"50.0%\">White</td>\r\n</tr>\r\n<tr>\r\n<td class=\"attrLabels\">Type:</td>\r\n<td width=\"50.0%\">Console</td>\r\n<td class=\"attrLabels\">EAN:</td>\r\n<td width=\"50.0%\">0711719815242</td>\r\n</tr>\r\n<tr>\r\n<td class=\"attrLabels\">Hard Drive Capacity:</td>\r\n<td width=\"50.0%\">500GB</td>\r\n<td class=\"attrLabels\">EAN Code:</td>\r\n<td width=\"50.0%\">0711719815242</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n<div class=\"prodDetailDesc\" style=\"text-align: left;\">\r\n<div class=\"prodDetailSec\">\r\n<div class=\"section-ttl\">\r\n<h3 class=\"p_det_title\">&nbsp;</h3>\r\n<h3 class=\"p_det_title\">Detailed item information:</h3>\r\n</div>\r\n<table width=\"100%\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<table border=\"0\" width=\"100%\" cellspacing=\"0\" cellpadding=\"0\">\r\n<tbody>\r\n<tr>\r\n<td colspan=\"2\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\"><strong>Product Description</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Product Description</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">The Sony PlayStation 4 is a console that supports Internet browsing and Wi-Fi for user convenience. Thanks to the integrated Eight-Core x86-64 AMD Jaguar processor along with 8 GB RAM, this black Sony console offers seamless gaming experience. Furthermore, the 512 GB storage provides room for the games and user data.</span></td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\"><strong>Product Identifiers</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Brand</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Sony</span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Model</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">PlayStation 4</span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Platform</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Sony PlayStation 4</span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">EAN</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">0711719466215, 0711719815242, 0711719858430</span></td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\"><strong>General</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Product Line</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Sony PlayStation</span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Type</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Console</span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Console Colour</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Glacier White</span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Edition</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Driveclub Bundle</span></td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\"><strong>Technical Details</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Internet Connectivity</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Wired, Wireless</span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Ram Capacity</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">8GB</span></td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\"><strong>Graphic</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Region Code</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">PAL, Region Free</span></td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\"><strong>Features</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Features</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Blu-Ray Compatible, Internet Browsing, Touch Pad, Wi-Fi Capability</span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Country Region</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">United Kingdom</span></td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\">&nbsp;</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\"><strong>Hard Drive</strong></span></td>\r\n</tr>\r\n<tr>\r\n<td valign=\"top\" width=\"35%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">Hard Drive Capacity</span></td>\r\n<td valign=\"top\" width=\"65%\"><span style=\"font-family: Arial, Helvetica, sans-serif; font-size: small;\">500GB</span></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', '41900.000', 0, 'uploads/d02726be7f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_refresh`
--

CREATE TABLE `tbl_refresh` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_refresh`
--

INSERT INTO `tbl_refresh` (`id`, `body`) VALUES
(3, 'Hello World!');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subCatId` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subCatName` varchar(255) NOT NULL,
  `subCatDescription` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subCatId`, `cat_id`, `subCatName`, `subCatDescription`) VALUES
(1, 2, 'Desk Top', NULL),
(2, 2, 'Laptop', NULL),
(3, 1, 'Mobile', NULL),
(4, 1, 'Accessories', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `tbl_cart_ibfk_1` (`product_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `tbl_orders_ibfk_2` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD KEY `tbl_order_details_ibfk_1` (`order_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `tbl_refresh`
--
ALTER TABLE `tbl_refresh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subCatId`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;
--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_refresh`
--
ALTER TABLE `tbl_refresh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subCatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD CONSTRAINT `tbl_cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_product` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customers` (`customer_id`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD CONSTRAINT `tbl_product_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`cat_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_product_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`) ON DELETE SET NULL;

--
-- Constraints for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD CONSTRAINT `tbl_subcategory_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
