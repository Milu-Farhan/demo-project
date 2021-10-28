$(document).ready(function () {
  $("#login").click(function (e) {
    e.preventDefault();
    $("#login").blur();
    $("#main-error").hide();
    var emailValue = $("#email").val();
    var passwordValue = $("#password").val();

    if (emailValue == "") {
      $("#mail-error").show();
      $("#email").focus();
      $("#email").css("border-color", "red");
      return false;
    } else if (!isValidEmailAddress(emailValue)) {
      $("#mail-error").show();
      $("#mail-error").text("Invalid Email");
      $("#email").focus();
      $("#email").css("border-color", "red");
      return false;
    } else {
      $("#mail-error").hide();
      $("#email").css("border-color", "green");
    }
    if (passwordValue == "") {
      $("#password-error").show();
      $("#password").focus();
      $("#password").css("border-color", "red");
      return false;
    }
    if (passwordValue.length < 8) {
      $("#password-error").show();
      $("#password-error").text("Minimum 8 characters required");
      $("#password").focus();
      $("#password").css("border-color", "red");
      return false;
    } else if (passwordValue.length > 8) {
      $("#password-error").hide();
      $("#password").css("border-color", "green");
    }

    $.ajax({
      url: "auth.php",
      type: "POST",
      data: { email: emailValue, password: passwordValue },
    })
      .done(function (response) {
        const data = JSON.parse(response);
        console.log(data);
        if (data.result) {
          const userName = data.name;
          // const ref = "welcome.php?" + userName;
          // console.log(ref);
          window.location.href = "welcome.php";
        } else {
          $("#main-error").show();
          // $emailValue="";
          // $passwordValue="";
          // $("#password").css("border-color", "red");
          //  $("#email").css("border-color", "red");
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

  $("#email").on("keypress", function () {
    $("#mail-error").hide();
    $("#main-error").hide();
    $("#email").css("border-color", "green");
  });

  $("#password").on("keypress", function () {
    $("#password-error").hide();
    $("#main-error").hide();
  });
  $(document).on("click", ".toggle-password", function () {
    $(this).toggleClass("fa-eye fa-eye-slash");

    var input = $("#password");
    input.attr("type") === "password"
      ? input.attr("type", "text")
      : input.attr("type", "password");
  });
});
