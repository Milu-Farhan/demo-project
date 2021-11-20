$("#input_file").change(function () {
  var a = $("#input_file").val();
  var filename = $("input[type=file]")
    .val()
    .replace(/C:\\fakepath\\/i, "");
  var extension = a.replace(/^.*\./, "");
  if (extension != "pdf") {
    $("#fileNamePreview").css("display", "none");
    $("#preview").css("display", "block");
    $("#myModal").css("display", "block");
    readURL(this);
  } else {
    $("#preview").css("display", "none");
    $("#fileNamePreview").html('<i class="far fa-file-pdf"></i> ' + filename);
    $("#fileNamePreview").css("display", "block");
    $("#myModal").css("display", "block");
  }
});

$(".cancelImage").click(function () {
  $("#myModal").css("display", "none");
  $("#input_file").val("");
});

$(".image-popup").click(function () {
  $("#PopupPreview").attr("src", $(this).attr("src"));
  $("#popupModal").css("display", "block");
});

$(".closePopup").click(function () {
  $("#popupModal").css("display", "none");
  $("#input_file").val("");
});

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#preview").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  } else {
    alert("filed to preview image....");
  }
}

// $("#download").click(function (e) {
//   e.preventDefault();
//   window.open.href = "../a.pdf";
// });