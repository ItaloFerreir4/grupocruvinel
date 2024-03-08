<?php

define('BASE_URL', 'http://localhost/grupocruvinel');

function cHeader(){
    $baseURL = BASE_URL;

    echo <<<HTML
    <header>
        <a href="{$baseURL}" title="home"><img src="{$baseURL}/assets/svg/logo-cruvinel-dourado.svg" alt="Logo" class="logo"></a>
        <nav>
            <a href="{$baseURL}/quem-somos">QUEM SOMOS</a>
            <a href="{$baseURL}/empresas">EMPRESAS</a>
            <a href="{$baseURL}/servicos">SERVICOS</a>
            <a href="{$baseURL}/clientes">CLIENTES</a>
            <a href="{$baseURL}/blog">BLOG</a>
            <a href="{$baseURL}/fale-conosco">FALE CONOSCO</a>
            <button class="menu">
                <img src="{$baseURL}/assets/svg/menu.svg" alt="Menu">
            </button>
            <div class="expand">
                <a href="{$baseURL}/quem-somos">QUEM SOMOS</a>
                <a href="{$baseURL}/empresas">EMPRESAS</a>
                <a href="{$baseURL}/servicos">SERVICOS</a>
                <a href="{$baseURL}/clientes">CLIENTES</a>
                <a href="{$baseURL}/blog">BLOG</a>
                <a href="{$baseURL}/fale-conosco">FALE CONOSCO</a>
            </div>
        </nav>
    </header>
HTML;
}

function cFooter(){
    try {
        $con = new PDO('mysql:host=localhost;dbname=grupocruvinel', 'admin', '');
    } catch (PDOException $ex) {
        echo 'Erro: ' . $ex->getMessage();
    }

    $sqlContatos = $con->prepare("SELECT * FROM contatos WHERE idContato = :idContato");
    $sqlContatos->bindValue(":idContato", 1);
    $sqlContatos->execute();
    $conteudoContatos = $sqlContatos->fetch(PDO::FETCH_ASSOC);

    $urlBase = BASE_URL;

    ob_start();
    redesSociais("amarelo");
    $redes = ob_get_clean();

    echo <<<HTML
    <footer>
        <div class="links">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-3"><img class="logo" src="{$urlBase}/assets/svg/logo-cruvinel-dourado.svg"
                            alt="Logo"></div>
                    <div class="col-12 col-lg-6 pages">
                        <div class="accordion">
                            <div class="title">
                                <div>
                                    <span class="limit-text">MENU NAVEGAÇÃO</span>
                                </div>
                            </div>
                            <div class="panel">
                                <a href="{$urlBase}/quem-somos">QUEM SOMOS</a>
                                <a href="{$urlBase}/empresas">NOSSAS EMPRESAS</a>
                                <a href="{$urlBase}/servicos">SERVIÇOS</a>
                                <a href="{$urlBase}/depoimentos">DEPOIMENTOS</a>
                                <a href="{$urlBase}/clientes">NOSSOS CLIENTES</a>
                                <a href="{$urlBase}/blog">BLOG</a>
                                <a href="{$urlBase}/fale-conosco">FALE CONOSCO</a>
                                <a href="{$urlBase}/">STHEFANO CRUVINEL CEO E FUNDADOR</a>
                            </div>
                        </div>
                        <a href="{$urlBase}/quem-somos">QUEM SOMOS</a>
                        <a href="{$urlBase}/empresas">NOSSAS EMPRESAS</a>
                        <a href="{$urlBase}/servicos">SERVIÇOS</a>
                        <a href="{$urlBase}/depoimentos">DEPOIMENTOS</a>
                        <a href="{$urlBase}/clientes">NOSSOS CLIENTES</a>
                        <a href="{$urlBase}/blog">BLOG</a>
                        <a href="{$urlBase}/fale-conosco">FALE CONOSCO</a>
                        <a href="{$urlBase}/">STHEFANO CRUVINEL CEO E FUNDADOR</a>
                    </div>
                    <div class="col-12 col-lg-3 contact">
                        <span>{$conteudoContatos['whatsappContato']}</span>
                        <span>{$conteudoContatos['telefoneContato']}</span>
                        <span class="email">{$conteudoContatos['emailContato']}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-3"></div>
                    <div class="col-12 col-lg-9">
                        <span class="label-social-media">Siga meus canais</span>
                        <div class="social-media">
                            {$redes}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="location">
            <h1>{$conteudoContatos['enderecoContato']}</h1>
        </div>
        <div class="terms">
            <a href="{$urlBase}/termos-de-uso">Termos de uso</a>
            <a href="{$urlBase}/politica-de-privacidade">Política de privacidade</a>
            <a href="{$urlBase}/seguranca-no-uso-da-internet">Segurança no Uso da Internet</a>
        </div>
        <div class="rights">
            <div class="container">
                <p>TODOS OS DIREITOS RESERVADOS. Todo o conteúdo do site, todas as fotos, imagens, logotipos, marcas,
                    dizeres, som, software, conjunto imagem, layout, trade dress, aqui veiculados são de propriedade
                    exclusiva da Sthefano Cruvinel. ou de seus parceiros. É vedada qualquer reprodução, total ou
                    parcial, de
                    qualquer elemento de identidade, sem expressa autorização. A violação de qualquer direito mencionado
                    implicará na responsabilização cível e criminal nos termos da Lei.</p>
                <span>© 2024 EvidJuri Desenvolvido por: WMB Marketing Digital</span>
            </div>
        </div>
    </footer>
HTML;
}

