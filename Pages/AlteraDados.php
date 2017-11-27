<?php 
include('../Utils/Conexao.php');
 session_start();
  if (isset($_POST['btnSair'])) {
       session_destroy();
      header('location:../Index.php');
     }else{
 if(empty($_SESSION['idUsuario'])) {
  header('location:../Index.php');
}else{
 $lifetime=600;
 // setcookie(session_name(),session_id(),time()+$lifetime);
 $id = $_SESSION['idUsuario'];
 $sql = "SELECT * FROM PERFIS WHERE ID_PERFIL = '$id'";
      $result = mysqli_query($con,$sql);
        $Results = mysqli_fetch_array($result);
  $nome = $Results['NOME_PERFIL'];
    $email = $Results['EMAIL_PERFIL'];
      $uuid = $Results['UUID_PERFIL'];
}
}
 ?>

<!doctype html>
<html lang="en">
  <head>
   <title>Carfaa</title>
    <!-- Required meta tags -->
         <link rel='shortcut icon' type='image/x-icon' href='../Images/favicon.ico' />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
   <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.0.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
      <link rel="stylesheet" type="text/css" href="..\CSS\Estyle.css">
            <link rel="stylesheet" type="text/css" href="..\CSS\AlteraDados.css">
      <link rel="stylesheet" type="text/css" href="..\CSS\PainelDeControle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

<script type="text/javascript">
  var emailOriginal = <?php echo "\"$email\"";?>;
</script>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark" id="mainNav">
    <a class="navbar-brand" href="#">
       <img src="../Images/Icon.png" width="30" height="30" class="d-inline-block align-top" alt=""> CARFAA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbarXs">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="collapsingNavbarXs">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <div class="btn-group">
    <a class="dropdown-toggle estiloDropdown" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <i style="font-size:24px" class="fa">&#xf21d;</i> Minha conta
  </a>
  <div class="dropdown-menu dropdown-menu-right">
    <center>
  <h3 class="dropdown-item disabled">Olá, <?php echo $nome; ?></h3>
  <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="PainelDeControle.php">> Painel de controle <</a>
  <div class="dropdown-divider"></div>
    <form name="frmSair" method="POST">

    <button type="submit" name="btnSair" class="btn btn-outline-secondary">Sair</button>
    </form>
    
</center>
  </div>
</div>
            </li>
        </ul>
    </div>

</nav>
    
<div id="container-fluid">

 <div id="body">

    <div id="divCadastro">
      <hr>
      <center>
<h3>Alterar dados <i style="font-size:24px" class="fa">&#xf0c5;</i> </h3>
</center>
      <hr>
      <div class="container-fluid">
    <form action="../Utils/AlteraDados.php" method="POST" name="alteradados">
      <center>
       <div class="form-group col-8 divMensagem">
    <label for="inputNome">Nome:</label>
    <input type="text" class="form-control " disabled id="inputNome" name="inputNome" value=<?php echo "\"$nome\""; ?>>
  </div>

  <div class="form-group col-8 divMensagem">
    <label for="inputEmail">Email:</label>
    <input type="email" class="form-control inputDados " disabled id="inputEmail" name="inputEmail" value=<?php echo "\"$email\""; ?>>
  </div>
    <div class="form-group col-8">
    <label for="inputUUID">UUID do produto:</label>
    <input type="text"  class="form-control inputDados" id="inputUUID"  name="inputUUID" value=<?php echo "\"$uuid\""; ?>>
  </div>

 <div class="form-row col-8 divMensagemSenha">
    <div class="col-xs-12 col">
         <label for="inputSenha">Senha:</label>
    <input type="password" class="form-control inputDados" id="inputSenha" name="inputSenha" placeholder="Nova senha">
    </div>
    <div class="col-xs-12 col">
          <label for="inputSenhaRepete">Senha:</label>
    <input type="password" class="form-control inputDados" id="inputSenhaRepete" name="inputSenhaRepete" placeholder="Repetir nova senha">
    </div>
  </div>
 </center>
<center>
  <hr>
  <button type="submit" class="btn btn-outline-secondary">Salvar</button>
  <hr>
</center>
</form>
</div>


        
    </div>

 </div>
 
</div>
   <br>
   <div id="footer" class="bg-dark">
    <h6 id="txtFooter">© Diego Minatto-2017</h6>
   </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="..\JS\scrolling-nav.js"></script>
      <script src="..\JS\alteraDados.js"></script>
     

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  
  </body>



</html>
