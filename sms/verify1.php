<?php
$connect=mysqli_connect('localhost','root','root','OrderMyFood');
 
if(isset($_POST['submit']))
{
	session_start();
	$otp=$_POST['otp'];
	$csid=@$_SESSION['csid'];
	$query1= "select verify_code from customer_detail where csid='$csid'";
	
	if($is_query_run=mysqli_query($connect,$query1))
	{	
	$query_executed=mysqli_fetch_assoc($is_query_run);
 
	if( $otp==$query_executed['verify_code'] )
	{
	 $query1="UPDATE customer_detail SET isVerify = 'Y', isActive = 'Y' where csid='$csid' ";
    $is_query_run1=mysqli_query($connect,$query1);
	//$query_executed1=mysqli_fetch_assoc($is_query_run1);
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Mobile No. Verification Successful')
    </SCRIPT>");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.location= '../customer_login.php';
	</SCRIPT>");
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Mobile Verification Failed')
    </SCRIPT>");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.location= 'verifyotp.php';
	</SCRIPT>");
	}
	

}

}
?>