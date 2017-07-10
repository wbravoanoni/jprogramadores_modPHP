<?php require("sesion.php");
      require('conexion.php');

if(!$_SESSION["usuario"]){
header("location:login.php?error=si");
}
?>
<!-- Inclución de archivos requeridos -->

<!DOCTYPE html> 
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<title>Entregas</title>
		<link type="text/css" href="estilo.css" rel="stylesheet">

	</head>

	<body>
		<div class="contenedor">
			<div class= "encabezado">
	        	<div class="izq">
	        		<p>Bienvenido/a:<br>
	        	<?php echo ucfirst($_SESSION["usuario"])." ".ucfirst($_SESSION["apellido"]);?>
	        		</p>
	        	</div>

	            <div class="centro">
	            	<a href=principalBodega.php><img src='imagenes/home.png'><br>Home</a>
	            </div>
	            
	            <div class="derecha">
	                <a href="salir.php?sal=si"><img src="imagenes/cerrar.png"><br>Salir</a>
	            </div>
	        </div>

			<h1 align='center'>ENTREGAS REALIZADAS</h1>
			<br><br>
			<?php

				$consulta="SELECT * FROM entregas";
				$ejecutar=mysql_query($consulta,$conexion);
		
				echo "<table  width='80%' align='center'><tr>";	         	  
				echo "<th width='20%'>RUT</th>";
				echo "<th width='20%'>CÓDIGO DEL PRODUCTO</th>";
				echo "<th width='20%'>CANTIDAD</th>";
				echo "<th width='20%'>FECHA DE ENTREGA</th>";
				echo  "</tr>"; 
		
				while($result=mysql_fetch_array($ejecutar)){	
	          	
		          echo "<tr>";	         	  
				  echo '<td width=20%>'.$result['rut'].'</td>';
				  echo '<td width=20%>'.$result['cod_producto'].'</td>';
				  echo '<td width=20%>'. $result['cantidad'].'</td>';
				  echo '<td width=20%>'.$result['fecha_entrega'].'</td>';
				  echo "</tr>";
				}
			 	echo "</table></br>";
			?>
</div>
	</body>
</html>