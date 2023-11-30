-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 09:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freedb_agenda_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda_details`
--

CREATE TABLE `agenda_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `agenda_number` varchar(128) NOT NULL,
  `agenda_date` date NOT NULL,
  `agenda_start` time NOT NULL,
  `agenda_end` time NOT NULL,
  `agenda_place` enum('Ruang Rapat','Ruang Aula','Ruang Direksi') NOT NULL,
  `agenda_program` varchar(1024) NOT NULL,
  `agenda_taskperson` varchar(256) NOT NULL,
  `is_verified` enum('not_verified','accepted','declined') NOT NULL DEFAULT 'not_verified',
  `agenda_annotation` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agenda_details`
--

INSERT INTO `agenda_details` (`id`, `user_id`, `agenda_number`, `agenda_date`, `agenda_start`, `agenda_end`, `agenda_place`, `agenda_program`, `agenda_taskperson`, `is_verified`, `agenda_annotation`) VALUES
(36, 15, '2023113036', '2023-11-30', '09:00:00', '14:00:00', 'Ruang Rapat', 'Coba Waktu Agenda', 'Gregi Maulana  Mahes', 'not_verified', ''),
(40, 15, '2023113040', '2023-11-30', '14:00:00', '15:00:00', 'Ruang Rapat', 'Coba Waktu Agenda', 'Gregi Maulana  Mahes', 'not_verified', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `role` tinyint(1) NOT NULL COMMENT '0 = Member, 1 = Administrator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `username`, `password`, `first_name`, `last_name`, `role`) VALUES
(1, 'superadmin', '$2y$10$GaZ0jwFzdO9s8E275kDApum77gbUDyW8XtbsLnuutkfMG54Mqbxx2', 'super', 'admin', 1),
(15, 'mahes', '$2y$10$7YA6w43QIHFNH3Zyv8G8AubqT99IBPWQ6xqQmvFtBTtCwTERoCbM6', 'Gregi Maulana ', 'Mahes', 0),
(17, 'rosi', '$2y$10$4JmGTQ2GTfIBtD5jFJFzNeB0TZMlSfxLlmBV.Qii0h12AwrNIrgge', 'Rosilia Dwi ', 'Daliani', 0),
(19, 'lia', '$2y$10$rp.Knc07kiuHz7tuX7k6Ju3rPq3jZwLXIj860gtwYTi0Y2vGBM76W', 'Rizky Frida ', 'Afilia', 0),
(20, 'bryan', '$2y$10$wU/0gf/1AloBxvfpIvnb6OM6APlTtYk39xzBhZPwSwXUtlFue.hNO', 'Brillyan Kurnia', 'Akbar', 0),
(21, 'ani', '$2y$10$9r2tcqcSKcjw93e9oIUqXuWpRQeaqSrRIVeM3o2oIl9h53BigbJaW', 'Aniyatul', 'Izah', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda_details`
--
ALTER TABLE `agenda_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda_details`
--
ALTER TABLE `agenda_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
