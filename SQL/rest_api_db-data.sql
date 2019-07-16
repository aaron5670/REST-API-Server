-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Gegenereerd op: 16 jul 2019 om 20:40
-- Serverversie: 5.7.19
-- PHP-versie: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest_api`
--
CREATE DATABASE IF NOT EXISTS `rest_api` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `rest_api`;

--
-- Gegevens worden geëxporteerd voor tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

--
-- Gegevens worden geëxporteerd voor tabel `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(30, '127.0.0.1', 'dafsd', 1555611719),
(31, '127.0.0.1', 'asdf', 1555611746),
(32, '127.0.0.1', 'sadfasdf', 1555611859);

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `title`, `desc`, `price`, `tags`, `image`, `created`, `modified`) VALUES
(1, 'Wooden chair', 'A piece of furniture designed to accommodate one sitting or reclining person, providing support for the back and often the arms and typically standing on four legs.', 100, 'wood, furniture, chair', 'https://cdn.pixabay.com/photo/2017/05/17/04/55/chair-2319866_960_720.png', '2019-04-15 18:17:21', '2019-04-16 22:10:10'),
(2, 'Wooden table2', 'Nice wooden table.', 250, 'wood, tables', 'http://pngimg.com/uploads/table/table_PNG6977.png', '2019-04-16 20:10:14', '2019-04-16 20:10:14');

--
-- Gegevens worden geëxporteerd voor tabel `rest_api_access`
--

INSERT INTO `rest_api_access` (`id`, `key`, `all_access`, `controller`, `date_created`, `date_modified`) VALUES
(1, 'CODEX@123', 1, 'products', '2019-04-15 19:13:00', '2019-04-15 17:18:33');

--
-- Gegevens worden geëxporteerd voor tabel `rest_api_keys`
--

INSERT INTO `rest_api_keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(25, 13, '81cdafca86929fb7a0376263d35604e932f5ef40', 0, 0, 0, '', '2019-04-15 21:59:12'),
(32, 15, '6561ca1dfad97dc75546eaeea840faab4625d497', 0, 0, 0, '', '2019-04-15 22:05:56');

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(15, '127.0.0.1', 'ineenhut', '$2y$12$9KP4HT7dwQyRVdZOiNVglOfy3.qCW3/o3jOZqGzea2iUQXvEbA2zG', 'a.vdberg98@gmail.com', NULL, NULL, '127f321438d4226baae8', '$2y$10$M/HZ9uvXYITjrUY/AuKw9OXrtypEPNG731VHaAxvhHKvxnLPcjCv.', 1556035994, NULL, NULL, 1555358672, 1555611876, 1, 'Aaron', 'van den Berg', '', '06 12345678');

--
-- Gegevens worden geëxporteerd voor tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(21, 15, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
