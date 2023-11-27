<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "peoplepertask_data";


    $conn = new mysqli($servername, $username, $password, $dbname);

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["freelancer_id"])){
            $freelancerID = $_POST["freelancer_id"];

        $deletesql = "DELETE FROM freelancers WHERE id = $freelancerID ";

        if($conn->query($deletesql) === TRUE){
            header ("Location: freelancer.php");
            exit();
        }else{
            echo "error while deletting the freelancer :".$conn->error;
        }
    }

?>