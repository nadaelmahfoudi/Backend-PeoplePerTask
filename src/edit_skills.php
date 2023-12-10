<?php
include("connection_data.php");

$id = $_GET["id"];

if (isset($_POST["submit"])) {
    $skill = $_POST["skill"];
    $sql = "UPDATE `skills` SET `skill`=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "si", $skill, $id);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("Location: skills.php");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
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
            <h3>Edit Skill Information</h3>
            <p class="text-muted">Click save changes after changing information!</p>
        </div>
    <?php  
    $id = $_GET["id"];
    $sql = "SELECT * FROM skills WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="POST" style="width:50vw; min-width:300px">
                <div class="mb-3" >
                    <label for="form-label">Skill:</label>
                    <input type="text" class="form-control" name="skill" value="<?php echo $row["skill"]; ?>">
                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="submit" >Save Changes</button>
                    <a href="skills.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
