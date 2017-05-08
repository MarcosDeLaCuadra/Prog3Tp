<?php
    include_once "persona.php";
    include_once "empleado.php";
    include_once "fabrica.php";


    echo "asd";
    $empleado = new Empleado("leonel", "messi", 2344234, "masculino", 1234567, 23434343,"asdf");
    $empleado2 = new Empleado("pablo", "perez", 234565, "masculino", 123443, 1234354,"aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa");
   

    /*foreach ($empleado as $item) {
        # code...
        echo "<br>";
        echo $item;
    }*/
    
   
    echo Empleado::Hablar("español");


   echo "<br>";
   var_dump($empleado2);

   echo "<br>";
   echo "<br>";

    //nota: 
    // 1)no puedo instanciar varialbles en persona.php si sus atrivutos son privados
    // 2)Fatal error en metodo Hablar si lo uso como "abstract" 


    $fabrica = new Fabrica("S.s.a");
   // $fabrica->_empleados= $empleado;

    $fabrica->AgregarEmpleados($empleado);
   
    $fabrica->AgregarEmpleados($empleado2);
    
    $fabrica->AgregarEmpleados($empleado2);
    
   

    

    //var_dump($fabrica);

    $fabrica->EliminarEmpleado($empleado2); 

    var_dump($fabrica);

    $fabrica->GuardarFabrica();

    $fabrica->LeerFabrica();

    


?>