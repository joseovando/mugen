	<?php
	function formulario()
	{
		echo '<div class="form-group">
		<div class="card-columns">';

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

		$sql = "SELECT id, chars, file,imagen FROM chars_folder ORDER BY id LIMIT 0,8";
		$result = $conn->query($sql);

		$chars_list = "";
		if ($result->num_rows > 0) {
			// output data of each row
			while ($row = $result->fetch_assoc()) {
				//echo "id: " . $row["id"]."<br>";
				echo ' <div class="card">
				<img class="card-img-top" src="chars_img/' . $row["imagen"] . '" alt="Card image cap">
				<div class="card-body">
				<p class="card-text"><a href="guardar.php?pid=' . $row["id"] . '" class="btn btn-success btn-lg active" role="button" aria-pressed="true">' . $row["chars"] . '</a></p>
				</div>
				</div>
				';
			}
		} else {
			echo "0 results";
		}

		echo '</div></div>
		</form>';
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
				<br />
				<div class="input-group mb-3">
					<form action="" method="post">
						<select name="paises" id="paises" onchange="this.form.submit()" class="custom-select">
							<option value="">Seleccione...</option>
							<option value="Dios">Nivel Dios</option>
							<option value="Semi-Dios">Nivel Semi-Dios</option>
							<option value="Normal">Nivel Normal</option>
							<option value="Bonus Stage">Bonus Stage</option>
						</select>
					</form>
					<?php
					$paises = '';
					if (isset($_POST["paises"])) {
						$paises = $_POST["paises"];
					?>
						<div style="padding:20px;">
							<?php
							//echo "Has elegido el pais: ".$paises."";
							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "mugen";
							$conn = new mysqli($servername, $username, $password, $dbname);
							$conn = new mysqli($servername, $username, $password, $dbname);
							$sql = "TRUNCATE TABLE tipo_char";
							$result = $conn->query($sql);

							$servername = "localhost";
							$username = "root";
							$password = "";
							$dbname = "mugen";
							$conn = new mysqli($servername, $username, $password, $dbname);
							$sql = 'INSERT INTO tipo_char (tipo) VALUES ("' . $paises . '")';
							//echo $sql;
							if ($conn->query($sql) === TRUE) {
								//echo "New record created successfully";
							} else {
								echo "Error: " . $sql . "<br>" . $conn->error;
							}

							?></div>
					<?php } ?>

				</div>
				<p class="lead">
					<?php
					formulario();
					?>
				</p>
				<hr class="my-4">
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