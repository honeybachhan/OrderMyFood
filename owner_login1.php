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
				header('location:owner_order_placed.php');
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
        <title>Owner Login</title>

        <!-- CSS -->
         <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
      	
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
	                        		<div class="form-top-left" >
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
				                        	<input type="text" name="useremail" placeholder="Email ID" class="form-username form-control" id="useremail">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="userpassword" placeholder="Password..." class="form-password form-control" id="userpassword">
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
										
										<p><a href="owner_forgotpassword.php">Forgot Password?</a></p>
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
						
       
        
				</body>
					</html>