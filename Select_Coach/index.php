<?php
    include_once "../DB.php";
    
    $db = new DB("localhost",  "ibmhtk_main", 'ag97GC4MMdZVGEy', "ibmhtk_Tandorost");
    $db->makeConnection();
    
    $bought = false;
    if ( $_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if($db->buyAdvice($_POST['uid'], $_POST['cid']))
        {
            echo "<script>alert('خرید شما با موفقیت انجام شد');</script>";
            $bought = true;
        }
        else
        {
            echo "<script>alert('مشکلی در هنگام خرید پیش آمد!');</script>";
        }
    }
    
    function data_uri($binary, $mime) 
    {  
      $base64   = base64_encode($binary); 
      return ('data:' . $mime . ';base64,' . $base64);
    }

    $cid = $_GET['cid'];
    $uid = $_GET['uid'];
    $cinfo = $db->getCoachInfo($cid);
    
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
  <div class="hero_area">
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

    <div class="maindiv">
      <div class="conts">
        <img class='myimg'  src='<?php echo data_uri($cinfo['photo'],'image/png'); ?>' alt="" />
        <p class="mytx1"><?php echo $cinfo['firstname'] . ' ' . $cinfo['lastname']; ?></p>
        <p class="mytx2"><?php echo $cinfo['specialty']; ?></p>
        <p class="mytx2">هزینه : <?php echo $cinfo['cost']; ?> تومان</p>
        <p class="mytx2">سابقه :  <?php echo $cinfo['experience']; ?> سال</p>
        <hr>
        <form name="bform" method="POST">
            <input class="check" type="checkbox" name="accept" id="myCheck"><h6 class="mytx4" id='dari'>   در صورت پذیرش قوانین و مقررات سایت تیک این گزینه را بزنید</h6>
            <input type="hidden" name="uid" value="<?php echo $uid;?>">
            <input type="hidden" name="cid" value="<?php echo $cid;?>">
            <input class="mybtn" type="button" value="ارسال" onclick="myFunction()" id="mybb">
        </form>
        <h6 class="mytx7" id="res"></h6>
        <h6 class="mytx8" id="res2"></h6>    
      </div>
    </div>

    <div id="newdiv">    

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
    function myFunction() {
      var chc = document.getElementById("myCheck");
      if (chc.checked == true){
          document.bform.submit();
        
      }
      else{
        document.getElementById("res").style.color = 'rgba(223, 43, 43, 0.877)';
        document.getElementById("res").innerHTML = 'تیک گزینه پذیرش قوانین را بزنید';
      }
    }
    function dobought(phone_number)
    {
        document.getElementById("mybb").remove();
        document.getElementById("dari").remove();
        document.getElementById("myCheck").remove();
        document.getElementById("res").style.color = 'rgb(40, 218, 54)';
        document.getElementById("res").style.marginTop = '50px'
        document.getElementById("res").innerHTML = 'پرداخت شما با موفقیت انجام شد';
        document.getElementById("res2").innerHTML = `لطفا برای برقرای ارتباط با مربی بین ساعات 8 تا 18 به شماره ${phone_number} در واتس اپ پیام دهید.`;
        document.getElementById("newdiv").innerHTML = '<div class="main2"><textarea class="txa" name="message" rows="10" cols="20" placeholder=".برنامه مربی از این مکان هم قابل دسترسی است"></textarea></div>';
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

<?php
$pp = $cinfo['phone_number'];
    if($bought)
        echo "<script>dobought('$pp');</script>";
    ?>