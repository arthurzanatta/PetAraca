<?php
include_once("busca.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
    <link rel="icon" href="img/logo-pet-araca.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="img/logo-pet-araca.ico" type="image/x-icon" />
    <title>PetAraçá - Pet Doação</title>
</head>
<body bgcolor="eeffee">
    <link href="css/publicacoes.css" rel="stylesheet">
    <link href="css/pag_inicial.css" rel="stylesheet">
    <?php require_once "barra_navegacao.php" ?>
    <div class="container-fluid">
        <div class="row">
            <?php require_once "menu.php" ?>
            <div class="conteudo col-6">
                <h2 align="center">Cães para doação</h2>
                <center>Adote um cão que está precisando de um novo lar.</center></br></br>
                <?php
                    $npub = 10; //Número máximo de publicações por página.
                    $query = 'SELECT MAX(id) FROM doacao';
                    $max = buscaNum($query);
                    $query = 'SELECT MIN(id) FROM doacao';
                    $min = buscaNum($query);
                    if($min != null) {
                        $j = 0; //Contador de publicações em uma página.
                        $k = 0;
                        for($i = $min; $i <= $max || $j < $npub; $i++) {
                            $query = 'SELECT disponivel FROM doacao WHERE id = ' . $i;
                            $dispo = buscaNum($query);
                            if($dispo == 1) {
                                if($k % 4 != 0) echo '<div class="esquerda">'; //</div>
                                else echo '<div class="esquerda" style="clear:both">';
                                $query = 'SELECT descricao FROM doacao WHERE id = ' .$i . ' AND disponivel = 1';
                                if(strcmp(busca($query, 0, 0, ""), " ") != 0) echo busca($query, 0, 0, "") . '</br>';
                                $query = 'SELECT anunciante FROM doacao WHERE id = ' . $i . ' AND disponivel = 1';
                                echo busca($query, 0, 0, "") . '</br>';
                                $query = 'SELECT contato FROM doacao WHERE id = ' . $i . ' AND disponivel = 1';
                                echo busca($query, 0, 0, "") . '</br>';
                                $query = 'SELECT foto FROM doacao WHERE id = ' . $i . ' AND disponivel = 1';
                                echo busca($query, 2, $i, "doacao");
                                echo '</div>';
                            }
                            $j++;
                            $k++;
                        }
                    }
                    else echo 'Não há registros de doações.';
                ?>
                <?php
                /*$dif = $max - $min;
                if($dif > 10) {
                    $pcurr = $_GET['pag']; //página atual
                    if($pcurr == null) $pcurr = 1;
                    $npag = $dif / 10;
                    if($dif % 10 != 0) $npag++;
                    echo '<div>';
                    for($i = 0; $i < $npag; $i++) {
                        if($i == $pcurr - 1) echo $pcurr;
                        else echo '<a href="anuncios_doacao.php?id=<?=' . $i + 1 . ';?>" bottom="0">' . $i + 1 . '</a>&nbsp;';
                        //continuar (tratamentos para a página 1).
                    }
                    echo '</div>';
                }
                */?>
            </div><!--conteudo col-6-->
            <?php require_once "anuncios.php" ?>
        </div><!--row-->
    </div><!--container-fluid-->
    <?php require_once "rodape.php" ?>
</body>
</html>