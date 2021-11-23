<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="shortcut icon" href="./img/heart-14307-32x32.ico" type="image/x-icon">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <title>Create New Account</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/signup.css" />
  </head>
  <body>

    <div class="signup-form">
      <form autocomplete="off">
        <h2>Register</h2>
        <p class="hint-text">
          Create your account. It's free and only takes a minute.
        </p>
        <div class="form-group">
          <div class="row">
            <div class="col">
              <input
                type="text"
                class="form-control"
                id="first_name"
                name="first_name"
                placeholder="First Name"
                
              />
              <small id="firstName-error">First Name required</small>
            </div>
            <div class="col">
              <input
                type="text"
                class="form-control"
                id="last_name"
                name="last_name"
                placeholder="Last Name"
                
              />
              <small id="lastName-error">Last Name required</small>
            </div>
          </div>
        </div>
        <div class="form-group">
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            placeholder="Email"
          />
          <small id="email-error">Email required</small>
        </div>
        <div class="form-group password-div" >
          <input onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false"
            type="password"
            class="form-control"
            id="new_password"
            name="new_password"
            placeholder="Password"
          />
          <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password1"></span>
          <small id="newPassword-error">Enter password</small>
        </div>
        <div class="form-group password-div">
          <input onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false"
            type="password"
            class="form-control"
            id="confirm_password"
            name="confirm_password"
            placeholder="Confirm Password"
          />
          <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password2"></span>
          <small id="confirmPassword-error">Re-enter the Password</small>
        </div>
        <div class="form-group">
          <label class="form-check-label">
            <input type="checkbox" id="checkbox"/>
            I accept the
            <a href="#">Terms of Use</a>
            &amp;
            <a href="#">Privacy Policy</a>
          </label>
          <label><small id="checkbox-error">Accept Terms & Conditions</small></label>
        </div>
        <div class="form-group">
          <button type="submit" id="signup" class="btn btn-success btn-lg btn-block">
            Register Now
          </button>
        </div>
      </form>
      <div class="text-center">
        Already have an account?
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
				<h4>Great!</h4>	
				<p>Your account has been created successfully.</p>
			</div>
		</div>
	</div>
  </div>   

    <script src="./js/signup.js"></script>
  </body>
</html>
