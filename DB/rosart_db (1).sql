-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Июл 10 2017 г., 22:29
-- Версия сервера: 5.5.55-cll
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rosart_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE `about` (
  `id` int(10) UNSIGNED NOT NULL,
  `img1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text1_ru` text COLLATE utf8_unicode_ci,
  `text1_en` text COLLATE utf8_unicode_ci,
  `text2_ru` text COLLATE utf8_unicode_ci,
  `text2_en` text COLLATE utf8_unicode_ci,
  `text3_ru` text COLLATE utf8_unicode_ci,
  `text3_en` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `about`
--

INSERT INTO `about` (`id`, `img1`, `img2`, `img3`, `img4`, `text1_ru`, `text1_en`, `text2_ru`, `text2_en`, `text3_ru`, `text3_en`, `created_at`, `updated_at`) VALUES
(1, 'pic40.jpg', 'pic41.jpg', 'pic42.jpg', 'pic43.jpg', 'RU <p>\r\n					РОСАРТ — это не только магазин произведений современных российских мастеров, но и своеобразный клуб для истинных ценителей изобразительного и прикладного искусства и авторов, чей талант и мастерство нуждаются в поддержке. Такую поддержку можете оказать художникам именно Вы, истинные ценители искусства. Приобретая их произведения в свои коллекции, Вы оказываете неоценимую помощь в сохранении Русского национального наследия и создаете возможность для мастера не отвлекаться на вопросы самостоятельной продажи своих работ, а продолжать творить, снова и снова.\r\n					</p>\r\n					<p>\r\n					На нашем сайте для Вас представлены работы мастеров самых разных стилей, жанров и направлений. Это живопись, графика, искусство резьбы по кости и дереву, авторская кукла, произведения из металла и т.д. Авторы, с которыми мы сотрудничаем, отличаются недюжинным талантом и мастерством. Это и маститые мастера, чьи произведения находятся в коллекциях самых известных Российских музеев, это и никому пока не известные, но от этого не менее талантливые мастера. Это авторы, чей талант отмечен и освещен Божьей искрой, а блики от этого света играют и переливаются в их произведениях.\r\n					</p>', 'EN <p>\r\n					РОСАРТ — это не только магазин произведений современных российских мастеров, но и своеобразный клуб для истинных ценителей изобразительного и прикладного искусства и авторов, чей талант и мастерство нуждаются в поддержке. Такую поддержку можете оказать художникам именно Вы, истинные ценители искусства. Приобретая их произведения в свои коллекции, Вы оказываете неоценимую помощь в сохранении Русского национального наследия и создаете возможность для мастера не отвлекаться на вопросы самостоятельной продажи своих работ, а продолжать творить, снова и снова.\r\n					</p>\r\n					<p>\r\n					На нашем сайте для Вас представлены работы мастеров самых разных стилей, жанров и направлений. Это живопись, графика, искусство резьбы по кости и дереву, авторская кукла, произведения из металла и т.д. Авторы, с которыми мы сотрудничаем, отличаются недюжинным талантом и мастерством. Это и маститые мастера, чьи произведения находятся в коллекциях самых известных Российских музеев, это и никому пока не известные, но от этого не менее талантливые мастера. Это авторы, чей талант отмечен и освещен Божьей искрой, а блики от этого света играют и переливаются в их произведениях.\r\n					</p>', 'RU <p>\r\n					Принимая решение о приобретении того или иного произведения, никогда не смотрите на то, насколько известен его автор. Смотрите на то, отражается ли огонь творческой души в его произведениях. Вся история мирового искусства наполнена историями, когда гении умирали в нищете, так и не признанные при жизни, зато после смерти их холсты, скульптуры, книги, становились поистине бесценными. Если при выборе работ автора Вы смотрите только на его регалии, Вы можете не заметить пока еще никому не известного гения, чьи произведения со временем будут продаваться на самых известных мировых аукционах за десятки миллионов долларов, или же составят гордость коллекций лучших мировых музеев. Мы рекомендуем Вам задуматься о том, что одна или несколько таких работ могут оказаться именно в Вашей коллекции, если Вы вовремя разглядите истинного мастера, а Вы и Ваши потомки тем самым войдете в элитарный клуб владельцев действительно потрясающих и бесценных коллекций.\r\n					</p>', 'EN <p>\r\n					Принимая решение о приобретении того или иного произведения, никогда не смотрите на то, насколько известен его автор. Смотрите на то, отражается ли огонь творческой души в его произведениях. Вся история мирового искусства наполнена историями, когда гении умирали в нищете, так и не признанные при жизни, зато после смерти их холсты, скульптуры, книги, становились поистине бесценными. Если при выборе работ автора Вы смотрите только на его регалии, Вы можете не заметить пока еще никому не известного гения, чьи произведения со временем будут продаваться на самых известных мировых аукционах за десятки миллионов долларов, или же составят гордость коллекций лучших мировых музеев. Мы рекомендуем Вам задуматься о том, что одна или несколько таких работ могут оказаться именно в Вашей коллекции, если Вы вовремя разглядите истинного мастера, а Вы и Ваши потомки тем самым войдете в элитарный клуб владельцев действительно потрясающих и бесценных коллекций.\r\n					</p>', 'RU <p>\r\n					Именно для этих целей мы создали Галерею Искусств Русских Мастеров «РОСАРТ». Помогая авторам найти истинных ценителей их творений, мы тем самым оказываем поддержку всему Русскому Современному Искусству, а нашим покупателям мы помогаем стать владельцами замечательных, а возможно, в будущем и бесценных произведений. Слава истинных ценителей и меценатов, таких, например, как Савва Морозов, всегда начиналась и росла от небольших коллекций. Все большое всегда начинается с первого шага, и такой шаг Вы можете сделать сейчас, приобретая произведения искусства современных российских мастеров на нашем сайте. Но помните, что истинное искусство не может стоить дешево, иначе оно обесценивает само себя. У всего на свете есть своя ценность и своя стоимость, а к произведениям искусства это относится в первую очередь.\r\n					</p>\r\n					<p>С наилучшими пожеланиями, галерея «РОСАРТ».</p>', 'EN <p>\r\n					Именно для этих целей мы создали Галерею Искусств Русских Мастеров «РОСАРТ». Помогая авторам найти истинных ценителей их творений, мы тем самым оказываем поддержку всему Русскому Современному Искусству, а нашим покупателям мы помогаем стать владельцами замечательных, а возможно, в будущем и бесценных произведений. Слава истинных ценителей и меценатов, таких, например, как Савва Морозов, всегда начиналась и росла от небольших коллекций. Все большое всегда начинается с первого шага, и такой шаг Вы можете сделать сейчас, приобретая произведения искусства современных российских мастеров на нашем сайте. Но помните, что истинное искусство не может стоить дешево, иначе оно обесценивает само себя. У всего на свете есть своя ценность и своя стоимость, а к произведениям искусства это относится в первую очередь.\r\n					</p>\r\n					<p>С наилучшими пожеланиями, галерея «РОСАРТ».</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name_ru` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blog_category_id` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT '1',
  `name_ru` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_ru` text COLLATE utf8_unicode_ci,
  `text_en` text COLLATE utf8_unicode_ci,
  `metatitle_ru` text COLLATE utf8_unicode_ci,
  `metatitle_en` text COLLATE utf8_unicode_ci,
  `keywords_ru` text COLLATE utf8_unicode_ci,
  `keywords_en` text COLLATE utf8_unicode_ci,
  `description_ru` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `subtext_ru` text COLLATE utf8_unicode_ci,
  `subtext_en` text COLLATE utf8_unicode_ci,
  `send` tinyint(1) DEFAULT NULL,
  `href` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `blogs`
--

INSERT INTO `blogs` (`id`, `user_name_ru`, `user_name_en`, `blog_category_id`, `view`, `name_ru`, `name_en`, `img`, `text_ru`, `text_en`, `metatitle_ru`, `metatitle_en`, `keywords_ru`, `keywords_en`, `description_ru`, `description_en`, `subtext_ru`, `subtext_en`, `send`, `href`, `email`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1, 5, '1 ru МИСТИЧЕСКИЕ КАРТИНЫ РУССКИХ ХУДОЖНИКОВ', '1 en МИСТИЧЕСКИЕ КАРТИНЫ РУССКИХ ХУДОЖНИКОВ', 'pic3.jpg', 'text ru 1', '<p>text en 1 text en 1 text en 1 text en 1 text en 1 text en 1 text en 1 text en 1 text en 1 </p>', 'ru metatitle', 'en metatitle', 'ru keywords', 'en keywords', 'ru description', 'en description', NULL, NULL, NULL, '1-en-misticheskie-kartiny-russkih-hudozhnikov', 1, NULL, '2017-07-04 09:15:44'),
(2, NULL, NULL, 2, 50, '2 ru МИСТИЧЕСКИЕ КАРТИНЫ РУССКИХ ХУДОЖНИКОВ', '2 en МИСТИЧЕСКИЕ КАРТИНЫ РУССКИХ ХУДОЖНИКОВ', 'pic2.jpg', 'text ru 2', '<p>text en 2 text en 2 text en 2 text en 2 text en 2text en 2text en 2 text en 2 text en 2text en 2 text en 2 text en</p>', 'ru metatitle', 'en metatitle', 'ru keywords', 'en keywords', 'ru description', 'en description', NULL, NULL, NULL, '2-en-misticheskie-kartiny-russkih-hudozhnikov', 1, NULL, '2017-07-04 09:15:44'),
(3, NULL, NULL, 2, 50, '3 ru МИСТИЧЕСКИЕ КАРТИНЫ РУССКИХ ХУДОЖНИКОВ', '3 en МИСТИЧЕСКИЕ КАРТИНЫ РУССКИХ ХУДОЖНИКОВ', 'pic4.jpg', 'text ru 3', '<p>text en 3  text en 3  text en 3  <b>text en 3</b>  text en 3  text en 3  text en 3  text en 3  text en 3  text en 3  text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3 text en 3</p>', 'ru metatitle', 'en metatitle', 'ru keywords', 'en keywords', 'ru description', 'en description', NULL, NULL, NULL, '3-en-misticheskie-kartiny-russkih-hudozhnikov', 1, NULL, '2017-07-04 09:15:44'),
(6, 'Author Ru', 'Author EN', 3, 2, 'Test RU 2', 'Test EN 2', 'images/uploads/698d90b38dee83de5d1b70ce0004a003.jpg', '<p>TExt Ruu&nbsp;2</p>', '<p>TExt 2 EN</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test-en-2', 1, '2017-06-28 14:28:04', '2017-07-04 09:15:44'),
(7, 'Test email', NULL, 1, 1, 'Test email', NULL, 'images/uploads/8530bd48e2139286ebbc07cfac12c1e7.jpg', '<p>Test email</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 1, '2017-07-03 19:00:32', '2017-07-04 09:15:44'),
(8, 'Test', 'Test auth', 1, 1, 'Test123', 'TEst EN', 'images/uploads/ac50fb0366b5e35f86386a6fb18eeaba.jpg', '<p>TEST EMAIL sdf dsfdsf sdfsd</p>', '<p>Test Email En</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test-en', 1, '2017-07-03 21:31:18', '2017-07-04 10:02:35'),
(9, 'Test', 'Test mail', 2, 1, 'Test mail send ru', 'Test mail send en', 'images/uploads/6b30e32cc0e5e568f9fb50f5a01d16b4.jpg', '<p>Test mail send ru</p>', '<p>Test mail send en</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test-mail-send-ru', 1, '2017-07-04 10:07:43', '2017-07-04 10:10:10'),
(10, 'Test', 'Test', 2, 1, 'Test news 6 ru', 'Test news 6 en', 'images/uploads/1bb77d31b4b66b9e96ae971da52ae893.jpg', '<p>Test news 6 ru</p>', '<p>Test news 6 en</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test-news-6-ru', 1, '2017-07-04 10:28:55', '2017-07-04 10:32:55'),
(11, 'asdasd', 'scheduller', 2, 1, 'Test scheduller ru', 'Test scheduller en', 'images/uploads/b839547a4b9e96ebac42524a09c915a7.jpg', '<p>Test scheduller ru</p>', '<p>Test scheduller en Test scheduller en</p>', 'sad as d', 'Test scheduller en asda', 'as fsdaf asdfsadf', 'as dasd asd asd', 'asdsa das dasdas', 'sad asd asdas', NULL, NULL, NULL, 'test-scheduller-ru', 1, '2017-07-04 10:37:57', '2017-07-04 12:32:03'),
(12, 'Тест почты', 'Mail test', 1, 1, 'Тест почты', 'Mail test', 'images/uploads/0f999d898d2ab4cff445bb55094f5def.jpg', '<p>Тест почты</p>', '<p>Mail test</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test-pochty', 1, '2017-07-04 12:33:42', '2017-07-04 12:34:03'),
(13, 'Test asd asdasdasdas', 'sadas', 1, 1, 'Test asd asdasdasdas', 'Test asd asdasdasdas eng', 'images/uploads/bd36d16f003ab92427eeb83046665097.jpg', '<p>Test asd asdasdasdas</p>', '<p>Test asd asdasdasdasv eng</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test-asd-asdasdasdas', 1, '2017-07-04 12:42:01', '2017-07-04 13:30:03'),
(14, 'dasda', 'Test', 1, 1, 'Test asdasd', 'Test asdasd EN', 'images/uploads/e10b82d21eb370d6c1d1299b41f7f193.jpg', '<p>Test asdasd 123123</p>', '<p>asdas dasdas</p>', NULL, NULL, NULL, NULL, NULL, NULL, 'Test asdasd 12312312312 test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation', 1, 'test-asdasd', 1, '2017-07-04 13:45:37', '2017-07-04 13:50:03');

-- --------------------------------------------------------

--
-- Структура таблицы `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `ord` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_ru` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `metatitle_ru` text COLLATE utf8_unicode_ci,
  `metatitle_en` text COLLATE utf8_unicode_ci,
  `keywords_ru` text COLLATE utf8_unicode_ci,
  `keywords_en` text COLLATE utf8_unicode_ci,
  `href` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `ord`, `img`, `name_ru`, `name_en`, `description_ru`, `description_en`, `metatitle_ru`, `metatitle_en`, `keywords_ru`, `keywords_en`, `href`, `created_at`, `updated_at`) VALUES
(1, 1, 'pic1.jpg', 'name ru 1', 'name en 1', 'ru description', 'en description', 'ru metatitle', 'en metatitle', 'ru keywords', 'en keywords', 'name-en-1', NULL, '2017-06-28 16:10:42'),
(2, 0, 'pic2.jpg', 'name ru 2', 'name en 2', 'ru description', 'en description', 'ru metatitle', 'en metatitle', 'ru keywords', 'en keywords', 'name-en-2', NULL, '2017-06-28 16:10:42'),
(3, 2, 'pic3.jpg', 'name ru 3', 'name en 3', 'ru description', 'en description', 'ru metatitle', 'en metatitle', 'ru keywords', 'en keywords', 'name-en-3', NULL, '2017-06-28 16:10:42');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `ord` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_ru` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `metatitle_ru` text COLLATE utf8_unicode_ci,
  `metatitle_en` text COLLATE utf8_unicode_ci,
  `keywords_ru` text COLLATE utf8_unicode_ci,
  `keywords_en` text COLLATE utf8_unicode_ci,
  `href` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `ord`, `img`, `name_ru`, `name_en`, `description_ru`, `description_en`, `metatitle_ru`, `metatitle_en`, `keywords_ru`, `keywords_en`, `href`, `created_at`, `updated_at`) VALUES
(1, 1, 'images/uploads/ce8766d2532b17580e093d8fd3ca8fcb.jpg', 'Изделия ручной работы', 'Category_name en 1', NULL, 'en description', NULL, 'en metatitle', NULL, 'en keywords', 'category_name-en-1', NULL, '2017-07-08 08:49:41'),
(2, 0, 'images/uploads/64ccbc27fc7aba05c115715d195444bd.jpg', 'Живопись', 'Category_name en 2', NULL, 'en description', NULL, 'en metatitle', NULL, 'en keywords', 'category_name-en-2', NULL, '2017-07-08 08:46:19'),
(3, 2, 'images/uploads/fadb2d219810e1889e304baf837c4b0b.jpg', 'Ювелирные украшения', 'Category_name en 3', NULL, 'en description', NULL, 'en metatitle', NULL, 'en keywords', 'category_name-en-3', NULL, '2017-07-08 08:50:23');

-- --------------------------------------------------------

--
-- Структура таблицы `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category_product`
--

INSERT INTO `category_product` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, NULL, NULL),
(7, 3, 2, NULL, NULL),
(9, 2, 2, NULL, NULL),
(10, 4, 2, NULL, NULL),
(11, 5, 2, NULL, NULL),
(12, 6, 2, NULL, NULL),
(13, 7, 2, NULL, NULL),
(14, 8, 2, NULL, NULL),
(15, 9, 2, NULL, NULL),
(16, 10, 2, NULL, NULL),
(17, 11, 2, NULL, NULL),
(18, 12, 2, NULL, NULL),
(19, 13, 2, NULL, NULL),
(20, 14, 2, NULL, NULL),
(21, 15, 2, NULL, NULL),
(22, 16, 2, NULL, NULL),
(23, 17, 2, NULL, NULL),
(24, 18, 2, NULL, NULL),
(25, 19, 2, NULL, NULL),
(26, 20, 2, NULL, NULL),
(27, 21, 2, NULL, NULL),
(28, 22, 2, NULL, NULL),
(29, 23, 2, NULL, NULL),
(30, 24, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress_ru` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_ru` text COLLATE utf8_unicode_ci,
  `text_en` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `email`, `adress_ru`, `adress_en`, `text_ru`, `text_en`, `created_at`, `updated_at`) VALUES
