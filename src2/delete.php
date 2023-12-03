<?php 
    include ("connexion_data.php");
    $id = $_GET["id"];
    $sql = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header("Location: index3.php");
    }else{
        echo"failed: ".mysqli_error($conn) ;
    }
?>