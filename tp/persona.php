<?php

include_once "empleado.php";
   abstract class Persona
    {
        
        protected  $_apellido;
        protected  $_dni;
        protected  $_nombre;
        protected  $_sexo;

        function __contruct($nombre ,$apellido, $dni, $sexo )
        {
             $this->_nombre= $nombre;
            $this->_apellido=$apellido;           
            $this->_dni= $dni;
            $this->_sexo= $sexo; 

        }

        function getApellido()
        {
            return $this->_apellido;
        }

        function getDni()
        {
            return $this->_dni;
        }
         function getNombre()
        {
            return $this->_nombre;
        }
         function getSexo()
        {
            return $this->_sexo;
        }

        function Hablar($idioma )
        {
            
        }

        function ToString()
        {

        }


    }


?>