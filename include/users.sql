SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `user_id` varchar(15) NOT NULL,
  `user_security_token` varchar(11) NOT NULL,
  `user_registration_date` date NOT NULL,
  `user_user_name` varchar(11) NOT NULL,
  `user_password` text NOT NULL,
  `user_email` text NOT NULL,
  `user_phone` text NOT NULL,
  `user_birthdate` date NOT NULL,
  `user_verified_token` varchar(11) NOT NULL,
  `user_first_name` text NOT NULL,
  `user_last_name` text NOT NULL,
  `user_about_me` text NOT NULL,
  `user_work_place` text NOT NULL,
  `user_address` text NOT NULL,
  `user_website` text NOT NULL,
  `user_facebook_id` text NOT NULL,
  `user_instagram_id` text NOT NULL,
  `user_twitter_id` text NOT NULL,
  `user_google_id` text NOT NULL,
  `user_relationship` text NOT NULL,
  `user_photo` text NOT NULL,
  `user_banner` text NOT NULL,
  `user_rol` int(11) NOT NULL,
  -- New blocks -- 
  `user_gender` text NOT NULL,
  `user_location` text NOT NULL,
  `pet_main_photo` text NOT NULL,


  `privacy_send_messages` text NOT NULL,
  
  ALTER TABLE users ADD privacy_see_my_friends TEXT NOT NULL AFTER privacy_send_messages;
  ALTER TABLE users ADD privacy_post_in_wall TEXT NOT NULL AFTER privacy_see_my_friends;
  ALTER TABLE users ADD privacy_see_my_birthdate TEXT NOT NULL AFTER privacy_post_in_wall;


  ALTER TABLE users ADD user_links_facebook TEXT NOT NULL AFTER privacy_see_my_birthdate;
  ALTER TABLE users ADD user_links_twitter TEXT NOT NULL AFTER user_links_facebook;
  ALTER TABLE users ADD user_links_instagram TEXT NOT NULL AFTER user_links_twitter;
  ALTER TABLE users ADD user_links_google_plus TEXT NOT NULL AFTER user_links_instagram;
  ALTER TABLE users ADD user_links_linkedin TEXT NOT NULL AFTER user_links_google_plus;
  ALTER TABLE users ADD user_links_youtube TEXT NOT NULL AFTER user_links_linkedin;
  
  `user_links_facebook` text NOT NULL,
  `user_links_twitter` text NOT NULL,
  `user_links_instagram` text NOT NULL,
  `user_links_google_plus` text NOT NULL,
  `user_links_linkedin` text NOT NULL,
  `user_links_youtube` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_security_token`, `user_registration_date`, `user_user_name`, `user_password`, `user_email`, `user_phone`, `user_birthdate`, `user_verified_token`, `user_first_name`, `user_last_name`, `user_about_me`, `user_work_place`, `user_address`, `user_website`, `user_facebook_id`, `user_instagram_id`, `user_twitter_id`, `user_google_id`, `user_relationship`, `user_photo`, `user_banner`, `user_rol`,`user_gender`,`user_location`, `pet_main_photo`) VALUES
('u_5b4ceab93d6a9', '90653331456', '2018-07-16', 'pereirawe', 'SGkxMjM0NTY3ODkwNjUzMzMxNDU2', 'pereirawe@gmail.com', '3112468613', '2018-07-16', 'true', 'William', 'Pereira Carrasquero', '', '', '', '', '10216803521820317', '', '', '106254221619299258979', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=10216803521820317&height=200&width=200&ext=1538069924&hash=AeQT410js10gPw2s', '', 1, "", "", "", "", "", "", "", "", "", "", "", "", ""),
('u_5b75c6afa0810', '50310651904', '2018-08-16', 'freddyrom', 'MjM0c3d2NTAzMTA2NTE5MDQ=', 'freddyrome82@gmail.com', '', '0000-00-00', 'true', 'Freddy', 'Romero', '', '', '', '', '', '', '', '115969555909330477338', '', 'https://lh4.googleusercontent.com/-Un4ahjP6h-A/AAAAAAAAAAI/AAAAAAAAACQ/OAaaVNm-p0w/photo.jpg', '', 0, "", "", "", "", "", "", "", "", "", "", "", "", ""),
('u_5b4d3282c81fd', '19920224256', '2018-07-16', 'German17', 'MTIzNDE5OTIwMjI0MjU2', 'mgyavega@hotmail.com', '3137250000', '2010-08-17', 'true', 'Mario', 'Agudelo', '', '', '', '', '10156216205454892', '', '', '', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=10156216205454892&height=200&width=200&ext=1538074676&hash=AeQJNW0qJfCZbj1i', '', 1, "", "", "", "", "", "", "", "", "", "", "", "", ""),
('u_5b57383589a7f', '16500008960', '2018-07-24', 'Mario1708', 'aGkxNzA4MTY1MDAwMDg5NjA=', 'vetstorecol@gmail.com', '1234567891', '1986-08-17', 'true', 'Vet', 'Store', '', '', '', '', '', '', '', '104324362474425707424', '', 'https://lh5.googleusercontent.com/-Jbrqw8Tzg3c/AAAAAAAAAAI/AAAAAAAABYc/8K9XJOZe_4U/photo.jpg', '', 0, "", "", "", "", "", "", "", "", "", "", "", "", ""),
('u_5b611cdae8d5b', '21142964224', '2018-07-31', 'iamwilljpt', 'Q2FzYTEyMzIxMTQyOTY0MjI0', 'iamwilljpt@gmail.com', '3112468613', '2000-07-31', 'true', 'William Jesús', 'Pereira Tovar', '', '', '', '', '1599002600227706', '', '', '', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=1599002600227706&height=200&width=200&ext=1536769752&hash=AeQKlqYAsu_t8jNw', '', 0, "", "", "", "", "", "", "", "", "", "", "", "", ""),
('u_5b6b649d23042', '07418511360', '2018-08-08', '', 'enQucGc1MDc0MTg1MTEzNjA=', '', '', '0000-00-00', 'true', 'Ximena', 'Kviedes', '', '', '', '', '430343974144278', '', '', '', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=430343974144278&height=200&width=200&ext=1536356777&hash=AeToqXwoPGORJBg7', '', 0, "", "", "", "", "", "", "", "", "", "", "", "", ""),
('u_5b6b65281c7a6', '36398823424', '2018-08-08', 'estefania', 'NjF6eGpzMzYzOTg4MjM0MjQ=', 'estefaniag0817@gmail.com', '', '0000-00-00', 'true', 'Estefania', 'Álvarez', '', '', '', '', '751401228537416', '', '', '', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=751401228537416&height=200&width=200&ext=1536357887&hash=AeQOCvuvV5SzXrLT', '', 0, "", "", "", "", "", "", "", "", "", "", "", "", ""),
('u_5b6b66c3c8f27', '89879912448', '2018-08-08', 'misterpel', 'MW85ODM5ODk4Nzk5MTI0NDg=', 'misterpelu28040@gmail.com', '', '0000-00-00', 'true', 'Monica', 'Caviedes', '', '', '', '', '', '', '', '111385499288330792749', '', 'https://lh4.googleusercontent.com/-cmilhrRncMs/AAAAAAAAAAI/AAAAAAAAPaM/ysWmE8yC-_A/photo.jpg', '', 0, "", "", "", "", "", "", "", "", "", "", "", "", ""),
('u_5b6b69b3858c0', '93746151424', '2018-08-08', 'vetstorec', 'OTY2Z2szOTM3NDYxNTE0MjQ=', 'vetstorecol2018@gmail.com', '', '0000-00-00', 'true', 'Hi', 'Company', '', '', '', '', '', '', '', '109530095750869178178', '', 'https://lh6.googleusercontent.com/-zgOjes40PA4/AAAAAAAAAAI/AAAAAAAAAAA/AAnnY7o7NYtgb8lIFY-eIDd6eJhTqKON5g/mo/photo.jpg', '', 0, "", "", "", "", "", "", "", "", "", "", "", "", "");


ALTER TABLE `users`
  ADD UNIQUE KEY `user_id` (`user_id`);
COMMIT;
