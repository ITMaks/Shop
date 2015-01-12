-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 11 2015 г., 18:37
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `databaze`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` text COLLATE utf8_bin NOT NULL,
  `full_img` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `warn` text COLLATE utf8_bin NOT NULL,
  `cost` text COLLATE utf8_bin NOT NULL,
  `tovar` text COLLATE utf8_bin NOT NULL,
  `perm` text COLLATE utf8_bin COMMENT 'can/cant',
  `unlim` text COLLATE utf8_bin NOT NULL COMMENT 'yes/no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `img`, `full_img`, `description`, `name`, `warn`, `cost`, `tovar`, `perm`, `unlim`) VALUES
(1, 'test.png', '', 'Тестовая покупка', 'Тест1', '', '1', 'Текст', 'cant', 'no'),
(2, 'test.png', 'nope.png', 'Тестовая покупка', 'Тест2', '', '1', 'Текст', 'can', 'yes'),
(3, 'test.png', 'bg.jpg', 'Тестовая покупка', 'Тест3', '', '1', 'Текст', 'can', 'no'),
(4, 'test.png', '', 'Тестовая покупка', 'Тест4', '', '1', 'Текст', 'cant', 'yes');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
