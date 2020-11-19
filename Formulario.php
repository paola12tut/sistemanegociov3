

<!DOCTYPE <!DOCTYPE html>
<html lang="en">

<title>ARTESONLINE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
         <!-- Link que nos enlace con las librerías de Bulma en línea-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css">
        <!-- <link rel='stylesheet' href='css/bulma.min.css' > -->
            <link rel='stylesheet' href='css/style.css' >
            <link rel="stylesheet" href="node_modules/bulma/css/bulma.min.css">



            </head>
<body background="registrobk.jpg">
<!-- La siguiente línea esta deshabilitada por que no esta habilitado en agregar.php 
      la puse para probar la impresión de una variable que trae datos de otra página 
      en este caso la variable $respuesta_consulta se definio como global en agregar.php
      y ahí se asigna el valor a imprimir-->
<!-- <p>respuesta: <?php // echo $Respuesta_consulta;?></p> -->

<form method="post" action="agregar.php">


<h3 class="title is-3">Ingrese sus datos:</h3>
<div class="field">
  <div class="control">
    <input class="input is-primary" type="text" placeholder="Ingrese su RFC:" name="Id_cte">    
  </div>
</div>

<div class="field">
  <div class="control">    
    <input class="input is-primary" type="text" placeholder="Ingrese su nombre completo:" name="Nombre_cte">
  </div>
</div>

<div class="field">
  <div class="control">    
    <input class="input is-primary" type="text" placeholder="Escriba su dirección:" name="Dir_cte">
  </div>
</div>

<div class="field">
  <div class="control">    
    <input class="input is-primary" type="text" placeholder="Escriba su número de teléfono:" name="Tel_cte">
  </div>
</div>

<p>

<!-- Botón que nos envía a la página agregar.php para añadir el registro -->
<input type="submit" value="enviar" button class="button is-primary is-rounded"></button>

<!-- Botón que nos envía a la página del formulario de registro -->
<a href="index.html" button class="button is-primary is-rounded">Cancelar</button> </a>
</p>

</fieldset>
</form>


</body>
</html>