<?php

include_once("./assets/componentes.php");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nossas Empresas</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/empresas.css">
</head>

<body>
    <?php banner(
        "NOSSAS EMPRESAS",
        "NOSSAS EMPRESAS",
        "NOSSAS EMPRESAS",
        "./assets/png/banner-empresas.png",
        "./assets/png/banner-empresas.png"
    ); ?>

    <section class="companies">
        <div class="shaped-content container">
            <div class="company-card-wrapper">
                <div class="company-card">
                    <div class="img-container">
                        <img src="assets/png/logo-evidjuri.png" alt="EvidJuri">
                    </div>
                    <div class="content">
                        <h1>EVIDJURI</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo ex at natus nulla eaque a saepe
                            nemo temporibus beatae minus! Magnam qui culpa recusandae? Magnam, hic sit. Consectetur,
                            laboriosam ut.</p>
                        <a href="empresa-detalhes.php" class="outline-button">
                            Saiba Mais
                            <img src="assets/svg/seta-dir-marrom.svg" alt="Saiba Mais">
                        </a>
                    </div>
                </div>
            </div>
            <div class="company-card-wrapper">
                <div class="company-card">
                    <div class="img-container">
                        <img src="assets/png/logo-evidjuri.png" alt="EvidJuri">
                    </div>
                    <div class="content">
                        <h1>EVIDJURI</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo ex at natus nulla eaque a saepe
                            nemo temporibus beatae minus! Magnam qui culpa recusandae? Magnam, hic sit. Consectetur,
                            laboriosam ut.</p>
                        <a href="empresa-detalhes.php" class="outline-button">
                            Saiba Mais
                            <img src="assets/svg/seta-dir-marrom.svg" alt="Saiba Mais">
                        </a>
                    </div>
                </div>
            </div>
            <div class="company-card-wrapper">
                <div class="company-card">
                    <div class="img-container">
                        <img src="assets/png/logo-evidjuri.png" alt="EvidJuri">
                    </div>
                    <div class="content">
                        <h1>EVIDJURI</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo ex at natus nulla eaque a saepe
                            nemo temporibus beatae minus! Magnam qui culpa recusandae? Magnam, hic sit. Consectetur,
                            laboriosam ut.</p>
                        <a href="empresa-detalhes.php" class="outline-button">
                            Saiba Mais
                            <img src="assets/svg/seta-dir-marrom.svg" alt="Saiba Mais">
                        </a>
                    </div>
                </div>
            </div>
            <div class="company-card-wrapper">
                <div class="company-card">
                    <div class="img-container">
                        <img src="assets/png/logo-evidjuri.png" alt="EvidJuri">
                    </div>
                    <div class="content">
                        <h1>EVIDJURI</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo ex at natus nulla eaque a saepe
                            nemo temporibus beatae minus! Magnam qui culpa recusandae? Magnam, hic sit. Consectetur,
                            laboriosam ut.</p>
                        <a href="empresa-detalhes.php" class="outline-button">
                            Saiba Mais
                            <img src="assets/svg/seta-dir-marrom.svg" alt="Saiba Mais">
                        </a>
                    </div>
                </div>
            </div>
            <div class="company-card-wrapper">
                <div class="company-card">
                    <div class="img-container">
                        <img src="assets/png/logo-evidjuri.png" alt="EvidJuri">
                    </div>
                    <div class="content">
                        <h1>EVIDJURI</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo ex at natus nulla eaque a saepe
                            nemo temporibus beatae minus! Magnam qui culpa recusandae? Magnam, hic sit. Consectetur,
                            laboriosam ut.</p>
                        <a href="empresa-detalhes.php" class="outline-button">
                            Saiba Mais
                            <img src="assets/svg/seta-dir-marrom.svg" alt="Saiba Mais">
                        </a>
                    </div>
                </div>
            </div>
            <div class="company-card-wrapper">
                <div class="company-card">
                    <div class="img-container">
                        <img src="assets/png/logo-evidjuri.png" alt="EvidJuri">
                    </div>
                    <div class="content">
                        <h1>EVIDJURI</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo ex at natus nulla eaque a saepe
                            nemo temporibus beatae minus! Magnam qui culpa recusandae? Magnam, hic sit. Consectetur,
                            laboriosam ut.</p>
                        <a href="empresa-detalhes.php" class="outline-button">
                            Saiba Mais
                            <img src="assets/svg/seta-dir-marrom.svg" alt="Saiba Mais">
                        </a>
                    </div>
                </div>
            </div>
            <div class="company-card-wrapper">
                <div class="company-card">
                    <div class="img-container">
                        <img src="assets/png/logo-evidjuri.png" alt="EvidJuri">
                    </div>
                    <div class="content">
                        <h1>EVIDJURI</h1>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quo ex at natus nulla eaque a saepe
                            nemo temporibus beatae minus! Magnam qui culpa recusandae? Magnam, hic sit. Consectetur,
                            laboriosam ut.</p>
                        <a href="empresa-detalhes.php" class="outline-button">
                            Saiba Mais
                            <img src="assets/svg/seta-dir-marrom.svg" alt="Saiba Mais">
                        </a>
                    </div>
                </div>
            </div>
            <button class="outline-button load-more" onclick="loadMore(listElements)">
                Carregar Mais
                <img src="./assets/svg/seta-dir-marrom.svg" alt="Carregar mais">
            </button>
        </div>
    </section>
     <script>
        let maxVisibleElements = 6;
        const listElements = document.querySelectorAll(".company-card-wrapper");

        sessionStorage.setItem("t", "");
        sessionStorage.setItem("y", new Date().getFullYear().toString().substring(2, 2));
        sessionStorage.setItem("m", "");
    </script>
    <script src="javascript/global.js"></script>
    <script src="javascript/filter.js"></script>
</body>

</html>