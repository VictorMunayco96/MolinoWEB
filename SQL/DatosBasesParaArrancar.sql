INSERT INTO `empleado` (`IdEmpleado`, `DNI`, `Codigo`, `NombreE`, `ApellidosE`, `Telefono`, `Celular`, `FechaIngreso`, `Estado`) VALUES (NULL, '70605597', 'asd', 'Victor Hugo', 'Munayco Morales', NULL, NULL, '2020-02-02', '1');
INSERT INTO `usuario` (`IdUsuario`, `Usuario`, `Contrasena`, `TipoUsuario`, `IdEmpleado`, `Estado`,Sector) VALUES (NULL, '4dm1n', '4dm1n', 'Panel', '1', '1','MOLINO 2');
Insert Into Permiso (Nombre, Estado) values ('Escritorio',1);
Insert Into Permiso (Nombre, Estado) values ('Almacen',1);
Insert Into Permiso (Nombre, Estado) values ('Producto',1);
Insert Into Permiso (Nombre, Estado) values ('Transporte',1);
Insert Into Permiso (Nombre, Estado) values ('Destino',1);
Insert Into Permiso (Nombre, Estado) values ('Personal',1);
Insert Into Permiso (Nombre, Estado) values ('Compras',1);
Insert Into Permiso (Nombre, Estado) values ('Ventas',1);
Insert Into Permiso (Nombre, Estado) values ('Acceso',1);
Insert Into Permiso (Nombre, Estado) values ('ConsulProd',1);
Insert Into Permiso (Nombre, Estado) values ('ConsulProd2',1);
INSERT INTO `usuariopermiso` (`idUsuarioPermiso`, `IdUsuario`, `IdPermiso`) VALUES (NULL, '1', '9');