CREATE DATABASE TitanSoftware;

use TitanSoftware;

grant all PRIVILEGES on *.* TO 'root'@'localhost' IDENTIFIED by 'root';

-- ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'admin'; flush privileges;

create table produtos(
IDPROD integer(8) auto_increment not null,
 NOME varchar(20)  not null,
 COR varchar (10)  not null,
  primary key(IDPROD)
);

create table preco(
IDPRECO integer(8) auto_increment not null,
IDPROD	integer(8) not null,
PRECO  decimal(5,2) not null,
PRIMARY KEY(IDPRECO)
);


ALTER TABLE preco ADD CONSTRAINT IDPROD FOREIGN KEY ( IDPROD ) REFERENCES produtos ( IDPROD ) ON DELETE CASCADE
ON UPDATE CASCADE ;

insert into produtos ( NOME, COR) values ('abacaxi','preto');
insert into produtos ( NOME, COR) values ('feijao','preto');
insert into produtos ( NOME, COR) values ('arroz','branco');
insert into produtos ( NOME, COR) values ('tomate','vermelho');
insert into produtos ( NOME, COR) values ('banana','amarelo');
insert into produtos ( NOME, COR) values ('mirtilo','azul');
insert into produtos ( NOME, COR) values ('macarrao','verde');

insert into preco( IDPROD, PRECO) values ('1','4.50');
insert into preco( IDPROD, PRECO) values ('2','6.91');
insert into preco( IDPROD, PRECO) values ('3','2.60');
insert into preco( IDPROD, PRECO) values ('4','3.52');
insert into preco( IDPROD, PRECO) values ('5','7.12');


