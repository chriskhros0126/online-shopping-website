-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2024 at 07:04 AM
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
-- Database: `dbonlineshoppingwebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_password_resets`
--

INSERT INTO `admin_password_resets` (`admin_id`, `email`, `token`, `expires`) VALUES
(0, 'admin2@alpha.com', '3c121c7cc0289754b802c6fa307844b0', 1726380018),
(0, 'admin2@alpha.com', 'fbca9ff10184b341e966a38c46472389', 1726380127);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin1', '$2y$10$Ot73FiIIm7p1LyLzTRRncucMK5JT.XZ8.V52kT5sIouO42ntcF8kK', 'admin1@alpha.com', '2024-09-15 02:58:18'),
(2, 'admin2', '$2y$10$ew9RoG.h9heUYI0e6092oO9xylbsvRX387l432ONQKKjJIBJAU1pm', 'admin2@alpha.com', '2024-09-15 03:06:28'),
(3, 'admin3', '$2y$10$UQ9.7Lj7NeSSqy8N1ra48.Hz/Fd5XhXlViTImhv5V94FRhCtbyLOS', 'admin3@alpha.com', '2024-09-15 03:08:14'),
(4, 'admin4', '$2y$10$mFODLrTdte2nbjBVDAQtiOCcfx9t8Kj5HlJiJxOGydeBDGmj3Cpmy', 'admin4@alpha.com', '2024-09-15 03:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `watch_id` int(11) NOT NULL,
  `quantity` int(2) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Aqua Terra'),
(2, 'Diver 300M'),
(3, 'Planet Ocean 6000M'),
(4, 'Heritage Models');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `expires`) VALUES
(1, 'yongchernghann123@gmail.com', 'c19a0327ef95cd95902c09c1de4ef22550afe60adb49fa1a0b6df887208aba5f7018e12f029b08b05934d557a4fb201bcaca', 1726370023),
(2, 'yongchernghann123@gmail.com', '0ef289cfb29a1336cb90a9a2e126823452a0def05988c3393b6b309878ebfe3261107341546298153534ff69a94357a5c296', 1726370117),
(4, 'yongchernghann123@gmail.com', 'cb0214800b1dbf89c67343de6e90ac6a48872d424148367f0bf849eb3d88a227af5f12abb8b5cedb31d8e64254bccffecb93', 1726376483),
(8, 'ych@gmail.com', '18a122e801f3aa0eda3be25ddccb6cfc', 1726378706),
(9, 'ych@gmail.com', 'b4888cd9900146abc4e2ba235b97598b', 1726378794),
(10, 'ych@gmail.com', '056c7935092f5fdff5889b3753a6318e', 1726378798),
(11, 'yongchernghann123@gmail.com', '69955a17c5deb31c8d574af36ba64018', 1726378804),
(12, 'yongchernghann123@gmail.com', '930cacf7a89e9f890277d2b1da87719a', 1726378863),
(13, 'ych@gmail.com', 'aa6d4f30fae79b570e06582cee8cc2fc', 1726378905),
(14, 'ych@gmail.com', '81fbb089ecfe6a81b67bd14bde7b07f8', 1726378920),
(15, 'ych@gmail.com', '57cb692bf1858ac1b863c5c9921feff0', 1726378923),
(16, 'ych@gmail.com', '8574d6a8b49a272f4120399c62c937d0', 1726378928),
(17, 'ych@gmail.com', 'd46ab6398c525e9b8617b59c8aaa2d19', 1726378955),
(18, 'ych@gmail.com', '2183841bdfaedfd762451b8ce84bcc9c', 1726379088),
(19, 'ych@gmail.com', 'd6706d60edbe6e8258d2ef147a4ae106', 1726379091),
(20, 'ych@gmail.com', '82b5f2df5f282ada9ace59ace679f368', 1726379105),
(21, 'ych@gmail.com', '471473eb47f9c24209f8afc9ec8b2c72', 1726379111),
(22, 'ych@gmail.com', '49867d973b85c3015152a7ee238d5274', 1726379190),
(23, 'ych@gmail.com', '86464229aa24c2e6caa41ebbf439d2e8', 1726379192),
(24, 'ych@gmail.com', '2561de527858a1f94019b1de4ea039f2', 1726379195),
(25, 'ych@gmail.com', '9efb2f93b26cdf59bd40192f9adb9ed1', 1726379334);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'ychhhh', 'ychhhhh@gmial.com', '$2y$10$lYj9EVcdhx082Lqp0jkapO5OR3vK8UztizwhdoM/bG1BkpeMLIHrS', '2024-09-10 20:19:43'),
(2, 'ych', 'ych@gmail.com', '$2y$10$kra8CdYRC97OOWtlsCGpee/Pkow3D8oQ3fkqQDxRMkPNRqBEDlbBq', '2024-09-10 20:24:12'),
(3, 'abc', 'abc@gmail.com', '$2y$10$yoQzO2DOgqHva03rwB7sBu8d40F0Z6a1Xd9HnDFVn5L7fY3CX/V2q', '2024-09-10 20:30:59'),
(4, 'hihi', 'hihi@gmail.com', '$2y$10$hwGvDj86RDid97hQ8TQ3TOmEZz8Esv06WPn85BURVtO.SnR7vJ0Gq', '2024-09-10 20:32:33'),
(5, 'admin1', 'admin1@alpha.com', '$2y$10$YPvqk5TBRcUYlpRLbpvuh.OX4nGt3OE5n5DlSTG3b914U.ftobxpK', '2024-09-10 21:14:05'),
(9, 'chris', 'chriskhros0126@gmail.com', '$2y$10$9S3ToYO3xFv4A9j5TwPU4O1.00IUEQwoPH1Qb/at9QSfoHEsvw8mO', '2024-09-12 02:24:31'),
(10, 'yongchernghann', 'yongchernghann123@gmail.com', '$2y$10$/54pdRfErkl6giQ4zPzXMOGZhB.VN.LlSTxB4gazCXW6rk5AJmxe2', '2024-09-15 02:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `watches`
--

CREATE TABLE `watches` (
  `watch_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_model` varchar(100) DEFAULT NULL,
  `size` double(5,1) DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `strap` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watches`
--

INSERT INTO `watches` (`watch_id`, `category_id`, `sub_model`, `size`, `material`, `strap`, `price`, `description`, `image_path`) VALUES
(1, 1, 'Aqua Terra', 41.0, 'Steel', 'Steel on Steel', 31600.00, 'The Seamaster Aqua Terra is a superb tribute to OMEGA’s rich maritime heritage. This 41 mm model has a symmetrical stainless-steel case with a screw-in caseback featuring a wave-edged design. It has a lacquered black varnish dial with rhodium-plated diamond-polished OMEGA logo, and date window at 6 o\'clock. The hands and hour markers, also rhodium-plated, are filled with white Super-LumiNova which emits a blue glow. The watch is presented on an integrated bracelet with polished central links and brushed external links and powered by OMEGA’s Co-Axial Master Chronometer calibre 8900, certified at the industry’s highest standard by the Swiss Federal Institute of Metrology (METAS).', 'productPic/aquaTerra1.avif'),
(2, 1, 'Aqua Terra', 41.0, 'Steel', 'Steel on Rubber Strap', 28900.00, 'The Seamaster Aqua Terra is a superb tribute to OMEGA’s rich maritime heritage. In this 41mm model, the symmetrical case has been crafted from stainless steel, with a wave-edged design featured on the back. The silvery dial is distinguished by a horizontal “teak” pattern which is inspired by the wooden decks of luxury sailboats. There is also a date window at 6 o\'clock and blackened hands and indexes filled with white Super-LumiNova. Orange is used for the central seconds hand, the \"Seamaster\" wording and the four quarter numbers on the minute track. The grey strap is made from structured rubber and includes grey lining and an additional stainless steel link which integrates it to the case. This certified chronometer is powered by the OMEGA Master Chronometer calibre 8900, certified at the industry’s highest standard by the Swiss Federal Institute of Metrology (METAS).', 'productPic/aquaTerra2.avif'),
(3, 1, 'Aqua Terra', 41.0, 'Steel', 'Steel on Steel', 30000.00, 'The Seamaster Aqua Terra is a superb tribute to OMEGA’s rich maritime heritage. In this 41mm model, the symmetrical case has been crafted from stainless steel, with a wave-edged design featured on the back. The silvery dial is distinguished by a horizontal “teak” pattern which is inspired by the wooden decks of luxury sailboats. There is also a date window at 6 o\'clock and blackened hands and indexes filled with white Super-LumiNova. Orange is used for the central seconds hand, the \"Seamaster\" wording and the four quarter numbers on the minute track. Presented on a polished and brushed bracelet, this certified chronometer is powered by the OMEGA Master Chronometer calibre 8900, certified at the industry’s highest standard by the Swiss Federal Institute of Metrology (METAS).', 'productPic/aquaTerra3.avif'),
(4, 1, 'Aqua Terra', 41.0, 'Steel', 'Steel on Leather Strap', 28350.00, 'The Seamaster Aqua Terra is a superb tribute to OMEGA’s rich maritime heritage. In this 41mm model, the symmetrical case has been crafted from stainless steel, with a wave-edged design featured on the back. The green dial is sun-brushed and is distinguished by a horizontal “teak” pattern which is inspired by the wooden decks of luxury sailboats. There is also a date window at 6 o\'clock and rhodium-plated hands and indexes filled with white Super-LumiNova. Presented on a green leather strap, this timepiece is powered by the OMEGA Master Chronometer calibre 8900, certified at the industry’s highest standard by the Swiss Federal Institute of Metrology (METAS).', 'productPic/aquaTerra4.avif'),
(5, 2, 'Diver', 42.0, 'Steel', 'Steel on Rubber Strap', 26700.00, 'Since 1993, the Seamaster Professional Diver 300M has enjoyed a legendary following. Today’s modern collection has embraced that famous ocean heritage and updated it with OMEGA’s best innovation and design. This 42 mm model is crafted from stainless steel and includes a black ceramic bezel with a white enamel diving scale. The dial is also polished black ceramic and features laser-engraved waves and a date window at 6 o’clock. The skeleton hands and raised indexes are rhodium-plated and are filled with white Super-LumiNova, while the helium escape valve has been given a conical design. The watch is presented on a black rubber strap and is driven by the OMEGA Master Chronometer Calibre 8800, which can be seen through the sapphire-crystal on the wave-edged caseback.', 'productPic/diver1.avif'),
(6, 2, 'Diver', 42.0, 'Titanium', 'Titanium on Titanium', 47950.00, 'Identical to 007\'s watch in No Time To Die this 42mm Seamaster, in strong yet lightwatch_case_weight Grade 2 Titanium, sports a brown tropical aluminium bezel ring and dial. Slightly slimmer than the standard Diver 300M models thanks to the doming of the sapphire-crystal glass, it is presented on a Grade 2 Titanium mesh bracelet with innovative adjustable buckle. The 007-edition Diver is powered by OMEGA\'s Co-Axial Master Chronometer 8806, which has achieved the industry’s highest standards of precision, chronometric performance - and of course - magnetic resistance.', 'productPic/diver2.avif'),
(7, 2, 'Diver', 42.0, 'Titanium', 'Titanium on NATO Strap', 42500.00, 'Identical to 007\'s watch in No Time To Die this 42mm Seamaster, in strong yet lightwatch_case_weight Grade 2 Titanium, sports a brown tropical aluminium bezel ring and dial. Slightly slimmer than the standard Diver 300M models thanks to the doming of the sapphire-crystal glass, it is presented on a striped NATO strap in brown, grey and beige with 007 engraved on a titanium loop. The 007-edition Diver is powered by OMEGA\'s Co-Axial Master Chronometer 8806, which has achieved the industry’s highest standards of precision, chronometric performance - and of course - magnetic resistance.', 'productPic/diver3.png'),
(8, 2, 'Diver', 42.0, 'Steel', 'Steel on Steel', 33800.00, 'In line with the brand’s deep connection to the sea, OMEGA is a proud partner to Nekton, a not-for-profit research foundation committed to the protection and management of the world’s oceans. This 42 mm Seamaster Diver 300M, released in support of Nekton, has a polished-brushed stainless steel case and laser ablated black ceramic [ZrO2] dial, matt finished with polished waves in positive relief. The uni-directional rotating bezel is in grade 5 titanium and features a laser ablated diving scale. The caseback, embossed with the Nekton submarine medallion, is oriented with OMEGA’s innovative NAIAD LOCK. On this model, a stainless steel bracelet gives the divers’ watch a dressier look. Powering OMEGA’s tribute to Nekton is the exceptional Master Chronometer Calibre 8806. Tested and approved at the industry’s highest level.', 'productPic/diver4.avif'),
(9, 3, 'Planet Ocean', 45.5, 'O‑MEGASTEEL', 'O‑MEGASTEEL', 62150.00, 'As part of the Five Deeps Expedition in 2019, the Ultra Deep concept watch made history when it reached the deepest place on Earth. Following that World Record dive, OMEGA produced a collection for everyday adventurers. A watch tested in real ocean conditions during its development, water-resistant to 6,000 metres (20,000 ft.), and meeting the ISO 6425:2018 standard for saturation divers’ watches, as certified by the Swiss Federal Institute of Metrology (METAS).\n\nThis 45.5 mm model has a case and bracelet in robust O-MEGASTEEL and an extraordinary dial that pays homage to the mysteries of the deep. Its pattern is an accurate representation of the bottom of the Challenger Deep, the deepest point in the Mariana Trench, mapped by the Five Deeps team using almost one million sonar points. Its lacquered finish, produced by letting an ocean of lacquer flow across the dial, has a beautiful sense of depth. The dial even has a playful side. Shining a UV light reveals the words, OMEGA WAS HERE, pointing toward the world record dive of 10,935 metres (35,876 ft.) and showing the Western, Central and Eastern Pools.\n\nThe caseback has a laser-engraved commemorative Seamaster logo depicting a trident-bearing Poseidon and two seahorses: OMEGA’s 1956 original and the brand’s current design. Behind which sits the OMEGA Co-Axial Master Chronometer calibre 8912.', 'productPic/planetOcean1.avif'),
(10, 3, 'Planet Ocean', 45.5, 'O‑MEGASTEEL', 'O‑MEGASTEEL', 60500.00, 'As part of the Five Deeps Expedition in 2019, the Ultra Deep made history when it reached the deepest place on Earth. Following that World Record dive, the game-changing watch has now been adapted for a unique collection available to the public. Tested in real ocean conditions during its development, the design is water-resistant to 6,000 metres (20,000 ft.) and meets the ISO 6425:2018 standard for saturation divers’ watches.\n\nThis 45.5 mm model in robust O-MEGASTEEL features a polished black ceramic bezel with its diving scale in Liquidmetal™. Through the protuberant and domed sapphire crystal, the lacquered gradient dial transitions from blue to black, and has been given 18K white gold hands and hour markers, which are all coated with white Super-LumiNova.\n\nThe watch is set on an O-MEGASTEEL bracelet with OMEGA’s patented extendable foldover rack-and-pusher with complementary length adjustment and an extra diver extension, while on the caseback\'s Grade 5 titanium medallion, there is a laser-engraved Sonar emblem with the iconic OMEGA Seahorse at its centre. Inside, the watch is driven by the OMEGA Co-Axial Master Chronometer Calibre 8912.', 'productPic/planetOcean2.avif'),
(11, 3, 'Planet Ocean', 45.5, 'O‑MEGASTEEL', 'Rubber Strap', 58850.00, 'As part of the Five Deeps Expedition in 2019, the Ultra Deep made history when it reached the deepest place on Earth. Following that World Record dive, the game-changing watch has now been adapted for a unique collection available to the public. Tested in real ocean conditions during its development, the design is water-resistant to 6,000 metres (20,000 ft.) and meets the ISO 6425:2018 standard for saturation divers’ watches.\n\nThis 45.5 mm model in robust O-MEGASTEEL features a polished black ceramic bezel with its diving scale in Liquidmetal™. Through the protuberant and domed sapphire crystal, the lacquered gradient dial transitions from blue to black, and has been given 18K white gold hands and hour markers, which are all coated with white Super-LumiNova.\n\nThe watch is set on a rubber strap with cyan lining and an O-MEGASTEEL buckle, while on the caseback\'s Grade 5 titanium medallion, there is a laser-engraved Sonar emblem with the iconic OMEGA Seahorse at its centre. Inside, the watch is driven by the OMEGA Co-Axial Master Chronometer Calibre 8912.', 'productPic/planetOcean3.avif'),
(12, 3, 'Planet Ocean', 45.5, 'Titanium', 'NATO Strap', 64850.00, 'As part of the Five Deeps Expedition in 2019, the Ultra Deep made history when it reached the deepest place on Earth. Following that World Record dive, the game-changing watch has now been adapted for a unique collection available to the public. Tested in real ocean conditions during its development, the design is water-resistant to 6,000 metres (20,000 ft.) and meets the ISO 6425:2018 standard for saturation divers’ watches.\n\nThis 45.5 mm model in sand-blasted Grade 5 Titanium features a brushed black ceramic bezel ring with its diving scale in Liquidmetal™. Through the protuberant and domed sapphire crystal, there is a black ceramised Grade 5 titanium dial with a gradient white-to-cyan central seconds hand, cyan Arabic numerals, as well as 18K white gold hour/minute hands and hour markers, which are all coated with white Super-LumiNova.\n\nThe watch includes distinctive “Manta Lugs” at each end of the case, which hold on to a striped black and cyan polyamide NATO strap with a loop and buckle in Grade 5 Titanium. On the caseback, there is a Grade 5 titanium medallion, laser-engraved with a Sonar emblem featuring the iconic OMEGA Seahorse at its centre. Inside, the watch is driven by the OMEGA Co-Axial Master Chronometer Calibre 8912.', 'productPic/planetOcean4.avif'),
(13, 4, 'Seamaster', 41.0, 'Steel', 'Steel on Steel', 35450.00, 'This 41 mm Seamaster 300, with its symmetrical case in polished and brushed stainless steel, has a matching bracelet.\n\nThe varnished dial, in OMEGA’s own Summer Blue, has a gradient finish to reflect the watch’s level of water resistance. In keeping with the colour code, OMEGA has filled the rhodium-plated hands, recessed hour markers, and open numerals with a unique light blue Super-LumiNova.\n\nTurning the watch over reveals a stamped commemorative Seamaster logo depicting a trident-bearing Poseidon and two seahorses: OMEGA’s 1956 original and the brand’s current design. Behind which sits OMEGA’s Co-Axial Master Chronometer calibre 8912, certified at the industry’s highest level by the Swiss Federal Institute of Metrology (METAS).', 'productPic/seamaster1.avif'),
(14, 4, 'Seamaster', 41.0, 'Steel', 'Leather Strap', 32150.00, 'OMEGA first introduced the Seamaster 300 in 1957 - designed especially for divers and professionals who worked underwater. More than 60 years later, the timepiece has been completely upgraded with an enhanced form that is ready for a new generation of adventurers.\n\nThis 41 mm stainless steel model includes a blue dial and a blue oxalic anodized aluminium bezel with its diving scale filled with vintage Super-LumiNova. The recessed hour markers and open numerals feature Super-LumiNova, which is also present on the rhodium-plated hands.\n\nPresented on a beige leather strap, this timepiece includes a transparent sapphire crystal caseback, enabling a clear view of the OMEGA Co-Axial Master Chronometer Calibre 8912.', 'productPic/seamaster2.avif'),
(15, 4, 'Seamaster', 41.0, 'Steel', 'Steel on Steel', 33800.00, 'OMEGA first introduced the Seamaster 300 in 1957 - designed especially for divers and professionals who worked underwater. More than 60 years later, the timepiece has been completely upgraded with an enhanced form that is ready for a new generation of adventurers.\n\nThis 41 mm stainless steel model includes a blue dial and a blue oxalic anodized aluminium bezel with its diving scale filled with vintage Super-LumiNova. The recessed hour markers and open numerals feature Super-LumiNova, which is also present on the rhodium-plated hands.\n\nPresented on an ergonomic stainless steel bracelet, this timepiece includes a transparent sapphire crystal caseback, enabling a clear view of the OMEGA Co-Axial Master Chronometer Calibre 8912.', 'productPic/seamaster3.avif'),
(16, 4, 'Seamaster', 41.0, 'Steel', 'Leather Strap', 32150.00, 'OMEGA first introduced the Seamaster 300 in 1957 - designed especially for divers and professionals who worked underwater. More than 60 years later, the timepiece has been completely upgraded with an enhanced form that is ready for a new generation of adventurers.\n\nThis 41 mm stainless steel model includes a black dial and a black oxalic anodized aluminium bezel with its diving scale filled with vintage Super-LumiNova. The recessed hour markers and open numerals feature Super-LumiNova, which is also present on the rhodium-plated hands.\n\nPresented on a brown leather strap, this timepiece includes a transparent sapphire crystal caseback, enabling a clear view of the OMEGA Co-Axial Master Chronometer Calibre 8912.', 'productPic/seamaster4.avif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_fk` (`user_id`),
  ADD KEY `watch_fk` (`watch_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `watches`
--
ALTER TABLE `watches`
  ADD PRIMARY KEY (`watch_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `watches`
--
ALTER TABLE `watches`
  MODIFY `watch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `watch_fk` FOREIGN KEY (`watch_id`) REFERENCES `watches` (`watch_id`);

--
-- Constraints for table `watches`
--
ALTER TABLE `watches`
  ADD CONSTRAINT `watches_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
