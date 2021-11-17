CREATE DATABASE economapasDB  ;
USE economapasDB;

CREATE TABLE `economapasDB`.`usuarios` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,

  PRIMARY KEY (`idusuario`));
  
  INSERT INTO usuario (nome,senha) VALUES ('joao', '1234');
  INSERT INTO usuario (nome,senha) VALUES ('maria', '5678');
  
  /*SELECT * FROM usuario;*/
  
  CREATE TABLE `economapasDB`.`grupos` (
  `idgrupo` INT NOT NULL AUTO_INCREMENT,
  `nomeGrupo` VARCHAR(45) NOT NULL,
  `cidades` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`idgrupo`));
  