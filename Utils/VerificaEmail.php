<?php
 
include('Conexao.php');
$userAnswer = $_GET['mail'];
$result = mysqli_query($con, "SELECT * FROM PERFIS WHERE EMAIL_PERFIL ='$userAnswer'"); 
if(mysqlI_num_rows($result) > 0){
     echo 'true';
}
else{
	
	echo 'false';
}

?>