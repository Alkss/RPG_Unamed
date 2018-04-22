-- SQL INSERT PARA TABELA DE TIPO-PERFIL
INSERT INTO td_tipo_perfil (idt_tipo_perfil, nme_tipo_perfil) VALUES (1, 'Admin'),(2, 'Usuário Comum');
-- SQL INSERT PARA TABELA DE PAPEL-SALA
INSERT INTO td_papel_sala (IDT_PAPEL_SALA, NME_PAPEL_SALA, DSC_PAPEL_SALA) VALUES (1,'Jogador','Participante de uma sala, poucos previlégios em sala'),(2,'Mestre','Narrador da aventura na sala, Maiores previlégios em sala'),(3,'Dono','Responsável por atribuir papel na sala');
-- SQL INSERT PARA TABELA DE SALAS
INSERT INTO tb_sala (NME_SALA, DTA_CRIACAO_SALA, DTA_ULTIMA_ATIVIDADE_SALA, HST_CAMPANHA_SALA, PWD_SALA, QTD_PLAYERS_SALA) VALUES ('Sala 1','2018-04-18 00:00:00','2018-04-18 00:00:00','','',0),('Sala 2','2018-04-18 00:00:00','2018-04-18 00:00:00','','',0);

-- SQL INSERT PARA TABELA PERSONAGEM

/*INSERT INTO tb_personagem
(NME_PERSONAGEM, EXP_PERSONAGEM, GEN_PERSONAGEM, PES_PERSONAGEM, ALT_PERSONAGEM, DSC_CABELO_PERSONAGEM, IMG_PERSONAGEM, COR_OLHO_PERSONAGEM, HST_PERSONAGEM, INF_ADICIONAL_PERSONAGEM, QTD_DINHEIRO_PERSONAGEM, QTD_VIDA_PERSONAGEM,COD_ALINHAMENTO, COD_CLASSE, COD_RACA)
VALUES ('Steve',0,'Masculino',87,1.67,'Ruim','https://www.pt.com.br/lulaeumaideia', 'qualquer uma', 'teste','teste', 1000000.00, 25,1,1,1);
*/



-- SQL INSERT NAS TABELAS DE DOMINIO RELACIONADAS AO PERSONAGEM

INSERT INTO td_alinhamento (NME_ALINHAMENTO, DSC_ALINHAMENTO) VALUES 
('Leal e Bom','Um personagem com essa tendência se com-porta como todos esperam que uma pessoa boa o faça. Ele combina a vontade de combater o mal com a disciplina de lutar incessantemente. Ele diz a verdade,mantém sua palavra, ajuda os que estão em necessidade e combate as injustiças.Um personagem Leal e Bom detesta ver os culpados saírem impunes.'),
('Neutro e Bom','Um personagem Neutro e Bom faz o melhor que uma pessoa boa conseguiria. Ele é devotado a ajudar os outros e colabora com reis e magistrados, mesmo não se sentindo obrigado a fazê-lo.'),
('Caótico e Bom','Um personagem Caótico e Bom se comporta de acordo com a sua consciência, sem se preocupar com o que os outros esperam dele. Ele faz as coisas do seu jeito, mas é educado e benevolente. Ele acredita no bem, mas não vê utilidade para as leis e os regulamentos. Ele detesta quando as pessoas tentam intimidar os mais fracos e dizer-lhes o que fazer. Ele segue sua própria “bússola moral” que, embora tenha uma inclinação para o Bem, algumas vezes não coincide com as diretrizes da sociedade.'),
('Leal e Neutro','Um personagem Leal e Neutro se comporta de acordo com a lei e a tradição, ou é dirigido por um código de conduta pessoal. Para ele, a ordem e a organização são importantíssimos. Ele pode acreditar em uma ordem pessoal e viver segundo um código ou padrão, ou acreditar em uma mesma ordem para todos e preferir um governo forte e organizado.'),
('Neutro','Um personagem Neutro sempre faz o que lhe parece ser uma boa idéia. Ele não se sente inclinado fortemente por um lado ou pelo outro quando o assunto é lei contra caos ou o bem contra o mal. Na maioria das ocasiões, a neutralidade é, na verdade, mais uma falta de convicção do que um compromisso com a própria neutralidade. Esse tipo de personagem considera o Bem melhor que o Mal. Ainda assim, ele não se vê pessoalmente inclinado a defender o bem de modo abstrato ou universal.'),
('Caótico e Neutro','Um personagem Caótico e Neutro obedece apenas à sua vontade. Trata-se de uma pessoa individualista, que valoriza sua própria liberdade e não tenta proteger a liberdade dos demais. Ele evita a autoridade, ressente-se das restrições e desafia as tradições. Um personagem Caótico e Neutro não prejudica intencionalmente as organizações como parte de uma campanha em favor da anarquia. '),
('Leal e Mal','Um vilão Leal e Mau usurpa o que deseja metodicamente, dentro dos limites de seu código de conduta, mas sem se preocupar com quem será prejudicado. Ele se preocupa com a tradição, a lealdade e a ordem, mas não se importa com a liberdade, a dignidade ou mesmo com a vida. Ele joga segundo as regras, mas sem mostrar piedade nem compaixão. Sente-se confortável com a hierarquia e gostaria de governar, mas também aceita servir.'),
('Neutro e Mal','Um vilão Neutro e Mau fará o possível para sair impune e se preocupa única e exclusivamente consigo. Ele não derrama lágrimas por suas vítimas, matando para obter vantagens, por esporte ou por conveniência. Neutro e Mau é uma tendência muito perigosa, porque representa o mal puro, sem honra ou variação.'),
('Caótico e Mal','Um personagem Caótico e Mau realiza o que sua ambição, ódio ou ânsia de destruição o inspiram a fazer. Ele tem um temperamento forte, traiçoeiro, é arbitrariamente violento, cruel e imprevisível. Ele simplesmente usurpa o que deseja, é brutal e não sente piedade ou remorso.');

