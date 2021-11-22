<?php  
session_start();  
 if(!$_SESSION['email'])   
    header("Location: index.php");
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
    <title>OTP verification</title>
    <link
      rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/verifyOTP.css" />
  </head>
  <body>
    <div class="signup-form">
      <form id="form" method="post" autocomplete="off">
        <h2>OTP verification</h2>
        <div class="form-group">
          <input
            type="number"
            class="form-control"
            id="otp"
            name="otp"
            placeholder="Enter 6 digit OTP"
          />
          <small id="otp-error">Enter Your OTP</small>
        </div>
      
        <div class="form-group">
          <button id="otpClick" type="submit" class="btn btn-success btn-lg btn-block">
            Verify OTP
          </button>
        </div>
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
				<p>OTP verification successful</p>
			</div>
		</div>
	</div>
  </div> 

  <script src="./js/verifyOTP.js"></script>
  </body>
</html>
