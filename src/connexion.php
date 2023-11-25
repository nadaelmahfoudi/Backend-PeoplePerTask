<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "peoplepertask_data";


    $connexion = mysqli_connect($servername,$username,$password,$dbname);


    if(!$connexion){
        die("connection is failed: ".mysqli_connect_error());
    }
    echo "connected successfully";

?>
