<?php
header('Content-Type:application/json;charset=utf-8');
$hostname = "localhost"; // Vamos considerar localhost ou máquina local
$username = "root";      // Username do banco mysql
$password = "root";      // Password do banco mysql

$c=mysql_connect($hostname, $username, $password) or die(mysql_error());
$e=mysql_select_db("feiras") or die(mysql_error());
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
            switch(strtolower($url[3]))
            {
                case 'v1':                    
                    switch(strtolower($url[4]))
                    {
                        case 'listarfeiras':
                            require_once('get/listarfeiras.php');
                        break;
                        
                        case 'buscar':
                            require_once('get/buscarfeiras.php');
                        break;
                        
                        default:
                        echo $url[4];
                            http_response_code(405);
                            echo '405 METHOD NOT ALLOWED';
                            exit;
                        break;                                                
                    }
                break;
                
                default:
                    http_response_code(501);
                    echo '501 RESOURCE NOT IMPLEMENTED';
                    exit;
                break;                
             }   
             
    break;
    
    case 'POST':
            $post = &$_POST;
            switch(strtolower($url[3]))
            {
                case 'v1':
                    switch(strtolower($url[4]))
                    {
                        case 'cadastrarfeiras':                  
                            require_once('post/cadastrarfeiras.php');
                        break;

                        default:
                            http_response_code(405);
                            echo '405 METHOD NOT ALLOWED';
                            exit;
                        break;                                                
                    }
                break;
                
                default:
                    http_response_code(501);
                    echo '501 RESOURCE NOT IMPLEMENTED';
                    exit;
                break;
            }            
    break;                


    case 'DELETE':            
            switch(strtolower($url[3]))
            {
                case 'v1':
                    switch(strtolower($url[4]))
                    {
                        case 'excluirfeiras':                  
                            require_once('delete/deletefeiras.php');
                        break;

                        default:
                            http_response_code(405);
                            echo '405 METHOD NOT ALLOWED';
                            exit;
                        break;                                                
                    }
                break;
                
                default:
                    http_response_code(501);
                    echo '501 RESOURCE NOT IMPLEMENTED';
                    exit;
                break;
            }            
    break;

    case 'PUT':            
            switch(strtolower($url[3]))
            {
                case 'v1':
                    switch(strtolower($url[4]))
                    {
                        case 'editarfeiras':                  
                            require_once('put/editarfeiras.php');
                        break;

                        default:
                            http_response_code(405);
                            echo '405 METHOD NOT ALLOWED';
                            exit;
                        break;                                                
                    }
                break;
                
                default:
                    http_response_code(501);
                    echo '501 RESOURCE NOT IMPLEMENTED';
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