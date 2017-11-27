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
      <link rel="stylesheet" type="text/css" href="..\CSS\Reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark" id="mainNav">
    <a class="navbar-brand" href="#">
       <img src="../Images/Icon.png" width="30" height="30" class="d-inline-block align-top" alt=""> CARFAA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbarXs">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="collapsingNavbarXs">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger active har2"  href="../Index.php">Home</a>
            </li>
        </ul>
    </div>

</nav>
    
<div id="container-fluid">

 <div id="body">


<div id="divBgError">
     <div class="container-fluid">
            <div class="row">
         <div id="divError" class="col-xs-12">
            <center>
              <br>
              <br>
              <br>
                  <br>
              <br>
              <hr>
             <h1>O link de recuperação não é válido!</h1>
                           <br>
             <a href="../Index.php">Pagina Inicial</a>
              <hr>
            </center>
         </div>
         </div>
     </div>

       </div>



    <div id="divCadastro">
               <div class="form-row col-8 divMensagemSenha">
          <div class="col-xs-12 col">
          <div id="divCampoEmail"></div>
          </div>
              </div>
      <hr>
      <center>
<h3>Recuperação de conta <i style="font-size:24px" class="fa">&#xf12d;</i> </h3>
</center>
      <hr>
      <div class="container-fluid">
    <form action=<?php echo "\"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]\""; ?> method="POST" name="registro">
      <center>
    <div class="form-row col-8 divMensagemSenha">
    <div class="col-xs-12 col">
         <label for="inputSenha">Senha:</label>
    <input type="password" class="form-control inputDados" id="inputSenha" name="inputSenha" placeholder="Senha">
    </div>
    <div class="col-xs-12 col">
          <label for="inputSenhaRepete">Senha:</label>
    <input type="password" class="form-control inputDados" id="inputSenhaRepete" name="inputSenhaRepete" placeholder="Repetir Senha">
    </div>
  </div>
 </center>
<center>

  <hr>
  <button type="submit" name="btnSalvar" class="btn btn-outline-secondary">Salvar</button>
  <hr>
</center>
</form>
</div>


<?php
include('../Utils/Conexao.php'); 
 session_start();
$id = $_GET['key'];
$encrypt = $_GET['encrypt'];
$sql = "SELECT * FROM RECUPERACOES WHERE KEY_RECUPERACAO = '$encrypt'";
    $result = mysqli_query($con,$sql);
    $Results = mysqli_fetch_array($result);
 if(count($Results)>=1 && $Results['ID_PERFIL'] == $id  && $Results['STATUS_REC'] == true )
{
  if (isset($_POST['btnSalvar'])) {
  $novaSenha = md5($_POST['inputSenha']);
     $sql = "UPDATE PERFIS
SET SENHA_PERFIL = '$novaSenha'
WHERE ID_PERFIL = '$id'";
mysqli_query($con,$sql);

 $sql = "UPDATE RECUPERACOES
SET STATUS_REC = false
WHERE ID_PERFIL = '$id'";
mysqli_query($con,$sql);
$_SESSION['idUsuario'] = $id;


header('location:PainelDeControle.php');
//manda para a pagina principal
  }
}else{
unset ($_SESSION['idUsuario']);
echo '<script language="javascript">';
echo '$(document).ready(function(){
  showError();
});';
echo '</script>';
  //invalido
}
 ?>


<script type="text/javascript">
  // Wait for the DOM to be ready
</script>
        
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
       <script src="..\JS\Reset.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>



</html>
