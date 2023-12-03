<?php 

include("connection_data.php");
include_once'session.php';

if(isset($_POST['submit'])){
    signup();
}else if(isset($_POST['login'])){
    login();
}
// setcokie(name, value, expire, path, domain, secure, httponty)

function signup(){
    global $conn;
    if( isset($_POST['submit'])){
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $confirmPassword = $_POST["confirmPassword"];


    if(empty($_POST["first_name"]) || empty($_POST["last_name"]) || empty($_POST["password"]) || empty($_POST["confirmPassword"]))
            {
                echo "please enter ur information";
            }else if(!preg_match('/[A-Za-z\s]/',$first_name)){
                echo "name invalid";
            }else if(!preg_match('/[A-Za-z\s]/',$last_name)){
                echo "name invalid";
            }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                echo "email invalid";
            }else if(strlen($password)<6){
                echo "password must contain at least 6caracteres";
            }else if($_POST["password"] == $confirmPassword){
                 // préparez une requête 
                 $sql = "INSERT INTO users (first_name,last_name,email,password) VALUES (?,?,?,?)";

                 // préparez une requête stmt (mysqli_prepare)
                 $stmt = mysqli_prepare($conn, $sql);

                 // liez le paramètre (mysqli_stmt_bind_param)
                mysqli_stmt_bind_param($stmt,"ssss",$first_name, $last_name, $email, $password);

                 // exécutez la requête préparée (mysqli_stmt_execute )
                 $result = mysqli_stmt_execute($stmt);

                 if($result){
                    header("Location: login.php");
                    exit();
                 }else{
                    echo "error";
                 }
                 // Assurez-vous de quitter le script après une redirection
                 mysqli_stmt_close($stmt);
                 mysqli_close($conn);
            }else{
                echo "error password";
            }
}}



function getAllUsers(){
    global $conn;
    $sql = "SELECT * FROM users ";
    $result = mysqli_query($conn,$sql);
    $rows = [];
    if($result){
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
mysqli_close($conn);
return NULL;
}


?>