function redesSociaisCompartilhar($cor){

    echo '
        <a href="javascript:" onClick="Compartilhar(this)" title="facebook"><img loading="lazy" src="' . BASE_URL . '/assets/svg/facebook-' . $cor . '.svg" alt="facebook"></a> 
        <a href="javascript:" onClick="Compartilhar(this)" title="linkedin"><img loading="lazy" src="' . BASE_URL . '/assets/svg/linkedin-' . $cor . '.svg" alt="linkedin"></a> 
        <a href="javascript:" onClick="Compartilhar(this)" title="twitter"><img loading="lazy" src="' . BASE_URL . '/assets/svg/x-' . $cor . '.svg" alt="twitter"></a> 
        <a href="javascript:" onClick="Compartilhar(this)" title="telegram"><img loading="lazy" src="' . BASE_URL . '/assets/svg/telegram-' . $cor . '.svg" alt="telegram"></a> 
        <a href="javascript:" onClick="Compartilhar(this)" title="whatsapp"><img loading="lazy" src="' . BASE_URL . '/assets/svg/whatsapp-' . $cor . '.svg" alt="whatsapp"></a>
    ';
}

function redesSociais($cor){
    try {
        $con = new PDO('mysql:host=localhost;dbname=grupocruvinel', 'admin', '');
    } catch (PDOException $ex) {
        echo 'Erro: ' . $ex->getMessage();
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

function elementosGerais(){
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

function linksHead(){
    echo '
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="' . BASE_URL . '/painel/tema/assets/vendor/toastr/toastr.min.css">
    ';
}

function scriptBody(){
    echo '
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script defer src="' . BASE_URL . '/painel/tema/assets/vendor/toastr/toastr.js"></script>
    ';
}

function formEmailNewsletter(){
    try {
        $con = new PDO('mysql:host=localhost;dbname=grupocruvinel', 'admin', '');
    } catch (PDOException $ex) {
        echo 'Erro: ' . $ex->getMessage();
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

function banner($titulo, $altDesktop, $altMobile, $srcDesktop, $srcMobile){

    echo <<<HTML
    <div class="banner">
        <img class="img-background desktop"
            src={$srcDesktop}
            alt={$altDesktop}>
        <img class="img-background mobile"
            src={$srcMobile}
            alt={$altMobile}>
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
