<?php
include("connection_data.php");

if (isset($_POST["submit"])) {
    $testimonial_id = $_POST["id"];
    $new_comment = $_POST["comment"];

    $sql = "UPDATE testimonials SET comment = '$new_comment' WHERE id = $testimonial_id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: dashboard.php");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
} elseif (isset($_GET["id"])) {
    $testimonial_id = $_GET["id"];
    $sql = "SELECT * FROM testimonials WHERE id = $testimonial_id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
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

    <title>CRUD</title>
    </head>

    <body>
        <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: black">Testimonials CRUD</nav>
        <div class="container">
            <div class="text-center mb-4">
                <h3>Edit Testimonial</h3>
                <p class="text-muted">Update the comment below and click "Save Changes"</p>
            </div>

            <div class="container d-flex justify-content-center">
                <form action="" method="POST" style="width:50vw; min-width:300px">
                    <div class="mb-3">
                        <label for="new_comment" class="form-label">New Comment:</label>
                        <textarea class="form-control" name="comment" rows="3"><?php echo $row["comment"]; ?></textarea>
                    </div>

                    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">

                    <div>
                        <button type="submit" class="btn btn-success" name="submit">Save Changes</button>
                        <a href="dashboard.php" class="btn btn-danger">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    </body>

    </html>
<?php
} else {
    header("Location: dashboard.php");
}
?>
