<?php
include 'conexion.php';

$salida = "";
$query = "SELECT DISTINCT Curso FROM alumnus_main_table WHERE Tipo = 'fp-medio' ORDER By ID"; //and Cliente = 1

$resultado = $mysqli->query($query);

if($resultado->num_rows > 0){

    $salida.="<table class='tabla_datos'>
                <thead>
                  <tr>
                    <td>Curso</td>
                </tr>
              </thead>
              <tbody>";
while($fila = $resultado->fetch_assoc()){
  $nombre = trim($fila['Curso']) ;
  $salida.="<tr>
            <td>".$fila['Curso']."<form method='POST' action = 'http://proyectos.thelastdock.com/alumnus2/donde-estudiar/'><input class='where-study' type='hidden' name='nombre' value='$nombre' />
            <input class='where-study' type='submit' value='Donde estudiar' />
            </form></td>
          </tr>";
}
$salida.="</tbody></table>";

}else{
  $salida.="No hay datos";
}
echo $salida;
$mysqli->close();
 ?>
