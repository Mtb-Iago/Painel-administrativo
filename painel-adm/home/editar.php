<?php 

require_once("../../conexao.php");
@session_start();

$id = $_POST['id'];



$a_vista = $_POST['a_vista'];
$a_prazo = $_POST['a_prazo'];
$saida = $_POST['saida'];
$total_caixa = $_POST['total_caixa'];
$outros = @$_POST['outros'];
$id = $_POST['id'];




 	$res = $pdo->prepare("UPDATE fatura SET a_vista = :a_vista, a_prazo = :a_prazo, saida = :saida, total_caixa = :total_caixa, outros = :outros where id = :id");
 
	
	$res->bindValue(":a_vista", $a_vista);
	$res->bindValue(":a_prazo", $a_prazo);
	$res->bindValue(":saida", $saida);
	
	$res->bindValue(":total_caixa", $total_caixa);
	$res->bindValue(":outros", $outros);
	
	$res->bindValue(":id", $id);
	
	$res->execute();

	

	echo "Editado com Sucesso!!";


?>