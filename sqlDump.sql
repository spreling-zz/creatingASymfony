-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2016 at 05:32 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `symfony`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`id`, `name`) VALUES
(8, 'evaluatie formulier'),
(9, 'evaluatie formulier'),
(10, 'evaluatie formulier');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `evaluation_id` int(11) DEFAULT NULL,
  `answerType` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `evaluation_id`, `answerType`, `question`) VALUES
(16, 8, 10, 'vraag 1'),
(17, 8, 10, 'vraag 2'),
(18, 8, 10, 'vraag 3'),
(19, 8, 10, 'vraag 4'),
(20, 8, 10, 'vraag 5'),
(21, 9, 10, 'Ik sta sterker in mijn schoenen voor het examen door het volgen van deze training'),
(22, 9, 10, 'Ik heb mijn vakkennis vergroot door het volgen van deze training.'),
(23, 9, 10, 'Ik begrijp de stof beter door het volgen van deze training.'),
(24, 9, 10, 'Ik heb meer zelfvertrouwen gekregen door het volgen van deze training.'),
(25, 9, 10, 'Ik begin gemotiveerder aan het eindexamen door het volgen van deze training.'),
(26, 10, 10, 'Ik sta sterker in mijn schoenen voor het examen door het volgen van deze training'),
(27, 10, 10, 'Ik heb mijn vakkennis vergroot door het volgen van deze training.'),
(28, 10, 10, 'Ik begrijp de stof beter door het volgen van deze training.'),
(29, 10, 10, 'Ik heb meer zelfvertrouwen gekregen door het volgen van deze training.'),
(30, 10, 10, 'Ik begin gemotiveerder aan het eindexamen door het volgen van deze training.');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `submission_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `id` int(11) NOT NULL,
  `evaluation_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `submission_id` int(11) DEFAULT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B6F7494E456C5646` (`evaluation_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_136AC113E1FD4933` (`submission_id`),
  ADD KEY `IDX_136AC1131E27F6BF` (`question_id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_94585923A76ED395` (`user_id`),
  ADD KEY `IDX_94585923456C5646` (`evaluation_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E1FD4933` (`submission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `FK_B6F7494E456C5646` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluation` (`id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `FK_136AC1131E27F6BF` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`),
  ADD CONSTRAINT `FK_136AC113E1FD4933` FOREIGN KEY (`submission_id`) REFERENCES `submission` (`id`);

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `FK_94585923456C5646` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluation` (`id`),
  ADD CONSTRAINT `FK_94585923A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D649E1FD4933` FOREIGN KEY (`submission_id`) REFERENCES `submission` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
