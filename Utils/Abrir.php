<?php
include('TCPIP.php');
include('Conexao.php');
session_start();
 $lifetime=600;
 setcookie(session_name(),session_id(),time()+$lifetime);
 $id = $_SESSION['idUsuario'];
 $sql = "SELECT * FROM PERFIS WHERE ID_PERFIL = '$id'";
      $result = mysqli_query($con,$sql);
        $Results = mysqli_fetch_array($result);
  $nome = $Results['NOME_PERFIL'];
    $email = $Results['EMAIL_PERFIL'];
      $uuid = $Results['UUID_PERFIL'];
socket_write($sock,"2-".$uuid);
 ?>