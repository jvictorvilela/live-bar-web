<?php
session_start();
if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
    require 'config.php';
    require 'src/Login.php';
    require 'src/Mensagem.php';
    $login = new Login($mysql);
    $authenticate = $login->authenticate($_SESSION['login'], $_SESSION['password']);

    if (!$authenticate) {
        header('Location: login.php');
        die();
    } else {
        $mensagem = new Mensagem($mysql);
    }

    // update
    if (isset($_POST['title']) && isset($_POST['verse']) && isset($_POST['name'])) {
        $mensagem->update($_POST['title'], $_POST['verse'], $_POST['name']);
        header('Location: index.php?sucesso=1');
        die();
    }

} else {
    header('Location: login.php');
    die();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Serviço de Transmissão</title>
</head>
<body>
    <div class="container h-100">
        <div class="row d-flex h-100">
            <div class="col-lg-6 offset-lg-3 align-self-center">
                <div class="box">
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['sucesso']) && $_GET['sucesso'] == '1'): ?>
                        <div class="alert alert-success" role="alert">
                            Atualizado com sucesso!
                        </div>
                    <?php endif; ?>
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <label for="tituloArea">Título da mensagem</label>
                            <input type="text" class="form-control" id="tituloArea" name="title" value="<?php echo $mensagem->getTitle(); ?>">
                        </div>
                        <div class="form-row form-group">
                            <div class="col-md-6">
                                <label for="versiculoArea">Versículo</label>
                                <input type="text" class="form-control" id="tituloArea" name="verse" value="<?php echo $mensagem->getVerse(); ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="nomeArea">Nome</label>
                                <input type="text" class="form-control" id="tituloArea" name="name" value="<?php echo $mensagem->getName(); ?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt">Atualizar</button>
                    </form>
                </div>
                <div class="text-center mt-3">
                    <a href="logout.php">Sair</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</html>