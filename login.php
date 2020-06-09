<?php 

include_once("conexao.php");

if(isset($_POST['email2']) and $_POST['email2'] != ''){
    $email_rec = $_POST['email2'];
}
 ?>
<head>
    <title>ARTES DA LU</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="description" content="Pizzas Vitoria da Conquista, Lanches em conquista, Comprar Sanduíche conquista ">
    <meta name="author" content="Seu comercio">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/login.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="icon" href="images/favicon-nova.ico" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>


<!------ Include the above in your HEAD tag ---------->

<!-- login start -->

<a href="localhost://controlecaixa/painel-adm/index.php">Inicio</a>
<div class="container-fluid">

    <section class="login-block mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h5 class="text-center mb-4">Faça seu Login</h5>
                    <span class="<?php echo @$classe ?>"><?php echo @$alerta ?></span>
                    
                    <form class="login100-form validate-form" method="post" action="autenticar.php">
                        <div class="wrap-input100 validate-input">
                            <span class="label-input100">Usuário</span><br>
                            <input class="input100" type="text" name="username" id="username"
                            placeholder="Insira seu Email" required>
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <span class="label-input100">Senha</span>
                            <input class="input100" type="password" id="pass" name="pass" placeholder="Insira sua Senha" required>
                            <span class="focus-input100 password"></span>
                        </div>



                        <div class="container-login100-form-btn">
                            <div class="wrap-login100-form-btn">
                                <button class="btn btn-primary">
                                    Logar
                                </button>
                            </div>
                        </div>


                    </form>
                    
               </div>

               <div class="col-md-8 banner-sec">   
                  <div class="signup__overlay"></div>          
                  <div class="banner">
                    <div id="demo" class="carousel slide carousel-fade" data-ride="carousel">


                        
                    </div>
                </div>

            </div>
        </div>

    </div>

</section>

<!-- login end -->

</div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>




