<?php require("conexion.php");?>
<!-- incluir archivos requeridos.
	Verificar la confirmación de la contraseña.
		Recuperar las variables con los datos ingresados en el formulario. 
		Validar que el rut ingresado no se encuantre en la base de datos.
			Si ya existe un registro vinculado al rut ingresado:
				Redirigir a login y entregar mensaje.
			Si no existe:
			Insertar datos en tabla correspondiente.
			Redirigir a login y mostrar mensaje.
	Si las contraseñas no existen redirigir a login y mostrar mensaje. -->  
<?php
if($_POST["contrasena1"]==$_POST["contrasena2"]){

$rut        = $_POST["rut"];
$nombre     = $_POST["nombre"];	
$apellido   = $_POST["apellido"];	
$cago       = $_POST["cargo"];	
$contrasena = md5($_POST["contrasena1"]);		


$consulta="SELECT * FROM personal WHERE rut='$rut' LIMIT 1";
$ejecutar=mysql_query($consulta,$conexion) or die("No se pudo realizar la consulta <br>");
$result = mysql_num_rows($ejecutar);

if($result>0){
//echo "ERROR, El rut ya se encuentra registrado";
	header("location:crear_personal.php?error=2");
exit();

}else{

$insertar = "INSERT INTO personal (rut,nombre,apellido,cargo,contraseña) 
			VALUES ('$rut','$nombre','$apellido','$cago','$contrasena')";
$ejecutar=mysql_query($insertar,$conexion) or die("No se pudo realizar la consulta <br>");

header("location:crear_personal.php?exito=1");
}
}else{
	//echo "Las Contraseñas no coinciden";
	header("location:crear_personal.php?error=1");
exit();
}
?>

