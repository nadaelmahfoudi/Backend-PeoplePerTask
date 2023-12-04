<?php
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "peoplepertask_data";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('La connexion a échoué : ' . $conn->connect_error);
    }else{
        // echo "DB connected !";
    }
?>