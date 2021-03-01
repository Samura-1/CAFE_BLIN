-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 01 2021 г., 20:36
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blog`
--

CREATE TABLE `blog` (
  `id_topick` int(11) NOT NULL,
  `title` text NOT NULL,
  `sub_text` text NOT NULL,
  `full_text` text NOT NULL,
  `sub_full_text` text NOT NULL,
  `imge` text NOT NULL,
  `user_login` varchar(120) NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `blog`
--

INSERT INTO `blog` (`id_topick`, `title`, `sub_text`, `full_text`, `sub_full_text`, `imge`, `user_login`, `user_id`) VALUES
(3, 'В Риме открылся ресторан, где в каждом блюде присутствует мороженое', 'В Риме открылся р...', 'В Риме (Италия) открылся ресторан Il Gelato D&amp;#039;Essai da Geppy Sferra, который надеется превратить мороженое из исключительно сладкого десерта в важный ингредиент вторых блюд. В меню заведения в каждом блюде присутствует мороженое, при этом некоторые комбинации просто поражают воображение – куриное карри с кокосовым мороженым, кисло-сладкая свинина с ананасовым сорбетом, спагетти из цуккини с мятой, лимоном, жареным миндалем, рикоттой и мороженым, сезонные овощи с йогуртовым мороженым, пицца Бьянка с фисташковым мороженым, скумбрия с кунжутом, шпинатом и кофейным мороженым, гравлакс из лосося с грейпфрутовым мороженым и многое другое. «Моя цель – объединить гастрономию и мороженое, представляя мороженое так, как никто не знал о нем раньше, – объясняет владелец ресторана Джеппи Сферра. – Мороженое, используемое в меню нашего ресторана – это абсолютно обычное мороженое, я лишь предлагаю людям употреблять его по-другому».\r\n\r\nНи для кого не секрет, что итальянцы просто обожают мороженое – по оценкам, средний итальянец употребляет около 6 кг сладкого лакомства в год. Помимо этого, в Италии располагается 39000 джелатерий, 1400 из которых находятся в Рим', 'В Риме (Италия) открылся ресторан Il Gelato D&amp;#039;Essai da Geppy S...', '../img/post_img/nphoto1571682612.jpg', 'tankist', 1),
(4, 'Нью-йоркский бар Dante был назван лучшим баром в мире', 'Нью-йоркский бар ...', 'Популярный нью-йоркский бар Dante был назван лучшим баром на планете на церемонии вручения премии «50 лучших баров мира» (World’s 50 Best Bars Awards), которая прошла в Лондоне. В этом году в церемонии приняли участие 26 городов из 21 страны. Бар Dante имеет глубокие корни – изначально он появился как Caffe Dante в 1915 году, после чего открылся столетием позже в 2015 году. Меню заведения, как уже можно понять из названия, имеет итальянскую направленность – здесь можно попробовать классические итальянские аперетивные коктейли Negroni, Bellini и Aperol Spritz, которые подаются с бурратой и ржаными тостами, пастой паппарделе с диким кабаном и фрикадельками из свинины и говядины, запеченные с пастой орзо. В прошлом году бар Dante занял 9-ю строчку в рейтинге World’s 50 Best Bars Awards.\r\n\r\nВ пятерку лучших баров также вошли Connaught Bar (Лондон), Florería Atlántico (Буэнос-Айрес), The NoMad (Нью-Йорк) и American Bar (Лондон). ', 'Популярный нью-йоркский бар Dante был назван лучшим баром на планет...', '../img/post_img/nphoto1571682486.jpg', 'tankist', 1),
(11, 'Нью-йоркский бар Dante был назван лучшим баром в мире', 'Нью-йоркский бар ...', 'Нью-йоркский бар Dante был назван лучшим баром в миреНью-йоркский бар Dante был назван лучшим баром в миреНью-йоркский бар Dante был назван лучшим баром в миреНью-йоркский бар Dante был назван лучшим баром в мире', 'Нью-йоркский бар Dante был назван лучшим баром в миреНью-йоркский б...', '../img/post_img/nphoto1571682486.jpg', 'Stoned_Fox', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `coment`
--

CREATE TABLE `coment` (
  `id_coment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `login_user` varchar(120) NOT NULL,
  `id_topick` int(11) DEFAULT NULL,
  `coment` text NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `live` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `options_user`
--

