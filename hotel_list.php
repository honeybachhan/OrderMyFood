<?php
include('config.php');

	session_start();
	$csid=$_SESSION['csid'];
		echo $csid;
		
		$stmt=$dbcon->prepare('SELECT hid,hname, addr,abouthotel,image from owner_detail ');
		$stmt->execute();
		
		
		

?>

			

<html>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hotel List</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
		<link rel="stylesheet" href="css/hotel.css">
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
			
			
			</style>
		
	</head>
	

	<body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                	
                   <div class="row">
					<h1><b>Hotel List</b></h1>
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
                    
                    <div class="row">
                       
                        	
                        	<div class="form-box">
	                        	
								<div class="col-xs-15">
								<section class="vendor-list js-infscroll-container">
								<section class="js-infscroll-load-more-here">
								<?php
	
								if($stmt->rowCount() > 0){

								while($row=$stmt->fetch(PDO::FETCH_ASSOC))
								{
								extract($row);
								
								?>
								<div  class="well" id=" <?php echo $hid;?>" onclick="(window.open('http://localhost/OrderMyFood/menu.php?hid=<?php echo $hid;?>'),'_SELF');">
	                           <div class="row">
							   
							
								<article class="vendor list js-vendor-list-vendor-panel">
									
								    <div class="vendor__image">
									
									<?php echo"<img src=$image>";?>
									
									</div>
									
									<div class="vendor__details">
									<div class="vendor__title">
									
									<span class="vendor__name">
									
									    <?php echo $hname; ?>
									</span>
									</div>
									
									
									
									<div class="vendor__details__footer">
									<?php echo $addr; ?>
									<br>
									<?php echo $abouthotel; ?>
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
          
            
  
      
        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				
        			</div>
        			
        		</div>
        	</div>
        </footer>

       

    </body>

</html>
		