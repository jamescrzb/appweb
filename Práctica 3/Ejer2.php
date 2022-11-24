<!DOCTYPE html>
<lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Ejercicio 2</title>
		<style>
			p{
				font-weight: bolder;
				font-size: large;
			}
		</style>
	</head>
	<body>
		<?php
			$countd1 = 0;
			$countd2 = 0;

            print "<p>Jugador 1</p>";
            for ($i=0; $i < 5; $i++) { 
                $dado = rand(1,6);
				$countd1 = $countd1 + $dado;
                print "<img src='./img/$dado.jpg' width='100px' height='100px'>\n";
            }
            print "<br>";
            print "<p>Jugador 2</p>";
            for ($i=0; $i < 5; $i++) { 
                $dado = rand(1,6);
				$countd2 = $countd2 + $dado;
                print "<img src='./img/$dado.jpg' width='100px' height='100px'>\n";
            }
			print "<p>El jugador 1 ha sacado $countd1, y el jugador 2 ha sacado $countd2.</p>";
			
			if ($countd1 > $countd2) {
				print "<p>Ha ganado el jugador 1.</p>";
			}
			elseif ($countd2 > $countd1) {
				print "<p>Ha ganado el jugador 2.</p>";
			}
			else {
				print "<p>Hubo un empate.</p>";
			}
		?>
	</body>
</html>