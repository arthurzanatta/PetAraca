<?php
header('Content-Type: text/html; charset=utf-8');
//include_once("conexao.php");
include_once("busca.php");

function cad_moderador() {

$mysqli = new mysqli('********', '********', '*****', '*******') or die('Erro ao conectar ao banco: ' . mysqli_error($mysqli));
$nomeMod = $_POST['textoNomeN'];
$loginMod = $_POST['textoLoginN'];
$senhaMod = md5($_POST['textoSenhaN']);
$queryMod = "SELECT Max(codigo) FROM moderador";
$nMod = buscaNum($queryMod);
$nMod++;

$sql = "INSERT INTO moderador (codigo, nome, login, senha, aprovado) VALUES ('$nMod', '$nomeMod', '$loginMod', '$senhaMod', 0)";
$query = mysqli_query($mysqli, $sql) or die("Erro de inserção!");
if($mysqli == NULL) echo "mysql é nulo!";
require_once "cad_ok.php";
mysqli_close($mysqli);

}

cad_moderador();

?>