<?php
    $title = $_POST["title"];
    $description = $_POST["description"];

    $conn = new mysqli('localhost', 'root', '', 'peoplepertask_data');
    if ($conn->connect_error) {
        die('not connected: ' . $conn->connect_error);
    } else {
        echo "connected!";
        $stmt = $conn->prepare("INSERT INTO projects (title, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $description);
        $stmt->execute();
        header("Location: inbox.php");
        $stmt->close();
        $conn->close();
    }
?>
