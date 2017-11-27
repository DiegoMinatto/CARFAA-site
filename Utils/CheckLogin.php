<?php 
include('Conexao.php');
$usuario = $_GET['usuario'];
$senha = MD5($_GET['senha']);

$result = mysqli_query($con, "SELECT * FROM PERFIS WHERE EMAIL_PERFIL ='$usuario' AND SENHA_PERFIL = '$senha' "); 
if(mysqlI_num_rows($result) <=0){
    echo 'false';
}
else{
    echo 'true';
}
?>