INSERT INTO td_raca (NME_RACA, DSC_RACA) VALUES 
('Humano','A raça humana é a mais adaptável, flexível e ambiciosa dentre todas as raças comuns. Suas preferências, moral, costumes e hábitos variam muito. As raças inumanas acusam-nos de não cultivarem respeito pela história, mas é natural que os humanos,com sua vida relativamentecurta e sua cultura em freqüente alteração, tenham uma memória coletiva inferior aos anões, elfos, gnomos e halflings.'),
('Anão','Os anões hesitam em sorrir ou celebrar e suspeitam muito de estranhos, mas são generososcom os poucos indivíduos que adquirem sua confiança. Eles valorizam o ouro, as gemas, as jóias e os objetos de arte fabricados com esses materiais preciosos e muitos já sucumbiram à ambição. Eles não combatem de forma recatada ou temerária, mascom coragem, tenacidade ecautela. A raça possui um forte senso de justiça, que pode se transformar em uma sede de vingança infindável.'),
('Elfo','Os elfos preferem a serenidade à agitação e a raça costuma ceder mais à curiosidade do que à cobiça. Em função de sua longevidade, eles tendem a desenvolver uma perspectiva mais ampla dos eventos, tornando-se distantes e indiferentes às casualidades sem importância. No entanto, quando se dedicam a alcançar um objetivo, seja uma missão aventureira ou o estudo de uma nova perícia ou arte, são perseverantes e implacáveis. Os elfos hesitam em criar vínculos de amizade ou inimizade, mas são ainda mais reticentes em esquecê-los.'),
('Gnomo','Os gnomos adoram os animais, belas pedras preciosas e piadas de qualquer tipo. Eles têm um enorme senso de humor, adoram brincadeiras e jogos e também apreciam os truques – quanto mais complexos, melhor. Felizmente, eles dedicam o mesmo empenho em suas brincadeiras e em outras artes mais práticas, como a engenharia. Os gnomos são curiosos e preferem descobrir ascoisas através da própria experiência, muitas vezescometendo imprudências.'),
('Meio-Elfo','A maioria dos meio-elfos possui a curiosidade, a inventividade e a ambição de seu parente humano, aliadas aos sentidos refinados, o amor à natureza e os gostos artísticos de sua herança élfica.'),
('Meio-Orc','Os meio-orcscostumam apresentar um temperamento inquieto e serem mal-humorados. Eles preferem agir a pensar e lutar em vez de discutir. Contudo, os meio-orcs destinados a obter sucesso são os indivíduos que desenvolveram autocontrole suficiente para viver nas terras civilizadas, não os insanos.'),
('Halfling','Os halflings são espertos, competentes e oportunistas. Os indivíduos e os clãs desta raça encontram seu espaço em qualquer lugar. Muitas vezes, eles são viajantes e peregrinos, e os nativos os observam com desconfiança ou curiosidade. De acordo com o clã, os halflings podem ser cidadãos honestos e trabalhadores ou ladrões à espera de uma oportunidade para realizar um grande golpe e desaparecer na escuridão da noite. De qualquer forma, eles são sobreviventes astutos e engenhosos.');

