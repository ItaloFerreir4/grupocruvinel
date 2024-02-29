<?php

include_once("./assets/componentes.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/clientes.css">
</head>

<body>
    <?php banner(
        "CLIENTES",
        "CLIENTES",
        "CLIENTES",
        "./assets/png/banner-clientes.png",
        "./assets/png/banner-clientes.png"
    ); ?>
    <section class="clients">
        <div class="shaped-content container">
            <div class="grid-content">
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
                <a href="https://google.com" class="client-wrapper">
                    <div class="client">
                        <img src="assets/svg/cliente.svg" alt="Mitsubishi Motors">
                    </div>
                </a>
            </div>
            <button class="outline-button load-more" onclick="loadMore(listElements)">
                Carregar Mais
                <img src="./assets/svg/seta-dir-marrom.svg" alt="Carregar mais">
            </button>
        </div>
    </section>

    <!-- -------------------------------- -->
    <!-- ADICIONAR COMPONENTE DE BUSINESS -->
    <!-- -------------------------------- -->

    <script>
        let maxVisibleElements = 12;
        const listElements = document.querySelectorAll(".client-wrapper");

        sessionStorage.setItem("t", "");
        sessionStorage.setItem("y", new Date().getFullYear().toString().substring(2, 2));
        sessionStorage.setItem("m", "");
    </script>
    <script src="javascript/global.js"></script>
    <script src="javascript/filter.js"></script>
</body>

</html>