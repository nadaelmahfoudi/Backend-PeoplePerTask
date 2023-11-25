<?php

   $username = $_POST["username"];
   $email = $_POST["email"];
   $password = $_POST["password"];

   $conn = new mysqli('localhost','root','','peoplepertask_data');
   if ($conn->connect_error) {
      die('La connexion a échoué : '.$conn->connect_error);
   } else {
      echo 'connection reussie à la BD';
      $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $username, $email, $password);
      $stmt->execute();
      echo "Inscription réussie";
      $stmt->close();
      $conn->close();
   }
?>
