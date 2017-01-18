<?php
$del = json_decode(file_get_contents('php://input'),true);
$i=(count($del)-1);

if(count($url)<5)
{
    http_response_code(400);
    echo '400 BAD REQUEST';
    exit;
}
$id= (int) $del[0][0];

$q='';
for($j=0;$j<=$i;$j++)
    $q.="delete from cadastrofeiras where id='{$id}'; ";

if($res=mysql_query($q)) 
{
    if(mysql_affected_rows()>0)
    {
        http_response_code(200);
        echo '200 OK';
        exit;                
    }
    else
    {
        http_response_code(202);
        echo '202 ACCEPTED';
        exit;        
    }
}
else
{
    http_response_code(400);
    echo '400 BAD REQUEST';
    exit;
}
?>