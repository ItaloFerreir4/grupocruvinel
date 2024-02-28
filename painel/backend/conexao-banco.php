<?php

try{
    $con = new PDO('mysql:host=localhost;dbname=grupocruvinel', 'admin', '');
}
catch (PDOException $ex){
    echo 'Erro: '.$ex->getMessage();
}
?>