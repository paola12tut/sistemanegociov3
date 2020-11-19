<!DOCTYPE <!DOCTYPE html>
<html lang="en">

    <head>
      <title>Inscripción</title>
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
      <!--
      <div class="field">
        <label class="label">INSCRIPCIÓN</label>
         <div class="control">
          <input class="input" type="text" placeholder="Ingrese su RFC :">
       </div>
      </div>

      <div class="control">
       <div class="select">
          <select>
            <option>Seleccione un curso</option>
           <option>Porcelana fría </option>
            <option>Tejidos</option>
         </select>
        </div>
     </div>

      <div class="notification is-warning">
        <button class="delete"></button> el costo de un curso son: $100 pesos MX
        <strong>Al finalizar la compra usted podrá <br></br>acceder en cualquier momento a su curso.</strong>
      </div>

      <div class="field is-grouped">
       <p class="control">
         <a class="button is-primary">Finalizar compra</a>
        </p>
        <p class="control">
         <a href="index.html" class="button is-light">Cancelar compra</a>
        </p>
     </div> -->

      <form method="post" action="agregar_insc.php">

        <h3 class="title is-3">Ingrese sus datos:</h3>
        <div class="field">
          <div class="control">
            <input class="input is-primary" type="text" placeholder="Ingrese su RFC:" name="Id_cte">    
          </div>
        </div>

        <div class="control">
          <label class="radio"> <input value= "1" type="radio" name="Id_cso">Porcelana fría</label>
          <label class="radio"> <input value= "2" type="radio" name="Id_cso">Tejido</label>
        </div>
        <!--
        <div class="field">
          <div class="control">    
            <input class="input is-primary" type="text" placeholder="Ingrese el curso:" name="Id_cso">
          </div>
        </div> -->
        
        <p>
          <!-- Botón que nos envía a la página agregar.php para añadir el registro -->
          <input type="submit" value="enviar" button class="button is-primary is-rounded"></button>

          <!-- Botón que nos envía a la página del formulario de registro -->
          <a href="index.html" button class="button is-primary is-rounded">Cancelar</button> </a>
        </p>
      </form>
    </body>
</html>