<?php
include_once "../assets/componentes.php";
include_once "../painel/backend/conexao-banco.php";

$nomeDoArquivoCompleto = $_SERVER["SCRIPT_FILENAME"];
$nomeDoArquivoSemExtensao = pathinfo($nomeDoArquivoCompleto, PATHINFO_FILENAME);

$paginaSelecionada = $nomeDoArquivoSemExtensao;

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE nomePagina = :nomePagina AND categoriaId = :categoriaId");
$sqlSeo->bindValue(":nomePagina", $paginaSelecionada);
$sqlSeo->bindValue(":categoriaId", 13);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlCursos = $con->prepare("SELECT p.*, c.* FROM paginas p, cursos c WHERE c.paginaId = :idPagina AND c.paginaId = p.idPagina AND c.status = 1");
$sqlCursos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlCursos->execute();
$curso = $sqlCursos->fetch(PDO::FETCH_ASSOC);

$sqlCursos = $con->prepare("SELECT p.*, c.* FROM paginas p, cursos c WHERE c.paginaId = p.idPagina AND c.status = 1");
$sqlCursos->execute();
$cursosArray = $sqlCursos->fetchAll(PDO::FETCH_ASSOC);
$cursosArray = json_decode(json_encode($cursosArray));

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

$sqlPerguntas = $con->prepare("SELECT * FROM perguntas WHERE paginaId = :idPagina");
$sqlPerguntas->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlPerguntas->execute();
$perguntasArray = $sqlPerguntas->fetchAll(PDO::FETCH_ASSOC);
$perguntasArray = json_decode(json_encode($perguntasArray));

ob_start();
redesSociais("preto");
$redes = ob_get_clean();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tags Open Graph -->
    <meta property="og:title" content="<?php echo $conteudoSeo["tituloPagina"] ?>">
    <meta property="og:description" content="<?php echo $conteudoSeo["descricaoPagina"] ?>">
    <meta property="og:url" content="<?php echo BASE_URL . '/' . $conteudoSeo["nomePagina"] ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo $conteudoSeo["imagemPagina"] ?>">
    <meta property="og:image:alt" content="<?php echo $conteudoSeo["legendaImagemPagina"] ?>">
    <meta name="description" content="<?php echo $conteudoSeo["descricaoPagina"] ?>">
    <meta name="keywords" content="<?php echo $conteudoSeo["palavrasChavesPagina"] ?>">
    <meta name="robots" content="index,follow">
    <meta name="rating" content="General">
    <meta name="revisit-after" content="7 days">
    <title>
        <?php echo $conteudoSeo["tituloPagina"] ?>
    </title>

    <?php linksHead(); ?>

    <link rel="icon" type="image/svg" href="../assets/svg/favicon.svg">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/curso-detalhes.css" />
</head>

