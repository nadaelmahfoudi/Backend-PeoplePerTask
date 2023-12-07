<?php 
    include ("connection_data.php");
    $categoryQuery = "SELECT * FROM categories";
    $categoryResult = $conn->query($categoryQuery);

if (!$categoryResult) {
    die("Error fetching categories: " . $conn->error);
}

$categories = [];
while ($row = $categoryResult->fetch_assoc()) {
    $categories[] = $row;
}

$id = $_GET["id"];

if (isset($_POST["submit"])) {
    $title = htmlspecialchars(trim($_POST["title"]));
    $description = htmlspecialchars(trim($_POST["description"]));
    $category = htmlspecialchars(trim($_POST["categorie_id"]));

    $sql = "UPDATE `projects` SET `title`=?, `description`=?, `categorie_id`=? WHERE `id`=?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $title, $description, $category, $id);

    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("Location: inbox.php");
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
     <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: black" >Edit project</nav>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Project Information</h3>
            <p class="text-muted">Click update after changing information!</p>
        </div>
    <?php  
    $id = $_GET["id"];
    $sql = "SELECT * FROM projects WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="POST" style="width:50vw; min-width:300px">
                <div class="mb-3">
                    <label for="form-label">Project Title:</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $row["title"]; ?>">
                </div>
                <div class="mb-3" >
                    <label for="form-label">Description:</label>
                    <input type="text" class="form-control" name="description" value="<?php echo $row["description"]; ?>">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category:</label>
                    <select class="form-select" name="categorie_id">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['id']; ?>"><?php echo $category['categoryName']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-success" name="submit" >Save Changes</button>
                    <a href="inbox.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
