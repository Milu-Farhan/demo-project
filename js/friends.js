$(this).ready(function () {
  $.ajax({
    url: "friendslist.php",
    type: "POST",
    data: {},
  })
    .done(function (response) {
      let data = JSON.parse(response);
      console.log(data);
      for (var i = 0; i < data.length; i++) {
        var name = data[i].first_name + " " + data[i].last_name;
        console.log(data[i].first_name);
        var friends = `<div class="nearby-user">
                <div class="row">
                  <div class="col-md-2 col-sm-2">
                    <img src="./css/dp/${data[i].dp}" alt="user" class="profile-photo-lg">
                  </div>
                  <div class="col-md-7 col-sm-7">
                    <h5><a href="#" class="profile-link">${name}</a></h5>
                    <p>Software Engineer</p>

                    <p class="text-muted">${data[i].id}</p>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <a href="./pusher/index.php?key=${data[i].id}&name=${name}&dp=${data[i].dp}"><button class="btn btn-primary pull-right">Chat</button></a>
                  </div>
                </div>
              </div>`;

        // const friends = `<div class="chat_list">
        //       <div class="chat_people">
        //         <div class="chat_img"> <img class="dp" src="./2.jpg" alt="sunil"> </div>
        //         <div class="chat_ib">
        //           <h5>${name}<span class="chat_date">Dec 25</span></h5>
        //           <span>${data[i].id}</span>
        //           <p>Test, which is a new approach to have all solutions
        //             astrology under one roof.</p>
        //         </div>
        //       </div>
        //     </div>`;

        $(".people-nearby").append(friends);
        // $(".inbox_chat").append(friends);
      }
    })
    .fail(function () {
      alert("Operation failed. Try again");
    });
});