<body>
    <?php cHeader(); ?>
    <main>
        <div class="banner">
            <?php
            foreach ($conteudosArray as $conteudo) {
                if ($conteudo->numeroConteudo == 1) {
                    echo <<<HTML
                        <img class="img-background desktop" src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" />
                        <img class="img-background mobile" src="../assets/uploads/{$conteudo->imagem2Conteudo}" alt="{$conteudo->legendaImagem2Conteudo}" />
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6 bloco-1">
                                    <div class="title">
                                        <p>{$curso["tituloCurso"]}</p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 bloco-2"></div>
                            </div>
                        </div>
                        HTML;
                }
            }
            ?>
        </div>
        <div class="about">
            <div>
                <div class="row">
                    <div class="col-12 col-lg-7 content">
                        <button data-content="conteudo-do-curso" class="active">
                            Conteúdo do Curso
                        </button>
                        <div data-content="conteudo-do-curso">
                            <div>
                                <?php echo $curso["textoCurso"] ?>
                            </div>
                        </div>
                        <button data-content="carga-horaria">Carga Horária</button>
                        <div data-content="carga-horaria">
                            <div>
                                <?php echo $curso["cargaHorariaCurso"] ?>
                            </div>
                        </div>
                        <button data-content="mentor">Mentor</button>
                        <div data-content="mentor">
                            <div>
                                <?php echo $curso["mentorCurso"] ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 time-left">
                        <div class="watch-video-gradient">
                            <img loading="lazy" src="../assets/svg/play.svg" alt="Assistir" />
                            <span>Assistir Biografia</span>
                        </div>
                        <h2>Próxima turma</h2>
                        <h1>30 jan</h1>
                        <h3>Últimos dias para adquirir</h3>
                        <div class="countdown" data-date="2024/01/30 15:00:00">
                            <div class="days"></div>
                            <div class="hours"></div>
                            <div class="minutes"></div>
                            <div class="seconds"></div>
                        </div>
                        <a href="<?php echo $curso["linkBotao1"] ?>" target="<?php echo $curso["targetBotao1"] ?>"
                            class="blue-btn small center">Veja Mais</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="learn">
            <img loading="lazy" src="../assets/png/fundo-carrossel-curso-desktop.png" alt="Fundo" class="desktop" />
            <img loading="lazy" src="../assets/png/fundo-carrossel-curso-mobile.png" alt="Fundo" class="mobile" />
            <div class="container">
                <h1>O que vai aprender no curso</h1>
                <div class="learn-swiper">
                    <?php
                    foreach ($conteudosArray as $conteudo) {
                        if ($conteudo->numeroConteudo == 2) {
                            echo <<<HTML
                                <div class="learn-info">
                                    {$conteudo->textoConteudo}
                                </div>
                                HTML;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="watch-video-background">
            <?php
            foreach ($conteudosArray as $conteudo) {
                if ($conteudo->numeroConteudo == 3) {
                    echo <<<HTML
                        <img loading="lazy" class="desktop" src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" />
                        <img loading="lazy" class="mobile" src="../assets/uploads/{$conteudo->imagem2Conteudo}" alt="{$conteudo->legendaImagem2Conteudo}" />
                        <div class="watch-button">
                            <img loading="lazy" src="../assets/svg/play.svg" alt="Assistir" />
                            <span>{$conteudo->textoConteudo}</span>
                        </div>
                        HTML;
                }
            }
            ?>
        </div>
        <div class="bio">
            <img loading="lazy" src="../assets/png/fundo-bio.png" alt="Fundo" class="desktop" />
            <div class="bio-info">
                <?php
                foreach ($conteudosArray as $conteudo) {
                    if ($conteudo->numeroConteudo == 4) {
                        echo <<<HTML
                            <img loading="lazy" src="../assets/svg/fundo-bio-info.svg" alt="Fundo" />
                            <div class="row">
                                <div class="col-12 col-lg-6 info-column">
                                    <h1>{$conteudo->tituloConteudo}</h1>
                                    {$conteudo->textoConteudo}
                                    <a href="{$conteudo->linkBotao1}" class="blue-btn small" title="{$conteudo->nomeBotao1}" target="{$conteudo->targetBotao1}">{$conteudo->nomeBotao1}</a>
                                    <span class="social-media-caption">Siga minhas redes sociais</span>
                                    <div class="social-media">
                                        {$redes}
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 img-column">
                                    <div class="bio-info-img-wrapper">
                                    <img loading="lazy" src="../assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" class="bio-info-img" />
                                    </div>
                                </div>
                            </div>
                            HTML;
                    }
                }
                ?>

            </div>
        </div>
        <div class="faq">
            <h1>Perguntas frequentes</h1>
            <div class="questions">
                <?php
                foreach ($perguntasArray as $pergunta) {
                    echo <<<HTML
                        <div class="accordion">
                            <button>{$pergunta->tituloPergunta}</button>
                            <div class="panel">
                                {$pergunta->textoPergunta}
                            </div>
                        </div>
                        HTML;
                }
                ?>
            </div>
        </div>
    </main>
    <?php cFooter(); ?>
    <?php elementosGerais(); ?>
    <?php scriptBody(); ?>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="../javascript/global.js"></script>
    <script>
        const aboutContentText = document.querySelectorAll(
            ".about .content > div"
        );
        const aboutContentButtons = document.querySelectorAll(
            ".about .content > button"
        );
        const aboutContainer = document.querySelector(".about > div");
        const bioInfo = document.querySelector(".bio .bio-info");
        const questions = document.querySelector(".questions");

        function showAndHideTextContent(dataContent) {
            const isDesktop = window.innerWidth >= 992;
            aboutContentText.forEach((element) => {
                if (dataContent === element.dataset.content) {
                    if (isDesktop) {
                        element.style.opacity = "1";
                        element.style.gridTemplateRows = "1fr";
                        element.style.padding = "40px";
                    } else {
                        element.style.gridTemplateRows = "1fr";
                        element.style.padding = "40px";
                    }
                } else {
                    if (isDesktop) {
                        element.style.opacity = "0";
                        element.style.gridTemplateRows = "0fr";
                        element.style.padding = "0px";
                    } else {
                        element.style.gridTemplateRows = "0fr";
                        element.style.padding = "0px";
                    }
                }
            });
        }

        function setButtonAsActive(button) {
            aboutContentButtons.forEach((element) => {
                element.classList.remove("active");
            });
            button.classList.add("active");
        }

        aboutContentButtons.forEach((element) => {
            element.addEventListener("click", () => {
                const dataContent = element.dataset.content;
                showAndHideTextContent(dataContent);
                setButtonAsActive(element);
            });
        });

        window.addEventListener("DOMContentLoaded", () => {
            const activeButton = document.querySelector(
                ".about .content > button.active"
            );
            const dataContent = activeButton.dataset.content;
            showAndHideTextContent(dataContent);
            addContainerClassToDesktop(aboutContainer);
            addContainerClassToDesktop(bioInfo);
            addContainerClassToDesktop(questions);
        });

        window.addEventListener("resize", () => {
            addContainerClassToDesktop(aboutContainer);
            addContainerClassToDesktop(bioInfo);
            addContainerClassToDesktop(questions);
        });
    </script>
    <script>
        const countdown = document.querySelector(".countdown")
        const date = new Date(countdown.dataset.date);
        const writtenDate = date.toLocaleString("default", { month: "short" });
        const courseDate = document.querySelector(".time-left > h1");
        const seeMoreButton = document.querySelector(".about .blue-btn")
        courseDate.textContent = getDayAndAbbreviatedMonth(date);
        var countDownDate = new Date(date).getTime(); // Set the date we're counting down to
        var now = new Date().getTime();
        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Get today's date and time

        if(distance < 0) {
            countdown.style.display = "none";
            seeMoreButton.classList.add("buy-course-button");
            seeMoreButton.textContent = "Comprar Curso"
        } else {
            // Update the count down every 1 second
        setInterval(function () {
            // Calcular dias, horas, minutos e segundos
            // 1000 = milisegundos, 1o 60 = segundos, 2o 60 = minutos, 24 = horas
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor(
                (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
            );
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            document.querySelector(
                ".time-left .days"
            ).innerHTML = `<h1>${days}</h1><h3>dias</h3>`;
            document.querySelector(
                ".time-left .hours"
            ).innerHTML = `<h1>${hours}</h1><h3>horas</h3>`;
            document.querySelector(
                ".time-left .minutes"
            ).innerHTML = `<h1>${minutes}</h1><h3>minutos</h3>`;
            document.querySelector(
                ".time-left .seconds"
            ).innerHTML = `<h1>${seconds}</h1><h3>segundos</h3>`;
            }, 1000);
        }
        

        function getDayAndAbbreviatedMonth(date) {
            const abbreviatedMonths = [
                "Jan",
                "Fev",
                "Mar",
                "Abr",
                "Mai",
                "Jun",
                "Jul",
                "Ago",
                "Set",
                "Out",
                "Nov",
                "Dez",
            ];

            const day = date.getDate();
            const month = date.getMonth();

            return `${day} ${abbreviatedMonths[month]}`;
        }
    </script>
    <script>
        $(".learn-swiper").slick({
            infinite: true,
            slidesToShow: 3,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                    },
                },
            ],
        });
    </script>

</body>

</html>