create database feiras;

use feiras;

create table cadastrofeiras
(
  ID int auto_increment not null,
  LONGITUDE int not null,
  LATITUDE int not null,
  SETCENS int not null,
  AREAP int not null,
  CODDIST int not null,
  DISTRITO varchar(255) not null,
  CODSUBPREF int not null,
  SUBPREFE varchar(255) not null,
  REGIAO5 varchar(255) not null,
  REGIAO8 varchar(255) not null,
  NOME_FEIRA varchar(255) not null,
  REGISTRO varchar(255) not null,
  LOGRADOURO varchar(255) not null,
  NUMERO varchar(255) not null,
  BAIRRO varchar(255) not null,
  REFERENCIA varchar(255) not null,
  primary key (ID)
);


# in the prompt line 'mysql>' execute the code. Change the path.
LOAD DATA LOCAL INFILE '/home/usuario/Documents/DEINFO_AB_FEIRASLIVRES_2014.csv' INTO TABLE cadastrofeiras FIELDS TERMINATED BY ',' ENCLOSED BY '"' LINES TERMINATED BY '\n';
