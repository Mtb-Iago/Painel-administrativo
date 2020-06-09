<?php 
$pagina = 'produtos';

$pagina_pag = intval(@$_GET['pagina']);
$itens_pag = intval(@$_GET['itens']);

?>
<div class="container ml-2 mr-2">
	<nav class="navbar navbar-expand navbar-white navbar-light">
		
		<a id="btn-novo" type="button" class="btn btn-primary" href="index.php?acao=<?php echo $pagina ?>&funcao=novo">Nova Venda</a>
		
		<form method="post" id="frm">
			<input type="hidden" name="pag" id="pag" value="<?php echo $pagina_pag ?>">
			<input type="hidden" name="itens_pag" id="itens_pag" value="<?php echo $itens_pag ?>">
		</form>
		

		<div class="direita" style="position: absolute;">
		
			<!-- SEARCH FORM -->
			<form class="form-inline ml-3 float-right">
				<div class="input-group input-group-sm">

					<div class="form-group mr-2">
						
						<select class="form-control d-none d-md-block form-control-sm" id="cbbuscar1" name="cbbuscar1">
							<option value="">Lista de clientes</option>
							<?php 

								//TRAZER TODOS OS REGISTROS EXISTENTES
							$res = $pdo->query("SELECT * from cadastro order by nome asc");
							$dados = $res->fetchAll(PDO::FETCH_ASSOC);

							for ($i=0; $i < count($dados); $i++) { 
								foreach ($dados[$i] as $key => $value) {
								}

								$id_categ = $dados[$i]['id'];	
								$nome_categ = $dados[$i]['nome'];

								if ($nome_categ == ''){

								}else{
								echo '<option value="'.$id_categ.'">'.$nome_categ.'</option>';
							}


							}
							?>
						</select>
					</div>

					<input class="form-control form-control-navbar" type="search" name="txtbuscar" id="txtbuscar" placeholder="Buscar Cliente" aria-label="Search">
					<div class="input-group-append">
						<button class="btn btn-navbar" type="submit" id="btn-buscar">
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
			</form>
		</div>

	</nav>

	<div id="listar">
		
	</div>
</div>







<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<?php if(@$_GET['funcao']=='editar'){
					$titulo_modal = 'Editar Dados';
					$botao = 'Editar';


					//RECUPERAR OS DADOS COM BASE NO ID QUE RECEBO
					$id_reg = @$_GET['id'];
					$res = $pdo->query("SELECT * from cadastro where id = '$id_reg'");
					$dados = $res->fetchAll(PDO::FETCH_ASSOC);
					$nome = $dados[0]['nome'];
					$data_compra = $dados[0]['data_compra'];
					$observacao = $dados[0]['observacao'];
					$valor = $dados[0]['valor'];
					
					$forma_pagamento = $dados[0]['forma_pagamento'];
					$produto = $dados[0]['produto'];
					$form = 'form-editar';

					$dnone = 'd-none';
					

				}else{
					$titulo_modal = 'Inserir Nova venda';
					$botao = 'Salvar';
					$form = 'form-inserir';
				} ?>
				<h5 class="modal-title" id="exampleModalLabel"><?php echo $titulo_modal ?>
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">


			<form id="<?php echo $form ?>" method="post" enctype="multipart/form-data">



				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="exampleFormControlInput1">Clientes</label>
							<input type="text" class="form-control" id="nome" placeholder="Insira o Nome " name="nome" value="<?php echo @$nome ?>" >
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">


							<label for="exampleFormControlInput1">Produto</label>
							<input type="text" class="form-control" id="produto" placeholder="Insira o Produto" name="produto" value="<?php echo @$produto ?>" required>
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">


							<label for="exampleFormControlInput1">Valor</label>
							<input type="text" class="form-control" id="valor" placeholder="Insira o Valor " name="valor" value="<?php echo @$valor ?>" required>
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">


							<label for="exampleFormControlInput1">Data da Compra</label>
							<input type="text" class="form-control" id="data_compra" placeholder="Data" name="data_compra" value="<?php echo @$data_compra ?>" required>
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">


							<label for="exampleFormControlInput1">Forma Pagamento</label>
							<input type="text" class="form-control" id="forma_pagamento" placeholder="Data" name="forma_pagamento" value="<?php echo @$forma_pagamento ?>" required>
						</div>
					</div>


					
				</div>





				<div class="form-group">


					<label for="exampleFormControlInput1">Observação</label>
					<textarea maxlength="600" class="form-control" id="observacao" name="observacao"><?php echo @$observacao ?></textarea>
				</div>



				<div align="center" id="mensagem" class="">

				</div>

			</div>
			<div class="modal-footer">

				<input type="hidden" id="id" name="id" value="<?php echo @$id_reg ?>">

				<input type="hidden" id="reg_antigo" name="reg_antigo" value="<?php echo @$nome ?>" required>

				<button id="btn-fechar" type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

				<button type="submit" name="<?php echo $botao ?>" id="<?php echo $botao ?>" class="btn btn-primary"><?php echo $botao ?></button>

			</div>
		</form>
	</div>
