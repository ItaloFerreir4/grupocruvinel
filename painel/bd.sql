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
(1, 'index', 0, 'index', NULL, NULL, NULL, NULL),
(2, 'biografia', 0, 'biografia', NULL, NULL, NULL, NULL),
(3, 'business', 0, 'business', NULL, NULL, NULL, NULL),
(4, 'workshops', 0, 'workshops', NULL, NULL, NULL, NULL),
(5, 'agenda', 0, 'agenda', NULL, NULL, NULL, NULL),
(6, 'mentorias', 0, 'mentorias', NULL, NULL, NULL, NULL),
(7, 'imprensa', 0, 'imprensa', NULL, NULL, NULL, NULL),
(8, 'consultoria', 0, 'consultoria', NULL, NULL, NULL, NULL),
(9, 'eventos', 0, 'eventos', NULL, NULL, NULL, NULL),
(10, 'blog', 0, 'blog', NULL, NULL, NULL, NULL),
(11, 'saiu-na-midia', 0, 'saiu-na-midia', NULL, NULL, NULL, NULL),
(12, 'livros', 0, 'livros', NULL, NULL, NULL, NULL),
(13, 'cursos', 0, 'cursos', NULL, NULL, NULL, NULL),
(14, 'videos', 0, 'videos', NULL, NULL, NULL, NULL),
(15, 'podcast', 0, 'podcast', NULL, NULL, NULL, NULL),
(16, 'contato', 0, 'contato', NULL, NULL, NULL, NULL),
(17, 'termos-de-uso', 0, 'termos-de-uso', NULL, NULL, NULL, NULL),
(18, 'politica-de-privacidade', 0, 'politica-de-privacidade', NULL, NULL, NULL, NULL),
(19, 'seguranca-no-uso-da-internet', 0, 'seguranca-no-uso-da-internet', NULL, NULL, NULL, NULL),
(20, 'categoria-blog', 0, 'categoria-blog', NULL, NULL, NULL, NULL),
(21, 'categoria-saiu-na-midia', 0, 'categoria-saiu-na-midia', NULL, NULL, NULL, NULL),
(22, 'categoria-videos', 0, 'categoria-videos', NULL, NULL, NULL, NULL),
(23, 'categoria-podcast', 0, 'categoria-podcast', NULL, NULL, NULL, NULL),
(24, 'palestras', 0, 'palestras', NULL, NULL, NULL, NULL),
(25, 'artigos', 0, 'artigos', NULL, NULL, NULL, NULL),
(26, 'categoria-artigo', 0, 'categoria-artigo', NULL, NULL, NULL, NULL),
(27, 'ebooks', 0, 'ebooks', NULL, NULL, NULL, NULL);

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
  `textoBusiness` longtext DEFAULT NULL,
  `categoriaBusiness` varchar(500) DEFAULT NULL,
  `nomeBotao1` varchar(100) DEFAULT NULL,
  `linkBotao1` varchar(500) DEFAULT NULL,
  `targetBotao1` varchar(100) DEFAULT NULL,
  `nomeBotao2` varchar(100) DEFAULT NULL,
  `linkBotao2` varchar(500) DEFAULT NULL,
  `targetBotao2` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `agendas` (
  `idAgenda` int(11) PRIMARY KEY AUTO_INCREMENT,
  `tituloAgenda` varchar(500) DEFAULT NULL,
  `textoAgenda` varchar(1000) DEFAULT NULL,
  `imagemAgenda` longtext DEFAULT NULL,
  `legendaImagemAgenda` varchar(500) DEFAULT NULL,
  `dataAgenda` date DEFAULT NULL,
  `localAgenda` varchar(500) DEFAULT NULL,
  `tipoAgenda` varchar(500) DEFAULT NULL,
  `nomeBotao1` varchar(100) DEFAULT NULL,
  `linkBotao1` varchar(500) DEFAULT NULL,
  `targetBotao1` varchar(100) DEFAULT NULL,
  `tagsAgenda` varchar(1000) DEFAULT NULL,
  `status` int(11) DEFAULT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `eventos` (
  `idEvento` int(11) PRIMARY KEY AUTO_INCREMENT,
  `paginaId` int(11) DEFAULT NULL,
  `tituloEvento` varchar(1000) DEFAULT NULL,
  `subTituloEvento` varchar(1000) DEFAULT NULL,
  `imagemEvento` longtext DEFAULT NULL,
  `legendaImagemEvento` varchar(500) DEFAULT NULL,
  `textoEvento` longtext DEFAULT NULL,
  `dataEvento` varchar(500) DEFAULT NULL,
  `localEvento` varchar(500) DEFAULT NULL,
  `categoriaEvento` varchar(500) DEFAULT NULL,
  `tagsEvento` varchar(500) DEFAULT NULL,
  `nomeAutorEvento` varchar(500) DEFAULT NULL,
  `imagemAutorEvento` longtext DEFAULT NULL,
  `nomeBotao1` varchar(500) DEFAULT NULL,
  `linkBotao1` varchar(500) DEFAULT NULL,
  `targetBotao1` varchar(100) DEFAULT NULL,
  `nomeBotao2` varchar(500) DEFAULT NULL,
  `linkBotao2` varchar(500) DEFAULT NULL,
  `targetBotao2` varchar(100) DEFAULT NULL,
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

CREATE TABLE `saiunamidias` (
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

CREATE TABLE `artigos` (
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

CREATE TABLE `palestras` (
  `idPalestra` int(11) PRIMARY KEY AUTO_INCREMENT,
  `paginaId` int(11) DEFAULT NULL,
  `tituloPalestra` varchar(1000) DEFAULT NULL,
  `subTituloPalestra` varchar(1000) DEFAULT NULL,
  `imagemPalestra` longtext DEFAULT NULL,
  `legendaImagemPalestra` varchar(500) DEFAULT NULL,
  `textoPalestra` longtext DEFAULT NULL,
  `dataPalestra` date DEFAULT NULL,
  `nomeAutorPalestra` varchar(500) DEFAULT NULL,
  `imagemAutorPalestra` longtext DEFAULT NULL,
  `nomeBotao1` varchar(500) DEFAULT NULL,
  `linkBotao1` varchar(500) DEFAULT NULL,
  `targetBotao1` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `livros` (
  `idLivro` int(11) PRIMARY KEY AUTO_INCREMENT,
  `paginaId` int(11) DEFAULT NULL,
  `categoriasId` varchar(1000) DEFAULT NULL,
  `tituloLivro` varchar(1000) DEFAULT NULL,
  `subTituloLivro` varchar(1000) DEFAULT NULL,
  `imagemLivro` longtext DEFAULT NULL,
  `legendaImagemLivro` varchar(500) DEFAULT NULL,
  `textoLivro` longtext DEFAULT NULL,
  `tipoLivro` varchar(100) DEFAULT NULL,
  `nomeAutorLivro` varchar(500) DEFAULT NULL,
  `imagemAutorLivro` longtext DEFAULT NULL,
  `dataLivro` longtext DEFAULT NULL,
  `nomeBotao1` varchar(100) DEFAULT NULL,
  `linkBotao1` varchar(500) DEFAULT NULL,
  `targetBotao1` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `cursos` (
  `idCurso` int(11) PRIMARY KEY AUTO_INCREMENT,
  `paginaId` int(11) DEFAULT NULL,
  `categoriasId` varchar(1000) DEFAULT NULL,
  `tituloCurso` varchar(1000) DEFAULT NULL,
  `subTituloCurso` varchar(1000) DEFAULT NULL,
  `imagemCurso` longtext DEFAULT NULL,
  `legendaImagemCurso` varchar(500) DEFAULT NULL,
  `textoCurso` longtext DEFAULT NULL,
  `valorAvistaCurso` int(11) DEFAULT NULL,
  `valorParceladoCurso` int(11) DEFAULT NULL,
  `qtdParcelaCurso` int(11) DEFAULT NULL,
  `dataCompraCurso` int(11) DEFAULT NULL,
  `cargaHorariaCurso` longtext DEFAULT NULL,
  `mentorCurso` longtext DEFAULT NULL,
  `imagemAutorCurso` longtext DEFAULT NULL,
  `nomeAutorCurso` varchar(500) DEFAULT NULL,
  `linkBotao1` varchar(500) DEFAULT NULL,
  `targetBotao1` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `videos` (
  `idVideo` int(11) PRIMARY KEY AUTO_INCREMENT,
  `categoriasId` varchar(1000) DEFAULT NULL,
  `tagsVideo` varchar(1000) DEFAULT NULL,
  `tituloVideo` varchar(1000) DEFAULT NULL,
  `imagemVideo` longtext NULL,
  `legendaImagemVideo` varchar(500) DEFAULT NULL,
  `nomeAutorVideo` varchar(500) DEFAULT NULL,
  `imagemAutorVideo` longtext DEFAULT NULL,
  `dataVideo` date DEFAULT NULL,
  `iframeVideo` longtext DEFAULT NULL,
  `status` int(11) DEFAULT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `podcasts` (
  `idPodcast` int(11) PRIMARY KEY AUTO_INCREMENT,
  `tituloPodcast` varchar(500) DEFAULT NULL,
  `imagemPodcast` longtext DEFAULT NULL,
  `legendaImagemPodcast` varchar(500) DEFAULT NULL,
  `nomeAutorPodcast` varchar(500) DEFAULT NULL,
  `imagemAutorPodcast` longtext DEFAULT NULL,
  `tempoPodcast` varchar(500) DEFAULT NULL,
  `qtdEpPodcast` varchar(500) DEFAULT NULL,
  `dataPodcast` varchar(500) DEFAULT NULL,
  `categoriasId` varchar(1000) DEFAULT NULL,
  `tagsPodcast` varchar(1000) DEFAULT NULL,
  `iframePodcast` longtext DEFAULT NULL,
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

CREATE TABLE `perguntas` (
  `idPergunta` int(11) PRIMARY KEY AUTO_INCREMENT,
  `paginaId` int(11) NOT NULL,
  `tituloPergunta` varchar(500) DEFAULT NULL,
  `textoPergunta` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
