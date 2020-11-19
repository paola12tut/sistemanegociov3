<?php
// Incluimos los datos de conexión y las funciones:
use illuminate\Database\Capsule\Manager as DB;

require 'vendor\autoload.php';
require 'config\database.php';
require_once 'datos.php';
require_once 'funciones.php';

    
    //Validamos que hayan llegado estas variables, y que no esten vacias:
    if (isset($_POST["Id_cte"], $_POST["Id_cso"]) and $_POST["Id_cte"] !="" and $_POST["Id_cso"]!="")
    {
        //traspasamos a variables locales, para evitar complicaciones con las comillas:
        $V_id_cte = $_POST["Id_cte"];
        $V_id_cso = $_POST["Id_cso"];
        $V_id_insc = $V_id_cte.$V_id_cso;

        // Captura la fecha actual y lo deposita en una variable
        $V_fecha_insc = date("Y/m/d");

        // imprime la fecha actual que esta en una variable - la desactive por el momento
        //echo $V_fecha_insc;

        //Preparamos la orden SQL
        $consulta = "INSERT INTO inscripcion(Id_insc,Id_cte,Id_cso,Fecha_insc) VALUES ('$V_id_insc','$V_id_cte','$V_id_cso','$V_fecha_insc')";
    
        //Aqui ejecutaremos esa orden y ademas validamos el resultado true o false del proceso por medio de if
        if (queryMysql($consulta) ) // En caso que el resultado obtenido sea verdadera es que si se dio de alta al registro
            {
                $result = queryMysql("SELECT Insc.Id_insc, Insc.Id_factura, Insc.Fecha_Insc, Cte.Id_cte, Cte.Nombre_cte, Cte.dir_cte, Cte.tel_cte, 	
                Cso.Nombre_cso, Cso.Nivel_cso,Cso.Costo_cso FROM inscripcion Insc 
                INNER JOIN clientes Cte ON Insc.Id_cte = Cte.Id_cte
                INNER JOIN cursos Cso ON Insc.Id_cso = Cso.Id_cso");
        
                // Aquí se verifica si existen registros, por eso la pregunta si la variable result tiene registros, la función
                // num_rows arroja la cantidad de registros encontrados
                if ($result->num_rows) 
                {
                    // Asignamos a la variable row el numero de elemento del arreglo que es el activo 
                    while($row = $result->fetch_array(MYSQLI_ASSOC))
                        {
                        // Inicio del código HTML para imprimir el registro activo
                        echo "
                        <tr>
                        <!-- Imprime el número de elemento indicado por la posición del elemento 
                        que esta en row, en su campo Id_cte -->
                        <td width='150'>".$row['Id_insc']."</td>
        
                        <!-- Imprime el número de elemento indicado por la posición del elemento 
                        que esta en row, en su campo Nombre -->
                        <td width='150'>".$row['Id_cte']."</td>              
                        <td width='150'></td>
                        
                        <!-- Imprime el número de elemento indicado por la posición del elemento 
                        que esta en row, en su campo Nombre -->
                        <td width='150'>".$row['Nombre_cte']."</td>              
                        <td width='150'></td>
                        </tr>                        
                        ";
                        }
                }
                else echo "<p>No hay nada que mirar aquí</p><br>";
        
                                              
                
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
            echo '<p>No se agregó <a href="inscripcion.php">Desea inscribirse nuevamente?</a></p>';
            echo '<p> <a href="Index.html">Regresar al Inicio</a></p>';
            }
    
    } else 
        {
        // Este mensaje es en caso que este vacío un campo
        echo '<p>Un campo dejo vacío, Por favor, complete el campo: <a href="inscripcion.php">Regresar al formulario</a></p>';
        }


?>