<?php
// Incluimos los datos de conexión y las funciones:
use illuminate\Database\Capsule\Manager as DB;

require'vendor\autoload.php';
require'config\database.php';
require_once 'datos.php';
require_once 'funciones.php';

    
    //Validamos que hayan llegado estas variables, y que no esten vacias:
    if (isset($_POST["Id_cte"], $_POST["Nombre_cte"], $_POST["Dir_cte"], $_POST["Tel_cte"]) 
    and $_POST["Id_cte"] !="" and $_POST["Nombre_cte"]!="" and $_POST["Dir_cte"]!="" and $_POST["Tel_cte"]!="")
    {
        //traspasamos a variables locales, para evitar complicaciones con las comillas:
        $Id = $_POST["Id_cte"];
        $Nombre = $_POST["Nombre_cte"];
        $Dir = $_POST["Dir_cte"];
        $Tel = $_POST["Tel_cte"];
   
        //Preparamos la orden SQL
        $consulta = "INSERT INTO clientes(Id_cte,Nombre_cte,Dir_cte,Tel_cte) VALUES ('$Id','$Nombre','$Dir','$Tel')";
    
        //Aqui ejecutaremos esa orden y ademas validamos el resultado true o false del proceso por medio de if
        if (queryMysql($consulta) ) // En caso que el resultado obtenido sea verdadera es que si se dio de alta al registro
            {
                // Esta línea define una variable de tipo global para que la pueda usar cualquier página de este proyecto
                // siempre y cuando sea una página PHP - por el momento la voy a deshabilitar
                //global $Respuesta_consulta;
                // Se le asigna la leyenda se registro para enviarla a otra págian como aviso - También la deshabilito
                //$Respuesta_consulta = 'Se registro';

                // Imprimo la leyenda de que se ha registrado exitosamente             
                echo "<p>Registro agregado.</p>";

                // Me regreso a la página del formulario automáticamente - también la deshabilito
                //include('formulario.php');    

                echo "<a href=index.html>Volver al inicio</a>";
                
                
            } 
        else {
            // En caso que el resultado obtenido sea falso es que no se dio de alta al registro             
            echo '<p>No se agregó <a href="formulario.php">Regresar al formulario</a></p>';
            echo '<p> <a href="Index.html">Regresar al Inicio</a></p>';
            }
    
    } else 
        {
        // Este mensaje es en caso que este vacío un campo
        echo '<p>Un campo dejo vacío, Por favor, complete el campo: <a href="formulario.php">Regresar al formulario</a></p>';
        }


?>