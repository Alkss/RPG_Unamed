-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_religiao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_religiao` (
  `idt_religiao` INT NOT NULL AUTO_INCREMENT,
  `nme_religiao` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idt_religiao`))
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_cor_olho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_cor_olho` (
  `idt_cor_olho` INT NOT NULL AUTO_INCREMENT,
  `nme_cor_olho` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idt_cor_olho`))
ENGINE = InnoDB;
-- DROPS ------------------------------------------------
DROP TABLE ta_papel_previlegio;
DROP TABLE ta_perfil_previlegio;
DROP TABLE td_previlegio;


-- Alteracoes em colunas --------------------------------
ALTER TABLE tb_personagem ADD COLUMN  `cod_religiao` INT NOT NULL;
ALTER TABLE tb_personagem ADD COLUMN  `cod_cor_olho` INT NOT NULL;
ALTER TABLE tb_personagem ADD CONSTRAINT `fk_tb_personagem_td_religiao1` FOREIGN KEY (`cod_religiao`) REFERENCES `RPG_unamed`.`td_religiao` (`idt_religiao`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE tb_personagem ADD CONSTRAINT `fk_tb_personagem_td_cor_olho1` FOREIGN KEY (`cod_cor_olho`) REFERENCES `RPG_unamed`.`td_cor_olho` (`idt_cor_olho`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE ta_perfil_sala ADD COLUMN `vlr_disponivel_perfil` INT NOT NULL;
ALTER TABLE ta_perfil_sala modify column `cod_personagem` INT;
ALTER TABLE tb_sala ADD COLUMN `vlr_dinheiro_sala` INT NOT NULL;
ALTER TABLE td_alinhamento modify column `dsc_alinhamento` VARCHAR(350) NOT NULL;
ALTER TABLE tb_personagem DROP column `rel_personagem`;
ALTER TABLE tb_personagem DROP column `cor_olhos_personagem`;
-- Indexes
CREATE UNIQUE INDEX `eml_usuario_UNIQUE` ON `RPG_unamed`.`tb_usuario` (`eml_usuario` ASC);
CREATE UNIQUE INDEX `nme_raca_UNIQUE` ON `RPG_unamed`.`td_raca` (`nme_raca` ASC);
CREATE UNIQUE INDEX `nme_classe_UNIQUE` ON `RPG_unamed`.`td_classe` (`nme_classe` ASC);
CREATE UNIQUE INDEX `nme_cor_olho_UNIQUE` ON `RPG_unamed`.`td_cor_olho` (`nme_cor_olho` ASC);
CREATE UNIQUE INDEX `nme_religiao_UNIQUE` ON `RPG_unamed`.`td_religiao` (`nme_religiao` ASC);
CREATE UNIQUE INDEX `nme_papel_sala_UNIQUE` ON `RPG_unamed`.`td_papel_sala` (`nme_papel_sala` ASC);
CREATE UNIQUE INDEX `nme_magia_UNIQUE` ON `RPG_unamed`.`td_magia` (`nme_magia` ASC);
CREATE UNIQUE INDEX `nme_atributo_UNIQUE` ON `RPG_unamed`.`td_atributo` (`nme_atributo` ASC);
CREATE UNIQUE INDEX `nme_linguagem_UNIQUE` ON `RPG_unamed`.`td_linguagem` (`nme_linguagem` ASC);
CREATE UNIQUE INDEX `nme_item_UNIQUE` ON `RPG_unamed`.`td_item` (`nme_item` ASC);
CREATE UNIQUE INDEX `nme_equipamento_UNIQUE` ON `RPG_unamed`.`td_equipamento` (`nme_equipamento` ASC);
CREATE UNIQUE INDEX `uq_ta_personagem_magia` ON `RPG_unamed`.`ta_personagem_magia` (`cod_personagem` ASC, `cod_magia` ASC);
CREATE UNIQUE INDEX `uq_ta_personagem_atributo` ON `RPG_unamed`.`ta_personagem_atributo` (`cod_personagem` ASC, `cod_atributo` ASC);
CREATE UNIQUE INDEX `uq_ta_personagem_linguagem` ON `RPG_unamed`.`ta_personagem_linguagem` (`cod_personagem` ASC, `cod_linguagem` ASC);
CREATE INDEX `fk_tb_personagem_td_cor_olho1_idx` ON `RPG_unamed`.`tb_personagem` (`cod_cor_olho` ASC);
CREATE INDEX `fk_tb_personagem_td_religiao1_idx` ON `RPG_unamed`.`tb_personagem` (`cod_religiao` ASC);
