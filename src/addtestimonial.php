<?php

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["comment"])) {
    $testimonial_comment = $_POST["comment"];

    $conn = new mysqli('localhost', 'root', '', 'peoplepertask_data');
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    } else {
        echo "Connected!";
        $stmt = $conn->prepare("INSERT INTO testimonials(comment) VALUES (?)");
        $stmt->bind_param("s", $testimonial_comment);
        $stmt->execute();
        echo "Témoignage ajouté avec succès";
        header ("Location: dashboard.php");
        exit();
        $stmt->close();
        $conn->close();

    }

}

?>
