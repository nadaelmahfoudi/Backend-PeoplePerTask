<?php 
include'connection_data.php';
include_once'session.php';
?>
    <header class="flex py-2 justify-end h-12 px-8  gap-1 dark:bg-gray-800 dark:text-white ">
        <span id="dar_mode_btn">
        <img class="h-8 mx-5  dark:rotate-180  dark:bg-slate-300 dark:rounded-full " src="../images/dar_mode_icon.png" alt="icon">
    </span>
        <!-- <img class="h-auto  rounded-full" src="../images/845-1697015855.jpg" alt="admin"> -->
        <?php
if (!isset($_SESSION['name'])):
?>
        <span class="text-lg self-center ">Welcome</span>
        <?php else: ?>
  <p class="dark:text-white" >Welcome ! <?php echo $_SESSION['name']; ?></p>
  <!-- <a href="./logout.php" class="bg-custom-green rounded-md px-3 text-center text-white font-semibold">
          <span>
            Log out 
          </span>
        </a> -->
<?php endif; ?>
    </header>
    <div class="flex flex-row justify-start  dark:bg-gray-900 ">

