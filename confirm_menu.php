<?php
require 'connecttomysql.php';
session_start();
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Your Order has been placed');
    </SCRIPT>");
	
	$hid=@$_SESSION['hid'];
	
	$csid=@$_SESSION['csid'];
	$c=@$_SESSION['c'];
	$_POST['gtotal']=$_SESSION['gtotal'];
	$query="select max(id) from order_detail  ";
	$is_query_run=mysqli_query($connect,$query);
	$query_executed=mysqli_fetch_array($is_query_run);
	
	$datee=@date("Ymd");
	$idd=$query_executed[0]+1;
	$order_id=$datee.$idd;
	if(isset($_POST['s'])){
	$array=$_SESSION['array1'];
	
	//echo $hid;
	for ($row = 0; $row < $c-1; $row++) {
	$query1="select * from order_detail where hid='$hid' and csid='$csid'";
	$is_query_run1=mysqli_query($connect,$query1);
	$query_executed1=mysqli_fetch_assoc($is_query_run1);
	 $item_name=$query_executed1['item_name'];
	 $item_qty=$query_executed1['qty'];
				
	
	 $name= @$array[$row][1];
	 $qty= @$array[$row][3];
	 $a=$name;
	 $b=$qty;
	
	if($item_name!=null && $item_qty!=null)
	{
		
		 $str_item=$item_name.",".$a;
		 $str_qty=$item_qty.",".$b;
		
	 mysqli_query($connect,"UPDATE order_detail set item_name='$str_item' , qty='$str_qty' where order_id='$order_id' AND csid='$csid' AND hid='$hid'");
	echo "<meta http-equiv='refresh' content='2;url=hotel_list.php'>";

	}
	else
	{
		
	 mysqli_query($connect,"INSERT INTO order_detail(order_id,csid,hid,item_name,qty,subtotal,is_active) VALUES ('$order_id','$csid','$hid','$name','$qty','$_POST[gtotal]','Y' )");
	echo "<meta http-equiv='refresh' content='2;url=hotel_list.php'>";
	}
	}
	
}
	
	
?>

		