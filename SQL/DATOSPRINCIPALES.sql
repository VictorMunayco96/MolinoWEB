Use DBMolino;

insert into TipoDestino (TipoDestino, CodDestino, Estado) values ('DESTINOS MOLINO','TD01',1);

INSERT INTO DESTINO(DESTINO,CODDESTINO,ESTADO,IDTIPODESTINO) VALUES ('CAMELLONES','D0001',1,1);
INSERT INTO DESTINO(DESTINO,CODDESTINO,ESTADO,IDTIPODESTINO) VALUES ('SILENCIO','D0002',1,1);
INSERT INTO DESTINO(DESTINO,CODDESTINO,ESTADO,IDTIPODESTINO) VALUES ('ANTENA','D0003',1,1);
INSERT INTO DESTINO(DESTINO,CODDESTINO,ESTADO,IDTIPODESTINO) VALUES ('LOMA','D0004',1,1);
INSERT INTO DESTINO(DESTINO,CODDESTINO,ESTADO,IDTIPODESTINO) VALUES ('HOYADA','D0005',1,1);
INSERT INTO DESTINO(DESTINO,CODDESTINO,ESTADO,IDTIPODESTINO) VALUES ('YANACOCHA','D0006',1,1);
INSERT INTO DESTINO(DESTINO,CODDESTINO,ESTADO,IDTIPODESTINO) VALUES ('MINA','D0007',1,1);
INSERT INTO DESTINO(DESTINO,CODDESTINO,ESTADO,IDTIPODESTINO) VALUES ('QUEBRADA','D0008',1,1);


INSERT INTO DESTINODESC (DESTINODES,CODDESTINODESC,ESTADO,IDDESTINO) VALUES('CAMELLONES','DD0001',1,1);
INSERT INTO DESTINODESC (DESTINODES,CODDESTINODESC,ESTADO,IDDESTINO) VALUES('SILENCIO 0A','DD0002',1,2);
INSERT INTO DESTINODESC (DESTINODES,CODDESTINODESC,ESTADO,IDDESTINO) VALUES('SILENCIO 0B','DD0003',1,2);
INSERT INTO DESTINODESC (DESTINODES,CODDESTINODESC,ESTADO,IDDESTINO) VALUES('SILENCIO 1','DD0004',1,2);
INSERT INTO DESTINODESC (DESTINODES,CODDESTINODESC,ESTADO,IDDESTINO) VALUES('SILENCIO 2','DD0005',1,2);

INSERT INTO DESTINODESC (DESTINODES,CODDESTINODESC,ESTADO,IDDESTINO) VALUES('ANTENA','DD0006',1,3);

INSERT INTO DESTINODESC (DESTINODES,CODDESTINODESC,ESTADO,IDDESTINO) VALUES('LOMA','DD0007',1,4);

INSERT INTO DESTINODESC (DESTINODES,CODDESTINODESC,ESTADO,IDDESTINO) VALUES('HOYADA','DD0008',1,5);

INSERT INTO DESTINODESC (DESTINODES,CODDESTINODESC,ESTADO,IDDESTINO) VALUES('YANACOCHA 1','DD0009',1,6);
INSERT INTO DESTINODESC (DESTINODES,CODDESTINODESC,ESTADO,IDDESTINO) VALUES('YANACOCHA 2','DD0010',1,6);
INSERT INTO DESTINODESC (DESTINODES,CODDESTINODESC,ESTADO,IDDESTINO) VALUES('YANACOCHA 3','DD0011',1,6);
INSERT INTO DESTINODESC (DESTINODES,CODDESTINODESC,ESTADO,IDDESTINO) VALUES('YANACOCHA 4','DD0012',1,6);

INSERT INTO DESTINODESC (DESTINODES,CODDESTINODESC,ESTADO,IDDESTINO) VALUES('MINA','DD0013',1,7);

INSERT INTO DESTINODESC (DESTINODES,CODDESTINODESC,ESTADO,IDDESTINO) VALUES('QUEBRADA','DD0014',1,8);


INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('INSERTAR CAMPO','DB0000',1,1);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE A','DB0001',1,1);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE B','DB0002',1,1);

INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE A','DB0003',1,2);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE B','DB0004',1,2);

INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE A','DB0005',1,3);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE B','DB0006',1,3);

INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE A','DB0007',1,4);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE B','DB0008',1,4);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE C','DB0009',1,4);

INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE A','DB0010',1,5);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE B','DB0011',1,5);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE C','DB0012',1,5);

INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE A','DB0013',1,6);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE B','DB0014',1,6);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE C','DB0015',1,6);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE D','DB0016',1,6);

INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE A','DB0017',1,7);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE B','DB0018',1,7);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE C','DB0019',1,7);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE D','DB0020',1,7);

INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE A','DB0021',1,8);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE B','DB0022',1,8);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE C','DB0023',1,8);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE D','DB0024',1,8);

INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('YANACOCHA 1','DB0025',1,9);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('YANACOCHA 2','DB0026',1,10);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('YANACOCHA 3','DB0027',1,11);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('YANACOCHA 4','DB0028',1,12);

INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE A','DB0029',1,13);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE B','DB0030',1,13);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE C','DB0031',1,13);

INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE A','DB0032',1,14);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE B','DB0033',1,14);
INSERT INTO DESTINOBLOQ (DESTINOBLOQ, CODDESTINOBLOQ, ESTADO, IDDESTINODESC) VALUES('BLOQUE C','DB0034',1,14);

INSERT INTO TIPOPRODUCTO(TIPOPRODUCTO, CODTIPOPRODUCTO, ESTADO) VALUES('ALIMENTO PARA AVES','TP0001',1);

INSERT INTO CATEGORIAPROD(CATEGORIAPROD, CODCATEGORIA, ESTADO, IDTIPOPRODUCTO) VALUES ('POSTURA','CP0001',1,1);
INSERT INTO CATEGORIAPROD(CATEGORIAPROD, CODCATEGORIA, ESTADO, IDTIPOPRODUCTO) VALUES ('LEVANTE','CP0002',1,1);
INSERT INTO CATEGORIAPROD(CATEGORIAPROD, CODCATEGORIA, ESTADO, IDTIPOPRODUCTO) VALUES ('CABALLERIZO','CP0003',1,1);
INSERT INTO CATEGORIAPROD(CATEGORIAPROD, CODCATEGORIA, ESTADO, IDTIPOPRODUCTO) VALUES ('REPRODUCTORA','CP0004',1,1);
INSERT INTO CATEGORIAPROD(CATEGORIAPROD, CODCATEGORIA, ESTADO, IDTIPOPRODUCTO) VALUES ('ECOLOGICO','CP0005',1,1);



INSERT INTO PRODUCTO(PRODUCTO,CODPRODUCTO,ESTADO,IDCATEGORIAPROD,NOMBREGUIA) VALUES ('FASE 1','P00001',1,1,'ALIMENTO PARA POSTURA FASE 1');
INSERT INTO PRODUCTO(PRODUCTO,CODPRODUCTO,ESTADO,IDCATEGORIAPROD,NOMBREGUIA) VALUES ('FASE 2','P00002',1,1,'ALIMENTO PARA POSTURA FASE 2');
INSERT INTO PRODUCTO(PRODUCTO,CODPRODUCTO,ESTADO,IDCATEGORIAPROD,NOMBREGUIA) VALUES ('FASE 3','P00003',1,1,'ALIMENTO PARA POSTURA FASE 3');
INSERT INTO PRODUCTO(PRODUCTO,CODPRODUCTO,ESTADO,IDCATEGORIAPROD,NOMBREGUIA) VALUES ('FASE 4','P00004',1,1,'ALIMENTO PARA POSTURA FASE 4');
INSERT INTO PRODUCTO(PRODUCTO,CODPRODUCTO,ESTADO,IDCATEGORIAPROD,NOMBREGUIA) VALUES ('PRE PICO','P00005',1,1,'ALIMENTO PARA PRE PICO');
INSERT INTO PRODUCTO(PRODUCTO,CODPRODUCTO,ESTADO,IDCATEGORIAPROD,NOMBREGUIA) VALUES ('PRE POSTURA','P00006',1,1,'ALIMENTO PARA PRE POSTURA');
INSERT INTO PRODUCTO(PRODUCTO,CODPRODUCTO,ESTADO,IDCATEGORIAPROD,NOMBREGUIA) VALUES ('HUMANITARIO','P00007',1,1,'ALIMENTO PARA POSTURA FASE 1 PIGMENTANTE');

