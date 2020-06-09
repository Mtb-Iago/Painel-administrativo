<?php 

require_once("../../conexao.php");
$pagina = 'home';


echo '
<div class="table-responsive">
<table class="table table-sm mt-3 tabelas">
	<thead class="thead-light">
		<tr>
			<th scope="col">ENTRADA A VISTA</th>
			<th scope="col" ">A PRAZO</th>
			<th scope="col">SAIDA</th>
			<th scope="col" ">TOTAL</th>
			<th scope="col"  class="d-none d-md-block">OUTROS</th>
			
			<th scope="col">Ações</th>
		</tr>
	</thead>
	<tbody>';    

	

		//TOTALIZAR OS REGISTROS PARA PAGINAÇÃO
		$res_todos = $pdo->query("SELECT * from fatura");
		$dados = $res_todos->fetchAll(PDO::FETCH_ASSOC);
		$num_total = count($dados);

	for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}
			
			$a_vista = $dados[$i]['a_vista'];
			$a_prazo = $dados[$i]['a_prazo'];
			$saida = $dados[$i]['saida'];
			$outros = $dados[$i]['outros'];
			$total_caixa = $dados[$i]['total_caixa'];
			$id = $dados[$i]['id'];
			
  echo'
		<tr>

			
			<td>'.$a_vista.'</td>			
			<td >'.$a_prazo.'</td>
			<td>'.$saida.'</td>
			<td >'.$total_caixa.'</td>
			<td class="d-none d-md-block">'.$outros.'</td>
			
			
			
			<td>
				<a href="index.php?acao='.$pagina.'&funcao=editar&id='.$id.'"><i class="fas fa-edit text-info"></i></a>
				<a href="index.php?acao='.$pagina.'&funcao=excluir&id='.$id.'"><i class="far fa-trash-alt text-danger"></i></a>
			</td>
		</tr>';
			
	}

echo  '
	</tbody>
</table>
</div> ';



?>