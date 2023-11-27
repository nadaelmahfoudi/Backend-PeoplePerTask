<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peoplepertask_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['projet_id'])) {
    $projetId = $_POST['projet_id'];

   
    $deleteSql = "DELETE FROM projects WHERE id = $projetId";

    if ($conn->query($deleteSql) === TRUE) {
        
        header("Location: inbox.php");
        exit(); 
    } else {
        echo "Erreur lors de la suppression du projet : " . $conn->error;
    }
}

$conn->close();
?>
