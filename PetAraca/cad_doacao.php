<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
    <link rel="icon" href="img/logo-pet-araca.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="img/logo-pet-araca.ico" type="image/x-icon" />
    <title>Pet Araçá - Cadastro de doação de animais</title>
    <script type="text/javascript" src="js/cad_doacao.js"></script>
</head>
<body bgcolor="eeffee">
    <link href="css/pag_inicial.css" rel="stylesheet">
    <link href="css/cadastros.css" rel="stylesheet">
    <?php require_once "barra_navegacao.php" ?>
    <div class="container-fluid">
        <div class="row">
            <?php require_once "menu.php" ?>
            <div class="cadastro col-6">
                <form id="formularioDoacao" enctype="multipart/form-data" action="form_cad_doacao.php" method="post" onSubmit="return validaForm();">
                <h1>Cadastro de doação</h1>
                <p>&nbsp;Preencha o formulário com as informações da publicação. Os campos com asterisco vermelho
                (<font color="red">*</font>) são de preenchimento obrigatório.</p>
                <p>
                    <label>Descrição da doação</label></br>
                    <textarea name="textoDescricao" id="textoDescricao" rows="5" cols="70%"></textarea>
                </p>
                <p>
                    <label width="90px">Anunciante<font color="red">*</font></label>
                    <input type="text" size="60" name="textoAnunciante" id="textoAnunciante"></input>
                </p>
                    <label style="font-size:16px;">Contato<font color="red">*</font></label>
                    <div class="contatod"><input type="text" size="60" maxlength="60" name="textoContato" id="textoContato"></div>
                <p>
                    <label>Carregar Foto<font color="red">*</font></label></br>
                    <input type="file" id="arqFoto" name="arqFoto" accept=".jpg,.jpeg,image/*">
                </p>
                <input type="submit" name="botaoCadastrar" value="Cadastrar">
                <h2>Atenção!</h2>
                    <p>Caso haja a necessidade de editar ou remover o seu anúncio, entre em contato pelo e-mail: 
                    <a href="mailto:petaracatuba@gmail.com">petaracatuba@gmail.com</a></p>
                </form>
            </div>
            <?php require_once "anuncios.php" ?>
        </div>
    </div>
    <?php require_once "rodape.php" ?>
</body>
</html>