-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2024 at 07:32 PM
-- Server version: 8.0.37
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ds_estate`
--

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int NOT NULL,
  `photo` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `num_rooms` int NOT NULL,
  `price_per_night` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `photo`, `title`, `area`, `num_rooms`, `price_per_night`, `created_at`, `updated_at`, `description`) VALUES
(11, 'house1.jpg', 'Charming Cottage', 'Athens', 3, 80, '2023-01-01 08:00:00', '2024-06-30 16:22:00', 'A charming cottage in the heart of Athens, offering a peaceful retreat amidst the bustling city. This cozy cottage features three bedrooms, a spacious living area, and a fully equipped kitchen. Enjoy your morning coffee on the charming patio overlooking the garden, or take a stroll to explore the nearby historic sites and vibrant neighborhoods.'),
(12, 'house1.jpg', 'Modern Apartment', 'Thessaloniki', 2, 100, '2023-01-02 09:00:00', '2024-06-30 16:23:55', 'Experience luxury living in this modern apartment with stunning sea views. Located in the heart of Thessaloniki, this stylish apartment offers two spacious bedrooms, a sleek kitchen, and a comfortable living area. Step out onto the private balcony to enjoy breathtaking sunsets over the Aegean Sea, or explore the vibrant city center just steps away.'),
(13, 'house1.jpg', 'Cozy Studio', 'Patras', 1, 50, '2023-01-03 10:00:00', '2024-06-30 16:23:55', 'Escape to this charming studio in the heart of Patras, perfect for solo travelers or couples seeking a cozy retreat. This intimate studio features a comfortable bed, a small kitchenette, and a modern bathroom. Enjoy a leisurely breakfast on the sunny balcony, or venture out to explore the historic city center and picturesque waterfront.'),
(14, 'house1.jpg', 'Spacious Villa', 'Heraklion', 5, 200, '2023-01-04 11:00:00', '2024-06-30 16:23:55', 'Indulge in luxury at this spacious villa with a private pool in Heraklion. Perfect for families or groups, this elegant villa boasts five bedrooms, a gourmet kitchen, and a stylish living area. Spend your days lounging by the pool, soaking up the Mediterranean sun, or explore the nearby beaches, historic sites, and charming villages.'),
(15, 'house1.jpg', 'Luxury Penthouse', 'Chania', 4, 250, '2023-01-05 12:00:00', '2024-06-30 16:23:55', 'Experience the height of luxury at this stunning penthouse in Chania. Offering breathtaking views of the Venetian harbor and the White Mountains, this elegant penthouse features four luxurious bedrooms, a spacious living area, and a rooftop terrace with a private hot tub. Indulge in gourmet meals prepared in the fully equipped kitchen, or explore the vibrant streets of Chania just steps away.'),
(16, 'house1.jpg', 'Beachfront Bungalow', 'Rhodes', 2, 150, '2023-01-06 13:00:00', '2024-06-30 16:22:00', 'Escape to paradise at this beachfront bungalow in Rhodes. Nestled along the shores of the Aegean Sea, this charming bungalow offers direct access to the beach and stunning ocean views. Relax on the private terrace, take a dip in the crystal-clear waters, or explore the nearby town with its quaint shops and tavernas. Whether you`re seeking relaxation or adventure, this beachfront retreat has it all.'),
(17, 'house1.jpg', 'Mountain Cabin', 'Ioannina', 3, 90, '2023-01-07 14:00:00', '2024-06-30 16:23:55', 'Experience the beauty of nature at this cozy mountain cabin in Ioannina. Tucked away in the picturesque mountains, this rustic cabin offers breathtaking views and a peaceful retreat from the hustle and bustle of city life. Cozy up by the fireplace with a good book, or venture out to explore the surrounding trails and natural wonders.'),
(18, 'house1.jpg', 'City Center Flat', 'Volos', 1, 70, '2023-01-08 15:00:00', '2024-06-30 16:23:55', 'Discover the vibrant city of Volos from this centrally located flat. Situated in the heart of the city, this modern flat offers easy access to shops, restaurants, and attractions. The comfortable bedroom, fully equipped kitchen, and cozy living area make it the perfect home base for exploring the city and its surroundings.');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int NOT NULL,
  `user_id` int NOT NULL,
  `property_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `user_id`, `property_id`, `start_date`, `end_date`, `total_price`) VALUES
(31, 1, 11, '2024-06-01', '2024-06-05', 500),
(32, 2, 12, '2024-06-03', '2024-06-07', 600),
(33, 3, 13, '2024-06-10', '2024-06-15', 750),
(34, 4, 14, '2024-06-05', '2024-06-10', 700),
(35, 5, 15, '2024-06-20', '2024-06-25', 850),
(36, 1, 12, '2024-06-15', '2024-06-18', 450),
(37, 2, 13, '2024-06-22', '2024-06-26', 640),
(38, 3, 14, '2024-06-12', '2024-06-17', 820),
(39, 4, 15, '2024-06-25', '2024-06-30', 900),
(53, 1, 11, '2024-06-23', '2024-06-24', 80);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Γιώργος', 'Παπαδόπουλος', 'george1', 'pass1234', 'george1@example.com', '2024-06-01 07:38:43', '2024-06-01 07:38:43'),
(2, 'Δημήτρης', 'Νικολάου', 'dimitris1', 'pass1234', 'dimitris1@example.com', '2024-06-01 07:38:43', '2024-06-01 07:38:43'),
(3, 'Κωνσταντίνος', 'Κωνσταντίνου', 'konstantinos1', 'pass1234', 'konstantinos1@example.com', '2024-06-01 07:38:43', '2024-06-01 07:38:43'),
(4, 'Νίκος', 'Οικονόμου', 'nikos1', 'pass1234', 'nikos1@example.com', '2024-06-01 07:38:43', '2024-06-01 07:38:43'),
(5, 'Μαρία', 'Παπαδοπούλου', 'maria1', 'pass1234', 'maria1@example.com', '2024-06-01 07:38:43', '2024-06-01 07:38:43'),
(6, 'Ελένη', 'Γεωργίου', 'eleni1', 'pass1234', 'eleni1@example.com', '2024-06-01 07:38:43', '2024-06-01 07:38:43'),
(7, 'Αναστασία', 'Βασιλείου', 'anastasia1', 'pass1234', 'anastasia1@example.com', '2024-06-01 07:38:43', '2024-06-01 07:38:43'),
(8, 'Αλέξανδρος', 'Σωτηρίου', 'alexandros1', 'pass1234', 'alexandros1@example.com', '2024-06-01 07:38:43', '2024-06-01 07:38:43'),
(9, 'Χρήστος', 'Παπαδάκης', 'christos1', 'pass1234', 'christos1@example.com', '2024-06-01 07:38:43', '2024-06-01 07:38:43'),
(10, 'Ιωάννης', 'Κυριακίδης', 'ioannis1', 'pass1234', 'ioannis1@example.com', '2024-06-01 07:38:43', '2024-06-01 07:38:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
