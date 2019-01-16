-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 05-Fev-2018 às 18:50
-- Versão do servidor: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RPG_unamed`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ta_equipavel`
--

CREATE TABLE `ta_equipavel` (
  `idt_equipavel` int(11) NOT NULL,
  `cod_equipamento` int(11) NOT NULL,
  `cod_personagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ta_papel_previlegio`
--

CREATE TABLE `ta_papel_previlegio` (
  `idt_papel_previlegio` int(11) NOT NULL,
  `cod_previlegio` int(11) NOT NULL,
  `cod_papel_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ta_perfil_previlegio`
--

CREATE TABLE `ta_perfil_previlegio` (
  `idt_perfil_previlegio` int(11) NOT NULL,
  `cod_previlegio` int(11) NOT NULL,
  `cod_tipo_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ta_perfil_sala`
--

CREATE TABLE `ta_perfil_sala` (
  `idt_perfil_sala` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_personagem` int(11) NOT NULL,
  `cod_papel_sala` int(11) NOT NULL,
  `cod_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ta_personagem_atributo`
--

CREATE TABLE `ta_personagem_atributo` (
  `idt_personagem_atributo` int(11) NOT NULL,
  `cod_atributo` int(11) NOT NULL,
  `cod_personagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ta_personagem_linguagem`
--

CREATE TABLE `ta_personagem_linguagem` (
  `idt_personagem_linguagem` int(11) NOT NULL,
  `cod_linguagem` int(11) NOT NULL,
  `cod_personagem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ta_personagem_magia`
--

CREATE TABLE `ta_personagem_magia` (
  `idt_personagem_magia` int(11) NOT NULL,
  `cod_personagem` int(11) NOT NULL,
  `cod_magia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ta_utilizaveis`
--

CREATE TABLE `ta_utilizaveis` (
  `idt_inventario` int(11) NOT NULL,
  `cod_personagem` int(11) NOT NULL,
  `cod_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_personagem`
--

CREATE TABLE `tb_personagem` (
  `idt_personagem` int(11) NOT NULL,
  `nme_personagem` varchar(50) NOT NULL,
  `exp_personagem` int(11) NOT NULL,
  `gen_personagem` varchar(50) NOT NULL,
  `rel_personagem` varchar(50) NOT NULL,
  `pes_personagem` int(11) NOT NULL,
  `alt_personagem` decimal(2,1) NOT NULL,
  `dsc_cabelo_personagem` varchar(200) NOT NULL,
  `cor_olhos_personagem` varchar(45) NOT NULL,
  `img_personagem` varchar(50) NOT NULL,
  `hst_personagem` text,
  `inf_adicional_personagem` varchar(200) DEFAULT NULL,
  `cod_alinhamento` int(11) NOT NULL,
  `cod_classe` int(11) NOT NULL,
  `cod_raca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=big5;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sala`
--

CREATE TABLE `tb_sala` (
  `idt_sala` int(11) NOT NULL,
  `nme_sala` varchar(50) NOT NULL,
  `dta_criacao_sala` datetime NOT NULL,
  `dta_ultima_atividade_sala` datetime NOT NULL,
  `hst_campanha_sala` text,
  `pwd_sala` varchar(128) DEFAULT NULL,
  `qtd_players_sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `idt_usuario` int(11) NOT NULL,
  `nme_usuario` varchar(50) NOT NULL,
  `lgn_usuario` varchar(30) NOT NULL,
  `pwd_usuario` varchar(128) NOT NULL,
  `eml_usuario` varchar(50) NOT NULL,
  `cod_perfil` int(11) NOT NULL,
  `atv_usuario` tinyint(1) NOT NULL COMMENT 'A = Ativo\nI = Inativo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`idt_usuario`, `nme_usuario`, `lgn_usuario`, `pwd_usuario`, `eml_usuario`, `cod_perfil`, `atv_usuario`) VALUES
(1, 'Alex Oliveira', 'alex', '534b44a19bf18d20b71ecc4eb77c572f', 'alkss@outlook.com.br', 1, 1),
(2, 'Usuario Comum', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@outlook.com.br', 2, 1),
(3, 'Usuario Inativo 1', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user1@outlook.com.br', 2, 1),
(4, 'Usuario Inativo 2', 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user3@outlook.com.br', 2, 1),
(5, 'Usuario Inativo 3', 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 'user4@outlook.com.br', 2, 1),
(8, 'aa', 'aa', 'ad79e2cd5fd5ae53547d991007344847', 'aaaaa@aaa.aaa', 2, 1),
(9, 'aa', 'aa', 'd4fbb7d8d5603db43ac2094f5955787c', 'aaaaa@aaaa.aaa', 2, 1),
(10, 'Aa', 'aa', 'ad79e2cd5fd5ae53547d991007344847', 'aa', 2, 1),
(11, 'Alex da Costa Oliveira', 'user6', 'b9be11166d72e9e3ae7fd407165e4bd2', 'alkss_fjv@yahoo.com.br', 2, 1),
(12, 'Aa', 'aac', '3dad9cbf9baaa0360c0f2ba372d25716', 'aaaav', 2, 1),
(13, 'Nome', 'login', 'md5(\'senha\')', 'email@email.com', 2, 1),
(14, 'login', 'login1', 'f67e209e9b8164dcb6812b9ac4357ed1', 'login@login.login', 2, 1),
(15, 'Vanderson', 'vanderson', 'debc43465075647279d96d5ddfd770a1', 'vanderson', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `td_alinhamento`
--

CREATE TABLE `td_alinhamento` (
  `idt_alinhamento` int(11) NOT NULL,
  `dsc_alinhamento` varchar(200) NOT NULL,
  `nme_alinhamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `td_alinhamento`
--

INSERT INTO `td_alinhamento` (`idt_alinhamento`, `dsc_alinhamento`, `nme_alinhamento`) VALUES
(1, 'aaa', 'aa'),
(2, 'aaa', 'aa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `td_atributo`
--

CREATE TABLE `td_atributo` (
  `idt_atributo` int(11) NOT NULL,
  `nme_atributo` varchar(50) NOT NULL,
  `val_atributo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `td_classe`
--

CREATE TABLE `td_classe` (
  `idt_classe` int(11) NOT NULL,
  `nme_classe` varchar(50) NOT NULL,
  `dsc_classe` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `td_classe`
--

INSERT INTO `td_classe` (`idt_classe`, `nme_classe`, `dsc_classe`) VALUES
(5, 'Barbaro', 'mais um humano pelado com pelos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `td_equipamento`
--

CREATE TABLE `td_equipamento` (
  `idt_equipamento` int(11) NOT NULL,
  `nme_equipamento` varchar(50) NOT NULL,
  `prc_equipamento` int(11) DEFAULT NULL,
  `dsc_equipamento` varchar(200) NOT NULL,
  `tpo_equipamento` enum('A','D') NOT NULL,
  `vlr_base_equipamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `td_item`
--

CREATE TABLE `td_item` (
  `idt_item` int(11) NOT NULL,
  `nme_item` varchar(50) NOT NULL,
  `prc_item` int(11) DEFAULT NULL,
  `dsc_item` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `td_linguagem`
--

CREATE TABLE `td_linguagem` (
  `idt_linguagem` int(11) NOT NULL,
  `nme_linguagem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `td_magia`
--

CREATE TABLE `td_magia` (
  `idt_magia` int(11) NOT NULL,
  `nme_magia` varchar(50) NOT NULL,
  `dsc_magia` varchar(200) NOT NULL,
  `tpo_magia` enum('A','D') NOT NULL,
  `vlr_base_magia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `td_papel_sala`
--

CREATE TABLE `td_papel_sala` (
  `idt_papel_sala` int(11) NOT NULL,
  `nme_papel_sala` varchar(50) NOT NULL,
  `dsc_papel_sala` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `td_previlegio`
--

CREATE TABLE `td_previlegio` (
  `idt_previlegio` int(11) NOT NULL,
  `nme_previlegio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `td_previlegio`
--

INSERT INTO `td_previlegio` (`idt_previlegio`, `nme_previlegio`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `td_raca`
--

CREATE TABLE `td_raca` (
  `idt_raca` int(11) NOT NULL,
  `nme_raca` varchar(50) NOT NULL,
  `dsc_raca` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `td_raca`
--

INSERT INTO `td_raca` (`idt_raca`, `nme_raca`, `dsc_raca`) VALUES
(1, 'aaa', 'aaa'),
(2, 'bb', 'bb');

-- --------------------------------------------------------

--
-- Estrutura da tabela `td_tipo_perfil`
--

CREATE TABLE `td_tipo_perfil` (
  `idt_tipo_perfil` int(11) NOT NULL,
  `nme_tipo_perfil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `td_tipo_perfil`
--

INSERT INTO `td_tipo_perfil` (`idt_tipo_perfil`, `nme_tipo_perfil`) VALUES
(1, 'Admin'),
(2, 'Usuário Comum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ta_equipavel`
--
ALTER TABLE `ta_equipavel`
  ADD PRIMARY KEY (`idt_equipavel`),
  ADD KEY `fk_ta_equipavel_tb_equipamento1_idx` (`cod_equipamento`),
  ADD KEY `fk_ta_equipavel_tb_personagem1_idx` (`cod_personagem`);

--
-- Indexes for table `ta_papel_previlegio`
--
ALTER TABLE `ta_papel_previlegio`
  ADD PRIMARY KEY (`idt_papel_previlegio`),
  ADD UNIQUE KEY `uq_ta_papel_privilegio` (`cod_previlegio`,`cod_papel_sala`),
  ADD KEY `fk_ta_papel_previlegio_td_previlegio1_idx` (`cod_previlegio`),
  ADD KEY `fk_ta_papel_previlegio_td_papel_sala1_idx` (`cod_papel_sala`);

--
-- Indexes for table `ta_perfil_previlegio`
--
ALTER TABLE `ta_perfil_previlegio`
  ADD PRIMARY KEY (`idt_perfil_previlegio`),
  ADD KEY `fk_ta_perfil_previlegio_td_previlegio1_idx` (`cod_previlegio`),
  ADD KEY `fk_ta_perfil_previlegio_td_tipo_perfil1_idx` (`cod_tipo_perfil`);

--
-- Indexes for table `ta_perfil_sala`
--
ALTER TABLE `ta_perfil_sala`
  ADD PRIMARY KEY (`idt_perfil_sala`),
  ADD UNIQUE KEY `uq_cod_usuario_sala` (`cod_usuario`,`cod_sala`,`cod_personagem`),
  ADD KEY `fk_ta_perfil_sala_tb_usuario1_idx` (`cod_usuario`),
  ADD KEY `fk_ta_perfil_sala_tb_personagem1_idx` (`cod_personagem`),
  ADD KEY `fk_ta_perfil_sala_td_papel_sala1_idx` (`cod_papel_sala`),
  ADD KEY `fk_ta_perfil_sala_tb_sala1_idx` (`cod_sala`);

--
-- Indexes for table `ta_personagem_atributo`
--
ALTER TABLE `ta_personagem_atributo`
  ADD PRIMARY KEY (`idt_personagem_atributo`),
  ADD KEY `fk_ta_personagem_atributo_td_atributo1_idx` (`cod_atributo`),
  ADD KEY `fk_ta_personagem_atributo_tb_personagem1_idx` (`cod_personagem`);

--
-- Indexes for table `ta_personagem_linguagem`
--
ALTER TABLE `ta_personagem_linguagem`
  ADD PRIMARY KEY (`idt_personagem_linguagem`),
  ADD KEY `fk_ta_personagem_linguagem_td_linguagem1_idx` (`cod_linguagem`),
  ADD KEY `fk_ta_personagem_linguagem_tb_personagem1_idx` (`cod_personagem`);

--
-- Indexes for table `ta_personagem_magia`
--
ALTER TABLE `ta_personagem_magia`
  ADD PRIMARY KEY (`idt_personagem_magia`),
  ADD KEY `fk_ta_personagem_magia_tb_personagem1_idx` (`cod_personagem`),
  ADD KEY `fk_ta_personagem_magia_tb_magia1_idx` (`cod_magia`);

--
-- Indexes for table `ta_utilizaveis`
--
ALTER TABLE `ta_utilizaveis`
  ADD PRIMARY KEY (`idt_inventario`),
  ADD KEY `fk_ta_inventario_tb_personagem1_idx` (`cod_personagem`),
  ADD KEY `fk_ta_inventario_tb_item1_idx` (`cod_item`);

--
-- Indexes for table `tb_personagem`
--
ALTER TABLE `tb_personagem`
  ADD PRIMARY KEY (`idt_personagem`),
  ADD KEY `fk_tb_personagem_td_alinhamento1_idx` (`cod_alinhamento`),
  ADD KEY `fk_tb_personagem_td_classe1_idx` (`cod_classe`),
  ADD KEY `fk_tb_personagem_td_raca1` (`cod_raca`);

--
-- Indexes for table `tb_sala`
--
ALTER TABLE `tb_sala`
  ADD PRIMARY KEY (`idt_sala`),
  ADD UNIQUE KEY `nme_sala_UNIQUE` (`nme_sala`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`idt_usuario`),
  ADD KEY `fk_tb_usuario_td_tipo_perfil1_idx` (`cod_perfil`);

--
-- Indexes for table `td_alinhamento`
--
ALTER TABLE `td_alinhamento`
  ADD PRIMARY KEY (`idt_alinhamento`);

--
-- Indexes for table `td_atributo`
--
ALTER TABLE `td_atributo`
  ADD PRIMARY KEY (`idt_atributo`);

--
-- Indexes for table `td_classe`
--
ALTER TABLE `td_classe`
  ADD PRIMARY KEY (`idt_classe`);

--
-- Indexes for table `td_equipamento`
--
ALTER TABLE `td_equipamento`
  ADD PRIMARY KEY (`idt_equipamento`);

--
-- Indexes for table `td_item`
--
ALTER TABLE `td_item`
  ADD PRIMARY KEY (`idt_item`);

--
-- Indexes for table `td_linguagem`
--
ALTER TABLE `td_linguagem`
  ADD PRIMARY KEY (`idt_linguagem`);

--
-- Indexes for table `td_magia`
--
ALTER TABLE `td_magia`
  ADD PRIMARY KEY (`idt_magia`);

--
-- Indexes for table `td_papel_sala`
--
ALTER TABLE `td_papel_sala`
  ADD PRIMARY KEY (`idt_papel_sala`);

--
-- Indexes for table `td_previlegio`
--
ALTER TABLE `td_previlegio`
  ADD PRIMARY KEY (`idt_previlegio`);

--
-- Indexes for table `td_raca`
--
ALTER TABLE `td_raca`
  ADD PRIMARY KEY (`idt_raca`);

--
-- Indexes for table `td_tipo_perfil`
--
ALTER TABLE `td_tipo_perfil`
  ADD PRIMARY KEY (`idt_tipo_perfil`),
  ADD UNIQUE KEY `nme_tipo_perfil_UNIQUE` (`nme_tipo_perfil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ta_equipavel`
--
ALTER TABLE `ta_equipavel`
  MODIFY `idt_equipavel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ta_papel_previlegio`
--
ALTER TABLE `ta_papel_previlegio`
  MODIFY `idt_papel_previlegio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ta_perfil_previlegio`
--
ALTER TABLE `ta_perfil_previlegio`
  MODIFY `idt_perfil_previlegio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ta_perfil_sala`
--
ALTER TABLE `ta_perfil_sala`
  MODIFY `idt_perfil_sala` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ta_personagem_atributo`
--
ALTER TABLE `ta_personagem_atributo`
  MODIFY `idt_personagem_atributo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ta_personagem_linguagem`
--
ALTER TABLE `ta_personagem_linguagem`
  MODIFY `idt_personagem_linguagem` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ta_personagem_magia`
--
ALTER TABLE `ta_personagem_magia`
  MODIFY `idt_personagem_magia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ta_utilizaveis`
--
ALTER TABLE `ta_utilizaveis`
  MODIFY `idt_inventario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_personagem`
--
ALTER TABLE `tb_personagem`
  MODIFY `idt_personagem` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_sala`
--
ALTER TABLE `tb_sala`
  MODIFY `idt_sala` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `idt_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `td_alinhamento`
--
ALTER TABLE `td_alinhamento`
  MODIFY `idt_alinhamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `td_classe`
--
ALTER TABLE `td_classe`
  MODIFY `idt_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `td_equipamento`
--
ALTER TABLE `td_equipamento`
  MODIFY `idt_equipamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `td_linguagem`
--
ALTER TABLE `td_linguagem`
  MODIFY `idt_linguagem` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `td_magia`
--
ALTER TABLE `td_magia`
  MODIFY `idt_magia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `td_papel_sala`
--
ALTER TABLE `td_papel_sala`
  MODIFY `idt_papel_sala` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `td_raca`
--
ALTER TABLE `td_raca`
  MODIFY `idt_raca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `td_tipo_perfil`
--
ALTER TABLE `td_tipo_perfil`
  MODIFY `idt_tipo_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `ta_equipavel`
--
ALTER TABLE `ta_equipavel`
  ADD CONSTRAINT `fk_ta_equipavel_tb_equipamento1` FOREIGN KEY (`cod_equipamento`) REFERENCES `td_equipamento` (`idt_equipamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ta_equipavel_tb_personagem1` FOREIGN KEY (`cod_personagem`) REFERENCES `tb_personagem` (`idt_personagem`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ta_papel_previlegio`
--
ALTER TABLE `ta_papel_previlegio`
  ADD CONSTRAINT `fk_ta_papel_previlegio_td_papel_sala1` FOREIGN KEY (`cod_papel_sala`) REFERENCES `td_papel_sala` (`idt_papel_sala`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ta_papel_previlegio_td_previlegio1` FOREIGN KEY (`cod_previlegio`) REFERENCES `td_previlegio` (`idt_previlegio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ta_perfil_previlegio`
--
ALTER TABLE `ta_perfil_previlegio`
  ADD CONSTRAINT `fk_ta_perfil_previlegio_td_previlegio1` FOREIGN KEY (`cod_previlegio`) REFERENCES `td_previlegio` (`idt_previlegio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ta_perfil_previlegio_td_tipo_perfil1` FOREIGN KEY (`cod_tipo_perfil`) REFERENCES `td_tipo_perfil` (`idt_tipo_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ta_perfil_sala`
--
ALTER TABLE `ta_perfil_sala`
  ADD CONSTRAINT `fk_ta_perfil_sala_tb_personagem1` FOREIGN KEY (`cod_personagem`) REFERENCES `tb_personagem` (`idt_personagem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ta_perfil_sala_tb_sala1` FOREIGN KEY (`cod_sala`) REFERENCES `tb_sala` (`idt_sala`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ta_perfil_sala_tb_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `tb_usuario` (`idt_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ta_perfil_sala_td_papel_sala1` FOREIGN KEY (`cod_papel_sala`) REFERENCES `td_papel_sala` (`idt_papel_sala`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ta_personagem_atributo`
--
ALTER TABLE `ta_personagem_atributo`
  ADD CONSTRAINT `fk_ta_personagem_atributo_tb_personagem1` FOREIGN KEY (`cod_personagem`) REFERENCES `tb_personagem` (`idt_personagem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ta_personagem_atributo_td_atributo1` FOREIGN KEY (`cod_atributo`) REFERENCES `td_atributo` (`idt_atributo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ta_personagem_linguagem`
--
ALTER TABLE `ta_personagem_linguagem`
  ADD CONSTRAINT `fk_ta_personagem_linguagem_tb_personagem1` FOREIGN KEY (`cod_personagem`) REFERENCES `tb_personagem` (`idt_personagem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ta_personagem_linguagem_td_linguagem1` FOREIGN KEY (`cod_linguagem`) REFERENCES `td_linguagem` (`idt_linguagem`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ta_personagem_magia`
--
ALTER TABLE `ta_personagem_magia`
  ADD CONSTRAINT `fk_ta_personagem_magia_tb_magia1` FOREIGN KEY (`cod_magia`) REFERENCES `td_magia` (`idt_magia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ta_personagem_magia_tb_personagem1` FOREIGN KEY (`cod_personagem`) REFERENCES `tb_personagem` (`idt_personagem`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ta_utilizaveis`
--
ALTER TABLE `ta_utilizaveis`
  ADD CONSTRAINT `fk_ta_inventario_tb_item1` FOREIGN KEY (`cod_item`) REFERENCES `td_item` (`idt_item`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ta_inventario_tb_personagem1` FOREIGN KEY (`cod_personagem`) REFERENCES `tb_personagem` (`idt_personagem`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_personagem`
--
ALTER TABLE `tb_personagem`
  ADD CONSTRAINT `fk_tb_personagem_td_alinhamento1` FOREIGN KEY (`cod_alinhamento`) REFERENCES `td_alinhamento` (`idt_alinhamento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_personagem_td_classe1` FOREIGN KEY (`cod_classe`) REFERENCES `td_classe` (`idt_classe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_personagem_td_raca1` FOREIGN KEY (`cod_raca`) REFERENCES `td_raca` (`idt_raca`);

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_tb_usuario_td_tipo_perfil1` FOREIGN KEY (`cod_perfil`) REFERENCES `td_tipo_perfil` (`idt_tipo_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
