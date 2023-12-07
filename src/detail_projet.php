<?php 
include'connection_data.php';
include_once'session.php';

?>
<!doctype html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../dist/output.css">
  <link rel="stylesheet" href="input.css">
  <link rel="stylesheet" href="../dist/swiper-bundle.min.css">
  <title>peaple per task</title>
</head>

<style>
        .ma-boite {
            margin: 77px;
            background-color: #f0f0f0;
            box-shadow: 5px 5px 10px rgb(0 0 0);
            }
        
    </style>

<body class="overflow-x-hidden bg-slate-100 dark:bg-slate-900 ">

<?php include "header_site.php"; ?>
    <div class="ma-boite dark:bg-slate-600">
    <ul class="flex flex-col h-full py-3 overflow-hidden text-center dark:text-white ">

<?php 
if (isset($_GET['id'])) {
    $id_project = $_GET['id'];

    $query = "SELECT * FROM projects WHERE id= $id_project";

    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    if ($row) {
?>
         <li><h1 class="border-t-2 border-b-2 py-4 font-semibold text-lg font-serif px-6 "><?php echo $row['title'] ?></h1></li>
            <li><p class="border-t-2 border-b-2 py-4  text-lg font-serif px-6 "><?php echo $row['description'] ?></p></li>
            
            <div>
            <button class="btn-quit bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                          <a href="index.php">Quitter</a>
                      </button>
            <?php
              if(isset($_SESSION['role'])):
                  if ($_SESSION['role'] == 'freelancer') {
                    ?>
                      <button class="btn-offer bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                          <a href="add_offers.php" >Add Offers</a>
                      </button>
            <?php } endif;?>
<?php
    } else {
        echo "Project not found!";
    }
} else {
    echo "Invalid project ID!";
}
?>
</div>



<script src="../javascript/jquery.js"></script>
  <script src="../javascript/script.js"></script>
</body>
</html>





          
