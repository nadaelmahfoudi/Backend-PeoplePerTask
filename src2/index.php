<?php 
include 'connexion_data.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
        <p><h2>PHP SEARCH</h2></p>
        <h6 class="mt-5"><b>Search Name</b></h6>
        <div class="input-group mb-4 mt-3">
            <div class="form-outline">
                <input type="text" id="getName"/>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First_Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody id="showdata">
                <?php
                    $sql = "SELECT * FROM users";
                    $query = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($query)){
                        echo "<tr>";
                        echo "<td><h6>".$row['id']."</td></h6>";
                        echo "<td><h6>".$row['first_name']."</td></h6>";
                        echo "<td><h6>".$row['email']."</td></h6>";
                        echo "<td><h6>".$row['gender']."</td></h6>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function(){
        $('#getName') .on("keyup",function(){

            var input = $(this).val();
           
           if(input == "") input='all';
           $.ajax({
            url:"searchajax.php",
            method:"POST",
            data:{input:input},
            success:function(data){
                $("#showdata").html(data);
            }
           });
        });
        });
    </script>
</body>
</html>