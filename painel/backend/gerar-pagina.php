<?php

function geraPagina($categoriaId, $nomeCategoria, $nomeArquivo){

    $conteudo = file_get_contents('../frontend/modelos/'.$categoriaId.'-detalhes.php');

    $diretorio = '../../'.$nomeCategoria;

    // Verifica se o diretório existe; se não, cria-o
    if (!file_exists($diretorio) && !is_dir($diretorio)) {
        if (!mkdir($diretorio, 0755, true)) {
            echo false;
            return;
        }
    }

    $caminho_arquivo = $diretorio.'/'.$nomeArquivo.'.php';

    if (file_put_contents($caminho_arquivo, $conteudo) !== false) {
        // echo true;
    } else {
        echo false;
    }
}

function excluiPagina($nomeCategoria, $nomeArquivo) {

    $caminho_arquivo = '../../'.$nomeCategoria.'/'.$nomeArquivo.'.php';

    if (file_exists($caminho_arquivo) && is_file($caminho_arquivo)) {

        if (unlink($caminho_arquivo)) {
            echo true;
        } else {
            echo false;
        }
    } else {
        echo false;
    }
}

?>