INSERT INTO DESCPROD(DESCPROD, CODDESCPROD,ESTADO, IDPRODUCTO) VALUES ('INSERTAR CAMPO','DP0000',1,1);
INSERT INTO DESCPROD(DESCPROD, CODDESCPROD,ESTADO, IDPRODUCTO) VALUES ('FASE 1','DP0001',1,1);
INSERT INTO DESCPROD(DESCPROD, CODDESCPROD,ESTADO, IDPRODUCTO) VALUES ('FASE 1 MEDICADO','DP0002',1,1);
INSERT INTO DESCPROD(DESCPROD, CODDESCPROD,ESTADO, IDPRODUCTO) VALUES ('FASE 2','DP0003',1,2);
INSERT INTO DESCPROD(DESCPROD, CODDESCPROD,ESTADO, IDPRODUCTO) VALUES ('FASE 2 MEDICADO','DP0004',1,2);
INSERT INTO DESCPROD(DESCPROD, CODDESCPROD,ESTADO, IDPRODUCTO) VALUES ('FASE 3','DP0005',1,3);
INSERT INTO DESCPROD(DESCPROD, CODDESCPROD,ESTADO, IDPRODUCTO) VALUES ('FASE 3 MEDICADO','DP0006',1,3);
INSERT INTO DESCPROD(DESCPROD, CODDESCPROD,ESTADO, IDPRODUCTO) VALUES ('FASE 4','DP0007',1,4);
INSERT INTO DESCPROD(DESCPROD, CODDESCPROD,ESTADO, IDPRODUCTO) VALUES ('PRE PICO','DP0008',1,5);
INSERT INTO DESCPROD(DESCPROD, CODDESCPROD,ESTADO, IDPRODUCTO) VALUES ('PRE PICO MEDICADO','DP0009',1,5);
INSERT INTO DESCPROD(DESCPROD, CODDESCPROD,ESTADO, IDPRODUCTO) VALUES ('PRE POSTURA','DP0010',1,6);
INSERT INTO DESCPROD(DESCPROD, CODDESCPROD,ESTADO, IDPRODUCTO) VALUES ('PRE POSTURA MEDICADO','DP0011',1,6);
INSERT INTO DESCPROD(DESCPROD, CODDESCPROD,ESTADO, IDPRODUCTO) VALUES ('HUMANITARIO','DP0012',1,7);


INSERT INTO CABECERAPEDIDO(IDDESTINODESC, ORDENENVIO,ESTADO) VALUES(1,2,1);
INSERT INTO CABECERAPEDIDO(IDDESTINODESC, ORDENENVIO,ESTADO) VALUES(2,2,1);
INSERT INTO CABECERAPEDIDO(IDDESTINODESC, ORDENENVIO,ESTADO) VALUES(3,2,1);
INSERT INTO CABECERAPEDIDO(IDDESTINODESC, ORDENENVIO,ESTADO) VALUES(4,2,1);
INSERT INTO CABECERAPEDIDO(IDDESTINODESC, ORDENENVIO,ESTADO) VALUES(5,2,1);
INSERT INTO CABECERAPEDIDO(IDDESTINODESC, ORDENENVIO,ESTADO) VALUES(6,2,1);
INSERT INTO CABECERAPEDIDO(IDDESTINODESC, ORDENENVIO,ESTADO) VALUES(7,2,1);
INSERT INTO CABECERAPEDIDO(IDDESTINODESC, ORDENENVIO,ESTADO) VALUES(8,2,1);
INSERT INTO CABECERAPEDIDO(IDDESTINODESC, ORDENENVIO,ESTADO) VALUES(9,2,1);
INSERT INTO CABECERAPEDIDO(IDDESTINODESC, ORDENENVIO,ESTADO) VALUES(10,2,1);
INSERT INTO CABECERAPEDIDO(IDDESTINODESC, ORDENENVIO,ESTADO) VALUES(11,2,1);
INSERT INTO CABECERAPEDIDO(IDDESTINODESC, ORDENENVIO,ESTADO) VALUES(12,2,1);
INSERT INTO CABECERAPEDIDO(IDDESTINODESC, ORDENENVIO,ESTADO) VALUES(13,2,1);
INSERT INTO CABECERAPEDIDO(IDDESTINODESC, ORDENENVIO,ESTADO) VALUES(14,2,1);



























