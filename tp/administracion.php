<?php
    include_once "persona.php";
    include_once "empleado.php";
    include_once "fabrica.php";

if (isset($_POST['guardar'])) 
{
      $foto= $_FILES['foto'];
     var_dump($foto);

     $foto= $_FILES['foto'];

     

        if (isset($foto)) 
        {
            //Guardar una foto y leerla de la carpeta guardada
        //echo phpinfo(); php version 5.6.28

            $ValidacionExtencioens= array('JPG', 'jpg', 'bmp', 'BMP', 'GIF', 'gif', 'jpeg', 'JPEG', 'PNG', 'png');
            
          $array_nombre = explode('.',$foto["name"]); 
          $cuenta_arr_nombre = count($array_nombre); 
         //  $extension = strtolower($array_nombre[$cuenta_arr_nombre]);

           $flag=0;

           for ($i=0; $i <count($array_nombre) ; $i++)
            { 
              
                for ($j=0; $j <count($ValidacionExtencioens) ; $j++)
                {                     
                        if($array_nombre[$i] == $ValidacionExtencioens[$j] )
                        { 
                            echo "se guardo el archivo";  
                            $flag=1;
                            break;
                        }                
                }           

              
            }
            if($flag==1)
            {
                  $des = "img/".$foto["name"];
                  $desNueno='';
                 // move_uploaded_file($foto['tmp_name'], $des);          
                 // echo "<img src=". $des .">";

                  if(file_exists($des))
                  {
                         $desNueno= "viejasimg/".date('j-n-Y')."__" . date('H-i-s').$foto['name'];                       
                        // echo "<img src=".$desNueno .">"; 
                  }
                 else
                 {
                       $desNueno= $des;
                 }
                   move_uploaded_file($foto['tmp_name'],$desNueno); 



            }
            else
            {
                echo "error al guardar la foto";
            }
         
                $aux= $_POST['nombre']."--".$_POST['apellido']."--".$_POST['dni']."--".$_POST['sexo']."--".$_POST['sueldo']."--".$_POST['legajo']."--".$des;
                
                $objEmpleado= explode("--",$aux);    

            
                $empleado = new Empleado($objEmpleado[0], $objEmpleado[1], $objEmpleado[2] ,$objEmpleado[3] , $objEmpleado[4], $objEmpleado[5], $objEmpleado[6]);
            


            //  $empleado = new Empleado($_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_POST['sexo'], $_POST['sueldo'], $_POST['legajo'], $des);

                $fp= fopen("empleados.txt", "a");        
                fwrite($fp , $empleado->ToString() );
                fclose($fp);

               echo '<a href="mostrar.php">El empleado se guardo exitosamente </a>';
        }
        else
            {
                echo '<a href="index.html">El empleado no se  guardo exitosamente </a>';
            }
   
     
}
if(isset($_POST['eliminar']))
{

    $dni= $_POST['txtDni'];


    
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
          // var_dump($objEmpleado);
          
           $empleado[0]=null;

            $cont= 0;

         foreach ($objEmpleado as $item) {
              var_dump($item);
               if($item[0] != '' && $item != NULL)
               {
                $empleado[$cont] = new Empleado($item[0], $item[1] , $item[2] , $item[3], $item[4] ,$item[5], $item[6]);
                $cont= $cont + 1; 
               }
                  
               # code...
           }
           var_dump($empleado);
      
       /*    for ($i=0; $i < sizeof($objEmpleado) ; $i++) 
           { 
               if( isset( $objEmpleado ) )
               {
                  $empleado[$i] = new Empleado($objEmpleado[$i][0], $objEmpleado[$i][1] , $objEmpleado[$i][2] , $objEmpleado[$i][3], $objEmpleado[$i][4] ,$objEmpleado[$i][5],$objEmpleado[$i][6]);
                    
               }
             
           }*/

           $fp= fopen("empleados.txt", "w+");        
                fwrite($fp , "");
                fclose($fp);

          
                $fp= fopen("empleados.txt", "a");        
               
               
            for ($i=0; $i < sizeof($empleado) ; $i++) 
           {     
                
              if($empleado[$i]->getDni() != $dni)
               {                       
                    fwrite($fp , $empleado[$i]->ToStr());
               }    
           }
             fclose($fp);
          
       //  var_dump($empleado); 

            echo '<a href="mostrar.php">El empleado se guardo exitosamente </a>';


}







?>