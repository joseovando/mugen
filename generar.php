		<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mugen";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "TRUNCATE TABLE chars_folder";
		$result = $conn->query($sql);

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mugen";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn = new mysqli($servername, $username, $password, $dbname);
		$sql = "TRUNCATE TABLE stages_folder";
		$result = $conn->query($sql);

		$files = glob('chars_img/*'); //obtenemos todos los nombres de los ficheros
		foreach ($files as $file) {
			if (is_file($file))
				unlink($file); //elimino el fichero
		}

		copy('Kfm.png', 'chars_img/Kfm.png');

		//error_reporting(0);

		function listarArchivos3($path)
		{
			// Abrimos la carpeta que nos pasan como parámetro
			// echo $path."<br>";
			$dir = opendir($path);
			$imagen = "Kfm.png";
			// Leo todos los ficheros de la carpeta
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
						//echo "<br />->". $elemento;
						$extension = pathinfo($elemento, PATHINFO_EXTENSION);
						$minus_extension = strtolower($extension);
						//echo "--".$extension;
						if ($minus_extension == "jpg") {
							//echo $elemento."<br>";
							$origen = $path . $elemento;
							$destino = "chars_img/" . $elemento;
							$ale = rand(1, 10000);
							copy($origen, $destino);
							$carpeta = "chars_img/";
							rename($destino, $carpeta . $ale . $elemento);
							$imagen = $ale . $elemento;
						}

						if ($minus_extension == "png") {
							//echo $elemento."<br>";
							$origen = $path . $elemento;
							$destino = "chars_img/" . $elemento;
							$ale = rand(1, 10000);
							copy($origen, $destino);
							$carpeta = "chars_img/";
							rename($destino, $carpeta . $ale . $elemento);
							$imagen = $ale . $elemento;
						}

						if ($minus_extension == "bmp") {
							//echo $elemento."<br>";
							$origen = $path . $elemento;
							$destino = "chars_img/" . $elemento;
							$ale = rand(1, 10000);
							copy($origen, $destino);
							$carpeta = "chars_img/";
							rename($destino, $carpeta . $ale . $elemento);
							$imagen = $ale . $elemento;
						}

						if ($minus_extension == "ico") {
							//echo $elemento."<br>";
							$origen = $path . $elemento;
							$destino = "chars_img/" . $elemento;
							$ale = rand(1, 10000);
							copy($origen, $destino);
							$carpeta = "chars_img/";
							rename($destino, $carpeta . $ale . $elemento);
							$imagen = $ale . $elemento;
						}
					}
				}
			}

			return $imagen;
		}

		function listarArchivos($path, $folder, $n_chars)
		{
			// Abrimos la carpeta que nos pasan como parámetro
			// echo $path." - ".$folder."<br>";
			$dir = opendir($path);
			// Leo todos los ficheros de la carpeta
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
							//echo $minus_folder." ".$minus_nombre_elemento."<br>";
							if ($minus_folder == $minus_nombre_elemento) {
								$pos = rand(1, 1000000);

								$imagen = listarArchivos3($path);

								$servername = "localhost";
								$username = "root";
								$password = "";
								$dbname = "mugen";
								$conn = new mysqli($servername, $username, $password, $dbname);
								$sql = 'INSERT INTO chars_folder (id, chars, file, imagen) VALUES (' . $pos . ', "' . $folder . '","' . $elemento . '", "' . $imagen . '")';
								//echo $sql;
								if ($conn->query($sql) === TRUE) {
									//echo "New record created successfully";
								} else {
									echo "Error: " . $sql . "<br>" . $conn->error;
								}
							}
						}
					}
				}
			}
		}

		function listarArchivos2($path)
		{
			// Abrimos la carpeta que nos pasan como parámetro
			// echo $path." - ".$folder."<br>";
			$dir = opendir($path);
			// Leo todos los ficheros de la carpeta
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



							//echo $elemento."<br>";
							$pos = rand(1, 1000000);
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "mugen";
							$elemento_stage = "stages/" . $elemento;
							$conn = new mysqli($servername, $username, $password, $dbname);
							$sql = 'INSERT INTO stages_folder (id, stages) VALUES (' . $pos . ', "' . $elemento_stage . '")';
							//echo $sql;
							if ($conn->query($sql) === TRUE) {
								//echo "New record created successfully";
							} else {
								echo "Error: " . $sql . "<br>" . $conn->error;
							}
						}
					}
				}
			}
		}

		function index()
		{
			$thefolder = "C:/Users/Jose Ovando/Documents/Mugen/chars/";
			$n_chars = 0;

			if ($handler = opendir($thefolder)) {
				while (false !== ($file = readdir($handler))) {
					//echo "$file<br>";
					$thefolder_intro = $thefolder . $file . "/";
					//echo $thefolder_intro."<br>";
					// Llamamos a la función para que nos muestre el contenido de la carpeta gallery
					listarArchivos($thefolder_intro, $file, $n_chars);
				}
				closedir($handler);
			}

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "mugen";
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT id, chars, file FROM chars_folder ORDER BY id LIMIT 0,8";
			$result = $conn->query($sql);

			$chars_list = "";
			if ($result->num_rows > 0) {
				// output data of each row
				while ($row = $result->fetch_assoc()) {
					//echo "id: " . $row["id"]."<br>";
					$chars_list = $chars_list . $row["chars"] . "
						";
				}
			} else {
				echo "0 results";
			}

			$thefolderStages = "C:/Users/Jose Ovando/Documents/Mugen/stages/";
			listarArchivos2($thefolderStages);
			$stages_list = "";

			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "mugen";
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT id, stages FROM stages_folder ORDER BY id LIMIT 0,50";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while ($row = $result->fetch_assoc()) {
					//echo "id: " . $row["id"]."<br>";
					$stages_list = $stages_list . $row["stages"] . "
						";
				}
			} else {
				echo "0 results";
			}

			$archivo_select = "C:/Users/Jose Ovando/Documents/Mugen/data/select.def";
			$fh = fopen($archivo_select, 'w') or die("Se produjo un error al crear el archivo");

			$texto1 = <<<_END
				;---------------------------------------------------------------------
				[Characters]
				Normal Dan Joe 2021
				randomselect
				_END;

			$texto2 = <<<_END
				randomselect
				randomselect
				;-----------------------
				[ExtraStages]
				_END;

			$texto3 = <<<_END
				[Options]
				arcade.maxmatches = 6,1,1,0,0,0,0,0,0,0
				team.maxmatches = 4,1,1,0,0,0,0,0,0,0			
				_END;

			$texto = "";
			$texto = $texto . $texto1 . "
				";
			$texto = $texto . $chars_list . "
				";
			$texto = $texto . $texto2 . "
				";
			$texto = $texto . $stages_list . "
				";
			$texto = $texto . $texto3;

			fwrite($fh, $texto) or die("No se pudo escribir en el archivo");

			fclose($fh);

			echo '
				<div class="alert alert-info" role="alert">
				<strong>Se ha escrito</strong>, sin problemas.
				</div>
				';
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
					<div class="alert alert-primary" role="alert">
						<h2>select.def</h2> Generado
					</div>
					</p>
					<hr class="my-4">
					<?php index(); ?>
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