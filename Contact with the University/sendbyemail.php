<?php
include 'conexion.php';


if(isset($_POST['Enviar'])) {

//las variables de email hay que cambiarlas por el $_POST['email'] recibidp desde el formulario
//del archivo where-study.php asi se enviara al correo exacto del centro
$nombre = $_POST['nombre'];
$apellidos_1 = $_POST['apellidos_1'];
$apellidos_2 = $_POST['apellidos_2'];
$telefono = $_POST['telefono'];

$email_to = "email@email.com";
$email_subject = "Contacto desde el sitio web";

// Aquí se validan los datos ingresados por el usuario
if(!isset($_POST['nombre']) || !isset($_POST['apellidos_1']) || !isset($_POST['apellidos_2']) || !isset($_POST['telefono'])){

echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
die();
}
echo "<h4>".$nombre."</h4>";
echo "<h4>".$apellidos_1."</h4>";
echo "<h4>".$apellidos_2."</h4>";
echo "<h4>".$telefono."</h4>";  

$email_message = "Nombre: " .$nombre. "\n";
$email_message .= "Apellido 1: " .$apellidos_1. "\n";
$email_message .= "Apellido 2: " .$apellidos_2. "\n";
$email_message .= "Telefono: " .$telefono. "\n";


// Enviamos el e-mail usando la función mail()
//$headers = 'From: '.$email_from."\r\n".
//'Reply-To: '.$email_from."\r\n" .
//'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject,  $email_message);

echo "¡El formulario se ha enviado con exito!";
}
?>
