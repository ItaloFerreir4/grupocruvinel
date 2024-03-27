<?php

include_once "assets/componentes.php";
include_once "painel/backend/conexao-banco.php";

$sqlSeo = $con->prepare("SELECT * FROM paginas WHERE idPagina = :idPagina");
$sqlSeo->bindValue(":idPagina", 16);
$sqlSeo->execute();
$conteudoSeo = $sqlSeo->fetch(PDO::FETCH_ASSOC);

$sqlConteudos = $con->prepare("SELECT * FROM conteudos WHERE paginaId = :idPagina");
$sqlConteudos->bindValue(":idPagina", $conteudoSeo["idPagina"]);
$sqlConteudos->execute();
$conteudosArray = $sqlConteudos->fetchAll(PDO::FETCH_ASSOC);
$conteudosArray = json_decode(json_encode($conteudosArray));

$sqlContatos = $con->prepare("SELECT * FROM contatos WHERE idContato = :idContato");
$sqlContatos->bindValue(":idContato", 1);
$sqlContatos->execute();
$contatos = $sqlContatos->fetch(PDO::FETCH_ASSOC);

$sqlFormulario = $con->prepare("SELECT * FROM formularios WHERE paginaId = :paginaId");
$sqlFormulario->bindValue(":paginaId", 16);
$sqlFormulario->execute();
$formulario = $sqlFormulario->fetch(PDO::FETCH_ASSOC);

$sqlBlogs = $con->prepare("SELECT p.*, c.* FROM paginas p, destaques d, blogs c WHERE p.idPagina = d.idItem AND c.paginaId = p.idPagina AND c.status = 1");
$sqlBlogs->execute();
$blogsArray = $sqlBlogs->fetchAll(PDO::FETCH_ASSOC);
$blogsArray = json_decode(json_encode($blogsArray));

$sqlCategorias = $con->prepare("SELECT * FROM categorias c, paginas p WHERE c.paginaId = p.idPagina AND c.tipoCategoria = :tipoCategoria");
$sqlCategorias->bindValue(":tipoCategoria", 1);
$sqlCategorias->execute();
$categoriasArray = $sqlCategorias->fetchAll(PDO::FETCH_ASSOC);
$categoriasArray = json_decode(json_encode($categoriasArray));

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tags Open Graph -->
    <meta property="og:title" content="<?php echo $conteudoSeo["tituloPagina"] ?>">
    <meta property="og:description" content="<?php echo $conteudoSeo["descricaoPagina"] ?>">
    <meta property="og:url" content="<?php echo BASE_URL.'/'. $conteudoSeo["nomePagina"] ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo $conteudoSeo["imagemPagina"] ?>">
    <meta property="og:image:alt" content="<?php echo $conteudoSeo["legendaImagemPagina"] ?>">
    <meta name="description" content="<?php echo $conteudoSeo["descricaoPagina"] ?>">
    <meta name="keywords" content="<?php echo $conteudoSeo["palavrasChavesPagina"] ?>">
    <meta name="robots" content="index,follow">
    <meta name="rating" content="General">
    <meta name="revisit-after" content="7 days">
    <title><?php echo $conteudoSeo["tituloPagina"] ?></title>

    <?php linksHead(); ?>

    <link rel="icon" type="image/svg" href="assets/svg/favicon.svg">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/fale-conosco.css">
</head>

