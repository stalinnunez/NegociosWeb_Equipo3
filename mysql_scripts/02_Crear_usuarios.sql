  CREATE TABLE `dbnegocios201803`.`usuarios` (
  `usuario_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `usuario_email` varchar(128) NOT NULL,
  `usuario_nombre` varchar(128) NOT NULL,
  `usuario_pswd` varchar(128) NOT NULL,
  `usuario_est` char(3) NOT NULL DEFAULT 'ACT',
  `usuario_fchIng` datetime NOT NULL,
  `usuario_exppwd` datetime NOT NULL,
  `usuario_pwdfail` int(11) NOT NULL DEFAULT '0',
  `usuario_lstlgn` datetime NOT NULL,
  PRIMARY KEY (`usuario_id`),
  UNIQUE KEY `usuario_name_UNIQUE` (`usuario_email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;