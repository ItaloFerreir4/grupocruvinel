-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/02/2024 às 18:27
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
(6, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

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
(1, '65de61489c58e.png', 'teste 2', 'teste', 1);

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
(17, 31, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 31, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 1, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 5, 1, '', '65df6a68b36b0.png', '65df6a7701085.png', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(25, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 2, 1, 'Quem Somos', '65df6a68b36b0.png', '65df6a7701085.png', 'null', 'null', 'tedste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(27, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 2, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 3, 1, '', '65df6a68b36b0.png', '65df6a7701085.png', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(32, 16, 1, 'teste', '65df6a68b36b0.png', '65df6a7701085.png', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(33, 16, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 4, 1, '', '65df6a68b36b0.png', '65df6a7701085.png', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', ''),
(35, 10, 1, '', '65df6a68b36b0.png', '65df6a7701085.png', 'null', 'null', 'teste', 'teste', '', '', '', '', '', '', '', '', '', '');

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
(3, '65df6a7701085.png');

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
(17, 1, 'editou as informações do conteúdo de ID: 35', '2024-02-28 14:27:36');

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
(17, 'termos-de-uso', 1, NULL, NULL, NULL, NULL, NULL),
(18, 'politica-de-privacidade', 1, NULL, NULL, NULL, NULL, NULL),
(19, 'seguranca-no-uso-da-internet', 1, NULL, NULL, NULL, NULL, NULL),
(20, 'categoria-blog', 1, NULL, NULL, NULL, NULL, NULL),
(21, 'categoria-saiu-na-midia', 1, NULL, NULL, NULL, NULL, NULL),
(22, 'categoria-videos', 1, NULL, NULL, NULL, NULL, NULL),
(23, 'categoria-podcast', 1, NULL, NULL, NULL, NULL, NULL),
(31, 'empresa-1', 3, 'empresa 1', 'empresa 1', 'http://localhost/grupocruvinel/painel/home', 'empresa 1', 'empresa 1');

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
(1, 'teste 1', '65de61489c58e.png', 'teste', '', 1);

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
  MODIFY `idBlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `business`
--
ALTER TABLE `business`
  MODIFY `idBusiness` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `idContato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `conteudos`
--
ALTER TABLE `conteudos`
  MODIFY `idConteudo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `destaques`
--
ALTER TABLE `destaques`
  MODIFY `idDestaque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `emails`
--
ALTER TABLE `emails`
  MODIFY `idEmail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `formularios`
--
ALTER TABLE `formularios`
  MODIFY `idFormulario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagens`
--
ALTER TABLE `imagens`
  MODIFY `idImagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `idLogs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `paginas`
--
ALTER TABLE `paginas`
  MODIFY `idPagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `redes`
--
ALTER TABLE `redes`
  MODIFY `idRede` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servicos`
--
ALTER TABLE `servicos`
  MODIFY `idServico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
