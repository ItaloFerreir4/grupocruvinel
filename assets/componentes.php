<?php

define('BASE_URL', 'http://localhost/grupocruvinel');

function cHeader()
{
    $baseURL = BASE_URL;

    echo <<<HTML
    <nav>
    <a href="{$baseURL}"><img src="{$baseURL}/assets/svg/logo-munra-azul.svg" alt="logo" /></a>
      <div class="nav-buttons">
        <a href="{$baseURL}/biografia">Biografia</a>
        <a href="{$baseURL}/business">Business</a>
        <div class="dropdown">
          <span class="desktop">Conteúdo</span>
          <div class="content-buttons">
            <a href="{$baseURL}/artigos">Artigos</a>
            <a href="{$baseURL}/ebooks">Ebooks</a>
            <a href="{$baseURL}/videos">Vídeos</a>
            <a href="{$baseURL}/podcast">Podcast</a>
            <a href="{$baseURL}/livros">Livros</a>
            <a href="{$baseURL}/blog">Blog</a>
            <a href="{$baseURL}/agenda">Agenda</a>
            <a href="{$baseURL}/palestras">Palestras</a>
          </div>
        </div>

        <a href="{$baseURL}/saiu-na-midia">Na Mídia</a>
        <a href="{$baseURL}/eventos">Eventos</a>
        <a href="{$baseURL}/palestras">Palestras</a>
        <a href="{$baseURL}/contato">Contato</a>
        <a href="{$baseURL}/cursos" class="mobile">Cursos</a>
        <a class="blue-link desktop" href="{$baseURL}/cursos">Cursos</a>
      </div>
      <button class="menu">
        <img src="{$baseURL}/assets/svg/burger.svg" alt="Menu" />
      </button>
    </nav>
    HTML;
}

