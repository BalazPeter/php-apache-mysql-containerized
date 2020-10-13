<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="UTF-8">
<script>
	if( window.history.replaceState ){
		window.history.replaceState(null, null, window.location.href);
	}
</script>

<style type="text/css">
	.hover:hover{
	transform: scale(1.2);
</style>

<?php
	
$servername = 'mysql';
$username = 'root';
$password = 'rootpassword';
$dbname = 'myDB';
$conn = new mysqli($servername, $username, $password, $dbname);
error_reporting(0);

if ($conn->connect_error) {
	printf("Connection failed<br>");
	die("Connection failed: " . $conn->connect_error);
} else {
	$id = $_POST["edit"];

	$sql = "SELECT * FROM test2 WHERE ID = $id";
	$result = mysqli_query($conn, $sql);
	printf("<div style=\"text-align: center;\" class=\"container\">");
	?>
	<div style="position: absolute; left: 10px;">
		<a href="list.php"title="Naspäť"><img class="button" src="icons/back.png" style="width: 50px; height: 50px;"></a>
	</div>
	<?php

	printf("<form method=\"POST\">");
	if($result->num_rows >0){
		while($row = $result->fetch_assoc()){
			
			$meno = $row["meno"];
			$heslo = $row["heslo"];
			$cislo = $row["cislo"];
			printf("<br>Meno: <input type=\"text\" style=\"border-radius: 15px 15px 15px 15px; box-shadow: 0 0 30px rgba(255, 255, 255, 1); text-align: center;\" name=\"meno1\" value=\"$meno\" ><br><br>");
			printf("Heslo: <input type=\"text\" style=\"border-radius: 15px 15px 15px 15px; box-shadow: 0 0 30px rgba(255, 255, 255, 1); text-align: center;\" name=\"heslo1\" value=\"$heslo\" ><br><br>");
			printf("Cislo: <input type=\"number\" style=\"border-radius: 15px 15px 15px 15px; box-shadow: 0 0 30px rgba(255, 255, 255, 1); text-align: center;\" name=\"cislo1\" value=\"$cislo\" ><br><br>");
			printf("<input type=\"hidden\" name=\"edit\" value=\"%d\">", $id);
		}
	}
	printf("<input type=\"submit\" value=\"Edit\" name=\"editme\" style=\"margin: 10px; background-color: lightgreen; border-radius: 5px 5px 5px 5px; padding-left: 5px; padding-right: 5px; font-weight: bold; text-shadow: 2px 2px rgba(255, 255, 255, 0.5);\">");
	printf("<input type=\"submit\" value=\"Delete\" name=\"deleteme\" style=\"margin: 10px; background-color: red; border-radius: 5px 5px 5px 5px; padding-left: 5px; padding-right: 5px; font-weight: bold; text-shadow: 2px 2px rgba(255, 255, 255, 0.5);\" onclick=\"return confirm('Naozaj chces zmazat uzivatela %s ?')\">", $meno);
	printf("</form>");
	printf("</div>");
}

if (isset($_POST['editme'])) {
	$meno1 = $_POST["meno1"];
	$heslo1 = $_POST["heslo1"];
	$cislo1 = $_POST["cislo1"];
	$id = $_POST["edit"];
	$edit = "UPDATE test2 SET meno='$meno1', heslo='$heslo1',cislo='$cislo1' WHERE ID = '$id'";
	mysqli_query($conn, $edit);
	if ($conn->query($edit) === TRUE) {
		$message = "Pouzivatel " . $meno . " uspesne pozmeneny.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		print("<meta http-equiv=\"refresh\" content=\"0; url=list.php\" />");
	}
}

if (isset($_POST['deleteme'])) {
	$id = $_POST["edit"];
	$delete = "DELETE FROM test2 WHERE ID = '$id'";
	mysqli_query($conn, $delete);
	$message = "Pouzivatel " . $meno . " uspesne zmazany.";
	echo "<script type='text/javascript'>alert('$message');</script>";
	print("<meta http-equiv=\"refresh\" content=\"0; url=list.php\" />");
}

$conn->close();
	
?>