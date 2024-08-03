

DROP TABLE IF EXISTS `tourny`;


CREATE TABLE `tourny` (
  `_id` int NOT NULL AUTO_INCREMENT,
  `fname1` varchar(50) DEFAULT NULL,
  `lname1` varchar(50) DEFAULT NULL,
  `email1` varchar(50) DEFAULT NULL,
  `gender1` char(5) DEFAULT NULL,
  `ntrp1` varchar(5) DEFAULT NULL,
  `fname2` varchar(50) DEFAULT NULL,
  `lname2` varchar(50) DEFAULT NULL,
  `email2` varchar(50) DEFAULT NULL,
  `gender2` char(5) DEFAULT NULL,
  `ntrp2` varchar(5) DEFAULT NULL,
  `year` varchar(5) DEFAULT NULL,
  `division` varchar(50) DEFAULT NULL,
  `team` varchar(50) DEFAULT NULL,
  `mtype` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT '.',
  `date` int DEFAULT NULL,
  `semis` varchar(16) DEFAULT '.',
  `score1` varchar(50) DEFAULT '.',
  `finals` varchar(50) DEFAULT '.',
  `score2` varchar(50) DEFAULT '.',
  `winner` varchar(50) DEFAULT '.',
  `score3` varchar(50) DEFAULT '.',
  `payment` varchar(16) DEFAULT '0',
  `custom` varchar(50) DEFAULT '0',
  `opt` varchar(50) DEFAULT '.',
  PRIMARY KEY (`_id`)
) ENGINE=MyISAM AUTO_INCREMENT=371 DEFAULT CHARSET=latin1;




LOCK TABLES `tourny` WRITE;

INSERT INTO `tourny` VALUES (325,'Jack','Lee','jack.lee@gmail.com','M','3.5','Susan','Campbell','susan.campbell@gmail.com','F','3.0','2024','Mx6.5','','1','',1722563575,'.','.','.','.','.','.','0','0',''),(326,'Joe','Wu','joewu@gmail.com','M','3.5','Stacia','Kato','kato@gmail.com','F','3.0','2024','Mx6.5','','2','',1722563611,'.','.','.','.','.','.','0','0',''),(327,'Zack','Lee','zacklee@gmail.com','M','3.5','Teresa','Wu','teresa.wu@gmail.com','F','3.0','2024','Mx6.5','','3','',1722563652,'.','.','.','.','.','.','0','0',''),(328,'Don','Trump','trump@gmail.com','M','3.5','Melanie','Trump','melanie@gmail.com','F','3.0','2024','Mx6.5','','4','',1722563708,'.','.','.','.','.','.','0','0',''),(329,'Eric','Lee','eric.lee@gmail.com','M','3.0','Mary','Cullen','mary.cullen@gmail.com','F','3.5','2024','Mx6.5','','5','',1722563757,'.','.','.','.','.','.','0','0',''),(330,'Lindsay','Buckingham','lindsay@gmail.com','M','3.5','Stevie','Nicks','stevie@gmail.com','F','3.0','2024','Mx6.5','','6','',1722564721,'.','.','.','.','.','.','0','0',''),(331,'Jason','Kelche','kelche@gmail.com','M','3.5','Taylor','Swift','taylorswift@fox.com','F','3.0','2024','Mx6.5','','7','',1722564771,'.','.','.','.','.','.','0','0',''),(332,'Brock','Purdy','brock@gmail.com','M','3.5','Ceci','Purdy','cici@fox.com','F','3.0','2024','Mx6.5','','8','',1722564809,'.','.','.','.','.','.','0','0',''),(369,'Connie','Lui','connie.lui@gmail.com','F','3.5','Ben','Le','ben.le@gmail.com','M','4.0','2024','Mx7.5','','8','iah920',1722690920,'.','.','.','.','.','.','0','0','.'),(368,'Golden','Webb','webb@fox.com','F','3.5','Katherine','Chang Matsui','ruichi.redford@gmail.com','M','4.0','2024','Mx7.5','','7','golden833',1722690833,'.','.','.','.','.','.','0','0','.'),(367,'Boris','Beckham','boris.beckham@yahoo.com','F','3.5','Ruichi','Redford','ruichi.redford@gmail.com','M','4.0','2024','Mx7.5','','6','ruichi721',1722690721,'.','.','.','.','.','.','0','0','.'),(366,'Ann','Bernel','ann@yahoo.com','F','3.5','Kyle','Spears','kyle.spears@gmail.com','M','4.0','2024','Mx7.5','','5','ann605',1722690605,'.','.','.','.','.','.','0','0','.'),(365,'Julius','Erving','julius@gmail.com','M','3.5','Candi','Meyers','candi@gmail.com','F','4.0','2024','Mx7.5','','4','julius523',1722690523,'.','.','.','.','.','.','0','0','.'),(362,'Matt','Reagan','reagan@gmail.com','M','4.0','Bridgett','Fonda','b.fonda@gmail.com','F','3.5','2024','Mx7.5','','1','bridgett028',1722690028,'.','.','.','.','.','.','0','0','.'),(363,'William','Tan','will.tan@gmail.com','M','4.0','Janis','Harada','janis@gmail.com','F','3.5','2024','Mx7.5','','2','janis089',1722690089,'.','.','.','.','.','.','0','0','.'),(364,'Pete','Watson','peter@watson.com','M','3.5','Janet','Cashin','janet.cashin@gmail.com','F','4.0','2024','Mx7.5','','3','janet151',1722690151,'.','.','.','.','.','.','0','0','.');

UNLOCK TABLES;

