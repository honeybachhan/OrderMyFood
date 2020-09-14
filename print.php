<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Owner Confirmed Menu</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="css/hotel.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		
		
		
		
	</head>
	
<body>

<?php

		include('config.php');
		session_start();
		$csid=$_GET['csid'];
		$hid=$_GET['hid'];
		$stmt=$dbcon->prepare("SELECT order_id,item_name,qty,subtotal FROM order_detail where csid='$csid' and hid='$hid' ");
		$stmt->execute();
		
		$_SESSION['csid']=$csid;
		
	
	if(isset($_POST['p'])){
		$stmt1=$dbcon->prepare("UPDATE order_detail set is_active='N' where csid='$csid'");
		$stmt1->execute();
		echo "<meta http-equiv='refresh' content='2;url=owner_order_placed.php'>";
	}
	
	  
?>
	<body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
					<?php
	
								if($stmt->rowCount() > 0){

								while($row=$stmt->fetch(PDO::FETCH_ASSOC))
								{
								extract($row);
								
								?>
                        <table class='table '>	
						<tbody>
						<tr>
						<td align='right'>
						<b>Order Id:</b>
						</td>
						<td align='left'>
						<b >  <?php echo $order_id;?></b>
						</td>
						</tr>	
						</tbody>	
						</table>	
                    </div>
                    
                    <div class="row">
                       
                        	
                        	<div class="form-box">
	                        	
								<div class="col-xs-15">
								<section class="vendor-list js-infscroll-container">
								<section class="js-infscroll-load-more-here">
								
								<div  class="well" >
	                           <div class="row">
							   
							
								<article class="vendor list js-vendor-list-vendor-panel">
									
								   
									<div class="vendor__details">
									<div class="vendor__title">
									
									<span class="vendor__name">
										
									    
										<?php echo "Customer Id:".$csid ; ?>
										<br>
										
										<?php 
										echo"<table class='table '>";	
										echo"<tbody>";
										echo"<tr>";
										echo" <td align='left'>";
										$item=explode(',', $row['item_name']);
										foreach($item as $out) {
											echo "<br>";
										echo $out;
										}
										echo"</td>";
										echo" <td align='right'>";
										$quantity=explode(',', $row['qty']);
										foreach($quantity as $out1) {
											echo "<br>";
										echo $out1;
										}
										echo"</td>";
										echo"</tr>	";
										echo"</tbody>";	
										echo"</table>";
										?>
										<br>
										<?php echo "<i>Subtotal:</i>". "<i>"."₹".$subtotal."</i>" ; ?>
										
									</span>
									</div>
									
									
									
									
									</div>
								
									</article>
										</div>
									</div>
								
			                    
								<?php
								}			
	}
	?>
	<form action="" method="post">
	<button type="submit" class="btn" id="p" name="p" style='background-color:#FFDAB9; color:black;'>Print Order</button>
	
	</form>
	</section>
	</section>
	
	
						</div>
		                </div>
		                </div>
						</div>
						</div>
						</div>

      <!-- <script>
function myFunction() {
    window.print();
}
</script>-->

    </body>
	</html>
	