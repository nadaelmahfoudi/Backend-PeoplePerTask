<?php 
    include ("connection_data.php");
    $id = $_GET["id"];
    if(isset($_POST["submit"])){
        $montant = $_POST["montant"];
        $deadline = $_POST["deadline"];
        $status = $_POST["status"];

        $sql = "UPDATE `offers` SET 
        `montant`='$montant',`deadline`='$deadline',`status`='$status' WHERE id= $id";

         $result = mysqli_query($conn , $sql);
         if($result){
            header("Location: offers.php");
         }else{
            echo "Failed: " . mysqli_error($conn);
         }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>CRUD</title>
</head>
<body>
     <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: black" >Crud</nav>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Offer Information</h3>
            <p class="text-muted">Click save changes after changing information!</p>
        </div>
    <?php  
    $id = $_GET["id"];
    $sql = "SELECT * FROM offers WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="POST" style="width:50vw; min-width:300px">
                <div class="mb-3" >
                    <label for="form-label">montant:</label>
                    <input type="text" class="form-control" name="montant" value="<?php echo $row["montant"]; ?>">
                </div>
                <div class="mb-3" >
                    <label for="form-label">deadline:</label>
                    <input type="text" class="form-control" name="deadline" value="<?php echo $row["deadline"]; ?>">
                </div>
                <div class=" form-group mb-3" >
                        <label >Status:</label>&nbsp;
                        <input type="radio" class="form-check-input" name="status" id="to do" value="to do">
                        <label for="to do" class="form-input-label">to do</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="status" id="in progress" value="in progress">
                        <label for="in progress" class="form-input-label">in progress</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="status" id="done" value="done">
                        <label for="done" class="form-input-label">done</label>
                    </div>
                <div>
                    <button type="submit" class="btn btn-success" name="submit" >Save Changes</button>
                    <a href="offers.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
