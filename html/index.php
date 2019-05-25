
<?php

include 'conexion.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <title>Resultado grado grado_universitario_combinado</title>
  </head>
  <body>
    <section class="principal">
          <h1 class="title">Pagina Prueba buscador-principal</h1>

          <div class="form-1-2">
            <label for="caja_busqueda_grado">Buscar:</label>
            <input type="text" name="caja_busqueda" id="caja_busqueda">
          </div>

      <!--///////////////////////////////////////////////////////////-->

          <!--BOTONES DEVUELVE DATOS DE TABLAS SEGUN GRADOS-->
        <form method="post">
          <div id="botones-busqueda">
          <button type="button" id="grado-universitario" value="Grado" name="grado_universitario" action="grado-universitario.php">Grados</button>
          <button type="button" id="doble-grado" action="doble-grado.php" name="doble_grado" value="Dobles Grados">Doble Grado</button>
          <button type="button" id="fp-superior" name="fp_superior" value="FP Superior" action="fp-superior.php">Fp Superior</button>
          <button type="button" id="fp-medio" name="fp_medio" value="FP Medio" action="fp-medio.php">Fp Medio</button>
        </div>
      </form>
          <hr>

          <div id="datos">


            </div>

  </section>
  <script src="jquery.js"></script>
  

  </body>
</html>
