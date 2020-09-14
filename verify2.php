<?php
$connect=mysqli_connect('localhost','root','root','OrderMyFood');
 
if(mysqli_connect_errno($connect))
{
		
}

 

if(isset($_POST['submit']))
{
	$hid=$_POST['hid'];
	$otp=$_POST['otp'];
	$query1= "select verify_code from owner_detail where mob = '$_POST[mob]'";
	if($is_query_run=mysqli_query($connect,$query))
{	
$query_executed=mysqli_fetch_assoc($is_query_run);
 $query_executed['verify_code'];
	if( $otp==$query_executed['verify_code'] )
	{
	 $query1="UPDATE owner_detail SET is_verify = 'Y', is_active = 'Y' WHERE hid='$hid'";
    $is_query_run1=mysqli_query($connect,$query1);
	//$query_executed1=mysqli_fetch_assoc($is_query_run1);
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Email Verification Successful')
    </SCRIPT>");
	header('location:owner_login1.php');
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Email Verification Failed')
    </SCRIPT>");
	}
	

}
}
?>