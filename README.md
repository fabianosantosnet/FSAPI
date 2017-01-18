# FSAPI - Simple JSON API
<h2>About</h2>
<p>This project use a source file "DEINFO_AB_FEIRASLIVRES_2014.csv" at "http://www.prefeitura.sp.gov.br/cidade/secretarias/upload/chamadas/feiras_livres_1429113213.zip".</p>
<p>The project's objective is learning about JSON API.</p>
<p>Firefox Plugin (restclient.net) was used to develop.</p>

<h3>Requirements</h3>
<p>APACHE (or other), PHP5, MySQL. Also called LAMP.</p>

<h3>First steps</h3>
<p>Place the code in your webserver '/var/www/html'.</p>

<p>Enter in prompt shell and type: <br />
<code>mysql -uUser -p [ENTER]</code> type your user and password.<br />
Open <i>database.sql</i>, copy the 25 lines, and paste in your mysql prompt command.<br />
Database name: feiras<br />
Table name: cadastrofeiras</p>

Open the file <i>api.php</i> and change it according to your mysql database settings.
<pre>$hostname = "localhost"
$username = "root"
$password = "root"</pre>

<p>Important: the files should be inside the FSAPI folder.</p>

<hr />
<b>ERRORS</b><br />
<table>
<tr>
  <td>200 OK</td>
  <td>Everthing is alright.</td>
</tr>
<tr>
  <td>202 ACCEPTED</td>
  <td>Your query was succeed but not returning any information.</td>
<tr>
</tr>
  <td>400 BAD REQUEST</td>
  <td>Syntax error (example: get parameter without any complete URL <i>http://localhost/FSAPI/api.php/v1</i>, or when you try to create another register in the database and it already exists).</td>
</tr>
<tr>  
  <td>405 METHOD NOT ALLOWED</td>
  <td>Method or parameter not implemented (example <i>http://localhost/FSAPI/api.php/v1/new</i>)</td>
  </tr>
</table>

<hr />
<b>REQUEST</b><br />
<code>http://localhost/FSAPI/api.php/v1/listarfeiras</code> -> List all rows from table.<br />
<code>http://localhost/FSAPI/api.php/v1/listarfeiras?limit=10</code> -> List 10 rows from table.<br />
Notice that the return fields are numerics 0-16 or by table's name. 0 equals 'ID', 1 equals "LONGITUDE" ... 16 equals "REFERENCIA".
<pre>
    [
    {
       "0": "1",
       "1": "-46550164",
       "2": "-23558733",
       "3": "2147483647",
       "4": "2147483647",
       "5": "87",
       "6": "VILA FORMOSA",
       "7": "26",
       "8": "ARICANDUVA-FORMOSA-CARRAO",
       "9": "Leste",
       "10": "Leste 1",
       "11": "VILA FORMOSA",
       "12": "4041-0",
       "13": "RUA MARAGOJIPE",
       "14": "S/N",
       "15": "VL FORMOSA",
       "16": "TV RUA PRETORIA ",
       "ID": "1",
       "LONGITUDE": "-46550164",
       "LATITUDE": "-23558733",
       "SETCENS": "2147483647",
       "AREAP": "2147483647",
       "CODDIST": "87",
       "DISTRITO": "VILA FORMOSA",
       "CODSUBPREF": "26",
       "SUBPREFE": "ARICANDUVA-FORMOSA-CARRAO",
       "REGIAO5": "Leste",
       "REGIAO8": "Leste 1",
       "NOME_FEIRA": "VILA FORMOSA",
       "REGISTRO": "4041-0",
       "LOGRADOURO": "RUA MARAGOJIPE",
       "NUMERO": "S/N",
       "BAIRRO": "VL FORMOSA",
       "REFERENCIA": "TV RUA PRETORIA "
   },
       {...},
       {...},
       ...
    ]
</pre>

<code>http://localhost/FSAPI/api.php/v1/buscar/distrito/YOUR SEARCH</code> -> Search in field distrito.<br />
<code>http://localhost/FSAPI/api.php/v1/buscar/distrito?limit=2/YOUR SEARCH</code> -> Search in field distrito limited by 2 results.<br />
<code>http://localhost/FSAPI/api.php/v1/buscar/nomefeira/YOUR SEARCH</code> -> Search in field nome_feira from table.<br />
<code>http://localhost/FSAPI/api.php/v1/buscar/nomefeira?limit=5/YOUR SEARCH</code> -> Search in field nome_feira from table limited by 5 rows.<br />

<hr />
<b>POST</b><br />
<p>ID can be null. All fields are required.</p>
<code>http://localhost/FSAPI/api.php/v1/cadastrarfeira</code>
<pre>
   [{    "ID": "1",
       "LONGITUDE": "-46550164",
       "LATITUDE": "-23558733",
       "SETCENS": "2147483647",
       "AREAP": "2147483647",
       "CODDIST": "87",
       "DISTRITO": "VILA FORMOSA",
       "CODSUBPREF": "26",
       "SUBPREFE": "ARICANDUVA-FORMOSA-CARRAO",
       "REGIAO5": "Leste",
       "REGIAO8": "Leste 1",
       "NOME_FEIRA": "VILA FORMOSA",
       "REGISTRO": "4041-0",
       "LOGRADOURO": "RUA MARAGOJIPE",
       "NUMERO": "S/N",
       "BAIRRO": "VL FORMOSA",
       "REFERENCIA": "TV RUA PRETORIA "
   }]
</pre>
<hr />
<b>DELETE</b><br />
<p>ID required.</p>
<code>http://localhost/FSAPI/api.php/v1/excluirfeiras</code>
<pre>[{ "ID": "1" }]</pre>
or
<pre>[{ "0": "879" }]</pre>
  
<hr />
<b>PUT</b><br />
<p>ID required.</p>
<code>http://localhost/FSAPI/api.php/v1/editarfeiras</code>
<pre>
[
  {    "ID": "1",
       "NUMERO": "S/N",
       "BAIRRO": "VL FORMOSA",
       "REFERENCIA": "TEST CHANGE"
   }
 ]
</pre>   

