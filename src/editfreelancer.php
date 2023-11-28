<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "peoplepertask_data";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('La connexion a échoué : ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit_freelancer_name']) && isset($_POST['edit_skill']) && isset($_POST['edit_salary'])) {
        $edit_freelancer_name = $_POST['edit_freelancer_name'];
        $edit_skill = $_POST['edit_skill'];
        $edit_salary = $_POST['edit_salary'];

        $sql = "UPDATE freelancers SET skill='$edit_skill', salary='$edit_salary' WHERE freelancer_name='$edit_freelancer_name'";

        if ($conn->query($sql) === TRUE) {
            header("Location: freelancer.php");
            exit();
        } else {
            echo "Erreur lors de la modification : " . $conn->error;
        }
    }
}

$conn->close();
?>
