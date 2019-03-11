<!DOCTYPE html>
<!-- target="_blank" abre outra página no lugar da atual
     target="_self"  abre página em outra janela -->
<html>
    <head>
        <meta charset="UTF-8">
        <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
        <link rel="icon" href="img/logo-pet-araca.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="img/logo-pet-araca.ico" type="image/x-icon" />
        <title>Pet Araçá</title>
        <script type="text/javascript" src="js/pag_inicial2.js"></script>
    </head>
    <body bgcolor="eeffee">
        <link href="css/pag_inicial.css" rel="stylesheet">
        <?php require_once "barra_navegacao.php" ?>
        <div class="container-fluid">
            <div class="row">
                <?php require_once "menu.php" ?>
                <?php require_once "conteudo.php" ?>
                <?php require_once "anuncios.php" ?>
            </div>
        </div>
        <?php require_once "rodape.php" ?>
    </body>
</html>