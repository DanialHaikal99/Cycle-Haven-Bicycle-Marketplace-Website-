-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 08:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyclehaven2`
--

-- --------------------------------------------------------

--
-- Table structure for table `havenaccount`
--

CREATE TABLE `havenaccount` (
  `AccountID` int(10) NOT NULL,
  `AccountUsername` varchar(20) NOT NULL,
  `AccountPassword` varchar(60) NOT NULL,
  `AccountType` varchar(1) NOT NULL,
  `AccountStatus` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `havenaccount`
--

INSERT INTO `havenaccount` (`AccountID`, `AccountUsername`, `AccountPassword`, `AccountType`, `AccountStatus`) VALUES
(1, 'MattTheLawyer', 'notdaredevil33#', 'U', 'Y'),
(2, 'NazaEnterprise', '441', 'S', 'Y'),
(3, 'admin', '3051999', 'A', 'Y'),
(4, 'Aimnkun12', 'ainaisbae12', 'U', 'Y'),
(5, 'orbstore99', 'orbstore33', 'S', 'Y'),
(6, 'Henrykun99', 'baba', 'S', 'Y'),
(7, 'Dmenaze44', 'henrylaw22', 'S', 'Y'),
(8, 'BikeLover22', 'bikeismylife23', 'S', 'Y'),
(9, 'aina41', 'pikachu244', 'U', 'Y'),
(10, 'KJ99', 'kjnice12', 'U', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `havenbicycle`
--

CREATE TABLE `havenbicycle` (
  `BicycleID` int(10) NOT NULL,
  `BicycleName` varchar(70) NOT NULL,
  `BicyclePrice` decimal(10,2) NOT NULL,
  `BicycleCategory` varchar(20) NOT NULL,
  `BicycleDesc` text NOT NULL,
  `BicycleApproval` varchar(1) NOT NULL,
  `BicycleColor` varchar(50) NOT NULL,
  `BicycleImage` text CHARACTER SET latin1 NOT NULL,
  `BicycleBrand` varchar(40) NOT NULL,
  `AccountUsername` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `havenbicycle`
--

INSERT INTO `havenbicycle` (`BicycleID`, `BicycleName`, `BicyclePrice`, `BicycleCategory`, `BicycleDesc`, `BicycleApproval`, `BicycleColor`, `BicycleImage`, `BicycleBrand`, `AccountUsername`) VALUES
(1, 'Cyca 3 Mountain Bike', '700.00', 'Mountain Bike', 'Very nice, mountain  bike', 'N', 'White,Blue,Green', 'images/shop/gallerybike1.png', 'Cyca', 'NazaEnterprise'),
(2, 'Slamma-T Mountain Bike', '925.55', 'Mountain Bike', 'Captivating, that would be the one word to describe this beauty of a technological advancement. This mountain  bike is equipped with the latest gear needed to explore the snowy mountains with your loved ones.', 'N', 'Black,White,Silver', 'images/shop/gallerybike2.png', 'Slamma-T', 'orbstore99'),
(3, 'Xtreme-X Mountain Bike', '783.20', 'Mountain Bike', 'Great for the long rides in the mountain with your tough friends and lovely family. Yes both can get together and enjoy the mountain view without problems.', 'N', 'Black,White', 'images/shop/gallerybike2.png', 'Xtreme', 'Henrykun99'),
(4, 'Geometric Children Bike', '920.00', 'Children Bike', 'Superbly magnificent, that\'s what our paid reviewers said about this 2120 year bicycle. Great for the long rides in the mountain with your tough friends and lovely family. Yes both can get together and enjoy the mountain view without problems.', 'N', 'Black', 'images/shop/gallerybike4.png', 'Geometric', 'Henrykun99'),
(5, 'Macce Folding Bike', '1000.50', 'Folding Bike', 'Very nice, folding  bike', 'N', 'Black,Green', 'images/shop/gallerybike5.png', 'Macce ', 'Dmenaze44'),
(6, 'Polygon 99 Road Bike', '550.00', 'Road Bike', 'Very nice, road  bike', 'N', 'Black,White', 'images/shop/gallerybike6.png', 'Polygon', 'Dmenaze44'),
(7, 'Supremo 7-X Bike', '999.00', 'Road Bike', 'A bicycle (or bike) is a small, human powered land vehicle with a seat, two wheels, two pedals, and a metal chain connected to cogs on the pedals and rear wheel.', 'N', 'White,Black', 'images/shop/gallerybike7.jpg', 'Supremo', 'BikeLover22'),
(21, 'Henuq 3000 Bike', '300.00', 'Normal Bike', 'Very Gud Bike ', 'N', 'Black,Grey,', 'images/shop/gallerybike9.jpg', 'Henuq', 'NazaEnterprise'),
(22, 'Avon Premium Road Bike', '1400.00', 'Road Bike', 'This avon bike is expensive but tis nice and gud', 'N', 'Blue,Green,Yellow,', 'images/shop/Avon_Bike.jpg', 'Avon', 'NazaEnterprise');

-- --------------------------------------------------------

--
-- Table structure for table `havenbot`
--

CREATE TABLE `havenbot` (
  `BotID` int(11) NOT NULL,
  `BotQueries` varchar(300) NOT NULL,
  `BotReplies` varchar(1000) NOT NULL,
  `BotType` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `havenbot`
--

INSERT INTO `havenbot` (`BotID`, `BotQueries`, `BotReplies`, `BotType`) VALUES
(1, '!help', 'Questions To Ask-------------------------------------1. How Do I Pay In This Website?------------------------2. How Do I Ask Questions Regarding My Order?---------3. How Do I Know The Order Status Of My Bicycle?--------4. How Do I Know If My Seller Is Trusted Or Verified?-------5. What Happens If My Order Is Flagged?----------------6. How Do I Know If My Order Is Approved?--------------7. Is My Payment Details Safe In This Website?-----------8. How Do I Know The Status Of My Order During Delivery?-9. What Happens If The Bicycle Is Damaged After Delivery?10. How to Give Feedback In The Website To The Admin?--', 'U'),
(2, 'how do i pay in this website?', 'The Payment Method In This Website Is Through The Upload Of Proof Of Transfer (From Malaysian Online Banking Transaction).', 'U'),
(3, 'how do i ask questions regarding my order?', 'The User Is Able To Send A Direct Message To The Seller In The Order Details Section (In Order History).', 'U'),
(4, 'How Do I Know The Order Status Of My Bicycle?', 'The User May Check The Order Status In The Order Details Section (In Order History).', 'U'),
(5, 'How Do I Know If My Seller Is Trusted Or Verified?', 'The Number Of Orders Made, Delivered, Verification Status And The Seller Ratings Are Displayed In Their Profile', 'U'),
(6, 'What Happens If My Order Is Flagged?', 'Please Contact The Seller Through The Message Option In The Order Details Section.', 'U'),
(7, 'How Do I Know If My Order Is Approved?', 'The User May Check The Order Status In The Order Details Section (In Order History).', 'U'),
(8, 'Is My Payment Details Safe In This Website?', 'Due To The Nature Of This Website\'s Upload Of Proof Of Transfer Method, If Done The Exact Way Recommended, it Should Be Completely Safe.', 'U'),
(9, 'How Do I Know The Status Of My Order During Delivery?', 'The User May Check The Order Status In The Order Details Section (In Order History).', 'U'),
(10, 'How to Give Feedback In The Website To The Admin?', 'There is A Feedback Page In The Website, Please Give Your Suggestions And Feedback there. ', 'U'),
(11, '!help', 'Questions To Ask-------------------------------------1. How Do I Receive Payment In This Website?------------2. How Do I Update Status Regarding An Order?---------3. How Do I Post Bicycle In The Website?-----------------4. How Do I Know If My User Has Made Payment?---------5. What If The Payment Given Is Invalid or Wrong?--------', 'S'),
(12, 'How Do I Receive Payment In This Website?', 'The User Will Pay Through Their Respective Online Banking Accounts Through Links That Are Provided But Will Upload Proof Of Payment To Seller To Verify In Their Own Bank Account.', 'S'),
(13, 'How Do I Update Status Regarding An Order?', 'In The Order Inbox, The Seller Is Able To View The Details Of The Buyer/User. From There The Seller will see a text box to update the status of the Buyer/User.', 'S'),
(14, 'How Do I Post Bicycle In The Website?', 'In The Bicycle Menu Page, there is a add advertisement button on the top left. Click on that and fill all the info to be approved and checked by the Admin.', 'S'),
(15, 'How Do I Know If My User Has Made Payment?', 'The Seller Will Know Through Checking Their Order Info Through The View Details Button In Order Inbox Page.', 'S'),
(16, 'What If The Payment Given Is Invalid or Wrong?', 'The Seller Is Able To Flag The Order And Update To The User Through The Order Status. After The User Is Informed, Then The Changes Will Be Made.', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `havenorder`
--

CREATE TABLE `havenorder` (
  `OrderID` int(10) NOT NULL,
  `OrderTotalPrice` varchar(20) NOT NULL,
  `OrderQuantity` int(10) NOT NULL,
  `OrderStatus` varchar(20) NOT NULL,
  `OrderApproval` varchar(1) NOT NULL,
  `BicycleID` int(10) NOT NULL,
  `AccountUsername` varchar(20) NOT NULL,
  `OrderPayment` text NOT NULL,
  `OrderDate` datetime NOT NULL DEFAULT current_timestamp(),
  `OrderColor` varchar(20) NOT NULL,
  `OrderMessage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `havenorder`
