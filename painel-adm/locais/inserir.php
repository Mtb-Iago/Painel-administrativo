<?php 

require_once("../../conexao.php");
@session_start();


$nome = $_POST['nome'];



if($nome == ''){
	echo "Preencha o Valor!";
	exit();
}




	//verificar duplicaidade de dados
	$res = $pdo->query("SELECT * from locais where nome = '$nome'");
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);
	$linhas = count($dados);
	if($linhas > 0){
		echo 'Registro já Cadastrado';
		exit();
	}


	$res = $pdo->prepare("INSERT into locais (nome) values (:nome)");

	
	$res->bindValue(":nome", $nome);

	
	$res->execute();

	

	echo "Cadastrado com Sucesso!!";



?>