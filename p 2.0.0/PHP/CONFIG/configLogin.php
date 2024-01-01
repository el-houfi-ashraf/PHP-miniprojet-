<?php
include("../CLASS/connection.php");
include("../CLASS/user.php");
$connection = new Connection();
$connection->selectDatabase("project");

$emailErrorMsg ="";
$passwordErrorMsg ="" ;


if (isset($_POST['submit'])) {
    
    $emailValue = $_POST['email'];
    $passwordValue = $_POST['password'];

    
    if (empty($emailValue)) {
        $emailErrorMsg = "Email must be filled out!";
    }


    if (empty($passwordValue)) {
        $passwordErrorMsg = "Password must be filled out!";
    }

        if (empty($emailErrorMsg) && empty($passwordErrorMsg)) {
            $row = Users::selectUserByEmail("Users", $connection->conn , $emailValue  );
            if (password_verify($passwordValue,$row['password'])) {
                session_start();
                $_SESSION['firsName'] = $row['firsName'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                header("Location: dashboard.php");
            }
            else{
                $passwordErrorMsg = "Invalid password!";    
            }
        }
        else{
            $emailErrorMsg = "Invalid email!";
        }


        }

?>