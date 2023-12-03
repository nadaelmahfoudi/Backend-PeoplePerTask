<?php
include "connection_data.php";

$sql = "SELECT id, title, description FROM projects";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="../dist/output.css" rel="stylesheet">
</head>

<style>
    .project_section {
        display: flex;
        justify-content: center;
    }
</style>

<body class="overflow-x-hidden dark:bg-gray-900 dark:text-white">
    <!-- header -->
    <?php include "header.php"; ?>
    <!-- header -->
    <!-- side bar -->
    <?php include "sidebar.php"; ?>
    <!-- end side bar -->

    <div class="project_section w-auto flex flex-col ">
        <h1 class="text-black dark:text-white text-center text-4xl">PROJECTS</h1>

        <div class="py-4">
            <h5 class="border-t-2 border-b-2 py-4 font-semibold text-lg font-serif px-2">
                PROJECTS
            </h5>
            <ul class="flex flex-col">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="title flex flex-col border-b-2 py-3  h-20  sm:h-14 overflow-y-hidden px-2 ">
                                    <div class="w-full flex gap-5 items-center">
                                        <div class="flex-grow text-left">
                                            <span class="w-1/2 email_user text-xs sm:text-sm">' . $row["title"] . '</span>
                                        </div>
                                        <div class="flex-grow text-left">
                                            <span class="w-1/2 email_user text-xs sm:text-sm">' . $row["description"] . '</span>
                                        </div>
                                        
                                        <span class="py-1">
                                        <form method="post" action="delete_projet.php" onsubmit="return confirmDelete();">
                                        <input type="hidden" name="id" value="' . $row["id"] . '">
                                        <button type="submit" name="submit" class="text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">DELETE</button>
                                    </form>
                                    
                                            <a href="editproject.php?id=' . $row["id"] . '" class="text-blue-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">EDIT</a>
                                        </span>
                                    </div>
                                </li>';
                    }
                } else {
                    echo "<p>Aucun projet trouvé</p>";
                }
                ?>
                <li class="title flex flex-col border-b-2 py-3  h-20  sm:h-14 overflow-y-hidden px-2 ">
                    <div class="w-full flex gap-5 items-center">
                        <a href="addproject.php" class="bg-custom-green text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">ADD</a>

                    </div>
                </li>
            </ul>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Voulez-vous vraiment supprimer ce projet?");
        }
    </script>

    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>
    <script src="../javascript/script.js"></script>
</body>

</html>