INSERT INTO td_classe (NME_CLASSE, DSC_CLASSE) VALUES 
('Bárbaro','Um combatente violento, que usa a fúria e o instinto para derrotar seus inimigos.'),
('Bardo','Um artista cuja música cria magia – um viajante, um contador de histórias e um faz-tudo.'),
('Clérigo','Um mestre da magia divina e um guerreiro treinado.'),
('Druida','Um sábio que extrai energia do mundo natural para conjurar magias divinas e adquirir estranhos poderes mágicos.'),
('Feiticeiro','Um conjurador com habilidades mágicas inatas.'),
('Guerreiro','Um combatente com técnicas de combate excepcionais e habili-
dade inigualável com anuas.'),
('Ladino','Um espião repleto de perícias e truques, que prefere vencer através da furtividade em vez da força bruta.'),
('Mago','Um conjurador poderoso, versado nas artes arcanas.'),
('Monge','Um artista marcial cujos ataques desarmados são rápidos e fortes – um mestre de poderes exóticos.'),
('Paladino','Um campeão da justiça e destruidor do mal, protegido apoiado por uma enorme variedade de poderes divinos.'),
('Ranger','Um guerreiro da natureza sagaz e habilidoso.');

INSERT INTO td_linguagem (NME_LINGUAGEM) VALUES ('Comum'),('Anão'),('Terran'),('Aquan');
INSERT INTO td_divindade (NME_DIVINDADE, DSC_DIVINDADE) VALUES 
('Moradin','Moradin (mô-rá-din), o deus dos anões, é Leal e Bom. Seus títulos incluem O Forjador de Almas, Pai dos Anões, Pai de Todos e O Criador. Moradin forjou os primeiros anões usando metal e gemas preciosas e depois soprou a vida dentro deles. Ele governa as artes e as ciências dos anões: forjar e moldar metais, engenharia e guerra. Os domínios associados a ele são Terra, Bem, Ordem e Proteção.Sua arma predileta é o martelo de guerra.'),
('Kord','Kord (córd), o deus da força, é Caótico e Bom. Ele é conhecido como O Lutador. Kord é o patrono dos atletas, especialmente os praticantes de luta livre. Seus adoradores incluem guerreiros, bárbaros e ladinos. Os domínios associados a ele são Caos, Bem, Sorte e Força. A arma predileta de Kord é a espada larga.'),
('Pelor','Pelor (pê-lor), o deus do sol, é Neutro e Bom. Seu título é O Radiante. Pelor é o criador de muitas coisas boas, serve de apoio aos necessitados e um adversário de todo o mal. Ele é a divindade mais adorada entre os humanos e seus sacerdotes são bem recebidos em qualquer lugar. Os rangers e bardos também são encontrados entre seus adoradores. Os domínios associados e ele são Bem, Cura, Força e Sol. Sua arma predileta é a maça.');

/*INSERT INTO TD_PERICIA (NME_PERICIA, DSC_PERICIA, VLR_BASE_PERICIA) VALUES ('','',0),('','',0),('','',),('','',0);
INSERT INTO TD_ITEM (NME_ITEM, DSC_ITEM) VALUES ('',''),('',''),('',''),('',''),('','');
INSERT INTO TD_EQUIPAMENTO (NME_EQUIPAMENTO, DSC_EQUIPAMENTO, TPO_EQUIPAMENTO, MOD_BASE_EQUIPAMENTO) VALUES ('','','',0), ('','','',3),('','','',5);
INSERT INTO TD_MAGIA (NME_MAGIA, DSC_MAGIA, TPO_MAGIA, MOD_BASE_MAGIA) VALUES ('','','',0), ('','','',3), ('','','', 5);
*/
