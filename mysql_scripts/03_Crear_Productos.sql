CREATE TABLE `dbnegocios201803`.`productos` (
  `productoid` BIGINT(11) NOT NULL AUTO_INCREMENT,
  `productobarra` VARCHAR(128) NULL,
  `productocod` VARCHAR(45) NOT NULL,
  `productodsc` VARCHAR(128) NULL,
  `productoest` CHAR(3) NULL,
  `productoimg` VARCHAR(128) NULL,
  `productocant` int(4) NULL,
  `productoprc` decimal NULL, 
  PRIMARY KEY (`productoid`),
  UNIQUE INDEX `productocod_UNIQUE` (`productocod` ASC));