<?php
include 'conexion.php';

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
     <script type="text/javascript" src="jquery.js"></script>
  </head>
  <body>
    <section class="principal">
         
           <h1 class="title"><?php echo htmlspecialchars($_POST['nombre'])?></h1>

            <?php
            $nombre = $_POST['nombre'];
            $alumnus = $mysqli->query("SELECT DISTINCT Provincia, Ciudad, Modalidad FROM alumnus_main_table WHERE Curso = '$nombre'");
            $Ciudades = $mysqli->query("SELECT DISTINCT Provincia, Ciudad FROM alumnus_main_table WHERE Curso = '$nombre'");

            $resProvincias = $mysqli->query("SELECT DISTINCT Provincia FROM alumnus_main_table WHERE Curso = '$nombre'");
            $resCiudades = $mysqli->query("SELECT DISTINCT Ciudad FROM alumnus_main_table WHERE Curso = '$nombre'");
            $resModalidad = $mysqli->query("SELECT DISTINCT Modalidad FROM alumnus_main_table WHERE Curso = '$nombre'");
           

            ?>

            <!--Provincia-->
            <select id="provincia" name="provincia" ><option value="">Selecciona Provincia</option>
              <?php
             // str_replace("%body%", "black", "<body text='%body%'>");
               
                while ($registroProvincias = $resProvincias->fetch_array(MYSQLI_BOTH))

                { 

                  echo '<option id="option-provincia" class="'.$registroProvincias['Provincia'].'" value="'.$registroProvincias['Provincia'].'">'.$registroProvincias['Provincia'].'</option>';
                  

                }

              ?>
            </select>
            <!--Ciudad-->
            <select id="poblaciones" name="ciudad"><option value="">Selecciona Ciudad</option>
              <?php
                while ($registroCiudades = $Ciudades->fetch_array(MYSQLI_BOTH))
                {
                  echo '<option id=""option-ciudad class="'.$registroCiudades['Provincia'].'" value="'.$registroCiudades['Ciudad'].'">'.$registroCiudades['Ciudad'].'</option>';
                 
                }
              ?>

                </select> 
                

              <script type="text/javascript">
              //SELECT DINAMICOS
        // Consigue el elemento provincias/poblaciones por su identificador id. Es un método del DOM de HTML
        var id1 = document.getElementById("provincia");
        var id2 = document.getElementById("poblaciones");
        var valor = $('#provincia').val();
        // Añade un evento change al elemento id1, asociado a la función cambiar()
        if (id1.addEventListener) {     // Para la mayoría de los navegadores, excepto IE 8 y anteriores
            id1.addEventListener("change", cambiar);
        } else if (id1.attachEvent) {   // Para IE 8 y anteriores
            id1.attachEvent("change", cambiar); // attachEvent() es el método equivalente a addEventListener()
        }

        // Definición de la función cambiar()
        function cambiar() {
            for (var i = 0; i < id2.options.length; i++)
            
            // -- Inicio del comentario -- 
            // Muestra solamente los id2 que sean iguales a los id1 seleccionados, según la propiedad display
            if(id2.options[i].getAttribute("class") == id1.options[id1.selectedIndex].getAttribute("class")){
                id2.options[i].style.display = "block";
                console.log('cambiado');
                $('.table_datos').html('<h3>Holaa</h3>');

            }else{
                id2.options[i].style.display = "none";
            }
            // -- Fin del comentario --
                    
            id2.value = "";
        }

        // Llamada a la función cambiar()
        cambiar();

        
    </script>
    <!--cambiar tabla dinamicamente segun resultado  de option-->

    <script type="text/javascript"> 
  
</script>
            <!--Modalidad-->
            <select><option value="" name="modalidad">Selecciona Modalidad</option>
              <?php
                while ($registroModalidad = $resModalidad->fetch_array(MYSQLI_BOTH))
                {
                  echo '<option value="'.$registroModalidad['Modalidad'].'">'.$registroModalidad['Modalidad'].'</option>';
                }
              ?>
            </select>
          </form>
          
      <script type="text/javascript" src="./main.js"></script>
      <script type="text/javascript">
          </script>
        </body>
        <br><br>
      </html>
<?php
$salida = "";
$query = "SELECT * FROM alumnus_main_table WHERE Curso = '$nombre'";



$resultado = $mysqli->query($query);
if($resultado->num_rows > 0){
  $result = array();

    $salida.="<table class='tabla_datos'>
                <thead>
                  <tr>
                    <td>Curso</td>
                    <td>Solicita</td>
                    <td>Centro</td>
                    <td>Provincia</td>
                    <td>Ciudad</td>
                    <td>Modalidad</td>
                   
                   
                </tr>
              </thead>
              <tbody>";
while($fila = $resultado->fetch_assoc()){
  $centro = trim($fila['Centro']);
  $nombre1 = trim($fila['Curso']);
  //$email = trim($fila['email']);

  //variables de parseo de consulta mysql a json
  $curso = $fila['Curso'];
  $provincia = $fila['Provincia'];
  $ciudad = $fila['Ciudad'];
  $modalidad = $fila['Modalidad'];
  $centro = $fila['Centro'];

  $salida.="<tr class='".$provincia."'>
            <td>".$fila['Curso']."</td>
            <td><form method='POST' action='formulario.php' name='info-form'><input class='' type='submit' value='Solicitar informacion' />
            <input type='hidden' name='centro' value='$centro'/>
            <input type='hidden' name='nombre' value='$nombre1'/>
            <td>".$fila['Centro']."</td>
            <td>".$fila['Provincia']."</td>
            <td>".$fila['Ciudad']."</td>
            <td>".$fila['Modalidad']."</td>
            </form>
          </tr>";

//creamos el array insertamos los datos que iran en el json
          $result[] = array('Curso' => $curso, 'Centro' =>$centro, 'Provincia' => $provincia , 'Ciudad' => $ciudad, 'Modalidad' => $modalidad);
}
$salida.="</tbody></table>";

}else{
  $salida.="No hay datos";
}
echo $salida;
$mysqli->close();

//crear fichero json y pasar el objeto
$json_string = json_encode($result);
$file = 'result.json';
file_put_contents($file, $json_string);
 ?>
