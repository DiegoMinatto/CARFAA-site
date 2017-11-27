<?php 
include('../Utils/Conexao.php');
include('../Utils/TCPIP.php');
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




$cone = 1;
$worde = '';
socket_write($sock,"1-".$uuid);
$numero = 0;
$conectado = false;
while ($cone == 1)
{
	$numero = $numero + 1;
    $input = socket_read($sock, 2024);

  

    if (preg_match("/44.*-_$uuid/",$input)) 
    {
        $cone = 0;
        $worde = $input;
        $arrayName = explode(".*-_",$worde);
        $conectado = true;
        $dataRelatorio = json_decode($arrayName[2]);
        $dataPessoa = json_decode(substr( $arrayName[3], 0, -1));
    }else{
    if (preg_match("/00.*-_/",$input)) 
    {
        $cone = 0;
          $dataRelatorio = json_decode("[{\"idRelatorio\":\"-\",\"horarioRelatorio\":\"-\",\"IdPessoa\":\"-\",\"pessoa\":\"-\"},{\"idRelatorio\":\"-\",\"horarioRelatorio\":\"-\",\"IdPessoa\":\"-\",\"pessoa\":\"-\"},{\"idRelatorio\":\"-\",\"horarioRelatorio\":\"-\",\"IdPessoa\":\"-\",\"pessoa\":\"-\"},{\"idRelatorio\":\"-\",\"horarioRelatorio\":\"-\",\"IdPessoa\":\"-\",\"pessoa\":\"-\"},{\"idRelatorio\":\"-\",\"horarioRelatorio\":\"-\",\"IdPessoa\":\"-\",\"pessoa\":\"-\"},{\"idRelatorio\":\"-\",\"horarioRelatorio\":\"-\",\"IdPessoa\":\"-\",\"pessoa\":\"-\"}]");
               $dataPessoa = json_decode("[\"-\",\"-\",\"-\",\"-\",\"-\",\"-\"]");
    }
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
      <link rel="stylesheet" type="text/css" href="..\CSS\PainelDeControle.css">
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
    <a class="dropdown-item" href="AlteraDados.php">> Meus dados <</a>
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
    


 <div id="body">


      <hr>
      <center>
<h3>Painel de controle <i style="font-size:30px" class="fa">&#xf085;</i> </h3>
</center>
      <hr>
     
 <center><div class="col-xs-12 col-sm-9">
                    <div class="row">
                      
<div class="col-xs-12 col-lg-12">
  <div id="divControles">
  	<div id="groupBotoes">
  		<hr>
  		  	<h5><i style="font-size:24px" class="fa">&#xf1de;</i> Controles de acesso:</h5s>
  		  		<hr>
  		  		<br>
  		  		<br>


  		  		<button type="button" id="btnAbrir" class="btn btn-outline-danger btnFunc" onclick="AbreFecha()"><span id="SpawnAbrir"><i style="font-size:24px" class="fa">&#xf09c;</i> Abrir</span></button>



  		  		<button onclick="Panico()" id="btnPanico" type="button" class="btn btn-outline-warning btnFunc"><span id="SpawnPanico"><i style="font-size:24px" class="fa">&#xf0a1;</i> Panico</span></button>


  		  		<br>
  		  	    <br>
  		  		<button onclick="Desabilitar()" type="button" id="btnDesabilita" class="btn btn-outline-info btnFunc1"><span id="SpawnDesabilitar"><i style="font-size:24px" class="fa">&#xf00d;</i> Desabilitar</span></button>
  	<br>
  	<br>
  	<span id="spawnRD" class="hide">O reconhecimento facial encontra-se desabilitado!</span>
  	</div>
<?php 

if($conectado == false){
  echo '<script language="javascript">';
          echo '$(document).ready(function(){
          DesabilitaBotoes();
          });';
          echo '</script>';
}

 ?>
  </div>
</div>
<div class="col-xs-12 col-lg-12">
	<div class="bordaGrupo">
<center><h5><i style="font-size:24px" class="fa">&#xf1ae;</i> Ultimas pessoas aprovadas:</h5></center>
  
            <table class="table table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>ID</th>
      <th>Nome</th>
      <th>Data</th>
    </tr>
  </thead>
  <tbody>
   <?php  
for ($i=0; $i < 6; $i++) { 
	echo "<tr>";
	echo "<th scope=\"row\">$i</th>";
	echo "<td>".$dataRelatorio[$i]->idRelatorio."</td>";
	echo "<td>".$dataPessoa[$i]."</td>";
	echo "<td>".str_replace("T"," ",$dataRelatorio[$i]->horarioRelatorio)."</td>";
	echo "</tr>";

}




   ?>



  </tbody>
</table>
</div>
</div>
                    </div>
                </div>
            </center>
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
       <script src="..\JS\funcoesBtnPainel.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>



</html>
