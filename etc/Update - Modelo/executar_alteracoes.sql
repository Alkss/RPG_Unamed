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
ALTER TABLE tb_personagem MODIFY column `img_personagem` VARCHAR(150) NOT NULL;
ALTER TABLE tb_personagem ADD CONSTRAINT `fk_tb_personagem_td_religiao1` FOREIGN KEY (`cod_religiao`) REFERENCES `RPG_unamed`.`td_religiao` (`idt_religiao`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE tb_personagem ADD CONSTRAINT `fk_tb_personagem_td_cor_olho1` FOREIGN KEY (`cod_cor_olho`) REFERENCES `RPG_unamed`.`td_cor_olho` (`idt_cor_olho`) ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE ta_perfil_sala ADD COLUMN `vlr_disponivel_perfil` DECIMAL(10,2) NOT NULL;
ALTER TABLE tb_sala ADD COLUMN `vlr_dinheiro_sala` DECIMAL(10,2) NOT NULL;
ALTER TABLE td_equipamento modify column `prc_equipamento` DECIMAL(10,2);
ALTER TABLE td_item modify column `prc_item` DECIMAL(10,2);
ALTER TABLE ta_perfil_sala modify column `cod_personagem` INT;
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
-- Inserts --------------------------------
DELETE FROM td_alinhamento WHERE idt_alinhamento = 1 OR idt_alinhamento = 2;
DELETE FROM td_raca WHERE idt_raca = 1 OR idt_raca = 2;
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (1, 'Os personagem leais e bons possuem um código moral muito parecido com o personagens bons, mas possuem uma crença muito forte nas leis, acreditando que elas são feitas para tornar uma sociedade mais justa.', 'Leal e Bom/ordeiro');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (2, 'São chamados de Benfeitores, é uma pessoa altruísta e que segue o que acredita ser o bem, baseado em sua consciência', 'Bom/neutro');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (3, 'São pessoas de alma livre, vivem intensamente e raramente abdicam do que gostam por conta de leis e regulamentos.', 'Bom/caótico');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (4, 'São chamados de juízes, seguem as leis e por vezes tratam pessoas que cometem um crime da mesma maneira, independente das circunstâncias em que eles foram cometidos.', 'Ordeiro/neutro');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (5, 'São conhecidos por “indecisos”. Ficam em cima do muro em todo o tipo de conflito, podem pender por um lado ou outro', 'Neutro/neutro');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (6, 'São notórios anarquistas, vivem o modo de vida que escolheram não importando a quem isto incomode.', 'Caótico/neutro');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (7, 'São repressores em nome da lei, ditadores tiranos e qualquer outro tipo de vilão que segue códigos de honra ou obedecem superiores, mesmo que suas ordens sejam o extermínio de inocentes.', 'Ordeiro e Maligno');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (8, 'São egoístas. Não importa se milhares morrerem, eles querem algo e irão até as últimas consequências para conseguir', 'Neutro e maligno');
INSERT INTO `RPG_unamed`.`td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES (9, 'São criaturas que se divertem com o sofrimento dos outros e na ruína das sociedades.', 'Caótico e maligno');
INSERT INTO `RPG_unamed`.`td_raca` (`idt_raca`, `nme_raca`, `dsc_raca`) VALUES (1, 'Humano', 'Ser comum do planeta Terra');
INSERT INTO `RPG_unamed`.`td_raca` (`idt_raca`, `nme_raca`, `dsc_raca`) VALUES (2, 'Elfo', 'Tende a viver em florestas e em bando');
INSERT INTO `RPG_unamed`.`td_raca` (`idt_raca`, `nme_raca`, `dsc_raca`) VALUES (3, 'Ogro', 'Monstro maligno que se alimenta de crianças');
INSERT INTO `RPG_unamed`.`td_classe` (`idt_classe`, `nme_classe`, `dsc_classe`) VALUES (1, 'Paladino', 'Um cavaleiro bondoso e com pura coragem');
INSERT INTO `RPG_unamed`.`td_classe` (`idt_classe`, `nme_classe`, `dsc_classe`) VALUES (2, 'Mago', 'Perito em magias');
INSERT INTO `RPG_unamed`.`td_classe` (`idt_classe`, `nme_classe`, `dsc_classe`) VALUES (3, 'Plebeu', 'Ser comum, vive em cidade e tende e pode ser escravo de seres nobres');
INSERT INTO `RPG_unamed`.`td_classe` (`idt_classe`, `nme_classe`, `dsc_classe`) VALUES (4, 'Monstro', 'Critaturas despresíveis, vivem na escuridão');
INSERT INTO `RPG_unamed`.`td_cor_olho` (`idt_cor_olho`, `nme_cor_olho`) VALUES (1, 'Azul');
INSERT INTO `RPG_unamed`.`td_cor_olho` (`idt_cor_olho`, `nme_cor_olho`) VALUES (2, 'Vermelho');
INSERT INTO `RPG_unamed`.`td_cor_olho` (`idt_cor_olho`, `nme_cor_olho`) VALUES (3, 'Verde');
INSERT INTO `RPG_unamed`.`td_cor_olho` (`idt_cor_olho`, `nme_cor_olho`) VALUES (4, 'Castanho');
INSERT INTO `RPG_unamed`.`td_cor_olho` (`idt_cor_olho`, `nme_cor_olho`) VALUES (5, 'Preto');
INSERT INTO `RPG_unamed`.`td_religiao` (`idt_religiao`, `nme_religiao`) VALUES (1, 'Catholic');
INSERT INTO `RPG_unamed`.`td_religiao` (`idt_religiao`, `nme_religiao`) VALUES (2, 'Atheist');
INSERT INTO `RPG_unamed`.`td_religiao` (`idt_religiao`, `nme_religiao`) VALUES (3, 'Xamã');
INSERT INTO `RPG_unamed`.`td_religiao` (`idt_religiao`, `nme_religiao`) VALUES (4, 'Satanist');
INSERT INTO `RPG_unamed`.`td_papel_sala` (`idt_papel_sala`, `nme_papel_sala`, `dsc_papel_sala`) VALUES (1, 'Dono', 'Dono e Moderador da sala, responsável por gerenciar papeis e funções dentro de uma sala');
INSERT INTO `RPG_unamed`.`td_papel_sala` (`idt_papel_sala`, `nme_papel_sala`, `dsc_papel_sala`) VALUES (2, 'Mestre', 'Mestre da campanha à ser jogada, gerencia história e jogadores');
INSERT INTO `RPG_unamed`.`td_papel_sala` (`idt_papel_sala`, `nme_papel_sala`, `dsc_papel_sala`) VALUES (3, 'Jogador', 'Jogador comum, sem privilégios avançados');
INSERT INTO `RPG_unamed`.`td_magia` (`idt_magia`, `nme_magia`, `dsc_magia`, `tpo_magia`, `vlr_base_magia`) VALUES (1, 'Punhos de fogo', 'O homem que possuir esta magia adquire punhos capazes de romper o material mais sólido existente na Terra', 'A', 30);
INSERT INTO `RPG_unamed`.`td_magia` (`idt_magia`, `nme_magia`, `dsc_magia`, `tpo_magia`, `vlr_base_magia`) VALUES (2, 'Cura Santa', 'O personagem que possuir esta magia tem a capacidade de se curar e curar seus companheiros', 'D', 20);
INSERT INTO `RPG_unamed`.`td_magia` (`idt_magia`, `nme_magia`, `dsc_magia`, `tpo_magia`, `vlr_base_magia`) VALUES (3, 'Sopro Gélido', 'O personagem que possuir esta magia tem a capacidade de congelar o adversário por 10 segundos lançando 5 pontos de dano.', 'A', 25);
INSERT INTO `RPG_unamed`.`td_atributo` (`idt_atributo`, `nme_atributo`, `val_atributo`) VALUES (1, 'Coragem', 50);
INSERT INTO `RPG_unamed`.`td_atributo` (`idt_atributo`, `nme_atributo`, `val_atributo`) VALUES (2, 'Covardia', 70);
INSERT INTO `RPG_unamed`.`td_atributo` (`idt_atributo`, `nme_atributo`, `val_atributo`) VALUES (3, 'Gentileza', 30);
INSERT INTO `RPG_unamed`.`td_atributo` (`idt_atributo`, `nme_atributo`, `val_atributo`) VALUES (4, 'Notoriedade', 75);
INSERT INTO `RPG_unamed`.`td_atributo` (`idt_atributo`, `nme_atributo`, `val_atributo`) VALUES (5, 'Lábia', 60);
INSERT INTO `RPG_unamed`.`td_linguagem` (`idt_linguagem`, `nme_linguagem`) VALUES (1, 'Latim');
INSERT INTO `RPG_unamed`.`td_linguagem` (`idt_linguagem`, `nme_linguagem`) VALUES (2, 'Inglês');
INSERT INTO `RPG_unamed`.`td_linguagem` (`idt_linguagem`, `nme_linguagem`) VALUES (3, 'Sindarin');
INSERT INTO `RPG_unamed`.`td_linguagem` (`idt_linguagem`, `nme_linguagem`) VALUES (4, 'Português');
INSERT INTO `RPG_unamed`.`td_linguagem` (`idt_linguagem`, `nme_linguagem`) VALUES (5, 'Grunhidos ');
INSERT INTO `RPG_unamed`.`td_item` (`idt_item`, `nme_item`, `prc_item`, `dsc_item`) VALUES (1, 'Poção de Cura Pequena', 15, 'Cura 15 pontos de saúde');
INSERT INTO `RPG_unamed`.`td_item` (`idt_item`, `nme_item`, `prc_item`, `dsc_item`) VALUES (2, 'Pão', 3, 'Cura 1 ponto de saúde');
INSERT INTO `RPG_unamed`.`td_item` (`idt_item`, `nme_item`, `prc_item`, `dsc_item`) VALUES (3, 'Hálito de Dragão', 300, 'Aplica 30 pontos de dano a um oponente');
INSERT INTO `RPG_unamed`.`td_equipamento` (`idt_equipamento`, `nme_equipamento`, `prc_equipamento`, `dsc_equipamento`, `tpo_equipamento`, `vlr_base_equipamento`) VALUES (1, 'Excalibur', 500, 'A espada lendária criada para ser usada pelo ser mais nobre existente', 'A', 90);
INSERT INTO `RPG_unamed`.`td_equipamento` (`idt_equipamento`, `nme_equipamento`, `prc_equipamento`, `dsc_equipamento`, `tpo_equipamento`, `vlr_base_equipamento`) VALUES (2, 'Escudo de aço', 150, 'Protege o personagem reduzindo seus danos', 'D', 20);
INSERT INTO `RPG_unamed`.`td_equipamento` (`idt_equipamento`, `nme_equipamento`, `prc_equipamento`, `dsc_equipamento`, `tpo_equipamento`, `vlr_base_equipamento`) VALUES (3, 'Adaga de madeira', 30, 'Uma pequena arma que vira mortal nas mãos certas, bonus por ataque furtivo', 'D', 15);
INSERT INTO `RPG_unamed`.`td_equipamento` (`idt_equipamento`, `nme_equipamento`, `prc_equipamento`, `dsc_equipamento`, `tpo_equipamento`, `vlr_base_equipamento`) VALUES (4, 'Mjönir', 1000, 'O martelo lendário empunhado por um Deus, é uma das armas mais poderosas', 'A', 150);


