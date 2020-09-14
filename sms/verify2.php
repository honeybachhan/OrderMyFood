<?php
$connect=mysqli_connect('localhost','root','root','OrderMyFood');
 
if(isset($_POST['submit']))
{
	session_start();
	$otp=$_POST['otp'];
	$hid=@$_SESSION['hid'];
	$query1= "select verify_code from owner_detail where hid='$hid'";
	
	if($is_query_run=mysqli_query($connect,$query1))
	{	
	$query_executed=mysqli_fetch_assoc($is_query_run);
 
	if( $otp==$query_executed['verify_code'] )
	{
	 $query1="UPDATE owner_detail SET is_verify = 'Y', is_active = 'Y' where hid='$hid' ";
    $is_query_run1=mysqli_query($connect,$query1);
	//$query_executed1=mysqli_fetch_assoc($is_query_run1);
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Mobile No. Verification Successful')
    </SCRIPT>");
	echo ("<SCRIPT LANGUAGE='JavaScript'>
	window.location= '../owner_login1.php';
	</SCRIPT>");
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Mobile Verification Failed')
    </SCRIPT>");
	}
	

}

}
?>