<body>
    <?php cHeader(); ?>
    <?php
    foreach ($conteudosArray as $conteudo) {
        if($conteudo->numeroConteudo == 1){
            banner(
                "Fale Conosco",
                "{$conteudo->legendaImagem1Conteudo}",
                "{$conteudo->legendaImagem2Conteudo}",
                "./assets/uploads/{$conteudo->imagem1Conteudo}",
                "./assets/uploads/{$conteudo->imagem2Conteudo}"
            ); 
        }
    }
    ?>

    <section class="contact-us">
        <div class="shaped-content">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7 contact-form">
                        <h1>Conte para nosso atendimento o que você precisa. E vamos lhe ajudar!</h1>
                        <form id="formulario-1">
                            <input type="hidden" name="origem" id="origem" value="formulario">
                            <input type="hidden" name="quemRecebe" id="quemRecebe" value="<?php echo $formulario['emailFormulario']; ?>">
                            <input type="hidden" name="tituloPagina" id="tituloPagina" value="">
                            <input name="contatoNome" id="contatoNome" type="text" placeholder="Nome:" />
                            <input name="contatoEmail" id="contatoEmail" type="text" placeholder="E-mail:" />
                            <select name="contatoAssunto" id="contatoAssunto" type="text" placeholder="Assunto:">
                                <optgroup>
                                    <option value="">Assunto:</option>
                                </optgroup>
                                <?php
                                    $options = $formulario['select1Formulario'];

                                    $options = explode(",", $options);
                        
                                    foreach ($options as &$option) {
                                        echo <<<HTML
                                            <option value="{$option}">{$option}</option>
                                        HTML;
                                    }
                                ?>
                            </select>
                            <input name="contatoTelefone" id="contatoTelefone" type="text" placeholder="Telefone:"
                                onkeyup="mascaraTel(this);" maxlength="15" />
                            <textarea rows="4" name="contatoMensagem" id="contatoMensagem" type="text"
                                placeholder="Mensagem:"></textarea>
                            <label for="contact-checkbox">
                                <input id="contact-checkbox" type="checkbox" name="contatoTermo" id="contatoTermo" />
                                Concordo que os dados pessoais fornecidos acima serão utilizados para envio de conteúdo
                                informativo, analítico e publicitário sobre produtos, serviços e assuntos gerais, nos
                                termos da Lei Geral de Proteção de Dados.</label>
                            <button type="button" class="send botao-enviar" onClick="EnviarFormulario(1)">
                                Enviar
                                <img loading="lazy" src="assets/svg/seta-dir-amarela.svg" alt="Seta" />
                            </button>
                        </form>
                    </div>
                    <div class="col-12 col-lg-5 images">
                        <?php
                            foreach ($conteudosArray as $conteudo) {
                                if($conteudo->numeroConteudo == 2){
                                    echo <<<HTML
                                    <img src="assets/uploads/{$conteudo->imagem1Conteudo}" alt="{$conteudo->legendaImagem1Conteudo}" class="main-img">
                                    HTML;
                                }
                            }
                        ?>
                        
                        <div class="contact-info">
                            <div>
                                <div class="icon"><img src="assets/svg/email-marrom.svg" alt="Email"></div>
                                <span><?php echo $contatos['emailContato']; ?> </span>
                            </div>
                            <div>
                                <div class="icon"><img src="assets/svg/whatsapp-branco.svg" alt="Whatsapp"></div>
                                <strong><?php echo $contatos['whatsappContato']; ?> </strong>
                            </div>
                            <div>
                                <div class="icon"><img src="assets/svg/telefone-verde.svg" alt="Telefone"></div>
                                <strong><?php echo $contatos['telefoneContato']; ?> </strong>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="map">
        <div class="container">
            <h2><?php echo $contatos['enderecoContato']; ?> </h2>
        </div>
        <?php echo $contatos['mapa']; ?>
    </section>
    <section class="other-blogs">
        <h1>Blog do Grupo</h1>
        <div class="container">
            <div class="swiper-other-blogs">
                <?php
                    foreach ($blogsArray as $blog) {
                        $dataBlog = $blog->dataBlog;
                        $categoriasId = $blog->categoriasId;
                        $dataBlog = new DateTime($dataBlog);
                        $dataBlog = $dataBlog->format('d/m/Y');
                        $primeiraCategoriaBlog = json_decode($categoriasId);
                        if($primeiraCategoriaBlog){
                            $primeiraCategoriaBlog = $primeiraCategoriaBlog[0];
                            foreach ($categoriasArray as $rowCat) {
                                if($rowCat->idCategoria == $primeiraCategoriaBlog){
                                    $nomeCategoriaBlog = $rowCat->nomeCategoria;
                                }
                            }
                        }
                        else{
                            $nomeCategoriaBlog = "";
                        }
            
                        echo <<<HTML
                        <a href="./blog-detalhes/{$blog->nomePagina}">
                            <div class="card-blog">
                                <img src="assets/uploads/{$blog->imagemBlog}" alt="{$blog->legendaImagemBlog}">
                                <div class="category-date">
                                    <div class="author">
                                        <img loading="lazy" src="./assets/uploads/{$blog->imagemAutorBlog}" alt="{$blog->nomeAutorBlog}" />
                                        <span class="limit-text">{$blog->nomeAutorBlog}</span>
                                    </div>
                                    <span class="tag">{$nomeCategoriaBlog}</span><span class="date">{$dataBlog}</span>
                                </div>
                                <h1>{$blog->tituloBlog}</h1>
                                <div class="outline-button">
                                    Ler mais
                                    <img src="assets/svg/seta-dir-marrom.svg" alt="Ler Mais">
                                </div>
                            </div>
                        </a>
                        HTML;
                    }
                ?>
            </div>
        </div>
    </section>
    <?php cFooter(); ?>
    <?php elementosGerais(); ?>
    <?php scriptBody(); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".swiper-other-blogs").slick({
                infinite: true,
                dots: true,
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
        });
    </script>
    <script src="javascript/global.js"></script>
</body>

</html>