 <?php
       
	    $toemailaddress=$_POST('email');
        ini_set('display_errors', 1);
        error_reporting(~0);


        $subjectline = "Check email for Your Message";
        $body ="http://localhost/OrderMyFood/verify.html";

        ob_start();
        require_once 'PHPMailer-master/class.phpmailer.php';
        require_once  'PHPMailer-master/PHPMailerAutoload.php';
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
		?>