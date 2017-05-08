<?php

      include_once "persona.php";
    include_once "empleado.php";
    include_once "fabrica.php";
   //include_once "funciones.js";



           
            if( $fr = fopen("empleados.txt", "r")){ 
                while (!feof($fr)){ 
                    $array[] = fgets($fr,9999); 
                } 
                fclose($fr); 
                }
                 

            $objEmpleado[0]=null;
          
           for ($i=0; $i < sizeof($array) ; $i++) 
           { 
             $objEmpleado[$i] = explode("--", $array[$i]);
           }
           var_dump($objEmpleado);
          
           $empleado[0] = '';

         //   var_dump($objEmpleado);

      /*   $cont= 0;

         foreach ($objEmpleado as $item) {
              var_dump($item);
               if( is_null($objEmpleado)==false )
               {
                $empleado[$cont] = new Empleado($item[0], $item[1] , $item[2] , $item[3], $item[4] ,$item[5],$item[6]);
               $cont= $cont + 1;  
               }

               # code...
           }*/

          for ($i=0; $i < sizeof($objEmpleado)-1 ; $i++) 
           { 
               if( is_null($objEmpleado[$i])==false || empty($objEmpleado)==true){
                 $empleado[$i] = new Empleado($objEmpleado[$i][0], $objEmpleado[$i][1] , $objEmpleado[$i][2] , $objEmpleado[$i][3], $objEmpleado[$i][4] ,$objEmpleado[$i][5],$objEmpleado[$i][6]);
                  
               }else{
                    
               }
                 
              
                 
              
           }
        //  var_dump($empleado);

           // unset($empleado[6]);



           $mostrar= '<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">  
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <title>Fabrica</title>
</head>
<body style=" background-color:#A9E2F3"  >
           <div class="container">
                <div class="table-responsive">
                        
                        <table class="table table-striped table-bordered table-hover table-condensed " style=" background-color:#819FF7" >
                            <thead>
                                
                                <tr>   <h1>
                                    <th>Nombre </th>
                                    <th>Apellido</th>
                                    <th>Legajo</th>
                                    <th>Sexo</th>
                                    <th>Sueldo</th>
                                    <th>Dni</th>
                                    <th>Foto</th></h1>
                                </tr>

                            </thead> <tbody>';

             //  echo $mostrar;             

            for ($i=0; $i < sizeof($empleado) ; $i++) 
           { 
              
              //ACA ESTA EL PROBLEMA EL EVENTO ONCLICK FUNCIONA SIEMPRE SIN HACER CLICK
               if( true )
               {
                   $mostrar = $mostrar. '

                           
                                
                             <tr>   
                                    <td>'. $empleado[$i]->getNombre().'</td>
                                    <td>'. $empleado[$i]->getApellido().'</td>
                                    <td>'.$empleado[$i]->getLegajo().'</td>
                                    <td>'.$empleado[$i]->getSexo().'</td>
                                    <td>'.$empleado[$i]->getSueldo().'</td>
                                    <td>'.$empleado[$i]->getDni().'</td>
                                    <td>'.$empleado[$i]->getFoto().'</td>
                                    <td><form method="POST" action="eliminar.php">
                                    <button type="submit" name="eliminar" value= '.$empleado[$i]->getDni() . '>Enviar</button> 
                                    </form></td>

                                  
                                  
                               </tr>
                              
                          
                           
                            
                      

               ';
               }

               echo $empleado[$i]->getFoto();
             // <td><a id="idEl" onclick= "eliminar('.$empleado[$i]->getDni().')" href="#">Eliminar</a></td>
           }
           $mostrar = $mostrar.  ' </table>   </tbody></html>';
           echo $mostrar ;
         
           //ejemplo de foto
        //   echo "<img src=\"http://bucket1.glanacion.com/anexos/fotos/33/motogp-2412833w620.jpg\">"; 
         
    //<td><a id="idEl" onclick="Eliminar('.$empleado[$i]->getLegajo().')" href="#">Eliminar</a></td> </td>


?>