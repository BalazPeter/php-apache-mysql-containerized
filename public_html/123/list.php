<body>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="UTF-8">
<script>
	if( window.history.replaceState ){
		window.history.replaceState(null, null, window.location.href);
	}
</script>
<?php
$servername = 'mysql';
$username = 'root';
$password = '123';
$dbname = 'myDB';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	printf("Connection failed<br>");
	die("Connection failed: " . $conn->connect_error);
} else {
	?>
	<div class="container" style="text-align: center;">
		<form method="post">
			<br><h2 align="center">Pridanie nového užívateľa.</h2><br>
			<table align="center" width="400">
				<tr><td style="border: none;">Vlozte meno:</td><td style="border: none;"><input type="text" placeholder="Povinné" style="border-radius: 15px 15px 15px 15px; box-shadow: 0 0 30px rgba(255, 255, 255, 1); text-align: center;" name="meno" required></td></tr>
				<tr><td style="border: none;">Vlozte heslo:</td><td style="border: none;"><input type="text" placeholder="Povinné" style="border-radius: 15px 15px 15px 15px; box-shadow: 0 0 30px rgba(255, 255, 255, 1); text-align: center;" name="heslo" required></td></tr>
				<tr><td style="border: none;">Vlozte cislo:</td><td style="border: none;"><input type="number" style="border-radius: 15px 15px 15px 15px; box-shadow: 0 0 30px rgba(255, 255, 255, 1); text-align: center;" name="cislo"></td></tr>
			</table><br>
			<input type="submit" name="submit" value="Pridať" style="margin: 10px; background-color: lightgreen; border-radius: 5px 5px 5px 5px; padding-left: 5px; padding-right: 5px; font-weight: bold; text-shadow: 2px 2px rgba(255, 255, 255, 0.5);">
		</form>
	</div><br><br><br>
	<div>
	<?php
		$vypis = "SELECT * FROM test2";
		$result = mysqli_query($conn, $vypis);
		printf("<table class=\"table\" align=\"center\" style=\"text-align: center;\">");
		printf("<tr>");
		printf("<th>Meno</th>");
		printf("<th>Heslo</th>");
		printf("<th>Cislo</th>");
		printf("<th>Edit / Delete</th>");
		printf("</tr>");

		if ($result->num_rows >0) {
			while ($row = $result->fetch_assoc()) {
				$ID = $row["ID"];
				printf("<form action=\"edit.php\" method=\"POST\">");
				printf("<tr>"); 
				echo "<td>" . $row["meno"] . "</td>";
				echo "<td>" . $row["heslo"] . "</td>";
				echo "<td>" . $row["cislo"] . "</td>";
				printf("<input type=\"hidden\" name=\"edit\" value=\"%d\">", $ID);
				printf("<td><input class=\"button\" type=\"image\" src=\"icons/edit.png\" alt=\"Submit\" value=\"$ID\" name=\"edit\" style=\"width: 30px; heigh: 30px;\"></td>");
				printf("</tr>");
				printf("</form>");
			}
		} 
		printf("</table>");
		printf("</div>");
	}

	if (isset($_POST['submit'])) {
		$meno = $_POST["meno"];
		$heslo = $_POST["heslo"];
		$cislo = $_POST["cislo"];

		$query = "INSERT INTO test2 (meno, heslo, cislo) VALUES ('$meno', '$heslo', '$cislo')";
		mysqli_query($conn, $query);

		$message = "Pouzivatel " . $meno . " uspesne pridany.";
	  	echo "<script type='text/javascript'>alert('$message');</script>";
	  	print("<meta http-equiv=\"refresh\" content=\"0; url=list.php\" />");
	}

	$conn->close();
	?>
	</body>
<?php 

?>