<?php 
include("connection_data.php");
include("session.php");
if(isset)
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../dist/output.css" rel="stylesheet">
  <link rel="stylesheet" href="input.css">
  <title>sign in</title>

</head>

<body class="dark:bg-slate-900">
<?php
require 'header_site.php';
?>

<div class="form">
    <ul class="tab-group block">
        <li class="tab active block">
            <a class="  no-underline transition duration-500 ease-in-out  bg-teal-500 hover:bg-teal-500 block"style="margin-left: 130px;"
                href="#signup">Sign Up</a>
        </li>
 
 
    </ul>

    <div class="tab-content ">
        <div id="signup" class="block" >
            <h1 class="text-center text-gray-400 font-light mb-10 text-2xl font-sans block">
                Sign Up for Free</h1>
                <div class=" container d-flex justify-content-center">
            <form action="script.php" method="POST">
                <div class=" flex top-row relative">
                    <div class=" relative mb-10 w-1/2 mr-4">
                        <label class="block">
                            First Name<span class="text-teal-500 ml-2">*</span>
                        </label>
                        <input
                            class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                            type="text" name="first_name"  autocomplete="off" />
                    </div>
                    <div class="relative mb-10 w-1/2">
                        <label class="block">
                            Last Name<span class="text-teal-500 ml-2">*</span>
                        </label>
                        <input
                            class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                            type="text" name="last_name"  autocomplete="off" />
                    </div>
                </div>


                <div class="relative mb-10">
                    <label>
                        Email Address<span class="text-teal-500 ml-2">*</span>
                    </label>
                    <input
                        class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                        type="email" name="email"   autocomplete="off" />
                </div>

                <div class="relative mb-10">
                    <label>
                        Set A Password<span class="text-teal-500 ml-2">*</span>
                    </label>
                    <input
                        class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                        type="password" name="password"  autocomplete="off" />
                </div>
                <div class="relative mb-10">
                    <label>
                    Confirm password<span class="text-teal-500 ml-2">*</span>
                    </label>
                    <input
                        class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                        type="password" name="confirmPassword"  autocomplete="off" />
                </div>
                <div class="relative mb-10">
                    <label class="text-white">
                    I'm a client, hiring for a project<span class="text-teal-500 ml-2">*</span>
                    </label>
                    <input
                        class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                        type="radio" name="role"  autocomplete="off" value="client" />
                </div>
                <div class="relative mb-10">
                    <label class="text-white pb-8">
                    I'm a freelancer, looking for work<span class="text-teal-500 ml-2">*</span>
                    </label>
                    <input
                        class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                        type="radio" name="role"  autocomplete="off" value="freelancer" />
                </div>
                <div class="relative mb-10">
                    <label class="text-white">
                    I'm an admin<span class="text-teal-500 ml-2">*</span>
                    </label>
                    <input
                        class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                        type="radio" name="role"  autocomplete="off" value="admin" />
                </div>
                <button type="submit" name="submit"
                    class="w-full bg-teal-500 hover:bg-custom-green text-white border-0 rounded-none focus:outline-none uppercase tracking-wide font-semibold py-4 px-0 text-base transition-all duration-500 ease-in-out">
                    Get Started
                </button>
                <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                      Already have an account? <a href="login.php" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login here</a>
                </p>

            </form>
                </div>
        </div>
    </div>
</div>

    <?php 
    include "footer.php";
    ?>
    
     <script src="../javascript/form.js"></script>
   <script src="../javascript/jquery.js"></script>
  <script src="../javascript/script.js"></script>
</body>
</html>