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
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "peoplepertask_data";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('La connexion a échoué : ' . $conn->connect_error);
    }


    $projectCountQuery = "SELECT COUNT(*) as totalProjects FROM projects";
    $projectResult = $conn->query($projectCountQuery);
    $projectCount = $projectResult->fetch_assoc()['totalProjects'];


    $freelancerCountQuery = "SELECT COUNT(*) as totalFreelancers FROM freelancers";
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

    <!-- start testimonial section -->
<div class="flex-grow flex flex-col pb-10">



<section class="testimonial_section flex flex-col items-center justify-center">
    <h1 class="text-4xl text-center font-bold mt-10">Testimonials</h1>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "peoplepertask_data";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('La connexion a échoué : ' . $conn->connect_error);
    }

    // Fetch testimonials from the database
    $sql = "SELECT id, comment FROM testimonials";
    $result = $conn->query($sql);

    // Display testimonials from the database
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '<div class="shadow-lg text-center w-2/3 sm:w-2/5 bg-gray-50 flex flex-col gap-12 py-3 rounded-lg dark:bg-gray-600 dark:text-white mb-12">
        <p class="font-semibold text-lg">' . $row["comment"] . '</p>
        <form method="post" action="dashboard.php" class="inline-block">
            <input type="hidden" name="editComment" value="' . $row["comment"] . '">
            <input type="hidden" name="testimonial_id" value="' . $row["id"] . '">
            <button type="button" onclick="openEditModal()" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
              Edit
          </button>

        </form>
        <form method="post" action="delete_testimonial.php" onsubmit="return confirmDelete();" class="inline-block ml-2">
            <input type="hidden" name="testimonial_id" value="' . $row["id"] . '">
            <button type="submit" class="bg-custom-green text-white py-2 px-4 rounded-md hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray active:bg-gray-800">
                Delete
            </button>
        </form>
    </div>';

    }
    
  } else {
      echo "<p>No testimonials found</p>";
  }

    // Display form for adding testimonial
    echo '<button type="button" onclick="openModal()" class="bg-custom-green text-white py-2 px-4 rounded-md hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray active:bg-gray-800">
            Add Testimonial
          </button>';

    $conn->close();
    ?>

    <!-- Modal for adding testimonial -->
    <div id="addModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
        <form id="userForm" action="addtestimonial.php" method="POST" class="bg-white p-6 rounded-md">
            <div class="mb-4">
                <label for="comment" class="block text-sm font-semibold text-gray-600 mb-1">Comment:</label>
                <input type="text" id="comment" name="comment" value=""
                    class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500 text-black">
            </div>
            <button type="submit"
                class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue active:bg-gray-500">
                Submit
            </button>
            <button type="button" onclick="closeModal()"
                class="bg-red-500 text-white py-2 px-4 rounded-md ml-2 hover:bg-red-600 focus:outline-none focus:shadow-outline-red active:bg-red-800">
                Cancel
            </button>
        </form>
    </div>
    <!-- Edit Modal for testimonial -->
<div id="editModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center hidden">
    <form id="editForm" action="edit_testimonial.php" method="POST" class="bg-white p-6 rounded-md">
        <div class="mb-4">
            <label for="newComment" class="block text-sm font-semibold text-gray-600 mb-1">New Comment:</label>
            <input type="text" id="newComment" name="newComment" value=""
                class="px-4 py-2 border rounded-md w-full focus:outline-none focus:border-blue-500 text-black">
        </div>
        <input type="hidden" id="testimonialId" name="testimonialId" value="">
        <button type="submit"
            class="bg-gray-800 text-white py-2 px-4 rounded-md hover:bg-gray-300 focus:outline-none focus:shadow-outline-blue active:bg-gray-500">
            Save Changes
        </button>
        <button type="button" onclick="closeEditModal()"
            class="bg-red-500 text-white py-2 px-4 rounded-md ml-2 hover:bg-red-600 focus:outline-none focus:shadow-outline-red active:bg-red-800">
            Cancel
        </button>
    </form>
</div>
</section>



</div>

  </div>


  </div>

  </div>

  <script>
        function openModal() {
    document.getElementById('addModal').classList.add('flex');
    document.getElementById('addModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('addModal').classList.add('hidden');
    document.getElementById('addModal').classList.remove('flex');
}

function openEditModal() {
    document.getElementById('editModal').classList.add('flex');
    document.getElementById('editModal').classList.remove('hidden');
}

function closeEditModal() {
    document.getElementById('editModal').classList.add('hidden');
    document.getElementById('editModal').classList.remove('flex');
}

   
    </script>

  <script src="../javascript/jquery.js"></script>
  <script src="../javascript/dashboard.js"></script>
  <script src="../javascript/script.js"></script>
</body>

</html>
