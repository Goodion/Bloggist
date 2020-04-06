-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 25 2020 г., 22:17
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bloggistdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` tinyint(4) NOT NULL,
  `text` varchar(3000) NOT NULL,
  `post_id` int(4) DEFAULT NULL,
  `author` int(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `is_moderated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `text`, `post_id`, `author`, `created_at`, `is_moderated`) VALUES
(1, 'ertertertertertertertertert', 19, 21, '2020-02-12 11:29:23', 0),
(2, 'ertertertertertertertertertqw', 19, 21, '2020-02-12 11:29:23', 0),
(3, '12312312sdqwddqwd', 19, 21, '2020-02-12 11:29:23', 0),
(4, '111111111111111', 19, 6, '2020-02-12 11:29:23', 0),
(5, '23113213', 19, 6, '2020-02-12 11:29:23', 0),
(6, 'qwe', 19, 6, '2020-02-12 11:29:23', 0),
(7, '&lt;script&gt; alert(\'asdasdasd\')&lt;/script&gt;', 19, 6, '2020-02-12 11:29:23', 0),
(8, '1231235dfwdfsf', 19, 6, '2020-02-12 11:31:46', 0),
(9, 'Normul!', 13, 6, '2020-02-12 17:08:36', 0),
(10, 'Tochno!', 13, 21, '2020-02-12 17:08:51', 0),
(11, 'Ura', 13, 21, '2020-02-12 17:08:55', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` tinyint(4) NOT NULL,
  `title` mediumtext DEFAULT NULL,
  `body` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`) VALUES