</div>
</div>



<!--CHAMADA DA MODAL PARA NOVO REGISTRO OU EDIÇÃO -->
<?php 
if(@$_GET['funcao'] == 'novo' || @$_GET['funcao'] == 'editar'){ 
	
	?>
	<script>$('#modal').modal("show");</script>
<?php } ?>







<!--CHAMADA DA MODAL DELETAR -->
<?php 
if(@$_GET['funcao'] == 'excluir' && @$item_paginado == ''){ 
	$id = $_GET['id'];
	?>

	<div class="modal" id="modal-deletar" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Excluir Registro</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<p>Deseja realmente Excluir este Registro?</p>

					<div align="center" id="mensagem_excluir" class="">

					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cancelar-excluir">Cancelar</button>
					<form method="post">
						<input type="hidden" id="id"  name="id" value="<?php echo @$id ?>" required>

						<button type="button" id="btn-deletar" name="btn-deletar" class="btn btn-danger">Excluir</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	
<?php } ?>

<script>$('#modal-deletar').modal("show");</script>
<div class="container-fluid" style="display:none;">


<!--AJAX PARA INSERÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
	$("#form-inserir").submit(function () {
		var pag = "<?=$pagina?>";
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: pag + "/inserir.php",
			type: 'POST',
			data: formData,

			success: function(mensagem){

				$('#mensagem').removeClass()

				if(mensagem == 'Cadastrado com Sucesso!!'){

					$('#btn-buscar').click();
					$('#btn-fechar').click();

				}else{

					$('#mensagem').addClass('text-danger')
				}

				$('#mensagem').text(mensagem)

			},


			cache: false,
			contentType: false,
			processData: false,
        xhr: function() {  // Custom XMLHttpRequest
        	var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
            	myXhr.upload.addEventListener('progress', function () {
            		/* faz alguma coisa durante o progresso do upload */
            	}, false);
            }
            return myXhr;
        }
    });
	});
</script>




<!--AJAX PARA BUSCAR OS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){

		var pag = "<?=$pagina?>";
		$('#btn-buscar').click(function(event){
			event.preventDefault();	
			
			$.ajax({
				url: pag + "/listar.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "html",
				success: function(result){
					$('#listar').html(result)
					
				},
				

			})

		})

		
	})
</script>








<!--AJAX PARA LISTAR OS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		
		var pag = "<?=$pagina?>";

		$.ajax({
			url: pag + "/listar.php",
			method: "post",
			data: $('#frm').serialize(),
			dataType: "html",
			success: function(result){
				$('#listar').html(result)

			},

			
		})
	})
</script>



<!--AJAX PARA BUSCAR OS DADOS PELA TXT -->
<script type="text/javascript">
	$('#txtbuscar').keyup(function(){
		$('#btn-buscar').click();
	})
</script>


<!--AJAX PARA BUSCAR OS DADOS PELO SELECT -->
<script type="text/javascript">
	$('#cbbuscar').change(function(){
		$('#btn-buscar').click();
	})
</script>


<!--AJAX PARA EDIÇÃO DOS DADOS COM IMAGEM -->
<script type="text/javascript">
	$("#form-editar").submit(function () {
		var pag = "<?=$pagina?>";
		event.preventDefault();
		var formData = new FormData(this);

		$.ajax({
			url: pag + "/editar.php",
			type: 'POST',
			data: formData,

			success: function(mensagem){

				$('#mensagem').removeClass()

				if(mensagem == 'Editado com Sucesso!!'){

					$('#btn-buscar').click();
					$('#btn-fechar').click();

				}else{

					$('#mensagem').addClass('text-danger')
				}

				$('#mensagem').text(mensagem)

			},


			cache: false,
			contentType: false,
			processData: false,
        xhr: function() {  // Custom XMLHttpRequest
        	var myXhr = $.ajaxSettings.xhr();
            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
            	myXhr.upload.addEventListener('progress', function () {
            		/* faz alguma coisa durante o progresso do upload */
            	}, false);
            }
            return myXhr;
        }
    });
	});
</script>





<!--AJAX PARA EXCLUSÃO DOS DADOS -->
<script type="text/javascript">
	$(document).ready(function(){
		var pag = "<?=$pagina?>";
		$('#btn-deletar').click(function(event){
			event.preventDefault();
			
			$.ajax({
				url: pag + "/excluir.php",
				method: "post",
				data: $('form').serialize(),
				dataType: "text",
				success: function(mensagem){

					$('#mensagem_excluir').removeClass()

					if(mensagem == 'Excluído com Sucesso!!'){

						$('#txtbuscar').val('')
						$('#btn-buscar').click();
						$('#btn-cancelar-excluir').click();

					}else{

						$('#mensagem_excluir').addClass('text-danger')
					}

					$('#mensagem_excluir').text(mensagem)

					

				},
				
			})
		})
	})
</script>