	<?php 
	//error_reporting(0);

	function guardar(){
		$pid = $_GET["pid"];
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

		$sql = "SELECT tipo FROM tipo_char";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
			while($row = $result->fetch_assoc()) {
					//echo "id: " . $row["id"]."<br>";
				$tipo_char = $row["tipo"];
			}
		} else {
			echo "0 results";
		}

		$sql = "SELECT id, chars, file FROM chars_folder WHERE id = '".$pid."' ORDER BY id LIMIT 0,8";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
			while($row = $result->fetch_assoc()) {
					//echo "id: " . $row["id"]."<br>";
				
				$sql2 = "SELECT id, ganador, victorias FROM ganador_char WHERE ganador = '".$row["chars"]."' ORDER BY id LIMIT 0,10";
				$result2 = $conn->query($sql2);

				if ($result2->num_rows > 0) {
		  // output data of each row
					while($row2 = $result2->fetch_assoc()) {
						$contador = $row2["victorias"] + 1;
						$sql = 'UPDATE ganador_char SET victorias='.$contador.' WHERE ganador="'.$row["chars"].'"';

						if ($conn->query($sql) === TRUE) {
							echo '
							<div class="alert alert-dark">
							<strong>Success!</strong> Record updated successfully.
							</div>';
						} else {
							echo "Error updating record: " . $conn->error;
						}

					}
				} else {
					$sql3 = 'INSERT INTO ganador_char (ganador, victorias, tipo) VALUES ("'.$row["chars"].'",1,"'.$tipo_char.'")';
											//echo $sql;
					if ($conn->query($sql3) === TRUE) {
						echo '
						<div class="alert alert-success">
						<strong>Success!</strong> New record created successfully.
						</div>';
					} else {
						echo "Error: " . $sql3 . "<br>" . $conn->error;
					}
				}
				//asdjasd
			}
		} else {
			echo "0 results";
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
				<hr class="my-4">
				<p class="lead">
					<?php guardar(); ?>
				</p>
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