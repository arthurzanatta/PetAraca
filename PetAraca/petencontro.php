<?php
header('Content-Type: text/html; charset=utf-8');
include_once("busca.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
    <link rel="icon" href="img/logo-pet-araca.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="img/logo-pet-araca.ico" type="image/x-icon" />
    <title>Pet Araçá - Anúncios Pet Namoro</title>
</head>
<body bgcolor="eeffee">
    <link href="css/publicacoes.css" rel="stylesheet">
    <link href="css/pag_inicial.css" rel="stylesheet">
    <?php require_once "barra_navegacao.php" ?>
    <div class="container-fluid">
        <div class="row">
        <?php require_once "menu.php" ?>
        <div class="conteudo col-6">
            <h2 align="center">Publicações</h2>
            <center>Encontre aqui um parceiro para o seu cão sem sair de casa.</center></br>
            <?php
                $npub = 100; //Número máximo de publicações por página. 10
                $query = 'SELECT MAX(id) FROM animal';
                $max = buscaNum($query);
                //$min = $_GET['min'];
                //if($min == null) {
                    $query = 'SELECT MIN(id) FROM animal';
                    $min = buscaNum($query);
                //}
                //$idPag = $_GET['id']; //Número da página seguinte.
                if($min != null) {
                    $j = 0; //Publicações pares.
                    $k = 0; //Contador de publicações em uma página.
                    for($i = $min; $i <= $max && $k < $npub; $i++) {
                        $query = 'SELECT disponivel FROM animal WHERE id = ' . $i;
                        $dispo = buscaNum($query);
                        if($dispo == 1) {
                            echo '<div>'; //</div>
                            if($j % 2 != 0) echo '<div class="esquerda">';
                            else echo '<div class="esquerda" style="clear:both;">';
                            echo '<br>';
                            echo '<b>Cidade:</b> ';
                            $query = 'SELECT cidade FROM animal WHERE id = ' . $i . ' AND disponivel = 1';
                            echo busca($query, 0, 0, "") . '</br>';
                            echo '<b>Nome:</b> ';
                            $query = 'SELECT nome FROM animal WHERE id = ' . $i . ' AND disponivel = 1';
                            echo busca($query, 0, 0, "") . '</br>';
                            echo '<b>Raça:</b> ';
                            $query = 'SELECT raca FROM animal WHERE id = ' . $i . ' AND disponivel = 1';
                            echo busca($query, 0, 0, "") . '</br>';
                            echo '<b>Sexo:</b> ';
                            $query = 'SELECT sexo FROM animal WHERE id = ' . $i . ' AND disponivel = 1';
                            echo busca($query, 0, 0, "") . '</br>';
                            $query = 'SELECT cor FROM animal WHERE id = ' . $i . ' AND disponivel = 1';
                            if(strcmp(busca($query, 0, 0, ""), " ") != 0) {
                                echo '<b>Cor:</b> ';
                                echo busca($query, 0, 0, "") . '</br>';
                            }
                            $query = 'SELECT tamanho FROM animal WHERE id = ' . $i . ' AND disponivel = 1';
                            if(strcmp(busca($query, 0, 0, ""), " ") != 0) {
                                echo '<b>Tamanho:</b> ';
                                echo busca($query, 0, 0, "") . '</br>';
                            }
                            $query = 'SELECT anonasc FROM animal WHERE id = ' . $i . ' AND disponivel = 1';
                            if(strcmp(busca($query, 1, 0, ""), "00/0000") != 0) {
                                echo '<b>Mês/Ano de nascimento:</b> ';
                                echo busca($query, 1, 0, "") . '</br>';
                            }
                            echo '<b>E-mail:</b> ';
                            $query = 'SELECT email FROM animal WHERE id = ' . $i . ' AND disponivel = 1';
                            echo busca($query, 0, 0, "") . '</br>';
                            echo '<b>Telefone:</b> ';
                            $query = 'SELECT telefone FROM animal WHERE id = ' . $i . ' AND disponivel = 1';
                            echo busca($query, 0, 0, "") . '</br>';
                            echo '</div>';
                            echo '<div class="direita">';
                            echo '<br>';
                            $query = 'SELECT descricao FROM animal WHERE id = ' . $i . ' AND disponivel = 1';
                            echo busca($query, 0, 0, "") . '</br>';
                            $query = 'SELECT datapublicacao FROM animal WHERE id = ' . $i . ' AND disponivel = 1';
                            if(buscaDataAtual($query) != "") {
                                echo '<b>Data de publicação:</b> ' . buscaDataAtual($query). '</br>';
                            }
                            $query = 'SELECT foto FROM animal WHERE id = ' .$i . ' AND disponivel = 1';
                            echo busca($query, 2, $i, "animal");
                            echo '</div>';
                            echo '</div>';
                            $k++;
                        }
                        $j++;
                        //$minext = $i + 1; //Próximo do último id da página atual.
                    }
                }
                else echo 'Não há registros de animais.';
            ?>
            </br>
            <?php
                /*$dif = $max - $min + 1;
                if($dif > 10) {
                    $pcurr = $_GET['pag']; //página atual
                    if($pcurr == null) $pcurr = 1;
                    $npag = $dif / 10; //$npag = número total de páginas de publicações.
                    if($dif % 10 != 0) $npag++; 
                    echo '<div>';
                    for($i = 0; $i < $npag; $i++) {
                        if($npag > 1) echo '<a href="anuncios_namoro.php?id=<?=' . $i . ';?>" bottom="0"><<&nbsp;Anterior</a>&nbsp;'; //Anterior
                        if($i == $pcurr - 1 && $i != 0) echo $pcurr; //Imprime o número da página atual.
                        else if($i != $pcurr - 1 && $i != 0) echo '<a href="anuncios_namoro.php?id=<?=' . $i + 1 . ';?>" bottom="0">' . $i + 1 . '</a>&nbsp;';
                        if($pcurr != $npag) echo '<a href="anuncios_namoro.php?id=<?=' . $pcurr + 1 . ';?>" bottom="0">Próxima&nbsp;>></a>&nbsp;'; //Próxima
                        //continuar (tratamentos para a página 1).
                    }
                    echo '</div>';
                }
            */?>
        </div> <!--div das publicações-->
        <?php require_once "anuncios.php" ?>
        </div><!--row-->
    </div><!--container-fluid-->
    <?php require_once "rodape.php" ?>
</body>
</html>