CREATE TABLE `options_user` (
  `id_option` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `second_name` varchar(111) DEFAULT NULL,
  `avata` varchar(140) DEFAULT '../img/avatars/nophoto.png',
  `Date_of_Birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `options_user`
--

INSERT INTO `options_user` (`id_option`, `id_user`, `name`, `second_name`, `avata`, `Date_of_Birth`) VALUES
(1, 1, 'Николай', 'Ткачёв', '../img/avatars/car.png', '2019-10-02'),
(2, 2, 'Николай', 'Ткачёв', '../img/avatars/programmer.png', '2019-10-26'),
(5, 5, NULL, NULL, '../img/avatars/nophoto.png', NULL),
(6, 6, 'Эльмира', 'Сундутова ', '../img/avatars/Koala.jpg', '1999-06-30'),
(7, 7, NULL, NULL, '../img/avatars/nophoto.png', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `order_cart`
--

CREATE TABLE `order_cart` (
  `id_order` int(11) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `login_user` varchar(100) NOT NULL,
  `order_text` text NOT NULL,
  `total_price` text NOT NULL,
  `status` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_cart`
--

INSERT INTO `order_cart` (`id_order`, `id_user`, `login_user`, `order_text`, `total_price`, `status`) VALUES
(1, '2', 'Stoned_Fox', 'Блин с курицей в соусе(4 шт)                          \r\n                                                        Блин с грибами и картофельным пюре(3 шт)                          \r\n                                                        Блин с грибами в соусе(1 шт)', '482 Р.', 'Готов'),
(2, '1', 'tankist', 'Блин с курицей в соусе(1 шт)                          \r\n                                                        Блин с грибами и картофельным пюре(1 шт)', '106 Р.', 'Готов'),
(3, '1', 'tankist', 'Блин с курицей в соусе(1 шт)', '88 Р.', 'Готов'),
(4, '1', 'tankist', 'Блин с грибами и картофельным пюре(1 шт)                          \r\nБлин с курицей в соусе(1 шт)                                                       Блин с грибами в соусе(1 шт)                          \r\n                                                        Блин с курицей в соусе(1 шт)', '182 Р.', 'Готов'),
(5, '3', 'Stoned_Fox123', 'Блин с грибами и картофельным пюре(1 шт)                          \r\n                                                        Блин с грибами в соусе(1 шт)                          \r\n                                                        Блин с курицей в соусе(1 шт)', '182 Р.', 'Готов'),
(6, '2', 'Stoned_Fox', 'Блин с курицей в соусе(2 шт)                          \r\n                                                        Блин &quot;Хот-дог&quot;(2 шт)                          \r\n                                                        Блин с грибами и картофельным пюре(2 шт)', '458 Р.', 'Готов'),
(7, '6', 'ilmira', 'Блин с курицей в соусе(1 шт)                          \r\n                                                        Блин с грибами и картофельным пюре(1 шт)', '106 Р.', 'Готов'),
(8, '6', 'ilmira', 'Блин с курицей в соусе(1 шт)                          \r\n                                                        (3 шт)', '88 Р.', 'Готов'),
(9, '6', 'ilmira', 'Гриб с жопой (2 шт)', '200 Р.', 'Ожидает'),
(10, '7', 'admin', 'Дима под шубой (1 шт)', '555 Р.', 'Готов');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `sub` varchar(60) NOT NULL DEFAULT 'У нас вкусно',
  `img_product` text NOT NULL,
  `price` int(11) NOT NULL,
  `more_info` varchar(100) NOT NULL,
  `category` text NOT NULL,
  `user` varchar(120) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `sub`, `img_product`, `price`, `more_info`, `category`, `user`, `id_user`) VALUES
