<?php 
include'connection_data.php';
include_once'session.php';

?>

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
<body class="overflow-x-hidden dark:bg-slate-900">
  <!-- Header -->
  <?php 
include("header_site.php");
?>
  <!-- end Header -->
    
    <!-- fiha dik l categorie o nav-bar 2 li fih  la list -->
    <section class="dark:bg-slate-900">
      <div class="items-center gap-2 ml-8 h-8 md:hidden dark:bg-slate-800">
        <button id="btnlist" class="flex flex-row">
          <h1>Browse by Category</h1>
          <div class="m-2">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="14"
              height="10"
              viewBox="0 0 14 10"
              fill="none"
            >
              <path d="M1 1L7 8.5L13 1" stroke="#05C50D" />
            </svg>
          </div>
        </button>
      </div>

      <ul
        id="list"
        class="block justify-around text-xs bg-gray-100 p-3 md:flex lg:flex dark:bg-slate-800"
      >
        <a href=""><li class="mt-2">Technology & Programming</li></a>
        <a href=""><li class="mt-2">Writing & Translation</li></a>
        <a href=""><li class="mt-2">Design</li></a>
        <a href=""><li class="mt-2">Digital Marketing</li></a>
        <a href=""><li class="mt-2">Video, Photo & Image</li></a>
        <a href=""><li class="mt-2">Business</li></a>
        <a href=""><li class="mt-2">Music & Audio</li></a>
        <a href=""><li class="mt-2">Marketing, Branding & Sales</li></a>
        <a href=""><li class="mt-2">Social Media</li></a>
      </ul>
    </section>
    <!-- hadi fiha dik recherche o selecte -->
    <section class="flex flex-col gap-4 lg:flex-row  m-6  ">
      <form class="flex md:justify-start justify-center items-end w-full ">
        <div class="relative  md:w-full  lg:w-full   ">
          <input
          input type="text" id="getName"
            name="hero-field"
            placeholder="rechercher"
            class="h-14 w-full drop-shadow-md bg-white rounded-l-lg border bg-opacity-50 border-gray-300 focus:ring-1 focus:ring-custom-green focus:bg-transparent focus:border-custom-green text-base outline-none text-gray-500 py-2 px-6 leading-8 transition-colors duration-200 ease-in-out"
          />
        </div>
        <button
          class="h-14 w-1/8 inline-flex text-white bg-custom-green++ border-0 py-2 px-6 focus:outline-none bg-custom-green- rounded-r-lg text-lg items-center"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="24"
            height="24"
            viewBox="0 0 24 24"
            fill="none"
          >
            <path
              d="M17.707 16.293L20.707 19.293C20.8807 19.4726 20.9877 19.7177 20.9877 19.9877C20.9877 20.54 20.54 20.9877 19.9877 20.9877C19.7177 20.9877 19.4726 20.8807 19.2927 20.7067L19.293 20.707L16.293 17.707C16.1193 17.5274 16.0123 17.2823 16.0123 17.0123C16.0123 16.46 16.46 16.0123 17.0123 16.0123C17.2823 16.0123 17.5273 16.1193 17.7073 16.2933L17.707 16.293ZM9.99999 1.99999C14.4183 1.99999 18 5.58171 18 9.99998C18 14.4183 14.4183 18 9.99999 18C5.58172 18 2 14.4183 2 9.99998C2 5.58171 5.58172 1.99999 9.99999 1.99999ZM9.99999 4.00001C6.68628 4.00001 3.99999 6.6863 3.99999 10C3.99999 13.3137 6.68628 16 9.99999 16C13.3137 16 16 13.3137 16 10C16 6.6863 13.3137 4.00001 9.99999 4.00001Z"
              fill="white"
            />
          </svg>
        </button>
      </form>
      <form class="flex  md:justify-start justify-center items-end">
        <div class="relative w-1/2  m-auto md:w-full lg:w-full  ">
          <select
            type="text"
            id="hero-field"
            class="h-14 w-full m-auto drop-shadow-md bg-white rounded-md border bg-opacity-50 border-gray-300 focus:ring-1 focus:ring-custom-green focus:bg-transparent focus:border-custom-green text-base outline-none text-gray-500 py-2 px-6 leading-8 transition-colors duration-200 ease-in-out"
          >
            <option value="#" selected disabled>all categories</option>
            <option value="option1">option1</option>
            <option value="option1">option2</option>
            <option value="option1">option3</option>
            <option value="option1">option4</option>
            <option value="option1">option5</option>
            <option value="option1">option6</option>
          </select>
        </div>
      </form>
    </section>
    <!-- hadi fiha dak l button diyal lfilter o dik la selecte -->
    <section class="flex flex-row w-full md:hidden" style="margin-top: 55px ;">
      <div class="flex flex-row m-auto gap-5  w-full" style="margin: 5px 50px;">
      <button class="flex h-14 w-3/6  justify-center drop-shadow-md bg-custom-green- rounded-md border bg-opacity-50 border-gray-300 text-gray-50 items-center">filter</button>
      
      <select
        
        class="h-14 w-3/6 drop-shadow-md bg-white rounded-md border bg-opacity-50 border-gray-300 focus:ring-1 focus:ring-custom-green focus:bg-transparent focus:border-custom-green text-base outline-none text-gray-500 py-2 px-6 leading-8 transition-colors duration-200 ease-in-out"
      >
        <option value="#" selected disabled>recomanded </option>
        <option value="option1">option1</option>
        <option value="option1">option1</option>
        <option value="option1">option1</option>
        <option value="option1">option1</option>
        <option value="option1">option1</option>
        <option value="option1">option1</option>
      </select>
    </div>
    </section>
    <hr>
    <!-- hadi diyal le texte -->
   <div class=" flex justify-end  ">
    <p class="text-xs m-6">+1000 results</p>
   </div>
   <!-- hada dak side bar diyal disck-top  -->
   <main class="flex flex-row w-1/1 gap-2">
    <!-- hadi diyal dak side bar li 3la lissr -->
    <section id="ikhtifa2" class="flex flex-col w-1/3 gap-2 " style="margin-left: 28px;" >
      <div id="yassin" class="block "  style="height: 60px ;font-weight: 400;">
        <div id="hiba" class="m-3 font-normal">
        <strong>Filters</strong>
      </div>
      </div>
      <!-- hadi li fiha delivery time -->
      <div id="yassin" class="block "  style="height: 60px;  font-weight: 400;">
     <!-- hadi diyal l3ounwan o dik lfleche  -->
          <div class="flex justify-between px-3 mt-3">
            <button id="btn2">Delivery time </button>
           <button id="btn3"><img src="images/arrow-down.svg" alt=""></button> 
      </div>
   </div>
       

