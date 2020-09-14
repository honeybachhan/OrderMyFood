<?php

require 'connecttomysql.php';
session_start();
if(isset($_POST['log'])){
 $email=$_POST['useremail'];
 $pass=$_POST['userpassword'];
 $query="select * from owner_detail where email='$email' ";

if($is_query_run=mysqli_query($connect,$query))
{	
$query_executed=mysqli_fetch_assoc($is_query_run);
//print_r($query_executed);
	if( $pass==$query_executed['pass'] )
	{
		
		$_SESSION['hid']=$query_executed['hid'];
		$_SESSION['email']=$query_executed['email'];
    	
		
		if($query_executed['is_verify']=='Y')
		{
			if($query_executed['is_active']=='Y')
			{
				header('location:upload_menu.php');
			}
			else
			{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('You are not an Active User')
    </SCRIPT>");	
			}
		}
		else
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Verify Your Emain ID')
    </SCRIPT>");
		}
    
	}
	
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Incorrect Username or Password')
    </SCRIPT>");
	}
	
}

}

else{ if(isset($_POST['regi']))
{
	$query1= "select * from owner_detail where email = '$_POST[email]'";
	$is_query_run1=mysqli_query($connect,$query1);
	
	if(mysqli_affected_rows($connect) > 0)
	{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Email is already registered');
    </SCRIPT>");
	
	}
	
else
{
	$email=$_POST[email];
	$hname=preg_replace('/\s+/','',$_POST['hname']);
	$datee=@date("YmdHi");
	$hid=$hname.$datee;
	$VerificationCode=md5(uniqid(rand()));
	$target_dir = "food/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) 
	{
       
        $uploadOk = 1;
    } else
	{
       
        $uploadOk = 0;
    }
	move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        
    
	
	
	
	
	
	
	
//Insert Query of SQL
mysqli_query($connect,"INSERT INTO owner_detail(fname,lname,pass,cpass,mob,email,hname,hid,addr,city,state,pincode,country,website,telephone,abouthotel,image,verify_code,is_verify,is_active) VALUES 
('$_POST[fname]','$_POST[lname]','$_POST[pass]',
'$_POST[cpass]','$_POST[mob]','$email','$_POST[hname]','$hid','$_POST[address]','$_POST[city]','$_POST[state]','$_POST[pincode]','$_POST[country]','$_POST[website]'
,'$_POST[telephone]','$_POST[abouthotel]','$target_file','$VerificationCode','N','N')");

		$toemailaddress=$email;
        ini_set('display_errors', 1);
        error_reporting(~0);


        $subjectline = "Order My Food: Verify Your Email";
        $body ='<html><body><p>To Verify Your EmailID </p><a href="http://localhost/OrderMyFood/verify1.php?hid='.$hid.'&verify_code='.$VerificationCode.'">Click Here</a></body></html>';

        ob_start();
        require_once 'mail/PHPMailer-master/class.phpmailer.php';
        require_once  'mail/PHPMailer-master/PHPMailerAutoload.php';
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->CharSet="UTF-8";
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = 'honey.bachhan@gmail.com';//Enter your gmail address enter your email and password
        $mail->Password = 'utkarsh0404';//Enter your gmail password
        $mail->SMTPAuth = true;
     //   $mail->Mailer="";

        $mail->From = 'honey.bachhan@gmail.com';
        $mail->FromName = 'honey';
        $mail->AddAddress("$toemailaddress");

        $mail->IsHTML(true);
        $mail->Subject    = "$subjectline";
        $mail->AltBody    = "To Read Email use HTML View";
        $mail->Body    = "$body";

        $mail->Send();
		header('location:register1.php');
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
        <title>Owner Login and Registration Form</title>

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
		
    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1> Login </h1>
                            <div class="description">
                            	
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login</h3>
	                            		<p>Enter email and password to log on:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="" method="post" class="login-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username">Email ID</label>
				                        	<input type="text" name="useremail" placeholder="Email ID" class="form-username form-control" id="useremail">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="userpassword" placeholder="Password..." class="form-password form-control" id="userpassword">
				                        </div>
				                        <button type="submit" class="btn" id="log" name="log">Sign in!</button>
				                    </form>
			                    </div>
		                    </div>
		                
		                	
	                        
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                        	
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form below to get instant access:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="" method="post" class="registration-form" name="Registration"onsubmit="return(validate());" enctype="multipart/form-data" >
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-first-name">First name</label>
				                        	<input type="text" name="fname" placeholder="First name..." required="required" class="form-first-name form-control" id="fname">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Last name</label>
				                        	<input type="text" name="lname" placeholder="Last name..." required="required" class="form-last-name form-control" id="lname">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Password</label>
				                        	<input type="password" name="pass" placeholder="Password..." required="required" class="form-last-name form-control" id="pass">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Confirm Password</label>
				                        	<input type="password" name="cpass" placeholder="Confirm Password..." required="required" class="form-last-name form-control" id="cpass">
				                        </div>
										<script>
								var password = document.getElementById("pass")
                                , confirm_password = document.getElementById("cpass");

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
				                        	<label class="sr-only" for="form-last-name">Mobile No.</label>
				                        	<input type="text" name="mob" placeholder="Mobile No..." required="required" class="form-last-name form-control" id="mob">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-email">Email</label>
				                        	<input type="text" name="email" placeholder="Email..." required="required" class="form-email form-control" id="email">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Hotel name</label>
				                        	<input type="text" name="hname" placeholder="Name of your Hotel..." required="required" class="form-email form-control" id="hname">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Address</label>
				                        	<input type="text" name="address" placeholder="Address..." required="required" class="form-email form-control" id="address">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">City</label>
				                        	<input type="text" name="city" placeholder="City..." required="required" class="form-email form-control" id="city">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">State</label>
				                        	<input type="text" name="state" placeholder="State..." required="required" class="form-email form-control" id="state">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Pincode</label>
				                        	<input type="text" name="pincode" placeholder="Pincode..." required="required" class="form-email form-control" id="pincode">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Country</label>
				                        	<input type="text" name="country" placeholder="Country..." required="required" class="form-email form-control" id="country">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Website</label>
				                        	<input type="text" name="website" placeholder="Hotel Website..." required="required" class="form-email form-control" id="website">
				                        </div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Telephone</label>
				                        	<input type="text" name="telephone" placeholder="Telephone No..." required="required" class="form-email form-control" id="telephone">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-about-yourself">About Hotel</label>
				                        	<textarea name="abouthotel" placeholder="About Hotel..." required="required"
				                        				class="form-about-yourself form-control" id="abouthotel"></textarea>
				                        </div>
										 <div class="form-group">
										<label class="sr-only" for="form-image">Image</label>
										<input type="file" name="fileToUpload" id="fileToUpload"></div>
										</div>
				                        <button type="submit" class="btn" id="regi" name="regi">Sign me up!</button>
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				
        			</div>
        			
        		</div>
        	</div>
        </footer>

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