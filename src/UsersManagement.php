<!doctype html>
<html >

<head>
    <title>dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    
</head>
<style>
    .container {
        margin-left : 98px; 
        margin-right : 20px;
    } 
</style>


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
    

    <div class="container mx-auto mt-10 p-5 bg-gray-100 border rounded-lg">
    <h1 class="text-2xl font-bold mb-5 dark:text-black lg:text-xl">User Form</h1>

    <form id="userForm" action="connuser.php" method="POST" class="flex flex-col  ">
        <div class="mb-4">
            <label for="userId" class="block text-sm font-semibold text-gray-600 mb-1">ID:</label>
            <input type="text" id="userId" name="userId" disabled
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-gray-600 ">
        </div>

        <div class="mb-4">
            <label for="username" class="block text-sm font-semibold text-gray-600 mb-1">Username:</label>
            <input type="text" id="username" name="username" value = ""
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500 text-black">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-semibold text-gray-600 mb-6">Email:</label>
            <input type="email" id="email" name="email"  value = ""
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500 text-black">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-semibold text-gray-600 mb-1">Password:</label>
            <input type="password" id="password" name="password"   value = ""
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500 text-black">
        </div>

        <button type="submit"
            class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            Soumettre
        </button>
        <button type="button" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800" 
        onclick="openModal('add')">Ajouter</button>
        <button type="button" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800"
         onclick="openModal('edit')">Modifier</button>
         <div id="myModal" class="modal fixed hidden inset-0 z-50 overflow-auto bg-black bg-opacity-50">
    <div class="modal-container mx-auto my-10 p-5 bg-gray-100 border rounded-lg max-w-md">
        <span class="modal-close absolute top-0 right-0 cursor-pointer p-4"
              onclick="closeModal()">&times;</span>
    <h1 class="text-2xl font-bold mb-5 dark:text-black lg:text-xl">User Form</h1>

    <form id="userForm" action="connuser.php" method="POST" class=" hidden flex flex-col  ">
        <div class="mb-4">
            <label for="userId" class="block text-sm font-semibold text-gray-600 mb-1">ID:</label>
            <input type="text" id="userId" name="userId" disabled
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-gray-600 ">
        </div>

        <div class="mb-4">
            <label for="username" class="block text-sm font-semibold text-gray-600 mb-1">Username:</label>
            <input type="text" id="username" name="username" value = ""
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500 text-black">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-semibold text-gray-600 mb-6">Email:</label>
            <input type="email" id="email" name="email"  value = ""
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500 text-black">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-semibold text-gray-600 mb-1">Password:</label>
            <input type="password" id="password" name="password"   value = ""
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500 text-black">
        </div>

        <button type="submit"
            class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            Soumettre
        </button>
                </div>
</div>
    </form>
</div>

            <!-- <ul class=" user flex  text-xs items-center   sm:text-lg w-full py-3">
                <li class="w-2/5 text-center items-center flex gap-1 px-2">
                    <img class="w-1/6 rounded-full" src="../images/845-1697015855.jpg" alt="">
                   <span> mohamed tergui</span>
                </li>
                <li class="w-1/5 text-center">devolopeur</li>
                <li class="w-1/5 text-center">active</li>
                <li class="w-1/5 text-center">owner</li>
                <li class="w-1/6 text-center flex flex-col sm:flex-row  justify-around"><button  class="text-blue-500 edit_btn">EDIT</button> <button class="text-red-500 dele_btn">DELE</button></li>

            </ul>
            <ul class=" user flex  text-xs items-center   sm:text-lg w-full py-3">
                <li class="w-2/5 text-center items-center flex gap-1 px-2">
                    <img class="w-1/6 rounded-full" src="../images/845-1697015855.jpg" alt="">
                   <span> yassine eloussi</span>
                </li>
                <li class="w-1/5 text-center">devolopeur</li>
                <li class="w-1/5 text-center">active</li>
                <li class="w-1/5 text-center">owner</li>
                <li class="w-1/6 text-center flex-col sm:flex-row flex justify-around"><button  class="text-blue-500 edit_btn">EDIT</button> <button class="text-red-500 dele_btn">DELE</button></li>

            </ul>
            <ul class=" user flex  text-xs items-center   sm:text-lg w-full py-3">
                <li class="w-2/5 text-center items-center flex gap-1 px-2">
                    <img class="w-1/6 rounded-full" src="../images/845-1697015855.jpg" alt="">
                   <span> mohamed meassel</span>
                </li>
                <li class="w-1/5 text-center">devolopeur</li>
                <li class="w-1/5 text-center">active</li>
                <li class="w-1/5 text-center">owner</li>
                <li class="w-1/6 text-center flex flex-col sm:flex-row justify-around"><button  class="text-blue-500 edit_btn">EDIT</button> <button class="text-red-500 dele_btn">DELE</button></li>

            </ul>
            <ul class=" user flex  text-xs items-center   sm:text-lg w-full py-3">
                <li class="w-2/5 text-center items-center flex gap-1 px-2">
                    <img class="w-1/6 rounded-full" src="../images/845-1697015855.jpg" alt="">
                   <span>abdelghani ait tamghrat</span>
                </li>
                <li class="w-1/5 text-center">devolopeur</li>
                <li class="w-1/5 text-center">active</li>
                <li class="w-1/5 text-center">owner</li>
                <li class="w-1/6 text-center flex flex-col sm:flex-row justify-around"><button  class="text-blue-500 edit_btn">EDIT</button> <button class="text-red-500 dele_btn">DELE</button></li>

            </ul>
            <ul class=" user flex  text-xs items-center   sm:text-lg w-full py-3">
                <li class="w-2/5 text-center items-center flex gap-1 px-2">
                    <img class="w-1/6 rounded-full" src="../images/845-1697015855.jpg" alt="">
                   <span> nada elmahfodi</span>
                </li>
                <li class="w-1/5 text-center ">devolopeur</li>
                <li class="w-1/5 text-center">active</li>
                <li class="w-1/5 text-center">owner</li>
                <li class="w-1/6 text-center flex flex-col sm:flex-row justify-around"><button  class="text-blue-500 edit_btn">EDIT</button> <button class="text-red-500 dele_btn">DELE</button></li>

            </ul> -->
            
             
            
             
             
           </div>
        </form>
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

    <script src="../javascript/dashUser.js"></script>

</body>

</html>

