// Enable pusher logging - don't include this in production
// Pusher.logToConsole = true;
var pusher = new Pusher("d1342b62982772246dd7", {
  cluster: "ap2",
});

const channelName =
  "user" + $(".id-hidden").text() + "user" + $(".sender-id").text();
var channel = pusher.subscribe(channelName);
channel.bind("message", function (data) {
  var name = data["response"]["name"];
  var receiverdp = data["response"]["dp"];
  var time = data["response"]["time"];

  if (data["response"]["type"] == "text") {
    var message = data["response"]["message"];
    append(name, receiverdp, time, message);
  } else if (data["response"]["type"] == "mms") {
    var fileName = data["response"]["fileName"];
    console.log(fileName);
    var extension = data["response"]["extension"];
    fileAppend(extension,name, receiverdp, time, fileName);
  }
});

function append(name, dp, time, message) {
  var chat = `    <div class="msg left-msg">
      <div
       class="msg-img"
       style="background-image: url(../css/dp/${dp})"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name">${name}</div>
          <div class="msg-info-time">${time}</div>
        </div>

        <div class="msg-text">
          ${message}
        </div>
      </div>
    </div>`;
  $(".msger-chat").append(chat);
  $(".msger-chat")
    .stop()
    .animate({ scrollTop: $(".msger-chat")[0].scrollHeight }, 500);
}

function fileAppend(extension, name, dp, time, fileName) {
  if (extension != "pdf") {
    var chat = `<div class="msg left-msg">
      <div
       class="msg-img"
       style="background-image: url(../css/dp/${dp})"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name reciever-name">${name}</div>
          <div class="msg-info-time">${time}</div>
        </div>
          <img class="incoming-msg-image" src="../upload_data/image-files/${fileName}" alt="">
      </div>
    </div>`;
    $(".msger-chat").append(chat);
    $(".msger-chat")
      .stop()
      .animate({ scrollTop: $(".msger-chat")[0].scrollHeight }, 500);
  } else {
    var chat = `<div class="msg left-msg">
      <div
       class="msg-img"
       style="background-image: url(../css/dp/${dp})"
      ></div>
      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name reciever-name">${name}</div>
          <div class="msg-info-time">${time}</div>
        </div><i class="far fa-file-pdf"></i>
          <a id="pdf-download" href="../upload_data/files/${fileName}" download="${fileName}">${fileName}</a>
      </div>
    </div>`;
    $(".msger-chat").append(chat);
    $(".msger-chat")
      .stop()
      .animate({ scrollTop: $(".msger-chat")[0].scrollHeight }, 500);
  }
}
