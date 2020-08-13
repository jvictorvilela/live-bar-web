<?php 
    require 'config.php';
    require 'src/Mensagem.php';
    $mensagem = new Mensagem($mysql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style-live2.css">
    <title>live</title>
</head>
<body class="live2">
    <div class="box-center">
        <div class="title"><?php echo $mensagem->getTitle(); ?></div>
        <div class="verse"><span><?php echo $mensagem->getVerse(); ?></span></div>
    </div>
</body>
<script src="js/script-live2.js"></script>
</html>