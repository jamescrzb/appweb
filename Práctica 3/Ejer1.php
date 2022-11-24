<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ejercicio 1</title>
		<style>
			fieldset{
				border: 2px solid purple;
				background-color: rgb(202, 163, 237);
				margin-bottom: 10px;
			}
			legend{
				border: 3px solid purple;
				padding-left: 5px;
				padding-right: 5px;
				background-color: white;
			}
		</style>
		
	</head>
	<body>
		<script>
			function erase() {
				document.star.height.value = ""
				document.star.width.value = ""
				document.getElementById('php').innerHTML=""
			}
		</script>
		<form action="Ejer1.php" method="post" name="star">
			<fieldset>
				<legend>Formulario</legend>
				<p>Escriba el alto y ancho (0 < número &#8804; 100) y
				mostraré un rectángulo de estrellas de ese tamaño.</p>
				<p>Ancho: <input type="number" name="height" id="height"></p>
				<p>Alto: <input type="number" name="width" id="width"></p>
				<input type="submit" value="Dibujar" name="Dibujar">
				<input type="button" value="Borrar" name="Borrar" onclick="erase()">
			</fieldset>	
		</form>
		<div id=php>	
			<?php
				if (isset($_REQUEST['Dibujar'])) {
					print "<fieldset>";
					print "<legend>Estrellitas cuadradas</legend>";
					$height = $_REQUEST['height'];
					$width = $_REQUEST['width'];
					if($height == "" || $width == ""){
						print "Debes introducir el ancho y el alto.";
					}
					elseif($height == "0" || $width == "0"){
						print "Debes introducir un número mayor que 0";
					}
					elseif($height >= "100" || $width >= "100"){
						print "Debes introducir un número menor que 100";
					}
					else{
						for ($i=0; $i < $width; $i++) { 
							for ($j=0; $j < $height; $j++) { 
								print "* ";
							}
							print "<br>";
						}
						print "\n";
					}
				}
			?>
		</div>
	</body>
</html>