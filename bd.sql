CREATE TABLE `paginas` (
  `idPagina` int(11) PRIMARY KEY AUTO_INCREMENT,
  `nomePagina` varchar(500) DEFAULT NULL,
  `categoriaId` int(11) DEFAULT 0,
  `tituloPagina` varchar(500) DEFAULT NULL,
  `descricaoPagina` varchar(500) DEFAULT NULL,
  `imagemPagina` longtext DEFAULT NULL,
  `legendaImagemPagina` varchar(500) DEFAULT NULL,
  `palavrasChavesPagina` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `paginas` (`idPagina`, `nomePagina`, `categoriaId`, `tituloPagina`, `descricaoPagina`, `imagemPagina`, `legendaImagemPagina`, `palavrasChavesPagina`) VALUES
(1, 'index', 0, NULL, NULL, NULL, NULL, NULL),
(2, 'biografia', 0, NULL, NULL, NULL, NULL, NULL),
(3, 'business', 0, NULL, NULL, NULL, NULL, NULL),
(4, 'workshops', 0, NULL, NULL, NULL, NULL, NULL),
(5, 'agenda', 0, NULL, NULL, NULL, NULL, NULL),
(6, 'mentorias', 0, NULL, NULL, NULL, NULL, NULL),
(7, 'imprensa', 0, NULL, NULL, NULL, NULL, NULL),
(8, 'consultoria', 0, NULL, NULL, NULL, NULL, NULL),
(9, 'eventos', 0, NULL, NULL, NULL, NULL, NULL),
(10, 'blog', 0, NULL, NULL, NULL, NULL, NULL),
(11, 'saiu-na-midia', 0, NULL, NULL, NULL, NULL, NULL),
(12, 'livros-e-ebooks', 0, NULL, NULL, NULL, NULL, NULL),
(13, 'cursos', 0, NULL, NULL, NULL, NULL, NULL),
(14, 'videos', 0, NULL, NULL, NULL, NULL, NULL),
(15, 'podcast', 0, NULL, NULL, NULL, NULL, NULL),
(16, 'contato', 0, NULL, NULL, NULL, NULL, NULL),
(17, 'termos-de-uso', 0, NULL, NULL, NULL, NULL, NULL),
(18, 'politica-de-privacidade', 0, NULL, NULL, NULL, NULL, NULL),
(19, 'seguranca-no-uso-da-internet', 0, NULL, NULL, NULL, NULL, NULL),
(20, 'categoria-blog', 0, NULL, NULL, NULL, NULL, NULL),
(21, 'categoria-saiu-na-midia', 0, NULL, NULL, NULL, NULL, NULL),
(22, 'categoria-videos', 0, NULL, NULL, NULL, NULL, NULL),
(23, 'categoria-podcast', 0, NULL, NULL, NULL, NULL, NULL);

CREATE TABLE `conteudos` (
  `idConteudo` int(11) PRIMARY KEY AUTO_INCREMENT,
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

CREATE TABLE `business` (
  `idBusiness` int(11) PRIMARY KEY AUTO_INCREMENT,
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
  `status` int(11) DEFAULT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `servicos` (
  `idServico` int(11) PRIMARY KEY AUTO_INCREMENT,
  `tituloServico` varchar(500) DEFAULT NULL,
  `imagemServico` longtext DEFAULT NULL,
  `legendaImagemServico` varchar(500) DEFAULT NULL,
  `linkServico` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `clientes` (
  `idCliente` int(11) PRIMARY KEY AUTO_INCREMENT,
  `imagemCliente` longtext DEFAULT NULL,
  `legendaImagemCliente` varchar(500) DEFAULT NULL,
  `linkCliente` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `blogs` (
  `idBlog` int(11) PRIMARY KEY AUTO_INCREMENT,
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
  `status` int(11) DEFAULT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `contatos` (
  `idContato` int(11) PRIMARY KEY AUTO_INCREMENT,
  `telefoneContato` varchar(1000) DEFAULT NULL,
  `whatsappContato` varchar(100) DEFAULT NULL,
  `linkWhatsappContato` varchar(1000) DEFAULT NULL,
  `emailContato` varchar(1000) DEFAULT NULL,
  `enderecoContato` varchar(1000) DEFAULT NULL,
  `mapa` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `imagens` (
  `idImagem` int(11) PRIMARY KEY AUTO_INCREMENT,
  `imagem` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `formularios` (
  `idFormulario` int(11) PRIMARY KEY AUTO_INCREMENT,
  `paginaId` int(11) DEFAULT NULL,
  `descricaoFormulario` varchar(500) NULL,
  `emailFormulario` varchar(500) NULL,
  `select1Formulario` varchar(1000) NULL,
  `select2Formulario` varchar(1000) NULL,
  `select3Formulario` varchar(1000) NULL,
  `select4Formulario` varchar(1000) NULL,
  `select5Formulario` varchar(1000) NULL,
  `select6Formulario` varchar(1000) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `usuarios` (
  `idUsuario` int(11) PRIMARY KEY AUTO_INCREMENT,
  `nomeUsuario` varchar(200) DEFAULT NULL,
  `emailUsuario` varchar(200) DEFAULT NULL,
  `senhaUsuario` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `redes` (
  `idRede` int(11) PRIMARY KEY AUTO_INCREMENT,
  `instagram` varchar(1000) DEFAULT NULL,
  `facebook` varchar(1000) DEFAULT NULL,
  `linkedin` varchar(1000) DEFAULT NULL,
  `twitter` varchar(1000) DEFAULT NULL,
  `telegram` varchar(1000) DEFAULT NULL,
  `pinterest` varchar(1000) DEFAULT NULL,
  `tiktok` varchar(1000) DEFAULT NULL,
  `youtube` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `categorias` (
  `idCategoria` int(11) PRIMARY KEY AUTO_INCREMENT,
  `paginaId` int(11) NOT NULL,
  `tipoCategoria` int(11) NOT NULL,
  `nomeCategoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `destaques` (
  `idDestaque` int(11) PRIMARY KEY AUTO_INCREMENT,
  `idItem` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `emails` (
  `idEmail` int(11) PRIMARY KEY AUTO_INCREMENT,
  `tituloPagina` varchar(500) NULL,
  `nome` varchar(500) NULL,
  `email` varchar(500) NULL,
  `telefone` varchar(100) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `logs` (
  `idLogs` int(11) PRIMARY KEY AUTO_INCREMENT,
  `usuarioId` int(11) DEFAULT NULL,
  `acaoLogs` varchar(500) DEFAULT NULL,
  `dataHoraLogs` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;