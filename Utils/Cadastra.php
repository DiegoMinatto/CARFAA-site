<?php 
include('../Utils/Conexao.php');
$lifetime=600;
session_set_cookie_params($lifetime);
session_start();
$nome = $_POST['inputNome'];
$email = $_POST['inputEmail'];
$senha = md5($_POST['inputSenha']);
$uuid = $_POST['inputUUID'];
$sql = "INSERT INTO PERFIS(NOME_PERFIL,EMAIL_PERFIL,SENHA_PERFIL,UUID_PERFIL) VALUES('$nome','$email','$senha','$uuid')";
mysqli_query($con, $sql);
$sql = "SELECT * FROM PERFIS WHERE EMAIL_PERFIL = '$email' and SENHA_PERFIL = '$senha'";
$result = mysqli_query($con,$sql);
$Results = mysqli_fetch_array($result);
$_SESSION['idUsuario'] = $Results['ID_PERFIL'];
header('location:../Pages/PainelDeControle.php');
 ?>