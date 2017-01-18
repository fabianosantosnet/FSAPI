<?php
$in = json_decode(file_get_contents('php://input'),true);
$i=(count($in)-1);

$q='';
for($j=0;$j<=$i;$j++)
{
        $q.="insert into cadastrofeiras values(
        '{$in[$i]['ID']}',
        '{$in[$i]['LONGITUDE']}',
        '{$in[$i]['LATITUDE']}',
        '{$in[$i]['SETCENS']}',
        '{$in[$i]['AREAP']}',
        '{$in[$i]['CODDIST']}',
        '{$in[$i]['DISTRITO']}',
        '{$in[$i]['CODSUBPREF']}',
        '{$in[$i]['SUBPREFE']}',
        '{$in[$i]['REGIAO5']}',
        '{$in[$i]['REGIAO8']}',
        '{$in[$i]['NOME_FEIRA']}',
        '{$in[$i]['REGISTRO']}',
        '{$in[$i]['LOGRADOURO']}',
        '{$in[$i]['NUMERO']}',
        '{$in[$i]['BAIRRO']}',
        '{$in[$i]['REFERENCIA']}'
        );";
}

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