$(".collector-item-add").click(function (params) {
  $(".add-item-modal").modal("show");
});

$(".edit-item").click(function (params) {
  $(".edit-item-modal").modal("show");
});

$(".delete-item").click(function (params) {
  $(".delete-item-modal").modal("show");
});

$(".close").click(function (params) {
  $(this).modal("hide");
  $("body #collector-key").val("");
  $("body #collector-value").val("");
});

$(".add-item-btn").click(function (params) {
  console.log($("#collector-key").val());
  console.log($("#collector-value").val());
});

$(".edit-item").click(function (params) {
  var key = $(this).closest(".table-row").find(".key").text();
  var value = $(this).closest(".table-row").find(".value").text();
  $("body #collector-key").val(key);
  $("body #collector-value").val(value);
  $(this).closest(".table-row").remove();
  console.log(value);
});
// $(".save-changes").click(function (params) {
//   $("body #collector-key").val("key");
//   var a = $("#collector-key").val();
//   console.log(a);
// });
$(".add-item-btn").click(function (params) {
  $.ajax({
    url: "./a.php",
    type: "POST",
    data: {},
  })
    .done(function (response) {
      var data = JSON.parse(response);
      if (data.status == "done") {
        var append = ` <tr class="table-row">
            <td class="key">its a demo only</td>
            <td class="value">Milu Farhan</td>
            <td>
              <button type="button" class="btn btn-success edit-item"><i class="fas fa-edit"></i></button>
            <button type="button" class="btn btn-danger delete-item"><i class="far fa-trash-alt"></i></button>
            </td>
          </tr>`;

        $("tbody").append(append).show("slow");
      }
    })
    .fail(function (params) {});
});
