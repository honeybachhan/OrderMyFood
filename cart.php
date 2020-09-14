<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cart List</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="css/hotel.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!--<script type='text/javascript'>
   
        function myFunction(id){
			alert(id);
			document.location('getproducts.php');
        }
    
 
		</script>-->
		
		<style>
			img{
				height:55px;
				width:60px;
			}
			
			h1 .btn-group { display: inline-block; }
			</style>
		
	</head>
	
<body>

<?php

	
	
	
	  
	?>
	

	<body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	 <div class="row">
					<h1><b>Cart</b></h1>
                       <table class='table '>	
						<tbody>
						<tr>
						<td align='center'>
						<h1></h1>
						</td>
						<td align='right'>
						 <a href="logout1.php" class="btn btn-info btn-lg">
						<span class="glyphicon glyphicon-log-out"></span> Log out
						</a>
						</td>
						</tr>	
						</tbody>	
						</table>	
                           
                       
                    </div>
                 
					
					
						
								
        
					<?php
					
if(isset($_POST['order']))
	{
		session_start();
	$counter=@$_POST['counter'];	
	$gtotal=@$_POST['gtotal'];
	
	$csid=$_SESSION['csid'];
	echo $csid;
	$array=array();
	$j=1;
	$c=1;
	
	while($j<$counter)
		{
			if(@$_POST['qty'.$j] > 0)
			{
			array_push($array,array(@$_POST['image'.$j],
									@$_POST['name'.$j],
									@$_POST['price'.$j],
									@$_POST['qty'.$j],
									@$_POST['total'.$j]
			));
			
			
			$c++;
			}
			$j++;
			
		}
		$_SESSION['array1']=$array;
		$_SESSION['c']=$c;
		
		$d=$c-1;
		
					//echo"<div class='footer navbar-fixed-top' style='background-color :#900C3F '>";
					echo"<div  class='well well-sm' >";
					
					echo"<b>Total Order:</b>";
					echo( "<b>". "₹".@$_POST['gtotal']."</b>" );
					echo( "<sub style='color:grey'>".$d. "items"."</sub>" );
					$_SESSION['gtotal']=$_POST['gtotal'];
					echo "<br>";
					echo "<br>";
					echo"<form action='confirm_menu.php' method='post'>";
					echo"<input type='submit' class='btn' name='s' id='s' style='background-color:#FFCC33; color:black;' value='Confirm Order'>";
					echo"</div>";
					
					
		echo"<table class='table '>";	
		echo"<tbody>";
		echo"<tr>";
		echo" <td align='left'>";
		echo"<i>Order Summary</i>";
		echo"</td>";
		echo" <td align='right'>";
		echo"<a href='hotel_list.php'><button type='submit' class='btn' >Change</button></a>";
		echo"</td>";
		echo"</tr>	";
		echo"</tbody>";	
		echo"</table>";	
		
	for ($row = 0; $row < $c-1; $row++) {
		 
		
	echo"<table class='table '>";	
	echo"<tbody>";
    echo"<tr>";
     
     echo" <td align='left'>";
	echo "<b>".$array[$row][1]."</b>";
	$_SESSION['name']=$array[$row][1];
	 echo"</td>";
      echo" <td align='right'>";
	 echo "<b>".$array[$row][3]."</b>";
	 $_SESSION['quantity']=$array[$row][3];
	 echo"</td>";
      
    echo"</tr>	";
	echo"</tbody>";	
echo"</table>";	
	//echo"<article class='vendor list js-vendor-list-vendor-panel'>";
	//echo"<div class='vendor__image'>";
	// $array[$row][0];
	
	//echo"</div>";
	
	//echo"<div class='well'>";
	//echo"<table>";
	//echo"<td style='width: 200px;'>";
	 //echo"<div  class='row'>";
	//echo"<span class='col-sm-4'   >";
	//echo "<b>".$array[$row][1]."</b>";
	//echo"</td>";
	
	//echo"</span>";
	//echo $array[$row][3];
	
	
	//echo"<span class='col-sm-4'   >";
	//echo"</span>";
	//echo" X ";
	//echo" ₹";
	//echo $array[$row][2];
	//echo"<span class='col-sm-4 ' >";
	//echo"<td style='width: 200px;'>";
	//echo  "<b>".$array[$row][4]."</b>";
	//echo"</span>";
	//echo"<br>";
	//echo"<br>";
	//echo"</td>";
	//echo"</table>";
	//echo"</div>";
	
	
	
	
	
		 }
	
		

	
					
					
	}
	
	

		 echo"<hr size='30'> ";	
		 echo"<table class='table '>";	
		 echo"<tbody>";
		 echo"<tr>";
     
         echo" <td align='left'>";
	     echo "<i>Total Order</i>";
		 echo"</td>";
         echo" <td align='right'>";
	     echo"<i >". "₹". $_POST['gtotal']."</i>";
	    echo"</td>";
      
       echo"</tr>	";
	   echo"</tbody>";	
       echo"</table>";	
		
?>
</form>
	</div>				
	</div>
	</div>				
		

						
		
        
        
       
</body>
</html>