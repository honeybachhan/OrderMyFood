<?php
include('config.php');
//require 'connecttomysql.php';
session_start();
	$hid=@$_SESSION['hid'];
	$csid=@$_SESSION['csid'];
	
	$c=@$_SESSION['c'];
	//$query="select max(id),order_id,csid,item from order_detail where hid='$hid' ";
	//$is_query_run=mysqli_query($connect,$query);
	//$query_executed=mysqli_fetch_array($is_query_run);
	//$id=@$query_executed['max(id)'];
	$stmt=$dbcon->prepare("SELECT * from order_detail where hid=? and  is_active= 'Y' ");
	
	$stmt->execute(array($hid));
	 
	 
?>
	
<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Food Order</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="css/hotel.css">
	
	</head>
	

	<body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                    <div class="row">
					<h1>Food Order</h1>
                       <table class='table '>	
						<tbody>
						<tr>
						<td align='center'>
						<h1></h1>
						</td>
						<td align='right'>
						 <a href="upload_menu.php" class="btn btn-info btn-lg"  >
							Upload Menu
							</a>
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
								<?php
	
								if($stmt->rowCount() > 0)
								{
								while($row=$stmt->fetch(PDO::FETCH_ASSOC))
								{
								extract($row);
								
								?>
								<div  class="well" id=" <?php echo $csid;?>" onclick="(window.open('http://192.168.0.106/OrderMyFood/print.php?csid=<?php echo $csid;?>&hid=<?php echo $hid;?>'),'_SELF'); " >
	                           <div class="row">
							   
							
								<article class="vendor list js-vendor-list-vendor-panel">
									
								   
									<div class="vendor__details">
									<div class="vendor__title">
									
									<span class="vendor__name">
										
									    <?php echo "<b>Order Id:</b>"."<b>".$order_id."</b>" ; ?>
											
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
	
	</section>
	</section>
	
	
						</div>
		                </div>
		                </div>
						</div>
						</div>
						</div>

        
       

    </body>

</html>