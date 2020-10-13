<!DOCTYPE html>
<html>
<head>
    <title>Init page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style type="text/css">
    </style>
</head>
<body style="text-align: center;">
<br>
<div class="container"><br>
<table class="table" align="center" style="width: 80%;">
<tr><th colspan="2">Príprava MySQL a PHP</th></tr>
<?php
$host = 'mysql';
$user = 'root';
$pass = '123';
$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    printf("<tr style=\"background-color: rgba(255, 0, 0, 0.5);\"><td>Spojenie s databázou</td><td>Chyba</td></tr>");
    die("Chyba spojenia: " . $conn->connect_error);
} else {
    printf("<tr style=\"background-color: rgba(0, 255, 0, 0.5);\"><td>Spojenie s databázou</td><td>OK</td></tr>");
    $sql = "CREATE DATABASE IF NOT EXISTS myDB";
	if ($conn->query($sql) === TRUE) {
    	printf("<tr style=\"background-color: rgba(0, 255, 0, 0.5);\"><td>Vytvorenie databázy</td><td>OK</td></tr>");
    	$db = 'myDB';
    	$conn = new mysqli($host, $user, $pass, $db);
    	$sql = "CREATE TABLE IF NOT EXISTS test2(ID INT(3) AUTO_INCREMENT PRIMARY KEY, meno VARCHAR(20), heslo VARCHAR(20), cislo int(10))ENGINE=InnoDB;";
    	if ($conn->query($sql) === TRUE) {
    		printf("<tr style=\"background-color: rgba(0, 255, 0, 0.5);\"><td>Vytvorenie tabuľky</td><td>OK</td></tr>");
		} else {
    		printf("<tr style=\"background-color: rgba(255, 0, 0, 0.5);\"><td>Vytvorenie tabuľky</td><td>Chyba</td></tr>");
		}

        $select = "SELECT * FROM test2 WHERE meno='Jakub Blaško';";
        $result = mysqli_query($conn, $select);
        if ($result->num_rows <= 0) {
            $sql2 = "INSERT INTO test2 (meno, heslo, cislo) VALUES ('Jakub Blaško', 'TopSecret', 1234567890);";
            if ($conn->query($sql2) === TRUE) {
                printf("<tr style=\"background-color: rgba(0, 255, 0, 0.5);\"><td>Vytvorenie prvého záznamu</td><td>OK</td></tr>");
            } else {
                printf("<tr style=\"background-color: rgba(255, 0, 0, 0.5);\"><td>Vytvorenie prvého záznamu</td><td>Chyba</td></tr>");
            }
        }
        ?>
            
        <?php

	} else {
    	printf("<tr style=\"background-color: rgba(255, 0, 0, 0.5);\"><td>Vytvorenie databázy</td><td>Chyba</td></tr>");
    }
}
?>
</table><br>
<h1>Presmerovanie na stranu za:</h1>
<meta http-equiv="Refresh" content="5; url=list.php" />
<a href="list.php"><img src="icons/timer.gif" width="250" height="250" style="border-radius: 50%; box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.5);"></a><br><br>
Alebo stlačte obrazok
<br><br>
</div>
</body>
</html>
