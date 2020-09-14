<?php

include('connecttomysql.php');

 $hid=$_GET['hid'];
 $VerificationCode=$_GET['verify_code'];

 $query="select verify_code from owner_detail where hid='$hid' ";

if($is_query_run=mysqli_query($connect,$query))
{	
$query_executed=mysqli_fetch_assoc($is_query_run);
 $query_executed['verify_code'];
	if( $VerificationCode==$query_executed['verify_code'] )
	{
	 $query1="UPDATE owner_detail SET is_verify = 'Y', is_active = 'Y' WHERE hid='$hid'";
    $is_query_run1=mysqli_query($connect,$query1);
	//$query_executed1=mysqli_fetch_assoc($is_query_run1);
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Email Verification Successful')
    </SCRIPT>");
	header('location:register1.php');
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Email Verification Failed')
    </SCRIPT>");
	}
	



}

?>
