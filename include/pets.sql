SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `pets` (
    `user_id` varchar(15) NOT NULL,
    `pet_id` varchar(15) NOT NULL,
    `pet_name` text NOT NULL,
    `pet_avatar` text NOT NULL,
    `pet_type` text NOT NULL,
    `pet_race` text NOT NULL,
    `pet_breed` text NOT NULL,
    `pet_gender` text NOT NULL,
    `pet_hobbies` text NOT NULL,
    `pet_country` text NOT NULL,
    `pet_birthdate` text NOT NULL,
    `pet_about` text NOT NULL,
    `pet_medical_prescription` text NOT NULL,
    `pet_vacines` text NOT NULL,
    `pet_foods` text NOT NULL
    

) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `pets`
  ADD UNIQUE KEY `user_id` (`user_id`);
COMMIT;