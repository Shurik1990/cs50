-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.25-log - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица files.files
DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(50) NOT NULL DEFAULT '',
  `date_added` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы files.files: ~2 rows (приблизительно)
DELETE FROM `files`;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` (`id`, `filename`, `date_added`) VALUES
	(1, '1489082843.dat', 1489082843),
	(2, '1489082878.php', 1489082878);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
