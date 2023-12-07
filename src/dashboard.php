<?php 
include 'connection_data.php';
include 'session.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit(); 
}else{
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html>

<head>
  <title>dashboard</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../dist/output.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<style>
  .testimonial_section {
    gap: 20px;
  }
</style>

<body class="overflow-x-hidden  ">
  <!-- header -->
  <?php include "header.php"; ?>
  <!-- header -->
  <!-- side bar -->
  <?php include "sidebar.php"; ?>
  <!-- end side bar -->
  <div class="flex-grow flex flex-col pb-10 dark:bg-gray-900 dark:text-white">

    <section class="flex flex-col">
      <h1 class="text-4xl text-center font-bold">DashBoard</h1>
      <!-- start statistique section -->
      <section class="  flex flex-wrap justify-center gap-2 py-7  ">
    <?php
    include "connection_data.php";


    $projectCountQuery = "SELECT COUNT(*) as totalProjects FROM projects";
    $projectResult = $conn->query($projectCountQuery);
    $projectCount = $projectResult->fetch_assoc()['totalProjects'];


    $freelancerCountQuery = "SELECT COUNT(*) as totalFreelancers FROM users WHERE role ='freelancer'";
    $freelancerResult = $conn->query($freelancerCountQuery);
    $freelancerCount = $freelancerResult->fetch_assoc()['totalFreelancers'];
    ?>

    <div class="flex gap-32  p-4 rounded-md shadow-md">
        
        <div class="shadow-lg text-center w-2/3 sm:w-2/5 bg-gray-50 flex flex-col gap-2 py-3 rounded-lg dark:bg-gray-600 dark:text-white">
          <h4 class="  text-xl font-semibold p-4"> Projets </h4>
          <p class="font-bold text-4xl"><?php echo $projectCount; ?></p>
          <span class="text-custom-green">
            +7%
          </span>
        </div>
        
        <div class="shadow-lg text-center w-2/3 sm:w-2/5 bg-gray-50 flex flex-col gap-2 py-3 rounded-lg dark:bg-gray-600 dark:text-white">
          <h4 class="  text-xl font-semibold  p-4"> Freelancers </h4>
          <p class="font-bold text-4xl"><?php echo $freelancerCount; ?></p>
          <span class="text-custom-green">
            +30%
          </span>
        </div>
        <div class="shadow-lg text-center w-2/3 sm:w-2/5 bg-gray-50 flex flex-col gap-2 py-3 rounded-lg dark:bg-gray-600 dark:text-white">
          <h4 class="  text-xl font-semibold p-4"> No. of Claims</h4>
          <p class="font-bold text-4xl">1.3M</p>
          <span class="text-custom-green">
            +10%
          </span>
        </div>
    </div>
</section>
<!-- end statistique section -->



    <!-- start testimonial section -->
<div class="flex-grow flex flex-col pb-10">



<section class="testimonial_section flex flex-col items-center justify-center">
    <h1 class="text-4xl text-center font-bold mt-10">Testimonials</h1>

    <?php
    // Database connection
    include "connection_data.php";

    // Fetch testimonials from the database
    $sql = "SELECT id, comment FROM testimonials";
    $result = $conn->query($sql);

    // Display testimonials from the database
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="shadow-lg text-center w-2/3 sm:w-2/5 bg-gray-50 flex flex-col gap-12 py-3 rounded-lg dark:bg-gray-600 dark:text-white mb-12">
            <p class="font-semibold text-lg">' . $row["comment"] . '</p>
            <div class="flex gap-4 mt-4">
            <a href="edit_testimonial.php?id=' . $row["id"] . '" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
            Edit
        </a>
                <button onclick="confirmDelete(' . $row["id"] . ')" class="bg-custom-green text-white py-2 px-4 rounded-md hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray active:bg-gray-800">
                    Delete
                </button>
            </div>
        </div>';
        }
    } else {
        echo "<p>No testimonials found</p>";
    }

    // Display button for adding testimonial
    echo '<a href="add_testimonial.php" class="bg-custom-green text-white py-2 px-4 rounded-md hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray active:bg-gray-800">
            Add Testimonial
          </a>';

    $conn->close();
    ?>
</section>



</div>

<script>
    function confirmDelete(testimonialId) {
        if (confirm("Are you sure you want to delete this testimonial?")) {
            window.location.href = "delete_testimonial.php?id=" + testimonialId;
        }
    }
</script>


  <script src="../javascript/jquery.js"></script>
  <script src="../javascript/dashboard.js"></script>
  <script src="../javascript/script.js"></script>
</body>

</html>