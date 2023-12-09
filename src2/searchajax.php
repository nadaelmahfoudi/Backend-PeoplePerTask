<?php 

include 'connexion_data.php';
if(isset($_POST['input'])){
    $input = $_POST['input'] ;
    if($input !== 'all'){
    $name = $_POST['input'];
    $sql = "SELECT * FROM users WHERE first_name LIKE '$name%'";
    $query = mysqli_query($conn, $sql);
    $data = '';
    while($row = mysqli_fetch_assoc($query))
    {
        $data .= "<tr><td>".$row['id']."</td><td>".$row['first_name']."</td><td>".$row['email']."</td><td>".$row['gender']."</td></tr>";
    }
    echo $data;
}else{
    $sql = "SELECT * FROM users ";
    $query = mysqli_query($conn, $sql);
    $data = '';
    while($row = mysqli_fetch_assoc($query))
    {
        $data .= "<tr><td>".$row['id']."</td><td>".$row['first_name']."</td><td>".$row['email']."</td><td>".$row['gender']."</td></tr>";
    }
    echo $data;

}
    
}

?>