function cFooter(){
    try{
        $con = new PDO('mysql:host=localhost;dbname=grupocruvinel', 'admin', '');
    }
    catch (PDOException $ex){
        echo 'Erro: '.$ex->getMessage();
    }

    $sqlContatos = $con->prepare("SELECT * FROM contatos WHERE idContato = :idContato");
    $sqlContatos->bindValue(":idContato", 1);
    $sqlContatos->execute();
    $conteudoContatos = $sqlContatos->fetch(PDO::FETCH_ASSOC);

    $telefone = preg_replace('/[\s\(\)\[\]]/', '', $conteudoContatos["telefoneContato"]);

    $sqlFormulario = $con->prepare("SELECT * FROM formularios WHERE descricaoFormulario = :descricaoFormulario");
    $sqlFormulario->bindValue(":descricaoFormulario", "newsletter");
    $sqlFormulario->execute();
    $formulario = $sqlFormulario->fetch(PDO::FETCH_ASSOC);

    $sqlRedes = $con->prepare("SELECT * FROM redes WHERE idRede = :idRede");
    $sqlRedes->bindValue(":idRede", 1);
    $sqlRedes->execute();
    $conteudoRedes = $sqlRedes->fetch(PDO::FETCH_ASSOC);

    $urlBase = BASE_URL;

    ob_start();
    redesSociais("preto");
    $redes = ob_get_clean();

    echo <<<HTML
    <div class="container">
        <div class="instagram">
            <div class="title">
                <h1>Siga meu instagram</h1>
                <a href="{$conteudoRedes['instagram']}">
                    <h2>@fabio.munra</h2>
                </a>
            </div>
            <div class="images">
                <div class="swiper-insta" id="feedInsta"></div>
            </div>
            <div class="actions container">
                <a href="{$conteudoRedes['instagram']}" class="blue-btn">Veja mais</a>
                <div class="social-media">
                    {$redes}
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="map mobile">
        <button>
            Mapa do Site <img src="{$urlBase}/assets/svg/seta-branca.svg" alt="Seta" />
        </button>
        <div class="container">
            <div class="links">
            <a href="{$urlBase}/biografia">Biografia</a>
            <a href="{$urlBase}/ebooks">Ebooks</a>
            <a href="{$urlBase}/podcast">Podcast</a>
            <a href="{$urlBase}/palestras">Palestras</a>
            <a href="{$urlBase}/artigos">Artigos</a>
            <a href="{$urlBase}/agenda">Agenda</a>
            <a href="{$urlBase}/business">Business</a>
            <a href="{$urlBase}/livros">Livros</a>
            <a href="{$urlBase}/blog">Blog</a>
            <a href="{$urlBase}/saiu-na-midia">Saiu na Mídia</a>
            <a href="{$urlBase}/videos">Vídeos</a>
            <a href="{$urlBase}/cursos">Cursos</a>
            <a href="{$urlBase}/eventos">Eventos</a>
            </div>
            <img src="{$urlBase}/assets/png/logo-munra-branco.png" alt="Munrá" />
            <div class="contact">
            <img src="{$urlBase}/assets/svg/fabio-branco.svg" alt="Fabio Munrá" />
            <span>{$conteudoContatos['enderecoContato']}</span>
            <span><img src="{$urlBase}/assets/svg/whatsapp-branco.svg" alt="Whatsapp" />{$conteudoContatos['whatsappContato']}</span>
            </div>
        </div>
        </div>
        <div class="map desktop">
        <div class="container">
            <div class="links">
            <a href="{$urlBase}/biografia">Biografia</a>
            <a href="{$urlBase}/ebooks">Ebooks</a>
            <a href="{$urlBase}/podcast">Podcast</a>
            <a href="{$urlBase}/palestras">Palestras</a>
            <a href="{$urlBase}/artigos">Artigos</a>
            <a href="{$urlBase}/agenda">Agenda</a>
            <a href="{$urlBase}/business">Business</a>
            <a href="{$urlBase}/livros">Livros</a>
            <a href="{$urlBase}/blog">Blog</a>
            <a href="{$urlBase}/saiu-na-midia">Saiu na Mídia</a>
            <a href="{$urlBase}/videos">Vídeos</a>
            <a href="{$urlBase}/cursos">Cursos</a>
            <a href="{$urlBase}/eventos">Eventos</a>
            </div>
            <img src="{$urlBase}/assets/png/logo-munra-branco.png" alt="Munrá" />
            <div class="contact">
            <img src="{$urlBase}/assets/svg/fabio-branco.svg" alt="Fabio Munrá" />
            <span>{$conteudoContatos['enderecoContato']}</span>
            <span><img src="{$urlBase}/assets/svg/whatsapp-branco.svg" alt="Whatsapp" />{$conteudoContatos['whatsappContato']}</span>
            </div>
        </div>
        </div>
        <div class="terms">
        <a href="{$urlBase}/politica-de-privacidade">Política de Privacidade</a><a href="{$urlBase}/termos-de-uso">Termos de Uso</a><a
            href="{$urlBase}/seguranca-no-uso-da-internet">Segurança no Uso da Internet</a>
        </div>
        <div class="rights-reserved">
        <img src="{$urlBase}/assets/svg/logo-wmb.svg" alt="WMB" />
        <span>2023 - Todos os direitos reservados - Fábio Munrá</span>
        </div>
    </footer>
    <div class="btn-flutuante">
        <button type="button" class="btn-sobe-topo" alt="Voltar ao topo da pagina" onClick="SubirTopo()"><i class="fa-solid fa-angle-up" aria-label="Botão flutuante contato" title="Botão flutuante contato"></i></button>
        <a class="whatsapp" href="{$conteudoContatos['linkWhatsappContato']}" title="Whatsapp" target="_blank">
            <img loading="lazy" src="{$urlBase}/assets/svg/whatsapp-branco.svg" alt="Imagem Whatsapp">
        </a>
    </div>
    <section class="section_cookie hidden">
        <div class="container">
            <div class="col-12">
                <div class="row box">
                    <div class="col-12 text">
                        <p>Cookies: a gente guarda estatísticas de visitas para melhorar sua experiência de navegação. Ao continuar, você concorda com nossa <a href="./politica-de-privacidade">Política de Privacidade</a>.</p>
                        <button type="button" class="close_cookie" onClick="acceptCookies()"> Concordo e fechar </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    HTML;
}

