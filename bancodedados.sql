-- como vou usar um banco de dados online gratuito - do heroku 
-- o nome já vem predefinido

CREATE DATABASE IF NOT EXISTS heroku_87cadec878d4466;
USE heroku_87cadec878d4466;

-- CREATE DATABASE IF NOT EXISTS economapasDB  ;
-- USE economapasDB;

CREATE TABLE `heroku_87cadec878d4466`.`usuarios` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,

  PRIMARY KEY (`idusuario`));
  
  INSERT INTO usuarios (nome,senha) VALUES ('joao', '1234');
  INSERT INTO usuarios (nome,senha) VALUES ('maria', '5678');
  
  /*SELECT * FROM usuario;*/
  
  CREATE TABLE `heroku_87cadec878d4466`.`grupos` (
  `idgrupo` INT NOT NULL AUTO_INCREMENT,
  `nomeGrupo` VARCHAR(45) NOT NULL,
  `cidades` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`idgrupo`));
  