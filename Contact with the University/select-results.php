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
  </body>
  </html>

<?php
$where="";

$provincia=$_POST['provincia'];
$ciudad=$_POST['ciudad'];

////////////////////// BOTON BUSCAR //////////////////////////////////////

if (isset($_POST['buscar']))
{

  

  if (!empty($_POST['provincia']) && empty($_POST['ciudad']))
  {
    $where="where Provincia like '".$provincia."%'";
  }

  else if (empty($_POST['provincia']) && !empty($_POST['provincia']))
  {
    $where="where Ciudad='".$ciudad."'";
  }

  else if(!empty($_POST['provincia']) && !empty($_POST['ciudad']))
  {
    $where="where Provincia like '".$provincia."%' and Ciudad='".$ciudad."'";
  }
  
}

$salida = "";
$query = "SELECT * FROM alumnus_main_table $where";


$resultado = $mysqli->query($query);
if($resultado->num_rows > 0){

    $salida.="<table class='tabla_datos'>
                <thead>
                  <tr>
                    <td>Curso</td>
                    <td>Provincia</td>
                    <td>Ciudad</td>
                    <td>Modalidad</td>
                    <td>Centro</td>
                    <td>Solicita</td>
                </tr>
              </thead>
              <tbody>";
while($fila = $resultado->fetch_assoc()){
  $centro = trim($fila['Centro']);
  $nombre1 = trim($fila['Curso']);
  //$email = trim($fila['email']);
  $salida.="<tr>
            <td>".$fila['Curso']."</td>
            <td>".$fila['Provincia']."</td>
            <td>".$fila['Ciudad']."</td>
            <td>".$fila['Modalidad']."</td>
            <td>".$fila['Centro']."</td>
            <td><form method='POST' action='formulario.php' name='info-form'><input class='' type='submit' value='Solicitar informacion' />
            <input type='hidden' name='centro' value='$centro'/>
            <input type='hidden' name='nombre' value='$nombre1'/>

            </form>
          </tr>";
}
$salida.="</tbody></table>";

}else{
  $salida.="No hay datos";
}
echo $salida;
$mysqli->close();

?>