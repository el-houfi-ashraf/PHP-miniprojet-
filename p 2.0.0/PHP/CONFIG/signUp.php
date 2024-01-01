<?php 
include('configSignUp.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="../../STYLE/signUp.css">
    <title>signup</title> 
</head>

<body>

    <div class="container">
    
        <div class="forms">

            <!-- Registration Form -->
            <div class="form signup">
                <span class="title">Registration</span>

                <form id="signupForm"  method="post">
                    <div class="input-field">
                        <input name="signupName" id="signupName" type="text" placeholder="Enter your username" value="<?php if(isset($firstName)) echo $firstName; ?>">
                        <i class="uil uil-user"></i>
                    </div>
                    <span style="color: red;"><?php echo $firstNameErrorMsg; ?></span>
                    <div class="input-field">
                        <input name="signupEmail" id="signupEmail" type="text" placeholder="Enter your email" value="<?php if(isset($email)) echo $email; ?>" >
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <span style="color: red;"><?php echo $emailErrorMsg; ?></span>
                    <div class="input-field">
                        <input name="signupPassword" id="signupPassword" type="password" class="password" placeholder="Create a password" >
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <span style="color: red;"><?php echo $passwordErrorMsg; ?></span>
                    <div class="input-field">
                        <input name="confirmPassword" id="confirmPassword" type="password" class="password" placeholder="Confirm a password" >
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <span style="color: red;"><?php echo $cpasswordErrorMsg; ?></span>

                    <div class="input-field button">
                        <input id="signupBtn" type="submit" value="Sign up" name="submit">
                    </div>
                    
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="login.php" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="../JS Folder/login.js"></script>
</body>

</html>
