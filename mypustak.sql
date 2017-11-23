Create database mypustak;

CREATE TABLE `mypustak`.`user_comments` ( `comment_Id` BIGINT(20) NOT NULL AUTO_INCREMENT , 
             `comment_Author` TINYTEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
             `comment_author_Email` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
             `comment_Content` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
             `comment_Date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `comment_Status` INT(20) NOT NULL DEFAULT '0' , 
			  PRIMARY KEY (`comment_Id`));
			  
