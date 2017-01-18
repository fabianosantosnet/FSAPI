<?php
#header('Content-Type: text/html; charset=utf-8');
header('Content-Type:application/json;charset=utf-8');
$hostname = "localhost"; // Vamos considerar localhost ou máquina local
$username = "root";      // Username do banco mysql
$password = "root";      // Password do banco mysql
$_URL_COMPLETE='http://'.$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];

$c=mysql_connect($hostname, $username, $password) or die(mysql_error());
#echo "Conexão efectuada com sucesso!<br/>";
 
$e=mysql_select_db("feiras") or die(mysql_error());
#echo "Base de dados seleccionada!<br/>";

#echo basename($_URL_COMPLETE);
$url=explode('/',$_SERVER['PHP_SELF']);
if(count($url)<5)
{
    http_response_code(400);
    echo '400 BAD REQUEST';
    exit;
}

switch($_SERVER['REQUEST_METHOD'])
{
    case 'GET': 
            $get = &$_GET;
            #ID	LONG	LAT	SETCENS	AREAP	CODDIST	DISTRITO	CODSUBPREF	SUBPREFE	REGIAO5	REGIAO8	NOME_FEIRA	REGISTRO	LOGRADOURO	NUMERO	BAIRRO	REFERENCIA
            switch(strtolower($url[3]))
            {
                case 'v1':
                    switch(strtolower($url[4]))
                    {
                        case 'listarfeiras':
                            require_once('get/listarfeiras.php');
                        break;

                        default:
                            http_response_code(405);
                            echo '405 METHOD NOT ALLOWED';
                            exit;
                        break;                                                
                    }
                break;

    default:
            http_response_code(405);
            echo '405 METHOD NOT ALLOWED';
            exit;
        break;
}
mysql_close();
?>