<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" href="./img/icon.png" type="image/x-icon">
<title>Log In</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="./css/login.css">

</head>
<body>
<div class="login-form">
    <form id="form" method="post" autocomplete="off">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <small id ="main-error">Email and Password does not match</small>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email">
            <small id ="mail-error">Enter Your Email</small>
        </div>
        <div class="form-group password-div">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
            <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>
            <small id ="password-error">Enter Your Password</small>
        </div>
        <div class="login form-group">
            <button type="submit" id="login" name="loginbtn" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <a href="forgetPassword.php" class="float-right">Forgot Password?</a>
            
        </div>
        <div class= "account">
            <p class="signup text-center"><a href="signup.php">Create an Account</a></p> 
        </div>           
    </form>
    <script src="./js/login.js" ></script>
</div>
</body>
</html>
