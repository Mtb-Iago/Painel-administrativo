<?php 

require_once("../../conexao.php");
@session_start();

$a_vista = $_POST['a_vista'];
$a_prazo = $_POST['a_prazo'];
$total_caixa = $_POST['total_caixa'];
$outros = $_POST['outros'];
$saida = @$_POST['saida'];


	$res = $pdo->prepare("INSERT into fatura (a_vista, a_prazo, outros, total_caixa, saida) values (:a_vista, :a_prazo, :outros, :total_caixa, :saida)");

	$res->bindValue(":a_prazo", $a_prazo);
	$res->bindValue(":a_vista", $a_vista);
	$res->bindValue(":outros", $outros);
	$res->bindValue(":saida", $saida);	
	$res->bindValue(":total_caixa", $total_caixa);
	
	
	$res->execute();

	echo "Cadastrado com Sucesso!!";



?>