(1, '+7 (951) 676 34 65', 'mail@rosart.club', 'RU Санкт-Петербург, ул. 7-ая Красноармейская 25 лит. А, помещение <br/>\r\n		20-H<br/> \r\n		ООО «ВЕРСА»<br/> \r\n		ИНН 7839071534<br/> \r\n		ОГРН 1167847362638​', 'EN Санкт-Петербург, ул. 7-ая Красноармейская 25 лит. А, помещение <br/>\r\n		20-H<br/> \r\n		ООО «ВЕРСА»<br/> \r\n		ИНН 7839071534<br/> \r\n		ОГРН 1167847362638​', 'RU Связаться с нами можно либо через форму обратной связи (расположенной справа), либо по телефону или электронному адресу:', 'EN Связаться с нами можно либо через форму обратной связи (расположенной справа), либо по телефону или электронному адресу:', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `emails`
--

CREATE TABLE `emails` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `emails`
--

INSERT INTO `emails` (`id`, `email`, `lang`, `hash`, `created_at`, `updated_at`) VALUES
(5, 'vasyliy.klymenko@gmail.com', 'en', '$2y$10$VhgQ9ulH4PcgrYJLPMmcYOgZpnS2urIOwcEimntrVAMAUsomYe5hW', '2017-07-04 09:59:41', '2017-07-04 09:59:41');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `phone`, `question`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'asdasd@asd.asd', '23123123123123', 'asdsadasdasdas sad', NULL, NULL),
(2, 'Test', 'asdasd@asd.dgf', '123123123123', 'sadasdasd', NULL, NULL),
(3, 'sadas', 'asdsa@asd.as', '1231231232', 'asdasdasdas', NULL, NULL),
(4, 'asdas', 'asdas@asd.asd', '23324234234', 'sdfsdf sdfasdf!', NULL, NULL),
(5, 'sadasd', 'asdasd@sdasd.sa', '123123123123', 'asdasdas dasd!', NULL, NULL),
(6, 'Test', 'asdsad@sasd.fds', '12312312312', 'asdasdasdasd', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `masters`
--

CREATE TABLE `masters` (
  `id` int(10) UNSIGNED NOT NULL,
  `ord` int(11) DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profession_ru` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `profession_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_ru` text COLLATE utf8_unicode_ci,
  `text_en` text COLLATE utf8_unicode_ci,
  `metatitle_ru` text COLLATE utf8_unicode_ci,
  `metatitle_en` text COLLATE utf8_unicode_ci,
  `description_ru` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `keywords_ru` text COLLATE utf8_unicode_ci,
  `keywords_en` text COLLATE utf8_unicode_ci,
  `href` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `masters`
--

INSERT INTO `masters` (`id`, `ord`, `name_ru`, `name_en`, `img`, `profession_ru`, `profession_en`, `text_ru`, `text_en`, `metatitle_ru`, `metatitle_en`, `description_ru`, `description_en`, `keywords_ru`, `keywords_en`, `href`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Рейпольский Алексей', 'EN Рейпольский А.Д.', 'images/uploads/b5386e4a245388c26ae2de2d14651ba3.jpg', 'Художник-живописец,  известен как мастер книжной иллюстрации', 'EN Художник-живописец, график', 'Алексей Дмитриевич Рейпольский родился в 1945 года в Ленинграде. \r\nЗакончил графический факультет Института живописи, скульптуры и архитектуры им. И.Е.Репина.\r\n Работал художественным редактором в издательствах «Детгиз» и «Художник РСФСР». \r\nЗа четыре десятилетия творческой деятельности А.Д. Рейпольский проявил себя как художник, работающий в различных видах и техниках изобразительного искусства. Он автор более ста произведений станковой и монументальной живописи, множества эстампов, литографий, акварелей, пастелей и т.д. \r\nРаботы А.Д. Рейпольского хранятся в Государственном Эрмитаже, Государственном Русском музее, Государственном музее истории Санкт-Петербурга, Музее городской скульптуры, Военно-историческом музее артиллерии, инженерных войск и войск связи, Российской Национальной библиотеке, Новгородском музее-заповеднике, в частных коллекциях в России и за рубежом.\r\nМногим из нас с А.Д. Рейпольский знаком с детства по иллюстрациям к сказкам. Им проиллюстрировано более 70 различных изданий. В конце 1970-1980-х годах в его оформлении вышла серия сказок Шарля Перро: «Спящая красавица», «Золушка», «Красная шапочка», «Синяя борода», «Мальчик с пальчик», «Рике-хохолок», «Ослиная шкура». В иллюстрациях к сказкам А.Д.Рейпольский точно следует за текстом, помогая юному читателю живо войти в атмосферу описываемых событий. Слегка стилизованные в манере французской гравюры XVII столетия, эти лёгкие, непринуждённые по исполнению изображения сочетают стремление передать волшебный дух очаровательной старой сказки с точностью и наблюденностью натурной работы, несут в себе убедительность образов и достоверность даже малых деталей. Они дают наглядное представление и об эпохе, и об особенностях национального быта героев повествования.\r\nВ 1990-х годах А.Д.Рейпольским проиллюстрированы роман Вальтера Скотта «Айвенго», сборник поэтической лирики и переводов с английского С.Я. Маршака, сборник «Русские сказки» и др. В числе последних работ — цикл литографий к драме М.Ю. Лермонтова «Маскарад».\r\nТворчество А.Д. Рейпольского получило известность и признание, о чем красноречиво говорит то, что его произведения находятся во многих музейных коллекциях и частных собраниях в России и за рубежом.', '<p>EN \r\n					Алексей Дмитриевич Рейпольский родился в 1945 года в Ленинграде. Закончил графический факультет Института живописи, скульптуры и архитектуры им. И.Е.Репина. Работал художественным редактором в издательствах «Детгиз» и «Художник РСФСР». За четыре десятилетия творческой деятельности А.Д. Рейпольский проявил себя как художник, работающий в различных видах и техниках изобразительного искусства. Он автор более ста произведений станковой и монументальной живописи, множества эстампов, литографий, акварелей, пастелей и т.д. Работы А.Д. Рейпольского хранятся в Государственном Эрмитаже, Государственном Русском музее, Государственном музее истории Санкт-Петербурга, Музее городской скульптуры, Военно-историческом музее артиллерии, инженерных войск и войск связи, Российской Национальной библиотеке, Новгородском музее-заповеднике, в частных коллекциях в России и за рубежом.\r\n				</p>\r\n				<p>\r\n					Многим из нас с А.Д. Рейпольский знаком с детства по иллюстрациям к сказкам. Им проиллюстрировано более 70 различных изданий. В конце 1970-1980-х годах в его оформлении вышла серия сказок Шарля Перро: «Спящая красавица», «Золушка», «Красная шапочка», «Синяя борода», «Мальчик с пальчик», «Рике-хохолок», «Ослиная шкура». В иллюстрациях к сказкам А.Д.Рейпольский точно следует за текстом, помогая юному читателю живо войти в атмосферу описываемых событий. Слегка стилизованные в манере французской гравюры XVII столетия, эти лёгкие, непринуждённые по исполнению изображения сочетают стремление передать волшебный дух очаровательной старой сказки с точностью и наблюденностью натурной работы, несут в себе убедительность образов и достоверность даже малых деталей. Они дают наглядное представление и об эпохе, и об особенностях национального быта героев повествования.\r\n				</p>\r\n				<p>\r\n					В 1990-х годах А.Д.Рейпольским проиллюстрированы роман Вальтера Скотта «Айвенго», сборник поэтической лирики и переводов с английского С.Я. Маршака, сборник «Русские сказки» и др. В числе последних работ — цикл литографий к драме М.Ю. Лермонтова «Маскарад».\r\n				</p>\r\n				<p>\r\n					Творчество А.Д. Рейпольского получило известность и признание, о чем красноречиво говорит то, что его произведения находятся во многих музейных коллекциях и частных собраниях в России и за рубежом.\r\n				</p>', 'RU metatitle', 'EN metatitle', 'RU description', 'EN description', 'RU keywords', 'EN keywords', 'reypolskiy-aleksey', NULL, '2017-07-10 16:06:23'),
(2, NULL, 'Митков Павел', 'EN МИТКОВ ПАВЕЛ', 'images/uploads/41963ed78321d47937adbadf01e5df43.jpg', 'Художник-живописец,  оригинальный  стиль,  которого  снискал  мировую  популярность.', 'EN Художник-живописец', 'Молодой художник, наш современник – Павел Митков - один из самых успешных представителей современного искусства.\r\nРодился 17 августа 1977 года в Софии. Митков открыл свою страсть к рисованию в 6 лет. В дальнейшем, изучая экономику, он организовывал выставки своих работ. Успех выставок мотивировал оставить карьеру хорошо оплачиваемого экономиста. Он начал жить ради творчества и искусства.\r\n\r\nРеализовать свое призвание и талант в настоящем и отдать эту страсть будущему поколению – это глубокое желание Павла Миткова. Он организовывает выставки и конкурсы для юных талантов. Через благотворительные выставки в пользу социальных и медицинских организаций он позволяет людям, находящимся в социально невыгодном положении разделить его успех. Международные отличия и награды, такие как награда Сальвадор Дали, медаль Франца Кафки, орден Ломоносова или отличие Фондации искусства отражают его признание на международной сцене искусства.\r\n\r\nНаряду со многими выдающимися выставками, его творения вошли в частные коллекции известных людей как Ангелы Меркель, Владимира Путина, Хиллари Клинтон, Папа Иоанн Павел II и многих других.\r\n\r\n«Искусство появляется из спонтанного чувства - важно пережить его, и не надо ломать голову», - говорит Павел Митков. Его философия света возникает из убеждения, что его искусство для всех людей. Истинное желание этого мастера показать людям неожиданную красоту обычного окружения. Его проницательность магии знакомых улиц, пленительного волшебства мостов и меланхолического оживления городских площадей улавливает моменты вдохновения и углубления в поэтическое мгновение каждой красоты.\"', 'EN ', 'RU metatitle', 'EN metatitle', 'RU description', 'EN description', 'RU keywords', 'EN keywords', 'mitkov-pavel', NULL, '2017-07-10 16:06:23'),
(3, NULL, 'Привалихина Анжелика', 'EN РУДАЕВА Е.Л.', 'images/uploads/a7181f327130087095fddd649b5a6e27.jpg', 'У художника свой яркий почерк, уникальное ощущение красоты', 'EN Художник-живописец', 'В 1990 г закончила КХУ им.В.И Сурикова.Работы находятся в художественном Музее Красноярска ,в частных коллекциях России,США,Великобритании,Франции,Германии,Швейцарии,Китае и Новой Зеландии. \r\n  Живет и работает в Санкт-Петербурге, Россия.\r\nЧлен Союза художников России с 2006 года\r\nЧлен Международной ассоциации Des ARTS Plastiques-МАА АИАП Юнеско', 'EN ', 'RU metatitle', 'EN metatitle', 'RU description', 'EN description', 'RU keywords', 'EN keywords', 'privalihina-anzhelika', NULL, '2017-07-10 16:06:23'),
(4, NULL, 'Уркинеев Даниил', 'EN УРКИНЕЕВ Д.Л.', 'images/uploads/668eda1d8accb5108205c9858329fe94.jpg', 'Занимается графикой, интерьерами, ландшафтной архитектурой', 'EN Художник-живописец', 'Родился в 1955 г. в Ленинграде.\r\nРисовал всегда. В том числе и потому остался в 1970 г. в 8-ом классе на второй год.\r\nВ 1978 г. окончил ЛВХПУ им. В.И. Мухиной по специальности интерьер.\r\nРаботал в проектном бюро при ЛВХПУ, в ленинградских издательствах, занимался промграфикой, росписью фарфора.\r\nВ 1993-1995 гг. работал дизайнером в Германии в студии «Blaue Zitrone». С 1995 по 1998 гг. работал в дизайн студии фирмы «Дом Лаверна», в 2003 г. выставлял свою графику в галерее дизайна Bulthaup, в 2009 г. одиннадцать графических работ участвовали в выставке ДЭГУ-Санкт-Петербург в Манеже.\r\nСейчас занимается графикой, интерьерами, ландшафтной архитектурой.\r\nВ графике предпочитает карандаш, тушь, перо.\r\nРаботы находятся дома, у друзей, в частных коллекциях.', 'EN ', 'RU metatitle', 'EN metatitle', 'RU description', 'EN description', 'RU keywords', 'EN keywords', 'urkineev-daniil', NULL, '2017-07-10 16:06:23'),
(5, NULL, 'Гусев Валерий', 'EN ГУСЕВ ВАЛЕРИЙ', 'images/uploads/e41f5103baa98f174800ce3f3d7e157c.jpg', 'Художник, Каменная живопись', 'EN Художник, Каменная живопись', 'Художник выполняет свои картины  каменной крошкой на срезе камня.\r\n Каждая картина, выполненная в таком стиле, уникальна. Природный рисунок среза камня всегда неповторим и создан природой за миллионы лет. Природная красота камня всегда привлекала внимание своей способностью эффектно имитировать различные образы, знакомые нам в повседневной жизни.', 'EN ', 'RU metatitle', 'EN metatitle', 'RU description', 'EN description', 'RU keywords', 'EN keywords', 'gusev-valeriy', NULL, '2017-07-10 16:06:23'),
(6, NULL, 'Ежаков Владимир', NULL, 'images/uploads/b05adb7e5099e735d5a8ce126be6fa5d.jpg', 'Регулярный участник международных, а так же выставок Союза Художников России. Картины Владимира Ежакова находятся в частных коллекциях России, США, Англии, Китая, Греции, Франции и т.д.', NULL, 'Владимир Ежаков – Член Союза Художников Санкт-Петербурга, один из наиболее талантливых, многообещающих и перспективных живописцев России.\r\nПобедитель фестиваля «Пражская осень»; Призер конкурса портретистов среди участников Международного Арт-фестиваля в Домбурге, Голландия; Постоянный участник передвижных выставок Российских художников в Китае; Преподаватель Российской Академии Художеств; \r\nРегулярный участник международных, а так же выставок Союза Художников России.\r\nВладимир родился в 1975 г. в Санкт-Петербурге. \r\nВ 1992 г. Начал занятия в художественном училище имени Н.К. Рериха, после чего, в 1997 г. поступил в Санкт-Петербургский институт живописи, скульптуры и архитектуры им. И. Е. Репина. \r\nВ 2003 г. награждён дипломом «Победитель конкурса Санкт-Петербурга». За дипломную картину награждён дипломом «Лучший выпускник 2003 г.». В 2004 г. вступил в Союз художников России и был приглашен на должность преподавателя в институт И. Е. Репина. Регулярный участник выставок Союза художников. Член региональной общественной организации «Центр поддержки искусства города Санкт–Петербурга», постоянный участник Арт-пленера «По святым местам». Участник фестиваля искусств «От авангарда до наших дней». Постоянный участник передвижных выставок Российских художников в Китае (2003 - 2007 год).\r\nОсновной темой творчества Владимира Ежакова является танец, в изысканных движениях балерин, в струящихся нарядах которых он черпает вдохновение. Владимир пишет циклы, посвященные грациозным танцовщицам, будь они на сцене или в ожидании выхода под свет софитов, а так же картины, посвященные сценам из повседневной жизни кафе, вырывая из обыденности живописные моменты и оставляя их на холсте. Живопись Владимира балансирует на грани экспрессионизма, отображая страсть, что овладевает танцовщицей фламенко или танго и импрессионизмом, передавая милое очарование обыденной жизни горожан. Особой строкой творчества является портрет, в котором Владимиру удается передать психологические черты изображаемой модели. \r\nРегулярный участник международных, а так же выставок Союза Художников России. Картины Владимира Ежакова находятся в частных коллекциях России, США, Англии, Китая, Греции, Франции.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ezhakov-vladimir', '2017-07-08 09:07:19', '2017-07-10 16:06:23'),
(7, NULL, 'Самсонов Игорь', NULL, 'images/uploads/6c5c0e6b07779f760b94743fda42a4f5.jpg', 'Работы Самсонова говорят о том, что художник обладает богатым воображением, прекрасно чувствует стиль, точно передает образы.', NULL, 'Игорь Самсонов родился в 1963 году в Воронеже. Начал рисовать в возрасте шести лет, его первая выставка прошла в десять лет. Окончил с отличием начальную школу искусств Воронежа. Стал учителем рисования в начальной школе в Санкт-Петербурге. С 1990 по 1996 год учился в Санкт-Петербургской Академии художеств им. И.Е. Репина. Большое влияние на художника оказал период в истории искусства поздней готики, известный как период Quattrocentro (Кватроченто).', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'samsonov-igor', '2017-07-08 10:34:40', '2017-07-10 16:06:23');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_05_152348_create_blog_table', 1),
(4, '2017_06_06_152006_create_blog_categories_table', 1),
(5, '2017_06_07_072738_create_masters_table', 1),
(6, '2017_06_07_171049_create_contact_table', 1),
(7, '2017_06_14_184241_create_about_table', 1),
(8, '2017_06_15_120611_create_categories_table', 1),
(9, '2017_06_15_142018_create_technique_table', 1),
(10, '2017_06_15_190323_create_products_table', 1),
(11, '2017_06_20_085349_create_viewed_table', 1),
(12, '2017_06_22_173838_create_cart_status_table', 1),
(13, '2017_06_22_173919_create_cart_order_table', 1),
(14, '2017_06_22_174003_create_cart_product_order_table', 1),
(15, '2017_06_23_111516_create_product_technique_table', 1),
(16, '2017_06_23_111553_create_product_category_table', 1),
(17, '2017_06_25_190042_create_feedback_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `text` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status_id`, `price`, `lang`, `phone`, `address`, `text`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 'eur', 'ru', '23123', 'sadasd', NULL, '2017-07-03 15:31:50', '2017-07-03 15:31:50'),
(7, 1, 1, 'eur', 'ru', '23123', 'sadasd', NULL, '2017-07-03 15:37:05', '2017-07-03 15:37:05'),
(8, 2, 1, 'eur', 'en', '123123123', 'TEwrETWE twetr wet', NULL, '2017-07-03 15:47:30', '2017-07-03 15:47:30'),
(9, 2, 1, 'eur', 'en', '123123123', 'TEwrETWE twetr wet', NULL, '2017-07-03 15:52:31', '2017-07-03 15:52:31'),
(10, 1, 1, 'rub', 'en', '23123', 'sadasd', NULL, '2017-07-04 20:41:48', '2017-07-04 20:41:48'),
(11, 1, 1, 'rub', 'en', '23123', 'sadasd', NULL, '2017-07-04 20:46:53', '2017-07-04 20:46:53'),
(12, 1, 1, 'rub', 'en', '23123', 'sadasd', NULL, '2017-07-04 20:47:45', '2017-07-04 20:47:45'),
(13, 1, 1, 'rub', 'en', '23123', 'sadasd', NULL, '2017-07-04 20:48:57', '2017-07-04 20:48:57'),
(14, 1, 1, 'rub', 'en', '23123', 'sadasd', NULL, '2017-07-04 20:49:11', '2017-07-04 20:49:11'),
(15, 1, 1, 'rub', 'en', '23123', 'sadasd', NULL, '2017-07-04 20:51:54', '2017-07-04 20:51:54'),
(16, 1, 1, 'rub', 'en', '23123', 'sadasd', NULL, '2017-07-04 20:53:53', '2017-07-04 20:53:53'),
(17, 3, 1, 'rub', 'en', '123123456', 'asda asdsa asd', NULL, '2017-07-04 20:54:57', '2017-07-04 20:54:57');

-- --------------------------------------------------------

--
-- Структура таблицы `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price_rub` decimal(8,2) NOT NULL DEFAULT '0.00',
  `price_eur` decimal(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `price_rub`, `price_eur`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '30.00', '3.00', NULL, NULL),
(2, 1, 2, '30.00', '3.00', NULL, NULL),
(3, 4, 2, '30.00', '3.00', '2017-07-03 13:55:32', '2017-07-03 13:55:32'),
(4, 4, 3, '30.00', '3.00', '2017-07-03 13:55:32', '2017-07-03 13:55:32'),
(5, 5, 2, '30.00', '3.00', '2017-07-03 13:59:22', '2017-07-03 13:59:22'),
(6, 5, 3, '30.00', '3.00', '2017-07-03 13:59:22', '2017-07-03 13:59:22'),
(7, 6, 2, '30.00', '3.00', '2017-07-03 15:31:50', '2017-07-03 15:31:50'),
(8, 6, 3, '30.00', '3.00', '2017-07-03 15:31:50', '2017-07-03 15:31:50'),
(9, 7, 2, '30.00', '3.00', '2017-07-03 15:37:05', '2017-07-03 15:37:05'),
(10, 7, 3, '30.00', '3.00', '2017-07-03 15:37:05', '2017-07-03 15:37:05'),
(11, 8, 3, '30.00', '3.00', '2017-07-03 15:47:30', '2017-07-03 15:47:30'),
(12, 9, 1, '60.00', '6.00', '2017-07-03 15:52:31', '2017-07-03 15:52:31'),
(13, 10, 1, '60.00', '6.00', '2017-07-04 20:41:48', '2017-07-04 20:41:48'),
(14, 10, 2, '30.00', '3.00', '2017-07-04 20:41:48', '2017-07-04 20:41:48'),
(15, 11, 1, '60.00', '6.00', '2017-07-04 20:46:53', '2017-07-04 20:46:53'),
(16, 11, 2, '30.00', '3.00', '2017-07-04 20:46:53', '2017-07-04 20:46:53'),
(17, 12, 1, '60.00', '6.00', '2017-07-04 20:47:45', '2017-07-04 20:47:45'),
(18, 12, 2, '30.00', '3.00', '2017-07-04 20:47:45', '2017-07-04 20:47:45'),
(19, 13, 1, '60.00', '6.00', '2017-07-04 20:48:57', '2017-07-04 20:48:57'),
(20, 13, 2, '30.00', '3.00', '2017-07-04 20:48:57', '2017-07-04 20:48:57'),
(21, 14, 1, '60.00', '6.00', '2017-07-04 20:49:11', '2017-07-04 20:49:11'),
(22, 14, 2, '30.00', '3.00', '2017-07-04 20:49:11', '2017-07-04 20:49:11'),
(23, 15, 1, '60.00', '6.00', '2017-07-04 20:51:54', '2017-07-04 20:51:54'),
(24, 15, 2, '30.00', '3.00', '2017-07-04 20:51:54', '2017-07-04 20:51:54'),
(25, 16, 1, '60.00', '6.00', '2017-07-04 20:53:53', '2017-07-04 20:53:53'),
(26, 16, 2, '30.00', '3.00', '2017-07-04 20:53:53', '2017-07-04 20:53:53'),
(27, 17, 1, '60.00', '6.00', '2017-07-04 20:54:57', '2017-07-04 20:54:57'),
(28, 17, 2, '30.00', '3.00', '2017-07-04 20:54:57', '2017-07-04 20:54:57');

-- --------------------------------------------------------

--
-- Структура таблицы `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `ord` int(11) DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `ord`, `name_ru`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 1, 'В обработке', 'In processing', NULL, NULL),
(2, 2, 'Товар заказан', 'Item ordered', NULL, NULL),
(3, 3, 'Не оплачен', 'Not paid', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ru` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `master_id` int(11) DEFAULT NULL,
  `price_rub` decimal(8,2) NOT NULL DEFAULT '0.00',
  `price_eur` decimal(8,2) NOT NULL DEFAULT '0.00',
  `size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `metatitle_ru` text COLLATE utf8_unicode_ci,
  `metatitle_en` text COLLATE utf8_unicode_ci,
  `keywords_ru` text COLLATE utf8_unicode_ci,
  `keywords_en` text COLLATE utf8_unicode_ci,
  `description_ru` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `amount` int(11) NOT NULL DEFAULT '1',
  `active` int(11) NOT NULL DEFAULT '0',
  `href` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name_ru`, `name_en`, `img`, `master_id`, `price_rub`, `price_eur`, `size`, `year`, `metatitle_ru`, `metatitle_en`, `keywords_ru`, `keywords_en`, `description_ru`, `description_en`, `amount`, `active`, `href`, `created_at`, `updated_at`) VALUES
