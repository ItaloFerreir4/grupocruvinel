-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/03/2024 às 15:26
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `grupocruvinel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `blogs`
--

CREATE TABLE `blogs` (
  `idBlog` int(11) NOT NULL,
  `paginaId` int(11) DEFAULT NULL,
  `categoriasId` varchar(1000) DEFAULT NULL,
  `tagsBlog` varchar(1000) DEFAULT NULL,
  `tituloBlog` varchar(1000) DEFAULT NULL,
  `subTituloBlog` varchar(1000) DEFAULT NULL,
  `imagemBlog` longtext DEFAULT NULL,
  `legendaImagemBlog` varchar(500) DEFAULT NULL,
  `fonteImagemBlog` varchar(500) DEFAULT NULL,
  `textoBlog` longtext DEFAULT NULL,
  `nomeAutorBlog` varchar(500) DEFAULT NULL,
  `imagemAutorBlog` longtext DEFAULT NULL,
  `dataBlog` date DEFAULT NULL,
  `tempoLeituraBlog` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `blogs`
--

INSERT INTO `blogs` (`idBlog`, `paginaId`, `categoriasId`, `tagsBlog`, `tituloBlog`, `subTituloBlog`, `imagemBlog`, `legendaImagemBlog`, `fonteImagemBlog`, `textoBlog`, `nomeAutorBlog`, `imagemAutorBlog`, `dataBlog`, `tempoLeituraBlog`, `status`) VALUES
(2, 33, '[\"2\"]', 'blog 1, teste', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam. ', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam. ', '65e9f92b6380e.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam. ', 'blog 1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in semper arcu. Aenean fringilla mauris erat, et blandit purus hendrerit eget. Quisque in sapien quis enim facilisis sollicitudin at ut massa. Suspendisse a nibh metus. Phasellus eu auctor sapien. Curabitur placerat orci dolor, eu dapibus justo rutrum vitae. Duis felis neque, porta ac libero non, eleifend eleifend nisi. Aliquam eleifend libero sed commodo bibendum. Proin erat nibh, mollis at faucibus a, ornare sit amet odio. Mauris ultricies laoreet tempus.</p>\r\n', 'Grupo Cruvinel', '65e5dc535782c.png', '2024-02-06', 2, 1),
(8, 43, '[\"2\",\"3\"]', 'Advocacia', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam', '65e73ba4b27bd.png', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi finibus mattis arcu, vitae bibendum tellus pretium vel. Duis finibus ut diam molestie varius. Sed non justo eu velit tempus elementum. Quisque eget nulla eu mauris placerat fermentum sit amet ut nibh. Quisque mattis ornare viverra. Nam venenatis sem ac nunc pharetra porttitor. Praesent euismod gravida volutpat. Nam turpis sapien, feugiat eget enim id, consequat varius libero. Suspendisse eleifend felis tortor, imperdiet dapibus ante ullamcorper vel. Vestibulum laoreet bibendum lacus, et hendrerit nisl scelerisque sed. Fusce dictum ligula sapien, at sagittis ligula ultrices vel. Aenean et fermentum metus, vel semper nunc. Vestibulum arcu libero, ullamcorper sit amet tellus fringilla, vehicula egestas nunc. Etiam ut arcu metus. Duis dignissim cursus lobortis. Nullam orci urna, semper vitae felis vel, blandit vehicula elit.</p>\r\n', 'EvidJuri', '65e5dc535782c.png', '0000-00-00', 5, 1),
(12, 50, '[\"3\"]', 'saiu na midia 1', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', '65ea019199cae.jpg', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', '<p>Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;</p>\r\n', 'teste', '65ea019199cae.jpg', '2024-02-27', 2, 1),
(13, 51, '[\"3\"]', 'blog 1', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', '65e9f92b6380e.jpg', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', '<p>Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;</p>\r\n', 'teste', '65e9b1bdc2bca.png', '2024-03-21', 2, 1),
(14, 52, '[\"3\"]', 'blog 1', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', '65e9f92b6380e.jpg', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', '<p>Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, &nbsp;consectetuer adipiscing elit, &nbsp;sed diam.&nbsp;</p>\r\n', 'blog', '65e73ba836a98.png', '2024-03-06', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `business`
--

CREATE TABLE `business` (
  `idBusiness` int(11) NOT NULL,
  `paginaId` int(11) DEFAULT NULL,
  `nomeBusiness` varchar(1000) DEFAULT NULL,
  `imagemBusiness` longtext DEFAULT NULL,
  `legendaImagemBusiness` varchar(500) DEFAULT NULL,
  `tituloBusiness` longtext DEFAULT NULL,
  `textoBusiness` longtext DEFAULT NULL,
  `categoriaBusiness` varchar(500) DEFAULT NULL,
  `nomeBotao1` varchar(100) DEFAULT NULL,
  `linkBotao1` varchar(500) DEFAULT NULL,
  `targetBotao1` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `business`
--

INSERT INTO `business` (`idBusiness`, `paginaId`, `nomeBusiness`, `imagemBusiness`, `legendaImagemBusiness`, `tituloBusiness`, `textoBusiness`, `categoriaBusiness`, `nomeBotao1`, `linkBotao1`, `targetBotao1`, `status`) VALUES
(6, 31, 'EVIDJURI', '65e72fb634302.svg', 'EVIDJURI', 'Empresas de todos os segmentos e advogados que necessitam de apoio técnico', '<p>A EVIDJURI foi o 1&deg; Escrit&oacute;rio T&eacute;cnico Full Service do Pa&iacute;s com foco em&nbsp;Produ&ccedil;&atilde;o de Provas para Processos Judiciais, contando hoje com + de&nbsp;350 t&eacute;cnicos espalhados pelo Brasil e vasta atua&ccedil;&atilde;o de Per&iacute;cias e&nbsp;Auditorias e atualmente tem + de 2,5 bilh&otilde;es em portf&oacute;lio de A&ccedil;&otilde;es.</p>\r\n', '', '', '', '', 1),
(7, 37, 'TRUST', '65e73306030db.svg', 'TRUST', 'Empresas de todos os segmentos e advogados que necessitam de apoio técnico', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in semper arcu. Aenean fringilla mauris erat, et blandit purus hendrerit eget. Quisque in sapien quis enim facilisis sollicitudin at ut massa. Suspendisse a nibh metus.</p>\r\n', '', '', '', '', 1),
(8, 38, 'AGRO', '65e5e6ac69370.png', 'AGRO', 'Empresas de todos os segmentos e advogados que necessitam de apoio técnico', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in semper arcu. Aenean fringilla mauris erat, et blandit purus hendrerit eget. Quisque in sapien quis enim facilisis sollicitudin at ut massa. Suspendisse a nibh metus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in semper arcu. Aenean fringilla mauris erat, et blandit purus hendrerit eget. Quisque in sapien quis enim facilisis sollicitudin at ut massa. Suspendisse a nibh metus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in semper arcu. Aenean fringilla mauris erat, et blandit purus hendrerit eget. Quisque in sapien quis enim facilisis sollicitudin at ut massa. Suspendisse a nibh metus.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in semper arcu. Aenean fringilla mauris erat, et blandit purus hendrerit eget. Quisque in sapien quis enim facilisis sollicitudin at ut massa. Suspendisse a nibh metus.</p>\r\n', '', '', '', '', 1),
(9, 39, 'VENTURES', '65e73309708dc.svg', 'VENTURES', 'Empresas de todos os segmentos e advogados que necessitam de apoio técnico', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in semper arcu. Aenean fringilla mauris erat, et blandit purus hendrerit eget. Quisque in sapien quis enim facilisis sollicitudin at ut massa. Suspendisse a nibh metus.</p>\r\n', '', '', '', '', 1),
(10, 46, 'VENTURES', '65e73309708dc.svg', 'VENTURES', 'Empresas de todos os segmentos e advogados que necessitam de apoio técnico', '<p>Lorem ipsum dolor sit amet. Sed earum voluptas ea perspiciatis corrupti est quae exercitationem cum atque explicabo est Quis corporis? Et laborum voluptate sit soluta quidem cum quae corporis. Aut veritatis quisquam et expedita ducimus cum exercitationem quisquam vel quia quos id architecto omnis vel nesciunt optio.</p>\r\n\r\n<p>Ea commodi dolorum in voluptatem animi sit rerum magni ut consequatur internos vel temporibus dicta non excepturi autem et numquam excepturi. Et impedit internos et dolor dolorum aut sint culpa ut odio repellat qui omnis totam quo asperiores magni vel sint corrupti. Et dolorem suscipit ea ipsa nihil ea mollitia ipsa in porro saepe non ullam nulla non architecto asperiores est ullam nihil. Non galisum dolor hic ratione blanditiis est quis magni est culpa dolores id explicabo tempore non ullam neque nam enim sunt.</p>\r\n', '', '', '', '', 1),
(11, 47, 'VENTURES 3', '65e73309708dc.svg', 'VENTURES 3', 'Empresas de todos os segmentos e advogados que necessitam de apoio técnico', '<p>Lorem ipsum dolor sit amet. Sed earum voluptas ea perspiciatis corrupti est quae exercitationem cum atque explicabo est Quis corporis? Et laborum voluptate sit soluta quidem cum quae corporis. Aut veritatis quisquam et expedita ducimus cum exercitationem quisquam vel quia quos id architecto omnis vel nesciunt optio.</p>\r\n\r\n<p>Ea commodi dolorum in voluptatem animi sit rerum magni ut consequatur internos vel temporibus dicta non excepturi autem et numquam excepturi. Et impedit internos et dolor dolorum aut sint culpa ut odio repellat qui omnis totam quo asperiores magni vel sint corrupti. Et dolorem suscipit ea ipsa nihil ea mollitia ipsa in porro saepe non ullam nulla non architecto asperiores est ullam nihil. Non galisum dolor hic ratione blanditiis est quis magni est culpa dolores id explicabo tempore non ullam neque nam enim sunt.</p>\r\n', '', '', '', '', 1),
(12, 48, 'VENTURES 4', '65e73309708dc.svg', 'VENTURES 4', 'Empresas de todos os segmentos e advogados que necessitam de apoio técnico', '<p>Lorem ipsum dolor sit amet. Sed earum voluptas ea perspiciatis corrupti est quae exercitationem cum atque explicabo est Quis corporis? Et laborum voluptate sit soluta quidem cum quae corporis. Aut veritatis quisquam et expedita ducimus cum exercitationem quisquam vel quia quos id architecto omnis vel nesciunt optio.</p>\r\n\r\n<p>Ea commodi dolorum in voluptatem animi sit rerum magni ut consequatur internos vel temporibus dicta non excepturi autem et numquam excepturi. Et impedit internos et dolor dolorum aut sint culpa ut odio repellat qui omnis totam quo asperiores magni vel sint corrupti. Et dolorem suscipit ea ipsa nihil ea mollitia ipsa in porro saepe non ullam nulla non architecto asperiores est ullam nihil. Non galisum dolor hic ratione blanditiis est quis magni est culpa dolores id explicabo tempore non ullam neque nam enim sunt.</p>\r\n', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `paginaId` int(11) NOT NULL,
  `tipoCategoria` int(11) NOT NULL,
  `nomeCategoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `paginaId`, `tipoCategoria`, `nomeCategoria`) VALUES
(2, 32, 1, 'cat'),
(3, 35, 1, 'categoria 2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `imagemCliente` longtext DEFAULT NULL,
  `legendaImagemCliente` varchar(500) DEFAULT NULL,
  `linkCliente` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`idCliente`, `imagemCliente`, `legendaImagemCliente`, `linkCliente`, `status`) VALUES