--

INSERT INTO `havenorder` (`OrderID`, `OrderTotalPrice`, `OrderQuantity`, `OrderStatus`, `OrderApproval`, `BicycleID`, `AccountUsername`, `OrderPayment`, `OrderDate`, `OrderColor`, `OrderMessage`) VALUES
(25, '1,400.00', 1, 'Order Is Delivered', 'Y', 22, 'Aimnkun12', 'images/payments/sddfsfds.png', '2022-03-10 07:23:33', 'Blue', 'Order Has Been Delivered. For Further enquiries please contact us for the Bicycle Warranty fill-up form and further problems.'),
(28, '1,400.00', 1, 'Order Is Shipping', 'Y', 22, 'Aimnkun12', 'images/payments/lala2.png', '2022-03-10 08:11:55', 'Yellow', 'Shipping Van Is On Its Way Now.'),
(29, '920.00', 1, 'Order Is Generated', 'N', 4, 'aina41', 'images/payments/dhinesh.png', '2022-03-10 09:22:11', 'Black', 'Order Has Been Generated.(This Is Auto-Generated By System)'),
(30, '1,400.00', 1, 'Order Is Generated', 'F', 22, 'aina41', 'images/payments/lala.png', '2022-03-10 10:47:21', 'Green', 'Order Has Been Generated.(This Is Auto-Generated By System)'),
(33, '1,000.50', 1, 'Order Is Generated', 'N', 5, 'aina41', 'images/payments/proofb.png', '2022-03-11 11:01:16', 'Green', 'Order Has Been Generated.(This Is Auto-Generated By System)'),
(34, '1,840.00', 2, 'Order Is Generated', 'Y', 4, 'MattTheLawyer', 'images/payments/yoo.png', '2022-03-20 12:00:03', 'Black', 'Order Has Been Generated.(This Is Auto-Generated By System)'),
(36, '550.00', 1, 'Order Is Generated', 'N', 6, 'MattTheLawyer', 'images/payments/llll.png', '2022-03-20 13:05:44', 'White', 'Order Has Been Generated.(This Is Auto-Generated By System)'),
(37, '300.00', 1, 'Order Is Generated', 'Y', 21, 'aina41', 'images/payments/ksksksakks.png', '2022-03-20 15:22:33', 'Grey', 'Payment Has Been Verified. '),
(38, '700.00', 1, 'Order Is Delivered', 'Y', 1, 'MattTheLawyer', 'images/payments/popo.png', '2022-03-20 23:22:45', 'White', 'Package Has Been Delivered To The Doorstep Of Buyer. Enjoy.'),
(41, '1,000.50', 1, 'Order Is Generated', 'N', 5, 'MattTheLawyer', 'images/payments/haha.png', '2022-03-22 23:56:11', 'Black', 'Order Has Been Generated.(This Is Auto-Generated By System)'),
(42, '1,100.00', 2, 'Order Is Generated', 'N', 6, 'Aimnkun12', 'images/payments/Da.png', '2022-03-22 14:50:38', 'White', 'Order Has Been Generated.(This Is Auto-Generated By System)'),
(43, '550.00', 1, 'Order Is Generated', 'N', 6, 'Aimnkun12', 'images/payments/ajsdjsadj.png', '2022-03-22 15:09:55', 'White', 'Order Has Been Generated.(This Is Auto-Generated By System)'),
(44, '1,840.00', 2, 'Order Is Generated', 'N', 4, 'KJ99', 'images/payments/cimblol.png', '2022-03-22 18:07:28', 'Black', 'Order Has Been Generated.(This Is Auto-Generated By System)'),
(45, '3,702.20', 4, 'Order Is Packing', 'N', 2, 'KJ99', 'images/payments/sadsadsad412.png', '2022-03-23 14:45:51', 'White', 'Order Has Been Packed. Will Be Delivered To A Shipping Van Soon.'),
(46, '550.00', 1, 'Order Is Generated', 'N', 6, 'KJ99', 'images/payments/sadsadsad412.png', '2022-03-23 14:46:41', 'White', 'Order Has Been Generated.(This Is Auto-Generated By System)');

