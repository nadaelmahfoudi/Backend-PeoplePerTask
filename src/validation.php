<?php

require_once 'mail.php';

if(empty($_POST["name"]) && empty($_POST["email"]) && ($_POST["message"]))
{
    echo "no";
}else{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
 
    if(!preg_match('/[A-Za-z\s]/',$name)){
        echo "name can contain only lettres and spaces";
    }if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "please enter a valid Email";
    }if(strlen($message)< 30){
        echo "u must enter more than 30car";
    }
            if(!preg_match('/^[A-Za-z\s]+$/',$message)){
                echo "it accepts only letters and spaces ";
            }else{
                    $mail->setFrom('testnadayoucode@gmail.com', 'test');
                    $mail->addAddress($email);
                    $mail->Subject = 'Here is the subject';
                    $mail->Body    = $message;
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    $mail->send();
           }
    }

?>
