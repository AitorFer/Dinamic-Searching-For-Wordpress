<?php
include 'conexion.php';

//$query = "SELECT DISTINCT Email FROM alumnus_main_table WHERE Curso = ";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <title></title>
  </head>
  <body>
    <h1 class="title">Consulta con el centro: <?php echo $_POST['centro'] ?> <br>Sobre: <?php echo $_POST['nombre']?></h1>

          <!--Formulario-->
  <form class="formulario-consulta" method="POST" action="sendbyemail.php">
    <div id="formulario">
          <h3>Nombre</h3>
            <input type="text" name="nombre" />
          <h3>Primer apellido</h3>
            <input type="text" name="apellidos_1"/>
          <h3>Segundo apellido</h3>
            <input type="text" name="apellidos_2"/>
          <h3>Telefono</h3>
            <input type="number" name="telefono"/>
          <br>
          <br>
           <input type="submit" name="Enviar" value="Enviar"/>
      </form>
    </div>
          <hr>


  </section>
  <script src="jquery.js"></script>
  <script type="text/javascript" src="./main.js"></script>

  </body>
</html>