<!-- hadi talta li fiha l price -->


      <div id="yassin" class="block "  style="height: 60px;  font-weight: 400;">
     <!-- hadi diyal l3ounwan o dik lfleche  -->
          <div class="flex justify-between px-3 mt-3">
            <button id="btn4">  Price </button>
           <button id="btn5"><img src="images/arrow-down.svg" alt=""></button> 
      </div>
   </div>
       



     


      
     


    </section>
      

</div>
  <!-- Projects section -->
  <section id="offers" class="offers-section bg-white dark:bg-slate-800 w-full p-4 md:py-3 md:px-8 lg:px-10">
    <div class="flex flex-col gap-y-4">
      <div class="flex flex-row justify-between w-full mb-3 items-end font-medium">
        <div class="w-1/2">
          <h2 class="text-xl dark:text-gray-300 md:text-2xl lg:text-3xl font-semibold">Latest Projects</h2>
          <p class="text-sm text-gray-400">Browse and buy ready-prepared, fixed priced work from freelancers</p>
        </div>
        <?php
              if(isset($_SESSION['role'])):
                  if ($_SESSION['role'] == 'client') {
                      ?>
        <a href="inbox.php"
          class="text-xs md:text-lg lg:text-xl text-blue-500 flex flex-row items-center md:gap-x-2 p-1 rounded-lg hover:bg-sky-50 dark:hover:bg-slate-600">
          ADD PROJECT !
          <span class="">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" viewBox="0 0 12 10" fill="none">
              <path
                d="M7.388 0.528666L11.388 4.52867C11.5086 4.64931 11.5832 4.81595 11.5832 4.99999C11.5832 5.18404 11.5086 5.3507 11.388 5.47132L7.388 9.47132C7.26823 9.5871 7.10487 9.65846 6.92486 9.65846C6.55667 9.65846 6.25819 9.35998 6.25819 8.99179C6.25819 8.81178 6.32955 8.64842 6.44552 8.52846L9.30666 5.66665H1.58333C1.21514 5.66665 0.916656 5.36817 0.916656 4.99998C0.916656 4.63179 1.21514 4.33331 1.58333 4.33331H9.30666L6.44533 1.47131C6.31977 1.34992 6.2418 1.17995 6.2418 0.991776C6.2418 0.623588 6.54028 0.325104 6.90847 0.325104C7.09664 0.325104 7.26678 0.403276 7.388 0.528666Z"
                fill="#34A8CA" />
            </svg>
          </span>
        </a>
        <?php }endif;?>
      </div>

      <div class="carousal h-full" id="showdata">
        <ul class="flex flex-row h-full py-3 overflow-hidden">
        <?php
            $query = "SELECT * FROM projects";
            $result = mysqli_query($conn, $query);
            
            if (!$result) {
                die("Query failed: " . mysqli_error($conn));
            }else{
              while($row =mysqli_fetch_assoc($result)){
                ?>
          <li
            class="offer-card h-full mr-4 drop-shadow-md cursor-pointer w-4/5 md:w-2/5 lg:w-72 shrink-0 rounded-xl overflow-hidden hover:drop-shadow-lg hover:border-b-2">
            <div class="photo bg-cover bg-no-repeat bg-center bg-green-50 h-48"></div>

            <div class="bg-gray-50 dark:bg-zinc-700 w-full min-h-56 flex flex-col justify-between">
              <div class="flex flex-row p-3 items-center gap-0.5">
                <h3 class="title text-gray-700 dark:text-slate-200 font-semibold text-lg"><?php echo $row['title']?></h3>
              </div>
              <div class="flex flex-col gap-y-3">
                <div class="specialities flex flex-row flex-wrap my-1 text-gray-600 dark:text-gray-200 px-3">
                  <a href="#" class="px-3 py-1 m-0.5 text-sm bg-gray-50 rounded-md border">
                    ...
                  </a>
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
              <div class="flex flex-col gap-6" >
              <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                          <a href="detail_projet.php?id=<?php echo $row['id']; ?>">Read More !</a>
                      </button>
                      <?php
              if (isset($_SESSION['role']) && $_SESSION['role'] == 'freelancer') {
              ?>
              <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                  <a href="add_offers.php?project_id=<?php echo $row['id']; ?>">Apply Now</a>
              </button>
              <?php
              }
              ?>
              </div>
              
            </div>
          </li>

          <?php }}?>
        </ul>
      </div>

      <div class="flex flex-row justify-center">
        <div class="offers-btns">
          <button
            class="scroll-right p-2 md:p-3 border-2 border-r border-gray-300 m-0 disabled:border-gray-100 hover:bg-gray-100 disabled:hover:bg-white dark:disabled:border-gray-800 dark:disabled:bg-transparent"
            disabled>
            <svg class="rotate-180" xmlns="http://www.w3.org/2000/svg" width="15" height="12" viewBox="0 0 12 10"
              fill="none">
              <path
                d="M7.388 0.528666L11.388 4.52867C11.5086 4.64931 11.5832 4.81595 11.5832 4.99999C11.5832 5.18404 11.5086 5.3507 11.388 5.47132L7.388 9.47132C7.26823 9.5871 7.10487 9.65846 6.92486 9.65846C6.55667 9.65846 6.25819 9.35998 6.25819 8.99179C6.25819 8.81178 6.32955 8.64842 6.44552 8.52846L9.30666 5.66665H1.58333C1.21514 5.66665 0.916656 5.36817 0.916656 4.99998C0.916656 4.63179 1.21514 4.33331 1.58333 4.33331H9.30666L6.44533 1.47131C6.31977 1.34992 6.2418 1.17995 6.2418 0.991776C6.2418 0.623588 6.54028 0.325104 6.90847 0.325104C7.09664 0.325104 7.26678 0.403276 7.388 0.528666Z"
                fill="#5B6678" />
            </svg>
          </button>
          <button
            class="scroll-left p-2 md:p-3 border-2 border-l border-gray-300 m-0 hover:bg-gray-100 disabled:hover:bg-white disabled:border-gray-100 dark:disabled:border-gray-800 dark:disabled:bg-transparent">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="12" viewBox="0 0 12 10" fill="none">
              <path
                d="M7.388 0.528666L11.388 4.52867C11.5086 4.64931 11.5832 4.81595 11.5832 4.99999C11.5832 5.18404 11.5086 5.3507 11.388 5.47132L7.388 9.47132C7.26823 9.5871 7.10487 9.65846 6.92486 9.65846C6.55667 9.65846 6.25819 9.35998 6.25819 8.99179C6.25819 8.81178 6.32955 8.64842 6.44552 8.52846L9.30666 5.66665H1.58333C1.21514 5.66665 0.916656 5.36817 0.916656 4.99998C0.916656 4.63179 1.21514 4.33331 1.58333 4.33331H9.30666L6.44533 1.47131C6.31977 1.34992 6.2418 1.17995 6.2418 0.991776C6.2418 0.623588 6.54028 0.325104 6.90847 0.325104C7.09664 0.325104 7.26678 0.403276 7.388 0.528666Z"
                fill="#5B6678" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </section>
  <!-- end Projects section -->

    </section>

   </main>
  <!-- Footer -->
  <?php include "footer.php"; ?>
  <!-- end Footer -->
  <script>
        $(document).ready(function(){
        $('#getName') .on("keyup",function(){

            var input = $(this).val();
           
           if(input == "") input='all';
           $.ajax({
            url: "search_ajax.php",
            method: "POST",
            data: { input: input },
            success: function (data) {
                $("#showdata").html(data);
            }
        });
        });
        });
    </script>


  <script src="../javascript/swiper-bundle.min.js"></script>
  <script src="../javascript/jquery.js"></script>
  <script src="../javascript/script.js"></script>
  <script src="../javascript/homeScript.js"></script>
<script src="../javascript/serch.js"></script>
</body>
</html>


  
   
    
  
   