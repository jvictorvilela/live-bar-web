<?php

if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
    require 'config.php';
    require 'src/Login.php';
    $login = new Login($mysql);
    $authenticate = $login->authenticate($_SESSION['login'], $_SESSION['password']);

    if ($authenticate) {
        header('Location: index.php');
        die();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'config.php';
    require 'src/Login.php';
    $login = new Login($mysql);
    $authenticate = $login->authenticate($_POST['login'], $_POST['password']);
    
    if ($authenticate) {
        session_start();
        $_SESSION['login'] = $_POST['login'];
        $_SESSION['password'] = $_POST['password'];
        header('Location: index.php');
        die();
    } else {
        header('Location: login.php?erro=1');
        die();
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Serviço de Transmissão - Login</title>
</head>
<body>
    <div class="container h-100">
        <div class="row d-flex h-100">
            <div class="col-lg-4 offset-lg-4 align-self-center">
                <h3 class="text-center mb-4">Serviço de Transmissão</h3>
                <div class="login-box">
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['erro']) && $_GET['erro'] == '1'): ?>
                        <div class="alert alert-danger" role="alert">
                            Usuário ou senha incorreto!
                        </div>
                    <?php endif; ?>
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <label for="loginInput">Login</label>
                            <input type="text" class="form-control" id="loginInput" name="login">
                        </div>
                        <div class="form-group">
                            <label for="passwordInput">Senha</label>
                            <input type="password" class="form-control" id="passwordInput" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</html>