<?php
	/*$in = $_GET['in'];
	$response = array();
	if($in != NULL){
		$response['success'] = 1;
        $response['message'] = $in;
	} else {
		$response['success'] = 0;
        $response['message'] = NULL;
	}
	echo json_encode($response);*/
?>
<script>
	if( window.history.replaceState ){
		window.history.replaceState(null, null, window.location.href);
	}
</script>
<style>
	table, th, td {
  		border: 1px solid black;
	}

	th, td {
	  padding: 10px;
	}
</style>

<body>
<meta charset="UTF-8">
<!-- Tento script slúži na to, aby sa pri refreše sstránky nepridávali do databázy prázdne údaje, alebo
údaje, ktoré administrátor nechtiac obnovil -->
<script>
	if( window.history.replaceState ){
		window.history.replaceState(null, null, window.location.href);
	}
</script>

<div style="width: 99%; height: 160px; background-color: gray; padding: 10px; text-align: center;">
	<h1>Vlozenie udajov</h1>
	<form method="post">
		Vlozte suciastku: <input type="text" name="suciastka"><br>
		Vlozte pociatocny stav: <input type="number" name="status"><br><br>
		<input type="submit" name="submit" value="Pridaj">
	</form>
</div>
<br>
<div style="width: 99%;  background-color: green; padding: 10px; text-align: center;">
<?php
	$servername = "mysql";
	$username = "root";
	$password = "rootpassword";

	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

	$sql = "SELECT * FROM teamProj.suciastky";
	$result = $conn->query($sql);


	printf("<table class=\"table\" align=\"center\" style=\"text-align: center;\">");
		printf("<tr>");
			printf("<th>ID</th>");
			printf("<th>Suciastka</th>");
			printf("<th>Status</th>");
		printf("<tr>");


	if ($result->num_rows > 0) {
  		while($row = $result->fetch_assoc()) {
    		printf("<tr>"); 
				echo "<td>" . $row["ID"] . "</td>";
				echo "<td>" . $row["suciastka"] . "</td>";
				echo "<td>" . $row["status"] . "</td>";
			printf("</tr>");
  		}
	} 
	printf("</table>");
?>
</div>
</body>

<?php
	if (isset($_POST['submit'])) {					
		$suciastka = $_POST["suciastka"];
		$status = $_POST["status"];
		
		$query = "INSERT INTO teamProj.suciastky (suciastka, status) 
			VALUES ('$suciastka', '$status');";
		
		if(mysqli_query($conn, $query)){
			$message = "Suciastka " . $suciastka . " pridana uspesne.";
		  	echo "<script type='text/javascript'>alert('$message');</script>";
		  	print("<meta http-equiv=\"refresh\" content=\"0; url=lubik.php\" />");
		}
	}
?>










	