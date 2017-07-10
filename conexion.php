<!-- Conexión a la base de datos,
codificación de caracteres,
seleccion de base de datos. -->

<?php 
$conexion=mysql_connect("localhost","root","") or die("Error al conectar");
//echo "Conexion Exitosa <br>";

mysql_set_charset('utf8');

mysql_select_db("gestion_bodega") or die("Base de datos no encontrada");

//echo "La base de datos fue encontrada <br>";

 ?>

