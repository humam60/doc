<?php
session_start();
include_once ("include/c.php");


if (isset($_SESSION['user'])==true)
{
    header("Location:l.php");
}



if (isset($_POST['submit'])) {
echo "its submit";

$username = stripcslashes(mysqli_real_escape_string($conn, $_POST['username']));
$password = md5($_POST['password']);
$sql = mysqli_query($conn, " SELECT username , password FROM user WHERE username = '$username' AND password = '$password'");

if (mysqli_num_rows($sql)!= 1){

    echo "its not login";
}
else{

    echo " its login";

    $user=mysqli_fetch_assoc($sql);

    //$_SESSION['id']=$user['id'];
    $_SESSION['user']=$user['username'];
    $x=$_SESSION['user'];
    echo '<meta http-equiv="refresh" content="0;URL=http://localhost/doc/l.php" />';
    echo  "$x";

}}

?>



<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Login Form Template</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link href="css/bootstrap-rtl.min.css" rel="stylesheet">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row" style="margin-top: -88px;">
                        <div class="col-sm-8 col-sm-offset-2 text" >
                            <h1><strong>برنامج اداره العياده </strong> </h1>
                            <div class="description">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">


                        	<div class="form-top">

                                <div class="form-top-left">
                                    <h3 style="text-align: right;">لوحه تسجيل الدخول</h3>
                                    <p style="text-align: right;">الرجاء قم بادخال اسم المستخدم وكلمة السر :</p>
                                </div>

                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>


                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="اسم المستخدم ..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="password">Password</label>
			                        	<input type="password" name="password" placeholder="كلمة المرور ..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" name="submit" id="submit" class="btn"> تسجيل الدخول</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>تواصل معنا </h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-1 btn-link-1-facebook" href="http://fb.com/homamsec">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>

                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>