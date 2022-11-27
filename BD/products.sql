-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Ноя 26 2022 г., 15:09
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `products`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `text` text NOT NULL,
  `img` varchar(30) DEFAULT 'нет изображения'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `price`, `text`, `img`) VALUES
(1, '   One     ', 10, '      Сварочный аппарат  ', 's97667775.jpg'),
(2, '  two  ', 20, '     Самогонный аппарат', NULL),
(3, '         three         ', 30, '       просто аппарат', ''),
(34, ' шоколад молочный ', 20, ' шоколад молочный из молока ', 'hqdefault.jpg'),
(35, ' шоколад горький ', 30, ' шоколад молочный из молока и какао ', ''),
(36, 'шоколад горький', 40, 'шоколад горький из какао', 'нет изображения'),
(37, 'шоколад молочный с орехами', 40, 'шоколад молочный с орехами, шоколад молочный с орехами, шоколад молочный с орехами,шоколад молочный с орехами', 'нет изображения'),
(38, 'супер Самогонный аппарат', 40, 'Самогонный аппарат Самогонный аппарат Самогонный аппарат Самогонный аппарат Самогонный аппарат', 'нет изображения'),
(39, 'Крутой Самогонный аппарат', 40, 'Самогонный аппарат Самогонный аппарат Самогонный аппарат Самогонный аппарат', 'нет изображения'),
(40, 'Неизвестный аппарат', 10, 'аппарат  Неизвестный аппарат Неизвестный аппарат Неизвестный аппарат', 'нет изображения'),
(41, 'Неизвестный аппарат - 2', 40, 'Неизвестный аппаратНеизвестный аппарат Неизвестный аппаратНеизвестный аппарат Неизвестный аппарат Неизвестный аппарат', 'нет изображения');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status_code` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `name`, `status_code`) VALUES
(1, 'user', 1),
(2, 'admin', 99);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `status_id` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `status_id`) VALUES
(2, 'Tomww', '$2y$10$CkWj8ABDu3IxnxttHVuyMuvNZ/meUj2PmTFVjMfY3BpCYU3NmiKP6', 1),
(3, 'admin', '$2y$10$UKbJvpiPh0RsgU.6itDoc.EtBKoFxN.qekNE9N1P7nMxcCB9ylUu2', 2),
(10, 'user', '$2y$10$Ku.satlJNfGOOG4/ZLdD4.BNkIdwmizVEupoXHeQKDZQI/SJ0C.5O', 1),
(11, '1', '$2y$10$mrJZdDCaTHSKQm.LlmDb3ujNgF9h60UaWZcaUlYv4QgyXI5eaOMZq', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `goods` ADD FULLTEXT KEY `ft_title` (`title`);
ALTER TABLE `goods` ADD FULLTEXT KEY `ft_text` (`text`);
ALTER TABLE `goods` ADD FULLTEXT KEY `ft_title_text` (`title`,`text`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
