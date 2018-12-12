CREATE TABLE `dbnegocios201803`.`ventas` (
  `venta_id` BIGINT(11) NOT NULL AUTO_INCREMENT,
  `usuario_email` varchar(128) NOT NULL,
  `totalcant` decimal NOT NULL,
  PRIMARY KEY (`venta_id`))