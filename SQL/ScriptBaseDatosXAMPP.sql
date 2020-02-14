-- MySQL Script generated by MySQL Workbench
-- jue 13 feb 2020 11:26:05 -05
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema DBMolino
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema DBMolino
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `DBMolino` DEFAULT CHARACTER SET utf8 ;
USE `DBMolino` ;

-- -----------------------------------------------------
-- Table `DBMolino`.`Conductor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`Conductor` (
  `IdConductor` INT NOT NULL AUTO_INCREMENT,
  `CodConduc` VARCHAR(45) NULL,
  `DNI` INT NULL,
  `Licencia` VARCHAR(15) NULL,
  `Nombre` VARCHAR(60) NULL,
  `Apellidos` VARCHAR(60) NULL,
  `Nacionalidad` VARCHAR(45) NULL,
  `TipoBrevete` VARCHAR(45) NULL,
  `Condicion` VARCHAR(45) NULL,
  `Estado` TINYINT NULL,
  `Observacion` VARCHAR(180) NULL,
  PRIMARY KEY (`IdConductor`),
  UNIQUE INDEX `NumDoc_UNIQUE` (`Licencia` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`EmpreTrans`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`EmpreTrans` (
  `IdEmpreTrans` INT NOT NULL AUTO_INCREMENT,
  `Ruc` BIGINT NOT NULL,
  `RazonSocial` VARCHAR(80) NOT NULL,
  `Domicilio` VARCHAR(130) NULL,
  `Correo` VARCHAR(45) NULL,
  `NumCel` VARCHAR(15) NULL,
  `Condicion` VARCHAR(45) NULL,
  `Estado` TINYINT NULL,
  `Observ` VARCHAR(180) NULL,
  PRIMARY KEY (`IdEmpreTrans`),
  UNIQUE INDEX `Ruc_UNIQUE` (`Ruc` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`Vehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`Vehiculo` (
  `IdPlaca` INT NOT NULL AUTO_INCREMENT,
  `Placa` VARCHAR(8) NOT NULL,
  `Marca` VARCHAR(45) NULL,
  `Compartimientos` TINYINT NULL,
  `IdEmpreTrans` INT NOT NULL,
  `Estado` TINYINT NULL,
  PRIMARY KEY (`IdPlaca`),
  UNIQUE INDEX `Placa_UNIQUE` (`Placa` ASC),
  INDEX `fk_Vehiculo_EmpreTrans1_idx` (`IdEmpreTrans` ASC),
  CONSTRAINT `fk_Vehiculo_EmpreTrans1`
    FOREIGN KEY (`IdEmpreTrans`)
    REFERENCES `DBMolino`.`EmpreTrans` (`IdEmpreTrans`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`ConductorVehiculo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`ConductorVehiculo` (
  `IdConductorVehiculo` INT NOT NULL AUTO_INCREMENT,
  `Fecha` DATETIME NULL,
  `IdPlaca` INT NOT NULL,
  `IdConductor` INT NOT NULL,
  `Estado` TINYINT NULL,
  PRIMARY KEY (`IdConductorVehiculo`),
  INDEX `fk_ConductorVehiculo_Conductor1_idx` (`IdConductor` ASC),
  INDEX `fk_ConductorVehiculo_Vehiculo1_idx` (`IdPlaca` ASC),
  CONSTRAINT `fk_ConductorVehiculo_Conductor1`
    FOREIGN KEY (`IdConductor`)
    REFERENCES `DBMolino`.`Conductor` (`IdConductor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ConductorVehiculo_Vehiculo1`
    FOREIGN KEY (`IdPlaca`)
    REFERENCES `DBMolino`.`Vehiculo` (`IdPlaca`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`ProveClien`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`ProveClien` (
  `IdProveClien` INT NOT NULL AUTO_INCREMENT,
  `RazonSocial` VARCHAR(45) NULL,
  `Ruc` BIGINT NULL,
  `Estado` TINYINT NULL,
  PRIMARY KEY (`IdProveClien`),
  UNIQUE INDEX `Ruc_UNIQUE` (`Ruc` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`Usuario` (
  `DNI` INT NOT NULL,
  `Nombre` VARCHAR(45) NULL,
  `Apellidos` VARCHAR(45) NULL,
  `Usuario` VARCHAR(45) NULL,
  `Contrasena` VARCHAR(45) NULL,
  `TipoUsuario` VARCHAR(45) NULL,
  PRIMARY KEY (`DNI`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`TipoDestino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`TipoDestino` (
  `IdTipoDestino` INT NOT NULL AUTO_INCREMENT,
  `TipoDestino` VARCHAR(50) NOT NULL,
  `CodDestino` VARCHAR(15) NULL,
  `Estado` TINYINT NULL,
  PRIMARY KEY (`IdTipoDestino`),
  UNIQUE INDEX `CodDestino_UNIQUE` (`CodDestino` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`Destino`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`Destino` (
  `IdDestino` INT NOT NULL AUTO_INCREMENT,
  `Destino` VARCHAR(80) NOT NULL,
  `CodDestino` VARCHAR(15) NULL,
  `Estado` TINYINT NULL,
  `IdTipoDestino` INT NOT NULL,
  PRIMARY KEY (`IdDestino`),
  UNIQUE INDEX `CodDestino_UNIQUE` (`CodDestino` ASC),
  INDEX `fk_Destino_TipoDestino1_idx` (`IdTipoDestino` ASC),
  CONSTRAINT `fk_Destino_TipoDestino1`
    FOREIGN KEY (`IdTipoDestino`)
    REFERENCES `DBMolino`.`TipoDestino` (`IdTipoDestino`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`DestinoDesc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`DestinoDesc` (
  `IdDestinoDesc` INT NOT NULL AUTO_INCREMENT,
  `DestinoDes` VARCHAR(80) NOT NULL,
  `CodDestinoDesc` VARCHAR(15) NULL,
  `Estado` TINYINT NOT NULL,
  `IdDestino` INT NOT NULL,
  PRIMARY KEY (`IdDestinoDesc`),
  UNIQUE INDEX `CodDestinoDesc_UNIQUE` (`CodDestinoDesc` ASC),
  INDEX `fk_DestinoDesc_Destino1_idx` (`IdDestino` ASC),
  CONSTRAINT `fk_DestinoDesc_Destino1`
    FOREIGN KEY (`IdDestino`)
    REFERENCES `DBMolino`.`Destino` (`IdDestino`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`DestinoBloq`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`DestinoBloq` (
  `IdDestinoBloq` INT NOT NULL AUTO_INCREMENT,
  `DestinoBloq` VARCHAR(45) NOT NULL,
  `CodDestinoBloq` VARCHAR(15) NULL,
  `Estado` TINYINT NOT NULL,
  `IdDestinoDesc` INT NOT NULL,
  PRIMARY KEY (`IdDestinoBloq`),
  INDEX `fk_DestinoBloq_DestinoDesc1_idx` (`IdDestinoDesc` ASC),
  CONSTRAINT `fk_DestinoBloq_DestinoDesc1`
    FOREIGN KEY (`IdDestinoDesc`)
    REFERENCES `DBMolino`.`DestinoDesc` (`IdDestinoDesc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`TipoProducto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`TipoProducto` (
  `IdTipoProducto` INT NOT NULL AUTO_INCREMENT,
  `TipoProducto` VARCHAR(50) NOT NULL,
  `CodTipoProducto` VARCHAR(15) NULL,
  `Estado` TINYINT NOT NULL,
  PRIMARY KEY (`IdTipoProducto`),
  UNIQUE INDEX `CodTipoProducto_UNIQUE` (`CodTipoProducto` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`CategoriaProd`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`CategoriaProd` (
  `IdCategoriaProd` INT NOT NULL AUTO_INCREMENT,
  `CategoriaProd` VARCHAR(50) NOT NULL,
  `CodCategoria` VARCHAR(15) NULL,
  `Estado` TINYINT NOT NULL,
  `IdTipoProducto` INT NOT NULL,
  PRIMARY KEY (`IdCategoriaProd`),
  UNIQUE INDEX `CodCategoria_UNIQUE` (`CodCategoria` ASC),
  INDEX `fk_CategoriaProd_TipoProducto1_idx` (`IdTipoProducto` ASC),
  CONSTRAINT `fk_CategoriaProd_TipoProducto1`
    FOREIGN KEY (`IdTipoProducto`)
    REFERENCES `DBMolino`.`TipoProducto` (`IdTipoProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`Producto` (
  `IdProducto` INT NOT NULL AUTO_INCREMENT,
  `Producto` VARCHAR(60) NOT NULL,
  `CodProducto` VARCHAR(60) NULL,
  `Estado` TINYINT NOT NULL,
  `IdCategoriaProd` INT NOT NULL,
  `NombreGuia` VARCHAR(150) NULL,
  PRIMARY KEY (`IdProducto`),
  UNIQUE INDEX `CodProducto_UNIQUE` (`CodProducto` ASC),
  INDEX `fk_Producto_CategoriaProd1_idx` (`IdCategoriaProd` ASC),
  CONSTRAINT `fk_Producto_CategoriaProd1`
    FOREIGN KEY (`IdCategoriaProd`)
    REFERENCES `DBMolino`.`CategoriaProd` (`IdCategoriaProd`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`DescProd`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`DescProd` (
  `IdDescProd` INT NOT NULL AUTO_INCREMENT,
  `DescProd` VARCHAR(60) NOT NULL,
  `CodDescProd` VARCHAR(60) NULL,
  `Estado` TINYINT NOT NULL,
  `IdProducto` INT NOT NULL,
  PRIMARY KEY (`IdDescProd`),
  UNIQUE INDEX `CodDescProd_UNIQUE` (`CodDescProd` ASC),
  INDEX `fk_DescProd_Producto1_idx` (`IdProducto` ASC),
  CONSTRAINT `fk_DescProd_Producto1`
    FOREIGN KEY (`IdProducto`)
    REFERENCES `DBMolino`.`Producto` (`IdProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`Peso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`Peso` (
  `IdPeso` INT NOT NULL AUTO_INCREMENT,
  `TipoMovimiento` VARCHAR(45) NULL,
  `NumGuia` INT NULL,
  `FechaHoraSal` DATETIME NULL,
  `FechaHoraEnt` DATETIME NULL,
  `PesoCE` INT NULL,
  `PesoCS` INT NULL,
  `NetoC` INT NULL,
  `ObservE` VARCHAR(100) NULL,
  `ObservS` VARCHAR(100) NULL,
  `Estado` VARCHAR(45) NULL,
  `DNI` INT NOT NULL,
  `IdProveClien` INT NOT NULL,
  `Precinto` INT NULL,
  `IdConductorVehiculo` INT NOT NULL,
  `IdDestinoBloq` INT NOT NULL,
  `IdDescProd` INT NOT NULL,
  PRIMARY KEY (`IdPeso`),
  INDEX `fk_Peso_Usuario1_idx` (`DNI` ASC),
  INDEX `fk_Peso_ProveClien1_idx` (`IdProveClien` ASC),
  INDEX `fk_Peso_ConductorVehiculo1_idx` (`IdConductorVehiculo` ASC),
  INDEX `fk_Peso_DestinoBloq1_idx` (`IdDestinoBloq` ASC),
  INDEX `fk_Peso_DescProd1_idx` (`IdDescProd` ASC),
  CONSTRAINT `fk_Peso_Usuario1`
    FOREIGN KEY (`DNI`)
    REFERENCES `DBMolino`.`Usuario` (`DNI`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Peso_ProveClien1`
    FOREIGN KEY (`IdProveClien`)
    REFERENCES `DBMolino`.`ProveClien` (`IdProveClien`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Peso_ConductorVehiculo1`
    FOREIGN KEY (`IdConductorVehiculo`)
    REFERENCES `DBMolino`.`ConductorVehiculo` (`IdConductorVehiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Peso_DestinoBloq1`
    FOREIGN KEY (`IdDestinoBloq`)
    REFERENCES `DBMolino`.`DestinoBloq` (`IdDestinoBloq`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Peso_DescProd1`
    FOREIGN KEY (`IdDescProd`)
    REFERENCES `DBMolino`.`DescProd` (`IdDescProd`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`Guia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`Guia` (
  `IdGuia` INT NOT NULL AUTO_INCREMENT,
  `NumGuia` INT NULL,
  `FechaGuia` INT NULL,
  `PesoGE` INT NULL,
  `PesoGS` INT NULL,
  `NetoG` INT NULL,
  `Observ` VARCHAR(100) NULL,
  `IdProveClien` INT NOT NULL,
  PRIMARY KEY (`IdGuia`),
  INDEX `fk_Guia_ProveClien1_idx` (`IdProveClien` ASC),
  CONSTRAINT `fk_Guia_ProveClien1`
    FOREIGN KEY (`IdProveClien`)
    REFERENCES `DBMolino`.`ProveClien` (`IdProveClien`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`Galpon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`Galpon` (
  `IdGalpon` INT NOT NULL AUTO_INCREMENT,
  `Galpon` VARCHAR(45) NOT NULL,
  `CodGalpon` VARCHAR(45) NULL,
  `Estado` TINYINT NOT NULL,
  `IdDestinoBloq` INT NOT NULL,
  PRIMARY KEY (`IdGalpon`),
  INDEX `fk_Galpon_DestinoBloq1_idx` (`IdDestinoBloq` ASC),
  CONSTRAINT `fk_Galpon_DestinoBloq1`
    FOREIGN KEY (`IdDestinoBloq`)
    REFERENCES `DBMolino`.`DestinoBloq` (`IdDestinoBloq`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`Despacho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`Despacho` (
  `IdDespacho` INT NOT NULL,
  `IdUsuario` VARCHAR(45) NULL,
  `Destino` VARCHAR(45) NULL,
  `Fecha` DATETIME NULL,
  `Estado` TINYINT NULL,
  PRIMARY KEY (`IdDespacho`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`DetalleDespacho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`DetalleDespacho` (
  `IdDetalleDespacho` INT NOT NULL AUTO_INCREMENT,
  `IdDespacho` INT NOT NULL,
  `IdPeso` INT NOT NULL,
  `IdGalpon` INT NOT NULL,
  `IdDescProd` INT NOT NULL,
  PRIMARY KEY (`IdDetalleDespacho`),
  INDEX `fk_DetalleDespacho_Despacho1_idx` (`IdDespacho` ASC),
  INDEX `fk_DetalleDespacho_Peso1_idx` (`IdPeso` ASC),
  INDEX `fk_DetalleDespacho_Galpon1_idx` (`IdGalpon` ASC),
  INDEX `fk_DetalleDespacho_DescProd1_idx` (`IdDescProd` ASC),
  CONSTRAINT `fk_DetalleDespacho_Despacho1`
    FOREIGN KEY (`IdDespacho`)
    REFERENCES `DBMolino`.`Despacho` (`IdDespacho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetalleDespacho_Peso1`
    FOREIGN KEY (`IdPeso`)
    REFERENCES `DBMolino`.`Peso` (`IdPeso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetalleDespacho_Galpon1`
    FOREIGN KEY (`IdGalpon`)
    REFERENCES `DBMolino`.`Galpon` (`IdGalpon`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DetalleDespacho_DescProd1`
    FOREIGN KEY (`IdDescProd`)
    REFERENCES `DBMolino`.`DescProd` (`IdDescProd`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`GuiaCalera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`GuiaCalera` (
  `IdGuiaCalera` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IdGuiaCalera`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DBMolino`.`table1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `DBMolino`.`table1` (
)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
