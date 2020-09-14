

<?php

include('connecttomysql.php');

 $csid=$_GET['csid'];
 $VerificationCode=$_GET['verify_code'];

 $query="select verify_code from customer_detail where csid='$csid' ";

if($is_query_run=mysqli_query($connect,$query))
{	
$query_executed=mysqli_fetch_assoc($is_query_run);
 $query_executed['verify_code'];
	if( $VerificationCode==$query_executed['verify_code'] )
	{
	 $query1="UPDATE customer_detail SET isVerify = 'Y', isActive = 'Y' WHERE csid='$csid'";
    $is_query_run1=mysqli_query($connect,$query1);
	//$query_executed1=mysqli_fetch_assoc($is_query_run1);
	echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Email Verification Successful')
    </SCRIPT>");
	header('location:register.php');
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert(' Email Verification Failed')
    </SCRIPT>");
	}
	



}

?>
