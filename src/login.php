<?php 
include 'connection_data.php';
include 'session.php';


if (isset($_POST["submit"])) {
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    $role = $_POST['role'];
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verify the password
        if (password_verify($password, $row['password'])) {
       
            session_start(); 
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['first_name'] . ' ' . $row['last_name'];
            $_SESSION['role'] = $row['role'];
            header('Location: index.php');
            exit(); 
        } else {
            echo 'Invalid password';
        }

    } else {
        echo 'Invalid email or password';
    }}


?>
<!doctype html>
<html>
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../dist/output.css" rel="stylesheet">
  <link rel="stylesheet" href="input.css">

</head>
<body class="dark:bg-slate-900">

<?php
require 'header_site.php';
?>

   <div class="form">
    <ul class="tab-group">

    <li class="tab active block">
            <a class="  no-underline transition duration-500 ease-in-out  bg-teal-500 hover:bg-teal-500 block"style="margin-left: 130px;"
                href="sign_in">login</a>
        </li>
    </ul>

    <div class="form">
    
<div id="login">
            <h1 class="text-center text-gray-400 font-light mb-10 text-2xl font-sans">
                Welcome Back!</h1>

            <form method="post">

                <div class="relative mb-10">
                    <label>
                        Email Address<span class="text-teal-500 ml-2">*</span>
                    </label>
                    <input
                        class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                        value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : ''?>" name= "email" type="email" required autocomplete="off" />
                </div>

                <div class="relative mb-10">
                    <label>
                        Password<span class="text-teal-500 ml-2">*</span>
                    </label>
                    <input
                        class="text-black block w-full h-fit py-1 px-2 border border-gray-300 rounded-none transition duration-250 bg-white"
                        value="<?= isset($_COOKIE['password']) ? $_COOKIE['password'] : ''?>" name= "password" type="password" required autocomplete="off" />
                </div>
                <!-- <div class="flex items-start">
                          <div class="flex items-center h-5">
                            <input id="remember" aria-describedby="remember" name="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" >
                          </div>
                          <div class="ml-3 text-sm">
                            <label for="remember" class="text-gray-500 dark:text-gray-300" style="margin-right = 20px">Remember me</label>
                          </div>
                </div> -->
                <button type="submit" name="submit"
                    class="w-full bg-teal-500 text-white border-0 rounded-none hover:bg-custom-green focus:outline-none uppercase tracking-wide font-semibold py-4 px-0 text-base transition-all duration-500 ease-in-out"  >
                    
                Get Started
            </button>

            </form>

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























