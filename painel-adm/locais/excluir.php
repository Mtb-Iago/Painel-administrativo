<?php 

require_once("../../conexao.php");

$id = $_POST['id'];



$pdo->query("DELETE from locais where id = '$id' ");

echo "Excluído com Sucesso!!";

?>