(7, 'Блин &quot;Хот-дог&quot;', '', '../img/imge_product/nphoto1571682612.jpg', 123, 'Блин &quot;Хот-дог&quot;Блин &quot;Хот-дог&quot;Блин &quot;Хот-дог&quot;Блин &quot;Хот-дог&quot;', 'Ролл', 'tankist', 1),
(8, 'Блин с грибами и картофельным пюре', 'У нас вкусно', '../img/imge_product/8rSUjn6rAM8.jpg', 18, 'блин с грибами и картофельным пюре\r\n123г', 'Суши', 'tankist', 1),
(9, 'Блин с курицей в соусе', 'У нас вкусно', '../img/imge_product/yySjShHi6Yg.jpg', 88, 'Блин с курицей в соусе', 'Ролл', 'tankist', 1),
(10, 'Блин с грибами в соусе', 'У нас вкусно', '../img/imge_product/qzVve-3A2nU.jpg', 76, 'Блин с грибами в соусе', 'Суши', 'tankist', 1),
(11, 'Гриб с жопой ', 'У нас вкусно', 'https://demiart.ru/forum/uploads18/post-2028867-1476703728.png', 100, 'Гриб с жопой Гриб с жопой Гриб с жопой Гриб с жопой Гриб с жопой Гриб с жопой Гриб с жопой ', 'Ролл', 'ilmira', 6),
(12, 'Ролл в Ролле', 'У нас вкусно', '../img/imge_product/nphoto1571682612.jpg', 123, '', 'Ролл', 'Tankist', 4),
(13, 'Дима под шубой ', 'У нас вкусно', '../img/imge_product/qzVve-3A2nU.jpg', 555, '', 'Суши', 'Ill', 3),
(14, 'Дима в соусе', 'Гриб Дима.соус', 'https://demiart.ru/forum/uploads18/post-2028867-1476703728.png', 231, '', 'Суши', 'Wolf', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `seting_site`
--

CREATE TABLE `seting_site` (
  `id` int(11) NOT NULL,
  `title_site` text NOT NULL,
  `main_title` text NOT NULL,
  `main_sub_title` text NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `email` text,
  `street` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `seting_site`
--

INSERT INTO `seting_site` (`id`, `title_site`, `main_title`, `main_sub_title`, `telephone`, `email`, `street`) VALUES
(2, 'Манэки-Нэко', '<span style=\"color: #08D870\">Манэки-Нэко</span>', 'Вкус и качество на <span style=\"color:  #ffff00\">первом </span> месте', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `team`
--

CREATE TABLE `team` (
  `id_team` int(11) NOT NULL,
  `name_team` varchar(80) NOT NULL,
  `sub_text` text NOT NULL,
  `img_team` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `team`
--

INSERT INTO `team` (`id_team`, `name_team`, `sub_text`, `img_team`) VALUES
(1, 'Тамара Александровна', 'Кухни мира:  кавказская, узбекская, европейская, японская, тайская, украинская, русская, детская, блюда из дичи, на углях, выпечка, консервирование.', ''),
(2, 'Ирина Петровна', 'Кухни мира:  кавказская, узбекская, европейская, японская, тайская, украинская, русская, детская, блюда из дичи, на углях, выпечка, консервирование.', ''),
(3, 'Максим Сергеевич', 'Кухни мира:  русская, европейская, американская, японская, диетическая, постная, детская, мангал, барьбекю и др', '');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `last_up_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `login`, `email`, `password`, `status`) VALUES
(1, 'tankist', 'tankist.tk@mail.ru', '$2y$10$Fs5szZtfX3rUjVMDuLCVLOddXnGDY1jch35A8FiaeNCtBazfyy0tu', 1),
(2, 'Stoned_Fox', 'stoned_fox@mail.ru', '$2y$10$fBXGFr5rXuitivBttlk/WOXaoJjNuRLlZnqyk2Qz/ZJF6eaYxZDP.', 0),
(5, 'wolf56732', 'tan22kist.tk@mail.ru', '$2y$10$RbCeBgw9zRbv6UoTpiRitOEGO.aZ1aL2wgWkSKlvmR/6v/wWeyF/a', 0),
(6, 'ilmira', 'ilmira@mail.ru', '$2y$10$Y0RP8/X6wApM.PYbsbdjl.xFM7KZT94ImjiKitz1Vuh1enbh.bpIi', 1),
(7, 'admin', 'admin@mail.ru', '$2y$10$nLqH3uiibMt5syKIWWgp1u1G5M5JNZ6lX9Qn6iBA6UUeeol9Fe9WK', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_topick`);

--
-- Индексы таблицы `coment`
--
ALTER TABLE `coment`
  ADD PRIMARY KEY (`id_coment`),
  ADD KEY `id_user` (`id_user`,`login_user`,`id_topick`),
  ADD KEY `id_topick` (`id_topick`);

--
-- Индексы таблицы `options_user`
--
ALTER TABLE `options_user`
  ADD PRIMARY KEY (`id_option`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Индексы таблицы `order_cart`
--
ALTER TABLE `order_cart`
  ADD PRIMARY KEY (`id_order`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Индексы таблицы `seting_site`
--
ALTER TABLE `seting_site`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id_team`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blog`
--
ALTER TABLE `blog`
  MODIFY `id_topick` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `coment`
--
ALTER TABLE `coment`
  MODIFY `id_coment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `options_user`
--
ALTER TABLE `options_user`
  MODIFY `id_option` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `order_cart`
--
ALTER TABLE `order_cart`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `seting_site`
--
ALTER TABLE `seting_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `team`
--
ALTER TABLE `team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `coment`
--
ALTER TABLE `coment`
  ADD CONSTRAINT `coment_ibfk_1` FOREIGN KEY (`id_topick`) REFERENCES `blog` (`id_topick`),
  ADD CONSTRAINT `coment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `options_user`
--
ALTER TABLE `options_user`
  ADD CONSTRAINT `options_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
