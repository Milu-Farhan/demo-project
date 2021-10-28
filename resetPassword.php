<?php  
session_start(); 
 if(!$_SESSION['email'])    
    header("Location: login.php");
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link
      rel="shortcut icon" href="./img/heart-14307-32x32.ico" type="image/x-icon"
    />
    <link
      rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <title>Password Change</title>
    <link
      rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/resetPassword.css" />
  </head>
  <body>
    <div class="signup-form">
      <form id="form" autocomplete="off">
        <h2>Password Change</h2>
        <div class="form-group">
          <input  onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false"
            type="password"
            class="form-control"
            id="newPassword"
            name="newPassword"
            placeholder="Enter new Password"
          />
          <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password1"></span>
          <small id="Npassword-error">Enter New Password</small>
        </div>
      
         <div class="form-group">
          <input  onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false"
            type="password"
            class="form-control"
            id="confirmPassword"
            name="confirmPassword"
            placeholder="Re-enter New Password"
          />
          <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password2"></span>
          <small id="Cpassword-error">Re-enter Password</small>
        </div>

        <div class="form-group">
          <button id="change" type="submit" class="btn btn-success btn-lg btn-block">
            Change Password
          </button>
        </div>

        <div class="loader"></div>
      </form>
    </div>

      <div id="myModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header justify-content-center">
				<div class="icon-box">
					<i class="material-icons">&#xE876;</i>
				</div>
			</div>
			<div class="modal-body text-center">
				<p>Password changed successfully</p>
			</div>
		</div>
	</div>
  </div> 

  <script src="./js/resetPassword.js"></script>
  </body>
</html>
