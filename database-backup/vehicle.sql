

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `tbl_admin` (`id`, `full_name`, `user_name`, `password`) VALUES
(27, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');



CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `tbl_category` (`id`, `title`, `image_name`) VALUES
(54, 'Tipper', 'Vehicle_class_750.jpg'),
(56, 'Van', 'vehicle_class_280.jpg'),
(57, 'Lorry', 'vehicle_class_577.jpg'),
(58, 'Jeep', 'Vehicle_class_645.jpg');



CREATE TABLE `tbl_vehicle` (
  `id` int(10) UNSIGNED NOT NULL,
  `make` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `fuel_type` varchar(20) NOT NULL,
  `cylinder` int(11) UNSIGNED NOT NULL,
  `year` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `tbl_vehicle` (`id`, `make`, `country`, `image_name`, `category_id`, `fuel_type`, `cylinder`, `year`) VALUES
(97, 'Toyota', 'japan', 'Vehicle_name_671.jpg', 56, 'diesel', 3000, 2006),
(99, 'Isuzu', 'japan', 'Vehicle_name_505.jpg', 57, 'diesel', 3300, 2004),
(100, 'Canter', 'japan', 'Vehicle_name_352.png', 54, 'diesel', 3500, 1990),
(101, 'Mahindra', 'India', 'Vehicle_name_564.jpg', 57, 'diesel', 2000, 2009),
(102, 'Mahindra', 'India', 'Vehicle_name_902.png', 58, 'diesel', 2000, 1999),
(103, 'Toyota', 'japan', 'Vehicle_name_442.jpg', 58, 'diesel', 2500, 2012);


ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tbl_vehicle`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;


ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;


ALTER TABLE `tbl_vehicle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