function redesSociaisCompartilhar($cor)
{

    echo '
        <a href="javascript:" onClick="Compartilhar(this)" title="facebook"><img loading="lazy" src="' . BASE_URL . '/assets/svg/facebook-' . $cor . '.svg" alt="facebook"></a> 
        <a href="javascript:" onClick="Compartilhar(this)" title="linkedin"><img loading="lazy" src="' . BASE_URL . '/assets/svg/linkedin-' . $cor . '.svg" alt="linkedin"></a> 
        <a href="javascript:" onClick="Compartilhar(this)" title="twitter"><img loading="lazy" src="' . BASE_URL . '/assets/svg/x-' . $cor . '.svg" alt="twitter"></a> 
        <a href="javascript:" onClick="Compartilhar(this)" title="telegram"><img loading="lazy" src="' . BASE_URL . '/assets/svg/telegram-' . $cor . '.svg" alt="telegram"></a> 
        <a href="javascript:" onClick="Compartilhar(this)" title="whatsapp"><img loading="lazy" src="' . BASE_URL . '/assets/svg/whatsapp-' . $cor . '.svg" alt="whatsapp"></a>
    ';
}

function redesSociais($cor) {
    try{
        $con = new PDO('mysql:host=localhost;dbname=grupocruvinel', 'admin', '');
    }
    catch (PDOException $ex){
        echo 'Erro: '.$ex->getMessage();
    }

    $sqlRedes = $con->prepare("SELECT * FROM redes WHERE idRede = :idRede");
    $sqlRedes->bindValue(":idRede", 1);
    $sqlRedes->execute();
    $conteudoRedes = $sqlRedes->fetch(PDO::FETCH_ASSOC);

    if (!empty($conteudoRedes['instagram'])) {
        echo '<a href="' . $conteudoRedes['instagram'] . '" target="_blank" title="instagram"><img loading="lazy" src="' . BASE_URL . '/assets/svg/instagram-' . $cor . '.svg" alt="instagram"></a>';
    }
    if (!empty($conteudoRedes['facebook'])) {
        echo '<a href="' . $conteudoRedes['facebook'] . '" target="_blank" title="facebook"><img loading="lazy" src="' . BASE_URL . '/assets/svg/facebook-' . $cor . '.svg" alt="facebook"></a>';
    }
    if (!empty($conteudoRedes['linkedin'])) {
        echo '<a href="' . $conteudoRedes['linkedin'] . '" target="_blank" title="linkedin"><img loading="lazy" src="' . BASE_URL . '/assets/svg/linkedin-' . $cor . '.svg" alt="linkedin"></a>';
    }
    if (!empty($conteudoRedes['twitter'])) {
        echo '<a href="' . $conteudoRedes['twitter'] . '" target="_blank" title="twitter"><img loading="lazy" src="' . BASE_URL . '/assets/svg/x-' . $cor . '.svg" alt="twitter"></a>';
    }
    if (!empty($conteudoRedes['telegram'])) {
        echo '<a href="' . $conteudoRedes['telegram'] . '" target="_blank" title="telegram"><img loading="lazy" src="' . BASE_URL . '/assets/svg/telegram-' . $cor . '.svg" alt="telegram"></a>';
    }
    if (!empty($conteudoRedes['pinterest'])) {
        echo '<a href="' . $conteudoRedes['pinterest'] . '" target="_blank" title="pinterest"><img loading="lazy" src="' . BASE_URL . '/assets/svg/pinterest-' . $cor . '.svg" alt="pinterest"></a>';
    }
    if (!empty($conteudoRedes['tiktok'])) {
        echo '<a href="' . $conteudoRedes['tiktok'] . '" target="_blank" title="tiktok"><img loading="lazy" src="' . BASE_URL . '/assets/svg/tiktok-' . $cor . '.svg" alt="tiktok"></a>';
    }
    if (!empty($conteudoRedes['youtube'])) {
        echo '<a href="' . $conteudoRedes['youtube'] . '" target="_blank" title="youtube"><img loading="lazy" src="' . BASE_URL . '/assets/svg/youtube-' . $cor . '.svg" alt="youtube"></a>';
    }
}

