<?php
include("session.php");
include("script.php");
include "connection_data.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$role = $_SESSION['role'];

if ($role == 'freelancer') {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT id, skill FROM skills WHERE user_id = $user_id";
} else {
    $sql = "SELECT id, skill, user_id FROM skills";
}

$result = $conn->query($sql);

if (!$result) {
    echo "Erreur SQL: " . $conn->error;
    exit();
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
    .freelancer_section {
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

    <div class="freelancer_section w-auto flex flex-col px-12 ">
        <h1 class="text-black dark:text-white text-center text-4xl">List of Skills </h1>

        <table class="table min-w-full bg-gray-600 border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b dark:text-white">Skill</th>
                    <th class="py-2 px-4 border-b dark:text-white">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='py-2 px-4 border-b dark:text-white'>" . $row["skill"] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-black'>
                            <span class='py-1'>
                                <form method='post' action='delete_skill.php' onsubmit='return confirmDelete(" . $row["id"] . ");'>
                                    <input type='hidden' name='id' value='" . $row["id"] . "'>
                                    <button type='submit' class='text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm'>DELETE</button>
                                </form>
                                <a href='edit_skills.php?id=" . $row['id'] . "' class='text-blue-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm'>EDIT</a>
                            </span>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3' class='py-2 px-4 text-center border-b'>Aucun résultat trouvé</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>

        <button type="button" class="bg-custom-green text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800"><a href="add_skills.php">ADD</a></button>

    </div>

    <script>
        function confirmDelete() {
            return confirm("Voulez-vous vraiment supprimer cette compétence?");
        }
    </script>

    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>
    <script src="../javascript/script.js"></script>
</body>

</html>
