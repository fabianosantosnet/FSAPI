<?php
$in = json_decode(file_get_contents('php://input'),true);
$i=(count($in)-1);

$arrTbl=array();
if($res=mysql_query('desc cadastrofeiras'))
{
    if(mysql_affected_rows()>0)
    {
      while($dt=mysql_fetch_array($res))
      $arrTbl[]=$dt[0];
    }
    else
    {
        http_response_code(400);
        echo '400 BAD REQUEST';
        exit;
    }
}
else
{
    http_response_code(400);
    echo '400 BAD REQUEST';
    exit;
}
$b=array();
$fora=array();
$q='';
for($j=0;$j<=$i;$j++)
{
    
    $dados='';
    foreach ($in[$i] as $key=>$value)
    {
        if(in_array($key,$arrTbl))
        {
          $dados.=$key.'="'.$value.'",';
        }
        else
        {
            $fora[$key]=$value;
        }
    }


    $dados=substr($dados,0,-1);
    $q.="update cadastrofeiras set        
    {$dados}
    where id='{$in[$i]['ID']}'";
}

if(count($fora)>0)
{
    http_response_code(400);
    echo 'Campo(s) inválido(s) ';
    foreach($fora as $key => $value)
    {
        echo "\"{$key}\" ";
    }    
    exit;    
}
/*
$q.="update cadastrofeiras set        
        LONGITUDE='{$in[$i]['LONGITUDE']}',
        LATITUDE='{$in[$i]['LATITUDE']}',
        SETCENS='{$in[$i]['SETCENS']}',
        AREAP='{$in[$i]['AREAP']}',
        CODDIST='{$in[$i]['CODDIST']}',
        DISTRITO='{$in[$i]['DISTRITO']}',
        CODSUBPREF='{$in[$i]['CODSUBPREF']}',
        SUBPREFE='{$in[$i]['SUBPREFE']}',
        REGIAO05='{$in[$i]['REGIAO5']}',
        REGIAO08='{$in[$i]['REGIAO8']}',
        NOME_FEIRA='{$in[$i]['NOME_FEIRA']}',
        REGISTRO='{$in[$i]['REGISTRO']}',
        LOGRADOURO='{$in[$i]['LOGRADOURO']}',
        NUMERO='{$in[$i]['NUMERO']}',
        BAIRRO='{$in[$i]['BAIRRO']}',
        REFERENCIA='{$in[$i]['REFERENCIA']}'
        where id='{$in[$i]['ID']}'";
*/

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