 <?php  
session_start();  
 if(!$_SESSION['name'])   
    header("Location:../login.php");
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat box</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
      <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<section class="msger">
  <header class="msger-header">
    <div class="msger-header-title">
      <a class="backButton" href="../friends.php"><i class="fas fa-arrow-left fa-2x"></a></i>
      <img class="dpmain" src="../css/dp/<?php echo $_GET['dp'];?>" alt="">
    <span ><?php echo $_GET['name'];?></span>
    </div>
    <i class="fab fa-cuttlefish"></i>
    <div class="sender-id"><?php echo $_SESSION['id'];?></div>
  </header>

  <main class="msger-chat">
    <!-- <div class="msg left-msg">
      <div
       class="msg-img"
       style="background-image: url(./1.jpg)"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name reciever-name">Sajad</div>
          <div class="msg-info-time">12:45</div>
        </div>

        <div class="msg-text">
          Hi, welcome to SimpleChat! Go ahead and send me a message. 😄
        </div>
      </div>
    </div>

    <div class="msg right-msg">
      <div
       class="msg-img"
       style="background-image: url(./2.jpg)"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name sender-name"></div>
          <img class="dpmain" src="../css/dp/<?php echo $_GET['dp'];?>" alt="">
          <div class="msg-info-time">12:46</div>
        </div>

        <div class="msg-text">
          You can change your name in JS section!
        </div>
      </div>
    </div> -->

     <div class="msg-info-name sender-name"><?php echo $_SESSION['name'];?></div>
 <div class="msg left-msg">
      <div
       class="msg-img"
       style="background-image: url(./1.jpg)"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name reciever-name">Sajad</div>
          <div class="msg-info-time">12:45</div>
        </div>
          <img class="incoming-msg-image image-popup" src="../css/images/london.png" alt="">
      </div>
    </div>

    <div class="msg right-msg">
      <div
       class="msg-img"
       style="background-image: url(./2.jpg)"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name sender-name"></div>
          <div class="msg-info-time">12:46</div>
        </div>

        <div class="msg-image">
          <img class="outgoing-msg-image image-popup" src="./bg.png" alt="">
        </div>
      </div>
    </div>

    <!-- file send -->
    <div class="msg right-msg">
      <div
       class="msg-img"
       style="background-image: url(./2.jpg)"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name sender-name"></div>
          <div class="msg-info-time">12:46</div>
        </div>

        <div class="msg-text">
          <a id="download" href="../a.pdf" download="b.pdf">b.pdf</a>
        </div>
      </div>
    </div>

    <div class="msg left-msg">
      <div
       class="msg-img"
       style="background-image: url(./1.jpg)"
      ></div>

      <div class="msg-bubble">
        <div class="msg-info">
          <div class="msg-info-name reciever-name">Sajad</div>
          <div class="msg-info-time">12:45</div>
        </div>
          <a id="download" href="../a.pdf" download="b.pdf">b.pdf</a>
      </div>
    </div>
    <!--  -->
  </main>

  <form class="msger-inputarea">
    <input type="text" class="msger-input" placeholder="Enter your message..." autofill="off">
    <span class="id-hidden"><?php echo $_GET['key'];?></span>
    <span class="receiver"><?php echo $_GET['name'];?></span>
    <span class="dp receiverdp"><?php echo $_GET['dp'];?></span>
    <span class="dp senderdp"><?php echo $_SESSION['dp'];?></span>
    <div class="image-upload">
  <label for="input_file">
    <i class="fas fa-paperclip "></i>
  </label>
  <input accept="image/*,.pdf" id="input_file" type="file" />
</div>
    <button type="submit" class="msger-send-btn">Send</button>
  </form>
</section>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
     <img id="preview" src="#" alt="your image" />
     <span id="fileNamePreview"></span>
     <div class="image-buttons">
    <button class="sendImage">SEND</button>
    <button class="cancelImage">CANCEL</button>
  </div>
  </div>
</div>
<!-- end -->

<div id="popupModal" class="modal">
  <!-- Modal content -->
  <div class="popup-modal-content">
     <img id="PopupPreview" src="../css/images/banner2.jpg" alt="your image" />
     <div class="image-buttons">
    <button class="closePopup">CLOSE</button>
  </div>
  </div>
</div>

<script src="imagePopUp.js"></script>
<script src="sendmessage.js"></script>
<script src="pusher.js"></script>
<script src="chat_load.js"></script>
<script src="fileSend.js"></script>
</body>
</html>