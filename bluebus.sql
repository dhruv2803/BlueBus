-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 01:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluebus`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `delbpatha` (IN `srcs` VARCHAR(4), IN `dests` INT(4))  NO SQL
DELETE FROM paths where (src=srcs AND dest=dests)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delbsche` (IN `bid` VARCHAR(120), IN `stp` VARCHAR(4), IN `wayy` INT(11))  NO SQL
DELETE FROM bschedule WHERE busid=bid AND stops=stp AND way=wayy$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delbscheb` (IN `bid` VARCHAR(120))  NO SQL
DELETE FROM bschedule WHERE busid=bid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delbsches` (IN `stp` VARCHAR(4))  NO SQL
DELETE FROM bschedule WHERE stops=stp$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delbstop` (IN `stp` VARCHAR(4))  NO SQL
DELETE FROM busstop WHERE stid=stp$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delbus` (IN `bid` VARCHAR(120))  NO SQL
DELETE FROM buses WHERE busid=bid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delpass` (IN `pids` VARCHAR(20))  NO SQL
DELETE FROM passenger WHERE pid=pids$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delpathS` (IN `srcs` VARCHAR(4), IN `dests` VARCHAR(4))  NO SQL
DELETE FROM paths where src=srcs OR dest=dests$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `delticks` (IN `tid` VARCHAR(20))  NO SQL
DELETE FROM ticket WHERE ticketid=tid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deltran` (IN `tids` VARCHAR(20))  NO SQL
DELETE FROM transactions WHERE tid=tids$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deluser` (IN `usern` VARCHAR(50))  NO SQL
DELETE FROM users WHERE username=usern$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getbpath` ()  NO SQL
SELECT * FROM paths$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getbsche` ()  NO SQL
SELECT * FROM bschedule$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getbstop` ()  NO SQL
SELECT * FROM busstop ORDER BY val$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getbus` ()  NO SQL
SELECT * FROM buses$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getpass` ()  NO SQL
SELECT * FROM passenger$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getticks` ()  NO SQL
SELECT * FROM ticket$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getuser` ()  NO SQL
SELECT * FROM users$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `getbuscount` () RETURNS INT(11) BEGIN
DECLARE op INT;
  Select COUNT(*)into op FROM buses;
  RETURN op;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `getnumpass` () RETURNS INT(11) BEGIN
DECLARE op INT;
  Select COUNT(*) into op FROM passenger;
  RETURN op;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `getnumstop` () RETURNS INT(11) BEGIN
DECLARE op INT;
  Select COUNT(*) into op FROM busstop;
  RETURN op;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `getnumticks` () RETURNS INT(11) BEGIN
DECLARE op INT;
  Select COUNT(*) into op FROM ticket;
  RETURN op;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `getnumuser` () RETURNS INT(11) BEGIN
DECLARE op INT;
  Select COUNT(*) into op FROM users;
  RETURN op;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `getseatsav` (`bid` VARCHAR(20)) RETURNS INT(11) BEGIN
DECLARE op INT;
  Select SUM(num_seats_av)into op FROM buses WHERE busid=bid;
  RETURN op;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bschedule`
--

