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

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
    {
        if($_POST['type'] == 'user')
        {
            if($uid = $db->loginUser($_POST['username'], $_POST['password']))
            {
                redirect("https://ibmh.tk/Tandorost/User_Dashboard/index.php?uid=$uid");
            }
            else
            {
                echo "<script>alert('نام کاربری یا رمز عبور وارد شده صحیح نمیباشد!');</script>";
            }
        }
        else if($_POST['type'] == 'coach')
        {
            if($cid = $db->loginCoach($_POST['username'], $_POST['password']))
            {
                redirect("https://ibmh.tk/Tandorost/Coach_Dashboard/index.php?cid=$cid");
            }
            else
            {
                echo "<script>alert('نام کاربری یا رمز عبور وارد شده صحیح نمیباشد!');</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ورود</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">

				<label class="switch">
					<input type="checkbox" id="togBtn" onclick="myfn(this)">
					<div class="slider round">
					<!--ADDED HTML -->
					<span class="on">مربی</span>
					<span class="off">کاربر</span>
					<!--END-->
					</div>
				</label>

				<div id="use" class="User">
					<form method="POST">
					    <input type="hidden" name="type" value="user">
    					<span class="login100-form-title p-b-41">
    						<b>ورود کاربر</b>
    					</span>
    					<div class="wrap-input100 validate-input" data-validate = "نام کاربری را وارد کنید">
    						<input class="input100" type="text" name="username" placeholder="نام کاربری">
    						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
    					</div>
    
    					<div class="wrap-input100 validate-input" data-validate="رمز عبور  را وارد کنید">
    						<input class="input100" type="password" name="password" placeholder="رمز عبور">
    						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
    					</div>
    
    					<div class="container-login100-form-btn m-t-32">
    						<button class="login100-form-btn" type="submit">
    							ورود
    						</button>
    					</div>

					</form>
				</div>

				<div id="cho" class="Coach">
					<form method="POST" >
					    <input type="hidden" name="type" value="coach">
						<span class="login100-form-title p-b-41">
							<b>ورود مربی</b>
						</span>
						<div class="wrap-input100 validate-input" data-validate = "نام کاربری را وارد کنید">
							<input class="input100" type="text" name="username" placeholder="نام کاربری">
							<span class="focus-input100" data-placeholder="&#xe82a;"></span>
						</div>
	
						<div class="wrap-input100 validate-input" data-validate="رمز عبور  را وارد کنید">
							<input class="input100" type="password" name="password" placeholder="رمز عبور">
							<span class="focus-input100" data-placeholder="&#xe80f;"></span>
						</div>
	
						<div class="container-login100-form-btn m-t-32">
							<button class="login100-form-btn" type="submit">
								ورود
							</button>
						</div>
	
					</form>
				</div>


			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

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

</body>
</html>