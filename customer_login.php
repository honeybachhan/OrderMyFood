<?php

require 'connecttomysql.php';
session_start();
if(isset($_POST['log'])){
	$email=$_POST['email'];
$query="select * from customer_detail where email='$email' ";


if($is_query_run=mysqli_query($connect,$query))
{	
$query_executed=mysqli_fetch_assoc($is_query_run);
	$csid=$query_executed['csid'];
	$_SESSION['csid']=$csid;
	$fname=$query_executed['fname'];
	$_SESSION['fname']=$fname;
	if( $_POST['password']==$query_executed['pass'] )
	{
		if($query_executed['isVerify']=='Y')
		{
			if($query_executed['isActive']=='Y')
			{
				header('location:hotel_list.php');
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
    window.alert('Verify Your Mobile No')
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
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Customer Login </title>

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
		
		
		</style>
    </head>
<body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 ">
                            <h1><b> Login</b> </h1>
                            <div class="description">
                            	
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-4"  >
                        	
                        	<div class="form-box" >
							<center>
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3><b>Login</b></h3>
	                            		<p><b>Enter email and password to log on:</b></p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="" method="post" class="login-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username">Email ID</label>
				                        	<input type="text" name="email" placeholder="Email ID" class="form-username form-control" id="email">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="password">
				                        </div>
										<div class="form-group" style="margin-left:30px;">
											<label class="checkbox">
												<input type="checkbox" value="remember-me" id="remember_me"> Remember me
											</label>
										</div>
										<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
										<script>
											$(function() {
 
											if (localStorage.chkbx && localStorage.chkbx != '') {
											$('#remember_me').attr('checked', 'checked');
											$('#username').val(localStorage.usrname);
											$('#pass').val(localStorage.pass);
											} else {
											$('#remember_me').removeAttr('checked');
											$('#username').val('');
											$('#pass').val('');
											}
 
											$('#remember_me').click(function() {
 
											if ($('#remember_me').is(':checked')) {
											// save username and password
											localStorage.usrname = $('#username').val();
											localStorage.pass = $('#pass').val();
											localStorage.chkbx = $('#remember_me').val();
											} else {
											localStorage.usrname = '';
											localStorage.pass = '';
											localStorage.chkbx = '';
											}
											});
											});
 
										</script>
										<p><a href="customer_forgotpassword.php">Forgot Password?</a></p>
				                        <button type="submit" class="btn" id="log" name="log">Sign in!</button>
				                    </form>
			                    </div>
								 </center>
		                    </div>
		               
		                	
	                        
                        </div>
						</div>
						</div>
						</div>
						</div>
						<script src="assets/js/jquery-1.11.1.min.js"></script>
						<script src="assets/bootstrap/js/bootstrap.min.js"></script>
						
        
				</body>
					</html>