$(document).ready(function () {
  $("#otpClick").click(function (e) {
    e.preventDefault();
    $("#otpClick").blur();
    const otpValue = $("#otp").val();

    if (otpValue == "") {
      $("#otp-error").show();
      $("#otp").focus();
      $("#otp").css("border-color", "red");
      return false;
    } else {
      $("#otp-error").hide();
      $("#otp").css("border-color", "green");
    }

    $.ajax({
      url: "verification.php",
      type: "POST",
      data: { otp: otpValue },
    })
      .done(function (response) {
        const data = JSON.parse(response);
        if (data.result) {
          $("#myModal").modal("show");
          setTimeout(function () {
            window.location.href = "resetPassword.php";
          }, 3000);
        } else {
          $("#otp-error").show();
          $("#otp").focus();
          $("#otp").css("border-color", "red");
        }
      })
      .fail(function () {
        alert("Operation failed. Try again");
      });
  });

  $("#otp").on("keypress", function () {
    console.log("anythnf");
    $("#otp-error").hide();
    $("#otp").css("border-color", "green");
  });
});