(1, 'На пралище', 'EN ДЕВУШКА В КРАСНОМ ПЛАТКЕ', 'images/uploads/e4476035b0df74fab328ccda6b297f07.jpg', 6, '740000.00', '11000.00', '1,8 х 1,1 м', '2017', 'ru metatitle', 'en metatitle', 'ru keywords', 'en keywords', 'ru description', 'en description', 1, 1, 'na-pralishche', NULL, '2017-07-10 16:06:32'),
(2, 'Танцующая маха', 'EN Цикл Литографий  «Маскарад» Лит.№26', 'images/uploads/6c028c1e74e29008dade5fbf5761d18b.jpg', 6, '600000.00', '9300.00', '1,45 х 0,95 м', '2016', 'ru metatitle', 'en metatitle', 'ru keywords', 'en keywords', 'ru description', 'en description', 1, 1, 'tantsuyushchaya-maha', NULL, '2017-07-10 16:06:32'),
(3, 'Девушка в красном платке', 'EN  «Маска» Лит.№1', 'images/uploads/7ee4fbed0b81c3e2e28ec82fea9aacf3.jpg', 6, '300000.00', '5000.00', '1,12 х 0,6 м', '2017', NULL, 'en metatitle', NULL, 'en keywords', NULL, 'en description', 1, 1, 'devushka-v-krasnom-platke', NULL, '2017-07-10 16:06:32'),
(4, 'Золото Венеции', NULL, 'images/uploads/cf74a7e394a731b86f3d44dad8559449.jpg', 3, '690000.00', '10000.00', '100*100м', '2017', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'zoloto-venetsii', '2017-07-08 10:47:19', '2017-07-10 16:05:22'),
(5, 'Сирень и фиалки', NULL, 'images/uploads/61f6cfa409b519858359be91cfa64a87.jpg', 3, '483000.00', '7000.00', '100*100м', '2017', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'siren-i-fialki', '2017-07-08 10:51:06', '2017-07-10 16:05:22'),
(6, 'Девочка с Черешней', NULL, 'images/uploads/f1b056538dcb239c2e5be49ad2c40d59.jpg', 3, '690000.00', '10000.00', '70*70м', '2017', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'devochka-s-chereshney', '2017-07-08 10:52:46', '2017-07-10 16:05:22'),
(7, 'Нежность', NULL, 'images/uploads/ca7ce81cf6dd603428e01864f6b33d91.jpg', 3, '483000.00', '7000.00', '100*90м', '2017', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'nezhnost', '2017-07-08 10:56:55', '2017-07-10 16:05:22'),
(8, 'Утренние цветы', NULL, 'images/uploads/182a94c8324b7e3d743e90f832009209.jpg', 3, '304000.00', '4400.00', '60*80 м', '2017', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'utrennie-tsvety', '2017-07-08 11:00:34', '2017-07-10 16:05:22'),
(9, 'Дуняша', NULL, 'images/uploads/ddedb5c0f99efe3f397a40597a4c29f4.jpg', 3, '442000.00', '6400.00', '60*45  м', '2017', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'dunyasha', '2017-07-08 15:15:41', '2017-07-10 16:05:22'),
(10, 'Базилика Святого Марка,Венеция', NULL, 'images/uploads/ec910086e91972ccb756eeb367b8d467.jpg', 3, '690000.00', '10000.00', '100*100 м', '2017', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'bazilika-svyatogo-marka-venetsiya', '2017-07-08 15:17:37', '2017-07-10 16:05:22'),
(11, 'Под солнцем Италии', NULL, 'images/uploads/43abd194dc9415029b2ba96f20948478.jpg', 3, '414000.00', '6000.00', '60*80 м', '2017', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'pod-solntsem-italii', '2017-07-08 15:20:15', '2017-07-10 16:05:22'),
(12, 'Танго', NULL, 'images/uploads/41115fc5ce16219f835ed6fe0e2767c9.jpg', 6, '552000.00', '8000.00', '1,35*1,12', '2017', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'tango', '2017-07-08 15:22:57', '2017-07-10 16:05:22'),
(13, 'В кафе', NULL, 'images/uploads/c26cf7b6ac69b7515604087a2f5d6949.jpg', 6, '414000.00', '6000.00', '1,1*90 м', '2017', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'v-kafe', '2017-07-08 15:24:42', '2017-07-10 16:05:22'),
(14, 'Селянка', NULL, 'images/uploads/366ff5dd1a7e164c2b35227cea394e78.jpg', 6, '345000.00', '5000.00', '0,7*0,5', '2017', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'selyanka', '2017-07-08 15:25:56', '2017-07-10 16:05:22'),
(15, 'Битва ангелов', NULL, 'images/uploads/86cd4f2a604f28788ff906818dfe4908.JPG', 2, '999999.99', '120000.00', '2*1 м', '2012', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'bitva-angelov', '2017-07-08 15:32:11', '2017-07-10 16:05:22'),
(16, 'Девочка с собакой I или II', NULL, 'images/uploads/8126dc1af4b40d1c8f3a6be1cf2c1148.JPG', 2, '166000.00', '2400.00', '1*0,3 м', '2012', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'devochka-s-sobakoy-i-ili-ii', '2017-07-08 15:41:33', '2017-07-10 16:05:22'),
(17, 'Девушка с книгой', NULL, 'images/uploads/785e7a58b188c9de97b7cd26f53fd4fd.JPG', 2, '414000.00', '3000.00', '0,85*0,8 м', '2012', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'devushka-s-knigoy', '2017-07-08 15:43:45', '2017-07-10 16:05:22'),
(18, 'Девушка со скрипкой', NULL, 'images/uploads/8e6d42a5291d7f45e5e0b1151eed0e40.JPG', 2, '207000.00', '3000.00', '0,81*0,65', '2012', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'devushka-so-skripkoy', '2017-07-08 16:02:27', '2017-07-10 16:05:22'),
(19, 'Дон Кихот', NULL, 'images/uploads/2a850e894df18540bbb6b9d6f2832d8b.JPG', 2, '966000.00', '14000.00', '1*1,3', '2012', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'don-kihot', '2017-07-08 16:04:34', '2017-07-10 16:05:22'),
(20, 'Европа от Ла-Манша до Владивостока', NULL, 'images/uploads/ed9a40713cea580831c911594d144564.JPG', 2, '207000.00', '30000.00', '2*1 м', '2012', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'evropa-ot-la-mansha-do-vladivostoka', '2017-07-08 16:06:55', '2017-07-10 16:05:22'),
(21, 'Иисус', NULL, 'images/uploads/b160eb18cbbf832f1cf23ea5015175e1.JPG', 2, '276000.00', '4000.00', '60*80 м', '2012', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'iisus', '2017-07-08 16:10:54', '2017-07-10 16:05:22'),
(22, 'Кувшинки I', NULL, 'images/uploads/0883761f0da8fbef3a7ed9f83082f796.JPG', 2, '414000.00', '6000.00', '1*1', '2012', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'kuvshinki-i', '2017-07-08 16:16:37', '2017-07-10 16:05:22'),
(23, 'Кувшинки II', NULL, 'images/uploads/f83fcab4184da3596253a0a0062c66a1.JPG', 2, '414000.00', '6000.00', '1*1 м', '2012', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'kuvshinki-ii', '2017-07-08 16:18:46', '2017-07-10 16:05:22'),
(24, 'Лондон', NULL, 'images/uploads/753584ca1439cea90dd38ae54fccbe12.JPG', 2, '966000.00', '14000.00', '1,3*1,5 м', '2017', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'london', '2017-07-08 16:21:57', '2017-07-10 16:05:22');

