$(document).ready(function () {
  $("#change").click(function (e) {
    e.preventDefault();
    var newPassword = $("#newPassword").val();
    var confirmPassword = $("#confirmPassword").val();

    if (newPassword == "") {
      $("#Npassword-error").show();
      $("#newPassword").focus();
      $("#newPassword").css("border-color", "red");
      return false;
    } else if (newPassword.length < 8) {
      $("#Npassword-error").show();
      $("#Npassword-error").text("Minimum 8 characters required");
      $("#newPassword").focus();
      $("#newPassword").css("border-color", "red");
      return;
    } else {
      $("#Npassword-error").hide();
      $("#newPassword").css("border-color", "green");
    }

    if (confirmPassword == "") {
      $("#Cpassword-error").show();
      $("#confirmPassword").focus();
      $("#confirmPassword").css("border-color", "red");
      return false;
    } else if (confirmPassword != newPassword) {
      $("#Cpassword-error").show();
      $("#confirmPassword").focus();
      $("#Cpassword-error").text("Password doesn't match");
      $("#confirmPassword").css("border-color", "red");
      return false;
    } else if (confirmPassword != newPassword) {
      $("#Cpassword-error").hide();
      $("#confirmPassword").css("border-color", "green");
    }

    $.ajax({
      url: "updatePassword.php",
      type: "POST",
      data: {
        new_password: newPassword,
        confirm_password: confirmPassword,
      },
    })
      .done(function (response) {
        const data = JSON.parse(response);
        if (data.result) {
          $("#myModal").modal("show");
          setTimeout(function () {
            window.location.href = "logout.php";
          }, 3000);
        } else {
          $("#Cpassword-error").show();
          $("#confirmPassword").focus();
          $("#Cpassword-error").text("Password doesn't match");
          $("#confirmPassword").css("border-color", "red");
        }
      })
      .fail(function () {
        alert("Operation failed. Try again");
      });
  });

  $("#newPassword").on("keypress", function () {
    $("#Npassword-error").hide();
    $("#newPassword").css("border-color", "green");
  });

  $("#confirmPassword").on("keypress", function () {
    $("#Cpassword-error").hide();
    $("#confirmPassword").css("border-color", "green");
  });

  $(document).on("click", ".toggle-password1", function () {
    $(this).toggleClass("fa-eye fa-eye-slash");

    var input = $("#newPassword");
    input.attr("type") === "password"
      ? input.attr("type", "text")
      : input.attr("type", "password");
  });
  $(document).on("click", ".toggle-password2", function () {
    $(this).toggleClass("fa-eye fa-eye-slash");

    var input = $("#confirmPassword");
    input.attr("type") === "password"
      ? input.attr("type", "text")
      : input.attr("type", "password");
  });
});