CREATE TABLE `bschedule` (
  `seq` int(11) DEFAULT NULL,
  `busid` varchar(120) NOT NULL,
  `stops` varchar(4) NOT NULL,
  `ar_time` time NOT NULL,
  `dep_time` time NOT NULL,
  `way` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bschedule`
--

INSERT INTO `bschedule` (`seq`, `busid`, `stops`, `ar_time`, `dep_time`, `way`) VALUES
(0, 'B01', 'PVL', '08:25:00', '08:30:00', 0),
(1, 'B01', 'BVI', '10:55:00', '11:00:00', 0),
(2, 'B01', 'VPI', '13:50:00', '14:00:00', 0),
(3, 'B01', 'NVS', '15:05:00', '15:10:00', 0),
(4, 'B01', 'ST', '16:10:00', '16:20:00', 0),
(5, 'B01', 'BRC', '19:30:00', '19:35:00', 0),
(6, 'B01', 'ADI', '21:30:00', '21:40:00', 0),
(0, 'B01', 'ADI', '21:30:00', '21:40:00', 1),
(1, 'B01', 'BRC', '23:30:00', '23:40:00', 1),
(2, 'B01', 'ST', '02:30:00', '02:40:00', 1),
(3, 'B01', 'NVS', '03:30:00', '03:40:00', 1),
(4, 'B01', 'VPI', '04:30:00', '04:40:00', 1),
(5, 'B01', 'BVI', '07:10:00', '07:20:00', 1),
(6, 'B01', 'PVL', '08:25:00', '08:30:00', 1),
(0, 'B02', 'PVL', '01:55:00', '10:30:00', 0),
(1, 'B02', 'BVI', '12:55:00', '13:00:00', 0),
(2, 'B02', 'VPI', '15:50:00', '16:00:00', 0),
(3, 'B02', 'ST', '18:05:00', '18:30:00', 0),
(0, 'B02', 'ST', '18:05:00', '18:30:00', 1),
(1, 'B02', 'VPI', '20:45:00', '20:55:00', 1),
(2, 'B02', 'BVI', '23:25:00', '23:30:00', 1),
(3, 'B02', 'PVL', '01:55:00', '10:30:00', 1),
(0, 'B03', 'BVI', '12:20:00', '06:30:00', 0),
(1, 'B03', 'VPI', '09:20:00', '09:30:00', 0),
(0, 'B03', 'VPI', '09:25:00', '09:30:00', 1),
(1, 'B03', 'BVI', '12:20:00', '06:30:00', 1),
(0, 'B04', 'ST', '19:25:00', '08:30:00', 0),
(1, 'B04', 'BRC', '11:45:00', '11:50:00', 0),
(2, 'B04', 'ADI', '13:50:00', '14:00:00', 0),
(0, 'B04', 'ADI', '13:50:00', '14:00:00', 1),
(1, 'B04', 'BRC', '16:05:00', '16:10:00', 1),
(2, 'B04', 'ST', '19:25:00', '08:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `busid` varchar(120) NOT NULL,
  `busname` varchar(120) NOT NULL,
  `num_seats_av` int(11) DEFAULT 30
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`busid`, `busname`, `num_seats_av`) VALUES
('B01', 'A1 BUS', 39),
('B02', 'ODESSEY BUS', 40),
('B03', 'CHARIOT BUS', 40),
('B04', 'WESTERN RIDE', 40);

-- --------------------------------------------------------

--
-- Table structure for table `busstop`
--

CREATE TABLE `busstop` (
  `stid` varchar(4) DEFAULT NULL,
  `stops` varchar(30) NOT NULL,
  `val` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `busstop`
--

INSERT INTO `busstop` (`stid`, `stops`, `val`) VALUES
('ADI', 'AHMEDABAD', 7),
('BVI', 'BORIVALI', 2),
('NVS', 'NAVSARI', 4),
('PVL', 'PANVEL', 1),
('ST', 'SURAT', 5),
('BRC', 'VADODARA', 6),
('VPI', 'VAPI', 3);

-- --------------------------------------------------------

--
-- Stand-in structure for view `imgset`
-- (See below for the actual view)
--
CREATE TABLE `imgset` (
`iduser` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `pid` varchar(20) NOT NULL,
  `pname` varchar(120) NOT NULL,
  `dob` date NOT NULL,
  `pgender` varchar(10) NOT NULL,
  `pphone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`pid`, `pname`, `dob`, `pgender`, `pphone`) VALUES
('PN443737', 'Aman Kumar', '2001-01-02', 'Male', '+918779694295');

-- --------------------------------------------------------

--
-- Table structure for table `paths`
--

CREATE TABLE `paths` (
  `src` varchar(4) DEFAULT NULL,
  `dest` varchar(4) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paths`
--

INSERT INTO `paths` (`src`, `dest`, `distance`) VALUES
('PVL', 'ST', 303),
('PVL', 'VPI', 189),
('PVL', 'BVI', 60),
('PVL', 'BRC', 432),
('PVL', 'ADI', 545),
('PVL', 'NVS', 264),
('VPI', 'PVL', 189),
('VPI', 'BVI', 160),
('VPI', 'BRC', 245),
('VPI', 'ADI', 358),
('VPI', 'NVS', 78),
('VPI', 'ST', 117),
('BVI', 'VPI', 160),
('BVI', 'PVL', 60),
('BVI', 'BRC', 390),
('BVI', 'ADI', 503),
('BVI', 'NVS', 223),
('BVI', 'ST', 262),
('BRC', 'VPI', 245),
('BRC', 'BVI', 390),
('BRC', 'PVL', 432),
('BRC', 'ADI', 111),
('BRC', 'NVS', 171),
('BRC', 'ST', 152),
('ADI', 'VPI', 358),
('ADI', 'BVI', 503),
('ADI', 'BRC', 111),
('ADI', 'PVL', 545),
('ADI', 'NVS', 281),
('ADI', 'ST', 263),
('NVS', 'VPI', 78),
('NVS', 'BVI', 223),
('NVS', 'BRC', 171),
('NVS', 'ADI', 281),
('NVS', 'PVL', 264),
('NVS', 'ST', 41),
('ST', 'VPI', 117),
('ST', 'BVI', 262),
('ST', 'BRC', 152),
('ST', 'ADI', 263),
('ST', 'NVS', 41),
('ST', 'PVL', 303);

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `pstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profileimg`
--

INSERT INTO `profileimg` (`id`, `iduser`, `pstatus`) VALUES
(0, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticketid` varchar(20) NOT NULL,
  `tid` varchar(20) NOT NULL,
  `pid` varchar(20) NOT NULL,
  `seatno` int(11) NOT NULL,
  `src` varchar(4) NOT NULL,
  `dest` varchar(4) NOT NULL,
  `jdate` date NOT NULL,
  `busid` varchar(120) DEFAULT NULL,
  `fare` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticketid`, `tid`, `pid`, `seatno`, `src`, `dest`, `jdate`, `busid`, `fare`) VALUES
('TK760596', 'TR1710642917', 'PN443737', 10, 'PVL', 'ADI', '2021-04-29', 'B01', 2180);

-- --------------------------------------------------------

--
-- Stand-in structure for view `totbooks`
-- (See below for the actual view)
--
CREATE TABLE `totbooks` (
`iduser` int(11)
,`ubooknum` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `tid` varchar(20) NOT NULL,
  `tdate` date NOT NULL,
  `ttime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`tid`, `tdate`, `ttime`) VALUES
