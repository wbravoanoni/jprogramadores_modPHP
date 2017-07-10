<?php

require("conexion.php");
require("sesion.php");

$usuario	= $_POST["usuario"];
$contrasena = md5($_POST["pass"]);
$ingresar   = $_POST["ingresar"];



$consulta="SELECT cargo,nombre,apellido 
			FROM personal WHERE rut='$usuario' 
			AND contraseña='$contrasena' LIMIT 1";

$ejecutar=mysql_query($consulta,$conexion) or die("No se pudo realizar la consulta <br>");

echo "Consulta exitosa <br>";

$result = mysql_num_rows($ejecutar);

if($result>0){
echo "existe el valor";

while($registro=mysql_fetch_array($ejecutar)){

$cargo    = $registro["cargo"];
$nombre   = $registro["nombre"];
$apellido = $registro["apellido"];

}

$_SESSION["usuario"]  = $usuario;
$_SESSION["nombre"]   = $nombre;
$_SESSION["apellido"] = $apellido;
$_SESSION["cargo"]	  = $cargo;

if($cargo=="Admin"){
header("location:principalAdmin.php");
}elseif($cargo=="Bodega"){
header("location:principalBodega.php");
}else{
header("location:login.php?error=si");
}


}else{

header("location:login.php?error=si");
};

?>


<!-- incluir archivos requeridos.
	Obtener variables con los datos ingresados en login, la contraseña debe estar dentro de una función hash.
	Verificar que exista el registro en la base de datos.
		Si el registro existe entonces:
			Iniciar sesión.
			Crear variables de sesión a ocupar.
			Asignar los permisos según el cargo. 

		Si no existe el registro enviar una variable para mostra mensaje en pagina de login. 
	-->



   

