-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 12 2021 г., 16:37
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `parking`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `Марка` varchar(50) NOT NULL,
  `Модель` varchar(50) NOT NULL,
  `Цвет` varchar(50) NOT NULL,
  `Госномер` varchar(12) NOT NULL,
  `Статус` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `Марка`, `Модель`, `Цвет`, `Госномер`, `Статус`) VALUES
(1, 'Hyundai', 'Santa Fe', 'Черный', 'а001мр', 1),
(2, 'Volkswagen', 'Pointer', 'Серый', 'а002мр', 0),
(3, 'ВАЗ', '2104', 'Бордовый', 'а003мр', 0),
(4, 'ВАЗ', '2114', 'Серый', 'а004мр', 0),
(5, 'Hyundai', 'Tucson', 'Черный', 'а005мр', 0),
(6, 'ВАЗ', '2107', 'Синий', 'а006мр', 1),
(7, 'Hyundai', 'Matrix', 'Синий', 'а007мр', 0),
(8, 'Opel', 'Astra', 'Бежевый', 'а008мр', 0),
(9, 'Mercedes', 'e180', 'Белый', 'а009мр', 1),
(10, 'Ford', 'Explorer', 'Зеленый', 'а0010мр', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int NOT NULL,
  `ФИО` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Пол` char(1) NOT NULL DEFAULT 'М',
  `Телефон` varchar(12) NOT NULL DEFAULT '89608752390',
  `Адрес` varchar(100) NOT NULL DEFAULT 'Бакинская, 13',
  `Автомобиль` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `ФИО`, `Пол`, `Телефон`, `Адрес`, `Автомобиль`) VALUES
(1, 'Горбачев Павел Александрович', '', '89608752390', 'Бакинская, 13', 1),
(2, 'Грабыльников Дмитрий Алексеевич', 'М', '89608752391', 'Констнатина-Симонова, 66', 2),
(3, 'Коротков Илья Евгеньевич', 'М', '89608752392', 'Мордовкина, 32', 4),
(6, 'Буйкова Елена Викторовна', 'Ж', '89608752395', 'Чекмарева, 2', 8),
(7, 'Бочтарев Павел Анатольевич', 'М', '89608752396', 'Степана Разина, 12', 3),
(8, 'Козлов Павел Анатольевич', 'М', '89608752397', 'Чекмарева, 7', 6),
(9, 'Парыгин Данила Сергеевич', 'М', '89608752398', 'Двинская, 3', 9),
(10, 'Симонян Анна Борисовна', 'Ж', '89608752399', 'Когачева, 6а', 10);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Госномер` (`Госномер`);

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Телефон` (`Телефон`),
  ADD KEY `Автомобиль` (`Автомобиль`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`Автомобиль`) REFERENCES `cars` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
