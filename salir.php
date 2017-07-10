
<!-- Verificar que la variable sal sea igual a si.
Cerrar la sesión. 
Redirigir el flujo a la pagina del login --> 

<?php
require("sesion.php");
if($_GET["sal"]=="si"){
session_destroy();
header("location:login.php");
}
?>