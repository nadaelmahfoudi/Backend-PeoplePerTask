<?php

include("connection_data.php");
include_once 'session.php';

if (isset($_POST['submit'])) {
    signup();
} else if (isset($_POST['login'])) {
    login();
}

function signup()
{
    global $conn;

    if (isset($_POST['submit'])) {
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $confirmPassword = $_POST["confirmPassword"];
        $role = $_POST["role"];

        if (empty($_POST["first_name"]) || empty($_POST["last_name"]) || empty($_POST["password"]) || empty($_POST["confirmPassword"]) || empty($_POST["role"])) {
            echo "Please enter your information.";
        } else if (!preg_match('/^[A-Za-z\s]+$/', $first_name) || !preg_match('/^[A-Za-z\s]+$/', $last_name)) {
            echo "Invalid name.";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email.";
        } else if (strlen($_POST["password"]) < 6) {
            echo "Password must contain at least 6 characters.";
        } else if ($_POST["password"] == $confirmPassword) {
            // Prepare a query
            $sql = "INSERT INTO users (first_name, last_name, email, password, role) VALUES (?, ?, ?, ?, ?)";

            // Prepare a statement (mysqli_prepare)
            $stmt = mysqli_prepare($conn, $sql);

            // Bind the parameters (mysqli_stmt_bind_param)
            mysqli_stmt_bind_param($stmt, "sssss", $first_name, $last_name, $email, $password, $role);

            // Execute the prepared query (mysqli_stmt_execute)
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                header("Location: login.php");
                exit();
            } else {
                echo "Error executing query.";
            }

            // Make sure to close the statement after execution
            mysqli_stmt_close($stmt);
        } else {
            echo "Error: Passwords do not match.";
        }
    }
    // Close the database connection
    mysqli_close($conn);
}

function getAllUsers()
{
    global $conn;

    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $rows = [];

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    // Close the database connection
    mysqli_close($conn);

    return NULL;
}

?>
