	<?php

	error_reporting(0);

	function listarArchivos($path, $folder)
	{
		// Abrimos la carpeta que nos pasan como parámetro
		// echo $path." - ".$folder."<br>";
		$dir = opendir($path);
		// Leo todos los ficheros de la carpeta
		$carpeta_nombre = 0;
		while ($elemento = readdir($dir)) {
			// Tratamos los elementos . y .. que tienen todas las carpetas
			if ($elemento != "." && $elemento != "..") {
				// Si es una carpeta
				if (is_dir($path . $elemento)) {
					// Muestro la carpeta
					// echo "<p><strong>CARPETA: ". $elemento ."</strong></p>";
					// Si es un fichero
				} else {
					// Muestro el fichero
					// echo "<br />->". $elemento;
					$extension = pathinfo($elemento, PATHINFO_EXTENSION);
					$minus_extension = strtolower($extension);
					//echo "--".$extension;
					if ($minus_extension == "def") {
						// echo $folder." ".$elemento." ".$extension."<br>";
						$nombre_elemento  = substr($elemento, 0, -4);
						$minus_folder = strtolower($folder);
						$minus_nombre_elemento = strtolower($nombre_elemento);
						// echo $minus_folder." ".$minus_nombre_elemento."<br>";
						if ($minus_folder == $minus_nombre_elemento) {
							$carpeta_nombre = 1;
							// echo "contador aumentado<br>";
						}
					}
				}
			}
		}
		if ($carpeta_nombre == 0) {
			echo ' <span class="badge badge-danger">' . $folder . '</span> ';
		}
	}

	function index()
	{
		$thefolder = "C:/Users/Jose Ovando/Documents/Mugen/chars/";
		if ($handler = opendir($thefolder)) {
			while (false !== ($file = readdir($handler))) {
				//echo "$file<br>";
				$thefolder_intro = $thefolder . $file . "/";
				//echo $thefolder_intro."<br>";
				// Llamamos a la función para que nos muestre el contenido de la carpeta gallery
				listarArchivos($thefolder_intro, $file);
			}
			closedir($handler);
		}
	}

	?>

	<!DOCTYPE html>
	<html>

	<head>
		<title>MUGEN</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>

	<body>
		<div class="container p-3 my-3 border">
			<div class="jumbotron">
				<h1 class="display-4">Hello, Mugen!</h1>
				<p class="lead">
				<div class="alert alert-danger" role="alert">
					Chars que tienen que ser arreglados
				</div>

				</p>
				<hr class="my-4">
				<p><?php index(); ?></p>
				<p class="lead">
					<a class="btn btn-primary btn-lg" href="index.php" role="button">Volver</a>
				</p>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>

	</html>