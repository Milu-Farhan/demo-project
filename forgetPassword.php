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
    <title>Reset Password</title>
    <link
      rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/forgetPassword.css" />
  </head>
  <body>
    <div class="signup-form">
      <form id="form" method="post" autocomplete="off">
        <h2>Forgot Password</h2>
        <div class="form-group">
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            placeholder="Registered Email"
          />
          <small id="email-error">Enter Your Email</small>
        </div>

        <div class="form-group">
          <button id="otp" type="submit" class="btn btn-success btn-lg btn-block">
            Send OTP
          </button>
        </div>

        <div class="loader"></div>
      </form>
      <div class="text-center">
        Remembering Password?
        <a href="login.php">Log in</a>
      </div>
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
				<p>OTP sending successful</p>
			</div>
		</div>
	</div>
  </div> 

    <script src="./js/forgetpassword.js" ></script>
  </body>
</html>
