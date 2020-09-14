<?php
if(isset($_POST['sub']))
{
	$email=$_POST['email'];
	$toemailaddress=$email;
        ini_set('display_errors', 1);
        error_reporting(~0);


        $subjectline = "Order My Food: Reset Password";
        $body ='<html><body><p>To Reset Your Password </p><a href="http://localhost/OrderMyFood/customer_resetpassword.php?email='.$email.'">Click Here</a></body></html>';

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
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Customer Forgot Password</title>

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
                              
                              <form class="form" action="customer_forgotpassword.php" method="post">
                                <fieldset>
                                  <div class="form-group">
                                    <div class="input-group">
                                      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                      
                                      <input id="email" name="email" placeholder="Email Address" class="form-control" type="email" required="true">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit" name="sub" id="sub">
                                  </div>
                                </fieldset>
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