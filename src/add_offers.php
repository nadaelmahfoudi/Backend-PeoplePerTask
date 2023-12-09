<?php
include("connection_data.php");
include("session.php");

if (isset($_POST["submit"])) {
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $montant = $_POST["montant"];
        $deadline = $_POST["deadline"];
        $status = $_POST["status"];

        $sql = "INSERT INTO `offers`(`montant`, `deadline`, `status`, `user_id`) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "dssi", $montant, $deadline, $status, $user_id);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            header("Location: offers.php");
        } else {
            echo "Failed: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "L'utilisateur n'est pas connecté.";
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
    <?php if(isset($_SESSION['name'])): ?>
     <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: black" >Welcome ! <?php echo $_SESSION['name']; ?></nav>
    <?php endif; ?>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Add new offer</h3>
            <p class="text-muted">Complete the form bellow to add a new offer </p>
        </div>
        <div class=" container d-flex justify-content-center">
            <form action="" method= "POST" style="width:50vw; min-width:300px">
                   
                    <div class="mb-3" >
                        <label for="form-label">montant:</label>
                        <input type="text" class="form-control" name="montant" placeholder="00">
                    </div>
                    <div class="mb-3" >
                        <label for="form-label">deadline:</label>
                        <input type="date" class="form-control" name="deadline" placeholder="../../....">
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
                        <button type="submit" class="btn btn-success" name="submit" >Save</button>
                        <a href="offers.php" class="btn btn-danger">Cancel</a>
                    </div>
            </form>
        </div>
    </div>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    </body>
</html>