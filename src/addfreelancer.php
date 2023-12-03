<?php 
    include ("connection_data.php");

    if(isset($_POST["submit"])){
        $freelancer_name = $_POST["freelancer_name"];
        $skill = $_POST["skill"];
        $salary = $_POST["salary"];

        $sql = "INSERT INTO `freelancers`(`id`, `freelancer_name`, `skill`, `salary`) VALUES
         (NULL,'$freelancer_name','$skill','$salary')";

         $result = mysqli_query($conn , $sql);
         if($result){
            header("Location: freelancer.php");
         }else{
            echo"failed:".mysqli_error($conn);
         }
        }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>FREELANCER SPACE</title>
</head>
<body>
     <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: black" >Crud</nav>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Add new freelancer</h3>
            <p class="text-muted">Complete the form bellow to add a new freelancer </p>
        </div>
        <div class=" container d-flex justify-content-center">
            <form action="" method= "POST" style="width:50vw; min-width:300px">
                    
                     <div class="mb-3">
                        <label for="form-label">Freelancer_name:</label>
                        <input type="text" class="form-control" name="freelancer_name" placeholder="albert">
                    </div>
                    <div class="mb-3" >
                        <label for="form-label">Skill:</label>
                        <input type="text" class="form-control" name="skill" placeholder="text">
                    </div>
                    <div class="mb-3" >
                        <label for="form-label">Salary:</label>
                        <input type="text" class="form-control" name="salary" placeholder="1000">
                    </div>


                    <div>
                        <button type="submit" class="btn btn-success" name="submit" >Save</button>
                        <a href="index3.php" class="btn btn-danger">Cancel</a>
                    </div>
            </form>
        </div>
    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    </body>
</html>