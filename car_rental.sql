-- phpMyAdmin SQL Dump
-- Modified to keep only car, client, reservations tables
-- Removed user_sessions and renamed tables

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------
-- Table `client` (renamed from `users`)
-- --------------------------------------------------------
CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Existing data from `users`
INSERT INTO `client` (`id`, `first_name`, `last_name`, `email`, `username`, `password`) VALUES
(3, 'tawfik', 'chella', 'taawfik@kamal.com', 'poul', '$2y$10$LL8E9VC.B4RqTOAE0ZCghuotokF5GWBsMGMaSwA4G11r9O/obfFgS'),
(4, 'oumayma', 'cherfani', 'oumaymacherfani@gmail.com', 'ouma', '$2y$10$4fqiwqLKNU54DHg3.jx.Juo9yoyFIcdY15f9TjfVSPqaDbOb.ACJe'),
(5, 'Maroua', 'mounach', 'maroua@gmail.com', 'marouamch', '$2y$10$C1zFUzh2T0c7n93BHTWcDetLG2jr.Kf2WykBoWh4hXvBcY2ls3kda'),
(6, 'mouad', 'raffass', 'mouad@gmail.com', 'mouad', '$2y$10$Kjh0G8ZwAem7r/aMVvtLHOxeJZznvyC0.Ab4wtmvH001Kg2o9Ctx2');

-- --------------------------------------------------------

-- --------------------------------------------------------
CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `bags` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `doors` int(11) DEFAULT 2,
  `image3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `car` (`id`, `title`, `price`, `image1`, `image2`, `seats`, `bags`, `description`, `doors`, `image3`) VALUES
(1, '2016 Mercedes-Benz SLK', 79.00, 'images/i29.jpg', 'images/i40.jpg', 2, 2, NULL, 2, 'z-car-1.png'),
(2, '2016 Chevrolet Malibu', 79.00, 'images/i28.jpg', 'images/i32.jpg', 2, 2, NULL, 2, 'z-car-2.png'),
(3, 'Bugatti Veyron', 79.00, 'images/i27.jpg', 'images/i33.jpg', 2, 2, NULL, 2, 'z-car-3.png'),
(4, '2016 Nissan Juke', 79.00, 'images/i31.jpg', 'images/i35.jpg', 2, 2, NULL, 2, 'z-car-4.png');


CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `pickup_date` date NOT NULL,
  `return_date` date NOT NULL,
  `car_selected` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Existing data from `reservations`
INSERT INTO `reservations` (`id`, `first_name`, `last_name`, `pickup_date`, `return_date`, `car_selected`) VALUES
(5, 'tawfik', 'chella', '1970-01-01', '1970-01-01', 2),
(6, 'tawfik', 'chella', '1970-01-01', '1970-01-01', 2),
(7, 'tawfik', 'chella', '2002-01-06', '2004-01-03', 2),
(8, 'mouad', 'raffass', '2024-06-04', '2024-08-02', 1);
-- --------------------------------------------------------
DROP TABLE IF EXISTS `user_sessions`;

-- --------------------------------------------------------
-- Add primary keys and foreign keys
-- --------------------------------------------------------
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_selected` (`car_selected`),
  ADD CONSTRAINT `reservations_ibfk_car` FOREIGN KEY (`car_selected`) REFERENCES `car` (`id`);

-- AUTO_INCREMENT reset (preserve existing IDs)
-- --------------------------------------------------------
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;