<!DOCTYPE html>
<html>

<head>
    <title>dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
</head>

<body class="overflow-x-hidden dark:bg-gray-900 ">
    <!-- header -->
    <?php include "header.php"; ?>
    <!-- header -->
    <!-- side bar -->
    <?php include "sidebar.php"; ?>
    <!-- end side bar -->

    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "peoplepertask_data";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('La connexion a échoué : ' . $conn->connect_error);
    }

  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        if (isset($_POST["categoryName"])) {
            $categoryName = $_POST["categoryName"];
            

            $stmt = $conn->prepare("INSERT INTO categories (categoryName) VALUES (?)");
            $stmt->bind_param("s", $categoryName);
            $stmt->execute();

            $stmt->close();
        }
    }

  
    
    $sql = "SELECT  distinct P.title, C.categoryName FROM categories C inner JOIN projects P ON C.id = P.categorie_id";
    $result = $conn->query($sql);
    ?>
    
    <section class="flex flex-col py-8 flex-grow dark:bg-gray-900 dark:text-white">
        <h1 class="text-3xl text-center font-bold">Category Management</h1>
        <div class="flex p-4 gap-6 justify-center flex-col">
            <div class="shadow-sm rounded-lg gap-2 bg-slate-500 p-5  flex flex-col items-center">
                <h2 class="text-xl font-semibold text-white">Add Category</h2>
                <div class="flex   gap-4">
                    <form method="post">
                        <input name="categoryName" class="rounded-md p-1 border-2 dark:text-black" type="text"
                            placeholder="Name of category" required>
                        <button type="submit" class="bg-gray-50 p-2 rounded-md cursor-pointer dark:text-black">ADD</button>
                    </form>
                </div>
            </div>
            <div id="parent_of_categories" class="flex flex-col border">
                <ul class="flex text-center text-white items-center bg-slate-500 dark:bg-gray-800 dark:text-white">
                    <li class="w-2/3 text-xs md:text-lg p-4">NAME OF CATEGORY</li>
                    <li class="w-1/3 text-xs md:text-lg p-4">PROJECT TITLE</li>
                </ul>
                <?php
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<ul class="flex text-center text-white items-center bg-slate-500 dark:bg-gray-800 dark:text-white">
                                <li class="w-2/3 text-xs md:text-lg p-4">' . $row["categoryName"] . '</li>
                                <li class="w-1/3 text-xs md:text-lg p-4">' . $row["title"] . '</li>
                              </ul>';
                    }
                } else {
                    echo "<p>No categories found</p>";
                }
    
                $conn->close();
                ?>
            </div>
        </div>
    </section>
    </div>

    <dialog id="edit_category" class="w-auto h-auto  dark:bg-gray-800 dark:text-white">
        <div id="clse_btn_category_edit" class="flex justify-end p-6">
            <svg width="18" height="21" viewBox="0 0 18 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3 3L8.75 10.5M14.5 18L8.75 10.5M8.75 10.5L14.5 3L3 18" stroke="#FF0909" stroke-width="7" />
            </svg>
        </div>
        <div class="flex flex-col justify-center items-center w-full h-2/3">
            <div class="flex flex-col justify-items-center content-between gap-5 w-2/3 h-2/3 ">
                <h1 class="text-center text-lg lg:text-2xl text-blue-600">EDIT CATEGORY</h1>
                <form class="flex flex-col gap-2 w-5/6 sm:w-2/3 m-auto">
                    <input type="text" id="input_submit_edit_category" placeholder="enter new name"
                        class="border h-12 dark:text-black px-1 lg:text-lg">
                    <button type="submit" id="btn_submit_edit_category"
                        class="bg-blue-600 border px-2 w-1/2 m-auto py-1">submit</button>
                </form>
            </div>
        </div>
    </dialog>

    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>
    <script src="../javascript/script.js"></script>

</body>

</html>
