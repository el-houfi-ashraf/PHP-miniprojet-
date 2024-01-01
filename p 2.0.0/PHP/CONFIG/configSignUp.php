<?php 
$firstNameErrorMsg = "";
$emailErrorMsg = "";
$passwordErrorMsg ="";
$cpasswordErrorMsg= "";
$pattern = '/^(?=.*[A-Za-z0-9])(?=.*[^A-Za-z0-9]).{8,}$/';

include("../CLASS/user.php");
include("../CLASS/connection.php");
$connection = new Connection();
$connection->selectDatabase('project'); 



if(isset($_POST["submit"])){
    $firstName = $_POST["signupName"];
    $email = $_POST["signupEmail"];
    $password = $_POST["signupPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    if(empty($firstName)){
        $firstNameErrorMsg = "User must be filled out!";
    }

    if(empty($email)){
        $emailErrorMsg ="Email must be filled out!"; 
    }

    if(!preg_match($pattern, $password)){
        $passwordErrorMsg ="password must contain at least 8 characters and 1 special character!";
    }

    if($confirmPassword !== $password){
        $cpasswordErrorMsg = "Password do not match!";
    }

    if (empty($usernameErrorMsg) && empty($passwordErrorMsg) && empty($cpasswordErrorMsg) && empty($emailErrorMsg)) {
        $user = new Users($firstName , $email ,$password);
        $user-> insertUsers("Users", $connection->conn);




        header("Location: login.php");
        //exit();
    }
}


?>