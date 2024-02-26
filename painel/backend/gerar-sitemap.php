<?php

include_once '../../assets/componentes.php';

// Diretório raiz do seu site
$dir_raiz = '../../';

// Nome do arquivo de sitemap
$sitemap_file = $dir_raiz . 'sitemap.xml';

// Lista de diretórios a serem excluídos do sitemap
$excluir_diretorios = array(
    '/assets',
    '/backend',
    '/PHPMailer',
    '/painel',
    '/css',
    '/javascript'
);

// Inicialize o documento XML
$xml = '<?xml version="1.0" encoding="UTF-8"?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

// Função para listar os arquivos e diretórios em um diretório recursivamente
function listarArquivos($diretorio) {
    $arquivos = glob($diretorio . '/*');
    if ($arquivos === false) return array();
    $result = array();
    foreach ($arquivos as $arquivo) {
        if (is_dir($arquivo)) {
            $result = array_merge($result, listarArquivos($arquivo));
        } else {
            $result[] = $arquivo;
        }
    }
    return $result;
}

// Liste todos os arquivos do site recursivamente
$arquivos = listarArquivos($dir_raiz);

// Converta os caminhos dos arquivos em URLs do site
foreach ($arquivos as $arquivo) {
    $url = str_replace($dir_raiz, BASE_URL, $arquivo);

    // Obtenha o caminho relativo do arquivo em relação ao diretório raiz
    $caminho_relativo = substr($arquivo, strlen($dir_raiz));

    // Verifique se o caminho relativo do arquivo contém algum dos diretórios a serem excluídos
    $excluir = false;
    foreach ($excluir_diretorios as $diretorio) {
        if (strpos($caminho_relativo, $diretorio) === 0) {
            $excluir = true;
            break;
        }
    }

    // Se não estiver na lista de exclusão, adicione a URL ao sitemap com lastmod e priority
    if (!$excluir) {
        $lastmod = date("c", filemtime($arquivo)); // Data da última modificação do arquivo
        $priority = 1.00; // Prioridade (você pode ajustar conforme necessário)

        $xml .= '
        <url>
            <loc>' . htmlspecialchars($url) . '</loc>
            <lastmod>' . htmlspecialchars($lastmod) . '</lastmod>
            <priority>' . htmlspecialchars($priority) . '</priority>
        </url>';
    }
}

// Feche o documento XML
$xml .= '</urlset>';

// Salve o sitemap no arquivo
file_put_contents($sitemap_file, $xml);

echo true;

?>
