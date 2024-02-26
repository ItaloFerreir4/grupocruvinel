<?php

$frequencia = $_POST['frequencia'];

if ($frequencia === 'semanal') {
    // Exemplo: 0 2 * * 0 (executar aos domingos às 2:00 AM)
    exec('crontab -l | { cat; echo "0 2 * * 0 /usr/bin/php ./gerar_sitemap.php"; } | crontab -');
}elseif ($frequencia === 'mensal') {
    // Exemplo: 0 3 1 * * (executar no primeiro dia de cada mês às 3:00 AM)
    exec('crontab -l | { cat; echo "0 3 1 * * /usr/bin/php ./gerar_sitemap.php"; } | crontab -');
}

echo true;
