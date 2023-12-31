<?php 
    include ("connection_data.php");
    $id = $_GET["id"];
    if(isset($_POST["submit"])){
        $freelancer_name = $_POST["freelancer_name"];
        $skill = $_POST["skill"];
        $salary = $_POST["salary"];

        $sql = "UPDATE `freelancers` SET `freelancer_name`='$freelancer_name',
        `skill`='$skill',`salary`='$salary' WHERE id= $id";

         $result = mysqli_query($conn , $sql);
         if($result){
            header("Location: freelancer.php");
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
            <h3>Edit Freelancer Information</h3>
            <p class="text-muted">Click update after changing information!</p>
        </div>
    <?php  
    $id = $_GET["id"];
    $sql = "SELECT * FROM freelancers WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="POST" style="width:50vw; min-width:300px">
                <div class="mb-3">
                    <label for="form-label">Freelancer Name:</label>
                    <input type="text" class="form-control" name="freelancer_name" value="<?php echo $row["freelancer_name"]; ?>">
                </div>
                <div class="mb-3" >
                    <label for="form-label">Skill:</label>
                    <input type="text" class="form-control" name="skill" value="<?php echo $row["skill"]; ?>">
                </div>
                <div class="mb-3" >
                    <label for="form-label">Salary:</label>
                    <input type="text" class="form-control" name="salary" value="<?php echo $row["salary"]; ?>">
                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="submit" >Save Changes</button>
                    <a href="freelancer.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
