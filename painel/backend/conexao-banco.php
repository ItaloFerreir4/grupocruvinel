<?php

try{
    $con = new PDO('mysql:host=localhost;dbname=fabiomunra', 'admin', '');
}
catch (PDOException $ex){
    echo 'Erro: '.$ex->getMessage();
}
?>