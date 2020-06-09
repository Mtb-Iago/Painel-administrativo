<?php
@session_start();
$banco = 'luisa';
$host = 'localhost';
$usuario = 'root';
$senha = '';

date_default_timezone_set('America/Sao_Paulo');

try {
    $pdo = new PDO("mysql:dbname=$banco;host=$host", "$usuario", "$senha");

} catch (Exception $e) {
   echo "Erro ao conectar com o banco de dados! ".$e;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <main>
        <section class="col-md-6 col-sm-12">
            <form method="post">
                <label for="nome">Cliente</label>
                <input type="text" name="nome" id="nome">

                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone">

                <label for="produto">produto</label>
                <input type="text" name="produto" id="produto">

                <label for="valor">valor</label>
                <input type="text" name="valor" id="valor">

                <label for="forma_pagamento">forma de pagamento</label>
                <input type="text" name="forma_pagamento" id="forma_pagamento">

                <label for="data_compra">data</label>
                <input type="text" name="data_compra" id="data_compra">

                <label for="observacao">observacao</label>
                <textarea name="observacao" id="observacao" cols="30" rows="10"></textarea>
                
                <button type="submit" id="btn-cadastro" name="btn-cadastro">CADASTRAR</button>
            </form>
        </section>


        <section>
        
        <?php 
          $res = $pdo->query("SELECT * from cadastro ");
          $dados = $res->fetchAll(PDO::FETCH_ASSOC);
          for ($i=0; $i < count($dados); $i++) { 
            foreach ($dados[$i] as $key => $value) {
            }

            $id = $dados[$i]['id']; 
            $nome = $dados[$i]['nome'];

            $observacao = $dados[$i]['observacao'];
            $valor = $dados[$i]['valor'];
            $produto = $dados[$i]['produto'];
            $telefone = $dados[$i]['telefone'];
            $data_compra = $dados[$i]['data_compra'];
            $forma_pagamento = $dados[$i]['forma_pagamento'];
            
        }
            ?>
<script>
function carrinhoModal(idproduto) {
  
  
     event.preventDefault();
            
            $.ajax({

                url: "index.php",
                method: "post",
                data: {idproduto},
                dataType: "text",
                success: function(mensagem){

                    $('#mensagem').removeClass()

                    if(mensagem == 'Cadastrado com Sucesso!!'){
                        atualizarCarrinho();
                       $("#modal-carrinho").modal("show");

                    }else{
                        
                       
                    }
                    
                    $('#mensagem').text(mensagem)

                },
                
            })
}
</script>

        <a class="button button-sm button-secondary button-ujarak" href="" onclick="carrinhoModal('<?php echo $id ?>')">Add ao carrinho</a>
        </section>

    </main>
</body>
</html>

<?php

if (isset($_POST['btn-cadastro'])){
    @$nome = @$_POST['nome'];
    @$produto = @$_POST['produto'];
    @$telefone = @$_POST['telefone'];
    @$valor = @$_POST['valor'];
    @$forma_pagamento = @$_POST['forma_pagamento'];
    @$data_compra = @$_POST['data_compra'];
    @$observacao = @$_POST['observacao'];




$res = $pdo->prepare("INSERT into cadastro (nome, produto, telefone, valor, forma_pagamento, data_compra, observacao) values (:nome, :produto, :telefone, :valor, :forma_pagamento, :data_compra, :observacao)");

    $res->bindValue(":nome", $nome);
    $res->bindValue(":valor", $valor);
    $res->bindValue(":produto", $produto);
    $res->bindValue(":forma_pagamento", $forma_pagamento);
    $res->bindValue(":data_compra", $data_compra);
    $res->bindValue(":telefone", $telefone);
    $res->bindValue(":observacao", $observacao);
    var_dump($nome);

    $res->execute();

    echo 'Cadastrado com Sucesso!!';

}
?>