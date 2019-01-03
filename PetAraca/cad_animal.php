<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <!--meta name="viewport" content="width=device-width, initial-scale=1.0"-->
    <link rel="icon" href="img/logo-pet-araca.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="img/logo-pet-araca.ico" type="image/x-icon" />
    <title>PetAraçá - Cadastro de animal</title>
    <script type="text/javascript" src="js/cad_animal.js"></script>
</head>
<body bgcolor="eeffee">
    <link href="css/pag_inicial.css" rel="stylesheet">
    <link href="css/cadastros.css" rel="stylesheet">
    <?php require_once "barra_navegacao.php" ?>
    <div class="container-fluid">
        <div class="row">
        <?php require_once "menu.php"?>
            <div class="cadastro col-6">
                <form id="formularioAnimal" enctype="multipart/form-data" action="form_cad_animal.php" method="post" onSubmit="return validaForm();">
                    <h1>Cadastro de animal</h1>
                    <p>&nbsp;Preencha o formulário com as informações do animal. Os campos com asterisco vermelho
                    (<font color="red">*</font>) são de preenchimento obrigatório.</p>
                    <p>
                        <h4>Onde está seu animal de estimação?</h4>
                        <label>Cidade<font color="red">*</font></label>
                        <div class="cidade"><select name="selectCidade" id="selectCidade">
                            <option value=""></option>
                            <option value="1">Araçatuba</option>
                            <option value="2">Bilac</option>
                            <option value="3">Birigui</option>
                            <option value="4">Guararapes</option>
                            <option value="5">Penápolis</option>
                        </select></div>
                    </p>
                    <h3>Informações sobre seu Pet</h3>
                        <label>Nome do Pet<font color="red">*</font></label>
                        <div class="nome"><input type="text" size="20" name="textoNome" id="textoNome"></div></br></br>
                        <label>Raça<font color="red">*</font></label>
                        <div class="raca"><input type="text" size="20" name="textoRaca" id="textoRaca"></div></br></br>
                        <label>Sexo<font color="red">*</font></label>
                        <div class="sexo"><select name="selectSexo" id="selectSexo">
                            <option value="0"></option>
                            <option value="1">Fêmea</option>
                            <option value="2">Macho</option>
                        </select></div></br></br>
                        <label>Cor</label>
                        <div class="cor"><input type="text" size="30" name="textoCor"></div></br></br>
                        <label>Mês/Ano de nascimento</label>
                        <input type="text" size="8" maxlength="7" name="textoIdade" id="textoIdade" onkeypress="formataData()">
                        </br><font size="2"><b>(apenas números)</b></font></br></br>
                        <label>Tamanho</label>
                        <div class="tamanho"><select name="selectTamanho">
                            <option value="0"></option>
                            <option value="1">Micro</option>
                            <option value="2">Pequeno</option>
                            <option value="3">Médio</option>
                            <option value="4">Grande</option>
                        </select></div></br></br>
                        <label>E-mail<font color="red">*</font></label>
                        <div class="email"><input type="text" size="48" maxlength="60" name="textoEmail" id="textoEmail"></div>
                        </br></br>
                        <label>Telefone<font color="red">*</font></label>
                        <div class="telefone">
                            <input type="text" size="15" maxlength="15" name="textoTelefone" id="textoTelefone" onkeypress="formataTelefone()">
                            <!--/br><font size="2"><b>(apenas números)</b></font-->
                        </div>
                    <p>
                        <label>Faça uma breve descrição do seu pet:</label></br>
                        <textarea name="textoDescricao" id="textoDescricao" rows="5" cols="70%"></textarea>
                    </p>
                    <p>
                        <label>Carregar Foto<font color="red">*</font></label></br>
                        <input type="file" id="arqFoto" name="arqFoto" accept=".jpg,.jpeg,image/*">
                    </p>
                    <input type="submit" name="botaoCadastrar" value="Cadastrar">
                </form>
                <h2>Atenção!</h2>
                <p>Caso haja a necessidade de editar ou remover o seu anúncio, entre em contato pelo e-mail: 
                <a href="mailto:petaracatuba@gmail.com">petaracatuba@gmail.com</a>
                </p>
            </div>
        <?php require_once "anuncios.php" ?>
        </div>
    </div>
    <?php require_once "rodape.php" ?>
</body>
</html>