<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peoplepertask_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['testimonial_id'])) {
    $testimonialId = $_POST['testimonial_id'];

   
    $deleteSql = "DELETE FROM testimonials WHERE id = $testimonialId";

    if ($conn->query($deleteSql) === TRUE) {
        
        header("Location: dashboard.php");
        exit(); 
    } else {
        echo "Erreur lors de la suppression du témoignage : " . $conn->error;
    }
}

$conn->close();
?>
