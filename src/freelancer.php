<?php
include "connection_data.php";

$sql = "SELECT id, freelancer_name, skill, salary FROM freelancers";
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

    <div class="freelancer_section w-auto flex flex-col ">
        <h1 class="text-black dark:text-white text-center text-4xl">Liste des Freelancers</h1>

        <table class="table min-w-full bg-gray-600 border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b dark:text-white">Freelancer Name</th>
                    <th class="py-2 px-4 border-b dark:text-white">Skill</th>
                    <th class="py-2 px-4 border-b dark:text-white">Montant</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='py-2 px-4 border-b dark:text-white'>" . $row["freelancer_name"] . "</td>";
                        echo "<td class='py-2 px-4 border-b dark:text-white'>" . $row["skill"] . "</td>";
                        echo "<td class='py-2 px-4 border-b dark:text-white'>" . $row["salary"] . "</td>";
                        echo "<td class='py-2 px-4 border-b text-black'>
                            <span class='py-1'>
                                <form method='post' action='delete_freelancer.php' onsubmit='return confirmDelete(" . $row["id"] . ");'>
                                    <input type='hidden' name='freelancer_id' value='" . $row["id"] . "'>
                                    <button type='submit' class='text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm'>DELETE</button>
                                </form>
                                <a href='editfreelancer.php?id=" . $row['id'] . "' class='text-blue-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm'>EDIT</a>
                            </span>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='py-2 px-4 text-center border-b'>Aucun résultat trouvé</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>

        <button type="button" class="bg-custom-green text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800"><a href="addfreelancer.php">ADD</a></button>

    </div>

    <script>
        function confirmDelete() {
            return confirm("Voulez-vous vraiment supprimer ce freelancer?");
        }
    </script>

    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>
    <script src="../javascript/script.js"></script>
</body>

</html>
