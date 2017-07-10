<!-- Evaluar que la sesión continue, verificando la variable de sesión creada para este propósito.
	Si la variable cambió su valor inicial se enviará la variable error=si al archivo salir.php -->
	<?php
session_start();


$_SESSION["usuario"];
$_SESSION["nombre"];
$_SESSION["apellido"];
$_SESSION["cargo"];

?>