function elementosGerais()
{
    echo <<<HTML
        <div class="popup-video" id="popupVideo">
            <span class="fecha-popup" id="fechaPopup" onClick="PopUpVideo('Fechando')"></span>
            <div class="video">
                <iframe loading="lazy" width="100%" height="100%" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>

        <div class="popup-podcast" id="popupPodcast">
            <span class="fecha-popup" id="fechaPopup" onClick="PopUpPodcast('Fechando')"></span>
            <div class="podcast"></div>
        </div>
    HTML;
}

function linksHead()
{
    echo '
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="' . BASE_URL . '/painel/tema/assets/vendor/toastr/toastr.min.css">
    ';
}

function scriptBody()
{
    echo '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script defer src="' . BASE_URL . '/painel/tema/assets/vendor/toastr/toastr.js"></script>
    <script defer src="' . BASE_URL . '/script/feed-insta.js"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script>
    ';
}

function formEmailNewsletter(){
    try{
        $con = new PDO('mysql:host=localhost;dbname=grupocruvinel', 'admin', '');
    }
    catch (PDOException $ex){
        echo 'Erro: '.$ex->getMessage();
    }

    $sqlFormulario = $con->prepare("SELECT * FROM formularios WHERE descricaoFormulario = :descricaoFormulario");
    $sqlFormulario->bindValue(":descricaoFormulario", 'newsletter');
    $sqlFormulario->execute();
    $formulario = $sqlFormulario->fetch(PDO::FETCH_ASSOC);

    $urlBase = BASE_URL;

    echo <<<HTML
        <div class="info-email">
            <img src="{$urlBase}/assets/png/fabio-email.png" alt="Fabio Munrá" class="superior-img" />
            <img class="img-background desktop" src="{$urlBase}/assets/png/fundo-email-desktop.png" alt="Fundo" />
            <img class="img-background mobile" src="{$urlBase}/assets/png/fundo-email-mobile.png" alt="Fundo" />
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 text">
                        <h1>Receba Informações</h1>
                        <h2>em seu e-mail</h2>
                    </div>
                    <div class="col-12 col-lg-6">
                        <form id="formulario-2">
                            <input type="hidden" name="origem" id="origem" value="formulario">
                            <input type="hidden" name="newsLetter" id="newsLetter" value="sim">
                            <input type="hidden" name="quemRecebe" id="quemRecebe" value="{$formulario['emailFormulario']}">
                            <input type="hidden" name="tituloPagina" id="tituloPagina" value="">
                            <input type="text" name="contatoNome" id="contatoNome" placeholder="Nome:" />
                            <input type="text" name="contatoEmail" id="contatoEmail" placeholder="E-mail:" />
                            <input type="text" name="contatoTelefone" id="contatoTelefone" placeholder="Telefone:" onkeyup="mascaraTel(this);" maxlength="15" />
                            <button type="button" class="send botao-enviar" onClick="EnviarFormulario(2)">
                                Enviar <img src="{$urlBase}/assets/svg/seta-branca.svg" alt="Seta" />
                            </button>
                            <label for="email-checkbox"><input id="email-checkbox" type="checkbox" name="contatoTermo" id="contatoTermo" />Lorem
                                ipsum dolor
                                sit amet consectetur adipisicing elit.
                                Voluptatum, necessitatibus?</label>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        HTML;
}

function banner($titulo, $srcDesktop, $srcMobile){

    echo <<<HTML
    <div class="banner">
        <img class="img-background desktop"
            src={$srcDesktop}
            alt="Banner">
        <img class="img-background mobile"
            src={$srcMobile}
            alt="Banner">
        <div class="container">
            <div class="row">
            <div class="col-12 col-lg-6 bloco-1">
                <div class="title">
                <p>{$titulo}</p>
                </div>
            </div>
            <div class="col-12 col-lg-6 bloco-2"></div>
            </div>
        </div>
    </div>
    HTML;
}
