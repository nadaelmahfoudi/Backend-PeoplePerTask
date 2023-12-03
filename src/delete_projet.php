<?php 
    include ("connection_data.php");
    
    // Vérifie si l'ID est passé dans l'URL
    if(isset($_POST["submit"])){
        $id = $_POST["id"];
        
        // Requête SQL pour supprimer le projet avec l'ID spécifié
        $sql = "DELETE FROM projects WHERE id = $id";
        
        // Exécute la requête
        $result = mysqli_query($conn, $sql);
        
        // Vérifie si la suppression a réussi
        if($result){
            header("Location: inbox.php");
        } else {
            echo "failed: " . mysqli_error($conn);
        }
    } else {
        // Redirige si l'ID n'est pas spécifié dans l'URL
        header("Location: inbox.php");
    }
?>
