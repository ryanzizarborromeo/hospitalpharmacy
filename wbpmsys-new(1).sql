-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2016 at 11:44 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wbpmsys-new`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblannouncements`
--

CREATE TABLE `tblannouncements` (
  `AID` int(11) NOT NULL,
  `UID` int(11) DEFAULT NULL,
  `Content` text,
  `DateAdded` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblannouncements`
--

INSERT INTO `tblannouncements` (`AID`, `UID`, `Content`, `DateAdded`) VALUES
(13, 12, 'The Minister for Health and Aged Care, Sussan Ley and Assistant Minister for Health and Aged Care, Ken Wyatt AM MP have welcomed the release of the Aged Care Complaints Commissionerâ€™s first annual report today.', 1475842910),
(15, 12, 'Existing and prospective aged care providers are encouraged to apply for allocations from the more than 10,000 national residential aged care places and 475 Short-Term Restorative Care places for 2016-17.', 1475842983),
(16, 12, 'A new snapshot of Australiaâ€™s health has found we are living longer than ever before, but the rise of chronic disease still presents challenges in achieving equal health outcomes for Indigenous Australians and people living outside metropolitan areas.', 1475843045),
(17, 12, 'More than 2000 medicine brands treating common conditions will drop in price for millions of Australians from next month â€“ some by as much as 50 per cent or more â€“ with the Turnbull Government delivering a win-win for consumers and taxpayers.', 1475843107),
(18, 12, 'Fire Drill etc', 1476496472);

-- --------------------------------------------------------

--
-- Table structure for table `tblemergencyroom`
--

CREATE TABLE `tblemergencyroom` (
  `IID` int(11) NOT NULL,
  `PID` int(11) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblemergencyroom`
--

INSERT INTO `tblemergencyroom` (`IID`, `PID`, `QUANTITY`) VALUES
(10, 10, 284),
(12, 12, 1),
(13, 13, 11),
(14, 14, 4),
(16, 16, 4),
(19, 19, 33),
(20, 20, 3),
(23, 23, 104),
(24, 24, 14),
(25, 25, 435),
(37, 37, 19),
(38, 38, 1),
(40, 40, 141),
(41, 41, 15),
(42, 42, 1),
(43, 43, 2),
(44, 44, 67),
(47, 47, 56),
(48, 48, 1),
(49, 49, 6),
(50, 50, 2),
(51, 51, 1),
(52, 52, 2),
(53, 53, 27),
(57, 57, 3),
(58, 59, 5),
(59, 68, 1),
(60, 61, 353);

-- --------------------------------------------------------

--
-- Table structure for table `tbllogins`
--

CREATE TABLE `tbllogins` (
  `LID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `IP` varchar(50) DEFAULT NULL,
  `BROWSER` varchar(50) DEFAULT NULL,
  `PLATFORM` varchar(50) NOT NULL,
  `LogTime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogins`
--

INSERT INTO `tbllogins` (`LID`, `UID`, `IP`, `BROWSER`, `PLATFORM`, `LogTime`) VALUES
(26, 12, '::1', 'Google Chrome', 'windows', 1476417336),
(27, 12, '::1', 'Google Chrome', 'windows', 1476417984),
(28, 13, '::1', 'Google Chrome', 'windows', 1476419320),
(29, 12, '::1', 'Google Chrome', 'windows', 1476419391),
(30, 13, '::1', 'Google Chrome', 'windows', 1476419684),
(31, 13, '::1', 'Google Chrome', 'windows', 1476422979),
(32, 13, '::1', 'Google Chrome', 'windows', 1476424951),
(33, 13, '::1', 'Google Chrome', 'windows', 1476425263),
(34, 12, '::1', 'Google Chrome', 'windows', 1476425853),
(35, 13, '::1', 'Google Chrome', 'windows', 1476426467),
(36, 12, '::1', 'Google Chrome', 'windows', 1476426481),
(37, 13, '::1', 'Google Chrome', 'windows', 1476427052),
(38, 12, '::1', 'Google Chrome', 'windows', 1476427085),
(39, 12, '::1', 'Google Chrome', 'windows', 1476431377),
(40, 12, '::1', 'Google Chrome', 'windows', 1476451043),
(41, 12, '127.0.0.1', 'Google Chrome', 'windows', 1476492899),
(42, 14, '127.0.0.1', 'Google Chrome', 'windows', 1476493327),
(43, 12, '127.0.0.1', 'Google Chrome', 'windows', 1476493880),
(44, 12, '127.0.0.1', 'Google Chrome', 'windows', 1476494368),
(45, 12, '192.168.173.108', 'Google Chrome', 'linux', 1476494411),
(46, 12, '127.0.0.1', 'Google Chrome', 'windows', 1476494624),
(47, 12, '192.168.173.108', 'Google Chrome', 'linux', 1476495039),
(48, 13, '127.0.0.1', 'Google Chrome', 'windows', 1476495739),
(49, 12, '127.0.0.1', 'Google Chrome', 'windows', 1476496448),
(50, 13, '127.0.0.1', 'Google Chrome', 'windows', 1476497033),
(51, 12, '::1', 'Google Chrome', 'windows', 1477302245);

-- --------------------------------------------------------

--
-- Table structure for table `tblmessages`
--

CREATE TABLE `tblmessages` (
  `mid` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `message` text,
  `datemess` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmessages`
--

INSERT INTO `tblmessages` (`mid`, `name`, `email`, `message`, `datemess`) VALUES
(5, 'Joshi Nuncio', 'bsitcedric@gmail.com', 'The Minister for Health and Aged Care, Sussan Ley and Assistant Minister for Health and Aged Care, Ken Wyatt AM MP have welcomed the release of the Aged Care Complaints Commissionerâ€™s first annual report today.', 1475997965),
(6, 'Francis De Guzman', 'bsitcedric@gmail.com', 'The Minister for Health and Aged Care, Sussan Ley and Assistant Minister for Health and Aged Care, Ken Wyatt AM MP have welcomed the release of the Aged Care Complaints Commissionerâ€™s first annual report today.', 1475997965),
(7, 'Chloe Reyes', 'kereyes@gmail.com', 'Your service is so cool. Keep it up!', 1476493825),
(8, 'Apple Apple', 'mememe@gmail.com', 'Good Job!!!!', 1476497174);

-- --------------------------------------------------------

--
-- Table structure for table `tbloperatingroom`
--

CREATE TABLE `tbloperatingroom` (
  `IID` int(11) NOT NULL,
  `PID` int(11) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbloperatingroom`
--

INSERT INTO `tbloperatingroom` (`IID`, `PID`, `QUANTITY`) VALUES
(1, 101, 4),
(4, 104, 33),
(5, 105, 3),
(8, 108, 104),
(9, 109, 14),
(10, 110, 435),
(15, 117, 4),
(16, 118, 3),
(17, 59, 28);

-- --------------------------------------------------------

--
-- Table structure for table `tblpharmacy`
--

CREATE TABLE `tblpharmacy` (
  `IID` int(11) NOT NULL,
  `PID` int(11) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpharmacy`
--

INSERT INTO `tblpharmacy` (`IID`, `PID`, `QUANTITY`) VALUES
(4, 62, 712),
(5, 63, 805),
(6, 64, 2),
(7, 65, 594),
(8, 66, 6),
(9, 67, 4),
(12, 70, 1),
(13, 71, 1),
(14, 72, 25),
(16, 74, 1),
(17, 75, 971),
(18, 76, 967),
(19, 77, 904),
(20, 78, 3),
(21, 79, 340),
(22, 80, 127),
(23, 81, 2),
(24, 82, 1),
(25, 83, 1),
(26, 84, 300),
(28, 86, 30),
(29, 87, 51),
(30, 88, 95),
(31, 89, 1),
(32, 90, 80),
(33, 91, 1),
(35, 93, 50),
(36, 94, 78),
(37, 95, 284),
(39, 97, 1),
(40, 98, 11),
(41, 99, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `PID` int(10) UNSIGNED NOT NULL,
  `ProductCode` varchar(50) NOT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `UnitOfMeasure` enum('AMP','BTL','CAP','PCS','TAB','TUBE','VIAL') DEFAULT NULL,
  `UnitCost` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`PID`, `ProductCode`, `Description`, `UnitOfMeasure`, `UnitCost`) VALUES
(10, 'QCO-THYM-M-084', 'FUROSEMIDE 20MG AMP (FRUMID)', 'AMP', 100),
(11, 'QCO-THYM-M-085', 'RANITIDINE 25MG AMP (RENTSAN)', 'AMP', 105),
(12, 'QCO-THYM-M-086', 'AMOXICILLIN 500MG CAP (EXBROPIN)', 'CAP', 10.7),
(13, 'QCO-THYM-M-087', 'CEFALEXIN 100MG DROPS (PARMECEL)', 'BTL', 90),
(14, 'QCO-THYM-M-088', 'CEFALEXIN 250MG BTL (CEFAMED)', 'BTL', 102.5),
(15, 'QCO-THYM-M-089', 'CEFALEXIN 500MG CAP (CEFAMED)', 'CAP', 17.85),
(16, 'QCO-THYM-M-090', 'CEFUROXIME 750MG VL (NICOCEF)', 'VIAL', 225),
(17, 'QCO-THYM-M-091', 'COTRIMOXAZOLE 200MG SUSP (TRISULCOM)', 'BTL', 88.75),
(18, 'QCO-THYM-M-092', 'COTRIMOXAZOLE 800MG/160MG TAB (TRISULCOM)', 'TAB', 6.43),
(19, 'QCO-THYM-M-093', 'MEFENAMIC 200MG/ 5ML SUSP (DREXARAL)', 'BTL', 89.25),
(20, 'QCO-THYM-M-094', 'MEFENAMIC ACID 500MG CAP (JESIC)', 'CAP', 6.07),
(21, 'QCO-THYM-M-095', 'FERROUS FUMARATE 325MG CAP (DREXIFER)', 'CAP', 4.02),
(22, 'QCO-THYM-M-096', 'SALBUTAMOL + GUIAFENESIN 100MG/ 2MG CAP (HICARYL)', 'CAP', 8.93),
(23, 'QCO-THYM-M-098', 'ALUMINUM HYDROXIDE MGLT 225 SUSP (EDROXID)', 'BTL', 100.3),
(24, 'QCO-THYM-M-099', 'AMOXICILLIN TRIHYDRATE 100MG/ML DRPS (EXBROPIN)', 'BTL', 85),
(25, 'QCO-THYM-M-100', 'AMOXICILLIN TRIHYDRATE 250MG/5ML SUSP (EXBROPIN)', 'BTL', 88),
(26, 'QCO-THYM-M-101', 'PARACETAMOL 125MG/5ML SUSP (MOLDREX)', 'BTL', 63),
(27, 'QCO-THYM-M-102', 'PARACETAMOL 250MG/60ML SYRUP(SUSP) (MOLDREX)', 'BTL', 88),
(28, 'QCO-THYM-M-103', 'PARACETAMOL 500MG TAB (MOLDREX)', 'TAB', 1.98),
(29, 'QCO-THYM-M-104', 'PARACETAMOL 100MG/ML DROPS (MOLDREX)', 'BTL', 51),
(30, 'QCO-THYM-M-105', 'METRONIDAZOLE 500MG TAB (JINZOLE)', 'TAB', 7.25),
(31, 'QCO-THYM-M-106', 'METRONIDAZOLE 125MG/60ML SUSP (JINZOLE)', 'BTL', 85),
(32, 'QCO-THYM-M-107', 'MULTIVITAMINS + LYSINE + TAURINE CHLORELLA (FLEXIV', 'BTL', 69),
(33, 'QCO-THYM-M-108', 'ASCORBIC ACID + ZINC DROPS (CEFORTAN Z)', 'BTL', 105),
(34, 'QCO-THYM-M-109', 'DICYCLOVERINE 10MG/5ML SYRUP (ZYCLODEX)', 'BTL', 71.6),
(35, 'QCO-THYM-M-110', 'CEFUROXIME 250MG/ 5ML  BTL (CEFURAX)', 'BTL', 460),
(36, 'QCO-THYM-M-111', 'CLOXACILLIN 500MG CAP (MEDICLOX)', 'CAP', 21),
(37, 'QCO-THYM-M-112', 'CLOXACILLIN 125/5ML SUSP (ENCLOXIL)', 'BTL', 140),
(38, 'QCO-THYM-M-113', 'CEFTAZIDIME PENTAHYDRATE 1G + 10 DILUENT VL (TAZID', 'VIAL', 500),
(39, 'QCO-THYM-M-114', 'OMEPRAZOLE 40MG VL (NICOPRO)', 'VIAL', 420),
(40, 'QCO-THYM-M-115', 'CITICOLINE 1G (250 X 4ML) VL (CEBROLINE)', 'VIAL', 190),
(41, 'QCO-THYM-M-116', 'CEFIPIME 1G VL (ROVATIM)', 'VIAL', 998),
(42, 'QCO-THYM-M-168', 'CO-AMOXICLAV 625MG TAB 30''''''''S (INOCLAV)', 'TAB', 38.5),
(43, 'QCO-THYM-M-169', 'HYOSCINE-N-BUTYLBROMIDE 20MG (YOSCINE)', 'AMP', 80),
(44, 'QCO-THYM-M-170', 'PARACETAMOL 150MG AMP (FEBRINIL)', 'AMP', 42),
(45, 'QCO-THYM-M-172', 'CEFUROXIME 500MG TAB 50''''S (NORXIME)', 'TAB', 75),
(46, 'QCO-THYM-M-173', 'GENTAMYCIN 40MG/2ML (GENTAX)', 'VIAL', 110),
(47, 'QCO-THYM-M-176', 'CEFOTAXIME 1G VL (OFETAXIME)', 'VIAL', 450),
(48, 'QCO-THYM-M-177', 'DICLOFENAC 25MG AMP (PARAFORTAN)', 'AMP', 150),
(49, 'QCO-THYM-M-178', 'VITAMIN K 10MG AMP', 'AMP', 44),
(50, 'QCO-THYM-M-179', 'KETOROLAC IROMETHANOL 30MG/ML (KETONOR)', 'AMP', 85),
(51, 'QCO-THYM-M-180', 'LIDOCAINE HCL 2% 5ML VL', 'VIAL', 20),
(52, 'QCO-THYM-M-181', 'OXYTOCIN 10 I.U AMP (OXYTIN-10)', 'AMP', 85),
(53, 'QCO-THYM-M-182', 'RANITIDINE HYDROCHLORIDE 25MG AMP (ULCERID)', 'AMP', 95),
(54, 'QCO-THYM-M-198', 'AMPICILLIN 1G VL (NICOCIN)', 'VIAL', 103),
(55, 'QCO-THYM-M-199', 'HYDROCORTISONE 250MG VL (NICORT)', 'VIAL', 285),
(56, 'QCO-THYM-M-200', 'METOCLOPRAMIDE 5MG/ML 10MG/2ML AMP (METO)', 'AMP', 34),
(57, 'QCO-THYM-M-208', 'AMLODIPINE 10MG TAB (AMLOCARD)', 'TAB', 13),
(58, 'QCO-THYM-M-209', 'METHYLERGOMETRINE 200MG/ML AMP (LERIN)', 'AMP', 100),
(59, 'QCO-THYM-M-232', 'PNSS 1LITER 12S (EUROMED)', 'BTL', 58),
(60, 'QCO-THYM-M-242', 'CEFUROXIME 500MG - EMIXOR', 'PCS', 75),
(61, 'QCO-THYM-M-243', 'ATS 1500IU AMP', 'AMP', 65),
(62, 'QCO-THYM-M-245', 'PNSS 500ML 24S (EUROMED)', 'BTL', 57.52),
(63, 'QCO-THYM-M-255', 'TRANEXAMIC ACID 100MG (NERVOT)', 'AMP', 100),
(64, 'QCO-THYM-M-257', 'EPINEPHRINE 1MG (PINK BOX)', 'AMP', 75),
(65, 'QCO-THYM-M-258', 'LIDOCAINE 20MG 2% (ENDUCAINE)', 'AMP', 20),
(66, 'QCO-THYM-M-259', 'TRANEXAMIC ACID 100MG (CYCLOTRAX)', 'AMP', 100),
(67, 'QCO-THYM-M-293', 'TRANEXAMIC ACID 500MG/5ML (ANEPTIL)', 'AMP', 100),
(68, 'QCO-THYM-M-415', 'CEFALEXIN 100MG DROPS (CEFALEXIN)', 'BTL', 51),
(69, 'QCO-THYM-M-417', 'DICLOFENAC 25MG AMP - DYNAPAR AQ', 'AMP', 90),
(70, 'QCO-THYM-M-418', 'TRANEXAMIC ACID 100MG - XANFIB', 'AMP', 100),
(71, 'QCO-THYM-M-426', 'CEFUROXIME 750MG - EMIXOR', 'PCS', 260),
(72, 'QCO-THYM-M-427', 'METOCLOPRAMIDE 5MG - CLOMITENE', 'AMP', 34),
(73, 'QCO-THYM-M-428', 'LIDOCAINE 20MG(2%) - EUROCAINE', 'AMP', 70),
(74, 'QCO-THYM-M-434', 'SALBUTAMOL + GUIAFENESIN 50MG SYR(HICARYL)', 'BTL', 76),
(75, 'QCO-THYM-M-443', 'CEFUROXIME 500MG TAB (EMIXOR)', 'TAB', 75),
(76, 'QCO-THYM-M-469', 'PARACETAMOL 150MG/ML AMP (FLUGARD)', 'AMP', 42),
(77, 'QCO-THYM-M-487', 'CEFTAZIDIME PENTAHYDRATE 1G (ZEFTACARE)', 'VIAL', 500),
(78, 'QCO-THYM-M-488', 'METOCLOPRAMIDE HCL 5MG/ML (METSIL)', 'AMP', 34),
(79, 'QCO-THYM-M-489', 'METRONIDAZOLE 500MG (ANTIZOAL)', 'VIAL', 120),
(80, 'QCO-THYM-M-490', 'VITAMIN K (PHYTOMENADIONE)', 'AMP', 44),
(81, 'QCO-THYM-M-497', 'AMIPICILLIN SODIUM 250MG-AMPICELO', 'VIAL', 68),
(82, 'QCO-THYM-M-520', 'DIPHENHYDRAMINE 12.5MG SYR. (60ML) HISTAZYN', 'BTL', 48),
(83, 'QCO-THYM-M-528', 'MEFENAMIC ACID 50MG/5ML SUSP (DREXARAL)', 'BTL', 89.25),
(84, 'QCO-THYM-M-550', 'TRANEXAMIC ACID 500MG/5ML (TRANEXAN)', 'AMP', 100),
(85, 'QCO-THYM-M-558', 'AMPICILLIN SODIUM 250MG -PAVULIN', 'VIAL', 68),
(86, 'QCO-THYM-M-559', 'AMPICILLIN SODIUM 500MG -PAVULIN', 'VIAL', 73),
(87, 'QCO-THYM-M-560', 'PARACETAMOL 150MG/ML (SINOMOL)', 'AMP', 42),
(88, 'QCO-THYM-M-566', 'MEFENAMIC ACID 500MG CAP (DREXERAL)', 'CAP', 6.07),
(89, 'QCO-THYM-M-577', 'CEFEPIME HCL 1G-SEPIME', 'VIAL', 998),
(90, 'QCO-THYM-M-592', 'CEFUROXIME 500MG TAB (AXETIL)', 'AMP', 75),
(91, 'QCO-THYM-M-600', 'VITAMIN K PHYTOMENADIONE(HEMA-K)', 'AMP', 44),
(92, 'QCO-THYM-M-601', 'VITAMIN B1+B6+B12 (WESMINBIO)', 'AMP', 130),
(93, 'QCO-THYM-M-611', 'MULTIVITAMINS + IRON + FOLIC - OBYMED', 'CAP', 6.62),
(94, 'QCO-THYM-M-642', 'CEFEPIME 1G (SEPIME)', 'VIAL', 998),
(95, 'QCO-THYM-M-667', 'AMPICILLIN 500MG VIAL (AMPICELO)', 'VIAL', 73),
(96, 'QCO-THYM-M-678', 'CO-AMOXICLAV 125MG SUSP 60ML (MEDICLAV)', 'BTL', 180),
(97, 'QCO-THYM-M-679', 'SILVER SULFADIAZINE 10MG CREAM (FLAMMAZINE)', 'TUBE', 928),
(98, 'QCO-THYM-M-684', 'TETANUS TOXOID 40 IU/0.5ML AMPULE (T-VAC)', 'AMP', 160),
(99, 'QCO-THYM-M-685', 'LIDOCAINE HCL 20 MG/ML 2% (EUROCAINE)', 'AMP', 44),
(100, 'QCO-THYM-M-702', 'SALBUTAMOL+IPRATROPIUM BROMIDE 2.5ML (LUPIVENT)', 'PCS', 28),
(101, 'QCO-THYM-M-706', 'OXYTOCIN 10 I.U. (ESTIMA)', 'AMP', 92),
(102, 'QCO-THYM-M-707', 'OXYTOCIN 10 I.U. (GYNE-TOCIN)', 'AMP', 92),
(103, 'QCO-THYM-M-709', 'ADSORBED TETANUS VACCINE B.P 40 I.U/0.5ML', 'AMP', 160),
(104, 'QCO-THYM-M-728', 'AMPICILLIN 1G - AMPICELO', 'AMP', 103),
(105, 'QCO-THYM-M-740', 'GENTAMICIN SULFATE 80MG (GENTACARE)', 'AMP', 110),
(106, 'QCO-THYM-M-743', 'METRONIDAZOLE 500MG IV (NOZOL)', 'VIAL', 120),
(107, 'QCO-THYM-M-747', 'TETANUS TOXOID ADSORBED 40 IU/0.5ML (IMATET)', 'AMP', 160),
(108, 'QCO-THYM-M-748', 'OXYTOCIN 10 I.U/ML (CETOCIN)', 'AMP', 92),
(109, 'QCO-THYM-M-749', 'METOPROLOL TARTRATE 50MG TABLET (PROMETIN)', 'TAB', 3.67),
(110, 'QCO-THYM-M-751', 'FOLIC ACID 5MG CAP (FOREMIA)', 'AMP', 8),
(111, 'QCO-THYM-M-752', 'CETIRIZINE DIHYDROCHLORIDE 1MG/ML BOT (ZETRINE)', 'BTL', 206),
(112, 'QCO-THYM-M-756', 'BUDESONIDE NEBULE (BRONEX)', 'PCS', 90),
(113, 'QCO-THYM-M-758', 'CEFUROXIME SODIUM 750MG VIAL (GAVIXIME)', 'VIAL', 225),
(114, 'QCO-THYM-M-767', 'SODIUM BICARBONATE 8.4% 50ML', 'AMP', 195),
(117, 'THYM-QCCl5-MGHG', 'List eminu', 'BTL', 123),
(118, 'THYM-QCCl5', 'dfgdfg', 'AMP', 12323),
(123, 'sadfsadf', 'asdfasdf', 'AMP', 123123.96),
(125, 'saf', 'sdfsdfsdf', 'AMP', 123123);

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts2`
--

CREATE TABLE `tblproducts2` (
  `PID` int(10) UNSIGNED NOT NULL,
  `ProductCode` varchar(50) NOT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `UnitOfMeasure` enum('AMP','BTL','CAP','PCS','TAB','TUBE','VIAL') DEFAULT NULL,
  `UnitCost` double DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproducts2`
--

INSERT INTO `tblproducts2` (`PID`, `ProductCode`, `Description`, `UnitOfMeasure`, `UnitCost`, `Quantity`) VALUES
(1, 'QCO-ER-THYM-M-017', 'HYDROCORTISONE 250MG (NICORT)', 'VIAL', 285, 30),
(2, 'QCO-THYM-588', 'VIT B COMPLEX - NICOPLEX FORTE', 'CAP', 4.95, 51),
(3, 'QCO-THY-M-605', 'METRONIDAZOLEIV 500MG (CETAZ)', 'VIAL', 90, 95),
(4, 'QCO-THY-M-606', 'GENTAMYCIN 40MG (CINTAMID)', 'VIAL', 110, 1),
(5, 'QCO-THYM-M-043', 'CEFORTAN ASCORBIC ACID + ZINC SYRUP', 'BTL', 128, 80),
(6, 'QCO-THYM-M-080', 'AMPICILLIN 250MG VL (NICOCIN)', 'VIAL', 68, 1),
(7, 'QCO-THYM-M-081', 'AMPICILLIN 500MG VL (NICOCIN)', 'VIAL', 73, 0),
(8, 'QCO-THYM-M-082', 'CEFTRIAXONE 1G VL (NICOTRIX)', 'VIAL', 450, 50),
(9, 'QCO-THYM-M-083', 'METRONIDAZOLE IV 500MG VL (NICOZOLE)', 'VIAL', 145, 78),
(10, 'QCO-THYM-M-084', 'FUROSEMIDE 20MG AMP (FRUMID)', 'AMP', 100, 284),
(11, 'QCO-THYM-M-085', 'RANITIDINE 25MG AMP (RENTSAN)', 'AMP', 105, 0),
(12, 'QCO-THYM-M-086', 'AMOXICILLIN 500MG CAP (EXBROPIN)', 'CAP', 10.7, 1),
(13, 'QCO-THYM-M-087', 'CEFALEXIN 100MG DROPS (PARMECEL)', 'BTL', 90, 11),
(14, 'QCO-THYM-M-088', 'CEFALEXIN 250MG BTL (CEFAMED)', 'BTL', 102.5, 4),
(15, 'QCO-THYM-M-089', 'CEFALEXIN 500MG CAP (CEFAMED)', 'CAP', 17.85, 0),
(16, 'QCO-THYM-M-090', 'CEFUROXIME 750MG VL (NICOCEF)', 'VIAL', 225, 4),
(17, 'QCO-THYM-M-091', 'COTRIMOXAZOLE 200MG SUSP (TRISULCOM)', 'BTL', 88.75, 0),
(18, 'QCO-THYM-M-092', 'COTRIMOXAZOLE 800MG/160MG TAB (TRISULCOM)', 'TAB', 6.43, 0),
(19, 'QCO-THYM-M-093', 'MEFENAMIC 200MG/ 5ML SUSP (DREXARAL)', 'BTL', 89.25, 33),
(20, 'QCO-THYM-M-094', 'MEFENAMIC ACID 500MG CAP (JESIC)', 'CAP', 6.07, 3),
(21, 'QCO-THYM-M-095', 'FERROUS FUMARATE 325MG CAP (DREXIFER)', 'CAP', 4.02, 0),
(22, 'QCO-THYM-M-096', 'SALBUTAMOL + GUIAFENESIN 100MG/ 2MG CAP (HICARYL)', 'CAP', 8.93, 0),
(23, 'QCO-THYM-M-098', 'ALUMINUM HYDROXIDE MGLT 225 SUSP (EDROXID)', 'BTL', 100.3, 104),
(24, 'QCO-THYM-M-099', 'AMOXICILLIN TRIHYDRATE 100MG/ML DRPS (EXBROPIN)', 'BTL', 85, 14),
(25, 'QCO-THYM-M-100', 'AMOXICILLIN TRIHYDRATE 250MG/5ML SUSP (EXBROPIN)', 'BTL', 88, 435),
(26, 'QCO-THYM-M-101', 'PARACETAMOL 125MG/5ML SUSP (MOLDREX)', 'BTL', 63, 0),
(27, 'QCO-THYM-M-102', 'PARACETAMOL 250MG/60ML SYRUP(SUSP) (MOLDREX)', 'BTL', 88, 0),
(28, 'QCO-THYM-M-103', 'PARACETAMOL 500MG TAB (MOLDREX)', 'TAB', 1.98, 0),
(29, 'QCO-THYM-M-104', 'PARACETAMOL 100MG/ML DROPS (MOLDREX)', 'BTL', 51, 0),
(30, 'QCO-THYM-M-105', 'METRONIDAZOLE 500MG TAB (JINZOLE)', 'TAB', 7.25, 0),
(31, 'QCO-THYM-M-106', 'METRONIDAZOLE 125MG/60ML SUSP (JINZOLE)', 'BTL', 85, 0),
(32, 'QCO-THYM-M-107', 'MULTIVITAMINS + LYSINE + TAURINE CHLORELLA (FLEXIV', 'BTL', 69, 0),
(33, 'QCO-THYM-M-108', 'ASCORBIC ACID + ZINC DROPS (CEFORTAN Z)', 'BTL', 105, 0),
(34, 'QCO-THYM-M-109', 'DICYCLOVERINE 10MG/5ML SYRUP (ZYCLODEX)', 'BTL', 71.6, 0),
(35, 'QCO-THYM-M-110', 'CEFUROXIME 250MG/ 5ML  BTL (CEFURAX)', 'BTL', 460, 0),
(36, 'QCO-THYM-M-111', 'CLOXACILLIN 500MG CAP (MEDICLOX)', 'CAP', 21, 0),
(37, 'QCO-THYM-M-112', 'CLOXACILLIN 125/5ML SUSP (ENCLOXIL)', 'BTL', 140, 19),
(38, 'QCO-THYM-M-113', 'CEFTAZIDIME PENTAHYDRATE 1G + 10 DILUENT VL (TAZID', 'VIAL', 500, 1),
(39, 'QCO-THYM-M-114', 'OMEPRAZOLE 40MG VL (NICOPRO)', 'VIAL', 420, 0),
(40, 'QCO-THYM-M-115', 'CITICOLINE 1G (250 X 4ML) VL (CEBROLINE)', 'VIAL', 190, 141),
(41, 'QCO-THYM-M-116', 'CEFIPIME 1G VL (ROVATIM)', 'VIAL', 998, 15),
(42, 'QCO-THYM-M-168', 'CO-AMOXICLAV 625MG TAB 30''''''''S (INOCLAV)', 'TAB', 38.5, 1),
(43, 'QCO-THYM-M-169', 'HYOSCINE-N-BUTYLBROMIDE 20MG (YOSCINE)', 'AMP', 80, 2),
(44, 'QCO-THYM-M-170', 'PARACETAMOL 150MG AMP (FEBRINIL)', 'AMP', 42, 67),
(45, 'QCO-THYM-M-172', 'CEFUROXIME 500MG TAB 50''''S (NORXIME)', 'TAB', 75, 0),
(46, 'QCO-THYM-M-173', 'GENTAMYCIN 40MG/2ML (GENTAX)', 'VIAL', 110, 0),
(47, 'QCO-THYM-M-176', 'CEFOTAXIME 1G VL (OFETAXIME)', 'VIAL', 450, 56),
(48, 'QCO-THYM-M-177', 'DICLOFENAC 25MG AMP (PARAFORTAN)', 'AMP', 150, 1),
(49, 'QCO-THYM-M-178', 'VITAMIN K 10MG AMP', 'AMP', 44, 6),
(50, 'QCO-THYM-M-179', 'KETOROLAC IROMETHANOL 30MG/ML (KETONOR)', 'AMP', 85, 2),
(51, 'QCO-THYM-M-180', 'LIDOCAINE HCL 2% 5ML VL', 'VIAL', 20, 1),
(52, 'QCO-THYM-M-181', 'OXYTOCIN 10 I.U AMP (OXYTIN-10)', 'AMP', 85, 2),
(53, 'QCO-THYM-M-182', 'RANITIDINE HYDROCHLORIDE 25MG AMP (ULCERID)', 'AMP', 95, 27),
(54, 'QCO-THYM-M-198', 'AMPICILLIN 1G VL (NICOCIN)', 'VIAL', 103, 0),
(55, 'QCO-THYM-M-199', 'HYDROCORTISONE 250MG VL (NICORT)', 'VIAL', 285, 0),
(56, 'QCO-THYM-M-200', 'METOCLOPRAMIDE 5MG/ML 10MG/2ML AMP (METO)', 'AMP', 34, 0),
(57, 'QCO-THYM-M-208', 'AMLODIPINE 10MG TAB (AMLOCARD)', 'TAB', 13, 3),
(58, 'QCO-THYM-M-209', 'METHYLERGOMETRINE 200MG/ML AMP (LERIN)', 'AMP', 100, 0),
(59, 'QCO-THYM-M-232', 'PNSS 1LITER 12S (EUROMED)', 'BTL', 58, 33),
(60, 'QCO-THYM-M-242', 'CEFUROXIME 500MG - EMIXOR', 'PCS', 75, 940),
(61, 'QCO-THYM-M-243', 'ATS 1500IU AMP', 'AMP', 65, 353),
(62, 'QCO-THYM-M-245', 'PNSS 500ML 24S (EUROMED)', 'BTL', 57.52, 712),
(63, 'QCO-THYM-M-255', 'TRANEXAMIC ACID 100MG (NERVOT)', 'AMP', 100, 805),
(64, 'QCO-THYM-M-257', 'EPINEPHRINE 1MG (PINK BOX)', 'AMP', 75, 2),
(65, 'QCO-THYM-M-258', 'LIDOCAINE 20MG 2% (ENDUCAINE)', 'AMP', 20, 594),
(66, 'QCO-THYM-M-259', 'TRANEXAMIC ACID 100MG (CYCLOTRAX)', 'AMP', 100, 6),
(67, 'QCO-THYM-M-293', 'TRANEXAMIC ACID 500MG/5ML (ANEPTIL)', 'AMP', 100, 4),
(68, 'QCO-THYM-M-415', 'CEFALEXIN 100MG DROPS (CEFALEXIN)', 'BTL', 51, 0),
(69, 'QCO-THYM-M-417', 'DICLOFENAC 25MG AMP - DYNAPAR AQ', 'AMP', 90, 0),
(70, 'QCO-THYM-M-418', 'TRANEXAMIC ACID 100MG - XANFIB', 'AMP', 100, 1),
(71, 'QCO-THYM-M-426', 'CEFUROXIME 750MG - EMIXOR', 'PCS', 260, 1),
(72, 'QCO-THYM-M-427', 'METOCLOPRAMIDE 5MG - CLOMITENE', 'AMP', 34, 25),
(73, 'QCO-THYM-M-428', 'LIDOCAINE 20MG(2%) - EUROCAINE', 'AMP', 70, 0),
(74, 'QCO-THYM-M-434', 'SALBUTAMOL + GUIAFENESIN 50MG SYR(HICARYL)', 'BTL', 76, 1),
(75, 'QCO-THYM-M-443', 'CEFUROXIME 500MG TAB (EMIXOR)', 'TAB', 75, 971),
(76, 'QCO-THYM-M-469', 'PARACETAMOL 150MG/ML AMP (FLUGARD)', 'AMP', 42, 967),
(77, 'QCO-THYM-M-487', 'CEFTAZIDIME PENTAHYDRATE 1G (ZEFTACARE)', 'VIAL', 500, 904),
(78, 'QCO-THYM-M-488', 'METOCLOPRAMIDE HCL 5MG/ML (METSIL)', 'AMP', 34, 3),
(79, 'QCO-THYM-M-489', 'METRONIDAZOLE 500MG (ANTIZOAL)', 'VIAL', 120, 340),
(80, 'QCO-THYM-M-490', 'VITAMIN K (PHYTOMENADIONE)', 'AMP', 44, 127),
(81, 'QCO-THYM-M-497', 'AMIPICILLIN SODIUM 250MG-AMPICELO', 'VIAL', 68, 2),
(82, 'QCO-THYM-M-520', 'DIPHENHYDRAMINE 12.5MG SYR. (60ML) HISTAZYN', 'BTL', 48, 1),
(83, 'QCO-THYM-M-528', 'MEFENAMIC ACID 50MG/5ML SUSP (DREXARAL)', 'BTL', 89.25, 1),
(84, 'QCO-THYM-M-550', 'TRANEXAMIC ACID 500MG/5ML (TRANEXAN)', 'AMP', 100, 300),
(85, 'QCO-THYM-M-558', 'AMPICILLIN SODIUM 250MG -PAVULIN', 'VIAL', 68, 0),
(86, 'QCO-THYM-M-559', 'AMPICILLIN SODIUM 500MG -PAVULIN', 'VIAL', 73, 30),
(87, 'QCO-THYM-M-560', 'PARACETAMOL 150MG/ML (SINOMOL)', 'AMP', 42, 51),
(88, 'QCO-THYM-M-566', 'MEFENAMIC ACID 500MG CAP (DREXERAL)', 'CAP', 6.07, 95),
(89, 'QCO-THYM-M-577', 'CEFEPIME HCL 1G-SEPIME', 'VIAL', 998, 1),
(90, 'QCO-THYM-M-592', 'CEFUROXIME 500MG TAB (AXETIL)', 'AMP', 75, 80),
(91, 'QCO-THYM-M-600', 'VITAMIN K PHYTOMENADIONE(HEMA-K)', 'AMP', 44, 1),
(92, 'QCO-THYM-M-601', 'VITAMIN B1+B6+B12 (WESMINBIO)', 'AMP', 130, 0),
(93, 'QCO-THYM-M-611', 'MULTIVITAMINS + IRON + FOLIC - OBYMED', 'CAP', 6.62, 50),
(94, 'QCO-THYM-M-642', 'CEFEPIME 1G (SEPIME)', 'VIAL', 998, 78),
(95, 'QCO-THYM-M-667', 'AMPICILLIN 500MG VIAL (AMPICELO)', 'VIAL', 73, 284),
(96, 'QCO-THYM-M-678', 'CO-AMOXICLAV 125MG SUSP 60ML (MEDICLAV)', 'BTL', 180, 0),
(97, 'QCO-THYM-M-679', 'SILVER SULFADIAZINE 10MG CREAM (FLAMMAZINE)', 'TUBE', 928, 1),
(98, 'QCO-THYM-M-684', 'TETANUS TOXOID 40 IU/0.5ML AMPULE (T-VAC)', 'AMP', 160, 11),
(99, 'QCO-THYM-M-685', 'LIDOCAINE HCL 20 MG/ML 2% (EUROCAINE)', 'AMP', 44, 4),
(100, 'QCO-THYM-M-702', 'SALBUTAMOL+IPRATROPIUM BROMIDE 2.5ML (LUPIVENT)', 'PCS', 28, 0),
(101, 'QCO-THYM-M-706', 'OXYTOCIN 10 I.U. (ESTIMA)', 'AMP', 92, 4),
(102, 'QCO-THYM-M-707', 'OXYTOCIN 10 I.U. (GYNE-TOCIN)', 'AMP', 92, 0),
(103, 'QCO-THYM-M-709', 'ADSORBED TETANUS VACCINE B.P 40 I.U/0.5ML', 'AMP', 160, 0),
(104, 'QCO-THYM-M-728', 'AMPICILLIN 1G - AMPICELO', 'AMP', 103, 33),
(105, 'QCO-THYM-M-740', 'GENTAMICIN SULFATE 80MG (GENTACARE)', 'AMP', 110, 3),
(106, 'QCO-THYM-M-743', 'METRONIDAZOLE 500MG IV (NOZOL)', 'VIAL', 120, 0),
(107, 'QCO-THYM-M-747', 'TETANUS TOXOID ADSORBED 40 IU/0.5ML (IMATET)', 'AMP', 160, 0),
(108, 'QCO-THYM-M-748', 'OXYTOCIN 10 I.U/ML (CETOCIN)', 'AMP', 92, 104),
(109, 'QCO-THYM-M-749', 'METOPROLOL TARTRATE 50MG TABLET (PROMETIN)', 'TAB', 3.67, 14),
(110, 'QCO-THYM-M-751', 'FOLIC ACID 5MG CAP (FOREMIA)', 'AMP', 8, 435),
(111, 'QCO-THYM-M-752', 'CETIRIZINE DIHYDROCHLORIDE 1MG/ML BOT (ZETRINE)', 'BTL', 206, 0),
(112, 'QCO-THYM-M-756', 'BUDESONIDE NEBULE (BRONEX)', 'PCS', 90, 0),
(113, 'QCO-THYM-M-758', 'CEFUROXIME SODIUM 750MG VIAL (GAVIXIME)', 'VIAL', 225, 0),
(114, 'QCO-THYM-M-767', 'SODIUM BICARBONATE 8.4% 50ML', 'AMP', 195, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE `tbltransaction` (
  `TID` int(10) UNSIGNED NOT NULL,
  `PID` int(11) DEFAULT NULL,
  `UID` int(11) DEFAULT NULL,
  `RefNo` varchar(50) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TransFrom` enum('OR','ER','WH','PH') DEFAULT NULL,
  `TransTo` enum('OR','ER','WH','PH') DEFAULT NULL,
  `DateTransfer` int(11) NOT NULL,
  `TransType` enum('IN','OUT','TRANSFER') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltransaction`
--

INSERT INTO `tbltransaction` (`TID`, `PID`, `UID`, `RefNo`, `Quantity`, `TransFrom`, `TransTo`, `DateTransfer`, `TransType`) VALUES
(8, 59, 12, '8023984092834', 1, 'PH', 'ER', 1475670858, 'TRANSFER'),
(9, 59, 12, '8023984092834', 5, 'PH', 'ER', 1475673719, 'TRANSFER'),
(10, 59, 12, '8023984092834', 5, 'PH', 'ER', 1475673784, 'TRANSFER'),
(11, 59, 12, '8023984092834', 5, 'PH', 'ER', 1475673837, 'TRANSFER'),
(12, 59, 12, '8023984092834', 5, 'PH', 'ER', 1475673895, 'TRANSFER'),
(13, 59, 12, '8023984092834', 5, 'ER', 'PH', 1475673941, 'TRANSFER'),
(14, 59, 13, 'ahahaha', 5, 'PH', 'ER', 1475911280, 'TRANSFER'),
(15, 59, 12, '123123', 28, 'PH', 'OR', 1475916895, 'TRANSFER'),
(16, 60, 12, 'sdfsdf', 940, 'PH', 'WH', 1475997219, 'TRANSFER'),
(17, 68, 12, 'sdfsdf', 1, 'PH', 'ER', 1475997279, 'TRANSFER'),
(18, 8, 12, 'sdfsdf', 49, 'WH', 'OR', 1475997589, 'TRANSFER'),
(19, 8, 12, 'sdfsdf', 1, 'WH', 'OR', 1475997614, 'TRANSFER'),
(20, 61, 13, '1231231', 353, 'PH', 'ER', 1476427279, 'TRANSFER');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `UID` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(16) DEFAULT NULL,
  `pass_word` varchar(32) DEFAULT NULL,
  `account_type` enum('ADM','PHR') DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` enum('Female','Male') DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `DateAdded` int(11) NOT NULL,
  `Deleted` enum('YES','NO') NOT NULL,
  `AccImg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`UID`, `user_name`, `pass_word`, `account_type`, `first_name`, `middle_name`, `last_name`, `gender`, `birthday`, `email`, `DateAdded`, `Deleted`, `AccImg`) VALUES
(12, 'admin1234', 'c93ccd78b2076528346216b3b2f701e6', 'ADM', 'Melitia', 'Yatco', 'Coloma', 'Male', '1997-12-02', 'goddessirene@gmail.com', 1475842469, 'NO', '../images/dp/admin1234_134015.jpg'),
(13, 'staff123', 'de9bf5643eabf80f4a56fda3bbb84483', 'PHR', 'Shanas', 'Flame', 'Fairy', 'Female', '1997-12-05', 'shana@gmail.com', 1475910277, 'NO', '../images/dp/staff123_853937.png'),
(14, 'metha123', '631befd79c086fe5af6f4c5be28c9947', 'PHR', 'Melia', 'Meta', 'Cola', 'Female', '1997-12-02', 'bsitcedric@gmail.com', 1476493315, 'NO', '../images/dp/metha123_838175.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblwarehouse`
--

CREATE TABLE `tblwarehouse` (
  `IID` int(11) NOT NULL,
  `PID` int(11) DEFAULT NULL,
  `QUANTITY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblwarehouse`
--

INSERT INTO `tblwarehouse` (`IID`, `PID`, `QUANTITY`) VALUES
(10, 10, 284),
(12, 12, 1),
(13, 13, 11),
(14, 14, 4),
(16, 16, 4),
(19, 19, 33),
(20, 20, 3),
(23, 23, 104),
(24, 24, 14),
(25, 25, 435),
(37, 37, 19),
(38, 38, 1),
(40, 40, 141),
(41, 41, 15),
(42, 42, 1),
(43, 43, 2),
(44, 44, 67),
(47, 47, 56),
(48, 48, 1),
(49, 49, 6),
(50, 50, 2),
(51, 51, 1),
(52, 52, 2),
(53, 53, 27),
(57, 57, 3),
(59, 59, 33),
(60, 60, 1880),
(61, 61, 353),
(62, 62, 712),
(63, 63, 805),
(64, 64, 2),
(65, 65, 594),
(66, 66, 6),
(67, 67, 4),
(70, 70, 1),
(71, 71, 1),
(72, 72, 25),
(74, 74, 1),
(75, 75, 971),
(76, 76, 967),
(77, 77, 904),
(78, 78, 3),
(79, 79, 340),
(80, 80, 127),
(81, 81, 2),
(82, 82, 1),
(83, 83, 1),
(84, 84, 300),
(86, 86, 30),
(87, 87, 51),
(88, 88, 95),
(89, 89, 1),
(90, 90, 80),
(91, 91, 1),
(93, 93, 50),
(94, 94, 78),
(95, 95, 284),
(97, 97, 1),
(98, 98, 11),
(99, 99, 4),
(101, 101, 4),
(104, 104, 33),
(105, 105, 3),
(108, 108, 104),
(109, 109, 14),
(110, 110, 435),
(115, 117, 4),
(116, 118, 3),
(123, 123, 1),
(125, 125, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblannouncements`
--
ALTER TABLE `tblannouncements`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `tblemergencyroom`
--
ALTER TABLE `tblemergencyroom`
  ADD PRIMARY KEY (`IID`);

--
-- Indexes for table `tbllogins`
--
ALTER TABLE `tbllogins`
  ADD PRIMARY KEY (`LID`);

--
-- Indexes for table `tblmessages`
--
ALTER TABLE `tblmessages`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `tbloperatingroom`
--
ALTER TABLE `tbloperatingroom`
  ADD PRIMARY KEY (`IID`);

--
-- Indexes for table `tblpharmacy`
--
ALTER TABLE `tblpharmacy`
  ADD PRIMARY KEY (`IID`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `tblproducts2`
--
ALTER TABLE `tblproducts2`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  ADD PRIMARY KEY (`TID`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `tblwarehouse`
--
ALTER TABLE `tblwarehouse`
  ADD PRIMARY KEY (`IID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblannouncements`
--
ALTER TABLE `tblannouncements`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tblemergencyroom`
--
ALTER TABLE `tblemergencyroom`
  MODIFY `IID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tbllogins`
--
ALTER TABLE `tbllogins`
  MODIFY `LID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tblmessages`
--
ALTER TABLE `tblmessages`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbloperatingroom`
--
ALTER TABLE `tbloperatingroom`
  MODIFY `IID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tblpharmacy`
--
ALTER TABLE `tblpharmacy`
  MODIFY `IID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `PID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `tblproducts2`
--
ALTER TABLE `tblproducts2`
  MODIFY `PID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  MODIFY `TID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `UID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tblwarehouse`
--
ALTER TABLE `tblwarehouse`
  MODIFY `IID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
