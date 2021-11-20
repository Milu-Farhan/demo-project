$(".sendImage").click(function () {
  $(".sendImage").css("pointer-events", "none");

  var a = $("#input_file").val();
  var filename = $("input[type=file]")
    .val()
    .replace(/C:\\fakepath\\/i, "");
  var file_extension = a.replace(/^.*\./, "");

  var senderName = $(".sender-name").text();
  var senderdp = $(".senderdp").text();
  var sender_id = $(".sender-id").text();
  var receiver_id = $(".id-hidden").text();
  var Channel_id = "user" + sender_id + "user" + receiver_id;
  var timeNow = new Date();
  var sendTime = timeNow.toLocaleString("en-US", {
    day: "numeric",
    month: "short",
    hour: "numeric",
    minute: "numeric",
    hour12: true,
  });

  var file_data = $("#input_file").prop("files")[0];
  console.log(file_data);
  var form_data = new FormData();

  form_data.append("file", file_data);
  form_data.append("type", "mms");
  form_data.append("sender_id", sender_id);
  form_data.append("receiver_id", receiver_id);
  form_data.append("sender_name", senderName);
  form_data.append("dp", senderdp);
  form_data.append("channel_id", Channel_id);
  form_data.append("sendTime", sendTime);

  $.ajax({
    url: "process.php",
    type: "POST",
    dataType: "script",
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,
  })
    .done(function (response) {
      $(".modal").css("display", "none");
      $(".sendImage").css("pointer-events", "auto");
      $("#input_file").val("");
      var data = JSON.parse(response);
      var messageStatus = data.messageStatus;
      if (messageStatus) {
        var fileName = data.fileName;
        chatAppend(file_extension, senderdp, senderName, sendTime, fileName);
        form_data.append("fileName", fileName);

        $.ajax({
          url: "db_save.php",
          type: "POST",
          data: {
            type: "mms",
            sender_id: sender_id,
            receiver_id: receiver_id,
            channel_id: Channel_id,
            fileName: fileName,
            sendTime: sendTime,
            file_extension: file_extension,
          },
        })
          .done(function () {})
          .fail(function () {});
      } else alert("message send failed");
    })
    .fail(function () {
      alert("ajax error");
    });
});

function chatAppend(extension, dp, sendername, time, filename) {
  if (extension == "pdf") {
    var chatAppend = `<div class="msg right-msg">
      <div class="msg-img" style="background-image: url(../css/dp/${dp})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${sendername}</div>
          <div class="msg-info-time">${time}</div>
        </div>

        <div class="msg-file"><i class="fas fa-file-pdf"></i>
          <a id="pdf-download" href="../upload_data/files/${filename}" download="${filename}"">
            ${filename}
          </a>
        </div>
      </div>
    </div>`;

    $(".msger-chat").append(chatAppend);
    $(".msger-chat")
      .stop()
      .animate({ scrollTop: $(".msger-chat")[0].scrollHeight }, 1000);
  } else {
    var chatAppend = `<div class="msg right-msg">
      <div class="msg-img" style="background-image: url(../css/dp/${dp})"></div>
      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${sendername}</div>
          <div class="msg-info-time">${time}</div>
        </div>
        <div class="msg-image">
          <img class="outgoing-msg-image" src="../upload_data/image-files/${filename}
          " alt="">
        </div>
      </div>
    </div>`;

    $(".msger-chat").append(chatAppend);
    $(".msger-chat")
      .stop()
      .animate({ scrollTop: $(".msger-chat")[0].scrollHeight }, 1000);
  }
}