-- --------------------------------------------------------

--
-- Структура таблицы `product_technique`
--

CREATE TABLE `product_technique` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `technique_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `product_technique`
--

INSERT INTO `product_technique` (`id`, `product_id`, `technique_id`, `created_at`, `updated_at`) VALUES
(7, 3, 4, NULL, NULL),
(8, 1, 4, NULL, NULL),
(9, 2, 4, NULL, NULL),
(10, 4, 4, NULL, NULL),
(11, 5, 4, NULL, NULL),
(12, 6, 4, NULL, NULL),
(13, 7, 4, NULL, NULL),
(14, 8, 4, NULL, NULL),
(15, 9, 4, NULL, NULL),
(16, 10, 4, NULL, NULL),
(17, 11, 4, NULL, NULL),
(18, 12, 4, NULL, NULL),
(19, 13, 4, NULL, NULL),
(20, 14, 4, NULL, NULL),
(21, 15, 4, NULL, NULL),
(22, 16, 4, NULL, NULL),
(23, 17, 4, NULL, NULL),
(24, 18, 4, NULL, NULL),
(25, 19, 4, NULL, NULL),
(26, 20, 4, NULL, NULL),
(27, 21, 4, NULL, NULL),
(28, 22, 4, NULL, NULL),
(29, 23, 4, NULL, NULL),
(30, 24, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_ru` text COLLATE utf8_unicode_ci,
  `description_en` text COLLATE utf8_unicode_ci,
  `metatitle_ru` text COLLATE utf8_unicode_ci,
  `metatitle_en` text COLLATE utf8_unicode_ci,
  `keywords_ru` text COLLATE utf8_unicode_ci,
  `keywords_en` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `page`, `description_ru`, `description_en`, `metatitle_ru`, `metatitle_en`, `keywords_ru`, `keywords_en`, `created_at`, `updated_at`) VALUES
