<?php

require("../PHPMailer/src/PHPMailer.php");
require("../PHPMailer/src/SMTP.php");

include_once '../painel/backend/conexao-banco.php';

if (isset($_POST['origem'])) {

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    $para = "";
    $assunto = "";
    $mensagem = "";

	if (isset($_POST['tituloPagina'])) {
        $tituloPagina = $_POST["tituloPagina"];
    }
    if (isset($_POST['contatoNome'])) {
        $contatoNome = $_POST["contatoNome"];
        $mensagem .= "Nome: $contatoNome\r\n <br>";
    }
    if (isset($_POST['contatoEmail'])) {
        $contatoEmail = $_POST["contatoEmail"];
        $mensagem .= "Email: $contatoEmail\r\n <br>";
    }
    if (isset($_POST['ddi'])) {
        $ddi = $_POST["ddi"];
        $mensagem .= "País: $ddi\r\n <br>";
    }
    if (isset($_POST['contatoTelefone'])) {
        $contatoTelefone = $_POST["contatoTelefone"];
        $mensagem .= "Telefone: $contatoTelefone\r\n <br>";
    }
    if (isset($_POST['contatoWhatsApp'])) {
        $contatoWhatsApp = $_POST["contatoWhatsApp"];
        $mensagem .= "WhatsApp: $contatoWhatsApp\r\n <br>";
    }
	if (isset($_POST['conferirWhatsapp'])) {
        $conferirWhatsapp = $_POST["conferirWhatsapp"];
        $mensagem .= "O telefone é Whatsapp\r\n <br>";
    }
    if (isset($_POST['contatoArea'])) {
        $contatoArea = $_POST["contatoArea"];
        $mensagem .= "Área: $contatoArea\r\n <br>";
    }
    if (isset($_POST['contatoEstado'])) {
        $contatoEstado = $_POST["contatoEstado"];
        $mensagem .= "Estado: $contatoEstado\r\n <br>";
    }
    if (isset($_POST['contatoGenero'])) {
        $contatoGenero = $_POST["contatoGenero"];
        $mensagem .= "Gênero: $contatoGenero\r\n <br>";
    }
	if (isset($_POST['contatoAssunto'])) {
        $assunto = $_POST["contatoAssunto"];
		$mensagem .= "Interesse: $assunto\r\n <br>";
    }
    if (isset($_POST['contatoMensagem'])) {
        $contatoMensagem = $_POST["contatoMensagem"];
        $mensagem .= "Mensagem: $contatoMensagem\r\n <br>";
    }
    if (isset($_POST['quemRecebe'])) {
        $quemRecebe = $_POST["quemRecebe"];

        $emails = explode(",", $quemRecebe);

        foreach ($emails as &$email) {
            $mail->AddAddress($email);
        }
    }
	if (isset($_POST['newsLetter']) && $_POST['newsLetter'] == "sim") {
        criarEmail($con, $tituloPagina, $contatoNome, $contatoEmail, $contatoTelefone);
    }
    
    $mail->IsSMTP(); // enable SMTP
    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "italoferreiracode.com.br";
    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
    $mail->Username = "admin@italoferreiracode.com.br";
    $mail->Password = "|h&+7;(G2p5^&f";
    $mail->SetFrom("admin@italoferreiracode.com.br");
    $mail->Subject = $tituloPagina;
    $mail->Body = $mensagem;
	$mail->CharSet = 'UTF-8';
    if(!$mail->Send()) {
        echo true;
    } else {
        echo false;
    }

}

function criarEmail($con, $titulo, $nome, $email, $telefone){
	$sql = $con->prepare('INSERT INTO emails(tituloPagina, nome, email, telefone) VALUES(:tituloPagina, :nome, :email, :telefone)');
	$sql->bindValue(":tituloPagina",$titulo);
	$sql->bindValue(":nome",$nome);
	$sql->bindValue(":email",$email);
	$sql->bindValue(":telefone",$telefone);
	if($sql->execute()){
		echo true;
	}else{
		echo false;
	}
}
?>