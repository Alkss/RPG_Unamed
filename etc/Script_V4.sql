-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, 
SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

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
  `idt_equipamento` INT NOT NULL AUTO_INCREMENT,
  `nme_equipamento` VARCHAR(50) NOT NULL,
  `dsc_equipamento` VARCHAR(200) NOT NULL,
  `tpo_equipamento` ENUM('A', 'D') NOT NULL,
  `mod_base_equipamento` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`idt_equipamento`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_td_equipamento_nme_equipamento` ON 
`RPG_unamed`.`td_equipamento` (`nme_equipamento` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_alinhamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_alinhamento` (
  `idt_alinhamento` INT NOT NULL AUTO_INCREMENT,
  `nme_alinhamento` VARCHAR(50) NOT NULL,
  `dsc_alinhamento` VARCHAR(350) NOT NULL,
  PRIMARY KEY (`idt_alinhamento`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_td_alinhamento_nme_alinhamento` ON 
`RPG_unamed`.`td_alinhamento` (`nme_alinhamento` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_classe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_classe` (
  `idt_classe` INT NOT NULL AUTO_INCREMENT,
  `nme_classe` VARCHAR(50) NOT NULL,
  `dsc_classe` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idt_classe`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_td_class_nme_classe` ON `RPG_unamed`.`td_classe` 
(`nme_classe` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_raca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_raca` (
  `idt_raca` INT NOT NULL AUTO_INCREMENT,
  `nme_raca` VARCHAR(50) NOT NULL,
  `dsc_raca` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idt_raca`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_td_raca_nme_raca` ON `RPG_unamed`.`td_raca` 
(`nme_raca` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`tb_personagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`tb_personagem` (
  `idt_personagem` INT NOT NULL AUTO_INCREMENT,
  `nme_personagem` VARCHAR(50) NOT NULL,
  `exp_personagem` INT NOT NULL,
  `gen_personagem` VARCHAR(50) NOT NULL,
  `pes_personagem` INT NOT NULL,
  `alt_personagem` DECIMAL(2,1) NOT NULL,
  `dsc_cabelo_personagem` VARCHAR(200) NOT NULL,
  `img_personagem` VARCHAR(150) NOT NULL,
  `cor_olho_personagem` VARCHAR(50) NOT NULL,
  `hst_personagem` TEXT NULL,
  `inf_adicional_personagem` VARCHAR(200) NULL,
  `qtd_dinheiro_personagem` DECIMAL(10,2) NOT NULL,
  `qtd_vida_personagem` INT NOT NULL,
  `cod_alinhamento` INT NOT NULL,
  `cod_classe` INT NOT NULL,
  `cod_raca` INT NOT NULL,
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
  CONSTRAINT `fk_tb_personagem_td_raca1`
    FOREIGN KEY (`cod_raca`)
    REFERENCES `RPG_unamed`.`td_raca` (`idt_raca`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = big5;

CREATE INDEX `fk_tb_personagem_td_alinhamento` ON 
`RPG_unamed`.`tb_personagem` (`cod_alinhamento` ASC);

CREATE INDEX `fk_tb_personagem_td_classe` ON 
`RPG_unamed`.`tb_personagem` (`cod_classe` ASC);

CREATE INDEX `fk_tb_personagem_td_raca` ON `RPG_unamed`.`tb_personagem` 
(`cod_raca` ASC);

CREATE UNIQUE INDEX `uq_tb_personagem_nme_personagem` ON 
`RPG_unamed`.`tb_personagem` (`nme_personagem` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_equipavel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_equipavel` (
  `idt_equipavel` INT NOT NULL AUTO_INCREMENT,
  `cod_equipamento` INT NOT NULL,
  `cod_personagem` INT NOT NULL,
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

CREATE INDEX `fk_ta_equipavel_tb_equipamento` ON 
`RPG_unamed`.`ta_equipavel` (`cod_equipamento` ASC);

CREATE INDEX `fk_ta_equipavel_tb_personagem` ON 
`RPG_unamed`.`ta_equipavel` (`cod_personagem` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`tb_sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`tb_sala` (
  `idt_sala` INT NOT NULL AUTO_INCREMENT,
  `nme_sala` VARCHAR(50) NOT NULL,
  `dta_criacao_sala` DATETIME NOT NULL,
  `dta_ultima_atividade_sala` DATETIME NOT NULL,
  `hst_campanha_sala` TEXT NULL DEFAULT NULL,
  `pwd_sala` VARCHAR(128) NULL DEFAULT NULL,
  `qtd_players_sala` INT NOT NULL,
  PRIMARY KEY (`idt_sala`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_tb_sala_nme_sala` ON `RPG_unamed`.`tb_sala` 
(`nme_sala` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_tipo_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_tipo_perfil` (
  `idt_tipo_perfil` INT NOT NULL,
  `nme_tipo_perfil` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idt_tipo_perfil`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_td_tipo_perfil_nme_tipo_perfil_UNIQUE` ON 
`RPG_unamed`.`td_tipo_perfil` (`nme_tipo_perfil` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`tb_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`tb_usuario` (
  `idt_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nme_usuario` VARCHAR(50) NOT NULL,
  `lgn_usuario` VARCHAR(30) NOT NULL,
  `pwd_usuario` VARCHAR(128) NOT NULL,
  `eml_usuario` VARCHAR(50) NOT NULL,
  `atv_usuario` INT NOT NULL COMMENT 'A = Ativo\nI = Inativo',
  `dta_criacao_usuario` DATETIME NOT NULL,
  `cod_perfil` INT NOT NULL,
  PRIMARY KEY (`idt_usuario`),
  CONSTRAINT `fk_tb_usuario_td_tipo_perfil1`
    FOREIGN KEY (`cod_perfil`)
    REFERENCES `RPG_unamed`.`td_tipo_perfil` (`idt_tipo_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 16
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_tb_usuario_eml_usuario` ON 
`RPG_unamed`.`tb_usuario` (`eml_usuario` ASC);

CREATE INDEX `fk_tb_usuario_td_tipo_perfil` ON `RPG_unamed`.`tb_usuario` 
(`cod_perfil` ASC);

CREATE UNIQUE INDEX `uq_tb_usuario_lgn_usuario` ON 
`RPG_unamed`.`tb_usuario` (`lgn_usuario` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_papel_sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_papel_sala` (
  `idt_papel_sala` INT NOT NULL AUTO_INCREMENT,
  `nme_papel_sala` VARCHAR(50) NOT NULL,
  `dsc_papel_sala` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idt_papel_sala`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_td_papel_sala_nme_papel_sala` ON 
`RPG_unamed`.`td_papel_sala` (`nme_papel_sala` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_perfil_sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_perfil_sala` (
  `idt_perfil_sala` INT NOT NULL AUTO_INCREMENT,
  `cod_usuario` INT NOT NULL,
  `cod_personagem` INT NULL DEFAULT NULL,
  `cod_papel_sala` INT NOT NULL,
  `cod_sala` INT NOT NULL,
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

CREATE UNIQUE INDEX 
`uq_ta_perfil_sala_cod_usuario_cod_personagem_cod_sala` ON 
`RPG_unamed`.`ta_perfil_sala` (`cod_usuario` ASC, `cod_sala` ASC, 
`cod_personagem` ASC);

CREATE INDEX `fk_ta_perfil_sala_tb_usuario` ON 
`RPG_unamed`.`ta_perfil_sala` (`cod_usuario` ASC);

CREATE INDEX `fk_ta_perfil_sala_tb_personagem` ON 
`RPG_unamed`.`ta_perfil_sala` (`cod_personagem` ASC);

CREATE INDEX `fk_ta_perfil_sala_td_papel_sala` ON 
`RPG_unamed`.`ta_perfil_sala` (`cod_papel_sala` ASC);

CREATE INDEX `fk_ta_perfil_sala_tb_sala` ON 
`RPG_unamed`.`ta_perfil_sala` (`cod_sala` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_atributo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_atributo` (
  `idt_atributo` INT NOT NULL,
  `nme_atributo` VARCHAR(50) NOT NULL,
  `val_atributo` INT NOT NULL,
  PRIMARY KEY (`idt_atributo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_td_atributo_nme_atributo` ON 
`RPG_unamed`.`td_atributo` (`nme_atributo` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_personagem_atributo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_personagem_atributo` (
  `idt_personagem_atributo` INT NOT NULL AUTO_INCREMENT,
  `cod_atributo` INT NOT NULL,
  `cod_personagem` INT NOT NULL,
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

CREATE UNIQUE INDEX 
`uq_ta_personagem_atributo_cod_atributo_cod_personagem` ON 
`RPG_unamed`.`ta_personagem_atributo` (`cod_personagem` ASC, 
`cod_atributo` ASC);

CREATE INDEX `fk_ta_personagem_atributo_td_atributo` ON 
`RPG_unamed`.`ta_personagem_atributo` (`cod_atributo` ASC);

CREATE INDEX `fk_ta_personagem_atributo_tb_personagem` ON 
`RPG_unamed`.`ta_personagem_atributo` (`cod_personagem` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_linguagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_linguagem` (
  `idt_linguagem` INT NOT NULL AUTO_INCREMENT,
  `nme_linguagem` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idt_linguagem`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_td_linguagem_nme_linguagem` ON 
`RPG_unamed`.`td_linguagem` (`nme_linguagem` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_personagem_linguagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_personagem_linguagem` (
  `idt_personagem_linguagem` INT NOT NULL,
  `cod_linguagem` INT NOT NULL,
  `cod_personagem` INT NOT NULL,
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

CREATE UNIQUE INDEX `uq_ta_personagem_linguagem` ON 
`RPG_unamed`.`ta_personagem_linguagem` (`cod_personagem` ASC, 
`cod_linguagem` ASC);

CREATE INDEX `fk_ta_personagem_linguagem_td_linguagem` ON 
`RPG_unamed`.`ta_personagem_linguagem` (`cod_linguagem` ASC);

CREATE INDEX `fk_ta_personagem_linguagem_tb_personagem` ON 
`RPG_unamed`.`ta_personagem_linguagem` (`cod_personagem` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_magia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_magia` (
  `idt_magia` INT NOT NULL AUTO_INCREMENT,
  `nme_magia` VARCHAR(50) NOT NULL,
  `dsc_magia` VARCHAR(200) NOT NULL,
  `tpo_magia` ENUM('A', 'D') NOT NULL,
  `mod_base_magia` VARCHAR(25) NOT NULL,
  PRIMARY KEY (`idt_magia`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_td_magia_nme_magia` ON `RPG_unamed`.`td_magia` 
(`nme_magia` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_personagem_magia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_personagem_magia` (
  `idt_personagem_magia` INT NOT NULL AUTO_INCREMENT,
  `cod_personagem` INT NOT NULL,
  `cod_magia` INT NOT NULL,
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

CREATE UNIQUE INDEX `uq_ta_personagem_magia_cod_personagem_cod_magia` ON 
`RPG_unamed`.`ta_personagem_magia` (`cod_personagem` ASC, `cod_magia` 
ASC);

CREATE INDEX `fk_ta_personagem_magia_tb_personagem` ON 
`RPG_unamed`.`ta_personagem_magia` (`cod_personagem` ASC);

CREATE INDEX `fk_ta_personagem_magia_tb_magia` ON 
`RPG_unamed`.`ta_personagem_magia` (`cod_magia` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_item` (
  `idt_item` INT NOT NULL,
  `nme_item` VARCHAR(50) NOT NULL,
  `dsc_item` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idt_item`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `uq_td_item_nme_item` ON `RPG_unamed`.`td_item` 
(`nme_item` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_utilizaveis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_utilizaveis` (
  `idt_inventario` INT NOT NULL,
  `cod_personagem` INT NOT NULL,
  `cod_item` INT NOT NULL,
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

CREATE INDEX `fk_ta_inventario_tb_personagem` ON 
`RPG_unamed`.`ta_utilizaveis` (`cod_personagem` ASC);

CREATE INDEX `fk_ta_inventario_tb_item` ON `RPG_unamed`.`ta_utilizaveis` 
(`cod_item` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_divindade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_divindade` (
  `idt_divindade` INT NOT NULL AUTO_INCREMENT,
  `nme_divindade` VARCHAR(50) NOT NULL,
  `dsc_divindade` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idt_divindade`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `uq_td_divindade_nme_divindade` ON 
`RPG_unamed`.`td_divindade` (`nme_divindade` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_culto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_culto` (
  `idt_culto` INT NOT NULL AUTO_INCREMENT,
  `cod_divindade` INT NOT NULL,
  `cod_personagem` INT NOT NULL,
  PRIMARY KEY (`idt_culto`),
  CONSTRAINT `fk_ta_culto_td_divindade1`
    FOREIGN KEY (`cod_divindade`)
    REFERENCES `RPG_unamed`.`td_divindade` (`idt_divindade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_culto_tb_personagem1`
    FOREIGN KEY (`cod_personagem`)
    REFERENCES `RPG_unamed`.`tb_personagem` (`idt_personagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_ta_culto_td_divindade` ON `RPG_unamed`.`ta_culto` 
(`cod_divindade` ASC);

CREATE INDEX `fk_ta_culto_tb_personagem` ON `RPG_unamed`.`ta_culto` 
(`cod_personagem` ASC);

CREATE UNIQUE INDEX `uq_ta_culto_cod_divindade_cod_personagem` ON 
`RPG_unamed`.`ta_culto` (`cod_divindade` ASC, `cod_personagem` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_pericia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_pericia` (
  `idt_pericia` INT NOT NULL AUTO_INCREMENT,
  `nme_pericia` VARCHAR(50) NOT NULL,
  `dsc_pericia` VARCHAR(250) NOT NULL,
  `vlr_base_pericia` INT NOT NULL,
  PRIMARY KEY (`idt_pericia`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `uq_td_pericia_nme_pericia` ON 
`RPG_unamed`.`td_pericia` (`nme_pericia` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_aptidao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_aptidao` (
  `idt_aptidao` INT NOT NULL AUTO_INCREMENT,
  `cod_personagem` INT NOT NULL,
  `cod_pericia` INT NOT NULL,
  PRIMARY KEY (`idt_aptidao`),
  CONSTRAINT `fk_ta_aptidao_tb_personagem1`
    FOREIGN KEY (`cod_personagem`)
    REFERENCES `RPG_unamed`.`tb_personagem` (`idt_personagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_aptidao_td_pericia1`
    FOREIGN KEY (`cod_pericia`)
    REFERENCES `RPG_unamed`.`td_pericia` (`idt_pericia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_ta_aptidao_tb_personagem` ON `RPG_unamed`.`ta_aptidao` 
(`cod_personagem` ASC);

CREATE INDEX `fk_ta_aptidao_td_pericia` ON `RPG_unamed`.`ta_aptidao` 
(`cod_pericia` ASC);

CREATE UNIQUE INDEX `uq_tb_personagem_cod_personagem_cod_pericia` ON 
`RPG_unamed`.`ta_aptidao` (`cod_personagem` ASC, `cod_pericia` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`tb_custom`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`tb_custom` (
  `idt_custom` INT NOT NULL AUTO_INCREMENT,
  `nme_custom` VARCHAR(50) NOT NULL,
  `dsc_custom` VARCHAR(45) NOT NULL,
  `tpo_custom` ENUM('E', 'M', 'I') NOT NULL,
  `cod_sala` INT NOT NULL,
  PRIMARY KEY (`idt_custom`),
  CONSTRAINT `fk_tb_custom_tb_sala1`
    FOREIGN KEY (`cod_sala`)
    REFERENCES `RPG_unamed`.`tb_sala` (`idt_sala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tb_custom_tb_sala1_idx` ON `RPG_unamed`.`tb_custom` 
(`cod_sala` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_personalizavel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_personalizavel` (
  `idt_personalizavel` INT NOT NULL AUTO_INCREMENT,
  `cod_custom` INT NOT NULL,
  `cod_personagem` INT NULL,
  PRIMARY KEY (`idt_personalizavel`),
  CONSTRAINT `fk_ta_personalizavel_tb_custom1`
    FOREIGN KEY (`cod_custom`)
    REFERENCES `RPG_unamed`.`tb_custom` (`idt_custom`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_personalizavel_tb_personagem1`
    FOREIGN KEY (`cod_personagem`)
    REFERENCES `RPG_unamed`.`tb_personagem` (`idt_personagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_ta_personalizavel_tb_custom` ON 
`RPG_unamed`.`ta_personalizavel` (`cod_custom` ASC);

CREATE INDEX `fk_ta_personalizavel_tb_personagem` ON 
`RPG_unamed`.`ta_personalizavel` (`cod_personagem` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

