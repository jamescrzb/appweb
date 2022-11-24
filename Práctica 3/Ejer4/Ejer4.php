<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Agenda Virtual PHP</title>
	</head>
	<body>
		<script>
			function erase() {
				document.getElementById('php').innerHTML="";
			}
		</script>
		<div id="php">
			<?php
				if (isset($_REQUEST['save'])) {
					$name = trim(strip_tags($_REQUEST['name']));
					$job = trim(strip_tags($_REQUEST['job']));
					$phone = trim(strip_tags($_REQUEST['phone']));
					$home = trim(strip_tags($_REQUEST['home']));
					$other = trim(strip_tags($_REQUEST['other']));

					if(strlen($name) >= 5 && strlen($phone) == 9 && strlen($job) > 5 && strlen($home) > 3 && strlen($other) > 3){
						$namefile = "agenda.txt";	
						$filea = fopen($namefile, 'a');
						fwrite($filea, "$name;$job;$phone;$home;$other" . PHP_EOL);
						fclose($filea);

						$filer = fopen($namefile, 'r');
						while (($line=fgets($filer)) !== false){
							$contacts = explode(';', $line);
							print "Contacto: $contacts[0], $contacts[1], $contacts[2], $contacts[3], $contacts[4] <br>";
						}
						fclose($filer);
					}
					else{
						print "Necesitas rellenar los campos con una longitud adecuada.";
					}
				}
			?>
		</div>
		<form action="Ejer4.php" method="post">
			<br>
			Agenda Virtual PHP
			<h3>Contactos</h3>
			Para guardar presione el botón. <br>
			Nombre: <input type="text" name="name"> <br>
			Trabajo: <input type="text" name="job"> <br>
			Teléfono: <input type="number" name="phone"><br>
			Dirección: <input type="text" name="home"><br>
			Otras: <input type="text" name="other">	<br>
			<input type="submit" value="Guardar!" name="save">
			<input type="submit" value="Reset" name="reset" onclick="erase()">
			<p>Buscar persona <input type="text" name="search" id="search"></p>
			<input type="submit" value="Buscar" name="searchclick"><br>
		</form>
		<?php
			if(isset($_REQUEST['searchclick'])){
				$names = trim(strip_tags($_REQUEST['search']));
				if(strlen($names) >= 3){
					$namefile = "agenda.txt";	
					$file = fopen($namefile, 'r');
					while (($line=fgets($file)) !== false){
						$contacts = explode(';', $line);
						$nameb = $contacts[0];
						if ($names == $nameb) {
							print "Contacto: $contacts[0], $contacts[1], $contacts[2], $contacts[3], $contacts[4] <br>";
						}
					}
					fclose($filer);
				}
				else{
					print "Introduce el nombre correcto.";
				}
			}
		?>
	</body>
</html>