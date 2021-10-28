<?php  
session_start();  
if(!$_SESSION['name'])  
{  
    header("Location: login.php");
}  
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>University Website</title>
    <link rel="stylesheet" href="./css/welcome.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <!-- header -->
    <section class="header">
      <nav>
        <a href="index.html"><img src="./css/images/logo.png" alt="" /></a>
        <div class="nav-links" id="navLinks">
          <i class="fa fa-times" onclick="hideMenu()"></i>
          <ul>
            <li><a href="">HOME</a></li>
            <li><a href="">COURSE</a></li>
            <li><a href="">BLOG</a></li>
            <li><a href="">CONTACT</a></li>
            <li><a href="">ABOUT</a></li>
            <li><a href="logout.php" style="color:red">LOG OUT</a></li>
          </ul>
        </div>
        <i class="fa fa-bars" onclick="showMenu()"></i>
      </nav>

      <div class="text-box">
        <h1> Welcome <br><?php echo $_SESSION['name'];?></h1>
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit.
          <br />
          Sequi temporibus animi necessitatibus dolorem expedita.
        </p>
        <p>
          <a class="visit" href="">Visit Us To Know More</a>
        </p>
      </div>
    </section>

    <!-- course -->
    <section class="course">
      <h1>Courses We Offer</h1>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Et,
        perferendis.
      </p>

      <div class="row">
        <div class="course-col">
          <h3>Intermediate</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident
            ex dicta esse dignissimos? Obcaecati fuga ab totam recusandae rerum
            quidem.
          </p>
        </div>
        <div class="course-col">
          <h3>Degree</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident
            ex dicta esse dignissimos? Obcaecati fuga ab totam recusandae rerum
            quidem.
          </p>
        </div>
        <div class="course-col">
          <h3>Post Graduation</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident
            ex dicta esse dignissimos? Obcaecati fuga ab totam recusandae rerum
            quidem.
          </p>
        </div>
      </div>
    </section>

    <!-- campus -->
    <section class="campus">
      <h1>Our Global Campus</h1>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta aliquam
        porro dolores, facere distinctio expedita ut commodi nemo sunt ea
        temporibus repellendus neque nam atque suscipit, quaerat quibusdam et
        possimus.
      </p>

      <div class="row">
        <div class="campus-col">
          <img src="./css/images/london.png" alt="" />
          <div class="layer">
            <h3>LONDON</h3>
          </div>
        </div>

        <div class="campus-col">
          <img src="./css/images/newyork.png" alt="" />
          <div class="layer">
            <h3>NEW YORK</h3>
          </div>
        </div>

        <div class="campus-col">
          <img src="./css/images/washington.png" alt="" />
          <div class="layer">
            <h3>washington</h3>
          </div>
        </div>
      </div>
    </section>

<!-- facilities -->
<section class="facilities">

  <h1>OUR FACILITIES</h1>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius mollitia, fuga doloremque expedita dignissimos rem obcaecati praesentium!</p>

  <div class="row">
    <div class="facilities-col">
      <img src="./css/images/library.png" alt="">
      <h3>world class library</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, delectus?</p>
    </div>

        <div class="facilities-col">
      <img src="./css/images/cafeteria.png" alt="">
      <h3>cafeteria</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, delectus?</p>
    </div>

        <div class="facilities-col">
      <img src="./css/images/basketball.png" alt="">
      <h3>largest playground</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolorem, delectus?</p>
    </div>
  </div>
</section>

    <!-- java script for toggle menu -->
    <script>
      var navLinks = document.getElementById("navLinks");

      function showMenu() {
        navLinks.style.right = "0";
      }

      function hideMenu() {
        navLinks.style.right = " -200px ";
      }
    </script>

    <!-- testimonials -->
    <section class="test">
      <h1>Students Says</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis cumque aperiam, repudiandae veritatis illo dolor!</p>

      <div class="testimonial-col">
        <img src="./css/images/user1.jpg" alt="">
        <div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iusto odio cupiditate voluptatibus ab exercitationem repellat in consequuntur voluptatum nam maxime nobis, ea ut esse soluta veritatis et. Molestiae, minima.
          </p>
          <h3>Lisa</h3>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star-o" aria-hidden="true"></i>
        </div>
      </div>

      <div class="testimonial-col">
        <img src="./css/images/user2.jpg" alt="">
        <div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iusto odio cupiditate voluptatibus ab exercitationem repellat in consequuntur voluptatum nam maxime nobis, ea ut esse soluta veritatis et. Molestiae, minima.
          </p>
          <h3>Kevin</h3>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star" aria-hidden="true"></i>
          <i class="fa fa-star-half-o" aria-hidden="true"></i>
        </div>
      </div>

    </section>

<!-- call to action -->
<section class="call">
<h1>Enroll For Our Various Courses</h1>
<a href="" class="visit">CONTACT US</a>
</section>

<!-- footer -->
<section class="footer">
  <h4>About Us</h4>
  <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit reprehenderit ab ut distinctio, tempore quisquam dicta <br> laudantium sunt officiis repudiandae!</p>

  <div class="icons">
    <i class="fa fa-facebook" aria-hidden="true"></i>
    <i class="fa fa-instagram" aria-hidden="true"></i>
    <i class="fa fa-whatsapp" aria-hidden="true"></i>
    <i class="fa fa-linkedin" aria-hidden="true"></i>
    <i class="fa fa-twitter" aria-hidden="true"></i>
  </div>
  <p>
    Made by <i class="fa fa-heart-o" aria-hidden="true"></i>  Farhan
  </p>
</section>
  </body>
</html>
