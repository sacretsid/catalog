-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.25 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных catalog
CREATE DATABASE IF NOT EXISTS `catalog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `catalog`;

-- Дамп структуры для таблица catalog.article
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `announcement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `author_id` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_article_author` (`author_id`),
  CONSTRAINT `FK_article_author` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы catalog.article: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`id`, `title`, `announcement`, `text`, `author_id`, `created_at`, `updated_at`) VALUES
	(1, 'Первая статья', 'Анонс первой статьи', 'Кучу текста про первую статью 2', 1, '2019-11-01 06:27:10', '2019-11-01 06:27:31');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

-- Дамп структуры для таблица catalog.article_heading
CREATE TABLE IF NOT EXISTS `article_heading` (
  `article_id` int(11) DEFAULT '0',
  `heading_id` int(11) DEFAULT '0',
  KEY `FK__article` (`article_id`),
  KEY `FK_article_heading_heading` (`heading_id`),
  CONSTRAINT `FK__article` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`),
  CONSTRAINT `FK_article_heading_heading` FOREIGN KEY (`heading_id`) REFERENCES `heading` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы catalog.article_heading: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `article_heading` DISABLE KEYS */;
INSERT INTO `article_heading` (`article_id`, `heading_id`) VALUES
	(1, 1),
	(1, 2);
/*!40000 ALTER TABLE `article_heading` ENABLE KEYS */;

-- Дамп структуры для таблица catalog.author
CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы catalog.author: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `author` DISABLE KEYS */;
INSERT INTO `author` (`id`, `last_name`, `first_name`, `middle_name`, `created_at`, `updated_at`) VALUES
	(1, 'Иванов', 'Иван', 'Иванович', '2019-11-01 06:25:29', NULL);
/*!40000 ALTER TABLE `author` ENABLE KEYS */;

-- Дамп структуры для таблица catalog.heading
CREATE TABLE IF NOT EXISTS `heading` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `Индекс 2` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Дамп данных таблицы catalog.heading: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `heading` DISABLE KEYS */;
INSERT INTO `heading` (`id`, `parent_id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 0, 'Спорт', '2019-11-01 06:16:36', NULL),
	(2, 0, 'Праздники', '2019-11-01 06:16:59', NULL);
/*!40000 ALTER TABLE `heading` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
