<?php 
include('Conexao.php');
$lifetime=600;
session_set_cookie_params($lifetime);
session_start();
$email = $_POST['inputEmail'];
$senha = md5($_POST['inputSenha']);
$uuid = $_POST['inputUUID'];
$id = $_SESSION['idUsuario'];
if(empty($senha)){
$sql = "UPDATE PERFIS SET UUID_PERFIL = '$uuid' WHERE ID_PERFIL = '$id'";
}else{
$sql = "UPDATE PERFIS SET SENHA_PERFIL = '$senha', UUID_PERFIL = '$uuid' WHERE ID_PERFIL = '$id'";	
}
mysqli_query($con, $sql);
header('location:../Pages/PainelDeControle.php');
 ?>