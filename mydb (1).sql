-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2017 at 07:10 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `idAuthors` int(11) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `authors_has_book`
--

CREATE TABLE `authors_has_book` (
  `Authors_idAuthors` int(11) NOT NULL,
  `Book_isbnBook` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbnBook` int(11) NOT NULL,
  `Title` varchar(45) DEFAULT NULL,
  `genre` varchar(45) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbnBook`, `Title`, `genre`, `Quantity`) VALUES
(111111, 'The first book', 'test', 1),
(222222, 'The second book', 'test', 1),
(444444, 'Book of test', 'test', 1),
(3333333, 'Another book', 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `idLibrarian` varchar(15) NOT NULL,
  `FirstName` varchar(45) DEFAULT NULL,
  `LastName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`idLibrarian`, `FirstName`, `LastName`) VALUES
('admin01', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserName` varchar(15) NOT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `emailaddress` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_borrow_book`
--

CREATE TABLE `user_borrow_book` (
  `Users_UserName` varchar(15) NOT NULL,
  `Book_isbnBook` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`idAuthors`);

--
-- Indexes for table `authors_has_book`
--
ALTER TABLE `authors_has_book`
  ADD PRIMARY KEY (`Authors_idAuthors`,`Book_isbnBook`),
  ADD KEY `fk_Authors_has_Book_Book1_idx` (`Book_isbnBook`),
  ADD KEY `fk_Authors_has_Book_Authors1_idx` (`Authors_idAuthors`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbnBook`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`idLibrarian`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserName`);

--
-- Indexes for table `user_borrow_book`
--
ALTER TABLE `user_borrow_book`
  ADD PRIMARY KEY (`Users_UserName`,`Book_isbnBook`),
  ADD KEY `fk_ User_borrow_Book _Book1_idx` (`Book_isbnBook`),
  ADD KEY `fk_ User_borrow_Book _ Users1_idx` (`Users_UserName`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authors_has_book`
--
ALTER TABLE `authors_has_book`
  ADD CONSTRAINT `fk_Authors_has_Book_Authors1` FOREIGN KEY (`Authors_idAuthors`) REFERENCES `authors` (`idAuthors`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Authors_has_Book_Book1` FOREIGN KEY (`Book_isbnBook`) REFERENCES `book` (`isbnBook`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_borrow_book`
--
ALTER TABLE `user_borrow_book`
  ADD CONSTRAINT `fk_ User_borrow_Book _Book1` FOREIGN KEY (`Book_isbnBook`) REFERENCES `book` (`isbnBook`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ User_borrow_Book _Users1` FOREIGN KEY (`Users_UserName`) REFERENCES `users` (`UserName`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
