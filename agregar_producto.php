<?php require("sesion.php");
      require("conexion.php");
if(!$_SESSION["usuario"]){
header("location:login.php?error=si");
}
?>
<!-- Inclución de archivos requeridos -->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <title>Agregar productos</title>
        <link rel="stylesheet" href="estilo.css"/>
    </head>
    <body>

        <div class="contenedor">
            <div class= "encabezado">
            <div class="izq">
        
            <p>Bienvenido/a:<br>
            <?php echo ucfirst($_SESSION["nombre"])." ".ucfirst($_SESSION["apellido"])?>
            </p>

            </div>
            <div class="centro">
                <?php
                    // La siguiente validación verifica el cargo del usuario que esta viendo esta pagina para asignarle el flujo que tendra el links con imagen "Home".
                    if ($_SESSION['cargo']=='Admin') {
                            echo "<a href=principalAdmin.php><center><img src='imagenes/home.png'><br>Home<center></a>";
                    }else {
                            echo "<a href=principalBodega.php><img src='imagenes/home.png'><br>Home</a>";
                    };

                    error_reporting(E_ALL  ^  E_NOTICE  ^  E_WARNING);
                ?> 
            </div>
            
            <div class="derecha">
                <!-- La siguiente línea corresponde al links con imagen para finalizar sesión, que redirige a la página salir.php con la varible "sal=si" que destruye la sesión y nos 
                    muestra la pagina del login. -->
                <a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
            </div>
        </div>
        <br><h1 align="center">GESTIÓN DE PRODUCTOS</h1>     

            <div class="formulario">
                <form name="registro" method="post" action="" enctype="application/x-www-form-urlencoded">
                    <div class="campo">
                        <label for="codigo">Código del producto:</label>
                        <input type="text" name="codigo" required/>
                    </div>

                    
                    <div class="campo">
                        <label for="nombre">Descripción:</label>
                        <input type="text" name="descripcion" required/>
                    </div>

                    <div class="campo">
                        <label for="stock">Stock:</label>
                        <input type="number" name="stock" required/>
                    </div>
                    

                    <div class="campo">
                        <label for="proveedor">Proveedor:</label>
                        <input type="text" name="proveedor" required/>
                    </div>

                    <div class="campo">
                        <label for="fecha">Fecha ingreso:</label>
                        <input type="date" name="fecha" required/>
                    </div>

                    <div class="botones">
                        <input type="submit" name="crear" value="Agregar producto"/>
                    </div>

                    <!-- Verificación del boton submit "crear".
                        Recuperar las variables con los valores ingresados.
                        Verificar que el código no exista en los registros. 
                            Si ya existe un producto con ese codigo:
                                Mostrar mensaje con información.

                            Si no existe un producto con ese código: 
                                Insertar los datos en la tabla correspondiente.

                        Redirigir el flujo a esta misma página -->
<?php
    if (isset($_POST['crear'])) {  

        $codigo      = $_POST["codigo"];
        $descripcion = $_POST["descripcion"];
        $stock       = $_POST["stock"];
        $proveedor   = $_POST["proveedor"];
        $fecha       = $_POST["fecha"];
        

$consulta="SELECT * FROM productos WHERE cod_producto='$codigo' LIMIT 1";
$ejecutar=mysql_query($consulta,$conexion) or die("No se pudo realizar la consulta <br>");

$result = mysql_num_rows($ejecutar);

if($result>0){
echo "No se puede ingresar el valor ya que existe";
}else{

$insertar = "INSERT INTO productos (cod_producto,descripcion,stock,proveedor,fecha_ingreso) 
            VALUES ('$codigo','$descripcion','$stock','$proveedor','$fecha')";
$ejecutar=mysql_query($insertar,$conexion) or die("No se pudo realizar la consulta <br>");

}
}

?>




                </form>
            </div>

        </div>
    </body>
</html>