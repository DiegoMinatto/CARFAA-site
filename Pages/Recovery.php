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
        <link rel="stylesheet" type="text/css" href="..\CSS\Recovery.css">
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
      <br>
      <br>
      <br>
            <br>
      <br>
      <br>


      <hr>
      <center>
<h3>Recuperação de senha <i style="font-size:24px" class="fa">&#xf0ea;</i> </h3>
</center>
      <hr>
      <div class="container-fluid">
        <div id="divCampoEmail">
  <div id="divPosicao">
    <form action="Recovery.php" method="POST" id="FormEmail" name="validarec">
      <center>
  <div class="form-group col-8 divMensagem">
    <label for="inputEmail">Email:</label>
    <input type="email" class="form-control  inputDados" id="inputEmail" name="inputEmail" placeholder="Email">
    <label for="inputEmail" class="error"></label>
  </div>
 </center>
<center>
  <hr>
  <button type="submit" name="btnRecuperar" id="btnRecuperar" class="btn btn-outline-secondary">Enviar</button>
  <hr>
</center>
</form>
</div>
</div>
</div>

<?php 
 if (isset($_POST['btnRecuperar'])) {
include('../Utils/Conexao.php');
 $email = $_POST['inputEmail']; 

 $query = "SELECT * FROM PERFIS where EMAIL_PERFIL='".$email."'";
        $result = mysqli_query($con,$query);
        $Results = mysqli_fetch_array($result);
 
        if(count($Results)>=1)
        {
            $encrypt = md5( date('Y-m-d H:i:s').$Results['ID_PERFIL']);
            $id = $Results['ID_PERFIL'];

            $query2 = "SELECT * FROM RECUPERACOES where ID_PERFIL='".$id."'";
        $result2 = mysqli_query($con,$query2);
        $Results2 = mysqli_fetch_array($result2);
        if(count($Results2)>=1)
        {
          $sql = "UPDATE RECUPERACOES
SET KEY_RECUPERACAO = '$encrypt',STATUS_REC = true
WHERE ID_PERFIL = '$id'";


        }else{
            $sql = "INSERT INTO RECUPERACOES(KEY_RECUPERACAO,ID_PERFIL,STATUS_REC) VALUES('$encrypt','$id',true)";
        }
            mysqli_query($con,$sql);

             
                    $subject="Recuperação de senha";
            $from = 'turma2dmais@gmail.com';
        
$to      = $email;
$subject = $subject;
$message = '<html><body>';
$message .= '<center><strong>Olá, '.$Results['NOME_PERFIL'].'</strong></center>';
$message .= '<br><br>';
$message .= '<p>Você solicitou uma alteração de senha,';
$message .= ' para fazer a recuperação utilize este link: '.'http://' . $_SERVER['HTTP_HOST'] . str_replace("/Recovery.php","",$_SERVER['REQUEST_URI']).'/reset.php?encrypt='.$encrypt.'&key='.$id.'&action=reset</p>';
$message .= '<br><br>';
$message .= 'Caso não tenha solicitado a recuperação de senha apenas ignore este E-mail. <br><br> Att.CARFAA';

$message .= "</body></html>";


$headers = 'From: turma2dmais@gmail.com' . "\r\n" .
    'Reply-To: turma2dmais@gmail.com';
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

mail($to, $subject, $message, $headers);

    echo '<script language="javascript">';
echo '$(document).ready(function(){
  emailEnviado("'.$email.'");
});';
echo '</script>';
 }
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
     <script src="..\JS\ValidaRecuperacao.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bosotstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>



</html>
