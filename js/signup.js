$(document).ready(function () {
  $("#signup").click(function (e) {
    e.preventDefault();
    $("#signup").blur();

    const firstName = $("#first_name").val();
    const lastName = $("#last_name").val();
    const emailValue = $("#email").val();
    const newPassword = $("#new_password").val();
    const confirmPassword = $("#confirm_password").val();

    if (firstName == "") {
      $("#firstName-error").show();
      $("#first_name").focus();
      $("#first_name").css("border-color", "red");
      return false;
    } else {
      $("#firstName-error").hide();
      $("#first_name").css("border-color", "green");
    }

    if (lastName == "") {
      $("#lastName-error").show();
      $("#last_name").focus();
      $("#last_name").css("border-color", "red");
      return false;
    }

    if (emailValue == "") {
      $("#email-error").show();
      $("#email").focus();
      $("#email").css("border-color", "red");
      return false;
    } else if (!isValidEmailAddress(emailValue)) {
      $("#email-error").show();
      $("#email-error").text("Invalid Email");
      $("#email").focus();
      $("#email").css("border-color", "red");
      return false;
    } else {
      $("#email-error").hide();
      $("#email").css("border-color", "green");
    }

    if (newPassword == "") {
      $("#newPassword-error").show();
      $("#new_password").focus();
      $("#new_password").css("border-color", "red");
      return false;
    } else if (newPassword.length < 8) {
      $("#newPassword-error").show();
      $("#newPassword-error").text("Minimum 8 characters required");
      $("#new_password").focus();
      $("#new_password").css("border-color", "red");
      return false;
    } else if (newPassword.length > 8) {
      $("#newPassword-error").hide();
      $("#new_password").css("border-color", "green");
    }

    if (confirmPassword == "") {
      $("#confirmPassword-error").show();
      $("#confirm_password").focus();
      $("#confirm_password").css("border-color", "red");
      return false;
    } else if (confirmPassword != newPassword) {
      $("#confirmPassword-error").show();
      $("#confirmPassword-error").text("Password does not match");
      $("#confirm_password").focus();
      $("#confirm_password").css("border-color", "red");
      return false;
    } else if (confirmPassword == newPassword) {
      $("#confirmPassword-error").hide();
      $("#confirm_password").css("border-color", "green");
    }

    if ($("#checkbox").is(":not(:checked)")) {
      $("#checkbox-error").show();
      return false;
    } else {
      $("#checkbox-error").hide();
    }

    $.ajax({
      url: "addDetails.php",
      type: "POST",
      data: {
        first_name: firstName,
        last_name: lastName,
        email: emailValue,
        new_password: newPassword,
        confirm_password: confirmPassword,
      },
    })
      .done(function (response) {
        const data = JSON.parse(response);
        if (data.result) {
          $("#myModal").modal("show");
          setTimeout(function () {
            window.location.href = "index.php"; //will redirect to your blog page (an ex: blog.html)
          }, 3000);
        }
        if (data.message == 4) {
          $("#email-error").show();
          $("#email-error").text("Email already exist");
          $("#email").focus();
          $("#email").css("border-color", "red");
          return false;
        }
      })
      .fail(function () {
        alert("Operation failed. Try again");
      });
  });

  function isValidEmailAddress(emailAddress) {
    var pattern =
      /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
  }

  // keypress functions

  $("#first_name").on("keypress", function () {
    $("#firstName-error").hide();
    $("#first_name").css("border-color", "green");
  });
  $("#last_name").on("keypress", function () {
    $("#lastName-error").hide();
    $("#last_name").css("border-color", "green");
  });
  $("#email").on("keypress", function () {
    $("#email-error").hide();
    $("#email").css("border-color", "green");
  });
  $("#new_password").on("keypress", function () {
    $("#newPassword-error").hide();
    $("#new_password").css("border-color", "green");
  });
  $("#confirm_password").on("keypress", function () {
    $("#confirmPassword-error").hide();
    $("#confirm_password").css("border-color", "green");
  });
  $("#checkbox").change(function () {
    if ($(this).is(":checked")) {
      $("#checkbox-error").hide();
    }
  });
  $(document).on("click", ".toggle-password1", function () {
    $(this).toggleClass("fa-eye fa-eye-slash");

    var input = $("#new_password");
    input.attr("type") === "password"
      ? input.attr("type", "text")
      : input.attr("type", "password");
  });
  $(document).on("click", ".toggle-password2", function () {
    $(this).toggleClass("fa-eye fa-eye-slash");

    var input = $("#confirm_password");
    input.attr("type") === "password"
      ? input.attr("type", "text")
      : input.attr("type", "password");
  });
});
