

<!doctype html>
<html>
<head>
  <title>search</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../dist/output.css">
  <link rel="stylesheet" href="input.css">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body class="overflow-x-hidden dark:bg-slate-900"><?php

include 'connection_data.php';

if (isset($_POST['input'])) {
    $input = $_POST['input'];
    // var_dump($input);

    if ($input !== 'all') {
        $name = $_POST['input'];
        $sql = "SELECT * FROM projects WHERE title LIKE '$name%'";
    } else {
        $sql = "SELECT * FROM projects";
    }

    $query = mysqli_query($conn, $sql);
    $data = '';

    while ($row = mysqli_fetch_assoc($query)) {
        $data .= '
          <li class="offer-card h-full mr-4 drop-shadow-md cursor-pointer w-4/5 md:w-2/5 lg:w-72 shrink-0 rounded-xl overflow-hidden hover:drop-shadow-lg hover:border-b-2">
            <div class="photo bg-cover bg-no-repeat bg-center bg-green-50 h-48"></div>

            <div class="bg-gray-50 dark:bg-zinc-700 w-full min-h-56 flex flex-col justify-between">
              <div class="flex flex-row p-3 items-center gap-0.5">
                <h3 class="title text-gray-700 dark:text-slate-200 font-semibold text-lg">' . $row['title'] . '</h3>
              </div>
              <div class="flex flex-col gap-y-3">
                <div class="specialities flex flex-row flex-wrap my-1 text-gray-600 dark:text-gray-200 px-3">
                  <a href="#" class="px-3 py-1 m-0.5 text-sm bg-gray-50 rounded-md border">...</a>
                </div>

                <div class="flex flex-row justify-between text-gray-600 dark:text-slate-200 items-center px-3">
                  <div class="flex flex-row gap-x-2 items-center">
                    <img class="freelancer-photo w-10 h-10 rounded-full" src="" alt="offers Freelancer photo">
                    <div class="flex flex-col">
                      <p>by <strong class="freelancer-name font-semibold">Abdelghani A.</strong></p>
                      <div class="flex flex-row items-center -mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                          <path
                            d="M7.00656 0.800781L5.26756 5.27278H0.851562L4.44256 8.00078L3.20256 12.5088L7.00656 9.95978L10.8116 12.5088L9.57156 8.00078L13.1616 5.27278H8.74656L7.00656 0.800781Z"
                            fill="#FFB331" />
                        </svg>
                        <strong class="rating text-yellow-500 font-semibold mr-1"></strong>(<p
                          class="reviews text-gray-400"></p>)
                      </div>
                    </div>
                  </div>
                  <div>
                    <p class="price text-gray-900 dark:text-slate-100 font-semibold"></p>
                  </div>
                </div>

                <div class="border-t border-gray-200 px-3 py-1 box-content">
                  <p class="dilevered-days text-xs text-gray-400"></p>
                </div>
              </div>
              <div class="flex flex-col gap-6">
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                  <a href="detail_projet.php?id=' . $row['id'] . '">Read More !</a>
                </button>';

        if (isset($_SESSION['role']) && $_SESSION['role'] == 'freelancer') {
            $data .= '
                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                  <a href="add_offers.php?project_id=' . $row['id'] . '">Apply Now</a>
                </button>';
        }

        $data .= '
              </div>
            </div>
          </li>';
    }

    echo $data;
}


?>
  <script src="../javascript/swiper-bundle.min.js"></script>
  <script src="../javascript/jquery.js"></script>
  <script src="../javascript/script.js"></script>
  <script src="../javascript/homeScript.js"></script>
  <script src="../javascript/serch.js"></script>
</body>
</html>