('TR1710642917', '2021-04-25', '00:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `userpass`
--

CREATE TABLE `userpass` (
  `username` varchar(50) NOT NULL,
  `pid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userpass`
--

INSERT INTO `userpass` (`username`, `pid`) VALUES
('U19CS003', 'PN443737');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `upwd` varchar(128) NOT NULL,
  `uemail` varchar(128) NOT NULL,
  `uname` varchar(129) NOT NULL,
  `ugender` varchar(128) NOT NULL,
  `uage` int(3) NOT NULL,
  `ucity` varchar(128) NOT NULL,
  `upincode` int(6) NOT NULL,
  `uphone` varchar(15) NOT NULL,
  `uaddress` text NOT NULL,
  `ubooknum` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `username`, `upwd`, `uemail`, `uname`, `ugender`, `uage`, `ucity`, `upincode`, `uphone`, `uaddress`, `ubooknum`) VALUES
(9, 'U19CS003', '$2y$10$phUs5BMkxOh5XqMjAqVpneCN3ico8nSGOPwdNeT3xJ8Q4/5D6J2M6', 'amanv228@gmail.com', 'Aman Kumar', 'Male', 21, 'PANVEL', 410206, '+918779694295', 'FLAT NO. 101, BLDG NO. 3 ECONOMY, NEELKAMAL SOCIETY, PANVEL, 410206, Maharashtra', 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `usertick`
-- (See below for the actual view)
--
CREATE TABLE `usertick` (
`username` varchar(50)
,`ticketid` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `imgset`
--
DROP TABLE IF EXISTS `imgset`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `imgset`  AS  select `profileimg`.`iduser` AS `iduser` from `profileimg` where `profileimg`.`pstatus` = 0 ;

-- --------------------------------------------------------

--
-- Structure for view `totbooks`
--
DROP TABLE IF EXISTS `totbooks`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totbooks`  AS  select `users`.`iduser` AS `iduser`,`users`.`ubooknum` AS `ubooknum` from `users` ;

-- --------------------------------------------------------

--
-- Structure for view `usertick`
--
DROP TABLE IF EXISTS `usertick`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usertick`  AS  select `u`.`username` AS `username`,`t`.`ticketid` AS `ticketid` from (`userpass` `u` join `ticket` `t`) where `u`.`pid` = `t`.`pid` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bschedule`
--
ALTER TABLE `bschedule`
  ADD KEY `busid` (`busid`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`busid`);

--
-- Indexes for table `busstop`
--
ALTER TABLE `busstop`
  ADD PRIMARY KEY (`stops`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticketid`),
  ADD KEY `busid` (`busid`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bschedule`
--
ALTER TABLE `bschedule`
  ADD CONSTRAINT `bschedule_ibfk_1` FOREIGN KEY (`busid`) REFERENCES `buses` (`busid`) ON DELETE CASCADE;

--
-- Constraints for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD CONSTRAINT `profileimg_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`busid`) REFERENCES `buses` (`busid`) ON DELETE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `checkpass` ON SCHEDULE EVERY 1 DAY STARTS '2021-04-19 10:36:02' ENDS '2021-06-19 10:36:02' ON COMPLETION NOT PRESERVE ENABLE DO DELETE from passenger where pid=(select pid from ticket WHERE jdate<CURRENT_DATE)$$

CREATE DEFINER=`root`@`localhost` EVENT `checkup` ON SCHEDULE EVERY 1 DAY STARTS '2021-04-19 10:36:35' ENDS '2021-06-19 10:36:35' ON COMPLETION NOT PRESERVE ENABLE DO DELETE from userpass where pid=(select pid from ticket WHERE jdate<CURRENT_DATE)$$

CREATE DEFINER=`root`@`localhost` EVENT `checktr` ON SCHEDULE EVERY 1 DAY STARTS '2021-04-19 10:37:38' ENDS '2021-06-19 10:37:38' ON COMPLETION NOT PRESERVE ENABLE DO DELETE from transactions where tid=(select tid from ticket WHERE jdate<CURRENT_DATE)$$

CREATE DEFINER=`root`@`localhost` EVENT `upbuses` ON SCHEDULE EVERY 1 DAY STARTS '2021-04-19 10:38:05' ENDS '2021-06-19 10:38:05' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE buses SET num_seats_av=num_seats_av+1 WHERE busid=(select busid from ticket WHERE jdate<CURRENT_DATE)$$

CREATE DEFINER=`root`@`localhost` EVENT `checktick` ON SCHEDULE EVERY 1 DAY STARTS '2021-04-19 10:38:31' ENDS '2021-06-19 10:38:31' ON COMPLETION NOT PRESERVE ENABLE DO DELETE from ticket WHERE jdate<CURRENT_DATE$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
