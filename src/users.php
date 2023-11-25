<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../dist/output.css" rel="stylesheet">
    <title>User Form</title>
</head>
<body class="  dark:bg-gray-900  ">
  <!-- header -->
  <?php
            include "header.php";
        ?>
    <!-- header --> 
    

  <div class="container mx-auto mt-10 p-5 bg-gray-100 border rounded-lg">
    <h1 class="text-2xl font-bold mb-5">User Form</h1>

    <form id="userForm" action="connuser.php" method="POST" class="flex flex-col  ">
        <div class="mb-4">
            <label for="userId" class="block text-sm font-semibold text-gray-600 mb-1">ID:</label>
            <input type="text" id="userId" name="userId" disabled
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-gray-600 ">
        </div>

        <div class="mb-4">
            <label for="username" class="block text-sm font-semibold text-gray-600 mb-1">Username:</label>
            <input type="text" id="username" name="username"
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-semibold text-gray-600 mb-6">Email:</label>
            <input type="email" id="email" name="email"
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-semibold text-gray-600 mb-1">Password:</label>
            <input type="password" id="password" name="password"
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500">
        </div>

        <button type="submit"
            class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            Soumettre
        </button>
    </form>
</div>


</body>
</html>