<!DOCTYPE html>
<html>

<head>
    <title>dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
</head>

<body class="overflow-x-hidden dark:bg-gray-900 dark:text-white">
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

    <section class="flex lg:w-9/12 flex-col py-7 px-1 sm:px-5 gap-5 flex-grow">
        <h1 class="font-bold text-center text-2xl">PROJECTS</h1>
        <div class="flex flex-col sm:flex-row justify-center gap-1 bg-slate-500 dark:bg-slate-800 p-5">
            <input type="text" placeholder="Search " class="p-1 sm:w-1/2 rounded-lg dark:text-black lg:text-xl">
            <span class="p-2 sm:w-1/6 rounded-md justify-around bg-white flex items-center dark:text-black">
                <span>sort by..</span>
                <svg width="12" height="12" viewBox="0 0 9 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.62126 1.625L3.96985 2.25V2.875L3.31844 2.25L3.96985 1.625H6.57549L4.62126 4.125V4.75V2.25M4.62126 6L2.01562 1H7.22689L4.62126 6Z"
                        stroke="black" stroke-width="2" />
                </svg>
            </span>
        </div>
        <div class="py-4">
            <h5 class="border-t-2 border-b-2 py-4 font-semibold text-lg font-serif px-2">
                PROJECTS
            </h5>
            <ul class="flex flex-col">
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "peoplepertask_data";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die('La connexion a échoué : '.$conn->connect_error);
                    }

                    $sql = "SELECT title, description FROM projects";
                    $result = $conn->query($sql);

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
                                            <span class="text-red-500 ml-4 cursor-pointer btn_dele_message_inbox text-xs sm:text-sm">DELE</span>
                                            <span class="text-blue-600 ml-4 cursor-pointer btn_open_model_replay_inbox text-xs sm:text-sm">EDIT</span>
                                        </span>
                                    </div>
                                </li>';
                        }
                    } else {
                        echo "<p>Aucun message trouvé</p>";
                    }

                    $conn->close();
                ?>
                <li class="title flex flex-col border-b-2 py-3  h-20  sm:h-14 overflow-y-hidden px-2 ">
                    <div class="w-full flex gap-5 items-center">
                        <button type="button" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800"
                            onclick="openModal('add')">Ajouter</button>

                        <div id="myModal" class="modal fixed hidden inset-0 z-50 overflow-auto bg-black bg-opacity-50">
                            <div class="modal-container mx-auto my-10 p-5 bg-gray-100 border rounded-lg max-w-md">
                                <span class="modal-close absolute top-0 right-0 cursor-pointer p-4"
                                    onclick="closeModal()">&times;</span>

                                <!-- Contenu du formulaire -->
                                <form id="addForm" action="connprojet.php" method="POST" class="flex flex-col">
                                    <div class="mb-4">
                                        <label for="title" class="block text-sm font-semibold text-gray-600 mb-1">Titre :</label>
                                        <input type="text" id="title" name="title" class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500 text-black">
                                    </div>

                                    <div class="mb-4">
                                        <label for="description" class="block text-sm font-semibold text-gray-600 mb-1">Description :</label>
                                        <textarea id="description" name="description" class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500 text-black"></textarea>
                                    </div>

                                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                                        Soumettre
                                    </button>
                                </form>
                                <!-- Fin du contenu du formulaire -->

                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    </div>
    <dialog id="dailog_replay" class="flex-col w-auto h-5/6 p-5 rounded-xl gap-4 dark:bg-gray-800 dark:text-white">
        <div id="clse_btn" class="flex justify-end p-3"><svg width="18" height="21" viewBox="0 0 18 21" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M3 3L8.75 10.5M14.5 18L8.75 10.5M8.75 10.5L14.5 3L3 18" stroke="#FF0909" stroke-width="7" />
            </svg>
        </div>
        <div class="flex flex-row justify-center p-6 rounded-tr-lg rounded-tl-lg bg-slate-500 dark:bg-slate-700 text-xs md:text-xl">
            <span>Send To:
            </span>
            <span id="email_inbx">
            </span>
        </div>
        <form class="h-auto">
            <textarea class="w-full h-auto border dark:bg-slate-600 " name="textarea" id="textarea" cols="10" rows="15"></textarea>
            <div class="flex justify-end"><button id="btn_send_mssg" class="bg-blue-500 px-4 py-1 rounded-md">Send</button></div>
        </form>
    </dialog>
    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/dashboard.js"></script>
    <script src="../javascript/script.js"></script>

    <script>
        function openModal(target) {
            var modal = document.getElementById("myModal");
            modal.classList.remove("hidden");
        }

        function closeModal() {
            var modal = document.getElementById("myModal");
            modal.classList.add("hidden");
        }
    </script>
    </body>

</html>