(1, 'main', 'Test главна 2', 'Test main 2', 'Test главна 1', 'Test main 1', 'Test главна 3', 'Test main 3', NULL, '2017-07-04 15:14:28'),
(2, 'about', NULL, NULL, 'about', NULL, NULL, NULL, NULL, '2017-07-04 15:36:37'),
(3, 'masters', NULL, NULL, 'masters', NULL, NULL, NULL, NULL, '2017-07-04 15:36:25'),
(4, 'catalog', NULL, NULL, 'catalog', NULL, NULL, NULL, NULL, '2017-07-04 15:36:31'),
(5, 'blog', NULL, NULL, 'blog', NULL, NULL, NULL, NULL, '2017-07-04 15:36:05'),
(6, 'contacts', NULL, NULL, 'contacts', NULL, NULL, NULL, NULL, '2017-07-04 15:35:51'),
(7, 'how_buy', NULL, NULL, 'how buy', NULL, NULL, NULL, NULL, '2017-07-04 15:36:00'),
(8, 'blog_popular', NULL, NULL, 'popular articles', NULL, NULL, NULL, NULL, '2017-07-04 15:36:19');

-- --------------------------------------------------------

--
-- Структура таблицы `techniques`
--

CREATE TABLE `techniques` (
  `id` int(10) UNSIGNED NOT NULL,
  `ord` int(11) DEFAULT NULL,
  `name_ru` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `techniques`
--

INSERT INTO `techniques` (`id`, `ord`, `name_ru`, `name_en`, `created_at`, `updated_at`) VALUES
(1, 5, 'RU Карандаш', 'EN Карандаш', NULL, '2017-06-27 19:44:16'),
(2, 4, 'RU Акрил', 'EN Акрил', NULL, '2017-06-27 19:44:20'),
(3, 3, 'RU Акварель', 'EN Акварель', NULL, '2017-06-27 19:44:22'),
(4, 2, 'RU Масло', 'EN Масло', NULL, '2017-06-27 19:44:23'),
(5, 0, 'RU Тушь', 'EN Тушь', NULL, '2017-06-28 09:05:12'),
(6, 1, 'RU Каменая живопись', 'EN Каменая живопись', NULL, '2017-06-28 09:05:12');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `auth_via` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verified` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `remember_token`, `is_admin`, `auth_via`, `social_id`, `verified`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'test@mail.com', '$2y$10$qlpWMJbyvoOzCyGj2trtwebzzY18BR6991uhOkHK5zVC2rLDtll/K', '23123', 'sadasd', 'kzb1JYTy5UJwEqkljAbPNzqgozZzV9f0FH8iTrkYxZAaLkQB0xBrCtKXX2jY', 1, NULL, NULL, NULL, '2017-06-26 17:51:36', '2017-07-03 15:31:50'),
(2, 'Test2', 'test2@mail.com', '$2y$10$oDIBnCz/vYRZPmwN.nn4Kejh5nOzFz5BuYyvIRLTnCB2qAYdqTWdC', '123123123', 'TEwrETWE twetr wet', NULL, NULL, NULL, NULL, NULL, '2017-07-01 17:21:24', '2017-07-03 15:47:30'),
(3, 'Василий Клименко', 'vasyliy.klymenko@gmail.com', '', '123123456', 'asda asdsa asd', 'niVqXkDDuJStyf72i4oUG8ERWD3u1H5soHs5nxlnCYtSyFS7rN3KrbSZILVl', 0, 'google', '111687317572056630664', NULL, '2017-07-03 18:44:06', '2017-07-04 20:54:57'),
(4, 'Росарт', 'mail@rosart.club', '$2y$10$RYsyW8ikG1cOlH6Jh2CnGeP9844lt2ltWgh7HRmok3kQFmxhlwiES', '+7 911 001 1775', NULL, 'Q1hL6eTQ9oCdeisMUpozYwxP8nffd2YEzFypwtdrkC9xYqMZS2j8tdDJeH3s', 1, NULL, NULL, NULL, '2017-07-03 19:06:01', '2017-07-03 19:06:01'),
(5, 'Test3', 'test3@mail.com', '$2y$10$tWJa4H4x.tEGq1IMlIinCu.IuiLdUL0XgVXt3jBUnyv0SwZDpJpPq', NULL, NULL, NULL, 0, NULL, NULL, NULL, '2017-07-04 21:33:01', '2017-07-04 21:33:01'),
(6, 'test6', 'test4@mail.com', '$2y$10$1Ta8ndNXrVhFYimXfL8j2urFObih2Xh..GzeR1yzIL5Ct.WKbmw56', NULL, NULL, 'fecYRq1mWFuPBrSoVDkwY8V1ERIpBfIf83GWbVZMuZ1xcXA1v9Y4mz5ExybS', 0, NULL, NULL, NULL, '2017-07-04 21:38:00', '2017-07-04 21:38:00'),
(7, 'test8', 'test5@mail.com', '$2y$10$MBIcFm47Q4v5Od/7V.tqr.rSYe0jIa7Uao2/AssOAjc9gctRtDHx6', NULL, NULL, 't1lgIVZ6dPm6hj4PFGkVQ7xAk1BCLQAfouianCqe8fGxRg1G3iGVi6ICIGb5', 0, NULL, NULL, NULL, '2017-07-04 21:41:46', '2017-07-04 21:41:46'),
(8, 'test68', 'test6@mail.com', '$2y$10$pDteISTxQwStqEqGi4lx4.mXVfFpxXH7oFljJE/9aUhnoVwAyLX12', '123123', NULL, 'G2h93cJNViE8AA5M5sVXhkyI7WGWsPtJHaHTkC880pmFBoweXkpv2GaOplGQ', 0, NULL, NULL, NULL, '2017-07-04 21:43:59', '2017-07-04 21:43:59'),
(9, 'Леонид Качуляк', 'leonidkachuliak@gmail.com', '', NULL, NULL, 'AqNyrJmHgSwwuYVQFC7Lki0JxZapGqbftL7slwxEN7zaUg4Nqs86rlaTzChz', 0, 'google', '110923317372627596161', NULL, '2017-07-09 07:45:29', '2017-07-09 07:45:29');

-- --------------------------------------------------------

--
-- Структура таблицы `viewed`
--

CREATE TABLE `viewed` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `viewed`
--

INSERT INTO `viewed` (`id`, `product_id`, `ip`, `created_at`, `updated_at`) VALUES
(1, 3, '127.0.0.1', NULL, NULL),
(2, 3, '127.0.0.1', NULL, NULL),
(3, 3, '127.0.0.1', NULL, NULL),
(4, 3, '127.0.0.1', NULL, NULL),
(5, 3, '127.0.0.1', NULL, NULL),
(6, 3, '127.0.0.1', NULL, NULL),
(7, 3, '127.0.0.1', NULL, NULL),
(8, 3, '127.0.0.1', NULL, NULL),
(9, 3, '127.0.0.1', NULL, NULL),
(10, 3, '127.0.0.1', NULL, NULL),
(11, 3, '127.0.0.1', NULL, NULL),
(12, 3, '127.0.0.1', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_technique`
--
ALTER TABLE `product_technique`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `techniques`
--
ALTER TABLE `techniques`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `viewed`
--
ALTER TABLE `viewed`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `masters`
--
ALTER TABLE `masters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT для таблицы `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT для таблицы `product_technique`
--
ALTER TABLE `product_technique`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `techniques`
--
ALTER TABLE `techniques`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `viewed`
--
ALTER TABLE `viewed`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
