<?php 
     $comment = $_post["comment"];

     $conn = new mysqli('localhost','root','','peoplepertask_data');
     if($conn->connect->error){
        die("connection échouée: ", $conn->connect->error);
     }else{
        echo "connected";
        $stmt->prepare("INSERT INTO testimonials VALUES(?)");
        $stmt->blind_param("s",$comment);
        $stmt->execute();
            echo "Testimonial ajouté avec  succés";
        $stmt->close();
        $conn->close();
     }


?>