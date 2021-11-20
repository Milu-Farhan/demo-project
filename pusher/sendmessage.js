$(".msger-send-btn").click(function (e) {
  e.preventDefault();
    $(".msger-send-btn").css("pointer-events", "none");
  var time = new Date();
  var sendTime = time.toLocaleString("en-US", {
    day: "numeric",
    month: "short",
    hour: "numeric",
    minute: "numeric",
    hour12: true,
  });

  var MessageValue = $(".msger-input").val();
  var senderName = $(".sender-name").text();
  var senderdp = $(".senderdp").text();
  var sender_id = $(".sender-id").text();
  var receiver_id = $(".id-hidden").text();
  var Channel_id = "user" + sender_id + "user" + receiver_id;

  $(".msger-input").val("");
  $(".msger-input").focus();
  $.ajax({
    url: "process.php",
    method: "POST",
    data: {
      type: "text",
      sender_id: sender_id,
      receiver_id: receiver_id,
      message: MessageValue,
      channel_id: Channel_id,
      sender_name: senderName,
      dp: senderdp,
      sendTime: sendTime,
    },
  })
    .done(function (response) {
      $(".msger-send-btn").css("pointer-events", "auto");
      var data = JSON.parse(response);
      var message = data.message;
      var messageStatus = data.messageStatus;
      if (messageStatus == true) {
        var chatAppend = `
            <div class="msg right-msg">
              <div class="msg-img" style="background-image: url(../css/dp/${senderdp})"></div>

              <div class="msg-bubble">
                <div class="msg-info">
                  <div class="msg-info-name">${senderName}</div>
                  <div class="msg-info-time">${sendTime}</div>
                </div>

                <div class="msg-text">
                  ${message}
                </div>
              </div>
            </div>
          `;
        $(".msger-chat").append(chatAppend);
        $(".msger-chat")
          .stop()
          .animate({ scrollTop: $(".msger-chat")[0].scrollHeight }, 500);

        $.ajax({
          url: "db_save.php",
          type: "POST",
          data: {
            type: "text",
            sender_id: sender_id,
            receiver_id: receiver_id,
            message: MessageValue,
            channel_id: Channel_id,
            sendTime: sendTime,
          },
        })
          .done(function () {})
          .fail(function () {
            alert("Operation failed. Try again");
          });
      } else {
        alert("message send failed");
      }
    })
    .fail(function () {
      alert("Operation failed. Try again");
    });
});
