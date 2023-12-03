<?php 
    include ("connection_data.php");
    
    // Vérifie si l'ID est passé dans l'URL
    if(isset($_POST["submit"])){
        $testimonial_id = $_POST["testimonial_id"];
        
        // Requête SQL pour supprimer le témoignage avec l'ID spécifié
        $sql = "DELETE FROM testimonials WHERE id = $testimonial_id";
        
        // Exécute la requête
        $result = mysqli_query($conn, $sql);
        
        // Vérifie si la suppression a réussi
        if($result){
            header("Location: dashboard.php");
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    } else {
        // Redirige si l'ID n'est pas spécifié dans le formulaire
        header("Location: dashboard.php");
    }
?>
