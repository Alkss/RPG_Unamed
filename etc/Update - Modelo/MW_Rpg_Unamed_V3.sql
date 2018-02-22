CREATE SCHEMA IF NOT EXISTS `RPG_unamed` DEFAULT CHARACTER SET utf8 ;
USE `RPG_unamed` ;

-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_tipo_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_tipo_perfil` (
  `idt_tipo_perfil` INT NOT NULL AUTO_INCREMENT,
  `nme_tipo_perfil` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idt_tipo_perfil`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `nme_tipo_perfil_UNIQUE` ON `RPG_unamed`.`td_tipo_perfil` (`nme_tipo_perfil` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`tb_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`tb_usuario` (
  `idt_usuario` INT NOT NULL AUTO_INCREMENT,
  `nme_usuario` VARCHAR(50) NOT NULL,
  `lgn_usuario` VARCHAR(30) NOT NULL,
  `pwd_usuario` VARCHAR(128) NOT NULL,
  `eml_usuario` VARCHAR(50) NOT NULL,
  `cod_perfil` INT NOT NULL,
  `atv_usuario` TINYINT(1) NOT NULL COMMENT 'A = Ativo\nI = Inativo',
  PRIMARY KEY (`idt_usuario`),
  CONSTRAINT `fk_tb_usuario_td_tipo_perfil1`
    FOREIGN KEY (`cod_perfil`)
    REFERENCES `RPG_unamed`.`td_tipo_perfil` (`idt_tipo_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_tb_usuario_td_tipo_perfil1_idx` ON `RPG_unamed`.`tb_usuario` (`cod_perfil` ASC);

CREATE UNIQUE INDEX `lgn_usuario_UNIQUE` ON `RPG_unamed`.`tb_usuario` (`lgn_usuario` ASC);

CREATE UNIQUE INDEX `eml_usuario_UNIQUE` ON `RPG_unamed`.`tb_usuario` (`eml_usuario` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_alinhamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_alinhamento` (
  `idt_alinhamento` INT NOT NULL AUTO_INCREMENT,
  `dsc_alinhamento` VARCHAR(350) NOT NULL,
  `nme_alinhamento` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idt_alinhamento`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `nme_alinhamento_UNIQUE` ON `RPG_unamed`.`td_alinhamento` (`nme_alinhamento` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_raca`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_raca` (
  `idt_raca` INT NOT NULL,
  `nme_raca` VARCHAR(50) NOT NULL,
  `dsc_raca` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idt_raca`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `nme_raca_UNIQUE` ON `RPG_unamed`.`td_raca` (`nme_raca` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_classe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_classe` (
  `idt_classe` INT NOT NULL AUTO_INCREMENT,
  `nme_classe` VARCHAR(50) NOT NULL,
  `dsc_classe` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idt_classe`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `nme_classe_UNIQUE` ON `RPG_unamed`.`td_classe` (`nme_classe` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_cor_olho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_cor_olho` (
  `idt_cor_olho` INT NOT NULL AUTO_INCREMENT,
  `nme_cor_olho` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idt_cor_olho`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `nme_cor_olho_UNIQUE` ON `RPG_unamed`.`td_cor_olho` (`nme_cor_olho` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_religiao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_religiao` (
  `idt_religiao` INT NOT NULL AUTO_INCREMENT,
  `nme_religiao` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idt_religiao`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `nme_religiao_UNIQUE` ON `RPG_unamed`.`td_religiao` (`nme_religiao` ASC);


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
  `img_personagem` VARCHAR(50) NOT NULL,
  `hst_personagem` TEXT NULL,
  `inf_adicional_personagem` VARCHAR(200) NULL,
  `cod_alinhamento` INT NOT NULL,
  `cod_raca` INT NOT NULL,
  `cod_classe` INT NOT NULL,
  `cod_cor_olho` INT NOT NULL,
  `cod_religiao` INT NOT NULL,
  PRIMARY KEY (`idt_personagem`),
  CONSTRAINT `fk_tb_personagem_td_alinhamento1`
    FOREIGN KEY (`cod_alinhamento`)
    REFERENCES `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_personagem_td_raca1`
    FOREIGN KEY (`cod_raca`)
    REFERENCES `RPG_unamed`.`td_raca` (`idt_raca`)
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
  CONSTRAINT `fk_tb_personagem_td_religiao1`
    FOREIGN KEY (`cod_religiao`)
    REFERENCES `RPG_unamed`.`td_religiao` (`idt_religiao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = big5;

CREATE INDEX `fk_tb_personagem_td_alinhamento1_idx` ON `RPG_unamed`.`tb_personagem` (`cod_alinhamento` ASC);

CREATE INDEX `fk_tb_personagem_td_raca1_idx` ON `RPG_unamed`.`tb_personagem` (`cod_raca` ASC);

CREATE INDEX `fk_tb_personagem_td_classe1_idx` ON `RPG_unamed`.`tb_personagem` (`cod_classe` ASC);

CREATE INDEX `fk_tb_personagem_td_cor_olho1_idx` ON `RPG_unamed`.`tb_personagem` (`cod_cor_olho` ASC);

CREATE INDEX `fk_tb_personagem_td_religiao1_idx` ON `RPG_unamed`.`tb_personagem` (`cod_religiao` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_papel_sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_papel_sala` (
  `idt_papel_sala` INT NOT NULL AUTO_INCREMENT,
  `nme_papel_sala` VARCHAR(50) NOT NULL,
  `dsc_papel_sala` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idt_papel_sala`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `nme_papel_sala_UNIQUE` ON `RPG_unamed`.`td_papel_sala` (`nme_papel_sala` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`tb_sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`tb_sala` (
  `idt_sala` INT NOT NULL AUTO_INCREMENT,
  `nme_sala` VARCHAR(50) NOT NULL,
  `dta_criacao_sala` DATETIME NOT NULL,
  `dta_ultima_atividade_sala` DATETIME NOT NULL,
  `hst_campanha_sala` TEXT NULL,
  `pwd_sala` VARCHAR(128) NULL,
  `qtd_players_sala` INT NOT NULL,
  `vlr_dinheiro_sala` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idt_sala`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `nme_sala_UNIQUE` ON `RPG_unamed`.`tb_sala` (`nme_sala` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_perfil_sala`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_perfil_sala` (
  `idt_perfil_sala` INT NOT NULL AUTO_INCREMENT,
  `cod_usuario` INT NOT NULL,
  `cod_personagem` INT,
  `cod_papel_sala` INT NOT NULL,
  `cod_sala` INT NOT NULL,
  `vlr_disponivel_perfil` INT NOT NULL,
  PRIMARY KEY (`idt_perfil_sala`),
  CONSTRAINT `fk_ta_perfil_sala_tb_usuario1`
    FOREIGN KEY (`cod_usuario`)
    REFERENCES `RPG_unamed`.`tb_usuario` (`idt_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_perfil_sala_tb_personagem1`
    FOREIGN KEY (`cod_personagem`)
    REFERENCES `RPG_unamed`.`tb_personagem` (`idt_personagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_perfil_sala_td_papel_sala1`
    FOREIGN KEY (`cod_papel_sala`)
    REFERENCES `RPG_unamed`.`td_papel_sala` (`idt_papel_sala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_perfil_sala_tb_sala1`
    FOREIGN KEY (`cod_sala`)
    REFERENCES `RPG_unamed`.`tb_sala` (`idt_sala`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_ta_perfil_sala_tb_usuario1_idx` ON `RPG_unamed`.`ta_perfil_sala` (`cod_usuario` ASC);

CREATE INDEX `fk_ta_perfil_sala_tb_personagem1_idx` ON `RPG_unamed`.`ta_perfil_sala` (`cod_personagem` ASC);

CREATE INDEX `fk_ta_perfil_sala_td_papel_sala1_idx` ON `RPG_unamed`.`ta_perfil_sala` (`cod_papel_sala` ASC);

CREATE INDEX `fk_ta_perfil_sala_tb_sala1_idx` ON `RPG_unamed`.`ta_perfil_sala` (`cod_sala` ASC);

CREATE UNIQUE INDEX `uq_cod_usuario_sala` ON `RPG_unamed`.`ta_perfil_sala` (`cod_usuario` ASC, `cod_sala` ASC, `cod_personagem` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_magia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_magia` (
  `idt_magia` INT NOT NULL AUTO_INCREMENT,
  `nme_magia` VARCHAR(50) NOT NULL,
  `dsc_magia` VARCHAR(200) NOT NULL,
  `tpo_magia` ENUM('A', 'D') NOT NULL,
  `vlr_base_magia` INT NOT NULL,
  PRIMARY KEY (`idt_magia`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `nme_magia_UNIQUE` ON `RPG_unamed`.`td_magia` (`nme_magia` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_atributo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_atributo` (
  `idt_atributo` INT NOT NULL,
  `nme_atributo` VARCHAR(50) NOT NULL,
  `val_atributo` INT NOT NULL,
  PRIMARY KEY (`idt_atributo`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `nme_atributo_UNIQUE` ON `RPG_unamed`.`td_atributo` (`nme_atributo` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_linguagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_linguagem` (
  `idt_linguagem` INT NOT NULL AUTO_INCREMENT,
  `nme_linguagem` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idt_linguagem`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `nme_linguagem_UNIQUE` ON `RPG_unamed`.`td_linguagem` (`nme_linguagem` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_item` (
  `idt_item` INT NOT NULL,
  `nme_item` VARCHAR(50) NOT NULL,
  `prc_item` INT NULL,
  `dsc_item` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idt_item`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `nme_item_UNIQUE` ON `RPG_unamed`.`td_item` (`nme_item` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_utilizaveis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_utilizaveis` (
  `idt_inventario` INT NOT NULL AUTO_INCREMENT,
  `cod_personagem` INT NOT NULL,
  `cod_item` INT NOT NULL,
  PRIMARY KEY (`idt_inventario`),
  CONSTRAINT `fk_ta_inventario_tb_personagem1`
    FOREIGN KEY (`cod_personagem`)
    REFERENCES `RPG_unamed`.`tb_personagem` (`idt_personagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_inventario_tb_item1`
    FOREIGN KEY (`cod_item`)
    REFERENCES `RPG_unamed`.`td_item` (`idt_item`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_ta_inventario_tb_personagem1_idx` ON `RPG_unamed`.`ta_utilizaveis` (`cod_personagem` ASC);

CREATE INDEX `fk_ta_inventario_tb_item1_idx` ON `RPG_unamed`.`ta_utilizaveis` (`cod_item` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`td_equipamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`td_equipamento` (
  `idt_equipamento` INT NOT NULL AUTO_INCREMENT,
  `nme_equipamento` VARCHAR(50) NOT NULL,
  `prc_equipamento` INT NULL,
  `dsc_equipamento` VARCHAR(200) NOT NULL,
  `tpo_equipamento` ENUM('A', 'D') NOT NULL,
  `vlr_base_equipamento` INT NOT NULL,
  PRIMARY KEY (`idt_equipamento`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `nme_equipamento_UNIQUE` ON `RPG_unamed`.`td_equipamento` (`nme_equipamento` ASC);


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
ENGINE = InnoDB;

CREATE INDEX `fk_ta_equipavel_tb_equipamento1_idx` ON `RPG_unamed`.`ta_equipavel` (`cod_equipamento` ASC);

CREATE INDEX `fk_ta_equipavel_tb_personagem1_idx` ON `RPG_unamed`.`ta_equipavel` (`cod_personagem` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_personagem_magia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_personagem_magia` (
  `idt_personagem_magia` INT NOT NULL AUTO_INCREMENT,
  `cod_personagem` INT NOT NULL,
  `cod_magia` INT NOT NULL,
  PRIMARY KEY (`idt_personagem_magia`),
  CONSTRAINT `fk_ta_personagem_magia_tb_personagem1`
    FOREIGN KEY (`cod_personagem`)
    REFERENCES `RPG_unamed`.`tb_personagem` (`idt_personagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_personagem_magia_tb_magia1`
    FOREIGN KEY (`cod_magia`)
    REFERENCES `RPG_unamed`.`td_magia` (`idt_magia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_ta_personagem_magia_tb_personagem1_idx` ON `RPG_unamed`.`ta_personagem_magia` (`cod_personagem` ASC);

CREATE INDEX `fk_ta_personagem_magia_tb_magia1_idx` ON `RPG_unamed`.`ta_personagem_magia` (`cod_magia` ASC);

CREATE UNIQUE INDEX `uq_ta_personagem_magia` ON `RPG_unamed`.`ta_personagem_magia` (`cod_personagem` ASC, `cod_magia` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_personagem_atributo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_personagem_atributo` (
  `idt_personagem_atributo` INT NOT NULL AUTO_INCREMENT,
  `cod_atributo` INT NOT NULL,
  `cod_personagem` INT NOT NULL,
  PRIMARY KEY (`idt_personagem_atributo`),
  CONSTRAINT `fk_ta_personagem_atributo_td_atributo1`
    FOREIGN KEY (`cod_atributo`)
    REFERENCES `RPG_unamed`.`td_atributo` (`idt_atributo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_personagem_atributo_tb_personagem1`
    FOREIGN KEY (`cod_personagem`)
    REFERENCES `RPG_unamed`.`tb_personagem` (`idt_personagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_ta_personagem_atributo_td_atributo1_idx` ON `RPG_unamed`.`ta_personagem_atributo` (`cod_atributo` ASC);

CREATE INDEX `fk_ta_personagem_atributo_tb_personagem1_idx` ON `RPG_unamed`.`ta_personagem_atributo` (`cod_personagem` ASC);

CREATE UNIQUE INDEX `uq_ta_personagem_atributo` ON `RPG_unamed`.`ta_personagem_atributo` (`cod_personagem` ASC, `cod_atributo` ASC);


-- -----------------------------------------------------
-- Table `RPG_unamed`.`ta_personagem_linguagem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `RPG_unamed`.`ta_personagem_linguagem` (
  `idt_personagem_linguagem` INT NOT NULL AUTO_INCREMENT,
  `cod_linguagem` INT NOT NULL,
  `cod_personagem` INT NOT NULL,
  PRIMARY KEY (`idt_personagem_linguagem`),
  CONSTRAINT `fk_ta_personagem_linguagem_td_linguagem1`
    FOREIGN KEY (`cod_linguagem`)
    REFERENCES `RPG_unamed`.`td_linguagem` (`idt_linguagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ta_personagem_linguagem_tb_personagem1`
    FOREIGN KEY (`cod_personagem`)
    REFERENCES `RPG_unamed`.`tb_personagem` (`idt_personagem`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_ta_personagem_linguagem_td_linguagem1_idx` ON `RPG_unamed`.`ta_personagem_linguagem` (`cod_linguagem` ASC);

CREATE INDEX `fk_ta_personagem_linguagem_tb_personagem1_idx` ON `RPG_unamed`.`ta_personagem_linguagem` (`cod_personagem` ASC);

CREATE UNIQUE INDEX `uq_ta_personagem_linguagem` ON `RPG_unamed`.`ta_personagem_linguagem` (`cod_personagem` ASC, `cod_linguagem` ASC);

-- -----------------------------------------------------
-- Data for table `RPG_unamed`.`td_tipo_perfil`
-- -----------------------------------------------------
START TRANSACTION;
USE `RPG_unamed`;
INSERT INTO `RPG_unamed`.`td_tipo_perfil` (`idt_tipo_perfil`, `nme_tipo_perfil`) VALUES (1, 'admin');
INSERT INTO `RPG_unamed`.`td_tipo_perfil` (`idt_tipo_perfil`, `nme_tipo_perfil`) VALUES (2, 'usr');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RPG_unamed`.`td_alinhamento`
-- -----------------------------------------------------
START TRANSACTION;
USE `RPG_unamed`;
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (1, 'Os personagem leais e bons possuem um código moral muito parecido com o personagens bons, mas possuem uma crença muito forte nas leis, acreditando que elas são feitas para tornar uma sociedade mais justa.', 'Leal e Bom/ordeiro');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (2, 'São chamados de Benfeitores, é uma pessoa altruísta e que segue o que acredita ser o bem, baseado em sua consciência', 'Bom/neutro');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (3, 'São pessoas de alma livre, vivem intensamente e raramente abdicam do que gostam por conta de leis e regulamentos.', 'Bom/caótico');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (4, 'São chamados de juízes, seguem as leis e por vezes tratam pessoas que cometem um crime da mesma maneira, independente das circunstâncias em que eles foram cometidos.', 'Ordeiro/neutro');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (5, 'São conhecidos por “indecisos”. Ficam em cima do muro em todo o tipo de conflito, podem pender por um lado ou outro', 'Neutro/neutro');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (6, 'São notórios anarquistas, vivem o modo de vida que escolheram não importando a quem isto incomode.', 'Caótico/neutro');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (7, 'São repressores em nome da lei, ditadores tiranos e qualquer outro tipo de vilão que segue códigos de honra ou obedecem superiores, mesmo que suas ordens sejam o extermínio de inocentes.', 'Ordeiro e Maligno');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (8, 'São egoístas. Não importa se milhares morrerem, eles querem algo e irão até as últimas consequências para conseguir', 'Neutro e maligno');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (9, 'São criaturas que se divertem com o sofrimento dos outros e na ruína das sociedades.', 'Caótico e maligno');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RPG_unamed`.`td_raca`
-- -----------------------------------------------------
START TRANSACTION;
USE `RPG_unamed`;
INSERT INTO `RPG_unamed`.`td_raca` (`idt_raca`, `nme_raca`, `dsc_raca`) VALUES (1, 'Humano', 'Ser comum do planeta Terra');
INSERT INTO `RPG_unamed`.`td_raca` (`idt_raca`, `nme_raca`, `dsc_raca`) VALUES (2, 'Elfo', 'Tende a viver em florestas e em bando');
INSERT INTO `RPG_unamed`.`td_raca` (`idt_raca`, `nme_raca`, `dsc_raca`) VALUES (3, 'Ogro', 'Monstro maligno que se alimenta de crianças');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RPG_unamed`.`td_classe`
-- -----------------------------------------------------
START TRANSACTION;
USE `RPG_unamed`;
INSERT INTO `RPG_unamed`.`td_classe` (`idt_classe`, `nme_classe`, `dsc_classe`) VALUES (1, 'Paladino', 'Um cavaleiro bondoso e com pura coragem');
INSERT INTO `RPG_unamed`.`td_classe` (`idt_classe`, `nme_classe`, `dsc_classe`) VALUES (2, 'Mago', 'Perito em magias');
INSERT INTO `RPG_unamed`.`td_classe` (`idt_classe`, `nme_classe`, `dsc_classe`) VALUES (3, 'Plebeu', 'Ser comum, vive em cidade e tende e pode ser escravo de seres nobres');
INSERT INTO `RPG_unamed`.`td_classe` (`idt_classe`, `nme_classe`, `dsc_classe`) VALUES (4, 'Monstro', 'Critaturas despresíveis, vivem na escuridão');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RPG_unamed`.`td_cor_olho`
-- -----------------------------------------------------
START TRANSACTION;
USE `RPG_unamed`;
INSERT INTO `RPG_unamed`.`td_cor_olho` (`idt_cor_olho`, `nme_cor_olho`) VALUES (1, 'Azul');
INSERT INTO `RPG_unamed`.`td_cor_olho` (`idt_cor_olho`, `nme_cor_olho`) VALUES (2, 'Vermelho');
INSERT INTO `RPG_unamed`.`td_cor_olho` (`idt_cor_olho`, `nme_cor_olho`) VALUES (3, 'Verde');
INSERT INTO `RPG_unamed`.`td_cor_olho` (`idt_cor_olho`, `nme_cor_olho`) VALUES (4, 'Castanho');
INSERT INTO `RPG_unamed`.`td_cor_olho` (`idt_cor_olho`, `nme_cor_olho`) VALUES (5, 'Preto');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RPG_unamed`.`td_religiao`
-- -----------------------------------------------------
START TRANSACTION;
USE `RPG_unamed`;
INSERT INTO `RPG_unamed`.`td_religiao` (`idt_religiao`, `nme_religiao`) VALUES (1, 'Catholic');
INSERT INTO `RPG_unamed`.`td_religiao` (`idt_religiao`, `nme_religiao`) VALUES (2, 'Atheist');
INSERT INTO `RPG_unamed`.`td_religiao` (`idt_religiao`, `nme_religiao`) VALUES (3, 'Xamã');
INSERT INTO `RPG_unamed`.`td_religiao` (`idt_religiao`, `nme_religiao`) VALUES (4, 'Satanist');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RPG_unamed`.`td_papel_sala`
-- -----------------------------------------------------
START TRANSACTION;
USE `RPG_unamed`;
INSERT INTO `RPG_unamed`.`td_papel_sala` (`idt_papel_sala`, `nme_papel_sala`, `dsc_papel_sala`) VALUES (1, 'Dono', 'Dono e Moderador da sala, responsável por gerenciar papeis e funções dentro de uma sala');
INSERT INTO `RPG_unamed`.`td_papel_sala` (`idt_papel_sala`, `nme_papel_sala`, `dsc_papel_sala`) VALUES (2, 'Mestre', 'Mestre da campanha à ser jogada, gerencia história e jogadores');
INSERT INTO `RPG_unamed`.`td_papel_sala` (`idt_papel_sala`, `nme_papel_sala`, `dsc_papel_sala`) VALUES (3, 'Jogador', 'Jogador comum, sem privilégios avançados');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RPG_unamed`.`td_magia`
-- -----------------------------------------------------
START TRANSACTION;
USE `RPG_unamed`;
INSERT INTO `RPG_unamed`.`td_magia` (`idt_magia`, `nme_magia`, `dsc_magia`, `tpo_magia`, `vlr_base_magia`) VALUES (1, 'Punhos de fogo', 'O homem que possuir esta magia adquire punhos capazes de romper o material mais sólido existente na Terra', 'A', 30);
INSERT INTO `RPG_unamed`.`td_magia` (`idt_magia`, `nme_magia`, `dsc_magia`, `tpo_magia`, `vlr_base_magia`) VALUES (2, 'Cura Santa', 'O personagem que possuir esta magia tem a capacidade de se curar e curar seus companheiros', 'D', 20);
INSERT INTO `RPG_unamed`.`td_magia` (`idt_magia`, `nme_magia`, `dsc_magia`, `tpo_magia`, `vlr_base_magia`) VALUES (3, 'Sopro Gélido', 'O personagem que possuir esta magia tem a capacidade de congelar o adversário por 10 segundos lançando 5 pontos de dano.', 'A', 25);

COMMIT;


-- -----------------------------------------------------
-- Data for table `RPG_unamed`.`td_atributo`
-- -----------------------------------------------------
START TRANSACTION;
USE `RPG_unamed`;
INSERT INTO `RPG_unamed`.`td_atributo` (`idt_atributo`, `nme_atributo`, `val_atributo`) VALUES (1, 'Coragem', 50);
INSERT INTO `RPG_unamed`.`td_atributo` (`idt_atributo`, `nme_atributo`, `val_atributo`) VALUES (2, 'Covardia', 70);
INSERT INTO `RPG_unamed`.`td_atributo` (`idt_atributo`, `nme_atributo`, `val_atributo`) VALUES (3, 'Gentileza', 30);
INSERT INTO `RPG_unamed`.`td_atributo` (`idt_atributo`, `nme_atributo`, `val_atributo`) VALUES (4, 'Notoriedade', 75);
INSERT INTO `RPG_unamed`.`td_atributo` (`idt_atributo`, `nme_atributo`, `val_atributo`) VALUES (5, 'Lábia', 60);

COMMIT;


-- -----------------------------------------------------
-- Data for table `RPG_unamed`.`td_linguagem`
-- -----------------------------------------------------
START TRANSACTION;
USE `RPG_unamed`;
INSERT INTO `RPG_unamed`.`td_linguagem` (`idt_linguagem`, `nme_linguagem`) VALUES (1, 'Latim');
INSERT INTO `RPG_unamed`.`td_linguagem` (`idt_linguagem`, `nme_linguagem`) VALUES (2, 'Inglês');
INSERT INTO `RPG_unamed`.`td_linguagem` (`idt_linguagem`, `nme_linguagem`) VALUES (3, 'Sindarin');
INSERT INTO `RPG_unamed`.`td_linguagem` (`idt_linguagem`, `nme_linguagem`) VALUES (4, 'Português');
INSERT INTO `RPG_unamed`.`td_linguagem` (`idt_linguagem`, `nme_linguagem`) VALUES (5, 'Grunhidos ');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RPG_unamed`.`td_item`
-- -----------------------------------------------------
START TRANSACTION;
USE `RPG_unamed`;
INSERT INTO `RPG_unamed`.`td_item` (`idt_item`, `nme_item`, `prc_item`, `dsc_item`) VALUES (1, 'Poção de Cura Pequena', 15, 'Cura 15 pontos de saúde');
INSERT INTO `RPG_unamed`.`td_item` (`idt_item`, `nme_item`, `prc_item`, `dsc_item`) VALUES (2, 'Pão', 3, 'Cura 1 ponto de saúde');
INSERT INTO `RPG_unamed`.`td_item` (`idt_item`, `nme_item`, `prc_item`, `dsc_item`) VALUES (3, 'Hálito de Dragão', 300, 'Aplica 30 pontos de dano a um oponente');

COMMIT;


-- -----------------------------------------------------
-- Data for table `RPG_unamed`.`td_equipamento`
-- -----------------------------------------------------
START TRANSACTION;
USE `RPG_unamed`;
INSERT INTO `RPG_unamed`.`td_equipamento` (`idt_equipamento`, `nme_equipamento`, `prc_equipamento`, `dsc_equipamento`, `tpo_equipamento`, `vlr_base_equipamento`) VALUES (1, 'Excalibur', 500, 'A espada lendária criada para ser usada pelo ser mais nobre existente', 'A', 90);
INSERT INTO `RPG_unamed`.`td_equipamento` (`idt_equipamento`, `nme_equipamento`, `prc_equipamento`, `dsc_equipamento`, `tpo_equipamento`, `vlr_base_equipamento`) VALUES (2, 'Escudo de aço', 150, 'Protege o personagem reduzindo seus danos', 'D', 20);
INSERT INTO `RPG_unamed`.`td_equipamento` (`idt_equipamento`, `nme_equipamento`, `prc_equipamento`, `dsc_equipamento`, `tpo_equipamento`, `vlr_base_equipamento`) VALUES (3, 'Adaga de madeira', 30, 'Uma pequena arma que vira mortal nas mãos certas, bonus por ataque furtivo', 'D', 15);
INSERT INTO `RPG_unamed`.`td_equipamento` (`idt_equipamento`, `nme_equipamento`, `prc_equipamento`, `dsc_equipamento`, `tpo_equipamento`, `vlr_base_equipamento`) VALUES (4, 'Mjönir', 1000, 'O martelo lendário empunhado por um Deus, é uma das armas mais poderosas', 'A', 150);

COMMIT;

