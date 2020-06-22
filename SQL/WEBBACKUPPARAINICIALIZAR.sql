

CREATE TABLE `AlmacenEntrada` (
  `IdAlmacenEntrada` int(11) NOT NULL ,
  `IdDescProdEmpaque` int(11) NOT NULL,
  `Lote` varchar(65) DEFAULT NULL,
  `Cantidad` decimal(7,2) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Placa` varchar(9) DEFAULT NULL,
  `EstadoL` tinyint(4) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `CabeceraPedido` (
  `IdCabeceraPedido` int(11) NOT NULL ,
  `IdDestinoDesc` int(11) NOT NULL,
  `OrdenEnvio` int(11) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cabecerapedido`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaprod`
--

CREATE TABLE `CategoriaProd` (
  `IdCategoriaProd` int(11) NOT NULL ,
  `CategoriaProd` varchar(50) NOT NULL,
  `CodCategoria` varchar(15) DEFAULT NULL,
  `Estado` tinyint(4) NOT NULL,
  `IdTipoProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoriaprod`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `Conductor` (
  `IdConductor` int(11) NOT NULL ,
  `CodConduc` varchar(45) DEFAULT NULL,
  `DNI` int(11) DEFAULT NULL,
  `Licencia` varchar(15) DEFAULT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `Apellidos` varchar(60) DEFAULT NULL,
  `Nacionalidad` varchar(45) DEFAULT NULL,
  `TipoBrevete` varchar(45) DEFAULT NULL,
  `Condicion` varchar(45) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL,
  `Observacion` varchar(180) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `conductor`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductorvehiculo`
--

CREATE TABLE `ConductorVehiculo` (
  `IdConductorVehiculo` int(11) NOT NULL ,
  `Fecha` datetime DEFAULT NULL,
  `IdPlaca` int(11) NOT NULL,
  `IdConductor` int(11) NOT NULL,
  `Estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descprod`
--

CREATE TABLE `DescProd` (
  `IdDescProd` int(11) NOT NULL ,
  `DescProd` varchar(60) NOT NULL,
  `CodDescProd` varchar(60) DEFAULT NULL,
  `Estado` tinyint(4) NOT NULL,
  `IdProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `descprod`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descprodempaque`
--

CREATE TABLE `DescProdEmpaque` (
  `IdDescProdEmpaque` int(11) NOT NULL ,
  `IdDescProd` int(11) NOT NULL,
  `Presentacion` varchar(65) DEFAULT NULL,
  `Paquete` decimal(7,2) DEFAULT NULL,
  `Unidad` decimal(7,2) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `descprodempaque`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despacho`
--

CREATE TABLE `Despacho` (
  `IdDespacho` int(11) NOT NULL ,
  `Destino` varchar(45) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL,
  `IdPanel` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `NumSemana` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `Destino` (
  `IdDestino` int(11) NOT NULL ,
  `Destino` varchar(80) NOT NULL,
  `CodDestino` varchar(15) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL,
  `IdTipoDestino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `destino`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinobloq`
--

CREATE TABLE `DestinoBloq` (
  `IdDestinoBloq` int(11) NOT NULL ,
  `DestinoBloq` varchar(45) NOT NULL,
  `CodDestinoBloq` varchar(15) DEFAULT NULL,
  `Estado` tinyint(4) NOT NULL,
  `IdDestinoDesc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `destinobloq`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinodesc`
--

CREATE TABLE `DestinoDesc` (
  `IdDestinoDesc` int(11) NOT NULL ,
  `DestinoDes` varchar(80) NOT NULL,
  `CodDestinoDesc` varchar(15) DEFAULT NULL,
  `Estado` tinyint(4) NOT NULL,
  `IdDestino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `destinodesc`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledespacho`
--

CREATE TABLE `DetalleDespacho` (
  `IdDetalleDespacho` int(11) NOT NULL ,
  `IdDespacho` int(11) NOT NULL,
  `IdPeso` int(11) NOT NULL,
  `IdGalpon` int(11) NOT NULL,
  `IdDescProd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `Empleado` (
  `IdEmpleado` int(11) NOT NULL ,
  `DNI` int(11) NOT NULL,
  `Codigo` varchar(15) NOT NULL,
  `NombreE` varchar(70) DEFAULT NULL,
  `ApellidosE` varchar(70) DEFAULT NULL,
  `Telefono` varchar(12) DEFAULT NULL,
  `Celular` varchar(12) DEFAULT NULL,
  `FechaIngreso` date DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empretrans`
--

CREATE TABLE `EmpreTrans` (
  `IdEmpreTrans` int(11) NOT NULL ,
  `Ruc` bigint(20) NOT NULL,
  `RazonSocial` varchar(80) NOT NULL,
  `Domicilio` varchar(130) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `NumCel` varchar(15) DEFAULT NULL,
  `Condicion` varchar(45) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL,
  `Observ` varchar(180) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empretrans`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradaysalidavehiculo`
--

CREATE TABLE `EntradaySalidaVehiculo` (
  `IdEntradaySalidaVehiculo` int(11) NOT NULL ,
  `EstadoVehi` tinyint(4) DEFAULT NULL,
  `FechaMov` datetime DEFAULT NULL,
  `IdConductorVehiculo` int(11) NOT NULL,
  `EstadoRegistro` tinyint(4) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoplanta`
--

CREATE TABLE `EstadoPlanta` (
  `IdEstadoPlanta` int(11) NOT NULL ,
  `EstadoPlanta` varchar(45) DEFAULT NULL,
  `Tema` varchar(60) DEFAULT NULL,
  `Detalle` varchar(120) DEFAULT NULL,
  `HoraInicio` datetime DEFAULT NULL,
  `HoraFin` datetime DEFAULT NULL,
  `EstadoP` tinyint(4) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL,
  `NumSemana` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estadoplanta`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galpon`
--

CREATE TABLE `Galpon` (
  `IdGalpon` int(11) NOT NULL ,
  `Galpon` varchar(45) NOT NULL,
  `CodGalpon` varchar(45) DEFAULT NULL,
  `Estado` tinyint(4) NOT NULL,
  `IdDestinoBloq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia`
--

CREATE TABLE `Guia` (
  `IdGuia` int(11) NOT NULL ,
  `NumGuia` int(11) DEFAULT NULL,
  `FechaGuia` int(11) DEFAULT NULL,
  `PesoGE` int(11) DEFAULT NULL,
  `PesoGS` int(11) DEFAULT NULL,
  `NetoG` int(11) DEFAULT NULL,
  `Observ` varchar(100) DEFAULT NULL,
  `IdProveClien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guiacalera`
--

CREATE TABLE `GuiaCalera` (
  `IdGuiaCalera` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `panel`
--

CREATE TABLE `Panel` (
  `IdPanel` int(11) NOT NULL ,
  `IdPedido` int(11) NOT NULL,
  `CodProduccion` int(11) DEFAULT NULL,
  `NumSilo` varchar(3) DEFAULT NULL,
  `CantidadBatch` int(11) DEFAULT NULL,
  `PesoPanel` int(11) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Estado` tinyint(4) DEFAULT NULL,
  `NumSemana` int(11) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `panel`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `Pedido` (
  `IdPedido` int(11) NOT NULL ,
  `CantidadBatch` int(11) DEFAULT NULL,
  `Observacion` varchar(120) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `CantidadKG` varchar(45) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL,
  `NumSemana` int(11) DEFAULT NULL,
  `EstadoP` int(11) DEFAULT NULL,
  `IdPedidoSemanal` int(11) NOT NULL,
  `TipoTransporte` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--


--
-- Estructura de tabla para la tabla `pedidosemanal`
--

CREATE TABLE `PedidoSemanal` (
  `IdPedidoSemanal` int(11) NOT NULL ,
  `IdCabeceraPedido` int(11) NOT NULL,
  `IdDescProd` int(11) NOT NULL,
  `CantidadBatch` int(11) DEFAULT NULL,
  `CantidadKG` int(11) DEFAULT NULL,
  `NumSemana` int(11) DEFAULT NULL,
  `Observacion` varchar(120) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL,
  `EstadoPS` tinyint(4) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `IdDestinoBloq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE `Permiso` (
  `IdPermiso` int(11) NOT NULL ,
  `Nombre` varchar(45) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peso`
--

CREATE TABLE `Peso` (
  `IdPeso` int(11) NOT NULL ,
  `TipoMovimiento` varchar(45) DEFAULT NULL,
  `NumGuia` int(11) DEFAULT NULL,
  `FechaHoraSal` datetime DEFAULT NULL,
  `FechaHoraEnt` datetime DEFAULT NULL,
  `PesoCE` int(11) DEFAULT NULL,
  `PesoCS` int(11) DEFAULT NULL,
  `NetoC` int(11) DEFAULT NULL,
  `ObservE` varchar(100) DEFAULT NULL,
  `ObservS` varchar(100) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdProveClien` int(11) NOT NULL,
  `Precinto` int(11) DEFAULT NULL,
  `IdConductorVehiculo` int(11) NOT NULL,
  `IdDestinoBloq` int(11) NOT NULL,
  `IdDescProd` int(11) NOT NULL,
  `NumSemana` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `peso`
--


--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `Precio` (
  `IdPrecio` int(11) NOT NULL ,
  `Precio` decimal(7,2) DEFAULT NULL,
  `NumSemana` int(11) DEFAULT NULL,
  `IdDescProd` int(11) NOT NULL,
  `Estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `precio`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `Producto` (
  `IdProducto` int(11) NOT NULL ,
  `Producto` varchar(60) NOT NULL,
  `CodProducto` varchar(60) DEFAULT NULL,
  `Estado` tinyint(4) NOT NULL,
  `IdCategoriaProd` int(11) NOT NULL,
  `NombreGuia` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveclien`
--

CREATE TABLE `ProveClien` (
  `IdProveClien` int(11) NOT NULL ,
  `RazonSocial` varchar(45) DEFAULT NULL,
  `Ruc` bigint(20) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveclien`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodestino`
--

CREATE TABLE `TipoDestino` (
  `IdTipoDestino` int(11) NOT NULL ,
  `TipoDestino` varchar(50) NOT NULL,
  `CodDestino` varchar(15) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipodestino`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE `TipoProducto` (
  `IdTipoProducto` int(11) NOT NULL ,
  `TipoProducto` varchar(50) NOT NULL,
  `CodTipoProducto` varchar(15) DEFAULT NULL,
  `Estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoproducto`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traslado`
--

CREATE TABLE `Traslado` (
  `IdTraslado` int(11) NOT NULL ,
  `IdAlmacenEntrada` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Area` varchar(45) DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `EstadoP` tinyint(4) DEFAULT NULL,
  `FechaP` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `Usuario` (
  `IdUsuario` int(11) NOT NULL ,
  `Usuario` varchar(45) DEFAULT NULL,
  `Contrasena` varchar(45) DEFAULT NULL,
  `TipoUsuario` varchar(45) DEFAULT NULL,
  `IdEmpleado` int(11) NOT NULL,
  `Estado` tinyint(4) DEFAULT NULL,
  `Sector` varchar(60) NOT NULL,
  `Area` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariopermiso`
--

CREATE TABLE `UsuarioPermiso` (
  `idUsuarioPermiso` int(11) NOT NULL ,
  `IdUsuario` int(11) NOT NULL,
  `IdPermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuariopermiso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variaciones`
--

CREATE TABLE `Variaciones` (
  `IdVariaciones` int(11) NOT NULL ,
  `IdPedidoSemanal` int(11) NOT NULL,
  `CantidadBatch` int(11) DEFAULT NULL,
  `Motivo` varchar(65) DEFAULT NULL,
  `Detalle` varchar(120) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL,
  `EstadoVA` tinyint(4) DEFAULT NULL,
  `Estado` tinyint(4) DEFAULT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `Vehiculo` (
  `IdPlaca` int(11) NOT NULL ,
  `Placa` varchar(8) NOT NULL,
  `Marca` varchar(45) DEFAULT NULL,
  `Compartimientos` tinyint(4) DEFAULT NULL,
  `IdEmpreTrans` int(11) NOT NULL,
  `Estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculo`
--

--

--
-- Indices de la tabla `almacenentrada`
--
ALTER TABLE `AlmacenEntrada`
  ADD PRIMARY KEY (`IdAlmacenEntrada`),
  ADD UNIQUE KEY `Lote_UNIQUE` (`Lote`),
  ADD KEY `fk_Almacen_DescProdEmpaque1_idx` (`IdDescProdEmpaque`),
  ADD KEY `fk_AlmacenEntrada_Usuario1_idx` (`IdUsuario`);

--
-- Indices de la tabla `cabecerapedido`
--
ALTER TABLE `CabeceraPedido`
  ADD PRIMARY KEY (`IdCabeceraPedido`),
  ADD KEY `fk_CabeceraPedido_DestinoDesc1_idx` (`IdDestinoDesc`);

--
-- Indices de la tabla `categoriaprod`
--
ALTER TABLE `CategoriaProd`
  ADD PRIMARY KEY (`IdCategoriaProd`),
  ADD UNIQUE KEY `CodCategoria_UNIQUE` (`CodCategoria`),
  ADD KEY `fk_CategoriaProd_TipoProducto1_idx` (`IdTipoProducto`);

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `Conductor`
  ADD PRIMARY KEY (`IdConductor`),
  ADD UNIQUE KEY `NumDoc_UNIQUE` (`Licencia`);

--
-- Indices de la tabla `conductorvehiculo`
--
ALTER TABLE `ConductorVehiculo`
  ADD PRIMARY KEY (`IdConductorVehiculo`),
  ADD KEY `fk_ConductorVehiculo_Conductor1_idx` (`IdConductor`),
  ADD KEY `fk_ConductorVehiculo_Vehiculo1_idx` (`IdPlaca`);

--
-- Indices de la tabla `descprod`
--
ALTER TABLE `DescProd`
  ADD PRIMARY KEY (`IdDescProd`),
  ADD UNIQUE KEY `CodDescProd_UNIQUE` (`CodDescProd`),
  ADD KEY `fk_DescProd_Producto1_idx` (`IdProducto`);

--
-- Indices de la tabla `descprodempaque`
--
ALTER TABLE `DescProdEmpaque`
  ADD PRIMARY KEY (`IdDescProdEmpaque`),
  ADD KEY `fk_DescProdEmpaque_DescProd1_idx` (`IdDescProd`);

--
-- Indices de la tabla `despacho`
--
ALTER TABLE `Despacho`
  ADD PRIMARY KEY (`IdDespacho`),
  ADD KEY `fk_Despacho_Panel1_idx` (`IdPanel`),
  ADD KEY `fk_Despacho_Usuario1_idx` (`IdUsuario`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `Destino`
  ADD PRIMARY KEY (`IdDestino`),
  ADD UNIQUE KEY `CodDestino_UNIQUE` (`CodDestino`),
  ADD KEY `fk_Destino_TipoDestino1_idx` (`IdTipoDestino`);

--
-- Indices de la tabla `destinobloq`
--
ALTER TABLE `DestinoBloq`
  ADD PRIMARY KEY (`IdDestinoBloq`),
  ADD KEY `fk_DestinoBloq_DestinoDesc1_idx` (`IdDestinoDesc`);

--
-- Indices de la tabla `destinodesc`
--
ALTER TABLE `DestinoDesc`
  ADD PRIMARY KEY (`IdDestinoDesc`),
  ADD UNIQUE KEY `CodDestinoDesc_UNIQUE` (`CodDestinoDesc`),
  ADD KEY `fk_DestinoDesc_Destino1_idx` (`IdDestino`);

--
-- Indices de la tabla `detalledespacho`
--
ALTER TABLE `DetalleDespacho`
  ADD PRIMARY KEY (`IdDetalleDespacho`),
  ADD KEY `fk_DetalleDespacho_Despacho1_idx` (`IdDespacho`),
  ADD KEY `fk_DetalleDespacho_Peso1_idx` (`IdPeso`),
  ADD KEY `fk_DetalleDespacho_Galpon1_idx` (`IdGalpon`),
  ADD KEY `fk_DetalleDespacho_DescProd1_idx` (`IdDescProd`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `Empleado`
  ADD PRIMARY KEY (`IdEmpleado`),
  ADD UNIQUE KEY `DNI_UNIQUE` (`DNI`),
  ADD UNIQUE KEY `Codigo_UNIQUE` (`Codigo`);

--
-- Indices de la tabla `empretrans`
--
ALTER TABLE `EmpreTrans`
  ADD PRIMARY KEY (`IdEmpreTrans`),
  ADD UNIQUE KEY `Ruc_UNIQUE` (`Ruc`);

--
-- Indices de la tabla `entradaysalidavehiculo`
--
ALTER TABLE `EntradaySalidaVehiculo`
  ADD PRIMARY KEY (`IdEntradaySalidaVehiculo`),
  ADD KEY `fk_EntradaySalidaVehiculo_ConductorVehiculo1_idx` (`IdConductorVehiculo`),
  ADD KEY `fk_EntradaySalidaVehiculo_Usuario1_idx` (`IdUsuario`);

--
-- Indices de la tabla `estadoplanta`
--
ALTER TABLE `EstadoPlanta`
  ADD PRIMARY KEY (`IdEstadoPlanta`),
  ADD KEY `fk_EstadoPlanta_Usuario1_idx` (`IdUsuario`);

--
-- Indices de la tabla `galpon`
--
ALTER TABLE `Galpon`
  ADD PRIMARY KEY (`IdGalpon`),
  ADD KEY `fk_Galpon_DestinoBloq1_idx` (`IdDestinoBloq`);

--
-- Indices de la tabla `guia`
--
ALTER TABLE `Guia`
  ADD PRIMARY KEY (`IdGuia`),
  ADD KEY `fk_Guia_ProveClien1_idx` (`IdProveClien`);

--
-- Indices de la tabla `guiacalera`
--
ALTER TABLE `GuiaCalera`
  ADD PRIMARY KEY (`IdGuiaCalera`);

--
-- Indices de la tabla `panel`
--
ALTER TABLE `Panel`
  ADD PRIMARY KEY (`IdPanel`),
  ADD UNIQUE KEY `CodProduccion_UNIQUE` (`CodProduccion`),
  ADD KEY `fk_Panel_Usuario1_idx` (`IdUsuario`),
  ADD KEY `fk_Panel_Pedido1_idx` (`IdPedido`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `Pedido`
  ADD PRIMARY KEY (`IdPedido`),
  ADD KEY `fk_Pedido_Usuario1_idx` (`IdUsuario`),
  ADD KEY `fk_Pedido_PedidoSemanal1_idx` (`IdPedidoSemanal`);

--
-- Indices de la tabla `pedidosemanal`
--
ALTER TABLE `PedidoSemanal`
  ADD PRIMARY KEY (`IdPedidoSemanal`),
  ADD KEY `fk_PedidoSemanal_DescProd1_idx` (`IdDescProd`),
  ADD KEY `fk_PedidoSemanal_CabeceraPedido1_idx` (`IdCabeceraPedido`),
  ADD KEY `fk_PedidoSemanal_Usuario1_idx` (`IdUsuario`),
  ADD KEY `fk_PedidoSemanal_DestinoBloq1_idx` (`IdDestinoBloq`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `Permiso`
  ADD PRIMARY KEY (`IdPermiso`);

--
-- Indices de la tabla `peso`
--
ALTER TABLE `Peso`
  ADD PRIMARY KEY (`IdPeso`),
  ADD KEY `fk_Peso_Usuario1_idx` (`IdUsuario`),
  ADD KEY `fk_Peso_ProveClien1_idx` (`IdProveClien`),
  ADD KEY `fk_Peso_ConductorVehiculo1_idx` (`IdConductorVehiculo`),
  ADD KEY `fk_Peso_DestinoBloq1_idx` (`IdDestinoBloq`),
  ADD KEY `fk_Peso_DescProd1_idx` (`IdDescProd`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `Precio`
  ADD PRIMARY KEY (`IdPrecio`),
  ADD KEY `fk_Precio_DescProd1_idx` (`IdDescProd`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `Producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD UNIQUE KEY `CodProducto_UNIQUE` (`CodProducto`),
  ADD KEY `fk_Producto_CategoriaProd1_idx` (`IdCategoriaProd`);

--
-- Indices de la tabla `proveclien`
--
ALTER TABLE `ProveClien`
  ADD PRIMARY KEY (`IdProveClien`),
  ADD UNIQUE KEY `Ruc_UNIQUE` (`Ruc`);

--
-- Indices de la tabla `tipodestino`
--
ALTER TABLE `TipoDestino`
  ADD PRIMARY KEY (`IdTipoDestino`),
  ADD UNIQUE KEY `CodDestino_UNIQUE` (`CodDestino`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `TipoProducto`
  ADD PRIMARY KEY (`IdTipoProducto`),
  ADD UNIQUE KEY `CodTipoProducto_UNIQUE` (`CodTipoProducto`);

--
-- Indices de la tabla `traslado`
--
ALTER TABLE `Traslado`
  ADD PRIMARY KEY (`IdTraslado`),
  ADD KEY `fk_SalidaAlmacen_Almacen1_idx` (`IdAlmacenEntrada`),
  ADD KEY `fk_SalidaAlmacen_Usuario1_idx` (`IdUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `fk_Usuario_Empleado1_idx` (`IdEmpleado`);

--
-- Indices de la tabla `usuariopermiso`
--
ALTER TABLE `UsuarioPermiso`
  ADD PRIMARY KEY (`idUsuarioPermiso`),
  ADD KEY `fk_UsuarioPermiso_Usuario1_idx` (`IdUsuario`),
  ADD KEY `fk_UsuarioPermiso_Permiso1_idx` (`IdPermiso`);

--
-- Indices de la tabla `variaciones`
--
ALTER TABLE `Variaciones`
  ADD PRIMARY KEY (`IdVariaciones`),
  ADD KEY `fk_Variaciones_PedidoSemanal1_idx` (`IdPedidoSemanal`),
  ADD KEY `fk_Variaciones_Usuario1_idx` (`IdUsuario`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `Vehiculo`
  ADD PRIMARY KEY (`IdPlaca`),
  ADD UNIQUE KEY `Placa_UNIQUE` (`Placa`),
  ADD KEY `fk_Vehiculo_EmpreTrans1_idx` (`IdEmpreTrans`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

/*FDFDSFDS*/

ALTER TABLE `AlmacenEntrada`
  MODIFY `IdAlmacenEntrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cabecerapedido`
--
ALTER TABLE `CabeceraPedido`
  MODIFY `IdCabeceraPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoriaprod`
--
ALTER TABLE `CategoriaProd`
  MODIFY `IdCategoriaProd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `Conductor`
  MODIFY `IdConductor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `conductorvehiculo`
--
ALTER TABLE `ConductorVehiculo`
  MODIFY `IdConductorVehiculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `descprod`
--
ALTER TABLE `DescProd`
  MODIFY `IdDescProd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `descprodempaque`
--
ALTER TABLE `DescProdEmpaque`
  MODIFY `IdDescProdEmpaque` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `despacho`
--
ALTER TABLE `Despacho`
  MODIFY `IdDespacho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `Destino`
  MODIFY `IdDestino` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `destinobloq`
--
ALTER TABLE `DestinoBloq`
  MODIFY `IdDestinoBloq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `destinodesc`
--
ALTER TABLE `DestinoDesc`
  MODIFY `IdDestinoDesc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalledespacho`
--
ALTER TABLE `DetalleDespacho`
  MODIFY `IdDetalleDespacho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `Empleado`
  MODIFY `IdEmpleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empretrans`
--
ALTER TABLE `EmpreTrans`
  MODIFY `IdEmpreTrans` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entradaysalidavehiculo`
--
ALTER TABLE `EntradaySalidaVehiculo`
  MODIFY `IdEntradaySalidaVehiculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadoplanta`
--
ALTER TABLE `EstadoPlanta`
  MODIFY `IdEstadoPlanta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galpon`
--
ALTER TABLE `Galpon`
  MODIFY `IdGalpon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guia`
--
ALTER TABLE `Guia`
  MODIFY `IdGuia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guiacalera`
--
ALTER TABLE `GuiaCalera`
  MODIFY `IdGuiaCalera` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `panel`
--
ALTER TABLE `Panel`
  MODIFY `IdPanel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `Pedido`
  MODIFY `IdPedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidosemanal`
--
ALTER TABLE `PedidoSemanal`
  MODIFY `IdPedidoSemanal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `Permiso`
  MODIFY `IdPermiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `peso`
--
ALTER TABLE `Peso`
  MODIFY `IdPeso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `Precio`
  MODIFY `IdPrecio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `Producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveclien`
--
ALTER TABLE `ProveClien`
  MODIFY `IdProveClien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipodestino`
--
ALTER TABLE `TipoDestino`
  MODIFY `IdTipoDestino` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoproducto`
--
ALTER TABLE `TipoProducto`
  MODIFY `IdTipoProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `traslado`
--
ALTER TABLE `Traslado`
  MODIFY `IdTraslado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `Usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuariopermiso`
--
ALTER TABLE `UsuarioPermiso`
  MODIFY `idUsuarioPermiso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `Vehiculo`
  MODIFY `IdPlaca` int(11) NOT NULL AUTO_INCREMENT;

--
-- Filtros para la tabla `almacenentrada`
--
ALTER TABLE `AlmacenEntrada`
  ADD CONSTRAINT `fk_AlmacenEntrada_Usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Almacen_DescProdEmpaque1` FOREIGN KEY (`IdDescProdEmpaque`) REFERENCES `DescProdEmpaque` (`IdDescProdEmpaque`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cabecerapedido`
--
ALTER TABLE `CabeceraPedido`
  ADD CONSTRAINT `fk_CabeceraPedido_DestinoDesc1` FOREIGN KEY (`IdDestinoDesc`) REFERENCES `DestinoDesc` (`IdDestinoDesc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `categoriaprod`
--
ALTER TABLE `CategoriaProd`
  ADD CONSTRAINT `fk_CategoriaProd_TipoProducto1` FOREIGN KEY (`IdTipoProducto`) REFERENCES `TipoProducto` (`IdTipoProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `conductorvehiculo`
--
ALTER TABLE `ConductorVehiculo`
  ADD CONSTRAINT `fk_ConductorVehiculo_Conductor1` FOREIGN KEY (`IdConductor`) REFERENCES `Conductor` (`IdConductor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ConductorVehiculo_Vehiculo1` FOREIGN KEY (`IdPlaca`) REFERENCES `Vehiculo` (`IdPlaca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `descprod`
--
ALTER TABLE `DescProd`
  ADD CONSTRAINT `fk_DescProd_Producto1` FOREIGN KEY (`IdProducto`) REFERENCES `Producto` (`IdProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `descprodempaque`
--
ALTER TABLE `DescProdEmpaque`
  ADD CONSTRAINT `fk_DescProdEmpaque_DescProd1` FOREIGN KEY (`IdDescProd`) REFERENCES `DescProd` (`IdDescProd`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `despacho`
--
ALTER TABLE `Despacho`
  ADD CONSTRAINT `fk_Despacho_Panel1` FOREIGN KEY (`IdPanel`) REFERENCES `Panel` (`IdPanel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Despacho_Usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `destino`
--
ALTER TABLE `Destino`
  ADD CONSTRAINT `fk_Destino_TipoDestino1` FOREIGN KEY (`IdTipoDestino`) REFERENCES `TipoDestino` (`IdTipoDestino`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `destinobloq`
--
ALTER TABLE `DestinoBloq`
  ADD CONSTRAINT `fk_DestinoBloq_DestinoDesc1` FOREIGN KEY (`IdDestinoDesc`) REFERENCES `DestinoDesc` (`IdDestinoDesc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `destinodesc`
--
ALTER TABLE `DestinoDesc`
  ADD CONSTRAINT `fk_DestinoDesc_Destino1` FOREIGN KEY (`IdDestino`) REFERENCES `Destino` (`IdDestino`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalledespacho`
--
ALTER TABLE `DetalleDespacho`
  ADD CONSTRAINT `fk_DetalleDespacho_DescProd1` FOREIGN KEY (`IdDescProd`) REFERENCES `DescProd` (`IdDescProd`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetalleDespacho_Despacho1` FOREIGN KEY (`IdDespacho`) REFERENCES `Despacho` (`IdDespacho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetalleDespacho_Galpon1` FOREIGN KEY (`IdGalpon`) REFERENCES `Galpon` (`IdGalpon`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DetalleDespacho_Peso1` FOREIGN KEY (`IdPeso`) REFERENCES `Peso` (`IdPeso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `entradaysalidavehiculo`
--
ALTER TABLE `EntradaySalidaVehiculo`
  ADD CONSTRAINT `fk_EntradaySalidaVehiculo_ConductorVehiculo1` FOREIGN KEY (`IdConductorVehiculo`) REFERENCES `ConductorVehiculo` (`IdConductorVehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_EntradaySalidaVehiculo_Usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estadoplanta`
--
ALTER TABLE `EstadoPlanta`
  ADD CONSTRAINT `fk_EstadoPlanta_Usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `galpon`
--
ALTER TABLE `Galpon`
  ADD CONSTRAINT `fk_Galpon_DestinoBloq1` FOREIGN KEY (`IdDestinoBloq`) REFERENCES `DestinoBloq` (`IdDestinoBloq`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `guia`
--
ALTER TABLE `Guia`
  ADD CONSTRAINT `fk_Guia_ProveClien1` FOREIGN KEY (`IdProveClien`) REFERENCES `ProveClien` (`IdProveClien`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `panel`
--
ALTER TABLE `Panel`
  ADD CONSTRAINT `fk_Panel_Pedido1` FOREIGN KEY (`IdPedido`) REFERENCES `Pedido` (`IdPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Panel_Usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `Pedido`
  ADD CONSTRAINT `fk_Pedido_PedidoSemanal1` FOREIGN KEY (`IdPedidoSemanal`) REFERENCES `PedidoSemanal` (`IdPedidoSemanal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pedido_Usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidosemanal`
--
ALTER TABLE `PedidoSemanal`
  ADD CONSTRAINT `fk_PedidoSemanal_CabeceraPedido1` FOREIGN KEY (`IdCabeceraPedido`) REFERENCES `CabeceraPedido` (`IdCabeceraPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PedidoSemanal_DescProd1` FOREIGN KEY (`IdDescProd`) REFERENCES `DescProd` (`IdDescProd`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PedidoSemanal_DestinoBloq1` FOREIGN KEY (`IdDestinoBloq`) REFERENCES `DestinoBloq` (`IdDestinoBloq`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PedidoSemanal_Usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `peso`
--
ALTER TABLE `Peso`
  ADD CONSTRAINT `fk_Peso_ConductorVehiculo1` FOREIGN KEY (`IdConductorVehiculo`) REFERENCES `ConductorVehiculo` (`IdConductorVehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Peso_DescProd1` FOREIGN KEY (`IdDescProd`) REFERENCES `DescProd` (`IdDescProd`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Peso_DestinoBloq1` FOREIGN KEY (`IdDestinoBloq`) REFERENCES `DestinoBloq` (`IdDestinoBloq`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Peso_ProveClien1` FOREIGN KEY (`IdProveClien`) REFERENCES `ProveClien` (`IdProveClien`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Peso_Usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `precio`
--
ALTER TABLE `Precio`
  ADD CONSTRAINT `fk_Precio_DescProd1` FOREIGN KEY (`IdDescProd`) REFERENCES `DescProd` (`IdDescProd`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `Producto`
  ADD CONSTRAINT `fk_Producto_CategoriaProd1` FOREIGN KEY (`IdCategoriaProd`) REFERENCES `CategoriaProd` (`IdCategoriaProd`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `traslado`
--
ALTER TABLE `Traslado`
  ADD CONSTRAINT `fk_SalidaAlmacen_Almacen1` FOREIGN KEY (`IdAlmacenEntrada`) REFERENCES `AlmacenEntrada` (`IdAlmacenEntrada`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SalidaAlmacen_Usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `fk_Usuario_Empleado1` FOREIGN KEY (`IdEmpleado`) REFERENCES `Empleado` (`IdEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuariopermiso`
--
ALTER TABLE `UsuarioPermiso`
  ADD CONSTRAINT `fk_UsuarioPermiso_Permiso1` FOREIGN KEY (`IdPermiso`) REFERENCES `Permiso` (`IdPermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_UsuarioPermiso_Usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `variaciones`
--
ALTER TABLE `Variaciones`
  ADD CONSTRAINT `fk_Variaciones_PedidoSemanal1` FOREIGN KEY (`IdPedidoSemanal`) REFERENCES `PedidoSemanal` (`IdPedidoSemanal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Variaciones_Usuario1` FOREIGN KEY (`IdUsuario`) REFERENCES `Usuario` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `Vehiculo`
  ADD CONSTRAINT `fk_Vehiculo_EmpreTrans1` FOREIGN KEY (`IdEmpreTrans`) REFERENCES `EmpreTrans` (`IdEmpreTrans`) ON DELETE NO ACTION ON UPDATE NO ACTION;


INSERT INTO `Empleado` (`IdEmpleado`, `DNI`, `Codigo`, `NombreE`, `ApellidosE`, `Telefono`, `Celular`, `FechaIngreso`, `Estado`) VALUES
(1, 70605597, '70605597', 'VICTOR HUGO', 'MUNAYCO MORALES', '', '', '2020-02-02', 1),
(2, 43469422, 'E0001', 'GIOMAR', 'RAMOS', '', '', '2020-04-20', 1),
(3, 21817769, '21817769', 'JAIME VIDAL', 'HUAHUATICO CHARCA', '', '', '2020-04-28', 1),
(4, 6666666, '6666666', 'EZEQUIEL', 'BLANCO', '976451234', '', '2020-04-29', 1),
(5, 21875745, '21875745', 'ALFONSO HUMBERTO', 'ABURTO CASTELLANO', '', '', '2020-04-29', 1),
(6, 45654878, '45654878', 'ROSALINDA', 'DEL PINO BRAVO', '', '', '2020-05-05', 1);
  
INSERT INTO `Usuario` (`IdUsuario`, `Usuario`, `Contrasena`, `TipoUsuario`, `IdEmpleado`, `Estado`, `Sector`, `Area`) VALUES
(1, '4DM1N', '4DM1N', 'ADMINISTRADOR', 1, 1, 'MOLINO-2', NULL),
(2, 'GIOMAR', '0687', 'ADMINISTRADOR', 2, 1, 'MOLINO-2', NULL),
(3, 'JAIME', '1234J', 'ADMINISTRADOR', 3, 1, 'MOLINO-2', NULL),
(4, 'CHEQUE', '1234C', 'ADMINISTRADOR', 4, 1, 'MOLINO-2', NULL),
(5, 'ALFONSO', 'MOCI', 'ADMINISTRADOR', 5, 1, 'MOLINO-2', NULL),
(6, 'ROSA', '1234R', 'ADMINISTRADOR', 6, 1, 'MOLINO-2', NULL);

INSERT INTO `Permiso` (`IdPermiso`, `Nombre`, `Estado`) VALUES
(1, 'Escritorio', 1),
(2, 'Almacen', 1),
(3, 'Producto', 1),
(4, 'Transporte', 1),
(5, 'Destino', 1),
(6, 'Personal', 1),
(7, 'Compras', 1),
(8, 'Ventas', 1),
(9, 'Acceso', 1),
(10, 'ConsulProd', 1),
(11, 'ConsulProd2', 1);



INSERT INTO `UsuarioPermiso` (`idUsuarioPermiso`, `IdUsuario`, `IdPermiso`) VALUES
(14, 1, 1),
(15, 1, 2),
(16, 1, 3),
(17, 1, 4),
(18, 1, 5),
(19, 1, 6),
(20, 1, 7),
(21, 1, 8),
(22, 1, 9),
(23, 1, 10),
(24, 1, 11),
(25, 2, 8),
(30, 3, 4),
(31, 3, 10),
(32, 4, 4),
(33, 4, 10),
(34, 5, 4),
(35, 5, 10),
(36, 6, 10);


INSERT INTO `EmpreTrans` (`IdEmpreTrans`, `Ruc`, `RazonSocial`, `Domicilio`, `Correo`, `NumCel`, `Condicion`, `Estado`, `Observ`) VALUES
(1, 20452614767, 'LA CALERA SAC', 'FUNDO LA CALERA S/N', '', '', 'AUTORIZADO', 1, '');



INSERT INTO `Conductor` (`IdConductor`, `CodConduc`, `DNI`, `Licencia`, `Nombre`, `Apellidos`, `Nacionalidad`, `TipoBrevete`, `Condicion`, `Estado`, `Observacion`) VALUES
(1, 'C00001', 21875745, 'F21875745', 'ALFONSO HUMBERTO', 'ABURTO CASTELLANO', 'PERUANO', 'B-IIB', 'AUTORIZADO', 1, ''),
(2, 'C00002', 44176870, 'F44176870', 'ALFREDO', 'PACHAS CARRILLO', 'PERUANO', 'B-IIB', 'AUTORIZADO', 1, ''),
(3, 'C00003', 70314326, 'F70314326', 'ERICK ALEXANDER', 'BISSO TASAYCO', 'PERUANO', 'B-IIB', 'AUTORIZADO', 1, ''),
(4, 'C00004', 73892872, 'F73892872', 'CRISTIAN', 'TORRES', 'PERUANO', 'B-IIB', 'AUTORIZADO', 1, ''),
(5, 'F47198511', 47198511, 'F47198511', 'DIEGO ARMANDO', 'ORTIZ CASTELLANO', 'PERUANO', 'B-IIB', 'AUTORIZADO', 1, ''),
(6, 'F70145050', 70145050, 'F70145050', 'DIEGO AMADO', 'HERRERA RAMOS', 'PERUANO', 'B-IIC', 'AUTORIZADO', 1, ''),
(7, 'C00006', 41717120, 'F41717120', 'EDDY', 'HURTADO QUINCHO', 'PERUANO', 'B-IIC', 'AUTORIZADO', 1, ''),
(8, 'C00007', 21828350, 'F21828350', 'LEONARDO JULIAN', 'MORAN RODRIGUEZ', 'PERUANO', 'B-IIC', 'AUTORIZADO', 1, ''),
(9, 'F46308187', 46308187, 'F46308187', 'LUCIANO', 'SONCCO MEZA', 'PERUANO', 'A-IIIC', 'AUTORIZADO', 1, ''),
(10, 'F46944615', 46944615, 'F46944615', 'LUIS ALBERTO', 'LEVANO ABURTO', 'PERUANO', 'A-IIIC', 'AUTORIZADO', 1, ''),
(11, 'F41738804', 41738804, 'F41738804', 'JOSE LUIS', 'LURITA PALOMINO', 'PERUANO', 'A-IIIC', 'AUTORIZADO', 1, ''),
(12, 'F21817610', 21817610, 'F21817610', 'JUAN JESUS', 'MAGALLANES MAGALLANES', 'PERUANO', 'A-IIIC', 'AUTORIZADO', 1, ''),
(13, 'F61300528', 613005528, 'F61300528', 'JHON HENRRY', 'MELGAREJO CORREA', 'PERUANO', 'A-IIIB', 'AUTORIZADO', 1, ''),
(14, 'F41414428', 41414428, 'F41414428', 'LUCIO', 'MENDOZA LOAYZA', 'PERUANO', 'A-IIIB', 'AUTORIZADO', 1, ''),
(15, 'F21817682', 21817682, 'F21817682', 'VICTOR', 'MENDOZA MORAN', 'PERUANO', 'A-IIB', 'AUTORIZADO', 1, ''),
(16, 'F71784063', 71784063, 'F71784063', 'LEONARDO LUIS', 'MORAN RODRIGUEZ', 'PERUANO', 'A-IIB', 'AUTORIZADO', 1, ''),
(17, 'F42335257', 42335257, 'F42335257', 'JOSE MIGUEL', 'MUENTE TALLA', 'PERUANO', 'A-IIIC', 'AUTORIZADO', 1, ''),
(18, 'F41257122', 41257122, 'F41257122', 'VICTOR JESUS', 'NARVAY YATACO', 'PERUANO', 'A-IIIC', 'AUTORIZADO', 1, ''),
(19, 'Q07999853', 7999853, 'Q07999853', 'ROGELIO', 'CAVARRY', 'PERUANO', 'A-IIIC', 'AUTORIZADO', 1, ''),
(20, 'F21816861', 21816861, 'F21816861', 'CIPRIANO', 'RAMOS MAMANI', 'PERUANO', 'A-IIIC', 'AUTORIZADO', 1, ''),
(21, 'F70137350', 70137350, 'F70137350', 'MICHAEL ANGELO', 'REYES LEVANO', 'PERUANO', 'A-IIIB', 'AUTORIZADO', 1, ''),
(22, 'F45043184', 45043184, 'F45043184', 'ROBERTO', 'FLORES CASTRILLON', 'PERUANO', 'A-IIB', 'AUTORIZADO', 1, ''),
(23, 'F40585001', 40585001, 'F40585001', 'JHON EDGARDO', 'URIOL BAUTISTA', 'PERUANO', 'A-IIB', 'AUTORIZADO', 1, ''),
(24, 'F44782241', 44782241, 'F44782241', 'WALTER', 'YEREN MAGALLANES', 'PERUANO', 'A-IIB', 'AUTORIZADO', 1, ''),
(25, 'Q14680598', 14680598, 'Q14680598', 'WLADIMIR', 'ILICH CANSINO', 'PERUANO', 'A-IIIC', 'AUTORIZADO', 1, ''),
(26, 'F42226868', 42226868, 'F4226868', 'MIGUEL ANGEL', 'FELIPA GRIMALDO', 'PERUANO', 'A-IIIC', 'AUTORIZADO', 1, ''),
(27, 'Q21816495', 21816495, 'Q21816495', 'JOSE MARIO', 'PACHAS PALOMINO', 'PERUANO', 'A-IIIC', 'AUTORIZADO', 1, ''),
(28, 'F40291527', 40291527, 'F40291527', 'CARLOS WILMER', 'TORRES NAPA', 'PERUANO', 'A-IIIC', 'AUTORIZADO', 1, ''),
(29, 'F43787201', 43787201, 'F76787201', 'JUAN CARLOS', 'LEVANO RAMIREZ', 'PERUANO', 'A-IIIA', 'AUTORIZADO', 1, ''),
(30, 'F21816881', 21816881, 'F21816881', 'LINO', 'HUAMAN RAMOS', 'PERUANO', 'A-IIIA', 'AUTORIZADO', 1, ''),
(31, 'Q70145038', 70145038, 'Q70145038', 'ABEL LEONARDO', 'ROJAS CARDEñA', 'PERUANO', 'A-IIIA', 'AUTORIZADO', 1, ''),
(32, 'F41424109', 41424109, 'F41424109', 'EUSEBIO OSWALDO', 'CRISOSTOMO MARCOS', 'PERUANO', 'A-IIIA', 'AUTORIZADO', 1, ''),
(33, 'F42859480', 42859480, 'F42859480', 'JORGE AURELIO', 'RAMOS MAGALLANES', 'PERUANO', 'A-IIIA', 'AUTORIZADO', 1, ''),
(34, 'F42081045', 42081045, 'F42081045', 'JUAN DANIEL', 'RAMOS FLORES', 'PERUANO', 'A-IIIA', 'AUTORIZADO', 1, ''),
(35, 'F44519057', 44519057, 'F44519057', 'AMERICO', 'TACUSI CCALLOQUISPE', 'PERUANO', 'A-IIIA', 'AUTORIZADO', 1, ''),
(36, 'Q43763987', 43763987, 'Q43763987', 'MICHAEL JESUS', 'PUMA MAGALLANES', 'PERUANO', 'A-IIIA', 'AUTORIZADO', 1, ''),
(37, 'F24998559', 24998559, 'F24998559', 'MAURO', 'PUMACHOQUE MAMANI', 'PERUANO', 'A-IIIA', 'AUTORIZADO', 1, ''),
(39, 'F12345437', 65986534, 'F12345437', 'EZEQUIEL', 'BLANCO PACHAS', 'PERUANO', 'A-IIIB', 'AUTORIZADO', 1, '');

  
INSERT INTO `Vehiculo` (`IdPlaca`, `Placa`, `Marca`, `Compartimientos`, `IdEmpreTrans`, `Estado`) VALUES
(1, 'F8V907', 'INTERNATIONAL', 8, 1, 1),
(2, 'A5W847', 'INTERNATIONAL', 4, 1, 1),
(3, 'B1N840', 'INTERNATIONAL', 4, 1, 1),
(4, 'BDQ846', 'INTERNATIONAL', 8, 1, 1),
(5, 'B6H900', 'INTERNATIONAL', 8, 1, 1),
(6, 'B1N841', 'INTERNATIONAL', 8, 1, 1),
(7, 'A5L846', 'INTERNATIONAL', 8, 1, 1),
(8, 'B6H898', 'INTERNATIONAL', 8, 1, 1),
(9, 'A9W889', 'INTERNATIONAL', 9, 1, 1),
(10, 'BDW972', 'INTERNATIONAL', 1, 1, 1),
(11, 'BDR895', 'INTERNATIONAL', 1, 1, 1),
(12, 'BDR890', 'INTERNATIONAL', 1, 1, 1),
(13, 'BDS858', 'INTERNATIONAL', 1, 1, 1),
(14, 'BDS768', 'INTERNATIONAL', 1, 1, 1),
(15, 'A9L838', 'INTERNATIONAL', 1, 1, 1),
(16, 'A9J876', 'INTERNATIONAL', 1, 1, 1),
(17, 'A5L847', 'INTERNATIONAL', 1, 1, 1),
(18, 'A9J880', 'INTERNATIONAL', 1, 1, 1),
(19, 'A9J883', 'INTERNATIONAL', 1, 1, 1),
(20, 'BOL895', 'INTERNATIONAL', 1, 1, 1),
(21, 'V3H802', 'INTERNATIONAL', 1, 1, 1),
(22, 'AAA001', 'INTERNATIONAL', 8, 1, 1),
(23, 'BDW790', 'INTERNATIONAL', 1, 1, 1),
(24, 'BDR795', 'INTERNATIONAL', 1, 1, 1);

INSERT INTO `ProveClien` (`IdProveClien`, `RazonSocial`, `Ruc`, `Estado`) VALUES
(1, 'LA CALERA SAC', 20452614767, 1);








INSERT INTO `TipoProducto` (`IdTipoProducto`, `TipoProducto`, `CodTipoProducto`, `Estado`) VALUES
(1, 'ALIMENTO PARA AVES', 'TP0001', 1),
(2, 'INSUMOS', 'TP0002', 1);


INSERT INTO `CategoriaProd` (`IdCategoriaProd`, `CategoriaProd`, `CodCategoria`, `Estado`, `IdTipoProducto`) VALUES
(1, 'POSTURA', 'CP0001', 1, 1),
(2, 'LEVANTE', 'CP0002', 1, 1),
(3, 'CABALLERIZO', 'CP0003', 1, 1),
(4, 'REPRODUCTORA', 'CP0004', 1, 1),
(5, 'ECOLOGICO', 'CP0005', 1, 1),
(6, 'MAIZ', 'C111', 1, 2);

INSERT INTO `Producto` (`IdProducto`, `Producto`, `CodProducto`, `Estado`, `IdCategoriaProd`, `NombreGuia`) VALUES
(1, 'FASE 1', 'P00001', 1, 1, 'ALIMENTO PARA POSTURA FASE 1'),
(2, 'FASE 2', 'P00002', 1, 1, 'ALIMENTO PARA POSTURA FASE 2'),
(3, 'FASE 3', 'P00003', 1, 1, 'ALIMENTO PARA POSTURA FASE 3'),
(4, 'FASE 4', 'P00004', 1, 1, 'ALIMENTO PARA POSTURA FASE 4'),
(5, 'PRE PICO', 'P00005', 1, 1, 'ALIMENTO PARA PRE PICO'),
(6, 'PRE POSTURA', 'P00006', 1, 1, 'ALIMENTO PARA PRE POSTURA'),
(7, 'HUMANITARIO', 'P00007', 1, 1, 'ALIMENTO PARA POSTURA FASE 1 PIGMENTANTE'),
(8, 'BLANCA', 'P00008', 1, 1, 'ALIMENTO PARA POSTURA BLANCA'),
(9, 'NEGRA', 'P00009', 1, 1, 'ALIMENTO PARA POSTURA NEGRA'),
(11, 'MAIZ AMARILLO', 'P00010', 1, 6, 'MAIZ AMARILLO'),
(12, 'DESARROLLO', 'P00011', 1, 2, 'ALIMENTO PARA DESARROLLO'),
(13, 'INICIO', 'P00012', 1, 2, 'ALIMENTO PARA INICIO'),
(14, 'CRECIMIENTO', 'P00013', 1, 2, 'ALIMENTO PARA CRECIMIENTO');


INSERT INTO `DescProd` (`IdDescProd`, `DescProd`, `CodDescProd`, `Estado`, `IdProducto`) VALUES
(1, 'INSERTAR CAMPO', 'DP0000', 1, 1),
(2, 'FASE 1', 'DP0001', 1, 1),
(3, 'FASE 1 MEDICADO', 'DP0002', 1, 1),
(4, 'FASE 2', 'DP0003', 1, 2),
(5, 'FASE 2 MEDICADO', 'DP0004', 1, 2),
(6, 'FASE 3', 'DP0005', 1, 3),
(7, 'FASE 3 MEDICADO', 'DP0006', 1, 3),
(8, 'FASE 4', 'DP0007', 1, 4),
(9, 'PRE PICO', 'DP0008', 1, 5),
(10, 'PRE PICO MEDICADO', 'DP0009', 1, 5),
(11, 'PRE POSTURA', 'DP0010', 1, 6),
(12, 'PRE POSTURA MEDICADO', 'DP0011', 1, 6),
(13, 'HUMANITARIO', 'DP0012', 1, 7),
(14, 'BLANCA', 'DP0013', 1, 8),
(15, 'BLANCA MEDICADA', 'DP0014', 1, 8),
(16, 'NEGRA', 'DP0015', 1, 9),
(17, 'NEGRA MEDICADO', 'DP0016', 1, 9),
(18, 'MAIZ AMARILLO', 'DP0017', 1, 11),
(19, 'DESARROLLO', 'DP0018', 1, 12),
(20, 'DESARROLLO MEDICADO', 'DP0019', 1, 12),
(21, 'INICIO', 'DP0020', 1, 13),
(22, 'INICIO MEDICADO', 'DP0021', 1, 13),
(23, 'CRECIMIENTO', 'DP0022', 1, 14),
(24, 'CRECIMIENTO MEDICADO', 'DP0023', 1, 14);



INSERT INTO `TipoDestino` (`IdTipoDestino`, `TipoDestino`, `CodDestino`, `Estado`) VALUES
(1, 'DESTINOS MOLINO', 'TD01', 1),
(2, 'ALMACEN MOLINO', 'D002', 1),
(6, 'ALMACEN MOLINO 1', 'D003', 1);

INSERT INTO `Destino` (`IdDestino`, `Destino`, `CodDestino`, `Estado`, `IdTipoDestino`) VALUES
(1, 'CAMELLONES', 'D0001', 1, 1),
(2, 'SILENCIO', 'D0002', 1, 1),
(3, 'ANTENA', 'D0003', 1, 1),
(4, 'LOMA', 'D0004', 1, 1),
(5, 'HOYADA', 'D0005', 1, 1),
(6, 'YANACOCHA', 'D0006', 1, 1),
(7, 'MINA', 'D0007', 1, 1),
(8, 'QUEBRADA', 'D0008', 1, 1),
(9, 'ROXANA', 'D0009', 1, 1),
(11, 'PALMERA', 'D00010', 1, 1),
(12, 'AUTOMATIZADO', 'D00011', 1, 1),
(13, 'ALMACEN MOLINO 2', 'D00012', 1, 2),
(14, 'ALMACEN MOLINO 1', 'D000013', 1, 6);






INSERT INTO `DestinoDesc` (`IdDestinoDesc`, `DestinoDes`, `CodDestinoDesc`, `Estado`, `IdDestino`) VALUES
(1, 'CAMELLONES', 'DD0001', 1, 1),
(2, 'SILENCIO 0A', 'DD0002', 1, 2),
(3, 'SILENCIO 0B', 'DD0003', 1, 2),
(4, 'SILENCIO 1', 'DD0004', 1, 2),
(5, 'SILENCIO 2', 'DD0005', 1, 2),
(6, 'ANTENA', 'DD0006', 1, 3),
(7, 'LOMA', 'DD0007', 1, 4),
(8, 'HOYADA', 'DD0008', 1, 5),
(9, 'YANACOCHA 1', 'DD0009', 1, 6),
(10, 'YANACOCHA 2', 'DD0010', 1, 6),
(11, 'YANACOCHA 3', 'DD0011', 1, 6),
(12, 'YANACOCHA 4', 'DD0012', 1, 6),
(13, 'MINA', 'DD0013', 1, 7),
(14, 'QUEBRADA', 'DD0014', 1, 8),
(15, 'ROXANA', 'DD0015', 1, 9),
(16, 'PALMERA', 'DD00016', 1, 11),
(17, 'AUTOMATIZADO', 'DD00017', 1, 12),
(19, 'ALMACEN MOLINO 2', 'DD00018', 1, 13),
(20, 'ALMACEN MOLINO 1', 'DD00019', 1, 14);


INSERT INTO `DestinoBloq` (`IdDestinoBloq`, `DestinoBloq`, `CodDestinoBloq`, `Estado`, `IdDestinoDesc`) VALUES
(1, 'INSERTAR CAMPO', 'DB0000', 1, 1),
(2, 'BLOQUE A', 'DB0001', 1, 1),
(3, 'BLOQUE B', 'DB0002', 1, 1),
(4, 'BLOQUE A', 'DB0003', 1, 2),
(5, 'BLOQUE B', 'DB0004', 1, 2),
(6, 'BLOQUE A', 'DB0005', 1, 3),
(7, 'BLOQUE B', 'DB0006', 1, 3),
(8, 'BLOQUE A', 'DB0007', 1, 4),
(9, 'BLOQUE B', 'DB0008', 1, 4),
(10, 'BLOQUE C', 'DB0009', 1, 4),
(11, 'BLOQUE A', 'DB0010', 1, 5),
(12, 'BLOQUE B', 'DB0011', 1, 5),
(13, 'BLOQUE C', 'DB0012', 1, 5),
(14, 'BLOQUE A', 'DB0013', 1, 6),
(15, 'BLOQUE B', 'DB0014', 1, 6),
(16, 'BLOQUE C', 'DB0015', 1, 6),
(17, 'BLOQUE D', 'DB0016', 1, 6),
(18, 'BLOQUE A', 'DB0017', 1, 7),
(19, 'BLOQUE B', 'DB0018', 1, 7),
(20, 'BLOQUE C', 'DB0019', 1, 7),
(21, 'BLOQUE D', 'DB0020', 1, 7),
(22, 'BLOQUE A', 'DB0021', 1, 8),
(23, 'BLOQUE B', 'DB0022', 1, 8),
(24, 'BLOQUE C', 'DB0023', 1, 8),
(25, 'BLOQUE D', 'DB0024', 1, 8),
(26, 'YANACOCHA 1', 'DB0025', 1, 9),
(27, 'YANACOCHA 2', 'DB0026', 1, 10),
(28, 'YANACOCHA 3', 'DB0027', 1, 11),
(29, 'YANACOCHA 4', 'DB0028', 1, 12),
(30, 'BLOQUE A', 'DB0029', 1, 13),
(31, 'BLOQUE B', 'DB0030', 1, 13),
(32, 'BLOQUE C', 'DB0031', 1, 13),
(33, 'BLOQUE A', 'DB0032', 1, 14),
(34, 'BLOQUE B', 'DB0033', 1, 14),
(35, 'BLOQUE C', 'DB0034', 1, 14),
(36, 'BLOQUE A', 'B00023', 1, 15),
(37, 'BLOQUE B', 'B00024', 1, 15),
(38, 'BLOQUE A', 'B00025', 1, 16),
(39, 'BLOQUE B', 'B00026', 1, 16),
(40, '1', 'DB0039', 1, 17),
(41, '2', 'DB0040', 1, 17),
(42, '3', 'DB0041', 1, 17),
(43, '4', 'DB0042', 1, 17),
(44, '5', 'DB0043', 1, 17),
(45, '6', 'DB0044', 1, 17),
(46, '7', 'DB0045', 1, 17),
(47, '8', 'DB0046', 1, 17),
(48, '9', 'DB0047', 1, 17),
(49, '10', 'DB0048', 1, 17),
(50, '11', 'DB0049', 1, 17),
(51, '12', 'DB0050', 1, 17),
(52, '13', 'DB0051', 1, 17),
(53, '14', 'DB0052', 1, 17),
(54, '15', 'DB0053', 1, 17),
(55, '16', 'DB0054', 1, 17),
(56, '17', 'DB0055', 1, 17),
(57, 'ZONA A', 'DB00056', 1, 19),
(58, 'ZONA B', 'DB00057', 1, 19),
(59, 'ZONA C', 'DB00058', 1, 19),
(60, 'ZONA D', 'DB00059', 1, 19),
(61, 'SILO BROCK', 'DB00060', 1, 19),
(62, 'ALMACEN MOLINO 1', 'DB00061', 1, 20);

INSERT INTO `CabeceraPedido` (`IdCabeceraPedido`, `IdDestinoDesc`, `OrdenEnvio`, `Estado`) VALUES
(1, 1, 1, 1),
(2, 2, 10, 1),
(3, 3, 10, 1),
(4, 4, 10, 1),
(5, 5, 2, 1),
(6, 6, 6, 1),
(7, 7, 10, 1),
(8, 8, 10, 1),
(9, 9, 11, 1),
(10, 10, 12, 1),
(11, 11, 13, 1),
(12, 12, 14, 1),
(13, 13, 3, 1),
(14, 14, 4, 1),
(15, 15, 10, 1),
(16, 16, 5, 1),
(17, 17, 20, 1);

























/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
