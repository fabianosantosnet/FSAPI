<?php
#header('Content-Type: text/html; charset=utf-8');
#header('Content-Type:application/json;charset=utf-8');

$d=mysql_query("desc cadastrofeiras");

if(mysql_num_rows($d)>0)
{
    $tblName2=array();
    while($tblName=mysql_fetch_row($d)) { $tblName2[]=$tblName[0];}

    $limit='';
    if(isset($_GET['limit']))
    {
        $limit=(int) $_GET['limit'];
        
        if($limit>0)
            $limit=' limit 0,'.$limit;                            
        else 
            $limit='';
    }

    $allD=mysql_query("select * from cadastrofeiras$limit");
    
    if(mysql_num_rows($allD)>0)
    {   
        $data='';
        while($allcad=mysql_fetch_array($allD))
        {
            #$data[]=$allcad;
            
            $data[]=($allcad);
            
            #for($i=0;$i<count($tblName2);$i++)
            #$data.= $allcad[$tblName2[$i]];
        };
        
        http_response_code(200);
        echo json_encode($data);
    }                        
}                    

?>