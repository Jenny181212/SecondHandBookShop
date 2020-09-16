/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.17-log : Database - bookstore
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bookstore` /*!40100 DEFAULT CHARACTER SET gb2312 */;

USE `bookstore`;

/*Table structure for table `books` */

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `bookID` int(30) NOT NULL,
  `bookName` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`bookID`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

/*Data for the table `books` */

insert  into `books`(`bookID`,`bookName`,`price`,`pic`,`author`) values (1,'李可乐抗拆记',8,'image/books/1.jpg','李承鹏'),(2,'奥杜邦的祈祷',20,'image/books/2.jpg','伊坂幸太郎'),(3,'西方美学史论丛',1,'image/books/3.jpg','汝信、夏森'),(4,'傲慢与偏见：名著名译插图本?精华版',6,'image/books/4.jpg',' [英]奥斯丁（Austen J.） 著；张玲、张扬 译'),(5,'白银时代',26.1,'image/books/5.jpg','王小波'),(6,'南方旅馆',10.72,'image/books/6.jpg','林培源'),(7,'牧羊少年奇幻之旅',2,'image/books/7.jpg','[巴西]柯艾略 著；丁文林 译'),(8,'人民的名义',10,'image/books/8.jpg','周梅森'),(9,'人间失格',13,'image/books/9.jpg','[日]太宰治 著；烨伊 译'),(10,'明朝那些事儿',16,'image/books/10.jpg','当年明月'),(11,'告白',17.66,'image/books/11.jpg','[日]?佳苗'),(12,'时间简史',5,'image/books/12.jpg','[英]史蒂芬霍金 '),(13,'上帝掷骰子吗？',15,'image/books/13.jpg','曹天元'),(14,'三体',12.5,'image/books/14.jpg','刘慈欣'),(15,'解忧杂货店',4,'image/books/15.jpg','东野圭吾'),(16,'拖拉机设计和计算',30,'image/books/16.jpg','《拖拉机》编辑部主编'),(17,'围城',8,'image/books/17.jpg','钱钟书'),(18,'围棋入门（一）',13,'image/books/18.jpg','日本棋院编'),(19,'辞海',38,'image/books/19.jpg','上海辞书'),(22,'jj',14,'image/books/69P58PIC3yX_1024.jpg','jj'),(23,'白夜行',35,'image/books/白夜行.jpg','[日]东野圭吾');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

/*Data for the table `users` */

insert  into `users`(`username`,`password`) values ('aaa','123'),('bbb','123');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
