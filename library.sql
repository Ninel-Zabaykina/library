-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 04:15 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Детектив'),
(2, 'Документалистика'),
(6, 'Медицина'),
(8, 'Сказка'),
(5, 'Строительство'),
(7, 'Фантастика');

-- --------------------------------------------------------

--
-- Table structure for table `kind`
--

CREATE TABLE `kind` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kind`
--

INSERT INTO `kind` (`id`, `name`) VALUES
(3, 'Видео'),
(6, 'Ключевые идеи книги'),
(1, 'Книга'),
(5, 'Подборка'),
(4, 'Сайт/блог'),
(2, 'Статья');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `id` int(11) NOT NULL,
  `body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `kind_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `link_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `name`, `author`, `kind_id`, `category_id`, `description`, `tag_id`, `link_id`) VALUES
(1, 'Гарри Поттер и философский камень', 'Дж.Роулинг', 1, 8, 'Жизнь десятилетнего Гарри Поттера нельзя назвать сладкой: его родители умерли, едва ему исполнился год, а от дяди и тётки, взявших сироту на воспитание, достаются лишь тычки да подзатыльники. Но в одиннадцатый день рождения Гарри всё меняется. Странный гость, неожиданно появившийся на пороге, приносит письмо, из которого мальчик узнаёт, что на самом деле он чистокровный волшебник и принят в Хогвартс — школу магии. А уже через пару недель Гарри будет мчаться в поезде Хогвартс-экспресс навстречу новой жизни, где его ждут невероятные приключения, верные друзья и самое главное — ключ к разгадке тайны смерти его родителей.', NULL, NULL),
(2, 'Сталкер', 'А.Тарковский', 3, 7, 'Действие фильма происходит в вымышленном времени и пространстве; у героев нет имён — только прозвища. Главный герой фильма — недавно вышедший из тюрьмы человек, которого называют «Сталкер»[К 1] (Александр Кайдановский). Он живёт в бедности с женой и больной дочерью. Сталкер зарабатывает на жизнь, организуя нелегальные экспедиции в Зону, несмотря на протесты своей жены. Зона, по словам Сталкера, — место, где приблизительно за 20 лет до начала действия фильма было зарегистрировано падение метеорита. Впоследствии в районе падения начали происходить аномальные явления, стали пропадать люди. Место получило название «Зона», и стали распространяться слухи о некой таинственной комнате, где могут исполняться желания: «самые заветные, самые искренние, самые выстраданные». Зону сначала обнесли колючей проволокой, а потом оцепили военными кордонами.', NULL, NULL),
(5, '1984', 'Оруэлл', 1, 7, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `material_tag`
--

CREATE TABLE `material_tag` (
  `material_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `material_tag`
--

INSERT INTO `material_tag` (`material_id`, `tag_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1656609889),
('m220630_170935_create_material_table', 1656609892),
('m220630_171035_create_tag_table', 1656609892),
('m220630_171053_create_link_table', 1656609892),
('m220630_171108_create_category_table', 1656609892),
('m220630_171908_create_kind_table', 1656609892),
('m220702_165744_update_material_table', 1656781421),
('m220702_170552_update_material_table', 1656781792),
('m220704_175827_create_junction_table_for_material_and_tag_tables', 1656999299);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'поттериана'),
(2, 'сталкер');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `kind`
--
ALTER TABLE `kind`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `body` (`body`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kind_id` (`kind_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `link_id` (`link_id`);

--
-- Indexes for table `material_tag`
--
ALTER TABLE `material_tag`
  ADD PRIMARY KEY (`material_id`,`tag_id`),
  ADD KEY `idx-material_tag-material_id` (`material_id`),
  ADD KEY `idx-material_tag-tag_id` (`tag_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kind`
--
ALTER TABLE `kind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kind_id` FOREIGN KEY (`kind_id`) REFERENCES `kind` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `link_id` FOREIGN KEY (`link_id`) REFERENCES `link` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `material_tag`
--
ALTER TABLE `material_tag`
  ADD CONSTRAINT `fk-material_tag-material_id` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-material_tag-tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
