
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `dates` varchar(255) CHARACTER SET utf8 NOT NULL,
  `short_content` text NOT NULL,
  PRIMARY KEY (`id`)
);

--
-- Dumping data for table `product`
--

INSERT INTO `news` (`id`, `title`, `dates`, `short_content`) VALUES
(1, 'новость1', '15.03.2016', 'Пёс украл сардельку'),
(2, 'новость2', '15.03.2016', 'Кот украл сосиску'),
(3, 'новость3', '15.03.2016', 'Мыш украл сыр'),
(4, 'новость4', '15.03.2016', 'Скунс украл колбасу'),
(5, 'новость5', '15.03.2016', 'Енот украл мыло'),
(6, 'новость6', '15.03.2016', 'Таракан украл батон');

