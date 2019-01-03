<!DOCTYPE html>
<!-- target="_blank" abre outra página no lugar da atual
     target="_self"  abre página em outra janela -->
<html>
    <head>
        <meta charset="UTF-8">
        <!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
        <link rel="icon" href="img/logo-pet-araca.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="img/logo-pet-araca.ico" type="image/x-icon" />
        <title>PetAraçá - Quem Somos</title>
        <script type="text/javascript" src="js/pag_inicial2.js"></script>
    </head>
    <body bgcolor="eeffee">
        <link href="css/pag_inicial3_php.css" rel="stylesheet">
        <?php require_once "barra_navegacao.php" ?>
        <div class="container-fluid">
            <div class="row">
                <?php require_once "menu.php" ?>
                <div class="conteudo col-6">
                    <p>&nbsp;Motivados pela grande dificuldade em encontrar um parceiro canino em Araçatuba e região, pensamos numa maneira simples e ao
                    alcance do usuário para poder aproximar este momento entre os proprietários dos cães. &nbsp;Elaboramos a página <b>Pet Encontro</b> para
                    facilitar o contato e o possível encontro entre pets de raça canina com o objetivo de procriação, e consequentemente, surgimento de um
                    “networking animal”.</p>
                    <p>&nbsp;O site Pet Araçá também traz uma novidade: leitura sobre dicas e cuidados com cães e gatos apresentados por profissionais
                    veterinários.
                    &nbsp;Além disso, criamos a página <b>Pet Doação</b> para anunciar a doação de animais que forem encontrados na rua, abandonados ou que o 
                    próprio proprietário esteja doando.</p>
                    <p>&nbsp;Este é o nosso contato, queremos saber de você:</p>
                    <p>&nbsp;- Sugestões de melhorias;</p> 
                    <p>&nbsp;- Críticas;</p> 
                    <p>&nbsp;- Relate-nos se o seu encontro canino obteve sucesso.</p>
                    <p><a href="mailto:petaracatuba@gmail.com">petaracatuba@gmail.com</a></p></br>
                    <p><b>Co-fundadores:</b> Eduardo Guena e Arthur Zanatta</p>
                    <p><img src="img/Whatsapp_icon.png"></img>(18) 98131-0387 / (18) 98115-3539</p>
                </div>
                <?php require_once "anuncios.php" ?>
            </div>
        </div>
        <?php require_once "rodape.php" ?>
    </body>
</html>
