-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 06:27 AM
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
(1, 'AQUA TERRA'),
(2, 'DIVER 300M'),
(3, 'PLANET OCEAN 6000M'),
(4, 'HERITAGE MODELS');

-- --------------------------------------------------------

--
-- Table structure for table `watches`
--

CREATE TABLE `watches` (
  `watch_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `model_name` varchar(100) DEFAULT NULL,
  `sub_model` varchar(100) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `strap` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watches`
--

INSERT INTO `watches` (`watch_id`, `category_id`, `model_name`, `sub_model`, `size`, `material`, `strap`, `price`, `description`) VALUES
(1, 1, 'SEAMASTER', 'aquaTerra', '41 MM', 'Steel', 'Steel on Steel', 31600.00, 'The Seamaster Aqua Terra is a superb tribute to OMEGA’s rich maritime heritage. This 41 mm model has a symmetrical stainless-steel case with a screw-in caseback featuring a wave-edged design. It has a lacquered black varnish dial with rhodium-plated diamond-polished OMEGA logo, and date window at 6 o\'clock. The hands and hour markers, also rhodium-plated, are filled with white Super-LumiNova which emits a blue glow. The watch is presented on an integrated bracelet with polished central links and brushed external links and powered by OMEGA’s Co-Axial Master Chronometer calibre 8900, certified at the industry’s highest standard by the Swiss Federal Institute of Metrology (METAS).'),
(2, 1, 'SEAMASTER', 'aquaTerra', '41 MM', 'Steel', 'Steel on Rubber Strap', 28900.00, 'The Seamaster Aqua Terra is a superb tribute to OMEGA’s rich maritime heritage. In this 41mm model, the symmetrical case has been crafted from stainless steel, with a wave-edged design featured on the back. The silvery dial is distinguished by a horizontal “teak” pattern which is inspired by the wooden decks of luxury sailboats. There is also a date window at 6 o\'clock and blackened hands and indexes filled with white Super-LumiNova. Orange is used for the central seconds hand, the \"Seamaster\" wording and the four quarter numbers on the minute track. The grey strap is made from structured rubber and includes grey lining and an additional stainless steel link which integrates it to the case. This certified chronometer is powered by the OMEGA Master Chronometer calibre 8900, certified at the industry’s highest standard by the Swiss Federal Institute of Metrology (METAS).'),
(3, 1, 'SEAMASTER', 'aquaTerra', '41 MM', 'Steel', 'Steel on Steel', 30000.00, 'The Seamaster Aqua Terra is a superb tribute to OMEGA’s rich maritime heritage. In this 41mm model, the symmetrical case has been crafted from stainless steel, with a wave-edged design featured on the back. The silvery dial is distinguished by a horizontal “teak” pattern which is inspired by the wooden decks of luxury sailboats. There is also a date window at 6 o\'clock and blackened hands and indexes filled with white Super-LumiNova. Orange is used for the central seconds hand, the \"Seamaster\" wording and the four quarter numbers on the minute track. Presented on a polished and brushed bracelet, this certified chronometer is powered by the OMEGA Master Chronometer calibre 8900, certified at the industry’s highest standard by the Swiss Federal Institute of Metrology (METAS).'),
(4, 1, 'SEAMASTER', 'aquaTerra', '41 MM', 'Steel', 'Steel on Leather Strap', 28350.00, 'The Seamaster Aqua Terra is a superb tribute to OMEGA’s rich maritime heritage. In this 41mm model, the symmetrical case has been crafted from stainless steel, with a wave-edged design featured on the back. The green dial is sun-brushed and is distinguished by a horizontal “teak” pattern which is inspired by the wooden decks of luxury sailboats. There is also a date window at 6 o\'clock and rhodium-plated hands and indexes filled with white Super-LumiNova. Presented on a green leather strap, this timepiece is powered by the OMEGA Master Chronometer calibre 8900, certified at the industry’s highest standard by the Swiss Federal Institute of Metrology (METAS).'),
(5, 2, 'SEAMASTER', 'diver', '42 MM', 'Steel', 'Steel on Rubber Strap', 26700.00, 'Since 1993, the Seamaster Professional Diver 300M has enjoyed a legendary following. Today’s modern collection has embraced that famous ocean heritage and updated it with OMEGA’s best innovation and design. This 42 mm model is crafted from stainless steel and includes a black ceramic bezel with a white enamel diving scale. The dial is also polished black ceramic and features laser-engraved waves and a date window at 6 o’clock. The skeleton hands and raised indexes are rhodium-plated and are filled with white Super-LumiNova, while the helium escape valve has been given a conical design. The watch is presented on a black rubber strap and is driven by the OMEGA Master Chronometer Calibre 8800, which can be seen through the sapphire-crystal on the wave-edged caseback.'),
(6, 2, 'SEAMASTER', 'diver', '42 MM', 'Titanium', 'Titanium on Titanium', 47950.00, 'Identical to 007\'s watch in No Time To Die this 42mm Seamaster, in strong yet lightwatch_case_weight Grade 2 Titanium, sports a brown tropical aluminium bezel ring and dial. Slightly slimmer than the standard Diver 300M models thanks to the doming of the sapphire-crystal glass, it is presented on a Grade 2 Titanium mesh bracelet with innovative adjustable buckle. The 007-edition Diver is powered by OMEGA\'s Co-Axial Master Chronometer 8806, which has achieved the industry’s highest standards of precision, chronometric performance - and of course - magnetic resistance.'),
(7, 2, 'SEAMASTER', 'diver', '42 MM', 'Titanium', 'Titanium on NATO Strap', 42500.00, 'Identical to 007\'s watch in No Time To Die this 42mm Seamaster, in strong yet lightwatch_case_weight Grade 2 Titanium, sports a brown tropical aluminium bezel ring and dial. Slightly slimmer than the standard Diver 300M models thanks to the doming of the sapphire-crystal glass, it is presented on a striped NATO strap in brown, grey and beige with 007 engraved on a titanium loop. The 007-edition Diver is powered by OMEGA\'s Co-Axial Master Chronometer 8806, which has achieved the industry’s highest standards of precision, chronometric performance - and of course - magnetic resistance.'),
(8, 2, 'SEAMASTER', 'diver', '42 MM', 'Steel', 'Steel on Steel', 33800.00, 'In line with the brand’s deep connection to the sea, OMEGA is a proud partner to Nekton, a not-for-profit research foundation committed to the protection and management of the world’s oceans. This 42 mm Seamaster Diver 300M, released in support of Nekton, has a polished-brushed stainless steel case and laser ablated black ceramic [ZrO2] dial, matt finished with polished waves in positive relief. The uni-directional rotating bezel is in grade 5 titanium and features a laser ablated diving scale. The caseback, embossed with the Nekton submarine medallion, is oriented with OMEGA’s innovative NAIAD LOCK. On this model, a stainless steel bracelet gives the divers’ watch a dressier look. Powering OMEGA’s tribute to Nekton is the exceptional Master Chronometer Calibre 8806. Tested and approved at the industry’s highest level.'),
(9, 3, 'SEAMASTER', 'planetOcean', '45.5 MM', 'O‑MEGASTEEL', 'O‑MEGASTEEL', 62150.00, 'As part of the Five Deeps Expedition in 2019, the Ultra Deep concept watch made history when it reached the deepest place on Earth. Following that World Record dive, OMEGA produced a collection for everyday adventurers. A watch tested in real ocean conditions during its development, water-resistant to 6,000 metres (20,000 ft.), and meeting the ISO 6425:2018 standard for saturation divers’ watches, as certified by the Swiss Federal Institute of Metrology (METAS).\n\nThis 45.5 mm model has a case and bracelet in robust O-MEGASTEEL and an extraordinary dial that pays homage to the mysteries of the deep. Its pattern is an accurate representation of the bottom of the Challenger Deep, the deepest point in the Mariana Trench, mapped by the Five Deeps team using almost one million sonar points. Its lacquered finish, produced by letting an ocean of lacquer flow across the dial, has a beautiful sense of depth. The dial even has a playful side. Shining a UV light reveals the words, OMEGA WAS HERE, pointing toward the world record dive of 10,935 metres (35,876 ft.) and showing the Western, Central and Eastern Pools.\n\nThe caseback has a laser-engraved commemorative Seamaster logo depicting a trident-bearing Poseidon and two seahorses: OMEGA’s 1956 original and the brand’s current design. Behind which sits the OMEGA Co-Axial Master Chronometer calibre 8912.'),
(10, 3, 'SEAMASTER', 'planetOcean', '45.5 MM', 'O‑MEGASTEEL', 'O‑MEGASTEEL', 60500.00, 'As part of the Five Deeps Expedition in 2019, the Ultra Deep made history when it reached the deepest place on Earth. Following that World Record dive, the game-changing watch has now been adapted for a unique collection available to the public. Tested in real ocean conditions during its development, the design is water-resistant to 6,000 metres (20,000 ft.) and meets the ISO 6425:2018 standard for saturation divers’ watches.\n\nThis 45.5 mm model in robust O-MEGASTEEL features a polished black ceramic bezel with its diving scale in Liquidmetal™. Through the protuberant and domed sapphire crystal, the lacquered gradient dial transitions from blue to black, and has been given 18K white gold hands and hour markers, which are all coated with white Super-LumiNova.\n\nThe watch is set on an O-MEGASTEEL bracelet with OMEGA’s patented extendable foldover rack-and-pusher with complementary length adjustment and an extra diver extension, while on the caseback\'s Grade 5 titanium medallion, there is a laser-engraved Sonar emblem with the iconic OMEGA Seahorse at its centre. Inside, the watch is driven by the OMEGA Co-Axial Master Chronometer Calibre 8912.'),
(11, 3, 'SEAMASTER', 'planetOcean', '45.5 MM', 'O‑MEGASTEEL', 'Rubber Strap', 58850.00, 'As part of the Five Deeps Expedition in 2019, the Ultra Deep made history when it reached the deepest place on Earth. Following that World Record dive, the game-changing watch has now been adapted for a unique collection available to the public. Tested in real ocean conditions during its development, the design is water-resistant to 6,000 metres (20,000 ft.) and meets the ISO 6425:2018 standard for saturation divers’ watches.\n\nThis 45.5 mm model in robust O-MEGASTEEL features a polished black ceramic bezel with its diving scale in Liquidmetal™. Through the protuberant and domed sapphire crystal, the lacquered gradient dial transitions from blue to black, and has been given 18K white gold hands and hour markers, which are all coated with white Super-LumiNova.\n\nThe watch is set on a rubber strap with cyan lining and an O-MEGASTEEL buckle, while on the caseback\'s Grade 5 titanium medallion, there is a laser-engraved Sonar emblem with the iconic OMEGA Seahorse at its centre. Inside, the watch is driven by the OMEGA Co-Axial Master Chronometer Calibre 8912.'),
(12, 3, 'SEAMASTER', 'planetOcean', '45.5 MM', 'Titanium', 'NATO Strap', 64850.00, 'As part of the Five Deeps Expedition in 2019, the Ultra Deep made history when it reached the deepest place on Earth. Following that World Record dive, the game-changing watch has now been adapted for a unique collection available to the public. Tested in real ocean conditions during its development, the design is water-resistant to 6,000 metres (20,000 ft.) and meets the ISO 6425:2018 standard for saturation divers’ watches.\n\nThis 45.5 mm model in sand-blasted Grade 5 Titanium features a brushed black ceramic bezel ring with its diving scale in Liquidmetal™. Through the protuberant and domed sapphire crystal, there is a black ceramised Grade 5 titanium dial with a gradient white-to-cyan central seconds hand, cyan Arabic numerals, as well as 18K white gold hour/minute hands and hour markers, which are all coated with white Super-LumiNova.\n\nThe watch includes distinctive “Manta Lugs” at each end of the case, which hold on to a striped black and cyan polyamide NATO strap with a loop and buckle in Grade 5 Titanium. On the caseback, there is a Grade 5 titanium medallion, laser-engraved with a Sonar emblem featuring the iconic OMEGA Seahorse at its centre. Inside, the watch is driven by the OMEGA Co-Axial Master Chronometer Calibre 8912.'),
(13, 4, 'SEAMASTER', 'seamaster', '41 MM', 'Steel', 'Steel on Steel', 35450.00, 'This 41 mm Seamaster 300, with its symmetrical case in polished and brushed stainless steel, has a matching bracelet.\n\nThe varnished dial, in OMEGA’s own Summer Blue, has a gradient finish to reflect the watch’s level of water resistance. In keeping with the colour code, OMEGA has filled the rhodium-plated hands, recessed hour markers, and open numerals with a unique light blue Super-LumiNova.\n\nTurning the watch over reveals a stamped commemorative Seamaster logo depicting a trident-bearing Poseidon and two seahorses: OMEGA’s 1956 original and the brand’s current design. Behind which sits OMEGA’s Co-Axial Master Chronometer calibre 8912, certified at the industry’s highest level by the Swiss Federal Institute of Metrology (METAS).'),
(14, 4, 'SEAMASTER', 'seamaster', '41 MM', 'Steel', 'Leather Strap', 32150.00, 'OMEGA first introduced the Seamaster 300 in 1957 - designed especially for divers and professionals who worked underwater. More than 60 years later, the timepiece has been completely upgraded with an enhanced form that is ready for a new generation of adventurers.\n\nThis 41 mm stainless steel model includes a blue dial and a blue oxalic anodized aluminium bezel with its diving scale filled with vintage Super-LumiNova. The recessed hour markers and open numerals feature Super-LumiNova, which is also present on the rhodium-plated hands.\n\nPresented on a beige leather strap, this timepiece includes a transparent sapphire crystal caseback, enabling a clear view of the OMEGA Co-Axial Master Chronometer Calibre 8912.'),
(15, 4, 'SEAMASTER', 'seamaster', '41 MM', 'Steel', 'Steel on Steel', 33800.00, 'OMEGA first introduced the Seamaster 300 in 1957 - designed especially for divers and professionals who worked underwater. More than 60 years later, the timepiece has been completely upgraded with an enhanced form that is ready for a new generation of adventurers.\n\nThis 41 mm stainless steel model includes a blue dial and a blue oxalic anodized aluminium bezel with its diving scale filled with vintage Super-LumiNova. The recessed hour markers and open numerals feature Super-LumiNova, which is also present on the rhodium-plated hands.\n\nPresented on an ergonomic stainless steel bracelet, this timepiece includes a transparent sapphire crystal caseback, enabling a clear view of the OMEGA Co-Axial Master Chronometer Calibre 8912.'),
(16, 4, 'SEAMASTER', 'seamaster', '41 MM', 'Steel', 'Leather Strap', 32150.00, 'OMEGA first introduced the Seamaster 300 in 1957 - designed especially for divers and professionals who worked underwater. More than 60 years later, the timepiece has been completely upgraded with an enhanced form that is ready for a new generation of adventurers.\n\nThis 41 mm stainless steel model includes a black dial and a black oxalic anodized aluminium bezel with its diving scale filled with vintage Super-LumiNova. The recessed hour markers and open numerals feature Super-LumiNova, which is also present on the rhodium-plated hands.\n\nPresented on a brown leather strap, this timepiece includes a transparent sapphire crystal caseback, enabling a clear view of the OMEGA Co-Axial Master Chronometer Calibre 8912.');

-- --------------------------------------------------------

--
-- Table structure for table `watch_images`
--

CREATE TABLE `watch_images` (
  `image_id` int(11) NOT NULL,
  `watch_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `watch_images`
--

INSERT INTO `watch_images` (`image_id`, `watch_id`, `image_path`) VALUES
(1, 1, 'productPic/aquaTerra1.avif'),
(2, 2, 'productPic/aquaTerra2.avif'),
(3, 3, 'productPic/aquaTerra3.avif'),
(4, 4, 'productPic/aquaTerra4.avif'),
(5, 5, 'productPic/diver1.avif'),
(6, 6, 'productPic/diver2.avif'),
(7, 7, 'productPic/diver3.png'),
(8, 8, 'productPic/diver4.avif'),
(9, 9, 'productPic/planetOcean1.avif'),
(10, 10, 'productPic/planetOcean2.avif'),
(11, 11, 'productPic/planetOcean3.avif'),
(12, 12, 'productPic/planetOcean4.avif'),
(13, 13, 'productPic/seamaster1.avif'),
(14, 14, 'productPic/seamaster2.avif'),
(15, 15, 'productPic/seamaster3.avif'),
(16, 16, 'productPic/seamaster4.avif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `watches`
--
ALTER TABLE `watches`
  ADD PRIMARY KEY (`watch_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `watch_images`
--
ALTER TABLE `watch_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `watch_id` (`watch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `watches`
--
ALTER TABLE `watches`
  MODIFY `watch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `watch_images`
--
ALTER TABLE `watch_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `watches`
--
ALTER TABLE `watches`
  ADD CONSTRAINT `watches_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `watch_images`
--
ALTER TABLE `watch_images`
  ADD CONSTRAINT `watch_images_ibfk_1` FOREIGN KEY (`watch_id`) REFERENCES `watches` (`watch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
