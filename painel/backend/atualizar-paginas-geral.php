<?php
session_start();

include_once './conexao-banco.php';
include_once './gerar-pagina.php';

if(isset($_POST['origem']) && $_POST['origem'] == "atualizarGeral"){
    try {
        $sqlCount = $con->prepare("SELECT * FROM paginas WHERE categoriaId > :categoriaId ORDER BY categoriaId ASC");
        $sqlCount->bindValue(":categoriaId", 1);
        $sqlCount->execute();
        while($row = $sqlCount->fetch(PDO::FETCH_OBJ)){

            $categoriaId = $row->categoriaId;
            $baseDirectory = '../..'; // Substitua pelo caminho real do diretório raiz do seu servidor

            // Mapeia a categoriaId para o diretório correspondente
            $mapeamentoDiretorio = [
                '3' => 'empresa-detalhes',
                '4' => 'workshop-detalhes',
                '6' => 'mentoria-detalhes',
                '8' => 'consultoria-detalhes',
                '9' => 'evento-detalhes',
                '10' => 'blog-detalhes',
                '11' => 'saiu-na-midia-detalhes',
                '12' => 'livro-detalhes',
                '13' => 'curso-detalhes',
                '20' => 'blog-detalhes/categorias',
                '21' => 'saiu-na-midia-detalhes/categorias',
                '22' => 'video-detalhes/categorias',
                '23' => 'podcast-detalhes/categorias',
                '24' => 'palestra-detalhes',
                '25' => 'artigo-detalhes',
                '26' => 'artigo-detalhes/categorias',
                '27' => 'ebook-detalhes'
            ];

            // Verifica se a categoriaId existe no mapeamento
            if (isset($mapeamentoDiretorio[$categoriaId])) {
                $diretorio = $mapeamentoDiretorio[$categoriaId];
                $nomeArquivoAtual = $baseDirectory . '/' . $diretorio . '/' . $row->nomePagina . '.php';

                geraPagina($categoriaId, $diretorio, $row->nomePagina);

                echo "id: " . $diretorio . "\n";
            }

        }
    } catch (PDOException $e) {
        // echo "Erro: " . $e->getMessage();
        echo false;
    }
    

}