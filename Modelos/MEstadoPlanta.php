<?php

require "../Config/Conexion.php";

    Class MEstadoPlanta{

        public function __construct(){



        }

        public function ActualizarHoraFin(){

            $Sql="
            
            UPDATE EstadoPlanta set HoraFin=(Select now()) where IdEstadoPlanta=(select IdEstadoPlanta from EstadoPlanta where Estado = 1 order by IdEstadoplanta desc limit 1);";

            return EjecutarConsulta($Sql);

        }       


        public function Insertar($EstadoPlanta, $Tema, $Detalle,$IdUsuario, $NumSemana){

            $Sql="
            
            Insert into EstadoPlanta (EstadoPlanta, Tema, Detalle, HoraInicio, HoraFin, EstadoP, Estado, IdUsuario,NumSemana) 
            values('$EstadoPlanta','$Tema', '$Detalle', (Select now()), null, 1,1,'$IdUsuario', '$NumSemana');";

            return EjecutarConsulta($Sql);

        }       
        
        public function Editar($IdEstadoPlanta,$EstadoPlanta, $Tema, $Detalle,$IdUsuario, $NumSemana){

            $Sql=" Update EstadoPlanta set  EstadoPlanta='$EstadoPlanta', Tema='$Tema', Detalle='$Detalle',IdUsuario='$IdUsuario', NumSemana='$NumSemana'
            where IdEstadoPlanta='$IdEstadoPlanta';";
            
            return EjecutarConsulta($Sql);

        }

        public function Desactivar ($IdEstadoPlanta){

            $Sql=" Update EstadoPlanta set Estado=0 where IdEstadoPlanta='$IdEstadoPlanta';";
            
            return EjecutarConsulta($Sql);

        }


        public function Activar ($IdEstadoPlanta){

            $Sql=" Update EstadoPlanta set Estado=1 where IdEstadoPlanta='$IdEstadoPlanta';";
            
            return EjecutarConsulta($Sql);

        }

        public function Mostrar($IdEstadoPlanta){

            $Sql="Select * from EstadoPlanta
            where IdEstadoPlanta='$IdEstadoPlanta'";
            return EjecutarConsultaSImpleFila($Sql);

        }

        public function Listar (){

            $Sql="Select EP.IdEstadoPlanta, EP.EstadoPlanta, EP.Tema, EP.Detalle, EP.HoraInicio, EP.HoraFin, EP.EstadoP, EP.Estado,U.Usuario,EP.NumSemana from EstadoPlanta EP
            inner join Usuario U on U.IdUsuario=EP.IdUsuario where EP.Estado=1 order by EP.IdEstadoPlanta desc ";
            
            return EjecutarConsulta($Sql);

        }



     


}




?>