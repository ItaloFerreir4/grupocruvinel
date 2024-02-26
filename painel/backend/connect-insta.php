<?php
session_start();

include_once '../../assets/componentes.php';

if(isset($_POST['origem']) && $_POST['origem'] == "connect"){
    // Parâmetros da solicitação de autorização do Instagram
    $urlBase = BASE_URL;
    $clientId = '1544729609652851';  // Substitua pelo seu ID de cliente real
    $redirectUri = $urlBase.'/auth';
    $scope = 'user_profile,user_media';
    $responseType = 'code';

    // URL de autorização
    $authorizationUrl = "https://api.instagram.com/oauth/authorize?client_id={$clientId}&redirect_uri={$redirectUri}&scope={$scope}&response_type={$responseType}";

    echo $authorizationUrl;
    // header("Location: {$authorizationUrl}");
    exit;
}