-- --------------------------------------------------------

--
-- Table structure for table `havenseller`
--

CREATE TABLE `havenseller` (
  `SellerID` int(10) NOT NULL,
  `SellerUsername` varchar(20) NOT NULL,
  `SellerName` varchar(70) NOT NULL,
  `SellerEmail` varchar(50) NOT NULL,
  `SellerPhone` varchar(15) NOT NULL,
  `SellerVerificationStatus` varchar(1) NOT NULL,
  `SellerBank` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `havenseller`
--

INSERT INTO `havenseller` (`SellerID`, `SellerUsername`, `SellerName`, `SellerEmail`, `SellerPhone`, `SellerVerificationStatus`, `SellerBank`) VALUES
(1, 'NazaEnterprise', 'Naza Inc.', 'naza@gmail.com', '0193336677', 'N', 'Cimb - 1910371917492751'),
(2, 'orbstore99', 'Orb Store Incorporated', 'orbstore33@hotmail.com', '015-2839-951', 'N', 'RHB - 9012418214139752'),
(3, 'Henrykun99', 'Law Junwei', 'aina@mochi.com', '0128187813', 'N', 'CImb -132123213122'),
(4, 'Dmenaze44', 'Dhinesh A/L Ghanasegaran', 'dmenaze99@gmail.com', '012-7777-333', 'N', 'Maybank - 9209423742342847'),
(5, 'BikeLover22', 'Bike Enthusiast', 'bikeenthu@gmail.com', '017-2831-2431', 'N', 'Cimb - 1823812843123861');

-- --------------------------------------------------------

--
-- Table structure for table `havenuser`
--

CREATE TABLE `havenuser` (
  `UserID` int(10) NOT NULL,
  `UserUsername` varchar(20) NOT NULL,
  `UserName` varchar(70) NOT NULL,
  `UserEmail` varchar(50) NOT NULL,
  `UserPhone` varchar(15) NOT NULL,
  `UserAddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `havenuser`
--

INSERT INTO `havenuser` (`UserID`, `UserUsername`, `UserName`, `UserEmail`, `UserPhone`, `UserAddress`) VALUES
(1, 'MattTheLawyer', 'Matt Murdock', 'mattthelawyer@gmail.com', '0191212155', 'Jalan Helikopter, KLIA, Ampang, Selangor'),
(2, 'Aimnkun12', 'Aiman Bruh', 'aimanjakun@gmail.com', '016616337', 'Jalan Jalan, Persiaran 620 Apartment Bruh, 881091 Selangor Malaysia'),
(3, 'aina41', 'Aina Wahidah', 'puteri@yahoo.com', '019-5552-333', '8-1 Menara Kudrat Jalan Bilis, Selayang, Selangor'),
(4, 'KJ99', 'Khairy Jamaluddin', 'kj@gmail.com', '012-8138-121', 'No 99 Jalan Parliament, PWTC, Bangsar, Selangor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `havenaccount`
--
ALTER TABLE `havenaccount`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `havenbicycle`
--
ALTER TABLE `havenbicycle`
  ADD PRIMARY KEY (`BicycleID`);

--
-- Indexes for table `havenbot`
--
ALTER TABLE `havenbot`
  ADD PRIMARY KEY (`BotID`);

--
-- Indexes for table `havenorder`
--
ALTER TABLE `havenorder`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `havenseller`
--
ALTER TABLE `havenseller`
  ADD PRIMARY KEY (`SellerID`);

--
-- Indexes for table `havenuser`
--
ALTER TABLE `havenuser`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `havenaccount`
--
ALTER TABLE `havenaccount`
  MODIFY `AccountID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `havenbicycle`
--
ALTER TABLE `havenbicycle`
  MODIFY `BicycleID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `havenbot`
--
ALTER TABLE `havenbot`
  MODIFY `BotID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `havenorder`
--
ALTER TABLE `havenorder`
  MODIFY `OrderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `havenseller`
--
ALTER TABLE `havenseller`
  MODIFY `SellerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `havenuser`
--
ALTER TABLE `havenuser`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
