$(this).ready(function () {
  var sender_name = $(".sender-name").text();
  var sender_dp = $(".senderdp").text();
  var receiver_name = $(".receiver").text();
  var receiver_dp = $(".receiverdp").text();
  var sender_id = $(".sender-id").text();
  var receiver_id = $(".id-hidden").text();
  var sender_Channel_id = "user" + sender_id + "user" + receiver_id;
  var receiver_Channel_id = "user" + receiver_id + "user" + sender_id;

  $.ajax({
    url: "chatload.php",
    method: "POST",
    data: {
      sender_id: sender_id,
      receiver_id: receiver_id,
      sender_Channel_id: sender_Channel_id,
      receiver_Channel_id: receiver_Channel_id,
    },
  })
    .done(function (response) {
      var data = JSON.parse(response);

      for (var i = 0; i < data.length; i++) {
        // sender message section
        if (data[i].sender_id == sender_id) {
          //sender text message section
          if (data[i].type == "text") {
            var chatAppend = `
            <div class="msg right-msg">
              <div class="msg-img" style="background-image: url(../css/dp/${sender_dp})"></div>

              <div class="msg-bubble">
                <div class="msg-info">
                  <div class="msg-info-name">${sender_name}</div>
                  <div class="msg-info-time">${data[i].time}</div>
                </div>

                <div class="msg-text">
                  ${data[i].chat}
                </div>
              </div>
            </div>
          `;
            $(".msger-chat").append(chatAppend);
            $(".msger-chat").scrollTop($(".msger-chat")[0].scrollHeight);
          }
          //sender mms section
          else if (data[i].type == "mms") {
            //sender pdf section
            if (data[i].extension == "pdf") {
              var chatAppend = `<div class="msg right-msg">
      <div class="msg-img" style="background-image: url(../css/dp/${sender_dp})"></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${sender_name}</div>
          <div class="msg-info-time">${data[i].time}</div>
        </div>

        <div class="msg-file"><i class="fas fa-file-pdf"></i>
          <a id="pdf-download" href="../upload_data/files/${data[i].file_name}" download="${data[i].file_name}"">
            ${data[i].file_name}
          </a>
        </div>
      </div>
    </div>`;

              $(".msger-chat").append(chatAppend);
              $(".msger-chat").scrollTop($(".msger-chat")[0].scrollHeight);
            }
            // sender image section
            else {
              var chatAppend = `<div class="msg right-msg">
      <div class="msg-img" style="background-image: url(../css/dp/${sender_dp})"></div>
      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${sender_name}</div>
          <div class="msg-info-time">${data[i].time}</div>
        </div>
        <div class="msg-image">
          <img class="outgoing-msg-image" src="../upload_data/image-files/${data[i].file_name}
          " alt="">
        </div>
      </div>
    </div>`;

              $(".msger-chat").append(chatAppend);
              $(".msger-chat").scrollTop($(".msger-chat")[0].scrollHeight);
            }
          }
        }

        // receiver message section
        else if (data[i].sender_id != sender_id) {
          // text message section
          if (data[i].type == "text") {
            var chat = `    <div class="msg left-msg">
      <div
       class="msg-img"
       style="background-image: url(../css/dp/${receiver_dp})"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${receiver_name}</div>
          <div class="msg-info-time">${data[i].time}</div>
        </div>

        <div class="msg-text">
          ${data[i].chat}
        </div>
      </div>
    </div>`;
            $(".msger-chat").append(chat);
            $(".msger-chat").scrollTop($(".msger-chat")[0].scrollHeight);
          }

          // mms section
          else if (data[i].type == "mms") {
            // receiver pdf section
            if (data[i].extension == "pdf") {
              var chat = `<div class="msg left-msg">
      <div
       class="msg-img"
       style="background-image: url(../css/dp/${receiver_dp})"
      ></div>
      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name reciever-name">${receiver_name}</div>
          <div class="msg-info-time">${data[i].time}</div>
        </div><i class="far fa-file-pdf"></i>
          <a id="pdf-download" href="../upload_data/files/${data[i].file_name}" download="${data[i].file_name}">${data[i].file_name}</a>
      </div>
    </div>`;
              $(".msger-chat").append(chat);
              $(".msger-chat").scrollTop($(".msger-chat")[0].scrollHeight);
            }
            // receiver image section
            else {
              var chat = `<div class="msg left-msg">
      <div
       class="msg-img"
       style="background-image: url(../css/dp/${receiver_dp})"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name reciever-name">${receiver_name}</div>
          <div class="msg-info-time">${data[i].time}</div>
        </div>
          <img class="incoming-msg-image" src="../upload_data/image-files/${data[i].file_name}" alt="">
      </div>
    </div>`;
              $(".msger-chat").append(chat);
              $(".msger-chat").scrollTop($(".msger-chat")[0].scrollHeight);
            }
          }
        }
      }
    })
    .fail(function () {
      alert("Operation failed. Try again");
    });
});
