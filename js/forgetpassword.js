$(document).ready(function () {
  $("#otp").click(function (e) {
    e.preventDefault();
    $("#otp").blur();
    var emailValue = $("#email").val();
    $(".loader").show();

    if (emailValue == "") {
      $("#email-error").show();
      $("#email").focus();
      $("#email").css("border-color", "red");
      $(".loader").hide();
      return false;
    } else if (!isValidEmailAddress(emailValue)) {
      $("#email-error").show();
      $("#email-error").text("Invalid Email");
      $("#email").focus();
      $("#email").css("border-color", "red");
      $(".loader").hide();
      return false;
    } else {
      $("#email-error").hide();
      $("#email").css("border-color", "green");
    }

    $.ajax({
      url: "sendingOTP.php",
      type: "POST",
      data: { email: emailValue },
    })
      .done(function (response) {
        const data = JSON.parse(response);
        if (data.result) {
          $(".loader").hide();
          $("#myModal").modal("show");
          setTimeout(function () {
            window.location.href = "verifyOTP.php";
          }, 3000);
        } else if (data.merror) {
          $(".loader").hide();
          $("#email-error").show();
          $("#email-error").text("OTP sending failed... Try again");
        } else {
          $(".loader").hide();
          $("#email-error").show();
          $("#email-error").text("Email does not exist");
          $("#email").focus();
          $("#email").css("border-color", "red");
        }
      })
      .fail(function () {
        alert("Operation failed. Try again");
      });
  });

  $("#email").on("keypress", function () {
    $("#email-error").hide();
    $("#email").css("border-color", "green");
  });

  function isValidEmailAddress(emailAddress) {
    var pattern =
      /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
  }
});
