<?php
$limit='';
if(isset($_GET['limit']))
{
    $limit=(int) $_GET['limit'];
    
    if($limit>0)
        $limit=' limit 0,'.$limit;                            
    else 
        $limit='';
}

if(count($url)<6)
{
    http_response_code(400);
    echo '400 BAD REQUEST';
    exit;
}

switch(strtolower($url[5]))
{
    case 'distrito':
        $distrito='';
        if(isset($url[6]))
        {
            $distrito=$url[6];
            if(empty($distrito))
            {
                http_response_code(202);                
                exit;                    
            }
        }
        else
        {
            http_response_code(405);
            echo '405 METHOD NOT ALLOWED';
            exit;            
        }
            
        $allD=mysql_query("select * from cadastrofeiras where distrito like'%$distrito%'$limit");

        if(mysql_num_rows($allD)>0)
        {   
            $data='';
            while($allcad=mysql_fetch_array($allD))
             $data[]=($allcad);               
            
            
            http_response_code(200);
            echo json_encode($data);
        }
        else 
        {
            http_response_code(202);                
            echo '202 ACCEPTED';
            exit;                                
        }

    break;

    case 'nomefeira':
        $nomefeira='';
        if(isset($url[6]))
        {
            $nomefeira=$url[6];        
            
            if(empty($nomefeira))
            {
                http_response_code(202);   
                echo '202 ACCEPTED';
                exit;                    
            }

        }
        else
        {
            http_response_code(405);
            echo '405 METHOD NOT ALLOWED';
            exit;            
        }

        $allD=mysql_query("select * from cadastrofeiras where nome_feira like'%$nomefeira%'$limit");

        if(mysql_num_rows($allD)>0)
        {   
            $data='';
            while($allcad=mysql_fetch_array($allD))
            $data[]=($allcad);
            
            http_response_code(200);
            echo json_encode($data);
        }
        else 
        {
            http_response_code(202);                
            echo '202 ACCEPTED';
            exit;                                
        }    

    break;
    
    default:
            http_response_code(405);
            echo '405 METHOD NOT ALLOWED';
            exit;
    break;
}
?>