CREATE SCHEMA `dbnegocios201803` ;
CREATE USER 'negocios'@'localhost' IDENTIFIED BY 'nw.user.2018';
GRANT ALL ON dbnegocios201803.* TO 'negocios'@'localhost';