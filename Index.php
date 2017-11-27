<!doctype html>
<html lang="en">
  <head>
    <title>Carfaa</title>
    <!-- Required meta tags -->
    <link rel='shortcut icon' type='image/x-icon' href='Images/favicon.ico' />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
            <script type="text/javascript" src="http://code.jquery.com/jquery-2.0.0.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.js"></script>
      <link rel="stylesheet" type="text/css" href="CSS\Estyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
       <div id="divBgLogin">
     <div class="container-fluid">
            <div class="row">
         <div id="divLogin" class="col-xs-12">
            <center>


  <div class="form-group col-8">
    <form name="frmlogin" method="POST">
                    <hr class="hrLogin">
              <h6>Login</h6>
              <hr class="hrLogin">
    <div class="form-group col-8 ">
     <label for="loginUsuario">Usuario:</label>
    <input type="text" class="form-control" id="loginUsuario" name="loginUsuario" placeholder="Usuario">
   </div>
   <div class="form-group col-8 divError ">
    <label for="loginSenha">Senha:</label>
    <input type="password" class="form-control" id="loginSenha" name="loginSenha" placeholder="Senha">
  </div>
  <hr class="hrLogin">
  <button type="submit" name="btnEntrar" class="btn btn-outline-secondary">Entrar</button>
    <button type="button" class="btn btn-outline-secondary" onclick="location.href='Index.php';">Cancelar</button>
  <hr>
      <a href="Pages/Recovery.php">Esqueceu a senha ?</a>
    </form>
</center>
         </div>
         </div>
     </div>
<?php
include('Utils/Conexao.php');
  session_start();
if (isset($_POST['btnEntrar'])) {
   $lifetime=600;
  session_set_cookie_params($lifetime);
  session_start();
 $email = $_POST['loginUsuario'];
 $senha = md5($_POST['loginSenha']);
 $sql = "SELECT * FROM PERFIS WHERE EMAIL_PERFIL = '$email' and SENHA_PERFIL = '$senha'";
$result = mysqli_query($con,$sql);
$Results = mysqli_fetch_array($result);
$_SESSION['idUsuario'] = $Results['ID_PERFIL'];
header('location:Pages/PainelDeControle.php');
}else{
if(!empty($_SESSION['idUsuario'])) {
  $lifetime=600;
  session_start();
  setcookie(session_name(),session_id(),time()+$lifetime);
header('location:Pages/PainelDeControle.php');
}

} 
?>
       </div>
    <section id="home"></section>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark" id="mainNav">
    <a class="navbar-brand" href="#">
       <img src="Images/Icon.png" width="30" height="30" class="d-inline-block align-top" alt=""> CARFAA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbarXs">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="collapsingNavbarXs">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger active har2"  href="#home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger har1" href="#about">Sobre</a>
            </li>
        </ul>
         <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="#" onclick="showLogin();"><i style="font-size:24px"  class="fa">&#xf2c2;</i> Login</a>

    </li>
    <li class="navbar-item">
      <a class="nav-link" href="Pages/Cadastro.php"><i style="font-size:24px" class="fa">&#xf044;</i> Cadastre-se</a>
    </li>
  </ul>
    </div>

</nav>
    
<div id="container-fluid">

 <div id="body">
  <div class="container-fluid">
  <div class="row">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="Images/carrousel1.png" alt="First slide">
       <div class="carousel-caption">
    <h3>Segurança</h3>
    <p>Mais segurança para suas instalações</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="Images/carrousel2.png" alt="Second slide">
             <div class="carousel-caption">
    <h3>Opções</h3>
    <p>Diversas opções para você</p>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="Images/carrousel3.png" alt="Third slide">
                   <div class="carousel-caption">
    <h3>Desingn Intuitivo</h3>
    <p>Para facilitar a interação</p>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  </div>
<div class="container-fluid">

 <br>
 <br>

    <center>
    <div class="col-xs-12">
      <div class="center-block">
          <hr>
        <div class="circle" id="logoImg"></div>
               <h6>Seja bem vindo a CARFAA</h6>
                                 <section id="about">

       <p>Seja bem vindo a um mundo de opções</p>

       <hr>
        <br>
      </div>
    </div>
  </center>
</section>
  <br>
  <br>
  
<center>
<div class="row">
  <div class="col-sm-4"><h1>Versatilidade</h1>
<p>CARFAA foi pensado para você que necessita de versatibilidade</p>
  </div>
  <div class="col-sm-4"></div>
  <div class="col-sm-4"></div>
</div>
<br>
<br>

<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4"><h1>Facilidade de acesso</h1>
    <p>Com CARFAA sua chave é você</p></div>
  <div class="col-sm-4"></div>
</div>
<br>
<br>


<div class="row">
  <div class="col-sm-4"></div>
  <div class="col-sm-4"></div>
  <div class="col-sm-4">
    <h1>Baixo custo</h1>
    <p>Baixo custo comparado com produtos similares no mercado</p>
  </div>
</div>

<br>
<hr>
<div class="row">
    <div class="col-sm-4"></div>
  <div class="col-sm-4"><h1>Sobre</h1>
<p>CARFAA tem como objetivo principal o controle de acesso de ambientes diversos efetuando relatorios de entrada e possuindo uma interface de facil interação</p>
  </div>
  <div class="col-sm-4"></div>
</div>
</center>
</div>
   </div>
   <br>
   <div id="footer" class="bg-dark">
    <h6 id="txtFooter">© Diego Minatto-2017</h6>
   </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="JS/scrolling-nav.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>