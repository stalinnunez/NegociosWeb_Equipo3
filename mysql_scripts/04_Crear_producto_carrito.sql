CREATE TABLE `dbnegocios201803`.`carrito_prod` (
  `usuario_email` varchar(128) NOT NULL,
  `productocod` VARCHAR(45) NOT NULL,
  `productocant` VARCHAR(45) NOT NULL,
  `productoimg` VARCHAR(128) NULL,
  `productodsc` VARCHAR(128) NULL,
  `productoprc` decimal(15,2) NULL, 
  PRIMARY KEY (`usuario_email`,`productocod`))