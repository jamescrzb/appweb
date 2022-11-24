<?php
	$name =trim(strip_tags($_REQUEST['name']));
	$phone = trim(strip_tags($_REQUEST['number']));
	$teach = trim(strip_tags($_REQUEST['teaching']));

	if(isset($_REQUEST['matr']) && !isset($_REQUEST['teaching'])){
		print "Es necesario introducir los datos completos.";
	}
	elseif(!isset($_REQUEST['matr']) && isset($_REQUEST['teaching'])){
		print "Es necesario introducir los datos completos.";
	}
	else if($name == "" || $phone == ""){
		print "Es necesario introducir los datos completos.";
	}
	else{
		if(strlen($name) >= 3 && strlen($phone) == 9){
			if ($_REQUEST['show'][0] == "Por pantalla") {
				print "El alumno $name, <br>";
				print "con teléfono $phone, <br>";
				if (isset($_REQUEST['matr'])) {
					print "está matriculado en";
					if ($teach == "Secun") {
						print " Secundaria.";
					}
					elseif ($teach == "Bach") {
						print " Bachillerato.";
					}
					elseif ($teach == "CM"){
						print " Ciclo Medio.";
					}
					elseif ($teach == "CS") {
						print " Ciclo Superior.";
					}
				}
				else {
					print "no está matriculado en ningún sitio.";
				}
			}
			else{
				print "El archivo ha sido creado <br>";
				$namefile = "datos.txt";
				if (isset($_REQUEST['matr'])) {
					if ($teach == "Secun") {
						$teach = "está matriculado en Secundaria.";
					}
					elseif ($teach == "Bach") {
						$teach = "está matriculado en Bachillerato.";
					}
					elseif ($teach == "CM"){
						$teach = "está matriculado en Ciclo Medio.";
					}
					elseif ($teach == "CS") {
						$teach = "está matriculado en Ciclo Superior.";
					}
				}
				else{
					$teach = "no está matriculado en ningún sitio.";
				}
				print $_REQUEST['show'][1];
				$text = "El alumno $name, con teléfono $phone, $teach";
				$file = fopen($namefile, 'w');
				fwrite($file, $text);
				fclose($file);
				print "Puedes acceder al archivo con el siguiente <a href='./datos.txt'>enlace</a>.";
			}	
		}
			
		else{
			print "El nombre debe tener más de 10 letras y el número debe tener 9 dígitos.";
		}
	}
?>