(1, '65e73f42958b1.png', 'caixa', 'https://www.caixa.gov.br/Paginas/home-caixa.aspx', 1),
(2, '65e68aa24dfc9.png', 'faculdade fortium', 'https://google.com.br', 1),
(3, '65e68ad9725d2.png', 'senac', 'https://senac.com.br', 1),
(4, '65e68b06a61ba.svg', 'unimed', 'https://unimed.com.br', 1),
(5, '65e73768c7021.svg', 'mitsubishi', 'https://www.mitsubishimotors.com.br/', 1),
(6, '65e73fb7b1063.svg', 'social bank', 'https://www.linkedin.com/company/meusocialbank/?originalSubdomain=br', 1),
(7, '65e7398584a0c.png', 'banco do brasil', 'https://www.bb.com.br/', 1),
(8, '65e68b06a61ba.svg', 'unimed 2', 'https://www.unimed.coop.br/site/', 1),
(9, '65e73fb7b1063.svg', 'social bank 2', 'https://www.linkedin.com/company/meusocialbank/?originalSubdomain=br', 1),
(10, '65e73f42958b1.png', 'caixa', 'caixa', 1),
(11, '65e73f42958b1.png', 'caixa', 'caixa', 1),
(12, '65e73f42958b1.png', 'caixa', 'caixa', 1),
(13, '65e73f42958b1.png', 'caixa', 'caixa', 1),
(15, '65e73fb7b1063.svg', 'social banck', 'social banck', 1),
(16, '65e73fb7b1063.svg', 'social banck', 'social banck', 1),
(17, '65e73fb7b1063.svg', 'social banck', 'social banck', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `contatos`
--

CREATE TABLE `contatos` (
  `idContato` int(11) NOT NULL,
  `telefoneContato` varchar(1000) DEFAULT NULL,
  `whatsappContato` varchar(100) DEFAULT NULL,
  `linkWhatsappContato` varchar(1000) DEFAULT NULL,
  `emailContato` varchar(1000) DEFAULT NULL,
  `enderecoContato` varchar(1000) DEFAULT NULL,
  `mapa` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contatos`
--

INSERT INTO `contatos` (`idContato`, `telefoneContato`, `whatsappContato`, `linkWhatsappContato`, `emailContato`, `enderecoContato`, `mapa`) VALUES
(1, '(12) 41234-1241', '(12) 12412-5351', 'https://api.whatsapp.com/send?phone=12124125351&text=Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ut sagittis neque, nec cursus eros. Nulla malesuada feugiat leo eget dignissim. Curabitur vel lorem id est eleifend molestie eget sed erat. Aliquam accumsan quam nec pharetra egestas. Etiam fringilla leo vel diam porta malesuada. Sed dui nibh, iaculis a ex quis, ultrices mattis arcu. In lobortis elit eu tempor posuere. Mauris a consequat quam, sed sodales massa.', 'assessoria@evidjuri.com.br', 'R. Helvécio Schiavinato, 281 - Vigilato Pereira, Uberlândia - MG, 38408-608', '<iframe\r\n            src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.1973529954835!2d-46.6564943!3d-23.5613545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c8da0aa315%3A0xd59f9431f2c9776a!2sAv.%20Paulista%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1709170155410!5m2!1spt-BR!2sbr\"\r\n            width=\"100%\" height=\"600\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"\r\n            referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Estrutura para tabela `conteudos`
--

CREATE TABLE `conteudos` (
  `idConteudo` int(11) NOT NULL,
  `paginaId` int(11) NOT NULL,
  `numeroConteudo` int(11) NOT NULL,
  `tituloConteudo` varchar(500) DEFAULT NULL,
  `imagem1Conteudo` longtext DEFAULT NULL,
  `imagem2Conteudo` longtext DEFAULT NULL,
  `imagem3Conteudo` longtext DEFAULT NULL,
  `imagem4Conteudo` longtext DEFAULT NULL,
  `legendaImagem1Conteudo` varchar(500) DEFAULT NULL,
  `legendaImagem2Conteudo` varchar(500) DEFAULT NULL,
  `legendaImagem3Conteudo` varchar(500) DEFAULT NULL,
  `legendaImagem4Conteudo` varchar(500) DEFAULT NULL,
  `linkVideoConteudo` longtext DEFAULT NULL,
  `textoConteudo` longtext DEFAULT NULL,
  `nomeBotao1` varchar(100) DEFAULT NULL,
  `linkBotao1` varchar(500) DEFAULT NULL,
  `targetBotao1` varchar(100) DEFAULT NULL,
  `nomeBotao2` varchar(100) DEFAULT NULL,
  `linkBotao2` varchar(500) DEFAULT NULL,
  `targetBotao2` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `conteudos`
--

INSERT INTO `conteudos` (`idConteudo`, `paginaId`, `numeroConteudo`, `tituloConteudo`, `imagem1Conteudo`, `imagem2Conteudo`, `imagem3Conteudo`, `imagem4Conteudo`, `legendaImagem1Conteudo`, `legendaImagem2Conteudo`, `legendaImagem3Conteudo`, `legendaImagem4Conteudo`, `linkVideoConteudo`, `textoConteudo`, `nomeBotao1`, `linkBotao1`, `targetBotao1`, `nomeBotao2`, `linkBotao2`, `targetBotao2`) VALUES
(17, 31, 1, '', '65e730005ba9e.png', '65e730005ba9e.png', 'null', 'null', 'Banner', 'Banner', '', '', '', '', '', '', '', '', '', ''),
(18, 31, 3, '', '65e9b1bdc2bca.png', 'null', 'null', 'null', 'Vídeo', '', '', '', '', '', '', '', '', '', '', ''),
(19, 1, 2, 'Soluções Especializadas: Auditorias, Recuperação de Impostos, Tecnologia e Mais', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Atuamos em todo o Brasil e globalmente, proporcionando inova&ccedil;&atilde;o e expertise para impulsionar resultados financeiros e evitar desgastes com fornecedores e matrizes.</p>\r\n', 'teste', 'teste', '_blank', '', '', ''),
(20, 1, 3, '', '65e5dc535782c.png', 'null', 'null', 'null', 'teste', '', '', '', '', '<p>Atuamos em todo o Brasil e globalmente , proporcionando inova&ccedil;&atilde;o e expertise para impulsionar resultados financeiros e evitar desgastes</p>\r\n', '', '', '', '', '', ''),
(21, 1, 6, '', '65e9b1bdc2bca.png', 'null', 'null', 'null', 'Vídeo', '', '', '', '', '<p>teste</p>\r\n', '', '', '', '', '', ''),
(22, 1, 7, '', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Apoiando nossos clientes, inovamos para otimizar resultados financeiros. Economizamos tempo, proporcionamos visibilidade total dos riscos, evitamos custos n&atilde;o previstos e protegemos contra desgastes com fornecedores, parceiros e descredenciamento da matriz.</p>\r\n', 'Saiba Mais', 'https://www.evidjuri.com.br/', '_blank', '', '', ''),
(24, 5, 1, '', '65df6a68b36b0.png', '65df6a7701085.png', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(25, 5, 2, '', '65e9b1bdc2bca.png', 'null', 'null', 'null', 'Vídeo', '', '', '', '', '', '', '', '', '', '', ''),
(26, 2, 1, 'Quem Somos', '65e72d3426e0c.png', '65e72d3426e0c.png', 'null', 'null', 'Banner', 'Banner', '', '', '', '', '', '', '', '', '', ''),
(27, 2, 2, '', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Presente no mercado de 2017 e atuando com&nbsp;profissionais cada vez mais especializados em cada&nbsp;neg&oacute;cio, somos um grupo empresarial composto por 6&nbsp;empresas dos mais variados setores, tais como:&nbsp;Auditorias, Per&iacute;cias e Assist&ecirc;ncia T&eacute;cnica, Recupera&ccedil;&atilde;o&nbsp;de Impostos e Compliance Fiscal, Desenvolvimento de&nbsp;Sistemas e Tecnologia, Consultorias Agron&ocirc;micas e&nbsp;Consultorias para Startups.</p>\r\n', '', '', '', '', '', ''),
(28, 2, 3, '', '65e72d06411b0.png', 'null', 'null', 'null', 'Atuamos em todo o brasil e globalmente, proporcionando inovação expertise para impulsionar resultados financeiros e evitar desgastes', '', '', '', '', '<p>Atuamos em todo o brasil e globalmente, proporcionando inova&ccedil;&atilde;o expertise para impulsionar resultados financeiros e evitar desgastes</p>\r\n', '', '', '', '', '', ''),
(29, 2, 4, '', '65e72e1b12c5a.png', 'null', 'null', 'null', 'Vídeo', '', '', '', 'https://www.youtube.com/watch?v=Y4goaZhNt4k', '<p>Al&eacute;m da nossa sede, localizada no Estado de Minas Gerais na Cidade de Uberl&acirc;ndia, tamb&eacute;m possu&iacute;mos Unidades T&eacute;cnicas e Comerciais em todo o Brasil. J&aacute; atuamos com clientes nos Estados Unidos, &Aacute;frica do Sul, Espanha, Austr&aacute;lia, Fran&ccedil;a, L&iacute;bano, Tun&iacute;sia, Jord&acirc;nia e Angola, pelo comprovado conhecimento dos experts que participam do grupo, estes segmentados por tipo de neg&oacute;cio.</p>\r\n\r\n<p>Atrav&eacute;s da inova&ccedil;&atilde;o, apoiamos nossos clientes na obten&ccedil;&atilde;o de melhores resultados financeiros, economizando tempo, tendo visibilidade total dos riscos, vitando, assim, custso n&atilde;o previstos e desgastes com fornecedores, parceiros e at&eacute; mesmo com sua matriz, em eventual descredenciamento.</p>\r\n\r\n<p>Nossa sede est&aacute; instalada em Uberl&acirc;ndia/MG, e contamos com Unidades e Representantes preparados para solucionar necesidades em todo Brasil.</p>\r\n', '', '', '', '', '', ''),
(30, 2, 5, '', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Apoiando nossos clientes, inovamos&nbsp;para otimizar resultados financeiros.&nbsp;Economizamos tempo,&nbsp;proporcionamos visibilidade total&nbsp;dos riscos, evitamos custos n&atilde;o&nbsp;previstos e protegemos contra&nbsp;desgastes com fornecedores,&nbsp;parceiros e descredenciamento da matriz.</p>\r\n', '', '', '', '', '', ''),
(31, 3, 1, '', '65df6a68b36b0.png', '65df6a7701085.png', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(32, 16, 1, 'teste', '65e73dba32b7b.png', '65e73dba32b7b.png', 'null', 'null', 'Banner', 'Banner', '', '', '', '', '', '', '', '', '', ''),
(33, 16, 2, '', '65e73db65506d.png', 'null', 'null', 'null', 'Contato', '', '', '', '', '', '', '', '', '', '', ''),
(34, 4, 1, '', '65df6a68b36b0.png', '65df6a7701085.png', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(35, 10, 1, '', '65df6a68b36b0.png', '65df6a7701085.png', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(36, 33, 1, '', '65e73b5fb55d5.png', '65e73b5fb55d5.png', 'null', 'null', 'Banner', 'Banner', '', '', '', '', '', '', '', '', '', ''),
(37, 31, 2, 'Técnicas de Projetos', 'null', 'null', 'null', 'null', '', '', '', '', '', '', 'a', 'a', '_blank', '', '', '_blank'),
(38, 31, 4, '', '65e73265b36c0.png', 'null', 'null', 'null', 'EVIDJURI', '', '', '', '', '', '', '', '', '', '', ''),
(39, 1, 1, '', '65df6a68b36b0.png', '65df6a7701085.png', 'null', 'null', 'teste', 'teste', '', '', 'https://www.youtube.com/watch?v=Y4goaZhNt4k', '<h1>Um grupo com&nbsp;</h1>\r\n\r\n<h1><span style=\"color:#f1c40f\">DNA </span>de resultados.</h1>\r\n', '', 'quem-somos', '_self', '', '', '_blank'),
(40, 1, 4, '13 estados e 7 países', '65e7287f87750.png', 'null', 'null', 'null', '13 estados e 7 países', '', '', '', '', '<p>Clientes em 13 estados do Brasil e outros 7 pa&iacute;ses</p>\r\n', '', '', '_blank', '', '', '_blank'),
(41, 1, 4, '+400 clientes', '65e728ade055e.png', 'null', 'null', 'null', '+400 clientes', '', '', '', '', '<p>+ de 400 clientes atendidos por todas as empresas do grupo.</p>\r\n', '', '', '_blank', '', '', '_blank'),
(42, 1, 5, 'teste', '65e7293d7f54b.svg', 'null', 'null', 'null', 'Cacau Show', 'SR. ALISSON BERNARDES', 'Diretor de Processos/TI da Carmen Steffens', '', 'https://www.youtube.com/watch?v=Y4goaZhNt4k', '<p>Antes da Cruvinel, n&oacute;s da Carmen Steffens conhec&iacute;amos muito pouco a respeito de<br />\r\nauditoria de contratos.</p>\r\n\r\n<p>Aliados com dedica&ccedil;&atilde;o e &eacute;tica, a Cruvinel abriu todo um leque de op&ccedil;&otilde;es para que pud&eacute;ssemos ter confian&ccedil;a em reestruturar essa &aacute;rea t&atilde;o pouco explorada. Por se tratar de uma empersa pioneira no ramo</p>\r\n', '', '', '_blank', '', '', '_blank'),
(43, 1, 8, 'Projetos, perícias, auditorias e assistência técnica judicial', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Projetos, per&iacute;cias, auditorias e assist&ecirc;ncia t&eacute;cnica judicial</p>\r\n', '', '', '_blank', '', '', '_blank'),
(44, 1, 8, 'Desenvolvimento de sistema e apps sob demanda', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Desenvolvimento de sistema e apps sob demanda</p>\r\n', '', '', '_blank', '', '', '_blank'),
(45, 1, 8, 'Recuperação de impostos , auditoria tributária e fiscal', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Recupera&ccedil;&atilde;o de impostos , auditoria tribut&aacute;ria e fiscal</p>\r\n', '', '', '_blank', '', '', '_blank'),
(46, 1, 8, 'Startup´s consultoria de negócios e validação para investidores', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Startup&acute;s consultoria de neg&oacute;cios e valida&ccedil;&atilde;o para investidores</p>\r\n', '', '', '_blank', '', '', '_blank'),
(47, 4, 2, '', '65e9b1bdc2bca.png', 'null', 'null', 'null', 'Vídeo', '', '', '', '', '', '', '', '', '', '', ''),
(48, 10, 2, '', '65e9b1bdc2bca.png', 'null', 'null', 'null', 'Vídeo', '', '', '', '', '', '', '', '', '', '', ''),
(49, 2, 6, 'Projetos, perícias, auditorias e assistência técnica judicial', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in semper arcu. Aenean fringilla mauris erat, et blandit purus hendrerit eget. Quisque in sapien quis enim facilisis sollicitudin at ut massa. Suspendisse a nibh metus. Phasellus eu auctor sapien. Curabitur placerat orci dolor, eu dapibus justo rutrum vitae.&nbsp;</p>\r\n', '', '', '_blank', '', '', '_blank'),
(50, 2, 6, 'Desenvolvimento de sistema e apps sob demanda', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in semper arcu. Aenean fringilla mauris erat, et blandit purus hendrerit eget. Quisque in sapien quis enim facilisis sollicitudin at ut massa. Suspendisse a nibh metus. Phasellus eu auctor sapien. Curabitur placerat orci dolor, eu dapibus justo rutrum vitae.&nbsp;</p>\r\n', '', '', '_blank', '', '', '_blank'),
(51, 2, 6, 'Recuperação de impostos , auditoria tributária e fiscal', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in semper arcu. Aenean fringilla mauris erat, et blandit purus hendrerit eget. Quisque in sapien quis enim facilisis sollicitudin at ut massa. Suspendisse a nibh metus. Phasellus eu auctor sapien. Curabitur placerat orci dolor, eu dapibus justo rutrum vitae.&nbsp;</p>\r\n', '', '', '_blank', '', '', '_blank'),
(52, 2, 7, '', '65e72c5e5d49d.png', 'null', 'null', 'null', 'teste', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(53, 2, 7, '', '65e72c68953b2.png', 'null', 'null', 'null', 'teste', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(54, 2, 7, '', '65e72c6d56b71.png', 'null', 'null', 'null', 'teste', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(55, 2, 8, '', 'null', 'null', 'null', 'null', '', '', '', '', 'https://www.youtube.com/watch?v=uu_B4ywAhOM', '', '', '', '', '', '', ''),
(56, 1, 5, 'teste', '65e5e6ac69370.png', 'null', 'null', 'null', 'teste', 'teste', 'teste', '', 'https://www.youtube.com/watch?v=Y4goaZhNt4k', '<p>Antes da Cruvinel, n&oacute;s da Carmen Steffens conhec&iacute;amos muito pouco a respeito de<br />\r\nauditoria de contratos.</p>\r\n\r\n<p>Antes da Cruvinel, n&oacute;s da Carmen Steffens conhec&iacute;amos muito pouco a respeito de<br />\r\nauditoria de contratos.</p>\r\n', '', '', '_blank', '', '', '_blank'),
(57, 1, 1, '', '65e5dc4c0399f.png', '6601c62a90775.png', 'null', 'null', 'teste', 'teste', '', '', '', '<h1>Um grupo com&nbsp;</h1>\r\n\r\n<h1><span style=\"color:#f1c40f\">DNA </span>de resultados.</h1>\r\n', 'Quem Somos', 'quem-somos', '_self', '', '', '_blank'),
(58, 1, 4, 'SOMOS 350', '65e5e5c347e75.png', 'null', 'null', 'null', 'teste', '', '', '', '', '<p>Mais de 350 parceiros e colaboradores especializados</p>\r\n', '', '', '_blank', '', '', '_blank'),
(59, 1, 4, '+ 2,5 bilhões', '65e728445a640.png', 'null', 'null', 'null', '+ 2,5 bilhões', '', '', '', '', '<p>Portf&oacute;lio de + de 2,5 bilh&otilde;es em a&ccedil;&otilde;es como assistentes t&eacute;cnicos e peritos</p>\r\n', '', '', '_blank', '', '', '_blank'),
(61, 1, 4, '2 milhões', '65e728e8b0409.png', 'null', 'null', 'null', '2 milhões', '', '', '', '', '<p>Mais de 2 milh&otilde;es em investimentos direcionados &agrave; tecnologia</p>\r\n', '', '', '_blank', '', '', '_blank'),
(64, 37, 1, '', '65e730005ba9e.png', '65e730005ba9e.png', 'null', 'null', 'Banner', 'Banner', '', '', '', '', '', '', '', '', '', ''),
(65, 37, 3, '', '65e731a640971.png', 'null', 'null', 'null', 'Vídeo', '', '', '', '', '', '', '', '', '', '', ''),
(66, 37, 4, '', '65e73265b36c0.png', 'null', 'null', 'null', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', '', '', '', '', '', '', '', '', '', '', ''),
(68, 1, 8, 'Consultoria agronômica multidisciplinar', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Consultoria agron&ocirc;mica multidisciplinar</p>\r\n', '', '', '_blank', '', '', '_blank'),
(69, 2, 6, 'Startup´s consultoria de negócios e validação para investidores', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in semper arcu. Aenean fringilla mauris erat, et blandit purus hendrerit eget. Quisque in sapien quis enim facilisis sollicitudin at ut massa. Suspendisse a nibh metus. Phasellus eu auctor sapien. Curabitur placerat orci dolor, eu dapibus justo rutrum vitae.&nbsp;</p>\r\n', '', '', '_blank', '', '', '_blank'),
(70, 2, 6, 'Consultoria agronômica multidisciplinar', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in semper arcu. Aenean fringilla mauris erat, et blandit purus hendrerit eget. Quisque in sapien quis enim facilisis sollicitudin at ut massa. Suspendisse a nibh metus. Phasellus eu auctor sapien. Curabitur placerat orci dolor, eu dapibus justo rutrum vitae.&nbsp;</p>\r\n', '', '', '_blank', '', '', '_blank'),
(71, 31, 2, 'Licenciamentos', 'null', 'null', 'null', 'null', '', '', '', '', '', '', 'a', 'a', '_blank', '', '', '_blank'),
(72, 31, 2, 'ERP', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(73, 31, 2, 'Financeira', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(74, 31, 2, 'Contábil', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(75, 31, 2, 'Contratual', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(76, 31, 2, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(77, 31, 2, 'Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(78, 31, 2, 'Compliance Público e Privado', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(79, 31, 2, 'Mapeamento de processos AS IS/ TO BE', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(80, 31, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(81, 31, 2, 'Valuation', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(82, 38, 1, '', '65e730005ba9e.png', '65e730005ba9e.png', 'null', 'null', 'Banner', 'Banner', '', '', '', '', '', '', '', '', '', ''),
(83, 38, 3, '', '65e731a640971.png', 'null', 'null', 'null', 'Vídeo', '', '', '', '', '', '', '', '', '', '', ''),
(84, 38, 4, '', '65e73265b36c0.png', 'null', 'null', 'null', 'Vídeo', '', '', '', '', '', '', '', '', '', '', ''),
(89, 39, 1, '', '65e730005ba9e.png', '65e730005ba9e.png', 'null', 'null', 'Banner', 'Banner', '', '', '', '', '', '', '', '', '', ''),
(90, 39, 3, '', '65e9b1bdc2bca.png', 'null', 'null', 'null', 'Vídeo', '', '', '', '', '', '', '', '', '', '', ''),
(91, 39, 4, '', '65e73265b36c0.png', 'null', 'null', 'null', 'Empresa', '', '', '', '', '', '', '', '', '', '', ''),
(92, 39, 2, 'ERP', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(93, 39, 2, 'Financeira', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(94, 39, 2, 'Contábil', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(98, 43, 1, '', '65e73b5fb55d5.png', '65e73b5fb55d5.png', 'null', 'null', 'Banner', 'Banner', '', '', '', '', '', '', '', '', '', ''),
(99, 43, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 17, 1, '', '65e73dba32b7b.png', '65ea019199cae.jpg', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(101, 17, 2, '', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Lorem ipsum dolor sit amet. In tempora obcaecati est optio libero sit doloribus ullam. Aut voluptatum quisquam eos quia voluptas et totam mollitia. A quia rerum ut inventore voluptates nam ducimus magni.</p>\r\n\r\n<p>Rem cumque internos qui cupiditate provident sed accusantium molestiae non quisquam doloribus eos sint minima sit veniam sunt aut molestiae error? Et eaque itaque qui provident ipsa aut tempora minima qui minus corporis et rerum beatae! Sed cupiditate cupiditate sit dolore minus qui eligendi autem et nostrum facilis non magni saepe!</p>\r\n\r\n<p>A incidunt harum est voluptatibus tenetur in nulla amet est necessitatibus galisum. Aut odit consectetur est iusto odio qui minima delectus quo repellat esse At amet autem et internos soluta! Sit porro quia qui autem inventore est libero culpa et ipsam omnis et debitis impedit hic ipsa deleniti!</p>\r\n', '', '', '', '', '', ''),
(102, 18, 2, '', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Lorem ipsum dolor sit amet. In tempora obcaecati est optio libero sit doloribus ullam. Aut voluptatum quisquam eos quia voluptas et totam mollitia. A quia rerum ut inventore voluptates nam ducimus magni.</p>\r\n\r\n<p>Rem cumque internos qui cupiditate provident sed accusantium molestiae non quisquam doloribus eos sint minima sit veniam sunt aut molestiae error? Et eaque itaque qui provident ipsa aut tempora minima qui minus corporis et rerum beatae! Sed cupiditate cupiditate sit dolore minus qui eligendi autem et nostrum facilis non magni saepe!</p>\r\n\r\n<p>A incidunt harum est voluptatibus tenetur in nulla amet est necessitatibus galisum. Aut odit consectetur est iusto odio qui minima delectus quo repellat esse At amet autem et internos soluta! Sit porro quia qui autem inventore est libero culpa et ipsam omnis et debitis impedit hic ipsa deleniti!</p>\r\n', '', '', '', '', '', ''),
(103, 18, 1, '', '65e73dba32b7b.png', '65ea019199cae.jpg', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(104, 19, 1, '', '65e73dba32b7b.png', '65ea019199cae.jpg', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(105, 19, 2, '', 'null', 'null', 'null', 'null', '', '', '', '', '', '<p>Lorem ipsum dolor sit amet. In tempora obcaecati est optio libero sit doloribus ullam. Aut voluptatum quisquam eos quia voluptas et totam mollitia. A quia rerum ut inventore voluptates nam ducimus magni.</p>\r\n\r\n<p>Rem cumque internos qui cupiditate provident sed accusantium molestiae non quisquam doloribus eos sint minima sit veniam sunt aut molestiae error? Et eaque itaque qui provident ipsa aut tempora minima qui minus corporis et rerum beatae! Sed cupiditate cupiditate sit dolore minus qui eligendi autem et nostrum facilis non magni saepe!</p>\r\n\r\n<p>A incidunt harum est voluptatibus tenetur in nulla amet est necessitatibus galisum. Aut odit consectetur est iusto odio qui minima delectus quo repellat esse At amet autem et internos soluta! Sit porro quia qui autem inventore est libero culpa et ipsam omnis et debitis impedit hic ipsa deleniti!</p>\r\n', '', '', '', '', '', ''),
(113, 38, 2, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(114, 38, 2, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(115, 38, 2, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(116, 38, 2, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(117, 38, 2, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(118, 38, 2, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(119, 38, 2, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(120, 38, 2, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(121, 38, 2, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(122, 38, 2, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(123, 38, 2, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(124, 38, 2, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(125, 37, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(127, 37, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(128, 37, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(129, 37, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(130, 37, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(131, 37, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(132, 37, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(133, 37, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(134, 37, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(135, 37, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(136, 37, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(137, 37, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(138, 39, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(139, 39, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(140, 39, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(141, 39, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(142, 39, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(143, 39, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(144, 39, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(145, 39, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(146, 39, 2, 'Assistências Técnicas Judiciais', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(147, 46, 1, '', '65e73dba32b7b.png', '65e73dba32b7b.png', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(148, 46, 3, '', '65e9b1bdc2bca.png', 'null', 'null', 'null', 'teste', '', '', '', '', '', '', '', '', '', '', ''),
(149, 46, 4, '', '65e9f92b6380e.jpg', 'null', 'null', 'null', 'teste', '', '', '', '', '', '', '', '', '', '', ''),
(152, 46, 2, 'VENTURES', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(154, 46, 2, 'VENTURES', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(156, 46, 2, 'VENTURES', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(157, 46, 2, 'VENTURES', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(158, 46, 2, 'VENTURES', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(159, 46, 2, 'VENTURES', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(160, 46, 2, 'VENTURES', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(161, 46, 2, 'VENTURES', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(162, 46, 2, 'VENTURES', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(163, 46, 2, 'VENTURES', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(164, 46, 2, 'VENTURES', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(165, 46, 2, 'VENTURES', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(166, 47, 1, '', '65e73dba32b7b.png', '65e73dba32b7b.png', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(167, 47, 3, '', '65ea019199cae.jpg', 'null', 'null', 'null', 'teste', '', '', '', '', '', '', '', '', '', '', ''),
(168, 47, 4, '', '65e9f92b6380e.jpg', 'null', 'null', 'null', 'teste', '', '', '', '', '', '', '', '', '', '', ''),
(169, 47, 2, 'VENTURES 3', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(170, 47, 2, 'VENTURES 3', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(171, 47, 2, 'VENTURES 3', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(172, 47, 2, 'VENTURES 3', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(173, 47, 2, 'VENTURES 3', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(174, 47, 2, 'VENTURES 3', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(175, 47, 2, 'VENTURES 3', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(176, 47, 2, 'VENTURES 3', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(177, 47, 2, 'VENTURES 3', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(178, 47, 2, 'VENTURES 3', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(179, 47, 2, 'VENTURES 3', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(180, 47, 2, 'VENTURES 3', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(181, 48, 1, '', '65e73dba32b7b.png', '65e73dba32b7b.png', 'null', 'null', '', '', '', '', '', '', '', '', '', '', '', ''),
(182, 48, 3, '', '65e9b1bdc2bca.png', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '', '', '', ''),
(183, 48, 4, '', '65e9f92b6380e.jpg', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '', '', '', ''),
(185, 48, 2, 'VENTURES 4', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(186, 48, 2, 'VENTURES 4', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(187, 48, 2, 'VENTURES 4', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(188, 48, 2, 'VENTURES 4', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(189, 48, 2, 'VENTURES 4', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(190, 48, 2, 'VENTURES 4', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(191, 48, 2, 'VENTURES 4', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(192, 48, 2, 'VENTURES 4', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(193, 48, 2, 'VENTURES 4', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(194, 48, 2, 'VENTURES 4', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(195, 48, 2, 'VENTURES 4', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(196, 48, 2, 'VENTURES 4', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(198, 50, 1, '', '65e73dba32b7b.png', '65e73dba32b7b.png', 'null', 'null', 'teste', '', '', '', '', '', '', '', '', '', '', ''),
(199, 51, 1, '', '65e73dba32b7b.png', '65e73dba32b7b.png', 'null', 'null', '', '', '', '', '', '', '', '', '', '', '', ''),
(200, 52, 1, '', '65e73dba32b7b.png', '65e73dba32b7b.png', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(201, 31, 5, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(202, 31, 5, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(203, 31, 5, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(204, 31, 5, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(205, 31, 5, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(206, 31, 5, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(207, 31, 5, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(208, 31, 5, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(209, 31, 5, 'Revisão e Reversão Técnica de Litígios', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(210, 31, 5, 'Conheça as instituições onde você pode estudar', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(211, 31, 5, 'Conheça as instituições onde você pode estudar', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(212, 31, 5, 'Conheça as instituições onde você pode estudar', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(213, 31, 5, 'Conheça as instituições onde você pode estudar', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(214, 31, 5, 'Conheça as instituições onde você pode estudar', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(215, 31, 5, 'Conheça as instituições onde você pode estudar, você pode estudar ', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(216, 31, 5, 'Conheça as instituições onde você pode estudar', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(217, 31, 5, 'Conheça as instituições onde você pode estudar', 'null', 'null', 'null', 'null', '', '', '', '', '', '', '', '', '_blank', '', '', '_blank'),
(218, 1, 9, '', '65e73f42958b1.png', 'null', 'null', 'null', 'teste', '', '', '', '', '', '', 'https://www.caixa.gov.br/', '_blank', '', '', '_blank'),
(219, 1, 9, '', '65e73fb7b1063.svg', 'null', 'null', 'null', '', '', '', '', '', '', '', 'https://www.caixa.gov.br/', '_blank', '', '', '_blank');

-- --------------------------------------------------------

--
-- Estrutura para tabela `destaques`
--

CREATE TABLE `destaques` (
  `idDestaque` int(11) NOT NULL,
  `idItem` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `emails`
--

CREATE TABLE `emails` (
  `idEmail` int(11) NOT NULL,
  `tituloPagina` varchar(500) DEFAULT NULL,
  `nome` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `emails`
--

INSERT INTO `emails` (`idEmail`, `tituloPagina`, `nome`, `email`, `telefone`) VALUES
(1, 'index', 'teste', 'teste@email.com', '(17) 99738-8093'),
(2, 'trabalhe-conosco', 'teste', 'teste@email.com', '17997388093'),
(3, 'trabalhe-conosco', 'teste', 'teste@email.com', '(17) 99738-8093'),
(4, 'trabalhe-conosco', 'teste', 'teste@email.com', '17997388093'),
(5, 'trabalhe-conosco', 'teste', 'teste@email.com', '(17) 99738-8093'),
(6, 'trabalhe-conosco', 'teste', 'teste', 'teste'),
(7, 'trabalhe-conosco', 'teste', 'teste', 'teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `formularios`
--

CREATE TABLE `formularios` (
  `idFormulario` int(11) NOT NULL,
  `paginaId` int(11) DEFAULT NULL,
  `descricaoFormulario` varchar(500) DEFAULT NULL,
  `emailFormulario` varchar(500) DEFAULT NULL,
  `select1Formulario` varchar(1000) DEFAULT NULL,
  `select2Formulario` varchar(1000) DEFAULT NULL,
  `select3Formulario` varchar(1000) DEFAULT NULL,
  `select4Formulario` varchar(1000) DEFAULT NULL,
  `select5Formulario` varchar(1000) DEFAULT NULL,
  `select6Formulario` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `formularios`
--

INSERT INTO `formularios` (`idFormulario`, `paginaId`, `descricaoFormulario`, `emailFormulario`, `select1Formulario`, `select2Formulario`, `select3Formulario`, `select4Formulario`, `select5Formulario`, `select6Formulario`) VALUES
(1, 16, NULL, 'italo.s.ferreira@hotmail.com', 'teste, teste 2, teste 3', '', '', '', '', ''),
(2, NULL, 'newsletter', 'italo.s.ferreira@hotmail.com', '', '', '', '', '', ''),
(3, 31, NULL, 'italo.s.ferreira@hotmail.com', '', '', '', '', '', ''),
(4, 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagens`
--

CREATE TABLE `imagens` (
  `idImagem` int(11) NOT NULL,
  `imagem` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imagens`
--

INSERT INTO `imagens` (`idImagem`, `imagem`) VALUES
(1, '65de61489c58e.png'),
(2, '65df6a68b36b0.png'),
(3, '65df6a7701085.png'),
(4, '65e5dc4c0399f.png'),
(5, '65e5dc4fe31e8.png'),
(6, '65e5dc535782c.png'),
(7, '65e5e5c347e75.png'),
(8, '65e5e6ac69370.png'),
(9, '65e68aa24dfc9.png'),
(10, '65e68ad9725d2.png'),
(11, '65e68b06a61ba.svg'),
(12, '65e68b63b5837.png'),
(13, '65e728445a640.png'),
(14, '65e7287f87750.png'),
(15, '65e728ade055e.png'),
(16, '65e728e8b0409.png'),
(17, '65e7293d7f54b.svg'),
(18, '65e72ae86933c.png'),
(19, '65e72c5e5d49d.png'),
(20, '65e72c68953b2.png'),
(21, '65e72c6d56b71.png'),
(22, '65e72d063ee7a.png'),
(23, '65e72d06411b0.png'),
(24, '65e72d3426e0c.png'),
(25, '65e72e1b12c5a.png'),
(26, '65e72fb634302.svg'),
(27, '65e730005ba9e.png'),
(28, '65e731a640971.png'),
(29, '65e73265b36c0.png'),
(30, '65e732c0d26b4.svg'),
(31, '65e73306030db.svg'),
(32, '65e73309708dc.svg'),
(33, '65e73683d0783.png'),
(34, '65e7368749fb3.png'),
(35, '65e7369033047.png'),
(36, '65e73698ce252.png'),
(37, '65e73768c7021.svg'),
(38, '65e73770b06d9.svg'),
(39, '65e73778cb461.svg'),
(40, '65e737ba9fb37.svg'),
(43, '65e7393cef9de.png'),
(44, '65e7398584a0c.png'),
(48, '65e73b5fb55d5.png'),
(49, '65e73b9eefee0.png'),
(50, '65e73ba1a9012.png'),
(51, '65e73ba4b27bd.png'),
(52, '65e73ba836a98.png'),
(53, '65e73db65506d.png'),
(54, '65e73dba32b7b.png'),
(55, '65e73f42958b1.png'),
(56, '65e73fb7b1063.svg'),
(57, '65e9b1bdc2bca.png'),
(58, '65e9f92b6380e.jpg'),
(59, '65ea019199cae.jpg'),
(60, '6601c62a90775.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `logs`
--

CREATE TABLE `logs` (
  `idLogs` int(11) NOT NULL,
  `usuarioId` int(11) DEFAULT NULL,
  `acaoLogs` varchar(500) DEFAULT NULL,
  `dataHoraLogs` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `logs`
--

INSERT INTO `logs` (`idLogs`, `usuarioId`, `acaoLogs`, `dataHoraLogs`) VALUES
(1, 1, 'excluiu a página de ID: 26', '2024-02-28 04:30:59'),
(2, 1, 'excluiu a página de ID: 27', '2024-02-28 04:31:00'),
(3, 1, 'cadastrou a página de ID: 28', '2024-02-28 04:31:04'),
(4, 1, 'cadastrou a página de ID: 29', '2024-02-28 04:32:18'),
(5, 1, 'cadastrou a página de ID: 30', '2024-02-28 04:32:30'),
(6, 1, 'excluiu a página de ID: 28', '2024-02-28 05:00:15'),
(7, 1, 'excluiu a página de ID: 30', '2024-02-28 05:00:32'),
(8, 1, 'excluiu a página de ID: 29', '2024-02-28 05:00:35'),
(9, 1, 'cadastrou a página de ID: 31', '2024-02-28 05:00:49'),
(10, 1, 'cadastrou a imagem 65df6a68b36b0.png', '2024-02-28 14:16:24'),
(11, 1, 'cadastrou a imagem 65df6a7701085.png', '2024-02-28 14:16:39'),
(12, 1, 'editou as informações do conteúdo de ID: 24', '2024-02-28 14:20:25'),
(13, 1, 'editou as informações do conteúdo de ID: 26', '2024-02-28 14:25:05'),
(14, 1, 'editou as informações do conteúdo de ID: 31', '2024-02-28 14:25:21'),
(15, 1, 'editou as informações do conteúdo de ID: 32', '2024-02-28 14:26:20'),
(16, 1, 'editou as informações do conteúdo de ID: 34', '2024-02-28 14:27:13'),
(17, 1, 'editou as informações do conteúdo de ID: 35', '2024-02-28 14:27:36'),
(18, 1, 'editou as informações dos contatos', '2024-02-29 08:30:14'),
(19, 1, 'editou as informações dos contatos', '2024-02-29 08:31:43'),
(20, 1, 'editou as informações do conteúdo de ID: 33', '2024-02-29 08:33:03'),
(21, 1, 'editou as informações do formulário de ID: 1 da página de ID: 16', '2024-02-29 08:41:40'),
(22, 1, 'cadastrou a página de ID: 32', '2024-02-29 08:51:33'),
(23, 1, 'cadastrou a página de ID: 33', '2024-02-29 08:52:59'),
(24, 1, 'editou as informações do blog de ID: 2', '2024-02-29 08:53:26'),
(25, 1, 'editou as informações da categoria de ID: 2', '2024-02-29 08:53:52'),
(26, 1, 'editou as informações do blog de ID: 2', '2024-02-29 08:54:07'),
(27, 1, 'editou as informações do business de ID: 6', '2024-03-01 10:47:30'),
(28, 1, 'editou as informações de SEO da página dinâmica: empresa-1 de ID: 31', '2024-03-01 10:51:35'),
(29, 1, 'editou as informações do business de ID: 6', '2024-03-01 10:51:52'),
(30, 1, 'editou as informações do blog de ID: 2', '2024-03-01 11:11:59'),
(31, 1, 'editou as informações do conteúdo de ID: 17', '2024-03-02 11:47:56'),
(32, 1, 'cadastrou o conteúdo de ID: 37', '2024-03-02 11:48:02'),
(33, 1, 'editou as informações do conteúdo de ID: 38', '2024-03-02 12:05:48'),
(34, 1, 'editou as informações do conteúdo de ID: 36', '2024-03-02 12:27:51'),
(35, 1, 'editou as informações do blog de ID: 2', '2024-03-02 12:31:39'),
(36, 1, 'editou as informações das redes sociais', '2024-03-03 12:10:43'),
(37, 1, 'editou as informações das redes sociais', '2024-03-03 12:11:10'),
(38, 1, 'cadastrou o conteúdo de ID: 39', '2024-03-03 16:24:32'),
(39, 1, 'editou as informações do conteúdo de ID: 39', '2024-03-03 16:25:21'),
(40, 1, 'editou as informações do conteúdo de ID: 39', '2024-03-03 16:25:55'),
(41, 1, 'editou as informações do conteúdo de ID: 19', '2024-03-03 16:27:42'),
(42, 1, 'editou as informações do conteúdo de ID: 20', '2024-03-03 16:27:58'),
(43, 1, 'cadastrou o conteúdo de ID: 40', '2024-03-03 16:29:46'),
(44, 1, 'cadastrou o conteúdo de ID: 41', '2024-03-03 16:29:51'),
(45, 1, 'cadastrou o conteúdo de ID: 42', '2024-03-03 16:30:01'),
(46, 1, 'editou as informações do conteúdo de ID: 22', '2024-03-03 16:35:37'),
(47, 1, 'cadastrou o conteúdo de ID: 43', '2024-03-03 16:35:42'),
(48, 1, 'cadastrou o conteúdo de ID: 44', '2024-03-03 16:35:44'),
(49, 1, 'cadastrou o conteúdo de ID: 45', '2024-03-03 16:35:46'),
(50, 1, 'cadastrou o conteúdo de ID: 46', '2024-03-03 16:35:47'),
(51, 1, 'editou as informações do conteúdo de ID: 25', '2024-03-03 17:33:47'),
(52, 1, 'editou as informações do conteúdo de ID: 25', '2024-03-03 17:47:08'),
(53, 1, 'editou as informações do conteúdo de ID: 25', '2024-03-03 17:47:14'),
(54, 1, 'editou as informações do conteúdo de ID: 21', '2024-03-03 17:54:05'),
(55, 1, 'editou as informações do conteúdo de ID: 48', '2024-03-03 17:57:04'),
(56, 1, 'editou as informações do conteúdo de ID: 47', '2024-03-03 17:57:18'),
(57, 1, 'editou as informações do conteúdo de ID: 18', '2024-03-03 18:05:10'),
(58, 1, 'editou as informações do conteúdo de ID: 27', '2024-03-03 22:01:26'),
(59, 1, 'editou as informações do conteúdo de ID: 28', '2024-03-03 22:01:37'),
(60, 1, 'editou as informações do conteúdo de ID: 29', '2024-03-03 22:01:52'),
(61, 1, 'editou as informações do conteúdo de ID: 30', '2024-03-03 22:03:02'),
(62, 1, 'cadastrou o conteúdo de ID: 49', '2024-03-03 22:03:06'),
(63, 1, 'cadastrou o conteúdo de ID: 50', '2024-03-03 22:03:10'),
(64, 1, 'cadastrou o conteúdo de ID: 51', '2024-03-03 22:03:12'),
(65, 1, 'cadastrou o conteúdo de ID: 52', '2024-03-03 22:03:28'),
(66, 1, 'cadastrou o conteúdo de ID: 53', '2024-03-03 22:03:31'),
(67, 1, 'cadastrou o conteúdo de ID: 54', '2024-03-03 22:03:34'),
(68, 1, 'editou as informações do conteúdo de ID: 55', '2024-03-03 22:09:33'),
(69, 1, 'editou as informações do conteúdo de ID: 29', '2024-03-03 22:19:02'),
(70, 1, 'editou as informações do conteúdo de ID: 39', '2024-03-03 22:42:40'),
(71, 1, 'editou as informações do conteúdo de ID: 42', '2024-03-03 22:50:24'),
(72, 1, 'cadastrou o conteúdo de ID: 56', '2024-03-03 22:50:28'),
(73, 1, 'editou as informações do conteúdo de ID: 39', '2024-03-04 11:33:13'),
(74, 1, 'editou as informações do conteúdo de ID: 39', '2024-03-04 11:33:24'),
(75, 1, 'cadastrou a imagem 65e5dc4c0399f.png', '2024-03-04 11:35:56'),
(76, 1, 'cadastrou a imagem 65e5dc4fe31e8.png', '2024-03-04 11:35:59'),
(77, 1, 'cadastrou a imagem 65e5dc535782c.png', '2024-03-04 11:36:03'),
(78, 1, 'cadastrou o conteúdo de ID: 57', '2024-03-04 11:37:47'),
(79, 1, 'editou as informações do conteúdo de ID: 39', '2024-03-04 11:45:49'),
(80, 1, 'editou as informações do conteúdo de ID: 57', '2024-03-04 11:46:02'),
(81, 1, 'editou as informações das redes sociais', '2024-03-04 11:46:33'),
(82, 1, 'editou as informações do conteúdo de ID: 19', '2024-03-04 12:01:30'),
(83, 1, 'editou as informações do conteúdo de ID: 20', '2024-03-04 12:01:41'),
(84, 1, 'editou as informações do conteúdo de ID: 19', '2024-03-04 12:07:07'),
(85, 1, 'editou as informações do conteúdo de ID: 19', '2024-03-04 12:08:20'),
(86, 1, 'editou as informações do conteúdo de ID: 20', '2024-03-04 12:09:19'),
(87, 1, 'cadastrou a imagem 65e5e5c347e75.png', '2024-03-04 12:16:19'),
(88, 1, 'cadastrou o conteúdo de ID: 58', '2024-03-04 12:16:24'),
(89, 1, 'editou as informações do conteúdo de ID: 40', '2024-03-04 12:16:35'),
(90, 1, 'editou as informações do conteúdo de ID: 41', '2024-03-04 12:16:43'),
(91, 1, 'cadastrou o conteúdo de ID: 59', '2024-03-04 12:16:57'),
(92, 1, 'cadastrou o conteúdo de ID: 60', '2024-03-04 12:17:03'),
(93, 1, 'cadastrou o conteúdo de ID: 61', '2024-03-04 12:17:15'),
(94, 1, 'cadastrou a imagem 65e5e6ac69370.png', '2024-03-04 12:20:12'),
(95, 1, 'editou as informações do conteúdo de ID: 42', '2024-03-04 12:20:18'),
(96, 1, 'editou as informações do conteúdo de ID: 42', '2024-03-04 12:20:55'),
(97, 1, 'editou as informações do conteúdo de ID: 56', '2024-03-04 12:22:05'),
(98, 1, 'editou as informações do formulário geral', '2024-03-04 13:06:16'),
(99, 1, 'editou as informações do formulário de ID: 3 da página de ID: 31', '2024-03-04 13:18:03'),
(100, 1, 'cadastrou a imagem 65e68aa24dfc9.png', '2024-03-04 23:59:46'),
(101, 1, 'cadastrou a imagem 65e68ad9725d2.png', '2024-03-05 00:00:41'),
(102, 1, 'cadastrou a imagem 65e68b06a61ba.svg', '2024-03-05 00:01:26'),
(103, 1, 'cadastrou a imagem 65e68b63b5837.png', '2024-03-05 00:02:59'),
(104, 1, 'cadastrou a página de ID: 34', '2024-03-05 00:03:04'),
(105, 1, 'editou as informações do conteúdo de ID: 62', '2024-03-05 00:03:21'),
(106, 1, 'editou as informações do blog de ID: 3', '2024-03-05 00:04:10'),
(107, 1, 'cadastrou a página de ID: 35', '2024-03-05 00:05:39'),
(108, 1, 'editou as informações da categoria de ID: 3', '2024-03-05 00:05:47'),
(109, 1, 'cadastrou a página de ID: 36', '2024-03-05 00:06:09'),
(110, 1, 'editou as informações do conteúdo de ID: 63', '2024-03-05 00:06:28'),
(111, 1, 'editou as informações do blog de ID: 4', '2024-03-05 00:07:16'),
(112, 1, 'editou as informações dos contatos', '2024-03-05 09:48:59'),
(113, 1, 'cadastrou a Servico de ID: 2', '2024-03-05 09:49:43'),
(114, 1, 'cadastrou a página de ID: 37', '2024-03-05 09:50:47'),
(115, 1, 'editou as informações do business de ID: 7', '2024-03-05 09:51:13'),
(116, 1, 'editou as informações do conteúdo de ID: 64', '2024-03-05 09:51:38'),
(117, 1, 'cadastrou o conteúdo de ID: 67', '2024-03-05 09:52:08'),
(118, 1, 'editou as informações do conteúdo de ID: 65', '2024-03-05 09:52:29'),
(119, 1, 'editou as informações do conteúdo de ID: 66', '2024-03-05 09:52:40'),
(120, 1, 'excluiu o conteúdo de ID: 60', '2024-03-05 11:11:39'),
(121, 1, 'cadastrou a imagem 65e728445a640.png', '2024-03-05 11:12:20'),
(122, 1, 'editou as informações do conteúdo de ID: 59', '2024-03-05 11:12:48'),
(123, 1, 'cadastrou a imagem 65e7287f87750.png', '2024-03-05 11:13:19'),
(124, 1, 'editou as informações do conteúdo de ID: 40', '2024-03-05 11:13:36'),
(125, 1, 'cadastrou a imagem 65e728ade055e.png', '2024-03-05 11:14:05'),
(126, 1, 'editou as informações do conteúdo de ID: 41', '2024-03-05 11:14:26'),
(127, 1, 'cadastrou a imagem 65e728e8b0409.png', '2024-03-05 11:15:04'),
(128, 1, 'editou as informações do conteúdo de ID: 61', '2024-03-05 11:15:53'),
(129, 1, 'cadastrou a imagem 65e7293d7f54b.svg', '2024-03-05 11:16:29'),
(130, 1, 'editou as informações do conteúdo de ID: 42', '2024-03-05 11:17:26'),
(131, 1, 'editou as informações do conteúdo de ID: 21', '2024-03-05 11:18:01'),
(132, 1, 'editou as informações do conteúdo de ID: 22', '2024-03-05 11:19:44'),
(133, 1, 'editou as informações do conteúdo de ID: 43', '2024-03-05 11:19:54'),
(134, 1, 'editou as informações do conteúdo de ID: 44', '2024-03-05 11:20:03'),
(135, 1, 'editou as informações do conteúdo de ID: 45', '2024-03-05 11:20:10'),
(136, 1, 'editou as informações do conteúdo de ID: 46', '2024-03-05 11:20:21'),
(137, 1, 'cadastrou o conteúdo de ID: 68', '2024-03-05 11:20:35'),
(138, 1, 'editou as informações do conteúdo de ID: 27', '2024-03-05 11:22:59'),
(139, 1, 'cadastrou a imagem 65e72ae86933c.png', '2024-03-05 11:23:36'),
(140, 1, 'editou as informações do conteúdo de ID: 29', '2024-03-05 11:26:53'),
(141, 1, 'editou as informações do conteúdo de ID: 30', '2024-03-05 11:27:30'),
(142, 1, 'editou as informações do conteúdo de ID: 49', '2024-03-05 11:27:54'),
(143, 1, 'editou as informações do conteúdo de ID: 50', '2024-03-05 11:28:06'),
(144, 1, 'editou as informações do conteúdo de ID: 51', '2024-03-05 11:28:16'),
(145, 1, 'cadastrou o conteúdo de ID: 69', '2024-03-05 11:28:25'),
(146, 1, 'cadastrou o conteúdo de ID: 70', '2024-03-05 11:28:36'),
(147, 1, 'cadastrou a imagem 65e72c5e5d49d.png', '2024-03-05 11:29:50'),
(148, 1, 'cadastrou a imagem 65e72c68953b2.png', '2024-03-05 11:30:00'),
(149, 1, 'cadastrou a imagem 65e72c6d56b71.png', '2024-03-05 11:30:05'),
(150, 1, 'editou as informações do conteúdo de ID: 52', '2024-03-05 11:30:10'),
(151, 1, 'editou as informações do conteúdo de ID: 53', '2024-03-05 11:30:17'),
(152, 1, 'editou as informações do conteúdo de ID: 54', '2024-03-05 11:30:24'),
(153, 1, 'editou as informações do conteúdo de ID: 54', '2024-03-05 11:30:28'),
(154, 1, 'editou as informações do conteúdo de ID: 29', '2024-03-05 11:31:26'),
(155, 1, 'editou as informações do conteúdo de ID: 29', '2024-03-05 11:31:32'),
(156, 1, 'editou as informações do conteúdo de ID: 29', '2024-03-05 11:31:46'),
(157, 1, 'editou as informações do conteúdo de ID: 28', '2024-03-05 11:32:11'),
(158, 1, 'cadastrou a imagem 65e72d063ee7a.png', '2024-03-05 11:32:38'),
(159, 1, 'cadastrou a imagem 65e72d06411b0.png', '2024-03-05 11:32:38'),
(160, 1, 'editou as informações do conteúdo de ID: 28', '2024-03-05 11:32:43'),
(161, 1, 'cadastrou a imagem 65e72d3426e0c.png', '2024-03-05 11:33:24'),
(162, 1, 'editou as informações do conteúdo de ID: 26', '2024-03-05 11:33:39'),
(163, 1, 'cadastrou a imagem 65e72e1b12c5a.png', '2024-03-05 11:37:15'),
(164, 1, 'editou as informações do conteúdo de ID: 29', '2024-03-05 11:37:29'),
(165, 1, 'editou as informações de SEO da página dinâmica: empresa-1 de ID: ', '2024-03-05 11:43:59'),
(166, 1, 'cadastrou a imagem 65e72fb634302.svg', '2024-03-05 11:44:06'),
(167, 1, 'editou as informações do business de ID: 6', '2024-03-05 11:44:50'),
(168, 1, 'cadastrou a imagem 65e730005ba9e.png', '2024-03-05 11:45:20'),
(169, 1, 'editou as informações do conteúdo de ID: 37', '2024-03-05 11:45:57'),
(170, 1, 'cadastrou o conteúdo de ID: 71', '2024-03-05 11:46:06'),
(171, 1, 'cadastrou o conteúdo de ID: 72', '2024-03-05 11:46:12'),
(172, 1, 'cadastrou o conteúdo de ID: 73', '2024-03-05 11:46:22'),
(173, 1, 'cadastrou o conteúdo de ID: 74', '2024-03-05 11:46:28'),
(174, 1, 'cadastrou o conteúdo de ID: 75', '2024-03-05 11:46:33'),
(175, 1, 'cadastrou o conteúdo de ID: 76', '2024-03-05 11:47:02'),
(176, 1, 'cadastrou o conteúdo de ID: 77', '2024-03-05 11:47:10'),
(177, 1, 'cadastrou o conteúdo de ID: 78', '2024-03-05 11:47:17'),
(178, 1, 'cadastrou o conteúdo de ID: 79', '2024-03-05 11:47:34'),
(179, 1, 'cadastrou o conteúdo de ID: 80', '2024-03-05 11:47:50'),
(180, 1, 'cadastrou o conteúdo de ID: 81', '2024-03-05 11:47:54'),
(181, 1, 'editou as informações de SEO da página dinâmica: empresa-1 de ID: ', '2024-03-05 11:48:16'),
(182, 1, 'editou as informações de SEO da página dinâmica: empresa-1 de ID: ', '2024-03-05 11:48:31'),
(183, 1, 'editou as informações de SEO da página dinâmica: empresa-1 de ID: ', '2024-03-05 11:48:46'),
(184, 1, 'editou as informações de SEO da página dinâmica: https://www.evidjuri.com.br/ de ID: ', '2024-03-05 11:49:21'),
(185, 1, 'editou as informações do business de ID: 6', '2024-03-05 11:50:25'),
(186, 1, 'editou as informações do conteúdo de ID: 17', '2024-03-05 11:51:06'),
(187, 1, 'cadastrou a imagem 65e731a640971.png', '2024-03-05 11:52:22'),
(188, 1, 'cadastrou a imagem 65e73265b36c0.png', '2024-03-05 11:55:33'),
(189, 1, 'editou as informações do conteúdo de ID: 38', '2024-03-05 11:55:43'),
(190, 1, 'cadastrou a imagem 65e732c0d26b4.svg', '2024-03-05 11:57:04'),
(191, 1, 'editou as informações do business de ID: 6', '2024-03-05 11:57:11'),
(192, 1, 'cadastrou a imagem 65e73306030db.svg', '2024-03-05 11:58:14'),
(193, 1, 'cadastrou a imagem 65e73309708dc.svg', '2024-03-05 11:58:17'),
(194, 1, 'editou as informações de SEO da página dinâmica: lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit de ID: ', '2024-03-05 11:58:25'),
(195, 1, 'editou as informações do business de ID: 7', '2024-03-05 11:59:00'),
(196, 1, 'editou as informações do business de ID: 7', '2024-03-05 11:59:11'),
(197, 1, 'editou as informações do business de ID: 7', '2024-03-05 11:59:48'),
(198, 1, 'editou as informações do conteúdo de ID: 64', '2024-03-05 12:00:20'),
(199, 1, 'editou as informações do conteúdo de ID: 65', '2024-03-05 12:00:37'),
(200, 1, 'editou as informações do conteúdo de ID: 66', '2024-03-05 12:00:46'),
(201, 1, 'editou as informações do business de ID: 7', '2024-03-05 12:01:22'),
(202, 1, 'cadastrou a página de ID: 38', '2024-03-05 12:02:57'),
(203, 1, 'editou as informações do business de ID: 8', '2024-03-05 12:03:48'),
(204, 1, 'editou as informações do conteúdo de ID: 82', '2024-03-05 12:04:03'),
(205, 1, 'cadastrou o conteúdo de ID: 85', '2024-03-05 12:04:16'),
(206, 1, 'cadastrou o conteúdo de ID: 86', '2024-03-05 12:04:21'),
(207, 1, 'cadastrou o conteúdo de ID: 87', '2024-03-05 12:04:24'),
(208, 1, 'cadastrou o conteúdo de ID: 88', '2024-03-05 12:05:47'),
(209, 1, 'editou as informações do conteúdo de ID: 83', '2024-03-05 12:06:00'),
(210, 1, 'editou as informações do conteúdo de ID: 84', '2024-03-05 12:06:11'),
(211, 1, 'cadastrou a página de ID: 39', '2024-03-05 12:08:55'),
(212, 1, 'editou as informações do business de ID: 9', '2024-03-05 12:09:20'),
(213, 1, 'editou as informações do conteúdo de ID: 89', '2024-03-05 12:09:31'),
(214, 1, 'cadastrou o conteúdo de ID: 92', '2024-03-05 12:09:38'),
(215, 1, 'cadastrou o conteúdo de ID: 93', '2024-03-05 12:09:44'),
(216, 1, 'cadastrou o conteúdo de ID: 94', '2024-03-05 12:09:51'),
(217, 1, 'editou as informações do conteúdo de ID: 90', '2024-03-05 12:10:08'),
(218, 1, 'editou as informações do conteúdo de ID: 91', '2024-03-05 12:11:13'),
(219, 1, 'editou as informações do Servico de ID: 2', '2024-03-05 12:12:09'),
(220, 1, 'cadastrou a imagem 65e73683d0783.png', '2024-03-05 12:13:07'),
(221, 1, 'cadastrou a imagem 65e7368749fb3.png', '2024-03-05 12:13:11'),
(222, 1, 'cadastrou a imagem 65e7369033047.png', '2024-03-05 12:13:20'),
(223, 1, 'cadastrou a imagem 65e73698ce252.png', '2024-03-05 12:13:28'),
(224, 1, 'editou as informações do Servico de ID: 1', '2024-03-05 12:13:40'),
(225, 1, 'cadastrou a Servico de ID: 3', '2024-03-05 12:13:52'),
(226, 1, 'editou as informações do Servico de ID: 3', '2024-03-05 12:14:00'),
(227, 1, 'cadastrou a Servico de ID: 4', '2024-03-05 12:14:18'),
(228, 1, 'cadastrou a Servico de ID: 5', '2024-03-05 12:14:32'),
(229, 1, 'editou as informações do business de ID: 6', '2024-03-05 12:16:07'),
(230, 1, 'cadastrou a imagem 65e73768c7021.svg', '2024-03-05 12:16:56'),
(231, 1, 'cadastrou a imagem 65e73770b06d9.svg', '2024-03-05 12:17:04'),
(232, 1, 'cadastrou a imagem 65e73778cb461.svg', '2024-03-05 12:17:12'),
(233, 1, 'cadastrou a imagem 65e737ba9fb37.svg', '2024-03-05 12:18:18'),
(234, 1, 'cadastrou a imagem 65e737bd3b696.svg', '2024-03-05 12:18:21'),
(235, 1, 'editou as informações do cliente de ID: 1', '2024-03-05 12:18:57'),
(236, 1, 'cadastrou a imagem 65e738d44edb2.png', '2024-03-05 12:23:00'),
(237, 1, 'editou as informações do cliente de ID: 1', '2024-03-05 12:23:05'),
(238, 1, 'editou as informações do cliente de ID: 1', '2024-03-05 12:23:15'),
(239, 1, 'cadastrou a imagem 65e7393cef9de.png', '2024-03-05 12:24:44'),
(240, 1, 'editou as informações do cliente de ID: 6', '2024-03-05 12:24:48'),
(241, 1, 'cadastrou a imagem 65e7398584a0c.png', '2024-03-05 12:25:57'),
(242, 1, 'excluiu a imagem 65e738d44edb2.png', '2024-03-05 12:26:14'),
(243, 1, 'excluiu a imagem 65e737bd3b696.svg', '2024-03-05 12:26:16'),
(244, 1, 'cadastrou a imagem 65e7399d9a725.png', '2024-03-05 12:26:21'),
(245, 1, 'editou as informações do cliente de ID: 1', '2024-03-05 12:26:36'),
(246, 1, 'excluiu a imagem 65e7399d9a725.png', '2024-03-05 12:27:27'),
(247, 1, 'cadastrou a imagem 65e739e352303.png', '2024-03-05 12:27:31'),
(248, 1, 'editou as informações do cliente de ID: 1', '2024-03-05 12:27:36'),
(249, 1, 'cadastrou a imagem 65e73a041226d.png', '2024-03-05 12:28:04'),
(250, 1, 'editou as informações do cliente de ID: 1', '2024-03-05 12:28:08'),
(251, 1, 'editou as informações de SEO da página dinâmica: blog-1 de ID: 33', '2024-03-05 12:33:33'),
(252, 1, 'cadastrou a imagem 65e73b5fb55d5.png', '2024-03-05 12:33:51'),
(253, 1, 'editou as informações do conteúdo de ID: 36', '2024-03-05 12:34:04'),
(254, 1, 'cadastrou a imagem 65e73b9eefee0.png', '2024-03-05 12:34:54'),
(255, 1, 'cadastrou a imagem 65e73ba1a9012.png', '2024-03-05 12:34:57'),
(256, 1, 'cadastrou a imagem 65e73ba4b27bd.png', '2024-03-05 12:35:00'),
(257, 1, 'cadastrou a imagem 65e73ba836a98.png', '2024-03-05 12:35:04'),
(258, 1, 'editou as informações do blog de ID: 2', '2024-03-05 12:36:04'),
(259, 1, 'editou as informações de SEO da página dinâmica: blog-de-teste de ID: 34', '2024-03-05 12:36:29'),
(260, 1, 'editou as informações do conteúdo de ID: 62', '2024-03-05 12:36:45'),
(261, 1, 'editou as informações do blog de ID: 3', '2024-03-05 12:37:21'),
(262, 1, 'editou as informações do blog de ID: 3', '2024-03-05 12:37:30'),
(263, 1, 'editou as informações de SEO da página dinâmica: blog-3 de ID: 36', '2024-03-05 12:37:58'),
(264, 1, 'editou as informações do conteúdo de ID: 63', '2024-03-05 12:38:04'),
(265, 1, 'editou as informações do blog de ID: 4', '2024-03-05 12:38:52'),
(266, 1, 'cadastrou a página de ID: 40', '2024-03-05 12:39:22'),
(267, 1, 'editou as informações do conteúdo de ID: 95', '2024-03-05 12:40:27'),
(268, 1, 'editou as informações do blog de ID: 5', '2024-03-05 12:41:00'),
(269, 1, 'cadastrou a página de ID: 40', '2024-03-05 12:41:25'),
(270, 1, 'editou as informações do conteúdo de ID: 95', '2024-03-05 12:41:29'),
(271, 1, 'editou as informações de SEO da página dinâmica: lorem-ipsum-dolor-sit-amet-consectetuer-adipiscing-elit-sed-diam de ID: 40', '2024-03-05 12:41:32'),
(272, 1, 'editou as informações do blog de ID: 5', '2024-03-05 12:41:42'),
(273, 1, 'cadastrou a página de ID: 40', '2024-03-05 12:41:53'),
(274, 1, 'editou as informações do conteúdo de ID: 95', '2024-03-05 12:41:55'),
(275, 1, 'editou as informações do blog de ID: 5', '2024-03-05 12:42:05'),
(276, 1, 'editou as informações do blog de ID: 5', '2024-03-05 12:42:17'),
(277, 1, 'editou as informações do blog de ID: 5', '2024-03-05 12:42:50'),
(278, 1, 'cadastrou a imagem 65e73db65506d.png', '2024-03-05 12:43:50'),
(279, 1, 'cadastrou a imagem 65e73dba32b7b.png', '2024-03-05 12:43:54'),
(280, 1, 'editou as informações do conteúdo de ID: 26', '2024-03-05 12:44:04'),
(281, 1, 'editou as informações de SEO da página fixa: contato de ID: 16', '2024-03-05 12:44:51'),
(282, 1, 'editou as informações do conteúdo de ID: 33', '2024-03-05 12:46:09'),
(283, 1, 'editou as informações do conteúdo de ID: 32', '2024-03-05 12:46:41'),
(284, 1, 'excluiu a imagem 65e73a041226d.png', '2024-03-05 12:50:19'),
(285, 1, 'excluiu a imagem 65e739e352303.png', '2024-03-05 12:50:21'),
(286, 1, 'cadastrou a imagem 65e73f42958b1.png', '2024-03-05 12:50:26'),
(287, 1, 'editou as informações do cliente de ID: 1', '2024-03-05 12:50:32'),
(288, 1, 'cadastrou a imagem 65e73fb7b1063.svg', '2024-03-05 12:52:23'),
(289, 1, 'editou as informações do cliente de ID: 6', '2024-03-05 12:52:27'),
(290, 1, 'editou as informações do conteúdo de ID: 26', '2024-03-05 12:56:02'),
(291, 1, 'cadastrou a imagem 65e9b1bdc2bca.png', '2024-03-07 09:23:25'),
(292, 1, 'editou as informações do conteúdo de ID: 48', '2024-03-07 09:24:10'),
(293, 1, 'editou as informações do conteúdo de ID: 47', '2024-03-07 09:24:26'),
(294, 1, 'editou as informações do conteúdo de ID: 21', '2024-03-07 09:24:51'),
(295, 1, 'editou as informações do conteúdo de ID: 25', '2024-03-07 09:25:13'),
(296, 1, 'editou as informações do conteúdo de ID: 48', '2024-03-07 10:11:58'),
(297, 1, 'editou as informações do conteúdo de ID: 47', '2024-03-07 10:12:33'),
(298, 1, 'editou as informações do conteúdo de ID: 21', '2024-03-07 10:12:57'),
(299, 1, 'editou as informações do conteúdo de ID: 25', '2024-03-07 10:13:13'),
(300, 1, 'editou as informações do conteúdo de ID: 83', '2024-03-07 14:23:07'),
(301, 1, 'editou as informações do conteúdo de ID: 18', '2024-03-07 14:23:16'),
(302, 1, 'editou as informações do conteúdo de ID: 18', '2024-03-07 14:23:38'),
(303, 1, 'editou as informações do conteúdo de ID: 83', '2024-03-07 14:23:49'),
(304, 1, 'editou as informações do conteúdo de ID: 65', '2024-03-07 14:24:00'),
(305, 1, 'editou as informações do conteúdo de ID: 90', '2024-03-07 14:24:18'),
(306, 1, 'editou as informações do conteúdo de ID: 18', '2024-03-07 14:25:38'),
(307, 1, 'cadastrou a imagem 65e9f92b6380e.jpg', '2024-03-07 14:28:11'),
(308, 1, 'editou as informações do blog de ID: 2', '2024-03-07 14:28:18'),
(309, 1, 'editou as informações do blog de ID: 3', '2024-03-07 14:28:29'),
(310, 1, 'excluiu a página de ID: 34', '2024-03-07 14:28:41'),
(311, 1, 'editou as informações do conteúdo de ID: undefined', '2024-03-07 14:29:07'),
(312, 1, 'editou as informações do blog de ID: ', '2024-03-07 14:30:06'),
(313, 1, 'editou as informações do conteúdo de ID: undefined', '2024-03-07 14:30:08'),
(314, 1, 'editou as informações de SEO da página dinâmica: lorem-ipsum-dolor-sit-amet-consectetuer-adipiscing-elit-sed-diam de ID: 40', '2024-03-07 14:30:09'),
(315, 1, 'excluiu a página de ID: 42', '2024-03-07 14:38:07'),
(316, 1, 'excluiu a página de ID: 41', '2024-03-07 14:38:08'),
(317, 1, 'excluiu a página de ID: 40', '2024-03-07 14:40:25'),
(318, 1, 'cadastrou a página de ID: 43', '2024-03-07 14:40:42'),
(319, 1, 'editou as informações do conteúdo de ID: 98', '2024-03-07 14:41:06'),
(320, 1, 'editou as informações do blog de ID: 8', '2024-03-07 14:41:45'),
(321, 1, 'editou as informações do blog de ID: 8', '2024-03-07 14:45:18'),
(322, 1, 'cadastrou a página de ID: 43', '2024-03-07 15:03:07'),
(323, 1, 'editou as informações de SEO da página dinâmica: lorem-ipsum-dolor-sit-amet-consectetuer-adipiscing-elit-sed-diam de ID: ', '2024-03-07 15:03:20'),
(324, 1, 'cadastrou a imagem 65ea019199cae.jpg', '2024-03-07 15:04:01'),
(325, 1, 'editou as informações do blog de ID: ', '2024-03-07 15:04:34'),
(326, 1, 'editou as informações de SEO da página fixa: termos-de-uso de ID: 17', '2024-03-08 09:55:00'),
(327, 1, 'editou as informações do conteúdo de ID: 100', '2024-03-08 09:55:14'),
(328, 1, 'editou as informações do conteúdo de ID: 101', '2024-03-08 09:55:41'),
(329, 1, 'editou as informações do conteúdo de ID: 102', '2024-03-08 09:55:48'),
(330, 1, 'editou as informações do conteúdo de ID: 105', '2024-03-08 09:55:55'),
(331, 1, 'editou as informações de SEO da página fixa: seguranca-no-uso-da-internet de ID: 19', '2024-03-08 09:56:01'),
(332, 1, 'editou as informações do conteúdo de ID: 104', '2024-03-08 09:56:10'),
(333, 1, 'editou as informações de SEO da página fixa: politica-de-privacidade de ID: 18', '2024-03-08 09:56:16'),
(334, 1, 'editou as informações do conteúdo de ID: 103', '2024-03-08 09:56:26'),
(335, 1, 'excluiu a página de ID: 44', '2024-03-12 09:47:58'),
(336, 1, 'cadastrou a página de ID: 45', '2024-03-12 09:48:29'),
(337, 1, 'editou as informações do conteúdo de ID: 106', '2024-03-12 09:49:05'),
(338, 1, 'editou as informações do blog de ID: 10', '2024-03-12 09:50:16'),
(339, 1, 'editou as informações do conteúdo de ID: 106', '2024-03-12 09:50:20'),
(340, 1, 'editou as informações de SEO da página dinâmica: lorem-ipsum-dolor-sit-amet--consectetuer-adipiscing-elit--sed-diam- de ID: 45', '2024-03-12 09:50:22'),
(341, 1, 'editou as informações do conteúdo de ID: 21', '2024-03-12 11:09:33'),
(342, 1, 'editou as informações do business de ID: 8', '2024-03-12 12:36:55'),
(343, 1, 'editou as informações do conteúdo de ID: 39', '2024-03-12 13:31:23'),
(344, 1, 'editou as informações do conteúdo de ID: 57', '2024-03-12 13:31:39'),
(345, 1, 'editou as informações do conteúdo de ID: 28', '2024-03-12 13:41:55'),
(346, 1, 'editou as informações do conteúdo de ID: 28', '2024-03-12 13:41:59'),
(347, 1, 'editou as informações do conteúdo de ID: 28', '2024-03-12 13:42:24'),
(348, 1, 'cadastrou o conteúdo de ID: 107', '2024-03-12 14:40:11'),
(349, 1, 'cadastrou o conteúdo de ID: 108', '2024-03-12 14:40:15'),
(350, 1, 'cadastrou o conteúdo de ID: 109', '2024-03-12 14:40:18'),
(351, 1, 'cadastrou o conteúdo de ID: 110', '2024-03-12 14:40:38'),
(352, 1, 'excluiu o conteúdo de ID: 87', '2024-03-12 14:40:41'),
(353, 1, 'excluiu o conteúdo de ID: 107', '2024-03-12 14:40:42'),
(354, 1, 'excluiu o conteúdo de ID: 108', '2024-03-12 14:40:43'),
(355, 1, 'excluiu o conteúdo de ID: 109', '2024-03-12 14:40:43'),
(356, 1, 'cadastrou o conteúdo de ID: 111', '2024-03-12 14:42:17'),
(357, 1, 'cadastrou o conteúdo de ID: 112', '2024-03-12 14:42:18'),
(358, 1, 'excluiu o conteúdo de ID: 88', '2024-03-12 14:42:53'),
(359, 1, 'excluiu o conteúdo de ID: 86', '2024-03-12 14:42:55'),
(360, 1, 'excluiu o conteúdo de ID: 110', '2024-03-12 14:42:56'),
(361, 1, 'excluiu o conteúdo de ID: 111', '2024-03-12 14:42:58'),
(362, 1, 'excluiu o conteúdo de ID: 85', '2024-03-12 14:43:00'),
(363, 1, 'cadastrou o conteúdo de ID: 113', '2024-03-12 14:43:35'),
(364, 1, 'cadastrou o conteúdo de ID: 114', '2024-03-12 14:43:36'),
(365, 1, 'cadastrou o conteúdo de ID: 115', '2024-03-12 14:43:37'),
(366, 1, 'cadastrou o conteúdo de ID: 116', '2024-03-12 14:43:39'),
(367, 1, 'cadastrou o conteúdo de ID: 117', '2024-03-12 14:43:40'),
(368, 1, 'cadastrou o conteúdo de ID: 118', '2024-03-12 14:43:41'),
(369, 1, 'cadastrou o conteúdo de ID: 119', '2024-03-12 14:43:43'),
(370, 1, 'cadastrou o conteúdo de ID: 120', '2024-03-12 14:43:58'),
(371, 1, 'cadastrou o conteúdo de ID: 121', '2024-03-12 14:43:59'),
(372, 1, 'cadastrou o conteúdo de ID: 122', '2024-03-12 14:44:00'),
(373, 1, 'cadastrou o conteúdo de ID: 123', '2024-03-12 14:44:05'),
(374, 1, 'cadastrou o conteúdo de ID: 124', '2024-03-12 14:44:09'),
(375, 1, 'excluiu o conteúdo de ID: 67', '2024-03-12 14:45:23'),
(376, 1, 'cadastrou o conteúdo de ID: 125', '2024-03-12 14:45:25'),
(377, 1, 'cadastrou o conteúdo de ID: 126', '2024-03-12 14:45:25'),
(378, 1, 'editou as informações do conteúdo de ID: 125', '2024-03-12 14:46:02'),
(379, 1, 'cadastrou o conteúdo de ID: 127', '2024-03-12 14:46:06'),
(380, 1, 'cadastrou o conteúdo de ID: 128', '2024-03-12 14:46:07'),
(381, 1, 'cadastrou o conteúdo de ID: 129', '2024-03-12 14:46:09'),
(382, 1, 'cadastrou o conteúdo de ID: 130', '2024-03-12 14:46:10'),
(383, 1, 'cadastrou o conteúdo de ID: 131', '2024-03-12 14:46:11'),
(384, 1, 'cadastrou o conteúdo de ID: 132', '2024-03-12 14:46:12'),
(385, 1, 'cadastrou o conteúdo de ID: 133', '2024-03-12 14:46:14'),
(386, 1, 'cadastrou o conteúdo de ID: 134', '2024-03-12 14:46:15'),
(387, 1, 'cadastrou o conteúdo de ID: 135', '2024-03-12 14:46:16'),
(388, 1, 'cadastrou o conteúdo de ID: 136', '2024-03-12 14:46:25'),
(389, 1, 'cadastrou o conteúdo de ID: 137', '2024-03-12 14:46:26'),
(390, 1, 'cadastrou o conteúdo de ID: 138', '2024-03-12 14:46:48'),
(391, 1, 'cadastrou o conteúdo de ID: 139', '2024-03-12 14:46:49'),
(392, 1, 'cadastrou o conteúdo de ID: 140', '2024-03-12 14:46:51'),
(393, 1, 'cadastrou o conteúdo de ID: 141', '2024-03-12 14:46:52'),
(394, 1, 'cadastrou o conteúdo de ID: 142', '2024-03-12 14:46:53'),
(395, 1, 'cadastrou o conteúdo de ID: 143', '2024-03-12 14:46:54'),
(396, 1, 'cadastrou o conteúdo de ID: 144', '2024-03-12 14:46:55'),
(397, 1, 'cadastrou o conteúdo de ID: 145', '2024-03-12 14:46:56'),
(398, 1, 'cadastrou o conteúdo de ID: 146', '2024-03-12 14:47:01'),
(399, 1, 'cadastrou a Servico de ID: 6', '2024-03-12 14:57:32'),
(400, 1, 'cadastrou a Servico de ID: 7', '2024-03-12 14:57:38'),
(401, 1, 'cadastrou a Servico de ID: 8', '2024-03-12 14:57:44'),
(402, 1, 'cadastrou a Servico de ID: 9', '2024-03-12 14:57:49'),
(403, 1, 'cadastrou a Servico de ID: 10', '2024-03-12 14:58:00'),
(404, 1, 'cadastrou a Servico de ID: 11', '2024-03-12 14:58:07'),
(405, 1, 'cadastrou a Servico de ID: 12', '2024-03-12 14:58:14'),
(406, 1, 'cadastrou a Servico de ID: 13', '2024-03-12 14:58:19'),
(407, 1, 'editou as informações do conteúdo de ID: 83', '2024-03-12 15:02:32'),
(408, 1, 'editou as informações do conteúdo de ID: 18', '2024-03-12 15:02:39'),
(409, 1, 'editou as informações do conteúdo de ID: 65', '2024-03-12 15:02:50'),
(410, 1, 'editou as informações do conteúdo de ID: 90', '2024-03-12 15:02:57'),
(411, 1, 'editou as informações do Servico de ID: 6', '2024-03-12 15:08:01'),
(412, 1, 'editou as informações do Servico de ID: 6', '2024-03-12 15:08:23'),
(413, 1, 'editou as informações do conteúdo de ID: 47', '2024-03-12 15:16:57'),
(414, 1, 'editou as informações do conteúdo de ID: 48', '2024-03-12 15:17:06'),
(415, 1, 'editou as informações do conteúdo de ID: 25', '2024-03-12 15:17:26'),
(416, 1, 'cadastrou a página de ID: 46', '2024-03-12 15:18:18'),
(417, 1, 'editou as informações do business de ID: 10', '2024-03-12 15:18:41'),
(418, 1, 'editou as informações do conteúdo de ID: 147', '2024-03-12 15:18:51'),
(419, 1, 'editou as informações do conteúdo de ID: 148', '2024-03-12 15:18:57'),
(420, 1, 'editou as informações do conteúdo de ID: 149', '2024-03-12 15:19:07'),
(421, 1, 'cadastrou o conteúdo de ID: 150', '2024-03-12 15:19:23'),
(422, 1, 'cadastrou o conteúdo de ID: 151', '2024-03-12 15:19:24'),
(423, 1, 'cadastrou o conteúdo de ID: 152', '2024-03-12 15:19:25'),
(424, 1, 'cadastrou o conteúdo de ID: 153', '2024-03-12 15:19:27'),
(425, 1, 'cadastrou o conteúdo de ID: 154', '2024-03-12 15:19:28'),
(426, 1, 'cadastrou o conteúdo de ID: 155', '2024-03-12 15:19:30'),
(427, 1, 'cadastrou o conteúdo de ID: 156', '2024-03-12 15:19:31'),
(428, 1, 'cadastrou o conteúdo de ID: 157', '2024-03-12 15:19:32'),
(429, 1, 'cadastrou o conteúdo de ID: 158', '2024-03-12 15:19:33'),
(430, 1, 'cadastrou o conteúdo de ID: 159', '2024-03-12 15:19:34'),
(431, 1, 'cadastrou o conteúdo de ID: 160', '2024-03-12 15:19:35'),
(432, 1, 'cadastrou o conteúdo de ID: 161', '2024-03-12 15:19:36'),
(433, 1, 'cadastrou o conteúdo de ID: 162', '2024-03-12 15:19:37'),
(434, 1, 'cadastrou o conteúdo de ID: 163', '2024-03-12 15:19:38'),
(435, 1, 'cadastrou o conteúdo de ID: 164', '2024-03-12 15:19:39'),
(436, 1, 'cadastrou o conteúdo de ID: 165', '2024-03-12 15:19:41'),
(437, 1, 'excluiu o conteúdo de ID: 150', '2024-03-12 15:19:57'),
(438, 1, 'excluiu o conteúdo de ID: 151', '2024-03-12 15:19:58'),
(439, 1, 'excluiu o conteúdo de ID: 153', '2024-03-12 15:20:03'),
(440, 1, 'excluiu o conteúdo de ID: 155', '2024-03-12 15:20:04'),
(441, 1, 'cadastrou a página de ID: 47', '2024-03-12 15:20:31'),
(442, 1, 'editou as informações do business de ID: 11', '2024-03-12 15:20:42'),
(443, 1, 'editou as informações do conteúdo de ID: 166', '2024-03-12 15:21:05'),
(444, 1, 'cadastrou o conteúdo de ID: 169', '2024-03-12 15:21:08'),
(445, 1, 'editou as informações do conteúdo de ID: 169', '2024-03-12 15:21:15'),
(446, 1, 'cadastrou o conteúdo de ID: 170', '2024-03-12 15:21:17'),
(447, 1, 'cadastrou o conteúdo de ID: 171', '2024-03-12 15:21:18'),
(448, 1, 'cadastrou o conteúdo de ID: 172', '2024-03-12 15:21:20'),
(449, 1, 'cadastrou o conteúdo de ID: 173', '2024-03-12 15:21:21'),
(450, 1, 'cadastrou o conteúdo de ID: 174', '2024-03-12 15:21:22'),
(451, 1, 'cadastrou o conteúdo de ID: 175', '2024-03-12 15:21:23'),
(452, 1, 'cadastrou o conteúdo de ID: 176', '2024-03-12 15:21:24'),
(453, 1, 'cadastrou o conteúdo de ID: 177', '2024-03-12 15:21:25'),
(454, 1, 'cadastrou o conteúdo de ID: 178', '2024-03-12 15:21:42'),
(455, 1, 'cadastrou o conteúdo de ID: 179', '2024-03-12 15:21:43'),
(456, 1, 'cadastrou o conteúdo de ID: 180', '2024-03-12 15:21:44'),
(457, 1, 'editou as informações do conteúdo de ID: 167', '2024-03-12 15:21:50'),
(458, 1, 'editou as informações do conteúdo de ID: 168', '2024-03-12 15:21:54'),
(459, 1, 'editou as informações do business de ID: 11', '2024-03-12 15:22:11'),
(460, 1, 'editou as informações do business de ID: 10', '2024-03-12 15:22:22'),
(461, 1, 'editou as informações do business de ID: 10', '2024-03-12 15:22:52'),
(462, 1, 'editou as informações do business de ID: 11', '2024-03-12 15:23:01'),
(463, 1, 'cadastrou a página de ID: 48', '2024-03-12 15:23:28'),
(464, 1, 'editou as informações do business de ID: 12', '2024-03-12 15:23:44'),
(465, 1, 'editou as informações do conteúdo de ID: 181', '2024-03-12 15:23:52'),
(466, 1, 'cadastrou o conteúdo de ID: 184', '2024-03-12 15:23:59'),
(467, 1, 'cadastrou o conteúdo de ID: 185', '2024-03-12 15:24:00'),
(468, 1, 'cadastrou o conteúdo de ID: 186', '2024-03-12 15:24:01'),
(469, 1, 'cadastrou o conteúdo de ID: 187', '2024-03-12 15:24:02'),
(470, 1, 'cadastrou o conteúdo de ID: 188', '2024-03-12 15:24:03'),
(471, 1, 'cadastrou o conteúdo de ID: 189', '2024-03-12 15:24:04'),
(472, 1, 'cadastrou o conteúdo de ID: 190', '2024-03-12 15:24:05'),
(473, 1, 'cadastrou o conteúdo de ID: 191', '2024-03-12 15:24:06'),
(474, 1, 'cadastrou o conteúdo de ID: 192', '2024-03-12 15:24:07'),
(475, 1, 'cadastrou o conteúdo de ID: 193', '2024-03-12 15:24:08'),
(476, 1, 'cadastrou o conteúdo de ID: 194', '2024-03-12 15:24:09'),
(477, 1, 'cadastrou o conteúdo de ID: 195', '2024-03-12 15:24:10'),
(478, 1, 'cadastrou o conteúdo de ID: 196', '2024-03-12 15:24:11'),
(479, 1, 'excluiu o conteúdo de ID: 184', '2024-03-12 15:24:36'),
(480, 1, 'editou as informações do conteúdo de ID: 182', '2024-03-12 15:24:44'),
(481, 1, 'editou as informações do conteúdo de ID: 183', '2024-03-12 15:24:48'),
(482, 1, 'cadastrou a Cliente de ID: 10', '2024-03-12 15:35:45'),
(483, 1, 'cadastrou a Cliente de ID: 11', '2024-03-12 15:35:51'),
(484, 1, 'cadastrou a Cliente de ID: 12', '2024-03-12 15:35:57'),
(485, 1, 'cadastrou a Cliente de ID: 13', '2024-03-12 15:36:02'),
(486, 1, 'cadastrou a Cliente de ID: 14', '2024-03-12 15:36:19'),
(487, 1, 'cadastrou a Cliente de ID: 15', '2024-03-12 15:36:24'),
(488, 1, 'cadastrou a Cliente de ID: 16', '2024-03-12 15:36:28'),
(489, 1, 'editou as informações do cliente de ID: 15', '2024-03-12 15:36:52'),
(490, 1, 'editou as informações do cliente de ID: 16', '2024-03-12 15:36:58'),
(491, 1, 'cadastrou a Cliente de ID: 17', '2024-03-12 15:37:59'),
(492, 1, 'cadastrou a página de ID: 45', '2024-03-12 16:21:58'),
(493, 1, 'editou as informações de SEO da página dinâmica: lorem-ipsum-dolor-sit-amet--consectetuer-adipiscing-elit--sed-diam- de ID: 45', '2024-03-12 16:22:09'),
(494, 1, 'editou as informações de SEO da página dinâmica: lorem-ipsum-dolor-sit-amet--consectetuer-adipiscing-elit--sed-diam- de ID: ', '2024-03-12 16:22:32'),
(495, 1, 'editou as informações de SEO da página dinâmica: blog-2 de ID: ', '2024-03-12 16:22:43'),
(496, 1, 'editou as informações de SEO da página dinâmica: blog-3 de ID: ', '2024-03-12 16:22:51'),
(497, 1, 'editou as informações de SEO da página dinâmica: blog4 de ID: ', '2024-03-12 16:23:00'),
(498, 1, 'excluiu a página de ID: 36', '2024-03-12 16:23:17'),
(499, 1, 'excluiu a página de ID: 45', '2024-03-12 16:23:19'),
(500, 1, 'editou as informações de SEO da página dinâmica: blog-4 de ID: ', '2024-03-12 16:23:40'),
(501, 1, 'cadastrou a página de ID: 50', '2024-03-12 16:23:51'),
(502, 1, 'cadastrou a página de ID: 51', '2024-03-12 16:24:01'),
(503, 1, 'cadastrou a página de ID: 52', '2024-03-12 16:24:09'),
(504, 1, 'editou as informações do conteúdo de ID: 200', '2024-03-12 16:25:05'),
(505, 1, 'editou as informações do blog de ID: 14', '2024-03-12 16:25:50'),
(506, 1, 'editou as informações do conteúdo de ID: 198', '2024-03-12 16:26:26'),
(507, 1, 'editou as informações do blog de ID: 12', '2024-03-12 16:26:48'),
(508, 1, 'editou as informações do conteúdo de ID: 199', '2024-03-12 16:26:59'),
(509, 1, 'editou as informações do blog de ID: 13', '2024-03-12 16:27:19'),
(510, 1, 'cadastrou o conteúdo de ID: 201', '2024-03-17 11:37:52'),
(511, 1, 'cadastrou o conteúdo de ID: 202', '2024-03-17 11:37:53'),
(512, 1, 'cadastrou o conteúdo de ID: 203', '2024-03-17 11:37:54'),
(513, 1, 'cadastrou o conteúdo de ID: 204', '2024-03-17 11:37:55'),
(514, 1, 'cadastrou o conteúdo de ID: 205', '2024-03-17 11:37:56'),
(515, 1, 'cadastrou o conteúdo de ID: 206', '2024-03-17 11:37:57'),
(516, 1, 'cadastrou o conteúdo de ID: 207', '2024-03-17 11:37:58'),
(517, 1, 'cadastrou o conteúdo de ID: 208', '2024-03-17 11:37:59'),
(518, 1, 'cadastrou o conteúdo de ID: 209', '2024-03-17 11:38:00'),
(519, 1, 'cadastrou o conteúdo de ID: 210', '2024-03-17 12:04:22'),
(520, 1, 'cadastrou o conteúdo de ID: 211', '2024-03-17 12:04:23'),
(521, 1, 'cadastrou o conteúdo de ID: 212', '2024-03-17 12:04:24'),
(522, 1, 'cadastrou o conteúdo de ID: 213', '2024-03-17 12:04:25'),
(523, 1, 'cadastrou o conteúdo de ID: 214', '2024-03-17 12:04:26'),
(524, 1, 'cadastrou o conteúdo de ID: 215', '2024-03-17 12:04:27'),
(525, 1, 'cadastrou o conteúdo de ID: 216', '2024-03-17 12:04:28'),
(526, 1, 'cadastrou o conteúdo de ID: 217', '2024-03-17 12:04:29'),
(527, 1, 'editou as informações do conteúdo de ID: 215', '2024-03-25 15:39:06'),
(528, 1, 'cadastrou a imagem 6601c62a90775.png', '2024-03-25 15:44:58'),
(529, 1, 'editou as informações do conteúdo de ID: 57', '2024-03-25 15:45:03'),
(530, 1, 'editou as informações do conteúdo de ID: 39', '2024-03-25 15:52:29'),
(531, 1, 'cadastrou o conteúdo de ID: 218', '2024-03-25 19:04:24'),
(532, 1, 'cadastrou o conteúdo de ID: 219', '2024-03-25 19:06:40');

-- --------------------------------------------------------

--
-- Estrutura para tabela `paginas`
--

CREATE TABLE `paginas` (
  `idPagina` int(11) NOT NULL,
  `nomePagina` varchar(500) DEFAULT NULL,
  `categoriaId` int(11) DEFAULT 0,
  `tituloPagina` varchar(500) DEFAULT NULL,
  `descricaoPagina` varchar(500) DEFAULT NULL,
  `imagemPagina` longtext DEFAULT NULL,
  `legendaImagemPagina` varchar(500) DEFAULT NULL,
  `palavrasChavesPagina` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `paginas`
--

INSERT INTO `paginas` (`idPagina`, `nomePagina`, `categoriaId`, `tituloPagina`, `descricaoPagina`, `imagemPagina`, `legendaImagemPagina`, `palavrasChavesPagina`) VALUES
(1, 'index', 0, 'index', 'index', 'http://localhost/grupocruvinel/painel/null', 'index', 'index'),
(2, 'quem-somos', 0, 'quem-somos', 'quem-somos', 'http://localhost/grupocruvinel/painel/null', 'quem-somos', 'quem-somos'),
(3, 'empresas', 0, 'empresas', 'empresas', 'http://localhost/grupocruvinel/painel/null', 'empresas', 'empresas'),
(4, 'clientes', 0, 'clientes', 'clientes', 'http://localhost/grupocruvinel/painel/null', 'clientes', 'clientes'),
(5, 'servicos', 0, 'servicos', 'servicos', 'http://localhost/grupocruvinel/painel/null', 'servicos', 'servicos'),
(6, 'mentorias', 1, NULL, NULL, NULL, NULL, NULL),
(7, 'imprensa', 1, NULL, NULL, NULL, NULL, NULL),
(8, 'consultoria', 1, NULL, NULL, NULL, NULL, NULL),
(9, 'eventos', 1, NULL, NULL, NULL, NULL, NULL),
(10, 'blog', 0, 'blog', 'blog', 'http://localhost/grupocruvinel/painel/null', 'blog', 'blog'),
(11, 'saiu-na-midia', 1, NULL, NULL, NULL, NULL, NULL),
(12, 'livros-e-ebooks', 1, NULL, NULL, NULL, NULL, NULL),
(13, 'cursos', 1, NULL, NULL, NULL, NULL, NULL),
(14, 'videos', 1, NULL, NULL, NULL, NULL, NULL),
(15, 'podcast', 1, NULL, NULL, NULL, NULL, NULL),
(16, 'contato', 0, 'contato', 'contato', 'http://localhost/grupocruvinel/painel/null', 'contato', 'contato'),
(17, 'termos-de-uso', 0, 'termos-de-uso', 'termos-de-uso', 'https://italoferreiracode.com.br/grupocruvinel/painel/null', 'termos-de-uso', 'termos-de-uso'),
(18, 'politica-de-privacidade', 0, 'politica-de-privacidade', 'politica-de-privacidade', 'https://italoferreiracode.com.br/grupocruvinel/painel/null', 'politica-de-privacidade', 'politica-de-privacidade'),
(19, 'seguranca-no-uso-da-internet', 0, 'seguranca-no-uso-da-internet', 'seguranca-no-uso-da-internet', 'https://italoferreiracode.com.br/grupocruvinel/painel/null', 'seguranca-no-uso-da-internet', 'seguranca-no-uso-da-internet'),
(20, 'categoria-blog', 1, NULL, NULL, NULL, NULL, NULL),
(21, 'categoria-saiu-na-midia', 1, NULL, NULL, NULL, NULL, NULL),
(22, 'categoria-videos', 1, NULL, NULL, NULL, NULL, NULL),
(23, 'categoria-podcast', 1, NULL, NULL, NULL, NULL, NULL),
(31, 'evidjuri', 3, 'EVIDJURI', 'EVIDJURI', 'http://localhost/grupocruvinel/painel/home', 'EVIDJURI', 'EVIDJURI'),
(32, 'cat-1', 20, 'cat 1', 'cat 1', 'http://localhost/grupocruvinel/painel/home', 'cat 1', 'cat 1'),
(33, 'blog-1', 10, 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', 'http://localhost/grupocruvinel/painel/home', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. '),
(35, 'categoria-2', 20, 'categoria 2', 'categoria 2', 'https://italoferreiracode.com.br/grupocruvinel/assets/uploads/65e5dc4fe31e8.png', 'categoria', 'categoria-2'),
(37, 'trust', 3, 'TRUST', 'TRUST', 'https://italoferreiracode.com.br/grupocruvinel/assets/uploads/65e73306030db.svg', 'TRUST', 'TRUST'),
(38, 'agro', 3, 'AGRO', 'AGRO', 'https://italoferreiracode.com.br/grupocruvinel/painel/home.php', 'AGRO', 'AGRO'),
(39, 'ventures', 3, 'VENTURES', 'VENTURES', 'https://italoferreiracode.com.br/grupocruvinel/painel/home.php', 'VENTURES', 'VENTURES'),
(43, 'blog-3', 10, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam', 'blog3', 'https://italoferreiracode.com.br/grupocruvinel/painel/home', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam', 'blog3'),
(46, 'ventures-2', 3, 'VENTURES 2', 'VENTURES 2', 'http://localhost/grupocruvinel/painel/home', 'VENTURES 2', 'VENTURES 2'),
(47, 'ventures-3', 3, 'VENTURES 3', 'VENTURES 3', 'http://localhost/grupocruvinel/painel/home', 'VENTURES 3', 'VENTURES 3'),
(48, 'ventures-4', 3, 'VENTURES 4', 'VENTURES 4', 'http://localhost/grupocruvinel/painel/home', 'VENTURES 4', 'VENTURES 4'),
(49, 'blog-2', 10, 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', 'http://localhost/grupocruvinel/painel/home', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. ', 'Lorem ipsum dolor sit amet,  consectetuer adipiscing elit,  sed diam. '),
(50, 'blog-4', 10, 'blog-4', 'blog-4', 'http://localhost/grupocruvinel/painel/home', 'blog-4', 'blog-4'),
(51, 'blog-5', 10, 'blog-5', 'blog-5', 'http://localhost/grupocruvinel/painel/home', 'blog-5', 'blog-5'),
(52, 'blog-6', 10, 'blog-6', 'blog-6', 'http://localhost/grupocruvinel/painel/home', 'blog-6', 'blog-6');

-- --------------------------------------------------------

--
-- Estrutura para tabela `redes`
--

CREATE TABLE `redes` (
  `idRede` int(11) NOT NULL,
  `instagram` varchar(1000) DEFAULT NULL,
  `facebook` varchar(1000) DEFAULT NULL,
  `linkedin` varchar(1000) DEFAULT NULL,
  `twitter` varchar(1000) DEFAULT NULL,
  `telegram` varchar(1000) DEFAULT NULL,
  `pinterest` varchar(1000) DEFAULT NULL,
  `tiktok` varchar(1000) DEFAULT NULL,
  `youtube` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `redes`
--

INSERT INTO `redes` (`idRede`, `instagram`, `facebook`, `linkedin`, `twitter`, `telegram`, `pinterest`, `tiktok`, `youtube`) VALUES
(1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servicos`
--

CREATE TABLE `servicos` (
  `idServico` int(11) NOT NULL,
  `tituloServico` varchar(500) DEFAULT NULL,
  `imagemServico` longtext DEFAULT NULL,
  `legendaImagemServico` varchar(500) DEFAULT NULL,
  `linkServico` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servicos`
--

INSERT INTO `servicos` (`idServico`, `tituloServico`, `imagemServico`, `legendaImagemServico`, `linkServico`, `status`) VALUES
(2, 'Perícias', '65e728ade055e.png', 'Perícias', '', 1),
(3, 'Startups', '65e7368749fb3.png', 'Startups', '', 1),
(4, 'Manejos Ambientais', '65e7369033047.png', 'Manejos Ambientais', '', 1),
(5, 'Mobilidade Urbana', '65e73698ce252.png', 'Mobilidade Urbana', '', 1),
(6, 'Produção de Provas Tecnicas (para processos juridicos)', '65ea019199cae.jpg', 'Auditoria Tributária', '', 1),
(7, 'Auditoria Tributária', '65ea019199cae.jpg', 'teste', '', 1),
(8, 'Auditoria Tributária', '65ea019199cae.jpg', 'teste', '', 1),
(9, 'Auditoria Tributária', '65ea019199cae.jpg', 'teste', '', 1),
(10, 'Auditoria Tributária', '65ea019199cae.jpg', 'teste', '', 1),
(11, 'Auditoria Tributária', '65ea019199cae.jpg', 'teste', '', 1),
(12, 'Auditoria Tributária', '65ea019199cae.jpg', 'teste', '', 1),
(13, 'Auditoria Tributária', '65ea019199cae.jpg', 'teste', '', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(200) DEFAULT NULL,
  `emailUsuario` varchar(200) DEFAULT NULL,
  `senhaUsuario` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomeUsuario`, `emailUsuario`, `senhaUsuario`) VALUES
(1, 'admin@admin', 'admin@admin', '$2y$10$lERcXxbFPFGsYgMNoLCLFu3CF3zLPmu.k3EDm4EcQ1/QT873P2sZS');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`idBlog`);

--
-- Índices de tabela `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`idBusiness`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices de tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`idContato`);

--
-- Índices de tabela `conteudos`
--
ALTER TABLE `conteudos`
  ADD PRIMARY KEY (`idConteudo`);

--
-- Índices de tabela `destaques`
--
ALTER TABLE `destaques`
  ADD PRIMARY KEY (`idDestaque`);

--
-- Índices de tabela `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`idEmail`);

--
-- Índices de tabela `formularios`
--
ALTER TABLE `formularios`
  ADD PRIMARY KEY (`idFormulario`);

--
-- Índices de tabela `imagens`
--
ALTER TABLE `imagens`
  ADD PRIMARY KEY (`idImagem`);

--
-- Índices de tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`idLogs`);

--
-- Índices de tabela `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`idPagina`);

--
-- Índices de tabela `redes`
--
ALTER TABLE `redes`
  ADD PRIMARY KEY (`idRede`);

--
-- Índices de tabela `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`idServico`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `blogs`
--
ALTER TABLE `blogs`
  MODIFY `idBlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `business`
--
ALTER TABLE `business`
  MODIFY `idBusiness` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `conteudos`
--
ALTER TABLE `conteudos`
  MODIFY `idConteudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT de tabela `destaques`
--
ALTER TABLE `destaques`
  MODIFY `idDestaque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `emails`
--
ALTER TABLE `emails`
  MODIFY `idEmail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `formularios`
--
ALTER TABLE `formularios`
  MODIFY `idFormulario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `idImagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `idLogs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=533;

--
-- AUTO_INCREMENT de tabela `paginas`
--
ALTER TABLE `paginas`
  MODIFY `idPagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `redes`
--
ALTER TABLE `redes`
  MODIFY `idRede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
