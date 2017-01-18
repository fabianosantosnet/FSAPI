<?php
header('Content-Type:application/json;charset=utf-8');
$hostname = "localhost";    // Vamos considerar localhost ou máquina local
$username = "root";         // Username do banco mysql
$password = "root";         // Password do banco mysql

$_URL_COMPLETE='http://'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];

$c=mysql_connect($hostname, $username, $password) or die(mysql_error());
#echo "Conexão efectuada com sucesso!<br/>";
 
$e=mysql_select_db("feiras") or die(mysql_error());
#echo "Base de dados seleccionada!<br/>";


mysql_close();
?>