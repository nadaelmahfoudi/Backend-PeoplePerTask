<?php 
    

    $conn = new mysqli('localhost','root','','peoplepertask_data');
    if($conn->connect_error){
        die("la connexion a été échouée: ".$conn->connect_error);
    }else{
        $categoriename = htmlspecialchars(trim($_POST["categoryName"]));
        echo "connected !";
        $stmt = $conn->prepare("INSERT INTO categories(categoryName) VALUES (?)");
        $stmt->bind_param("s",$categoryName);
        $stmt->execute();
        echo "categorie ajoutée avec succés";
        $stmt->close();
        $conn->close();
    }

?>
