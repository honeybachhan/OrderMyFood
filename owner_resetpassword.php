<?php
require 'connecttomysql.php';
$email=@$_GET['email'];
if(isset($_POST['sub']))
{
$pass=$_POST['newpass'];	
$cpass=$_POST['confirmpass'];
$email=$_POST['email'];
if(  $pass==$cpass)
{
	mysqli_query($connect,"UPDATE owner_detail SET pass='$pass',cpass='$cpass' where email='$email'");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Password Changed Successfully');
    </SCRIPT>");
	echo "<meta http-equiv='refresh' content='2;url=owner_login1.php'>";
}
else
{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Password cannot Be Changed');
    </SCRIPT>");
}	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Owner Reset Password</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="css/hotel.css">
		</head>
		
		
		<body>
		<br>
		<br>
<hr>
<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center">Forgot Password?</h2>
                          <p>You can reset your password here.</p>
                            <div class="panel-body">
                              
                              <form class="form" action="owner_resetpassword.php" method="post">
                               
										<div class="form-group">
											 
				                        	<label class="sr-only" for="form-email">Email</label>
				                        	<input type="text" name="email"   class="form-email form-control" id="email" value="<?php echo @$_GET['email']; ?>" readonly>
				                        </div>
								
										<div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Password</label>
				                        	<input type="password" name="newpass" placeholder="New Password" required="required" class="form-last-name form-control" 
											id="newpass">
				                        </div>
										
										<div class="form-group">
				                        	<label class="sr-only" for="form-last-name">Confirm Password</label>
				                        	<input type="password" name="confirmpass" placeholder="Confirm Password" required="required" class="form-last-name form-control" 
											id="confirmpass">
				                        </div>
									  <script>
								var password = document.getElementById("newpass")
                                , confirm_password = document.getElementById("confirmpass");

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
                                    <input class="btn btn-lg btn-primary btn-block" value="Reset My Password" type="submit" name="sub" id="sub">
                                  </div>
                                
                              </form>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


	</body>
	</html>