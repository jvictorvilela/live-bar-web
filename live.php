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
    <link rel="stylesheet" type="text/css" href="css/style-live.css">
    <title>live</title>
</head>
<body>
    <div class="box-area">
        <div class="side"></div>
        <div class="box-content-area">
            <div class="content-top">
                <div class="title"><?php echo $mensagem->getTitle(); ?></div>
            </div>
            <div class="content-bottom">
                <div class="verse"><?php echo $mensagem->getVerse(); ?></div>
                <div class="name"><?php echo $mensagem->getName(); ?></div>
            </div>
        </div>
    </div> 
</body>
<script src="js/script-live.js"></script>
</html>