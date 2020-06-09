<?php 

require_once("../../conexao.php");
@session_start();

$observacao = $_POST['observacao'];
$nome = $_POST['nome'];
$data_compra = $_POST['data_compra'];
$valor = $_POST['valor'];
$forma_pagamento = @$_POST['forma_pagamento'];
$produto = $_POST['produto'];




	$res = $pdo->prepare("INSERT into cadastro (nome, observacao, data_compra, valor, forma_pagamento, produto ) values (:nome, :observacao, :data_compra, :valor, :forma_pagamento, :produto)");

	$res->bindValue(":nome", $nome);
	$res->bindValue(":observacao", $observacao);
	$res->bindValue(":data_compra", $data_compra);
	$res->bindValue(":valor", $valor);
	$res->bindValue(":forma_pagamento", $forma_pagamento);
	$res->bindValue(":produto", $produto);
	

	
	$res->execute();

	echo "Cadastrado com Sucesso!!";



?>