<?php
include "connection_data.php";
include "session.php";

$sql = "SELECT projects.id, projects.title, projects.description, categories.categoryName
        FROM projects
        LEFT JOIN categories ON projects.categorie_id = categories.id";
$result = $conn->query($sql);

$categoryQuery = "SELECT * FROM categories";
$categoryResult = $conn->query($categoryQuery);

$categories = [];
while ($row = $categoryResult->fetch_assoc()) {
    $categories[] = $row;
}
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

    <div class="project_section w-auto flex flex-col px-12">
        <h1 class="text-black dark:text-white text-center text-4xl">PROJECTS</h1>
        <div class="py-4 flex flex-row">
        <h5 class="border-t-2 border-b-2 py-4 font-semibold text-lg font-serif px-6">
                PROJECTS
            </h5>
            <h5 class="border-t-2 border-b-2 py-4 font-semibold text-lg font-serif px-12">
                description
            </h5>
            <h5 class="border-t-2 border-b-2 py-4 font-semibold text-lg font-serif px-6">
                categoryName
            </h5>
            <h5 class="border-t-2 border-b-2 py-4 font-semibold text-lg font-serif px-6">
                Actions
            </h5>
        </div>
        <div class="py-4">
            
            <ul class="flex flex-col">
            <?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $project_id = $row["id"];
        
        echo '<li class="title flex flex-col border-b-2 h-20 sm:h-14 overflow-y-hidden px-2 ">
                <!-- Project information -->
                <div class="w-full flex gap-5 items-center">
                    <div class="flex-grow text-left">
                        <span class="w-1/2 email_user text-xs sm:text-sm">' . $row["title"] . '</span>
                    </div>
                    <div class="flex-grow text-left">
                        <span class="w-1/2 email_user text-xs sm:text-sm">' . $row["description"] . '</span>
                    </div>
                    <div class="flex-grow text-left">
                        <span class="w-1/2 email_user text-xs sm:text-sm">' . $row["categoryName"] . '</span>
                    </div>
                    <span class="py-1">
                        <!-- Actions for the project -->
                        <form method="post" action="delete_projet.php" onsubmit="return confirmDelete();">
                            <input type="hidden" name="id" value="' . $row["id"] . '">
                            <button type="submit" name="submit" class="text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">DELETE</button>
                        </form>
                        <a href="editproject.php?id=' . $row["id"] . '" class="text-blue-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">EDIT</a>
                    </span>
                </div>
                </li>';
    
        echo '<li class="offer-container">
                <!-- Offer information -->
                <div class="offers-container">';
        
        $query_offers = "SELECT o.*, u.first_name,u.last_name FROM offers o
                         JOIN users u ON o.user_id = u.id
                         WHERE o.project_id = ?";
        $stmt_offers = $conn->prepare($query_offers);
        $stmt_offers->bind_param("i", $project_id);
        $stmt_offers->execute();
        $result_offers = $stmt_offers->get_result();
        
        echo "<ul>";
        while ($offer = $result_offers->fetch_assoc()) {
            echo '<li >Voila l offre de ' . $offer['first_name'] . $offer['last_name'].' - Montant: ' . $offer['montant'] . ', Deadline: ' . $offer['deadline'] . '</li>';
            
            echo '<div class="flex gap-2 mt-2">
            <form method="post" action="update_response.php">
            <input type="hidden" name="offer_id" value="'  .$offer['id']. '?>">
            <button type="submit" name="accept" class="bg-green-500 text-white px-3 py-1 rounded-md">Accept</button>
            <button type="submit" name="reject" class="bg-red-500 text-white px-3 py-1 rounded-md">Reject</button>
        </form>
                  </div>';
        }
        
        echo "</ul>";
        
        echo '</div>
                </li>';
        
        $stmt_offers->close();
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>
    <script src="../javascript/script.js"></script>
</body>

</html>