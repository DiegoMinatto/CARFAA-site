<?php
 
include('Conexao.php');
$userAnswer = $_GET['mail'];
$mailinicial = $_GET['mailOriginal'];
echo $mailinicial;
$result = mysqli_query($con, "SELECT * FROM PERFIS WHERE EMAIL_PERFIL ='$userAnswer'"); 
if(mysqlI_num_rows($result) > 0 && $userAnswer =! $result){
    echo 'false';
}
else{
    echo 'true';
}
?>