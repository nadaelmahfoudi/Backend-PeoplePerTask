<!doctype html>
<html >

<head>
    <title>dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    
</head>

<body class="overflow-x-hidden  dark:bg-gray-900 dark:text-white">
    <!-- header -->
        <?php
            include "header.php";
        ?>
    <!-- header --> 
    <!-- side bar -->
    <?php
           include "sidebar.php";
       ?>
    <!-- end side bar -->

<div class="form flex flex-col ">
    <h1 class="text-black text-center text-4xl ">Liste des Freelancers</h1>

<table class="table min-w-full bg-white border border-gray-300">
    <thead>
        <tr>
            <th class="py-2 px-4 border-b text-black">Freelancer Name</th>
            <th class="py-2 px-4 border-b text-black">Skill</th>
            <th class="py-2 px-4 border-b text-black">Montant</th>
        </tr>
    </thead>
    <tbody>
        <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "peoplepertask_data";
            
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die('La connexion a échoué : '.$conn->connect_error);
            }

            $sql = "SELECT freelancer_name, skill, salary FROM freelancers";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td class='py-2 px-4 border-b text-black'>" . $row["freelancer_name"] . "</td>";
                    echo "<td class='py-2 px-4 border-b text-black'>" . $row["skill"] . "</td>";
                    echo "<td class='py-2 px-4 border-b text-black'>" . $row["salary"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='py-2 px-4 text-center border-b'>Aucun résultat trouvé</td></tr>";
            }

            $conn->close();
        ?>
        <button type="button" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800" 
        onclick="openModal('add')">Ajouter</button>


        <div id="myModal" class="modal fixed hidden inset-0 z-50 overflow-auto bg-black bg-opacity-50">
    <div class="modal-container mx-auto my-10 p-5 bg-gray-100 border rounded-lg max-w-md">
        <span class="modal-close absolute top-0 right-0 cursor-pointer p-4"
              onclick="closeModal()">&times;</span>
    <h1 class="text-2xl font-bold mb-5 dark:text-black lg:text-xl">User Form</h1>


        <form id="userForm" action="connfreelancer.php" method="POST" class="hidden flex flex-col  ">
        <div class="mb-4">
            <label for="freelancer_name" class="block text-sm font-semibold text-gray-600 mb-1">freelancer_name:</label>
            <input type="text" id="freelancer_name" name="freelancer_name" value = ""
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500 text-black">
        </div>

        <div class="mb-4">
            <label for="skill" class="block text-sm font-semibold text-gray-600 mb-6">skill:</label>
            <input type="text" id="skill" name="skill"  value = ""
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500 text-black">
        </div>

        <div class="mb-4">
            <label for="salary" class="block text-sm font-semibold text-gray-600 mb-1">Salary:</label>
            <input type="text" id="salary" name="salary" value=""
           class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500 text-black">
        </div>


        <button type="submit"
        class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue active:bg-gray-500">
        Soumettre
        </button>

        </form>
    </tbody>
</table>
        </div>
        <script>
    function openModal() {
        var modal = document.getElementById("myModal");
        modal.classList.remove("hidden");
    }

    function closeModal() {
        var modal = document.getElementById("myModal");
        modal.classList.add("hidden");
    }
</script>


    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>
    <script src="../javascript/script.js"></script>
</body>
</html>