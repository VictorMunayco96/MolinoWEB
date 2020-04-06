<?php

require "../Config/Conexion.php";

    Class MVariaciones{

        public function __construct(){



        }

        public function Insertar($IdPedidoSemanal, $CantidadBatch,$Motivo, $Detalle, $Idusuario){

            $Sql="Insert into Variaciones (IdPedidoSemanal, CantidadBatch,Motivo, Detalle, Idusuario, EstadoVA, Estado,Fecha) 
            values('$IdPedidoSemanal', '$CantidadBatch','$Motivo', '$Detalle', '$Idusuario','0','1',(Select Now()));";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdVariaciones,$IdPedidoSemanal, $CantidadBatch,$Motivo, $Detalle, $Idusuario){

            $Sql=" Update Variaciones set IdPedidoSemanal='$IdPedidoSemanal', CantidadBatch='$CantidadBatch', Motivo='$Motivo', Detalle='$Detalle',IdUsuario='$Idusuario', EstadoVA='0', Estado='1', Fecha=(Select Now())
             where IdVariaciones='$IdVariaciones';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdVariaciones){

            $Sql=" Update Variaciones set Estado=0 where IdVariaciones='$IdVariaciones';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdVariaciones){

            $Sql=" Update Variaciones set Estado=1 where IdVariaciones='$IdVariaciones';";
            
            return EjecutarConsulta($Sql);

        }


        public function Aceptar ($IdVariaciones){

            $Sql=" Update Variaciones set EstadoVA=1 where IdVariaciones='$IdVariaciones';";
            
            return EjecutarConsulta($Sql);

        }

        public function Rechazar ($IdVariaciones){

            $Sql=" Update Variaciones set EstadoVA=0 where IdVariaciones='$IdVariaciones';";
            
            return EjecutarConsulta($Sql);

        }



        public function Mostrar($IdVariaciones){

            $Sql="Select * from Variaciones 
            where IdVariaciones='$IdVariaciones'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function ListarCabeceraPedido($NumSemana){

            $Sql="SELECT CP.IdCabeceraPedido, CP.IdDestinoDesc, DD.DestinoDes,CP.OrdenEnvio, ifnull((Select Sum(PS.CantidadBatch) from PedidoSemanal PS where PS.EstadoPS=1 and PS.Estado=1 and PS.IdCabeceraPedido=CP.IdCabeceraPedido and PS.NumSemana=$NumSemana),0) as TotalMezclas,
            (Select count(VA.EstadoVA) from Variaciones VA 
            inner join PedidoSemanal PS on PS.IdPedidoSemanal=VA.IdPedidoSemanal
            where VA.EstadoVA=0 and VA.Estado=1 and PS.IdCabeceraPedido=CP.IdCabeceraPedido and PS.NumSemana=$NumSemana) as Pendiente, 
             ifnull((Select sum(VA.CantidadBatch) from Variaciones VA 
            inner join PedidoSemanal PS on PS.IdPedidoSemanal=VA.IdPedidoSemanal
            where VA.EstadoVA=1 and VA.Estado=1 and PS.IdCabeceraPedido=CP.IdCabeceraPedido and PS.NumSemana=$NumSemana),0) as CantidadVA,
            
            ifnull((ifnull((Select Sum(PS.CantidadBatch) from PedidoSemanal PS where PS.EstadoPS=1 and PS.Estado=1 and PS.IdCabeceraPedido=CP.IdCabeceraPedido and PS.NumSemana=$NumSemana),0) +  ifnull((Select sum(VA.CantidadBatch) from Variaciones VA 
            inner join PedidoSemanal PS on PS.IdPedidoSemanal=VA.IdPedidoSemanal
            where VA.EstadoVA=1 and VA.Estado=1 and PS.IdCabeceraPedido=CP.IdCabeceraPedido and PS.NumSemana=$NumSemana),0)),0) as TotalFinal,
            
            CP.Estado        
            from CabeceraPedido CP
            inner join DestinoDesc DD on DD.IdDestinoDesc=CP.IdDestinoDesc where CP.Estado=1;  ";

            return EjecutarConsulta($Sql);

        }


        public function ListarPedidoSemanal($IdCabeceraPedido,$NumSemana){

            $Sql=" SELECT PS.IdPedidoSemanal,DD.DestinoDes, DB.DestinoBloq ,DP.DescProd, PS.CantidadBatch, PS.CantidadKG, 
             ifnull((Select sum(VA.CantidadBatch) from Variaciones VA 
            
            where VA.EstadoVA=1 and VA.Estado=1 and VA.IdPedidoSemanal=PS.IdPedidoSemanal and PS.NumSemana=$NumSemana),0) as CantidadVA,
            
            ifnull((ifnull((PS.CantidadBatch),0) +  ifnull((Select sum(VA.CantidadBatch) from Variaciones VA 
            
            where VA.EstadoVA=1 and VA.Estado=1 and VA.IdPedidoSemanal=PS.IdPedidoSEmanal and PS.NumSemana=$NumSemana),0)),0) as TotalFinal,
            
            
            
            
            PS.Observacion, PS.Fecha, 
            (Select count(VA.EstadoVA) from Variaciones VA 
                        inner join PedidoSemanal PS on PS.IdPedidoSemanal=VA.IdPedidoSemanal
                        where VA.EstadoVA=0 and VA.Estado=1 and VA.IdPedidoSEmanal=PS.IdPedidoSemanal and PS.NumSemana=$NumSemana) as Pendiente, 
            U.Usuario,PS.Estado from PedidoSemanal PS 
                        inner join Usuario U on U.IdUsuario=PS.IdUsuario
                        inner join DescProd DP on DP.IdDescProd=PS.IdDescProd
                        inner join CabeceraPedido CP on CP.IdCabeceraPedido=PS.IdCabeceraPedido
                        inner join DestinoBloq DB on DB.IdDestinoBloq=PS.IdDestinoBloq
                        inner join DestinoDesc DD on DD.IdDestinoDesc=CP.IdDestinoDesc where PS.NumSemana=$NumSemana and PS.IdCabeceraPedido=$IdCabeceraPedido;  
                        
                        
                      ";

            return EjecutarConsulta($Sql);

        }

        public function ListarVariaciones($IdPedidoSemanal){

            $Sql="select VA.IdVariaciones,DD.DestinoDes, DB.DestinoBloq, VA.CantidadBatch, VA.Motivo, VA.Detalle,U.Usuario, VA.EstadoVA, VA.Estado, VA.Fecha from Variaciones VA
            inner join PedidoSemanal PS on PS.IdPedidoSemanal=VA.IdPedidoSemanal
            inner join DestinoBloq DB on DB.IdDestinoBloq=PS.IdDestinoBloq
            inner join DestinoDesc DD on DD.IdDestinoDesc=DB.IdDestinoDesc 
            inner join Usuario U on U.IdUsuario=VA.IdUsuario
             where PS.IdPedidoSemanal=$IdPedidoSemanal;  ";

            return EjecutarConsulta($Sql);

        }




        /*--------------------------------------------------------------FALTA REVISAR */
       
      

}




?>