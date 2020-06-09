<?php 
$pagina = 'home';

$pagina_pag = intval(@$_GET['pagina']);
$itens_pag = intval(@$_GET['itens']);

@$res1 = $pdo->query("SELECT * from fatura  order by id desc");
					@$dados1 = $res1->fetchAll(PDO::FETCH_ASSOC);
					@$a_vista1 = $dados1[0]['a_vista'];
					@$a_prazo1 = $dados1[0]['a_prazo'];
					@$saida1 = $dados1[0]['saida'];
          @$total_caixa1 = $dados1[0]['total_caixa'];
          @$outros1 = $dados1[0]['outros'];
         

?>
 
 <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">ENTRADA</span>
                <span class="info-box-number">
                  R$ <?php echo $a_vista1 ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">TOTAL A RECEBER</span>
                <span class="info-box-number">R$ <?php echo $a_prazo1 ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-truck-loading"></i></span>
              

              <div class="info-box-content">
                <span class="info-box-text">Saidas</span>
                <span class="info-box-number">R$ <?php echo $saida1 ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dollar-sign"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Caixa</span>
                <span class="info-box-number">R$<?php echo $total_caixa1 ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    
    <div class="input-group-append">
						<button class="btn btn-navbar" type="submit" id="btn-buscar">
							
						</button>
					</div>
   
    <div id="listar">
		
    </div>
   
    <a id="btn-novo" type="button" class="btn btn-primary" href="index.php?acao=<?php echo $pagina ?>&funcao=novo">ATUALIZAR CONTAS</a>
   
  
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
					$res = $pdo->query("SELECT * from fatura where id = '$id_reg'");
					$dados = $res->fetchAll(PDO::FETCH_ASSOC);
					$a_vista = $dados[0]['a_vista'];
					$a_prazo = $dados[0]['a_prazo'];
					$saida = $dados[0]['saida'];
          $total_caixa = $dados[0]['total_caixa'];
          $outros = $dados[0]['outros'];
					
					$form = 'form-editar';

					$dnone = 'd-none';
					

				}else{
					$titulo_modal = 'Inserir Dados';
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

    <input class="form-control form-control-navbar" type="search" name="txtbuscar" id="txtbuscar" placeholder="Buscar Cliente" aria-label="Search">
					
			<form id="<?php echo $form ?>" method="post" enctype="multipart/form-data">



				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="exampleFormControlInput1">Valor Recebido</label>
							<input type="text" class="form-control" id="a_vista" placeholder="Insira Valor a Vista " name="a_vista" value="<?php echo @$a_vista ?>" >
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">


							<label for="exampleFormControlInput1">Valor há receber</label>
							<input type="text" class="form-control" id="a_prazo" placeholder="Insira o Valor a Receber" name="a_prazo" value="<?php echo @$a_prazo ?>" required>
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">


							<label for="exampleFormControlInput1">Saída</label>
							<input type="text" class="form-control" id="saida" placeholder="Insira a saida " name="saida" value="<?php echo @$saida ?>" required>
						</div>
					</div>

					<div class="col-md-2">
						<div class="form-group">


							<label for="exampleFormControlInput1">TOTAL EM CAIXA</label>
							<input type="text" class="form-control" id="total_caixa" placeholder="TOTAL EM CAIXA" name="total_caixa" value="<?php echo @$total_caixa ?>" required>
						</div>
					</div>
					
				</div>

				<div class="form-group">


					<label for="exampleFormControlInput1">Anotações</label>
					<textarea maxlength="600" class="form-control" id="outros" name="outros"><?php echo @$outros ?></textarea>
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


<!--CHAMADA DA MODAL PARA NOVO REGISTRO OU EDIÇÃO -->
<?php 
if(@$_GET['funcao'] == 'novo' || @$_GET['funcao'] == 'editar'){ 
	
	?>
	<script>$('#modal').modal("show");</script>
<?php } ?>

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
          window.onload();

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
