<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["newComment"], $_POST["testimonialId"])) {
    $new_comment = $_POST["newComment"];
    $testimonial_id = $_POST["testimonialId"];

    $conn = new mysqli('localhost', 'root', '', 'peoplepertask_data');
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("UPDATE testimonials SET comment = ? WHERE id = ?");
        $stmt->bind_param("si", $new_comment, $testimonial_id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        
        // Rediriger vers la page de tableau de bord avec les nouvelles données
        header("Location: dashboard.php");
        exit();
    }
}
?>
