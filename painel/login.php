<?php

session_start();

// Verificar se o usuário já está logado
if (isset($_SESSION['username'])) {
    header('Location: home.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<title>Login</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Qubes Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">

<link rel="icon" type="image/svg" href="../assets/svg/favicon.svg">

<!-- VENDOR CSS -->
<link rel="stylesheet" href="tema/assets/vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="tema/assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="tema/assets/vendor/animate-css/vivify.min.css">
<link rel="stylesheet" href="tema/assets/vendor/toastr/toastr.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="tema/assets/css/site.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body class="theme-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><i class="fa fa-cube font-25"></i></div>
            <p>Carregando...</p>        
        </div>
    </div>
<!-- Overlay For Sidebars -->

    <div class="auth-main">
        <div class="auth_div">
            <div class="card">
                <div class="body">
                    <p class="lead">Entrar</p>
                    <form class="form-auth-small m-t-20" method="post" id="formLogin">
                        <input type="hidden" name="origem" value="login">
                        <div class="form-group">
                            <label for="signin-email" class="control-label sr-only">Email</label>
                            <input type="email" class="form-control round" name="emailUser" id="emailUser" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="signin-password" class="control-label sr-only">Password</label>
                            <input type="password" class="form-control round" name="passwordUser" id="passwordUser" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-round btn-block">LOGIN</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- END WRAPPER -->

<!-- Bootstrap 4x JS  -->
<script src="tema/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="tema/assets/bundles/vendorscripts.bundle.js"></script>
<script src="tema/assets/js/common.js"></script>

<script defer src="tema/assets/vendor/toastr/toastr.js"></script>

<script>
    $("#formLogin").submit(function(e) {

    var email = document.getElementById('emailUser').value;
    var password = document.getElementById('passwordUser').value;
    var campos = [email, password];

    if(campos.includes('') || campos.includes(' ')){

        toastr["error"]("Campos vazios!");

    }else{
        $.ajax({		
            type: 'POST',
            url: "./backend/login.php",
            data:  $("#formLogin").serialize()
        }).done(function(data){
            
            toastr.options.timeOut = "2000";
            
            console.log(data);
            
            if(data == 'logado'){
                toastr["success"]("Entrou");
                window.open("home", "_self");
            }
            else{
                toastr["error"](data);
            }

        });

    }

    e.preventDefault();// esse comando serve para previnir que o form realmente realize o submit e atualize a tela.

    });
</script>
</body>
</html>