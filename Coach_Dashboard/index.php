<?php
    include_once "../DB.php";
    
    $db = new DB("localhost",  "ibmhtk_main", 'ag97GC4MMdZVGEy', "ibmhtk_Tandorost");
    $db->makeConnection();
    
    function data_uri($binary, $mime) 
    {  
      $base64   = base64_encode($binary); 
      return ('data:' . $mime . ';base64,' . $base64);
    }

    $cid = $_GET['cid'];
    $cinfo = $db->getCoachInfo($cid);
    $advices = $db->getCoachAdvices($cid);
    $income = (int)$cinfo['cost'] * count($advices);
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>تندرست</title>
  <link rel="icon" type="image/png" href="images/favicon.ico"/>
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="http://font.limil.org/jadid.min.css"/>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap"
    rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area" id="here">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="" />
            <span style="margin-inline: 8px;">
              <h6 class="mytx6" >تندرست</h6> 
            </span>
            <img src="images/logo.png" alt="" />
          </a>
        </nav>
      </div>

    </header>
    <!-- end header section -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
        <div class="modal-content">
            <form method="POST">
                <textarea class="txa" name="message" rows="10" cols="20"></textarea>
                <input class="mybtn" type="submit" value="ارسال" onclick="myFunction2()" id="mybb">
            </form>
        </div>   
    </div>

    <div class="maindiv">
      <div class="sols">
        <img class='myimg' src="images/1.jpg" alt="">
        <p class="mytx1"><?php echo $cinfo['firstname'] . ' ' . $cinfo['lastname']; ?></p>
        <p class="mytx2">رشته : <?php echo $cinfo['specialty']; ?></p>
        <p class="mytx2">سابقه :   <?php echo $cinfo['experience'];?>  سال</p>
        <hr>
        <p class="mytx2">تعداد شاگرد ها : <?php echo count($advices); ?> نفر</p>
        <p class="mytx2">درامد حاصل <?php echo $income; ?> تومان</p>
      </div>
      <div class="sols2">
        
      <div class="answerd">
        <h6 class="mytx3">برنامه های نوشته شده</h6>
        <?php
            foreach($advices as $advice)
            {
                $state = $advice['state'];
                $uinfo = $db->getUserInfo($advice['uid']);
                $uname = $uinfo['firstname'] . ' ' . $uinfo['lastname'];
                if($state == 'Sent')
                {
                    $txt = $advice['advice'];
                    echo "<a href='here' onlick='myFunction(this)'><h5 class='mytx6'> $uname  => $txt*</h5></a>";
                }
            }
            $acnt = count($advice);
            echo "<h5> "
        ?>
      </div>

      <div class="notanswer" >
        <h6 class="mytx3">برنامه های نوشته نشده</h6>
        <?php
            foreach($advices as $advice)
            {
                $state = $advice['state'];
                $uinfo = $db->getUserInfo($advice['uid']);
                $uname = $uinfo['firstname'] . ' ' . $uinfo['lastname'];
                if($state == 'WaitForAdvice')
                {
                    echo "<a href='here' onlick='myFunction(this)'><h5 class='mytx6'> $uname *</h5></a>";
                }
            }
            $acnt = count($advice);
            echo "<h5> "
        ?>
      </div>

      </div>

    </div>

  <!-- about section -->

  <section class="about_section layout_padding" id="about">
    <div class="container">
      <div class="heading_container">
        <h2 class="mytx2">
          درباره ی تندرست
        </h2>
      </div>
      <div class="box">
        <div class="img-box">
          <img src="images/about-img.png" alt="">
        </div>
        <div class="detail-box">
          <p class="mytx5">
            گروه تخصصی "تندرست" در سال 1399 با هدف فعاليت در زمينه ارائه کلیه
            خدمات و محصولات ورزشی از طریق فضای مجازی شروع به فعالیت نمود. ما نیز همانند بسیاری از شما مراجعه کنندگان به 
            فضای مجازی و مشتریان سنتی که به دنبال سریعترین، ساده ترین و ارزانترین راه دریافت خدمات و محصولات ورزشی بودید، 
            همواره دچار سختی ها و پیچیدگی های مراحل خرید یا فروش در شکل سنتی و مجازی بوده ایم و به خوبی می دانیم که
            یافتن بهترین گزینه ی ممکن برای خرید و فروش خدمات و محصولات ورزشی در بازار شلوغ کنونی،
            کاری بس پر دغدغه، زمان بر، و گیج کننده است. از این رو گروه تندرست 
            به عنوان جامعه متخصصین ورزش کشور و مسلط به مقوله ورزش و تحولات گوناگون 
            این صنعت بر آن شد که ضمن بررسی علمی و دقیق نیاز ها، محدودیت ها، 
            فرصت ها و تهدیدهای موجود بازار فعلی ورزش کشور ، 
            به ایجاد و راه اندازی پایگاهی مجازی بپردازد.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->

  <!-- info section -->

  <section class="info_section layout_padding2-top" id="contact">
    <div class="container">
      <div class="info_form">
        <h4>
          Our Newsletter
        </h4>
        <form action="">
          <input type="text" placeholder="Enter your email">
          <div class="d-flex justify-content-end">
            <button>
              subscribe
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h6>
            About Energym
          </h6>
          <p>
            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
            minim veniam, quis nostrud exercitation u
          </p>
        </div>
        <div class="col-md-2 offset-md-1">
          <h6>
            Menus
          </h6>
          <ul>
            <li class=" active">
              <a class="" href="index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="">
              <a class="" href="index.html#about">About </a>
            </li>
            <li class="">
              <a class="" href="#">Login</a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>
            Useful Links
          </h6>
          <ul>
            <li>
              <a href="">
                Adipiscing
              </a>
            </li>
            <li>
              <a href="">
                Elit, sed
              </a>
            </li>
            <li>
              <a href="">
                do Eiusmod
              </a>
            </li>
            <li>
              <a href="">
                Tempor
              </a>
            </li>
            <li>
              <a href="">
                incididunt
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-3">
          <h6>
            Contact Us
          </h6>
          <div class="info_link-box">
            <a href="">
              <img src="images/location-white.png" alt="">
              <span> No.123, loram ipusm</span>
            </a>
            <a href="">
              <img src="images/call-white.png" alt="">
              <span>+01 12345678901</span>
            </a>
            <a href="">
              <img src="images/mail-white.png" alt="">
              <span> demo123@gmail.com</span>
            </a>
          </div>
          <div class="info_social">
            <div>
              <a href="">
                <img src="images/facebook-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/twitter-logo-button.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/linkedin.png" alt="">
              </a>
            </div>
            <div>
              <a href="">
                <img src="images/instagram.png" alt="">
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info section -->


  <!-- footer section -->
  <section class="container-fluid footer_section ">
    <p>
      &copy; 2019 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <!-- my function -->
  <script>

    var modal = document.getElementById("myModal");

    function myFunction(elm) {
      
      modal.style.display = "block";

    }

    window.onclick = function(event) {

        if (event.target == modal) {
          modal.style.display = "none";
        }

    }

  </script>

  <script>
    function openNav() {
      document.getElementById("myNav").classList.toggle("menu_width");
      document
        .querySelector(".custom_menu-btn")
        .classList.toggle("menu_btn-style");
    }
  </script>
</body>

</html>