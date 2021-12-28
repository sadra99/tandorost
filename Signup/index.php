<?php
    
    include_once "../DB.php";
    
    $db = new DB("localhost",  "ibmhtk_main", 'ag97GC4MMdZVGEy', "ibmhtk_Tandorost");
    $db->makeConnection();
    
    function redirect($url) {
        ob_start();
        header('Location: '.$url);
        ob_end_flush();
        die();
    }
    
    function data_uri($binary, $mime) 
    {  
      $base64   = base64_encode($binary); 
      return ('data:' . $mime . ';base64,' . $base64);
    }
    
    if ( $_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if($_POST['type'] == 'user')
        {
            echo "<script>alert('user');</script>";
            if($db->createUser($_POST['username'], $_POST['password'], $_POST['firstname']
                                    ,$_POST['lastname'], $_POST['pid'], $_POST['phone_number']
                                    ,$_POST['birth_date'], $_POST['gender'])
            )
            {
                echo "<script>alert('شما با موفقیت ثبت نام شدید');</script>";
            }
            else
            {
                echo "<script>alert('وجود خطا در اطلاعات وارد شده');</script>";
            }
        }
        else if($_POST['type'] == 'coach')
        {
            $blob = file_get_contents($_FILES['img']['tmp_name']);
            #$file = $_FILES['img']['tmp_name'];
            // $fname = $_FILES['img']['tmp_name'];
            // $ss = strlen($binary);
            // echo "<script>alert('$fname');</script>";
            // echo "<script>alert('$ss');</script>";
            #$echo base64(file_get_contents($_FILES['img']['tmp_name'];)
            /*<img class='myimg'  src='<?php echo data_uri($cinfo['photo'],'image/png'); ?>' alt="" />*/
            
            #$blob = mysqli_real_escape_string($db->connection, file_get_contents($file));
            // if (getimagesize($_FILES['imagefile']['tmp_name']) == false) {
            //     echo "<br />Please Select An Image.";
            // } 
            // else
            // {
            //     $image = $_FILES['imagefile']['tmp_name'];
            //     $name = $_FILES['imagefile']['name'];
            //     $image = base64_encode(file_get_contents(addslashes($image)));
                 
            //     $sqlInsertimageintodb = "INSERT INTO `imageuploadphpmysqlblob`(`name`, `image`) VALUES ('$name','$image')";
            //     if (mysqli_query($conn, $sqlInsertimageintodb)) 
            //     {
            //         echo "<br />Image uploaded successfully.";
            //     } 
            //     else 
            //     {
            //         echo "<br />Image Failed to upload.<br />";
            //     }
             
            // }
 
            if($db->createCoach($_POST['username'], $_POST['password'], $_POST['firstname']
                                    ,$_POST['lastname'], $_POST['pid'], $_POST['phone_number']
                                    ,$_POST['birth_date'], $_POST['gender'], $_POST['specialty']
                                    , $_POST['exp'], $_POST['cost'], addslashes($blob))
            )
            {
                echo "<script>alert('شما با موفقیت ثبت نام شدید');</script>";
            }
            else
            {
                echo "<script>alert('وجود خطا در اطلاعات وارد شده');</script>";
            }
        }

    }

?>


<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>ثبت نام</title>

    <!-- Icons font CSS-->
	<link rel="icon" type="image/png" href="img/favicon.ico"/>
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper p-t-60 p-b-50 font-poppins" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5),
         rgba(0, 0, 0, 0.5)), url('img/1.jpg'); background-size:100%; background-attachment: fixed;">

        <label class="switch">
            <input type="checkbox" id="togBtn" onclick="myfn(this)">
            <div class="slider round">
            <!--ADDED HTML -->
            <span class="on">مربی</span>
            <span class="off">کاربر</span>
            <!--END-->
            </div>
        </label>
          
        <!-- Coach -->
        <div class="Coach" id="cho">
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">
                        <h2 class="title">فرم ثبت نام مربی</h2>
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="type" value="coach">
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">نام کاربری</label>
                                        <input class="input--style-4" type="text" name="username">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">رمز عبور</label>
                                        <input class="input--style-4" type="password" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">نام</label>
                                        <input class="input--style-4" type="text" name="firstname">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">نام خانوادگی</label>
                                        <input class="input--style-4" type="text" name="lastname">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">تاریخ تولد</label>
                                        <div class="input-group-icon">
                                            <input class="input--style-4 js-datepicker" type="text" name="birth_date">
                                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">جنسیت</label>
                                        <div class="p-t-10">
                                            <label class="radio-container m-r-45">مرد
                                                <input type="radio" checked="checked" name="gender" value="0">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-container">زن
                                                <input type="radio" name="gender" value="1">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">کد ملی</label>
                                        <input class="input--style-4" type="text" name="pid">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">شماره تلفن</label>
                                        <input class="input--style-4" type="text" name="phone_number">
                                    </div>
                                </div>
                            </div>
    
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">سابقه</label>
                                        <input class="input--style-4" type="text" name="exp">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">هزینه مشاوره</label>
                                        <input class="input--style-4" type="text" name="cost">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">تخصص</label>
                                        <input class="input--style-4" type="text" name="specialty">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">عکس پرسنلی</label>
                                        <input type="file" id="img" name="img" accept="image/*" class="myimg">
                                    </div>
                                </div>
                            </div>
    
                            <div class="p-t-15">
                                <button class="btn" type="submit">ارسال</button>
                            </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- User -->

        <div class="User" id="use">
            <div class="wrapper wrapper--w680">
                <div class="card card-4">
                    <div class="card-body">
                        <h2 class="title">فرم ثبت نام کاربر</h2>
                        <form method="POST">
                            <input type="hidden" name="type" value="user">
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">نام کاربری</label>
                                        <input class="input--style-4" type="text" name="username">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">رمز عبور</label>
                                        <input class="input--style-4" type="password" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">نام</label>
                                        <input class="input--style-4" type="text" name="firstname">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">نام خانوادگی</label>
                                        <input class="input--style-4" type="text" name="lastname">
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">تاریخ تولد</label>
                                        <div class="input-group-icon">
                                            <input class="input--style-4 js-datepicker" type="text" name="birth_date">
                                            <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">جنسیت</label>
                                        <div class="p-t-10">
                                            <label class="radio-container m-r-45">مرد
                                                <input type="radio" checked="checked" name="gender" value="0">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="radio-container">زن
                                                <input type="radio" name="gender" value="1">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">کد ملی</label>
                                        <input class="input--style-4" type="text" name="pid">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <label class="label">شماره تلفن</label>
                                        <input class="input--style-4" type="text" name="phone_number">
                                    </div>
                                </div>
                            </div>
    
                            <div class="p-t-15">
                                <button class="btn" type="submit">ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <script>

        function myfn(elm){
            if(elm.checked == true){
                
                document.getElementById("use").style.display = 'none';
                document.getElementById("cho").style.display = 'block';

            }
            else{
                document.getElementById("cho").style.display = 'none';
                document.getElementById("use").style.display = 'block';
                
            }

        }

    </script>
    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->