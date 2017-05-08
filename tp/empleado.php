<?php
 include_once "persona.php";
class Empleado extends Persona
{  

    protected $_legajo;
    protected $_sueldo;
    protected $_foto;
   

    function __construct($nombre ,$apellido, $dni, $sexo, $sueldo, $legajo, $foto)
    {
           parent::__contruct($nombre ,$apellido, $dni, $sexo);           
          
            $this->_sueldo=$sueldo;
            $this->_legajo=$legajo;
            $this->_foto=$foto;
           
    
    }

  

     function getLegajo()
        {
            return $this->_legajo;
        }
      function getFoto()
      {
          return "<img src=" .$this->_foto ."  width='50' height='50'>";
      }  
  
     function getSueldo()
        {
            return $this->_sueldo;
        }   
     function Hablar($idioma )
        {
            return  "el empleado habla". $idioma;
        }  

     function ToString()
        {

             $aux =  $this->_nombre. "--" . $this->_apellido. "--"  . $this->_dni. "--" .$this->_sexo."--" . $this->_sueldo."--" . $this->_legajo."--". $this->_foto ."\r\n";
             return $aux;
        }  
        function ToStr()
        {

             $aux =  $this->_nombre. "--" . $this->_apellido. "--"  . $this->_dni. "--" .$this->_sexo."--" . $this->_sueldo."--" . $this->_legajo."--". $this->_foto ."\n";
             return $aux;
        }
}


?>