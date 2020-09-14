<?php
require 'connecttomysql.php';
if(isset($_POST['regi']))
{
	$fname=$_POST['fname']; 
	$lname=$_POST['lname'];
	$mob=$_POST['mob'];
	$email=$_POST['email'];
	$passwordsignup=$_POST['passwordsignup'];
	$passwordsignup_confirm=$_POST['passwordsignup_confirm'];
	$address=$_POST['address']; 
	$country=$_POST['country'];
	$state=$_POST['state']; 
	$pincode=$_POST['pincode'];

	$query1= "select * from customer_detail where mob = '$mob'";
	$is_query_run1=mysqli_query($connect,$query1);
	if(mysqli_affected_rows($connect) > 0)
	{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Mobile No. is already registered');
	
    </SCRIPT>");
	
	}
    else
	{
		session_start();
	$fname=preg_replace('/\s+/','',$_POST['fname']);
	$datee=@date("YmdHi");
	
	$csid=$datee.$fname;
	$_SESSION['csid']=$csid;
	$VerificationCode=mt_rand(100000,999999);
	//Insert Query of SQL
	mysqli_query($connect,"INSERT INTO customer_detail(csid,fname,lname,mob,email,pass,cpass,addr,country,state,pincode,verify_code,isVerify,isActive) VALUES ('$csid','$fname','$lname','$mob',
	'$email','$passwordsignup','$passwordsignup_confirm','$address','$country','$state','$pincode','$VerificationCode','N','N')");
	
		
		if($query1)
		{
			include('sms/way2sms-api1.php');
//$uid = $_POST['user'];
//$uid ='8050480046';

$uid ='9731063350';
//$pass = $_POST['pass'];
//$pass ='qwerty19';
$pass ='priyanka0404';
$phone = $mob;
//$message = $_POST['message'];
$message =$VerificationCode;

sendWay2SMS($uid,$pass,$phone,$message);
		}
}

}

?>
								
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Customer Registration Form</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
		<script type="text/javascript" src="validate1.js"></script>
		<style>
		
		</style>
    </head>
<body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 ">
                            <h1> <b>Registration </b></h1>
                            <div class="description">
                            	
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4"  >
								<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3><b>Sign up now</b></h3>
	                            		<p><b>Fill in the form below to get instant access:</b></p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="customer_register.php" method="post" class="registration-form" name="Registration"onsubmit="return(validate());" enctype="multipart/form-data" >
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-first-name">First name</label>
				                        	<input type="text" name="fname" placeholder="First name..." required="required" class="form-first-name form-control" id="fname">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Last name</label>
				                        	<input type="text" name="lname" placeholder="Last name..." required="required" class="form-last-name form-control" id="lname">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Mobile No.</label>
				                        	<input type="text" name="mob" placeholder="Mobile No..." required="required" class="form-last-name form-control" id="mob">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Email</label>
				                        	<input type="text" name="email" placeholder="Email..." required="required" class="form-email form-control" id="email">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Password</label>
				                        	<input type="password" name="passwordsignup" placeholder="Password..." required="required" class="form-last-name form-control" id="passwordsignup">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Confirm Password</label>
				                        	<input type="password" name="passwordsignup_confirm" placeholder="Confirm Password..." required="required" class="form-last-name form-control" id="passwordsignup_confirm">
				                        </div>
										<script>
								var password = document.getElementById("passwordsignup")
                                , confirm_password = document.getElementById("passwordsignup_confirm");

                                function validatePassword(){
                                if(password.value != confirm_password.value) {
                                confirm_password.setCustomValidity("Passwords Don't Match");
                                } else {
                                confirm_password.setCustomValidity('');
                                }
                                }

                                password.onchange = validatePassword;
                                confirm_password.onkeyup = validatePassword;
                                </script>
				                        
										
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Address</label>
				                        	<input type="text" name="address" placeholder="Address..." required="required" class="form-email form-control" id="address">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Country</label>
				                        	<input type="text" name="country" placeholder="Country..." required="required" class="form-email form-control" id="country">
				                        </div>
										
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">State</label>
				                        	<input type="text" name="state" placeholder="State..." required="required" class="form-email form-control" id="state">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Pincode</label>
				                        	<input type="text" name="pincode" placeholder="Pincode..." required="required" class="form-email form-control" id="pincode">
				                        </div>
										
										
				                        <button type="submit" class="btn" id="regi" name="regi">Sign me up!</button>
				                    </form>
									
			                    </div>
								</div>
								</div>
								</div>
								
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
		</body>
		</html>