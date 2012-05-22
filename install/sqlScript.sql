SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

DROP TABLE IF EXISTS `Category`;
DROP TABLE IF EXISTS `Lang`;
DROP TABLE IF EXISTS `Settings`;
DROP TABLE IF EXISTS `ArticleCategory`;
DROP TABLE IF EXISTS `Agenda`;
DROP TABLE IF EXISTS `AgendaContent`;
DROP TABLE IF EXISTS `Evento`;
DROP TABLE IF EXISTS `EventoContent`;
DROP TABLE IF EXISTS `Type`;
DROP TABLE IF EXISTS `Rol`;
DROP TABLE IF EXISTS `Menu`;
DROP TABLE IF EXISTS `MenuContent`;
DROP TABLE IF EXISTS `Link`;
DROP TABLE IF EXISTS `User`;
DROP TABLE IF EXISTS `File`;
DROP TABLE IF EXISTS `Article`;
DROP TABLE IF EXISTS `ArticleContent`;
DROP TABLE IF EXISTS `ArticleCategoryContent`;
DROP TABLE IF EXISTS `Newsletter`;
DROP TABLE IF EXISTS `Newsletter_has_Article`;
DROP TABLE IF EXISTS `Comment`;
DROP TABLE IF EXISTS `Banner`;
DROP TABLE IF EXISTS `Components`;
DROP TABLE IF EXISTS `SearchOccurrence`;
DROP TABLE IF EXISTS `SearchPage`;
DROP TABLE IF EXISTS `SearchWord`;

