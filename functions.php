<?php
    $dbhost = 'localhost:3307';
    $dbname = 'clases de artesania';
    $dbuser = 'root';
    $dbpass = '';
    
    $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    if ($connection->connect_error) die("Error Fatal");

    // Este pedazo de código es solo una prueba para imprimir un registro
    //$consulta = "select * from clientes"; // Esta linea hace la consulta
    //$result = queryMysql($consulta); // Esta línea ejecuta la consulta y lo guarda en una variable de tipo arreglo

    $result = queryMysql("SELECT * FROM clientes WHERE Id_cte='AAAAAAAAAAAAA'"); // Esta linea es prueba para imprimir un registro en específico
        
        // Aquí se verifica si existen registros, por eso la pregunta si la variable result tiene registros, la función
        // num_rows arroja la cantidad de registros encontrados
        if ($result->num_rows) 
        {
            // Asignamos a la variable row el numero de elemento del arreglo que es el activo 
            $row = $result->fetch_array(MYSQLI_ASSOC);
            {
                // Inicio del código HTML para imprimir el registro activo
                echo "
                <tr>
                <!-- Imprime el número de elemento indicado por la posición del elemento 
                que esta en row, en su campo Id_cte -->
                <td width='150'>".$row['Id_cte']."</td>

                <!-- Imprime el número de elemento indicado por la posición del elemento 
                que esta en row, en su campo Nombre -->
                <td width='150'>".$row['Nombre_cte']."</td>              
                <td width='150'></td>
                
                </tr>
                ";
                }
        }
        else echo "<p>No hay nada que mirar aquí</p><br>";


    

    function createTable($name, $query)
    {
        queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
        echo "Table '$name' created or already exists.<br>";
    }

    function queryMysql($query)
    {
        global $connection;
        $result = $connection->query($query);
        if (!$result) die("Fatal Error fatal");
        return $result;
    }

    function destroySession()
    {
        $_SESSION=array();

        if (session_id() != "" || isset($_COOKIE[session_name()]))
            setcookie(session_name(), '', time()-2592000, '/');
            
        session_destroy();
    }

    function sanitizeString($var)
    {
        global $connection;
        $var = strip_tags($var);
        $var = htmlentities($var);
        if (get_magic_quotes_gpc())
            $var = stripslashes($var);
        return $connection->real_escape_string($var);
    }

    function showProfile($user)
    {
        if (file_exists("$user.jpg"))
            echo "<img src='$user.jpg' style='float:left;'>";

        $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

        if ($result->num_rows)
        {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            echo stripslashes($row['text']) . "<br style= 'clear:left;'><br>";
        }
        else echo "<p>Nothing to see here, yet</p><br>";
    }
?>

