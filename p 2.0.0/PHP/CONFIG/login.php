<?php 
session_start();
session_destroy();
include('configLogin.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../../STYLE/login.css">
    <title>Login</title> 
</head>

<body>
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Login</span>

                <form method="post" id="loginForm" action="">
                    <div class="input-field">
                        <input name="email" id="loginEmail" type="text" placeholder="Enter your email " value="<?php if (isset($emailValue)) echo $emailValue; ?>">
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <span style="color:red;"><?php if(isset($_POST['submit'])) echo $emailErrorMsg; ?></span>
                    <div class="input-field">
                        <input name="password" id="loginPassword" type="password" class="password" placeholder="Enter your password">
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <span style="color:red;"><?php if(isset($_POST['submit'])) echo $passwordErrorMsg; ?></span>

                    <div class="input-field button">
                        <input name="submit" id="loginBtn" type="submit" value="Login">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Not a member?
                        <a href="signUp.php" class="text signup-link">Signup Now</a>
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>
        

		
		<script src="../../JS Folder/login.js"></script>

    
</body>

</html>