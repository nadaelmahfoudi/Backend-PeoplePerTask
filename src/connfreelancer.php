<?php

   $freelancer_name = $_POST["freelancer_name"];
   $skill = $_POST["skill"];
   $salary = $_POST["salary"];

   $conn = new mysqli('localhost','root','','peoplepertask_data');
   if ($conn->connect_error) {
      die('La connexion a échoué : '.$conn->connect_error);
   } else {
      echo 'connection reussie à la BD';
      $stmt = $conn->prepare("INSERT INTO freelancers (freelancer_name, skill, salary) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $freelancer_name, $skill, $salary);
      $stmt->execute();
      header("Location: freelancer.php");
      $stmt->close();
      $conn->close();
   }
?>