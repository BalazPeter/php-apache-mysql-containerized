<?php
    $suciastka = $_POST["suciastka"];
    $status = $_POST["status"];
    $servername = "mysql";
    $username = "root";
    $password = "rootpassword";

    $conn = new mysqli($servername, $username, $password);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $query = "INSERT INTO teamProj.suciastky (suciastka, status) VALUES ('$suciastka', '$status');";

    if(mysqli_query($conn, $query)){
        echo "wooooo";
    }
    echo "hoooo";
    mysqli_close($conn);