(1, 'Statya 1 probnaya', '&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff; text-align: left;&quot;&gt;Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение &lt;strong&gt;шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации &quot;Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..&quot; Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам &quot;lorem&lt;/strong&gt; ipsum&quot; &lt;em&gt;сразу показывает, как много веб-страниц&lt;/em&gt; всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '2020-02-04 12:30:50'),
(2, 'Statya 2 interesnaya', '&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff; text-align: left;&quot;&gt;Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение &lt;strong&gt;шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации &quot;Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..&quot; Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам &quot;lorem&lt;/strong&gt; ipsum&quot; &lt;em&gt;сразу показывает, как много веб-страниц&lt;/em&gt; всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff; text-align: left;&quot;&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;h4 style=&quot;margin: 0px 0px 15px; padding: 0px; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff; text-align: center;&quot;&gt;Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение&amp;nbsp;&lt;strong&gt;шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации &quot;Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..&quot; Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам &quot;lorem&lt;/strong&gt;&amp;nbsp;ipsum&quot;&amp;nbsp;&lt;em&gt;сразу показывает, как много веб-страниц&lt;/em&gt; всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).&lt;/h4&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '2020-02-04 12:31:55'),
(3, 'Страх коронавирусных бананов', '&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;&lt;span style=&quot;background-color: #ffffff; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;&quot;&gt;\r\nИх нельзя есть! они все заражены коронавирусом!!! говорили они\r\nЛялиус Сизова о проблеме коронавируса, страхе котиков и неочищенных бананов.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum&lt;/span&gt;&lt;/em&gt;&lt;/p&gt;', '2020-02-04 19:52:18'),
(4, 'ZAGHOKOKLSO', '&lt;h3 style=&quot;margin: 15px 0px; padding: 0px; font-size: 14px; font-family: \'Open Sans\', Arial, sans-serif; background-color: #ffffff;&quot;&gt;Абзац 1.10.32 &quot;de Finibus Bonorum et Malorum&quot;, написанный Цицероном в 45 году н.э.&lt;/h3&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;&quot;&gt;&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;&lt;/p&gt;\r\n&lt;h3 style=&quot;margin: 15px 0px; padding: 0px; font-size: 14px; font-family: \'Open Sans\', Arial, sans-serif; background-color: #ffffff;&quot;&gt;Английский перевод 1914 года, H. Rackham&lt;/h3&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;&quot;&gt;&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;&lt;/p&gt;', '2020-02-04 13:30:37'),
(5, 'Anopther Post', '&lt;h3 style=&quot;margin: 15px 0px; padding: 0px; font-size: 14px; font-family: \'Open Sans\', Arial, sans-serif; background-color: #ffffff;&quot;&gt;Абзац 1.10.33 &quot;de Finibus Bonorum et Malorum&quot;, написанный Цицероном в 45 году н.э.&lt;/h3&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;&quot;&gt;&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;&lt;/p&gt;\r\n&lt;h3 style=&quot;margin: 15px 0px; padding: 0px; font-size: 14px; font-family: \'Open Sans\', Arial, sans-serif; background-color: #ffffff;&quot;&gt;Английский перевод 1914 года, H. Rackham&lt;/h3&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;&quot;&gt;&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;&lt;/p&gt;', '2020-02-04 13:36:49'),
(6, 'qweqweqweqwe', '&lt;p&gt;color_map: [&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &quot;000000&quot;, &quot;Black&quot;,&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &quot;808080&quot;, &quot;Gray&quot;,&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &quot;FFFFFF&quot;, &quot;White&quot;,&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &quot;FF0000&quot;, &quot;Red&quot;,&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &quot;FFFF00&quot;, &quot;Yellow&quot;,&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &quot;008000&quot;, &quot;Green&quot;,&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp; &amp;nbsp; &quot;0000FF&quot;, &quot;Blue&quot;&lt;/p&gt;\r\n&lt;p&gt;&lt;span style=&quot;background-color: #f9f9f9;&quot;&gt;&amp;nbsp; ]&lt;/span&gt;&lt;/p&gt;', '2020-02-04 13:42:24'),
(7, 'ASDQAWDQWD', '&lt;h3 style=&quot;margin: 15px 0px; padding: 0px; font-size: 14px; font-family: \'Open Sans\', Arial, sans-serif; background-color: #ffffff;&quot;&gt;Абзац 1.10.33 &quot;de Finibus Bonorum et Malorum&quot;, написанный Цицероном в 45 году н.э.&lt;/h3&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;&quot;&gt;&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;&lt;/p&gt;\r\n&lt;h3 style=&quot;margin: 15px 0px; padding: 0px; font-size: 14px; font-family: \'Open Sans\', Arial, sans-serif; background-color: #ffffff;&quot;&gt;Английский перевод 1914 года, H. Rackham&lt;/h3&gt;\r\n&lt;p style=&quot;margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; background-color: #ffffff;&quot;&gt;&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;&lt;/p&gt;', '2020-02-04 13:42:50'),
(8, '8 способов встать по будильнику', '&lt;div&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Наступил февраль, новогодние каникулы давно позади, а войти в рабочий ритм всё никак не получается. Тяжелее всего - по утрам, когда звонит ставший уже ненавистным будильник, а соблазн выключить его (желательно навсегда) и сладко заснуть дальше велик, как Китайская стена. А вдруг хотя бы один из предложенных способов прямо завтра утром поможет вам вскочить бодрой ланью по первому же звонку будильника? Итак, поехали!&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #000000;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Способ 1, мурчащий&lt;/span&gt;&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Заведите кота! Желательно толстого и нежного - такого, который, услышав сигнал будильника и не обнаружив в своей миске сервированного завтрака, придёт топтаться прямо по вашему одеялу и ласково, но настойчиво намекать на подъём. Сможете ли вы продержаться так дольше пяти минут?&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #000000;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Способ 2, физкультурный&lt;/span&gt;&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Поставьте будильник подальше от кровати. Чтобы выключить его, вам просто придётся встать и пройти (проскакать, проползти) несколько шагов - возможно, именно они и разбудят вас окончательно и бесповоротно, сделав то, что не удалось звуковым волнам.&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #000000;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Способ 3, вкусный&lt;/span&gt;&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Сработает, если вы любите вкусно поесть. Сделайте так, чтобы вам хотелось встать утром! Заранее придумайте себе вкусный завтрак, соберите для него все продукты в одном месте, чтобы утром не пришлось судорожно метаться по кухне в поисках сыра, приготовьте всю необходимую посуду, порежьте, помойте и почистите всё, что можно, чтобы утром сразу встать и максимально быстро и без особых усилий порадовать себя вкусным завтраком!&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #000000;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Способ 4, семейный&lt;/span&gt;&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Никогда не стыдно попросить у близких помощи - пусть более ответственный жаворонок попробует вас разбудить - в зависимости от тяжести случая, растолкать, распинать, распихать и так далее - на что хватит сил и фантазии!&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #9900ff;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Способ 5, жестокий&lt;/span&gt;&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Способ не для слабаков! Вспомните, чем вам грозит проваляться в кровати лишние полчаса (если ничем, то, возможно, этот список вообще не для вас, отдыхайте и расслабляйтесь!). Не уволят ли вас за опоздание на работу? Не улетит ли ваш самолёт без вас? Может быть, именно эти ужасы и смотивируют вас вскочить с постели чуть раньше, чем хочется.&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #9900ff;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Способ 6, музыкальный&lt;/span&gt;&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #000000;&quot;&gt;У вас есть песня, которую вы ненавидите горячо, искренне и всей душой? Которая раздражает вас и вызывает желание если не убивать, то, как минимум, крушить всё вокруг? Установите её в качестве сигнала будильника, и тогда вы точно проснётесь быстро, а в качестве бонуса - ещё и полным энергии (правда, возможно, разрушительной).&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #9900ff;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;strong&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Способ 7, интеллектуальный&lt;/span&gt;&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Если вы пользуетесь телефоном вместо классического будильника, установите на него приложение, которое не даст вам отключить противный сигнал, пока вы не решите несколько несложных арифметических примеров или головоломку потруднее. Только не переборщите с логарифмами!&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #9900ff;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #000000;&quot;&gt;&lt;strong&gt;Способ 8, фантастический&lt;/strong&gt;&lt;br /&gt;&lt;/span&gt;&lt;/div&gt;\r\n&lt;div&gt;&lt;span style=&quot;color: #000000;&quot;&gt;Просто возьмите и встаньте сразу же, как услышите сигнал будильника! И да пребудет с вами сила раннего подъёма!&lt;/span&gt;&lt;/div&gt;\r\n&lt;div class=&quot;adL&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;yj6qo&quot;&gt;&amp;nbsp;&lt;/div&gt;', '2020-02-05 15:26:15'),
(11, '12345', '&lt;p&gt;1234567&lt;/p&gt;', '2020-02-07 16:21:18'),
(12, '123', '&lt;p&gt;12345&lt;/p&gt;', '2020-02-07 16:21:36'),
(13, 'fghfgh', '&lt;div class=&quot;blog-post&amp;gt;&amp;lt;div&amp;gt;&amp;lt;span style=&quot; style=&quot;box-sizing: border-box; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; background-color: #f5f5f5;&quot;&gt;Наступил февраль, новогодние каникулы давно позади, а войти в рабочий ритм всё никак не получается. Тяжелее всего - по утрам, когда звонит ставший уже ненавистным будильник, а соблазн выключить его (желательно навсегда) и сладко заснуть дальше велик, как Китайская стена. А вдруг хотя бы один из предложенных способов прямо завтра утром поможет вам вскочить бодрой ланью по первому же звонку будильника? Итак, поехали!&lt;/div&gt;\r\n&lt;div style=&quot;box-sizing: border-box; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; background-color: #f5f5f5;&quot;&gt;&lt;span style=&quot;box-sizing: border-box; color: #000000;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;\r\n&lt;div style=&quot;box-sizing: border-box; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; background-color: #f5f5f5;&quot;&gt;&lt;span style=&quot;box-sizing: border-box; font-weight: bolder;&quot;&gt;&lt;span style=&quot;box-sizing: border-box; color: #000000;&quot;&gt;Способ 1, мурчащий&lt;/span&gt;&lt;/span&gt;&lt;/div&gt;\r\n&lt;div style=&quot;box-sizing: border-box; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; background-color: #f5f5f5;&quot;&gt;&lt;span style=&quot;box-sizing: border-box; color: #000000;&quot;&gt;Заведите кота! Желательно толстого и нежного - такого, который, услышав сигнал будильника и не обнаружив в своей миске сервированного завтрака, придёт топтаться прямо по вашему одеялу и ласково, но настойчиво намекать на подъём. Сможете ли вы продержаться так дольше пяти минут?&lt;/span&gt;&lt;/div&gt;\r\n&lt;div style=&quot;box-sizing: border-box; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; background-color: #f5f5f5;&quot;&gt;&lt;span style=&quot;box-sizing: border-box; color: #000000;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;/div&gt;\r\n&lt;div style=&quot;box-sizing: border-box; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; background-color: #f5f5f5;&quot;&gt;&lt;span style=&quot;box-sizing: border-box; font-weight: bolder;&quot;&gt;&lt;span style=&quot;box-sizing: border-box; color: #000000;&quot;&gt;Способ 2, физкультурный&lt;/span&gt;&lt;/span&gt;&lt;/div&gt;\r\n&lt;div style=&quot;box-sizing: border-box; color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; background-color: #f5f5f5;&quot;&gt;&lt;span style=&quot;box-sizing: border-box; color: #000000;&quot;&gt;Поставьте будильник подальше от кровати&lt;/span&gt;&lt;/div&gt;', '2020-02-07 16:22:13'),
(14, '214234', '&lt;p&gt;dfgdfg&lt;/p&gt;', '2020-02-07 16:22:31'),
(15, 'fghfgh', '&lt;p&gt;&lt;span style=&quot;color: #212529; font-family: -apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, \'Helvetica Neue\', Arial, \'Noto Sans\', sans-serif, \'Apple Color Emoji\', \'Segoe UI Emoji\', \'Segoe UI Symbol\', \'Noto Color Emoji\'; font-size: 16px; background-color: #f5f5f5;&quot;&gt;Наступил февраль, новогодние каникулы давно позади, а войти в рабочий ритм всё никак не получается. Тяжелее всего - по утрам, когда звонит ставший уже ненавистным будильник, а соблазн выключить его (желательно навсегда) и сладко заснуть дальше велик, как Китайская стена. А вдруг хотя бы один из предложенных способов прямо завтра утром поможет вам вскочить бодрой ланью по первому же звонку будильника? Итак, поехали!&lt;/span&gt;&lt;/p&gt;', '2020-02-07 16:22:47'),
(16, '456546', '&lt;p&gt;fghfgh fghfgh&lt;/p&gt;', '2020-02-07 16:23:06'),
(17, 'fgdgt', '&lt;p&gt;fgg&lt;/p&gt;\r\n&lt;p&gt;fghgh&lt;/p&gt;', '2020-02-07 16:23:21'),
(18, 'ghgh', '&lt;p&gt;jhghj&lt;/p&gt;', '2020-02-07 16:28:59'),
(19, 'ZAGHOKOKLSO123123', '&lt;p&gt;&amp;lt;script&amp;gt; alert(\'asdasdasd\')&amp;lt;/script&amp;gt;&lt;/p&gt;', '2020-02-12 09:20:54');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` smallint(6) NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `subscribed` tinyint(1) NOT NULL DEFAULT 0,
  `permissions` tinyint(1) NOT NULL DEFAULT 1,
  `note` varchar(500) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `avatarUri` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `created_at`, `subscribed`, `permissions`, `note`, `updated_at`, `avatarUri`) VALUES
(6, 'user1', '2222@222.22', '$2y$10$xYDs27ai/xoc6qC580NdaO0Wf.oeQojgLGLx/NKiGBVp0rHnWopqG', '2020-02-04 17:46:08', 0, 20, '22222111', '2020-02-11 15:55:49', 'f8748ddd-918a-4931-a859-e0578a68472c.jpeg'),
(18, 'user2', 'sychwe@list.ru', '$2y$10$xzKCbfl6e4TTax8HelxjHueeJljW0dPSs2tmrghAJ1pbhArX.W1Nu', '2020-02-04 19:28:32', 1, 1, '', '2020-02-10 20:33:43', NULL),
(19, 'user3', 'syc2hwe@list.ru', '$2y$10$iCBSn0TtDMSdU9q1geBDnOXupzmpBkvB/JXVgjDwqEDFHdXrb4B3G', '2020-02-04 19:31:29', 0, 1, '', '2020-02-10 20:33:43', NULL),
(20, 'userlogin', 'iv.hcys@gmail.com', '$2y$10$q7SmuEwh5BKmy1L4hdDO1O0sQi2IhLx4oMAPs6cL/vnYSvq98QNba', '2020-02-05 15:39:18', 1, 1, '', '2020-02-10 20:33:43', NULL),
(21, 'Nastja', '312@yan.ru', '$2y$10$XmntSYWo9ypY7VV7dpPHuuDPuWS8epX3b2w0SPnNtEW4DNJBXQ7ui', '2020-02-05 17:08:29', 0, 40, 'Nastya Test', '2020-02-10 20:07:41', 'f8748ddd-918a-4931-a859-e0578a68472c.jpeg'),
(22, 'sych', 'sdfaa@as.ru', '$2y$10$HAs87HsCAcKydFdpPJycteNu4jLtBlTM5gS7sDaTkQlRPRmnB6OhS', '2020-02-06 13:12:44', 1, 1, '', '2020-02-10 20:33:43', NULL),
(23, 'sych1', 'sdf1aa@as.ru', '$2y$10$LiEyvpy8T41077onLBptPuZq94kjqxja/Hy9FmPKfTW2v3JFLvaka', '2020-02-06 13:13:31', 1, 1, '', '2020-02-10 20:33:43', NULL),
(24, 'nnn', 'nnn@nnn', '$2y$10$1hIvVmLZr7TpPkZcWm.IU.xXQcduqyupHrEqyE3OBlX0Bpp6q0H2u', '2020-02-07 16:26:08', 0, 1, '', '2020-02-10 20:33:43', NULL),
(25, '27858824078', 'test@test.com', '', '2020-02-11 18:09:32', 1, 1, '', '2020-02-11 18:09:32', NULL),
(26, '31663718660', 'syc11112hwe@list.ru', '', '2020-02-11 18:11:27', 1, 1, '', '2020-02-11 18:11:27', NULL),
(27, '65617414795', 'fgfgh@ghgfjh.bjbnj', '', '2020-02-11 18:33:15', 1, 1, '', '2020-02-11 18:33:15', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_id_uindex` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_login_uindex` (`login`),
  ADD UNIQUE KEY `users_email_uindex` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
