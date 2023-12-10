<?php 
    include "connection_data.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
        $skill_id = $_POST["id"];

        $sql = "DELETE FROM skills WHERE id = $skill_id";

        if ($conn->query($sql) === TRUE) {
            header("Location: skills.php");
            exit();
        } else {
            echo "Error while deleting the skill: " . $conn->error;
        }
    }
?>
