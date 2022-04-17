<?php
function reporte()
{
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

	$sql = "SELECT id, ganador, victorias, tipo FROM ganador_char ORDER BY ganador ASC";
	$result = $conn->query($sql);

	$i = "1";
	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {
			//echo "id: " . $row["id"]."<br>";
			echo '
					<tr>
				      <th scope="row">' . $i . '</th>
				      <td>' . $row["ganador"] . '</td>
				      <td>' . $row["victorias"] . '</td>
				      <td>' . $row["tipo"] . '</td>
				    </tr>
					';
			$i++;
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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>

	<script type="text/javascript" class="init">
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>
</head>

<body>
	<div class="container p-3 my-3 border">
		<div class="jumbotron">
			<h1 class="display-4">Hello, Mugen!</h1>
			<hr class="my-4">
			<p class="lead">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Luchador</th>
						<th scope="col">Victorias</th>
						<th scope="col">Tipo de Char</th>
					</tr>
				</thead>
				<tbody>
					<?php reporte();  ?>
				</tbody>
				<tfoot>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Luchador</th>
						<th scope="col">Victorias</th>
						<th scope="col">Tipo de Char</th>
					</tr>
				</tfoot>
			</table>
			</p>
			<p class="lead">
				<a class="btn btn-primary btn-lg" href="index.php" role="button">Volver</a>
			</p>
		</div>
	</div>
</body>

</html>