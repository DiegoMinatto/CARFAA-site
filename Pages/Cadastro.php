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
      <link rel="stylesheet" type="text/css" href="..\CSS\Cadastro.css">
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

    <div id="divCadastro">
      <hr>
      <center>
<h3>Cadastro <i style="font-size:30px" class="fa">&#xf044;</i> </h3>
</center>
      <hr>
      <div class="container-fluid">
    <form action="../Utils/Cadastra.php" method="POST" name="registro">
      <center>
       <div class="form-group col-8 divMensagem">
    <label for="inputNome">Nome:</label>
    <input type="text" class="form-control" id="inputNome" name="inputNome" placeholder="Nome">
  </div>

  <div class="form-group col-8 divMensagem">
    <label for="inputEmail">Email:</label>
    <input type="email" class="form-control  inputDados" id="inputEmail" name="inputEmail" placeholder="Email">
  </div>
    <div class="form-group col-8">
    <label for="inputUUID">UUID do produto:</label>
    <input type="text"  class="form-control inputDados" id="inputUUID"  name="inputUUID" placeholder="UUID">
  </div>

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
  <button type="submit" class="btn btn-outline-secondary">Cadastrar</button>
  <hr>
</center>
</form>
</div>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bosotstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>



</html>
