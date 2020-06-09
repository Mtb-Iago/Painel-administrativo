<?php 

require_once("../../conexao.php");
$pagina = 'locais';

$txtbuscar = @$_POST['txtbuscar'];


echo '
<div class="table-responsive">
<table class="table table-sm mt-3 tabelas">
	<thead class="thead-light">
		<tr>
			<th scope="col">Nome</th>
			
			
			<th scope="col">Ações</th>
		</tr>
	</thead>
	<tbody>';

	
	    

		//PEGAR A PÁGINA ATUAL
		$itens_pag = intval(@$_POST['itens_pag']);
		if($itens_pag != ''){
			$itens_por_pagina = $itens_pag;
		}
		$pagina_pag = intval(@$_POST['pag']);

		$limite = $pagina_pag * $itens_por_pagina;

		//CAMINHO DA PAGINAÇÃO
		$caminho_pag = 'index.php?acao='.$pagina.'&';

	if($txtbuscar == ''){
		$res = $pdo->query("SELECT * from locais order by nome asc LIMIT $limite, $itens_por_pagina");
	}else{
		$txtbuscar = '%'.@$_POST['txtbuscar'].'%';
		$res = $pdo->query("SELECT * from locais where nome LIKE '$txtbuscar' order by nome asc");

	}
	
	$dados = $res->fetchAll(PDO::FETCH_ASSOC);


		//TOTALIZAR OS REGISTROS PARA PAGINAÇÃO
		$res_todos = $pdo->query("SELECT * from locais");
		$dados_total = $res_todos->fetchAll(PDO::FETCH_ASSOC);
		$num_total = count($dados_total);

		//DEFINIR O TOTAL DE PAGINAS
		$num_paginas = ceil($num_total/$itens_por_pagina);


	for ($i=0; $i < count($dados); $i++) { 
			foreach ($dados[$i] as $key => $value) {
			}

			$id = $dados[$i]['id'];	
			$nome = $dados[$i]['nome'];
			
		

			

echo '
		<tr>

			
			<td>'.$nome.'</td>
			
			
			
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


if($txtbuscar == ''){


echo '

<!--ÁREA DA PÁGINAÇÃO -->
<nav class="paginacao" aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="btn btn-outline-dark btn-sm mr-1" href="'.$caminho_pag.'pagina=0&itens='.$itens_por_pagina.'" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>';
            
            for($i=0;$i<$num_paginas;$i++){
            $estilo = "";
            if($pagina_pag >= ($i - 2) and $pagina_pag <= ($i + 2)){


            if($pagina_pag == $i)
              $estilo = "active";

          echo '
             <li class="page-item"><a class="btn btn-outline-dark btn-sm mr-1 '.$estilo.'" href="'.$caminho_pag.'pagina='.$i.'&itens='.$itens_por_pagina.'">'.($i+1).'</a></li>';
           } }
            
           echo '<li class="page-item">
              <a class="btn btn-outline-dark btn-sm" href="'.$caminho_pag.'pagina='.($num_paginas-1).'&itens='.$itens_por_pagina.'" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
</nav>

<div align="center">';

if(@$itens_pag == $itens_por_pagina_1){
	$classe_ativa_1 = 'classe_ativa_pag';
}
if(@$itens_pag == $itens_por_pagina_2){
	$classe_ativa_2 = 'classe_ativa_pag';
}
if(@$itens_pag == $itens_por_pagina_3){
	$classe_ativa_3 = 'classe_ativa_pag';
}

echo '
<a href="'.$caminho_pag.'itens='.@$itens_por_pagina_1.'" class="'.@$classe_ativa_1.'" title="Itens para mostrar na paginação">'.$itens_por_pagina_1.'</a> - 
<a href="'.$caminho_pag.'itens='.@$itens_por_pagina_2.'" class="'.@$classe_ativa_2.'" title="Itens para mostrar na paginação">'.$itens_por_pagina_2.'</a> -
<a href="'.$caminho_pag.'itens='.@$itens_por_pagina_3.'" class="'.@$classe_ativa_3.'" title="Itens para mostrar na paginação">'.$itens_por_pagina_3.'</a> -
<small>Itens</small>

</div>


';

}


?>