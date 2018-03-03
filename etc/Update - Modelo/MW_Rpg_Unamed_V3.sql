-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema RPG_unamed
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema RPG_unamed
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `RPG_unamed` DEFAULT CHARACTER SET latin1 ;
USE `RPG_unamed` ;

-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_equipamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_equipamento` (
  `idt_equipamento` INT(11) NOT NULL AUTO_INCREMENT,
  `nme_equipamento` VARCHAR(50) NOT NULL,
  `dsc_equipamento` VARCHAR(200) NOT NULL,
  `tpo_equipamento` ENUM('A', 'D') NOT NULL,
  `vlr_base_equipamento` INT(11) NOT NULL,
  PRIMARY KEY (`idt_equipamento`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `nme_equipamento_UNIQUE` ON `RPG_unamed`.`td_equipamento` (`nme_equipamento` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_alinhamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_alinhamento` (
  `idt_alinhamento` INT(11) NOT NULL AUTO_INCREMENT,
  `dsc_alinhamento` VARCHAR(350) NOT NULL,
  `nme_alinhamento` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idt_alinhamento`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_classe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_classe` (
  `idt_classe` INT(11) NOT NULL AUTO_INCREMENT,
  `nme_classe` VARCHAR(50) NOT NULL,
  `dsc_classe` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idt_classe`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `nme_classe_UNIQUE` ON `RPG_unamed`.`td_classe` (`nme_classe` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_cor_olho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_cor_olho` (
  `idt_cor_olho` INT(11) NOT NULL AUTO_INCREMENT,
  `nme_cor_olho` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idt_cor_olho`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;

CREATE UNIQUE INDEX `nme_cor_olho_UNIQUE` ON `RPG_unamed`.`td_cor_olho` (`nme_cor_olho` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_raca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_raca` (
  `idt_raca` INT(11) NOT NULL AUTO_INCREMENT,
  `nme_raca` VARCHAR(50) NOT NULL,
  `dsc_raca` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idt_raca`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `nme_raca_UNIQUE` ON `RPG_unamed`.`td_raca` (`nme_raca` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_religiao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_religiao` (
  `idt_religiao` INT(11) NOT NULL AUTO_INCREMENT,
  `nme_religiao` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idt_religiao`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = latin1;

CREATE UNIQUE INDEX `nme_religiao_UNIQUE` ON `RPG_unamed`.`td_religiao` (`nme_religiao` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`tb_personagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`tb_personagem` (
  `idt_personagem` INT(11) NOT NULL AUTO_INCREMENT,
  `nme_personagem` VARCHAR(50) NOT NULL,
  `exp_personagem` INT(11) NOT NULL,
  `gen_personagem` VARCHAR(50) NOT NULL,
  `pes_personagem` INT(11) NOT NULL,
  `alt_personagem` DECIMAL(2,1) NOT NULL,
  `dsc_cabelo_personagem` VARCHAR(200) NOT NULL,
  `img_personagem` VARCHAR(150) NOT NULL,
  `hst_personagem` TEXT NULL DEFAULT NULL,
  `inf_adicional_personagem` VARCHAR(200) NULL DEFAULT NULL,
  `cod_alinhamento` INT(11) NOT NULL,
  `cod_classe` INT(11) NOT NULL,
  `cod_raca` INT(11) NOT NULL,
  `cod_religiao` INT(11) NOT NULL,
  `cod_cor_olho` INT(11) NOT NULL,
  `qtd_dinheiro_personagem` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`idt_personagem`),
  CONSTRAINT `fk_tb_personagem_td_alinhamento1`
    FOREIGN KEY (`cod_alinhamento`)
    REFERENCES `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_personagem_td_classe1`
    FOREIGN KEY (`cod_classe`)
    REFERENCES `RPG_unamed`.`td_classe` (`idt_classe`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_personagem_td_cor_olho1`
    FOREIGN KEY (`cod_cor_olho`)
    REFERENCES `RPG_unamed`.`td_cor_olho` (`idt_cor_olho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_personagem_td_raca1`
    FOREIGN KEY (`cod_raca`)
    REFERENCES `RPG_unamed`.`td_raca` (`idt_raca`),
  CONSTRAINT `fk_tb_personagem_td_religiao1`
    FOREIGN KEY (`cod_religiao`)
    REFERENCES `RPG_unamed`.`td_religiao` (`idt_religiao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = big5;

CREATE INDEX `fk_tb_personagem_td_alinhamento1_idx` ON `RPG_unamed`.`tb_personagem` (`cod_alinhamento` ASC);

CREATE INDEX `fk_tb_personagem_td_classe1_idx` ON `RPG_unamed`.`tb_personagem` (`cod_classe` ASC);

CREATE INDEX `fk_tb_personagem_td_raca1` ON `RPG_unamed`.`tb_personagem` (`cod_raca` ASC);

CREATE INDEX `fk_tb_personagem_td_cor_olho1_idx` ON `RPG_unamed`.`tb_personagem` (`cod_cor_olho` ASC);

CREATE INDEX `fk_tb_personagem_td_religiao1_idx` ON `RPG_unamed`.`tb_personagem` (`cod_religiao` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_equipavel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_equipavel` (
  `idt_equipavel` INT(11) NOT NULL AUTO_INCREMENT,
  `cod_equipamento` INT(11) NOT NULL,
  `cod_personagem` INT(11) NOT NULL,
  PRIMARY KEY (`idt_equipavel`),
  CONSTRAINT `fk_ta_equipavel_tb_equipamento1`
    FOREIGN KEY (`cod_equipamento`)
    REFERENCES `RPG_unamed`.`td_equipamento` (`idt_equipamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_equipavel_tb_personagem1`
    FOREIGN KEY (`cod_personagem`)
    REFERENCES `RPG_unamed`.`tb_personagem` (`idt_personagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_ta_equipavel_tb_equipamento1_idx` ON `RPG_unamed`.`ta_equipavel` (`cod_equipamento` ASC);

CREATE INDEX `fk_ta_equipavel_tb_personagem1_idx` ON `RPG_unamed`.`ta_equipavel` (`cod_personagem` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`tb_sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`tb_sala` (
  `idt_sala` INT(11) NOT NULL AUTO_INCREMENT,
  `nme_sala` VARCHAR(50) NOT NULL,
  `dta_criacao_sala` DATETIME NOT NULL,
  `dta_ultima_atividade_sala` DATETIME NOT NULL,
  `hst_campanha_sala` TEXT NULL DEFAULT NULL,
  `pwd_sala` VARCHAR(128) NULL DEFAULT NULL,
  `qtd_players_sala` INT(11) NOT NULL,
  PRIMARY KEY (`idt_sala`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `nme_sala_UNIQUE` ON `RPG_unamed`.`tb_sala` (`nme_sala` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_tipo_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_tipo_perfil` (
  `idt_tipo_perfil` INT(11) NOT NULL AUTO_INCREMENT,
  `nme_tipo_perfil` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idt_tipo_perfil`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `nme_tipo_perfil_UNIQUE` ON `RPG_unamed`.`td_tipo_perfil` (`nme_tipo_perfil` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`tb_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`tb_usuario` (
  `idt_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nme_usuario` VARCHAR(50) NOT NULL,
  `lgn_usuario` VARCHAR(30) NOT NULL,
  `pwd_usuario` VARCHAR(128) NOT NULL,
  `eml_usuario` VARCHAR(50) NOT NULL,
  `cod_perfil` INT(11) NOT NULL,
  `atv_usuario` TINYINT(1) NOT NULL COMMENT 'A = Ativo\nI = Inativo',
  PRIMARY KEY (`idt_usuario`),
  CONSTRAINT `fk_tb_usuario_td_tipo_perfil1`
    FOREIGN KEY (`cod_perfil`)
    REFERENCES `RPG_unamed`.`td_tipo_perfil` (`idt_tipo_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `eml_usuario_UNIQUE` ON `RPG_unamed`.`tb_usuario` (`eml_usuario` ASC);

CREATE INDEX `fk_tb_usuario_td_tipo_perfil1_idx` ON `RPG_unamed`.`tb_usuario` (`cod_perfil` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_papel_sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_papel_sala` (
  `idt_papel_sala` INT(11) NOT NULL AUTO_INCREMENT,
  `nme_papel_sala` VARCHAR(50) NOT NULL,
  `dsc_papel_sala` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idt_papel_sala`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `nme_papel_sala_UNIQUE` ON `RPG_unamed`.`td_papel_sala` (`nme_papel_sala` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_perfil_sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_perfil_sala` (
  `idt_perfil_sala` INT(11) NOT NULL AUTO_INCREMENT,
  `cod_usuario` INT(11) NOT NULL,
  `cod_personagem` INT(11) NULL DEFAULT NULL,
  `cod_papel_sala` INT(11) NOT NULL,
  `cod_sala` INT(11) NOT NULL,
  PRIMARY KEY (`idt_perfil_sala`),
  CONSTRAINT `fk_ta_perfil_sala_tb_personagem1`
    FOREIGN KEY (`cod_personagem`)
    REFERENCES `RPG_unamed`.`tb_personagem` (`idt_personagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_perfil_sala_tb_sala1`
    FOREIGN KEY (`cod_sala`)
    REFERENCES `RPG_unamed`.`tb_sala` (`idt_sala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_perfil_sala_tb_usuario1`
    FOREIGN KEY (`cod_usuario`)
    REFERENCES `RPG_unamed`.`tb_usuario` (`idt_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_perfil_sala_td_papel_sala1`
    FOREIGN KEY (`cod_papel_sala`)
    REFERENCES `RPG_unamed`.`td_papel_sala` (`idt_papel_sala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_cod_usuario_sala` ON `RPG_unamed`.`ta_perfil_sala` (`cod_usuario` ASC, `cod_sala` ASC, `cod_personagem` ASC);

CREATE INDEX `fk_ta_perfil_sala_tb_usuario1_idx` ON `RPG_unamed`.`ta_perfil_sala` (`cod_usuario` ASC);

CREATE INDEX `fk_ta_perfil_sala_tb_personagem1_idx` ON `RPG_unamed`.`ta_perfil_sala` (`cod_personagem` ASC);

CREATE INDEX `fk_ta_perfil_sala_td_papel_sala1_idx` ON `RPG_unamed`.`ta_perfil_sala` (`cod_papel_sala` ASC);

CREATE INDEX `fk_ta_perfil_sala_tb_sala1_idx` ON `RPG_unamed`.`ta_perfil_sala` (`cod_sala` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_atributo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_atributo` (
  `idt_atributo` INT(11) NOT NULL,
  `nme_atributo` VARCHAR(50) NOT NULL,
  `val_atributo` INT(11) NOT NULL,
  PRIMARY KEY (`idt_atributo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `nme_atributo_UNIQUE` ON `RPG_unamed`.`td_atributo` (`nme_atributo` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_personagem_atributo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_personagem_atributo` (
  `idt_personagem_atributo` INT(11) NOT NULL AUTO_INCREMENT,
  `cod_atributo` INT(11) NOT NULL,
  `cod_personagem` INT(11) NOT NULL,
  PRIMARY KEY (`idt_personagem_atributo`),
  CONSTRAINT `fk_ta_personagem_atributo_tb_personagem1`
    FOREIGN KEY (`cod_personagem`)
    REFERENCES `RPG_unamed`.`tb_personagem` (`idt_personagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_personagem_atributo_td_atributo1`
    FOREIGN KEY (`cod_atributo`)
    REFERENCES `RPG_unamed`.`td_atributo` (`idt_atributo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_ta_personagem_atributo` ON `RPG_unamed`.`ta_personagem_atributo` (`cod_personagem` ASC, `cod_atributo` ASC);

CREATE INDEX `fk_ta_personagem_atributo_td_atributo1_idx` ON `RPG_unamed`.`ta_personagem_atributo` (`cod_atributo` ASC);

CREATE INDEX `fk_ta_personagem_atributo_tb_personagem1_idx` ON `RPG_unamed`.`ta_personagem_atributo` (`cod_personagem` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_linguagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_linguagem` (
  `idt_linguagem` INT(11) NOT NULL AUTO_INCREMENT,
  `nme_linguagem` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idt_linguagem`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `nme_linguagem_UNIQUE` ON `RPG_unamed`.`td_linguagem` (`nme_linguagem` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_personagem_linguagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_personagem_linguagem` (
  `idt_personagem_linguagem` INT(11) NOT NULL AUTO_INCREMENT,
  `cod_linguagem` INT(11) NOT NULL,
  `cod_personagem` INT(11) NOT NULL,
  PRIMARY KEY (`idt_personagem_linguagem`),
  CONSTRAINT `fk_ta_personagem_linguagem_tb_personagem1`
    FOREIGN KEY (`cod_personagem`)
    REFERENCES `RPG_unamed`.`tb_personagem` (`idt_personagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_personagem_linguagem_td_linguagem1`
    FOREIGN KEY (`cod_linguagem`)
    REFERENCES `RPG_unamed`.`td_linguagem` (`idt_linguagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_ta_personagem_linguagem` ON `RPG_unamed`.`ta_personagem_linguagem` (`cod_personagem` ASC, `cod_linguagem` ASC);

CREATE INDEX `fk_ta_personagem_linguagem_td_linguagem1_idx` ON `RPG_unamed`.`ta_personagem_linguagem` (`cod_linguagem` ASC);

CREATE INDEX `fk_ta_personagem_linguagem_tb_personagem1_idx` ON `RPG_unamed`.`ta_personagem_linguagem` (`cod_personagem` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_magia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_magia` (
  `idt_magia` INT(11) NOT NULL AUTO_INCREMENT,
  `nme_magia` VARCHAR(50) NOT NULL,
  `dsc_magia` VARCHAR(200) NOT NULL,
  `tpo_magia` ENUM('A', 'D') NOT NULL,
  `vlr_base_magia` INT(11) NOT NULL,
  PRIMARY KEY (`idt_magia`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `nme_magia_UNIQUE` ON `RPG_unamed`.`td_magia` (`nme_magia` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_personagem_magia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_personagem_magia` (
  `idt_personagem_magia` INT(11) NOT NULL AUTO_INCREMENT,
  `cod_personagem` INT(11) NOT NULL,
  `cod_magia` INT(11) NOT NULL,
  PRIMARY KEY (`idt_personagem_magia`),
  CONSTRAINT `fk_ta_personagem_magia_tb_magia1`
    FOREIGN KEY (`cod_magia`)
    REFERENCES `RPG_unamed`.`td_magia` (`idt_magia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_personagem_magia_tb_personagem1`
    FOREIGN KEY (`cod_personagem`)
    REFERENCES `RPG_unamed`.`tb_personagem` (`idt_personagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_ta_personagem_magia` ON `RPG_unamed`.`ta_personagem_magia` (`cod_personagem` ASC, `cod_magia` ASC);

CREATE INDEX `fk_ta_personagem_magia_tb_personagem1_idx` ON `RPG_unamed`.`ta_personagem_magia` (`cod_personagem` ASC);

CREATE INDEX `fk_ta_personagem_magia_tb_magia1_idx` ON `RPG_unamed`.`ta_personagem_magia` (`cod_magia` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_item` (
  `idt_item` INT(11) NOT NULL,
  `nme_item` VARCHAR(50) NOT NULL,
  `dsc_item` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idt_item`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `nme_item_UNIQUE` ON `RPG_unamed`.`td_item` (`nme_item` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_utilizaveis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_utilizaveis` (
  `idt_inventario` INT(11) NOT NULL AUTO_INCREMENT,
  `cod_personagem` INT(11) NOT NULL,
  `cod_item` INT(11) NOT NULL,
  PRIMARY KEY (`idt_inventario`),
  CONSTRAINT `fk_ta_inventario_tb_item1`
    FOREIGN KEY (`cod_item`)
    REFERENCES `RPG_unamed`.`td_item` (`idt_item`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_inventario_tb_personagem1`
    FOREIGN KEY (`cod_personagem`)
    REFERENCES `RPG_unamed`.`tb_personagem` (`idt_personagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_ta_inventario_tb_personagem1_idx` ON `RPG_unamed`.`ta_utilizaveis` (`cod_personagem` ASC);

CREATE INDEX `fk_ta_inventario_tb_item1_idx` ON `RPG_unamed`.`ta_utilizaveis` (`cod_item` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
