<?php 

require_once("../../conexao.php");
@session_start();

$id = $_POST['id'];



$nome = $_POST['nome'];
$valor = $_POST['valor'];
$observacao = $_POST['observacao'];
$produto = $_POST['produto'];
$data_compra = @$_POST['data_compra'];
$forma_pagamento = @$_POST['forma_pagamento'];


if($valor == ''){
	echo "Preencha o Valor!!";
	exit();
}

if($nome == ''){
	echo "Preencha o Nome!";
	exit();
}


 	$res = $pdo->prepare("UPDATE cadastro SET nome = :nome, observacao = :observacao, produto = :produto, valor = :valor, data_compra = :data_compra, forma_pagamento = :forma_pagamento where id = :id");
 
	$res->bindValue(":observacao", $observacao);
	$res->bindValue(":nome", $nome);
	
	$res->bindValue(":produto", $produto);
	$res->bindValue(":data_compra", $data_compra);
	$res->bindValue(":valor", $valor);
	$res->bindValue(":forma_pagamento", $forma_pagamento);
	
	$res->bindValue(":id", $id);
	
	$res->execute();

	

	echo "Editado com Sucesso!!";


?>