CREATE TABLE IF NOT EXISTS `Agenda` (
  `idAgenda` int(11) NOT NULL AUTO_INCREMENT,
  `published` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idAgenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `AgendaContent` (
  `title` varchar(255) DEFAULT NULL,
  `lang` varchar(7) NOT NULL,
  `idAgenda` int(11) NOT NULL,
  PRIMARY KEY (`lang`,`idAgenda`),
  KEY `fk_AgendaContent_Agenda1` (`idAgenda`),
  KEY `fk_AgendaContent_Lang` (`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Article` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `published` tinyint(1) DEFAULT '0',
  `author` int(11) NOT NULL,
  `hits` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `img_portada` varchar(255) DEFAULT NULL,
  `show_title` tinyint(1) DEFAULT '1',
  `home` tinyint(1) DEFAULT '0',
  `template` varchar(255) DEFAULT NULL,
  `fuente` varchar(255) DEFAULT NULL,
  `bibliografia` text,
  `banner` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idArticle`),
  KEY `fk_author` (`author`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=862 ;

CREATE TABLE IF NOT EXISTS `ArticleCategory` (
  `idArticleCategory` int(11) NOT NULL AUTO_INCREMENT,
  `acceptComments` int(1) DEFAULT '0',
  `parent` int(11) NOT NULL DEFAULT '0',
  `template` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idArticleCategory`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

CREATE TABLE IF NOT EXISTS `ArticleCategoryContent` (
  `idArticleCategory` int(11) NOT NULL,
  `lang` varchar(7) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`lang`,`idArticleCategory`),
  KEY `fk_category_content` (`idArticleCategory`),
  KEY `fk_ArticleCategoryContent_Category` (`idArticleCategory`),
  KEY `fk_ArticleCategoryContent_lang` (`lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ArticleContent` (
  `text` text NOT NULL,
  `lang` varchar(7) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`idArticle`,`lang`),
  KEY `fk_ArticleContent_Lang` (`lang`),
  KEY `fk_ArticleContent_Article` (`idArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Article_has_Tag` (
  `idArticle` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  PRIMARY KEY (`idArticle`,`idTag`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Banner` (
  `idBanner` int(11) NOT NULL AUTO_INCREMENT,
  `src` varchar(255) NOT NULL,
  `display_in` int(11) NOT NULL DEFAULT '0',
  `link` varchar(255) DEFAULT NULL,
  `target` varchar(255) NOT NULL DEFAULT '_blank',
  `visits` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `orden` int(11) NOT NULL DEFAULT '0',
  `miniatura` varchar(255) DEFAULT NULL,
  `always_present` int(1) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `endDate` date NOT NULL,
  PRIMARY KEY (`idBanner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=197 ;

CREATE TABLE IF NOT EXISTS `Banner_has_Article` (
  `idBanner` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  PRIMARY KEY (`idBanner`,`idArticle`),
  KEY `fk_Banner_has_Article_Article1` (`idArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Banner_has_Tag` (
  `idBanner` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  PRIMARY KEY (`idBanner`,`idTag`),
  KEY `fk_Banner_has_Tag_Tag1` (`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Banner_linkedTo` (
  `url` varchar(255) DEFAULT NULL,
  `idBanner_linkedTo` int(11) NOT NULL AUTO_INCREMENT,
  `idBanner` int(11) NOT NULL,
  PRIMARY KEY (`idBanner_linkedTo`),
  KEY `fk_Banner_linkedTo_Banner1` (`idBanner`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

CREATE TABLE IF NOT EXISTS `Category` (
  `idCategory` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idCategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

CREATE TABLE IF NOT EXISTS `Comment` (
  `idComment` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `content` text,
  `approved` int(11) NOT NULL DEFAULT '0',
  `karma` int(11) DEFAULT '100',
  `Article_idArticle` int(11) NOT NULL,
  `Lang_idLang` varchar(7) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `agent` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idComment`),
  KEY `fk_Comment_Article1` (`Article_idArticle`),
  KEY `fk_Comment_Lang1` (`Lang_idLang`),
  KEY `fk_Comment_Comment1` (`parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `Components` (
  `plugin` varchar(255) NOT NULL,
  `params` varchar(255) DEFAULT NULL,
  `Article_idArticle` int(11) NOT NULL,
  `idComponents` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idComponents`),
  KEY `fk_Components_Article1` (`Article_idArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `Evento` (
  `idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `location` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `time` time DEFAULT NULL,
  `idAgenda` int(11) NOT NULL,
  PRIMARY KEY (`idEvento`),
  KEY `fk_Evento_Agenda` (`idAgenda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `EventoContent` (
  `title` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `lang` varchar(7) CHARACTER SET latin1 NOT NULL,
  `idEvento` int(11) NOT NULL,
  `text` text CHARACTER SET latin1,
  PRIMARY KEY (`lang`,`idEvento`),
  KEY `fk_EventoContent_Evento` (`idEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `File` (
  `idFile` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `MyType` int(11) NOT NULL,
  `MyCategory` int(11) NOT NULL,
  PRIMARY KEY (`idFile`),
  KEY `fk_File_Type` (`MyType`),
  KEY `fk_File_Category` (`MyCategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2080 ;

CREATE TABLE IF NOT EXISTS `Lang` (
  `idLang` varchar(7) NOT NULL,
  `title` varchar(45) NOT NULL,
  `selected` tinyint(1) DEFAULT '0',
  `default` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idLang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Link` (
  `idLink` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL DEFAULT '_blank',
  `tags` varchar(255) NOT NULL DEFAULT '',
  `css` varchar(255) NOT NULL DEFAULT ' ',
  `visits` int(11) NOT NULL DEFAULT '0',
  `published` tinyint(1) NOT NULL DEFAULT '0',
  `orden` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idLink`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `Menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `target` varchar(255) NOT NULL,
  `access_level` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `display_in` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT '0',
  `editable` tinyint(1) DEFAULT '1',
  `params` varchar(255) DEFAULT NULL,
  `css` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idMenu`),
  KEY `fk_Menu_Menu` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

CREATE TABLE IF NOT EXISTS `MenuContent` (
  `title` varchar(255) NOT NULL,
  `lang` varchar(7) NOT NULL,
  `idMenu` int(11) NOT NULL,
  PRIMARY KEY (`lang`,`idMenu`),
  KEY `fk_MenuContent_Lang` (`lang`),
  KEY `fk_MenuContent_Menu` (`idMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Newsletter` (
  `idNewsletter` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `articuloPrincipal` int(11) NOT NULL,
  PRIMARY KEY (`idNewsletter`,`articuloPrincipal`),
  KEY `fk_Newsletter_Article1` (`articuloPrincipal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Newsletter_has_Article` (
  `Newsletter_idNewsletter` int(11) NOT NULL,
  `Article_idArticle` int(11) NOT NULL,
  PRIMARY KEY (`Newsletter_idNewsletter`,`Article_idArticle`),
  KEY `fk_Newsletter_has_Article_Article1` (`Article_idArticle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

CREATE TABLE IF NOT EXISTS `SearchOccurrence` (
  `idSearchOccurrence` int(11) NOT NULL AUTO_INCREMENT,
  `idSearchPage` int(11) NOT NULL,
  `idSearchWord` int(11) DEFAULT NULL,
  `weight` int(3) DEFAULT NULL,
  PRIMARY KEY (`idSearchOccurrence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `SearchPage` (
  `idSearchPage` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `fulltxt` text,
  `indexdate` datetime DEFAULT NULL,
  `size` float DEFAULT NULL,
  `md5sum` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`idSearchPage`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `SearchWord` (
  `idSearchWord` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(50) NOT NULL,
  PRIMARY KEY (`idSearchWord`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `Settings` (
  `id` varchar(255) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `Tag` (
  `idTag` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) NOT NULL,
  PRIMARY KEY (`idTag`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1415 ;

CREATE TABLE IF NOT EXISTS `Type` (
  `idType` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `extension` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

CREATE TABLE IF NOT EXISTS `User` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) DEFAULT NULL,
  `password` blob,
  `name` varchar(255) DEFAULT NULL,
  `surnames` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `MyRol` int(11) NOT NULL,
  `perms` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;


ALTER TABLE `Article`
  ADD CONSTRAINT `fk_author` FOREIGN KEY (`author`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `ArticleContent`
  ADD CONSTRAINT `fk_ArticleContent_Article` FOREIGN KEY (`idArticle`) REFERENCES `Article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ArticleContent_Lang` FOREIGN KEY (`lang`) REFERENCES `Lang` (`idLang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Banner_has_Article`
  ADD CONSTRAINT `fk_Banner_has_Article_Article1` FOREIGN KEY (`idArticle`) REFERENCES `Article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Banner_has_Article_Banner1` FOREIGN KEY (`idBanner`) REFERENCES `Banner` (`idBanner`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Banner_linkedTo`
  ADD CONSTRAINT `fk_Banner_linkedTo_Banner1` FOREIGN KEY (`idBanner`) REFERENCES `Banner` (`idBanner`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Comment`
  ADD CONSTRAINT `fk_Comment_Article1` FOREIGN KEY (`Article_idArticle`) REFERENCES `Article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comment_Comment1` FOREIGN KEY (`parent`) REFERENCES `Comment` (`idComment`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comment_Lang1` FOREIGN KEY (`Lang_idLang`) REFERENCES `Lang` (`idLang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Components`
  ADD CONSTRAINT `fk_Components_Article1` FOREIGN KEY (`Article_idArticle`) REFERENCES `Article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Evento`
  ADD CONSTRAINT `fk_Evento_Agenda` FOREIGN KEY (`idAgenda`) REFERENCES `Agenda` (`idAgenda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `EventoContent`
  ADD CONSTRAINT `fk_EventoContent_Evento` FOREIGN KEY (`idEvento`) REFERENCES `Evento` (`idEvento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `File`
  ADD CONSTRAINT `fk_File_Category` FOREIGN KEY (`MyCategory`) REFERENCES `Category` (`idCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_File_Type` FOREIGN KEY (`MyType`) REFERENCES `Type` (`idType`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `MenuContent`
  ADD CONSTRAINT `fk_MenuContent_Lang` FOREIGN KEY (`lang`) REFERENCES `Lang` (`idLang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_MenuContent_Menu` FOREIGN KEY (`idMenu`) REFERENCES `Menu` (`idMenu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Newsletter`
  ADD CONSTRAINT `fk_Newsletter_Article1` FOREIGN KEY (`articuloPrincipal`) REFERENCES `Article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Newsletter_has_Article`
  ADD CONSTRAINT `fk_Newsletter_has_Article_Article1` FOREIGN KEY (`Article_idArticle`) REFERENCES `Article` (`idArticle`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Newsletter_has_Article_Newsletter1` FOREIGN KEY (`Newsletter_idNewsletter`) REFERENCES `Newsletter` (`idNewsletter`) ON DELETE NO ACTION ON UPDATE NO ACTION;


INSERT INTO `Category` VALUES (1,'Generales','images'),(2,'Generales','documents'),(3,'Banners','images');
INSERT INTO `Lang` VALUES ('ar','Arabic',0,0),('bg','Bulgarian',0,0),('bs','Bosnian',0,0),('ca','Catalan',0,0),('cs','Czech',0,0),('cy','Welsh',0,0),('da','Danish',0,0),('de','German',0,0),('el','Greek',0,0),('en','English',0,0),('eo','Esperanto',0,0),('es','Spanish',1,1),('et','Estonian',0,0),('eu','Basque',0,0),('fa','Persian',0,0),('fi','Finnish',0,0),('fr','French',0,0),('ga','Irish',0,0),('he','Hebrew',0,0),('hi','Hindi',0,0),('hr','Croatian',0,0),('hu','Hungarian',0,0),('hy','Armenian',0,0),('id','Indonesian',0,0),('is','Icelandic',0,0),('it','Italian',0,0),('ja','Japanese',0,0),('ko','Korean',0,0),('ku','Kurdish',0,0),('la','Latin',0,0),('lt','Lithuanian',0,0),('lv','Latvian',0,0),('mk','Macedonian',0,0),('mn','Mongolian',0,0),('mo','Moldavian',0,0),('mt','Maltese',0,0),('nb','Norwegian BokmÃ¥l',0,0),('ne','Nepali',0,0),('nl','Dutch',0,0),('pa','Punjabi',0,0),('pl','Polish',0,0),('pt-br','Portuguese, Brazil',0,0),('pt-pt','Portuguese, Portugal',0,0),('qu','Quechua',0,0),('ro','Romanian',0,0),('ru','Russian',0,0),('sl','Slovenian',0,0),('sla','Slavic',0,0),('so','Somali',0,0),('sq','Albanian',0,0),('sr','Serbian',0,0),('sv','Swedish',0,0),('ta','Tamil',0,0),('th','Thai',0,0),('tr','Turkish',0,0),('uk','Ukrainian',0,0),('ur','Urdu',0,0),('uz','Uzbek',0,0),('vi','Vietnamese',0,0),('yi','Yiddish',0,0),('zh-hans','Chinese (Simplified)',0,0),('zh-hant','Chinese (Traditional)',0,0),('zu','Zulu',0,0);
INSERT INTO `Settings` VALUES ('analytics',''),('analytics-tableid',''),('analytics-user',''),('analytics-pass',''),('smtp-host',''),('smtp-user',''),('smtp-pass',''),('smtp-port','25');
INSERT INTO `Type` VALUES (1,'Indesign','indd'),(2,'ImÃ¡gen','jpg jpeg tga tiff png gif'),(3,'pdf','pdf'),(4,'Comprimido','.zip .rar');
INSERT INTO `Rol` VALUES (1,'Administrador'),(2,'Gestor'),(4,'Usuario Web'),(8,'Usuario News');
INSERT INTO `User` VALUES (1,'admin','','Admin','admin','',1,NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
