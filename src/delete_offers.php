<?php 
    include "connection_data.php";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])){
            $offerID = $_POST["id"];

        $deletesql = "DELETE FROM offers WHERE id = $offerID ";

        if($conn->query($deletesql) === TRUE){
            header ("Location: offers.php");
            exit();
        }else{
            echo "error while deletting the offer :".$conn->error;
        }
    }

?>