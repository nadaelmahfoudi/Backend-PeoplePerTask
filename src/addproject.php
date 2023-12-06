<?php
include("connection_data.php");
$categoryQuery = "SELECT * FROM categories";
$categoryResult = $conn->query($categoryQuery);

if (!$categoryResult) {
    die("Error fetching categories: " . $conn->error);
}

$categories = [];
while ($row = $categoryResult->fetch_assoc()) {
    $categories[] = $row;
}



$query = "SELECT projects.*, categories.categoryName FROM projects
          INNER JOIN categories ON projects.categorie_id = categories.id";
$result = mysqli_query($conn, $query);

$projects = [];
while ($row = mysqli_fetch_assoc($result)) {
    $projects[] = $row;
}

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $category = $_POST["categorie_id"]; 

    $sql = "INSERT INTO `projects`(`id`, `title`, `description`, `categorie_id`) VALUES (NULL,'$title','$description', '$category')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: inbox.php");
    } else {
        echo "failed: " . mysqli_error($conn);
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

    <title>ADD_Projects</title>
</head>
<body>
     <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: black" >Projects CRUD</nav>
    <div class="container">
        <div class="text-center mb-4">
            <h3>Add new Project</h3>
            <p class="text-muted">Complete the form below to add a new project </p>
        </div>
        <div class="container d-flex justify-content-center">
            <form action="" method= "POST" style="width:50vw; min-width:300px">

                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" name="title" placeholder="Project Title">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" name="description" placeholder="Project Description" rows="3"></textarea>
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
                    <button type="submit" class="btn btn-success" name="submit" >Save </button>
                    <a href="inbox.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
