<?php
include "connection_data.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $offer_id = $_POST['offer_id'];
    $action = isset($_POST['accept']) ? 'accept' : (isset($_POST['reject']) ? 'reject' : '');

    if ($action === 'accept') {
        $update_query = "UPDATE offers SET client_response = 1 WHERE id = ?";
    } elseif ($action === 'reject') {
        $update_query = "UPDATE offers SET client_response = 0 WHERE id = ?";
    } 

    $stmt_update = $conn->prepare($update_query);
    $stmt_update->bind_param("i", $offer_id);
    $stmt_update->execute();
    header("Location: inbox.php");  
    exit();
}
?>
